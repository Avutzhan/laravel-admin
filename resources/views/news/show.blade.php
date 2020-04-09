@extends('layouts.app')

@section('title', 'news show')

@section('content')
        <!--HEADER NAVBAR-->
    @include('main.partials.header')
    <!--HEADER NAVBAR END-->

        <div class="row" id="media_about_us">
            <div class="col-md-12 media_about_us">
                <h4> NEWS SHOW </h4>

                <div class="row">

                    <div class="col-md-4 news_items">
                        <img src="{{ $news->media->first()->url }}" alt="">
                        <div class="date">{{ date('d.m.Y', strtotime($news->created_at)) }}</div>
                        <p>{{ $news->title }}</p>
                        {!! $news->contents !!}
                    </div>

                </div>
            </div>
        </div>

    <!--FOOTER-->
    @include('main.partials.footer')
    <!--FOOTER END-->
@endsection
