<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Murid Belum Bayar Kursus
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
              <?php if ($this->session->userdata('role_id') == 0): ?>
                <p>Filter by periode:</p>
                <form method="get" action="<?php echo base_url().'report/repBelum';?>" accept-charset="utf-8">
                  <div class="btn-group" role="group" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-default" value="0" name="periode">All</button>
                    <?php 
                    for ($i = 1; $i < date('m')+1; $i++) {
                      ?>
                      <button type="submit" class="btn btn-default" value="<?= sprintf('%02d', $i).'-'.date('Y'); ?>" name="periode"><?= sprintf('%02d', $i).'-'.date('Y'); ?></button>
                      <?php
                    }
                    ?>
                  </div>
                </form>
              <?php endif ?>
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if (isset($murid_belumbayar)) {
                          foreach ($murid_belumbayar->result() as $mb) {
                            ?>
                            <tr>
                              <td><?= $mb->nik ?></td>
                              <td><?= $mb->nama ?></td>
                              <td><?= $periode ?></td>
                              <td><?= $mb->price ?></td>
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