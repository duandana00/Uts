-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 04 Bulan Mei 2023 pada 04.09
-- Versi server: 5.7.39
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pajak`
--

CREATE TABLE `data_pajak` (
  `id_data_pajak` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `id_pajak` int(11) NOT NULL,
  `id_persentase` int(11) NOT NULL,
  `nominal_pajak` bigint(20) NOT NULL,
  `netto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_pajak`
--

INSERT INTO `data_pajak` (`id_data_pajak`, `id_karyawan`, `tanggal`, `gaji`, `id_pajak`, `id_persentase`, `nominal_pajak`, `netto`) VALUES
(1, 4, '2001-01-01', 2500000, 1, 1, 250000, 2250000),
(2, 3, '2002-02-01', 5000000, 2, 2, 1000000, 4000000),
(3, 3, '2002-01-01', 3500000, 1, 2, 700000, 2800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ptkp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `nip`, `jabatan`, `ptkp`) VALUES
(3, 'Putra', '123', 'Manager', 'PTKP-1'),
(4, 'Putri', '456', 'Senior Manager', 'PTKP-2'),
(5, '44', '33', '22', '11'),
(6, '2', '3', '4', '5'),
(7, '1', '1', '1', '1'),
(8, '10', '11', '12', '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `pajak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `pajak`) VALUES
(1, 'Pajak-1'),
(2, 'Pajak-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persentase`
--

CREATE TABLE `persentase` (
  `id_persentase` int(11) NOT NULL,
  `persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `persentase`
--

INSERT INTO `persentase` (`id_persentase`, `persentase`) VALUES
(1, 10),
(2, 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pajak`
--
ALTER TABLE `data_pajak`
  ADD PRIMARY KEY (`id_data_pajak`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pajak` (`id_pajak`),
  ADD KEY `id_persentase` (`id_persentase`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indeks untuk tabel `persentase`
--
ALTER TABLE `persentase`
  ADD PRIMARY KEY (`id_persentase`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pajak`
--
ALTER TABLE `data_pajak`
  MODIFY `id_data_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `persentase`
--
ALTER TABLE `persentase`
  MODIFY `id_persentase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pajak`
--
ALTER TABLE `data_pajak`
  ADD CONSTRAINT `data_pajak_ibfk_1` FOREIGN KEY (`id_persentase`) REFERENCES `persentase` (`id_persentase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pajak_ibfk_2` FOREIGN KEY (`id_pajak`) REFERENCES `pajak` (`id_pajak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pajak_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
