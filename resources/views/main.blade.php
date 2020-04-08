<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
        <!-- Styles -->
        @include('layouts.partials.main.temporary_styles')
    </head>
    <body>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <!--CONTAINER END-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    @foreach($news as $item)

                            <h1>{{ $item->title }}</h1>

                            {!! $item->contents !!}

                        @foreach($item->media as $imageda)
                                <div class="col-md-2">
                                    <img src=" {{ $imageda->url  }} " alt="" width="200">
                                </div>
                        @endforeach
                    @endforeach

                    @foreach($items as $row)
                        <div class="row">
                            {{ $row }}
{{--                            @foreach($row as $media)--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <img src=" {{ $media->url  }} " alt="" width="200">--}}
{{--                                    </div>--}}
{{--                            @endforeach--}}
                        </div>
                    @endforeach
                </div>
            </div>
            <!--HEADER NAVBAR-->
            @include('layouts.partials.main.header')
            <!--HEADER NAVBAR END-->

            <!--BANNER-->
            @include('layouts.partials.main.banner')
            <!--BANNER END-->

            <!--CONSTRUCTION PRINCIPLES-->
            @include('layouts.partials.main.construction_principles')
            <!--CONSTRUCTION PRINCIPLES END-->

            <!--PROJECTS-->
            @include('layouts.partials.main.projects')
            <!--PROJECTS END-->

            <!--VIDEO-->
            @include('layouts.partials.main.video')
            <!--VIDEO END-->

            <!--NEWS-->
            @include('layouts.partials.main.media_about_us')
            <!--NEWS END-->

            <!--MAP-->
            @include('layouts.partials.main.map')
            <!--MAP END-->

            <!--CONTACTS-->
            @include('layouts.partials.main.contacts')
            <!--CONTACTS END-->

            <!--FOOTER-->
            @include('layouts.partials.main.footer')
            <!--FOOTER END-->
        </div>
        <!--CONTAINER END-->






        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
