<script src="{{asset('../adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>



<script src="{{asset('../../adminlte/plugins/leaflet/leaflet.js')}}"></script>
{{-- datatables  --}}
<script src="{{asset('../../adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script src="{{asset('../../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}">
</script>
<script src="{{asset('../../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/jszip/jszip.min.j')}}s"></script>
<script src="{{asset('../../adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
{{-- datatables  --}}

<script src="{{asset('../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('../adminlte/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('../adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('../adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
</script>
<script src="{{asset('../adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('../adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('../adminlte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('../adminlte/dist/js/demo.js')}}"></script>
<script src="{{asset('../adminlte/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('../../adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-gesture-handling/dist/leaflet.gesture.handling.js"></script>
<script src="https://unpkg.com/leaflet-google/dist/leaflet-google.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>