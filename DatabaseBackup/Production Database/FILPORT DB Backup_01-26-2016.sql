-- --------------------------------------------------------
-- Host:                         topconnection.asia
-- Server version:               5.5.45-cll-lve - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.5036
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for FilportTrackingSystem
CREATE DATABASE IF NOT EXISTS `FilportTrackingSystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `FilportTrackingSystem`;


-- Dumping structure for table FilportTrackingSystem.Broker
CREATE TABLE IF NOT EXISTS `Broker` (
  `BrokerId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `MiddleName` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `LastName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `HouseBuildingNoStreet` varchar(300) CHARACTER SET latin1 NOT NULL,
  `BarangarOrVillage` varchar(300) CHARACTER SET latin1 NOT NULL,
  `TownOrCityProvince` varchar(300) CHARACTER SET latin1 NOT NULL,
  `CountryId` int(11) NOT NULL,
  `ContactNo1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ContactNo2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`BrokerId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table FilportTrackingSystem.Broker: 5 rows
DELETE FROM `Broker`;
/*!40000 ALTER TABLE `Broker` DISABLE KEYS */;
INSERT INTO `Broker` (`BrokerId`, `FirstName`, `MiddleName`, `LastName`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ContactNo1`, `ContactNo2`, `IsActive`) VALUES
	(3, 'Niño Beb', 'A', 'Virtudazo', '205 DR Pilapil Street', 'San Miguel', 'Pasig City', 164, '09175858029', '', b'1'),
	(4, 'Elmie', 'C', 'Dionaldo', 'Cavite', 'Dasmarinas', 'Cavite City', 164, '09175858033', '', b'1'),
	(5, 'Monalisa', '', 'Malabanan', '111', 'BF Paranaque', 'Paranaque City', 164, '09175858032', '', b'1'),
	(6, 'Reymond', 'L', 'Belarma', '111', 'Navotas', 'Navotas City', 164, '09175858034', '', b'1'),
	(10, 'Alfred ', ' S', 'Jovita ', 'Annex Buliding F UY, Tipolo', 'Hi Way Mandaue', 'Cebu', 164, '035-205742', '', b'1');
/*!40000 ALTER TABLE `Broker` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Carrier
CREATE TABLE IF NOT EXISTS `Carrier` (
  `CarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CarrierName` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `OfficeNo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CarrierId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='From ShipperVessel to Carrier';

-- Dumping data for table FilportTrackingSystem.Carrier: 22 rows
DELETE FROM `Carrier`;
/*!40000 ALTER TABLE `Carrier` DISABLE KEYS */;
INSERT INTO `Carrier` (`CarrierId`, `IsActive`, `CarrierName`, `Address`, `OfficeNo`) VALUES
	(24, b'1', 'Nippon Yusen Kaisha (NYK) Line', 'Manila, Philippines', '527-9888'),
	(4, b'1', 'Regional Container Lines (RCL)', '', ''),
	(5, b'1', 'APL', NULL, NULL),
	(6, b'1', 'Ben Line Agencies Philippines Inc.', NULL, NULL),
	(7, b'1', 'CEL Logistics Inc.', NULL, NULL),
	(8, b'1', 'China Shipping Manila Agency Inc.', NULL, NULL),
	(9, b'1', 'CMA CGM Philippines Inc.', NULL, NULL),
	(10, b'1', 'Evergreen Shipping Agency Philippines Corp.', NULL, NULL),
	(11, b'1', '"K" Line Philippines Inc.', NULL, NULL),
	(12, b'1', 'MCC Transport', NULL, NULL),
	(13, b'1', 'MOL Philippines Inc.', NULL, NULL),
	(14, b'1', 'SITC Container Lines Philippines Inc.', '', ''),
	(15, b'1', 'Sky International Inc.', NULL, NULL),
	(16, b'1', 'TMS Ship Agencies Inc.', NULL, NULL),
	(17, b'1', 'Wan Hai Lines (Phils) Inc.', NULL, NULL),
	(18, b'1', 'Philippine Airlines (PAL)', NULL, NULL),
	(19, b'1', 'Cebu Pacific', NULL, NULL),
	(23, b'1', 'Gold Star Line/ Le Soleil Shipping Corp', '2nd Fl., Ciatdel Bldg., No. 637 Bonifacio Drive, Port Area Manila', '02-8479689'),
	(25, b'1', 'SITC Container Lines Co., LTD', '6th flr tower A, Two ECOM Center Bay Shore Avenue , Brgy 076 Pasay, City', '02-7981888'),
	(26, b'1', 'Hyundai Merchant marine Co.Ltd', 'Ground Floor, Citadel Bldg, 637 Bonifacio Drive, Port Area City of Manila', '02 4058112'),
	(27, b'1', 'Peak Freight Solutions Inc.', 'A unit C.S.T.I.L Bldg. Sta. Agueda St. cor Delbros ave., Pascor Drive, Paranaque City', '(02) 4032328'),
	(28, b'1', 'vanguard Logistics Services', '5/F Fly Ace Corporate Center, 13# Coral Way, central Biz Center Park, Pasay', '(02) 5567421');
/*!40000 ALTER TABLE `Carrier` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.CarrierByJobFile
CREATE TABLE IF NOT EXISTS `CarrierByJobFile` (
  `CarrierByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` date DEFAULT NULL,
  `EstArrivalTime` date DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  PRIMARY KEY (`CarrierByJobFileId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='From ShipperByVessel to CarrierByJobFile';

-- Dumping data for table FilportTrackingSystem.CarrierByJobFile: 19 rows
DELETE FROM `CarrierByJobFile`;
/*!40000 ALTER TABLE `CarrierByJobFile` DISABLE KEYS */;
INSERT INTO `CarrierByJobFile` (`CarrierByJobFileId`, `JobFileId`, `CarrierId`, `VesselVoyageNo`, `DischargeTime`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`) VALUES
	(1, '1', 23, 'Hyundai Sprinter 350/S', '0000-00-00 00:00:00', '2016-01-05', '2016-01-16', '0000-00-00 00:00:00'),
	(2, '2', 24, 'HAMMONIA BEROLINA 006N', '0000-00-00 00:00:00', '2015-12-07', '2015-12-22', '0000-00-00 00:00:00'),
	(3, '3', 24, 'HAMMONIA BEROLINA 006N', '0000-00-00 00:00:00', '2015-12-07', '2015-12-22', '0000-00-00 00:00:00'),
	(4, '4', 24, 'SINAR SUMBA V.376', '0000-00-00 00:00:00', '2015-12-10', '2015-12-22', '0000-00-00 00:00:00'),
	(5, '5', 4, 'MOL HORIZON V.1042E', '0000-00-00 00:00:00', '2015-12-15', '2015-12-19', '0000-00-00 00:00:00'),
	(6, '6', 26, 'APL NEW JERSEY V.041W', '0000-00-00 00:00:00', '0000-00-00', '2016-05-01', '2016-05-01 00:00:00'),
	(7, '7', 4, 'HANSA ROTENBURG 036', '0000-00-00 00:00:00', '2015-12-20', '2016-01-04', '0000-00-00 00:00:00'),
	(8, '8', 26, 'NYK ATHENA V097W', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00'),
	(9, '9', 25, 'FSK BUSAN V.1601N', '0000-00-00 00:00:00', '2016-01-18', '2016-01-23', '2016-01-23 06:00:00'),
	(10, '10', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2015-01-12', '0000-00-00 00:00:00'),
	(11, '11', 25, 'SITC TOKYO V.1541N', '0000-00-00 00:00:00', '2015-12-14', '0000-00-00', '0000-00-00 00:00:00'),
	(12, '12', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '2016-01-07', '0000-00-00 00:00:00'),
	(13, '13', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '5016-01-07', '0000-00-00 00:00:00'),
	(14, '14', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2015-01-12', '2015-01-12 13:00:00'),
	(15, '15', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '2016-01-07', '0000-00-00 00:00:00'),
	(16, '16', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2016-01-12', '2016-01-12 18:00:00'),
	(17, '17', 10, 'UNI-ADROIT 0369-356A', '0000-00-00 00:00:00', '2016-01-10', '2016-01-19', '0000-00-00 00:00:00'),
	(18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '2016-01-26 00:01:00'),
	(19, '19', 10, 'YM ANTWERP 070N', '0000-00-00 00:00:00', '2016-01-05', '2016-01-26', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `CarrierByJobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.CarrierByJobFileHistory
CREATE TABLE IF NOT EXISTS `CarrierByJobFileHistory` (
  `CarrierByJobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) NOT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` date DEFAULT NULL,
  `EstArrivalTime` date DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`CarrierByJobFileHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.CarrierByJobFileHistory: 30 rows
DELETE FROM `CarrierByJobFileHistory`;
/*!40000 ALTER TABLE `CarrierByJobFileHistory` DISABLE KEYS */;
INSERT INTO `CarrierByJobFileHistory` (`CarrierByJobFileHistoryId`, `CarrierByJobFileId`, `JobFileId`, `CarrierId`, `VesselVoyageNo`, `DischargeTime`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, '1', 23, 'Hyundai Sprinter 350/S', '0000-00-00 00:00:00', '2016-01-05', '2016-01-16', '0000-00-00 00:00:00', '2016-01-21 17:07:00', 11),
	(2, 2, '2', 4, 'HAMMONIA BEROLINA 006N', '0000-00-00 00:00:00', '2015-12-07', '2015-12-22', '0000-00-00 00:00:00', '2016-01-22 10:13:00', 11),
	(3, 2, '2', 24, 'HAMMONIA BEROLINA 006N', '0000-00-00 00:00:00', '2015-12-07', '2015-12-22', '0000-00-00 00:00:00', '2016-01-22 10:21:00', 11),
	(4, 3, '3', 24, 'HAMMONIA BEROLINA 006N', '0000-00-00 00:00:00', '2015-12-07', '2015-12-22', '0000-00-00 00:00:00', '2016-01-22 10:32:00', 11),
	(5, 4, '4', 24, 'SINAR SUMBA V.376', '0000-00-00 00:00:00', '2015-12-10', '2015-12-22', '0000-00-00 00:00:00', '2016-01-22 10:47:00', 11),
	(6, 4, '4', 24, 'SINAR SUMBA V.376', '0000-00-00 00:00:00', '2015-12-10', '2015-12-22', '0000-00-00 00:00:00', '2016-01-22 10:53:00', 11),
	(7, 5, '5', 4, 'MOL HORIZON V.1042E', '0000-00-00 00:00:00', '2015-12-15', '2015-12-19', '0000-00-00 00:00:00', '2016-01-22 11:23:00', 11),
	(8, 6, '6', 26, 'APL NEW JERSEY V.041W', '0000-00-00 00:00:00', '0000-00-00', '2016-05-01', '2016-05-01 00:00:00', '2016-01-22 14:58:00', 18),
	(9, 7, '7', 4, 'HANSA ROTENBURG 036', '0000-00-00 00:00:00', '2015-12-20', '2016-01-04', '0000-00-00 00:00:00', '2016-01-22 15:27:00', 11),
	(10, 8, '8', 26, 'NYK ATHENA V097W', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '2016-01-22 15:39:00', 18),
	(11, 9, '9', 25, 'FSK BUSAN V.1601N', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '2016-01-22 15:46:00', 18),
	(12, 9, '9', 25, 'FSK BUSAN V.1601N', '0000-00-00 00:00:00', '2016-01-18', '2016-01-23', '2016-01-23 06:00:00', '2016-01-22 15:57:00', 18),
	(13, 10, '10', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2015-01-12', '0000-00-00 00:00:00', '2016-01-22 16:01:00', 11),
	(14, 11, '11', 25, 'SITC TOKYO V.1541N', '0000-00-00 00:00:00', '2015-12-14', '0000-00-00', '0000-00-00 00:00:00', '2016-01-22 16:17:00', 18),
	(15, 12, '12', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '2016-01-07', '0000-00-00 00:00:00', '2016-01-22 16:32:00', 11),
	(16, 13, '13', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '5016-01-07', '0000-00-00 00:00:00', '2016-01-22 16:44:00', 11),
	(17, 14, '14', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2015-01-12', '2015-01-12 13:00:00', '2016-01-22 16:46:00', 11),
	(18, 15, '15', 5, 'CHATTANOOGA 122', '0000-00-00 00:00:00', '2015-12-21', '2016-01-07', '0000-00-00 00:00:00', '2016-01-22 16:55:00', 11),
	(19, 16, '16', 24, 'NYK LAURA 019N', '0000-00-00 00:00:00', '2015-12-07', '2016-01-12', '2016-01-12 18:00:00', '2016-01-22 17:02:00', 11),
	(20, 17, '17', 10, 'UNI-ADROIT 0369-356A', '0000-00-00 00:00:00', '2016-01-10', '2016-01-19', '0000-00-00 00:00:00', '2016-01-25 13:51:00', 18),
	(21, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 14:05:00', 18),
	(22, 19, '19', 10, 'YM ANTWERP 070N', '0000-00-00 00:00:00', '2016-01-05', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 14:23:00', 18),
	(23, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:31:00', 18),
	(24, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:31:00', 18),
	(25, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:32:00', 18),
	(26, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:32:00', 18),
	(27, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:34:00', 18),
	(28, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '0000-00-00 00:00:00', '2016-01-25 16:44:00', 1),
	(29, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '2016-01-26 00:00:00', '2016-01-25 17:23:00', 18),
	(30, 18, '18', 10, 'UNI-PROBITY 0370-216A', '0000-00-00 00:00:00', '2016-01-16', '2016-01-26', '2016-01-26 00:01:00', '2016-01-25 17:24:00', 18);
/*!40000 ALTER TABLE `CarrierByJobFileHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ColorSelectivity
CREATE TABLE IF NOT EXISTS `ColorSelectivity` (
  `ColorSelectivityId` int(11) NOT NULL AUTO_INCREMENT,
  `ColorSelectivityName` varchar(50) NOT NULL,
  PRIMARY KEY (`ColorSelectivityId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ColorSelectivity: 3 rows
DELETE FROM `ColorSelectivity`;
/*!40000 ALTER TABLE `ColorSelectivity` DISABLE KEYS */;
INSERT INTO `ColorSelectivity` (`ColorSelectivityId`, `ColorSelectivityName`) VALUES
	(1, 'Yellow'),
	(2, 'Red'),
	(3, 'Green');
/*!40000 ALTER TABLE `ColorSelectivity` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Consignee
CREATE TABLE IF NOT EXISTS `Consignee` (
  `ConsigneeId` int(11) NOT NULL AUTO_INCREMENT,
  `ConsigneeName` varchar(100) NOT NULL,
  `HouseBuildingNoOrStreet` varchar(300) NOT NULL,
  `BarangayOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` varchar(300) NOT NULL,
  `OfficeNumber` varchar(1000) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsigneeId`),
  UNIQUE KEY `ConsigneeName` (`ConsigneeName`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Dumping data for table FilportTrackingSystem.Consignee: 21 rows
DELETE FROM `Consignee`;
/*!40000 ALTER TABLE `Consignee` DISABLE KEYS */;
INSERT INTO `Consignee` (`ConsigneeId`, `ConsigneeName`, `HouseBuildingNoOrStreet`, `BarangayOrVillage`, `TownOrCityProvince`, `CountryId`, `OfficeNumber`, `EmailAddress`, `DateAdded`, `IsActive`) VALUES
	(4, 'Eccosential Foods Corporation', 'Warehouse #8 Mercury Avenue ', 'Bagumbayan Libis', 'Quezon City', '164', '09178607774', NULL, '2015-12-23', b'1'),
	(5, '101 Cargo Solutions Logistics', '308 The One Executive Office Building', '5 West Avenue ', 'Quezon City', '164', '02-7097587', NULL, '2016-01-22', b'1'),
	(6, 'Aguacate Marketing Corporation', 'Lot 91-A Bagsakan Road ', 'FTI Complex', 'Taguig City ', '164', '02-3106675', NULL, '2016-01-04', b'1'),
	(7, 'Altus Communications Inc.', 'P.E Antonio Street corner F. Legazpi St. ', 'Brgy. Ugong', 'Pasig City', '164', '02-8365828', NULL, '2016-01-04', b'1'),
	(8, 'Busco Sugar Milling Company Inc.', '4th Floor Corinthian Plaza', 'Paseo de Roxas ', 'Makati City', '164', '08-8178403', NULL, '2016-01-04', b'1'),
	(9, 'Casco Commodity Inc.', '2291 TAO Corporate Center', 'Don Chino Roces Avenue', 'Makati City', '164', '02-8481021', NULL, '2016-01-04', b'1'),
	(10, 'Cocopalm Agri Group Inc.', '12th Floor Security Bank Center', '6776 Ayala Avenue', 'Makati City', '164', '02-8100164', NULL, '2016-01-04', b'1'),
	(11, 'Dizon Farms Produce Inc.', 'Lot 91-A Bagsakan Road', 'FTI Complex', 'Taguig City', '164', '02-5327791', NULL, '2016-01-04', b'1'),
	(12, 'Dumaguete Coconut Mills Inc.', '12th Floor Security Bank Center', '6776 Ayala Avenue', 'Makati City', '164', '02-7521556', NULL, '2016-01-04', b'1'),
	(13, 'Dumaguete Suy Inc.', '12th Floor Security Bank Center', '6776 Ayala Avenue', 'Makati City', '164', '02-7521556', NULL, '2016-01-04', b'1'),
	(14, 'E-Blue Holdings and Trading Corp.', 'The Place Bldg., National Highway', 'Tunasan', 'Muntinlupa City', '164', '02-8623041', NULL, '2016-01-04', b'1'),
	(15, 'Equilibrium Intertrade Corp.', 'The Place Bldg., National Highway', 'Tunasan', 'Muntinlupa City', '164', '02-8623041', NULL, '2016-01-04', b'1'),
	(16, 'Global Fresh Products Inc.', 'Lot 91-A Bagsakan Road', 'FTI Complex', 'Taguig City', '164', '02-5327791', NULL, '2016-01-04', b'1'),
	(17, 'Leyte Agri Corp', 'AA Cmpd Brgy. Ipil Ormoc City/', '16th Floor Citibank Tower Paseo de Roxas ', 'Makati City', '164', '02-8487917', NULL, '2016-01-04', b'1'),
	(18, 'LG Petro Prime Corp', 'Unit 2N Scandia Tower South Forbes Blvd.,', 'Brgy. Ichican', 'Silang Cavite', '164', '0917-5177852', NULL, '2016-01-04', b'1'),
	(19, 'Malinta Corrugated Boxes Mfg. Corp.', 'Suite 1706-A West Tower PSEC Exchange Road', 'Ortigas Center ', 'Pasig City', '164', '02-6876410', NULL, '2016-01-04', b'1'),
	(20, 'Open Communications Inc.', 'P.E Antonio Street corner F. Legazpi St.', 'Brgy. Ugong', 'Pasig City', '164', '02-8365828', NULL, '2016-01-04', b'1'),
	(21, 'adsadassd', 'asdasd', '12123', '123123123', '1', '123123123', NULL, '2016-01-19', b'0'),
	(33, 'MALINTA CORRUGATED BOXES MFG.CORP', 'SUITE 1706-A WEST TOWER, PSIC EXCHANGE ROAD', 'ORTIGAS CENTER,', 'PASIG CITY', '164', '02-6312616', NULL, '2016-01-22', b'0'),
	(32, '101 Cargo Solutions Logistics FAO AGC Flat Glass Phils. Inc.', '308 The One Executive Office Bldg., 5 West Avenue, Quezon City', '730 MH Del Pilar St., Brgy. Pinagbuhatan Pasig City', 'Quezon City', '164', '02-7097587', NULL, '2016-01-21', b'1'),
	(31, 'Jerbylyn Agtutubo', '13 J. Cruz St.', 'Brgy. Ugong', 'Pasig City', '164', '02-6352002', NULL, '2016-01-21', b'1');
/*!40000 ALTER TABLE `Consignee` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ConsigneeContacts
CREATE TABLE IF NOT EXISTS `ConsigneeContacts` (
  `ConsigneeContactId` int(11) NOT NULL AUTO_INCREMENT,
  `ConsigneeId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNo1` varchar(20) NOT NULL,
  `ContactNo2` varchar(20) NOT NULL,
  PRIMARY KEY (`ConsigneeContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ConsigneeContacts: 6 rows
DELETE FROM `ConsigneeContacts`;
/*!40000 ALTER TABLE `ConsigneeContacts` DISABLE KEYS */;
INSERT INTO `ConsigneeContacts` (`ConsigneeContactId`, `ConsigneeId`, `FirstName`, `MiddleName`, `LastName`, `ContactNo1`, `ContactNo2`) VALUES
	(1, 1, 'Eli', 'A.', 'Montefalcon', '09195564919', 'eli@the-asiagroup.co'),
	(2, 1, 'Momer', 'D.', 'Paderes', '556-4459', 'mer@yahoo.com'),
	(3, 2, 'Arne', 'P.', 'Paragas', '(02) 868-6651', 'app@yahoo.com.ph'),
	(4, 2, 'Jowelyn', 'D.', 'Arcilla', '564-8956', 'jda@th-asiagroup.com'),
	(5, 3, 'Ben', 'T.', 'Tambling', '452-8965', 'btam@gmail.com'),
	(6, 4, 'Edwin', '', 'Rubio', '09178607774', 'eorubio@tmc.com.ph');
/*!40000 ALTER TABLE `ConsigneeContacts` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ContainerByCarrier
CREATE TABLE IF NOT EXISTS `ContainerByCarrier` (
  `ContainerByCarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerNo` varchar(50) NOT NULL DEFAULT '0',
  `ContainerSize` varchar(50) NOT NULL DEFAULT '0',
  `CarrierByJobFileId` int(11) NOT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `RefEntryNo` varchar(50) DEFAULT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  `DateReceivedAtWhse` datetime DEFAULT NULL,
  PRIMARY KEY (`ContainerByCarrierId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ContainerByCarrier: 50 rows
DELETE FROM `ContainerByCarrier`;
/*!40000 ALTER TABLE `ContainerByCarrier` DISABLE KEYS */;
INSERT INTO `ContainerByCarrier` (`ContainerByCarrierId`, `ContainerNo`, `ContainerSize`, `CarrierByJobFileId`, `NoOfCartons`, `RefEntryNo`, `TruckerName`, `StartOfStorage`, `Lodging`, `DateBOCCleared`, `HaulerOrTruckId`, `TargetDeliveryDate`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`, `DateReceivedAtWhse`) VALUES
	(1, 'ZGLC908336', '2x20', 1, 10, 'C6222', '', '2016-01-23 00:00:00', '0000-00-00 00:00:00', '2016-01-22 00:00:00', 3, '2016-01-23 00:00:00', '2016-01-19 00:00:00', '2016-01-22 00:00:00', '2016-01-18 00:00:00', '2016-01-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'NYKU5100383', '1X40', 2, 2350, 'C294338', '', '2015-12-30 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2015-12-29 00:00:00', '0000-00-00 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'NYKU4944060', '1X40', 3, 2350, '', '', '2015-12-30 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2015-12-29 00:00:00', '0000-00-00 00:00:00', '2015-12-22 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'NYKU0784489', '1X40', 4, 4900, 'C294352', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'HDMU5488121', '1X40 REFEER', 6, 1080, 'C15542', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'NYKU0795478', '1X40', 4, 0, 'C294352', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'ZGLC851329', '20', 1, 0, 'C6222', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'HDMU5488121', '1X40', 8, 1080, 'c15542', '', '2016-01-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'TEMU8158359', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'TCNU7730222', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'TEMU7419381', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'TCNU6500483', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'TCNU7717560', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'TEMU6332939', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'UETU5249472', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'SEGU4315052', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'SEGU4868171', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 'GLDU7551691', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 'TGHU6806808', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 'SEGU4319090', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 'SEGU4094326', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 'DFSU7678987', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 'TEMU8147631', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 'RFCU5004880', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 'GESU6625197', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 'SEGU4784358', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 'SITU9095576', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 'RFCU5003672', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 'CAIU9567297', '1x20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(30, 'RFCU5131816', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(31, 'CAIU9602886', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(32, 'TEMU7533481', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(33, 'TEMU7406147', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(34, 'RFCU5129465', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(35, 'CAIU9144192', '1X40', 10, 2207, 'C11214', '', '2015-01-20 00:00:00', '2015-01-12 00:00:00', '2015-01-15 00:00:00', 0, '2016-01-19 00:00:00', '2015-01-15 00:00:00', '0000-00-00 00:00:00', '2015-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 01:05:00', '2015-01-31 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00'),
	(36, 'TCNU6828045', '1x40', 12, 1920, 'C656', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(37, 'SITU9042600', '1x40', 11, 0, '296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 12:05:00', '2015-01-17 00:00:00', '2016-01-06 06:24:00', '0000-00-00 00:00:00'),
	(38, 'SITU9040104', '1x40', 11, 0, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 03:30:00', '2015-01-17 00:00:00', '2016-01-06 01:51:00', '0000-00-00 00:00:00'),
	(39, 'SEGU4343080', '1X40', 11, 0, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '0000-00-00 00:00:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 01:16:00', '2015-01-17 00:00:00', '2016-01-05 22:42:00', '0000-00-00 00:00:00'),
	(40, 'OCBU5010052', '1X40', 11, 17500, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2015-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-01-06 12:20:00', '2015-01-17 00:00:00', '2015-01-06 02:51:00', '0000-00-00 00:00:00'),
	(41, 'FSCU8358670', '1x40', 13, 2974, 'C647', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00'),
	(42, 'TCLU9725043', '1X40', 14, 1500, 'C11320', '\n											 Cher Transport Development Service Cooperative											 ', '2016-01-20 00:00:00', '2016-01-12 00:00:00', '2016-01-15 00:00:00', 7, '2016-01-19 00:00:00', '2016-01-15 00:00:00', '2016-01-15 00:00:00', '2016-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 00:00:00', '2016-02-01 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00'),
	(43, 'UETU5286434', '1X40', 11, 0, '	C296756', '', '2016-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 05:40:00', '2016-01-17 00:00:00', '2016-01-05 03:53:00', '0000-00-00 00:00:00'),
	(44, 'TEMU6324810', '1X40', 11, 0, 'C296756', '', '2016-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 0, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2016-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-01-06 03:30:00', '2016-01-17 00:00:00', '2016-01-06 01:51:00', '0000-00-00 00:00:00'),
	(45, 'SEGU5032930', '1x40', 15, 5000, 'C642', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00'),
	(46, 'TCNU5402190', '1x40', 15, 5000, 'C642', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00'),
	(47, 'NYKU4969069', '1X40', 16, 3500, 'C11321', '', '2016-01-20 00:00:00', '2016-01-12 00:00:00', '2016-01-15 00:00:00', 0, '2016-01-19 00:00:00', '2016-01-14 00:00:00', '2016-01-15 00:00:00', '2016-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 00:00:00', '2016-01-31 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00'),
	(48, 'EISU5704511', '1X40', 17, 2036, 'C17042', '\n											 REDKARGO Express Inc.											 ', '2016-01-25 00:00:00', '2016-01-19 00:00:00', '2016-01-20 00:00:00', 10, '2016-01-21 00:00:00', '2016-01-19 00:00:00', '2016-01-20 00:00:00', '2016-01-19 00:00:00', '2016-01-19 00:00:00', '2016-01-22 00:00:00', '2016-01-22 00:00:00', '2016-01-22 00:00:00', '2016-01-21 00:00:00', '2016-01-22 00:00:00', '0000-00-00 00:00:00'),
	(49, 'EGSU5012227', '1x40', 18, 1519, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 'EISU3955436', '1x20', 19, 1400, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ContainerByCarrier` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ContainerByCarrierHistory
CREATE TABLE IF NOT EXISTS `ContainerByCarrierHistory` (
  `ContainerByCarrierHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerByCarrierId` int(11) NOT NULL,
  `ContainerNo` varchar(50) NOT NULL DEFAULT '0',
  `ContainerSize` varchar(50) NOT NULL DEFAULT '0',
  `CarrierByJobFileId` int(11) NOT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `RefEntryNo` varchar(50) DEFAULT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  `DateReceivedAtWhse` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ContainerByCarrierHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ContainerByCarrierHistory: 50 rows
DELETE FROM `ContainerByCarrierHistory`;
/*!40000 ALTER TABLE `ContainerByCarrierHistory` DISABLE KEYS */;
INSERT INTO `ContainerByCarrierHistory` (`ContainerByCarrierHistoryId`, `ContainerByCarrierId`, `ContainerNo`, `ContainerSize`, `CarrierByJobFileId`, `NoOfCartons`, `RefEntryNo`, `TruckerName`, `StartOfStorage`, `Lodging`, `DateBOCCleared`, `HaulerOrTruckId`, `TargetDeliveryDate`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`, `DateReceivedAtWhse`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 'ZGLC908336', '2x20', 1, 10, 'C6222', '', '2016-01-23 00:00:00', '0000-00-00 00:00:00', '2016-01-22 00:00:00', 3, '2016-01-23 00:00:00', '2016-01-19 00:00:00', '2016-01-22 00:00:00', '2016-01-18 00:00:00', '2016-01-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 12:01:00', 18),
	(2, 2, 'NYKU5100383', '1X40', 2, 2350, 'C294338', '', '2015-12-30 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2015-12-29 00:00:00', '0000-00-00 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 10:23:00', 11),
	(3, 3, 'NYKU4944060', '1X40', 3, 2350, '', '', '2015-12-30 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2015-12-29 00:00:00', '0000-00-00 00:00:00', '2015-12-22 00:00:00', '2015-12-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 10:42:00', 11),
	(4, 4, 'NYKU0784489', '1X40', 4, 4900, 'C294352', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 11:26:00', 11),
	(7, 7, 'HDMU5488121', '1X40 REFEER', 6, 1080, 'C15542', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:07:00', 18),
	(5, 5, 'NYKU0795478', '1X40', 4, 0, 'C294352', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 11:26:00', 11),
	(6, 6, 'ZGLC851329', '20', 1, 0, 'C6222', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 12:03:00', 18),
	(8, 8, 'HDMU5488121', '1X40', 8, 1080, 'c15542', '', '2016-01-22 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:41:00', 18),
	(9, 9, 'TEMU8158359', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(10, 10, 'TCNU7730222', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(11, 11, 'TEMU7419381', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(12, 12, 'TCNU6500483', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(13, 13, 'TCNU7717560', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(14, 14, 'TEMU6332939', '1X40', 9, 137, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(15, 15, 'UETU5249472', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(16, 16, 'SEGU4315052', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(17, 17, 'SEGU4868171', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(18, 18, 'GLDU7551691', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(19, 19, 'TGHU6806808', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(20, 20, 'SEGU4319090', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(21, 21, 'SEGU4094326', '', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(22, 22, 'DFSU7678987', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(23, 23, 'TEMU8147631', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(24, 24, 'RFCU5004880', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(25, 25, 'GESU6625197', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(26, 26, 'SEGU4784358', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(27, 27, 'SITU9095576', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(28, 28, 'RFCU5003672', '1X40', 9, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:55:00', 18),
	(29, 29, 'CAIU9567297', '1x20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(30, 30, 'RFCU5131816', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(31, 31, 'CAIU9602886', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(32, 32, 'TEMU7533481', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(33, 33, 'TEMU7406147', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(34, 34, 'RFCU5129465', '1X20', 7, 21600, 'C533', '', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-06 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-27 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 15:57:00', 11),
	(35, 35, 'CAIU9144192', '1X40', 10, 2207, 'C11214', '', '2015-01-20 00:00:00', '2015-01-12 00:00:00', '2015-01-15 00:00:00', 0, '2016-01-19 00:00:00', '2015-01-15 00:00:00', '0000-00-00 00:00:00', '2015-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 01:05:00', '2015-01-31 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00', '2016-01-22 16:35:00', 11),
	(36, 36, 'TCNU6828045', '1x40', 12, 1920, 'C656', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 16:38:00', 11),
	(37, 37, 'SITU9042600', '1x40', 11, 0, '296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 12:05:00', '2015-01-17 00:00:00', '2016-01-06 06:24:00', '0000-00-00 00:00:00', '2016-01-22 16:43:00', 18),
	(38, 38, 'SITU9040104', '1x40', 11, 0, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 03:30:00', '2015-01-17 00:00:00', '2016-01-06 01:51:00', '0000-00-00 00:00:00', '2016-01-22 16:43:00', 18),
	(39, 39, 'SEGU4343080', '1X40', 11, 0, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '0000-00-00 00:00:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 01:16:00', '2015-01-17 00:00:00', '2016-01-05 22:42:00', '0000-00-00 00:00:00', '2016-01-22 16:43:00', 18),
	(40, 40, 'OCBU5010052', '1X40', 11, 17500, 'C296756', '\n											 REDKARGO Express Inc.											 ', '2015-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 10, '2015-01-06 00:00:00', '2016-01-05 00:00:00', '2015-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-01-06 12:20:00', '2015-01-17 00:00:00', '2015-01-06 02:51:00', '0000-00-00 00:00:00', '2016-01-22 16:43:00', 18),
	(41, 41, 'FSCU8358670', '1x40', 13, 2974, 'C647', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-08 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-08 00:00:00', '0000-00-00 00:00:00', '2016-01-22 16:49:00', 11),
	(42, 42, 'TCLU9725043', '1X40', 14, 1500, 'C11320', '\n											 Cher Transport Development Service Cooperative											 ', '2016-01-20 00:00:00', '2016-01-12 00:00:00', '2016-01-15 00:00:00', 7, '2016-01-19 00:00:00', '2016-01-15 00:00:00', '2016-01-15 00:00:00', '2016-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 00:00:00', '2016-02-01 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00', '2016-01-22 16:53:00', 11),
	(43, 43, 'UETU5286434', '1X40', 11, 0, '	C296756', '', '2016-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-06 05:40:00', '2016-01-17 00:00:00', '2016-01-05 03:53:00', '0000-00-00 00:00:00', '2016-01-22 17:02:00', 18),
	(44, 44, 'TEMU6324810', '1X40', 11, 0, 'C296756', '', '2016-01-02 00:00:00', '0000-00-00 00:00:00', '2016-01-05 00:00:00', 0, '2016-01-06 00:00:00', '2016-01-05 00:00:00', '2016-01-05 12:58:00', '2015-12-28 00:00:00', '2015-12-28 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-01-06 03:30:00', '2016-01-17 00:00:00', '2016-01-06 01:51:00', '0000-00-00 00:00:00', '2016-01-22 17:02:00', 18),
	(45, 45, 'SEGU5032930', '1x40', 15, 5000, 'C642', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', '2016-01-22 17:03:00', 11),
	(46, 46, 'TCNU5402190', '1x40', 15, 5000, 'C642', '', '2016-01-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2016-01-11 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-29 00:00:00', '2016-01-25 00:00:00', '0000-00-00 00:00:00', '2016-01-22 17:03:00', 11),
	(47, 47, 'NYKU4969069', '1X40', 16, 3500, 'C11321', '', '2016-01-20 00:00:00', '2016-01-12 00:00:00', '2016-01-15 00:00:00', 0, '2016-01-19 00:00:00', '2016-01-14 00:00:00', '2016-01-15 00:00:00', '2016-01-12 00:00:00', '2016-01-12 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 00:00:00', '2016-01-31 00:00:00', '2016-01-18 00:00:00', '0000-00-00 00:00:00', '2016-01-22 17:09:00', 11),
	(48, 48, 'EISU5704511', '1X40', 17, 2036, 'C17042', '\n											 REDKARGO Express Inc.											 ', '2016-01-25 00:00:00', '2016-01-19 00:00:00', '2016-01-20 00:00:00', 10, '2016-01-21 00:00:00', '2016-01-19 00:00:00', '2016-01-20 00:00:00', '2016-01-19 00:00:00', '2016-01-19 00:00:00', '2016-01-22 00:00:00', '2016-01-22 00:00:00', '2016-01-22 00:00:00', '2016-01-21 00:00:00', '2016-01-22 00:00:00', '0000-00-00 00:00:00', '2016-01-25 13:55:00', 18),
	(49, 49, 'EGSU5012227', '1x40', 18, 1519, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 14:09:00', 18),
	(50, 50, 'EISU3955436', '1x20', 19, 1400, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-25 14:24:00', 18);
/*!40000 ALTER TABLE `ContainerByCarrierHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Countries
CREATE TABLE IF NOT EXISTS `Countries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL DEFAULT '0',
  `CountryCode` char(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Countries: 236 rows
DELETE FROM `Countries`;
/*!40000 ALTER TABLE `Countries` DISABLE KEYS */;
INSERT INTO `Countries` (`CountryId`, `CountryName`, `CountryCode`) VALUES
	(1, 'Afghanistan ', ''),
	(2, 'Albania ', ''),
	(3, 'Algeria ', ''),
	(4, 'American Samoa (USA)', ''),
	(5, 'Andorra ', ''),
	(6, 'Angola ', ''),
	(7, 'Anguilla (UK)', ''),
	(8, 'Antigua and Barbuda ', ''),
	(9, 'Argentina ', ''),
	(10, 'Armenia ', ''),
	(11, 'Aruba (Netherlands)', ''),
	(12, 'Australia ', ''),
	(13, 'Austria ', ''),
	(14, 'Azerbaijan ', ''),
	(15, 'Bahamas ', ''),
	(16, 'Bahrain ', ''),
	(17, 'Bangladesh ', ''),
	(18, 'Barbados ', ''),
	(19, 'Belarus ', ''),
	(20, 'Belgium ', ''),
	(21, 'Belize ', ''),
	(22, 'Benin ', ''),
	(23, 'Bermuda (UK)', ''),
	(24, 'Bhutan ', ''),
	(25, 'Bolivia ', ''),
	(26, 'Bosnia and Herzegovina ', ''),
	(27, 'Botswana ', ''),
	(28, 'Brazil ', ''),
	(29, 'British Virgin Islands (UK)', ''),
	(30, 'Brunei ', ''),
	(31, 'Bulgaria ', ''),
	(32, 'Burkina Faso ', ''),
	(33, 'Burundi ', ''),
	(34, 'Cambodia ', ''),
	(35, 'Cameroon ', ''),
	(36, 'Canada ', ''),
	(37, 'Cape Verde ', ''),
	(38, 'Cayman Islands (UK)', ''),
	(39, 'Central African Republic ', ''),
	(40, 'Chad ', ''),
	(41, 'Chile ', ''),
	(42, 'China', ''),
	(43, 'Christmas Island (Australia)', ''),
	(44, 'Cocos (Keeling) Islands (Australia)', ''),
	(45, 'Colombia ', ''),
	(46, 'Comoros ', ''),
	(47, 'Cook Islands (New Zealand)', ''),
	(48, 'Costa Rica ', ''),
	(49, 'Croatia ', ''),
	(50, 'Cuba ', ''),
	(51, 'Curacao (Netherlands)', ''),
	(52, 'Cyprus ', ''),
	(53, 'Czech Republic ', ''),
	(54, 'D.R Congo ', ''),
	(55, 'Denmark ', ''),
	(56, 'Djibouti ', ''),
	(57, 'Dominica ', ''),
	(58, 'Dominican Republic ', ''),
	(59, 'East Timor (Timor-Leste) ', ''),
	(60, 'Ecuador ', ''),
	(61, 'Egypt ', ''),
	(62, 'El Salvador ', ''),
	(63, 'Equatorial Guinea ', ''),
	(64, 'Eritrea ', ''),
	(65, 'Estonia ', ''),
	(66, 'Ethiopia ', ''),
	(67, 'Falkland Islands (UK)', ''),
	(68, 'Faroe Islands (Denmark)', ''),
	(69, 'Fiji ', ''),
	(70, 'Finland ', ''),
	(71, 'France ', ''),
	(72, 'French Guiana (France)', ''),
	(73, 'French Polynesia (France)', ''),
	(74, 'Gabon ', ''),
	(75, 'Gambia ', ''),
	(76, 'Georgia ', ''),
	(77, 'Germany ', ''),
	(78, 'Ghana ', ''),
	(79, 'Gibraltar (UK)', ''),
	(80, 'Greece ', ''),
	(81, 'Greenland (Denmark)', ''),
	(82, 'Grenada ', ''),
	(83, 'Guam (USA)', ''),
	(84, 'Guatemala ', ''),
	(85, 'Guernsey (UK)', ''),
	(86, 'Guinea ', ''),
	(87, 'Guinea-Bissau ', ''),
	(88, 'Guyana ', ''),
	(89, 'Haiti ', ''),
	(90, 'Honduras ', ''),
	(91, 'Hong Kong (China)', ''),
	(92, 'Hungary ', ''),
	(93, 'Iceland ', ''),
	(94, 'India ', ''),
	(95, 'Indonesia ', ''),
	(96, 'Iran ', ''),
	(97, 'Iraq ', ''),
	(98, 'Ireland ', ''),
	(99, 'Isle of Man (UK)', ''),
	(100, 'Israel ', ''),
	(101, 'Italy ', ''),
	(102, 'Ivory Coast ', ''),
	(103, 'Jamaica ', ''),
	(104, 'Japan ', ''),
	(105, 'Jersey (UK)', ''),
	(106, 'Jordan ', ''),
	(107, 'Kazakhstan ', ''),
	(108, 'Kenya ', ''),
	(109, 'Kiribati ', ''),
	(110, 'Kosovo', ''),
	(111, 'Kuwait ', ''),
	(112, 'Kyrgyzstan ', ''),
	(113, 'Laos ', ''),
	(114, 'Latvia ', ''),
	(115, 'Lebanon ', ''),
	(116, 'Lesotho ', ''),
	(117, 'Liberia ', ''),
	(118, 'Libya ', ''),
	(119, 'Liechtenstein ', ''),
	(120, 'Lithuania ', ''),
	(121, 'Luxembourg ', ''),
	(122, 'Macedonia ', ''),
	(123, 'Madagascar ', ''),
	(124, 'Malawi ', ''),
	(125, 'Malaysia', ''),
	(126, 'Maldives ', ''),
	(127, 'Mali ', ''),
	(128, 'Malta ', ''),
	(129, 'Marshall Islands ', ''),
	(130, 'Mauritania ', ''),
	(131, 'Mauritius ', ''),
	(132, 'Mexico ', ''),
	(133, 'Micronesia ', ''),
	(134, 'Moldova ', ''),
	(135, 'Monaco ', ''),
	(136, 'Mongolia ', ''),
	(137, 'Montenegro ', ''),
	(138, 'Montserrat (UK)', ''),
	(139, 'Morocco ', ''),
	(140, 'Mozambique ', ''),
	(141, 'Myanmar ', ''),
	(142, 'Namibia ', ''),
	(143, 'Nauru ', ''),
	(144, 'Nepal ', ''),
	(145, 'Netherlands ', ''),
	(146, 'New Caledonia (France)', ''),
	(147, 'New Zealand ', ''),
	(148, 'Nicaragua ', ''),
	(149, 'Niger ', ''),
	(150, 'Nigeria ', ''),
	(151, 'Niue (New Zealand)', ''),
	(152, 'Norfolk Island (Australia)', ''),
	(153, 'North Korea ', ''),
	(154, 'Northern Mariana Islands (USA)', ''),
	(155, 'Norway ', ''),
	(156, 'Oman ', ''),
	(157, 'Pakistan ', ''),
	(158, 'Palau ', ''),
	(159, 'Palestine ', ''),
	(160, 'Panama ', ''),
	(161, 'Papua New Guinea ', ''),
	(162, 'Paraguay ', ''),
	(163, 'Peru ', ''),
	(164, 'Philippines ', ''),
	(165, 'Pitcairn Islands (UK)', ''),
	(166, 'Poland ', ''),
	(167, 'Portugal ', ''),
	(168, 'Puerto Rico (USA)', ''),
	(169, 'Qatar ', ''),
	(170, 'Republic of the Congo ', ''),
	(171, 'Romania ', ''),
	(172, 'Russia ', ''),
	(173, 'Rwanda ', ''),
	(174, 'Saint Barthelemy', ''),
	(175, 'Saint Helena, Ascension, and Tristan da Cunha (UK)', ''),
	(176, 'Saint Kitts and Nevis ', ''),
	(177, 'Saint Lucia ', ''),
	(178, 'Saint Martin', ''),
	(179, 'Saint Pierre and Miquelon (France)', ''),
	(180, 'Saint Vincent and the Grenadines ', ''),
	(181, 'Samoa ', ''),
	(182, 'San Marino ', ''),
	(183, 'S?o Tom? and Pr?ncipe ', ''),
	(184, 'Saudi Arabia ', ''),
	(185, 'Senegal ', ''),
	(186, 'Serbia ', ''),
	(187, 'Seychelles ', ''),
	(188, 'Sierra Leone ', ''),
	(189, 'Singapore ', ''),
	(190, 'Sint Maarten (Netherlands)', ''),
	(191, 'Slovakia ', ''),
	(192, 'Slovenia ', ''),
	(193, 'Solomon Islands ', ''),
	(194, 'Somalia ', ''),
	(195, 'South Africa ', ''),
	(196, 'South Korea ', ''),
	(197, 'South Sudan ', ''),
	(198, 'Spain', ''),
	(199, 'Sri Lanka ', ''),
	(200, 'Sudan ', ''),
	(201, 'Suriname ', ''),
	(202, 'Swaziland ', ''),
	(203, 'Sweden ', ''),
	(204, 'Switzerland ', ''),
	(205, 'Syria ', ''),
	(206, 'Taiwan ', ''),
	(207, 'Tajikistan ', ''),
	(208, 'Tanzania ', ''),
	(209, 'Thailand ', ''),
	(210, 'Togo ', ''),
	(211, 'Tokelau (New Zealand)', ''),
	(212, 'Tonga ', ''),
	(213, 'Transnistria ', ''),
	(214, 'Trinidad and Tobago ', ''),
	(215, 'Tunisia ', ''),
	(216, 'Turkey ', ''),
	(217, 'Turkmenistan ', ''),
	(218, 'Turks and Caicos Islands (UK)', ''),
	(219, 'Tuvalu ', ''),
	(220, 'Uganda ', ''),
	(221, 'Ukraine ', ''),
	(222, 'United Arab Emirates ', ''),
	(223, 'United Kingdom ', ''),
	(224, 'United States ', ''),
	(225, 'United States Virgin Islands (USA)', ''),
	(226, 'Uruguay ', ''),
	(227, 'Uzbekistan ', ''),
	(228, 'Vanuatu ', ''),
	(229, 'Vatican City ', ''),
	(230, 'Venezuela ', ''),
	(231, 'Vietnam ', ''),
	(232, 'Wallis and Futuna (France)', ''),
	(233, 'Western Sahara', ''),
	(234, 'Yemen ', ''),
	(235, 'Zambia ', ''),
	(236, 'Zimbabwe ', '');
/*!40000 ALTER TABLE `Countries` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.HaulerOrTruck
CREATE TABLE IF NOT EXISTS `HaulerOrTruck` (
  `HaulerOrTruckId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerOrTruck` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `TIN` varchar(50) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`HaulerOrTruckId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.HaulerOrTruck: 9 rows
DELETE FROM `HaulerOrTruck`;
/*!40000 ALTER TABLE `HaulerOrTruck` DISABLE KEYS */;
INSERT INTO `HaulerOrTruck` (`HaulerOrTruckId`, `HaulerOrTruck`, `IsActive`, `TIN`, `Address`) VALUES
	(3, 'Mardean James Enterprises', b'1', '225-394-653-000', 'Manila Harbour Centre'),
	(16, 'RNA trk', b'1', 'N/A', 'Tondo Manila'),
	(6, 'Mighty Servant Freight Service', b'1', '270-493-294-000', 'Lot 9 Blk 13 Phase 3D Dagat-Dagatan Ave., Ext. Brgy. 28, Caloocan City'),
	(7, 'Cher Transport Development Service Cooperative', b'1', '232-051-294-000', 'Fr. Masi St., Brgy. San Antonio San Pedro, Laguna'),
	(8, 'OBITRAK Lines Inc.', b'1', '008-444-181-000', '02 Senading Cor. Belen St., Gulod, Novaliches Quezon City'),
	(9, 'Gail Cargo Movers', b'1', 'N/A', 'Unit 44 L.A Townhomes Concepcion Avenue, Buting Pasig City'),
	(10, 'REDKARGO Express Inc.', b'1', '008-299-505-000', 'Pier 2 Slip 0 Isla Puting Bato Road, North Harbour Brgy. 20 Zone 2, Tondo Manila'),
	(15, 'Austria', b'1', 'N/A', 'Paranaque Metro Manila'),
	(14, 'Dizon Trucking', b'1', 'N/A', 'L.91-A Bagsakan Road, FTI Complex, Taguiig City');
/*!40000 ALTER TABLE `HaulerOrTruck` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.HistoricalStatus
CREATE TABLE IF NOT EXISTS `HistoricalStatus` (
  `HistoricalStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(300) DEFAULT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoricalStatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.HistoricalStatus: 9 rows
DELETE FROM `HistoricalStatus`;
/*!40000 ALTER TABLE `HistoricalStatus` DISABLE KEYS */;
INSERT INTO `HistoricalStatus` (`HistoricalStatusId`, `StatusDescription`, `JobFileId`, `DateAdded`, `AddedBy_UserId`) VALUES
	(1, '1-22 - confirmed payment of duties and taxes', 1, '2016-01-22 13:24:00', 18),
	(2, 'DELIVERED', 6, '2016-01-21 23:43:20', 18),
	(3, '1-22 RELEASED', 8, '2016-01-22 00:38:27', 18),
	(4, '1-21 RECEIVES ADVANCE DOCS\n1-22 WAITING FOR THE ORIGINAL DOCS', 9, '2016-01-22 00:45:49', 18),
	(5, 'RELEASED', 17, '2016-01-24 22:49:45', 18),
	(6, '1/25-  Receive advance docs and picked up already original docs. Bases also on conversation to Ms. Sally 1invoice with total pkg of 1477 will be disregarded.', 18, '2016-01-24 23:03:57', 18),
	(7, '1-25 waiting for the arrival of the shipment', 19, '2016-01-24 23:23:02', 18),
	(8, '1-25 sending of computation for approval', 18, '2016-01-25 16:07:00', 18),
	(9, '1-25 sending computation for approval', 19, '2016-01-25 16:09:00', 18);
/*!40000 ALTER TABLE `HistoricalStatus` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.HistoricalStatus_Air
CREATE TABLE IF NOT EXISTS `HistoricalStatus_Air` (
  `HistoricalStatus_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(300) DEFAULT NULL,
  `JobFile_AirId` int(11) DEFAULT NULL,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoricalStatus_AirId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.HistoricalStatus_Air: 7 rows
DELETE FROM `HistoricalStatus_Air`;
/*!40000 ALTER TABLE `HistoricalStatus_Air` DISABLE KEYS */;
INSERT INTO `HistoricalStatus_Air` (`HistoricalStatus_AirId`, `StatusDescription`, `JobFile_AirId`, `DateAdded`, `AddedBy_UserId`) VALUES
	(1, '01/06-3:45PM - BOC server down', 2, '2016-01-21 12:07:00', 11),
	(2, '01/06-BOC server down', 3, '2016-01-21 13:05:00', 11),
	(3, '01/06-BOC server down', 4, '2016-01-21 13:16:00', 11),
	(4, '01/14-BOC slow down', 5, '2016-01-21 14:47:00', 11),
	(5, '01/06-BOC server down', 6, '2016-01-21 15:00:00', 11),
	(6, '01/19-5:17PM - BOC Server down', 7, '2016-01-21 16:22:00', 11),
	(7, '01/21-awaits letter from consignee', 8, '2016-01-21 16:29:00', 11);
/*!40000 ALTER TABLE `HistoricalStatus_Air` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Images
CREATE TABLE IF NOT EXISTS `Images` (
  `ImageId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeId` int(11) NOT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `ImageSource` varchar(1000) NOT NULL,
  `FileName` varchar(300) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table for Images, images for User Accounts and Jobfile(scanned Images)';

-- Dumping data for table FilportTrackingSystem.Images: 0 rows
DELETE FROM `Images`;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ImageType
CREATE TABLE IF NOT EXISTS `ImageType` (
  `ImageTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeDescription` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ImageTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Image Type (if scanned image or User Profile Image)';

-- Dumping data for table FilportTrackingSystem.ImageType: 0 rows
DELETE FROM `ImageType`;
/*!40000 ALTER TABLE `ImageType` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImageType` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFile
CREATE TABLE IF NOT EXISTS `JobFile` (
  `JobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileNo` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `ShipperId` int(11) DEFAULT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `StatusId` int(11) NOT NULL,
  `ColorSelectivityId` int(11) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `Origin_CountryId` int(11) DEFAULT NULL,
  `OriginCity` varchar(50) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo2` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateReceivedArrivalNoticeFromALine` date DEFAULT NULL,
  `DateReceivedNoticeFromClients` date DEFAULT NULL,
  `DateReceivedOfBL` date DEFAULT NULL,
  `DateReceivedOfOtherDocs` date DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` date DEFAULT NULL,
  PRIMARY KEY (`JobFileId`),
  UNIQUE KEY `JobFileId` (`JobFileNo`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.JobFile: 19 rows
DELETE FROM `JobFile`;
/*!40000 ALTER TABLE `JobFile` DISABLE KEYS */;
INSERT INTO `JobFile` (`JobFileId`, `JobFileNo`, `ConsigneeId`, `BrokerId`, `ShipperId`, `PurchaseOrderNo`, `MonitoringTypeId`, `IsLocked`, `StatusId`, `ColorSelectivityId`, `Registry`, `LockedBy_UserId`, `Origin_CountryId`, `OriginCity`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `MasterBillLadingNo2`, `LetterCreditFromBank`, `DateReceivedArrivalNoticeFromALine`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `Forwarder`, `Warehouse`, `DateReceivedNoticeFromForwarder`) VALUES
	(1, 'SCS-16-01-001', 32, 3, 20, 'LGIV/E/16/01-0004', 1, b'0', 3, 1, 'HMM0003-16', 18, 42, 'Qingdao China', '2016-01-21 17:04:00', 'GOSUQIN3760887', 'N/A', '', 'TT', NULL, '2016-01-15', '2016-01-15', '2016-01-15', '2016-01-18', '2016-01-18', NULL, NULL, NULL),
	(2, 'EFT-15-12-143', 4, 3, 3, '102043742', 1, b'0', 1, 2, 'KPH0061-15', 11, 95, 'JAKARTA', '2016-01-22 10:12:00', 'NYKS3112028931', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(3, 'EFT-15-12-144', 4, 3, 3, '102043750', 1, b'0', 1, 2, 'KPH0061-15', 11, 95, 'Jakarta', '2016-01-22 10:31:00', 'NYKS3112028930', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(4, 'EFT-15-12-145', 4, 3, 3, '102045117', 1, b'0', 1, 1, 'KPH0061-15', 11, 95, 'Jakarta', '2016-01-22 10:43:00', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(5, 'EF1-16-01-001', 4, 4, 21, 'KPK782015/11-13', 1, b'0', 3, 2, 'MOL0092-15', 11, 209, 'N/A', '2016-01-22 11:20:00', 'LCHCB15024402', '', '', '', NULL, '2015-12-15', '2016-01-05', '2016-01-05', '2016-01-06', '2016-01-06', NULL, NULL, NULL),
	(6, 'SDF-16-01-001', 4, 3, 3, '16E24309-A1', 1, b'0', 1, 2, '', 18, 224, '', '2016-01-22 14:43:00', 'HDMUOLWB3207578', 'N/A', '', 'N/A', NULL, '2016-08-01', '2016-08-01', '2016-08-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(7, 'EF2-16-01-001', 4, 0, 21, 'KPK782016/01-003', 2, b'0', 3, 2, 'RCL0001-16', 11, 209, 'N/A', '2016-01-22 15:25:00', 'BKKCB15014998', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL),
	(8, 'SDF-16-01-002', 11, 3, 26, '16E265828-A', 1, b'0', 1, 1, 'HMM0004-16', 18, 224, '', '2016-01-22 15:38:00', 'HDMUOLWB3212044', 'N/A', '', 'N/A', NULL, '2016-07-01', '2016-07-01', '2016-07-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(9, 'SMC-16-01-001', 19, 0, 22, 'PE1600001', 1, b'0', 5, 1, 'KPH0005-16', 18, 209, '', '2016-01-22 15:45:00', 'SITGBKMN061660', 'N/A', '', 'N/A', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(10, 'EFT-15-12-146', 4, 4, 28, '102044443', 1, b'0', 1, 1, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 16:00:00', 'NYKS3113084680', '', '', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2015-01-12', '0000-00-00', NULL, NULL, NULL),
	(11, 'EFT-15-12-149', 4, 3, 3, '102044728', 1, b'0', 1, 1, 'SITGJTMN008580', 18, 95, 'JAKARTA', '2016-01-22 16:14:00', 'SITGJTMN008580', 'N/A', 'N/A', 'N/A', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
	(12, 'ET2-16-01-001', 4, 10, 3, '102044770', 2, b'0', 3, 2, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:30:00', 'APLU078477081', '', '', '', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL),
	(13, 'ET2-16-01-002', 4, 10, 3, '102044771', 2, b'0', 3, 1, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:43:00', 'APLU078477082', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL),
	(14, 'EFT-15-12-147', 4, 4, 28, '102044442', 1, b'0', 1, 1, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 16:45:00', 'NYKS3113084300', 'N/A', 'N/A', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2016-01-12', '2016-01-12', NULL, NULL, NULL),
	(15, 'ET2-16-01-003', 4, 10, 3, '102044733', 2, b'0', 3, 1, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:54:00', 'APLU078476995', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-04', '2016-01-07', '2016-01-11', NULL, NULL, NULL),
	(16, 'EFT-15-12-148', 4, 4, 28, '102044759', 1, b'0', 1, 2, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 17:00:00', 'NYKS3113084290', 'N/A', 'N/A', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2015-01-12', '2015-01-12', NULL, NULL, NULL),
	(17, 'SDF-16-01-003', 11, 3, 27, 'AFIN1512301', 1, b'0', 1, 1, 'EGP0010-16', 18, 42, '', '2016-01-25 13:49:00', 'EGLV140597084772', 'N/A', 'N/A', 'N/A', NULL, '2016-01-14', '2016-01-15', '2016-01-15', '2016-01-19', '2016-01-19', NULL, NULL, NULL),
	(18, 'SDF-16-01-004', 11, 3, 27, 'AFIN1512302', 1, b'0', 4, 1, 'EGP0014-16', 18, 42, '', '2016-01-25 14:03:00', 'EGLV140697100851', 'N/A', 'N/A', 'N/A', NULL, '2016-01-25', '2016-01-25', '2016-01-25', '2016-01-26', '2016-01-26', NULL, NULL, NULL),
	(19, 'SEB-16-01-001', 14, 0, 23, 'LF16161', 1, b'0', 4, 1, '', 18, 12, 'Longwarry', '2016-01-25 14:23:00', 'EGLV601500026641', 'N/A', 'N/A', 'N/A', NULL, '2015-12-01', '2016-01-19', '2016-01-19', '0000-00-00', '0000-00-00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `JobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFileHistory
CREATE TABLE IF NOT EXISTS `JobFileHistory` (
  `JobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` int(11) NOT NULL,
  `JobFileNo` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `ShipperId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `ColorSelectivityId` int(11) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `OriginCity` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo2` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateReceivedArrivalNoticeFromALine` date DEFAULT NULL,
  `DateReceivedNoticeFromClients` date DEFAULT NULL,
  `DateReceivedOfBL` date DEFAULT NULL,
  `DateReceivedOfOtherDocs` date DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` date DEFAULT NULL,
  `DateUpdated` date NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.JobFileHistory: 29 rows
DELETE FROM `JobFileHistory`;
/*!40000 ALTER TABLE `JobFileHistory` DISABLE KEYS */;
INSERT INTO `JobFileHistory` (`JobFileHistoryId`, `JobFileId`, `JobFileNo`, `ConsigneeId`, `BrokerId`, `ShipperId`, `PurchaseOrderNo`, `MonitoringTypeId`, `StatusId`, `IsLocked`, `ColorSelectivityId`, `Registry`, `LockedBy_UserId`, `Origin_CountryId`, `OriginCity`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `MasterBillLadingNo2`, `LetterCreditFromBank`, `DateReceivedArrivalNoticeFromALine`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `Forwarder`, `Warehouse`, `DateReceivedNoticeFromForwarder`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 'SCS-16-01-001', 32, 3, 20, 'LGIV/E/16/01-0004', 1, 1, b'0', 1, '', 11, 42, 'Qingdao China', '2016-01-21 17:04:41', 'N/A', 'GOSUQIN3760887', '', 'TT', NULL, '2016-01-15', '2016-01-15', '2016-01-15', '2016-01-18', '2016-01-18', NULL, NULL, NULL, '2016-01-21', 11),
	(2, 1, 'SCS-16-01-001', 32, 3, 20, 'LGIV/E/16/01-0004', 0, 1, b'0', 1, '', 11, 42, 'Qingdao China', '0000-00-00 00:00:00', 'N/A', 'GOSUQIN3760887', '', 'TT', NULL, '2016-01-15', '2016-01-15', '2016-01-15', '2016-01-18', '2016-01-18', NULL, NULL, NULL, '2016-01-21', 11),
	(3, 2, 'EFT-15-12-143', 4, 3, 3, '102043742', 1, 1, b'0', 2, 'KPH0061-15', 11, 95, 'JAKARTA', '2016-01-22 10:12:01', 'NYKS3112028931', '', '', 'NA', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(4, 2, 'EFT-15-12-143', 4, 3, 3, '102043742', 0, 1, b'0', 2, 'KPH0061-15', 11, 95, 'JAKARTA', '0000-00-00 00:00:00', 'NYKS3112028931', '', '', 'NA', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(5, 2, 'EFT-15-12-143', 4, 3, 3, '102043742', 0, 1, b'0', 2, 'KPH0061-15', 11, 95, 'JAKARTA', '0000-00-00 00:00:00', 'NYKS3112028931', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(6, 3, 'EFT-15-12-144', 4, 3, 3, '102043750', 1, 1, b'0', 2, 'KPH0061-15', 11, 95, 'Jakarta', '2016-01-22 10:31:36', 'NYKS3112028930', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(7, 4, 'EFT-15-12-145', 4, 3, 3, '102045117', 1, 1, b'0', 1, 'KPH0061-15', 11, 95, 'Jakarta', '2016-01-22 10:43:54', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(8, 4, 'EFT-15-12-145', 4, 3, 3, '102045117', 0, 1, b'0', 1, 'KPH0061-15', 11, 95, 'Jakarta', '0000-00-00 00:00:00', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(9, 5, 'EF1-16-01-001', 4, 4, 21, 'KPK782015/11-13', 1, 3, b'0', 2, 'MOL0092-15', 11, 209, 'N/A', '2016-01-22 11:20:46', 'LCHCB15024402', '', '', '', NULL, '2015-12-15', '2016-01-05', '2016-01-05', '2016-01-06', '2016-01-06', NULL, NULL, NULL, '2016-01-22', 11),
	(10, 4, 'EFT-15-12-145', 4, 3, 3, '102045117', 0, 1, b'0', 1, 'KPH0061-15', 11, 95, 'Jakarta', '0000-00-00 00:00:00', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(11, 4, 'EFT-15-12-145', 4, 3, 3, '102045117', 0, 1, b'0', 1, 'KPH0061-15', 11, 95, 'Jakarta', '0000-00-00 00:00:00', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(12, 4, 'EFT-15-12-145', 4, 3, 3, '102045117', 0, 1, b'0', 1, 'KPH0061-15', 11, 95, 'Jakarta', '0000-00-00 00:00:00', 'NYKS3113075860', '', '', 'TT', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(13, 1, 'SCS-16-01-001', 32, 3, 20, 'LGIV/E/16/01-0004', 0, 3, b'0', 1, 'HMM0003-16', 18, 42, 'Qingdao China', '0000-00-00 00:00:00', 'GOSUQIN3760887', 'N/A', '', 'TT', NULL, '2016-01-15', '2016-01-15', '2016-01-15', '2016-01-18', '2016-01-18', NULL, NULL, NULL, '2016-01-22', 18),
	(14, 6, 'SDF-16-01-001', 11, 3, 26, '16E24309-A1', 1, 1, b'0', 1, '', 18, 224, '', '2016-01-22 14:43:20', 'HDMUOLWB3207578', 'N/A', '', 'N/A', NULL, '2016-08-01', '2016-08-01', '2016-08-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(15, 6, 'SDF-16-01-001', 11, 3, 26, '16E24309-A1', 0, 1, b'0', 1, '', 18, 224, '', '0000-00-00 00:00:00', 'HDMUOLWB3207578', 'N/A', '', 'N/A', NULL, '2016-08-01', '2016-08-01', '2016-08-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(16, 7, 'EF2-16-01-001', 4, 0, 21, 'KPK782016/01-003', 2, 3, b'0', 2, 'RCL0001-16', 11, 209, 'N/A', '2016-01-22 15:25:20', 'BKKCB15014998', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL, '2016-01-22', 11),
	(17, 6, 'SDF-16-01-001', 4, 3, 3, '16E24309-A1', 0, 1, b'0', 2, '', 18, 224, '', '0000-00-00 00:00:00', 'HDMUOLWB3207578', 'N/A', '', 'N/A', NULL, '2016-08-01', '2016-08-01', '2016-08-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(18, 8, 'SDF-16-01-002', 11, 3, 26, '16E265828-A', 1, 1, b'0', 1, 'HMM0004-16', 18, 224, '', '2016-01-22 15:38:27', 'HDMUOLWB3212044', 'N/A', '', 'N/A', NULL, '2016-07-01', '2016-07-01', '2016-07-01', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(19, 9, 'SMC-16-01-001', 19, 0, 22, 'PE1600001', 1, 5, b'0', 1, 'KPH0005-16', 18, 209, '', '2016-01-22 15:45:49', 'SITGBKMN061660', 'N/A', '', 'N/A', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(20, 10, 'EFT-15-12-146', 4, 4, 28, '102044443', 1, 1, b'0', 1, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 16:00:42', 'NYKS3113084680', '', '', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2015-01-12', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 11),
	(21, 11, 'EFT-15-12-149', 4, 3, 3, '102044728', 1, 1, b'0', 1, 'SITGJTMN008580', 18, 95, 'JAKARTA', '2016-01-22 16:14:08', 'SITGJTMN008580', 'N/A', 'N/A', 'N/A', NULL, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-22', 18),
	(22, 12, 'ET2-16-01-001', 4, 10, 3, '102044770', 2, 3, b'0', 2, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:30:09', 'APLU078477081', '', '', '', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL, '2016-01-22', 11),
	(23, 13, 'ET2-16-01-002', 4, 10, 3, '102044771', 2, 3, b'0', 1, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:43:04', 'APLU078477082', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-05', '2016-01-07', '2016-01-11', NULL, NULL, NULL, '2016-01-22', 11),
	(24, 14, 'EFT-15-12-147', 4, 4, 28, '102044442', 1, 1, b'0', 1, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 16:45:12', 'NYKS3113084300', 'N/A', 'N/A', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2016-01-12', '2016-01-12', NULL, NULL, NULL, '2016-01-22', 11),
	(25, 15, 'ET2-16-01-003', 4, 10, 3, '102044733', 2, 3, b'0', 1, 'BTL0001-16', 11, 95, 'Jakarta', '2016-01-22 16:54:09', 'APLU078476995', '', '', 'N/A', NULL, '2016-01-04', '2016-01-05', '2016-01-04', '2016-01-07', '2016-01-11', NULL, NULL, NULL, '2016-01-22', 11),
	(26, 16, 'EFT-15-12-148', 4, 4, 28, '102044759', 1, 1, b'0', 2, 'NYK0002-16', 11, 95, 'Jakarta', '2016-01-22 17:00:35', 'NYKS3113084290', 'N/A', 'N/A', 'TT', NULL, '2015-12-22', '2015-12-22', '2015-12-22', '2015-01-12', '2015-01-12', NULL, NULL, NULL, '2016-01-22', 11),
	(27, 17, 'SDF-16-01-003', 11, 3, 27, 'AFIN1512301', 1, 1, b'0', 1, 'EGP0010-16', 18, 42, '', '2016-01-25 13:49:45', 'EGLV140597084772', 'N/A', 'N/A', 'N/A', NULL, '2016-01-14', '2016-01-15', '2016-01-15', '2016-01-19', '2016-01-19', NULL, NULL, NULL, '2016-01-25', 18),
	(28, 18, 'SDF-16-01-004', 11, 3, 27, 'AFIN1512302', 1, 4, b'0', 1, 'EGP0014-16', 18, 42, '', '2016-01-25 14:03:57', 'EGLV140697100851', 'N/A', 'N/A', 'N/A', NULL, '2016-01-25', '2016-01-25', '2016-01-25', '2016-01-26', '2016-01-26', NULL, NULL, NULL, '2016-01-25', 18),
	(29, 19, 'SEB-16-01-001', 14, 0, 23, 'LF16161', 1, 4, b'0', 1, '', 18, 12, 'Longwarry', '2016-01-25 14:23:02', 'EGLV601500026641', 'N/A', 'N/A', 'N/A', NULL, '2015-12-01', '2016-01-19', '2016-01-19', '0000-00-00', '0000-00-00', NULL, NULL, NULL, '2016-01-25', 18);
/*!40000 ALTER TABLE `JobFileHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFile_Air
CREATE TABLE IF NOT EXISTS `JobFile_Air` (
  `JobFile_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileNo` varchar(50) NOT NULL,
  `ShipperId` int(11) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `NoOfCartons` varchar(50) DEFAULT NULL,
  `PurchaseOrderNo` varchar(50) DEFAULT NULL,
  `LetterCreditNoFromBank` varchar(50) DEFAULT NULL,
  `HouseBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `Origin_CountryId` int(11) DEFAULT NULL,
  `OriginCity` varchar(50) DEFAULT NULL,
  `ETD` date DEFAULT NULL,
  `ETA` date DEFAULT NULL,
  `ATA` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `Aircraft` varchar(50) DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `DateReceivedArrivalFromALine` date DEFAULT NULL,
  `DateReceivedArrivalFromClient` date DEFAULT NULL,
  `DatePickUpHawb` date DEFAULT NULL,
  `DatePickUpOtherDocs` date DEFAULT NULL,
  `BrokerId` int(11) DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `ColorSelectivityId` int(11) DEFAULT NULL,
  `IsLocked` bit(1) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  PRIMARY KEY (`JobFile_AirId`),
  UNIQUE KEY `JobFileNo` (`JobFileNo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.JobFile_Air: 8 rows
DELETE FROM `JobFile_Air`;
/*!40000 ALTER TABLE `JobFile_Air` DISABLE KEYS */;
INSERT INTO `JobFile_Air` (`JobFile_AirId`, `JobFileNo`, `ShipperId`, `ConsigneeId`, `NoOfCartons`, `PurchaseOrderNo`, `LetterCreditNoFromBank`, `HouseBillLadingNo`, `MasterBillLadingNo`, `Origin_CountryId`, `OriginCity`, `ETD`, `ETA`, `ATA`, `FlightNo`, `Aircraft`, `Forwarder`, `Warehouse`, `DateReceivedArrivalFromALine`, `DateReceivedArrivalFromClient`, `DatePickUpHawb`, `DatePickUpOtherDocs`, `BrokerId`, `DateRequestBudgetToGL`, `RFPDueDate`, `ColorSelectivityId`, `IsLocked`, `LockedBy_UserId`, `StatusId`) VALUES
	(1, 'ADF-16-12-001', 4, 11, '107', 'HP160023A', 'N/A', 'N/A', '079-41681555', 224, '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 'PR103', 'PR103', 'N/A', 'PAL', '2016-01-11', '2016-01-11', '2016-01-11', '2016-01-11', 4, '2016-01-11', '2016-01-11', 1, b'1', 11, 1),
	(2, 'AAC-16-01-001', 5, 7, '6', '500272988', 'TT', 'HAN7GZH374', '160-21761784', 231, 'Vietnam', '2016-01-01', '2016-01-04', '0000-00-00 00:00:00', 'CX919', 'CX919', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1),
	(3, 'AAC-16-01-002', 5, 7, '17', '500272972', 'TT', 'HAN7GZH346', '160-21761880', 231, 'Vietnam ', '2016-01-01', '2016-01-04', '0000-00-00 00:00:00', 'CX2048', 'CX2048', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1),
	(4, 'AAC-16-01-003', 5, 7, '17', '500272860/500272973', 'TT', 'HAN7GZH336', 'N/A', 231, 'Vietnam', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 'CX905', 'CX905', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 4, '2016-01-06', '2016-01-06', 1, b'1', 11, 1),
	(5, 'AAC-16-01-005', 15, 7, '11', '10768', 'TT', '260105001246', '074-38308605', 1, '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 'KL807', 'KL807', 'LSILCI', 'PAL', '2016-01-13', '2016-01-13', '2016-01-13', '2016-01-13', 6, '2016-01-12', '2016-01-12', 1, b'1', 11, 1),
	(6, 'AAC-16-01-004', 5, 7, '2', '500273017', 'TT', '4912600141', '160-23808536', 91, 'Hongkong', '2016-01-02', '2016-01-04', '0000-00-00 00:00:00', 'CX919', 'CX919', 'Expeditors', 'Pair Cargo', '2016-01-06', '2016-01-06', '2016-01-06', '2016-01-06', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1),
	(7, 'AAC-16-01-006', 16, 7, '4', '', 'TT', 'NHK355429', '079-4218694-4', 91, 'Hongkong', '2016-01-17', '2016-01-17', '0000-00-00 00:00:00', 'PR307', 'PR307', 'LSILCI', 'PAL', '2016-01-18', '2016-01-18', '2016-01-18', '2016-01-18', 5, '2016-01-18', '2016-01-18', 1, NULL, NULL, 1),
	(8, 'AJA-16-01-001', 18, 31, '1', '', 'TT', '3805251774', 'N/A', 189, 'Singapore', '2015-09-11', '2015-09-11', '0000-00-00 00:00:00', '', '', 'DHL', 'PAL', '2016-01-07', '2016-01-07', '2016-01-11', '2016-01-22', 5, '2016-01-21', '2016-01-21', 1, NULL, NULL, 2);
/*!40000 ALTER TABLE `JobFile_Air` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFile_AirHistory
CREATE TABLE IF NOT EXISTS `JobFile_AirHistory` (
  `JobFile_AirHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFile_AirId` int(11) NOT NULL,
  `JobFileNo` varchar(50) NOT NULL,
  `ShipperId` int(11) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `NoOfCartons` varchar(50) DEFAULT NULL,
  `PurchaseOrderNo` varchar(50) DEFAULT NULL,
  `LetterCreditNoFromBank` varchar(50) DEFAULT NULL,
  `HouseBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `Origin_CountryId` int(11) DEFAULT NULL,
  `OriginCity` varchar(50) DEFAULT NULL,
  `ETD` datetime DEFAULT NULL,
  `ETA` datetime DEFAULT NULL,
  `ATA` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `Aircraft` varchar(50) DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `DateReceivedArrivalFromALine` date DEFAULT NULL,
  `DateReceivedArrivalFromClient` date DEFAULT NULL,
  `DatePickUpHawb` date DEFAULT NULL,
  `DatePickUpOtherDocs` date DEFAULT NULL,
  `BrokerId` int(11) DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `ColorSelectivityId` int(11) DEFAULT NULL,
  `IsLocked` bit(1) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `DateUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`JobFile_AirHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.JobFile_AirHistory: 8 rows
DELETE FROM `JobFile_AirHistory`;
/*!40000 ALTER TABLE `JobFile_AirHistory` DISABLE KEYS */;
INSERT INTO `JobFile_AirHistory` (`JobFile_AirHistoryId`, `JobFile_AirId`, `JobFileNo`, `ShipperId`, `ConsigneeId`, `NoOfCartons`, `PurchaseOrderNo`, `LetterCreditNoFromBank`, `HouseBillLadingNo`, `MasterBillLadingNo`, `Origin_CountryId`, `OriginCity`, `ETD`, `ETA`, `ATA`, `FlightNo`, `Aircraft`, `Forwarder`, `Warehouse`, `DateReceivedArrivalFromALine`, `DateReceivedArrivalFromClient`, `DatePickUpHawb`, `DatePickUpOtherDocs`, `BrokerId`, `DateRequestBudgetToGL`, `RFPDueDate`, `ColorSelectivityId`, `IsLocked`, `LockedBy_UserId`, `StatusId`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 'ADF-15-12-001', 4, 11, '107', 'HP160023A', 'N/A', 'N/A', '079-41681555', 224, '', '2016-01-09 00:00:00', '2016-01-11 00:00:00', '0000-00-00 00:00:00', 'PR103', 'PR103', '', '', '2016-01-11', '2016-01-11', '2016-01-11', '0016-01-12', 5, '2016-01-11', '2016-01-11', 1, NULL, NULL, 1, '2016-01-21 11:30:00', 11),
	(2, 2, 'AAC-16-01-001', 5, 7, '6', '500272988', 'TT', 'HAN7GZH374', '160-21761784', 231, 'Vietnam', '2016-01-01 00:00:00', '2016-01-04 00:00:00', '0000-00-00 00:00:00', 'CX919', 'CX919', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1, '2016-01-21 12:07:00', 11),
	(3, 3, 'AAC-16-01-002', 5, 7, '17', '500272972', 'TT', 'HAN7GZH346', '160-21761880', 231, 'Vietnam ', '2016-01-01 00:00:00', '2016-01-04 00:00:00', '0000-00-00 00:00:00', 'CX2048', 'CX2048', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1, '2016-01-21 13:05:00', 11),
	(4, 4, 'AAC-16-01-003', 5, 7, '2160', '500272860/500272973', 'TT', 'HAN7GZH336', 'N/A', 231, 'Vietnam', '2016-01-01 00:00:00', '2016-01-04 00:00:00', '0000-00-00 00:00:00', 'CX905', 'CX905', 'DHL', 'Pair Cargo', '2016-01-05', '2016-01-05', '2016-01-05', '2016-01-05', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1, '2016-01-21 13:16:00', 11),
	(5, 5, 'AAC-16-01-005', 15, 7, '11', '10768', 'TT', '260105001246', '074-38308605', 71, 'London', '2016-01-05 00:00:00', '2016-01-10 00:00:00', '0000-00-00 00:00:00', 'KL807', 'KL807', 'LSILCI', 'PAL', '2016-01-13', '2016-01-13', '2016-01-13', '2016-01-13', 6, '2016-01-12', '2016-01-12', 1, NULL, NULL, 1, '2016-01-21 14:47:00', 11),
	(6, 6, 'AAC-16-01-004', 5, 7, '2', '500273017', 'TT', '4912600141', '160-23808536', 91, 'Hongkong', '2016-01-02 00:00:00', '2016-01-04 00:00:00', '0000-00-00 00:00:00', 'CX919', 'CX919', 'Expeditors', 'Pair Cargo', '2016-01-06', '2016-01-06', '2016-01-06', '2016-01-06', 5, '2016-01-06', '2016-01-06', 1, NULL, NULL, 1, '2016-01-21 15:00:00', 11),
	(7, 7, 'AAC-16-01-006', 16, 7, '4', '', 'TT', 'NHK355429', '079-4218694-4', 91, 'Hongkong', '2016-01-17 00:00:00', '2016-01-17 00:00:00', '0000-00-00 00:00:00', 'PR307', 'PR307', 'LSILCI', 'PAL', '2016-01-18', '2016-01-18', '2016-01-18', '2016-01-18', 5, '2016-01-18', '2016-01-18', 1, NULL, NULL, 1, '2016-01-21 16:22:00', 11),
	(8, 8, 'AJA-16-01-001', 18, 31, '1', '', 'TT', '3805251774', 'N/A', 189, 'Singapore', '2015-09-11 00:00:00', '2015-09-11 00:00:00', '0000-00-00 00:00:00', '', '', 'DHL', 'PAL', '2016-01-07', '2016-01-07', '2016-01-11', '2016-01-22', 5, '2016-01-21', '2016-01-21', 1, NULL, NULL, 2, '2016-01-21 16:29:00', 11);
/*!40000 ALTER TABLE `JobFile_AirHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.MonitoringType
CREATE TABLE IF NOT EXISTS `MonitoringType` (
  `MonitoringTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MonitoringTypeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`MonitoringTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.MonitoringType: 3 rows
DELETE FROM `MonitoringType`;
/*!40000 ALTER TABLE `MonitoringType` DISABLE KEYS */;
INSERT INTO `MonitoringType` (`MonitoringTypeId`, `MonitoringTypeName`, `Description`) VALUES
	(1, 'Manila', 'JobFile Monitoring for Manila'),
	(2, 'Outport', 'JobFile Monitoring for Outport'),
	(3, 'Air', 'JobFile Monitoring for Air');
/*!40000 ALTER TABLE `MonitoringType` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Products: 57 rows
DELETE FROM `Products`;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` (`ProductId`, `ProductName`, `IsActive`) VALUES
	(9, 'HD-500 Productivity Dock ', b'1'),
	(3, 'Kopiko Blanca Hanger 24x10x30G', b'1'),
	(8, 'Nokia 215 DS RM 1110 NV PH White', b'1'),
	(7, 'Fresh Fruits', b'1'),
	(10, 'Communications Equipments', b'1'),
	(11, 'Digital Camera and Accessories', b'1'),
	(12, 'Spare Parts for Bagging Equipment', b'1'),
	(13, 'Tin Bucket', b'1'),
	(14, 'Digital Watch', b'1'),
	(15, 'Character Mask', b'1'),
	(16, 'Figural Drink Container', b'1'),
	(17, 'Photographic Goods', b'1'),
	(18, 'Cambr Checkpt Maths Tch Res 8', b'1'),
	(19, 'Books', b'1'),
	(20, 'Reusable M90 Steel Pallets', b'1'),
	(21, '6.0MM Bronze Reflective Glass', b'1'),
	(22, 'Energen Vanilla Hanger', b'1'),
	(23, 'Kopiko 78 Coffee latte', b'1'),
	(24, 'Diabetamil ND Chocolate/Vanilla', b'1'),
	(25, 'Energen Chocolate Hanger/Pouch', b'1'),
	(26, 'Kraft Liner Board Paper', b'1'),
	(27, 'Prenagen  Emesis Chocolate', b'1'),
	(28, 'Gippy 1L UHT Full Cream Milk', b'1'),
	(29, 'Kopiko Brown coffee Hanger', b'1'),
	(30, 'Energen Vanilla Hanger/Pouch', b'1'),
	(31, 'Kopiko Black 3 in One Bag', b'1'),
	(32, 'Kopiko Brown Coffee Pouch', b'1'),
	(33, 'Kopiko Brown Coffee Bag', b'1'),
	(34, 'Kopiko Blanca Bag', b'1'),
	(35, 'Kopiko Blanca Pouch', b'1'),
	(36, 'Kopiko Double Cups', b'1'),
	(37, 'Kopiko LA Coffee Hanger', b'1'),
	(38, 'Kopiko Black 3 in One Hanger', b'1'),
	(39, 'Fresh Orange/Lemons/Grape Fruit', b'1'),
	(40, 'Fresh Apples', b'1'),
	(41, 'Kopiko Coffee Shot Cappucino/Kopiko Coffee Shot Ca', b'1'),
	(42, 'Coffee Latte\\"Kopiko 78\\\'C Brand PB', b'1'),
	(43, 'Fres Cherry Candy,Jar/Barleymint Candy Jar', b'1'),
	(44, 'Fres Grape Candy/Jar', b'1'),
	(45, 'Fres Cherry Candy', b'1'),
	(46, 'Energen Chocolate Hanger', b'1'),
	(47, 'Kopiko Black 3in1 Hanger/Pouch/Bag', b'1'),
	(48, 'Kopiko Black 3in1 Pouch/Bag', b'1'),
	(49, 'Fres Barleymint Candy', b'1'),
	(50, 'Kopiko Brown Coffee Pouch/Bag', b'1'),
	(51, 'Kopiko Blanca Hanger', b'1'),
	(52, 'Kopiko Black 3in1 Cup/Pouch/ Bag', b'1'),
	(53, 'Energen Choco H,B/Vanilla P/Ginger Hanger', b'1'),
	(54, 'Energen Choco Hanger/Vanilla Hanger,Pouch', b'1'),
	(55, 'Kopiko Coffee Shot Cappucino, Candy/Fres Cherry Ca', b'1'),
	(56, 'Kopiko Kopiccino H,P,B/Blanca Hanger', b'1'),
	(57, 'Kopiko Coffee Shot Candy', b'1'),
	(58, 'Fres Grape Candy', b'1'),
	(59, 'Fres Cherry Candy Jar', b'1'),
	(60, 'Magnetic Tubes', b'1'),
	(61, 'FCB 1250 kg Ring Type basketball Shell', b'1'),
	(62, 'Broquet Pump Set', b'1');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ProductsByContainer
CREATE TABLE IF NOT EXISTS `ProductsByContainer` (
  `ProductsByContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ProductsByContainer: 48 rows
DELETE FROM `ProductsByContainer`;
/*!40000 ALTER TABLE `ProductsByContainer` DISABLE KEYS */;
INSERT INTO `ProductsByContainer` (`ProductsByContainerId`, `ProductId`, `ContainerByCarrierId`) VALUES
	(1, 21, 1),
	(2, 25, 2),
	(3, 30, 3),
	(4, 25, 3),
	(5, 29, 4),
	(6, 29, 5),
	(7, 39, 7),
	(8, 39, 8),
	(9, 26, 10),
	(10, 26, 14),
	(11, 26, 9),
	(12, 26, 13),
	(13, 26, 11),
	(14, 26, 12),
	(15, 26, 15),
	(16, 26, 16),
	(17, 26, 18),
	(18, 26, 21),
	(19, 26, 17),
	(20, 26, 20),
	(21, 26, 19),
	(22, 26, 22),
	(23, 26, 26),
	(24, 26, 23),
	(25, 26, 24),
	(26, 26, 25),
	(27, 26, 27),
	(28, 26, 28),
	(29, 42, 30),
	(30, 42, 29),
	(31, 42, 31),
	(32, 42, 32),
	(33, 42, 33),
	(34, 42, 34),
	(35, 43, 36),
	(36, 57, 35),
	(37, 45, 35),
	(38, 44, 35),
	(39, 49, 35),
	(40, 44, 41),
	(41, 44, 42),
	(42, 45, 42),
	(43, 29, 45),
	(44, 29, 46),
	(45, 57, 47),
	(46, 40, 48),
	(47, 40, 49),
	(48, 28, 50);
/*!40000 ALTER TABLE `ProductsByContainer` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ProductsByContainerHistory
CREATE TABLE IF NOT EXISTS `ProductsByContainerHistory` (
  `ProductsByContainerHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductsByContainerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ProductsByContainerHistory: 49 rows
DELETE FROM `ProductsByContainerHistory`;
/*!40000 ALTER TABLE `ProductsByContainerHistory` DISABLE KEYS */;
INSERT INTO `ProductsByContainerHistory` (`ProductsByContainerHistoryId`, `ProductsByContainerId`, `ProductId`, `ContainerByCarrierId`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 21, 0, '2016-01-21 17:11:00', 11),
	(2, 2, 25, 2, '2016-01-22 10:28:00', 11),
	(3, 3, 30, 3, '2016-01-22 10:42:00', 11),
	(4, 4, 25, 3, '2016-01-22 10:42:00', 11),
	(5, 5, 29, 4, '2016-01-22 11:24:00', 11),
	(6, 6, 29, 5, '2016-01-22 11:24:00', 11),
	(7, 7, 39, 0, '2016-01-22 15:07:00', 18),
	(8, 8, 39, 0, '2016-01-22 15:41:00', 18),
	(9, 9, 26, 0, '2016-01-22 15:55:00', 18),
	(10, 10, 26, 0, '2016-01-22 15:55:00', 18),
	(11, 11, 26, 0, '2016-01-22 15:55:00', 18),
	(12, 12, 26, 0, '2016-01-22 15:55:00', 18),
	(13, 13, 26, 0, '2016-01-22 15:55:00', 18),
	(14, 14, 26, 0, '2016-01-22 15:55:00', 18),
	(15, 15, 26, 0, '2016-01-22 15:55:00', 18),
	(16, 16, 26, 0, '2016-01-22 15:55:00', 18),
	(17, 17, 26, 0, '2016-01-22 15:55:00', 18),
	(18, 18, 26, 0, '2016-01-22 15:55:00', 18),
	(19, 19, 26, 0, '2016-01-22 15:55:00', 18),
	(20, 20, 26, 0, '2016-01-22 15:55:00', 18),
	(21, 21, 26, 0, '2016-01-22 15:55:00', 18),
	(22, 22, 26, 0, '2016-01-22 15:55:00', 18),
	(23, 23, 26, 0, '2016-01-22 15:55:00', 18),
	(24, 24, 26, 0, '2016-01-22 15:55:00', 18),
	(25, 25, 26, 0, '2016-01-22 15:55:00', 18),
	(26, 26, 26, 0, '2016-01-22 15:55:00', 18),
	(27, 27, 26, 0, '2016-01-22 15:55:00', 18),
	(28, 28, 26, 0, '2016-01-22 15:55:00', 18),
	(29, 29, 42, 29, '2016-01-22 15:57:00', 11),
	(30, 29, 42, 30, '2016-01-22 15:59:00', 11),
	(31, 30, 42, 29, '2016-01-22 15:59:00', 11),
	(32, 31, 42, 31, '2016-01-22 16:00:00', 11),
	(33, 32, 42, 32, '2016-01-22 16:02:00', 11),
	(34, 33, 42, 33, '2016-01-22 16:02:00', 11),
	(35, 34, 42, 34, '2016-01-22 16:02:00', 11),
	(36, 35, 43, 36, '2016-01-22 16:38:00', 11),
	(37, 36, 57, 35, '2016-01-22 16:41:00', 11),
	(38, 37, 45, 35, '2016-01-22 16:41:00', 11),
	(39, 38, 44, 35, '2016-01-22 16:41:00', 11),
	(40, 39, 49, 35, '2016-01-22 16:41:00', 11),
	(41, 40, 44, 41, '2016-01-22 16:49:00', 11),
	(42, 41, 44, 0, '2016-01-22 16:53:00', 11),
	(43, 42, 45, 0, '2016-01-22 16:53:00', 11),
	(44, 43, 29, 45, '2016-01-22 17:03:00', 11),
	(45, 44, 29, 46, '2016-01-22 17:03:00', 11),
	(46, 45, 57, 0, '2016-01-22 17:09:00', 11),
	(47, 46, 40, 0, '2016-01-25 13:55:00', 18),
	(48, 47, 40, 0, '2016-01-25 14:09:00', 18),
	(49, 48, 28, 0, '2016-01-25 14:24:00', 18);
/*!40000 ALTER TABLE `ProductsByContainerHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products_Air
CREATE TABLE IF NOT EXISTS `Products_Air` (
  `Products_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `JobFile_AirId` int(11) NOT NULL,
  `RefEntryNo` varchar(50) DEFAULT NULL,
  `GrossWeight` decimal(10,2) DEFAULT NULL,
  `DateSentFinalAssessment` date DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `DateSentPreAssessment` date DEFAULT NULL,
  `DateBOCCleared` date DEFAULT NULL,
  `TargetDeliveryDate` date DEFAULT NULL,
  `ActualPullOutDateAtNAIA` date DEFAULT NULL,
  `DateReceivedAtWhse` date DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TotalStorage` decimal(10,2) DEFAULT NULL,
  `AdtlPerDayncludeVat` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Products_AirId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Products_Air: 9 rows
DELETE FROM `Products_Air`;
/*!40000 ALTER TABLE `Products_Air` DISABLE KEYS */;
INSERT INTO `Products_Air` (`Products_AirId`, `ProductId`, `JobFile_AirId`, `RefEntryNo`, `GrossWeight`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateBOCCleared`, `TargetDeliveryDate`, `ActualPullOutDateAtNAIA`, `DateReceivedAtWhse`, `HaulerOrTruckId`, `TotalStorage`, `AdtlPerDayncludeVat`) VALUES
	(1, 7, 1, 'C3779', 500.00, '2016-01-12', '2016-01-12 17:06:00', '2016-01-11', '2016-01-12', '2016-01-12', '2016-01-12', '2016-01-12', 14, 12.00, 0.00),
	(2, 8, 2, 'C1466', 832.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 3, 0.00, 0.00),
	(3, 8, 3, 'C1431', 2922.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 3, 0.00, 0.00),
	(4, 8, 4, '', 2160.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 0, 0.00, 0.00),
	(5, 8, 4, 'C1499', 2160.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 15, 0.00, 0.00),
	(6, 10, 5, 'C4753', 310.00, '2016-01-13', '0000-00-00 00:00:00', '2016-01-12', '2016-01-14', '2016-01-14', '2016-01-14', '2016-01-14', 3, 0.00, 0.00),
	(7, 9, 6, 'C4029', 58.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 15, 0.00, 0.00),
	(8, 11, 7, '', 624.00, '2016-01-20', '0000-00-00 00:00:00', '2016-01-18', '2016-01-20', '2016-01-20', '2016-01-20', '2016-01-20', 3, 0.00, 0.00),
	(9, 18, 8, '', 1.12, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 0.00, 0.00);
/*!40000 ALTER TABLE `Products_Air` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products_AirHistory
CREATE TABLE IF NOT EXISTS `Products_AirHistory` (
  `Products_AirHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Products_AirId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `JobFile_AirId` int(11) NOT NULL,
  `RefEntryNo` varchar(50) DEFAULT NULL,
  `GrossWeight` decimal(10,2) DEFAULT NULL,
  `DateSentFinalAssessment` date DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `DateSentPreAssessment` date DEFAULT NULL,
  `DateBOCCleared` date DEFAULT NULL,
  `TargetDeliveryDate` date DEFAULT NULL,
  `ActualPullOutDateAtNAIA` date DEFAULT NULL,
  `DateReceivedAtWhse` date DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TotalStorage` decimal(10,2) DEFAULT NULL,
  `AdtlPerDayncludeVat` decimal(10,2) DEFAULT NULL,
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`Products_AirHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.Products_AirHistory: 3 rows
DELETE FROM `Products_AirHistory`;
/*!40000 ALTER TABLE `Products_AirHistory` DISABLE KEYS */;
INSERT INTO `Products_AirHistory` (`Products_AirHistoryId`, `Products_AirId`, `ProductId`, `JobFile_AirId`, `RefEntryNo`, `GrossWeight`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateBOCCleared`, `TargetDeliveryDate`, `ActualPullOutDateAtNAIA`, `DateReceivedAtWhse`, `HaulerOrTruckId`, `TotalStorage`, `AdtlPerDayncludeVat`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 7, 1, 'C3779', 500.00, '2016-01-12', '2016-01-12 17:06:00', '2016-01-11', '2016-01-12', '2016-01-12', '2016-01-12', '2016-01-12', 14, 12.00, 0.00, '2016-01-21 11:49:00', 11),
	(2, 5, 8, 4, 'C1499', 2160.00, '2016-01-07', '0000-00-00 00:00:00', '2016-01-06', '2016-01-07', '2016-01-07', '2016-01-07', '2016-01-07', 15, 0.00, 0.00, '2016-01-21 13:34:00', 11),
	(3, 9, 18, 8, '', 1.12, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 3, 0.00, 0.00, '2016-01-21 16:32:00', 11);
/*!40000 ALTER TABLE `Products_AirHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Role
CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `RoleDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Role: 4 rows
DELETE FROM `Role`;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` (`RoleId`, `RoleName`, `RoleDescription`) VALUES
	(1, 'Admin', 'Filport Adminstrator'),
	(2, 'Client', 'Filport Clients'),
	(3, '2', '2'),
	(4, '2', '2');
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.RoleAccess
CREATE TABLE IF NOT EXISTS `RoleAccess` (
  `RoleAccessId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleId` int(11) NOT NULL,
  PRIMARY KEY (`RoleAccessId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.RoleAccess: 0 rows
DELETE FROM `RoleAccess`;
/*!40000 ALTER TABLE `RoleAccess` DISABLE KEYS */;
/*!40000 ALTER TABLE `RoleAccess` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.RunningCharges
CREATE TABLE IF NOT EXISTS `RunningCharges` (
  `RunnningChargesId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `ContainerDeposit` decimal(10,2) DEFAULT NULL,
  `THCCharges` decimal(10,2) DEFAULT NULL,
  `Arrastre` decimal(10,2) DEFAULT NULL,
  `Wharfage` decimal(10,2) DEFAULT NULL,
  `Weighing` decimal(10,2) DEFAULT NULL,
  `DEL` decimal(10,2) DEFAULT NULL,
  `DispatchFee` decimal(10,2) DEFAULT NULL,
  `Storage` decimal(10,2) DEFAULT NULL,
  `Demorage` decimal(10,2) DEFAULT NULL,
  `Detention` decimal(10,2) DEFAULT NULL,
  `EIC` decimal(10,2) DEFAULT NULL,
  `BAIApplication` decimal(10,2) DEFAULT NULL,
  `BAIInspection` decimal(10,2) DEFAULT NULL,
  `SRAApplication` decimal(10,2) DEFAULT NULL,
  `SRAInspection` decimal(10,2) DEFAULT NULL,
  `BadCargo` decimal(10,2) DEFAULT NULL,
  `AllCharges` decimal(10,2) DEFAULT NULL,
  `ParticularCharges` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`RunnningChargesId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.RunningCharges: 20 rows
DELETE FROM `RunningCharges`;
/*!40000 ALTER TABLE `RunningCharges` DISABLE KEYS */;
INSERT INTO `RunningCharges` (`RunnningChargesId`, `JobFileId`, `LodgementFee`, `ContainerDeposit`, `THCCharges`, `Arrastre`, `Wharfage`, `Weighing`, `DEL`, `DispatchFee`, `Storage`, `Demorage`, `Detention`, `EIC`, `BAIApplication`, `BAIInspection`, `SRAApplication`, `SRAInspection`, `BadCargo`, `AllCharges`, `ParticularCharges`) VALUES
	(1, '1', 65.00, 0.00, 58905.00, 9016.00, 1163.34, 309.12, 0.00, 0.00, 1078.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(2, '1', 65.00, 0.00, 58905.00, 9016.00, 1163.34, 309.12, 0.00, 0.00, 1078.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(3, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '6', 65.00, 8.00, 14.00, 10.00, 872.54, 166.88, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(8, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, '8', 65.00, 8.00, 14.00, 10.00, 872.54, 166.88, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(10, '9', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(11, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, '17', 65.00, 30.00, 55.00, 10.00, 872.54, 166.88, 104.16, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(19, '18', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(20, '19', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL);
/*!40000 ALTER TABLE `RunningCharges` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.RunningChargesHistory
CREATE TABLE IF NOT EXISTS `RunningChargesHistory` (
  `RunningChargesHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `RunnningChargesId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `ContainerDeposit` decimal(10,2) DEFAULT NULL,
  `THCCharges` decimal(10,2) DEFAULT NULL,
  `Arrastre` decimal(10,2) DEFAULT NULL,
  `Wharfage` decimal(10,2) DEFAULT NULL,
  `Weighing` decimal(10,2) DEFAULT NULL,
  `DEL` decimal(10,2) DEFAULT NULL,
  `DispatchFee` decimal(10,2) DEFAULT NULL,
  `Storage` decimal(10,2) DEFAULT NULL,
  `Demorage` decimal(10,2) DEFAULT NULL,
  `Detention` decimal(10,2) DEFAULT NULL,
  `EIC` decimal(10,2) DEFAULT NULL,
  `BAIApplication` decimal(10,2) DEFAULT NULL,
  `BAIInspection` decimal(10,2) DEFAULT NULL,
  `SRAApplication` decimal(10,2) DEFAULT NULL,
  `SRAInspection` decimal(10,2) DEFAULT NULL,
  `BadCargo` decimal(10,2) DEFAULT NULL,
  `AllCharges` decimal(10,2) DEFAULT NULL,
  `ParticularCharges` decimal(10,2) DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UsrId` int(11) NOT NULL,
  PRIMARY KEY (`RunningChargesHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.RunningChargesHistory: 27 rows
DELETE FROM `RunningChargesHistory`;
/*!40000 ALTER TABLE `RunningChargesHistory` DISABLE KEYS */;
INSERT INTO `RunningChargesHistory` (`RunningChargesHistoryId`, `RunnningChargesId`, `JobFileId`, `LodgementFee`, `ContainerDeposit`, `THCCharges`, `Arrastre`, `Wharfage`, `Weighing`, `DEL`, `DispatchFee`, `Storage`, `Demorage`, `Detention`, `EIC`, `BAIApplication`, `BAIInspection`, `SRAApplication`, `SRAInspection`, `BadCargo`, `AllCharges`, `ParticularCharges`, `DateUpdated`, `UpdatedBy_UsrId`) VALUES
	(1, 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-19 18:28:00', 4),
	(2, 2, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-21 17:04:00', 11),
	(3, 3, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 10:12:00', 11),
	(4, 4, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 10:31:00', 11),
	(5, 5, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 10:43:00', 11),
	(6, 6, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 11:20:00', 11),
	(7, 0, '1', 65.00, 0.00, 58905.00, 9016.00, 1163.34, 309.12, 0.00, 0.00, 1078.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-22 14:38:00', 18),
	(8, 7, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 14:43:00', 18),
	(9, 0, '6', 65.00, 8.00, 14.00, 10.00, 872.54, 166.88, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-22 15:15:00', 18),
	(10, 8, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 15:25:00', 11),
	(11, 9, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 15:38:00', 18),
	(12, 0, '8', 65.00, 8.00, 14.00, 10.00, 872.54, 166.88, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-22 15:42:00', 18),
	(13, 10, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 15:45:00', 18),
	(14, 0, '9', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-22 15:56:00', 18),
	(15, 11, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:00:00', 11),
	(16, 12, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:14:00', 18),
	(17, 13, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:30:00', 11),
	(18, 14, '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:43:00', 11),
	(19, 15, '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:45:00', 11),
	(20, 16, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 16:54:00', 11),
	(21, 17, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-22 17:00:00', 11),
	(22, 18, '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-25 13:49:00', 18),
	(23, 0, '17', 65.00, 30.00, 55.00, 10.00, 872.54, 166.88, 104.16, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-25 13:57:00', 18),
	(24, 19, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-25 14:03:00', 18),
	(25, 0, '18', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-25 14:09:00', 18),
	(26, 20, '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-25 14:23:00', 18),
	(27, 0, '19', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-25 14:24:00', 18);
/*!40000 ALTER TABLE `RunningChargesHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.RunningCharges_Air
CREATE TABLE IF NOT EXISTS `RunningCharges_Air` (
  `RunnningCharges_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFile_AirId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `ContainerDeposit` decimal(10,2) DEFAULT NULL,
  `THCCharges` decimal(10,2) DEFAULT NULL,
  `Arrastre` decimal(10,2) DEFAULT NULL,
  `Wharfage` decimal(10,2) DEFAULT NULL,
  `Weighing` decimal(10,2) DEFAULT NULL,
  `DEL` decimal(10,2) DEFAULT NULL,
  `DispatchFee` decimal(10,2) DEFAULT NULL,
  `Storage` decimal(10,2) DEFAULT NULL,
  `Demorage` decimal(10,2) DEFAULT NULL,
  `Detention` decimal(10,2) DEFAULT NULL,
  `EIC` decimal(10,2) DEFAULT NULL,
  `BAIApplication` decimal(10,2) DEFAULT NULL,
  `BAIInspection` decimal(10,2) DEFAULT NULL,
  `SRAApplication` decimal(10,2) DEFAULT NULL,
  `SRAInspection` decimal(10,2) DEFAULT NULL,
  `BadCargo` decimal(10,2) DEFAULT NULL,
  `AllCharges` decimal(10,2) DEFAULT NULL,
  `ParticularCharges` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`RunnningCharges_AirId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.RunningCharges_Air: 8 rows
DELETE FROM `RunningCharges_Air`;
/*!40000 ALTER TABLE `RunningCharges_Air` DISABLE KEYS */;
INSERT INTO `RunningCharges_Air` (`RunnningCharges_AirId`, `JobFile_AirId`, `LodgementFee`, `ContainerDeposit`, `THCCharges`, `Arrastre`, `Wharfage`, `Weighing`, `DEL`, `DispatchFee`, `Storage`, `Demorage`, `Detention`, `EIC`, `BAIApplication`, `BAIInspection`, `SRAApplication`, `SRAInspection`, `BadCargo`, `AllCharges`, `ParticularCharges`) VALUES
	(1, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(2, '2', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(3, '3', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(4, '4', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(5, '5', 45.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(6, '6', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(7, '7', 65.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(8, '8', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL);
/*!40000 ALTER TABLE `RunningCharges_Air` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.RunningCharges_AirHistory
CREATE TABLE IF NOT EXISTS `RunningCharges_AirHistory` (
  `RunningCharges_AirHistory` int(11) NOT NULL AUTO_INCREMENT,
  `RunnningCharges_AirId` int(11) NOT NULL,
  `JobFile_AirId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `ContainerDeposit` decimal(10,2) DEFAULT NULL,
  `THCCharges` decimal(10,2) DEFAULT NULL,
  `Arrastre` decimal(10,2) DEFAULT NULL,
  `Wharfage` decimal(10,2) DEFAULT NULL,
  `Weighing` decimal(10,2) DEFAULT NULL,
  `DEL` decimal(10,2) DEFAULT NULL,
  `DispatchFee` decimal(10,2) DEFAULT NULL,
  `Storage` decimal(10,2) DEFAULT NULL,
  `Demorage` decimal(10,2) DEFAULT NULL,
  `Detention` decimal(10,2) DEFAULT NULL,
  `EIC` decimal(10,2) DEFAULT NULL,
  `BAIApplication` decimal(10,2) DEFAULT NULL,
  `BAIInspection` decimal(10,2) DEFAULT NULL,
  `SRAApplication` decimal(10,2) DEFAULT NULL,
  `SRAInspection` decimal(10,2) DEFAULT NULL,
  `BadCargo` decimal(10,2) DEFAULT NULL,
  `AllCharges` decimal(10,2) DEFAULT NULL,
  `ParticularCharges` decimal(10,2) DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UsrId` int(11) NOT NULL,
  PRIMARY KEY (`RunningCharges_AirHistory`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.RunningCharges_AirHistory: 0 rows
DELETE FROM `RunningCharges_AirHistory`;
/*!40000 ALTER TABLE `RunningCharges_AirHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `RunningCharges_AirHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.SecretQuestion
CREATE TABLE IF NOT EXISTS `SecretQuestion` (
  `SecretQuestionId` int(11) NOT NULL AUTO_INCREMENT,
  `SecretQuestion` varchar(300) NOT NULL,
  PRIMARY KEY (`SecretQuestionId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Secret Question table - for users to use if they forgot their password';

-- Dumping data for table FilportTrackingSystem.SecretQuestion: 21 rows
DELETE FROM `SecretQuestion`;
/*!40000 ALTER TABLE `SecretQuestion` DISABLE KEYS */;
INSERT INTO `SecretQuestion` (`SecretQuestionId`, `SecretQuestion`) VALUES
	(1, 'What was your childhood nickname?'),
	(2, 'In what city did you meet your spouse/significant other?'),
	(3, 'What is the name of your favorite childhood friend?'),
	(4, 'What street did you live on in third grade?'),
	(5, 'What is your oldest sibling’s birthday month and year?'),
	(6, 'What is the middle name of your oldest child?'),
	(7, 'What is your oldest sibling\'s middle name?'),
	(8, 'What school did you attend for sixth grade?'),
	(9, 'What was your childhood phone number including area code?'),
	(10, 'What is your oldest cousin\'s first and last name?'),
	(11, 'What was the name of your first stuffed animal?'),
	(12, 'In what city or town did your mother and father meet?'),
	(13, 'Where were you when you had your first kiss?'),
	(14, 'What is the first name of the boy or girl that you first kissed?'),
	(15, 'What was the last name of your third grade teacher?'),
	(16, 'In what city does your nearest sibling live?'),
	(17, 'What is your oldest brother’s birthday month and year?'),
	(18, 'What is your maternal grandmother\'s maiden name?'),
	(19, 'In what city or town was your first job?'),
	(20, 'What is the name of the place your wedding reception was held?'),
	(21, 'What is the name of a college you applied to but didn\'t attend?');
/*!40000 ALTER TABLE `SecretQuestion` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Shipper
CREATE TABLE IF NOT EXISTS `Shipper` (
  `ShipperId` int(11) NOT NULL AUTO_INCREMENT,
  `ShipperName` varchar(100) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `HouseBuildingNoStreet` varchar(300) NOT NULL,
  `BarangarOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ShipperId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Shipper: 21 rows
DELETE FROM `Shipper`;
/*!40000 ALTER TABLE `Shipper` DISABLE KEYS */;
INSERT INTO `Shipper` (`ShipperId`, `ShipperName`, `DateAdded`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `IsActive`) VALUES
	(21, 'General Beverage', '2016-01-22 00:00:00', '99/2 Moo 6, Taladjinda', 'Sampran', ' Nakorn Pathom', 209, b'1'),
	(3, 'PT Torabika Eka Semesta', '2016-01-04 00:00:00', 'JL Tomang Raya No. 21-23', 'Jakarta Barat 11440', 'Jakarta Indonesia', 95, b'1'),
	(4, 'Heritage Produce Distributing Inc.', '2016-01-04 00:00:00', '2161 W 182nd Street Suite 208', 'Torance', 'California USA', 224, b'1'),
	(5, 'Microsoft Mobile (Vietnam) LLC', '2016-01-04 00:00:00', '#8 Str 6 VSIP Bac Ninh Urban & Industrial Park', 'Phu Chan Bac Ninh', 'Vietnam ', 231, b'1'),
	(6, 'Kalbe International PTE LTD.', '2016-01-04 00:00:00', '21 Bukit Batok Crescent #27-79', 'Vocega Tower', 'Singapore 658065', 189, b'1'),
	(20, 'Zhongbo Technology Co., Ltd.', '2016-01-21 00:00:00', '98 Qingdao Middle Road, Weihai,', 'Shandong', 'China', 20, b'1'),
	(19, 'Asahi Glass Co., Ltd.', '2016-01-21 00:00:00', '1-5-1 Marunouchi Chiyoda-Ku', 'Tokyo 100-8405', 'Japan', 19, b'1'),
	(17, 'STATEC BINDER GmbH', '2016-01-21 00:00:00', 'Industriestrasse 32', '8200 Gleisdorf', 'Gleisdorf', 13, b'1'),
	(16, 'Nikon Hong Kong Ltd.', '2016-01-21 00:00:00', 'Suite 1001, 10/F Cityplaza One', '1111 King\\\'s Road', 'Taikoo Shing', 91, b'1'),
	(15, 'Veho UK', '2016-01-21 00:00:00', 'PO Box 436 ', 'Southampton', 'Hampshire', 223, b'1'),
	(18, 'Cambridge University Press', '2016-01-21 00:00:00', '15 Changi South St. 2', '3rd Floor', 'Singapore', 18, b'1'),
	(22, 'Panjapol Paper Industry co.ltd', '2016-01-26 00:00:00', '323 Silom road Bangrak', 'Bangkok', 'Thailand', 22, b'1'),
	(23, 'Gippy Milk Pty Ltd', '2016-01-26 00:00:00', '31-41 Mackey Street', 'Longwarry', 'Australia', 23, b'1'),
	(24, 'PT Nutrifood', '2016-01-22 00:00:00', 'Kawasan Industri Pulogadung', 'Jl. Rawabali II No.3', 'Jakarta 13920', 95, b'1'),
	(25, 'Zhongbo Technology Co.ltd', '2016-01-26 00:00:00', '98 Qingdao Middle Rd.', 'Weihai Shandong', 'China', 25, b'1'),
	(26, 'Bee Sweet Citrus', '2016-01-26 00:00:00', '416 E South Ave. ', 'Fowler CA', 'US', 26, b'1'),
	(27, 'ALFA Fruit Packers (Yantai City, Qixia) LTD.', '2016-01-26 00:00:00', 'Haila Rd, Guandao, Qixia', 'Yantai City, ', 'China', 27, b'1'),
	(28, 'PT Mayora Indah TBK', '2016-01-22 00:00:00', 'JL Tomang Raya No. 21-23', 'Jakarta Barat 11440', 'Jakarta Indonesia', 28, b'1'),
	(29, 'Eriez Magnetics (Tianjin) Co., Ltd', '2016-01-26 00:00:00', 'C2 Workshop, No. 10 of Xeda north 1st road', 'Xiqing Economic Development Area', 'Tianjin', 29, b'1'),
	(30, 'Broadbent (Thailand) Ltd.', '2016-01-26 00:00:00', '88 M. 5.T Muang A.', ' Muangchoburi', 'Chonburi', 30, b'1'),
	(31, 'Broquet Pumps', '2016-01-26 00:00:00', 'G. Briere S.A. Manufacturer', '15 Rue Jean Poulmarch ', 'Argenteuil', 31, b'1');
/*!40000 ALTER TABLE `Shipper` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ShipperContacts
CREATE TABLE IF NOT EXISTS `ShipperContacts` (
  `ShipperContactId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `ContactNo1` varchar(20) NOT NULL,
  `ContactNo2` varchar(20) DEFAULT NULL,
  `ShipperId` int(11) NOT NULL,
  PRIMARY KEY (`ShipperContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ShipperContacts: 0 rows
DELETE FROM `ShipperContacts`;
/*!40000 ALTER TABLE `ShipperContacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ShipperContacts` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Status
CREATE TABLE IF NOT EXISTS `Status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsBackground` bit(1) NOT NULL,
  `ColorCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Status: 9 rows
DELETE FROM `Status`;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
INSERT INTO `Status` (`StatusId`, `StatusName`, `Description`, `IsActive`, `IsBackground`, `ColorCode`) VALUES
	(1, 'Red Font', 'Cleared at BOC/ with schedule of delivery', b'1', b'0', '#ff0000'),
	(2, 'Gold', 'On process (pre-assess; final assess; awaits debit)', b'1', b'1', '#fae805'),
	(3, 'Green', 'Cleared at BOC/ but waiting for delivery schedule', b'1', b'1', '#00ff40'),
	(4, 'Blue', 'With original docs; but awaits arrival or with revisions', b'1', b'1', '#00B0F0'),
	(5, 'Pink', 'Awaits original docs; but with advance', b'1', b'1', '#FF66FF'),
	(6, 'Violet', 'Awaits original docs/no advance docs', b'1', b'1', '#B1A0C7'),
	(7, 'Red', 'With error or discrepancy on shipping docs', b'1', b'1', '#FF0000'),
	(8, 'Orange', 'Reschedule due to vessel stability', b'1', b'1', '#ff952b'),
	(9, 'Gray', 'Not awarded to Filport', b'1', b'1', '#c0c0c0');
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.User
CREATE TABLE IF NOT EXISTS `User` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `BirthDate` date NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `ProfileImageSource` varchar(150) DEFAULT NULL,
  `RoleId` int(11) NOT NULL,
  `ContactNo1` varchar(20) NOT NULL,
  `ContactNo2` varchar(20) DEFAULT NULL,
  `HouseBuildingNoStreet` varchar(300) NOT NULL,
  `BarangarOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `ConsigneeId` int(11) DEFAULT NULL,
  `SecretQuestionId` int(11) NOT NULL,
  `SecretAnswer` varchar(1000) NOT NULL,
  `SecretAnswerHint` varchar(1000) NOT NULL,
  `DateAdded` date DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='Table for Users of the system';

-- Dumping data for table FilportTrackingSystem.User: 17 rows
DELETE FROM `User`;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`UserId`, `UserName`, `Password`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `ProfileImageSource`, `RoleId`, `ContactNo1`, `ContactNo2`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ConsigneeId`, `SecretQuestionId`, `SecretAnswer`, `SecretAnswerHint`, `DateAdded`, `IsActive`) VALUES
	(1, 'benel', '81fd4c2c978ce0df65c1873b67092472a89b25fe', 'Benel', 'Benel', 'Benel', '1994-09-23', 'bla@the-asiagroup.com', '4efdead36a30c22c949ad7e049303901.jpg', 2, '09295646919', '6615104', '3A', 'F. Reyes', 'Cavite', 164, 0, 1, 'Nel', 'Nel', '2015-12-10', b'0'),
	(2, 'charlieadmin', 'f443857a547bc44feec45f535876f653aaccd506', 'Charlie', 'S', 'Bobis', '1992-02-18', 'charlie@the-asiagroup.com', 'user.png', 2, '09305071622', '', 'B1 L9 Rockville Compound 7, J.P. Ramoy Street', 'Talipapa', 'Novaliches, Caloocan', 164, 1, 1, 'bon', 'bon', '2015-12-10', b'0'),
	(3, 'reinenadmin', '999d82ed1eab228680b2cd65b4d288aff960db00', 'Reinen', 'Rosela', 'Constantino', '1995-06-22', 'reinen@the-asiagroup.com', 'ba842c61bd1a9a9dc79f7d6778ff99ef.jpg', 2, '09482095100', '', '417', 'San Roque', 'San Pablo ', 164, 1, 1, 'rey', 'secret', '2015-12-10', b'0'),
	(4, 'eli', '7f8b824434202ca008387248fcab83b809227462', 'eli', 'almonte', 'montefalcon', '2015-12-17', 'eli_montefalcon@yahoo.com', 'c288175248865f64163929308102bf3f.PNG', 2, '111111111111', '1111111111', '1', '1', '1', 17, 3, 15, '1', '1', '2015-12-11', b'0'),
	(5, 'renren', 'd7237cdec27f1cffe79cd5ea379fe5d260ca6ce3', 'ren', 'rein', 'curioso', '1993-11-17', 'admin@gmail.com', 'e4dcb0a1249d0348f73e8e72172fba17.jpg', 2, '0907566620', '0908258888', '285', 'alabng', 'Muntinlupa', 164, 2, 7, 'joy', 'ligaya', '2015-12-11', b'0'),
	(7, 'danieltenefrancia', 'b3abde8cfa5bf90e6ac428caea88eecd3bce1860', 'Daniel', 'Mandigma', 'Tenefrancia', '1996-08-05', 'daniel.tenefrancia@gmail.com', '4035bb3f90e16e77bb543641796d18f8.jpg', 2, '09362776832', '09362776832', 'Blk 27 Lot 8 Asana St', 'Southern Heights 2', 'San Pedro Laguna', 164, 1, 4, 'Asana', 'Where?', '2015-12-15', b'0'),
	(8, 'test', 'd7237cdec27f1cffe79cd5ea379fe5d260ca6ce3', 'test', 't', 'test', '2015-12-14', 'test@gmail.com', 'user.png', 2, '123', '133', '102', 'bla', 'asc', 14, 6, 3, 'joy', 'ligaya', '2015-12-17', b'0'),
	(9, 'asd', '999d82ed1eab228680b2cd65b4d288aff960db00', 'aoiush', 'asldi', 'gyasd', '2015-12-18', 'asd@asdoiuh.com', 'user.png', 2, '3254564', '65831823', '68523', 'Sasnd ASKdk', 'aaspodj aosmd', 17, 10, 1, 'asd', 'asd', '2015-12-17', b'0'),
	(10, 'zsdemesa', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Zernan', 'S', 'De mesa', '2015-12-31', 'ZSDeemesa@filport.com', 'user.png', 2, 'NA', 'NA', 'NA', 'NA', 'NA', 164, 1, 4, 'filport', 'filport', '2015-12-22', b'0'),
	(11, 'marie', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Marie', 'A', 'Treyes', '2015-12-17', 'mbtreyes@filport.com', 'user.png', 2, '09455343651235', '', 'San Pedro,Laguna', 'San Pedro', 'LAGUNA', 164, 3, 1, 'marie', 'marie', '2015-12-22', b'0'),
	(12, 'jcgalang', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Jonathan', 'C', 'Galang', '2015-12-31', 'jcgalang@filport.com', 'user.png', 2, 'NA', 'NA', 'NA', 'NA', 'NA', 164, 3, 1, 'filport', 'filport', '2015-12-22', b'0'),
	(13, 'adespinosa', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Analyn', 'D', 'Espinosa', '2015-12-31', 'adespinosa@filport.com', 'user.png', 2, 'NA', 'NA', 'NA', 'NA', 'NA', 164, 3, 1, 'filport', 'filport', '2015-12-22', b'0'),
	(14, 'Edralyn', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Edralyn', 'C', 'Nunga', '2015-12-17', 'ecnunga@filport.com', 'user.png', 2, '09455343651235', '', 'San Pedro,Laguna', 'San Pedro', 'LAGUNA', 164, 1, 0, 'edralyn', 'edralyn', '2015-12-22', b'0'),
	(15, 'cbcerina', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Charina', 'B', 'Cerina', '2015-12-31', 'cbcerina@filport.com', 'user.png', 2, 'NA', 'NA', 'NA', 'NA', 'NA', 164, 3, 1, 'filport', 'filport', '2015-12-22', b'0'),
	(16, 'bongedradan', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Bong', 'A', 'Edradan', '2015-12-31', 'bong@yngen.com.ph', 'user.png', 2, 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 0, 'filport', 'filport', '2015-12-22', b'0'),
	(17, 'Stephanie', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Stephanie', 'A', 'Beltran', '2015-12-17', 'step@filport.com', 'user.png', 2, '09455343651235', '', 'San Pedro,Laguna', 'San Pedro', 'LAGUNA', 0, 0, 0, 'stephanie', 'stephanie', '2015-12-22', b'0'),
	(18, 'Joybelle', '466cce5a6cef7e805fb188ee5bcca2a0b1719664', 'Joybelle', 'D', 'Mendoza', '2015-12-17', 'joy@filport.com', 'user.png', 2, '09455343651235', '', 'San Pedro,Laguna', 'San Pedro', 'LAGUNA', 0, 0, 1, 'joybelle', 'joybelle', '2015-12-22', b'0');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
