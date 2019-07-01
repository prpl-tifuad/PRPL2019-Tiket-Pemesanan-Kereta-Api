-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 11:18 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_kereta`
--

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `kode` int(11) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`kode`, `asal`, `tujuan`, `kelas`, `harga`, `tanggal`, `waktu`) VALUES
(1, 'jakarta', 'yogyakarta', 'Ekonomi', 40000, '2019-03-10', '17:30:00'),
(2, 'Solo', 'semarang', 'Eksklusif', 200000, '2019-02-11', '20:00:00'),
(3, 'yogyakarta', 'semarang', 'bisnis', 30000, '2019-05-30', '21:20:19'),
(4, 'jogja', 'jakarta', 'ekonomi', 900000, '2019-06-30', '17:05:00'),
(5, 'surakarta', 'jogja', 'vip', 80000, '2019-07-10', '16:07:00'),
(6, 'semarang', 'jakarta', 'ekonomi', 9000, '2019-07-11', '08:06:00'),
(7, 'jakarta', 'jogja', 'ekonomis', 7000, '2019-07-09', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `atas_nama` varchar(10) NOT NULL,
  `usia` int(3) NOT NULL,
  `no_kk` int(13) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jml_penumpang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `nama`, `atas_nama`, `usia`, `no_kk`, `no_hp`, `tgl_pesan`, `jml_penumpang`) VALUES
(1, 'Novian', 'ian', 19, 921308, 923812230, '2019-01-02', 1),
(2, 'Alif', 'AL', 17, 333200293, 85628329, '2019-05-25', 1),
(3, 'feni', 'sas', 20, 9567, 8976, '2019-05-14', 1),
(4, 'ai', 'ain', 20, 875343, 8932467, '2019-07-25', 2),
(5, 'poo', 'poi', 20, 8762, 8632, '2019-06-18', 1),
(6, 'pio', 'ani', 20, 78654526, 2147483647, '2019-07-03', 2),
(7, 'fila', 'ila', 21, 2147483647, 2147483647, '2019-07-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `asal` varchar(15) NOT NULL,
  `tujuan` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `jml_pesan` int(11) NOT NULL,
  `tot_bayar` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `tot_setdiskon` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no`, `asal`, `tujuan`, `kelas`, `harga`, `jml_pesan`, `tot_bayar`, `diskon`, `tot_setdiskon`, `bayar`, `kembalian`) VALUES
(2, 'jogja', 'jakarta', 'ekonomi', 20000, 2, 40000, 10, 36000, 55000, 15000),
(3, 'yogyakarta', 'semarang', 'bisnis', 30000, 2, 60000, 10, 54000, 100000, 40000),
(4, 'yogyakarta', 'surabaya', 'bisnis', 35000, 1, 35000, 10, 31500, 50000, 15000),
(5, 'jogja', 'malang', 'ekonomi', 2000, 2, 4000, 0, 4000, 6000, 2000),
(6, 'jakrata', 'jogja', 'ekonomi', 2000, 3, 6000, 10, 5400, 10000, 4000),
(7, 'jj', 'jj', 'jj', 12, 11, 0, 0, 0, 32, 32),
(8, 'jogja', '', '', 0, 0, 0, 0, 0, 0, 0),
(9, 'jakarta', 'jogja', 'ekonomi', 8000, 2, 16000, 0, 14400, 50000, 34000),
(10, 'jakarta', 'yogyakarta', 'ekonomi', 20000, 2, 40000, 0, 36000, 40000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ian', '$2y$10$x94NiDawUf8vbitjTn3STe7FYontP3xPCozuQxbn7NwKGvrpvdpsO'),
(2, '', '$2y$10$iISJhSSlKQZKDLCG6J7k1.o8ulA95izHppuyFc1hPS0hgRO1nxeEm'),
(3, 'ian', '$2y$10$PQqdOVEpaNGrfWRHa.M7RO295rewfzQnmSTKZ9dkvTZa.U8lXu0J6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
