<form action="{{$formAction}}" method="post" id="smallAndMediumBusinessProductsForm" class="ajax" data-ui-block-type="element" data-ui-block-element="#largeModal .modal-body">
    <ul class="nav nav-tabs " role="tablist" style="margin-top: 5px;">
        @foreach(config('project.locales') as $count => $locale)
            <li role="presentation" class="nav-item">
                <a class="@if($count == 0) active @endif nav-link" href="#tab-{{ $count }}"
                   aria-controls="#tab-{{ $count }}" role="tab"
                   data-toggle="tab">{{ $locale }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach(config('project.locales') as $count => $locale)
            <div role="tabpanel" class="tab-pane @if($count == 0)  active  @endif " id="tab-{{ $count }}">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Информация о продукте</legend>
                            <div class="form-group">
                                <label for="title.{{ $locale }}">Заголовок *</label>
                                <input type="text" class="form-control" id="title.{{ $locale }}" name="title[{{ $locale }}]" placeholder=""  @if(isset($item)) value="{{$item->getTranslation('title', $locale)}}" @endif>
                                <p class="help-block"></p>
                            </div>
                            @if(isset($item))
                                <div class="form-group">
                                    <label for="slug">Машинное имя</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder=""  @if(isset($item)) value="{{$item->slug}}" @endif disabled>
                                    <p class="help-block"></p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="description.{{ $locale }}">Описание</label>
                                <textarea id="description.{{ $locale }}" name="description[{{ $locale }}]"  class="form-control editor">@if(isset($item)) {{$item->getTranslation('description', $locale)}} @endif</textarea>
                                <p class="help-block"></p>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <fieldset>
            <legend>Настройки</legend>
            <div class="form-group">
                <label for="position">Порядок</label>
                <input type="number" class="form-control" id="position" name="position" placeholder=""  @if(isset($item)) value="{{$item->position}}" @else value="1" @endif>
                <p class="help-block"></p>
            </div>
            <div class="m-checkbox-list">
                <label class="m-checkbox">
                    <input type="checkbox" name="site_display" @if(isset($item) && $item->site_display) checked @endif> Отображать на сайте
                    <span></span>
                </label>
            </div>
        </fieldset>
    </div>
    <button class="btn btn-sm btn-info" type="submit">{{$buttonText}}</button>
</form>

<script>
    $('.editor').each(function () {
        let height = $(this).attr('data-editor-height');
        editor = CKEDITOR.replace($(this).attr('id'), {

            height: (height) ? height : 150
        });

        editor.ui.addButton('FileManager', {
            label: "Менеджер файлов",
            command: 'showFileManager',
            toolbar: 'insert',
            icon: '/core/js/vendors/ckeditor/image_file.png'
        });

        editor.addCommand("showFileManager", {
            exec: function (edt) {
                app.functions.editorShowObjects(edt);
            }
        });
    });
</script>
