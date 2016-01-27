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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Carrier
CREATE TABLE IF NOT EXISTS `Carrier` (
  `CarrierId` int(11) NOT NULL AUTO_INCREMENT,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CarrierName` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `OfficeNo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`CarrierId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='From ShipperVessel to Carrier';

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.CarrierByJobFile
CREATE TABLE IF NOT EXISTS `CarrierByJobFile` (
  `CarrierByJobFileId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) DEFAULT NULL,
  `BerthingTime` datetime DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` date DEFAULT NULL,
  `EstArrivalTime` date DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  PRIMARY KEY (`CarrierByJobFileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='From ShipperByVessel to CarrierByJobFile';

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.CarrierByJobFileHistory
CREATE TABLE IF NOT EXISTS `CarrierByJobFileHistory` (
  `CarrierByJobFileHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierByJobFileId` int(11) NOT NULL,
  `JobFileId` varchar(50) NOT NULL DEFAULT '0',
  `CarrierId` int(11) NOT NULL,
  `VesselVoyageNo` varchar(50) NOT NULL,
  `BerthingTime` datetime DEFAULT NULL,
  `DischargeTime` datetime DEFAULT NULL,
  `EstDepartureTime` date DEFAULT NULL,
  `EstArrivalTime` date DEFAULT NULL,
  `ActualArrivalTime` datetime DEFAULT NULL,
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`CarrierByJobFileHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.ColorSelectivity
CREATE TABLE IF NOT EXISTS `ColorSelectivity` (
  `ColorSelectivityId` int(11) NOT NULL AUTO_INCREMENT,
  `ColorSelectivityName` varchar(50) NOT NULL,
  PRIMARY KEY (`ColorSelectivityId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Consignee is also similar to Clients';

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ContainerByCarrierHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Countries
CREATE TABLE IF NOT EXISTS `Countries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(50) NOT NULL DEFAULT '0',
  `CountryCode` char(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CountryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.HaulerOrTruck
CREATE TABLE IF NOT EXISTS `HaulerOrTruck` (
  `HaulerOrTruckId` int(11) NOT NULL AUTO_INCREMENT,
  `HaulerOrTruck` varchar(50) NOT NULL,
  `IsActive` bit(1) DEFAULT NULL,
  `TIN` varchar(50) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`HaulerOrTruckId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.HistoricalStatus
CREATE TABLE IF NOT EXISTS `HistoricalStatus` (
  `HistoricalStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(300) DEFAULT NULL,
  `JobFileId` int(11) DEFAULT NULL,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoricalStatusId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.HistoricalStatus_Air
CREATE TABLE IF NOT EXISTS `HistoricalStatus_Air` (
  `HistoricalStatus_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(300) DEFAULT NULL,
  `JobFile_AirId` int(11) DEFAULT NULL,
  `DateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AddedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`HistoricalStatus_AirId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


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

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.ImageType
CREATE TABLE IF NOT EXISTS `ImageType` (
  `ImageTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageTypeDescription` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ImageTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Image Type (if scanned image or User Profile Image)';

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
  `DateReceivedArrivalNoticeFromALine` date DEFAULT NULL,
  `DateReceivedNoticeFromClients` date DEFAULT NULL,
  `DateReceivedOfBL` date DEFAULT NULL,
  `DateReceivedOfOtherDocs` date DEFAULT NULL,
  `DateRequestBudgetToGL` date DEFAULT NULL,
  `RFPDueDate` date DEFAULT NULL,
  `Forwarder` varchar(50) DEFAULT NULL,
  `Warehouse` varchar(50) DEFAULT NULL,
  `DateReceivedNoticeFromForwarder` date DEFAULT NULL,
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`JobFileHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.JobFile_Air
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.JobFile_AirHistory
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.MonitoringType
CREATE TABLE IF NOT EXISTS `MonitoringType` (
  `MonitoringTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MonitoringTypeName` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`MonitoringTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Products
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.ProductsByContainer
CREATE TABLE IF NOT EXISTS `ProductsByContainer` (
  `ProductsByContainerId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.ProductsByContainerHistory
CREATE TABLE IF NOT EXISTS `ProductsByContainerHistory` (
  `ProductsByContainerHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductsByContainerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ContainerByCarrierId` int(11) NOT NULL,
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductsByContainerHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Products_Air
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Products_AirHistory
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Role
CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `RoleDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.RoleAccess
CREATE TABLE IF NOT EXISTS `RoleAccess` (
  `RoleAccessId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleId` int(11) NOT NULL,
  PRIMARY KEY (`RoleAccessId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
  `BPIInspection` decimal(10,2) DEFAULT NULL,
  `PlugInForReefer` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`RunnningChargesId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
  `BPIInspection` decimal(10,2) DEFAULT NULL,
  `PlugInForReefer` decimal(10,2) DEFAULT NULL,
  `DateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) NOT NULL,
  PRIMARY KEY (`RunningChargesHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.RunningCharges_Air
CREATE TABLE IF NOT EXISTS `RunningCharges_Air` (
  `RunnningCharges_AirId` int(11) NOT NULL AUTO_INCREMENT,
  `JobFile_AirId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `BreakBulkFee` decimal(10,2) DEFAULT NULL,
  `StorageFee` decimal(10,2) DEFAULT NULL,
  `BadCargoOrderFee` decimal(10,2) DEFAULT NULL,
  `VCRC` decimal(10,2) DEFAULT NULL,
  `CNI` decimal(10,2) DEFAULT NULL,
  `CNIU` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`RunnningCharges_AirId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.RunningCharges_AirHistory
CREATE TABLE IF NOT EXISTS `RunningCharges_AirHistory` (
  `RunningCharges_AirHistoryId` int(11) NOT NULL AUTO_INCREMENT,
  `RunnningCharges_AirId` int(11) NOT NULL,
  `JobFile_AirId` varchar(50) NOT NULL,
  `LodgementFee` decimal(10,2) DEFAULT NULL,
  `BreakBulkFee` decimal(10,2) DEFAULT NULL,
  `StorageFee` decimal(10,2) DEFAULT NULL,
  `BadCargoOrderFee` decimal(10,2) DEFAULT NULL,
  `VCRC` decimal(10,2) DEFAULT NULL,
  `CNI` decimal(10,2) DEFAULT NULL,
  `CNIU` decimal(10,2) DEFAULT NULL,
  `DateUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy_UserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`RunningCharges_AirHistoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.SecretQuestion
CREATE TABLE IF NOT EXISTS `SecretQuestion` (
  `SecretQuestionId` int(11) NOT NULL AUTO_INCREMENT,
  `SecretQuestion` varchar(300) NOT NULL,
  PRIMARY KEY (`SecretQuestionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Secret Question table - for users to use if they forgot their password';

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table dev_FilportTrackingSystem.Status
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Table for Users of the system';

-- Data exporting was unselected.


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
	`EstDepartureTime` DATE NULL,
	`EstArrivalTime` DATE NULL,
	`ActualArrivalTime` DATETIME NULL,
	`BerthingTime` DATETIME NULL,
	`CarrierByJobFileId` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_CarrierByJobFileHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_CarrierByJobFileHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`CarrierName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`VesselVoyageNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`DischargeTime` DATETIME NULL,
	`EstDepartureTime` DATE NULL,
	`EstArrivalTime` DATE NULL,
	`ActualArrivalTime` DATETIME NULL,
	`BerthingTime` DATETIME NULL,
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
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateFileEntryToBOC` DATETIME NULL,
	`DateBOCCleared` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`DatePaid` DATETIME NULL,
	`DateSentFinalAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ContainerByCarrierId` INT(11) NOT NULL,
	`ContainerSize` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`NoOfCartons` INT(11) NULL,
	`TruckerName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`StartOfStorage` DATETIME NULL,
	`Lodging` DATETIME NULL,
	`HaulerOrTruck` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`TargetDeliveryDate` DATETIME NULL,
	`GateInAtPort` DATETIME NULL,
	`GateOutAtPort` DATETIME NULL,
	`ActualDeliveryAtWarehouse` DATETIME NULL,
	`StartOfDemorage` DATETIME NULL,
	`PullOutDateAtPort` DATETIME NULL,
	`VesselVoyageNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`CarrierByJobFileId` INT(11) NULL,
	`DateReceivedAtWhse` DATETIME NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_ContainersHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_ContainersHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateFileEntryToBOC` DATETIME NULL,
	`DateBOCCleared` DATETIME NULL,
	`DateSentPreAssessment` DATETIME NULL,
	`DatePaid` DATETIME NULL,
	`DateSentFinalAssessment` DATETIME NULL,
	`RefEntryNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ContainerByCarrierId` INT(11) NOT NULL,
	`ContainerSize` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`NoOfCartons` INT(11) NULL,
	`TruckerName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`StartOfStorage` DATETIME NULL,
	`Lodging` DATETIME NULL,
	`HaulerOrTruck` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`TargetDeliveryDate` DATETIME NULL,
	`GateInAtPort` DATETIME NULL,
	`GateOutAtPort` DATETIME NULL,
	`ActualDeliveryAtWarehouse` DATETIME NULL,
	`StartOfDemorage` DATETIME NULL,
	`PullOutDateAtPort` DATETIME NULL,
	`VesselVoyageNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`CarrierByJobFileId` INT(11) NULL,
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
	`DateReceivedArrivalNoticeFromALine` DATE NULL,
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
	`Origin` VARCHAR(101) NULL COLLATE 'latin1_swedish_ci',
	`Forwarder` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Warehouse` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileAir
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFileAir` (
	`JobFile_AirId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperId` INT(11) NOT NULL,
	`ConsigneeId` INT(11) NOT NULL,
	`NoOfCartons` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`PurchaseOrderNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditNoFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Origin_CountryId` INT(11) NULL,
	`OriginCity` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ETD` DATE NULL,
	`ETA` DATE NULL,
	`ATA` DATETIME NULL,
	`FlightNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Aircraft` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Forwarder` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Warehouse` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedArrivalFromALine` DATE NULL,
	`DateReceivedArrivalFromClient` DATE NULL,
	`DatePickUpHawb` DATE NULL,
	`DatePickUpOtherDocs` DATE NULL,
	`BrokerId` INT(11) NULL,
	`DateRequestBudgetToGL` DATE NULL,
	`RFPDueDate` DATE NULL,
	`ColorSelectivityId` INT(11) NULL,
	`IsLocked` BIT(1) NULL,
	`LockedBy_UserId` INT(11) NULL,
	`StatusId` INT(11) NULL,
	`ShipperName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ORIGIN` VARCHAR(101) NULL COLLATE 'latin1_swedish_ci',
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`ColorSelectivityName` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`IsBackground` BIT(1) NULL,
	`ColorCode` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileAirHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFileAirHistory` (
	`DateUpdated` TIMESTAMP NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFile_AirId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperId` INT(11) NOT NULL,
	`ConsigneeId` INT(11) NOT NULL,
	`NoOfCartons` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`PurchaseOrderNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditNoFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Origin_CountryId` INT(11) NULL,
	`OriginCity` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ETD` DATETIME NULL,
	`ETA` DATETIME NULL,
	`ATA` DATETIME NULL,
	`FlightNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Aircraft` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Forwarder` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Warehouse` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedArrivalFromALine` DATE NULL,
	`DateReceivedArrivalFromClient` DATE NULL,
	`DatePickUpHawb` DATE NULL,
	`DatePickUpOtherDocs` DATE NULL,
	`BrokerId` INT(11) NULL,
	`DateRequestBudgetToGL` DATE NULL,
	`RFPDueDate` DATE NULL,
	`ColorSelectivityId` INT(11) NULL,
	`IsLocked` BIT(1) NULL,
	`LockedBy_UserId` INT(11) NULL,
	`StatusId` INT(11) NULL,
	`ShipperName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`ORIGIN` VARCHAR(101) NULL COLLATE 'latin1_swedish_ci',
	`Broker` VARCHAR(302) NULL COLLATE 'latin1_swedish_ci',
	`ColorSelectivityName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`StatusName` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`IsBackground` BIT(1) NOT NULL,
	`ColorCode` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_JobFileHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFileId` INT(11) NOT NULL,
	`MonitoringTypeId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ShipperName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`ConsigneeName` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`HouseBillLadingNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`MasterBillLadingNo2` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`LetterCreditFromBank` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`DateReceivedArrivalNoticeFromALine` DATE NULL,
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
	`Origin` VARCHAR(101) NOT NULL COLLATE 'latin1_swedish_ci',
	`Forwarder` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Warehouse` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_Products
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_Products` (
	`JobFileId` INT(11) NOT NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ProductName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ProductId` INT(11) NOT NULL,
	`ProductsByContainerId` INT(11) NOT NULL,
	`ContainerNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ContainerByCarrierId` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsAir
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_ProductsAir` (
	`Products_AirId` INT(11) NOT NULL,
	`ProductId` INT(11) NOT NULL,
	`ProductName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFile_AirId` INT(11) NOT NULL,
	`RefEntryNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`GrossWeight` DECIMAL(10,2) NULL,
	`DateSentFinalAssessment` DATE NULL,
	`DatePaid` DATETIME NULL,
	`DateSentPreAssessment` DATE NULL,
	`DateBOCCleared` DATE NULL,
	`TargetDeliveryDate` DATE NULL,
	`ActualPullOutDateAtNAIA` DATE NULL,
	`DateReceivedAtWhse` DATE NULL,
	`HaulerOrTruckId` INT(11) NULL,
	`TotalStorage` DECIMAL(10,2) NULL,
	`AdtlPerDayncludeVat` DECIMAL(10,2) NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`HaulerOrTruck` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsAirHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_ProductsAirHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`Products_AirId` INT(11) NOT NULL,
	`ProductId` INT(11) NOT NULL,
	`ProductName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFile_AirId` INT(11) NOT NULL,
	`RefEntryNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`GrossWeight` DECIMAL(10,2) NULL,
	`DateSentFinalAssessment` DATE NULL,
	`DatePaid` DATETIME NULL,
	`DateSentPreAssessment` DATE NULL,
	`DateBOCCleared` DATE NULL,
	`TargetDeliveryDate` DATE NULL,
	`ActualPullOutDateAtNAIA` DATE NULL,
	`DateReceivedAtWhse` DATE NULL,
	`HaulerOrTruckId` INT(11) NULL,
	`TotalStorage` DECIMAL(10,2) NULL,
	`AdtlPerDayncludeVat` DECIMAL(10,2) NULL,
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`HaulerOrTruck` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_ProductsHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFileId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ProductName` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`ProductId` INT(11) NOT NULL,
	`ProductsByContainerId` INT(11) NOT NULL,
	`ContainerNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ContainerByCarrierId` INT(11) NULL
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


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningChargesAirHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_RunningChargesAirHistory` (
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
	`JobFileNo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`RunningCharges_AirHistoryId` INT(11) NOT NULL,
	`RunnningCharges_AirId` INT(11) NOT NULL,
	`JobFile_AirId` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`LodgementFee` DECIMAL(10,2) NULL,
	`BreakBulkFee` DECIMAL(10,2) NULL,
	`StorageFee` DECIMAL(10,2) NULL,
	`BadCargoOrderFee` DECIMAL(10,2) NULL,
	`VCRC` DECIMAL(10,2) NULL,
	`CNI` DECIMAL(10,2) NULL,
	`CNIU` DECIMAL(10,2) NULL,
	`DateUpdated` TIMESTAMP NULL,
	`UpdatedBy_UserId` INT(11) NULL
) ENGINE=MyISAM;


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningChargesHistory
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_RunningChargesHistory` (
	`DateUpdated` TIMESTAMP NOT NULL,
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci',
	`Full_Name` VARCHAR(201) NOT NULL COLLATE 'latin1_swedish_ci',
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


-- Dumping structure for view dev_FilportTrackingSystem.vw_StatusReportsAir
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_StatusReportsAir` (
	`HistoricalStatus_AirId` INT(11) NOT NULL,
	`StatusDescription` VARCHAR(300) NULL COLLATE 'latin1_swedish_ci',
	`JobFile_AirId` INT(11) NULL,
	`DateAdded` TIMESTAMP NULL,
	`AddedBy_UserId` INT(11) NULL,
	`JobFileNo` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`UserName` VARCHAR(30) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


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
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_CarrierByJobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`C`.`CarrierName` AS `CarrierName`,`CBJF`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJF`.`DischargeTime` AS `DischargeTime`,`CBJF`.`EstDepartureTime` AS `EstDepartureTime`,`CBJF`.`EstArrivalTime` AS `EstArrivalTime`,`CBJF`.`ActualArrivalTime` AS `ActualArrivalTime`,`CBJF`.`BerthingTime` AS `BerthingTime`,`CBJF`.`CarrierByJobFileId` AS `CarrierByJobFileId` from ((`CarrierByJobFile` `CBJF` left join `JobFile` `JF` on((`JF`.`JobFileId` = `CBJF`.`JobFileId`))) left join `Carrier` `C` on((`C`.`CarrierId` = `CBJF`.`CarrierId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_CarrierByJobFileHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_CarrierByJobFileHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`121.%.%.%` SQL SECURITY DEFINER VIEW `vw_CarrierByJobFileHistory` AS select `CBJF`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`C`.`CarrierName` AS `CarrierName`,`CBJF`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJF`.`DischargeTime` AS `DischargeTime`,`CBJF`.`EstDepartureTime` AS `EstDepartureTime`,`CBJF`.`EstArrivalTime` AS `EstArrivalTime`,`CBJF`.`ActualArrivalTime` AS `ActualArrivalTime`,`CBJF`.`BerthingTime` AS `BerthingTime`,`CBJF`.`CarrierByJobFileId` AS `CarrierByJobFileId` from (((`CarrierByJobFileHistory` `CBJF` left join `JobFile` `JF` on((`JF`.`JobFileId` = `CBJF`.`JobFileId`))) left join `Carrier` `C` on((`C`.`CarrierId` = `CBJF`.`CarrierId`))) join `User` `U` on((`U`.`UserId` = `CBJF`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_consignee_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_consignee_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_consignee_full_info` AS select `Consignee`.`ConsigneeId` AS `ConsigneeId`,`Consignee`.`ConsigneeName` AS `ConsigneeName`,`Consignee`.`HouseBuildingNoOrStreet` AS `HouseBuildingNoOrStreet`,`Consignee`.`BarangayOrVillage` AS `BarangayOrVillage`,`Consignee`.`TownOrCityProvince` AS `TownOrCityProvince`,`Consignee`.`CountryId` AS `CountryId`,`Consignee`.`OfficeNumber` AS `OfficeNumber`,`Consignee`.`DateAdded` AS `DateAdded`,`Consignee`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Consignee`.`CountryId`)) AS `Country` from `Consignee`;


-- Dumping structure for view dev_FilportTrackingSystem.vw_Containers
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Containers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_Containers` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`CBC`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`CBC`.`DateBOCCleared` AS `DateBOCCleared`,`CBC`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`CBC`.`DatePaid` AS `DatePaid`,`CBC`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`CBC`.`RefEntryNo` AS `RefEntryNo`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerByCarrierId` AS `ContainerByCarrierId`,`CBC`.`ContainerSize` AS `ContainerSize`,`CBC`.`NoOfCartons` AS `NoOfCartons`,`CBC`.`TruckerName` AS `TruckerName`,`CBC`.`StartOfStorage` AS `StartOfStorage`,`CBC`.`Lodging` AS `Lodging`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck`,`CBC`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`CBC`.`GateInAtPort` AS `GateInAtPort`,`CBC`.`GateOutAtPort` AS `GateOutAtPort`,`CBC`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`CBC`.`StartOfDemorage` AS `StartOfDemorage`,`CBC`.`PullOutDateAtPort` AS `PullOutDateAtPort`,`CBJ`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJ`.`CarrierByJobFileId` AS `CarrierByJobFileId`,`CBC`.`DateReceivedAtWhse` AS `DateReceivedAtWhse` from ((`ContainerByCarrier` `CBC` left join (`JobFile` `JF` join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) left join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `CBC`.`HaulerOrTruckId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_ContainersHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_ContainersHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_ContainersHistory` AS select `CBC`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`CBC`.`DateFileEntryToBOC` AS `DateFileEntryToBOC`,`CBC`.`DateBOCCleared` AS `DateBOCCleared`,`CBC`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`CBC`.`DatePaid` AS `DatePaid`,`CBC`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`CBC`.`RefEntryNo` AS `RefEntryNo`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerByCarrierId` AS `ContainerByCarrierId`,`CBC`.`ContainerSize` AS `ContainerSize`,`CBC`.`NoOfCartons` AS `NoOfCartons`,`CBC`.`TruckerName` AS `TruckerName`,`CBC`.`StartOfStorage` AS `StartOfStorage`,`CBC`.`Lodging` AS `Lodging`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck`,`CBC`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`CBC`.`GateInAtPort` AS `GateInAtPort`,`CBC`.`GateOutAtPort` AS `GateOutAtPort`,`CBC`.`ActualDeliveryAtWarehouse` AS `ActualDeliveryAtWarehouse`,`CBC`.`StartOfDemorage` AS `StartOfDemorage`,`CBC`.`PullOutDateAtPort` AS `PullOutDateAtPort`,`CBJ`.`VesselVoyageNo` AS `VesselVoyageNo`,`CBJ`.`CarrierByJobFileId` AS `CarrierByJobFileId`,`CBC`.`DateReceivedAtWhse` AS `DateReceivedAtWhse` from (((`ContainerByCarrierHistory` `CBC` left join (`JobFile` `JF` join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) left join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `CBC`.`HaulerOrTruckId`))) join `User` `U` on((`U`.`UserId` = `CBC`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFile
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFile` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`MonitoringTypeId` AS `MonitoringTypeId`,`JF`.`JobFileNo` AS `JobFileNo`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JF`.`MasterBillLadingNo2` AS `MasterBillLadingNo2`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`JF`.`DateReceivedArrivalNoticeFromALine` AS `DateReceivedArrivalNoticeFromALine`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`Registry` AS `Registry`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`CS`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode`,concat(`CT`.`CountryName`,' ',`JF`.`OriginCity`) AS `Origin`,`JF`.`Forwarder` AS `Forwarder`,`JF`.`Warehouse` AS `Warehouse` from ((((((`JobFile` `JF` left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `JF`.`ShipperId`))) left join `ColorSelectivity` `CS` on((`CS`.`ColorSelectivityId` = `JF`.`ColorSelectivityId`))) join `Countries` `CT` on((`CT`.`CountryId` = `JF`.`Origin_CountryId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileAir
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFileAir`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`49.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFileAir` AS select `JFA`.`JobFile_AirId` AS `JobFile_AirId`,`JFA`.`JobFileNo` AS `JobFileNo`,`JFA`.`ShipperId` AS `ShipperId`,`JFA`.`ConsigneeId` AS `ConsigneeId`,`JFA`.`NoOfCartons` AS `NoOfCartons`,`JFA`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JFA`.`LetterCreditNoFromBank` AS `LetterCreditNoFromBank`,`JFA`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JFA`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JFA`.`Origin_CountryId` AS `Origin_CountryId`,`JFA`.`OriginCity` AS `OriginCity`,`JFA`.`ETD` AS `ETD`,`JFA`.`ETA` AS `ETA`,`JFA`.`ATA` AS `ATA`,`JFA`.`FlightNo` AS `FlightNo`,`JFA`.`Aircraft` AS `Aircraft`,`JFA`.`Forwarder` AS `Forwarder`,`JFA`.`Warehouse` AS `Warehouse`,`JFA`.`DateReceivedArrivalFromALine` AS `DateReceivedArrivalFromALine`,`JFA`.`DateReceivedArrivalFromClient` AS `DateReceivedArrivalFromClient`,`JFA`.`DatePickUpHawb` AS `DatePickUpHawb`,`JFA`.`DatePickUpOtherDocs` AS `DatePickUpOtherDocs`,`JFA`.`BrokerId` AS `BrokerId`,`JFA`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JFA`.`RFPDueDate` AS `RFPDueDate`,`JFA`.`ColorSelectivityId` AS `ColorSelectivityId`,`JFA`.`IsLocked` AS `IsLocked`,`JFA`.`LockedBy_UserId` AS `LockedBy_UserId`,`JFA`.`StatusId` AS `StatusId`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,concat(`CT`.`CountryName`,' ',`JFA`.`OriginCity`) AS `ORIGIN`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`CST`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode` from ((((((`JobFile_Air` `JFA` join `Shipper` `S` on((`S`.`ShipperId` = `JFA`.`ShipperId`))) join `Consignee` `C` on((`C`.`ConsigneeId` = `JFA`.`ConsigneeId`))) join `Countries` `CT` on((`CT`.`CountryId` = `JFA`.`Origin_CountryId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JFA`.`BrokerId`))) left join `ColorSelectivity` `CST` on((`CST`.`ColorSelectivityId` = `JFA`.`ColorSelectivityId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JFA`.`StatusId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileAirHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFileAirHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`121.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFileAirHistory` AS select `JFA`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JFA`.`JobFile_AirId` AS `JobFile_AirId`,`JFA`.`JobFileNo` AS `JobFileNo`,`JFA`.`ShipperId` AS `ShipperId`,`JFA`.`ConsigneeId` AS `ConsigneeId`,`JFA`.`NoOfCartons` AS `NoOfCartons`,`JFA`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JFA`.`LetterCreditNoFromBank` AS `LetterCreditNoFromBank`,`JFA`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JFA`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JFA`.`Origin_CountryId` AS `Origin_CountryId`,`JFA`.`OriginCity` AS `OriginCity`,`JFA`.`ETD` AS `ETD`,`JFA`.`ETA` AS `ETA`,`JFA`.`ATA` AS `ATA`,`JFA`.`FlightNo` AS `FlightNo`,`JFA`.`Aircraft` AS `Aircraft`,`JFA`.`Forwarder` AS `Forwarder`,`JFA`.`Warehouse` AS `Warehouse`,`JFA`.`DateReceivedArrivalFromALine` AS `DateReceivedArrivalFromALine`,`JFA`.`DateReceivedArrivalFromClient` AS `DateReceivedArrivalFromClient`,`JFA`.`DatePickUpHawb` AS `DatePickUpHawb`,`JFA`.`DatePickUpOtherDocs` AS `DatePickUpOtherDocs`,`JFA`.`BrokerId` AS `BrokerId`,`JFA`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JFA`.`RFPDueDate` AS `RFPDueDate`,`JFA`.`ColorSelectivityId` AS `ColorSelectivityId`,`JFA`.`IsLocked` AS `IsLocked`,`JFA`.`LockedBy_UserId` AS `LockedBy_UserId`,`JFA`.`StatusId` AS `StatusId`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,concat(`CT`.`CountryName`,' ',`JFA`.`OriginCity`) AS `ORIGIN`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`CST`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode` from (((((((`JobFile_AirHistory` `JFA` join `Shipper` `S` on((`S`.`ShipperId` = `JFA`.`ShipperId`))) join `Consignee` `C` on((`C`.`ConsigneeId` = `JFA`.`ConsigneeId`))) join `Countries` `CT` on((`CT`.`CountryId` = `JFA`.`Origin_CountryId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JFA`.`BrokerId`))) join `ColorSelectivity` `CST` on((`CST`.`ColorSelectivityId` = `JFA`.`ColorSelectivityId`))) join `Status` `ST` on((`ST`.`StatusId` = `JFA`.`StatusId`))) join `User` `U` on((`U`.`UserId` = `JFA`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_JobFileHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_JobFileHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_JobFileHistory` AS select `JF`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileId` AS `JobFileId`,`JF`.`MonitoringTypeId` AS `MonitoringTypeId`,`JF`.`JobFileNo` AS `JobFileNo`,`S`.`ShipperName` AS `ShipperName`,`C`.`ConsigneeName` AS `ConsigneeName`,`JF`.`HouseBillLadingNo` AS `HouseBillLadingNo`,`JF`.`MasterBillLadingNo` AS `MasterBillLadingNo`,`JF`.`MasterBillLadingNo2` AS `MasterBillLadingNo2`,`JF`.`LetterCreditFromBank` AS `LetterCreditFromBank`,`JF`.`DateReceivedArrivalNoticeFromALine` AS `DateReceivedArrivalNoticeFromALine`,`JF`.`PurchaseOrderNo` AS `PurchaseOrderNo`,`JF`.`Registry` AS `Registry`,`JF`.`DateReceivedNoticeFromClients` AS `DateReceivedNoticeFromClients`,`JF`.`DateReceivedOfBL` AS `DateReceivedOfBL`,`JF`.`DateReceivedOfOtherDocs` AS `DateReceivedOfOtherDocs`,concat(`B`.`FirstName`,' ',`B`.`MiddleName`,' ',`B`.`LastName`) AS `Broker`,`JF`.`DateRequestBudgetToGL` AS `DateRequestBudgetToGL`,`JF`.`RFPDueDate` AS `RFPDueDate`,`CS`.`ColorSelectivityName` AS `ColorSelectivityName`,`ST`.`StatusName` AS `StatusName`,`ST`.`IsBackground` AS `IsBackground`,`ST`.`ColorCode` AS `ColorCode`,concat(`CT`.`CountryName`,' ',`JF`.`OriginCity`) AS `Origin`,`JF`.`Forwarder` AS `Forwarder`,`JF`.`Warehouse` AS `Warehouse` from (((((((`JobFileHistory` `JF` left join `Consignee` `C` on((`C`.`ConsigneeId` = `JF`.`ConsigneeId`))) left join `Broker` `B` on((`B`.`BrokerId` = `JF`.`BrokerId`))) left join `Status` `ST` on((`ST`.`StatusId` = `JF`.`StatusId`))) left join `Shipper` `S` on((`S`.`ShipperId` = `JF`.`ShipperId`))) left join `ColorSelectivity` `CS` on((`CS`.`ColorSelectivityId` = `JF`.`ColorSelectivityId`))) join `Countries` `CT` on((`CT`.`CountryId` = `JF`.`Origin_CountryId`))) join `User` `U` on((`U`.`UserId` = `JF`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_Products
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_Products`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_Products` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`P`.`ProductName` AS `ProductName`,`P`.`ProductId` AS `ProductId`,`PBC`.`ProductsByContainerId` AS `ProductsByContainerId`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerByCarrierId` AS `ContainerByCarrierId` from ((((`JobFile` `JF` join `CarrierByJobFile` `CBJ` on((`CBJ`.`JobFileId` = `JF`.`JobFileId`))) join `ContainerByCarrier` `CBC` on((`CBC`.`CarrierByJobFileId` = `CBJ`.`CarrierByJobFileId`))) join `ProductsByContainer` `PBC` on((`PBC`.`ContainerByCarrierId` = `CBC`.`ContainerByCarrierId`))) join `Products` `P` on((`P`.`ProductId` = `PBC`.`ProductId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsAir
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_ProductsAir`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_ProductsAir` AS select `PA`.`Products_AirId` AS `Products_AirId`,`PA`.`ProductId` AS `ProductId`,`P`.`ProductName` AS `ProductName`,`PA`.`JobFile_AirId` AS `JobFile_AirId`,`PA`.`RefEntryNo` AS `RefEntryNo`,`PA`.`GrossWeight` AS `GrossWeight`,`PA`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`PA`.`DatePaid` AS `DatePaid`,`PA`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`PA`.`DateBOCCleared` AS `DateBOCCleared`,`PA`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`PA`.`ActualPullOutDateAtNAIA` AS `ActualPullOutDateAtNAIA`,`PA`.`DateReceivedAtWhse` AS `DateReceivedAtWhse`,`PA`.`HaulerOrTruckId` AS `HaulerOrTruckId`,`PA`.`TotalStorage` AS `TotalStorage`,`PA`.`AdtlPerDayncludeVat` AS `AdtlPerDayncludeVat`,`JFA`.`JobFileNo` AS `JobFileNo`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck` from (((`Products_Air` `PA` join `JobFile_Air` `JFA` on((`JFA`.`JobFile_AirId` = `PA`.`JobFile_AirId`))) left join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `PA`.`HaulerOrTruckId`))) join `Products` `P` on((`P`.`ProductId` = `PA`.`ProductId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsAirHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_ProductsAirHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_ProductsAirHistory` AS select `PA`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`PA`.`Products_AirId` AS `Products_AirId`,`PA`.`ProductId` AS `ProductId`,`P`.`ProductName` AS `ProductName`,`PA`.`JobFile_AirId` AS `JobFile_AirId`,`PA`.`RefEntryNo` AS `RefEntryNo`,`PA`.`GrossWeight` AS `GrossWeight`,`PA`.`DateSentFinalAssessment` AS `DateSentFinalAssessment`,`PA`.`DatePaid` AS `DatePaid`,`PA`.`DateSentPreAssessment` AS `DateSentPreAssessment`,`PA`.`DateBOCCleared` AS `DateBOCCleared`,`PA`.`TargetDeliveryDate` AS `TargetDeliveryDate`,`PA`.`ActualPullOutDateAtNAIA` AS `ActualPullOutDateAtNAIA`,`PA`.`DateReceivedAtWhse` AS `DateReceivedAtWhse`,`PA`.`HaulerOrTruckId` AS `HaulerOrTruckId`,`PA`.`TotalStorage` AS `TotalStorage`,`PA`.`AdtlPerDayncludeVat` AS `AdtlPerDayncludeVat`,`JFA`.`JobFileNo` AS `JobFileNo`,`HOT`.`HaulerOrTruck` AS `HaulerOrTruck` from ((((`Products_AirHistory` `PA` join `JobFile_Air` `JFA` on((`JFA`.`JobFile_AirId` = `PA`.`JobFile_AirId`))) left join `HaulerOrTruck` `HOT` on((`HOT`.`HaulerOrTruckId` = `PA`.`HaulerOrTruckId`))) join `Products` `P` on((`P`.`ProductId` = `PA`.`ProductId`))) join `User` `U` on((`U`.`UserId` = `PA`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_ProductsHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_ProductsHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`49.%.%.%` SQL SECURITY DEFINER VIEW `vw_ProductsHistory` AS select `PBC`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`P`.`ProductName` AS `ProductName`,`P`.`ProductId` AS `ProductId`,`PBC`.`ProductsByContainerId` AS `ProductsByContainerId`,`CBC`.`ContainerNo` AS `ContainerNo`,`CBC`.`ContainerByCarrierId` AS `ContainerByCarrierId` from (((((`ProductsByContainerHistory` `PBC` left join `ContainerByCarrier` `CBC` on((`CBC`.`ContainerByCarrierId` = `PBC`.`ContainerByCarrierId`))) left join `CarrierByJobFile` `CBJ` on((`CBJ`.`CarrierByJobFileId` = `CBC`.`CarrierByJobFileId`))) left join `JobFile` `JF` on((`JF`.`JobFileId` = `CBJ`.`JobFileId`))) join `Products` `P` on((`P`.`ProductId` = `PBC`.`ProductId`))) join `User` `U` on((`U`.`UserId` = `PBC`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningCharges
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_RunningCharges`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_RunningCharges` AS select `JF`.`JobFileNo` AS `JobFileNo`,`RC`.`RunnningChargesId` AS `RunnningChargesId`,`RC`.`JobFileId` AS `JobFileId`,`RC`.`LodgementFee` AS `LodgementFee`,`RC`.`ContainerDeposit` AS `ContainerDeposit`,`RC`.`THCCharges` AS `THCCharges`,`RC`.`Arrastre` AS `Arrastre`,`RC`.`Wharfage` AS `Wharfage`,`RC`.`Weighing` AS `Weighing`,`RC`.`DEL` AS `DEL`,`RC`.`DispatchFee` AS `DispatchFee`,`RC`.`Storage` AS `Storage`,`RC`.`Demorage` AS `Demorage`,`RC`.`Detention` AS `Detention`,`RC`.`EIC` AS `EIC`,`RC`.`BAIApplication` AS `BAIApplication`,`RC`.`BAIInspection` AS `BAIInspection`,`RC`.`SRAApplication` AS `SRAApplication`,`RC`.`SRAInspection` AS `SRAInspection`,`RC`.`BadCargo` AS `BadCargo`,`RC`.`AllCharges` AS `AllCharges`,`RC`.`ParticularCharges` AS `ParticularCharges` from (`RunningCharges` `RC` left join `JobFile` `JF` on((`JF`.`JobFileId` = `RC`.`JobFileId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningChargesAirHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_RunningChargesAirHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_RunningChargesAirHistory` AS select `U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileNo` AS `JobFileNo`,`RCA`.`RunningCharges_AirHistoryId` AS `RunningCharges_AirHistoryId`,`RCA`.`RunnningCharges_AirId` AS `RunnningCharges_AirId`,`RCA`.`JobFile_AirId` AS `JobFile_AirId`,`RCA`.`LodgementFee` AS `LodgementFee`,`RCA`.`BreakBulkFee` AS `BreakBulkFee`,`RCA`.`StorageFee` AS `StorageFee`,`RCA`.`BadCargoOrderFee` AS `BadCargoOrderFee`,`RCA`.`VCRC` AS `VCRC`,`RCA`.`CNI` AS `CNI`,`RCA`.`CNIU` AS `CNIU`,`RCA`.`DateUpdated` AS `DateUpdated`,`RCA`.`UpdatedBy_UserId` AS `UpdatedBy_UserId` from ((`RunningCharges_AirHistory` `RCA` join `JobFile_Air` `JF` on((`JF`.`JobFile_AirId` = `RCA`.`JobFile_AirId`))) join `User` `U` on((`U`.`UserId` = `RCA`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_RunningChargesHistory
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_RunningChargesHistory`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_RunningChargesHistory` AS select `RC`.`DateUpdated` AS `DateUpdated`,`U`.`UserName` AS `UserName`,concat(`U`.`FirstName`,' ',`U`.`LastName`) AS `Full_Name`,`JF`.`JobFileNo` AS `JobFileNo`,`RC`.`RunnningChargesId` AS `RunnningChargesId`,`RC`.`JobFileId` AS `JobFileId`,`RC`.`LodgementFee` AS `LodgementFee`,`RC`.`ContainerDeposit` AS `ContainerDeposit`,`RC`.`THCCharges` AS `THCCharges`,`RC`.`Arrastre` AS `Arrastre`,`RC`.`Wharfage` AS `Wharfage`,`RC`.`Weighing` AS `Weighing`,`RC`.`DEL` AS `DEL`,`RC`.`DispatchFee` AS `DispatchFee`,`RC`.`Storage` AS `Storage`,`RC`.`Demorage` AS `Demorage`,`RC`.`Detention` AS `Detention`,`RC`.`EIC` AS `EIC`,`RC`.`BAIApplication` AS `BAIApplication`,`RC`.`BAIInspection` AS `BAIInspection`,`RC`.`SRAApplication` AS `SRAApplication`,`RC`.`SRAInspection` AS `SRAInspection`,`RC`.`BadCargo` AS `BadCargo`,`RC`.`AllCharges` AS `AllCharges`,`RC`.`ParticularCharges` AS `ParticularCharges` from ((`RunningChargesHistory` `RC` left join `JobFile` `JF` on((`JF`.`JobFileId` = `RC`.`JobFileId`))) join `User` `U` on((`U`.`UserId` = `RC`.`UpdatedBy_UserId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_shipper_full_info
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_shipper_full_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_shipper_full_info` AS select `Shipper`.`ShipperId` AS `ShipperId`,`Shipper`.`ShipperName` AS `ShipperName`,`Shipper`.`DateAdded` AS `DateAdded`,`Shipper`.`HouseBuildingNoStreet` AS `HouseBuildingNoStreet`,`Shipper`.`BarangarOrVillage` AS `BarangarOrVillage`,`Shipper`.`TownOrCityProvince` AS `TownOrCityProvince`,`Shipper`.`CountryId` AS `CountryId`,`Shipper`.`IsActive` AS `IsActive`,(select `Countries`.`CountryName` from `Countries` where (`Countries`.`CountryId` = `Shipper`.`CountryId`)) AS `Country` from `Shipper`;


-- Dumping structure for view dev_FilportTrackingSystem.vw_StatusReports
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_StatusReports`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_StatusReports` AS select `JF`.`JobFileId` AS `JobFileId`,`JF`.`JobFileNo` AS `JobFileNo`,`HS`.`HistoricalStatusId` AS `HistoricalStatusId`,`HS`.`DateAdded` AS `DateAdded`,`HS`.`StatusDescription` AS `StatusDescription` from (`HistoricalStatus` `HS` left join `JobFile` `JF` on((`JF`.`JobFileId` = `HS`.`JobFileId`)));


-- Dumping structure for view dev_FilportTrackingSystem.vw_StatusReportsAir
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_StatusReportsAir`;
CREATE ALGORITHM=UNDEFINED DEFINER=`FilportAdmin`@`%.%.%.%` SQL SECURITY DEFINER VIEW `vw_StatusReportsAir` AS select `HSA`.`HistoricalStatus_AirId` AS `HistoricalStatus_AirId`,`HSA`.`StatusDescription` AS `StatusDescription`,`HSA`.`JobFile_AirId` AS `JobFile_AirId`,`HSA`.`DateAdded` AS `DateAdded`,`HSA`.`AddedBy_UserId` AS `AddedBy_UserId`,`JFA`.`JobFileNo` AS `JobFileNo`,`U`.`UserName` AS `UserName` from ((`HistoricalStatus_Air` `HSA` left join `JobFile_Air` `JFA` on((`JFA`.`JobFile_AirId` = `HSA`.`JobFile_AirId`))) join `User` `U` on((`U`.`UserId` = `HSA`.`AddedBy_UserId`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
