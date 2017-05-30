<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $murid; ?></h3>
                  <p>Total Murid</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $murid_belumbayar; ?></h3>
                  <p>Murid Belum Bayar</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-person"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $operational_cost->jumlah; ?></h3>
                  <p>Op Cost Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Murid</li>
                </ul>
                <div class="tab-content no-padding">
                  <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" height="400"></canvas>
                      </div>
                    </div>
                </div>
              </div><!-- /.nav-tabs-custom -->
            </section>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>