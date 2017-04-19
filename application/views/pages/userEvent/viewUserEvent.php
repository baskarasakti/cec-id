<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat User
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Lihat User</li>
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
                      <a href="<?php echo base_url().'event/userAdd';?>" class="btn btn-primary">Tambah Event</a>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Excel</button>
                      <button type="button" class="btn btn-default">PDF</button>
                      <button type="button" class="btn btn-default">Word</button>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Event</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Authorized User</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if (isset($event)) {
                        foreach ($event->result() as $events) {
                          ?> 
                          <tr>
                            <td><?= $events->id_event; ?></td>
                            <td><?= $events->nama_event; ?></td>
                            <td><?= $events->tanggal_event; ?></td>
                            <td><?= $events->lokasi_event; ?></td>
                            <td><?= $events->user_event; ?></td>
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