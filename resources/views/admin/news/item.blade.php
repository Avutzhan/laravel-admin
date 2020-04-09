<tr class="row-{{ $item->id }}"  @if(isset($loop))data-index="{{$loop->iteration}}"@endif>
    <td class="text-center align-middle">{{ $item->id }}</td>
    <td class="align-middle">{{ $item->title}}</td>
    <td class="text-center align-middle">
        {!! $item->description !!}
    </td>
    <td class="text-center align-middle">
        <i class="la la-power-off" style="color:@if($item->site_display) green; @else red;@endif"></i>
    </td>
    <td class="text-center align-middle">{{ date('d.m.Y', strtotime($item->created_at)) }}</td>
    <td class="text-center align-middle">
        <a href="#" data-url="{{ route('admin.news.edit', ['id' => $item->id ]) }}" class="handle-click" data-type="modal" data-modal="largeModal">
            <i class="la la-edit"></i>
        </a>
        <a href="#" class="handle-click" data-type="confirm"
           title="Удалить продукт"
           data-title="Удаление"
           data-message="Вы уверены, что хотите удалить продукт?"
           data-cancel-text="Нет"
           data-confirm-text="Да, удалить" data-url="{{ route('admin.news.delete', ['id' => $item->id ]) }}">
            <i class="la la-trash"></i>
        </a>
    </td>
</tr>
