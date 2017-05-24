<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tambah User
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol>
      </section>

            <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success">
              <!-- /.box-header -->
              <?php if (validation_errors()) : ?>
                <p class="login-box-msg">
                  <font color="red"><center><?= validation_errors() ?></center></font>
                </p>
              <?php endif; ?>
              <?php if (isset($error)) : ?>
                <p class="login-box-msg">
                  <font color="red"><center><?= $error ?></center></font>
                </p>
              <?php endif; ?>
              <?php if (isset($success)) : ?>
                <p class="login-box-msg">
                  <font color="green"><center>User telah diperbarui</center></font>
                </p>
              <?php endif; ?>
              <!-- form start -->
              <?= form_open() ?>
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" placeholder="Nama User" name="name" value="<?= $user->name ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="username" value="<?= $user->username ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation" name="password_confirm">
                  </div>
                  <div class="form-group">
                    <label>Outlet</label>
                    <select class="form-control" name="outlet">
                      <option disabled="disabled">Select Option</option>
                      <?php foreach ($outlet->result() as $outlets): ?>
                      <option <?php if ($user->outlet == $outlets->id ) echo 'selected' ; ?> value="<?= $outlets->id; ?>"><?= $outlets->nama_outlet; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>User Level</label>
                    <select class="form-control" name="user_level">
                      <option disabled="disabled">Select Option</option>
                      <option value="1" <?php if ($user->flag == "1" ) echo 'selected' ; ?>>Co Owner</option>
                      <option value="2" <?php if ($user->flag == "2" ) echo 'selected' ; ?>>Staff Admin</option>
                    </select>
                  </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- =============================================== -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
