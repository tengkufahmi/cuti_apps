<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> WEB CUTI </title>

    <link rel="icon" type="image/png" href="<?= base_url();?>assets/jatibanteng.ico" />

    <link rel="stylesheet"
    href="<?=base_url();?>assets/register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/register/css/stylev2.css">

    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php if ($this->session->flashdata('password_err')){ ?>
        <script>
            swal({
                title: "Error Password!",
                text: "Ketik Ulang Password!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">

                    <form method="POST" id="signup-form" class="signup-form" action="<?= base_url();?>Register/proses">
                        <div class="mb-4 form-title">
                        <center><img src="<?= base_url();?>assets/login/images/jatibanteng.png" width="140" alt="" /></center>
                    </div>
                        <h2 class="form-title">Buat Akun</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username"
                            placeholder="Your Username" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"
                            required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password"
                            placeholder="Repeat your password" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="SAVE" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah ada akun ? <a href="<?=base_url();?>Login/index" class="loginhere-link">Login disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script src="<?=base_url();?>assets/register/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/register/js/main.js"></script>
</body>

</html>