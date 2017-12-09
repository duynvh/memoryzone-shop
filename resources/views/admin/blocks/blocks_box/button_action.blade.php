<td>{!! Form::open([
                    'id'=>'form-action-delete',
                    'method'=>'delete',
                    'route'=> [$infoBasic['route'] . '.destroy', $tb_value->id]
                    ])
				!!}
    <a title="Edit" class="btn btn-info btn-action-edit"
       href="{!! route($infoBasic['route'] . '.edit', $tb_value->id) !!}">
        <i class="fa fa-pencil fa-fw"></i>
    </a>
    <button type="button" id="delete" data-target=".modal" class="btn btn-danger btn-action-delete">
        <i class="fa fa-trash-o fa-fw" title="Delete"></i>
    </button>
    {!! Form::close() !!}
</td>