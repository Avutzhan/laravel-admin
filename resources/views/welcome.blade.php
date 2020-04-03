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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .banner {
              height: 80vh;
            }

            .construction_principles > h4 {
                margin-top: 100px;
                margin-bottom: 20px;
            }

            .construction_principles_items {
                margin-top: 30px;
            }

            .projects > h4 {
                margin-top: 100px;
                margin-bottom: 50px;
            }

            .construction_principles_items > i {
                margin-bottom: 20px;
            }

            .projects_text {
                padding-bottom: 10px;
            }

            .projects_text > h6 {
                margin-bottom: 30px;
            }

            .projects_img_container {
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .projects_img_container > img {
                width: 100%;
            }

            .videoWrapper {
                margin-top: 150px;
                position: relative;
                padding-bottom: 45%; /* 16:9 */
                height: 0;
            }
            .videoWrapper iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .news > h4 {
                margin-top: 100px;
                margin-bottom: 50px;
            }

            .news_items {
                margin-bottom: 20px;
            }

            .news_items img {
                width: 100%;
            }

            .news_items p {
                text-transform: uppercase;
            }

            .news_items .date {
                margin-top: 20px;
            }

            .mapWrapper {
                position: relative;
                padding-bottom: 45%; /* 16:9 */
                height: 0;
            }
            .mapWrapper iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .map_header > h4 {
                margin-top: 100px;
                margin-bottom: 50px;
            }

            .contacts > h4 {
                margin-top: 100px;
                margin-bottom: 50px;
            }

            .contacts_img_wrapper img {
                width: 100%;
                height: 90%;
            }

            .form-group {
                margin-top: 30px;
            }

            form button {
                margin-top: 35px;
            }

            .footer {
                padding-top: 30px;
                background-color: #f8f9fa;
            }

            .rights {
                margin-bottom: 30px;
                background-color: #f8f9fa;
            }

            .contacts .list-group,
            .contacts .list-group-item,
            .contacts {
                background-color: #f8f9fa;
            }

        </style>
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
            <!--HEADER NAVBAR-->
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">MODEX</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Заказать звонки<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">EN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">RU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">KZ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <nav class="nav">
                            <a class="nav-link active" href="#">Главная</a>
                            <a class="nav-link" href="#">О ModeX</a>
                            <a class="nav-link" href="#">О Технологии</a>
                            <a class="nav-link" href="#">Проекты</a>
                            <a class="nav-link" href="#">Команда</a>
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">СМИ о нас</a>
                        </nav>
                    </div>
                </div>
            </div>
            <!--HEADER NAVBAR END-->

            <!--BANNER-->
            <div class="row align-items-center banner">
                <div class="col-md-12">
                    <h1>ПЕРЕОСМЫСЛИВАЯ <br>
                        СТРОИТЕЛЬСТВО
                    </h1>
                    <p>Мы считаем что наступило время переосмыслить строительную отрасль реализовав переход от <br>
                       традиционных методов к эффективным производственным условиям
                    </p>
                    <button type="button" class="btn btn-primary">Записаться на экскурсии по заводу</button>
                </div>
            </div>
            <!--BANNER END-->

            <!--CONSTRUCTION PRINCIPLES-->
            <div class="row">
                <div class="col-md-12 construction_principles">
                    <h4> ПРИНЦИПЫ СТРОИТЕЛЬСТВА </h4>

                    <div class="row">
                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>

                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>

                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>

                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>

                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>

                        <div class="col-md-4 construction_principles_items">
                            <i class="fas fa-briefcase fa-2x"></i>
                            <h6>СТАНДАРТИЗАЦИЯ</h6>
                            <p>Возможности современного завода по производству объемных блоков</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--CONSTRUCTION PRINCIPLES END-->

            <!--PROJECTS-->
            <div class="row">
                <div class="col-md-12 projects">
                    <h4> ПРОЕКТЫ </h4>

                    <div class="row">
                        <div class="col-md-4 projects_text">
                            <h6>ЖК УЯ</h6>
                            <p>Многоквартирный жилой дом в Нур-Султане на пересечении улиц Шарль Де Голля и пр. Тауельсыздык</p>
                            <p>срок сдачи 2 квартал 2020 года</p>
                            <p>16 этажей</p>
                            <p>144 квартиры в чистовой отделке</p>
                            <p>площади квартир 60-180</p>
                            <p>площадь кухни 20- 60</p>
                            <button type="button" class="btn btn-primary">Подробнее</button>
                        </div>
                        <div class="col-md-8 projects_img_container">
                            <img src="https://4.bp.blogspot.com/-LLkKXk_NEKo/V61wH3hufYI/AAAAAAAAAbY/7DEh8YR1Y1k_NSbsQwmmDdcQ4gRyq-xMgCLcB/s1600/1_Modern-Futuristic-House-Design_argomeda.blogspot.com.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--PROJECTS END-->

            <!--VIDEO-->
            <div class="col-md-12 videoWrapper">
                <iframe src="https://www.youtube.com/embed/l0U7SxXHkPY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!--VIDEO END-->

            <!--NEWS-->
            <div class="row">
                <div class="col-md-12 news">
                    <h4> СМИ О НАС </h4>

                    <div class="row">
                        <div class="col-md-4 news_items">
                            <img src="http://futuristicnews.com/wp-content/uploads/2012/08/coodo-modular-residential-building4.jpg" alt="">
                            <div class="date">21.22.2020</div>
                            <p>Завершил внутреннее строительство нового штаба AbelsonTaylor в старом почтовом отделении</p>
                        </div>

                        <div class="col-md-4 news_items">
                            <img src="http://futuristicnews.com/wp-content/uploads/2012/08/coodo-modular-residential-building4.jpg" alt="">
                            <div class="date">21.22.2020</div>
                            <p>Завершил внутреннее строительство нового штаба AbelsonTaylor в старом почтовом отделении</p>
                        </div>

                        <div class="col-md-4 news_items">
                            <img src="http://futuristicnews.com/wp-content/uploads/2012/08/coodo-modular-residential-building4.jpg" alt="">
                            <div class="date">21.22.2020</div>
                            <p>Завершил внутреннее строительство нового штаба AbelsonTaylor в старом почтовом отделении</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--NEWS END-->

            <!--MAP-->
            <div class="row">
                <div class="col-md-12 map_header">
                    <h4> ГДЕ МЫ НАХОДИМСЯ? </h4>
                </div>
            </div>
            <div class="col-md-12 mapWrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d372175.96387086256!2d76.66398216062525!3d43.217360079519224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38836e7d16c5cbab%3A0x3d44668fad986d76!2z0JDQu9C80LDRgtGL!5e0!3m2!1sru!2skz!4v1585930961036!5m2!1sru!2skz" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <!--MAP END-->

            <!--CONTACTS-->
            <div class="row">
                <div class="col-md-12 contacts">
                    <h4>СВЯЗАТЬСЯ С НАМИ</h4>

                    <div class="row">
                        <div class="col-md-8 contacts_img_wrapper">
                            <img src="https://arabiangazette.com/wp-content/uploads/2015/01/future-home-design.jpg" alt="">
                        </div>

                        <div class="col-md-4">
                            <form>
                                <div class="form-group" style="margin-top: 0px">
                                    <input type="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Ф.И.О.">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Электронная почта">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Телефон">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">Комментарии</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--CONTACTS END-->

            <!--FOOTER-->
            <div class="row footer">
                <div class="col-md-4 contacts">
                    <h6>СВЯЗАТЬСЯ С НАМИ</h6>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">О ModeX</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">О Технологии</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Проекты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Команда</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">СМИ о нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Для сми</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 contacts">
                    <h6>КОНТАКТЫ</h6>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">г. Алматы <br>
                            Индустриальный парк №1 <br>
                            пересечение улиц Байыркум-Локомотивная</li>
                        <li class="list-group-item">8 (771) 101 80 95</li>
                        <li class="list-group-item">info@modex.kz</li>
                    </ul>
                </div>

                <div class="col-md-3 contacts">
                    <h6>СОЦ.СЕТИ</h6>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <i class="fab fa-instagram"></i> Instagram</li>
                        <li class="list-group-item"> <i class="fab fa-facebook-f"></i> Facebook</li>
                        <li class="list-group-item"> <i class="fab fa-youtube"></i> Youtube</li>
                    </ul>
                </div>
            </div>

            <div class="row rights">
                <div class="col-md-12" style="text-align: end">
                    <p>© 2016-2020. Все права защищены</p>
                </div>
            </div>
            <!--FOOTER END-->
        </div>
        <!--CONTAINER END-->






        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
