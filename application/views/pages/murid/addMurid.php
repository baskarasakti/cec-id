<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Murid
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Master Murid</a></li>
            <li class="active">Tambah Murid</li>
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
                      <label for="nama">NIK</label>
                      <div class="input-group">
                        <input type="text" class="form-control" style="width:50px;"/>
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" class="form-control" style="width:50px;"/>
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" class="form-control" style="width:50px;"/>
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" class="form-control"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan nama" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="tgllahir">Tanggal lahir</label>
                      <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgllahir">
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender" class="form-control">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan Alamat" name="alamat">
                    </div>
                    <div class="form-group">
                      <label for="telepon">Telepon</label>
                      <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="notelp">
                    </div>
                    <div class="form-group">
                      <label for="first">Category</label>
                      <select class="form-control" id="first" name="kategori">
                        <option selected="selected" disabled="disabled">Select Option</option>
                        <option>Adult</option>
                        <option>Lower Level</option>
                        <option>Mid Level</option>
                        <option>Higher Level</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="second">Level</label>
                      <select class="form-control" id="second" disabled="disabled" name="level">
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pajak">Pajak</label>
                      <input type="pajak" class="form-control" id="name" placeholder="Masukkan Price" name="pajak">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="price" class="form-control" id="name" placeholder="Masukkan Price" name="price">
                    </div>
                    <!--div class="form-group">
                      <label for="exampleInputFile">Photo</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block"></p>
                    </div-->
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