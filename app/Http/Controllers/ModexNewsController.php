<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\News\UseCases\NewsCase;

class ModexNewsController extends Controller
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

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function show($id) {
        $news = $this->newsCase
            ->where('site_display', 1)
            ->where('id', $id)
            ->first();

        return view('news.show', [
            'news' => $news,
        ]);
    }
}
