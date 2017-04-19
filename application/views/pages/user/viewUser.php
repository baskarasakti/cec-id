<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Pegawau
            <small>Tabel</small>
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

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Master Data User</h3>
                    <div class="pull-right">
                      <a href="<?php echo base_url().'staff/add';?>" class="btn btn-primary">Tambah User Baru</a>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Excel</button>
                      <button type="button" class="btn btn-default">PDF</button>
                      <button type="button" class="btn btn-default">Word</button>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>username</th>
                        <th>Nama Lengkap</th>
                        <th>Outlet</th>
                        <th>User level</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if (isset($user)) {
                        foreach ($user->result() as $users) {
                          ?> 
                          <tr>
                            <td><?= $users->username; ?></td>
                            <td><?= $users->name; ?></td>
                            <td><?= $users->outlet; ?></td>
                            <td><?= $users->flag; ?></td>
                            <td>
                              <a href="#" class="btn btn-default btn-xs">Edit</a>
                              <a href="#" class="btn btn-danger btn-xs  ">Delete</a>
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