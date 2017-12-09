@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        @include('admin.blocks.blocks_partial.partial_breadcrumb')
        <section class="content">
            @include('admin.blocks.blocks_message.message_notice')
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách</h3>
                            <div class="pull-right">
                                <a href="{{ route($infoBasic['route'] . '.create') }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-plus"></span> Thêm mới</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                @include($infoBasic['view'] . 'index_table')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.blocks.blocks_message.message_modal_delete')
    </div>
@stop