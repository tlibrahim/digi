

        </div>
        <!-- END Page Container -->



        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{ asset('new-assets') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/jquery.scrollLock.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/jquery.appear.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/jquery.countTo.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/jquery.placeholder.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/core/js.cookie.min.js"></script>
        <!-- <script src="{{ asset('new-assets') }}/js/app.js"></script> -->
        <script src="{{ asset('new-assets') }}/js/popup.js"></script>

        <!-- Pages Plugins -->
        <script src="{{ asset('new-assets') }}/js/plugins/slick/slick.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/plugins/chartjs/Chart.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('new-assets') }}/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <!-- Pages JS Custom -->
        <script src="{{ asset('new-assets') }}/js/pages/base_tables_datatables.js"></script>
        <!-- <script src="{{ asset('new-assets') }}/js/pages/base_pages_dashboard.js"></script> -->
        <!-- Admin LTE Files -->
        <!-- jQuery 3 -->
        <script src="{{ asset('adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="{{ asset('adminlte') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('adminlte') }}/bower_components/moment/min/moment.min.js"></script>
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('adminlte') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- DataTables -->
        <script src="{{ asset('adminlte') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('adminlte') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('adminlte') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="{{ asset('adminlte') }}/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="{{ asset('adminlte') }}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('adminlte') }}/dist/js/demo.js"></script>
        <!-- Admin LTE Files -->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            var dTables = undefined
            $(document).ready(function() {
                dTables = $('table').DataTable();
                $('.select2').select2()
            });
        </script>
        @yield('scripts')

        <!-- <script type="text/javascript">
          $(function () {
              // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
              App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
          });
        </script> -->

    </body>
</html>
