<footer class="main-footer">
    <strong>Copyright &copy;  <a href="#">Admin Panel UN-475CAD</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')  }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js')  }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/assets/plugins/chart.js/Chart.min.js')  }}"></script>
<!-- Sparkline -->


<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<script src="{{asset('backend/assets/plugins/moment/moment.min.js')  }}"></script>
<script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')  }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')  }}"></script>
<!-- Summernote -->
<script src="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.js')  }}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.js')  }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/assets/dist/js/demo.js')  }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/assets/dist/js/pages/dashboard.js')  }}"></script>

<!-- Carga jQuery desde el CDN de Google -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!-- Cargar daterangepicker desde CDN -->
<script src="{{asset('backend/assets/plugins/sparklines/sparkline.js')  }}"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/daterangepicker.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.5/daterangepicker.min.js"></script>
<script src="{{asset('backend/assets/plugins/jquery-knob/jquery.knob.min.js')  }}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js')  }}"></script>
<script src="{{asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')  }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('backend/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/assets/dist/js/adminlte.min.js')  }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/assets/dist/js/demo.js')  }}"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
@stack('scripts')

    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>
