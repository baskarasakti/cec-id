<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Pembayaran Buku
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Pembayaran</a></li>
            <li class="active">Pembayaran Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php if ($this->session->userdata('role_id') == 0): ?>
                <p>Filter by outlet:</p>
                <form method="get" action="<?= base_url()."pembayaranBuku?outlet=" ?>" accept-charset="utf-8">
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
                <div class="box-header with-border">
                <h3 class="box-title">Master Data Pembayaran Buku</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'pembayaranBuku/add';?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Transaksi</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Waktu</th>
                        <th>NIK</th>
                        <th>Periode</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($pembayaran_buku)) {
                          foreach ($pembayaran_buku->result() as $pbuku) {
                            ?>
                              <tr>
                                <td><?= $pbuku->created_at ?></td>
                                <td><?= $pbuku->nik ?></td>
                                <td><?= $pbuku->periode ?></td>
                                <td><?= $pbuku->judul ?></td>
                                <td><?= $pbuku->jumlah ?></td>
                                <?php if ($this->session->userdata('role_id') < 2): ?>
                                <td>
                                <a href="<?= base_url()."pembayaranBuku/edit/".$pbuku->id ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-href="<?= base_url()."pembayaranBuku/delete/".$pbuku->id ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                </td>
                                <?php endif ?>
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