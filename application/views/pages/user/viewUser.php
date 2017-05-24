<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lihat Pegawai
      <small>Tabel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">User</a></li>
      <li class="active">View User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Master Data User</h3>
            <div class="pull-right">
              <a href="<?php echo base_url().'user/register';?>"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</button></a>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>username</th>
                  <th>Nama Lengkap</th>
                  <th>Outlet</th>
                  <th>User level</th>
                  <th class="notPrintable">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (isset($user)) {
                  foreach ($user->result() as $users) {
                    ?> 
                    <tr>
                      <td><?= $users->username; ?></td>
                      <td><?= $users->name; ?></td>
                      <td><?= $users->outlet; ?></td>
                      <td><?= $users->flag; ?></td>
                      <td>
                        <a href="<?php echo base_url().'user/edit/'.$users->id;?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url().'user/delete/'.$users->id;?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
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
