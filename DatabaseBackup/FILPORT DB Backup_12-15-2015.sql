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
CREATE DATABASE IF NOT EXISTS `FilportTrackingSystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `FilportTrackingSystem`;


-- Dumping structure for table FilportTrackingSystem.Broker
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Broker: 5 rows
DELETE FROM `Broker`;
/*!40000 ALTER TABLE `Broker` DISABLE KEYS */;
INSERT INTO `Broker` (`BrokerId`, `FirstName`, `MiddleName`, `LastName`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ContactNo1`, `ContactNo2`, `IsActive`) VALUES
	(1, 'Jaime   ', 'A.    ', 'Elias    ', '123 St.', 'Maligaya', 'La Union', 1, '3123121', '123412111', b'0'),
	(2, 'Rancho  ', 'P.  ', 'Malsi  ', 'Orient Square', 'Tatlong Hari', 'Rizal', 202, '2322342', '42323423', b'1'),
	(3, 'Reinen    ', 'R.    ', 'Constantino    ', 'Blk 12', 'San Roque', 'London', 223, '1234213', '0987654321', b'1'),
	(4, 'Juan Carlito', 'Blaser', 'Dimagiba', 'Blk 3A', 'F. De Castro', 'Cavite', 164, '6769809', '1231234', b'1'),
	(5, 'Eliseo ', 'A. ', 'Montefalcon ', 'San Bartolome', 'Nagcarlan', 'Laguna', 164, '5674567', '1234567', b'1');
/*!40000 ALTER TABLE `Broker` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Carrier
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
CREATE TABLE IF NOT EXISTS `Consignee` (
  `ConsigneeId` int(11) NOT NULL AUTO_INCREMENT,
  `ConsigneeName` varchar(100) NOT NULL,
  `HouseBuildingNoOrStreet` varchar(300) NOT NULL,
  `BarangayOrVillage` varchar(300) NOT NULL,
  `TownOrCityProvince` varchar(300) NOT NULL,
  `CountryId` varchar(300) NOT NULL,
  `OfficeNumber` varchar(1000) DEFAULT NULL,
  `DateAdded` date NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ConsigneeId`),
  UNIQUE KEY `ConsigneeName` (`ConsigneeName`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Dumping data for table FilportTrackingSystem.Consignee: 18 rows
DELETE FROM `Consignee`;
/*!40000 ALTER TABLE `Consignee` DISABLE KEYS */;
INSERT INTO `Consignee` (`ConsigneeId`, `ConsigneeName`, `HouseBuildingNoOrStreet`, `BarangayOrVillage`, `TownOrCityProvince`, `CountryId`, `OfficeNumber`, `DateAdded`, `IsActive`) VALUES
	(1, 'TCA', 'Ruby', 'San Antonio', 'Batangas ', '164', '+63 2 445787', '2015-12-15', b'0'),
	(2, 'MyPlay.Asia Corporation', 'Emerald Ave.', 'Ortigas Center', 'Pasig City', '1', '1234567', '2015-12-15', b'1'),
	(3, 'HelloPlanet.Asia', 'Madrigal', 'San Reberto', 'Estrellla', '5', '6547989', '2015-12-15', b'1'),
	(4, 'NEC Philippines Inc.', 'Rufino St.', 'Legaspi', 'Makati City', '164', '8970012', '2015-12-11', b'1'),
	(5, 'Universal Rubina Corp.', 'Blue St.', 'St. Joseph', 'Muntinlupa City', '163', '3890663', '2015-12-11', b'1'),
	(6, 'San Miguel Corporation', 'Junior Roed', 'San Antonio', 'Pasig City', '164', '1235668', '2015-12-11', b'1'),
	(7, 'AIG Inc.', '11th St.', 'Salcedo Village', 'Manila', '164', '9876524', '2015-12-11', b'1'),
	(8, 'The Asia Group Pte. Ltd.', 'Mariana Building', 'South town', 'Singapore', '189', '9875640', '2015-12-11', b'1'),
	(9, 'Fil-Port Express Brokerage Inc.', 'Sabak St.', 'San Antonio', 'San Pedro Laguna', '164', '8470859', '2015-12-11', b'1'),
	(10, 'Arm Resources Inc.', 'Chino Roces Ave.', 'Legaspi', 'Makati City', '164', '8976450', '2015-12-11', b'1'),
	(11, 'Philpost', 'Malate', 'Sagisag St.', 'Manila', '164', '8700012', '2015-12-11', b'0'),
	(12, 'Toshiba Philippines', 'Bldg. G', 'Canlalay', 'Calamba', '164', '1234567', '2015-12-11', b'0'),
	(13, 'Johnson and Johnson Corp.', 'JJ St.', 'Dimagiba', 'Taguig City', '6', '1234567', '2015-12-11', b'0'),
	(14, 'Unilever Corporation', 'Bangbang', 'Urdaneta', 'Malolos, Bulacan', '222', '0987654321', '2015-12-11', b'0'),
	(15, 'Monami Inc.', '123 Roed', 'Lunasan', 'Valenzuela', '20', '2313425', '2015-12-11', b'0'),
	(16, 'Yamaha Corp.', 'Rudriguez St.', 'San Bartolome', 'Pasig City', '10', '8765487', '2015-12-12', b'0'),
	(17, 'SM Corporation', '', 'San Mateo', 'Rizal', '20', '19830456', '2015-12-12', b'0'),
	(18, 'McDonald Philippines', '123 ST.', 'Salcedo Village', 'Makati City', '164', '8470859', '2015-12-15', b'0');
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ConsigneeContacts: 10 rows
DELETE FROM `ConsigneeContacts`;
/*!40000 ALTER TABLE `ConsigneeContacts` DISABLE KEYS */;
INSERT INTO `ConsigneeContacts` (`ConsigneeContactId`, `ConsigneeId`, `FirstName`, `MiddleName`, `LastName`, `ContactNo1`, `ContactNo2`) VALUES
	(1, 2, 'Juliet ', 'E.', 'Cristobal', '6615104', '6615104'),
	(12, 1, 'Benel', '', 'Charlie', '7654321', ''),
	(13, 18, 'Juan', 'M,', 'Dela Cruz', '1234567 Loc. ', 'joy@filport.com'),
	(5, 3, 'San', 'Go', 'Khu', '8680921', '09198065218'),
	(6, 6, 'Ramon', 'Q.', 'Ang', '1234321', '5678765'),
	(7, 7, 'Wada', 'San', 'Yamada', '0983594', ''),
	(8, 8, 'Gabriel', 'S.', 'Dela Cruz', '1238490', '2738641'),
	(9, 11, 'Noel', 'D.', 'Vasquez', '0999876543', '12345678901'),
	(10, 10, 'Ben', 'T.', 'Ten', '1234567', '1234567'),
	(11, 1, 'Nardo', 'P.', 'Guerero', '8670987', '09297654187');
/*!40000 ALTER TABLE `ConsigneeContacts` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ConsigneeTemp
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

-- Dumping data for table FilportTrackingSystem.ConsigneeTemp: 1 rows
DELETE FROM `ConsigneeTemp`;
/*!40000 ALTER TABLE `ConsigneeTemp` DISABLE KEYS */;
INSERT INTO `ConsigneeTemp` (`ConsigneeId`, `ConsigneeName`, `HouseBuildingNoOrStreet`, `BarangayOrVillage`, `TownOrCityProvince`, `CountryId`, `OfficeNumber`, `DateAdded`, `IsActive`) VALUES
	(1, 'TCA', 'Ruby', 'San Antonio', 'Batangas ', '164', '+63 2 445787', '2015-12-14', b'1');
/*!40000 ALTER TABLE `ConsigneeTemp` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ContainerByVessel
CREATE TABLE IF NOT EXISTS `ContainerByVessel` (
  `ContainerByVesselId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerNo` varchar(50) NOT NULL DEFAULT '0',
  `ContainerSize` varchar(50) NOT NULL DEFAULT '0',
  `VesselByJobFileId` int(11) NOT NULL,
  `CarrierId` int(11) DEFAULT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerPlateNo` varchar(50) NOT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `HaulerId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  PRIMARY KEY (`ContainerByVesselId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ContainerByVessel: 2 rows
DELETE FROM `ContainerByVessel`;
/*!40000 ALTER TABLE `ContainerByVessel` DISABLE KEYS */;
INSERT INTO `ContainerByVessel` (`ContainerByVesselId`, `ContainerNo`, `ContainerSize`, `VesselByJobFileId`, `CarrierId`, `NoOfCartons`, `TruckerPlateNo`, `TruckerName`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`, `StartOfStorage`, `Lodging`, `HaulerId`, `TargetDeliveryDate`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`) VALUES
	(1, '43', '100', 1, NULL, 0, 'elis', '434', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(2, 'CTN 123', '100', 2, NULL, 0, 'PLATE 123', 'NAME 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `ContainerByVessel` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ContainerByVesselHistory
CREATE TABLE IF NOT EXISTS `ContainerByVesselHistory` (
  `ContainerByVesselHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerByVesselId` int(11) NOT NULL,
  `ContainerNo` varchar(50) NOT NULL,
  `ContainerSize` varchar(50) NOT NULL,
  `VesselByJobFileId` int(11) NOT NULL,
  `CarrierId` int(11) DEFAULT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerPlateNo` varchar(50) NOT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `HaulerId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  PRIMARY KEY (`ContainerByVesselHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ContainerByVesselHistory: 2 rows
DELETE FROM `ContainerByVesselHistory`;
/*!40000 ALTER TABLE `ContainerByVesselHistory` DISABLE KEYS */;
INSERT INTO `ContainerByVesselHistory` (`ContainerByVesselHistoryId`, `ContainerByVesselId`, `ContainerNo`, `ContainerSize`, `VesselByJobFileId`, `CarrierId`, `NoOfCartons`, `TruckerPlateNo`, `TruckerName`, `EstDepartureTime`, `EstArrivalTime`, `ActualArrivalTime`, `StartOfStorage`, `Lodging`, `HaulerId`, `TargetDeliveryDate`, `GateInAtPort`, `GateOutAtPort`, `ActualDeliveryAtWarehouse`, `StartOfDemorage`, `PullOutDateAtPort`, `UpdatedBy_UserId`, `DateUpdated`) VALUES
	(1, 1, '43', '100', 1, NULL, 0, 'elis', '434', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 4, '2015-12-15 00:23:17'),
	(2, 2, 'CTN 123', '100', 2, NULL, 0, 'PLATE 123', 'NAME 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 2, '2015-12-15 01:47:52');
/*!40000 ALTER TABLE `ContainerByVesselHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Countries
CREATE TABLE IF NOT EXISTS `Countries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL DEFAULT '0',
  `CountryCode` char(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

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
CREATE TABLE IF NOT EXISTS `ForwarderWarehouse` (
  `ForwarderWarehouseId` int(11) NOT NULL AUTO_INCREMENT,
  `ForwarderWarehouseName` varchar(100) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ForwarderWarehouseId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ForwarderWarehouse: 6 rows
DELETE FROM `ForwarderWarehouse`;
/*!40000 ALTER TABLE `ForwarderWarehouse` DISABLE KEYS */;
INSERT INTO `ForwarderWarehouse` (`ForwarderWarehouseId`, `ForwarderWarehouseName`, `IsActive`) VALUES
	(1, 'MVP Group', b'0'),
	(2, 'JGH Inc.', NULL),
	(3, 'Antonio Corp.', NULL),
	(4, 'Emperor Inc.', NULL),
	(5, 'John Clement Inc.', NULL),
	(6, 'Emperor Royalty Corp.', NULL);
/*!40000 ALTER TABLE `ForwarderWarehouse` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Hauler
CREATE TABLE IF NOT EXISTS `Hauler` (
  `HaulerId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerName` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`HaulerId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Hauler: 12 rows
DELETE FROM `Hauler`;
/*!40000 ALTER TABLE `Hauler` DISABLE KEYS */;
INSERT INTO `Hauler` (`HaulerId`, `HaulerName`, `IsActive`) VALUES
	(1, 'Maharlika Inc', b'0'),
	(2, 'Quisumbing Holdings', b'0'),
	(3, 'Lugrato Industry', b'1'),
	(4, 'FIL-PORT', b'0'),
	(5, 'James Tin', b'0'),
	(6, 'Homage ', b'0'),
	(7, 'MGM Corp.', b'0'),
	(8, 'Corinthian Holdings Inc.', b'0'),
	(9, 'Lograto Systems Inc.', b'0'),
	(10, 'ABS-CBN', b'1'),
	(11, 'GMA 7', b'0'),
	(12, 'Info Systems', b'0');
/*!40000 ALTER TABLE `Hauler` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.HistoricalStatus
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
  `JobFileId` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `StatusId` int(11) NOT NULL,
  `RefEntryNo` varchar(50) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `ForwarderWarehouseId` int(11) DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  PRIMARY KEY (`JobFileId`),
  UNIQUE KEY `JobFileId` (`JobFileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.JobFile: 2 rows
DELETE FROM `JobFile`;
/*!40000 ALTER TABLE `JobFile` DISABLE KEYS */;
INSERT INTO `JobFile` (`JobFileId`, `ConsigneeId`, `BrokerId`, `PurchaseOrderNo`, `MonitoringTypeId`, `IsLocked`, `StatusId`, `RefEntryNo`, `Registry`, `LockedBy_UserId`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `LetterCreditFromBank`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `DateSentFinalAssessment`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `ForwarderWarehouseId`, `DatePaid`, `FlightNo`, `AirCraftNo`, `DateReceivedNoticeFromForwarder`) VALUES
	('TK-102-10', 1, 5, '', 1, b'0', 1, 'elis1', '0', NULL, '2015-12-15 00:23:16', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
	('JFN 12/15/2015', 5, 5, '', 1, b'0', 1, 'REF 123', '0', NULL, '2015-12-15 01:47:52', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `JobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFileHistory
CREATE TABLE IF NOT EXISTS `JobFileHistory` (
  `JobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `RefEntryNo` varchar(50) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `ForwarderWarehouseId` int(11) DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.JobFileHistory: 2 rows
DELETE FROM `JobFileHistory`;
/*!40000 ALTER TABLE `JobFileHistory` DISABLE KEYS */;
INSERT INTO `JobFileHistory` (`JobFileHistoryId`, `JobFileId`, `ConsigneeId`, `BrokerId`, `PurchaseOrderNo`, `MonitoringTypeId`, `StatusId`, `IsLocked`, `RefEntryNo`, `Registry`, `LockedBy_UserId`, `DateCreated`, `HouseBillLadingNo`, `MasterBillLadingNo`, `LetterCreditFromBank`, `DateSentPreAssessment`, `DateFileEntryToBOC`, `DateSentFinalAssessment`, `DateReceivedNoticeFromClients`, `DateReceivedOfBL`, `DateReceivedOfOtherDocs`, `DateRequestBudgetToGL`, `RFPDueDate`, `DatePaid`, `ForwarderWarehouseId`, `FlightNo`, `AirCraftNo`, `DateReceivedNoticeFromForwarder`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 'TK-102-10', 1, 5, '', 1, 1, b'0', 'elis1', '0', NULL, '2015-12-15 00:23:16', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '2015-12-15 00:23:16', 4),
	(2, 'JFN 12/15/2015', 5, 5, '', 1, 1, b'0', 'REF 123', '0', NULL, '2015-12-15 01:47:52', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '2015-12-15 01:47:52', 2);
/*!40000 ALTER TABLE `JobFileHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.JobFileTemp
CREATE TABLE IF NOT EXISTS `JobFileTemp` (
  `JobFileId` varchar(50) NOT NULL,
  `ConsigneeId` int(11) NOT NULL,
  `BrokerId` int(11) NOT NULL,
  `MonitoringTypeId` int(11) NOT NULL,
  `IsLocked` bit(1) DEFAULT b'0',
  `StatusId` int(11) NOT NULL,
  `RefEntryNo` varchar(50) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `ForwarderWarehouseId` int(11) DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.JobFileTemp: 0 rows
DELETE FROM `JobFileTemp`;
/*!40000 ALTER TABLE `JobFileTemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `JobFileTemp` ENABLE KEYS */;


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
  `ProductName` varchar(100) NOT NULL,
  `ContainerByVesselId` int(11) NOT NULL,
  `DateBOCCLeared` datetime DEFAULT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Products: 2 rows
DELETE FROM `Products`;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` (`ProductId`, `ProductName`, `ContainerByVesselId`, `DateBOCCLeared`, `Origin_CountryId`, `Origin_City`) VALUES
	(1, 'elis2', 1, NULL, 1, '343'),
	(2, 'PRODUCT 1', 2, NULL, 164, '');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ProductsHistory
CREATE TABLE IF NOT EXISTS `ProductsHistory` (
  `ProductHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ContainerByVesselId` int(11) NOT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `StatusId` int(11) NOT NULL,
  `PurchaseOrderNo` varchar(50) NOT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductHistoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.ProductsHistory: 2 rows
DELETE FROM `ProductsHistory`;
/*!40000 ALTER TABLE `ProductsHistory` DISABLE KEYS */;
INSERT INTO `ProductsHistory` (`ProductHistoryId`, `ProductId`, `ProductName`, `ContainerByVesselId`, `DateBOCCleared`, `StatusId`, `PurchaseOrderNo`, `Origin_CountryId`, `Origin_City`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(1, 1, 'elis2', 1, NULL, 0, '', 1, '343', '2015-12-15 00:23:18', 4),
	(2, 2, 'PRODUCT 1', 2, NULL, 0, '', 164, '', '2015-12-15 01:47:53', 2);
/*!40000 ALTER TABLE `ProductsHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products_Air
CREATE TABLE IF NOT EXISTS `Products_Air` (
  `Products_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
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
  PRIMARY KEY (`Products_AirId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.Products_Air: 0 rows
DELETE FROM `Products_Air`;
/*!40000 ALTER TABLE `Products_Air` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products_Air` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Products_AirHistory
CREATE TABLE IF NOT EXISTS `Products_AirHistory` (
  `Products_AirHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Products_AirId` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
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

-- Dumping data for table FilportTrackingSystem.Products_AirHistory: 0 rows
DELETE FROM `Products_AirHistory`;
/*!40000 ALTER TABLE `Products_AirHistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products_AirHistory` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Role
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Shipper: 11 rows
DELETE FROM `Shipper`;
/*!40000 ALTER TABLE `Shipper` DISABLE KEYS */;
INSERT INTO `Shipper` (`ShipperId`, `ShipperName`, `DateAdded`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `IsActive`) VALUES
	(1, 'Mondragon Industry Inc.', '2015-12-15 00:00:00', '1', 'Mondragon Industry Inc.', 'Manila', 1, b'1'),
	(2, 'Montefalcon Holdings Inc.', '2015-12-15 00:00:00', '2', 'Montefalcon Holdings Inc.', 'Manila', 1, b'1'),
	(3, 'Constantino Group of Companies Pte. Ltd.', '2015-12-15 00:00:00', '3', 'Constantino Group of Companies Pte. Ltd.', 'Batangas ', 3, b'1'),
	(4, 'YNION Holdings inc.', '2015-12-15 00:00:00', '4', 'YNION Holdings inc.', 'San Pedro Laguna', 4, b'0'),
	(5, 'CHER Transport Inc.', '2015-12-11 00:00:00', 'EDSA Corner', 'Baybayin', 'Batangas ', 163, b'1'),
	(6, 'FORD', '2015-12-11 00:00:00', 'Melgar Roed', 'North', 'Carolina', 224, b'1'),
	(7, 'Teleperformance Inc.', '2015-12-11 00:00:00', 'EDSA Corner', 'Villa Olympia', 'Magallanes', 163, b'1'),
	(8, 'Starbucks', '2015-12-12 00:00:00', 'Red St.', 'Kobuhan', 'Caloocan City', 164, b'1'),
	(9, 'Universal Bakery', '2015-12-12 00:00:00', 'Magsaysay Roed', 'Nueva', 'San Pedro Laguna', 164, b'1'),
	(10, 'Fujitsu Seimen', '2015-12-15 00:00:00', '10', 'Fujitsu Seimen', 'Cavte', 10, NULL),
	(11, 'Bottom Line', '2015-12-12 00:00:00', 'Dulalang Ave.', 'Sabtang', 'Quezon City', 164, b'1');
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ShipperContacts: 2 rows
DELETE FROM `ShipperContacts`;
/*!40000 ALTER TABLE `ShipperContacts` DISABLE KEYS */;
INSERT INTO `ShipperContacts` (`ShipperContactId`, `FirstName`, `MiddleName`, `LastName`, `ContactNo1`, `ContactNo2`, `ShipperId`) VALUES
	(1, 'Benjie', 'Alpi', 'Aras', '556677112211', '5512111', 1),
	(2, 'Shalala', 'H.', 'Dela Cruz', '0929890093', '09198065218', 2);
/*!40000 ALTER TABLE `ShipperContacts` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.ShipperVessel
CREATE TABLE IF NOT EXISTS `ShipperVessel` (
  `ShipperVesselId` int(11) NOT NULL AUTO_INCREMENT,
  `Vesselname` varchar(100) NOT NULL,
  `VesselNo` varchar(50) DEFAULT NULL,
  `ShipperId` int(11) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ShipperVesselId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.ShipperVessel: 15 rows
DELETE FROM `ShipperVessel`;
/*!40000 ALTER TABLE `ShipperVessel` DISABLE KEYS */;
INSERT INTO `ShipperVessel` (`ShipperVesselId`, `Vesselname`, `VesselNo`, `ShipperId`, `IsActive`) VALUES
	(1, 'Titanic II', 'TCA1', 1, b'0'),
	(2, 'MV Princess of the Star', 'MVPS 1234', 1, b'0'),
	(3, 'Susana Rose II', 'SSR2233', 2, b'1'),
	(4, 'Poseidon IX', 'PSN999', 2, b'1'),
	(5, 'Donya Pas VII', 'DP777', 3, b'1'),
	(6, 'Donya Marina VIII', 'DM8888', 4, b'1'),
	(7, '2GO Travel', '2goT', 1, b'1'),
	(8, 'Uni Ship Inc.', 'USI1234', 4, b'1'),
	(9, 'Super Ferry IX', 'SF9', 3, b'1'),
	(10, 'BRP Ramon Alcaras', 'BRA1434', 4, b'1'),
	(11, 'Trans-Asia Shipping Inc.', 'TASI1234', 6, b'1'),
	(12, 'Asia Pacific Liner', 'APL1234', 7, b'1'),
	(13, 'BBL Trans.', 'BBLT8765', 9, b'1'),
	(14, 'Forever Twenty 1', 'FTO-11', 11, b'1'),
	(15, 'chers', '003', 5, b'1');
/*!40000 ALTER TABLE `ShipperVessel` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.Status
CREATE TABLE IF NOT EXISTS `Status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsBackground` bit(1) NOT NULL,
  `ColorCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.Status: 9 rows
DELETE FROM `Status`;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
INSERT INTO `Status` (`StatusId`, `StatusName`, `Description`, `IsActive`, `IsBackground`, `ColorCode`) VALUES
	(1, 'Red Font', 'Cleared at BOC/ with schedule of delivery', b'1', b'0', '#ff0000'),
	(2, 'Gold', 'On process (pre-assess; final assess; awaits debit)', b'1', b'1', '#fae805'),
	(3, 'Green', 'Cleared at BOC/ but waiting for delivery schedule', b'1', b'1', '#00ff40'),
	(4, 'Blue', 'With original docs; but awaits arrival or with revisions', b'0', b'1', '#00B0F0'),
	(5, 'Pink', 'Awaits original docs; but with advance', b'0', b'1', '#FF66FF'),
	(6, 'Violet', 'Awaits original docs/no advance docs', b'0', b'1', '#B1A0C7'),
	(7, 'Red', 'With error or discrepancy on shipping docs', b'0', b'1', '#FF0000'),
	(8, 'Orange', 'Reschedule due to vessel stability', b'0', b'1', '#ff952b'),
	(9, 'Gray', 'Not awarded to Filport', b'0', b'1', '#c0c0c0');
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Table for Users of the system';

-- Dumping data for table FilportTrackingSystem.User: 7 rows
DELETE FROM `User`;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` (`UserId`, `UserName`, `Password`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `EmailAddress`, `ProfileImageSource`, `RoleId`, `ContactNo1`, `ContactNo2`, `HouseBuildingNoStreet`, `BarangarOrVillage`, `TownOrCityProvince`, `CountryId`, `ConsigneeId`, `SecretQuestionId`, `SecretAnswer`, `SecretAnswerHint`, `DateAdded`, `IsActive`) VALUES
	(1, 'benel', '81fd4c2c978ce0df65c1873b67092472a89b25fe', 'Benel', 'Lumacang', 'Ampu-an', '1994-09-23', 'bla@the-asiagroup.com', '8ca16eb5a75fca0fad17d03923795c6d.jpg', 2, '09295646919', '6615104', '3A', 'F. Reyes', 'Cavite', 164, 0, 1, 'Nel', 'Nel', '2015-12-10', b'0'),
	(2, 'charlieadmin', 'f443857a547bc44feec45f535876f653aaccd506', 'Charlie', 'S', 'Bobis', '1992-02-18', 'charlie@the-asiagroup.com', 'user.png', 2, '09305071622', '', 'B1 L9 Rockville Compound 7, J.P. Ramoy Street', 'Talipapa', 'Novaliches, Caloocan', 164, 1, 1, 'bon', 'bon', '2015-12-10', b'0'),
	(3, 'reinenadmin', '999d82ed1eab228680b2cd65b4d288aff960db00', 'Reinen', 'Rosela', 'Constantino', '1995-06-22', 'reinen@the-asiagroup.com', '01b3c4603435f1ed4a6259aba8f90c6b.jpg', 2, '09482095100', '', '417', 'San Roque', 'San Pablo ', 164, 1, 1, 'rey', 'secret', '2015-12-10', b'0'),
	(4, 'eli', '7f8b824434202ca008387248fcab83b809227462', 'eli', 'almonte', 'montefalcon', '2015-12-17', 'eli_montefalcon@yahoo.com', '953375b6fa5d302ea99c43c7739a15e7.PNG', 2, '111111111111', '1111111111', '1', '1', '1', 17, 3, 15, '1', '1', '2015-12-11', b'0'),
	(5, 'renren', 'd7237cdec27f1cffe79cd5ea379fe5d260ca6ce3', 'ren', 'rein', 'curioso', '1993-11-17', 'admin@gmail.com', 'e4dcb0a1249d0348f73e8e72172fba17.jpg', 2, '0907566620', '0908258888', '285', 'alabng', 'Muntinlupa', 164, 2, 7, 'joy', 'ligaya', '2015-12-11', b'0'),
	(6, 'Junne', '9e690c3053d4d0725cfc038a03015ebb3a300dba', 'Junne', 'C', 'Narito', '0000-00-00', 'engr.fc.narito@gmail.com', 'user.png', 2, '7654321', '', 'Orient Square', 'Ortigas Center', 'Pasig', 164, 6, 1, 'Jun', 'Jun', '2015-12-13', b'0'),
	(7, 'danieltenefrancia', 'b3abde8cfa5bf90e6ac428caea88eecd3bce1860', 'Daniel', 'Mandigma', 'Tenefrancia', '1996-08-05', 'daniel.tenefrancia@gmail.com', 'user.png', 2, '09362776832', '09362776832', 'Blk 27 Lot 8 Asana St', 'Southern Heights 2', 'San Pedro Laguna', 164, 1, 4, 'Asana', 'Where?', '2015-12-15', b'0');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.VesselByJobFile
CREATE TABLE IF NOT EXISTS `VesselByJobFile` (
  `VesselByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `ShipperVesselId` int(11) NOT NULL,
  `VesselArrivalTime` datetime DEFAULT NULL,
  `VesselDischargeTime` datetime DEFAULT NULL,
  PRIMARY KEY (`VesselByJobFileId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table FilportTrackingSystem.VesselByJobFile: 2 rows
DELETE FROM `VesselByJobFile`;
/*!40000 ALTER TABLE `VesselByJobFile` DISABLE KEYS */;
INSERT INTO `VesselByJobFile` (`VesselByJobFileId`, `JobFileId`, `ShipperVesselId`, `VesselArrivalTime`, `VesselDischargeTime`) VALUES
	(1, 'TK-102-10', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'JFN 12/15/2015', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `VesselByJobFile` ENABLE KEYS */;


-- Dumping structure for table FilportTrackingSystem.VesselByJobFileHistory
CREATE TABLE IF NOT EXISTS `VesselByJobFileHistory` (
  `VesselByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `ShipperVesselId` int(11) NOT NULL,
  `VesselArrivalTime` datetime DEFAULT NULL,
  `VesselDischargeTime` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table FilportTrackingSystem.VesselByJobFileHistory: 2 rows
DELETE FROM `VesselByJobFileHistory`;
/*!40000 ALTER TABLE `VesselByJobFileHistory` DISABLE KEYS */;
INSERT INTO `VesselByJobFileHistory` (`VesselByJobFileId`, `JobFileId`, `ShipperVesselId`, `VesselArrivalTime`, `VesselDischargeTime`, `DateUpdated`, `UpdatedBy_UserId`) VALUES
	(0, 'TK-102-10', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-12-15 00:23:16', 4),
	(0, 'JFN 12/15/2015', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-12-15 01:47:52', 2);
/*!40000 ALTER TABLE `VesselByJobFileHistory` ENABLE KEYS */;


-- Dumping structure for view FilportTrackingSystem.search_global
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `search_global` (
	`JobFileId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`FirstName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`MiddleName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`LastName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Consignee` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_broker_full_info
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


-- Dumping structure for view FilportTrackingSystem.vw_consignee_full_info
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


-- Dumping structure for view FilportTrackingSystem.vw_JobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFile` (
	`JobFileId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Registry` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`VSL_NO` VARCHAR(150) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedNoticeFromClients` DATETIME NULL,
	`DateReceivedOfBL` DATETIME NULL,
	`DateReceivedOfOtherDocs` DATETIME NULL,
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`DateRequestBudgetToGL` DATETIME NULL,
	`RFPDueDate` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`DatePaid` DATETIME NULL
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_MLAJobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_MLAJobFile` (
	`JobFileId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`NoOfCartons` INT(11) NULL,
	`ContainerSize` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ProductName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`PurchaseOrderNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Origin` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`EstDepartureTime` DATETIME NULL,
	`EstArrivalTime` DATETIME NULL,
	`ActualArrivalTime` DATETIME NULL,
	`LetterCreditFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`StartOfDemorage` DATETIME NULL,
	`StartOfStorage` DATETIME NULL,
	`Registry` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`VSL_NO` VARCHAR(151) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedNoticeFromClients` DATETIME NULL,
	`DateReceivedOfBL` DATETIME NULL,
	`DateReceivedOfOtherDocs` DATETIME NULL,
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`DateRequestBudgetToGL` DATETIME NULL,
	`RFPDueDate` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`DateFileEntryToBOC` DATETIME NULL,
	`DateSentFinalAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`DatePaid` DATETIME NULL,
	`DateBOCCleared` DATETIME NULL,
	`TargetDeliveryDate` DATETIME NULL,
	`PlateNo_Trucker` VARCHAR(151) NULL COLLATE 'latin1_swedish_ci',
	`GateInAtPort` DATETIME NULL,
	`GateOutAtPort` DATETIME NULL,
	`ActualDeliveryAtWarehouse` DATETIME NULL,
	`HistoricalStatusId` INT(11) NULL,
	`MonitoringTypeId` INT(11) NULL,
	`ContainerByVesselId` INT(11) NULL,
	`VesselByJobFileId` INT(11) NULL
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_shipper_full_info
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


-- Dumping structure for view FilportTrackingSystem.vw_shipper_vessel
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_shipper_vessel` (
	`ShipperName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperId` INT(11) NOT NULL,
	`IsActive` BIT(1) NULL,
	`ShipperVesselId` INT(11) NOT NULL,
	`Vesselname` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddContainerByVessel
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddContainerByVessel`(IN `P_ContainerNo` VARCHAR(50), IN `P_ContainerSize` VARCHAR(50), IN `P_VesselByJobFileId` INT, IN `P_CarrierId` INT, IN `P_NoOfCartons` INT, IN `P_TruckerPlateNo` VARCHAR(50), IN `P_TruckerName` VARCHAR(100), IN `P_EstDepartureTime` DATETIME, IN `P_EstArrivalTime` DATETIME, IN `P_ActualArrivalTime` DATETIME, IN `P_StartOfStorage` DATETIME, IN `P_Lodging` DATETIME, IN `P_HaulerId` INT, IN `P_TargetDeliveryDate` DATETIME, IN `P_GateInAtPort` DATETIME, IN `P_GateOutAtPort` DATETIME, IN `P_ActualDeliveryAtWarehouse` DATETIME, IN `P_StartOfDemorage` DATETIME, IN `P_PullOutDateAtPort` INT
, IN `P_UserId` INT)
BEGIN
INSERT INTO ContainerByVessel(ContainerNo,ContainerSize,VesselByJobFileId,CarrierId,NoOfCartons,
TruckerPlateNo,TruckerName,EstDepartureTime,EstArrivalTime,ActualArrivalTime,
StartOfStorage,Lodging,HaulerId,TargetDeliveryDate,GateInAtPort,
GateOutAtPort,ActualDeliveryAtWarehouse,StartOfDemorage,PullOutDateAtPort
)
VALUES(P_ContainerNo,P_ContainerSize,P_VesselByJobFileId,P_CarrierId,P_NoOfCartons,
P_TruckerPlateNo,P_TruckerName,P_EstDepartureTime,
P_EstArrivalTime,P_ActualArrivalTime,P_StartOfStorage,
P_Lodging,P_HaulerId,P_TargetDeliveryDate,
P_GateInAtPort,P_GateOutAtPort,P_ActualDeliveryAtWarehouse,
P_StartOfDemorage,P_PullOutDateAtPort
);


SET @lastCbVId = LAST_INSERT_ID();


-- Create History(Audit)
INSERT INTO ContainerByVesselHistory(ContainerByVesselId,ContainerNo,ContainerSize,VesselByJobFileId,CarrierId,NoOfCartons,
TruckerPlateNo,TruckerName,EstDepartureTime,EstArrivalTime,ActualArrivalTime,
StartOfStorage,Lodging,HaulerId,TargetDeliveryDate,GateInAtPort,
GateOutAtPort,ActualDeliveryAtWarehouse,StartOfDemorage,PullOutDateAtPort,UpdatedBy_UserId,DateUpdated
)
VALUES(@lastCbVId,P_ContainerNo,P_ContainerSize,P_VesselByJobFileId,P_CarrierId,P_NoOfCartons,
P_TruckerPlateNo,P_TruckerName,P_EstDepartureTime,
P_EstArrivalTime,P_ActualArrivalTime,P_StartOfStorage,
P_Lodging,P_HaulerId,P_TargetDeliveryDate,
P_GateInAtPort,P_GateOutAtPort,P_ActualDeliveryAtWarehouse,
P_StartOfDemorage,P_PullOutDateAtPort,P_UserId,NOW()
);

SELECT @lastCbVId as LastContainerByVesselId;

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddProducts
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddProducts`(IN `P_ProductName` varchar(100), IN `P_ContainerId` VARCHAR(50), IN `P_VesselByJobFileId` INT, IN `P_DateBOCCLeared` DATETIME, IN `P_Origin_CountryId` INT, IN `P_Origin_City` varchar(50), IN `P_UserId` INT
)
BEGIN

SET @newContainerByVesselId = (SELECT CBV.ContainerByVesselId FROM ContainerByVessel CBV WHERE CBV.ContainerNo = P_ContainerId AND CBV.VesselByJobFileId = P_VesselByJobFileId limit 1);

INSERT INTO Products(
ProductName,ContainerByVesselId,DateBOCCLeared,
Origin_CountryId,Origin_City
)
values
(
P_ProductName, @newContainerByVesselId,P_DateBOCCLeared,
P_Origin_CountryId, P_Origin_City
);


-- Create History(For Audit)

INSERT INTO ProductsHistory(ProductId,
ProductName,ContainerByVesselId,DateBOCCLeared,
Origin_CountryId,Origin_City,
UpdatedBy_UserId,DateUpdated
)
VALUES(LAST_INSERT_ID(),
P_ProductName, @newContainerByVesselId,P_DateBOCCLeared,
P_Origin_CountryId, P_Origin_City,
P_UserId, NOW()
);

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddUser
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


-- Dumping structure for procedure FilportTrackingSystem.sp_AddVesselByJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddVesselByJobFile`(IN `P_JobFileId` VARCHAR(50), IN `P_ShipperVesselId` INT, IN `P_VesselArrivalTime` DATETIME, IN `P_VesselDischargeTime` DATETIME
, IN `P_UserId` INT)
BEGIN
INSERT INTO VesselByJobFile(JobFileId,ShipperVesselId,VesselArrivalTime,VesselDischargeTime)
VALUES
(P_JobFileId,P_ShipperVesselId,P_VesselArrivalTime,P_VesselDischargeTime);


-- Create History(Audit)
INSERT INTO VesselByJobFileHistory(JobFileId,ShipperVesselId,VesselArrivalTime,VesselDischargeTime,DateUpdated,UpdatedBy_UserId)
VALUES
(P_JobFileId,P_ShipperVesselId,P_VesselArrivalTime,P_VesselDischargeTime,NOW(),P_UserId);

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_CreateJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_CreateJobFile`(IN `P_JobFileID` VARCHAR(50), IN `P_ConsigneeId` INT, IN `P_BrokerID` INT, IN `P_PurchaseOrderNo` VARCHAR(50), IN `P_MonitoringTypeId` INT, IN `P_StatusId` INT, IN `P_RefEntryNo` VARCHAR(50), IN `P_Registry` INT, IN `P_HouseBillLadingNo` VARCHAR(50), IN `P_MasterBillLadingNo` VARCHAR(50), IN `P_LetterCreditFromBank` VARCHAR(50), IN `P_DateSentPreAssessment` DATETIME, IN `P_DateFileEntryToBOC` DATETIME, IN `P_DateSentFinalAssessment` DATETIME, IN `P_DateReceivedNoticeFromClients` DATETIME, IN `P_DateReceivedOfBL` DATETIME, IN `P_DateReceivedOfOtherDocs` DATETIME, IN `P_DateRequestBudgetToGL` DATETIME, IN `P_RFPDueDate` DATETIME, IN `P_ForwarderWarehouseId` INT, IN `P_DatePaid` DATETIME, IN `P_FlightNo` VARCHAR(50), IN `P_AirCraftNo` VARCHAR(50), IN `P_DateReceivedNoticeFromForwarder` VARCHAR(50), IN `P_UserId` INT)
BEGIN
SET @todayDate = NOW();

INSERT INTO JobFile (JobFileId,ConsigneeId,BrokerId,PurchaseOrderNo,MonitoringTypeId,StatusId,RefEntryNo,Registry,DateCreated,HouseBillLadingNo,MasterBillLadingNo,
LetterCreditFromBank,DateSentPreAssessment,DateFileEntryToBOC,DateSentFinalAssessment,DateReceivedNoticeFromClients,DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,
ForwarderWarehouseId,DatePaid,FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder) 

VALUES
(P_JobFileId,P_ConsigneeId,P_BrokerId,P_PurchaseOrderNo,P_MonitoringTypeId,P_StatusId,P_RefEntryNo,P_Registry,@todayDate,P_HouseBillLadingNo,P_MasterBillLadingNo,P_LetterCreditFromBank,
P_DateSentPreAssessment,P_DateFileEntryToBOC,P_DateSentFinalAssessment,
P_DateReceivedNoticeFromClients,P_DateReceivedOfBL,P_DateReceivedOfOtherDocs,P_DateRequestBudgetToGL,P_RFPDueDate,
P_ForwarderWarehouseId,P_DatePaid,P_FlightNo,P_AirCraftNo,P_DateReceivedNoticeFromForwarder);



-- Create History(Audit)
INSERT INTO JobFileHistory(JobFileId,ConsigneeId,BrokerId,PurchaseOrderNo,MonitoringTypeId,StatusId,RefEntryNo,Registry,DateCreated,HouseBillLadingNo,MasterBillLadingNo,
LetterCreditFromBank,DateSentPreAssessment,DateFileEntryToBOC,DateSentFinalAssessment,DateReceivedNoticeFromClients,DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,
ForwarderWarehouseId,DatePaid,FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder,DateUpdated,UpdatedBy_UserId) 

VALUES
(P_JobFileId,P_ConsigneeId,P_BrokerId,P_PurchaseOrderNo,P_MonitoringTypeId,P_StatusId,P_RefEntryNo,P_Registry,@todayDate,P_HouseBillLadingNo,P_MasterBillLadingNo,P_LetterCreditFromBank,
P_DateSentPreAssessment,P_DateFileEntryToBOC,P_DateSentFinalAssessment,
P_DateReceivedNoticeFromClients,P_DateReceivedOfBL,P_DateReceivedOfOtherDocs,P_DateRequestBudgetToGL,P_RFPDueDate,
P_ForwarderWarehouseId,P_DatePaid,P_FlightNo,P_AirCraftNo,P_DateReceivedNoticeFromForwarder,@todayDate,P_UserId);

end//
DELIMITER ;


-- Dumping structure for function FilportTrackingSystem.SPLIT_STR
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
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `search_global`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`119.94.%.%` SQL SECURITY DEFINER VIEW `search_global` AS select `JobFile`.`JobFileId` AS `JobFileId`,`Broker`.`FirstName` AS `FirstName`,`Broker`.`MiddleName` AS `MiddleName`,`Broker`.`LastName` AS `LastName`,(select `Consignee`.`ConsigneeName` from `Consignee` where (`Consignee`.`ConsigneeId` = `JobFile`.`ConsigneeId`)) AS `Consignee` from (`JobFile` join `Broker` on((`JobFile`.`BrokerId` = `Broker`.`BrokerId`)));


-- Dumping structure for view FilportTrackingSystem.vw_broker_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_broker_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_broker_full_info` AS select `Broker`.`BrokerId` AS `BrokerId`,`Broker`.`FirstName` AS `FirstName`,`Broker`.`MiddleName` AS `MiddleName`,`Broker`.`LastName` AS `LastName`,`Broker`.`HouseBuildingNoStreet` AS `HouseBuildingNoStreet`,`Broker`.`BarangarOrVillage` AS `BarangarOrVillage`,`Broker`.`TownOrCityProvince` AS `TownOrCityProvince`,`Broker`.`CountryId` AS `CountryId`,`Broker`.`ContactNo1` AS `ContactNo1`,`Broker`.`ContactNo2` AS `ContactNo2`,`Broker`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Broker`.`CountryId`)) AS `Country` from `Broker`;


-- Dumping structure for view FilportTrackingSystem.vw_consignee_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_consignee_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_consignee_full_info` AS select `Consignee`.`ConsigneeId` AS `ConsigneeId`,`Consignee`.`ConsigneeName` AS `ConsigneeName`,`Consignee`.`HouseBuildingNoOrStreet` AS `HouseBuildingNoOrStreet`,`Consignee`.`BarangayOrVillage` AS `BarangayOrVillage`,`Consignee`.`TownOrCityProvince` AS `TownOrCityProvince`,`Consignee`.`CountryId` AS `CountryId`,`Consignee`.`OfficeNumber` AS `OfficeNumber`,`Consignee`.`DateAdded` AS `DateAdded`,`Consignee`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Consignee`.`CountryId`)) AS `Country` from `Consignee`;


-- Dumping structure for view FilportTrackingSystem.vw_JobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`JF`.`Registry` AS `Registry`,concat(`SV`.`Vesselname`,`SV`.`VesselNo`) AS `VSL_NO`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`JF`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`JF`.`RefEntryNo` AS `RefEntryNo`,`ST`.`StatusName` AS `StatusName`,`JF`.`DatePaid` AS `DatePaid` from ((((((`JobFile` `JF` left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `VesselByJobFile` `VBJ` on((`VBJ`.`JobFileId` = `JF`.`JobFileId`))) left join `ShipperVessel` `SV` on((`SV`.`ShipperVesselId` = `VBJ`.`ShipperVesselId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `SV`.`ShipperId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`)));


-- Dumping structure for view FilportTrackingSystem.vw_MLAJobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_MLAJobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_MLAJobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`CBV`.`NoOfCartons` AS `NoOfCartons`,`CBV`.`ContainerSize` AS `ContainerSize`,`P`.`ProductName` AS `ProductName`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`CBV`.`ContainerNo` AS `ContainerNo`,concat(`O_CT`.`CountryName`,`P`.`Origin_City`) AS `Origin`,`CBV`.`EstDepartureTime` AS `EstDepartureTime`,`CBV`.`EstArrivalTime` AS `EstArrivalTime`,`CBV`.`ActualArrivalTime` AS `ActualArrivalTime`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`CBV`.`StartOfDemorage` AS `StartOfDemorage`,`CBV`.`StartOfStorage` AS `StartOfStorage`,`JF`.`Registry` AS `Registry`,concat(`SV`.`Vesselname`,'-',`SV`.`VesselNo`) AS `VSL_NO`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`JF`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`JF`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`JF`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`JF`.`RefEntryNo` AS `RefEntryNo`,`ST`.`StatusName` AS `StatusName`,`JF`.`DatePaid` AS `DatePaid`,`P`.`DateBOCCLeared` AS `DateBOCCleared`,`CBV`.`TargetDeliveryDate` AS `TargetDeliveryDate`,concat(`CBV`.`TruckerPlateNo`,' ',`CBV`.`TruckerName`) AS `PlateNo_Trucker`,`CBV`.`GateInAtPort` AS `GateInAtPort`,`CBV`.`GateOutAtPort` AS `GateOutAtPort`,`CBV`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`HST`.`HistoricalStatusId` AS `HistoricalStatusId`,`MT`.`MonitoringTypeId` AS `MonitoringTypeId`,`P`.`ContainerByVesselId` AS `ContainerByVesselId`,`CBV`.`VesselByJobFileId` AS `VesselByJobFileId` from (((((((((((`JobFile` `JF` left join `VesselByJobFile` `VBJF` on((`JF`.`JobFileId` = `VBJF`.`JobFileId`))) left join `ShipperVessel` `SV` on((`SV`.`ShipperVesselId` = `VBJF`.`ShipperVesselId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `SV`.`ShipperId`))) left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `ContainerByVessel` `CBV` on((`CBV`.`VesselByJobFileId` = `VBJF`.`VesselByJobFileId`))) left join `Products` `P` on((`P`.`ContainerByVesselId` = `CBV`.`ContainerByVesselId`))) left join `Countries` `O_CT` on((`P`.`Origin_CountryId` = `O_CT`.`CountryId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `HistoricalStatus` `HST` on((`HST`.`ProductId` = `P`.`ProductId`))) left join `MonitoringType` `MT` on((`MT`.`MonitoringTypeId` = `JF`.`MonitoringTypeId`))) where (`JF`.`MonitoringTypeId` in (1,2));


-- Dumping structure for view FilportTrackingSystem.vw_shipper_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_shipper_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_shipper_full_info` AS select `Shipper`.`ShipperId` AS `ShipperId`,`Shipper`.`ShipperName` AS `ShipperName`,`Shipper`.`DateAdded` AS `DateAdded`,`Shipper`.`HouseBuildingNoStreet` AS `HouseBuildingNoStreet`,`Shipper`.`BarangarOrVillage` AS `BarangarOrVillage`,`Shipper`.`TownOrCityProvince` AS `TownOrCityProvince`,`Shipper`.`CountryId` AS `CountryId`,`Shipper`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Shipper`.`CountryId`)) AS `Country` from `Shipper`;


-- Dumping structure for view FilportTrackingSystem.vw_shipper_vessel
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_shipper_vessel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_shipper_vessel` AS select `s`.`ShipperName` AS `ShipperName`,`s`.`ShipperId` AS `ShipperId`,`s`.`IsActive` AS `IsActive`,`v`.`ShipperVesselId` AS `ShipperVesselId`,`v`.`Vesselname` AS `Vesselname` from (`Shipper` `s` join `ShipperVessel` `v` on((`s`.`ShipperId` = `v`.`ShipperId`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
