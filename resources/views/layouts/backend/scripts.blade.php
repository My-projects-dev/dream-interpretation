@extends('backend.layouts.master')
@push('scripts')

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/js/adminlte.min.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('assets/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('assets/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('assets/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/js/demo.js')}}"></script>

{{--<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>--}}
{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>--}}
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<!-- ChartJS -->--}}
{{--<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>zz--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>--}}
{{--<!-- daterangepicker -->--}}
{{--<script src="{{asset('plugins/moment/moment.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
{{--<!-- Summernote -->--}}
{{--<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>--}}
{{--<!-- overlayScrollbars -->--}}
{{--<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="{{asset('dist/js/adminlte.js')}}"></script>--}}
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="dist/js/demo.js"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="dist/js/pages/dashboard.js"></script>--}}
@endpush
