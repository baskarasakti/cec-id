<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tambah User
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
      <br><br>
        <div class="row">
        <div class="col-md-2">
        </div>
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary box-solid">
            <?php if (validation_errors()) : ?>
                <p><font color="red"><center><?= validation_errors() ?></center></font></p>
              <?php endif; ?>
              <?php if (isset($error)) : ?>
                <p><font color="red"><center><?= $error ?></center></font></p>
              <?php endif; ?>
              <?php if (isset($success)) : ?>
                <p><font color="green"><center><?= $success ?></center></font></p>
              <?php endif; ?>
              <!-- form start -->
              <?= form_open() ?>
                <div class="box-body">
                  <div class="form-group">
                    <label>ID Event</label>
                    <input type="text" class="form-control" placeholder="Auto Generate" name="idevent" disabled value="<?= $event->id_event ?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Event</label>
                    <input type="text" class="form-control" placeholder="Nama User" name="nama" value="<?= $event->nama_event ?>">
                  </div>
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgl" value="<?= $event->tanggal_event ?>">
                </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" placeholder="Nama User" name="lokasi" value="<?= $event->lokasi_event ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?= $event->user_event ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation" name="password_confirm">
                  </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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