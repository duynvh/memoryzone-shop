@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        @include('admin.blocks.blocks_partial.partial_breadcrumb')
        <section class="content">
            @include('admin.blocks.blocks_message.message_notice')
            @include('admin.blocks.blocks_message.message_error')
            <div class="row">
                @include('admin.blocks.blocks_form.form_edit')
                @include($infoBasic['view'].'ce_left')
                @include($infoBasic['view'].'ce_right')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@stop