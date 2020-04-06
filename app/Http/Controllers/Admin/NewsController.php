<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\UseCases\ArticleCase;
use Illuminate\Http\Request;
use StarterKit\Core\Http\Utils\ResponseBuilder;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\Core\Ui\Attributes\Modal;

class NewsController extends Controller
{

    /**
     * @var ArticleCase
     */
    private $articleCase;

    /**
     * @var MediaService
     */
    private $mediaService;

    public function __construct(ArticleCase $articleCase, MediaService $mediaService)
    {
        $this->articleCase = $articleCase;
        $this->mediaService = $mediaService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  index() {
        return view('admin.news.index', [
            'title' => 'Новости',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function getList(Request $request)
    {
        $items = $this->articleCase->order('position', 'asc')->getList();

        return response()->json([
            'functions' => [
                'updateTableContent' => [
                    'params' => [
                        'selector' => '.ajax-content',
                        'content' => view('admin.news.list', [
                            'items' => $items,
                        ])->render(),
                        'pagination' => view('core::layouts.pagination', [
                            'links' => $items->appends($request->all())->links('core::pagination.bootstrap-4'),
                        ])->render(),
                    ]
                ]
            ]
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $locales = collect(config('project.locales'));

        return response()->json([
            'functions' => [
                'updateModal' => [
                    'params' => [
                        'modal' => 'largeModal',
                        'title' => 'Создание продукта',
                        'content' => view('admin.news.form', [
                            'formAction' => route('admin.news.store'),
                            'buttonText' => 'Создать',
                            'locales' => $locales,
                        ])->render(),
                    ]
                ]
            ]
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $request->merge([
            'site_display' => ($request->has('site_display')) ? 1 : 0,
        ]);
        $item = $this->articleCase->store($request->all());

        return response()->json([
            'functions' => [
                'closeModal' => [
                    'params' => [
                        'modal' => 'largeModal',
                    ]
                ],
                'prependTableRow' => [
                    'params' => [
                        'selector' => '.ajax-content',
                        'content' => view('admin.news.item', ['item' => $item])->render()
                    ]
                ]
            ]
        ]);
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($productId)
    {
        $item = $this->articleCase->item($productId);
        $locales = collect(config('project.locales'));

        if (!$item) {
            $response = new ResponseBuilder();
            $response->showAlert('Ошибка!', 'Продукт не найден');
            $response->closeModal(Modal::LARGE);
            return $response->makeJson();
        }

        return response()->json([
            'functions' => [
                'updateModal' => [
                    'params' => [
                        'modal' => 'largeModal',
                        'title' => 'Редактирование продукта',
                        'content' => view('admin.news.form', [
                            'formAction' => route('admin.news.update', ['id' => $productId]),
                            'buttonText' => 'Сохранить',
                            'item' => $item,
                            'locales' => $locales,
                        ])->render(),
                    ]
                ]
            ]
        ]);
    }

    public function update(ArticleRequest $request, $productId)
    {
        $request->merge([
            'site_display' => ($request->has('site_display')) ? 1 : 0
        ]);

        $item = $this->articleCase->update($productId, $request->all());

        return response()->json([
            'functions' => [
                'closeModal' => [
                    'params' => [
                        'modal' => 'largeModal',
                    ]
                ],
                'updateTableRow' => [
                    'params' => [
                        'selector' => '.ajax-content',
                        'row' => '.row-' . $productId,
                        'content' => view('admin.news.item',['item' => $item])->render()
                    ]
                ]
            ]
        ]);
    }


    /**
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(int $productId)
    {
        $item = $this->articleCase->item($productId);

        if($item){
            $item->delete();
        }

        return response()->json([
            'functions' => [
                'deleteTableRow' => [
                    'params' => [
                        'selector' => '.ajax-content',
                        'row' => '.row-'.$productId
                    ]
                ]
            ]
        ]);
    }

}
