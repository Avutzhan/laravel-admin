<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StarterKit\News\Models\News;
use StarterKit\News\UseCases\NewsCase;

class MainController extends Controller
{
    public function index() {
        $news = News::get()->toArray();
        dd($news[0]['title']['en']);

        return view('main');
    }
}


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\UseCases\HowToActivateCase;
use App\UseCases\RegionCase;
use App\UseCases\WhatIsEsimCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use Spatie\TranslationLoader\LanguageLine;
use StarterKit\Faq\Models\Faq;
use StarterKit\Faq\Models\FaqsGroup;

class MainController extends Controller
{
    /**
     * @var WhatIsEsimCase
     */
    private $whatIsEsimCase;

    /**
     * @var HowToActivateCase
     */
    private $howToActivate;

    /**
     * @var FaqsGroup
     */
    private $group;

    /**
     * @var Faq
     */
    private $faq;

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @var RegionCase
     */
    private $regionCase;

    /**
     * @var MediaService
     */
    private $mediaService;

    public function __construct(WhatIsEsimCase $whatIsEsimCase,
                                HowToActivateCase $howToActivate,
                                FaqsGroup $group,
                                Faq $faq,
                                CategoryService $categoryService,
                                RegionCase $regionCase,
                                MediaService $mediaService)
    {
        $this->whatIsEsimCase = $whatIsEsimCase;
        $this->howToActivate = $howToActivate;
        $this->categoryService = $categoryService;
        $this->group = $group;
        $this->faq = $faq;
        $this->regionCase = $regionCase;
        $this->mediaService = $mediaService;
    }

    public function index()
    {
        $what_is_esim = $this->whatIsEsimCase
            ->where('site_display', 1)
            ->order('position', 'asc')
            ->first();
        dd($what_is_esim);
        $how_to_activate = $this->howToActivate
            ->where('site_display', 1)
            ->order('position', 'asc')
            ->getList();

        $regions = $this->regionCase
            ->where('site_display', 1)
            ->order('position', 'asc')
            ->getList();

        $item = $this->group->where('slug', 'altel')->first();
        $faqs = $item ? $this->faq->where('group_id', $item->id)->orderBy('position')->get() : 'No Faqs';

        return view('frontend.index', [
            'currentLocale' => \App::getLocale(),
            'what_is_esim' => $what_is_esim,
            'how_to_activate' => $how_to_activate,
            'faqs' => $faqs,
            'regions' => $regions
        ]);
    }

}

