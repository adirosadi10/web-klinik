<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- mOMEN -->
<script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
  $(function() {
    $('.select2').select2()

    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'YYYY-DD-MM'
    });
  })
</script>