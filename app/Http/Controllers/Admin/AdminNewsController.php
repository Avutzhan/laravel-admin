<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\Core\Services\UploaderService\UploaderService;
use Illuminate\Http\UploadedFile;
use StarterKit\News\Http\Requests\NewsRequest;

use StarterKit\News\Models\News;
use StarterKit\News\UseCases\NewsCase;

/**
 * Ui-Kit
 */

// Components
use StarterKit\Core\Ui\Components\Portlet\Portlet;
use StarterKit\Core\Ui\Components\Table\AjaxLoadableTable;
use StarterKit\Core\Ui\Components\Table\TableContent;
use StarterKit\Core\Ui\Components\Form\Factory;
use StarterKit\Core\Ui\Components\Modal\Modal as ModalLayout;

// Attributes
use StarterKit\Core\Ui\Attributes\Modal;
use StarterKit\Core\Ui\Attributes\LineAwesomeIcon;
use StarterKit\Core\Ui\Attributes\Align;
use StarterKit\Core\Ui\Attributes\FormMethod;

// Layout
use StarterKit\Core\Ui\LayoutBuilder as UiLayoutBuilder;

use StarterKit\Core\Http\Utils\ResponseBuilder;

/**
 * Class NewsController
 * @package StarterKit\Core\Http\Controllers
 */
class AdminNewsController extends Controller
{

    private $newsCase;
    private $mediaService;
    private $categoryService;

    public function __construct(NewsCase $newsCase, CategoryService $categoryService)
    {
        $this->newsCase = $newsCase;
        $this->mediaService = new MediaService();
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $categories = $this->categoryService->categoriesForSelect('news');

        return response()->json([
            'functions' => [
                'updateModal' => [
                    'params' => [
                        'modal' => 'superLargeModal',
                        'title' => 'Редактирование новости',
                        'content' => view('forms.form', [
                            'formAction' => route(config('news.routes.store.name')),
                            'buttonText' => 'Сохранить',
                            'categories' => $categories,
                        ])->render(),
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param $newsId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($newsId)
    {
        $item = News::with('mainImage', 'media')->find($newsId);
        $medias = $item->media->chunk(2);

        $categories = $this->categoryService->categoriesForSelect('news');

        $item = $this->newsCase->item($newsId);
        if (!$item) {
            $response = new ResponseBuilder();
            $response->showAlert('Ошибка!', 'Новость не найдена');
            $response->closeModal(Modal::LARGE);
            return $response->makeJson();
        }

        return response()->json([
            'functions' => [
                'updateModal' => [
                    'params' => [
                        'modal' => 'superLargeModal',
                        'title' => 'Редактирование новости',
                        'content' => view('forms.form', [
                            'formAction' => route(config('news.routes.update.name'), $newsId),
                            'buttonText' => 'Сохранить',
                            'medias' => $medias,
                            'item' => $item,
                            'categories' => $categories,
                        ])->render(),
                    ]
                ]
            ]
        ]);
    }

}

