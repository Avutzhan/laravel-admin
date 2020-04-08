<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\News\Models\News;
use StarterKit\News\UseCases\NewsCase;

class MainController extends Controller
{
    /**
     * @var NewsCase
     */
    private $newsCase;

    public function __construct(NewsCase $newsCase,
                                CategoryService $categoryService,
                                MediaService $mediaService)
    {
        $this->newsCase = $newsCase;
        $this->categoryService = $categoryService;
        $this->mediaService = $mediaService;
    }

    public function index() {
        $news = $this->newsCase
            ->where('site_display', 1)
            ->getCollection();
//dd($news);
        $items = array('1','2','3');

        //dd($news->media->chunk(2));
        return view('main', [
            'news' => $news,
            'items' => $items,
        ]);
    }
}

