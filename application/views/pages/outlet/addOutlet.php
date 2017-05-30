<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Outlet
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-success">
          <!-- /.box-header -->
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
          <?php if (isset($success)) : ?>
            <p class="login-box-msg">
              <font color="green"><center>Outlet baru telah ditambahkan</center></font>
            </p>
          <?php endif; ?>
          <!-- form start -->
          <?= form_open() ?>
          <div class="box-body">
            <div class="form-group">
              <label>Nama Outlet</label>
              <input type="text" class="form-control" placeholder="Nama Outlet" name="nama">
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" class="form-control" placeholder="ex: Jl. Abc no 21" name="lokasi">
            </div>
            <div class="form-group">
              <label>Nomor Telpon</label>
              <input type="text" class="form-control" placeholder="ex: 085..." name="notelp">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<!-- =============================================== -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.0
  </div>
  <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>