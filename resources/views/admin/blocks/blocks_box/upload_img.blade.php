<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Image (*)</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="box-tools">
            {!! Form::file('image',['id'=>'input-file-img','class'=>'form-control']) !!}
            {!! Form::button('X',[
                                'id'=>'btn-del-img',
                                'name'=>'image',
                                'class'=>'btn btn-danger btn-circle icon-del ',
                                'data-toggle'=>'confirmation',
                                'data-btn-ok-label'=>"Delete",
                                'data-btn-ok-icon'=>"fa fa-remove",
                                'data-btn-ok-class'=>"btn btn-sm btn-danger",
                                'data-btn-cancel-label'=>"Cancel",
                                'data-btn-cancel-icon'=>"fa fa-chevron-circle-left",
                                'data-btn-cancel-class'=>"btn btn-sm btn-default",
                                'data-title'=>"Are you sure you want to delete ?",
                                'data-placement'=>"left",
                                'data-singleton'=>"true"
                                ]) !!}
            {{--{!! renderImage('upload/images/' . $infoBasic['route'] . '/' , $data_one->image) !!}--}}
        </div>
    </div>
</div>