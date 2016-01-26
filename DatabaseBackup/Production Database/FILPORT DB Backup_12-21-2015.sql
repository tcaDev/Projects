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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Carrier
CREATE TABLE IF NOT EXISTS `Carrier` (
  `CarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CarrierName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CarrierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='From ShipperVessel to Carrier';

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.CarrierByJobFile
CREATE TABLE IF NOT EXISTS `CarrierByJobFile` (
  `CarrierByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) DEFAULT NULL,
  `ArrivalTime` datetime DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  PRIMARY KEY (`CarrierByJobFileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='From ShipperByVessel to CarrierByJobFile';

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.CarrierByJobFileHistory
CREATE TABLE IF NOT EXISTS `CarrierByJobFileHistory` (
  `CarrierByJobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) NOT NULL,
  `ArrivalTime` datetime DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`CarrierByJobFileHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ColorSelectivity
CREATE TABLE IF NOT EXISTS `ColorSelectivity` (
  `ColorSelectivityId` int(11) NOT NULL,
  `ColorSelectivityName` varchar(50) NOT NULL,
  PRIMARY KEY (`ColorSelectivityId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ContainerByCarrier
CREATE TABLE IF NOT EXISTS `ContainerByCarrier` (
  `ContainerByCarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerNo` varchar(50) NOT NULL DEFAULT '0',
  `ContainerSize` varchar(50) NOT NULL DEFAULT '0',
  `CarrierByJobFileId` int(11) NOT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `DateBOCCleared` datetime DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  PRIMARY KEY (`ContainerByCarrierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ContainerByCarrierHistory
CREATE TABLE IF NOT EXISTS `ContainerByCarrierHistory` (
  `ContainerByCarrierHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ContainerByCarrierId` int(11) NOT NULL,
  `ContainerNo` varchar(50) NOT NULL,
  `ContainerSize` varchar(50) NOT NULL,
  `CarrierByJobFileId` int(11) NOT NULL,
  `NoOfCartons` int(11) DEFAULT NULL,
  `TruckerName` varchar(100) NOT NULL,
  `EstDepartureTime` datetime DEFAULT NULL,
  `EstArrivalTime` datetime DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `StartOfStorage` datetime DEFAULT NULL,
  `Lodging` datetime DEFAULT NULL,
  `HaulerOrTruckId` int(11) DEFAULT NULL,
  `TargetDeliveryDate` datetime DEFAULT NULL,
  `GateInAtPort` datetime DEFAULT NULL,
  `GateOutAtPort` datetime DEFAULT NULL,
  `ActualDeliveryAtWarehouse` datetime DEFAULT NULL,
  `StartOfDemorage` datetime DEFAULT NULL,
  `PullOutDateAtPort` datetime DEFAULT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  PRIMARY KEY (`ContainerByCarrierHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Countries
CREATE TABLE IF NOT EXISTS `Countries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL DEFAULT '0',
  `CountryCode` char(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.HaulerOrTruck
CREATE TABLE IF NOT EXISTS `HaulerOrTruck` (
  `HaulerOrTruckId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerOrTruck` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `TIN` varchar(50) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`HaulerOrTruckId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.HistoricalStatus
CREATE TABLE IF NOT EXISTS `HistoricalStatus` (
  `HistoricalStatusId` int(11) NOT NULL,
  `StatusDescription` varchar(100) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `AddedBy_UserId` int(11) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ImageType
CREATE TABLE IF NOT EXISTS `ImageType` (
  `ImageTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeDescription` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ImageTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Image Type (if scanned image or User Profile Image)';

-- Data exporting was unselected.


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
  `RefEntryNo` varchar(50) NOT NULL,
  `ColorSelectivityId` int(11) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo2` varchar(50) DEFAULT NULL,
  `LetterCreditFromBank` varchar(50) DEFAULT NULL,
  `DateSentPreAssessment` datetime DEFAULT NULL,
  `DateFileEntryToBOC` datetime DEFAULT NULL,
  `DateSentFinalAssessment` datetime DEFAULT NULL,
  `DateReceivedNoticeFromClients` datetime DEFAULT NULL,
  `DateReceivedOfBL` datetime DEFAULT NULL,
  `DateReceivedOfOtherDocs` datetime DEFAULT NULL,
  `DateRequestBudgetToGL` datetime DEFAULT NULL,
  `RFPDueDate` datetime DEFAULT NULL,
  `ForwarderWarehouse` varchar(50) DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  PRIMARY KEY (`JobFileId`),
  UNIQUE KEY `JobFileId` (`JobFileNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
  `RefEntryNo` varchar(50) NOT NULL,
  `ColorSelectivityId` int(11) NOT NULL,
  `Registry` varchar(50) DEFAULT NULL,
  `LockedBy_UserId` int(11) DEFAULT NULL,
  `DateCreated` datetime NOT NULL,
  `HouseBillLadingNo` varchar(50) NOT NULL,
  `MasterBillLadingNo` varchar(50) DEFAULT NULL,
  `MasterBillLadingNo2` varchar(50) DEFAULT NULL,
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
  `ForwarderWarehouse` int(11) DEFAULT NULL,
  `FlightNo` varchar(50) DEFAULT NULL,
  `AirCraftNo` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` datetime DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.MonitoringType
CREATE TABLE IF NOT EXISTS `MonitoringType` (
  `MonitoringTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MonitoringTypeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`MonitoringTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Products
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ProductsByContainer
CREATE TABLE IF NOT EXISTS `ProductsByContainer` (
  `ProductsByContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProductsByContainerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.ProductsByContainerHistory
CREATE TABLE IF NOT EXISTS `ProductsByContainerHistory` (
  `ProductsByContainerHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductsByContainerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  `Origin_CountryId` int(11) NOT NULL,
  `Origin_City` varchar(50) DEFAULT NULL,
  `DateUpdated` datetime NOT NULL,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Products_Air
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

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Products_AirHistory
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

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Role
CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `RoleDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.SecretQuestion
CREATE TABLE IF NOT EXISTS `SecretQuestion` (
  `SecretQuestionId` int(11) NOT NULL AUTO_INCREMENT,
  `SecretQuestion` varchar(300) NOT NULL,
  PRIMARY KEY (`SecretQuestionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Secret Question table - for users to use if they forgot their password';

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table FilportTrackingSystem.Status
CREATE TABLE IF NOT EXISTS `Status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsBackground` bit(1) NOT NULL,
  `ColorCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table for Users of the system';

-- Data exporting was unselected.


-- Dumping structure for view FilportTrackingSystem.search_global
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `search_global` (
	`JobFileId` INT(11) NOT NULL,
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


-- Dumping structure for view FilportTrackingSystem.vw_Containers
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_Containers` (
	`JobFileId` INT(11) NOT NULL,
	`ContainerNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerSize` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`NoOfCartons` INT(11) NULL,
	`TruckerName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`EstDepartureTime` DATETIME NULL,
	`EstArrivalTime` DATETIME NULL,
	`ActualArrivalTime` DATETIME NULL,
	`StartOfStorage` DATETIME NULL,
	`Lodging` DATETIME NULL,
	`HaulerOrTruck` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`TargetDeliveryDate` DATETIME NULL,
	`GateInAtPort` DATETIME NULL,
	`GateOutAtPort` DATETIME NULL,
	`ActualDeliveryAtWarehouse` DATETIME NULL,
	`StartOfDemorage` DATETIME NULL,
	`PullOutDateAtPort` DATETIME NULL
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_JobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFile` (
	`JobFileId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`CarrierName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ShipperName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateSentFinalAssessment` DATETIME NULL,
	`PurchaseOrderNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`DateFileEntryToBOC` DATETIME NULL,
	`Registry` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedNoticeFromClients` DATETIME NULL,
	`DateReceivedOfBL` DATETIME NULL,
	`DateReceivedOfOtherDocs` DATETIME NULL,
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`DateRequestBudgetToGL` DATETIME NULL,
	`RFPDueDate` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ColorSelectivityName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`IsBackground` BIT(1) NULL,
	`ColorCode` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci',
	`DatePaid` DATETIME NULL
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_MLAJobFile
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_MLAJobFile` 
) ENGINE=MyISAM;


-- Dumping structure for view FilportTrackingSystem.vw_Products
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_Products` 
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
CREATE TABLE `vw_shipper_vessel` 
) ENGINE=MyISAM;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddCarrierByJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddCarrierByJobFile`(IN `P_JobFileId` VARCHAR(50), IN `P_CarrierId` INT, IN `P_VesselVoyageNo` VARCHAR(50), IN `P_ArrivalTime` DATETIME, IN `P_DischargeTime` DATETIME
, IN `P_UserId` INT)
BEGIN
INSERT INTO CarrierByJobFile(JobFileId,CarrierId,VesselVoyageNo,ArrivalTime,DischargeTime)
VALUES
(P_JobFileId,P_CarrierId,P_VesselVoyageNo,P_ArrivalTime,P_DischargeTime);

SET @lastCarrierByJobFileId = LAST_INSERT_ID();

-- Create History(Audit)
INSERT INTO CarrierByJobFileHistory(CarrierByJobFileId,JobFileId,CarrierId,VesselVoyageNo,ArrivalTime,DischargeTime,DateUpdated,UpdatedBy_UserId)
SELECT CBJF.*, NOW(),P_UserId FROM CarrierByJobFile CBJF WHERE CarrierByJobFileId = @lastCarrierByJobFileId;

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddContainerByCarrier
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddContainerByCarrier`(IN `P_ContainerNo` VARCHAR(50), IN `P_ContainerSize` VARCHAR(50), IN `P_CarrierByJobFileId` INT, IN `P_NoOfCartons` INT, IN `P_TruckerName` VARCHAR(100), IN `P_EstDepartureTime` DATETIME, IN `P_EstArrivalTime` DATETIME, IN `P_ActualArrivalTime` DATETIME, IN `P_StartOfStorage` DATETIME, IN `P_Lodging` DATETIME, IN `P_DateBOCCleared` DATETIME, IN `P_HaulerOrTruckId` INT, IN `P_TargetDeliveryDate` DATETIME, IN `P_GateInAtPort` DATETIME, IN `P_GateOutAtPort` DATETIME, IN `P_ActualDeliveryAtWarehouse` DATETIME, IN `P_StartOfDemorage` DATETIME, IN `P_PullOutDateAtPort` INT
, IN `P_UserId` INT)
BEGIN
INSERT INTO ContainerByCarrier(ContainerNo,ContainerSize,CarrierByJobFileId,NoOfCartons,
TruckerName,EstDepartureTime,EstArrivalTime,ActualArrivalTime,
StartOfStorage,Lodging,DateBOCCleared,HaulerOrTruckId,TargetDeliveryDate,GateInAtPort,
GateOutAtPort,ActualDeliveryAtWarehouse,StartOfDemorage,PullOutDateAtPort
)
VALUES(P_ContainerNo,P_ContainerSize,P_CarrierByJobFileId,P_NoOfCartons,
P_TruckerName,P_EstDepartureTime,
P_EstArrivalTime,P_ActualArrivalTime,P_StartOfStorage,
P_Lodging,P_P_DateBOCCleared,P_HaulerOrTruckId,P_TargetDeliveryDate,
P_GateInAtPort,P_GateOutAtPort,P_ActualDeliveryAtWarehouse,
P_StartOfDemorage,P_PullOutDateAtPort
);


SET @lastCbVId = LAST_INSERT_ID();


-- Create History(Audit)
INSERT INTO ContainerByCarrierHistory(ContainerByCarrierId,ContainerNo,ContainerSize,CarrierByJobFileId,NoOfCartons,
TruckerName,EstDepartureTime,EstArrivalTime,ActualArrivalTime,
StartOfStorage,Lodging,DateBOCCleared,HaulerOrTruckId,TargetDeliveryDate,GateInAtPort,
GateOutAtPort,ActualDeliveryAtWarehouse,StartOfDemorage,PullOutDateAtPort,UpdatedBy_UserId,DateUpdated
)
SELECT CBCH.*, P_UserId, NOW() FROM ContainerByCarrier CBCH WHERE ContainerByCarrierId = @lastCbVId
;

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_AddProducts
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_AddProducts`(IN `P_ProductId` INT, IN `P_ContainerId` INT, IN `P_CarrierByJobFileId` INT, IN `P_Origin_CountryId` INT, IN `P_Origin_City` INT, IN `P_UserId` INT
)
BEGIN

SET @newContainerByVesselId = (SELECT CBC.ContainerByCarrierId FROM ContainerByCarrier CBC WHERE CBC.ContainerNo = P_ContainerId AND CBC.CarrierByJobFileId = P_CarrierByJobFileId limit 1);

INSERT INTO ProductsByContainer(
ProductId,ContainerByCarrierId,
Origin_CountryId,Origin_City
)
values
(
P_ProductId, @newContainerByVesselId,
P_Origin_CountryId, P_Origin_City
);

SET @LastPBCId = LAST_INSERT_ID();
-- Create History(For Audit)

INSERT INTO ProductsByContainerHistory(ProductsByContainerId,
ProductId,ContainerByCarrierId,
Origin_CountryId,Origin_City,
UpdatedBy_UserId,DateUpdated
)
SELECT PBCH.*, P_UserId, NOW() FROM ProductsByContainer PBC WHERE PBC.ProductsByContainerId = @LastPBCId;

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


-- Dumping structure for procedure FilportTrackingSystem.sp_CreateJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_CreateJobFile`(IN `P_JobFileNo` VARCHAR(50), IN `P_ConsigneeId` INT, IN `P_BrokerID` INT, IN `P_ShipperId` INT, IN `P_PurchaseOrderNo` VARCHAR(50), IN `P_MonitoringTypeId` INT, IN `P_StatusId` INT, IN `P_RefEntryNo` VARCHAR(50), IN `P_ColorSelectivityId` INT, IN `P_Registry` INT, IN `P_HouseBillLadingNo` VARCHAR(50), IN `P_MasterBillLadingNo` VARCHAR(50), IN `P_LetterCreditFromBank` VARCHAR(50), IN `P_DateSentPreAssessment` DATETIME, IN `P_DateFileEntryToBOC` DATETIME, IN `P_DateSentFinalAssessment` DATETIME, IN `P_DateReceivedNoticeFromClients` DATETIME, IN `P_DateReceivedOfBL` DATETIME, IN `P_DateReceivedOfOtherDocs` DATETIME, IN `P_DateRequestBudgetToGL` DATETIME, IN `P_RFPDueDate` DATETIME, IN `P_ForwarderWarehouse` VARCHAR(50), IN `P_DatePaid` DATETIME, IN `P_FlightNo` VARCHAR(50), IN `P_AirCraftNo` VARCHAR(50), IN `P_DateReceivedNoticeFromForwarder` VARCHAR(50), IN `P_UserId` INT)
BEGIN
SET @todayDate = NOW();

INSERT INTO JobFile(JobFileNo,ConsigneeId,BrokerId,ShipperId,PurchaseOrderNo,MonitoringTypeId,StatusId,RefEntryNo,ColorSelectivityId,Registry,DateCreated,HouseBillLadingNo,MasterBillLadingNo,
LetterCreditFromBank,DateSentPreAssessment,DateFileEntryToBOC,DateSentFinalAssessment,DateReceivedNoticeFromClients,DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,
ForwarderWarehouse,DatePaid,FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder) 

VALUES
(P_JobFileNo,P_ConsigneeId,P_BrokerId,P_ShipperId,P_PurchaseOrderNo,P_MonitoringTypeId,P_StatusId,P_RefEntryNo,P_ColorSelectivityId,P_Registry,@todayDate,P_HouseBillLadingNo,P_MasterBillLadingNo,P_LetterCreditFromBank,
P_DateSentPreAssessment,P_DateFileEntryToBOC,P_DateSentFinalAssessment,
P_DateReceivedNoticeFromClients,P_DateReceivedOfBL,P_DateReceivedOfOtherDocs,P_DateRequestBudgetToGL,P_RFPDueDate,
P_ForwarderWarehouse,P_DatePaid,P_FlightNo,P_AirCraftNo,P_DateReceivedNoticeFromForwarder);

SET @LastJobFileId = LAST_INSERT_ID();

-- Create History(Audit)
INSERT INTO JobFileHistory(JobFileId,JobFileNo,ConsigneeId,BrokerId,ShipperId,
PurchaseOrderNo,MonitoringTypeId,StatusId,IsLocked,RefEntryNo,ColorSelectivityId,
Registry,LockedBy_UserId,DateCreated,HouseBillLadingNo,MasterBillLadingNo,MasterBillLadingNo2,
LetterCreditFromBank,DateSentPreAssessment,DateFileEntryToBOC,DateSentFinalAssessment,DateReceivedNoticeFromClients,
DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,DatePaid,ForwarderWarehouse,
FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder,DateUpdated,UpdatedBy_UserId
)
SELECT JF.*, @todayDate, P_UserId FROM JobFile `JF` WHERE JobFileId = @LastJobFileId;

end//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_UpdateCarrierByJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_UpdateCarrierByJobFile`(IN P_CarrierByJobFileId INT, IN `P_CarrierId` INT, IN `P_VesselVoyageNo` VARCHAR(50), IN `P_ArrivalTime` DATETIME, IN `P_DischargeTime` DATETIME
, IN `P_UserId` INT)
BEGIN
UPDATE CarrierByJobFile SET 
CarrierId = P_CarrierId, VesselVoyageNo = P_VesselVoyageNo, ArrivalTime = P_ArrivalTime, DischargeTime = P_DischargeTime
WHERE CarrierByJobFileId = P_CarrierByJobFileId;

-- Create History(Audit)
INSERT INTO CarrierByJobFileHistory(CarrierByJobFileId,JobFileId,CarrierId,VesselVoyageNo,ArrivalTime,DischargeTime,DateUpdated,UpdatedBy_UserId)
SELECT CBJF.*, NOW(),P_UserId FROM CarrierByJobFile CBJF WHERE CarrierByJobFileId = P_CarrierByJobFileId;

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_UpdateContainerByCarrier
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_UpdateContainerByCarrier`(IN P_ContainerByCarrierId INT, IN `P_ContainerNo` VARCHAR(50), IN `P_ContainerSize` VARCHAR(50), 
IN `P_CarrierByJobFileId` INT, IN `P_NoOfCartons` INT, IN `P_TruckerName` VARCHAR(100), 
IN `P_EstDepartureTime` DATETIME, IN `P_EstArrivalTime` DATETIME, IN `P_ActualArrivalTime` DATETIME, 
IN `P_StartOfStorage` DATETIME, IN `P_Lodging` DATETIME, IN `P_HaulerOrTruckId` INT, 
IN `P_TargetDeliveryDate` DATETIME, IN `P_GateInAtPort` DATETIME, IN `P_GateOutAtPort` DATETIME, 
IN `P_ActualDeliveryAtWarehouse` DATETIME, IN `P_StartOfDemorage` DATETIME, IN `P_PullOutDateAtPort` INT
, IN `P_UserId` INT)
BEGIN
UPDATE ContainerByCarrier SET ContainerNo= P_ContainerNo, ContainerSize = P_ContainerSize, 
CarrierByJobFileId = P_CarrierByJobFileId, NoOfCartons = P_NoOfCartons, TruckerName = P_TruckerName,
EstDepartureTime = P_EstDepartureTime, EstArrivalTime = P_EstArrivalTime, ActualArrivalTime = P_ActualArrivalTime,
StartOfStorage = P_StartOfStorage, Lodging = P_Lodging, HaulerOrTruckId = P_HaulerOrTruckId, TargetDeliveryDate = P_TargetDeliveryDate,
GateInAtPort = P_GateInAtPort, GateOutAtPort = P_GateOutAtPort, ActualDeliveryAtWarehouse = P_ActualDeliveryAtWarehouse,
StartOfDemorage = P_StartOfDemorage, PullOutDateAtPort = P_PullOutDateAtPort
WHERE ContainerByCarrierId = P_ContainerByCarrierId;

-- Create History(Audit)
INSERT INTO ContainerByCarrierHistory(ContainerByCarrierId,ContainerNo,ContainerSize,CarrierByJobFileId,NoOfCartons,
TruckerName,EstDepartureTime,EstArrivalTime,ActualArrivalTime,
StartOfStorage,Lodging,HaulerOrTruckId,TargetDeliveryDate,GateInAtPort,
GateOutAtPort,ActualDeliveryAtWarehouse,StartOfDemorage,PullOutDateAtPort,UpdatedBy_UserId,DateUpdated
)
SELECT CBCH.*, P_UserId, NOW() FROM ContainerByCarrier CBCH WHERE ContainerByCarrierId = P_ContainerByCarrierId;
END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_UpdateJobFile
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_UpdateJobFile`(IN `P_JobFileId` INT,
IN `P_JobFileNo` VARCHAR(50), IN `P_ConsigneeId` INT, 
IN `P_BrokerID` INT, IN `P_ShipperId` INT, 
IN `P_PurchaseOrderNo` VARCHAR(50), IN `P_StatusId` INT, IN `P_RefEntryNo` VARCHAR(50), 
IN `P_ColorSelectivityId` INT, IN `P_Registry` INT, IN `P_HouseBillLadingNo` VARCHAR(50), 
IN `P_MasterBillLadingNo` VARCHAR(50), IN `P_MasterBillLadingNo2` VARCHAR(50), IN `P_LetterCreditFromBank` VARCHAR(50), 
IN `P_DateSentPreAssessment` DATETIME, IN `P_DateFileEntryToBOC` DATETIME, 
IN `P_DateSentFinalAssessment` DATETIME, IN `P_DateReceivedNoticeFromClients` DATETIME, 
IN `P_DateReceivedOfBL` DATETIME, IN `P_DateReceivedOfOtherDocs` DATETIME, 
IN `P_DateRequestBudgetToGL` DATETIME, IN `P_RFPDueDate` DATETIME, 
IN `P_ForwarderWarehouse` VARCHAR(50), IN `P_DatePaid` DATETIME, 
IN `P_FlightNo` VARCHAR(50), IN `P_AirCraftNo` VARCHAR(50), 
IN `P_DateReceivedNoticeFromForwarder` VARCHAR(50), IN `P_UserId` INT)
BEGIN
UPDATE JobFile SET 
JobFileNo = P_JobFileNo, ConsigneeId = P_ConsigneId, 
BrokerId = P_BrokerId, ShiperId = P_ShipperId,
PurchaseOrderNo = P_PurchaseOrderNo, StatusId = P_StatusId,
RefEntryNo = P_RefEntryNo, ColorSelectivityId = P_ColorSelectivityId,
Registry = P_Registry, HouseBillLadingNo = P_HouseBillLadingNo,
MasterBillLadingNo = P_MasterBillLadingNo, MasterBillLadingNo2 = P_MasterBillLadingNo2,
LetterCreditFromBank = P_LetterCreditFromBank, DateSentPreAssessment = P_DateSentPreAssessment,
DateFileEntryToBOC = P_DateFileEntryToBOC, DateSentFinalAssessment = P_DateSentFinalAssessment,
DateReceivedNoticeFromClients = P_DateReceivedNoticeFromClients, DateReceivedOfBL = P_DateReceivedOfBL,
DateReceivedOfOtherDocs = P_DateReceivedOfOtherDocs, DateRequestBudgetToGL = P_DateRequestBudgetToGL,
RFPDueDate = P_RFPDueDate, ForwarderWarehouse = P_ForwarderWarehouse, DatePaid = P_DatePaid, FlightNo = P_DatePaid,
AirCraftNo = P_AirCraftNo, DateReceivedNoticeFromForwarder = P_DateReceivedNoticeFromForwarder
WHERE JobFileId = P_JobFileId;


-- Create History(Audit)

INSERT INTO JobFileHistory(JobFileId,JobFileNo,ConsigneeId,BrokerId,ShipperId,
PurchaseOrderNo,MonitoringTypeId,StatusId,IsLocked,RefEntryNo,ColorSelectivityId,
Registry,LockedBy_UserId,DateCreated,HouseBillLadingNo,MasterBillLadingNo,MasterBillLadingNo2,
LetterCreditFromBank,DateSentPreAssessment,DateFileEntryToBOC,DateSentFinalAssessment,DateReceivedNoticeFromClients,
DateReceivedOfBL,DateReceivedOfOtherDocs,DateRequestBudgetToGL,RFPDueDate,DatePaid,ForwarderWarehouse,
FlightNo,AirCraftNo,DateReceivedNoticeFromForwarder,DateUpdated,UpdatedBy_UserId
)
SELECT JF.*, @todayDate, P_UserId FROM JobFile `JF` WHERE JobFileId = P_JobFileId;

END//
DELIMITER ;


-- Dumping structure for procedure FilportTrackingSystem.sp_UpdateProducts
DELIMITER //
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` PROCEDURE `sp_UpdateProducts`( IN P_ProductsByContainerId INT,
IN `P_ProductId` INT, IN `P_ContainerId` INT, 
IN `P_CarrierByJobFileId` INT, IN `P_Origin_CountryId` INT, 
IN `P_Origin_City` INT, IN `P_UserId` INT
)
BEGIN
UPDATE Products SET
 ProductId = P_ProductId, ContainerByCarrierId = P_ContainerByCarrierId, 
Origin_CountryId = P_Origin_CountryId, Origin_City = P_Origin_City
 WHERE ProductsByContainerId - P_ProductsByContainerId;
 
 
-- Create History(For Audit)

INSERT INTO ProductsByContainerHistory(ProductsByContainerId,
ProductId,ContainerByCarrierId,
Origin_CountryId,Origin_City,
UpdatedBy_UserId,DateUpdated
)
SELECT PBCH.*, P_UserId, NOW() FROM ProductsByContainer PBC WHERE PBC.ProductsByContainerId = P_ProductsByContainerId;
 
END//
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


-- Dumping structure for view FilportTrackingSystem.vw_Containers
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Containers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_Containers` AS select `JF`.`JobFileId` AS `JobFileId`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerSize` AS `ContainerSize`,`CBC`.`NoOfCartons` AS `NoOfCartons`,`CBC`.`TruckerName` AS `TruckerName`,`CBC`.`EstDepartureTime` AS `EstDepartureTime`,`CBC`.`EstArrivalTime` AS `EstArrivalTime`,`CBC`.`ActualArrivalTime` AS `ActualArrivalTime`,`CBC`.`StartOfStorage` AS `StartOfStorage`,`CBC`.`Lodging` AS `Lodging`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck`,`CBC`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`CBC`.`GateInAtPort` AS `GateInAtPort`,`CBC`.`GateOutAtPort` AS `GateOutAtPort`,`CBC`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`CBC`.`StartOfDemorage` AS `StartOfDemorage`,`CBC`.`PullOutDateAtPort` AS `PullOutDateAtPort` from (((`JobFile` `JF` left join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) left join `ContainerByCarrier` `CBC` on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) left join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `CBC`.`HaulerOrTruckId`)));


-- Dumping structure for view FilportTrackingSystem.vw_JobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`CR`.`CarrierName` AS `CarrierName`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`JF`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`JF`.`Registry` AS `Registry`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`JF`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`JF`.`RefEntryNo` AS `RefEntryNo`,`CS`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode`,`JF`.`DatePaid` AS `DatePaid` from (((((((`JobFile` `JF` left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) left join `Carrier` `CR` on((`CR`.`CarrierId` = `CBJ`.`CarrierId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `JF`.`ShipperId`))) left join `ColorSelectivity` `CS` on((`CS`.`ColorSelectivityId` = `JF`.`ColorSelectivityId`)));


-- Dumping structure for view FilportTrackingSystem.vw_MLAJobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_MLAJobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_MLAJobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`CBV`.`NoOfCartons` AS `NoOfCartons`,`CBV`.`ContainerSize` AS `ContainerSize`,`P`.`ProductName` AS `ProductName`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`CBV`.`ContainerNo` AS `ContainerNo`,concat(`O_CT`.`CountryName`,`P`.`Origin_City`) AS `Origin`,`CBV`.`EstDepartureTime` AS `EstDepartureTime`,`CBV`.`EstArrivalTime` AS `EstArrivalTime`,`CBV`.`ActualArrivalTime` AS `ActualArrivalTime`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`CBV`.`StartOfDemorage` AS `StartOfDemorage`,`CBV`.`StartOfStorage` AS `StartOfStorage`,`JF`.`Registry` AS `Registry`,concat(`SV`.`Vesselname`,'-',`SV`.`VesselNo`) AS `VSL_NO`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`JF`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`JF`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`JF`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`JF`.`RefEntryNo` AS `RefEntryNo`,`ST`.`StatusName` AS `StatusName`,`JF`.`DatePaid` AS `DatePaid`,`P`.`DateBOCCLeared` AS `DateBOCCleared`,`CBV`.`TargetDeliveryDate` AS `TargetDeliveryDate`,concat(`CBV`.`TruckerPlateNo`,' ',`CBV`.`TruckerName`) AS `PlateNo_Trucker`,`CBV`.`GateInAtPort` AS `GateInAtPort`,`CBV`.`GateOutAtPort` AS `GateOutAtPort`,`CBV`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`HST`.`HistoricalStatusId` AS `HistoricalStatusId`,`MT`.`MonitoringTypeId` AS `MonitoringTypeId`,`P`.`ContainerByVesselId` AS `ContainerByVesselId`,`CBV`.`VesselByJobFileId` AS `VesselByJobFileId` from (((((((((((`JobFile` `JF` left join `VesselByJobFile` `VBJF` on((`JF`.`JobFileId` = `VBJF`.`JobFileId`))) left join `ShipperVessel` `SV` on((`SV`.`ShipperVesselId` = `VBJF`.`ShipperVesselId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `SV`.`ShipperId`))) left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `ContainerByVessel` `CBV` on((`CBV`.`VesselByJobFileId` = `VBJF`.`VesselByJobFileId`))) left join `Products` `P` on((`P`.`ContainerByVesselId` = `CBV`.`ContainerByVesselId`))) left join `Countries` `O_CT` on((`P`.`Origin_CountryId` = `O_CT`.`CountryId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `HistoricalStatus` `HST` on((`HST`.`ProductId` = `P`.`ProductId`))) left join `MonitoringType` `MT` on((`MT`.`MonitoringTypeId` = `JF`.`MonitoringTypeId`))) where (`JF`.`MonitoringTypeId` in (1,2));


-- Dumping structure for view FilportTrackingSystem.vw_Products
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Products`;
CREATE DEFINER=`FilportAdmin`@`%.%.%.%` VIEW `vw_Products` AS select `JF`.`JobFileId` AS `JobFileId`,`P`.`ProductName` AS `ProductName`,concat(`CT`.`CountryName`,`PBC`.`Origin_City`) AS `ORIGIN`,`PBC`.`DateBOCCLeared` AS `DateBOCCLeared`,`CBC`.`ContainerNo` AS `ContainerNo` from (((((`FilportTrackingSystem`.`JobFile` `JF` left join `FilportTrackingSystem`.`CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) left join `FilportTrackingSystem`.`ContainerByCarrier` `CBC` on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) left join `FilportTrackingSystem`.`ProductsByContainer` `PBC` on((`PBC`.`ContainerByCarrierId` = `CBC`.`ContainerByCarrierId`))) left join `FilportTrackingSystem`.`Products` `P` on((`P`.`ProductId` = `PBC`.`ProductId`))) join `FilportTrackingSystem`.`Countries` `CT` on((`CT`.`CountryId` = `PBC`.`Origin_CountryId`))) ;


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
