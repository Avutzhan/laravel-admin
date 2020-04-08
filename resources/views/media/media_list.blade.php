<div class="row">
    @foreach($items->media as $media)
        @include('news::media.media_item')
    @endforeach
</div>
