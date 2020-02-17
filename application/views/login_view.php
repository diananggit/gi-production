<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/13/2019
 * Time: 2:11 PM
 */
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('plugins/ioniocns/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('plugins/iCheck/square/blue.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <!--        <a href="../../index2.html"><b>Admin</b>LTE</a>-->
     <!--    <strong><?= SITE_NAME . " " . Date('Y')?> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?= site_url('login/auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="User Name">
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-sm btn-success" id="showPassword" onclick="showPsw()"><i class="fa fa-unlock"></i></button>
                        <!-- <span class="fa fa-lock input-group-text"></span> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
   function showPsw(){
        var showPassword = $('#showPassword');
        if (showPassword === "password"){
            showPassword = "text";
        }else{
            showPassword = "password";
        }
    }
</script>
</body>
</html>