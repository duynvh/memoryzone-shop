<script>var baseURL = '{{ url('/') }}';</script>
<!-- jQuery 3 -->
<script src="{{ asset('public/js/admin/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/js/admin/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/js/admin/bootstrap.min.js') }}"></script>

<script src="{{ asset('public/js/helper.js') }}"></script>

<script src="{{ asset('public/js/admin/custom.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('public/js/admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/js/admin/dataTables.bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/js/admin/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('public/js/admin/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('public/js/admin/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/js/admin/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/js/admin/moment.min.js') }}"></script>
<script src="{{ asset('public/js/admin/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('public/js/admin/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/js/admin/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/js/admin/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/js/admin/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/js/admin/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('public/js/admin/demo.js') }}"></script>--}}
<script src="{{ asset('public/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(function() {
        $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
        });
    })
</script>
