 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Murid
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'murid/add';?>"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Murid</button></a>
                    <a href="#"><button class="btn btn-success btn-sm">Excel</button></a>
                    <a href="#"><button class="btn btn-danger btn-sm">PDF</button></a>
                    <a href="#"><button class="btn btn-primary btn-sm">Word</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($murid)) {
                          foreach ($murid->result() as $murids) {
                            ?>
                            <tr>
                              <td><?= $murids->nik; ?></td>
                              <td><?= $murids->nama; ?></td>
                              <td><?= $murids->alamat; ?></td>
                              <td><?= $murids->notelp; ?></td>
                              <td><?= $murids->kategori; ?></td>
                              <td><?= $murids->level; ?></td>
                              <td><?= $murids->price; ?></td>
                              <td>
                                <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-remove"></i></a>
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