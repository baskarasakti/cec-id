<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Jadwal
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Jadwal</a></li>
            <li class="active">View Jadwal</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <?php if ($this->session->userdata('role_id') == 0): ?>
                <p>Filter by outlet:</p>
                <form method="get" action="http://localhost/cec-id/jadwal" accept-charset="utf-8">
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
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Murid</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                        <th>Minggu</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($jadwal)) {
                          foreach ($jadwal->result() as $jadwals) {
                            ?>
                            <tr>
                              <td><?= $jadwals->nama_jadwal; ?></td>
                              <td><?php if ($jadwals->senin == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->selasa == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->rabu == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->kamis == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->jumat == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->sabtu == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td><?php if ($jadwals->minggu == 1 ) echo '<p>&#10004</p>' ; ?></td>
                              <td>
                              <a href="<?= base_url().'jadwal/edit?nik='.$jadwals->nik_jadwal ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
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