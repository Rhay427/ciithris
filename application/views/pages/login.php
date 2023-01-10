<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="<?= base_url()?>css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </head>
  <title>CIITeam Login</title>
  <body>
    <main>
        <section class="loginContainer container-fluid">
            <div class="container-fluid">
                <div class="row justify-content-center pt-4 g-0">
                    <div class="formLogin ">
                        <form action="login" method="POST">
                            <div class="logoContainer container">
                                <img src="<?= base_url()?>images/logo.png" class="logoImg img" alt="">
                            </div>
                            <p class="titleLogin">Sign in and get started.</p>
                            <div class="formRow row d-flex justify-content-between g-0">
                                <label for="inputUsername" id="loginFormLabel" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="loginInput form-control form-control-sm" id="inputUsername" placeholder="Enter Username">
                                    <div class="error_text" style="color:#f56767;font-size:10px"><?=form_error('username',$prefix='*'); ?></div>
                                </div>
                            </div>
                            <div class="formRow row d-flex justify-content-between g-0">
                                <label for="inputPassword" id="loginFormLabel" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="loginInput form-control form-control-sm" id="inputPassword" placeholder="Enter Password">
                                    <div class="error_text" style="color:#f56767;font-size:10px"><?=form_error('password',$prefix='*'); ?></div>
                                </div>
                            </div>
                            <!--<div class="formForgotText col-sm-12 d-flex justify-content-end">
                                <a href="forgot" class="logtext">Forgot Password</a>
                            </div>-->
                            <hr class="dividerLogin">
                            <div class="col-lg-12 mb-3  d-flex justify-content-center">
                                <button type="submit" class="loginButton btn-sm mb-2"><i class="bi bi-box-arrow-in-right"></i> Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php if($this->session->flashdata('failed_login')) :?>
        <script>
                swal({
                    title: "Error!",
                    text: "<?php echo $this->session->flashdata('failed_login'); ?>",
                    icon: "error",
                    button: "OK",
                })
                .then((value) => {
                    if(value == true){
                        <?php 
                            unset($_SESSION['failed_login']);
                        ?>
                    }
                })
                ;
            </script>       
    <?php endif;?>
</body>
</html>