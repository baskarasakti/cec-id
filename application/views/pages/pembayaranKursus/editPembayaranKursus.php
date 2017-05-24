<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Pembayaran
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
                <?= form_open(); ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" value="<?= $pembayaran_kursus->nik ?>">
                    </div>
                    <div class="form-group">
                      <label for="jumlah1">Jumlah</label>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan jumlah" name="jumlah" value="<?= $pembayaran_kursus->periode ?>">
                    </div>
                    <div class="form-group">
                      <label for="diskon1">Diskon</label>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan Diskon" name="diskon" value="<?= $pembayaran_kursus->diskon ?>">
                    </div>
                    <div class="form-group">
                      <label for="diskon1">Periode Bulan</label>
                      <select class="form-control" id="periode" name="periode">
                        <?php for ($i=1; $i < 13; $i++) { 
                          ?>
                          <option <?php if ($pembayaran_kursus->periode == sprintf('%02d', $i)."-".date('Y') ) echo 'selected' ; ?> value="<?= sprintf('%02d', $i)."-".date('Y'); ?>"><?= sprintf('%02d', $i)."-".date('Y'); ?></option>
                          <?php
                        } ?>
                      </select>
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