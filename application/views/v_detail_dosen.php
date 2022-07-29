<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Data Dosen</strong></h4>
        <table class="table">
             <tr>
                <th>NIDN</th>
                <td><?php echo $detail->nidn ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?php echo $detail->nama ?></td>
            </tr>
            
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $detail->tgl_lahir ?></td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td><?php echo $detail->alamat ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo $detail->jenis_kelamin ?></td>
            </tr>
            
            <tr>
                <th>Nomor Telepon</th>
                <td><?php echo $detail->no_telp ?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo $detail->email ?></td>
            </tr>
         
            <tr>
                <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="90" height="110">
            </td>
            </tr>
            
        </table>
       <a href="<?php echo base_url('Dosen/index'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>