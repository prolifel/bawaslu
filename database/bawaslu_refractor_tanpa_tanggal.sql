-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 11:21 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bawaslu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(0, 'admin', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.', 'saiful@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id` int NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `title`) VALUES
(1, 'Koordinator'),
(2, 'Humas'),
(3, 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `kegiatan` CHANGE `tanggal` `tanggal` DATE NOT NULL;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `tanggal`, `deskripsi`, `image`, `divisi`) VALUES
(1, 'kawin bersama', '2021-05-03', 'test deskripsi 1', '20180511_090122.jpg', 'Koordinator'),
(2, 'naikin janda', '2021-05-03', 'test deskripsi 2', '20190605_094059.jpg', 'Humas'),
(3, 'apapun itu', '2021-05-04', 'test deskripsi 3', 'default.jpg', 'Humas'),
(4, 'mengais sampah', '2021-05-05','test deskripsi 4',  'default.jpg', 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `divisi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `telepon`, `email`, `nama`, `password`, `divisi`) VALUES
(0, '082334029789', 'ssaifullanam99@gmail.com', 'saiful anam', '$2y$10$A2AjrnchJg9WmpQ83aYQuOoztpMgQz2bFMotWSfVPrJKEBxs6w1m6', 'Koordinator'),
(1, '0823340297890', 'herman@gmail.com', 'herman jordan', '$2y$10$rTUQ9LA1lLkAOwECjT2h1uzWi5mWJw6/2z/kMBDfiC3ifynZnMEiK', 'Humas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
