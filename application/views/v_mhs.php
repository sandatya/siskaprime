<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section> 

    <section class="content">
      <?php echo $this->session->flashdata('message') ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</button>
        <a class="btn btn-warning" href="<?php echo base_url('Mahasiswa/cetak') ?>"> <i class="fa fa-print"></i> Print</a>
        <div class="dropdown inline">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-download"></i> Export 
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="<?php echo base_url('Mahasiswa/pdf') ?>"> PDF</a></li>
          <li><a href="<?php echo base_url('Mahasiswa/excel') ?>"> Excel</a></li>
        </ul>
      </div>

      <div class="navbar-form navbar-right">
          <?php echo form_open('Mahasiswa/search')?>
          <input type="text" name="keyword" class="form-control" 
          placeholder="Search">
          <button type="submit" class="btn btn-success">Cari</button>
          <?php echo form_close() ?>
      </div>


        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>  
                <th colaspan="2">Action</th>
            </tr>
            <?php $no=1; 
            foreach($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mhs->nama ?></td>
                <td><?php echo $mhs->nim ?></td>
                <td><?php echo $mhs->tgl_lahir ?></td>
                <td><?php echo $mhs->jurusan ?></td>
                <td><?php echo anchor('Mahasiswa/aksi_detail/'.$mhs->id, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
                <td onclick="javascript: return confirm('Anda yakin akan menghapus data ini???')"><?php echo anchor('Mahasiswa/aksi_hapus/'.$mhs->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('Mahasiswa/aksi_edit/'.$mhs->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>' ) ?></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('Mahasiswa/aksi_tambah'); ?>
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" name="jurusan">  
                    <option>Sistem Informasi</option>    
                    <option>Teknologi Informasi</option>    
                    <option>Sistem Komputer</option>    
                </select>
              
               </div>
               <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Upload Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>