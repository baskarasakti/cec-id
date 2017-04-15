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

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?php echo base_url().'pembayaranBuku/add';?>"><button class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Transaksi</button></a>
                    <div class="btn-group">
                      <button class="btn btn-success">Excel</button>
                      <button class="btn btn-danger">PDF</button>
                      <button class="btn btn-primary">Word</button>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1/03/2017 13:55</td>
                        <td>Handoko</td>
                        <td>English 1</td>
                        <td>150.000</td>
                      </tr>
                      <tr>
                        <td>3/03/2017 08:45</td>
                        <td>Leonardo</td>
                        <td>English 2</td>
                        <td>150.000</td>
                      </tr>
                      <tr>
                        <td>3/03/2017 14:10</td>
                        <td>Ridwan</td>
                        <td>English 2</td>
                        <td>150.000</td>
                      </tr>
                      <tr>
                        <td>5/03/2017 19:32</td>
                        <td>Evelyn</td>
                        <td>English 3</td>
                        <td>150.000</td>
                      </tr>
                      <tr>
                        <td>7/03/2017 09:30</td>
                        <td>Charoline</td>
                        <td>English 4</td>
                        <td>150.000</td>
                      </tr>
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