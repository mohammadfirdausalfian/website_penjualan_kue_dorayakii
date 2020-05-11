-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jun 2017 pada 05.53
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorayaki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `stok_barang` int(5) NOT NULL,
  `ROP` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `stok_barang`, `ROP`) VALUES
('D-01', 'Tepung Terigu', 150, 0),
('D-02', 'Telur', 996, 0),
('D-03', 'Gula Pasir', 800, 0),
('D-04', 'Coklat', 900, 0),
('D-05', 'Dorayaki', 998, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_barang`
--

CREATE TABLE `pesan_barang` (
  `kode_pesan_barang` int(5) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `banyak_barang` int(5) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `status_barang` varchar(15) NOT NULL,
  `status_pengiriman` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_barang`
--

INSERT INTO `pesan_barang` (`kode_pesan_barang`, `nama_supplier`, `nama_barang`, `banyak_barang`, `tgl_pesan`, `tgl_terima`, `status_barang`, `status_pengiriman`) VALUES
(4, 'Supplier Tepung', 'Tepung Terigu', 500, '2017-06-23', '2017-06-28', 'Tersedia', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_online`
--

CREATE TABLE `pesan_online` (
  `kode_pesan` int(5) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `telp_pemesan` varchar(15) NOT NULL,
  `banyak_pesan` int(2) NOT NULL,
  `total_biaya` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_online`
--

INSERT INTO `pesan_online` (`kode_pesan`, `nama_pemesan`, `alamat_pemesan`, `telp_pemesan`, `banyak_pesan`, `total_biaya`, `status`) VALUES
(1, 'Frans Feby', 'JL.Taman Karya', '082297012019', 1, 7000, 'Terkirim'),
(2, 'Frans', 'JL.D', '12', 1, 7000, 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(5) NOT NULL,
  `supplier_nama` varchar(20) NOT NULL,
  `supplier_alamat` text NOT NULL,
  `supplier_nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_nohp`) VALUES
(1, 'Supplier Tepung', 'JL. Taman Karya', '082114814437'),
(2, 'Supplier Telur', 'JL. Swakarya', '082114814438'),
(3, 'Supplier Coklat', 'JL. Tuah Karya', '082114814439'),
(5, 'Supplier Gula', 'JL. Suka Karya', '082114814440');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level_user` int(3) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level_user`, `foto`) VALUES
('admin', 'admin', 1, ''),
('customer', 'customer', 3, ''),
('supplier', 'supplier', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pesan_barang`
--
ALTER TABLE `pesan_barang`
  ADD PRIMARY KEY (`kode_pesan_barang`);

--
-- Indexes for table `pesan_online`
--
ALTER TABLE `pesan_online`
  ADD PRIMARY KEY (`kode_pesan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan_barang`
--
ALTER TABLE `pesan_barang`
  MODIFY `kode_pesan_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan_online`
--
ALTER TABLE `pesan_online`
  MODIFY `kode_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
