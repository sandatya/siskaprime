<div class="content-wrapper">
    <section class="content">
        <?php foreach($jurusan as $jur) {?>

            <form action="<?php echo base_url(). 'Jurusan/aksi_update'; ?>" method="post">
                <div class="form-group">
                    <label for="">Kode Jurusan</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $jur->id ?>">
                    <input type="text" name="kd_jurusan" class="form-control" value="<?php echo $jur->kd_jurusan ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $jur->nama_jurusan ?>">
                </div>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php } ?>
    </section>
</div>