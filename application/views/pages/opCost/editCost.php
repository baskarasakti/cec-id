<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Operational Cost
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Operational Cost</a></li>
            <li class="active">Tambah Opertional Cost</li>
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
                      <label for="Item">Item</label>
                      <input type="text" class="form-control" id="nama" placeholder="Masukkan Item" name="item" value="<?= $op_cost->item ?>">
                    </div>
                    <div class="form-group">
                      <label for="Periode">Periode</label>
                      <select class="form-control" id="periode" name="periode">
                        <?php for ($i=1; $i < 13; $i++) { 
                          ?>
                          <option <?php if ($op_cost->periode == sprintf('%02d', $i)."-".date('Y') ) echo 'selected' ; ?> value="<?= sprintf('%02d', $i)."-".date('Y'); ?>"><?= sprintf('%02d', $i)."-".date('Y'); ?></option>
                          <?php
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Jumlah">Jumlah</label>
                      <input type="text" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" name="jumlah" value="<?= $op_cost->jumlah ?>">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea class="form-control" id="deskripsi" placeholder="Tulis Deskripsi" name="deskripsi" ><?= $op_cost->item ?></textarea>
                    </div>
                    <?php if ($this->session->userdata('role') == 0): ?>
                    <div class="form-group">
                      <label for="first">Outlet</label>
                      <select class="form-control" name="outlet">
                        <?php foreach ($outlet->result() as $outlets): ?>
                        <option <?php if ($op_cost->outlet == $outlets->id ) echo 'selected' ; ?> value="<?= $outlets->id; ?>"><?= $outlets->nama_outlet; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <?php else : ?>
                    <input type="hidden" name="outlet" value="<?php echo $this->session->userdata('outlet'); ?>">
                    <?php endif ?>
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