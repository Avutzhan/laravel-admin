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
{{--                <form action="{{ route('send_mail') }}" method="GET">--}}
                <form {{--action="{{ route('contacts.store') }}" method="POST"--}} id="contactsForm">
{{--                    <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                    <div class="form-group" style="margin-top: 0px">
                        <input type="text" name="name" class="form-control" placeholder="Ф.И.О." id="contactsName">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Электронная почта" id="email">
                    </div>
                    <div class="form-group">
                        <input type="number" name="number" class="form-control" placeholder="Телефон" id="contactsNumber">
                    </div>
                    <div class="form-group">
                        <textarea type="textarea" name="comment" class="form-control" rows="6" id="comment" placeholder="Коментарии"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Отправить</button>
                </form>
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="alert alert-success print-success-msg" style="display:none">
                    <ul></ul>
                </div>
{{--                @if ($errors->any())--}}
{{--                    <br>--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div><br />--}}
{{--                @endif--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                @if(session()->get('success'))--}}
{{--                                                    <br>--}}
{{--                                                    <div class="alert alert-success">--}}
{{--                                                        {{ session()->get('success') }}--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
            </div>
        </div>
    </div>
</div>
