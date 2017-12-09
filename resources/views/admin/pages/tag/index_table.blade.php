<thead>
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Trạng Thái</th>
    <th>Sắp Xếp</th>
    <th>Tuỳ Chọn</th>
</tr>
</thead>
<tbody>
@if (isset($data_table) && count($data_table) >0)
    @foreach ($data_table as $tb_key => $tb_value)
        <tr>
            <td>{!! $tb_value->id !!}</td>
            <td>{!! $tb_value->name !!}</td>
            <td>{!! Form::checkbox('status',1,$tb_value->status,['data-onstyle'=>'success',
                                                            'data-offstyle'=>'danger',
                                                            'data-on'=>'Hiển thị',
                                                            'data-off'=>'Ẩn',
                                                            'data-toggle'=>'toggle',
                                                            'disabled'
                                                            ])!!}
            </td>
            <td>{!! $tb_value->order_by !!}</td>
            @include('admin.blocks.blocks_box.button_action')
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5">Chưa có dữ liệu</td>
    </tr>
@endif
</tbody>