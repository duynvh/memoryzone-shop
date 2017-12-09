<section class="content-header">
    <h1>
        <a href="{{ url('admin/' . $infoBasic['route']) }}">{{ $infoBasic['title'] }}</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{ url('admin/' . $infoBasic['route']) }}">{{ $infoBasic['title'] }}</a></li>
    </ol>
</section>