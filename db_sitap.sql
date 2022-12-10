-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2022 pada 05.50
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sitap`
--
CREATE DATABASE IF NOT EXISTS `db_sitap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sitap`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--
-- Pembuatan: 21 Agu 2022 pada 10.52
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `id_jasa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `id_pelanggan`, `id_transaksi`, `id_jasa`) VALUES
(1, '17460821', '010101', '01'),
(2, '17540825', '010201', '02'),
(3, '17580430', '010203', '03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--
-- Pembuatan: 20 Nov 2022 pada 07.17
--

DROP TABLE IF EXISTS `jasa`;
CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `gbr_produk` varchar(255) NOT NULL,
  `id_jasa` varchar(11) NOT NULL,
  `produk` enum('wifi','cctv','tarik_kbl','runtext','lainnya') NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `gbr_produk`, `id_jasa`, `produk`, `harga`) VALUES
(1, 'wifi.jpg', '01', 'wifi', '200000'),
(13, 'cctv.jpg', '02', 'cctv', '250000'),
(14, 'kbl optik.jpg', '03', 'tarik_kbl', '250000'),
(15, 'neon box.jpg', '04', 'runtext', 'sesuai ukuran');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kwitansi`
-- (Lihat di bawah untuk tampilan aktual)
--
DROP VIEW IF EXISTS `kwitansi`;
CREATE TABLE `kwitansi` (
`id` int(11)
,`id_pelanggan` varchar(11)
,`nama` varchar(50)
,`alamat` varchar(255)
,`no_tlp` varchar(13)
,`tgl_byr` date
,`mode_byr` enum('tunai','transfer')
,`jml_biaya` varchar(20)
,`pembayaran` enum('maintenence','pemasangan','penggantian')
,`produk` enum('wifi','cctv','tarik_kbl','runtext','lainnya')
,`harga` varchar(30)
,`status` enum('LUNAS','NUNGGAK','PROSES')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--
-- Pembuatan: 21 Agu 2022 pada 10.26
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_pelanggan`, `nama`, `alamat`, `no_tlp`) VALUES
(1, '17460821', 'Pralam Agustian Baskara', 'Jl Kedaung lama ciputat timur ciputat', '089765432012'),
(2, '17540825', 'Tengku Ibrahim', 'Pondok Ranji', '08976563547'),
(5, '17580430', 'Santika Rahmawati', 'Kunciran Mas Permai', '089765476543');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--
-- Pembuatan: 22 Agu 2022 pada 13.25
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lhr` varchar(45) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nm_lengkap`, `tgl_lahir`, `tempat_lhr`, `jk`, `no_telp`, `alamat`, `username`, `password`, `level`, `gambar`) VALUES
(1, 'muhamad mas`ud', '2000-01-04', 'Lampung', 'laki-laki', '089691344985', 'Jl KP Bulak Pondok Kacang Barat Pondok Aren Tangsel', 'masud', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', ''),
(2, 'pralam agustian', '1999-08-02', 'Palembang', 'laki-laki', '089765432012', 'Jl Kedaung Lama Ciputat, Ciputat Timur Ciputat', 'pralam', '6562c5c1f33db6e05a082a88cddab5ea', 'user', ''),
(3, 'tengku ibrahim', '1995-08-01', 'Jakarta', 'laki-laki', '08976563547', 'PONDOK RANJI', 'tengku', '81dc9bdb52d04dc20036dbd8313ed055', 'user', ''),
(4, 'santika rahmawati', '1997-10-07', 'Magelang', 'perempuan', '089765476543', 'Kunciran Mas Permai', 'santika', 'd93591bdf7860e1e4ee2fca799911215', 'user', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--
-- Pembuatan: 05 Des 2022 pada 12.53
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `tgl_langganan` date NOT NULL,
  `tgl_byr` date NOT NULL,
  `mode_byr` enum('tunai','transfer') NOT NULL,
  `jml_biaya` varchar(20) NOT NULL,
  `pembayaran` enum('maintenence','pemasangan','penggantian') NOT NULL,
  `status` enum('LUNAS','NUNGGAK','PROSES') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `tgl_langganan`, `tgl_byr`, `mode_byr`, `jml_biaya`, `pembayaran`, `status`) VALUES
(1, '010101', '2022-08-01', '2022-09-08', 'tunai', '200000', 'maintenence', 'LUNAS'),
(2, '010201', '2022-11-18', '2022-12-31', 'tunai', '200000', 'pemasangan', 'LUNAS'),
(10, '020101', '2022-11-19', '2022-12-20', 'transfer', '200000', 'maintenence', 'LUNAS'),
(11, '010203', '2022-11-19', '2022-11-30', 'tunai', '200000', 'pemasangan', 'NUNGGAK'),
(13, '0102', '2022-12-05', '2022-12-20', 'transfer', '200000', 'maintenence', 'PROSES');

-- --------------------------------------------------------

--
-- Struktur untuk view `kwitansi`
--
DROP TABLE IF EXISTS `kwitansi`;

DROP VIEW IF EXISTS `kwitansi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kwitansi`  AS SELECT `invoice`.`id` AS `id`, `pelanggan`.`id_pelanggan` AS `id_pelanggan`, `pelanggan`.`nama` AS `nama`, `pelanggan`.`alamat` AS `alamat`, `pelanggan`.`no_tlp` AS `no_tlp`, `transaksi`.`tgl_byr` AS `tgl_byr`, `transaksi`.`mode_byr` AS `mode_byr`, `transaksi`.`jml_biaya` AS `jml_biaya`, `transaksi`.`pembayaran` AS `pembayaran`, `jasa`.`produk` AS `produk`, `jasa`.`harga` AS `harga`, `transaksi`.`status` AS `status` FROM (((`invoice` join `pelanggan` on(`invoice`.`id_pelanggan` = `pelanggan`.`id_pelanggan`)) join `transaksi` on(`invoice`.`id_transaksi` = `transaksi`.`id_transaksi`)) join `jasa` on(`invoice`.`id_jasa` = `jasa`.`id_jasa`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_jasa` (`id_jasa`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jasa` (`id_jasa`),
  ADD KEY `gbr_produk` (`gbr_produk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`id_jasa`) REFERENCES `jasa` (`id_jasa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
