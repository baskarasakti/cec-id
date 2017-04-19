      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Buku
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
                <?= form_open() ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="buku1">Judul Buku</label>
                      <input type="text" class="form-control" id="buku1" placeholder="Masukkan Judul Buku" name="judul">
                    </div>
                    <div class="form-group">
                      <label for="tahun">Tahun</label>
                      <input type="text" class="form-control" id="buku1" placeholder="Masukkan Tahun" name="tahun">
                    </div>
                    <div class="form-group">
                      <label for="pengarang">Pengarang</label>
                      <input type="text" class="form-control" id="buku1" placeholder="Masukkan Pengarang" name="pengarang">
                    </div>
                    <div class="form-group">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control" id="buku1" placeholder="Masukkan Penerbit" name="penerbit">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Buku</label>
                      <input type="text" class="form-control" id="buku1" placeholder="Masukkan Harga Buku" name="harga">
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