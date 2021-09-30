-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2021 pada 17.20
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1=sudah dilihan, 0=belum di lihat',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `alamat`, `gender`, `no_telepon`, `no_ktp`, `password`, `role_id`, `created`, `updated`) VALUES
(4, 'Joko Santoso', 'joko', 'Jl. Satu Pekanbaru', 'laki-laki', '0653246512', '215654532767', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 12:23:12', NULL),
(5, 'Darmawan', 'darmawan', 'Jl. Dua Pekanbaru', 'laki-laki', '07617623', '1423477324723', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 12:23:12', NULL),
(6, 'Andi', 'andi', 'Jakarta', 'laki-laki', '0217687634', '12747657463', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2021-09-30 12:23:12', NULL),
(7, 'Arif', 'admin', 'Pekanbaru', 'laki-laki', '065423624', '1764578345', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-09-30 12:23:12', NULL),
(8, 'Bayu', 'bayu', 'Jl. Nangka Pekanbaru', 'laki-laki', '07612233', '14000756764735', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 12:23:12', NULL),
(9, 'Toni', 'toni', 'Bandung', 'laki-laki', '0835653243', '1753453265435', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2021-09-30 12:23:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
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
  `hrg_supir` int(11) NOT NULL,
  `sopir` int(11) DEFAULT NULL COMMENT 'status lepas kunci/tidak',
  `ac` int(11) DEFAULT NULL,
  `seat_belt` int(11) DEFAULT NULL,
  `air` int(11) DEFAULT NULL,
  `p3k` int(11) DEFAULT NULL,
  `audio_input` int(11) DEFAULT NULL,
  `mp3_player` int(11) DEFAULT NULL,
  `bluethooth` int(11) DEFAULT NULL,
  `vidio` int(11) DEFAULT NULL,
  `central_lock` int(11) DEFAULT NULL,
  `ban_serep` int(11) DEFAULT NULL,
  `car_kit` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `kode_tipe`, `merek`, `no_plat`, `warna`, `transmisi`, `jmlh_kursi`, `bagasi`, `bbm`, `tahun`, `km`, `status`, `harga`, `denda`, `hrg_supir`, `sopir`, `ac`, `seat_belt`, `air`, `p3k`, `audio_input`, `mp3_player`, `bluethooth`, `vidio`, `central_lock`, `ban_serep`, `car_kit`, `gambar`, `detail`, `created`, `updated`) VALUES
(6, 'SDN', 'Toyota Camry', 'B 1446 DAG', 'Hitam', 'Manual', '7 Dewasa', '3 Ransel', 'Pertalite', 2015, 21000, 1, 400000, 30000, 300000, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 'toyota-camry.jpg', '', '2021-09-30 12:20:55', NULL),
(9, 'SDN', 'Honda City', 'B 1456 DAG', 'Hitam', 'Manual', '7 Dewasa', '3 Ransel', 'Pertamax', 2015, 11860, 0, 450000, 30000, 300000, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'honda-city.jpg', '', '2021-09-30 12:20:55', NULL),
(10, 'SDN', 'CRV', 'B 1234 csh', 'Silver', 'Matic', '7 Dewasa', '4 Ransel', 'Pertalite', 2019, 34000, 0, 400000, 100000, 300000, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 'gallery_used-car-mobil123-honda-cr-v-2_4.jpg', '', '2021-09-30 12:20:55', NULL),
(13, 'MNV', 'Toyota Avanza', 'B 2245 DAM', 'Hitam', 'Manual', '7 Dewasa', '4 Ransel', 'Pertamax', 2015, 25640, 1, 350000, 25000, 300000, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 'avanza-hitam.jpg', '', '2021-09-30 12:20:55', NULL),
(14, 'MNV', 'Toyota Avanza', 'B 1123 DUD', 'Putih', 'Matic', '7 Dewasa', '4 Ransel', 'Pertalite', 2016, 40020, 1, 350000, 25000, 300000, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 'avanza-putih.jpg', '', '2021-09-30 12:20:55', NULL),
(15, 'ELF', 'Toyota Hiace', 'P 1234 UI', 'Silver', 'Manual', '10 Dewasa', '8 Koper', 'Solar', 2015, 19762, 1, 700000, 100000, 300000, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'car-300921-b3bd9ca18c.jpg', 'kdfjkls akdjfa skdjf ladkljf klsajfkla klsdfjkla lsdkjflas lkjfskld', '2021-09-30 14:44:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental`
--

CREATE TABLE `rental` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` varchar(120) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `review` text NOT NULL,
  `star` int(2) NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1 = tampil, 0 = tidak tampil',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`, `created`, `updated`) VALUES
(1, 'SDN', 'Sedan', '2021-09-30 12:21:47', NULL),
(3, 'MNV', 'Mini Van', '2021-09-30 12:21:47', NULL),
(4, 'ELF', 'Elef', '2021-09-30 14:40:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
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
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_mobil`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_denda`, `tgl_pengembalian`, `status_pengembalian`, `status_rental`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(3, 6, 9, '2021-01-15', '2021-01-16', '450000', 30000, '120000', '2021-01-20', 'Belum Kembali', 'Belum Selesai', '', 0),
(4, 6, 6, '2021-01-15', '2021-01-18', '400000', 30000, '60000', '2021-01-20', 'Kembali', 'Selesai', 'tugas.png', 1),
(5, 8, 10, '2021-01-18', '2021-01-19', '400000', 100000, '100000', '2021-01-20', 'Belum Kembali', 'Belum Selesai', '', 0),
(6, 6, 11, '2021-01-28', '2021-01-30', '300000', 25000, '25000', '2021-01-31', 'Kembali', 'Selesai', 'tugas2.png', 1),
(7, 9, 13, '2021-01-30', '2021-02-01', '350000', 25000, '25000', '2021-02-02', 'Kembali', 'Selesai', 'tugas2.png', 1),
(8, 4, 14, '2021-09-17', '2021-09-19', '350000', 25000, '75000', '2021-09-22', 'Kembali', 'Selesai', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rental`
--
ALTER TABLE `rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
