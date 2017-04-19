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

              <div class="box box-primary">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="<?php echo base_url().'buku/add' ?>"><button class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Buku</button></a>
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
                        <th>Judul Buku</th>
                        <th>Tahun</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Harga</th>
                        <th>Action</th>
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
                                  <button class="btn btn-xs"><a href="editBuku.html">edit</a></button>
                                  <button class="btn btn-danger btn-xs">delete</button>
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