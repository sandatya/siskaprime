
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>images/usergirl.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nama"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="<?php echo base_url('Dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Mahasiswa') ?>">
            <i class="fa fa-user"></i> <span>Mahasiswa</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Dosen') ?>">
            <i class="fa fa-user"></i> <span>Dosen</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Kelas') ?>">
            <i class="fa fa-university"></i> <span>Daftar Kelas</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Matakuliah') ?>">
            <i class="fa fa fa-book"></i> <span>Daftar Matakuliah</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Jadwal') ?>">
            <i class="fa fa-calendar"></i> <span>Jadwal Perkuliahan</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Jurusan') ?>">
            <i class="fa fa-institution"></i> <span>Jurusan</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('ResetPass') ?>">
            <i class="fa fa-edit"></i> <span>Ganti Password</span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url('Login/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>