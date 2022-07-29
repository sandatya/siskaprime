<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $this->m_data->get_data('tb_mahasiswa')->num_rows(); ?></h3>

              <p>Jumlah Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url('Mahasiswa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $this->m_data->get_data('tb_dosen')->num_rows(); ?></sup></h3>

              <p>Jumlah Dosen</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="<?php echo base_url('Dosen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $this->m_data->get_data('tb_jurusan')->num_rows(); ?></h3>

              <p>Jumlah Jurusan</p>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
            <a href="<?php echo base_url('Jurusan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $this->m_data->get_data('tb_kelas')->num_rows(); ?></h3>

              <p>Jumlah Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="<?php echo base_url('Kelas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $this->m_data->get_data('tb_matakuliah')->num_rows(); ?></h3>

              <p>Jumlah Matakuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
            <a href="<?php echo base_url('Matakuliah') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
      <!-- /.row -->
</div>
</div>

</section>