<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Jadwal
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Jadwal</a></li>
            <li class="active">Tambah Jadwal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
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
                      <label for="nik">NIK</label>
                      <input type="text" class="form-control" id="nik" name="nik" value="<?php if(isset($nik)){ echo $nik;} ?>" readonly="readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" value="<?php if(isset($jadwal)){ echo $jadwal->nama_jadwal;} ?>" readonly="readonly>
                    </div>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="senin" <?php if($jadwal->senin==1){ echo "checked";} ?>>
                          Senin
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="selasa" <?php if($jadwal->selasa==1){ echo "checked";} ?>>
                          Selasa
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="rabu" <?php if($jadwal->rabu==1){ echo "checked";} ?>>
                          Rabu
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="kamis" <?php if($jadwal->kamis==1){ echo "checked";} ?>>
                          Kamis
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="jumat" <?php if($jadwal->jumat==1){ echo "checked";} ?>>
                          Jumat
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="sabtu" <?php if($jadwal->sabtu==1){ echo "checked";} ?>>
                          Sabtu
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="minggu" <?php if($jadwal->minggu==1){ echo "checked";} ?>>
                          Minggu
                        </label>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>