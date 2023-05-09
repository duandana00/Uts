<?php

session_start();
include '../config.php';

use MyApp\Config\DatabaseConnection;
use MyApp\Config\KaryawanDatabaseConnection;

$conn = new KaryawanDatabaseConnection("localhost", "root", "", "pajak");

$karyawan = $conn->getAllKaryawan();

if (isset($_POST['search'])) {
    $nama = $_POST['nama'];
    $karyawan = $conn->searchKaryawan($nama);
}

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $ptkp = $_POST['ptkp'];
    $conn->query("INSERT INTO karyawan VALUES(NULL, '$nama', '$nip', '$jabatan', '$ptkp')");
    echo "
        <script>
            alert('Berhasil tambah karyawan!');
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
                <!-- TopBar -->
               

                <!-- CONTENT -->
                <div class="container-fluid">
                    <h2 class="p-2">Daftar Karyawan</h2>

                    <div class="card p-3 mb-5">
                        <form action="" method="POST">
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">NIP</label>
                                <input type="text" name="nip" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <label for="label" class="w-50 pt-2">PTKP</label>
                                <input type="text" name="ptkp" class="form-control" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button name="tambah" type="submit" class="w-25 btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>

                <center>
                    <h4>Cari Karyawan</h4>
                </center>
                <div class="w-100 p-5">
                    <form action="" method="POST" class="d-flex">
                        <input type="text" name="nama" class="w-75 form-control" placeholder="Cari Nama Karyawan...">
                        <button type="submit" name="search" class="w-25 btn btn-primary">Cari</button>
                    </form>
                </div>

                <div class="table-responsive container-fluid">
                    <table border="1" class="table table-striped table-bordered text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>PTK</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($karyawan as $td) : ?>
                            <tr>
                                <td>
                                    <?php echo $i;
                                    $i++; ?>
                                </td>
                                <td><?= $td['nama'] ?></td>
                                <td><?= $td['nip'] ?></td>
                                <td><?= $td['jabatan'] ?></td>
                                <td><?= $td['ptkp'] ?></td>
                                <td>
                                    <a href="edit_karyawan.php?id_karyawan=<?= $td['id_karyawan']; ?>" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="delete_karyawan.php?id_karyawan=<?= $td['id_karyawan']; ?>" class="btn btn-danger" onclick="return confirm('Confirm Delete')">
                                        Delete
                                    </a>
                                </td>
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