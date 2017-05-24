 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Murid
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Murid</a></li>
            <li class="active">View Murid</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php if ($this->session->userdata('role_id') == 0): ?>
                <p>Filter by outlet:</p>
                <form method="get" action="http://localhost/cec-id/murid" accept-charset="utf-8">
                  <div class="btn-group" role="group" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-default" value="0" name="outlet">All</button>
                    <?php 
                    foreach ($outlet->result() as $outlets) {
                      ?>
                      <button type="submit" class="btn btn-default" value="<?= $outlets->id; ?>" name="outlet"><?= $outlets->nama_outlet; ?></button>
                      <?php
                    }
                    ?>
                  </div>
                </form>
              <?php endif ?>
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Master Data Murid</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'murid/add';?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Murid</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Price</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($murid)) {
                          foreach ($murid->result() as $murids) {
                            if ($murids->keluar == 1) {
                              $font = "red";
                            } else {$font = "black";}
                            ?>
                            <tr>
                              <td><font color="<?= $font ?>"><?= $murids->nik; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->nama; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->alamat; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->notelp; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->kategori; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->levels; ?></font></td>
                              <td><font color="<?= $font ?>"><?= $murids->price; ?></font></td>
                              <td>
                                <a href="<?php echo base_url().'murid/edit/'.$murids->nik;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url().'invoice?nik='.$murids->nik;?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i></a>
                                <?php if ($murids->nik_jadwal == null ) echo '<a href="'.base_url().'jadwal/add?nik='.$murids->nik.'&nama='.$murids->nama.'" class="btn btn-primary btn-xs"><i class="fa fa-calendar"></i></a>' ; ?>
                              </td>
                            </tr>
                            <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>