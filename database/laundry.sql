-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 05.12
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki_laki','perempuan') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `keterangan` enum('member','non_member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_cust`, `nama`, `username`, `password`, `alamat`, `jenis_kelamin`, `telepon`, `keterangan`) VALUES
(14, 'Angga CP', 'angga12', '1234', 'Kesamben', 'perempuan', '08123456789', 'non_member'),
(15, 'Angga', 'anggacp', '1234', 'Wates', 'laki_laki', '08123456788', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_order` varchar(20) NOT NULL,
  `hidden` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `membership`
--

CREATE TABLE `membership` (
  `id_cust` int(8) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `harga` int(10) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `verifikasi` enum('belum_diverifikasi','telah_diverifikasi') NOT NULL,
  `jenis_pembayaran` enum('dana','ovo','gopay') NOT NULL,
  `hidden` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `membership`
--

INSERT INTO `membership` (`id_cust`, `tgl_bayar`, `foto`, `harga`, `total_bayar`, `verifikasi`, `jenis_pembayaran`, `hidden`) VALUES
(15, '2021-12-20', '20122021062730laundry.jpg', 100000, 100000, 'telah_diverifikasi', 'dana', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `datecreation` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `jenis`, `nama_paket`, `harga_paket`, `quantity`) VALUES
(1, 'Kering', 'Cuci Kering Pakaian Biasa', 12000, 2),
(2, 'Basah', 'Cuci Basah Pakaian Biasa', 10000, 3),
(3, 'Setrika', 'Cuci Setrika Pakaian Biasa', 14000, 4),
(4, 'Kering', 'Cuci Kering Bed Cover', 15000, 5),
(5, 'Basah', 'Cuci Basah Bed Cover', 13000, 6),
(6, 'Setrika', 'Cuci Setrika Bed Cover', 17000, 7),
(7, 'Kering', 'Cuci Kering Pakaian Jeans', 14000, 8),
(8, 'Basah', 'Cuci Basah Pakaian Jeans', 12000, 9),
(9, 'Setrika', 'Cuci Setrika Pakaian Jeans', 16000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_invoice` varchar(30) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `keterangan` enum('member','non_member') NOT NULL,
  `tanggal_order` varchar(20) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('laundry_belum_diterima','laundry_telah_diterima','laundry_diproses','laundry_selesai','laundry_telah_dikirim') NOT NULL,
  `jenis_pengiriman` enum('kirim_sendiri','paket_diambil_kurir') NOT NULL,
  `jenis_pembayaran` enum('dana','ovo','gopay') NOT NULL,
  `foto` varchar(250) NOT NULL,
  `hidden` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('admin','kasir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `role`) VALUES
(1, 'Hadi', 'hadi', '12345', 'admin'),
(3, 'Budi', 'budi', '1234', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_cust` (`id_cust`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `customer` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
