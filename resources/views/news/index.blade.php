@extends('layouts.app')

@section('title', 'News index')

@section('content')
    <!--HEADER NAVBAR-->
    @include('main.partials.header')
    <!--HEADER NAVBAR END-->

        <div class="row" id="media_about_us">
            <div class="col-md-12 media_about_us">
                <h4> НОВОСТИ </h4>

                <div class="row">

                    @foreach($news as $item)
                        <div class="col-md-4 news_items">
                            <a href="{{ route('news_show', ['id' => $item->id]) }}">
                                <img src=" {{ $item->media->first()->url  }} " alt="">
                                <div class="date">{{ date('d.m.Y', strtotime($item->created_at)) }}</div>
                                <p>{{ $item->title }}</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    <!--FOOTER-->
    @include('main.partials.footer')
    <!--FOOTER END-->
@endsection
