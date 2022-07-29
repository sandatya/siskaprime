<div class="content-wrapper">
    <section class="content">
        <?php foreach($matakuliah as $mk) {?>

            <form action="<?php echo base_url(). 'Matakuliah/aksi_update'; ?>" method="post">
                <div class="form-group">
                    <label for="">Kode Matakuliah</label>
                    <input type="hidden" name="id_mk" class="form-control" value="<?php echo $mk->id_mk ?>">
                    <input type="text" name="kode_mk" class="form-control" value="<?php echo $mk->kode_mk ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Matakuliah</label>
                    <input type="text" name="nama_mk" class="form-control" value="<?php echo $mk->nama_mk ?>">
                </div>
                <div class="form-group">
                    <label for="">SKS</label>
                    <input type="number" name="sks" class="form-control" value="<?php echo $mk->sks ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>