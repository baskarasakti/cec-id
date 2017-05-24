<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Book
          </h1>
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Master Book</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box box-success">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?php echo base_url().'buku/add' ?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Buku</button></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Judul Buku</th>
                        <th>Tahun</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Harga</th>
                        <th class="notPrintable">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if (isset($buku)) {
                          foreach ($buku->result() as $book) {
                            ?>
                              <tr>
                                <td><?= $book->judul ?></td>
                                <td><?= $book->tahun ?></td>
                                <td><?= $book->pengarang ?></td>
                                <td><?= $book->penerbit ?></td>
                                <td><?= $book->harga ?></td>
                                <td>
                                  <a href="<?php echo base_url().'buku/edit?id='.$book->id;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                  <a href="#" data-href="<?php echo base_url().'buku/delete?id='.$book->id;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
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