<div class="row">
    <div class="col-md-12 contacts">
        <h4>СВЯЗАТЬСЯ С НАМИ</h4>

        <div class="row">
            <div class="col-md-8 contacts_img_wrapper">
                <img src="https://arabiangazette.com/wp-content/uploads/2015/01/future-home-design.jpg" alt="">
            </div>
{{--            <form action="action.php" method="post">--}}
{{--                <p>Ваше имя: <input type="text" name="name" /></p>--}}
{{--                <p>Ваш возраст: <input type="text" name="age" /></p>--}}
{{--                <p><input type="submit" /></p>--}}
{{--            </form>--}}
            <div class="col-md-4">
                <form action="{{ route('send_mail') }}" method="GET">
                    <div class="form-group" style="margin-top: 0px">
                        <input type="text" name="name" class="form-control" placeholder="Ф.И.О.">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Электронная почта">
                    </div>
                    <div class="form-group">
                        <input type="number" name="number" class="form-control" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="6">Комментарии</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>
