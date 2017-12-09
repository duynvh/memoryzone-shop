@if(Session::has('noticeMassage'))
    <div class="notice-message-alert" data-text='{!! Session::get('noticeMassage') !!}'></div>
@endif

