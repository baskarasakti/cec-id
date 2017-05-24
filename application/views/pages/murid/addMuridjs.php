    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Dropdown -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multilevel-dropdown/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multilevel-dropdown/plugins.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
      $(function() {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        //Money Euro
        $("[data-mask]").inputmask();
      })
    </script>
    <?php if ($this->session->userdata('role_id') > 0): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var number = <?php echo $this->session->userdata('outlet'); ?>;
            var res = pad(number,2);
            document.getElementById('otl').value= res;
        });
        function pad(num, size) {
            var s = num+"";
            while (s.length < size) s = "0" + s;
            return s;
        }
    </script>
    <?php endif ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name=kategori]').on('change', function(){
                var id = $(this).val();
                document.getElementById('cat').value=id.substring(0,1) ; 
                document.getElementById('lvl').value="" ;
            });
        });
        $(document).ready(function(){
            $('select[name=level]').on('click', function(){
                var id = $(this).val();
                var padded_id = pad(id,2)
                document.getElementById('lvl').value=padded_id ; 
            });
        });
        $(document).ready(function(){
            $('select[name=outlet]').on('click', function(){
                var id = $(this).val();
                var padded_id = pad(id,2)
                document.getElementById('otl').value=padded_id ; 
            });
        });
        function pad(num, size) {
            var s = num+"";
            while (s.length < size) s = "0" + s;
            return s;
        }
    </script>
    <?php if (isset($success) && $murid == "") : ?>
    <script type="text/javascript">
    $(document).ready(function(){
        window.open( "<?= base_url() ?>invoice?nik=<?= $nik ?>" );
    });
    </script>
    <?php endif; ?>