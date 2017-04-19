<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Salary
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Salary</a></li>
            <li class="active">tabel Salary</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Master Data Salary</h3>
                  <div class="pull-right">
                      <a href="<?php echo base_url().'salary/add';?>" class="btn btn-primary">Tambah Gaji Pegawai</a>
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
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Outlet</th>
                        <th>Jabatan</th>
                        <th>Salary</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if (isset($salary)) {
                      foreach ($salary->result() as $salarys) {
                        ?>
                    <tr>
                        <td><?= $salarys->nik_staff; ?></td>
                        <td><?= $salarys->nama_depan_staff." ".$salarys->nama_belakang_staff; ?></td>
                        <td><?= $salarys->alamat_staff; ?></td>
                        <td><?= $salarys->no_telp_staff; ?></td>
                        <td><?= $salarys->id_outlet; ?></td>
                        <td><?= $salarys->jabatan_staff; ?></td>
                        <td><?= $salarys->gaji_pokok_salary+$salarys->bonus_salary; ?></td>
                        <td><?= $salarys->tanggal_salary; ?></td>
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