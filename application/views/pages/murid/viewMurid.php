 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Murid
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'murid/add';?>"><button class="btn btn-warning btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Murid</button></a>
                    <a href="#"><button class="btn btn-success btn-sm">Excel</button></a>
                    <a href="#"><button class="btn btn-danger btn-sm">PDF</button></a>
                    <a href="#"><button class="btn btn-primary btn-sm">Word</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>E-mail</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>11111</td>
                        <td>Lukman</td>
                        <td>Address 01</td>
                        <td>031-7436875</td>
                        <td>lukman@cec.com</td>
                        <td>Adult</td>
                        <td>Convers.</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11112</td>
                        <td>Ridwan</td>
                        <td>Address 02</td>
                        <td>031-7645854</td>
                        <td>ridwan@cec.com</td>
                        <td>Adult</td>
                        <td>Convers.</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11113</td>
                        <td>Evelyn</td>
                        <td>Address 03</td>
                        <td>085746879555</td>
                        <td>evelyn@gmail.com</td>
                        <td>Mid Level</td>
                        <td>Intermediate 2</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11114</td>
                        <td>Charoline</td>
                        <td>Address 04</td>
                        <td>081254895622</td>
                        <td>charoline@yahoo.com</td>
                        <td>Higher Level</td>
                        <td>Advance 1</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11115</td>
                        <td>Handoko</td>
                        <td>Address 05</td>
                        <td>081298748522</td>
                        <td>handooko@gmail.com</td>
                        <td>Higher Level</td>
                        <td>English 101</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11116</td>
                        <td>Albert</td>
                        <td>Address 06</td>
                        <td>085748995798</td>
                        <td>albert@cec.com</td>
                        <td>TOEFL</td>
                        <td>Local</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11117</td>
                        <td>Simon</td>
                        <td>Address 07</td>
                        <td>031-7687542</td>
                        <td>simon@cec.com</td>
                        <td>MDC</td>
                        <td>SHS</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>11118</td>
                        <td>Leonardo</td>
                        <td>Address 08</td>
                        <td>089978451211</td>
                        <td>leonardoo@cec.com</td>
                        <td>Higher Level</td>
                        <td>English 101</td>
                        <td>400000</td>
                        <td>
                          <a href="<?php echo base_url().'murid/edit';?>"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-remove"></i></a>
                        </td>
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