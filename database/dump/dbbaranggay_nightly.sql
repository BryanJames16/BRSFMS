CREATE DATABASE  IF NOT EXISTS `dbbarangay` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbbarangay`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbbarangay
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildings` (
  `buildingID` int(11) NOT NULL AUTO_INCREMENT,
  `lotID` int(11) NOT NULL,
  `buildingName` varchar(45) NOT NULL,
  `buildingTypeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`buildingID`),
  KEY `lotID_idx` (`lotID`),
  KEY `buildingTypeID_idx` (`buildingTypeID`),
  CONSTRAINT `buildingTypeID` FOREIGN KEY (`buildingTypeID`) REFERENCES `buildingtypes` (`buildingTypeID`) ON UPDATE CASCADE,
  CONSTRAINT `lotID` FOREIGN KEY (`lotID`) REFERENCES `lots` (`lotID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` VALUES (1,1,'Maui Oasis',2,1,0),(2,3,'El Pueblo',2,1,0),(3,5,'444A-a',1,0,0);
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buildingtypes`
--

DROP TABLE IF EXISTS `buildingtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingtypes` (
  `buildingTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `buildingTypeName` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `archive` tinyint(4) NOT NULL,
  PRIMARY KEY (`buildingTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingtypes`
--

LOCK TABLES `buildingtypes` WRITE;
/*!40000 ALTER TABLE `buildingtypes` DISABLE KEYS */;
INSERT INTO `buildingtypes` VALUES (1,'House',1,0),(2,'Condominium',1,0);
/*!40000 ALTER TABLE `buildingtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesscategories`
--

DROP TABLE IF EXISTS `businesscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesscategories` (
  `categoryPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(30) NOT NULL,
  `categoryDesc` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`categoryPrimeID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesscategories`
--

LOCK TABLES `businesscategories` WRITE;
/*!40000 ALTER TABLE `businesscategories` DISABLE KEYS */;
INSERT INTO `businesscategories` VALUES (5,'Industrial',NULL,1,0),(7,'Clothing','',1,0);
/*!40000 ALTER TABLE `businesscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesses` (
  `businessPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` varchar(20) NOT NULL,
  `businessName` varchar(30) NOT NULL,
  `businessDesc` varchar(500) DEFAULT NULL,
  `businessType` varchar(12) NOT NULL,
  `categoryPrimeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`businessPrimeID`),
  KEY `fk_Businesses_BusinessCategory1_idx` (`categoryPrimeID`),
  CONSTRAINT `fk_Businesses_BusinessCategory1` FOREIGN KEY (`categoryPrimeID`) REFERENCES `businesscategories` (`categoryPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businessregistrations`
--

DROP TABLE IF EXISTS `businessregistrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businessregistrations` (
  `registrationPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` varchar(20) NOT NULL,
  `originalName` varchar(45) NOT NULL,
  `tradeName` varchar(45) NOT NULL,
  `residentPrimeID` int(11) DEFAULT NULL,
  `registrationDate` datetime NOT NULL,
  `removalDate` datetime DEFAULT NULL,
  `archive` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`registrationPrimeID`),
  KEY `fk_businessregistrations_residents1_idx` (`residentPrimeID`),
  CONSTRAINT `fk_businessregistrations_residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businessregistrations`
--

LOCK TABLES `businessregistrations` WRITE;
/*!40000 ALTER TABLE `businessregistrations` DISABLE KEYS */;
INSERT INTO `businessregistrations` VALUES (1,'BUS_001','Alingasd','asdasdsa',5,'2017-08-27 13:19:40',NULL,0,'123-abc Halina St. Bacoor, Caivte',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `businessregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `collectionPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `collectionID` varchar(20) NOT NULL,
  `collectionDate` datetime NOT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `collectionType` int(11) NOT NULL,
  `amount` double NOT NULL,
  `recieved` double DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `reservationprimeID` int(11) DEFAULT NULL,
  `documentHeaderPrimeID` int(11) DEFAULT NULL,
  `residentPrimeID` int(11) DEFAULT NULL,
  `peoplePrimeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`collectionPrimeID`),
  KEY `fk_collections_reservations1_idx` (`reservationprimeID`),
  KEY `fk_collections_documentheaderrequests1_idx` (`documentHeaderPrimeID`),
  KEY `fk_collections_residents1_idx` (`residentPrimeID`),
  KEY `fk_collections_people1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_collections_documentheaderrequests1` FOREIGN KEY (`documentHeaderPrimeID`) REFERENCES `documentrequests` (`documentRequestPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_people1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_reservations1` FOREIGN KEY (`reservationprimeID`) REFERENCES `reservations` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (12,'COLLE_001','2017-08-30 01:41:17','2017-09-16 03:31:47',3,600,1000,'Paid',20,NULL,2,NULL),(13,'COLLE_002','2017-08-30 01:42:00',NULL,3,200,NULL,'Pending',21,NULL,5,NULL),(14,'COLLE_003','2017-08-30 01:44:00',NULL,3,1400,NULL,'Pending',22,NULL,6,NULL),(15,'COLLE_004','2017-08-30 03:35:11','2017-08-30 03:37:06',3,200,300,'Paid',23,NULL,8,NULL),(16,'COLLE_005','2017-09-09 04:39:38',NULL,3,1800,NULL,'Pending',24,NULL,2,NULL),(17,'COLLE_006','2017-09-09 04:41:14','2017-09-09 04:41:48',3,100,1000,'Paid',25,NULL,2,NULL),(18,'COLLE_007','2017-09-16 03:23:05',NULL,3,200,NULL,'Pending',26,NULL,5,NULL);
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_requirements`
--

DROP TABLE IF EXISTS `document_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_requirements` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `documentPrimeID` int(11) NOT NULL,
  `requirementID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`primeID`),
  KEY `documentPrimeID_idx` (`documentPrimeID`),
  KEY `requirementID_idx` (`requirementID`),
  CONSTRAINT `documentPrimeID` FOREIGN KEY (`documentPrimeID`) REFERENCES `documents` (`primeID`) ON UPDATE CASCADE,
  CONSTRAINT `requirementID` FOREIGN KEY (`requirementID`) REFERENCES `requirements` (`requirementID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_requirements`
--

LOCK TABLES `document_requirements` WRITE;
/*!40000 ALTER TABLE `document_requirements` DISABLE KEYS */;
INSERT INTO `document_requirements` VALUES (2,2,1,2),(3,2,2,1),(9,3,1,1),(10,1,1,2),(11,1,2,1),(12,1,4,1);
/*!40000 ALTER TABLE `document_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentrequests`
--

DROP TABLE IF EXISTS `documentrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentrequests` (
  `documentRequestPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `requestID` varchar(20) NOT NULL,
  `requestDate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `residentPrimeID` int(11) NOT NULL,
  `documentsPrimeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`documentRequestPrimeID`),
  KEY `fk_DocumentHeaderRequests_Residents1_idx` (`residentPrimeID`),
  KEY `documentPrimeID_idx` (`documentsPrimeID`),
  CONSTRAINT `documentsPrimeID` FOREIGN KEY (`documentsPrimeID`) REFERENCES `documents` (`primeID`) ON UPDATE CASCADE,
  CONSTRAINT `residentPrimeID` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentrequests`
--

LOCK TABLES `documentrequests` WRITE;
/*!40000 ALTER TABLE `documentrequests` DISABLE KEYS */;
INSERT INTO `documentrequests` VALUES (5,'REQ_001','2017-08-27','Approved',2,1,2,NULL),(6,'REQ_002','2017-08-27','Cancelled',4,2,1,NULL),(7,'REQ_003','2017-08-27','Rejected',3,2,1,NULL),(8,'REQ_004','2017-08-27','Rejected',5,1,2,NULL),(9,'REQ_005','2017-08-29','Rejected',5,2,2,NULL),(10,'REQ_006','2017-08-29','Approved',2,1,1,NULL),(11,'REQ_007','2017-08-29','Approved',7,3,1,NULL),(12,'REQ_008','2017-08-29','Approved',7,1,1,NULL),(13,'REQ_009','2017-08-29','Approved',6,1,2,NULL),(14,'REQ_010','2017-08-30','Approved',8,2,8,NULL),(15,'REQ_011','2017-09-09','Approved',2,1,1,NULL),(16,'REQ_012','2017-09-16','Waiting for approval',2,1,1,NULL),(17,'REQ_013','2017-09-16','Pending',2,1,2,NULL);
/*!40000 ALTER TABLE `documentrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `documentID` varchar(20) NOT NULL,
  `documentName` varchar(30) NOT NULL,
  `documentDescription` varchar(500) DEFAULT NULL,
  `documentContent` varchar(500) NOT NULL,
  `documentType` varchar(15) NOT NULL,
  `documentPrice` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`primeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Clearance',100,1,0),(2,'DOC_002','Certificate of Indigency','Indegency certification','This is to certify that..','Certification',100,1,0),(3,'DOC_003','Certificate of No Work','No work certification','This is to certify...','Certification',50,1,0);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeposition`
--

DROP TABLE IF EXISTS `employeeposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeposition` (
  `positionID` int(11) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(30) NOT NULL,
  `positionDate` date NOT NULL,
  `positionLevel` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `employeePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`positionID`),
  KEY `fk_EmployeePosition_Employees1_idx` (`employeePrimeID`),
  CONSTRAINT `fk_EmployeePosition_Employees1` FOREIGN KEY (`employeePrimeID`) REFERENCES `employees` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeposition`
--

LOCK TABLES `employeeposition` WRITE;
/*!40000 ALTER TABLE `employeeposition` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeeposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `primeID` int(11) NOT NULL,
  `employeeID` varchar(20) NOT NULL,
  `registrationID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`primeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `facilityID` varchar(20) NOT NULL,
  `facilityName` varchar(30) NOT NULL,
  `facilityDesc` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `facilityTypeID` int(11) NOT NULL,
  `facilityDayPrice` double NOT NULL,
  `facilityNightPrice` double NOT NULL,
  PRIMARY KEY (`primeID`),
  KEY `fk_Facilities_FacilityTypes1_idx` (`facilityTypeID`),
  CONSTRAINT `fk_Facilities_FacilityTypes1` FOREIGN KEY (`facilityTypeID`) REFERENCES `facilitytypes` (`typeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,'FAC_001','Hipodromo Courts',NULL,1,0,2,100,200),(2,'FAC_002','Hipodromo Plaza',NULL,1,0,5,100,150),(4,'FAC_003','asdhakjsh','ajksdh',1,1,2,0.04,0.02);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilitytypes`
--

DROP TABLE IF EXISTS `facilitytypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilitytypes` (
  `typeID` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
INSERT INTO `facilitytypes` VALUES (2,'Covered Court',1,0),(3,'Parks',1,0),(4,'Chapel',1,0),(5,'Plaza',1,0),(6,'asdasd',1,1),(7,'Audio Visual Rooms',1,0);
/*!40000 ALTER TABLE `facilitytypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `families`
--

DROP TABLE IF EXISTS `families`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `families` (
  `familyPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `familyID` varchar(20) NOT NULL,
  `familyHeadID` int(11) NOT NULL,
  `familyName` varchar(30) DEFAULT NULL,
  `familyRegistrationDate` date DEFAULT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`familyPrimeID`),
  KEY `familyHeadID_idx` (`familyHeadID`),
  CONSTRAINT `familyHeadID` FOREIGN KEY (`familyHeadID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0),(3,'FAM_003',2,'asdas','2017-08-23',1),(4,'FAM_004',6,'Del Mundo Family','2017-08-29',0),(5,'FAM_005',8,'Perez','2017-08-30',0),(6,'FAM_006',5,'Illagas Family','2017-09-16',0);
/*!40000 ALTER TABLE `families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familymembers`
--

DROP TABLE IF EXISTS `familymembers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familymembers` (
  `familyMemberPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `familyPrimeID` int(11) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  `memberRelation` varchar(45) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`familyMemberPrimeID`),
  KEY `fk_familyMembers_Residents1_idx` (`peoplePrimeID`),
  KEY `fk_FamilyMembers_Families1_idx` (`familyPrimeID`),
  CONSTRAINT `fk_FamilyMembers_Families1` FOREIGN KEY (`familyPrimeID`) REFERENCES `families` (`familyPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_familyMembers_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (4,2,5,'Grandfather',0),(9,1,2,'Son',0),(18,1,3,'Daughter',0),(20,1,4,'Self',0),(21,2,3,'Self',0),(22,4,6,'Self',0),(24,4,7,'Brother',0),(25,5,8,'Self',0),(26,2,6,'Self',0);
/*!40000 ALTER TABLE `familymembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generaladdresses`
--

DROP TABLE IF EXISTS `generaladdresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generaladdresses` (
  `personAddressID` int(11) NOT NULL AUTO_INCREMENT,
  `addressType` varchar(30) NOT NULL,
  `residentPrimeID` int(11) DEFAULT NULL,
  `facilitiesPrimeID` int(11) DEFAULT NULL,
  `businessPrimeID` int(11) DEFAULT NULL,
  `unitID` int(11) DEFAULT NULL,
  `streetID` int(11) DEFAULT NULL,
  `lotID` int(11) DEFAULT NULL,
  `buildingID` int(11) DEFAULT NULL,
  PRIMARY KEY (`personAddressID`),
  KEY `fk_GeneralAddresses_Facilities1_idx` (`facilitiesPrimeID`),
  KEY `fk_GeneralAddresses_Residents1_idx` (`residentPrimeID`),
  KEY `fk_generaladdresses_units1_idx` (`unitID`),
  KEY `fk_generaladdresses_streets1_idx` (`streetID`),
  KEY `lotID_idx` (`lotID`),
  KEY `fk_generaladdresses_businessregistrations1_idx` (`businessPrimeID`),
  CONSTRAINT `fk_GeneralAddresses_Facilities1` FOREIGN KEY (`facilitiesPrimeID`) REFERENCES `facilities` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_GeneralAddresses_Residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_businessregistrations1` FOREIGN KEY (`businessPrimeID`) REFERENCES `businessregistrations` (`registrationPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_streets1` FOREIGN KEY (`streetID`) REFERENCES `streets` (`streetID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_units1` FOREIGN KEY (`unitID`) REFERENCES `units` (`unitID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
INSERT INTO `generaladdresses` VALUES (1,'Permanent Address',2,NULL,NULL,3,2,3,2),(2,'Permanent Address',3,NULL,NULL,3,2,3,2),(3,'Permanent Address',4,NULL,NULL,3,2,3,2),(4,'Permanent Address',5,NULL,NULL,5,3,5,3),(5,'Permanent Address',6,NULL,NULL,5,3,5,3),(6,'Current Address',7,NULL,NULL,1,1,1,1),(7,'Permanent Address',8,NULL,NULL,3,2,3,2);
/*!40000 ALTER TABLE `generaladdresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lots`
--

DROP TABLE IF EXISTS `lots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lots` (
  `lotID` int(11) NOT NULL AUTO_INCREMENT,
  `lotCode` varchar(5) NOT NULL,
  `streetID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`lotID`),
  KEY `fk_Lots_Streets1_idx` (`streetID`),
  CONSTRAINT `fk_Lots_Streets1` FOREIGN KEY (`streetID`) REFERENCES `streets` (`streetID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'31',1,1,0),(2,'2',1,1,0),(3,'1A',2,1,0),(4,'1B',2,1,0),(5,'30',3,1,0),(6,'31',3,1,0);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2500) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `dateSent` datetime NOT NULL,
  `isRead` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `senderID_idx` (`senderID`),
  KEY `receiverID_idx` (`receiverID`),
  CONSTRAINT `receiverID` FOREIGN KEY (`receiverID`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `senderID` FOREIGN KEY (`senderID`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=868 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (229,'2017_08_20_131145_create_buildings_table',0),(230,'2017_08_20_131145_create_buildingtypes_table',0),(231,'2017_08_20_131145_create_businesscategories_table',0),(232,'2017_08_20_131145_create_businesses_table',0),(233,'2017_08_20_131145_create_businessregistrations_table',0),(234,'2017_08_20_131145_create_collections_table',0),(235,'2017_08_20_131145_create_document_requirements_table',0),(236,'2017_08_20_131145_create_documentdetailrequests_table',0),(237,'2017_08_20_131145_create_documentheaderrequests_table',0),(238,'2017_08_20_131145_create_documents_table',0),(239,'2017_08_20_131145_create_employeeposition_table',0),(240,'2017_08_20_131145_create_employees_table',0),(241,'2017_08_20_131145_create_facilities_table',0),(242,'2017_08_20_131145_create_facilitytypes_table',0),(243,'2017_08_20_131145_create_families_table',0),(244,'2017_08_20_131145_create_familymembers_table',0),(245,'2017_08_20_131145_create_generaladdresses_table',0),(246,'2017_08_20_131145_create_lots_table',0),(247,'2017_08_20_131145_create_participants_table',0),(248,'2017_08_20_131145_create_people_table',0),(249,'2017_08_20_131145_create_requirements_table',0),(250,'2017_08_20_131145_create_reservations_table',0),(251,'2017_08_20_131145_create_residentaccountregistrations_table',0),(252,'2017_08_20_131145_create_residentaccounts_table',0),(253,'2017_08_20_131145_create_residentbackgrounds_table',0),(254,'2017_08_20_131145_create_residentregistrations_table',0),(255,'2017_08_20_131145_create_residents_table',0),(256,'2017_08_20_131145_create_services_table',0),(257,'2017_08_20_131145_create_servicesponsorships_table',0),(258,'2017_08_20_131145_create_servicetransactions_table',0),(259,'2017_08_20_131145_create_servicetypes_table',0),(260,'2017_08_20_131145_create_streets_table',0),(261,'2017_08_20_131145_create_sysutil_table',0),(262,'2017_08_20_131145_create_units_table',0),(263,'2017_08_20_131145_create_users_table',0),(264,'2017_08_20_131145_create_utilities_table',0),(265,'2017_08_20_131145_create_voters_table',0),(266,'2017_08_20_131151_add_foreign_keys_to_buildings_table',0),(267,'2017_08_20_131151_add_foreign_keys_to_businesses_table',0),(268,'2017_08_20_131151_add_foreign_keys_to_businessregistrations_table',0),(269,'2017_08_20_131151_add_foreign_keys_to_collections_table',0),(270,'2017_08_20_131151_add_foreign_keys_to_document_requirements_table',0),(271,'2017_08_20_131151_add_foreign_keys_to_documentdetailrequests_table',0),(272,'2017_08_20_131151_add_foreign_keys_to_documentheaderrequests_table',0),(273,'2017_08_20_131151_add_foreign_keys_to_employeeposition_table',0),(274,'2017_08_20_131151_add_foreign_keys_to_facilities_table',0),(275,'2017_08_20_131151_add_foreign_keys_to_families_table',0),(276,'2017_08_20_131151_add_foreign_keys_to_familymembers_table',0),(277,'2017_08_20_131151_add_foreign_keys_to_generaladdresses_table',0),(278,'2017_08_20_131151_add_foreign_keys_to_lots_table',0),(279,'2017_08_20_131151_add_foreign_keys_to_participants_table',0),(280,'2017_08_20_131151_add_foreign_keys_to_reservations_table',0),(281,'2017_08_20_131151_add_foreign_keys_to_residentaccountregistrations_table',0),(282,'2017_08_20_131151_add_foreign_keys_to_residentaccounts_table',0),(283,'2017_08_20_131151_add_foreign_keys_to_residentbackgrounds_table',0),(284,'2017_08_20_131151_add_foreign_keys_to_residentregistrations_table',0),(285,'2017_08_20_131151_add_foreign_keys_to_services_table',0),(286,'2017_08_20_131151_add_foreign_keys_to_servicesponsorships_table',0),(287,'2017_08_20_131151_add_foreign_keys_to_servicetransactions_table',0),(288,'2017_08_20_131151_add_foreign_keys_to_units_table',0),(289,'2017_08_20_131151_add_foreign_keys_to_voters_table',0),(290,'2017_08_24_122308_create_buildings_table',0),(291,'2017_08_24_122308_create_buildingtypes_table',0),(292,'2017_08_24_122308_create_businesscategories_table',0),(293,'2017_08_24_122308_create_businesses_table',0),(294,'2017_08_24_122308_create_businessregistrations_table',0),(295,'2017_08_24_122308_create_collections_table',0),(296,'2017_08_24_122308_create_document_requirements_table',0),(297,'2017_08_24_122308_create_documentrequests_table',0),(298,'2017_08_24_122308_create_documents_table',0),(299,'2017_08_24_122308_create_employeeposition_table',0),(300,'2017_08_24_122308_create_employees_table',0),(301,'2017_08_24_122308_create_facilities_table',0),(302,'2017_08_24_122308_create_facilitytypes_table',0),(303,'2017_08_24_122308_create_families_table',0),(304,'2017_08_24_122308_create_familymembers_table',0),(305,'2017_08_24_122308_create_generaladdresses_table',0),(306,'2017_08_24_122308_create_lots_table',0),(307,'2017_08_24_122308_create_participants_table',0),(308,'2017_08_24_122308_create_people_table',0),(309,'2017_08_24_122308_create_recipients_table',0),(310,'2017_08_24_122308_create_requirements_table',0),(311,'2017_08_24_122308_create_reservations_table',0),(312,'2017_08_24_122308_create_residentaccountregistrations_table',0),(313,'2017_08_24_122308_create_residentaccounts_table',0),(314,'2017_08_24_122308_create_residentbackgrounds_table',0),(315,'2017_08_24_122308_create_residentregistrations_table',0),(316,'2017_08_24_122308_create_residents_table',0),(317,'2017_08_24_122308_create_services_table',0),(318,'2017_08_24_122308_create_servicesponsorships_table',0),(319,'2017_08_24_122308_create_servicetransactions_table',0),(320,'2017_08_24_122308_create_servicetypes_table',0),(321,'2017_08_24_122308_create_streets_table',0),(322,'2017_08_24_122308_create_sysutil_table',0),(323,'2017_08_24_122308_create_units_table',0),(324,'2017_08_24_122308_create_users_table',0),(325,'2017_08_24_122308_create_utilities_table',0),(326,'2017_08_24_122308_create_voters_table',0),(327,'2017_08_24_122313_add_foreign_keys_to_buildings_table',0),(328,'2017_08_24_122313_add_foreign_keys_to_businesses_table',0),(329,'2017_08_24_122313_add_foreign_keys_to_businessregistrations_table',0),(330,'2017_08_24_122313_add_foreign_keys_to_collections_table',0),(331,'2017_08_24_122313_add_foreign_keys_to_document_requirements_table',0),(332,'2017_08_24_122313_add_foreign_keys_to_documentrequests_table',0),(333,'2017_08_24_122313_add_foreign_keys_to_employeeposition_table',0),(334,'2017_08_24_122313_add_foreign_keys_to_facilities_table',0),(335,'2017_08_24_122313_add_foreign_keys_to_families_table',0),(336,'2017_08_24_122313_add_foreign_keys_to_familymembers_table',0),(337,'2017_08_24_122313_add_foreign_keys_to_generaladdresses_table',0),(338,'2017_08_24_122313_add_foreign_keys_to_lots_table',0),(339,'2017_08_24_122313_add_foreign_keys_to_participants_table',0),(340,'2017_08_24_122313_add_foreign_keys_to_reservations_table',0),(341,'2017_08_24_122313_add_foreign_keys_to_residentaccountregistrations_table',0),(342,'2017_08_24_122313_add_foreign_keys_to_residentaccounts_table',0),(343,'2017_08_24_122313_add_foreign_keys_to_residentbackgrounds_table',0),(344,'2017_08_24_122313_add_foreign_keys_to_residentregistrations_table',0),(345,'2017_08_24_122313_add_foreign_keys_to_services_table',0),(346,'2017_08_24_122313_add_foreign_keys_to_servicesponsorships_table',0),(347,'2017_08_24_122313_add_foreign_keys_to_servicetransactions_table',0),(348,'2017_08_24_122313_add_foreign_keys_to_units_table',0),(349,'2017_08_24_122313_add_foreign_keys_to_voters_table',0),(350,'2017_08_25_154702_create_buildings_table',0),(351,'2017_08_25_154702_create_buildingtypes_table',0),(352,'2017_08_25_154702_create_businesscategories_table',0),(353,'2017_08_25_154702_create_businesses_table',0),(354,'2017_08_25_154702_create_businessregistrations_table',0),(355,'2017_08_25_154702_create_collections_table',0),(356,'2017_08_25_154702_create_document_requirements_table',0),(357,'2017_08_25_154702_create_documentrequests_table',0),(358,'2017_08_25_154702_create_documents_table',0),(359,'2017_08_25_154702_create_employeeposition_table',0),(360,'2017_08_25_154702_create_employees_table',0),(361,'2017_08_25_154702_create_facilities_table',0),(362,'2017_08_25_154702_create_facilitytypes_table',0),(363,'2017_08_25_154702_create_families_table',0),(364,'2017_08_25_154702_create_familymembers_table',0),(365,'2017_08_25_154702_create_generaladdresses_table',0),(366,'2017_08_25_154702_create_lots_table',0),(367,'2017_08_25_154702_create_participants_table',0),(368,'2017_08_25_154702_create_partrecipients_table',0),(369,'2017_08_25_154702_create_people_table',0),(370,'2017_08_25_154702_create_recipients_table',0),(371,'2017_08_25_154702_create_requirements_table',0),(372,'2017_08_25_154702_create_reservations_table',0),(373,'2017_08_25_154702_create_residentaccountregistrations_table',0),(374,'2017_08_25_154702_create_residentaccounts_table',0),(375,'2017_08_25_154702_create_residentbackgrounds_table',0),(376,'2017_08_25_154702_create_residentregistrations_table',0),(377,'2017_08_25_154702_create_residents_table',0),(378,'2017_08_25_154702_create_services_table',0),(379,'2017_08_25_154702_create_servicesponsorships_table',0),(380,'2017_08_25_154702_create_servicetransactions_table',0),(381,'2017_08_25_154702_create_servicetypes_table',0),(382,'2017_08_25_154702_create_streets_table',0),(383,'2017_08_25_154702_create_sysutil_table',0),(384,'2017_08_25_154702_create_units_table',0),(385,'2017_08_25_154702_create_users_table',0),(386,'2017_08_25_154702_create_utilities_table',0),(387,'2017_08_25_154702_create_voters_table',0),(388,'2017_08_25_154711_add_foreign_keys_to_buildings_table',0),(389,'2017_08_25_154711_add_foreign_keys_to_businesses_table',0),(390,'2017_08_25_154711_add_foreign_keys_to_businessregistrations_table',0),(391,'2017_08_25_154711_add_foreign_keys_to_collections_table',0),(392,'2017_08_25_154711_add_foreign_keys_to_document_requirements_table',0),(393,'2017_08_25_154711_add_foreign_keys_to_documentrequests_table',0),(394,'2017_08_25_154711_add_foreign_keys_to_employeeposition_table',0),(395,'2017_08_25_154711_add_foreign_keys_to_facilities_table',0),(396,'2017_08_25_154711_add_foreign_keys_to_families_table',0),(397,'2017_08_25_154711_add_foreign_keys_to_familymembers_table',0),(398,'2017_08_25_154711_add_foreign_keys_to_generaladdresses_table',0),(399,'2017_08_25_154711_add_foreign_keys_to_lots_table',0),(400,'2017_08_25_154711_add_foreign_keys_to_participants_table',0),(401,'2017_08_25_154711_add_foreign_keys_to_partrecipients_table',0),(402,'2017_08_25_154711_add_foreign_keys_to_reservations_table',0),(403,'2017_08_25_154711_add_foreign_keys_to_residentaccountregistrations_table',0),(404,'2017_08_25_154711_add_foreign_keys_to_residentaccounts_table',0),(405,'2017_08_25_154711_add_foreign_keys_to_residentbackgrounds_table',0),(406,'2017_08_25_154711_add_foreign_keys_to_residentregistrations_table',0),(407,'2017_08_25_154711_add_foreign_keys_to_services_table',0),(408,'2017_08_25_154711_add_foreign_keys_to_servicesponsorships_table',0),(409,'2017_08_25_154711_add_foreign_keys_to_servicetransactions_table',0),(410,'2017_08_25_154711_add_foreign_keys_to_units_table',0),(411,'2017_08_25_154711_add_foreign_keys_to_voters_table',0),(412,'2017_08_27_064352_create_buildings_table',0),(413,'2017_08_27_064352_create_buildingtypes_table',0),(414,'2017_08_27_064352_create_businesscategories_table',0),(415,'2017_08_27_064352_create_businesses_table',0),(416,'2017_08_27_064352_create_businessregistrations_table',0),(417,'2017_08_27_064352_create_collections_table',0),(418,'2017_08_27_064352_create_document_requirements_table',0),(419,'2017_08_27_064352_create_documentrequests_table',0),(420,'2017_08_27_064352_create_documents_table',0),(421,'2017_08_27_064352_create_employeeposition_table',0),(422,'2017_08_27_064352_create_employees_table',0),(423,'2017_08_27_064352_create_facilities_table',0),(424,'2017_08_27_064352_create_facilitytypes_table',0),(425,'2017_08_27_064352_create_families_table',0),(426,'2017_08_27_064352_create_familymembers_table',0),(427,'2017_08_27_064352_create_generaladdresses_table',0),(428,'2017_08_27_064352_create_lots_table',0),(429,'2017_08_27_064352_create_participants_table',0),(430,'2017_08_27_064352_create_partrecipients_table',0),(431,'2017_08_27_064352_create_people_table',0),(432,'2017_08_27_064352_create_recipients_table',0),(433,'2017_08_27_064352_create_requestrequirements_table',0),(434,'2017_08_27_064352_create_requirements_table',0),(435,'2017_08_27_064352_create_reservations_table',0),(436,'2017_08_27_064352_create_residentaccountregistrations_table',0),(437,'2017_08_27_064352_create_residentaccounts_table',0),(438,'2017_08_27_064352_create_residentbackgrounds_table',0),(439,'2017_08_27_064352_create_residentregistrations_table',0),(440,'2017_08_27_064352_create_residents_table',0),(441,'2017_08_27_064352_create_services_table',0),(442,'2017_08_27_064352_create_servicesponsorships_table',0),(443,'2017_08_27_064352_create_servicetransactions_table',0),(444,'2017_08_27_064352_create_servicetypes_table',0),(445,'2017_08_27_064352_create_streets_table',0),(446,'2017_08_27_064352_create_sysutil_table',0),(447,'2017_08_27_064352_create_units_table',0),(448,'2017_08_27_064352_create_users_table',0),(449,'2017_08_27_064352_create_utilities_table',0),(450,'2017_08_27_064352_create_voters_table',0),(451,'2017_08_27_064358_add_foreign_keys_to_buildings_table',0),(452,'2017_08_27_064358_add_foreign_keys_to_businesses_table',0),(453,'2017_08_27_064358_add_foreign_keys_to_businessregistrations_table',0),(454,'2017_08_27_064358_add_foreign_keys_to_collections_table',0),(455,'2017_08_27_064358_add_foreign_keys_to_document_requirements_table',0),(456,'2017_08_27_064358_add_foreign_keys_to_documentrequests_table',0),(457,'2017_08_27_064358_add_foreign_keys_to_employeeposition_table',0),(458,'2017_08_27_064358_add_foreign_keys_to_facilities_table',0),(459,'2017_08_27_064358_add_foreign_keys_to_families_table',0),(460,'2017_08_27_064358_add_foreign_keys_to_familymembers_table',0),(461,'2017_08_27_064358_add_foreign_keys_to_generaladdresses_table',0),(462,'2017_08_27_064358_add_foreign_keys_to_lots_table',0),(463,'2017_08_27_064358_add_foreign_keys_to_participants_table',0),(464,'2017_08_27_064358_add_foreign_keys_to_partrecipients_table',0),(465,'2017_08_27_064358_add_foreign_keys_to_requestrequirements_table',0),(466,'2017_08_27_064358_add_foreign_keys_to_reservations_table',0),(467,'2017_08_27_064358_add_foreign_keys_to_residentaccountregistrations_table',0),(468,'2017_08_27_064358_add_foreign_keys_to_residentaccounts_table',0),(469,'2017_08_27_064358_add_foreign_keys_to_residentbackgrounds_table',0),(470,'2017_08_27_064358_add_foreign_keys_to_residentregistrations_table',0),(471,'2017_08_27_064358_add_foreign_keys_to_services_table',0),(472,'2017_08_27_064358_add_foreign_keys_to_servicesponsorships_table',0),(473,'2017_08_27_064358_add_foreign_keys_to_servicetransactions_table',0),(474,'2017_08_27_064358_add_foreign_keys_to_units_table',0),(475,'2017_08_27_064358_add_foreign_keys_to_voters_table',0),(476,'2017_09_17_155408_create_buildings_table',0),(477,'2017_09_17_155408_create_buildingtypes_table',0),(478,'2017_09_17_155408_create_businesscategories_table',0),(479,'2017_09_17_155408_create_businesses_table',0),(480,'2017_09_17_155408_create_businessregistrations_table',0),(481,'2017_09_17_155408_create_collections_table',0),(482,'2017_09_17_155408_create_document_requirements_table',0),(483,'2017_09_17_155408_create_documentrequests_table',0),(484,'2017_09_17_155408_create_documents_table',0),(485,'2017_09_17_155408_create_employeeposition_table',0),(486,'2017_09_17_155408_create_employees_table',0),(487,'2017_09_17_155408_create_facilities_table',0),(488,'2017_09_17_155408_create_facilitytypes_table',0),(489,'2017_09_17_155408_create_families_table',0),(490,'2017_09_17_155408_create_familymembers_table',0),(491,'2017_09_17_155408_create_generaladdresses_table',0),(492,'2017_09_17_155408_create_lots_table',0),(493,'2017_09_17_155408_create_participants_table',0),(494,'2017_09_17_155408_create_partrecipients_table',0),(495,'2017_09_17_155408_create_people_table',0),(496,'2017_09_17_155408_create_recipients_table',0),(497,'2017_09_17_155408_create_requestrequirements_table',0),(498,'2017_09_17_155408_create_requirements_table',0),(499,'2017_09_17_155408_create_reservations_table',0),(500,'2017_09_17_155408_create_residentaccountregistrations_table',0),(501,'2017_09_17_155408_create_residentaccounts_table',0),(502,'2017_09_17_155408_create_residentbackgrounds_table',0),(503,'2017_09_17_155408_create_residentregistrations_table',0),(504,'2017_09_17_155408_create_residents_table',0),(505,'2017_09_17_155408_create_services_table',0),(506,'2017_09_17_155408_create_servicesponsorships_table',0),(507,'2017_09_17_155408_create_servicetransactions_table',0),(508,'2017_09_17_155408_create_servicetypes_table',0),(509,'2017_09_17_155408_create_streets_table',0),(510,'2017_09_17_155408_create_sysutil_table',0),(511,'2017_09_17_155408_create_units_table',0),(512,'2017_09_17_155408_create_users_table',0),(513,'2017_09_17_155408_create_utilities_table',0),(514,'2017_09_17_155408_create_voters_table',0),(515,'2017_09_17_155416_add_foreign_keys_to_buildings_table',0),(516,'2017_09_17_155416_add_foreign_keys_to_businesses_table',0),(517,'2017_09_17_155416_add_foreign_keys_to_businessregistrations_table',0),(518,'2017_09_17_155416_add_foreign_keys_to_collections_table',0),(519,'2017_09_17_155416_add_foreign_keys_to_document_requirements_table',0),(520,'2017_09_17_155416_add_foreign_keys_to_documentrequests_table',0),(521,'2017_09_17_155416_add_foreign_keys_to_employeeposition_table',0),(522,'2017_09_17_155416_add_foreign_keys_to_facilities_table',0),(523,'2017_09_17_155416_add_foreign_keys_to_families_table',0),(524,'2017_09_17_155416_add_foreign_keys_to_familymembers_table',0),(525,'2017_09_17_155416_add_foreign_keys_to_generaladdresses_table',0),(526,'2017_09_17_155416_add_foreign_keys_to_lots_table',0),(527,'2017_09_17_155416_add_foreign_keys_to_participants_table',0),(528,'2017_09_17_155416_add_foreign_keys_to_partrecipients_table',0),(529,'2017_09_17_155416_add_foreign_keys_to_requestrequirements_table',0),(530,'2017_09_17_155416_add_foreign_keys_to_reservations_table',0),(531,'2017_09_17_155416_add_foreign_keys_to_residentaccountregistrations_table',0),(532,'2017_09_17_155416_add_foreign_keys_to_residentaccounts_table',0),(533,'2017_09_17_155416_add_foreign_keys_to_residentbackgrounds_table',0),(534,'2017_09_17_155416_add_foreign_keys_to_residentregistrations_table',0),(535,'2017_09_17_155416_add_foreign_keys_to_services_table',0),(536,'2017_09_17_155416_add_foreign_keys_to_servicesponsorships_table',0),(537,'2017_09_17_155416_add_foreign_keys_to_servicetransactions_table',0),(538,'2017_09_17_155416_add_foreign_keys_to_units_table',0),(539,'2017_09_17_155416_add_foreign_keys_to_voters_table',0),(540,'2017_09_18_065430_create_buildings_table',0),(541,'2017_09_18_065430_create_buildingtypes_table',0),(542,'2017_09_18_065430_create_businesscategories_table',0),(543,'2017_09_18_065430_create_businesses_table',0),(544,'2017_09_18_065430_create_businessregistrations_table',0),(545,'2017_09_18_065430_create_collections_table',0),(546,'2017_09_18_065430_create_document_requirements_table',0),(547,'2017_09_18_065430_create_documentrequests_table',0),(548,'2017_09_18_065430_create_documents_table',0),(549,'2017_09_18_065430_create_employeeposition_table',0),(550,'2017_09_18_065430_create_employees_table',0),(551,'2017_09_18_065430_create_facilities_table',0),(552,'2017_09_18_065430_create_facilitytypes_table',0),(553,'2017_09_18_065430_create_families_table',0),(554,'2017_09_18_065430_create_familymembers_table',0),(555,'2017_09_18_065430_create_generaladdresses_table',0),(556,'2017_09_18_065430_create_lots_table',0),(557,'2017_09_18_065430_create_participants_table',0),(558,'2017_09_18_065430_create_partrecipients_table',0),(559,'2017_09_18_065430_create_people_table',0),(560,'2017_09_18_065430_create_recipients_table',0),(561,'2017_09_18_065430_create_requestrequirements_table',0),(562,'2017_09_18_065430_create_requirements_table',0),(563,'2017_09_18_065430_create_reservations_table',0),(564,'2017_09_18_065430_create_residentaccountregistrations_table',0),(565,'2017_09_18_065430_create_residentaccounts_table',0),(566,'2017_09_18_065430_create_residentbackgrounds_table',0),(567,'2017_09_18_065430_create_residentregistrations_table',0),(568,'2017_09_18_065430_create_residents_table',0),(569,'2017_09_18_065430_create_services_table',0),(570,'2017_09_18_065430_create_servicesponsorships_table',0),(571,'2017_09_18_065430_create_servicetransactions_table',0),(572,'2017_09_18_065430_create_servicetypes_table',0),(573,'2017_09_18_065430_create_streets_table',0),(574,'2017_09_18_065430_create_sysutil_table',0),(575,'2017_09_18_065430_create_units_table',0),(576,'2017_09_18_065430_create_users_table',0),(577,'2017_09_18_065430_create_utilities_table',0),(578,'2017_09_18_065430_create_voters_table',0),(579,'2017_09_18_065438_add_foreign_keys_to_buildings_table',0),(580,'2017_09_18_065438_add_foreign_keys_to_businesses_table',0),(581,'2017_09_18_065438_add_foreign_keys_to_businessregistrations_table',0),(582,'2017_09_18_065438_add_foreign_keys_to_collections_table',0),(583,'2017_09_18_065438_add_foreign_keys_to_document_requirements_table',0),(584,'2017_09_18_065438_add_foreign_keys_to_documentrequests_table',0),(585,'2017_09_18_065438_add_foreign_keys_to_employeeposition_table',0),(586,'2017_09_18_065438_add_foreign_keys_to_facilities_table',0),(587,'2017_09_18_065438_add_foreign_keys_to_families_table',0),(588,'2017_09_18_065438_add_foreign_keys_to_familymembers_table',0),(589,'2017_09_18_065438_add_foreign_keys_to_generaladdresses_table',0),(590,'2017_09_18_065438_add_foreign_keys_to_lots_table',0),(591,'2017_09_18_065438_add_foreign_keys_to_participants_table',0),(592,'2017_09_18_065438_add_foreign_keys_to_partrecipients_table',0),(593,'2017_09_18_065438_add_foreign_keys_to_requestrequirements_table',0),(594,'2017_09_18_065438_add_foreign_keys_to_reservations_table',0),(595,'2017_09_18_065438_add_foreign_keys_to_residentaccountregistrations_table',0),(596,'2017_09_18_065438_add_foreign_keys_to_residentaccounts_table',0),(597,'2017_09_18_065438_add_foreign_keys_to_residentbackgrounds_table',0),(598,'2017_09_18_065438_add_foreign_keys_to_residentregistrations_table',0),(599,'2017_09_18_065438_add_foreign_keys_to_services_table',0),(600,'2017_09_18_065438_add_foreign_keys_to_servicesponsorships_table',0),(601,'2017_09_18_065438_add_foreign_keys_to_servicetransactions_table',0),(602,'2017_09_18_065438_add_foreign_keys_to_units_table',0),(603,'2017_09_18_065438_add_foreign_keys_to_voters_table',0),(604,'2017_09_20_030415_create_buildings_table',0),(605,'2017_09_20_030415_create_buildingtypes_table',0),(606,'2017_09_20_030415_create_businesscategories_table',0),(607,'2017_09_20_030415_create_businesses_table',0),(608,'2017_09_20_030415_create_businessregistrations_table',0),(609,'2017_09_20_030415_create_collections_table',0),(610,'2017_09_20_030415_create_document_requirements_table',0),(611,'2017_09_20_030415_create_documentrequests_table',0),(612,'2017_09_20_030415_create_documents_table',0),(613,'2017_09_20_030415_create_employeeposition_table',0),(614,'2017_09_20_030415_create_employees_table',0),(615,'2017_09_20_030415_create_facilities_table',0),(616,'2017_09_20_030415_create_facilitytypes_table',0),(617,'2017_09_20_030415_create_families_table',0),(618,'2017_09_20_030415_create_familymembers_table',0),(619,'2017_09_20_030415_create_generaladdresses_table',0),(620,'2017_09_20_030415_create_lots_table',0),(621,'2017_09_20_030415_create_messages_table',0),(622,'2017_09_20_030415_create_participants_table',0),(623,'2017_09_20_030415_create_partrecipients_table',0),(624,'2017_09_20_030415_create_people_table',0),(625,'2017_09_20_030415_create_recipients_table',0),(626,'2017_09_20_030415_create_requestrequirements_table',0),(627,'2017_09_20_030415_create_requirements_table',0),(628,'2017_09_20_030415_create_reservations_table',0),(629,'2017_09_20_030415_create_residentaccountregistrations_table',0),(630,'2017_09_20_030415_create_residentaccounts_table',0),(631,'2017_09_20_030415_create_residentbackgrounds_table',0),(632,'2017_09_20_030415_create_residentregistrations_table',0),(633,'2017_09_20_030415_create_residents_table',0),(634,'2017_09_20_030415_create_services_table',0),(635,'2017_09_20_030415_create_servicesponsorships_table',0),(636,'2017_09_20_030415_create_servicetransactions_table',0),(637,'2017_09_20_030415_create_servicetypes_table',0),(638,'2017_09_20_030415_create_streets_table',0),(639,'2017_09_20_030415_create_sysutil_table',0),(640,'2017_09_20_030415_create_units_table',0),(641,'2017_09_20_030415_create_users_table',0),(642,'2017_09_20_030415_create_utilities_table',0),(643,'2017_09_20_030415_create_voters_table',0),(644,'2017_09_20_030424_add_foreign_keys_to_buildings_table',0),(645,'2017_09_20_030424_add_foreign_keys_to_businesses_table',0),(646,'2017_09_20_030424_add_foreign_keys_to_businessregistrations_table',0),(647,'2017_09_20_030424_add_foreign_keys_to_collections_table',0),(648,'2017_09_20_030424_add_foreign_keys_to_document_requirements_table',0),(649,'2017_09_20_030424_add_foreign_keys_to_documentrequests_table',0),(650,'2017_09_20_030424_add_foreign_keys_to_employeeposition_table',0),(651,'2017_09_20_030424_add_foreign_keys_to_facilities_table',0),(652,'2017_09_20_030424_add_foreign_keys_to_families_table',0),(653,'2017_09_20_030424_add_foreign_keys_to_familymembers_table',0),(654,'2017_09_20_030424_add_foreign_keys_to_generaladdresses_table',0),(655,'2017_09_20_030424_add_foreign_keys_to_lots_table',0),(656,'2017_09_20_030424_add_foreign_keys_to_messages_table',0),(657,'2017_09_20_030424_add_foreign_keys_to_participants_table',0),(658,'2017_09_20_030424_add_foreign_keys_to_partrecipients_table',0),(659,'2017_09_20_030424_add_foreign_keys_to_requestrequirements_table',0),(660,'2017_09_20_030424_add_foreign_keys_to_reservations_table',0),(661,'2017_09_20_030424_add_foreign_keys_to_residentaccountregistrations_table',0),(662,'2017_09_20_030424_add_foreign_keys_to_residentaccounts_table',0),(663,'2017_09_20_030424_add_foreign_keys_to_residentbackgrounds_table',0),(664,'2017_09_20_030424_add_foreign_keys_to_residentregistrations_table',0),(665,'2017_09_20_030424_add_foreign_keys_to_services_table',0),(666,'2017_09_20_030424_add_foreign_keys_to_servicesponsorships_table',0),(667,'2017_09_20_030424_add_foreign_keys_to_servicetransactions_table',0),(668,'2017_09_20_030424_add_foreign_keys_to_units_table',0),(669,'2017_09_20_030424_add_foreign_keys_to_voters_table',0),(670,'2017_09_20_032022_create_buildings_table',0),(671,'2017_09_20_032022_create_buildingtypes_table',0),(672,'2017_09_20_032022_create_businesscategories_table',0),(673,'2017_09_20_032022_create_businesses_table',0),(674,'2017_09_20_032022_create_businessregistrations_table',0),(675,'2017_09_20_032022_create_collections_table',0),(676,'2017_09_20_032022_create_document_requirements_table',0),(677,'2017_09_20_032022_create_documentrequests_table',0),(678,'2017_09_20_032022_create_documents_table',0),(679,'2017_09_20_032022_create_employeeposition_table',0),(680,'2017_09_20_032022_create_employees_table',0),(681,'2017_09_20_032022_create_facilities_table',0),(682,'2017_09_20_032022_create_facilitytypes_table',0),(683,'2017_09_20_032022_create_families_table',0),(684,'2017_09_20_032022_create_familymembers_table',0),(685,'2017_09_20_032022_create_generaladdresses_table',0),(686,'2017_09_20_032022_create_lots_table',0),(687,'2017_09_20_032022_create_messages_table',0),(688,'2017_09_20_032022_create_participants_table',0),(689,'2017_09_20_032022_create_partrecipients_table',0),(690,'2017_09_20_032022_create_people_table',0),(691,'2017_09_20_032022_create_recipients_table',0),(692,'2017_09_20_032022_create_requestrequirements_table',0),(693,'2017_09_20_032022_create_requirements_table',0),(694,'2017_09_20_032022_create_reservations_table',0),(695,'2017_09_20_032022_create_residentaccountregistrations_table',0),(696,'2017_09_20_032022_create_residentaccounts_table',0),(697,'2017_09_20_032022_create_residentbackgrounds_table',0),(698,'2017_09_20_032022_create_residentregistrations_table',0),(699,'2017_09_20_032022_create_residents_table',0),(700,'2017_09_20_032022_create_services_table',0),(701,'2017_09_20_032022_create_servicesponsorships_table',0),(702,'2017_09_20_032022_create_servicetransactions_table',0),(703,'2017_09_20_032022_create_servicetypes_table',0),(704,'2017_09_20_032022_create_streets_table',0),(705,'2017_09_20_032022_create_sysutil_table',0),(706,'2017_09_20_032022_create_units_table',0),(707,'2017_09_20_032022_create_users_table',0),(708,'2017_09_20_032022_create_utilities_table',0),(709,'2017_09_20_032022_create_voters_table',0),(710,'2017_09_20_032044_add_foreign_keys_to_buildings_table',0),(711,'2017_09_20_032044_add_foreign_keys_to_businesses_table',0),(712,'2017_09_20_032044_add_foreign_keys_to_businessregistrations_table',0),(713,'2017_09_20_032044_add_foreign_keys_to_collections_table',0),(714,'2017_09_20_032044_add_foreign_keys_to_document_requirements_table',0),(715,'2017_09_20_032044_add_foreign_keys_to_documentrequests_table',0),(716,'2017_09_20_032044_add_foreign_keys_to_employeeposition_table',0),(717,'2017_09_20_032044_add_foreign_keys_to_facilities_table',0),(718,'2017_09_20_032044_add_foreign_keys_to_families_table',0),(719,'2017_09_20_032044_add_foreign_keys_to_familymembers_table',0),(720,'2017_09_20_032044_add_foreign_keys_to_generaladdresses_table',0),(721,'2017_09_20_032044_add_foreign_keys_to_lots_table',0),(722,'2017_09_20_032044_add_foreign_keys_to_messages_table',0),(723,'2017_09_20_032044_add_foreign_keys_to_participants_table',0),(724,'2017_09_20_032044_add_foreign_keys_to_partrecipients_table',0),(725,'2017_09_20_032044_add_foreign_keys_to_requestrequirements_table',0),(726,'2017_09_20_032044_add_foreign_keys_to_reservations_table',0),(727,'2017_09_20_032044_add_foreign_keys_to_residentaccountregistrations_table',0),(728,'2017_09_20_032044_add_foreign_keys_to_residentaccounts_table',0),(729,'2017_09_20_032044_add_foreign_keys_to_residentbackgrounds_table',0),(730,'2017_09_20_032044_add_foreign_keys_to_residentregistrations_table',0),(731,'2017_09_20_032044_add_foreign_keys_to_services_table',0),(732,'2017_09_20_032044_add_foreign_keys_to_servicesponsorships_table',0),(733,'2017_09_20_032044_add_foreign_keys_to_servicetransactions_table',0),(734,'2017_09_20_032044_add_foreign_keys_to_units_table',0),(735,'2017_09_20_032044_add_foreign_keys_to_voters_table',0),(736,'2017_09_20_161610_create_buildings_table',0),(737,'2017_09_20_161610_create_buildingtypes_table',0),(738,'2017_09_20_161610_create_businesscategories_table',0),(739,'2017_09_20_161610_create_businesses_table',0),(740,'2017_09_20_161610_create_businessregistrations_table',0),(741,'2017_09_20_161610_create_collections_table',0),(742,'2017_09_20_161610_create_document_requirements_table',0),(743,'2017_09_20_161610_create_documentrequests_table',0),(744,'2017_09_20_161610_create_documents_table',0),(745,'2017_09_20_161610_create_employeeposition_table',0),(746,'2017_09_20_161610_create_employees_table',0),(747,'2017_09_20_161610_create_facilities_table',0),(748,'2017_09_20_161610_create_facilitytypes_table',0),(749,'2017_09_20_161610_create_families_table',0),(750,'2017_09_20_161610_create_familymembers_table',0),(751,'2017_09_20_161610_create_generaladdresses_table',0),(752,'2017_09_20_161610_create_lots_table',0),(753,'2017_09_20_161610_create_messages_table',0),(754,'2017_09_20_161610_create_participants_table',0),(755,'2017_09_20_161610_create_partrecipients_table',0),(756,'2017_09_20_161610_create_people_table',0),(757,'2017_09_20_161610_create_recipients_table',0),(758,'2017_09_20_161610_create_requestrequirements_table',0),(759,'2017_09_20_161610_create_requirements_table',0),(760,'2017_09_20_161610_create_reservations_table',0),(761,'2017_09_20_161610_create_residentaccountregistrations_table',0),(762,'2017_09_20_161610_create_residentaccounts_table',0),(763,'2017_09_20_161610_create_residentbackgrounds_table',0),(764,'2017_09_20_161610_create_residentregistrations_table',0),(765,'2017_09_20_161610_create_residents_table',0),(766,'2017_09_20_161610_create_services_table',0),(767,'2017_09_20_161610_create_servicesponsorships_table',0),(768,'2017_09_20_161610_create_servicetransactions_table',0),(769,'2017_09_20_161610_create_servicetypes_table',0),(770,'2017_09_20_161610_create_streets_table',0),(771,'2017_09_20_161610_create_sysutil_table',0),(772,'2017_09_20_161610_create_units_table',0),(773,'2017_09_20_161610_create_users_table',0),(774,'2017_09_20_161610_create_utilities_table',0),(775,'2017_09_20_161610_create_voters_table',0),(776,'2017_09_20_161617_add_foreign_keys_to_buildings_table',0),(777,'2017_09_20_161617_add_foreign_keys_to_businesses_table',0),(778,'2017_09_20_161617_add_foreign_keys_to_businessregistrations_table',0),(779,'2017_09_20_161617_add_foreign_keys_to_collections_table',0),(780,'2017_09_20_161617_add_foreign_keys_to_document_requirements_table',0),(781,'2017_09_20_161617_add_foreign_keys_to_documentrequests_table',0),(782,'2017_09_20_161617_add_foreign_keys_to_employeeposition_table',0),(783,'2017_09_20_161617_add_foreign_keys_to_facilities_table',0),(784,'2017_09_20_161617_add_foreign_keys_to_families_table',0),(785,'2017_09_20_161617_add_foreign_keys_to_familymembers_table',0),(786,'2017_09_20_161617_add_foreign_keys_to_generaladdresses_table',0),(787,'2017_09_20_161617_add_foreign_keys_to_lots_table',0),(788,'2017_09_20_161617_add_foreign_keys_to_messages_table',0),(789,'2017_09_20_161617_add_foreign_keys_to_participants_table',0),(790,'2017_09_20_161617_add_foreign_keys_to_partrecipients_table',0),(791,'2017_09_20_161617_add_foreign_keys_to_requestrequirements_table',0),(792,'2017_09_20_161617_add_foreign_keys_to_reservations_table',0),(793,'2017_09_20_161617_add_foreign_keys_to_residentaccountregistrations_table',0),(794,'2017_09_20_161617_add_foreign_keys_to_residentaccounts_table',0),(795,'2017_09_20_161617_add_foreign_keys_to_residentbackgrounds_table',0),(796,'2017_09_20_161617_add_foreign_keys_to_residentregistrations_table',0),(797,'2017_09_20_161617_add_foreign_keys_to_services_table',0),(798,'2017_09_20_161617_add_foreign_keys_to_servicesponsorships_table',0),(799,'2017_09_20_161617_add_foreign_keys_to_servicetransactions_table',0),(800,'2017_09_20_161617_add_foreign_keys_to_units_table',0),(801,'2017_09_20_161617_add_foreign_keys_to_voters_table',0),(802,'2017_09_20_164901_create_buildings_table',0),(803,'2017_09_20_164901_create_buildingtypes_table',0),(804,'2017_09_20_164901_create_businesscategories_table',0),(805,'2017_09_20_164901_create_businesses_table',0),(806,'2017_09_20_164901_create_businessregistrations_table',0),(807,'2017_09_20_164901_create_collections_table',0),(808,'2017_09_20_164901_create_document_requirements_table',0),(809,'2017_09_20_164901_create_documentrequests_table',0),(810,'2017_09_20_164901_create_documents_table',0),(811,'2017_09_20_164901_create_employeeposition_table',0),(812,'2017_09_20_164901_create_employees_table',0),(813,'2017_09_20_164901_create_facilities_table',0),(814,'2017_09_20_164901_create_facilitytypes_table',0),(815,'2017_09_20_164901_create_families_table',0),(816,'2017_09_20_164901_create_familymembers_table',0),(817,'2017_09_20_164901_create_generaladdresses_table',0),(818,'2017_09_20_164901_create_lots_table',0),(819,'2017_09_20_164901_create_messages_table',0),(820,'2017_09_20_164901_create_participants_table',0),(821,'2017_09_20_164901_create_partrecipients_table',0),(822,'2017_09_20_164901_create_people_table',0),(823,'2017_09_20_164901_create_recipients_table',0),(824,'2017_09_20_164901_create_requestrequirements_table',0),(825,'2017_09_20_164901_create_requirements_table',0),(826,'2017_09_20_164901_create_reservations_table',0),(827,'2017_09_20_164901_create_residentaccountregistrations_table',0),(828,'2017_09_20_164901_create_residentaccounts_table',0),(829,'2017_09_20_164901_create_residentbackgrounds_table',0),(830,'2017_09_20_164901_create_residentregistrations_table',0),(831,'2017_09_20_164901_create_residents_table',0),(832,'2017_09_20_164901_create_services_table',0),(833,'2017_09_20_164901_create_servicesponsorships_table',0),(834,'2017_09_20_164901_create_servicetransactions_table',0),(835,'2017_09_20_164901_create_servicetypes_table',0),(836,'2017_09_20_164901_create_streets_table',0),(837,'2017_09_20_164901_create_sysutil_table',0),(838,'2017_09_20_164901_create_units_table',0),(839,'2017_09_20_164901_create_users_table',0),(840,'2017_09_20_164901_create_utilities_table',0),(841,'2017_09_20_164901_create_voters_table',0),(842,'2017_09_20_164907_add_foreign_keys_to_buildings_table',0),(843,'2017_09_20_164907_add_foreign_keys_to_businesses_table',0),(844,'2017_09_20_164907_add_foreign_keys_to_businessregistrations_table',0),(845,'2017_09_20_164907_add_foreign_keys_to_collections_table',0),(846,'2017_09_20_164907_add_foreign_keys_to_document_requirements_table',0),(847,'2017_09_20_164907_add_foreign_keys_to_documentrequests_table',0),(848,'2017_09_20_164907_add_foreign_keys_to_employeeposition_table',0),(849,'2017_09_20_164907_add_foreign_keys_to_facilities_table',0),(850,'2017_09_20_164907_add_foreign_keys_to_families_table',0),(851,'2017_09_20_164907_add_foreign_keys_to_familymembers_table',0),(852,'2017_09_20_164907_add_foreign_keys_to_generaladdresses_table',0),(853,'2017_09_20_164907_add_foreign_keys_to_lots_table',0),(854,'2017_09_20_164907_add_foreign_keys_to_messages_table',0),(855,'2017_09_20_164907_add_foreign_keys_to_participants_table',0),(856,'2017_09_20_164907_add_foreign_keys_to_partrecipients_table',0),(857,'2017_09_20_164907_add_foreign_keys_to_requestrequirements_table',0),(858,'2017_09_20_164907_add_foreign_keys_to_reservations_table',0),(859,'2017_09_20_164907_add_foreign_keys_to_residentaccountregistrations_table',0),(860,'2017_09_20_164907_add_foreign_keys_to_residentaccounts_table',0),(861,'2017_09_20_164907_add_foreign_keys_to_residentbackgrounds_table',0),(862,'2017_09_20_164907_add_foreign_keys_to_residentregistrations_table',0),(863,'2017_09_20_164907_add_foreign_keys_to_services_table',0),(864,'2017_09_20_164907_add_foreign_keys_to_servicesponsorships_table',0),(865,'2017_09_20_164907_add_foreign_keys_to_servicetransactions_table',0),(866,'2017_09_20_164907_add_foreign_keys_to_units_table',0),(867,'2017_09_20_164907_add_foreign_keys_to_voters_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `participantID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceTransactionPrimeID` int(11) NOT NULL,
  `residentID` int(11) NOT NULL,
  `dateRegistered` datetime NOT NULL,
  PRIMARY KEY (`participantID`),
  KEY `serviceTransactionID_idx` (`serviceTransactionPrimeID`),
  KEY `residentID_idx` (`residentID`),
  CONSTRAINT `residentID` FOREIGN KEY (`residentID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `serviceTransactionPrimeID` FOREIGN KEY (`serviceTransactionPrimeID`) REFERENCES `servicetransactions` (`serviceTransactionPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (2,6,2,'2017-08-24 15:45:55'),(3,6,3,'2017-08-26 06:43:55'),(4,6,4,'2017-08-26 06:43:58'),(6,1,2,'2017-08-26 06:55:51'),(7,7,3,'2017-08-29 08:44:52'),(8,7,2,'2017-08-29 08:44:56'),(9,6,6,'2017-08-29 16:40:13'),(11,8,8,'2017-08-30 03:56:48'),(12,9,2,'2017-09-09 04:44:37'),(13,9,6,'2017-09-09 04:44:42'),(14,8,6,'2017-09-16 03:35:32'),(15,8,3,'2017-09-16 03:35:48');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partrecipients`
--

DROP TABLE IF EXISTS `partrecipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partrecipients` (
  `partrecipientID` int(11) NOT NULL AUTO_INCREMENT,
  `participantID` int(11) NOT NULL,
  `recipientID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `archive` tinyint(4) NOT NULL,
  PRIMARY KEY (`partrecipientID`),
  KEY `recipientID_idx` (`recipientID`),
  KEY `participantID_idx` (`participantID`),
  CONSTRAINT `participantID` FOREIGN KEY (`participantID`) REFERENCES `participants` (`participantID`) ON UPDATE CASCADE,
  CONSTRAINT `recipientID` FOREIGN KEY (`recipientID`) REFERENCES `recipients` (`recipientID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partrecipients`
--

LOCK TABLES `partrecipients` WRITE;
/*!40000 ALTER TABLE `partrecipients` DISABLE KEYS */;
INSERT INTO `partrecipients` VALUES (3,2,4,1,0),(6,2,2,1,0),(7,7,2,2,0),(8,11,2,2,0),(9,13,2,2,0),(10,14,2,2,0);
/*!40000 ALTER TABLE `partrecipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `peoplePrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `personID` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `contactNumber` varchar(14) NOT NULL,
  `gender` char(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`peoplePrimeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'PER_001','MMM','AAAFFF','ASDASD',NULL,'09123456789','M',1,0);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipients`
--

DROP TABLE IF EXISTS `recipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipients` (
  `recipientID` int(11) NOT NULL AUTO_INCREMENT,
  `recipientName` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `archive` tinyint(4) NOT NULL,
  PRIMARY KEY (`recipientID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipients`
--

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;
INSERT INTO `recipients` VALUES (2,'Dog',1,0),(3,'Plants',1,0),(4,'Tree',1,0),(5,'Cats',1,0);
/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requestrequirements`
--

DROP TABLE IF EXISTS `requestrequirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requestrequirements` (
  `requestrequirementsID` int(11) NOT NULL AUTO_INCREMENT,
  `documentRequestPrimeID` int(11) NOT NULL,
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  `requirementID` int(11) NOT NULL,
  PRIMARY KEY (`requestrequirementsID`),
  KEY `documentRequestPrimeID_idx` (`documentRequestPrimeID`),
  KEY `requirementID_idx` (`requirementID`),
  CONSTRAINT `documentRequestPrimeID` FOREIGN KEY (`documentRequestPrimeID`) REFERENCES `documentrequests` (`documentRequestPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requestrequirements`
--

LOCK TABLES `requestrequirements` WRITE;
/*!40000 ALTER TABLE `requestrequirements` DISABLE KEYS */;
INSERT INTO `requestrequirements` VALUES (24,5,0,1),(25,5,0,3),(26,7,0,1),(27,7,0,2),(32,8,0,1),(33,8,0,3),(35,9,0,1),(36,9,0,2),(37,10,0,1),(38,11,0,1),(41,12,0,1),(42,12,0,2),(43,12,0,4),(45,14,0,1),(46,14,0,2),(47,15,0,1),(48,15,0,2),(49,15,0,4),(55,13,0,1),(56,13,0,4),(57,16,0,1),(58,16,0,2),(59,16,0,4);
/*!40000 ALTER TABLE `requestrequirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirements` (
  `requirementID` int(11) NOT NULL AUTO_INCREMENT,
  `requirementName` varchar(100) NOT NULL,
  `requirementDesc` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`requirementID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,'Identity Card','ID',1,0),(2,'SSS','',1,0),(3,'BIR','',1,0),(4,'NBI CLEARANCE','',1,0),(5,'Office ID','Office ID',1,1),(6,'PhilHealth ID','',1,0);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `reservationName` varchar(30) NOT NULL,
  `reservationDescription` varchar(500) DEFAULT NULL,
  `reservationStart` time NOT NULL,
  `reservationEnd` time NOT NULL,
  `dateReserved` date NOT NULL,
  `peoplePrimeID` int(11) DEFAULT NULL,
  `facilityPrimeID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`primeID`),
  KEY `fk_Reservations_People1_idx` (`peoplePrimeID`),
  KEY `fk_Reservations_Facilities1_idx` (`facilityPrimeID`),
  CONSTRAINT `fk_Reservations_Facilities1` FOREIGN KEY (`facilityPrimeID`) REFERENCES `facilities` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `peoplePrimeID` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (20,'Debut','','14:00:00','18:00:00','2017-08-31',2,1,'Paid',NULL,NULL,NULL,NULL),(21,'League','','12:00:00','14:00:00','2017-09-01',5,1,'Pending',NULL,NULL,NULL,NULL),(22,'Birthday Party','','20:00:00','23:00:00','2017-09-06',6,1,'Pending',NULL,NULL,NULL,NULL),(23,'Basket ball league','','10:00:00','12:00:00','2017-10-31',8,1,'Paid',NULL,NULL,NULL,NULL),(24,'Test12345','test','20:00:00','09:00:00','2017-09-16',2,1,'Pending',NULL,NULL,NULL,NULL),(25,'qwewerqwerqwer','','10:00:00','11:00:00','2017-09-16',2,1,'Paid',NULL,NULL,NULL,NULL),(26,'Birthday Party ni bry','debut','10:00:00','12:00:00','2017-09-17',5,1,'Rescheduled',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residentaccountregistrations`
--

DROP TABLE IF EXISTS `residentaccountregistrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residentaccountregistrations` (
  `registrationID` int(11) NOT NULL AUTO_INCREMENT,
  `registrationDate` datetime NOT NULL,
  `accountPrimeID` int(11) NOT NULL,
  PRIMARY KEY (`registrationID`),
  KEY `fk_ResidentAccountRegistrations_ResidentAccounts1_idx` (`accountPrimeID`),
  CONSTRAINT `fk_ResidentAccountRegistrations_ResidentAccounts1` FOREIGN KEY (`accountPrimeID`) REFERENCES `residentaccounts` (`accountPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentaccountregistrations`
--

LOCK TABLES `residentaccountregistrations` WRITE;
/*!40000 ALTER TABLE `residentaccountregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentaccountregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residentaccounts`
--

DROP TABLE IF EXISTS `residentaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residentaccounts` (
  `accountPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `accountID` varchar(20) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `accessCode` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`accountPrimeID`),
  KEY `fk_ResidentAccounts_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_ResidentAccounts_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentaccounts`
--

LOCK TABLES `residentaccounts` WRITE;
/*!40000 ALTER TABLE `residentaccounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residentbackgrounds`
--

DROP TABLE IF EXISTS `residentbackgrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residentbackgrounds` (
  `backgroundPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `currentWork` varchar(40) NOT NULL,
  `monthlyIncome` varchar(40) NOT NULL,
  `dateStarted` date DEFAULT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`backgroundPrimeID`),
  KEY `fk_residentBackgrounds_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_residentBackgrounds_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
INSERT INTO `residentbackgrounds` VALUES (1,'CEO','₱100,001 and above','2017-08-22',2,1,0),(2,'Software Engineer','₱50,001-₱100,000','2017-08-22',3,1,0),(3,'CPA','₱50,001-₱100,000','2017-08-22',4,1,0),(4,'CEO','₱100,001 and above','2017-08-22',5,1,0),(5,'CEO','₱100,001 and above','2017-08-27',2,1,0),(6,'CEO','₱100,001 and above','2017-08-27',2,1,0),(7,'CEO','₱50,001-₱100,000','2017-08-29',2,1,0),(8,'CEO','₱100,001 and above','2017-08-29',2,1,0),(9,'CEO','₱100,001 and above','2017-08-29',6,1,0),(10,'None','₱0-₱10,000','2017-08-29',7,1,0),(11,'CEO','₱100,001 and above','2017-08-30',8,1,0),(12,'CEO','₱100,001 and above','2017-08-30',2,1,0);
/*!40000 ALTER TABLE `residentbackgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residentregistrations`
--

DROP TABLE IF EXISTS `residentregistrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residentregistrations` (
  `registrationID` int(11) NOT NULL AUTO_INCREMENT,
  `registrationDate` datetime NOT NULL,
  `employeePrimeID` int(11) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`registrationID`),
  KEY `fk_ResidentRegistrations_Employees1_idx` (`employeePrimeID`),
  KEY `fk_ResidentRegistrations_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_ResidentRegistrations_Employees1` FOREIGN KEY (`employeePrimeID`) REFERENCES `employees` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResidentRegistrations_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentregistrations`
--

LOCK TABLES `residentregistrations` WRITE;
/*!40000 ALTER TABLE `residentregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residents` (
  `residentPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `residentID` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `contactNumber` varchar(14) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthDate` date NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `seniorCitizenID` varchar(20) DEFAULT NULL,
  `disabilities` varchar(250) DEFAULT NULL,
  `residentType` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `imagePath` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`residentPrimeID`),
  KEY `fk_Residents_People1_idx` (`residentPrimeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (2,'RES_001','Marc Joseph','Mendoza','Fuellas',NULL,'09263526321','M','1998-06-18','Single',NULL,'HIV','Official',1,'4bf0c0b006fa76b0f5b783874deddb06.jpg'),(3,'RES_002','Gianne Mae','Mendoza','Fuellas',NULL,'09123456789','F','1997-04-26','Single',NULL,NULL,'Official',1,'7c15f23c241b8569a845fd3c99b95d98.jpg'),(4,'RES_003','Raymond','Averilla','Fuellas',NULL,'09876543211','M','1996-08-07','Married',NULL,NULL,'Official',1,'10.jpg'),(5,'RES_004','Bryan James','Reyes','Illaga',NULL,'09876543212','M','1999-12-01','Widowed',NULL,NULL,'Transient',1,'11enrique.jpg'),(6,'RES_005','Moira Kelly','Antonio','Del Mundo',NULL,'09123456789','F','1998-02-08','Single',NULL,NULL,'Official',1,'15873194_386425791708882_1865123785069904347_n.jpg'),(7,'RES_006','Moiro','Antonio','Del Mundo',NULL,'09263526321','M','2003-05-01','Single',NULL,NULL,'Official',1,'2015-12-25 18.20.31.jpg'),(8,'RES_007','John','Cruz','Perez',NULL,'09234567891','M','1998-04-01','Married',NULL,NULL,'Transient',1,'7c15f23c241b8569a845fd3c99b95d98.jpg');
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceID` varchar(20) NOT NULL,
  `serviceName` varchar(30) NOT NULL,
  `serviceDesc` varchar(500) DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`primeID`),
  KEY `fk_Services_ServiceTypes1_idx` (`typeID`),
  CONSTRAINT `fk_Services_ServiceTypes1` FOREIGN KEY (`typeID`) REFERENCES `servicetypes` (`typeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'SERV_001','Vaccination',NULL,1,1,0),(2,'SERV_002','Circumcision','',1,1,0);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicesponsorships`
--

DROP TABLE IF EXISTS `servicesponsorships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicesponsorships` (
  `sponsorPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `sponsorshipDate` datetime NOT NULL,
  `servicePrimeID` int(11) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  `startOfImplementation` datetime NOT NULL,
  `endOfImplementation` datetime NOT NULL,
  PRIMARY KEY (`sponsorPrimeID`),
  KEY `fk_ServiceSponsorships_People1_idx` (`peoplePrimeID`),
  KEY `fk_ServiceSponsorships_Services1_idx` (`servicePrimeID`),
  CONSTRAINT `fk_ServiceSponsorships_People1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ServiceSponsorships_Services1` FOREIGN KEY (`servicePrimeID`) REFERENCES `services` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicesponsorships`
--

LOCK TABLES `servicesponsorships` WRITE;
/*!40000 ALTER TABLE `servicesponsorships` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicesponsorships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicetransactions`
--

DROP TABLE IF EXISTS `servicetransactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetransactions` (
  `serviceTransactionPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceTransactionID` varchar(45) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `servicePrimeID` int(11) NOT NULL,
  `fromAge` int(11) DEFAULT NULL,
  `toAge` int(11) DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Pending',
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`serviceTransactionPrimeID`),
  KEY `servicePrimeID_idx` (`servicePrimeID`),
  CONSTRAINT `servicePrimeID` FOREIGN KEY (`servicePrimeID`) REFERENCES `services` (`primeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetransactions`
--

LOCK TABLES `servicetransactions` WRITE;
/*!40000 ALTER TABLE `servicetransactions` DISABLE KEYS */;
INSERT INTO `servicetransactions` VALUES (1,'SERV_REG_001','2017 Contis Vaccination',1,4,7,'2017-01-01','2017-01-01','On-going',1),(6,'SERV_REG_002','2017 Contis Vaccination',1,NULL,NULL,'2017-08-10',NULL,'On-going',0),(7,'SERV_REG_003','2017 Valdez Circumcision',2,NULL,NULL,'2017-08-30',NULL,'On-going',0),(8,'SERV_REG_004','2017 Del Mundo Vaccination',1,NULL,NULL,'2017-09-05',NULL,'Finished',0),(9,'SERV_REG_005','Dog vaccine',1,NULL,NULL,'2017-09-16',NULL,'Finished',0);
/*!40000 ALTER TABLE `servicetransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicetypes`
--

DROP TABLE IF EXISTS `servicetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetypes` (
  `typeID` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(20) NOT NULL,
  `typeDesc` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetypes`
--

LOCK TABLES `servicetypes` WRITE;
/*!40000 ALTER TABLE `servicetypes` DISABLE KEYS */;
INSERT INTO `servicetypes` VALUES (1,'Health',NULL,1,0),(2,'Animal Welfare',NULL,1,0);
/*!40000 ALTER TABLE `servicetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `streets`
--

DROP TABLE IF EXISTS `streets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `streets` (
  `streetID` int(11) NOT NULL AUTO_INCREMENT,
  `streetName` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`streetID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `streets`
--

LOCK TABLES `streets` WRITE;
/*!40000 ALTER TABLE `streets` DISABLE KEYS */;
INSERT INTO `streets` VALUES (1,'Hipodromo',1,0),(2,'Teresa',1,0),(3,'Mahiyain',1,0);
/*!40000 ALTER TABLE `streets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sysutil`
--

DROP TABLE IF EXISTS `sysutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sysutil` (
  `sysUtilID` int(11) NOT NULL AUTO_INCREMENT,
  `brgyName` varchar(45) NOT NULL,
  PRIMARY KEY (`sysUtilID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sysutil`
--

LOCK TABLES `sysutil` WRITE;
/*!40000 ALTER TABLE `sysutil` DISABLE KEYS */;
/*!40000 ALTER TABLE `sysutil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `unitID` int(11) NOT NULL AUTO_INCREMENT,
  `unitCode` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `buildingID` int(11) DEFAULT NULL,
  PRIMARY KEY (`unitID`),
  KEY `fk_units_building1_idx` (`buildingID`),
  CONSTRAINT `fk_units_building1` FOREIGN KEY (`buildingID`) REFERENCES `buildings` (`buildingID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'1',1,0,1),(2,'2',1,0,1),(3,'100',1,0,2),(4,'101',1,0,2),(5,'T1',1,0,3),(6,'T2',1,0,3);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` tinytext NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` tinytext,
  `firstName` varchar(45) NOT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `imagePath` varchar(200) DEFAULT NULL,
  `approval` tinyint(4) NOT NULL DEFAULT '0',
  `position` varchar(45) NOT NULL,
  `accept` tinyint(4) NOT NULL DEFAULT '0',
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'skubariwa','skubariwa@gmail.com','$2y$10$vvKYTszmeQ/1iDvnm9tfKeglftn9YhWA/c42esjAvsuoleM57M43u','2017-08-28 05:23:53','2017-08-28 05:23:53','ndsuH8dVDlpd7wWW1EstT5wSS4g11ANEIqIIYU1yk1mG6dXwDQejzIIW9EyB','Marc Joseph','Mendoza','Fuellas','Jr.','4bf0c0b006fa76b0f5b783874deddb06.jpg',1,'Chairman',1,0),(2,'popo','popo@yahoo.com','$2y$10$kZ9qe7GlW5V1LFAQwUUEx.zSZQDRyPQukxSTdNV/uRsTJTBV1G8/S','2017-09-20 03:24:27','2017-08-28 05:33:05','87sVaXfZaHjczGUt9giHMKAI3KW722EQ5zUSlk61f5Ny9IdZxYCDXgBUEaF5','Jason','Santos','Pediz','popo','36058_154619721235420_678295_n.jpg',0,'Kagawad',1,0),(3,'Bryan_James','bryan_james.ilaga_lds@yahoo.com','$2y$10$Mm00HQmJ/UGUEbn7EpKXbOU7vpfyz6sT5u5AmUDnJ04QFYDMSP/Wi','2017-09-20 03:01:11','2017-08-29 08:08:53',NULL,'Bryan James','Torcelino','Ilaga',NULL,'2015-12-25 18.20.31.jpg',1,'Secretary',1,0),(4,'alahoy','alahoy@yahoo.com','$2y$10$mHFPFwSWpPJ/Eo5zAPv6TuZANJfOI3T/v.I29Ki7VwXkCmTZ.uxQu','2017-09-20 03:03:03','2017-09-17 17:04:25','wXYABLVabfjo6BXGhjBCdhoS5d77x0BgchHrmAqENuD8b274p1LdyWhzwGm2','Samuel','De Anto','Surgao','kjhdkjasd','15873194_386425791708882_1865123785069904347_n.jpg',1,'Vice Chairman',1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilities`
--

DROP TABLE IF EXISTS `utilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilities` (
  `utilityID` int(11) NOT NULL AUTO_INCREMENT,
  `barangayName` varchar(50) NOT NULL,
  `chairmanName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `brgyLogoPath` varchar(250) NOT NULL,
  `provLogoPath` varchar(250) NOT NULL,
  `facilityPK` varchar(30) NOT NULL,
  `documentPK` varchar(30) NOT NULL,
  `servicePK` varchar(30) NOT NULL,
  `residentPK` varchar(30) NOT NULL,
  `familyPK` varchar(30) NOT NULL,
  `docRequestPK` varchar(30) NOT NULL,
  `docApprovalPK` varchar(30) NOT NULL,
  `reservationPK` varchar(30) NOT NULL,
  `serviceRegPK` varchar(30) NOT NULL,
  `sponsorPK` varchar(30) NOT NULL,
  `collectionPK` varchar(30) NOT NULL,
  PRIMARY KEY (`utilityID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
INSERT INTO `utilities` VALUES (1,'Brgy 629','Roselito Pagudpod','123 Hipodromo St. Sta Mesa Manila','asd','asd','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','REQ_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000','COLLE_000');
/*!40000 ALTER TABLE `utilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voters` (
  `voterPrimeID` varchar(45) NOT NULL,
  `votersID` varchar(20) NOT NULL,
  `datVoter` date NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`voterPrimeID`),
  KEY `fk_Voters_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_Voters_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voters`
--

LOCK TABLES `voters` WRITE;
/*!40000 ALTER TABLE `voters` DISABLE KEYS */;
/*!40000 ALTER TABLE `voters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-21  1:08:40
