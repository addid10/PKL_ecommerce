-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 03:55 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_sub_kategori` int(11) DEFAULT NULL,
  `nama_barang` varchar(90) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `keterangan` varchar(10000) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `merk_barang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_sub_kategori`, `nama_barang`, `harga`, `keterangan`, `foto`, `merk_barang`) VALUES
(1, 1, 'Kertas', 5000, 'Kertas Tahan Api', '829203946.jpg', 'Sinar Dunia'),
(3, 1, 'Pulpen', 5000, 'Pulpen Berapi', '1034607081.jpg', 'Pilot'),
(4, 4, 'Spidol Permanen', 12000, 'Siap mengukir masa lalu yang bahagia.', '1237463344.jpg', 'Snowman');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id_cart` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id_cart`, `id_barang`, `kuantitas`, `tgl_dibuat`, `id_users`) VALUES
(1, 1, 1, '2018-10-16', 9),
(3, 3, 1, '2018-10-16', 9);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_pembelian`
--

CREATE TABLE `detail_transaksi_pembelian` (
  `id_transaksi_pembelian` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi_pembelian`
--

INSERT INTO `detail_transaksi_pembelian` (`id_transaksi_pembelian`, `id_barang`, `harga`, `jumlah`) VALUES
(1, 1, 5000, 1),
(1, 3, 5000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'ATK'),
(2, 'Brankas');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `pesan` varchar(5000) DEFAULT NULL,
  `subjek` varchar(20) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `pesan`, `subjek`, `nama`, `email`) VALUES
(5, 'Bismillah ', 'Bismillah', 'Edo', 'siday95@yahoo.com'),
(6, 'Melampiaskan namun ku hanyalah sendiri di sini', 'Ingin marah', 'Adit', 'mujaddidkenzz@yahoo.'),
(7, 'Yak begitulah!?!', 'Ingin pintar', 'Dela', 'deamanda.raralita.7@');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_transaksi_pembelian` int(11) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `review` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_transaksi_pembelian`, `rating`, `review`) VALUES
(1, 1, 5, 'Pelayanan baik, kecepatan pengiriman baik, penjual merespon dengan cepat, barang sampai dengan baik, performa barang sangat bagus, kualitas original.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `sub_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `id_kategori`, `sub_kategori`) VALUES
(1, 1, 'Kertas'),
(2, 1, 'Pulpen'),
(3, 1, 'Pensil'),
(4, 1, 'Spidol'),
(5, 2, 'Brankas Kecil'),
(6, 2, 'Brankas Sedang'),
(7, 2, 'Brankas Besar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_transaksi_pembelian` int(11) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `total_barang` int(11) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `status_barang` varchar(13) DEFAULT NULL,
  `status_beli` varchar(10) DEFAULT NULL,
  `waktu_transaksi` time DEFAULT NULL,
  `waktu_kirim` time DEFAULT NULL,
  `waktu_batal` time DEFAULT NULL,
  `status_notifikasi` int(1) DEFAULT NULL,
  `status_baca` int(1) DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `tanggal_batal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id_transaksi_pembelian`, `tanggal_transaksi`, `id_users`, `total_barang`, `total_harga`, `status_barang`, `status_beli`, `waktu_transaksi`, `waktu_kirim`, `waktu_batal`, `status_notifikasi`, `status_baca`, `tanggal_kirim`, `tanggal_batal`) VALUES
(1, '2018-09-30', 1, 4, 20000, 'Ambil Sendiri', 'Terbayar', '13:23:44', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `status_aktif` int(1) DEFAULT NULL,
  `random_token` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `username`, `email`, `password`, `remember_token`, `tgl_dibuat`, `status_aktif`, `random_token`) VALUES
(1, 1, 'rezky', 'rezky@gmail.com', '$2y$10$UIurngMtsjk1yjA2TZtst.wUgya82VgWjt1ZL3t4RGAQfofsN.3GK', 'jewm69', '2018-09-25', 1, NULL),
(2, 2, 'wiwi', 'wichan@gmail.com', '$2y$10$UIurngMtsjk1yjA2TZtst.wUgya82VgWjt1ZL3t4RGAQfofsN.3GK', 'xxxxx', '2018-10-05', 1, NULL),
(5, 2, 'aditya', 'dirsetiawan@gmail.com', '$2y$10$dn1C2Oc6NimuoeJtgxJj3eOfqu1eXvHd8ccEGJhr85WPuY.WEwmrC', 'JxHwIR', '2018-10-06', 0, 'MnrdiuoLRY08'),
(9, 2, 'atalie', 'drawmylife.unicorn@gmail.com', '$2y$10$EW6I0Gml1JNBxpcZH3gBzOZPX0afdn9vkOx.tYD0oQGV4s9xylVVe', 'OLyKRE', '2018-10-08', 1, NULL),
(10, 2, 'winartochandra', 'winarto2103@gmail.com', '$2y$10$uGzKPZP.rn84Lf60eoRF/eQgnXrap4UQ8y4mKAS0Uk1CH481saY/2', 'y9OVPF', '2018-10-12', 1, 'upJy3WYzgDRs');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id_users` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nama_users` varchar(50) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id_users`, `id`, `nama_users`, `telepon`, `alamat`, `foto`, `jenis_kelamin`) VALUES
(1, 1, 'Rezky Aditya', '082255999499', 'Banjarmasin Selatan', 'default.jpg', 'L'),
(2, 9, 'Atalie H. Larisa', '082255999499', 'Jl. Darmawangsa', '951779637.jpg', 'P'),
(3, 10, 'Winarto Chandra', '082255999499', 'Jl.', '27251414.jpg', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_sub_kategori` (`id_sub_kategori`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `detail_transaksi_pembelian`
--
ALTER TABLE `detail_transaksi_pembelian`
  ADD KEY `id_transaksi_pembelian` (`id_transaksi_pembelian`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_transaksi_pembelian` (`id_transaksi_pembelian`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_transaksi_pembelian`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_transaksi_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kategori` (`id_sub_kategori`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `cart_item_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_transaksi_pembelian`
--
ALTER TABLE `detail_transaksi_pembelian`
  ADD CONSTRAINT `detail_transaksi_pembelian_ibfk_1` FOREIGN KEY (`id_transaksi_pembelian`) REFERENCES `transaksi_pembelian` (`id_transaksi_pembelian`),
  ADD CONSTRAINT `detail_transaksi_pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_transaksi_pembelian`) REFERENCES `transaksi_pembelian` (`id_transaksi_pembelian`);

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD CONSTRAINT `transaksi_pembelian_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
