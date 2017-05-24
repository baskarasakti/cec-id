          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Dashboard Admin
                <small>Panel</small>
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
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?= $murid; ?></h3>
                      <p>Total Murid</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="<?= base_url()."murid" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= $staff ?></h3>
                      <p>Total Pegawai</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user-secret"></i>
                    </div>
                    <a href="<?= base_url()."staff" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= $user ?></h3>
                      <p>Total User</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="<?= base_url()."user/lists" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?= $outlet ?></h3>
                      <p>Total Outlet</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-home"></i>
                    </div>
                    <a href="<?= base_url()."outlet" ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-8">
                  <!-- LINE CHART -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Operational Cost</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="chart">
                        <canvas id="barChart" height="165"></canvas>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <div class="col-md-4">
                  <!-- DONUT CHART -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pembayaran Murid Bulan Ini</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="chart">
                        <canvas id="pieChart" height="710"></canvas>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
              </div>
            </section>
            <!-- /.content -->

          </div>
          <!-- /.content-wrapper -->


          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
          </footer>   