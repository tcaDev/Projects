-- --------------------------------------------------------
-- Host:                         topconnection.asia
-- Server version:               5.5.45-cll-lve - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for FilportTrackingSystem
DROP DATABASE IF EXISTS `FilportTrackingSystem`;
CREATE DATABASE IF NOT EXISTS `FilportTrackingSystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `FilportTrackingSystem`;


-- Dumping structure for table FilportTrackingSystem.Broker
DROP TABLE IF EXISTS `Broker`;
CREATE TABLE IF NOT EXISTS `Broker` (
  `BrokerId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`BrokerId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Broker: 4 rows
DELETE FROM `Broker`;
/*!40000 ALTER TABLE `Broker` DISABLE KEYS */;
INSERT INTO `Broker` (`BrokerId`, `FirstName`, `MiddleName`, `LastName`, `Address`, `ContactNo`, `IsActive`) VALUES
	(25, 'cxz', 'czxc', 'xzc', 'zxc', 'xzczx', b'0'),
	(15, 'g', 'fas', 'fa', 'fas', '232', b'0'),
	(23, 'ihlkh', 'jhkjh', 'kjhkjh', 'kjh', 'hkkhk', b'0'),
	(24, 'fsdf', 'fsd', 'FSD', 'fsd', 'fsd', b'0');
/*!40000 ALTER TABLE `Broker` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Carrier
DROP TABLE IF EXISTS `Carrier`;
CREATE TABLE IF NOT EXISTS `Carrier` (
  `CarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CarrierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Carrier: 0 rows
DELETE FROM `Carrier`;
/*!40000 ALTER TABLE `Carrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `Carrier` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Consignee
DROP TABLE IF EXISTS `Consignee`;
CREATE TABLE IF NOT EXISTS `Consignee` (
  `ConsigneeId` int(11) NOT NULL AUTO_INCREMENT,
  `ConsigneeName` varchar(100) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `OfficeNumber` varchar(1000) DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsigneeId`),
  UNIQUE KEY `ConsigneeName` (`ConsigneeName`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Dumping data for table FilportTrackingSystem.Consignee: 6 rows
DELETE FROM `Consignee`;
/*!40000 ALTER TABLE `Consignee` DISABLE KEYS */;
INSERT INTO `Consignee` (`ConsigneeId`, `ConsigneeName`, `Address`, `OfficeNumber`, `DateAdded`, `IsActive`) VALUES
	(34, 'Unilever Food Solution', 'Quezon City', '911', '2015-12-02', b'0'),
	(33, 'TopConnection.Asia Inc.', 'Ortigas Center', '5104', '2015-12-01', b'0'),
	(32, 'Universal Rubina Corp.', 'Metro Manila', '4117', '2015-12-02', b'1'),
	(39, 'MyPLay Asia', 'Pasig City', '1234567', '2015-12-02', b'0'),
	(42, 'elias', 'babab', '32131', '2015-12-02', b'0'),
	(44, 'fdsfsdsdf', 'dsfsd', 'fsdf', '2015-12-02', b'0');
/*!40000 ALTER TABLE `Consignee` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Container
DROP TABLE IF EXISTS `Container`;
CREATE TABLE IF NOT EXISTS `Container` (
  `ContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerNo` varchar(70) NOT NULL,
  `VesselId` int(11) NOT NULL,
  `ContainerDescription` varchar(100) DEFAULT NULL,
  `ContainerSize` decimal(10,2) NOT NULL DEFAULT '0.00',
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerPlateNo` varchar(50) NOT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `HaulerId` int(11) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `Weight` decimal(10,2) DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  PRIMARY KEY (`ContainerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Container: 0 rows
DELETE FROM `Container`;
/*!40000 ALTER TABLE `Container` DISABLE KEYS */;
/*!40000 ALTER TABLE `Container` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ContainerHistory
DROP TABLE IF EXISTS `ContainerHistory`;
CREATE TABLE IF NOT EXISTS `ContainerHistory` (
  `ContaineHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerId` int(11) NOT NULL,
  `ContainerNo` varchar(70) NOT NULL,
  `VesselId` int(11) NOT NULL,
  `ContainerDescription` varchar(100) DEFAULT NULL,
  `ContainerSize` decimal(10,2) NOT NULL DEFAULT '0.00',
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerPlateNo` varchar(50) NOT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `HaulerId` int(11) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `Weight` decimal(10,2) DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  `UpdatedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ContaineHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ContainerHistory: 0 rows
DELETE FROM `ContainerHistory`;
/*!40000 ALTER TABLE `ContainerHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `ContainerHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Countries
DROP TABLE IF EXISTS `Countries`;
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


-- Dumping structure for table FilportTrackingSystem.ForwarderWarehouse
DROP TABLE IF EXISTS `ForwarderWarehouse`;
CREATE TABLE IF NOT EXISTS `ForwarderWarehouse` (
  `ForwarderWarehouseId` int(11) NOT NULL AUTO_INCREMENT,
  `ForwarderWarehouseName` varchar(100) NOT NULL,
  PRIMARY KEY (`ForwarderWarehouseId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ForwarderWarehouse: 0 rows
DELETE FROM `ForwarderWarehouse`;
/*!40000 ALTER TABLE `ForwarderWarehouse` DISABLE KEYS */;
/*!40000 ALTER TABLE `ForwarderWarehouse` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Hauler
DROP TABLE IF EXISTS `Hauler`;
CREATE TABLE IF NOT EXISTS `Hauler` (
  `HaulerId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerName` varchar(50) NOT NULL,
  PRIMARY KEY (`HaulerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Hauler: 0 rows
DELETE FROM `Hauler`;
/*!40000 ALTER TABLE `Hauler` DISABLE KEYS */;
/*!40000 ALTER TABLE `Hauler` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.HistoricalStatus
DROP TABLE IF EXISTS `HistoricalStatus`;
CREATE TABLE IF NOT EXISTS `HistoricalStatus` (
  `HistoricalStatusId` int(11) NOT NULL,
  `StatusDescription` varchar(100) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `AddedBy_UserId` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.HistoricalStatus: 0 rows
DELETE FROM `HistoricalStatus`;
/*!40000 ALTER TABLE `HistoricalStatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `HistoricalStatus` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Images
DROP TABLE IF EXISTS `Images`;
CREATE TABLE IF NOT EXISTS `Images` (
  `ImageId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeId` int(11) NOT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `ImageSource` varchar(300) NOT NULL,
  `FileName` varchar(300) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table for Images, images for User Accounts and Jobfile(scanned Images)';

-- Dumping data for table FilportTrackingSystem.Images: 0 rows
DELETE FROM `Images`;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ImageType
DROP TABLE IF EXISTS `ImageType`;
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
DROP TABLE IF EXISTS `JobFile`;
CREATE TABLE IF NOT EXISTS `JobFile` (
  `JobFileId` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `ForwarderWarehouseId` varchar(50) DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  PRIMARY KEY (`JobFileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.JobFile: 1 rows
DELETE FROM `JobFile`;
/*!40000 ALTER TABLE `JobFile` DISABLE KEYS */;
INSERT INTO `JobFile` (`JobFileId`, `ConsigneeId`, `BrokerId`, `MonitoringTypeId`, `IsLocked`, `LockedBy_UserId`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `LetterCreditFromBank`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `ForwarderWarehouseId`, `DatePaid`, `FlightNo`, `AirCraftNo`, `DateReceivedNoticeFromForwarder`) VALUES
	('TR-M-15-07-001', 1, 1, 0, b'0', NULL, '2015-11-20 05:14:37', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `JobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFileHistory
DROP TABLE IF EXISTS `JobFileHistory`;
CREATE TABLE IF NOT EXISTS `JobFileHistory` (
  `JobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `ForwarderWarehouseId` varchar(50) DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.JobFileHistory: 0 rows
DELETE FROM `JobFileHistory`;
/*!40000 ALTER TABLE `JobFileHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `JobFileHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.MonitoringType
DROP TABLE IF EXISTS `MonitoringType`;
CREATE TABLE IF NOT EXISTS `MonitoringType` (
  `MonitoringTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MonitoringTypeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`MonitoringTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.MonitoringType: 0 rows
DELETE FROM `MonitoringType`;
/*!40000 ALTER TABLE `MonitoringType` DISABLE KEYS */;
/*!40000 ALTER TABLE `MonitoringType` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products
DROP TABLE IF EXISTS `Products`;
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ContainerId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `CarrierId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  `Destination_CountryId` int(11) NOT NULL,
  `Destination_City` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Products: 0 rows
DELETE FROM `Products`;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ProductsHistory
DROP TABLE IF EXISTS `ProductsHistory`;
CREATE TABLE IF NOT EXISTS `ProductsHistory` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `ContainerId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `CarrierId` int(11) NOT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  `Destination_CountryId` int(11) NOT NULL,
  `Destination_City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ProductsHistory: 0 rows
DELETE FROM `ProductsHistory`;
/*!40000 ALTER TABLE `ProductsHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductsHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Role
DROP TABLE IF EXISTS `Role`;
CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `RoleDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Role: 2 rows
DELETE FROM `Role`;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` (`RoleId`, `RoleName`, `RoleDescription`) VALUES
	(1, 'Admin', 'Filport Adminstrator'),
	(2, 'Client', 'Filport Clients');
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.SecretQuestion
DROP TABLE IF EXISTS `SecretQuestion`;
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
DROP TABLE IF EXISTS `Shipper`;
CREATE TABLE IF NOT EXISTS `Shipper` (
  `ShipperId` int(11) NOT NULL AUTO_INCREMENT,
  `ShipperName` varchar(100) NOT NULL,
  `DateAdded` datetime NOT NULL,
  PRIMARY KEY (`ShipperId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Shipper: 2 rows
DELETE FROM `Shipper`;
/*!40000 ALTER TABLE `Shipper` DISABLE KEYS */;
INSERT INTO `Shipper` (`ShipperId`, `ShipperName`, `DateAdded`) VALUES
	(8, 'gdfg', '2015-12-02 00:00:00'),
	(5, 'gams', '2015-12-01 00:00:00');
/*!40000 ALTER TABLE `Shipper` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ShipperContacts
DROP TABLE IF EXISTS `ShipperContacts`;
CREATE TABLE IF NOT EXISTS `ShipperContacts` (
  `ShipperContactId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `ContactNo1` varchar(20) NOT NULL,
  `ContactNo2` varchar(20) DEFAULT NULL,
  `ShipperId` int(11) NOT NULL,
  PRIMARY KEY (`ShipperContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ShipperContacts: 10 rows
DELETE FROM `ShipperContacts`;
/*!40000 ALTER TABLE `ShipperContacts` DISABLE KEYS */;
INSERT INTO `ShipperContacts` (`ShipperContactId`, `FirstName`, `MiddleName`, `LastName`, `ContactNo1`, `ContactNo2`, `ShipperId`) VALUES
	(1, 'Benel ', 'L', 'Ampu-an', '1231232', '1231232', 0),
	(3, 'elizar', 'ginbay', 'mamot', '5555', '777', 0),
	(15, 'das', NULL, '', '', NULL, 0),
	(13, 'ga', 'dasd', 'sa', '32', '232', 5),
	(11, '32', NULL, '', '', NULL, 0),
	(14, 'das', 'das', 'dasd', '12', '21', 5),
	(9, 'ga', NULL, '', '', NULL, 0),
	(18, 'alsss', NULL, '', '', NULL, 0),
	(20, 'gdf', NULL, '', '', NULL, 0),
	(21, 'asd', 'asd', 'asd', 'asd', 'asd', 8);
/*!40000 ALTER TABLE `ShipperContacts` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ShipperVessel
DROP TABLE IF EXISTS `ShipperVessel`;
CREATE TABLE IF NOT EXISTS `ShipperVessel` (
  `ShipperVesselId` int(11) NOT NULL AUTO_INCREMENT,
  `Vesselname` varchar(100) NOT NULL,
  `ShipperId` int(11) NOT NULL,
  PRIMARY KEY (`ShipperVesselId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ShipperVessel: 8 rows
DELETE FROM `ShipperVessel`;
/*!40000 ALTER TABLE `ShipperVessel` DISABLE KEYS */;
INSERT INTO `ShipperVessel` (`ShipperVesselId`, `Vesselname`, `ShipperId`) VALUES
	(3, 'MV Princess of the Stars', 0),
	(8, 'Titanic', 0),
	(4, 'Poseidon', 0),
	(10, 'esperanza', 5),
	(9, 'eliseosss', 7),
	(11, 'sasa', 5),
	(12, 'Ben', 8),
	(13, 'esi', 5);
/*!40000 ALTER TABLE `ShipperVessel` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Status
DROP TABLE IF EXISTS `Status`;
CREATE TABLE IF NOT EXISTS `Status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Status: 0 rows
DELETE FROM `Status`;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.User
DROP TABLE IF EXISTS `User`;
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
  `Address1` varchar(1000) NOT NULL,
  `Address2` varchar(1000) DEFAULT NULL,
  `ConsigneeId` int(11) DEFAULT NULL,
  `SecretQuestionId` int(11) NOT NULL,
  `SecretAnswer` varchar(1000) NOT NULL,
  `SecretAnswerHint` varchar(1000) NOT NULL,
  `DateAdded` date DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Table for Users of the system';

-- Dumping data for table FilportTrackingSystem.User: 13 rows
DELETE FROM `User`;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`UserId`, `UserName`, `Password`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `ProfileImageSource`, `RoleId`, `ContactNo1`, `ContactNo2`, `Address1`, `Address2`, `ConsigneeId`, `SecretQuestionId`, `SecretAnswer`, `SecretAnswerHint`, `DateAdded`, `IsActive`) VALUES
	(1, 'admin', '7f8b824434202ca008387248fcab83b809227462', '', NULL, '0', '0000-00-00', '0', '0', 0, '0', '0', '0', '0', 0, 0, '0', '0', '0000-00-00', b'0'),
	(7, '432', '423', '432', '432', '4234', '0000-00-00', '432', '0', 0, '0', '0', '0', '0', 0, 1, '423', '423', '2015-11-19', b'0'),
	(8, '3123', '4234', '4234', '4234', '4234', '0000-00-00', '432423', '0', 0, '0', '0', '0', '0', 0, 17, '4234', '4324', '2015-11-19', b'0'),
	(11, 'charlieAdmin', 'somepassword', 'Charlie', NULL, 'Bobis', '1992-02-18', 'charlie@the-asiagroup.com', NULL, 1, '661-51-04', NULL, '15F Orient Square Ortigas Center, Pasig City', NULL, 2, 1, 'bon', 'bonjeur', '2015-11-19', b'0'),
	(12, 'elise', '123', 'elisess', 'ewew', 'ewewew', '0000-00-00', 'eli_mote@yahoo.com', 'ggs', 1, '121', '121', '323', 'myadd', 1, 1, 'ewew', 'eaes', '2015-11-24', b'0'),
	(13, 'eqw', '7f8b824434202ca008387248fcab83b809227462', '232', '321', '32', '0000-00-00', 'eli_montefalcon@yahoo.com', NULL, 1, '121', '121', '323', 'myadd', 1, 1, 'ewew', 'eaes', '2015-11-24', b'0'),
	(14, 'eqwe', '7f8b824434202ca008387248fcab83b809227462', '232', '43', '43', '0000-00-00', 'elis@yahoo.com', ' ', 1, '121', '123', '43434', '1234', 1, 1, '1', '1', '2015-11-25', b'0'),
	(15, 'ewqe', '7f8b824434202ca008387248fcab83b809227462', '423', '4234', '3432', '0000-00-00', 'eli_montefalcon@yahoo.com', ' ', 1, '4234', ' ', '4234', ' ', 1, 1, '3421', '3213', '2015-11-25', b'0'),
	(16, '4213e324', '7f8b824434202ca008387248fcab83b809227462', '423', '4234', '423', '0000-00-00', 'echos@yopmail.com', ' ', 1, '423', ' ', '423', ' ', 1, 1, '1', '1', '2015-11-25', b'0'),
	(17, '312', '7f8b824434202ca008387248fcab83b809227462', '42134', '4234', '4234423', '0000-00-00', 'eli_monte@yahoo.com', ' ', 1, '423', ' ', '14234', ' ', 1, 1, '1', '1', '2015-11-25', b'0'),
	(18, 'eli', '7f8b824434202ca008387248fcab83b809227462', '1', '1', '1', '0000-00-00', 'eli_pogi@yahoo.com', ' ', 1, '1', ' ', '1', ' ', 1, 1, '1', '1', '2015-11-25', b'0'),
	(19, 'ilau', '7f8b824434202ca008387248fcab83b809227462', '312', '311', '312', '0000-00-00', 'eg@yahoo.com', ' ', 1, '1112', ' ', 'ewqeqwe', ' ', 1, 1, '1', '1', '2015-11-25', b'0'),
	(20, 'TCA', 'f2821627e500e0e4abc40e07f0b95f2ca963ff02', 'Top', 'Connection', 'Asia', '0000-00-00', 'bla@the-asiagroup.com', ' ', 1, '6615104', ' ', 'Pasig', ' ', 1, 1, 'nel', 'nel', '2015-11-26', b'0');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.VesselByJobFile
DROP TABLE IF EXISTS `VesselByJobFile`;
CREATE TABLE IF NOT EXISTS `VesselByJobFile` (
  `VesselByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `ShipperVesselId` int(11) NOT NULL,
  `VesselArrivalTime` datetime DEFAULT NULL,
  `VesselDischargeTime` datetime DEFAULT NULL,
  PRIMARY KEY (`VesselByJobFileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.VesselByJobFile: 0 rows
DELETE FROM `VesselByJobFile`;
/*!40000 ALTER TABLE `VesselByJobFile` DISABLE KEYS */;
/*!40000 ALTER TABLE `VesselByJobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.VesselByJobFileHistory
DROP TABLE IF EXISTS `VesselByJobFileHistory`;
CREATE TABLE IF NOT EXISTS `VesselByJobFileHistory` (
  `VesselByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `ShipperVesselId` int(11) NOT NULL,
  `VesselArrivalTime` datetime DEFAULT NULL,
  `VesselDischargeTime` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.VesselByJobFileHistory: 0 rows
DELETE FROM `VesselByJobFileHistory`;
/*!40000 ALTER TABLE `VesselByJobFileHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `VesselByJobFileHistory` ENABLE KEYS */;


-- Dumping structure for view FilportTrackingSystem.search_global
DROP VIEW IF EXISTS `search_global`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `search_global` (
	`JobFileId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`FirstName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`MiddleName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`LastName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Consignee` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddUser
DROP PROCEDURE IF EXISTS `sp_AddUser`;
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddUser`(IN `P_UserName` VARCHAR(30), IN `P_Password` VARCHAR(255), IN `P_FirstName` VARCHAR(100), IN `P_MiddleName` VARCHAR(100), IN `P_LastName` VARCHAR(100), IN `P_EmailAddress` varCHAR(50), IN `P_ProfileImageSource` VARCHAR(150), IN `P_RoleId` INT, IN `P_ContactNo1` varCHAR(20), IN `P_ContactNo2` varCHAR(20), IN `P_Address1` VARCHAR(1000), IN `P_Address2` varcHAR(1000), IN `P_ConsigneeId` INT, IN `P_SecretQuestionId` INT, IN `P_SecretAnswer` varcHAR(1000), IN `P_SecretAnswerHint` varCHAR(1000)
						)
INSERT INTO User(UserName,Password,FirstName,MiddleName,LastName,EmailAddress,
						ProfileImageSource,RoleId,ContactNo1,ContactNo2,Address1,Address2,
						ConsigneeId,SecretQuestionId,SecretAnswer,SecretAnswerHint,DateAdded,IsActive)
						
				VALUES(P_UserName,
						P_Password,P_FirstName,
						P_MiddleName,P_LastName,P_EmailAddress,
						P_ProfileImageSource,P_RoleId,
						P_ContactNo1,P_ContactNo2,
						P_Address1,P_Address2,
						P_ConsigneeId,P_SecretQuestionId,
						P_SecretAnswer,P_SecretAnswerHint,
						NOW(),0)//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_addVesselByJobFile
DROP PROCEDURE IF EXISTS `sp_addVesselByJobFile`;
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_addVesselByJobFile`(
IN P_JobFileId VARCHAR(50),IN P_ShipperVesselId INT,
IN P_VesselArrivalTime DATETIME,IN P_VesselDischargeTime DATETIME
)
INSERT INTO VesselByJobFile(JobFileId,ShipperVesselId,VesselArrivalTime,VesselDischargeTime)
VALUES
(P_JobFileId,P_ShipperVesselId,P_VesselArrivalTime,P_VesselDischargeTime)//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_CreateJobFile
DROP PROCEDURE IF EXISTS `sp_CreateJobFile`;
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_CreateJobFile`(IN `P_JobFileID` VARCHAR(50), IN `P_ConsigneeId` INT, IN `P_BrokerID` INT, IN `P_MonitoringTypeId` INT, IN `P_HouseBillLadingNo` VARCHAR(50), IN `P_MasterBillLadingNo` VARCHAR(50), IN `P_LetterCreditFromBank` VARCHAR(50), IN `P_DateReceivedNoticeFromClients` DATETIME, IN `P_DateReceivedOfBL` DATETIME, IN `P_DateReceivedOfOtherDocs` DATETIME, IN `P_DateRequestBudgetToGL` DATETIME, IN `P_RFPDueDate` DATETIME, IN `ForwarderWarehouseId` INT, IN `P_DatePaid` DATETIME, IN `P_FlightNo` VARCHAR(50), IN `P_AirCraftNo` VARCHAR(50), IN `P_DateReceivedNoticeFromForwarder` DATETIME
)
INSERT INTO JobFile (JobFileId,ConsigneeId,BrokerId,MonitoringTypeId,DateCreated,HouseBillLadingNo,MasterBillLadingNo,
LetterCreditFromBank,DateReceivedNoticeFromClients,DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,
ForwarderWarehouseId,DatePaid,FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder) 
VALUES
(P_JobFileId,P_ConsigneeId,P_BrokerId,P_MonitoringTypeId,NOW(),P_HouseBillLadingNo,P_MasterBillLadingNo,P_LetterCreditFromBank,
P_DateReceivedNoticeFromClients,P_DateReceivedOfBL,P_DateReceivedOfOtherDocs,P_DateRequestBudgetToGL,P_RFPDueDate,
ForwarderWarehouseId,P_DatePaid,P_FlightNo,P_AirCraftNo,P_DateReceivedNoticeFromForwarder)//
DELIMITER ;


-- Dumping structure for function FilportTrackingSystem.SPLIT_STR
DROP FUNCTION IF EXISTS `SPLIT_STR`;
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` FUNCTION `SPLIT_STR`(
  x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
) RETURNS varchar(255) CHARSET latin1
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '')//
DELIMITER ;


-- Dumping structure for view FilportTrackingSystem.search_global
DROP VIEW IF EXISTS `search_global`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `search_global`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`119.94.%.%` SQL SECURITY DEFINER VIEW `search_global` AS select `JobFile`.`JobFileId` AS `JobFileId`,`Broker`.`FirstName` AS `FirstName`,`Broker`.`MiddleName` AS `MiddleName`,`Broker`.`LastName` AS `LastName`,(select `Consignee`.`ConsigneeName` from `Consignee` where (`Consignee`.`ConsigneeId` = `JobFile`.`ConsigneeId`)) AS `Consignee` from (`JobFile` join `Broker` on((`JobFile`.`BrokerId` = `Broker`.`BrokerId`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
