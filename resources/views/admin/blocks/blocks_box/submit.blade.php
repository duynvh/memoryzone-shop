<div class="box box-info">
    <div class="box-body">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember Form
            </label>
        </div>
        {!! Form::submit('Save',['class'=>'btn btn-info']) !!}
        {!! Form::reset('Reset',['class'=>'btn btn-default']) !!}
    </div>
</div>