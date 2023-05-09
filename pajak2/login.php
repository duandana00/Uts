<?php

session_start();
include 'config.php';

$error = false;


if (isset($_POST['masuk'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "admin@gmail.com" && $password == "admin") {
        echo "
            <script>
                alert('Berhasil Login');
                window.location.href='admin';
            </script>
        ";
        exit;
    }

    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="img/logo/logo.png" rel="icon"> -->
    <title>Pajak</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>


<body style="background-color: lightgray">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="my-5">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="img/shield.png" class="mb-3" style="width:20%">
                                    </div>
                                    <center>
                                        <?php if ($error) : ?>
                                        <p class="text-danger">Invalid Username/Password</p>
                                        <?php endif; ?>
                                    </center>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="masuk"
                                                class="btn btn-secondary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
</body>

</html>