<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Madrasah Diniyah Raport</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendors/bootstrap-icons/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/app.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/pages/auth.css' ?>">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h2>Madrasah Diniyah</h2>
                        <!-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a> -->
                    </div>
                    <h1 class="auth-title">Log in</h1>
                    <p class="auth-subtitle mb-5">Login untuk masuk kedalam dashboard admin</p>
                    <?php
        if(isset($_GET['pesan'])){
             if($_GET['pesan'] == "gagal"){
                echo"<div class='alert alert-danger'>Login gagal! Username dan password salah</div>";
             }else if($_GET['pesan'] == "logout"){
                echo"<div class='alert alert-danger'>Anda telah logout</div>";
             }else if($_GET['pesan'] == "belumlogin"){
                echo"<div class='alert alert-success'>Silahkan login dulu</div>";
            }
        }
        ?>
                    <form action="<?php echo base_url().'welcome/login' ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl"
                                placeholder="Masukan Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Masukan Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <!-- Gambar Background Samping -->
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>