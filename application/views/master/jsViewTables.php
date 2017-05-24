<!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'excel', 
              exportOptions:{
                columns: ':not(.notPrintable)'
              }
            },
            {
              extend: 'print', 
              exportOptions:{
                columns: ':not(.notPrintable)'
              }
            }
          ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        var y = document.getElementsByClassName("buttons-excel");
        y[0].classList.add('btn');
        y[0].classList.add('btn-success');
        var z = document.getElementsByClassName("buttons-print");
        z[0].classList.add('btn');
        z[0].classList.add('btn-primary');
      });
    </script>
    <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>