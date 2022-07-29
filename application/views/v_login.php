<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISKA || Sistem Informasi Akademik</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body style="background:#586df5;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br/><br/>
                <div id="logout">
                    <?php if(isset($_GET['signout'])){?>
                        <div class="alert alert-success">
                            <small>Anda Berhasil Logout</small>
                        </div>
                    <?php }?>
                </div>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                    <img src="<?php echo base_url() ?>images/logo2.png" width="100%"  alt="User Image">
                        <h4 class="card-title" style="text-align:center">Login SISKA </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('Login/aksi_login'); ?>" id="formlogin">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="user" class="form-control" placeholder="Masukkan Username" type="text" required="required" autocomplete="off">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <label>Password</label>
                            <input name="pass" class="form-control" placeholder="Masukkan Password" type="password" required="required" autocomplete="off">
                        </div> <!-- form-group// --> 
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                        </div> <!-- form-group// -->                                                           
                    </form>
                        
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div> 
    </div>
    <script>
      // notifikasi gagal di hide
      <?php if(empty($_GET['get'])){?>
        $("#notifikasi").hide();
      <?php }?>
        var logingagal = function(){
            $("#logout").fadeOut('slow');
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script> 
    
</body>
</html>