	
	<?php if (isset($success)) : ?>
        <script type="text/javascript">
        $(document).ready(function(){
            window.open( "<?= base_url().'invoice/staff?nik='.$nik;?>" );
        });
        </script>
    <?php endif; ?>