<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Jadwal Perkuliahan
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Jadwal Perkuliahan</li>
      </ol>
    </section> 

    <section class="content">
      <?php echo $this->session->flashdata('message') ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Jadwal</button>
        <a class="btn btn-warning" href="<?php echo base_url('Jadwal/cetak') ?>"> <i class="fa fa-print"></i> Print</a>
        <div class="dropdown inline">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-download"></i> Export 
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="<?php echo base_url('Jadwal/pdf') ?>"> PDF</a></li>
          <li><a href="<?php echo base_url('Jadwal/excel') ?>"> Excel</a></li>
        </ul>
      </div>

     


        <table class="table">
            <tr>
                <th>No</th>
                <th>Kode Matakuliah</th>
                <th>Nama Matakuliah</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th colaspan="2">Action</th>
            </tr>
            <?php $no=1; 
            foreach($jadwal as $jdwl) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $jdwl->kode_mk ?></td>
                <td><?php echo $jdwl->nama_mk ?></td>
                <td><?php echo $jdwl->nama_kelas ?></td>
                <td><?php echo $jdwl->nama_hari ?></td>
                <td><?php echo $jdwl->jam?></td>
                <td><?php echo $jdwl->nama_ruangan ?></td>
                <td onclick="javascript: return confirm('Anda yakin akan menghapus data ini???')"><?php echo anchor('Jadwal/aksi_hapus/'.$jdwl->id_jadwal,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('Jadwal/aksi_edit/'.$jdwl->id_jadwal,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>' ) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Jadwal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('Jadwal/aksi_tambah'); ?>
                <div class="form-group">
                    <label for="">Kode Jadwal</label>
                    <input type="text" name="kd_Jadwal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Jadwal</label>
                    <input type="text" name="nama_Jadwal" class="form-control" required>
                </div>
              
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>