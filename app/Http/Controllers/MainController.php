<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
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

    public function index()
    {
        $news = $this->newsCase
            ->where('site_display', 1)
            ->getCollection()
            ->slice(0, 3);

        return view('main.index', [
            'news' => $news,
        ]);
    }

    public function send(Request $request)
    {
        //dd('test');
       // dd($request->body);
        $to_name = 'Avutzhan';
        $to_email = 'dautov92@list.ru';

        $data = array('name'=> $request->name, 'body' => $request->body);

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
                $message->from('abubakribnsaid@gmail.com','test mail');
        });

    }
}

