<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Murid Belum Bayar Buku
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">Murid Belum Bayar Kursus</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <p>Filter by periode:</p>
                <form method="get" action="<?php echo base_url().'report/repBuku';?>" accept-charset="utf-8">
                  <div class="btn-group" role="group" style="margin-bottom: 10px;">
                    <?php 
                    foreach ($buku->result() as $bukus) {
                      ?>
                      <button type="submit" class="btn btn-default" value="<?= $bukus->id ?>" name="idbuku"><?= $bukus->judul ?></button>
                      <?php
                    }
                    ?>
                  </div>
                </form>
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($murid_belumbayar_buku->result() as $mbb): ?>
                      <tr>
                        <td><?= $mbb->nik ?></td>
                        <td><?= $mbb->nama ?></td>
                        <td><?= $get_buku->judul ?></td>
                        <td><?= $get_buku->harga ?></td>
                        <td><a href="<?php echo base_url().'pembayaranBuku/add?nik='.$mbb->nik.'&idbuku='.$get_buku->id.'&jumlah='.$get_buku->harga.'&periode='.date('m-Y');?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i></a></td>
                      </tr>
                      <?php endforeach ?>
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