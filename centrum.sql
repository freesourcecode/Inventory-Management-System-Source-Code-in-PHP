-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 06:52 AM
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
-- Database: `centrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `AUTOSTART`, `AUTOINC`, `AUTOEND`, `AUTOKEY`, `AUTONUM`) VALUES
(1, '0', 1, 25, 'PROID', 10),
(2, '0', 1, 74, 'ordernumber', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGID`, `CATEGORIES`, `USERID`) VALUES
(3, 'CTV/LED', 0),
(4, 'REF./FREEZER', 0),
(5, 'AIRCON', 0),
(6, 'WASHING MACHINE', 0),
(7, 'ELECT-FAN', 0),
(8, 'COMPONENT/HOME THEATER', 0),
(9, 'GAS RANGE/GAS STOVE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int(11) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `CUSHOMENUM` varchar(90) NOT NULL,
  `STREETADD` text NOT NULL,
  `BRGYADD` text NOT NULL,
  `CITYADD` text NOT NULL,
  `PROVINCE` varchar(80) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `DBIRTH` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAILADD` varchar(40) NOT NULL,
  `ZIPCODE` int(6) NOT NULL,
  `CUSUNAME` varchar(20) NOT NULL,
  `CUSPASS` varchar(90) NOT NULL,
  `CUSPHOTO` varchar(255) NOT NULL,
  `TERMS` tinyint(4) NOT NULL,
  `DATEJOIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`CUSTOMERID`, `FNAME`, `LNAME`, `MNAME`, `CUSHOMENUM`, `STREETADD`, `BRGYADD`, `CITYADD`, `PROVINCE`, `COUNTRY`, `DBIRTH`, `GENDER`, `PHONE`, `EMAILADD`, `ZIPCODE`, `CUSUNAME`, `CUSPASS`, `CUSPHOTO`, `TERMS`, `DATEJOIN`) VALUES
(1, 'janobe', 'Palacios', '', '321', 'Coloso Street', 'brgy. 1', 'Kabankalan City', 'Negros Occidental', 'Philippines', '0000-00-00', 'Male', '09123586545', '', 6111, 'kenjie@yahoo.com', '803d734da37173b09d39012fb384533cd122f9ca', 'customer_image/a1157016c5d8272126380b27a59e2e7e.jpg', 1, '2015-11-26'),
(2, 'Mark Anthony', 'Geasin', '', '1234', 'paglaom', 'dancalan', 'ilog', 'negros occ', 'philippines', '0000-00-00', '', '091023333234', '', 6111, 'bboy', '0377588176145a8f0d837ff6e9bf0c1616268387', 'customer_image/10801930_959054964122877_391305007291646162_n.jpg', 1, '2015-11-26'),
(3, 'jude', 'suarez', 'reyes', '45734', 'mambato', 'brgy tooy', 'himamaylan city', 'negros occidental', 'philippines', '1996-02-11', 'male', '09125113555', 'suarezangeljude15@gmail.com', 35176, 'jude', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ORDERID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `ORDEREDQTY` int(11) NOT NULL,
  `ORDEREDPRICE` double NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDERID`, `PROID`, `ORDEREDQTY`, `ORDEREDPRICE`, `ORDEREDNUM`, `USERID`) VALUES
(4, 4, 1, 4498.2, 60, 0),
(5, 2, 1, 22198, 61, 0),
(6, 6, 1, 10900, 62, 0),
(7, 3, 1, 7190, 63, 0),
(8, 2, 1, 22198, 64, 0),
(9, 3, 1, 7190, 65, 0),
(10, 2, 1, 22198, 66, 0),
(11, 1, 1, 33298, 67, 0),
(12, 1, 1, 33298, 68, 0),
(16, 13, 1, 1500, 72, 0),
(17, 15, 1, 1500, 73, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL,
  `PROMODEL` varchar(30) DEFAULT NULL,
  `PROBRAND` varchar(255) DEFAULT NULL,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `PROQTY` int(11) DEFAULT NULL,
  `PROPRICE` double DEFAULT NULL,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`PROID`, `PROMODEL`, `PROBRAND`, `PRONAME`, `PRODESC`, `PROQTY`, `PROPRICE`, `CATEGID`, `IMAGES`, `PROSTATS`) VALUES
(1, 'HK-LE3212UVP', 'Sharp', 'Sharp', 'LCD VIDEO-KARAOKE 32\'\'                        \r\n\r\n                                                                                                                                                                                                             ', 17, 33298, 8, 'uploaded_photos/download.jpg', 'Available'),
(2, 'HK-LE1110UVP', NULL, 'Sharp', 'LCD VIDEO-KARAOKE 19\'\'                         \r\n\r\n                                            ', 4, 22198, 8, 'uploaded_photos/images.jpg', 'Available'),
(3, '21V-FS720S', NULL, 'Sharp', 'Pure Flat TV                    \r\n\r\n                                                                                                                                    ', 16, 7190, 3, 'uploaded_photos/download.jpg', 'Available'),
(4, 'ES-D708', NULL, 'Sharp', 'Spin Dryer 7kg                       \r\n\r\n                                                                                        ', 22, 4998, 6, 'uploaded_photos/images.jpg', 'Available'),
(5, 'ES-D958', NULL, 'Sharp', 'Spin Dryer 9.5 KG                        \r\n\r\n                                            ', 22, 5698, 6, 'uploaded_photos/images (2).jpg', 'Available'),
(6, 'SJ-DT55AS', NULL, 'Sharp', '5.4 CU.FT S/D SEMI AUTO                       \r\n\r\n                                                                                                                                    ', 16, 10900, 4, 'uploaded_photos/images (1).jpg', 'Available'),
(15, 'Db', NULL, 'Db Speaker', 'Db', 99, 1500, 8, 'uploaded_photos/image_2020-07-24-06-03-22_5f1a5d8a387e6.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromopro`
--

CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpromopro`
--

INSERT INTO `tblpromopro` (`PROMOID`, `PROID`, `PRODISCOUNT`, `PRODISPRICE`, `PROBANNER`, `PRONEW`) VALUES
(1, 1, 0, 33298, 1, 0),
(2, 2, 0, 22198, 1, 0),
(3, 3, 0, 7190, 1, 0),
(4, 4, 10, 4498.2, 1, 0),
(5, 5, 0, 5698, 1, 0),
(6, 6, 0, 10900, 1, 0),
(9, 15, 0, 1500, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`SETTINGID`, `PLACE`, `BRGY`, `DELPRICE`) VALUES
(1, 'Kabankalan City', 'Brgy. 1', 50),
(2, 'Himamaylan City', 'Brgy. 1', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tblstockin`
--

CREATE TABLE `tblstockin` (
  `STOCKINID` int(11) NOT NULL,
  `STOCKDATE` datetime DEFAULT NULL,
  `PROID` int(11) DEFAULT NULL,
  `STOCKQTY` int(11) DEFAULT NULL,
  `STOCKPRICE` double DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstockin`
--

INSERT INTO `tblstockin` (`STOCKINID`, `STOCKDATE`, `PROID`, `STOCKQTY`, `STOCKPRICE`, `USERID`) VALUES
(1, '2015-11-26 04:42:29', 1, 8, 33298, 126),
(2, '2015-11-26 04:42:37', 1, 8, 33298, 126),
(3, '2015-11-26 04:42:45', 1, 8, 33298, 126),
(4, '2015-11-26 08:02:50', 4, 5, 4998, 126),
(5, '2015-11-26 08:03:04', 4, 5, 4998, 126),
(6, '2015-11-26 08:05:12', 1, 8, 33298, 126),
(7, '2015-11-26 08:09:31', 1, 8, 33298, 126);

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `SUMMARYID` int(11) NOT NULL,
  `ORDEREDDATE` datetime NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `DELFEE` double NOT NULL,
  `PAYMENT` double NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `ORDEREDSTATS` varchar(30) NOT NULL,
  `ORDEREDREMARKS` varchar(125) NOT NULL,
  `CLAIMEDADTE` datetime NOT NULL,
  `HVIEW` tinyint(4) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsummary`
--

INSERT INTO `tblsummary` (`SUMMARYID`, `ORDEREDDATE`, `CUSTOMERID`, `ORDEREDNUM`, `DELFEE`, `PAYMENT`, `PAYMENTMETHOD`, `ORDEREDSTATS`, `ORDEREDREMARKS`, `CLAIMEDADTE`, `HVIEW`, `USERID`) VALUES
(4, '2016-02-27 11:26:30', 1, 60, 0, 4523.2, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '0000-00-00 00:00:00', 0, 0),
(5, '2016-02-27 01:08:44', 1, 61, 0, 22198, 'Cash on Pickup', 'Delivered', 'Your order has been delivered.', '2016-02-27 00:00:00', 1, 0),
(6, '2016-02-27 01:44:48', 1, 62, 0, 10900, 'Cash on Pickup', 'Pending', 'Your order is on process.', '0000-00-00 00:00:00', 1, 0),
(7, '2016-02-27 05:46:45', 1, 63, 0, 7260, 'Cash on Delivery', 'Confirmed', 'Your order has been confirmed.', '0000-00-00 00:00:00', 1, 0),
(8, '2016-02-27 05:51:34', 1, 64, 70, 22268, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '0000-00-00 00:00:00', 1, 0),
(9, '2016-02-27 06:13:43', 1, 65, 70, 7260, 'Cash on Delivery', 'Pending', 'Your order is on process.', '0000-00-00 00:00:00', 1, 0),
(17, '2020-07-24 06:09:06', 3, 73, 50, 1500, 'Cash on Pickup', 'Pending', 'Your order is on process.', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `U_NAME` varchar(122) NOT NULL,
  `U_USERNAME` varchar(122) NOT NULL,
  `U_PASS` varchar(122) NOT NULL,
  `U_ROLE` varchar(30) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `U_NAME`, `U_USERNAME`, `U_PASS`, `U_ROLE`, `USERIMAGE`) VALUES
(124, 'Kenjie Palacios', 'kenjie', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff', 'photos/COC-war-base-design.jpg'),
(126, 'jude admin', 'jude', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', 'photos/10329236_874204835938922_6636897990257224477_n.jpg'),
(127, 'Craig Palacios', 'craig', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CUSTOMERID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDERID`),
  ADD KEY `USERID` (`USERID`),
  ADD KEY `PROID` (`PROID`),
  ADD KEY `ORDEREDNUM` (`ORDEREDNUM`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`PROID`);

--
-- Indexes for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  ADD PRIMARY KEY (`PROMOID`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`SETTINGID`);

--
-- Indexes for table `tblstockin`
--
ALTER TABLE `tblstockin`
  ADD PRIMARY KEY (`STOCKINID`),
  ADD KEY `PROID` (`PROID`,`USERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `ORDEREDNUM` (`ORDEREDNUM`),
  ADD KEY `CUSTOMERID` (`CUSTOMERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `PROID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  MODIFY `PROMOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `SETTINGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstockin`
--
ALTER TABLE `tblstockin`
  MODIFY `STOCKINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
