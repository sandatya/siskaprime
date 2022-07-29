<div class="content-wrapper">
<section class="content-header">
      <h1>
        Ganti Password
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ganti Password</li>
      </ol>
    </section> 

    <section class="content">
    
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sukses"){
                                echo "<div class='alert alert-success'>Password Berhasil diganti.</div>";
                            }
                        }
                    ?>
                    <?php echo validation_errors(); ?>
                    <form method="post" action="<?php echo base_url().'ResetPass/ganti_password_aksi'; ?>">
                        <div class="form-group">
                            <label for="password_baru" class="font-weight-bold">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" placeholder="masukkan password baru">
                        </div>

                        <div class="form-group">
                            <label for="password_ulang" class="font-weight-bold">Ulangi Password Baru</label>
                            <input type="password" class="form-control" name="password_ulang" placeholder="Ulangi Password Baru">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Ubah Password">
                    </form>
                
    </section>
    <!-- Button trigger modal -->


<!-- Modal -->

</div>