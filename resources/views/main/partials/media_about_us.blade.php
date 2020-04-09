<div class="row" id="media_about_us">
    <div class="col-md-12 media_about_us">
        <div class="col-md-12">
            <div class="row justify-content-between media_about_us_header">
                <h4> СМИ О НАС </h4>
                <a href=" {{ route('media_about_us') }}"><button type="button" class="btn btn-primary">Все новости</button></a>
            </div>
        </div>

        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4 news_items">
                    <a href="{{ route('news_show', ['id' => $item->id]) }}">
                        <img src="{{ $item->media->first()->url  }}" alt="">
                        <div class="date">{{ date('d.m.Y', strtotime($item->created_at)) }}</div>
                        <p>{{ $item->title }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
