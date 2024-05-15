-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 12:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` int(5) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `stok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
(1, 'Cascara.png', 'Cascara', 'Minuman Fermentasi Dari Kulit Kopi', 3, '10000', '20'),
(2, 'Cold Brew.png', 'Cold Brew', 'Fermentasi Kopi', 3, '15000', '15'),
(3, 'Guava Drink.png', 'Guava Drink', 'Minuman Segar Rasa Jambu ', 2, '12000', '12'),
(4, 'Vasilikos Bery.png', 'Vasilikos Bery', 'Minuman Tea Based Dengan Varian Teh Telang Lalu Di Campur Dengan Beberapa Sirup', 2, '20000', '21'),
(5, 'Americano.png', 'Americano', 'minuman kopi yang berasal dari Italia, tetapi namanya sendiri berasal dari Amerika Serikat. Minuman ini dibuat dengan menambahkan air panas ke dalam espresso, sehingga menciptakan minuman kopi yang le', 1, '14000', '15'),
(6, 'Chocolate Drink.png', 'Chocolate Drink', 'Es Chocolate Drink', 2, '18000', '21'),
(7, 'Chicken Katsu.png', 'Chicken Katsu', 'hidangan khas Jepang yang terdiri dari potongan daging ayam yang dilapisi dengan tepung roti (breadcrumbs) dan digoreng hingga renyah', 4, '20000', '10'),
(8, 'Chicken Pop.png', 'Chicken Pop', 'idangan yang terdiri dari potongan daging ayam yang dipotong kecil-kecil dan dilapisi dengan adonan berbumbu sebelum digoreng hingga renyah', 4, '21000', '11'),
(11, '48018-cascara.jpg', 'Cascara Drink', 'Minuman Fermentasi', 3, '25000', '100');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` char(10) NOT NULL,
  `nama_kasir` varchar(30) DEFAULT NULL,
  `id_meja` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kat_menu` int(11) NOT NULL,
  `jenis_menu` int(1) NOT NULL,
  `kategori_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Coffee'),
(2, 1, 'Non-Coffee'),
(3, 1, 'Fermented '),
(4, 2, 'Main Cours'),
(5, 2, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `meja_user`
--

CREATE TABLE `meja_user` (
  `id_meja` char(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `status_meja` varchar(20) DEFAULT NULL,
  `id_kasir` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` char(10) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `id_meja` char(10) NOT NULL,
  `total_produk` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
(1, 'Owner', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '1234567891011', NULL),
(2, 'Abc1', 'abc1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '1234567891011', NULL),
(3, 'Abc2', 'abc2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '1234567891011', NULL),
(4, 'Abc3', 'abc3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '1234567891011', NULL),
(5, 'aku', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456432', 'kamu'),
(6, 'kmau', 'kuni@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '1235675432', 'kmauuiiii');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kat_menu`);

--
-- Indexes for table `meja_user`
--
ALTER TABLE `meja_user`
  ADD PRIMARY KEY (`id_meja`),
  ADD KEY `id_kair` (`id_kasir`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kat_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD CONSTRAINT `daftar_menu_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_menu` (`id_kat_menu`) ON UPDATE CASCADE;

--
-- Constraints for table `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja_user` (`id_meja`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `meja_user`
--
ALTER TABLE `meja_user`
  ADD CONSTRAINT `meja_user_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `id_meja` FOREIGN KEY (`id_meja`) REFERENCES `meja_user` (`id_meja`),
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
