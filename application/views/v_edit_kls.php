<div class="content-wrapper">
    <section class="content">
        <?php foreach($kelas as $kls) {?>

            <form action="<?php echo base_url(). 'Kelas/aksi_update'; ?>" method="post">
                <div class="form-group">
                    <label for="">Nama Matakuliah</label>
                    <input type="hidden" name="id_kls" class="form-control" value="<?php echo $kls->id_kls ?>">
                    <input type="text" name="nama_kls" class="form-control" value="<?php echo $kls->nama_kelas ?>">
                </div>
                <div class="form-group">
                <label for="ket">Keterangan</label>
                <select class="form-control" name="ket" value="<?php echo $kls->ket ?>">  
                    <option>pilih</option>    
                    <option>Pagi</option>    
                    <option>Malam</option>    
                </select>
              
               </div>
               
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>