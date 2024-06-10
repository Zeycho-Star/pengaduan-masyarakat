<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>
<body>
<div class="main">

<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <?= validation_errors() ?>
                <form action="<?= base_url('c_masyarakat/registrasi_user') ?>" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="nik"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="nik" id="nik" placeholder="Masukan NIk Anda"/>
                    </div>
                    <div class="form-group">
                        <label for="nama"><i class="zmdi zmdi-email"></i></label>
                        <input type="text" name="nama" id="nama" placeholder="nama"/>
                    </div>
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-lock"></i></label>
                        <input type="text" name="username" id="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password" id="password" placeholder=" password"/>
                    </div>
                    <div class="form-group">
                        <label for="No Hp"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="number" name="telp" id="telp" placeholder=" No telp"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="<?php echo base_url() ?>/assets/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="<?php echo base_url('c_masyarakat/login_view') ?>" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
</div>
<!-- JS -->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
