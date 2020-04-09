<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\News\UseCases\NewsCase;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $news = DB::table('news')->where('site_display', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
dd($news);
//        $news = $this->newsCase
//            ->where('site_display', 1)
//            ->getCollection()
//            ->slice(0, 3);
        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function show($id)
    {
        $news = $this->newsCase
            ->where('site_display', 1)
            ->where('id', $id)
            ->first();

        return view('news.show', [
            'news' => $news,
        ]);
    }

//    public  function  loadData()
//    {
//       // $posts = Post::orderBy('created_at','DESC')->limit(2)->get();
//        $news = $this->newsCase
//            ->where('site_display', 1)
//            ->getCollection()
//            ->slice(0, 3);
//
//        return view('news.index')->withNews($news);
//    }

    public  function  loadDataAjax(Request $request)
    {

        $output = '';
        $id = $request->id;

        $news = DB::table('news')->where('id', '>', $id)->orderBy('created_at', 'DESC')->limit(3)->get();

        //$posts = Post::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(2)->get();

        if (!$news->isEmpty())
        {
            foreach ($news as $item) {
                $url = route('news_show', ['id' => $item->id]);
                $body = substr(strip_tags($item->contents), 0, 500);
                $body .= strlen(strip_tags($item->contents)) > 500 ? "..." : "";

                $output .= '<div class="col-md-4 news_items">
                                <a href="'. $url .'">

                                    <div class="date">' . date('M j, Y', strtotime($item->created_at)) . '</div>
                                    <p>'. $item->title .'</p>
                                 </a>
                            </div>';

            }

            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="' . $item->id . '" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                        </div>';

            echo $output;
        }
    }
}
