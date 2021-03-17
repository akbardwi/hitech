<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/styles.css">  
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Login Admin</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="<?= base_url(); ?>/assets/vote/img/ICON-HITECH-2021.png" alt="">
                </div>
                <div class="login__forms">
                    <form action="<?= base_url("auth/loginAdm"); ?>" name="myform" class="login__registre" id="login-in" method="post">
                        <h1 class="login__title">HITECH ADMIN USER</h1>  
                        <?php
                        $inputs = session()->getFlashdata('inputs');
                        $error = session()->getFlashdata('error');
                        $errors = session()->getFlashdata('errors');
                        $success = session()->getFlashdata('success');
                        if(!empty($errors)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                            <?php foreach ($errors as $errors) : ?>
                                <li><?= esc($errors) ?></li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                        <br />
                        <?php } if(!empty($error)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <li><?= esc($error) ?></li>
                            </ul>
                        </div>
                        <br />
                        <?php } if(!empty($success)){ ?>
                        <div class="alert alert-success" role="alert">
                            <?= esc($success) ?><br />
                        </div>
                        <br />
                        <?php } ?>
                        <?= csrf_field(); ?>
                        <div class="login__box">
                            <i class='bx bx-user-circle login__icon'></i>
                            <input type="text" placeholder="Username" name="username" class="login__input">
                        </div>    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input">
                        </div>
                        <button type="submit" class="login__button" value="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?= base_url(); ?>/assets/vote/js/main.js"></script>
    </body>
</html>