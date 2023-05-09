<?php

session_start();
include '../config.php';

use MyApp\Config\DatabaseConnection;
use MyApp\Config\KaryawanDatabaseConnection;

$conn = new KaryawanDatabaseConnection("localhost", "root", "", "pajak");

$id_karyawan = $_GET['id_karyawan'];

$conn->deleteKaryawanById($id_karyawan);
echo "
        <script>
            alert('Berhasil delete karyawan!');
            window.location.href='daftar_karyawan.php';
        </script>
    ";
