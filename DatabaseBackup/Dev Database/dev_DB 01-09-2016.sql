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

-- Dumping database structure for dev_FilportTrackingSystem
CREATE DATABASE IF NOT EXISTS `dev_FilportTrackingSystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dev_FilportTrackingSystem`;


-- Dumping structure for table dev_FilportTrackingSystem.Broker
CREATE TABLE IF NOT EXISTS `Broker` (
  `BrokerId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `HouseBuildingNoStreet` varchar(300) NOT NULL,
  `BarangarOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `ContactNo1` varchar(20) NOT NULL,
  `ContactNo2` varchar(20) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`BrokerId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Broker: 6 rows
DELETE FROM `Broker`;
/*!40000 ALTER TABLE `Broker` DISABLE KEYS */;
INSERT INTO `Broker` (`BrokerId`, `FirstName`, `MiddleName`, `LastName`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ContactNo1`, `ContactNo2`, `IsActive`) VALUES
	(1, 'Benigno  ', 'C.  ', 'Aquino III  ', 'Malacañan Palace', '12', 'Manila', 164, '123-4567', 'mala@info.com', b'0'),
	(2, 'Ejercito', 'D.', 'Estrada', 'Coconut Palace', 'Banana St.', 'Metro Manila', 164, '1234-9564', 'ede@yahoo.com.ph', b'0'),
	(3, 'Niño Beb', 'A', 'Virtudazo', '205 DR Pilapil Street', 'San Miguel', 'Pasig City', 164, '09175858029', '', b'1'),
	(4, 'Elmie', 'C', 'Dionaldo', 'Cavite', 'Dasmarinas', 'Cavite City', 164, '09175858033', '', b'1'),
	(5, 'Monalisa', '', 'Malabanan', '111', 'BF Paranaque', 'Paranaque City', 164, '09175858032', '', b'1'),
	(6, 'Reymond', 'L', 'Belarma', '111', 'Navotas', 'Navotas City', 164, '09175858034', '', b'1');
/*!40000 ALTER TABLE `Broker` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Carrier
CREATE TABLE IF NOT EXISTS `Carrier` (
  `CarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CarrierName` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `OfficeNo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CarrierId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='From ShipperVessel to Carrier';

-- Dumping data for table dev_FilportTrackingSystem.Carrier: 20 rows
DELETE FROM `Carrier`;
/*!40000 ALTER TABLE `Carrier` DISABLE KEYS */;
INSERT INTO `Carrier` (`CarrierId`, `IsActive`, `CarrierName`, `Address`, `OfficeNo`) VALUES
	(1, b'0', 'Titanic', 'balinacon', '5235423'),
	(2, b'0', 'SaGo Travel', NULL, NULL),
	(3, b'0', 'MV Princess of the Star', NULL, NULL),
	(4, b'1', 'Regional Container Lines (RCL)', NULL, NULL),
	(5, b'1', 'APL', NULL, NULL),
	(6, b'1', 'Ben Line Agencies Philippines Inc.', NULL, NULL),
	(7, b'1', 'CEL Logistics Inc.', 'Manila', '1234567890'),
	(8, b'1', 'China Shipping Manila Agency Inc.', NULL, NULL),
	(9, b'1', 'CMA CGM Philippines Inc.', NULL, NULL),
	(10, b'1', 'Evergreen Shipping Agency Philippines Corp.', NULL, NULL),
	(11, b'1', '"K" Line Philippines Inc.', NULL, NULL),
	(12, b'1', 'MCC Transport', NULL, NULL),
	(13, b'1', 'MOL Philippines Inc.', NULL, NULL),
	(14, b'1', 'SITC Container Lines Philippines Inc.', NULL, NULL),
	(15, b'1', 'Sky International Inc.', NULL, NULL),
	(16, b'1', 'TMS Ship Agencies Inc.', NULL, NULL),
	(17, b'1', 'Wan Hai Lines (Phils) Inc.', NULL, NULL),
	(18, b'1', 'Philippine Airlines (PAL)', NULL, NULL),
	(19, b'1', 'Cebu Pacific', NULL, NULL),
	(20, b'0', 'Better Carrier', 'Blk 29 Lot 29 San Pedro', '+639265876959');
/*!40000 ALTER TABLE `Carrier` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.CarrierByJobFile
CREATE TABLE IF NOT EXISTS `CarrierByJobFile` (
  `CarrierByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  PRIMARY KEY (`CarrierByJobFileId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='From ShipperByVessel to CarrierByJobFile';

-- Dumping data for table dev_FilportTrackingSystem.CarrierByJobFile: 6 rows
DELETE FROM `CarrierByJobFile`;
/*!40000 ALTER TABLE `CarrierByJobFile` DISABLE KEYS */;
INSERT INTO `CarrierByJobFile` (`CarrierByJobFileId`, `JobFileId`, `CarrierId`, `VesselVoyageNo`, `DischargeTime`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`) VALUES
	(1, '2', 11, '4', '0000-00-00 00:00:00', '2016-01-13 13:00:00', '2016-01-13 12:59:00', '0000-00-00 00:00:00'),
	(2, '3', 13, 'IT010', '2016-01-07 17:43:00', '2016-01-20 23:00:00', '2016-01-21 01:00:00', '2016-01-14 14:34:00'),
	(3, '4', 8, 'XYZ001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-15 12:21:00', '2016-01-05 00:12:00'),
	(4, '4', 4, 'ewqewqewqe', '2016-01-06 16:35:00', '2016-01-02 00:12:00', '2016-12-12 06:02:00', '2016-01-05 09:09:00'),
	(5, '4', 15, 'vESSEl001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, '1', 9, '534543543', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, '9', 11, 'derfwer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, '10', 5, 'sfsdfdsf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, '11', 13, 'VSL00981', '2016-01-05 02:44:00', '2016-01-01 00:23:00', '2016-12-23 13:02:00', '2016-01-12 02:32:00'),
	(10, '12', 9, 'fgh6543', '2005-04-05 18:54:00', '2016-01-14 12:21:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `CarrierByJobFile` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.CarrierByJobFileHistory
CREATE TABLE IF NOT EXISTS `CarrierByJobFileHistory` (
  `CarrierByJobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) NOT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`CarrierByJobFileHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.CarrierByJobFileHistory: 6 rows
DELETE FROM `CarrierByJobFileHistory`;
/*!40000 ALTER TABLE `CarrierByJobFileHistory` DISABLE KEYS */;
INSERT INTO `CarrierByJobFileHistory` (`CarrierByJobFileHistoryId`, `CarrierByJobFileId`, `JobFileId`, `CarrierId`, `VesselVoyageNo`, `DischargeTime`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, '2', 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 21:56:00', 0),
	(2, 1, '3', 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 21:56:00', 0),
	(3, 1, '4', 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 21:56:00', 0),
	(4, 1, '4', 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 21:56:00', 0),
	(5, 1, '4', 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 21:56:00', 0),
	(6, 1, '1', 9, '534543543', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 00:55:00', 4),
	(7, 7, '9', 11, 'derfwer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 05:30:00', 4),
	(8, 8, '10', 5, 'sfsdfdsf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-10 05:37:00', 4),
	(9, 9, '11', 13, 'VSL00981', '2016-01-05 02:44:00', '2016-01-01 00:23:00', '2016-12-23 13:02:00', '2016-01-12 02:32:00', '2016-01-09 14:47:00', 1),
	(10, 10, '12', 9, 'fgh6543', '2005-04-05 18:54:00', '2016-01-14 12:21:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 15:05:00', 1);
/*!40000 ALTER TABLE `CarrierByJobFileHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ColorSelectivity
CREATE TABLE IF NOT EXISTS `ColorSelectivity` (
  `ColorSelectivityId` int(11) NOT NULL AUTO_INCREMENT,
  `ColorSelectivityName` varchar(50) NOT NULL,
  PRIMARY KEY (`ColorSelectivityId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.ColorSelectivity: 3 rows
DELETE FROM `ColorSelectivity`;
/*!40000 ALTER TABLE `ColorSelectivity` DISABLE KEYS */;
INSERT INTO `ColorSelectivity` (`ColorSelectivityId`, `ColorSelectivityName`) VALUES
	(1, 'Yellow'),
	(2, 'Red'),
	(3, 'Green');
/*!40000 ALTER TABLE `ColorSelectivity` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Consignee
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Dumping data for table dev_FilportTrackingSystem.Consignee: 21 rows
DELETE FROM `Consignee`;
/*!40000 ALTER TABLE `Consignee` DISABLE KEYS */;
INSERT INTO `Consignee` (`ConsigneeId`, `ConsigneeName`, `HouseBuildingNoOrStreet`, `BarangayOrVillage`, `TownOrCityProvince`, `CountryId`, `OfficeNumber`, `EmailAddress`, `DateAdded`, `IsActive`) VALUES
	(1, 'Eliseo Holdings', '123 Building', 'Nilumang Kawayan', 'Laguna', '164', '564-1924', NULL, '2015-12-23', b'0'),
	(2, 'TopConnection.Asia Inc.', 'Orient Square Building', 'San Antonio', 'Ortigas Center, Pasig City', '164', '661-5104', NULL, '2015-12-23', b'0'),
	(3, 'Unilever Philippines', 'Malinta', 'San Roque', 'Antipolo City', '164', '771-5642', NULL, '2015-12-23', b'0'),
	(4, 'Eccosential Foods Corporation', 'Warehouse #8 Mercury Avenue ', 'Bagumbayan Libis', 'Quezon City', '164', '09178607774', NULL, '2015-12-23', b'1'),
	(5, '101 Cargo Solutions Logistics', '308 The One Executive Office Building', '5 West Avenue ', 'Quezon City', '164', '02-7097587', NULL, '2016-01-04', b'1'),
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
	(21, 'adsadassd', 'asdasd', '12123', '123123123', '1', '123123123', NULL, '2016-01-04', b'1');
/*!40000 ALTER TABLE `Consignee` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ConsigneeContacts
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

-- Dumping data for table dev_FilportTrackingSystem.ConsigneeContacts: 6 rows
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


-- Dumping structure for table dev_FilportTrackingSystem.ConsigneeTemp
CREATE TABLE IF NOT EXISTS `ConsigneeTemp` (
  `ConsigneeId` int(11) NOT NULL DEFAULT '0',
  `ConsigneeName` varchar(100) NOT NULL,
  `HouseBuildingNoOrStreet` varchar(300) NOT NULL,
  `BarangayOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` varchar(300) NOT NULL,
  `OfficeNumber` varchar(1000) DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.ConsigneeTemp: 0 rows
DELETE FROM `ConsigneeTemp`;
/*!40000 ALTER TABLE `ConsigneeTemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `ConsigneeTemp` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ContainerByCarrier
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.ContainerByCarrier: 7 rows
DELETE FROM `ContainerByCarrier`;
/*!40000 ALTER TABLE `ContainerByCarrier` DISABLE KEYS */;
INSERT INTO `ContainerByCarrier` (`ContainerByCarrierId`, `ContainerNo`, `ContainerSize`, `CarrierByJobFileId`, `NoOfCartons`, `RefEntryNo`, `TruckerName`, `StartOfStorage`, `Lodging`, `DateBOCCleared`, `HaulerOrTruckId`, `TargetDeliveryDate`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`, `DateReceivedAtWhse`) VALUES
	(1, 'CTN1', '10x10', 1, 100, '432432', 'PLATE1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-14 01:00:00', 3, '0000-00-00 00:00:00', '2016-01-30 01:00:00', '2016-01-21 01:00:00', '2016-01-30 01:00:00', '2016-01-13 01:00:00', '2016-01-05 14:59:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 12:22:11'),
	(2, 'CNT-0981234-0011', '10 X 25', 2, 125, 'ref12345', 'eli', '2016-01-14 01:00:00', '2016-09-27 12:59:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '2016-01-26 20:06:00', '2016-01-01 12:23:00', '2016-01-19 12:12:00', '0000-00-00 00:00:00', '2016-10-19 12:59:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-26 12:59:00', '0000-00-00 00:00:00', '2016-01-09 12:22:13'),
	(3, 'CNT098', '10 X 10', 4, 340, 'ref,123', '', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-13 00:00:00', 1, '2016-01-02 00:00:00', '1970-01-01 08:00:00', '2003-12-28 00:00:00', '2008-07-05 00:00:00', '2016-01-18 00:00:00', '2016-01-14 00:00:00', '2015-12-31 00:00:00', '2016-01-01 00:00:00', '2016-01-07 00:00:00', '2016-01-27 00:00:00', '2016-01-09 12:22:15'),
	(4, 'CNT098', '10 X 10', 3, 340, 'ref,123', '', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-13 00:00:00', 1, '2016-01-02 00:00:00', '1970-01-01 08:00:00', '2003-12-28 00:00:00', '2008-07-05 00:00:00', '2016-01-18 00:00:00', '2016-01-14 00:00:00', '2015-12-31 00:00:00', '2016-01-01 00:00:00', '2016-01-07 00:00:00', '2016-01-27 00:00:00', '2016-01-09 12:22:17'),
	(5, 'CNT098', '10 X 10', 3, 340, 'ref,123', '\\n											 AAP											 ', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-13 00:00:00', 1, '2016-01-02 00:00:00', '2060-02-12 00:00:00', '2003-12-28 00:00:00', '2008-07-05 00:00:00', '2016-01-18 00:00:00', '2016-01-14 00:00:00', '2015-12-31 00:00:00', '2016-01-01 00:00:00', '2016-01-07 00:00:00', '2016-01-27 00:00:00', '2016-01-09 12:22:19'),
	(6, '3', '2342', 6, 4234324, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 12:22:21'),
	(7, 'dsfs', 'dfsdsfsd', 1, 0, '', '\\n							 AAP							 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 12:22:23'),
	(11, 'asd', '123', 3, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, '123', 'asd', 6, 123, '2016-01-08', '\\n							 AAP							 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '2016-01-26 00:00:00', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(9, '3423', '3432', 7, 4345, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(10, 'dfgdsfsd', '', 8, 0, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(12, 'as123', 'asd', 1, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'asdasd', '123', 5, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'asd2', '123', 3, 123, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, '123', 'asd', 3, 123, '123', '\\n                                                 Mardean James Enterprises                        ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'CNT111111110000', '120 X 120', 9, 1500, 'Ref.0987', '\\n											 Mardean James Enterprises											 ', '2016-02-03 00:00:00', '2016-01-08 00:00:00', '2016-01-26 00:00:00', 3, '2016-01-07 00:00:00', '2016-01-28 00:00:00', '2016-01-08 00:00:00', '2016-01-14 00:00:00', '2016-01-19 00:00:00', '2016-01-07 00:00:00', '2015-12-30 00:00:00', '2016-01-14 00:00:00', '2016-01-06 00:00:00', '2016-01-20 00:00:00', '0000-00-00 00:00:00'),
	(17, 'CNT00000', '100 X 100', 9, 550, 'Ref.12345', '\\n											 Mardean James Enterprises											 ', '2016-01-20 00:00:00', '2016-01-08 00:00:00', '2016-01-26 00:00:00', 3, '2015-12-31 00:00:00', '2016-01-14 00:00:00', '2016-01-28 00:00:00', '2016-01-13 00:00:00', '2016-01-28 00:00:00', '2016-01-07 00:00:00', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-06 00:00:00', '2016-01-13 00:00:00', '0000-00-00 00:00:00'),
	(18, 'cnt786', '20 X 20', 10, 123, '', '\\n											 Jam Liner Inc.											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ContainerByCarrier` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ContainerByCarrierHistory
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.ContainerByCarrierHistory: 7 rows
DELETE FROM `ContainerByCarrierHistory`;
/*!40000 ALTER TABLE `ContainerByCarrierHistory` DISABLE KEYS */;
INSERT INTO `ContainerByCarrierHistory` (`ContainerByCarrierHistoryId`, `ContainerByCarrierId`, `ContainerNo`, `ContainerSize`, `CarrierByJobFileId`, `NoOfCartons`, `RefEntryNo`, `TruckerName`, `StartOfStorage`, `Lodging`, `DateBOCCleared`, `HaulerOrTruckId`, `TargetDeliveryDate`, `DateSentFinalAssessment`, `DatePaid`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`, `DateReceivedAtWhse`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, '4324', '4234', 1, 432, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-09 17:05:00', 4),
	(2, 1, 'CNT-0981234', '', 2, 0, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-09 01:28:00', 7),
	(3, 1, 'CNT-00908123', '', 2, 0, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-09 01:28:00', 7),
	(4, 1, 'CCT1123', '12 X12', 4, 500, 'REF.09876', '\\n											 CHER Transport Devt service Cooperative											 ', '2016-01-07 00:00:00', '2016-01-05 00:00:00', '2016-01-21 00:00:00', 4, '2015-12-29 00:00:00', '2016-01-21 00:00:00', '2016-01-01 00:00:00', '0000-00-00 00:00:00', '2016-01-14 00:00:00', '2016-01-07 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-12 00:00:00', NULL, '2016-01-09 03:15:00', 1),
	(5, 1, 'CNT098', '10 X 10', 3, 340, 'ref,123', '\\n											 AAP											 ', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-13 00:00:00', 1, '2016-01-02 00:00:00', '2060-02-12 00:00:00', '2003-12-28 00:00:00', '2008-07-05 00:00:00', '2016-01-18 00:00:00', '2016-01-14 00:00:00', '2015-12-31 00:00:00', '2016-01-01 00:00:00', '2016-01-07 00:00:00', '2016-01-27 00:00:00', NULL, '2016-01-09 03:15:00', 1),
	(6, 1, '3', '2342', 6, 4234324, '', '\\n							 AAP							 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-10 00:55:00', 4),
	(7, 1, 'dsfs', 'dfsdsfsd', 1, 0, '', '\\n							 AAP							 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-10 03:52:00', 4),
	(8, 1, '123', 'asd', 6, 123, '2016-01-08', '\\n							 AAP							 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '2016-01-26 00:00:00', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-09 12:41:00', 3),
	(9, 9, '3423', '3432', 7, 4345, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-10 05:30:00', 4),
	(10, 10, 'dfgdsfsd', '', 8, 0, '', '\\n											 AAP											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2016-01-10 05:37:00', 4),
	(11, 11, 'asd', '123', 3, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:21:00', 3),
	(12, 12, 'as123', 'asd', 1, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:23:00', 3),
	(13, 13, 'asdasd', '123', 5, 0, '', '\\n                                                 AAP                                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:25:00', 3),
	(14, 14, 'asd2', '123', 3, 123, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:33:00', 3),
	(15, 15, '123', 'asd', 3, 123, '123', '\\n                                                 Mardean James Enterprises                        ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:34:00', 3),
	(16, 16, 'CNT111111110000', '120 X 120', 9, 1500, 'Ref.0987', '\\n											 Mardean James Enterprises											 ', '2016-02-03 00:00:00', '2016-01-08 00:00:00', '2016-01-26 00:00:00', 3, '2016-01-07 00:00:00', '2016-01-28 00:00:00', '2016-01-08 00:00:00', '2016-01-14 00:00:00', '2016-01-19 00:00:00', '2016-01-07 00:00:00', '2015-12-30 00:00:00', '2016-01-14 00:00:00', '2016-01-06 00:00:00', '2016-01-20 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:51:00', 1),
	(17, 17, 'CNT00000', '100 X 100', 9, 550, 'Ref.12345', '\\n											 Mardean James Enterprises											 ', '2016-01-20 00:00:00', '2016-01-08 00:00:00', '2016-01-26 00:00:00', 3, '2015-12-31 00:00:00', '2016-01-14 00:00:00', '2016-01-28 00:00:00', '2016-01-13 00:00:00', '2016-01-28 00:00:00', '2016-01-07 00:00:00', '2016-01-07 00:00:00', '2016-01-01 00:00:00', '2016-01-06 00:00:00', '2016-01-13 00:00:00', '0000-00-00 00:00:00', '2016-01-09 14:51:00', 1),
	(18, 18, 'cnt786', '20 X 20', 10, 123, '', '\\n											 Jam Liner Inc.											 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-09 15:06:00', 1);
/*!40000 ALTER TABLE `ContainerByCarrierHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Countries
CREATE TABLE IF NOT EXISTS `Countries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL DEFAULT '0',
  `CountryCode` char(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Countries: 236 rows
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


-- Dumping structure for table dev_FilportTrackingSystem.HaulerOrTruck
CREATE TABLE IF NOT EXISTS `HaulerOrTruck` (
  `HaulerOrTruckId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerOrTruck` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `TIN` varchar(50) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`HaulerOrTruckId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.HaulerOrTruck: 5 rows
DELETE FROM `HaulerOrTruck`;
/*!40000 ALTER TABLE `HaulerOrTruck` DISABLE KEYS */;
INSERT INTO `HaulerOrTruck` (`HaulerOrTruckId`, `HaulerOrTruck`, `IsActive`, `TIN`, `Address`) VALUES
	(1, 'AAP', b'1', '851-325-003-000', 'Edsa II, North Ave. Ortigas Center '),
	(2, 'Jam Liner Inc.', b'1', '564-021-564-009', 'Bagong Silang, Muntinlupa City'),
	(3, 'Mardean James Enterprises', b'1', '225-394-653-000', 'Manila Harbour Centre'),
	(4, 'CHER Transport Devt service Cooperative', b'1', '232-051-294-001', 'dasdsadasdasdasdas'),
	(5, 'Genesis Transit Corp.', b'1', '123-456-789-000', 'Baulacan, Bulacan');
/*!40000 ALTER TABLE `HaulerOrTruck` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.HistoricalStatus
CREATE TABLE IF NOT EXISTS `HistoricalStatus` (
  `HistoricalStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(300) DEFAULT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoricalStatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.HistoricalStatus: 6 rows
DELETE FROM `HistoricalStatus`;
/*!40000 ALTER TABLE `HistoricalStatus` DISABLE KEYS */;
INSERT INTO `HistoricalStatus` (`HistoricalStatusId`, `StatusDescription`, `JobFileId`, `DateAdded`, `AddedBy_UserId`) VALUES
	(1, 'a short literary composition on a particular theme or subject, usually in prose and generally analytic, speculative, or interpretative. 2. anything resembling such a composition: a picture essay.', 4, '2016-01-08 12:08:59', 1),
	(2, 'en.wikipedia.org/?title=Essay\\nEssays are generally scholarly pieces of writing giving the author\\\'s own argument, but the definition is vague, overlapping with those of an article, a pamphlet and a short story.\\n?Michel de Montaigne - ?Five paragraph essay - ?Application essay - ?Introduction\\nWrit', 4, '2016-01-09 03:32:00', 1),
	(3, 'The introduction of a new career column, \\\'Conditionally Accepted\\\' (essay)\\nInside Higher Ed? - 11 hours ago\\nIn July 2013, I launched a blog called Conditionally Accepted -- an online space for scholars on the margins of academe. At the time, I was ...\\nMy Marriage Didn\\\'t End When I Became a Wido', 4, '2016-01-09 04:05:00', 1),
	(4, 'Benel Lumacang Ampuan celebrating Rizal Day with Ronalyn Anonuevo and 3 others in General Mariano Alvarez, Cavite.\\nJanuary 7 at 7:43pm\\nLate upload.. smile emoticon smile emoticon\\nThings like this must be added in our bucket of memories wink emoticon grin emoticon\\n', 4, '2016-01-09 08:20:00', 1),
	(5, 'Title: Curve of Joy\\n\\nRANDOM FACT: If you smile, even if you are in a bad mood, It will immediately improve your mood..\\n\\n\\"I hope you always find reason to Smile\\" grin emoticon grin emoticon — with Shaina Ines at Jabez Camp Site, Dasmarinas Cavite.', 3, '2016-01-09 08:28:00', 1),
	(6, 'Control your temper...smile always!????\\n01.09.16', 3, '2016-01-09 08:36:00', 1),
	(7, 'Eat Bulaga!\\nTelevision show\\n8.6/10·IMDb\\nEat Bulaga! is the longest running noon-time variety show in the Philippines produced by Television And Production Exponents Inc. and aired by GMA Network. Wikipedia\\nTheme song: Eat Bulaga! Theme Song\\nFirst shown in: Philippines\\nProgram creator: TAPE Inc', 11, '2016-01-08 23:46:10', 1),
	(8, 'Eat Bulaga! is the longest running noon-time variety show in the Philippines produced by Television And Production Exponents Inc. and aired by GMA Network. Wikipedia', 12, '2016-01-09 00:04:53', 1);
/*!40000 ALTER TABLE `HistoricalStatus` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Images
CREATE TABLE IF NOT EXISTS `Images` (
  `ImageId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeId` int(11) NOT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `ImageSource` varchar(1000) NOT NULL,
  `FileName` varchar(300) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table for Images, images for User Accounts and Jobfile(scanned Images)';

-- Dumping data for table dev_FilportTrackingSystem.Images: 0 rows
DELETE FROM `Images`;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ImageType
CREATE TABLE IF NOT EXISTS `ImageType` (
  `ImageTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeDescription` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ImageTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Image Type (if scanned image or User Profile Image)';

-- Dumping data for table dev_FilportTrackingSystem.ImageType: 0 rows
DELETE FROM `ImageType`;
/*!40000 ALTER TABLE `ImageType` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImageType` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.JobFile
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
  `DateReceivedNoticeFromClients` date DEFAULT NULL,
  `DateReceivedOfBL` date DEFAULT NULL,
  `DateReceivedOfOtherDocs` date DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` date DEFAULT NULL,
  PRIMARY KEY (`JobFileId`),
  UNIQUE KEY `JobFileId` (`JobFileNo`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.JobFile: 6 rows
DELETE FROM `JobFile`;
/*!40000 ALTER TABLE `JobFile` DISABLE KEYS */;
INSERT INTO `JobFile` (`JobFileId`, `JobFileNo`, `ConsigneeId`, `BrokerId`, `ShipperId`, `PurchaseOrderNo`, `MonitoringTypeId`, `IsLocked`, `StatusId`, `ColorSelectivityId`, `Registry`, `LockedBy_UserId`, `Origin_CountryId`, `OriginCity`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `MasterBillLadingNo2`, `LetterCreditFromBank`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `Forwarder`, `Warehouse`, `FlightNo`, `AirCraftNo`, `DateReceivedNoticeFromForwarder`) VALUES
	(1, 'eliseos', 7, 4, 8, '423423423', 1, b'1', 4, 1, '423423', 4, 6, '32323', '2016-01-09 01:03:00', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, NULL),
	(2, '3124cfxgvdf', 11, 6, 1, 'fsdfdsfsd423423', 1, b'1', 4, 1, 'fsdfdsf4234234', 4, 6, '32323', '2016-01-09 17:05:00', '4324323423442342', '423423423423432432432', '4432432434235345435434234324324234', 'dsfsdf32423423423', '2016-01-21', '2016-01-28', '2016-01-12', '2016-01-09', '2016-01-11', NULL, NULL, NULL, NULL, NULL),
	(3, 'JFN-01-09-20168', 8, 3, 8, 'PIPO098', 1, b'1', 1, 3, 'rg.123', 4, 164, 'Batangas City', '2016-01-09 01:28:00', 'HBL-91324', 'MBL123', 'AMABLAA123', 'LBC123', '2016-01-07', '2015-12-31', '2016-01-14', '2016-01-09', '2016-01-06', NULL, NULL, NULL, NULL, NULL),
	(4, 'BLA01-09-2016', 6, 3, 12, '', 2, b'0', 1, 1, 'Reg.123', 1, 164, 'Batangas City', '2016-01-09 03:08:00', 'HBL123', 'MBL123', 'MBL123A', 'LBC123', '2016-12-21', '2016-03-12', '1212-12-12', '2016-01-09', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(5, '', 0, 4, 0, '', 0, b'0', 0, 1, '', 3, 0, '', '2016-01-09 03:56:00', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '2016-01-09', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(6, '432gt', 8, 4, 12, '', 1, b'1', 3, 1, '', 4, 1, '', '2016-01-10 01:11:00', '423', '423', '423432', '', '0000-00-00', '0000-00-00', '0000-00-00', '2016-01-10', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(7, 'kriste', 6, 4, 1, '', 1, b'1', 5, 1, '', 4, 1, '', '2016-01-10 05:14:00', '53454ff', 'dsfdsf', 'dsfsd', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(8, 's', 8, 4, 1, '423423423', 1, b'0', 5, 1, '', 4, 1, '', '2016-01-10 05:18:00', 'dfsd', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, NULL),
	(9, 'fdsfds', 10, 4, 6, '', 1, b'0', 6, 1, '', 4, 1, '', '2016-01-10 05:30:00', 'drwr', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(10, 'sdasd', 8, 4, 8, '', 1, b'0', 8, 1, '', 4, 1, '', '2016-01-10 05:36:00', 'dfsfsd', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(11, 'MAC01-09-2016', 5, 3, 6, '', 1, b'0', 1, 1, 'REG1234', 1, 164, 'Cavite Rizal', '2016-01-09 14:46:00', 'HBL1234', 'MBL1234A', 'MBL1234AA', 'LBC1234', '2016-01-08', '2016-01-22', '2016-01-07', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL),
	(12, 'EAM01-09-2016', 6, 3, 6, '', 1, b'0', 1, 1, 'reg0987', 1, 164, 'Cavite City', '2016-01-09 15:04:00', 'hbl0987', 'mbl0987', 'mbl0987aa', 'lcb12345', '2016-01-06', '2016-01-28', '2016-01-20', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `JobFile` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.JobFileHistory
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
  `DateReceivedNoticeFromClients` date DEFAULT NULL,
  `DateReceivedOfBL` date DEFAULT NULL,
  `DateReceivedOfOtherDocs` date DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `ForwarderWarehouse` int(11) DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` date DEFAULT NULL,
  `DateUpdated` date NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.JobFileHistory: 6 rows
DELETE FROM `JobFileHistory`;
/*!40000 ALTER TABLE `JobFileHistory` DISABLE KEYS */;
INSERT INTO `JobFileHistory` (`JobFileHistoryId`, `JobFileId`, `JobFileNo`, `ConsigneeId`, `BrokerId`, `ShipperId`, `PurchaseOrderNo`, `MonitoringTypeId`, `StatusId`, `IsLocked`, `ColorSelectivityId`, `Registry`, `LockedBy_UserId`, `Origin_CountryId`, `OriginCity`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `MasterBillLadingNo2`, `LetterCreditFromBank`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `ForwarderWarehouse`, `FlightNo`, `AirCraftNo`, `DateReceivedNoticeFromForwarder`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 'eliseos', 7, 4, 8, '423423423', 1, 4, b'1', 1, '423423', 4, 6, '32323', '2016-01-09 01:03:50', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(2, 2, 'eliseos', 7, 4, 8, '423423423', 1, 4, b'1', 1, '423423', 4, 6, '32323', '2016-01-09 17:05:24', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(3, 3, 'JFN-01-09-20168', 8, 3, 8, 'PIPO098', 1, 1, b'1', 3, 'rg.123', 4, 164, 'Batangas City', '2016-01-09 01:28:02', 'HBL-91324', 'MBL123', 'AMABLAA123', 'LBC123', '2016-01-07', '2015-12-31', '2016-01-14', '2016-01-09', '2016-01-06', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(4, 4, 'eliseos', 7, 4, 8, '423423423', 1, 4, b'1', 1, '423423', 4, 6, '32323', '2016-01-09 03:08:58', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(5, 5, 'eliseos', 7, 4, 8, '423423423', 0, 4, b'1', 1, '423423', 4, 6, '32323', '2016-01-09 03:56:09', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(6, 6, 'eliseos', 7, 4, 8, '423423423', 1, 4, b'1', 1, '423423', 4, 6, '32323', '2016-01-10 01:11:01', 'asd', '423', '23423432423', '4234234', '2015-12-30', '2016-01-05', '2016-02-02', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(7, 7, 'krist', 6, 4, 1, '', 1, 4, b'0', 1, '', 4, 1, '', '2016-01-10 05:14:37', '53454', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(8, 8, 's', 8, 4, 1, '423423423', 1, 5, b'0', 1, '', 4, 1, '', '2016-01-10 05:18:23', 'dfsd', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '2016-01-09', '2016-01-20', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(9, 9, 'fdsfds', 10, 4, 6, '', 1, 6, b'0', 1, '', 4, 1, '', '2016-01-10 05:30:15', 'drwr', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(10, 10, 'sdasd', 8, 4, 8, '', 1, 8, b'0', 1, '', 4, 1, '', '2016-01-10 05:36:51', 'dfsfsd', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '2016-01-10', 4),
	(11, 11, 'MAC01-09-2016', 5, 3, 6, '', 1, 1, b'0', 1, 'REG1234', 1, 164, 'Cavite Rizal', '2016-01-09 14:46:08', 'HBL1234', 'MBL1234A', 'MBL1234AA', 'LBC1234', '2016-01-08', '2016-01-22', '2016-01-07', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '2016-01-09', 1),
	(12, 12, 'EAM01-09-2016', 6, 3, 6, '', 1, 1, b'0', 1, 'reg0987', 1, 164, 'Cavite City', '2016-01-09 15:04:51', 'hbl0987', 'mbl0987', 'mbl0987aa', 'lcb12345', '2016-01-06', '2016-01-28', '2016-01-20', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, '2016-01-09', 1);
/*!40000 ALTER TABLE `JobFileHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.MonitoringType
CREATE TABLE IF NOT EXISTS `MonitoringType` (
  `MonitoringTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MonitoringTypeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`MonitoringTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.MonitoringType: 3 rows
DELETE FROM `MonitoringType`;
/*!40000 ALTER TABLE `MonitoringType` DISABLE KEYS */;
INSERT INTO `MonitoringType` (`MonitoringTypeId`, `MonitoringTypeName`, `Description`) VALUES
	(1, 'Manila', 'JobFile Monitoring for Manila'),
	(2, 'Outport', 'JobFile Monitoring for Outport'),
	(3, 'Air', 'JobFile Monitoring for Air');
/*!40000 ALTER TABLE `MonitoringType` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Products
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Products: 3 rows
DELETE FROM `Products`;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` (`ProductId`, `ProductName`, `IsActive`) VALUES
	(1, 'Kopico 3 and 1', b'1'),
	(2, 'Samsung ', b'1'),
	(3, 'Kopiko Blanca Hanger 24x10x30G', b'1');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ProductsByContainer
CREATE TABLE IF NOT EXISTS `ProductsByContainer` (
  `ProductsByContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.ProductsByContainer: 13 rows
DELETE FROM `ProductsByContainer`;
/*!40000 ALTER TABLE `ProductsByContainer` DISABLE KEYS */;
INSERT INTO `ProductsByContainer` (`ProductsByContainerId`, `ProductId`, `ContainerByCarrierId`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 5, 2),
	(4, 2, 2),
	(5, 3, 2),
	(6, 3, 5),
	(7, 2, 4),
	(8, 1, 2),
	(9, 3, 1),
	(10, 2, 1),
	(11, 1, 6),
	(12, 3, 6),
	(13, 2, 6),
	(14, 1, 9),
	(15, 1, 10),
	(16, 2, 16),
	(17, 2, 17),
	(18, 2, 18);
/*!40000 ALTER TABLE `ProductsByContainer` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ProductsByContainerHistory
CREATE TABLE IF NOT EXISTS `ProductsByContainerHistory` (
  `ProductsByContainerHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductsByContainerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.ProductsByContainerHistory: 13 rows
DELETE FROM `ProductsByContainerHistory`;
/*!40000 ALTER TABLE `ProductsByContainerHistory` DISABLE KEYS */;
INSERT INTO `ProductsByContainerHistory` (`ProductsByContainerHistoryId`, `ProductsByContainerId`, `ProductId`, `ContainerByCarrierId`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 1, 1, '2016-01-09 17:05:00', 4),
	(2, 1, 1, 3, '2016-01-09 01:28:00', 7),
	(3, 1, 1, 2, '2016-01-09 01:28:00', 7),
	(4, 1, 2, 2, '2016-01-09 01:28:00', 7),
	(5, 1, 3, 2, '2016-01-09 01:28:00', 7),
	(6, 1, 3, 5, '2016-01-09 03:15:00', 1),
	(7, 1, 2, 4, '2016-01-09 03:15:00', 1),
	(8, 1, 1, 2, '2016-01-10 00:50:00', 4),
	(9, 1, 3, 1, '2016-01-10 00:54:00', 4),
	(10, 1, 2, 1, '2016-01-10 00:54:00', 4),
	(11, 1, 1, 6, '2016-01-10 00:56:00', 4),
	(12, 1, 3, 6, '2016-01-10 00:56:00', 4),
	(13, 1, 2, 6, '2016-01-10 00:58:00', 4),
	(14, 1, 1, 9, '2016-01-10 05:30:00', 4),
	(15, 15, 1, 10, '2016-01-10 05:37:00', 4),
	(16, 16, 2, 16, '2016-01-09 14:51:00', 1),
	(17, 17, 2, 17, '2016-01-09 14:51:00', 1),
	(18, 18, 2, 18, '2016-01-09 15:06:00', 1);
/*!40000 ALTER TABLE `ProductsByContainerHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Products_Air
CREATE TABLE IF NOT EXISTS `Products_Air` (
  `Products_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ContainerByVesselId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `CarrierId` int(11) NOT NULL,
  `TruckerName` varchar(50) DEFAULT NULL,
  `HaulerId` int(11) DEFAULT NULL,
  `Weight` datetime DEFAULT NULL,
  `ETA` datetime DEFAULT NULL,
  `ETD` datetime DEFAULT NULL,
  `ATA` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `WareHouse` varchar(50) NOT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Products_AirId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.Products_Air: 0 rows
DELETE FROM `Products_Air`;
/*!40000 ALTER TABLE `Products_Air` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products_Air` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Products_AirHistory
CREATE TABLE IF NOT EXISTS `Products_AirHistory` (
  `Products_AirHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Products_AirId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ContainerByVesselId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `CarrierId` int(11) NOT NULL,
  `Weight` datetime DEFAULT NULL,
  `ETA` datetime DEFAULT NULL,
  `ETD` datetime DEFAULT NULL,
  `ATA` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `WareHouseId` int(11) NOT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Products_AirHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.Products_AirHistory: 0 rows
DELETE FROM `Products_AirHistory`;
/*!40000 ALTER TABLE `Products_AirHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products_AirHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Role
CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `RoleDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Role: 2 rows
DELETE FROM `Role`;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` (`RoleId`, `RoleName`, `RoleDescription`) VALUES
	(1, 'Admin', 'Filport Adminstrator'),
	(2, 'Client', 'Filport Clients');
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.RoleAccess
CREATE TABLE IF NOT EXISTS `RoleAccess` (
  `RoleAccessId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleId` int(11) NOT NULL,
  PRIMARY KEY (`RoleAccessId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.RoleAccess: 0 rows
DELETE FROM `RoleAccess`;
/*!40000 ALTER TABLE `RoleAccess` DISABLE KEYS */;
/*!40000 ALTER TABLE `RoleAccess` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.RunningCharges
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.RunningCharges: 6 rows
DELETE FROM `RunningCharges`;
/*!40000 ALTER TABLE `RunningCharges` DISABLE KEYS */;
INSERT INTO `RunningCharges` (`RunnningChargesId`, `JobFileId`, `LodgementFee`, `ContainerDeposit`, `THCCharges`, `Arrastre`, `Wharfage`, `Weighing`, `DEL`, `DispatchFee`, `Storage`, `Demorage`, `Detention`, `EIC`, `BAIApplication`, `BAIInspection`, `SRAApplication`, `SRAInspection`, `BadCargo`, `AllCharges`, `ParticularCharges`) VALUES
	(1, '1', 43.00, 43.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL),
	(2, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '3', 99999999.99, 0.00, 0.00, 500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00),
	(4, '4', 100.00, 100.00, 99999999.99, 42343432.00, 44.00, 99999999.99, 8339.00, 0.00, 0.00, 93726.00, 0.00, 0.00, 6218.00, 23879.00, 8623.00, 869.00, 23.00, 0.00, 0.00),
	(5, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, '12', 100.00, 1557.00, 2689.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL);
/*!40000 ALTER TABLE `RunningCharges` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.RunningChargesHistory
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dev_FilportTrackingSystem.RunningChargesHistory: 6 rows
DELETE FROM `RunningChargesHistory`;
/*!40000 ALTER TABLE `RunningChargesHistory` DISABLE KEYS */;
INSERT INTO `RunningChargesHistory` (`RunningChargesHistoryId`, `RunnningChargesId`, `JobFileId`, `LodgementFee`, `ContainerDeposit`, `THCCharges`, `Arrastre`, `Wharfage`, `Weighing`, `DEL`, `DispatchFee`, `Storage`, `Demorage`, `Detention`, `EIC`, `BAIApplication`, `BAIInspection`, `SRAApplication`, `SRAInspection`, `BadCargo`, `AllCharges`, `ParticularCharges`, `DateUpdated`, `UpdatedBy_UsrId`) VALUES
	(1, 1, '1', 43.00, 43.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-09 22:18:00', 4),
	(2, 1, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-09 17:05:00', 4),
	(3, 1, '3', 99999999.99, 0.00, 0.00, 500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, '2016-01-09 09:09:00', 3),
	(4, 1, '4', 100.00, 100.00, 99999999.99, 42343432.00, 44.00, 99999999.99, 8339.00, 0.00, 0.00, 93726.00, 0.00, 0.00, 6218.00, 23879.00, 8623.00, 869.00, 23.00, 0.00, 0.00, '2016-01-09 22:17:00', 4),
	(5, 1, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-09 03:56:00', 3),
	(6, 1, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 01:11:00', 4),
	(7, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 05:10:00', 4),
	(8, 1, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 05:14:00', 4),
	(9, 1, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 05:18:00', 4),
	(10, 10, '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 05:30:00', 4),
	(11, 11, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-10 05:36:00', 4),
	(12, 12, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-01-09 14:46:00', 1),
	(13, 13, '12', 100.00, 1557.00, 2689.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '2016-01-09 15:06:00', 1);
/*!40000 ALTER TABLE `RunningChargesHistory` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.SecretQuestion
CREATE TABLE IF NOT EXISTS `SecretQuestion` (
  `SecretQuestionId` int(11) NOT NULL AUTO_INCREMENT,
  `SecretQuestion` varchar(300) NOT NULL,
  PRIMARY KEY (`SecretQuestionId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Secret Question table - for users to use if they forgot their password';

-- Dumping data for table dev_FilportTrackingSystem.SecretQuestion: 21 rows
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


-- Dumping structure for table dev_FilportTrackingSystem.Shipper
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Shipper: 12 rows
DELETE FROM `Shipper`;
/*!40000 ALTER TABLE `Shipper` DISABLE KEYS */;
INSERT INTO `Shipper` (`ShipperId`, `ShipperName`, `DateAdded`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `IsActive`) VALUES
	(1, 'Genesis Corporation', '2015-12-22 00:00:00', 'St. Francis', 'Sinilangan', 'Davao', 1, b'0'),
	(2, 'Liwayway Inc.', '2015-12-22 00:00:00', '23 St.', 'Giguinto', 'Cebu City', 2, b'0'),
	(3, 'PT Torabika Eka Semesta', '2016-01-04 00:00:00', 'JL Tomang Raya No. 21-23', 'Jakarta Barat 11440', 'Jakarta Indonesia', 95, b'1'),
	(4, 'Heritage Produce Distributing Inc.', '2016-01-04 00:00:00', '2161 W 182nd Street Suite 208', 'Torance', 'California USA', 224, b'1'),
	(5, 'Microsoft Mobile (Vietnam) LLC', '2016-01-04 00:00:00', '#8 Str 6 VSIP Bac Ninh Urban & Industrial Park', 'Phu Chan Bac Ninh', 'Vietnam ', 231, b'1'),
	(6, 'Kalbe International PTE LTD.', '2016-01-04 00:00:00', '21 Bukit Batok Crescent #27-79', 'Vocega Tower', 'Singapore 658065', 189, b'1'),
	(7, 'General Beverage Co. LTD', '2016-01-04 00:00:00', '99/2 Moo 6, Tambon Talad Jinda', 'Amphoe San Phran Nakhon Pathom', 'Thailand', 7, b'1'),
	(8, 'Guandong Yinhe Motorcycle Industry Co. LTD', '2016-01-04 00:00:00', '8', 'China', 'China', 42, b'0'),
	(9, 'Test 123', '2016-01-04 00:00:00', '9', 'fsdfdsfdsfdsfsf', 'dsfsfdsf', 9, b'1'),
	(10, 'Thaiping', '2016-01-04 00:00:00', '123 Roed', '#12', 'Shimpai', 209, NULL),
	(11, 'PT Mayora Indah TBK', '2016-01-04 00:00:00', 'JL Tomang Raya No. 21-23', 'Jakarta Barat 11440', 'Jakarta Indonesia', 95, NULL),
	(12, 'Bluemoooon', '2016-01-04 00:00:00', '789', '456', '123', 42, NULL);
/*!40000 ALTER TABLE `Shipper` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.ShipperContacts
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

-- Dumping data for table dev_FilportTrackingSystem.ShipperContacts: 1 rows
DELETE FROM `ShipperContacts`;
/*!40000 ALTER TABLE `ShipperContacts` DISABLE KEYS */;
INSERT INTO `ShipperContacts` (`ShipperContactId`, `FirstName`, `MiddleName`, `LastName`, `ContactNo1`, `ContactNo2`, `ShipperId`) VALUES
	(1, 'Jonathan', 'G.', 'Perez', '(02) 1234567', 'jonathan@travel.com', 1);
/*!40000 ALTER TABLE `ShipperContacts` ENABLE KEYS */;


-- Dumping structure for table dev_FilportTrackingSystem.Status
CREATE TABLE IF NOT EXISTS `Status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsBackground` bit(1) NOT NULL,
  `ColorCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table dev_FilportTrackingSystem.Status: 9 rows
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


-- Dumping structure for table dev_FilportTrackingSystem.User
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

-- Dumping data for table dev_FilportTrackingSystem.User: 18 rows
DELETE FROM `User`;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`UserId`, `UserName`, `Password`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `ProfileImageSource`, `RoleId`, `ContactNo1`, `ContactNo2`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ConsigneeId`, `SecretQuestionId`, `SecretAnswer`, `SecretAnswerHint`, `DateAdded`, `IsActive`) VALUES
	(1, 'benel', '81fd4c2c978ce0df65c1873b67092472a89b25fe', 'Benel', 'Lumacang', 'Ampu-an', '1994-09-23', 'bla@the-asiagroup.com', '28af6381e28a201ff0ec2019f95e7dff.jpg', 2, '09295646919', '6615104', '3A', 'F. Reyes', 'Cavite', 164, 0, 1, 'Nel', 'Nel', '2015-12-10', b'0'),
	(2, 'charlieadmin', 'f443857a547bc44feec45f535876f653aaccd506', 'Charlie', 'S', 'Bobis', '1992-02-18', 'charlie@the-asiagroup.com', 'user.png', 2, '09305071622', '', 'B1 L9 Rockville Compound 7, J.P. Ramoy Street', 'Talipapa', 'Novaliches, Caloocan', 164, 1, 1, 'bon', 'bon', '2015-12-10', b'0'),
	(3, 'reinenadmin', '999d82ed1eab228680b2cd65b4d288aff960db00', 'Reinen', 'Rosela', 'Constantino', '1995-06-22', 'reinen@the-asiagroup.com', 'ba842c61bd1a9a9dc79f7d6778ff99ef.jpg', 2, '09482095100', '', '417', 'San Roque', 'San Pablo ', 164, 1, 1, 'rey', 'secret', '2015-12-10', b'0'),
	(4, 'eli', '7f8b824434202ca008387248fcab83b809227462', 'eli', 'almonte', 'montefalcon', '2015-12-17', 'eli_montefalcon@yahoo.com', 'c288175248865f64163929308102bf3f.PNG', 2, '111111111111', '1111111111', '1', '1', '1', 17, 3, 15, '1', '1', '2015-12-11', b'0'),
	(5, 'renren', 'd7237cdec27f1cffe79cd5ea379fe5d260ca6ce3', 'ren', 'rein', 'curioso', '1993-11-17', 'admin@gmail.com', 'e4dcb0a1249d0348f73e8e72172fba17.jpg', 2, '0907566620', '0908258888', '285', 'alabng', 'Muntinlupa', 164, 2, 7, 'joy', 'ligaya', '2015-12-11', b'0'),
	(6, 'Junne', '9e690c3053d4d0725cfc038a03015ebb3a300dba', 'Junne', 'C', 'Narito', '0000-00-00', 'engr.fc.narito@gmail.com', 'user.png', 2, '7654321', '', 'Orient Square', 'Ortigas Center', 'Pasig', 164, 6, 1, 'Jun', 'Jun', '2015-12-13', b'0'),
	(7, 'danieltenefrancia', 'b3abde8cfa5bf90e6ac428caea88eecd3bce1860', 'Daniel', 'Mandigma', 'Tenefrancia', '1996-08-05', 'daniel.tenefrancia@gmail.com', '0a8a47cc2c55d7b8691bd74770952f83.jpg', 2, '09362776832', '09362776832', 'Blk 27 Lot 8 Asana St', 'Southern Heights 2', 'San Pedro Laguna', 164, 1, 4, 'Asana', 'Where?', '2015-12-15', b'0'),
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


-- Dumping structure for view dev_FilportTrackingSystem.search_global
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `search_global` (
	`JobFileId` INT(11) NOT NULL,
	`FirstName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`MiddleName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`LastName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Consignee` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_broker_full_info
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_broker_full_info` (
	`BrokerId` INT(11) NOT NULL,
	`FirstName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`MiddleName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`LastName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`HouseBuildingNoStreet` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`BarangarOrVillage` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`TownOrCityProvince` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`CountryId` INT(11) NOT NULL,
	`ContactNo1` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`ContactNo2` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`IsActive` BIT(1) NOT NULL,
	`Country` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_CarrierByJobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_CarrierByJobFile` (
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`CarrierName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`VesselVoyageNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DischargeTime` DATETIME NULL,
	`EstDepartureTime` DATETIME NULL,
	`EstArrivalTime` DATETIME NULL,
	`ActualArrivalTime` DATETIME NULL,
	`CarrierByJobFileId` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_consignee_full_info
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_consignee_full_info` (
	`ConsigneeId` INT(11) NOT NULL,
	`ConsigneeName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`HouseBuildingNoOrStreet` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`BarangayOrVillage` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`TownOrCityProvince` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`CountryId` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`OfficeNumber` VARCHAR(1000) NULL COLLATE 'latin1_swedish_ci',
	`DateAdded` DATE NOT NULL,
	`IsActive` BIT(1) NOT NULL,
	`Country` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_Containers
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_Containers` (
	`JobFileId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`DateFileEntryToBOC` DATETIME NULL,
	`DateBOCCleared` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`DatePaid` DATETIME NULL,
	`DateSentFinalAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerByCarrierId` INT(11) NULL,
	`ContainerSize` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`NoOfCartons` INT(11) NULL,
	`TruckerName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`StartOfStorage` DATETIME NULL,
	`Lodging` DATETIME NULL,
	`HaulerOrTruck` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`TargetDeliveryDate` DATETIME NULL,
	`GateInAtPort` DATETIME NULL,
	`GateOutAtPort` DATETIME NULL,
	`ActualDeliveryAtWarehouse` DATETIME NULL,
	`StartOfDemorage` DATETIME NULL,
	`PullOutDateAtPort` DATETIME NULL,
	`VesselVoyageNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`CarrierByJobFileId` INT(11) NOT NULL,
	`DateReceivedAtWhse` DATETIME NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFile` (
	`JobFileId` INT(11) NOT NULL,
	`MonitoringTypeId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo2` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`PurchaseOrderNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Registry` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedNoticeFromClients` DATE NULL,
	`DateReceivedOfBL` DATE NULL,
	`DateReceivedOfOtherDocs` DATE NULL,
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`DateRequestBudgetToGL` DATE NULL,
	`RFPDueDate` DATE NULL,
	`ColorSelectivityName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`IsBackground` BIT(1) NULL,
	`ColorCode` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci',
	`Origin` VARCHAR(101) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_Products
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_Products` (
	`JobFileId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ProductName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ProductId` INT(11) NOT NULL,
	`ProductsByContainerId` INT(11) NOT NULL,
	`ContainerNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningCharges
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_RunningCharges` (
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`RunnningChargesId` INT(11) NOT NULL,
	`JobFileId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`LodgementFee` DECIMAL(10,2) NULL,
	`ContainerDeposit` DECIMAL(10,2) NULL,
	`THCCharges` DECIMAL(10,2) NULL,
	`Arrastre` DECIMAL(10,2) NULL,
	`Wharfage` DECIMAL(10,2) NULL,
	`Weighing` DECIMAL(10,2) NULL,
	`DEL` DECIMAL(10,2) NULL,
	`DispatchFee` DECIMAL(10,2) NULL,
	`Storage` DECIMAL(10,2) NULL,
	`Demorage` DECIMAL(10,2) NULL,
	`Detention` DECIMAL(10,2) NULL,
	`EIC` DECIMAL(10,2) NULL,
	`BAIApplication` DECIMAL(10,2) NULL,
	`BAIInspection` DECIMAL(10,2) NULL,
	`SRAApplication` DECIMAL(10,2) NULL,
	`SRAInspection` DECIMAL(10,2) NULL,
	`BadCargo` DECIMAL(10,2) NULL,
	`AllCharges` DECIMAL(10,2) NULL,
	`ParticularCharges` DECIMAL(10,2) NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_shipper_full_info
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_shipper_full_info` (
	`ShipperId` INT(11) NOT NULL,
	`ShipperName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`DateAdded` DATETIME NOT NULL,
	`HouseBuildingNoStreet` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`BarangarOrVillage` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`TownOrCityProvince` VARCHAR(300) NOT NULL COLLATE 'latin1_swedish_ci',
	`CountryId` INT(11) NOT NULL,
	`IsActive` BIT(1) NULL,
	`Country` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_StatusReports
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_StatusReports` (
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`HistoricalStatusId` INT(11) NOT NULL,
	`DateAdded` TIMESTAMP NULL,
	`StatusDescription` VARCHAR(300) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for procedure dev_FilportTrackingSystem.sp_AddUser
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddUser`(IN `P_UserName` VARCHAR(30), IN `P_Password` VARCHAR(255), IN `P_FirstName` VARCHAR(100), IN `P_MiddleName` VARCHAR(100), IN `P_LastName` VARCHAR(100), IN `P_BirthDate` DATE, IN `P_EmailAddress` varCHAR(50), IN `P_ProfileImageSource` VARCHAR(150), IN `P_RoleId` INT, IN `P_ContactNo1` varCHAR(20), IN `P_ContactNo2` varCHAR(20), IN `P_HouseBuildingNoStreet` VARCHAR(300), IN `P_BarangarOrVillage` VARCHAR(300), IN `P_TownOrCityProvince` VARCHAR(300), IN `P_CountryId` INT, IN `P_ConsigneeId` INT, IN `P_SecretQuestionId` INT, IN `P_SecretAnswer` varcHAR(1000), IN `P_SecretAnswerHint` varCHAR(1000)
						)
INSERT INTO User(UserName,Password,FirstName,MiddleName,LastName,BirthDate,EmailAddress,
						ProfileImageSource,RoleId,ContactNo1,ContactNo2,HouseBuildingNoStreet,BarangarOrVillage,TownOrCityProvince,CountryId,
						ConsigneeId,SecretQuestionId,SecretAnswer,SecretAnswerHint,DateAdded,IsActive)
						
				VALUES(
						P_UserName,
						P_Password,P_FirstName,
						P_MiddleName,P_LastName,P_BirthDate,
						P_EmailAddress,P_ProfileImageSource,
						P_RoleId,P_ContactNo1,P_ContactNo2,
						P_HouseBuildingNoStreet,P_BarangarOrVillage,P_TownOrCityProvince,P_CountryId,
						P_ConsigneeId,P_SecretQuestionId,P_SecretAnswer,
						P_SecretAnswerHint,NOW(),0
						)//
DELIMITER ;


-- Dumping structure for view dev_FilportTrackingSystem.search_global
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `search_global`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `search_global` AS select `JobFile`.`JobFileId` AS `JobFileId`,`Broker`.`FirstName` AS `FirstName`,`Broker`.`MiddleName` AS `MiddleName`,`Broker`.`LastName` AS `LastName`,(select `Consignee`.`ConsigneeName` from `Consignee` where (`Consignee`.`ConsigneeId` = `JobFile`.`ConsigneeId`)) AS `Consignee` from (`JobFile` join `Broker` on((`JobFile`.`BrokerId` = `Broker`.`BrokerId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_broker_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_broker_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_broker_full_info` AS select `Broker`.`BrokerId` AS `BrokerId`,`Broker`.`FirstName` AS `FirstName`,`Broker`.`MiddleName` AS `MiddleName`,`Broker`.`LastName` AS `LastName`,`Broker`.`HouseBuildingNoStreet` AS `HouseBuildingNoStreet`,`Broker`.`BarangarOrVillage` AS `BarangarOrVillage`,`Broker`.`TownOrCityProvince` AS `TownOrCityProvince`,`Broker`.`CountryId` AS `CountryId`,`Broker`.`ContactNo1` AS `ContactNo1`,`Broker`.`ContactNo2` AS `ContactNo2`,`Broker`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Broker`.`CountryId`)) AS `Country` from `Broker`;


-- Dumping structure for view dev_FilportTrackingSystem.vw_CarrierByJobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_CarrierByJobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_CarrierByJobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`C`.`CarrierName` AS `CarrierName`,`CBJF`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJF`.`DischargeTime` AS `DischargeTime`,`CBJF`.`EstDepartureTime` AS `EstDepartureTime`,`CBJF`.`EstArrivalTime` AS `EstArrivalTime`,`CBJF`.`ActualArrivalTime` AS `ActualArrivalTime`,`CBJF`.`CarrierByJobFileId` AS `CarrierByJobFileId` from ((`CarrierByJobFile` `CBJF` left join `JobFile` `JF` on((`JF`.`JobFileId` = `CBJF`.`JobFileId`))) left join `Carrier` `C` on((`C`.`CarrierId` = `CBJF`.`CarrierId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_consignee_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_consignee_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_consignee_full_info` AS select `Consignee`.`ConsigneeId` AS `ConsigneeId`,`Consignee`.`ConsigneeName` AS `ConsigneeName`,`Consignee`.`HouseBuildingNoOrStreet` AS `HouseBuildingNoOrStreet`,`Consignee`.`BarangayOrVillage` AS `BarangayOrVillage`,`Consignee`.`TownOrCityProvince` AS `TownOrCityProvince`,`Consignee`.`CountryId` AS `CountryId`,`Consignee`.`OfficeNumber` AS `OfficeNumber`,`Consignee`.`DateAdded` AS `DateAdded`,`Consignee`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Consignee`.`CountryId`)) AS `Country` from `Consignee`;


-- Dumping structure for view dev_FilportTrackingSystem.vw_Containers
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Containers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_Containers` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`CBC`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`CBC`.`DateBOCCleared` AS `DateBOCCleared`,`CBC`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`CBC`.`DatePaid` AS `DatePaid`,`CBC`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`CBC`.`RefEntryNo` AS `RefEntryNo`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerByCarrierId` AS `ContainerByCarrierId`,`CBC`.`ContainerSize` AS `ContainerSize`,`CBC`.`NoOfCartons` AS `NoOfCartons`,`CBC`.`TruckerName` AS `TruckerName`,`CBC`.`StartOfStorage` AS `StartOfStorage`,`CBC`.`Lodging` AS `Lodging`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck`,`CBC`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`CBC`.`GateInAtPort` AS `GateInAtPort`,`CBC`.`GateOutAtPort` AS `GateOutAtPort`,`CBC`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`CBC`.`StartOfDemorage` AS `StartOfDemorage`,`CBC`.`PullOutDateAtPort` AS `PullOutDateAtPort`,`CBJ`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJ`.`CarrierByJobFileId` AS `CarrierByJobFileId`,`CBC`.`DateReceivedAtWhse` AS `DateReceivedAtWhse` from (((`JobFile` `JF` join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) left join `ContainerByCarrier` `CBC` on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `CBC`.`HaulerOrTruckId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`MonitoringTypeId` AS `MonitoringTypeId`,`JF`.`JobFileNo` AS `JobFileNo`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JF`.`MasterBillLadingNo2` AS `MasterBillLadingNo2`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`Registry` AS `Registry`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`CS`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode`,concat(`CT`.`CountryName`,' ',`JF`.`OriginCity`) AS `Origin` from ((((((`JobFile` `JF` left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `JF`.`ShipperId`))) left join `ColorSelectivity` `CS` on((`CS`.`ColorSelectivityId` = `JF`.`ColorSelectivityId`))) join `Countries` `CT` on((`CT`.`CountryId` = `JF`.`Origin_CountryId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_Products
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Products`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_Products` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`P`.`ProductName` AS `ProductName`,`P`.`ProductId` AS `ProductId`,`PBC`.`ProductsByContainerId` AS `ProductsByContainerId`,`CBC`.`ContainerNo` AS `ContainerNo` from ((((`JobFile` `JF` join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) join `ContainerByCarrier` `CBC` on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) join `ProductsByContainer` `PBC` on((`PBC`.`ContainerByCarrierId` = `CBC`.`ContainerByCarrierId`))) join `Products` `P` on((`P`.`ProductId` = `PBC`.`ProductId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningCharges
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_RunningCharges`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_RunningCharges` AS select `JF`.`JobFileNo` AS `JobFileNo`,`RC`.`RunnningChargesId` AS `RunnningChargesId`,`RC`.`JobFileId` AS `JobFileId`,`RC`.`LodgementFee` AS `LodgementFee`,`RC`.`ContainerDeposit` AS `ContainerDeposit`,`RC`.`THCCharges` AS `THCCharges`,`RC`.`Arrastre` AS `Arrastre`,`RC`.`Wharfage` AS `Wharfage`,`RC`.`Weighing` AS `Weighing`,`RC`.`DEL` AS `DEL`,`RC`.`DispatchFee` AS `DispatchFee`,`RC`.`Storage` AS `Storage`,`RC`.`Demorage` AS `Demorage`,`RC`.`Detention` AS `Detention`,`RC`.`EIC` AS `EIC`,`RC`.`BAIApplication` AS `BAIApplication`,`RC`.`BAIInspection` AS `BAIInspection`,`RC`.`SRAApplication` AS `SRAApplication`,`RC`.`SRAInspection` AS `SRAInspection`,`RC`.`BadCargo` AS `BadCargo`,`RC`.`AllCharges` AS `AllCharges`,`RC`.`ParticularCharges` AS `ParticularCharges` from (`RunningCharges` `RC` left join `JobFile` `JF` on((`JF`.`JobFileId` = `RC`.`JobFileId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_shipper_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_shipper_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_shipper_full_info` AS select `Shipper`.`ShipperId` AS `ShipperId`,`Shipper`.`ShipperName` AS `ShipperName`,`Shipper`.`DateAdded` AS `DateAdded`,`Shipper`.`HouseBuildingNoStreet` AS `HouseBuildingNoStreet`,`Shipper`.`BarangarOrVillage` AS `BarangarOrVillage`,`Shipper`.`TownOrCityProvince` AS `TownOrCityProvince`,`Shipper`.`CountryId` AS `CountryId`,`Shipper`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Shipper`.`CountryId`)) AS `Country` from `Shipper`;


-- Dumping structure for view dev_FilportTrackingSystem.vw_StatusReports
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_StatusReports`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_StatusReports` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`HS`.`HistoricalStatusId` AS `HistoricalStatusId`,`HS`.`DateAdded` AS `DateAdded`,`HS`.`StatusDescription` AS `StatusDescription` from (`HistoricalStatus` `HS` left join `JobFile` `JF` on((`JF`.`JobFileId` = `HS`.`JobFileId`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
