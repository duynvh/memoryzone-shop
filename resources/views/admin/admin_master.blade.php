<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @include('admin.skins.meta')
    @include('admin.skins.styleSheet')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.left')
    @yield('content')
    @include('admin.layouts.footer')
</div>
@include('admin.skins.javaScript')
</body>
</html>
