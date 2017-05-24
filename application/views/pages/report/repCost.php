<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Report Operational Cost
            <small>Tabel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">Report Operational Cost</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            <?php if ($this->session->userdata('role_id') == 0): ?>
                <p>Filter by outlet:</p>
                <form method="get" action="<?= base_url()."report/repCost" ?>" accept-charset="utf-8">
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
                  <h3 class="box-title">Master Data Operational Cost</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url().'opCost/add';?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Operational Cost</button></a>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Periode</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <?php if ($this->session->userdata('role_id') == 0): ?>
                          <th class="notPrintable">Action</th>
                        <?php endif ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($operational_cost)) {
                          foreach ($operational_cost->result() as $op_cost) {
                            ?>
                              <tr>
                                <td><?= $op_cost->item ?></td>
                                <td><?= $op_cost->periode ?></td>
                                <td><?= $op_cost->jumlah ?></td>
                                <td><?= $op_cost->deskripsi ?></td>
                                <?php if ($this->session->userdata('role_id') == 0): ?>
                                <td>
                                <a href="<?= base_url()."opCost/edit/".$op_cost->id ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-href="<?= base_url()."opCost/delete/".$op_cost->id ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
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