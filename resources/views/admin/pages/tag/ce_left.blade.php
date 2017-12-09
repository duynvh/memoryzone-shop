<div class="col-lg-9">
    <div class="box box-info">
        @include('admin.blocks.blocks_box.header')
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group col-lg-12 col-md-12">
                        {!! Form::label('lbName','Tên tag (*)') !!}
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>"Nhập tên tag"]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>