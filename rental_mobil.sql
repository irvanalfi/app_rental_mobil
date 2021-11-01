-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 07:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1=sudah dilihan, 0=belum di lihat',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id_fitur` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `hrg_supir` int(11) NOT NULL,
  `supir` int(1) NOT NULL,
  `ac` int(1) NOT NULL,
  `seat_belt` int(1) NOT NULL,
  `air` int(1) NOT NULL,
  `p3k` int(1) NOT NULL,
  `audio_input` int(1) NOT NULL,
  `mp3_player` int(1) NOT NULL,
  `bluetooth` int(1) NOT NULL,
  `vidio` int(1) NOT NULL,
  `central_lock` int(1) NOT NULL,
  `ban_serep` int(1) NOT NULL,
  `car_kit` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id_fitur`, `id_mobil`, `hrg_supir`, `supir`, `ac`, `seat_belt`, `air`, `p3k`, `audio_input`, `mp3_player`, `bluetooth`, `vidio`, `central_lock`, `ban_serep`, `car_kit`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, 6, 300000, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, NULL, 0, 0),
(2, 9, 300000, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 0, 0),
(3, 10, 300000, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, NULL, NULL, 0, 0),
(4, 13, 300000, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, NULL, NULL, 0, 0),
(5, 14, 300000, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, NULL, NULL, 0, 0),
(6, 15, 300000, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `merek` varchar(120) NOT NULL,
  `no_plat` varchar(20) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `transmisi` varchar(20) DEFAULT NULL,
  `jmlh_kursi` varchar(20) DEFAULT NULL,
  `bagasi` varchar(20) DEFAULT NULL,
  `bbm` varchar(20) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `km` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_tipe`, `merek`, `no_plat`, `warna`, `transmisi`, `jmlh_kursi`, `bagasi`, `bbm`, `tahun`, `km`, `status`, `harga`, `denda`, `gambar`, `detail`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(6, 0, 'Toyota Camry', 'B 1446 DAG', 'Hitam', 'Manual', '7 Dewasa', '3 Ransel', 'Pertalite', 2015, 21000, 1, 400000, 30000, 'toyota-camry.jpg', '', '2021-09-30 19:20:55', NULL, 0, 0),
(9, 0, 'Honda City', 'B 1456 DAG', 'Hitam', 'Manual', '7 Dewasa', '3 Ransel', 'Pertamax', 2015, 11860, 0, 450000, 30000, 'honda-city.jpg', '', '2021-09-30 19:20:55', NULL, 0, 0),
(10, 0, 'CRV', 'B 1234 csh', 'Silver', 'Matic', '7 Dewasa', '4 Ransel', 'Pertalite', 2019, 34000, 0, 400000, 100000, 'gallery_used-car-mobil123-honda-cr-v-2_4.jpg', '', '2021-09-30 19:20:55', NULL, 0, 0),
(13, 0, 'Toyota Avanza', 'B 2245 DAM', 'Hitam', 'Manual', '7 Dewasa', '4 Ransel', 'Pertamax', 2015, 25640, 1, 350000, 25000, 'avanza-hitam.jpg', '', '2021-09-30 19:20:55', NULL, 0, 0),
(14, 0, 'Toyota Avanza', 'B 1123 DUD', 'Putih', 'Matic', '7 Dewasa', '4 Ransel', 'Pertalite', 2016, 40020, 1, 350000, 25000, 'avanza-putih.jpg', '', '2021-09-30 19:20:55', NULL, 0, 0),
(15, 0, 'Toyota Hiace', 'P 1234 UI', 'Silver', 'Manual', '10 Dewasa', '8 Koper', 'Solar', 2015, 19762, 1, 700000, 100000, 'car-300921-b3bd9ca18c.jpg', 'kdfjkls akdjfa skdjf ladkljf klsajfkla klsdfjkla lsdkjflas lkjfskld', '2021-09-30 21:44:05', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `review` text NOT NULL,
  `star` int(2) NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1 = tampil, 0 = tidak tampil',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, 'SDN', 'Sedan', '2021-09-30 19:21:47', NULL, 0, 0),
(3, 'MNV', 'Mini Van', '2021-09-30 19:21:47', NULL, 0, 0),
(4, 'ELF', 'Elef', '2021-09-30 21:40:39', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` int(11) NOT NULL,
  `total_denda` varchar(120) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(120) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_user`, `id_mobil`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_denda`, `tgl_pengembalian`, `status_pengembalian`, `status_rental`, `bukti_pembayaran`, `status_pembayaran`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(3, 6, 9, '2021-01-15', '2021-01-16', '450000', 30000, '120000', '2021-01-20', 'Belum Kembali', 'Belum Selesai', '', 0, NULL, NULL, 0, 0),
(4, 6, 6, '2021-01-15', '2021-01-18', '400000', 30000, '60000', '2021-01-20', 'Kembali', 'Selesai', 'tugas.png', 1, NULL, NULL, 0, 0),
(5, 8, 10, '2021-01-18', '2021-01-19', '400000', 100000, '100000', '2021-01-20', 'Belum Kembali', 'Belum Selesai', '', 0, NULL, NULL, 0, 0),
(6, 6, 11, '2021-01-28', '2021-01-30', '300000', 25000, '25000', '2021-01-31', 'Kembali', 'Selesai', 'tugas2.png', 1, NULL, NULL, 0, 0),
(7, 9, 13, '2021-01-30', '2021-02-01', '350000', 25000, '25000', '2021-02-02', 'Kembali', 'Selesai', 'tugas2.png', 1, NULL, NULL, 0, 0),
(8, 4, 14, '2021-09-17', '2021-09-19', '350000', 25000, '75000', '2021-09-22', 'Kembali', 'Selesai', '', 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 = Admin, 2 = Customer',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `alamat`, `gender`, `no_telepon`, `no_ktp`, `password`, `role`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(4, 'Joko Santoso', 'joko', 'Jl. Satu Pekanbaru', 'laki-laki', '0653246512', '215654532767', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 19:23:12', NULL, 0, 0),
(5, 'Darmawan', 'darmawan', 'Jl. Dua Pekanbaru', 'laki-laki', '07617623', '1423477324723', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 19:23:12', NULL, 0, 0),
(6, 'Andi', 'andi', 'Jakarta', 'laki-laki', '0217687634', '12747657463', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2021-09-30 19:23:12', NULL, 0, 0),
(7, 'Arif', 'admin', 'Pekanbaru', 'laki-laki', '065423624', '1764578345', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-09-30 19:23:12', NULL, 0, 0),
(8, 'Bayu', 'bayu', 'Jl. Nangka Pekanbaru', 'laki-laki', '07612233', '14000756764735', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 19:23:12', NULL, 0, 0),
(9, 'Toni', 'toni', 'Bandung', 'laki-laki', '0835653243', '1753453265435', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 19:23:12', NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id_fitur`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
