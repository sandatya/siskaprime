<div class="content-wrapper">
    <section class="content">
        <?php foreach($dosen as $dsn) {?>

            <form action="<?php echo base_url(). 'Dosen/aksi_update'; ?>" method="post">
                <div class="form-group">
                    <label for="">NIDN</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $dsn->id ?>">
                    <input type="text" name="nidn" class="form-control" value="<?php echo $dsn->nidn ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $dsn->nama ?>">
                </div>
                
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dsn->tgl_lahir ?>">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text"  name="alamat" class="form-control" value="<?php echo $dsn->alamat ?>">
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>

                    <select class="form-control" name="jenis_kelamin" value="<?php echo $dsn->jenis_kelamin ?>">
                    <option>Laki - Laki</option>    
                    <option>Perempuan</option>    
                   
                     </select>
                </div>
               
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"  name="email" class="form-control" value="<?php echo $dsn->email ?>">
                </div>
                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text"  name="no_telp" class="form-control" value="<?php echo $dsn->no_telp ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>