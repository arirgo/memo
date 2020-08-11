-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 11:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `mengetahui` varchar(12) NOT NULL,
  `app1` varchar(12) NOT NULL,
  `app2` varchar(12) NOT NULL,
  `app3` varchar(12) NOT NULL,
  `app4` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memotable`
--

CREATE TABLE `memotable` (
  `id` int(11) NOT NULL,
  `mengetahui` varchar(12) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `hal` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `detail` text NOT NULL,
  `keterangan` text NOT NULL,
  `reg_memo` varchar(20) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `memotext`
--

CREATE TABLE `memotext` (
  `id` int(11) NOT NULL,
  `mengetahui` varchar(12) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `hal` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `detail` text NOT NULL,
  `keterangan` text NOT NULL,
  `reg_memo` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `mengetahui` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(12) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `section` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `level` varchar(12) NOT NULL,
  `flag` varchar(3) NOT NULL,
  `chek1` varchar(1) NOT NULL,
  `chek2` varchar(1) NOT NULL,
  `chek3` varchar(1) NOT NULL,
  `chek4` varchar(1) NOT NULL,
  `chek5` varchar(1) NOT NULL,
  `mengetahui` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `pwd`, `nama`, `section`, `email`, `level`, `flag`, `chek1`, `chek2`, `chek3`, `chek4`, `chek5`, `mengetahui`) VALUES
(1, 'irvan', '8277e0910d750195b448797616e091ad', 'IRVAN KHARISMA FIHAN', 'IT', 'Irvankharismafihan@gmail.com', 'Super Admin', '1', '1', '1', '1', '1', '1', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memotable`
--
ALTER TABLE `memotable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memotext`
--
ALTER TABLE `memotext`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memotable`
--
ALTER TABLE `memotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memotext`
--
ALTER TABLE `memotext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
