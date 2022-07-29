<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Kelas
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kelas</li>
      </ol>
    </section> 

    <section class="content">
      <?php echo $this->session->flashdata('message') ?>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Kelas</button>
        <a class="btn btn-warning" href="<?php echo base_url('Kelas/cetak') ?>"> <i class="fa fa-print"></i> Print</a>
        <div class="dropdown inline">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-download"></i> Export 
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="<?php echo base_url('Kelas/pdf') ?>"> PDF</a></li>
          <li><a href="<?php echo base_url('Kelas/excel') ?>"> Excel</a></li>
        </ul>
      </div>

     


        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Keterangan</th>
                <th colaspan="2">Action</th>
            </tr>
            <?php $no=1; 
            foreach($kelas as $kls) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $kls->nama_kelas?></td>
                <td><?php echo $kls->ket ?></td>
                <td onclick="javascript: return confirm('Anda yakin akan menghapus data ini???')"><?php echo anchor('Kelas/aksi_hapus/'.$kls->id_kls,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                <td><?php echo anchor('Kelas/aksi_edit/'.$kls->id_kls,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>' ) ?></td>
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
        <h4 class="modal-title" id="exampleModalLabel">Form Input Kelas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('Kelas/aksi_tambah'); ?>
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="ket">Keterangan</label>
                <select class="form-control" name="ket">  
                    <option>pilih</option>    
                    <option>Pagi</option>    
                    <option>Malam</option>    
                </select>
              
               </div>
              
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>