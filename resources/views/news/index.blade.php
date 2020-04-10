@extends('layouts.app')

@section('title', 'News index')

@section('content')
    <!--HEADER NAVBAR-->
    @include('main.partials.header')
    <!--HEADER NAVBAR END-->

        <div class="row" id="media_about_us">
            <div class="col-md-12 media_about_us" >
                <h4> НОВОСТИ </h4>

                <div class="row" id="load-data">

                    @foreach($news as $item)
                        <div class="col-md-4 news_items">
                            <a href="{{ route('news_show', ['id' => $item->id]) }}">
                                <img src=" {{ $item->media->first()->url  }} " alt="">
                                <div class="date">{{ date('d.m.Y', strtotime($item->created_at)) }}</div>
                                <p>{{ $item->title }}</p>
                            </a>
                        </div>
                    @endforeach

                    <div id="remove-row">
                        <button id="btn-more" data-id="{{ $item->id }}" data-lang="{{ App::getLocale() }}" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                    </div>
                </div>


            </div>
        </div>




    <!--FOOTER-->
    @include('main.partials.footer')
    <!--FOOTER END-->

    <script>
        $(document).ready(function(){
            console.log('document ready');
            $(document).on('click','#btn-more',function(){
                console.log('ajax request sended');
                var id = $(this).data('id');
                var lang = $(this).data('lang');
                $("#btn-more").html("Loading....");

                $.ajax({
                    url : '{{ url("/news/loaddata") }}',
                    method : "POST",
                    data : {id:id, lang:lang,_token:"{{csrf_token()}}"},
                    dataType : "text",

                    success : function (data)
                    {
                        if(data != '')
                        {
                            $('#remove-row').remove();
                            $('#load-data').append(data);
                        }
                        else
                        {
                            $('#btn-more').html("No Data");
                        }
                    }
                });
            });
        });
    </script>

@endsection
