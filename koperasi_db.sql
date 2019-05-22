-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 05:02 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(45) DEFAULT NULL,
  `asal_daerah` varchar(45) DEFAULT NULL,
  `kelompok_kamar` varchar(45) DEFAULT NULL,
  `sisa_saldo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `asal_daerah`, `kelompok_kamar`, `sisa_saldo`) VALUES
(17, 'Agung Priyo Sembodo', 'Kalimantan Barat', 'Camat', 42500),
(18, 'Ahmad Yusuf', 'Makasar', 'Camat', 42500),
(19, 'Ahmad Noval Fahmi', 'Jakarta', 'Walikota', 42500),
(20, 'Alfin Adi Surya', 'Bangka Belitung', 'Gubernur', 42500),
(21, 'Ananda Syahdama', 'Bangka Belitung', 'Bupati', 42500),
(22, 'Ardelingga Pramesta Kusuma', 'Cirebon', 'Camat', 42500),
(23, 'Aripin', 'Sukabumi', 'Presiden', 42500);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `harga_barang` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `harga_jual`, `stok_barang`) VALUES
(2, 'Pepsodent', 4000, 4500, 20),
(4, 'Rinso Cair', 800, 1000, 21),
(5, 'Wafer Nabati', 1500, 2000, 20),
(6, 'Kopi ABC', 1000, 1500, 20),
(7, 'Sabun Ekonomi', 800, 1000, 20),
(8, 'Energen', 700, 1000, 20),
(9, 'Mie Gelas', 8000, 1000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `id_belanja` int(11) NOT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_belanja` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `belanja`
--

INSERT INTO `belanja` (`id_belanja`, `barang_id`, `jumlah`, `tanggal`, `total_belanja`) VALUES
(1, 4, 3, '2019-05-08', 3000);

--
-- Triggers `belanja`
--
DELIMITER $$
CREATE TRIGGER `tg_belanja` AFTER INSERT ON `belanja` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang+NEW.jumlah
    WHERE id_barang = NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kebutuhan`
--

CREATE TABLE `daftar_kebutuhan` (
  `id_daftar_kebutuhan` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah` varchar(45) DEFAULT NULL,
  `harga_satuan` varchar(45) DEFAULT NULL,
  `total_harga` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `daftar_kebutuhan`
--
DELIMITER $$
CREATE TRIGGER `tg_daftar_kebutuhan` AFTER INSERT ON `daftar_kebutuhan` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang-NEW.jumlah
    WHERE id_barang = NEW.barang_id;
    
    UPDATE anggota SET sisa_saldo=sisa_saldo-NEW.total_harga
    WHERE id_anggota = NEW.anggota_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`) VALUES
(2, 'Ali Akbar'),
(3, 'Rafly Dzikrul Hakim'),
(4, 'Farhan Rifqi Fauzi');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_uang`
--

CREATE TABLE `pinjam_uang` (
  `id_pinjam` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `simpan_id` int(11) DEFAULT NULL,
  `pinjam_id` int(11) DEFAULT NULL,
  `saldo_akhir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simpan_uang`
--

CREATE TABLE `simpan_uang` (
  `id_simpan` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` varchar(45) NOT NULL,
  `harga_satuan` varchar(45) NOT NULL,
  `total_harga` varchar(45) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `anggota_id`, `barang_id`, `jumlah`, `harga_satuan`, `total_harga`, `tanggal`, `petugas_id`) VALUES
(1, 17, 4, '2', '1000', '2000', '2019-05-15 02:51:05', 4);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tg_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang-NEW.jumlah
    WHERE id_barang = NEW.barang_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `fk_belanja_barang_idx` (`barang_id`);

--
-- Indexes for table `daftar_kebutuhan`
--
ALTER TABLE `daftar_kebutuhan`
  ADD PRIMARY KEY (`id_daftar_kebutuhan`),
  ADD KEY `fk_barang` (`barang_id`),
  ADD KEY `fk_anggota` (`anggota_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `id_petugas_UNIQUE` (`id_petugas`);

--
-- Indexes for table `pinjam_uang`
--
ALTER TABLE `pinjam_uang`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `id_pinjam_UNIQUE` (`id_pinjam`),
  ADD KEY `fk_anggota_idx` (`anggota_id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_simpan_saldo_idx` (`simpan_id`),
  ADD KEY `fk_pinjam_saldo_idx` (`pinjam_id`);

--
-- Indexes for table `simpan_uang`
--
ALTER TABLE `simpan_uang`
  ADD PRIMARY KEY (`id_simpan`),
  ADD UNIQUE KEY `id_simpan_UNIQUE` (`id_simpan`),
  ADD KEY `fk_anggota_idx` (`anggota_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_kebutuhan`
--
ALTER TABLE `daftar_kebutuhan`
  MODIFY `id_daftar_kebutuhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjam_uang`
--
ALTER TABLE `pinjam_uang`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simpan_uang`
--
ALTER TABLE `simpan_uang`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `fk_belanja_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `daftar_kebutuhan`
--
ALTER TABLE `daftar_kebutuhan`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id_anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam_uang`
--
ALTER TABLE `pinjam_uang`
  ADD CONSTRAINT `fk_anggota_pinjam` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id_anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_pinjam_saldo` FOREIGN KEY (`pinjam_id`) REFERENCES `pinjam_uang` (`id_pinjam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_simpan_saldo` FOREIGN KEY (`simpan_id`) REFERENCES `simpan_uang` (`id_simpan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `simpan_uang`
--
ALTER TABLE `simpan_uang`
  ADD CONSTRAINT `fk_anggota_simpan` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id_anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
