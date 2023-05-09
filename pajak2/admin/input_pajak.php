<?php

session_start();
include '../config.php';

use MyApp\Config\DatabaseConnection;
use MyApp\Config\KaryawanDatabaseConnection;

$conn = new KaryawanDatabaseConnection("localhost", "root", "", "pajak");

$karyawan = $conn->query("SELECT * FROM karyawan");
$pajak = $conn->query("SELECT * FROM pajak");
$persentase = $conn->query("SELECT * FROM persentase");
$data_pajak = $conn->query("SELECT * FROM data_pajak");
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
                <div class="container-fluid">
                    <h2 class="p-2">Daftar History Data Pajak</h2>
                </div>

                <br><br>


                <div class="table-responsive container-fluid">
                    <table border="1" class="table table-striped table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Gaji</th>
                            <th>Pajak</th>
                            <th>Persentase</th>
                            <th>Nominal Pajak</th>
                            <th>Netto</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($data_pajak as $td) : ?>
                            <tr>
                                <td>
                                    <?php echo $i;
                                    $i++; ?>
                                </td>
                                <td>
                                    <?php $id_kry = $td['id_karyawan']; ?>
                                    <?php $detail_karyawan = $conn->query_detail("SELECT * FROM karyawan WHERE id_karyawan = '$id_kry'")[0]; ?>
                                    <?= $detail_karyawan['nama']; ?>
                                </td>
                                <td><?= date('d F, Y', strtotime($td['tanggal'])); ?></td>
                                <td><?= number_format($td['gaji'], 0) ?></td>
                                <td>
                                    <?php $id_pajak = $td['id_pajak']; ?>
                                    <?php $detail_pajak = $conn->query_detail("SELECT * FROM pajak WHERE id_pajak = '$id_pajak'")[0]; ?>
                                    <?= $detail_pajak['pajak']; ?>
                                </td>
                                <td>
                                    <?php $id_persen = $td['id_persentase']; ?>
                                    <?php $detail_persen = $conn->query_detail("SELECT * FROM persentase WHERE id_persentase = '$id_persen'")[0]; ?>
                                    <?= $detail_persen['persentase']; ?>%
                                </td>
                                <td><?= number_format($td['nominal_pajak'], 0) ?></td>
                                <td><?= number_format($td['netto'], 0) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
            <!-- /CONTENT -->

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