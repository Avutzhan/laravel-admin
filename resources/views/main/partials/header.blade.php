<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">MODEX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-target="modal">Заказать звонки<span class="sr-only">(current)</span></a>
                    </li>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <nav class="nav">
                <a class="nav-link active" href="/">Главная</a>
                <a class="nav-link" href="{{ route('about_modex') }}">О ModeX</a>
                <a class="nav-link" href="{{ route('about_technology') }}">О Технологии</a>
                <a class="nav-link" href="#projects">Проекты</a>
                <a class="nav-link" href="#">Команда</a>
                <a class="nav-link" href="#media_about_us">СМИ о нас</a>
            </nav>
        </div>
    </div>
</div>
