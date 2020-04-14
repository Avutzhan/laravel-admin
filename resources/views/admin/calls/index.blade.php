@extends('core::layouts.master')

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Заказ Звонков
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Section-->

        <div class="m-section">
            <div class="m-section__content">
                            <table class="table table-bordered ajax-content">
                                <thead>
                                <tr>
                                    <th class="text-center" width="50">#</th>
                                    <th>Имя</th>
                                    <th width="200" class="text-center">Номер</th>
                                    <th class="text-center" width="120">Дата</th>
                                    <th class="text-center" width="100"><i class="fa fa-bars" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($calls as $call)
                                    <tr>
                                        <td class="text-center">{{ $call->id }}</td>
                                        <td >{{ $call->name }}</td>
                                        <td class="text-center">{{ $call->number }}</td>
                                        <td class="text-center">{{ date('d.m.Y', strtotime($call->created_at)) }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('call-back.destroy', ['call_back' => $call->id ]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background-color: white; color: #00F;">
                                                    <i class="la la-trash"
                                                       onMouseOver="this.style.borderBottom='1px solid #00F'"
                                                       onMouseOut="this.style.border='none'"
                                                    ></i>
                                                </button>
                                            </form>
                                        </td>

{{--                                        <td class="text-center">--}}
{{--                                            <form action="{{ route('call-back.destroy', ['call_back' => $call->id ]) }}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <a href="#" class="handle-click" data-type="confirm"--}}
{{--                                                   title="Удалить новость"--}}
{{--                                                   data-title="Удаление"--}}
{{--                                                   data-message="Вы уверены, что хотите удалить новость?"--}}
{{--                                                   data-cancel-text="Нет"--}}
{{--                                                   data-confirm-text="Да, удалить" data-url="{{ route('call-back.destroy', ['call_back' => $call->id ]) }}">--}}
{{--                                                    <i class="la la-trash"></i>--}}
{{--                                                </a>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

            </div>
        </div>
        <!--end::Section-->
    </div>
@stop


