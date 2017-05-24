<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Operational Cost Event
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
                  <font color="green"><center>Peserta baru telah ditambahkan</center></font>
                  </p>
                <?php endif; ?>
                <!-- form start -->
                <?= form_open() ?>
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="Item">Item</label>
                      <input type="text" class="form-control" name="item" placeholder="Masukkan Item">
                    </div>
                    <div class="form-group">
                      <label for="periode">Periode</label>
                      <select class="form-control" name="periode">
                        <option>Januari 2017</option>
                        <option>Februari 2017</option>
                        <option>Maret 2017</option>
                        <option>April 2017</option>
                        <option>Mei 2017</option>
                        <option>Juni 2017</option>
                        <option>Juli 2017</option>
                        <option>Agustus 2017</option>
                        <option>September 2017</option>
                        <option>Oktober 2017</option>
                        <option>Nopember 2017</option>
                        <option>Desember 2017</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Jumlah">Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah">
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" rows="3" placeholder="Deskripsi ..." name="deskripsi"></textarea>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
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