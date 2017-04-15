
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="<?php echo base_url(); ?>assets/images/CEC-LOGO.gif">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php if (validation_errors()) : ?>
          <p class="login-box-msg">
            <font color="red"><center><?= validation_errors() ?></center></font>
          </p>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
          <p class="login-box-msg">
            <font color="red"><center><?= $error ?></center></font>
          </p>
        <?php endif; ?>
        <?= form_open() ?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login">
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
