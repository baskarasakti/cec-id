<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tambah Staff
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
      </br></br>
        <div class="row">
          <!-- left column -->
          <div class="col-md-2"></div>
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
                    <label>NIK</label>
                    <input type="text" class="form-control" placeholder="ex: S108649" name="nik">
                  </div>
                  <div class="form-group">
                  <label>Nama Lengkap</label>
                      <div class="row">
                        <div class="col-xs-6">
                          <input type="text" class="form-control" placeholder="Nama Depan" name="namadepan">
                        </div>
                        <div class="col-xs-6">
                          <input type="text" class="form-control" placeholder="Nama Belakang" name="namabelakang">
                        </div>
                      </div>
                  </div>
                  <!-- Date -->
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd/'" data-mask name="tgllahir">
                </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control">
                    <option value="M">Laki-laki</option>
                    <option value="F">Perempuan</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="ex: Jl. abcdegf" name="alamat">
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" placeholder="ex: 085..." name="notelp">
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="ex: Guru Private" name="jabatan">
                  </div>
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