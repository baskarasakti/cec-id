<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            All Report
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">All Report</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <form method="get" action="<?php echo base_url().'report/allReport';?>" accept-charset="utf-8">
                <div class="row">
                  <div class="col-xs-1" style="padding: 0px 0px 0 15px;">
                    <label for="year">Select year:</label>
                  </div>
                  <div class="col-xs-1" style="padding: 0px 0px 0 15px;">
                    <select class="form-control" style=" margin-bottom: 20px;" id="year" name="tahun">
                      <?php for ($i=2000;$i<2100;$i++) { ?>
                        <option value="<?= $i ?>"><?= $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-1" style="padding: 0px 0px 0 15px;">
                    <button type="sumbit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
              <div class="box box-success">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Periode</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=1;$i<13;$i++) {
                      $periode = sprintf('%02d',$i)."-".$tahun
                      ?>
                      <tr>
                        <td><?= $periode ?></td>
                        <td>
                          <a href="<?php echo base_url().'invoice/report?periode='.$periode;?>" class="btn btn-success btn-xs"><i class="fa fa-money"></i></a>
                          <?php 
                          foreach ($outlet->result() as $outlets) {
                            ?>
                            <a href="<?php echo base_url().'invoice/reportOutlet?periode='.$periode.'&outlet='.$outlets->id;?>" class="btn btn-success btn-xs" value="<?= $outlets->id; ?>" name="outlet"><?= $outlets->nama_outlet; ?></a>
                            <?php
                          }
                          ?>
                        </td>
                      </tr>
                    <?php } ?>
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
