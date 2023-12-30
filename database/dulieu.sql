-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 02:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` varchar(8) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
('AM01', 'tuan', '1'),
('AM02', 'Dat', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNV` varchar(8) NOT NULL,
  `Hoten` text NOT NULL,
  `IDPB` varchar(6) NOT NULL,
  `Diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`IDNV`, `Hoten`, `IDPB`, `Diachi`) VALUES
('NV01', 'Nhat Hung', 'PB03', 'Hue'),
('NV02', 'Tam', 'PB02', 'BInh dinh'),
('NV03', 'NVG', 'PB03', 'Vung Tao'),
('NV04', 'NVB', 'PB01', 'An gian'),
('NV06', 'Nguyen Tuan', 'PB01', 'Quang nam'),
('NV07', 'Tran Tam', 'PB01', 'Quang ninh'),
('NV09', 'Dat', 'PB05', 'Hai phong');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `IDPB` varchar(8) NOT NULL,
  `Tenpb` text NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`IDPB`, `Tenpb`, `Mota`) VALUES
('PB01', 'PBA', 'AAABBB'),
('PB02', 'Phong', 'JJJJ'),
('PB03', 'PBC', 'MM'),
('PB04', 'Adu dark wa', 'Phong tai chinh'),
('PB05', 'PBA', 'cccc'),
('PB10', 'aaa', 'bbb'),
('PB12', 'Phong an', 'an'),
('PB15', 'nn', 'nnn');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `University` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`ID`, `Name`, `Age`, `University`) VALUES
(1, 'Tran van dat', 20, 'Dai hoc bach khoa'),
(2, 'dat zan tay', 20, 'Dai hoc kinh te'),
(3, 'Vo thi sau', 3, 'DHKT'),
(4, 'Vo van sau', 20, 'Truong su pham ki thuat'),
(5, 'NVH', 19, 'DH'),
(7, 'Mai tien', 23, 'Truong ngoai ngu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNV`),
  ADD KEY `Nhanvien_Phongban` (`IDPB`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`IDPB`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `Nhanvien_Phongban` FOREIGN KEY (`IDPB`) REFERENCES `phongban` (`IDPB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
