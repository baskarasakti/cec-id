<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Peserta Event
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
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Master Data Peserta</h3>
                  <div class="pull-right">
                    <a href="<?= base_url().'event/addPeserta' ?>"> <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Peserta</button></a>
                  </div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id Peserta</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Kategori</th>
                        <th>Kelas</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if (isset($peserta)) {
                      foreach ($peserta->result() as $pesertas) {
                        ?>
                        <tr>
                          <td><?= $pesertas->id_peserta; ?></td>
                          <td><?= $pesertas->nama_peserta; ?></td>
                          <td><?= $pesertas->alamat_peserta; ?></td>
                          <td><?= $pesertas->no_telp_peserta; ?></td>
                          <td><?= $pesertas->kategori_peserta; ?></td>
                          <td><?= $pesertas->kelas_peserta; ?></td>
                          <td>
                          <a href="#" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="#" data-href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php 
                    }
                    }
                    ?>
                    </tbody>
                  </table>
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