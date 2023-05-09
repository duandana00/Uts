<?php

session_start();
include '../config.php';

use MyApp\Config\DatabaseConnection;
use MyApp\Config\KaryawanDatabaseConnection;

$conn = new DatabaseConnection("localhost", "root", "", "pajak");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="img/shield.png" rel="icon"> -->
    <title>Pajak</title>
    <?php include 'header.php' ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                
                <!-- CONTENT -->
                

            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'footer.php'; ?>
</body>

</html>