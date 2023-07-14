-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaPCS` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_transaksi`, `id_produk`, `nama_produk`, `jumlah`, `hargaPCS`, `total`, `tanggal`) VALUES
(56, 61, 13, 'sunlight', 1, 5000, 5000, '2022-11-03'),
(57, 61, 7, 'Aqua Dus', 3, 27500, 82500, '2022-11-03'),
(58, 61, 9, 'sabun mandi detol', 2, 23000, 46000, '2022-11-03'),
(68, 65, 7, 'Aqua Dus', 2, 27500, 55000, '2022-11-03'),
(69, 66, 8, 'susu ultramilk', 60, 12000, 720000, '2022-11-03'),
(70, 71, 12, 'Molto', 1, 5000, 5000, '2022-11-16'),
(71, 73, 12, 'Molto', 2, 5000, 10000, '2022-11-18'),
(72, 73, 6, 'minyak goreng bimoli', 1, 15000, 15000, '2022-11-18'),
(73, 74, 10, 'shampo pantene', 2, 23000, 46000, '2022-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `terakhir_direstok` varchar(50) NOT NULL,
  `barang_terjual` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `terakhir_direstok`, `barang_terjual`, `deskripsi`, `foto`) VALUES
(4, 'sabun lifebuoy cair', 12500, 41, '0000-00-00', 9, 'sabun lifebuoy cair dapat membunuh kuman hingga 95%, kini tersedia dengan kemasan lebih besar, 25% lebih hemat lohh, ayo buruan sebelum kehabisan', 'sabun lifebuoy cair-lifebuoy.jpg'),
(5, 'pasta gigi close up', 7000, 60, '0000-00-00', 0, 'close up membuat harimu menjadi lebih menyenangkan, dengan ekstrak bawang goreng yang dapat membuat mulut anda lebih wangi dengan kemasan super elegan, buruan beli sebelum kehabisan', 'pasta gigi close up-close up.jpg'),
(6, 'minyak goreng bimoli', 15000, 41, '0000-00-00', 3, 'dengan bimoli, memasak menjadi lebih mudah dan menyehatkan. kini tersedia dengan kemasan lebih besar', 'minyak goreng bimoli-bimoli.jpg'),
(7, 'Aqua Dus', 27500, 45, '0000-00-00', 5, 'minum putih sangat menyehatkan bagi tubuh, jika kesulitan dalam membawa air putih, aqua solusinya, beli banyak hemat banyak', 'Aqua Dus-aqua.jpg'),
(8, 'susu ultramilk', 12000, 42, '0000-00-00', 68, 'susu ultramilk terjaga kemurniannya, agar badan menjadi lebih segar dan lebih fit dalam menjalani hari. ', 'susu ultramilk-susu ultra milk.jpg'),
(9, 'sabun mandi detol', 23000, 58, '0000-00-00', 2, 'detol, sabun mandi sekaligus bisa digunakan untuk membersihkan luka agar tidak terkena infeksi. tersedia dalam kemasan botolan, dapat membunuh kuman hingga 99%', 'sabun mandi detol-detol.jpg'),
(10, 'shampo pantene', 23000, 45, '2022-12-05', 2, 'shampo penghilang ketombe paling ampuh, dan dapat menghilangkan minyak berlebihan dikepala, kemasan lebih hemat 10% dengan desain yang elegan agar mudah untuk dipegang', 'shampo pantene-pantene.png'),
(11, 'Daia', 4500, 68, '0000-00-00', 0, 'Daia detergen, dapat menghilangkan noda dalam sekali bilas, warna tidak luntur dan tangan tidak panas', 'Daia-daia.jpg'),
(12, 'Molto', 5000, 50, '2022-12-05', 10, 'molto, dengan semerbak bunga mawar membuat pakaian anda tidak bau seharian', 'Molto-molto.jpg'),
(13, 'sunlight', 5000, 44, '0000-00-00', 6, 'sunlight menghilangkan lemak bandel pada piring, membuat pekerjaan menjadi lebih cepat selesai', 'sunlight-sunlight-jeruk-nipis.jpg'),
(14, 'susu kaleng frisian flag putih', 20000, 40, '0000-00-00', 0, 'susu kaleng frisian flag putih, kemasan lebih besar 15%, hemat dan menyehatkan', 'susu kaleng frisian flag putih-susu kaleng putih.jpg'),
(15, 'susu sachet frisian flag putih', 2000, 65, '2022-12-05', 0, 'kemasan sachet membuat susu frisian flag lebih mudah dibawa keman saja', 'susu sachet frisian flag putih-susu sachet putih.jpg'),
(16, 'Indomie kuah', 3000, 150, '2022-12-05', 2, 'rasa  enak lezat dan bergizi', 'Indomie kuah-indomiekuah.jpg'),
(18, 'Tissue Paseo', 10000, 101, '05 December 2022', 8, 'bisa membersihkan  debu dan kotoran ', 'Tissue Paseo-paseo.jpg'),
(19, 'Miee yum yum', 4500, 100, '2022-12-05', 0, 'rasakan sensasi makan mie dengan udang', 'Miee yum yum-yum yum.jpg'),
(20, 'Sarimi Goreng', 3000, 150, '2022-12-05', 0, 'Sarimen pergi ke pasar', 'Sarimi Goreng-sarimi.jpg'),
(21, 'Indomie', 3000, 200, '2022-12-05', 0, 'belilah indomie goreng karena enak', 'Indomie-susu ultra milk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `hargaPCS` int(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `total_kes` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uang_cash` int(100) NOT NULL,
  `kembalian` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `nama_produk`, `hargaPCS`, `jumlah`, `total`, `total_kes`, `tanggal`, `uang_cash`, `kembalian`) VALUES
(60, 13, 'sunlight', 5000, 5, 25000, 25000, '2022-11-03', 25000, 0),
(61, 6, 'minyak goreng bimoli', 15000, 2, 30000, 163500, '2022-11-03', 170000, 6500),
(65, 12, 'Molto', 5000, 5, 25000, 0, '2022-11-03', 100000, 20000),
(66, 4, 'sabun lifebuoy cair', 12500, 2, 25000, 745000, '2022-11-03', 800000, 55000),
(67, 12, 'Molto', 5000, 2, 10000, 10000, '2022-11-04', 12000, 2000),
(71, 16, 'Indomie kuah', 3000, 2, 6000, 11000, '2022-11-16', 15000, 4000),
(72, 4, 'sabun lifebuoy cair', 12500, 7, 87500, 0, '2022-11-16', 0, 0),
(73, 18, 'Tissue Paseo', 10000, 3, 30000, 55000, '2022-11-18', 60000, 5000),
(74, 18, 'Tissue Paseo', 10000, 3, 30000, 76000, '2022-11-26', 80000, 4000),
(75, 18, 'Tissue Paseo', 10000, 2, 20000, 20000, '2022-12-05', 30000, 10000),
(77, 8, 'susu ultramilk', 12000, 8, 96000, 0, '2022-12-05', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
