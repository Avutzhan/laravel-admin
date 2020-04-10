<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use StarterKit\Categories\Services\CategoriesService\CategoryService;
use StarterKit\Core\Services\MediaService\MediaService;
use StarterKit\News\Models\News;
use StarterKit\News\UseCases\NewsCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

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
        $news = News::orderBy('created_at','DESC')->limit(2)->get();
        //$news = News::get();
      //  dd(app()->getLocale());

//        $news = $this->newsCase
//            ->where('site_display', 1)
//            ->getCollection()
//            ->slice(0, 3);
        return view('news.index')->withNews($news);;
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
        App::setLocale($request->get('lang', 'en'));
        //dd($request->lang);
        $output = '';
        $id = $request->id;

        $news = $this->newsCase
            ->where('site_display', 1)
            ->getCollection();
        //$news = DB::table('news')->where('id', '>', $id)->orderBy('created_at', 'DESC')->limit(3)->get();
        //$news = News::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();
//dd(app()->getLocale() );
        //$posts = Post::where('id', '<', $id)->orderBy('created_at', 'DESC')->limit(2)->get();
        if (!$news->isEmpty())
        {
            foreach ($news as $item) {
                $url = route('news_show', ['id' => $item->id]);
                $output .= '<div class="col-md-4 news_items">
                                <a href="'. $url .'">
                                    <img src="' . $item->media->first()->url . '" alt="">
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

        //dd($output);

    }
}
