@extends('admin.admin_master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Welcome to Admin {{ config('app.name') }} |
                <a href="{{ url('/') }}">{{ config('app.name') }}</a>
            </h1>
        </section>
    </div>
@stop