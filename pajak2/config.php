<?php

namespace MyApp\Config;

class DatabaseConnection
{
    private $conn;

    public function __construct($host, $username, $password, $database)
    {
        $this->conn = mysqli_connect($host, $username, $password, $database);
    }

    public function query($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function query_detail($query)
    {
        $result = mysqli_query($this->conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        };
        return $rows;
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}

class KaryawanDatabaseConnection extends DatabaseConnection
{
    public function getAllKaryawan()
    {
        return $this->query_detail("SELECT * FROM karyawan");
    }

    public function getKaryawanById($id)
    {
        $query = "SELECT * FROM karyawan WHERE id_karyawan = $id";
        $result = $this->query_detail($query);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function editKaryawan($id_karyawan, $nama, $nip, $jabatan, $ptkp)
    {
        $query = "UPDATE karyawan SET
                    nama = '$nama',
                    nip = '$nip',
                    jabatan = '$jabatan',
                    ptkp = '$ptkp'
                    WHERE id_karyawan = '$id_karyawan'
                ";
        return $this->query($query);
    }

    public function deleteKaryawanById($id)
    {
        $query = "DELETE FROM karyawan WHERE id_karyawan = $id";
        return $this->query($query);
    }

    public function searchKaryawan($nama)
    {
        $query = "SELECT * FROM karyawan WHERE nama LIKE '%$nama%'";
        return $this->query_detail($query);
    }
}
