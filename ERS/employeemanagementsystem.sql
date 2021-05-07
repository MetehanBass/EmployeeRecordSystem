-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 May 2021, 20:05:34
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `employeemanagementsystem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address`
--

CREATE TABLE `address` (
  `AddressId` int(11) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `Postcode` varchar(7) NOT NULL,
  `ApptNo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `address`
--

INSERT INTO `address` (`AddressId`, `Country`, `City`, `Street`, `Postcode`, `ApptNo`) VALUES
(24, 'Turkey', 'Antalya', 'Kültür', '07090', '40'),
(25, 'Turkey', 'Eskişehir', 'Merkez', '02608', '13'),
(26, 'Turkey', 'Eskişehir', 'Merkez', '02608', '13'),
(27, 'Turkey', 'Eskişehir', 'Merkez', '02608', '13'),
(28, 'Turkey', 'Eskişehir', 'Merkez', '02608', '13'),
(29, 'Russia', 'St.Petersburg', 'Sportivnaya', '98553', '11'),
(30, 'Turkey', 'Antalya', 'Lara', '07090', '26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`AdminId`, `AdminName`, `Username`, `Password`) VALUES
(1, 'Metehan Baş', 'metagn', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `department`
--

CREATE TABLE `department` (
  `DepartmentId` int(11) NOT NULL,
  `DeptName` varchar(40) NOT NULL,
  `Location` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `department`
--

INSERT INTO `department` (`DepartmentId`, `DeptName`, `Location`) VALUES
(1, 'Administration', '2nd Floor, Number 1'),
(2, 'Sales Department', '1st Floor, Number 2'),
(3, 'Social Media Department', '1st Floor, Number 1'),
(4, 'Mobile Development Department', '1st Floor, Number 3'),
(5, 'WEB Development Department', '1st Floor, Number 4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `EmployeeId` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `DOB` varchar(12) NOT NULL,
  `Salary` int(7) NOT NULL,
  `StartingDate` date NOT NULL,
  `LeavingDate` date DEFAULT NULL,
  `JobId` int(3) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL DEFAULT 0,
  `AddressId` int(4) NOT NULL,
  `PhoneId` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`EmployeeId`, `Name`, `Gender`, `Email`, `DOB`, `Salary`, `StartingDate`, `LeavingDate`, `JobId`, `DepartmentId`, `ProjectId`, `AddressId`, `PhoneId`) VALUES
(29, 'Metehan Baş', 'Male', 'adodm87@hotmail.com', '1998-03-09', 3000, '2021-05-06', NULL, 5, 1, 0, 24, '25'),
(33, 'Fatma Wick', 'Female', 'fatmawick@outlook.com', '1988-03-09', 1000, '2021-05-06', NULL, 6, 5, 24, 25, '26'),
(34, 'Küçük Kurbağa', 'Female', 'kurbikseno@outlook.com', '1999-11-22', 4000, '2021-05-06', '2021-05-07', 4, 3, 0, 29, '30'),
(35, 'Joseph William Ledet', 'Male', 'Joseph@gmail.com', '1978-03-09', 3450, '2021-05-07', NULL, 1, 5, 24, 30, '31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job`
--

CREATE TABLE `job` (
  `JobId` int(11) NOT NULL,
  `JobTitle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `job`
--

INSERT INTO `job` (`JobId`, `JobTitle`) VALUES
(1, 'Web Developer'),
(2, 'IOS Developer'),
(3, 'Android Developer'),
(4, 'Graphic Artist'),
(5, 'Manager'),
(6, 'Cleaner'),
(7, 'Accountant'),
(8, 'Secretary');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `phone`
--

CREATE TABLE `phone` (
  `PhoneId` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `phone`
--

INSERT INTO `phone` (`PhoneId`, `Type`, `PhoneNumber`) VALUES
(25, 'Cell', '5383485870'),
(26, 'Business', '5383485869'),
(30, 'Cell', '5538879935'),
(31, 'Cell', '5375896532');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project`
--

CREATE TABLE `project` (
  `ProjectId` int(11) NOT NULL,
  `ProjName` varchar(40) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `StartingDate` date NOT NULL,
  `FinishDate` date DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '0 is finished,1 is active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `project`
--

INSERT INTO `project` (`ProjectId`, `ProjName`, `DepartmentId`, `StartingDate`, `FinishDate`, `status`) VALUES
(17, 'First Attempt', 2, '2021-05-06', NULL, 1),
(18, 'Search Engine Development', 5, '2021-05-06', NULL, 1),
(19, 'Project 1', 2, '2021-05-07', NULL, 1),
(20, 'Project 2', 5, '2021-05-07', '2021-05-06', 0),
(21, 'Deneme', 1, '2021-05-07', NULL, 1),
(22, 'Search Engine Development', 3, '2021-05-07', '2021-05-07', 0),
(23, 'Search Engine Developmentdwaaddasadsdas', 1, '2021-05-07', '2021-05-07', 0),
(24, 'First Attemptttttttttt', 5, '2021-05-07', NULL, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressId`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Tablo için indeksler `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentId`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeId`);

--
-- Tablo için indeksler `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobId`);

--
-- Tablo için indeksler `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`PhoneId`);

--
-- Tablo için indeksler `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `address`
--
ALTER TABLE `address`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `job`
--
ALTER TABLE `job`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `phone`
--
ALTER TABLE `phone`
  MODIFY `PhoneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `project`
--
ALTER TABLE `project`
  MODIFY `ProjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
