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
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success">
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
                    <input type="text" class="form-control" placeholder="ex: S108649" name="nik" value="<?= $staff->nik_staff ?>">
                  </div>
                  <div class="form-group">
                  <label>Nama Lengkap</label>
                      <div class="row">
                        <div class="col-xs-6">
                          <input type="text" class="form-control" placeholder="Nama Depan" name="namadepan" value="<?= $staff->nama_depan_staff ?>">
                        </div>
                        <div class="col-xs-6">
                          <input type="text" class="form-control" placeholder="Nama Belakang" name="namabelakang" value="<?= $staff->nama_belakang_staff ?>">
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
                  <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgllahir" value="<?= $staff->tanggal_lahir_staff ?>">
                </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                    <option value="M" <?php if ($staff->jenis_kelamin_staff == "M" ) echo 'selected' ; ?>>Male</option>
                    <option value="F" <?php if ($staff->jenis_kelamin_staff == "F" ) echo 'selected' ; ?>>Female</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="ex: Jl. abcdegf" name="alamat" value="<?= $staff->alamat_staff ?>">
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" placeholder="ex: 085..." name="notelp" value="<?= $staff->no_telp_staff ?>">
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="ex: Guru Private" name="jabatan" value="<?= $staff->jabatan_staff ?>">
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Outlet</label>
                    <select class="form-control" name="outlet">
                      <option disabled="disabled">Select Option</option>
                      <?php foreach ($outlet->result() as $outlets): ?>
                      <option <?php if ($staff->id_outlet == $outlets->id ) echo 'selected' ; ?> value="<?= $outlets->id; ?>"><?= $outlets->nama_outlet; ?></option>
                      <?php endforeach ?>
                    </select>
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