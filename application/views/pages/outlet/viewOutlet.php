<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Outlet
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Outlet</a></li>
            <li class="active">Lihat Outlet</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Master Data Outlet</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'outlet/add';?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Outlet</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Outlet</th>
                      <th>Nama Outlet</th>
                      <th>Lokasi</th>
                      <th>No. Telp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if (isset($outlet)) {
                      foreach ($outlet->result() as $outlets) {
                        ?>
                        <tr>
                          <td><?= $outlets->id_outlet; ?></td>
                          <td><?= $outlets->nama_outlet; ?></td>
                          <td><?= $outlets->lokasi_outlet; ?></td>
                          <td><?= $outlets->no_telp_outlet; ?></td>
                          <td>
                            <a href="<?php echo base_url().'outlet/edit/'.$outlets->id;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url().'outlet/delete/'.$outlets->id;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
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