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
              <div class="box box-success">
              <?php if (validation_errors()) : ?>
                <p><font color="red"><center><?= validation_errors() ?></center></font></p>
              <?php endif; ?>
              <?php if (isset($error)) : ?>
                <p><font color="red"><center><?= $error ?></center></font></p>
              <?php endif; ?>
              <?php if (isset($success)) : ?>
                <p><font color="green"><center><?= $nik." ".$success ?></center></font></p>
              <?php endif; ?>
                <!-- form start -->
                <?= form_open() ?>
                  <div class="box-body">
                    <?php if (isset($murid)): ?>
                    <input type="hidden" name="nik" value="<?= $murid->nik; ?>">
                    <?php else : ?>
                    <div class="form-group">
                      <label for="nama">NIK</label>
                      <div class="input-group">
                        <input type="text" id="otl" name="otl" class="form-control" style="width:50px;" readonly />
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" id="cat" name="cat" class="form-control" style="width:50px;" readonly/>
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" id="lvl" name="lvl" class="form-control" style="width:50px;" readonly/>
                        <span class="input-group-btn" style="width:0px;"></span>
                        <input type="text" class="form-control" disabled="disabled" placeholder="Auto-Generated ID" />
                      </div>
                    </div>
                    <?php endif ?>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <?php if (isset($murid)): ?>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan nama" name="nama" value="<?= $murid->nama; ?>">
                      <?php else : ?>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan nama" name="nama">
                      <?php endif ?>
                    </div>
                    <div class="form-group">
                      <label for="tgllahir">Tanggal lahir</label>
                      <?php if (isset($murid)): ?>
                      <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgllahir" value="<?= $murid->tgllahir; ?>">
                      <?php else : ?>
                      <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgllahir">
                      <?php endif ?>
                    </div>
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <?php if (isset($murid)): ?>
                      <select id="gender" name="gender" class="form-control">
                        <option value="F" <?php if ($murid->gender == "F" ) echo 'selected' ; ?>>Female</option>
                        <option value="M" <?php if ($murid->gender == "M" ) echo 'selected' ; ?>>Male</option>
                      </select>
                      <?php else : ?>
                      <select id="gender" name="gender" class="form-control">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                      </select>
                      <?php endif ?>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <?php if (isset($murid)): ?>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan Alamat" name="alamat" value="<?= $murid->alamat; ?>">
                      <?php else : ?>
                      <input type="text" class="form-control" id="name" placeholder="Masukkan Alamat" name="alamat">
                      <?php endif ?>
                    </div>
                    <div class="form-group">
                      <label for="telepon">Telepon</label>
                      <?php if (isset($murid)): ?>
                      <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="notelp" value="<?= $murid->notelp; ?>">
                      <?php else : ?>
                      <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="notelp">
                      <?php endif ?>
                    </div>
                    <?php if (isset($murid)): ?>
                    <?php else : ?>
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
                    <?php endif ?>
                    <div class="form-group">
                      <label for="pajak">Pajak</label>
                      <?php if (isset($murid)): ?>
                      <input type="pajak" class="form-control" id="name" placeholder="Masukkan Price" name="pajak" value="<?= $murid->pajak; ?>">
                      <?php else : ?>
                      <input type="pajak" class="form-control" id="name" placeholder="Masukkan Price" name="pajak">
                      <?php endif ?>
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <?php if (isset($murid)): ?>
                      <input type="price" class="form-control" id="name" placeholder="Masukkan Price" name="price" value="<?= $murid->price; ?>">
                      <?php else : ?>
                      <input type="price" class="form-control" id="name" placeholder="Masukkan Price" name="price">
                      <?php endif ?>
                    </div>
                    <?php if ($this->session->userdata('role') == 0 && isset($murid) ): ?>
                    <div class="form-group">
                      <label for="first">Outlet</label>
                      <select class="form-control" name="outlet">
                        <option selected="selected" disabled="disabled">Select Option</option>
                        <?php foreach ($outlet->result() as $outlets): ?>
                        <option <?php if ($murid->id_outlet == $outlets->id ) echo 'selected' ; ?> value="<?= $outlets->id; ?>"><?= $outlets->nama_outlet; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <?php elseif ($this->session->userdata('role') == 0) : ?>
                      <div class="form-group">
                      <label for="first">Outlet</label>
                      <select class="form-control" name="outlet">
                        <option selected="selected" disabled="disabled">Select Option</option>
                        <?php foreach ($outlet->result() as $outlets): ?>
                        <option value="<?= $outlets->id; ?>"><?= $outlets->nama_outlet; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <?php else : ?>
                    <input type="hidden" name="outlet" value="<?php echo $this->session->userdata('outlet'); ?>">
                    <?php endif ?>
                    <?php if (isset($murid)): ?>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" name="keluar" <?php if ($murid->keluar == 1) { echo "checked"; }?>> Keluar
                      </label>
                    </div>
                    <?php else : ?>
                    <?php endif ?>
                    
                    <!--div class="form-group">
                      <label for="exampleInputFile">Photo</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block"></p>
                    </div-->
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