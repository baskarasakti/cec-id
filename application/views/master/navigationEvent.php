<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php base_url().'event/dashboard' ?>" class="logo">
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
                  <span class="hidden-xs"><?php echo $this->session->userdata('nama_event'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <?php echo $this->session->userdata('nama_event'); ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?= base_url('event/logout') ?>" class="btn btn-default btn-flat">Logout</a>
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
              <img src="" class="img-circle" >
            </div>
            <div class="pull-left info">
              <p>Event CEC</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?= base_url().'event/dashboard' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?= base_url().'event/viewPeserta' ?>">
                <i class="fa fa-users"></i> <span>Peserta</span>
              </a>
            </li>
            <li>
              <a href="<?= base_url().'event/viewCostEvent' ?>">
                <i class="fa fa-money"></i> <span>Op Cost Event</span>
              </a>
            </li>
            <li>
              <a href="<?= base_url().'event/viewRepEvent' ?>">
                <i class="fa fa-file-text-o"></i> <span>Report</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>