<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php base_url().'dashboard' ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">CEC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">CEC</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">Selamat datang, <?php echo $this->session->userdata('name'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <!--img src="<?php echo base_url().'assets/dist/img/avatar5.png'; ?>" class="img-circle" alt="User Image"-->
                  <p>
                    <?php echo $this->session->userdata('name'); ?>
                    <small><?php echo $this->session->userdata('role'); ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= base_url('user/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- end account -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url()."assets/dist/img/avatar5.png"; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('name'); ?></p>
            <a><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('role'); ?></a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?php echo base_url().'dashboard' ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <!-- Owner  -->
          <?php if ($this->session->userdata('role_id') == 0): ?>
            <li>
              <a href="<?php echo base_url().'user/lists';?>">
                <i class="fa fa-user" aria-hidden="true"></i> <span>Master user</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'outlet';?>">
                <i class="fa fa-home" aria-hidden="true"></i> <span>Master outlet</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'staff';?>">
                <i class="fa fa-user-secret" aria-hidden="true"></i> <span>Master Staff</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'salary';?>">
                <i class="fa fa-usd" aria-hidden="true"></i> <span>Master Salary</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'event/userView';?>">
                <i class="fa fa-play-circle" aria-hidden="true"></i> <span>Master Event</span>
              </a>
            </li>

          <!-- co owner -->
          <?php elseif ($this->session->userdata('role_id') == 1): ?>
            <li>
              <a href="<?php echo base_url().'staff';?>">
                <i class="fa fa-user-secret" aria-hidden="true"></i> <span>Master Staff</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().'salary';?>">
                <i class="fa fa-usd" aria-hidden="true"></i> <span>Master Salary</span>
              </a>
            </li>
          <?php endif ?>

          <li>
            <a href="<?php echo base_url().'murid';?>">
              <i class="fa fa-users" aria-hidden="true"></i> <span>Master Murid</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url().'buku' ?>">
              <i class="fa fa-book" aria-hidden="true"></i> <span>Master Book</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url().'jadwal' ?>">
              <i class="fa fa-calendar"></i> <span>Jadwal Murid</span>
            </a>
          </li>
            <li><a href="<?php echo base_url().'report/repCost';?>"><i class="fa fa-exchange" aria-hidden="true"></i><span>Operational Cost</span></a>
            </li>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-money"></i> <span>Income</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url().'pembayaranKursus' ?>"><i class="fa fa-circle-o"></i> Pembayaran Kursus</a></li>
              <li><a href="<?php echo base_url().'pembayaranBuku';?>"><i class="fa fa-circle-o"></i> Pembayaran Buku</a></li>
            </ul>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-file-text-o"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url().'report/allReport';?>"><i class="fa fa-circle-o"></i> All Report</a>
              <li><a href="<?php echo base_url().'report/repBelum';?>"><i class="fa fa-circle-o"></i> Murid Belum Bayar Kursus</a></li>
              <li><a href="<?php echo base_url().'report/repBuku';?>"><i class="fa fa-circle-o"></i> Murid Belum Bayar Buku</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>