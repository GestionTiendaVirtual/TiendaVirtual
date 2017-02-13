-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2017 at 04:03 p.m.
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgasoluciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbaccount`
--

CREATE TABLE `tbaccount` (
  `idAccount` int(11) NOT NULL,
  `typeAccount` int(40) NOT NULL,
  `numberCard` varchar(20) NOT NULL,
  `DateExpiration` date NOT NULL,
  `CSC` varchar(5) NOT NULL,
  `idClient` int(11) NOT NULL,
  `active` bit(1) DEFAULT NULL,
  `direction` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrator`
--

CREATE TABLE `tbadministrator` (
  `idAdministrator` int(11) NOT NULL,
  `nameAdministrator` varchar(30) NOT NULL,
  `surname1Administrator` varchar(30) NOT NULL,
  `surname2Administrator` varchar(30) NOT NULL,
  `emailAdministrator` varchar(100) NOT NULL,
  `userAdministrator` varchar(39) NOT NULL,
  `passwordAdministrator` varchar(30) NOT NULL,
  `idStore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbcanceledsales`
--

CREATE TABLE `tbcanceledsales` (
  `idcanceledsales` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbcanton`
--

CREATE TABLE `tbcanton` (
  `idCanton` int(11) NOT NULL,
  `nameCanton` varchar(50) NOT NULL,
  `idProvince` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcanton`
--

INSERT INTO `tbcanton` (`idCanton`, `nameCanton`, `idProvince`) VALUES
(1, 'Jimenez', 3),
(2, 'Turrialba', 3),
(3, 'Desamparados', 1),
(4, 'Perez zeledon', 1),
(5, 'San Carlos', 2),
(6, 'Upala', 2),
(7, 'Barva', 4),
(8, 'Santa barbara', 4),
(9, 'Santa cruz', 5),
(10, 'Bagaces', 5),
(11, 'Golfito', 6),
(12, 'Buenos aires', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbclient`
--

CREATE TABLE `tbclient` (
  `idClient` int(11) NOT NULL,
  `emailClient` varchar(40) NOT NULL,
  `userClient` varchar(40) NOT NULL,
  `passwordClient` varchar(40) NOT NULL,
  `nameClient` varchar(30) NOT NULL,
  `surname1Client` varchar(30) NOT NULL,
  `surname2Client` varchar(30) NOT NULL,
  `bornClient` date NOT NULL,
  `sexClient` varchar(20) NOT NULL,
  `telephoneClient` varchar(15) NOT NULL,
  `provinceClient` varchar(50) NOT NULL,
  `cantonClient` varchar(50) NOT NULL,
  `districtClient` varchar(50) NOT NULL,
  `addressClient1` varchar(100) NOT NULL,
  `addressClient2` varchar(300) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbclient`
--

INSERT INTO `tbclient` (`idClient`, `emailClient`, `userClient`, `passwordClient`, `nameClient`, `surname1Client`, `surname2Client`, `bornClient`, `sexClient`, `telephoneClient`, `provinceClient`, `cantonClient`, `districtClient`, `addressClient1`, `addressClient2`, `active`) VALUES
(5, 'admin@gamil.com', 'admin', 'admin', 'Admin', 'Admin', 'Admin', '0000-00-00', '', '', '', '', '', 'admin', '', b'1'),
(3, 'asd@gmail', 'asd', 'asd', 'asd', 'asdx', 'asd', '0000-00-00', '', '', '', '', '', 'sd', '', b'0'),
(4, 'michael.melendez@gmail.com', 'mmm', '1234', 'Michael', 'Melendez', 'Mesen', '0000-00-00', '', '', '', '', '', 'Juan Vinas', '', b'1'),
(2, 'tavinchi.com@gmail.com', 'AndresUser', '12345', 'Andres', 'Najera', 'Pereira', '0000-00-00', '', '', '', '', '', 'Cartago3', '', b'1'),
(1, 'tavo.nn.20@hotmail.es', 'tavin', '1234', 'Gustavo', 'Najera', 'Najera', '0000-00-00', '', '', '', '', '', 'AltoVaras', '', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbcomment`
--

CREATE TABLE `tbcomment` (
  `idComment` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `commentProduct` varchar(200) NOT NULL,
  `idClient` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcomment`
--

INSERT INTO `tbcomment` (`idComment`, `idProduct`, `commentProduct`, `idClient`, `date`) VALUES
(1, 10, 'Son las mejores computadoras Toshiba', 1, '2017-01-29'),
(2, 10, 'Son las mas baratas', 1, '2017-01-29'),
(3, 3, 'fcsafas', 1, '2017-01-30'),
(4, 10, 'fvdsfsd', 1, '2017-01-30'),
(5, 10, 'prueba', 1, '2017-01-30'),
(6, 10, 'prueba1', 1, '2017-01-30'),
(7, 10, 'prueba2', 1, '2017-01-30'),
(8, 10, 'prueba3', 1, '2017-01-30'),
(9, 10, 'prueba4', 1, '2017-01-30'),
(10, 10, 'prueba5', 1, '2017-01-30'),
(11, 1, 'prueba1', 1, '2017-01-30'),
(12, 1, 'prueba 2', 1, '2017-01-30'),
(13, 1, 'prueba 4', 1, '2017-01-31'),
(14, 0, '', 1, '2017-01-31'),
(15, 0, 'prueba', 1, '2017-01-31'),
(16, 3, 'prueba', 5, '2017-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbconcretesales`
--

CREATE TABLE `tbconcretesales` (
  `idconcretesales` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `idSale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbconcretesales`
--

INSERT INTO `tbconcretesales` (`idconcretesales`, `idclient`, `idproduct`, `idSale`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 1, 2),
(5, 1, 1, 3),
(6, 1, 1, 4),
(7, 1, 1, 5),
(8, 1, 3, 6),
(9, 1, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomershopping`
--

CREATE TABLE `tbcustomershopping` (
  `idSale` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `dateSale` date NOT NULL,
  `totalSale` int(11) NOT NULL,
  `active` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcustomershopping`
--

INSERT INTO `tbcustomershopping` (`idSale`, `idClient`, `dateSale`, `totalSale`, `active`) VALUES
(1, 1, '2017-01-27', 1234567, b'0'),
(2, 2, '2017-01-27', 78787878, b'1'),
(3, 1, '2017-01-27', 44444, b'0'),
(4, 1, '2017-01-30', 1200, b'1'),
(5, 1, '2017-01-30', 1200, b'0'),
(6, 1, '2017-01-30', 1111, b'0'),
(7, 1, '2017-01-31', 23456, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbdistrict`
--

CREATE TABLE `tbdistrict` (
  `idDistrict` int(11) NOT NULL,
  `nameDistrict` varchar(30) NOT NULL,
  `idCanton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdistrict`
--

INSERT INTO `tbdistrict` (`idDistrict`, `nameDistrict`, `idCanton`) VALUES
(1, 'Juan Vinas', 1),
(2, 'La suiza', 2),
(3, 'San Miguel', 3),
(4, 'San isidro', 4),
(5, 'Ciudad quesada', 5),
(6, 'Aguas claras', 6),
(7, 'Santo domingo', 7),
(8, 'San Juan', 8),
(9, 'Tenerife', 9),
(10, 'Monte bagaces', 10),
(11, 'Golfito', 11),
(12, 'Flores', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbfrecuency`
--

CREATE TABLE `tbfrecuency` (
  `idfrecuency` int(11) NOT NULL,
  `date` date NOT NULL,
  `idClient` int(11) NOT NULL,
  `participationwall` int(11) NOT NULL,
  `viewproduct` int(11) NOT NULL,
  `searchproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfrecuency`
--

INSERT INTO `tbfrecuency` (`idfrecuency`, `date`, `idClient`, `participationwall`, `viewproduct`, `searchproduct`) VALUES
(1, '2017-01-29', 1, 3, 0, 0),
(2, '2017-01-29', 1, 2, 0, 0),
(3, '2017-01-29', 1, 0, 0, 4),
(4, '2017-01-29', 1, 0, 2, 2),
(5, '2017-01-29', 1, 3, 1, 1),
(6, '2017-01-29', 1, 4, 13, 3),
(7, '2017-01-30', 1, 6, 9, 2),
(8, '2017-01-30', 1, 2, 2, 2),
(9, '2017-01-30', 1, 0, 3, 2),
(10, '2017-01-30', 1, 3, 3, 3),
(11, '2017-01-31', 1, 0, 0, 0),
(12, '2017-02-01', 4, 0, 2, 2),
(13, '2017-02-01', 1, 0, 0, 0),
(14, '2017-02-01', 1, 0, 0, 0),
(15, '2017-02-01', 5, 0, 0, 0),
(16, '2017-02-01', 5, 0, 0, 0),
(17, '2017-02-01', 5, 1, 0, 0),
(18, '2017-02-01', 5, 0, 2, 1),
(19, '2017-02-01', 5, 0, 1, 1),
(20, '2017-02-01', 5, 0, 0, 0),
(21, '2017-02-03', 5, 0, 0, 0),
(22, '2017-02-03', 5, 0, 0, 0),
(23, '2017-02-03', 5, 0, 0, 0),
(24, '2017-02-03', 5, 0, 0, 0),
(25, '2017-02-03', 5, 0, 0, 0),
(26, '2017-02-03', 5, 0, 0, 0),
(27, '2017-02-03', 5, 0, 0, 0),
(28, '2017-02-03', 5, 0, 0, 0),
(29, '2017-02-03', 5, 0, 0, 0),
(30, '2017-02-03', 5, 0, 0, 0),
(31, '2017-02-03', 5, 0, 0, 0),
(32, '2017-02-03', 5, 0, 0, 0),
(33, '2017-02-03', 5, 0, 0, 0),
(34, '2017-02-03', 5, 0, 0, 0),
(35, '2017-02-03', 5, 0, 0, 0),
(36, '2017-02-03', 5, 0, 0, 0),
(37, '2017-02-03', 5, 0, 0, 0),
(38, '2017-02-03', 5, 0, 0, 0),
(39, '2017-02-03', 5, 0, 0, 0),
(40, '2017-02-03', 5, 0, 0, 0),
(41, '2017-02-03', 5, 0, 0, 0),
(42, '2017-02-03', 5, 0, 0, 0),
(43, '2017-02-03', 5, 0, 0, 0),
(44, '2017-02-03', 5, 0, 0, 0),
(45, '2017-02-03', 5, 0, 0, 0),
(46, '2017-02-03', 5, 0, 0, 0),
(47, '2017-02-03', 5, 0, 0, 0),
(48, '2017-02-03', 5, 0, 0, 0),
(49, '2017-02-04', 5, 0, 0, 0),
(50, '2017-02-04', 5, 0, 0, 0),
(51, '2017-02-04', 5, 0, 0, 0),
(52, '2017-02-04', 5, 0, 0, 0),
(53, '2017-02-04', 5, 0, 0, 0),
(54, '2017-02-04', 5, 0, 0, 0),
(55, '2017-02-04', 5, 0, 0, 0),
(56, '2017-02-04', 5, 0, 0, 0),
(57, '2017-02-04', 5, 0, 0, 0),
(58, '2017-02-04', 5, 0, 0, 0),
(59, '2017-02-04', 5, 0, 0, 0),
(60, '2017-02-04', 5, 0, 0, 0),
(61, '2017-02-04', 5, 0, 0, 0),
(62, '2017-02-04', 5, 0, 0, 0),
(63, '2017-02-04', 5, 0, 0, 0),
(64, '2017-02-04', 5, 0, 0, 0),
(65, '2017-02-04', 5, 0, 0, 0),
(66, '2017-02-04', 5, 0, 0, 0),
(67, '2017-02-04', 5, 0, 0, 0),
(68, '2017-02-04', 5, 0, 0, 0),
(69, '2017-02-04', 5, 0, 0, 0),
(70, '2017-02-04', 5, 0, 0, 0),
(71, '2017-02-04', 5, 0, 0, 2),
(72, '2017-02-04', 5, 0, 0, 0),
(73, '2017-02-04', 5, 0, 3, 0),
(74, '2017-02-04', 5, 0, 0, 0),
(75, '2017-02-04', 5, 0, 0, 0),
(76, '2017-02-04', 5, 0, 0, 0),
(77, '2017-02-04', 5, 0, 0, 0),
(78, '2017-02-04', 1, 0, 1, 1),
(79, '2017-02-04', 1, 0, 0, 0),
(80, '2017-02-04', 1, 0, 0, 0),
(81, '2017-02-04', 1, 0, 0, 0),
(82, '2017-02-04', 1, 0, 0, 0),
(83, '2017-02-04', 1, 0, 1, 1),
(84, '2017-02-04', 1, 0, 0, 0),
(85, '2017-02-04', 1, 0, 1, 1),
(86, '2017-02-04', 1, 0, 1, 1),
(87, '2017-02-04', 1, 0, 0, 0),
(88, '2017-02-04', 1, 0, 0, 0),
(89, '2017-02-04', 1, 0, 0, 0),
(90, '2017-02-04', 1, 0, 0, 0),
(91, '2017-02-04', 1, 0, 0, 0),
(92, '2017-02-04', 1, 0, 0, 0),
(93, '2017-02-04', 1, 0, 0, 0),
(94, '2017-02-04', 1, 0, 0, 0),
(95, '2017-02-04', 1, 0, 0, 0),
(96, '2017-02-04', 1, 0, 0, 0),
(97, '2017-02-04', 1, 0, 0, 0),
(98, '2017-02-04', 1, 0, 0, 0),
(99, '2017-02-04', 1, 0, 0, 0),
(100, '2017-02-04', 1, 0, 0, 0),
(101, '2017-02-04', 1, 0, 0, 0),
(102, '2017-02-04', 1, 0, 0, 0),
(103, '2017-02-04', 1, 0, 0, 0),
(104, '2017-02-04', 1, 0, 0, 0),
(105, '2017-02-04', 1, 0, 0, 0),
(106, '2017-02-04', 1, 0, 0, 0),
(107, '2017-02-04', 1, 0, 0, 0),
(108, '2017-02-04', 1, 0, 0, 0),
(109, '2017-02-04', 1, 0, 0, 0),
(110, '2017-02-04', 1, 0, 0, 0),
(111, '2017-02-04', 1, 0, 0, 0),
(112, '2017-02-04', 1, 0, 0, 0),
(113, '2017-02-04', 1, 0, 0, 0),
(114, '2017-02-04', 1, 0, 0, 0),
(115, '2017-02-04', 1, 0, 0, 0),
(116, '2017-02-04', 1, 0, 0, 0),
(117, '2017-02-04', 1, 0, 0, 0),
(118, '2017-02-04', 1, 0, 0, 0),
(119, '2017-02-04', 1, 0, 0, 0),
(120, '2017-02-04', 1, 0, 0, 0),
(121, '2017-02-04', 1, 0, 0, 0),
(122, '2017-02-04', 1, 0, 0, 0),
(123, '2017-02-04', 1, 0, 0, 0),
(124, '2017-02-04', 1, 0, 0, 0),
(125, '2017-02-04', 1, 0, 0, 0),
(126, '2017-02-04', 1, 0, 0, 0),
(127, '2017-02-04', 1, 0, 0, 0),
(128, '2017-02-04', 1, 0, 0, 0),
(129, '2017-02-04', 1, 0, 0, 0),
(130, '2017-02-04', 1, 0, 0, 0),
(131, '2017-02-04', 1, 0, 0, 0),
(132, '2017-02-04', 1, 0, 0, 0),
(133, '2017-02-04', 1, 0, 0, 0),
(134, '2017-02-04', 1, 0, 0, 0),
(135, '2017-02-04', 1, 0, 0, 0),
(136, '2017-02-04', 1, 0, 0, 0),
(137, '2017-02-04', 1, 0, 0, 0),
(138, '2017-02-04', 1, 0, 0, 0),
(139, '2017-02-04', 1, 0, 0, 0),
(140, '2017-02-04', 1, 0, 0, 0),
(141, '2017-02-04', 1, 0, 0, 0),
(142, '2017-02-04', 1, 0, 0, 0),
(143, '2017-02-04', 1, 0, 0, 0),
(144, '2017-02-04', 1, 0, 0, 0),
(145, '2017-02-04', 1, 0, 0, 0),
(146, '2017-02-04', 1, 0, 1, 0),
(147, '2017-02-04', 1, 0, 0, 0),
(148, '2017-02-04', 1, 0, 1, 0),
(149, '2017-02-04', 1, 0, 0, 0),
(150, '2017-02-04', 1, 0, 1, 0),
(151, '2017-02-04', 1, 0, 0, 0),
(152, '2017-02-04', 1, 0, 0, 2),
(153, '2017-02-04', 1, 0, 0, 14),
(154, '2017-02-04', 1, 0, 0, 0),
(155, '2017-02-04', 1, 0, 0, 0),
(156, '2017-02-04', 1, 0, 3, 14),
(157, '2017-02-04', 1, 0, 1, 20),
(158, '2017-02-05', 1, 0, 0, 0),
(159, '2017-02-05', 1, 0, 0, 0),
(160, '2017-02-05', 1, 0, 0, 0),
(161, '2017-02-05', 1, 0, 0, 0),
(162, '2017-02-05', 1, 0, 0, 0),
(163, '2017-02-05', 1, 0, 0, 0),
(164, '2017-02-05', 1, 0, 0, 0),
(165, '2017-02-05', 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbimageproduct`
--

CREATE TABLE `tbimageproduct` (
  `idImage` int(11) NOT NULL,
  `pathImage` varchar(100) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbimageproduct`
--

INSERT INTO `tbimageproduct` (`idImage`, `pathImage`, `idProduct`) VALUES
(6, '../../images/59.jpg', 11),
(7, '../../images/1.jpg', 12),
(8, '../../images/Playaespadilla.jpg', 13),
(9, '../../images/15941007_2023133364389877_1554708251087100836_n.jpg', 13),
(10, '../../images/pintura.jpg', 14),
(11, '../../images/1.jpg', 15),
(26, '../../images/configuracion.PNG', 16),
(27, '../../images/p8.jpg', 1),
(28, '../../images/p81.jpg', 1),
(29, '../../images/p802.jpg', 1),
(30, '../../images/p803.jpg', 1),
(31, '../../images/p901.jpg', 5),
(32, '../../images/p902.jpeg', 5),
(33, '../../images/p903.jpg', 5),
(34, '../../images/p904.jpg', 5),
(35, '../../images/p905.jpg', 5),
(36, '../../images/iph1.jpg', 3),
(37, '../../images/iph2.jpg', 3),
(38, '../../images/iph3.jpg', 3),
(39, '../../images/iph4.jpg', 3),
(40, '../../images/lk01.jpg', 4),
(41, '../../images/lk02.jpg', 4),
(42, '../../images/lk03.jpg', 4),
(43, '../../images/lk04.jpg', 4),
(44, '../../images/s701.jpg', 2),
(45, '../../images/s702.jpg', 2),
(46, '../../images/s703.jpg', 2),
(47, '../../images/s705.jpg', 2),
(48, '../../images/tsh01.jpg', 10),
(49, '../../images/tsh02.jpg', 10),
(50, '../../images/tsh03.jpg', 10),
(51, '../../images/1.jpg', 17),
(52, '../../images/300_wallpaper.jpg', 17),
(53, '../../images/Capi.jpg', 18),
(54, '../../images/1.jpg', 19),
(55, '../../images/Birdman.jpg', 20),
(56, '../../images/59.jpg', 21),
(57, '../../images/300_wallpaper.jpg', 22),
(58, '../../images/59.jpg', 23),
(62, '../../images/Babadook1.jpg', 27),
(63, '../../images/florR.jpg', 28),
(64, '../../images/celular1.jpg', 27),
(65, '../../images/1.jpg', 29),
(66, '../../images/3543818.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tboffer`
--

CREATE TABLE `tboffer` (
  `idOffer` int(11) NOT NULL,
  `descriptionOffer` varchar(100) NOT NULL,
  `discountPercentage` int(11) NOT NULL,
  `dateStar` date NOT NULL,
  `dateEnd` date NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `idProduct` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `idStore` int(11) NOT NULL DEFAULT '1',
  `idTypeProduct` int(11) DEFAULT NULL,
  `nameProduct` varchar(40) DEFAULT NULL,
  `characteristics` varchar(1000) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`idProduct`, `brand`, `model`, `price`, `description`, `idStore`, `idTypeProduct`, `nameProduct`, `characteristics`, `serie`, `active`) VALUES
(1, 'Huawei', 'P8 lite', 23456, 'hhjjhh', 1, 1, 'Celular', 'trrtrttr', '45245jhjh', b'1'),
(2, 'Samsung', 'S7', 128000, 'Descripcion8', 1, 1, 'Celular', '', '', b'0'),
(3, 'Iphone', '6s', 30000088, 'Descripcion4', 1, 1, 'Celular', 'jkjkjkj', 'jjkjkjk', b'1'),
(4, 'LG', 'LG1', 656767678, 'Descripcion5', 1, 1, 'Celular', 'jkjkjkjk', 'kjkjjkjk', b'1'),
(5, 'Huawei', 'P9', 345000, 'Descripcion', 1, 1, 'Celular', 'hjhjhhj', 'hjjhhj', b'1'),
(10, 'Toshiba', 'satellite', 123400, 'Descripcion9', 1, 2, 'Computadora', '', '', b'0'),
(11, 'hhhhhhh', 'hhhhhhhh', 3456789, 'hhhhhhhhhhh', 1, 1, 'hhhhhhh', '', '', b'0'),
(12, 'ooooi', 'ioioioiio', 787878, 'Descripcion6', 1, 1, 'Celular', '', '', b'0'),
(13, 'yuyuyu', 'yuyuyu', 7777, 'jhjhjjh', 1, 1, 'yyuuy', '', '', b'0'),
(14, 'dfgfdg', 'dfgdf', 11111, 'Descripcion1', 1, 1, 'ggdgfd', '', '', b'0'),
(15, 'prueba', 'prueba', 11111, 'Descripcion7', 1, 1, 'prueba', '', '', b'0'),
(16, 'priueba', 'prueba', 2147483647, 'iuhdufiherifhue', 1, 2, 'prueba', '', '', b'0'),
(17, 'opopop', 'poopop', 88898998, 'ioioioioio', 1, 1, 'oppo', '', '', b'0'),
(18, 'Prueba especificacion', 'PruebaEspecificacion', 12345, 'qwertyui', 1, 1, 'Prueba especificacion', 'ertyuio', 'erdftg4567', b'0'),
(19, 'klklklkl', 'klklklkl', 8989898, 'ioioioioio', 1, 1, 'klklkl', 'ioioioioioio', 'klklklkl', b'0'),
(20, 'qwertyu', 'qwerty', 123456, 'qwert', 1, 1, 'qwertyui', 'qwerty', 'qwerty', b'0'),
(21, 'kklklkl', 'klklkkl', 898989, 'jkjkjkjkjk', 1, 1, 'kkllk', 'jkjkjkjkjk', 'kkjkjjk', b'0'),
(22, 'uiuiuiui', 'uuuiuui', 87787878, 'uiuiuiuiui', 1, 1, 'uiuiui', 'uiuiuiui', 'uiuiui', b'0'),
(23, 'uiuiuiuiui', 'uiuiuiuui', 8877878, 'uiuiuiuiuiui', 1, 1, 'uiuiuiui', 'uiuiuiuiuiui', 'uiuiuiui', b'0'),
(24, 'iooioi', 'ioioioioio', 7877878, 'uiuiuiui', 1, 1, 'ioioio', 'uiuiuiui', 'ioioioi', b'0'),
(25, 'uiuiuiui', 'uiuiui', 78778, 'uiuiuiu', 1, 1, 'uiui', 'uiuiuiui', 'uiuiui', b'0'),
(26, 'opopop', 'opopop', 78787, 'uiuiuiuiui', 1, 1, 'oppo', 'uiuiuiuiui', 'opopop', b'0'),
(27, 'uiuiui', 'uiuiui', 6767, 'hjhjhjj', 1, 1, 'uiui', 'hjhjhjhjhj', 'uiuiui', b'0'),
(28, 'uiuiu', 'uiuiuiui', 7767676, 'uiiuui', 1, 1, 'uiui', 'uiuiuiui', 'uiuiuui', b'0'),
(29, 'uiuiuiu', 'uiuiuiui', 898998, 'uiuiuiuiui', 1, 1, 'uiuiui', 'uiuiuiuiuiui', 'uiiuuiiu', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbproductcolor`
--

CREATE TABLE `tbproductcolor` (
  `idcolor` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproductcolor`
--

INSERT INTO `tbproductcolor` (`idcolor`, `idproduct`, `color`) VALUES
(4, 1, '#ff80ff'),
(6, 5, '#0080ff'),
(7, 5, '#ff8040'),
(8, 5, '#ff0000'),
(9, 1, '#8080ff'),
(10, 1, '#ff8040'),
(11, 4, '#004080'),
(12, 29, '#8080ff'),
(13, 29, '#80ffff'),
(14, 29, '#008080'),
(15, 1, '#000080');

-- --------------------------------------------------------

--
-- Table structure for table `tbproductdesired`
--

CREATE TABLE `tbproductdesired` (
  `iddesired` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `active` bit(1) NOT NULL,
  `dateactive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproductdesired`
--

INSERT INTO `tbproductdesired` (`iddesired`, `idclient`, `idproduct`, `active`, `dateactive`) VALUES
(1, 1, 14, b'0', '2017-01-29'),
(2, 1, 10, b'1', '2017-01-30'),
(3, 1, 1, b'1', '2017-01-30'),
(4, 5, 5, b'1', '2017-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbprovince`
--

CREATE TABLE `tbprovince` (
  `idProvince` int(11) NOT NULL,
  `nameProvince` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbprovince`
--

INSERT INTO `tbprovince` (`idProvince`, `nameProvince`) VALUES
(1, 'San Jose'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limon');

-- --------------------------------------------------------

--
-- Table structure for table `tbpurchasingsupplier`
--

CREATE TABLE `tbpurchasingsupplier` (
  `idPurchases` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `datePurchases` date NOT NULL,
  `descriptionPurchases` varchar(200) NOT NULL,
  `product` varchar(100) NOT NULL,
  `totalPurchases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsearch`
--

CREATE TABLE `tbsearch` (
  `idSearch` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsearch`
--

INSERT INTO `tbsearch` (`idSearch`, `idProduct`, `idClient`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 4, 1),
(4, 5, 1),
(5, 1, 1),
(6, 3, 1),
(7, 4, 1),
(8, 5, 1),
(9, 1, 1),
(10, 3, 1),
(11, 4, 1),
(12, 5, 1),
(13, 1, 1),
(14, 3, 1),
(15, 4, 1),
(16, 5, 1),
(17, 1, 1),
(18, 3, 1),
(19, 4, 1),
(20, 5, 1),
(21, 1, 1),
(22, 3, 1),
(23, 4, 1),
(24, 5, 1),
(25, 1, 1),
(26, 3, 1),
(27, 4, 1),
(28, 5, 1),
(29, 1, 1),
(30, 3, 1),
(31, 4, 1),
(32, 5, 1),
(33, 1, 1),
(34, 3, 1),
(35, 4, 1),
(36, 5, 1),
(37, 1, 1),
(38, 3, 1),
(39, 4, 1),
(40, 5, 1),
(41, 1, 1),
(42, 3, 1),
(43, 4, 1),
(44, 5, 1),
(45, 1, 1),
(46, 3, 1),
(47, 4, 1),
(48, 5, 1),
(49, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbsexualpreferences`
--

CREATE TABLE `tbsexualpreferences` (
  `idSex` int(11) NOT NULL,
  `nameSex` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsexualpreferences`
--

INSERT INTO `tbsexualpreferences` (`idSex`, `nameSex`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Asexual'),
(4, 'Bisexual'),
(5, 'Lesbian'),
(6, 'Homosexual'),
(7, 'TransMascFem'),
(8, 'TransFemMasc');

-- --------------------------------------------------------

--
-- Table structure for table `tbspecificationproduct`
--

CREATE TABLE `tbspecificationproduct` (
  `idspecification` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `namespecification` varchar(100) NOT NULL,
  `valuespecification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbspecificationproduct`
--

INSERT INTO `tbspecificationproduct` (`idspecification`, `idproduct`, `namespecification`, `valuespecification`) VALUES
(1, 1, 'Disco duro jaja', '32 GB'),
(2, 1, 'RAM', '16 GB'),
(3, 24, 'prueba', 'prueba2'),
(4, 24, 'ioioioio', 'ioioioioo'),
(5, 24, 'hhjhjhjhj', 'hjhjhjhjhhj'),
(6, 24, 'bbnbnbnbn', 'bnbnbnbbn'),
(7, 25, 'uuiuiui', 'uiuiuiui'),
(8, 26, 'uiuiuiuiui', 'uiuiuiuiui'),
(9, 27, 'hjhjhjhjhj', 'hjhjhj'),
(10, 28, 'uiuiuiui', 'uiuiuiui'),
(18, 29, 'uiuiuiuui', 'uiuiuiu'),
(19, 29, 'uiuiuiui', 'uuiuiuiuiui'),
(21, 1, 'opop', 'opopo'),
(22, 5, 'iii', 'ioioioio'),
(23, 3, 'uiuiuiuiui', 'uiuiuiuiu'),
(24, 3, 'jjkjkjk', 'jkjkjkjk'),
(25, 4, 'uiuiuuiiu', 'uiuiuiuuu');

-- --------------------------------------------------------

--
-- Table structure for table `tbstore`
--

CREATE TABLE `tbstore` (
  `idStore` int(11) NOT NULL,
  `nameStore` varchar(40) NOT NULL,
  `telephoneStore` varchar(30) NOT NULL,
  `emailStore` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstore`
--

INSERT INTO `tbstore` (`idStore`, `nameStore`, `telephoneStore`, `emailStore`) VALUES
(1, 'MGASoluciones', '25342314', 'mgs');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `idSupplier` int(11) NOT NULL,
  `nameSupplier` varchar(40) NOT NULL,
  `emailSupplier` varchar(100) NOT NULL,
  `telephonoSupplier` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsuppliertypeproduct`
--

CREATE TABLE `tbsuppliertypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `idSupplierty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplierxproduct`
--

CREATE TABLE `tbsupplierxproduct` (
  `idSupplierty` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbtypeaccount`
--

CREATE TABLE `tbtypeaccount` (
  `idtypeaccount` int(11) NOT NULL,
  `nametypeaccount` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtypeaccount`
--

INSERT INTO `tbtypeaccount` (`idtypeaccount`, `nametypeaccount`) VALUES
(1, 'Mastercard'),
(2, 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `tbtypeproduct`
--

CREATE TABLE `tbtypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `nameTypeProduct` varchar(100) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtypeproduct`
--

INSERT INTO `tbtypeproduct` (`idTypeProduct`, `nameTypeProduct`, `active`) VALUES
(1, 'Celulares', b'1'),
(2, 'Computadoras', b'1'),
(3, 'Pantalla', b'1'),
(4, 'Pantallas', b'0'),
(5, 'Pantallas', b'0'),
(6, 'Pantallas', b'0'),
(7, 'Pantallas', b'0'),
(8, 'Pantallas', b'0'),
(9, 'Pantallas', b'0'),
(10, 'Pantallas', b'0'),
(11, 'Pantallas', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbaccount`
--
ALTER TABLE `tbaccount`
  ADD PRIMARY KEY (`idAccount`),
  ADD UNIQUE KEY `idAccount` (`idAccount`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `tba_fk_typeaccount` (`typeAccount`);

--
-- Indexes for table `tbadministrator`
--
ALTER TABLE `tbadministrator`
  ADD PRIMARY KEY (`idAdministrator`),
  ADD UNIQUE KEY `idAdministrator` (`idAdministrator`),
  ADD KEY `idTienda` (`idStore`);

--
-- Indexes for table `tbcanceledsales`
--
ALTER TABLE `tbcanceledsales`
  ADD PRIMARY KEY (`idcanceledsales`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Indexes for table `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD PRIMARY KEY (`idCanton`),
  ADD KEY `idProvince` (`idProvince`);

--
-- Indexes for table `tbclient`
--
ALTER TABLE `tbclient`
  ADD PRIMARY KEY (`emailClient`),
  ADD UNIQUE KEY `idClient` (`idClient`),
  ADD UNIQUE KEY `emailClient` (`emailClient`),
  ADD KEY `idClient_2` (`idClient`);

--
-- Indexes for table `tbcomment`
--
ALTER TABLE `tbcomment`
  ADD PRIMARY KEY (`idComment`);

--
-- Indexes for table `tbconcretesales`
--
ALTER TABLE `tbconcretesales`
  ADD PRIMARY KEY (`idconcretesales`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`),
  ADD KEY `FK_CS` (`idSale`);

--
-- Indexes for table `tbcustomershopping`
--
ALTER TABLE `tbcustomershopping`
  ADD PRIMARY KEY (`idSale`);

--
-- Indexes for table `tbdistrict`
--
ALTER TABLE `tbdistrict`
  ADD PRIMARY KEY (`idDistrict`),
  ADD KEY `idCanton` (`idCanton`);

--
-- Indexes for table `tbfrecuency`
--
ALTER TABLE `tbfrecuency`
  ADD PRIMARY KEY (`idfrecuency`);

--
-- Indexes for table `tbimageproduct`
--
ALTER TABLE `tbimageproduct`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `idImage` (`idImage`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `tboffer`
--
ALTER TABLE `tboffer`
  ADD PRIMARY KEY (`idOffer`),
  ADD UNIQUE KEY `idOffer` (`idOffer`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idStore` (`idStore`),
  ADD KEY `tbproduct_ibfk_2` (`idTypeProduct`);

--
-- Indexes for table `tbproductcolor`
--
ALTER TABLE `tbproductcolor`
  ADD PRIMARY KEY (`idcolor`,`idproduct`);

--
-- Indexes for table `tbproductdesired`
--
ALTER TABLE `tbproductdesired`
  ADD PRIMARY KEY (`iddesired`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Indexes for table `tbprovince`
--
ALTER TABLE `tbprovince`
  ADD PRIMARY KEY (`idProvince`),
  ADD UNIQUE KEY `idProvince` (`idProvince`);

--
-- Indexes for table `tbpurchasingsupplier`
--
ALTER TABLE `tbpurchasingsupplier`
  ADD PRIMARY KEY (`idPurchases`);

--
-- Indexes for table `tbsearch`
--
ALTER TABLE `tbsearch`
  ADD PRIMARY KEY (`idSearch`),
  ADD KEY `fKSearch` (`idProduct`),
  ADD KEY `fKClient` (`idClient`);

--
-- Indexes for table `tbspecificationproduct`
--
ALTER TABLE `tbspecificationproduct`
  ADD PRIMARY KEY (`idspecification`,`idproduct`);

--
-- Indexes for table `tbstore`
--
ALTER TABLE `tbstore`
  ADD PRIMARY KEY (`idStore`),
  ADD UNIQUE KEY `idStore` (`idStore`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `tbsuppliertypeproduct`
--
ALTER TABLE `tbsuppliertypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`,`idSupplierty`);

--
-- Indexes for table `tbsupplierxproduct`
--
ALTER TABLE `tbsupplierxproduct`
  ADD PRIMARY KEY (`idSupplierty`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `tbtypeaccount`
--
ALTER TABLE `tbtypeaccount`
  ADD PRIMARY KEY (`idtypeaccount`);

--
-- Indexes for table `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbaccount`
--
ALTER TABLE `tbaccount`
  ADD CONSTRAINT `tba_fk_typeaccount` FOREIGN KEY (`typeAccount`) REFERENCES `tbtypeaccount` (`idtypeaccount`),
  ADD CONSTRAINT `tbaccount_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tbclient` (`idClient`);

--
-- Constraints for table `tbadministrator`
--
ALTER TABLE `tbadministrator`
  ADD CONSTRAINT `tbadministrator_ibfk_1` FOREIGN KEY (`idStore`) REFERENCES `tbstore` (`idStore`);

--
-- Constraints for table `tbcanceledsales`
--
ALTER TABLE `tbcanceledsales`
  ADD CONSTRAINT `tbcanceledsales_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbcanceledsales_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Constraints for table `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD CONSTRAINT `tbcanton_ibfk_1` FOREIGN KEY (`idProvince`) REFERENCES `tbprovince` (`idProvince`);

--
-- Constraints for table `tbconcretesales`
--
ALTER TABLE `tbconcretesales`
  ADD CONSTRAINT `FK_CS` FOREIGN KEY (`idSale`) REFERENCES `tbcustomershopping` (`idSale`),
  ADD CONSTRAINT `tbconcretesales_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbconcretesales_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Constraints for table `tbdistrict`
--
ALTER TABLE `tbdistrict`
  ADD CONSTRAINT `tbdistrict_ibfk_1` FOREIGN KEY (`idCanton`) REFERENCES `tbcanton` (`idCanton`);

--
-- Constraints for table `tbimageproduct`
--
ALTER TABLE `tbimageproduct`
  ADD CONSTRAINT `tbimageproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Constraints for table `tboffer`
--
ALTER TABLE `tboffer`
  ADD CONSTRAINT `tboffer_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`idStore`) REFERENCES `tbstore` (`idStore`),
  ADD CONSTRAINT `tbproduct_ibfk_2` FOREIGN KEY (`idTypeProduct`) REFERENCES `tbtypeproduct` (`idTypeProduct`);

--
-- Constraints for table `tbproductdesired`
--
ALTER TABLE `tbproductdesired`
  ADD CONSTRAINT `tbproductdesired_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbproductdesired_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Constraints for table `tbsearch`
--
ALTER TABLE `tbsearch`
  ADD CONSTRAINT `fKsearchClient` FOREIGN KEY (`idClient`) REFERENCES `tbclient` (`idClient`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fKsearchProduct` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbsupplierxproduct`
--
ALTER TABLE `tbsupplierxproduct`
  ADD CONSTRAINT `tbsupplierxproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
