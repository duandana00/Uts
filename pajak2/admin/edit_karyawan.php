<?php

session_start();
include '../config.php';

use MyApp\Config\DatabaseConnection;
use MyApp\Config\KaryawanDatabaseConnection;

$conn = new KaryawanDatabaseConnection("localhost", "root", "", "pajak");

$id_karyawan = $_GET['id_karyawan'];
$karyawan = $conn->getKaryawanById($id_karyawan);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $ptkp = $_POST['ptkp'];
    $conn->editKaryawan($id_karyawan, $nama, $nip, $jabatan, $ptkp);
    echo "
        <script>
            alert('Berhasil edit karyawan!');
            window.location.href='daftar_karyawan.php';
        </script>
    ";
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
                    <h2 class="p-2">Edit Daftar Karyawan</h2>

                    <div class="card p-3 mb-5">
                        <form action="" method="POST">
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">Nama</label>
                                <input type="text" value="<?= $karyawan['nama'] ?>" name="nama" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">NIP</label>
                                <input type="text" value="<?= $karyawan['nip'] ?>" name="nip" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">Jabatan</label>
                                <input type="text" value="<?= $karyawan['jabatan'] ?>" name="jabatan" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">PTKP</label>
                                <input type="text" value="<?= $karyawan['ptkp'] ?>" name="ptkp" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="daftar_karyawan.php" class="btn btn-outline-danger">Cancel</a>
                                <button name="edit" type="submit" class="w-25 btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
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