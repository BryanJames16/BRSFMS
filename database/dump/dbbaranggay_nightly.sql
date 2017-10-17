-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: dbBarangay
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `barangaycard`
--

DROP TABLE IF EXISTS `barangaycard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangaycard` (
  `cardID` int(11) NOT NULL AUTO_INCREMENT,
  `rID` int(11) NOT NULL,
  `expirationDate` datetime DEFAULT NULL,
  `dateIssued` datetime NOT NULL,
  `released` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `memID` int(11) NOT NULL,
  PRIMARY KEY (`cardID`),
  KEY `residentPrimeID_idx` (`rID`),
  KEY `memID_idx` (`memID`),
  CONSTRAINT `memID` FOREIGN KEY (`memID`) REFERENCES `familymembers` (`familyMemberPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `rID` FOREIGN KEY (`rID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangaycard`
--

LOCK TABLES `barangaycard` WRITE;
/*!40000 ALTER TABLE `barangaycard` DISABLE KEYS */;
INSERT INTO `barangaycard` VALUES (4,2,'2019-10-08 19:26:46','2017-10-08 19:26:46',1,1,20),(5,8,'2019-10-08 23:01:26','2017-10-08 23:01:26',1,1,27),(6,3,'2019-10-08 23:38:55','2017-10-08 23:38:55',1,1,20),(7,5,'2019-10-09 01:28:24','2017-10-09 01:28:24',1,1,26),(8,2,'2019-10-13 01:50:35','2017-10-13 01:50:36',1,1,20),(9,2,'2019-10-13 12:52:56','2017-10-13 12:52:56',1,1,18),(10,2,'2019-10-14 15:50:43','2017-10-14 15:50:43',1,1,18),(11,4,'2019-10-14 15:53:41','2017-10-14 15:53:41',1,1,9),(12,9,'2019-10-16 22:35:36','2017-10-16 22:35:37',0,1,25);
/*!40000 ALTER TABLE `barangaycard` ENABLE KEYS */;
UNLOCK TABLES;

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
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(250) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`registrationPrimeID`),
  KEY `fk_businessregistrations_residents1_idx` (`residentPrimeID`),
  KEY `categoryID_idx` (`categoryID`),
  CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `businesscategories` (`categoryPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_businessregistrations_residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businessregistrations`
--

LOCK TABLES `businessregistrations` WRITE;
/*!40000 ALTER TABLE `businessregistrations` DISABLE KEYS */;
INSERT INTO `businessregistrations` VALUES (13,'87612-15236POl','Kempinsilan','Mirga Copr.',5,'2017-09-24 15:45:50','2018-09-24 15:45:50',0,'5C Magadalene St. Sta Mesa, Manila',NULL,NULL,NULL,NULL,NULL,7),(14,'123-15322GDs','Blueberrya','Blueberry Corps',8,'2017-09-30 12:53:52','2018-09-30 12:53:52',0,'123-abc Maligaya St. Sta Mesa, Manilas',NULL,NULL,NULL,NULL,NULL,5),(15,'18263ASDHC','Aling Puring Pancita','Skubariwa Corp.',NULL,'2017-10-17 15:45:18','2018-10-17 15:45:18',0,'876 Cruz St. Sta Mesa Manila','Paul','Dalistan','Lee','09785436712','M',7),(16,'987897AHDJ','Skubariwa','Power Skubariwa',NULL,'2017-10-17 15:48:35','2018-10-17 15:48:35',0,'87A Baltao Sta Mesa, Manila','Pedro','Silao','Penduko','09784563214','F',5),(17,'AHSDG7235675','Meat Shop','Meat Shop Corp',7,'2017-10-17 16:11:40','2018-10-17 16:11:40',0,'87L - Makata Sta Mesa, Manila',NULL,NULL,NULL,NULL,NULL,7);
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
  `cardID` int(11) DEFAULT NULL,
  PRIMARY KEY (`collectionPrimeID`),
  KEY `fk_collections_reservations1_idx` (`reservationprimeID`),
  KEY `fk_collections_documentheaderrequests1_idx` (`documentHeaderPrimeID`),
  KEY `fk_collections_residents1_idx` (`residentPrimeID`),
  KEY `fk_collections_people1_idx` (`peoplePrimeID`),
  KEY `cardID_idx` (`cardID`),
  CONSTRAINT `cardID` FOREIGN KEY (`cardID`) REFERENCES `barangaycard` (`cardID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_collections_documentheaderrequests1` FOREIGN KEY (`documentHeaderPrimeID`) REFERENCES `documentrequests` (`documentRequestPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_people1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_reservations1` FOREIGN KEY (`reservationprimeID`) REFERENCES `reservations` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collections_residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (12,'COLLE_001','2017-08-30 01:41:17','2017-09-16 03:31:47',3,600,1000,'Paid',20,NULL,2,NULL,NULL),(13,'COLLE_002','2017-08-30 01:42:00','2017-10-08 11:34:27',3,200,200,'Paid',21,NULL,5,NULL,NULL),(14,'COLLE_003','2017-08-30 01:44:00','2017-10-08 11:35:02',3,1400,1400,'Paid',22,NULL,6,NULL,NULL),(15,'COLLE_004','2017-08-30 03:35:11','2017-08-30 03:37:06',3,200,300,'Paid',23,NULL,8,NULL,NULL),(16,'COLLE_005','2017-09-09 04:39:38','2017-10-08 11:35:15',3,1800,2000,'Paid',24,NULL,2,NULL,NULL),(17,'COLLE_006','2017-09-09 04:41:14','2017-09-09 04:41:48',3,100,1000,'Paid',25,NULL,2,NULL,NULL),(18,'COLLE_007','2017-09-16 03:23:05','2017-10-08 11:35:28',3,200,500,'Paid',26,NULL,5,NULL,NULL),(20,'COLLE_008','2017-10-08 19:26:46','2017-10-08 19:27:07',1,100,150,'Paid',NULL,NULL,NULL,NULL,4),(21,'COLLE_009','2017-10-08 23:01:26','2017-10-08 23:27:47',1,100,100,'Paid',NULL,NULL,NULL,NULL,5),(22,'COLLE_010','2017-10-08 23:38:55','2017-10-08 23:40:59',1,100,1000,'Paid',NULL,NULL,NULL,NULL,6),(23,'COLLE_011','2017-10-09 01:28:25','2017-10-16 10:18:56',1,100,200,'Paid',NULL,NULL,NULL,NULL,7),(24,'COLLE_012','2017-10-13 01:50:36','2017-10-13 01:50:48',1,100,500,'Paid',NULL,NULL,NULL,NULL,8),(25,'COLLE_013','2017-10-13 12:52:57','2017-10-13 12:53:12',1,100,500,'Paid',NULL,NULL,NULL,NULL,9),(26,'COLLE_014','2017-10-13 12:57:55','2017-10-14 20:40:04',3,700,1000,'Paid',28,NULL,2,NULL,NULL),(27,'COLLE_015','2017-10-14 15:50:43','2017-10-14 15:50:56',1,100,200,'Paid',NULL,NULL,NULL,NULL,10),(28,'COLLE_016','2017-10-14 15:53:41','2017-10-14 15:54:04',1,100,200,'Paid',NULL,NULL,NULL,NULL,11),(29,'COLLE_017','2017-10-16 10:18:08','2017-10-16 10:19:58',3,100,100,'Paid',32,NULL,4,NULL,NULL),(30,'COLLE_018','2017-10-16 21:49:29','2017-10-16 21:51:29',3,400,400,'Paid',33,NULL,NULL,NULL,NULL),(31,'COLLE_019','2017-10-16 22:35:37','2017-10-16 22:41:52',1,100,100,'Paid',NULL,NULL,NULL,NULL,12),(32,'COLLE_020','2017-10-16 23:47:29','2017-10-17 00:41:24',2,200,500,'Paid',NULL,23,NULL,NULL,NULL),(33,'COLLE_021','2017-10-17 00:39:55','2017-10-17 00:42:36',2,100,100,'Paid',NULL,24,NULL,NULL,NULL),(36,'COLLE_022','2017-10-17 23:47:56','2017-10-17 23:48:46',3,200,200,'Paid',34,NULL,9,NULL,NULL),(37,'COLLE_023','2017-10-18 00:05:44',NULL,3,0,NULL,'Pending',35,NULL,7,NULL,NULL),(38,'COLLE_024','2017-10-18 00:07:09',NULL,3,0,NULL,'Pending',36,NULL,4,NULL,NULL),(39,'COLLE_025','2017-10-18 00:09:16',NULL,3,0,NULL,'Pending',37,NULL,4,NULL,NULL),(40,'COLLE_026','2017-10-18 00:10:12',NULL,3,0,NULL,'Pending',38,NULL,7,NULL,NULL),(41,'COLLE_027','2017-10-18 01:15:52',NULL,3,425,NULL,'Pending',34,NULL,9,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentrequests`
--

LOCK TABLES `documentrequests` WRITE;
/*!40000 ALTER TABLE `documentrequests` DISABLE KEYS */;
INSERT INTO `documentrequests` VALUES (5,'REQ_001','2017-08-27','Approved',2,1,2,NULL),(6,'REQ_002','2017-08-27','Cancelled',4,2,1,NULL),(7,'REQ_003','2017-08-27','Rejected',3,2,1,'Rejected becuase there is no chuchu'),(8,'REQ_004','2017-08-27','Rejected',5,1,2,'Rejected because he is not saying the truth'),(9,'REQ_005','2017-08-29','Rejected',5,2,2,'Rejected because he doesn\'t have any proof'),(10,'REQ_006','2017-08-29','Approved',2,1,1,NULL),(11,'REQ_007','2017-08-29','Approved',7,3,1,NULL),(12,'REQ_008','2017-08-29','Approved',7,1,1,NULL),(13,'REQ_009','2017-08-29','Approved',6,1,2,NULL),(14,'REQ_010','2017-08-30','Approved',8,2,8,NULL),(15,'REQ_011','2017-09-09','Approved',2,1,1,NULL),(16,'REQ_012','2017-09-16','Rejected',2,1,1,'Rejected because she is so beautiful'),(17,'REQ_013','2017-09-16','Rejected',2,1,2,'hjgj'),(20,'REQ_014','2017-09-24','Rejected',5,3,1,'Rejected because Bryan is not qualified to get this document'),(21,'REQ_015','2017-09-30','Approved',2,1,1,NULL),(22,'REQ_016','2017-10-09','Approved',8,1,1,NULL),(23,'REQ_017','2017-10-13','Approved',2,1,2,NULL),(24,'REQ_018','2017-10-13','Approved',6,1,1,NULL);
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
INSERT INTO `documents` VALUES (1,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {address}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Clearance',100,1,0),(2,'DOC_002','Certificate of Indigency','Indegency certification','This is to certify that..','Certification',100,1,0),(3,'DOC_003','Certificate of No Work','No work certification','This is to certify...','Certification',50,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0),(3,'FAM_003',2,'asdas','2017-08-23',1),(4,'FAM_004',6,'Del Mundo Family','2017-08-29',0),(5,'FAM_005',8,'Perez','2017-08-30',0),(6,'FAM_006',5,'Illagas Family','2017-09-16',0),(7,'FAM_007',2,'Something Family','2017-10-13',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (4,2,5,'Grandfather',0),(9,1,2,'Son',0),(18,1,3,'Daughter',0),(20,1,4,'Self',0),(22,4,6,'Self',0),(24,4,7,'Brother',0),(25,5,8,'Self',0),(26,2,6,'Self',0),(27,5,9,'Wife',0),(28,1,6,'Self',0);
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
-- Table structure for table `itemreservations`
--

DROP TABLE IF EXISTS `itemreservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemreservations` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `reservationName` varchar(30) NOT NULL,
  `reservationDescription` varchar(500) NOT NULL,
  `reservationStart` time NOT NULL,
  `reservationEnd` time NOT NULL,
  `dateReserved` date NOT NULL,
  `peoplePrimeID` int(11) DEFAULT NULL,
  `itemID` int(11) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`primeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemreservations`
--

LOCK TABLES `itemreservations` WRITE;
/*!40000 ALTER TABLE `itemreservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemreservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(30) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `itemPrice` double NOT NULL,
  `itemDescription` varchar(250) NOT NULL,
  `quality` tinyint(1) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (2,'Tupperware Chairs',100,250,'Monoblock chairs by Tupperware',1,1,0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `resID` int(11) DEFAULT NULL,
  `famID` int(11) DEFAULT NULL,
  `requestID` int(11) DEFAULT NULL,
  `reservationID` int(11) DEFAULT NULL,
  `collectionID` int(11) DEFAULT NULL,
  `servTransactionPrimeID` int(11) DEFAULT NULL,
  `businessID` int(11) DEFAULT NULL,
  `dateOfAction` datetime NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`logID`),
  KEY `residentPrimeID_idx` (`resID`),
  KEY `userID_idx` (`userID`),
  KEY `famID_idx` (`famID`),
  KEY `requestID_idx` (`requestID`),
  KEY `reservationID_idx` (`reservationID`),
  KEY `collectionID_idx` (`collectionID`),
  KEY `servicePrimeID_idx` (`servTransactionPrimeID`),
  KEY `businessID_idx` (`businessID`),
  CONSTRAINT `businessID` FOREIGN KEY (`businessID`) REFERENCES `businessregistrations` (`registrationPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `collectionID` FOREIGN KEY (`collectionID`) REFERENCES `collections` (`collectionPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `famID` FOREIGN KEY (`famID`) REFERENCES `families` (`familyPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `requestID` FOREIGN KEY (`requestID`) REFERENCES `documentrequests` (`documentRequestPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `resID` FOREIGN KEY (`resID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `reservations` (`primeID`) ON UPDATE CASCADE,
  CONSTRAINT `servTransactionPrimeID` FOREIGN KEY (`servTransactionPrimeID`) REFERENCES `servicetransactions` (`serviceTransactionPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (3,2,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-09-24 14:02:44','Resident'),(4,2,'Edited a resident',3,NULL,NULL,NULL,NULL,NULL,NULL,'2017-09-24 14:03:41','Resident'),(5,2,'Requested a document',NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-09-24 14:59:29','Document'),(6,2,'Rejected a document request',NULL,NULL,16,NULL,NULL,NULL,NULL,'2017-09-24 15:20:42','Document'),(9,2,'Rescheduled a reservation',NULL,NULL,NULL,22,NULL,NULL,NULL,'2017-09-24 15:37:00','Reservation'),(10,2,'Reserved a facility',NULL,NULL,NULL,27,NULL,NULL,NULL,'2017-09-24 15:37:00','Reservation'),(11,2,'Cancelled a reservation',NULL,NULL,NULL,27,NULL,NULL,NULL,'2017-09-24 15:37:40','Reservation'),(12,2,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:45:50','Business'),(13,2,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:48:08','Business'),(14,2,'Deleted a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:48:27','Business'),(16,2,'Edited a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:03:58','Service'),(19,2,'Started a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:07:23','Service'),(20,2,'Finished a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:07:53','Service'),(21,2,'Deleted a service',NULL,NULL,NULL,NULL,NULL,7,NULL,'2017-09-24 16:08:10','Service'),(22,1,'Rejected a document request',NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-09-24 17:15:08','Document'),(23,1,'Rejected a document request',NULL,NULL,17,NULL,NULL,NULL,NULL,'2017-09-24 17:44:25','Document'),(24,1,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,14,'2017-09-30 12:53:52','Business'),(25,1,'Requested a document',NULL,NULL,21,NULL,NULL,NULL,NULL,'2017-09-30 13:11:57','Document'),(26,1,'Approved a document request',NULL,NULL,21,NULL,NULL,NULL,NULL,'2017-09-30 13:12:48','Document'),(27,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-08 00:31:58','Resident'),(28,1,'Registered a resident',9,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-08 00:33:46','Resident'),(29,1,'Requested a document',NULL,NULL,22,NULL,NULL,NULL,NULL,'2017-10-09 17:43:37','Document'),(30,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 22:45:38','Resident'),(31,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 22:57:44','Resident'),(32,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 22:59:47','Resident'),(33,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 23:02:05','Resident'),(34,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 23:06:14','Resident'),(35,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 23:12:30','Resident'),(36,1,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-09 23:13:10','Resident'),(37,1,'Registered a service',NULL,NULL,NULL,NULL,NULL,10,NULL,'2017-10-11 00:38:52','Service'),(38,3,'Registered a family',NULL,7,NULL,NULL,NULL,NULL,NULL,'2017-10-13 01:39:43','Family'),(39,3,'Requested a document',NULL,NULL,23,NULL,NULL,NULL,NULL,'2017-10-13 01:51:33','Document'),(40,3,'Requested a document',NULL,NULL,24,NULL,NULL,NULL,NULL,'2017-10-13 01:53:27','Document'),(41,3,'Reserved a facility',NULL,NULL,NULL,28,NULL,NULL,NULL,'2017-10-13 12:57:54','Reservation'),(42,3,'Reserved a facility',NULL,NULL,NULL,29,NULL,NULL,NULL,'2017-10-16 10:05:25','Reservation'),(43,3,'Reserved a facility',NULL,NULL,NULL,30,NULL,NULL,NULL,'2017-10-16 10:09:40','Reservation'),(44,3,'Reserved a facility',NULL,NULL,NULL,31,NULL,NULL,NULL,'2017-10-16 10:16:43','Reservation'),(45,3,'Reserved a facility',NULL,NULL,NULL,32,NULL,NULL,NULL,'2017-10-16 10:18:08','Reservation'),(46,1,'Started a service',NULL,NULL,NULL,NULL,NULL,10,NULL,'2017-10-16 16:08:42','Service'),(47,1,'Finished a service',NULL,NULL,NULL,NULL,NULL,10,NULL,'2017-10-16 16:11:13','Service'),(48,1,'Reserved a facility',NULL,NULL,NULL,33,NULL,NULL,NULL,'2017-10-16 21:49:28','Reservation'),(49,1,'Approved a document request',NULL,NULL,23,NULL,NULL,NULL,NULL,'2017-10-16 23:47:29','Document'),(50,1,'Approved a document request',NULL,NULL,24,NULL,NULL,NULL,NULL,'2017-10-17 00:39:55','Document'),(51,1,'Approved a document request',NULL,NULL,24,NULL,NULL,NULL,NULL,'2017-10-17 00:39:55','Document'),(52,1,'Approved a document request',NULL,NULL,24,NULL,NULL,NULL,NULL,'2017-10-17 00:39:55','Document'),(54,1,'Registered a resident',11,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-17 02:27:07','Resident'),(55,1,'Edited a resident',11,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-17 02:32:29','Resident'),(56,1,'Edited a resident',8,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-17 02:37:46','Resident'),(57,1,'Edited a resident',8,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-17 02:39:15','Resident'),(58,1,'Edited a resident',11,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-17 04:21:46','Resident'),(59,1,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,15,'2017-10-17 15:45:18','Business'),(60,1,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,16,'2017-10-17 15:48:35','Business'),(61,1,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,17,'2017-10-17 16:11:40','Business'),(62,1,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,14,'2017-10-17 16:41:14','Business'),(63,1,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,15,'2017-10-17 16:56:23','Business'),(64,1,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,15,'2017-10-17 16:58:43','Business'),(65,1,'Deleted a business',NULL,NULL,NULL,NULL,NULL,NULL,15,'2017-10-17 17:13:25','Business'),(66,1,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,14,'2017-10-17 19:37:27','Business'),(67,1,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,16,'2017-10-17 19:37:40','Business'),(68,1,'Finished a service',NULL,NULL,NULL,NULL,NULL,10,NULL,'2017-10-17 21:54:49','Service'),(69,3,'Reserved a facility',NULL,NULL,NULL,34,NULL,NULL,NULL,'2017-10-17 23:47:56','Reservation'),(70,3,'Reserved a facility',NULL,NULL,NULL,35,NULL,NULL,NULL,'2017-10-18 00:05:44','Reservation'),(71,3,'Reserved a facility',NULL,NULL,NULL,36,NULL,NULL,NULL,'2017-10-18 00:07:09','Reservation'),(72,3,'Reserved a facility',NULL,NULL,NULL,37,NULL,NULL,NULL,'2017-10-18 00:09:16','Reservation'),(73,3,'Reserved a facility',NULL,NULL,NULL,38,NULL,NULL,NULL,'2017-10-18 00:10:12','Reservation');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Ikaw lang talaga ang minahal mula noon. Di padin magbabago sayo hanggang ngayon. Ano mang panahon ako\'y maghihintay hindi babaling sa iba.',1,2,'2017-09-25 15:16:36',1),(3,'Sige na nga',2,1,'2017-09-25 18:50:53',1),(4,'Ang pogi mo marc',1,2,'2017-09-25 18:51:54',1),(5,'HAHAHAHAHAHAHA lam ko na yun',2,1,'2017-09-25 18:57:01',1),(6,'Ewan ko sayo hahahaa',1,2,'2017-09-25 19:12:58',1),(7,'Huyyy iapprove mo na yung request ni Bryan',2,1,'2017-09-25 19:57:20',1),(8,'Ok na na-accept ko na',1,2,'2017-09-25 20:02:40',1),(9,'Mock defense natin mamaya',1,3,'2017-09-30 10:37:31',1),(10,'Pogi mo',1,3,'2017-09-30 12:30:59',1),(11,'Thank You!',3,1,'2017-09-30 12:31:34',1),(12,'Hiii :*',1,3,'2017-09-30 12:39:33',1),(13,'Hiiii',1,6,'2017-09-30 12:51:25',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=1656 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (229,'2017_08_20_131145_create_buildings_table',0),(230,'2017_08_20_131145_create_buildingtypes_table',0),(231,'2017_08_20_131145_create_businesscategories_table',0),(232,'2017_08_20_131145_create_businesses_table',0),(233,'2017_08_20_131145_create_businessregistrations_table',0),(234,'2017_08_20_131145_create_collections_table',0),(235,'2017_08_20_131145_create_document_requirements_table',0),(236,'2017_08_20_131145_create_documentdetailrequests_table',0),(237,'2017_08_20_131145_create_documentheaderrequests_table',0),(238,'2017_08_20_131145_create_documents_table',0),(239,'2017_08_20_131145_create_employeeposition_table',0),(240,'2017_08_20_131145_create_employees_table',0),(241,'2017_08_20_131145_create_facilities_table',0),(242,'2017_08_20_131145_create_facilitytypes_table',0),(243,'2017_08_20_131145_create_families_table',0),(244,'2017_08_20_131145_create_familymembers_table',0),(245,'2017_08_20_131145_create_generaladdresses_table',0),(246,'2017_08_20_131145_create_lots_table',0),(247,'2017_08_20_131145_create_participants_table',0),(248,'2017_08_20_131145_create_people_table',0),(249,'2017_08_20_131145_create_requirements_table',0),(250,'2017_08_20_131145_create_reservations_table',0),(251,'2017_08_20_131145_create_residentaccountregistrations_table',0),(252,'2017_08_20_131145_create_residentaccounts_table',0),(253,'2017_08_20_131145_create_residentbackgrounds_table',0),(254,'2017_08_20_131145_create_residentregistrations_table',0),(255,'2017_08_20_131145_create_residents_table',0),(256,'2017_08_20_131145_create_services_table',0),(257,'2017_08_20_131145_create_servicesponsorships_table',0),(258,'2017_08_20_131145_create_servicetransactions_table',0),(259,'2017_08_20_131145_create_servicetypes_table',0),(260,'2017_08_20_131145_create_streets_table',0),(261,'2017_08_20_131145_create_sysutil_table',0),(262,'2017_08_20_131145_create_units_table',0),(263,'2017_08_20_131145_create_users_table',0),(264,'2017_08_20_131145_create_utilities_table',0),(265,'2017_08_20_131145_create_voters_table',0),(266,'2017_08_20_131151_add_foreign_keys_to_buildings_table',0),(267,'2017_08_20_131151_add_foreign_keys_to_businesses_table',0),(268,'2017_08_20_131151_add_foreign_keys_to_businessregistrations_table',0),(269,'2017_08_20_131151_add_foreign_keys_to_collections_table',0),(270,'2017_08_20_131151_add_foreign_keys_to_document_requirements_table',0),(271,'2017_08_20_131151_add_foreign_keys_to_documentdetailrequests_table',0),(272,'2017_08_20_131151_add_foreign_keys_to_documentheaderrequests_table',0),(273,'2017_08_20_131151_add_foreign_keys_to_employeeposition_table',0),(274,'2017_08_20_131151_add_foreign_keys_to_facilities_table',0),(275,'2017_08_20_131151_add_foreign_keys_to_families_table',0),(276,'2017_08_20_131151_add_foreign_keys_to_familymembers_table',0),(277,'2017_08_20_131151_add_foreign_keys_to_generaladdresses_table',0),(278,'2017_08_20_131151_add_foreign_keys_to_lots_table',0),(279,'2017_08_20_131151_add_foreign_keys_to_participants_table',0),(280,'2017_08_20_131151_add_foreign_keys_to_reservations_table',0),(281,'2017_08_20_131151_add_foreign_keys_to_residentaccountregistrations_table',0),(282,'2017_08_20_131151_add_foreign_keys_to_residentaccounts_table',0),(283,'2017_08_20_131151_add_foreign_keys_to_residentbackgrounds_table',0),(284,'2017_08_20_131151_add_foreign_keys_to_residentregistrations_table',0),(285,'2017_08_20_131151_add_foreign_keys_to_services_table',0),(286,'2017_08_20_131151_add_foreign_keys_to_servicesponsorships_table',0),(287,'2017_08_20_131151_add_foreign_keys_to_servicetransactions_table',0),(288,'2017_08_20_131151_add_foreign_keys_to_units_table',0),(289,'2017_08_20_131151_add_foreign_keys_to_voters_table',0),(290,'2017_08_24_122308_create_buildings_table',0),(291,'2017_08_24_122308_create_buildingtypes_table',0),(292,'2017_08_24_122308_create_businesscategories_table',0),(293,'2017_08_24_122308_create_businesses_table',0),(294,'2017_08_24_122308_create_businessregistrations_table',0),(295,'2017_08_24_122308_create_collections_table',0),(296,'2017_08_24_122308_create_document_requirements_table',0),(297,'2017_08_24_122308_create_documentrequests_table',0),(298,'2017_08_24_122308_create_documents_table',0),(299,'2017_08_24_122308_create_employeeposition_table',0),(300,'2017_08_24_122308_create_employees_table',0),(301,'2017_08_24_122308_create_facilities_table',0),(302,'2017_08_24_122308_create_facilitytypes_table',0),(303,'2017_08_24_122308_create_families_table',0),(304,'2017_08_24_122308_create_familymembers_table',0),(305,'2017_08_24_122308_create_generaladdresses_table',0),(306,'2017_08_24_122308_create_lots_table',0),(307,'2017_08_24_122308_create_participants_table',0),(308,'2017_08_24_122308_create_people_table',0),(309,'2017_08_24_122308_create_recipients_table',0),(310,'2017_08_24_122308_create_requirements_table',0),(311,'2017_08_24_122308_create_reservations_table',0),(312,'2017_08_24_122308_create_residentaccountregistrations_table',0),(313,'2017_08_24_122308_create_residentaccounts_table',0),(314,'2017_08_24_122308_create_residentbackgrounds_table',0),(315,'2017_08_24_122308_create_residentregistrations_table',0),(316,'2017_08_24_122308_create_residents_table',0),(317,'2017_08_24_122308_create_services_table',0),(318,'2017_08_24_122308_create_servicesponsorships_table',0),(319,'2017_08_24_122308_create_servicetransactions_table',0),(320,'2017_08_24_122308_create_servicetypes_table',0),(321,'2017_08_24_122308_create_streets_table',0),(322,'2017_08_24_122308_create_sysutil_table',0),(323,'2017_08_24_122308_create_units_table',0),(324,'2017_08_24_122308_create_users_table',0),(325,'2017_08_24_122308_create_utilities_table',0),(326,'2017_08_24_122308_create_voters_table',0),(327,'2017_08_24_122313_add_foreign_keys_to_buildings_table',0),(328,'2017_08_24_122313_add_foreign_keys_to_businesses_table',0),(329,'2017_08_24_122313_add_foreign_keys_to_businessregistrations_table',0),(330,'2017_08_24_122313_add_foreign_keys_to_collections_table',0),(331,'2017_08_24_122313_add_foreign_keys_to_document_requirements_table',0),(332,'2017_08_24_122313_add_foreign_keys_to_documentrequests_table',0),(333,'2017_08_24_122313_add_foreign_keys_to_employeeposition_table',0),(334,'2017_08_24_122313_add_foreign_keys_to_facilities_table',0),(335,'2017_08_24_122313_add_foreign_keys_to_families_table',0),(336,'2017_08_24_122313_add_foreign_keys_to_familymembers_table',0),(337,'2017_08_24_122313_add_foreign_keys_to_generaladdresses_table',0),(338,'2017_08_24_122313_add_foreign_keys_to_lots_table',0),(339,'2017_08_24_122313_add_foreign_keys_to_participants_table',0),(340,'2017_08_24_122313_add_foreign_keys_to_reservations_table',0),(341,'2017_08_24_122313_add_foreign_keys_to_residentaccountregistrations_table',0),(342,'2017_08_24_122313_add_foreign_keys_to_residentaccounts_table',0),(343,'2017_08_24_122313_add_foreign_keys_to_residentbackgrounds_table',0),(344,'2017_08_24_122313_add_foreign_keys_to_residentregistrations_table',0),(345,'2017_08_24_122313_add_foreign_keys_to_services_table',0),(346,'2017_08_24_122313_add_foreign_keys_to_servicesponsorships_table',0),(347,'2017_08_24_122313_add_foreign_keys_to_servicetransactions_table',0),(348,'2017_08_24_122313_add_foreign_keys_to_units_table',0),(349,'2017_08_24_122313_add_foreign_keys_to_voters_table',0),(350,'2017_08_25_154702_create_buildings_table',0),(351,'2017_08_25_154702_create_buildingtypes_table',0),(352,'2017_08_25_154702_create_businesscategories_table',0),(353,'2017_08_25_154702_create_businesses_table',0),(354,'2017_08_25_154702_create_businessregistrations_table',0),(355,'2017_08_25_154702_create_collections_table',0),(356,'2017_08_25_154702_create_document_requirements_table',0),(357,'2017_08_25_154702_create_documentrequests_table',0),(358,'2017_08_25_154702_create_documents_table',0),(359,'2017_08_25_154702_create_employeeposition_table',0),(360,'2017_08_25_154702_create_employees_table',0),(361,'2017_08_25_154702_create_facilities_table',0),(362,'2017_08_25_154702_create_facilitytypes_table',0),(363,'2017_08_25_154702_create_families_table',0),(364,'2017_08_25_154702_create_familymembers_table',0),(365,'2017_08_25_154702_create_generaladdresses_table',0),(366,'2017_08_25_154702_create_lots_table',0),(367,'2017_08_25_154702_create_participants_table',0),(368,'2017_08_25_154702_create_partrecipients_table',0),(369,'2017_08_25_154702_create_people_table',0),(370,'2017_08_25_154702_create_recipients_table',0),(371,'2017_08_25_154702_create_requirements_table',0),(372,'2017_08_25_154702_create_reservations_table',0),(373,'2017_08_25_154702_create_residentaccountregistrations_table',0),(374,'2017_08_25_154702_create_residentaccounts_table',0),(375,'2017_08_25_154702_create_residentbackgrounds_table',0),(376,'2017_08_25_154702_create_residentregistrations_table',0),(377,'2017_08_25_154702_create_residents_table',0),(378,'2017_08_25_154702_create_services_table',0),(379,'2017_08_25_154702_create_servicesponsorships_table',0),(380,'2017_08_25_154702_create_servicetransactions_table',0),(381,'2017_08_25_154702_create_servicetypes_table',0),(382,'2017_08_25_154702_create_streets_table',0),(383,'2017_08_25_154702_create_sysutil_table',0),(384,'2017_08_25_154702_create_units_table',0),(385,'2017_08_25_154702_create_users_table',0),(386,'2017_08_25_154702_create_utilities_table',0),(387,'2017_08_25_154702_create_voters_table',0),(388,'2017_08_25_154711_add_foreign_keys_to_buildings_table',0),(389,'2017_08_25_154711_add_foreign_keys_to_businesses_table',0),(390,'2017_08_25_154711_add_foreign_keys_to_businessregistrations_table',0),(391,'2017_08_25_154711_add_foreign_keys_to_collections_table',0),(392,'2017_08_25_154711_add_foreign_keys_to_document_requirements_table',0),(393,'2017_08_25_154711_add_foreign_keys_to_documentrequests_table',0),(394,'2017_08_25_154711_add_foreign_keys_to_employeeposition_table',0),(395,'2017_08_25_154711_add_foreign_keys_to_facilities_table',0),(396,'2017_08_25_154711_add_foreign_keys_to_families_table',0),(397,'2017_08_25_154711_add_foreign_keys_to_familymembers_table',0),(398,'2017_08_25_154711_add_foreign_keys_to_generaladdresses_table',0),(399,'2017_08_25_154711_add_foreign_keys_to_lots_table',0),(400,'2017_08_25_154711_add_foreign_keys_to_participants_table',0),(401,'2017_08_25_154711_add_foreign_keys_to_partrecipients_table',0),(402,'2017_08_25_154711_add_foreign_keys_to_reservations_table',0),(403,'2017_08_25_154711_add_foreign_keys_to_residentaccountregistrations_table',0),(404,'2017_08_25_154711_add_foreign_keys_to_residentaccounts_table',0),(405,'2017_08_25_154711_add_foreign_keys_to_residentbackgrounds_table',0),(406,'2017_08_25_154711_add_foreign_keys_to_residentregistrations_table',0),(407,'2017_08_25_154711_add_foreign_keys_to_services_table',0),(408,'2017_08_25_154711_add_foreign_keys_to_servicesponsorships_table',0),(409,'2017_08_25_154711_add_foreign_keys_to_servicetransactions_table',0),(410,'2017_08_25_154711_add_foreign_keys_to_units_table',0),(411,'2017_08_25_154711_add_foreign_keys_to_voters_table',0),(412,'2017_08_27_064352_create_buildings_table',0),(413,'2017_08_27_064352_create_buildingtypes_table',0),(414,'2017_08_27_064352_create_businesscategories_table',0),(415,'2017_08_27_064352_create_businesses_table',0),(416,'2017_08_27_064352_create_businessregistrations_table',0),(417,'2017_08_27_064352_create_collections_table',0),(418,'2017_08_27_064352_create_document_requirements_table',0),(419,'2017_08_27_064352_create_documentrequests_table',0),(420,'2017_08_27_064352_create_documents_table',0),(421,'2017_08_27_064352_create_employeeposition_table',0),(422,'2017_08_27_064352_create_employees_table',0),(423,'2017_08_27_064352_create_facilities_table',0),(424,'2017_08_27_064352_create_facilitytypes_table',0),(425,'2017_08_27_064352_create_families_table',0),(426,'2017_08_27_064352_create_familymembers_table',0),(427,'2017_08_27_064352_create_generaladdresses_table',0),(428,'2017_08_27_064352_create_lots_table',0),(429,'2017_08_27_064352_create_participants_table',0),(430,'2017_08_27_064352_create_partrecipients_table',0),(431,'2017_08_27_064352_create_people_table',0),(432,'2017_08_27_064352_create_recipients_table',0),(433,'2017_08_27_064352_create_requestrequirements_table',0),(434,'2017_08_27_064352_create_requirements_table',0),(435,'2017_08_27_064352_create_reservations_table',0),(436,'2017_08_27_064352_create_residentaccountregistrations_table',0),(437,'2017_08_27_064352_create_residentaccounts_table',0),(438,'2017_08_27_064352_create_residentbackgrounds_table',0),(439,'2017_08_27_064352_create_residentregistrations_table',0),(440,'2017_08_27_064352_create_residents_table',0),(441,'2017_08_27_064352_create_services_table',0),(442,'2017_08_27_064352_create_servicesponsorships_table',0),(443,'2017_08_27_064352_create_servicetransactions_table',0),(444,'2017_08_27_064352_create_servicetypes_table',0),(445,'2017_08_27_064352_create_streets_table',0),(446,'2017_08_27_064352_create_sysutil_table',0),(447,'2017_08_27_064352_create_units_table',0),(448,'2017_08_27_064352_create_users_table',0),(449,'2017_08_27_064352_create_utilities_table',0),(450,'2017_08_27_064352_create_voters_table',0),(451,'2017_08_27_064358_add_foreign_keys_to_buildings_table',0),(452,'2017_08_27_064358_add_foreign_keys_to_businesses_table',0),(453,'2017_08_27_064358_add_foreign_keys_to_businessregistrations_table',0),(454,'2017_08_27_064358_add_foreign_keys_to_collections_table',0),(455,'2017_08_27_064358_add_foreign_keys_to_document_requirements_table',0),(456,'2017_08_27_064358_add_foreign_keys_to_documentrequests_table',0),(457,'2017_08_27_064358_add_foreign_keys_to_employeeposition_table',0),(458,'2017_08_27_064358_add_foreign_keys_to_facilities_table',0),(459,'2017_08_27_064358_add_foreign_keys_to_families_table',0),(460,'2017_08_27_064358_add_foreign_keys_to_familymembers_table',0),(461,'2017_08_27_064358_add_foreign_keys_to_generaladdresses_table',0),(462,'2017_08_27_064358_add_foreign_keys_to_lots_table',0),(463,'2017_08_27_064358_add_foreign_keys_to_participants_table',0),(464,'2017_08_27_064358_add_foreign_keys_to_partrecipients_table',0),(465,'2017_08_27_064358_add_foreign_keys_to_requestrequirements_table',0),(466,'2017_08_27_064358_add_foreign_keys_to_reservations_table',0),(467,'2017_08_27_064358_add_foreign_keys_to_residentaccountregistrations_table',0),(468,'2017_08_27_064358_add_foreign_keys_to_residentaccounts_table',0),(469,'2017_08_27_064358_add_foreign_keys_to_residentbackgrounds_table',0),(470,'2017_08_27_064358_add_foreign_keys_to_residentregistrations_table',0),(471,'2017_08_27_064358_add_foreign_keys_to_services_table',0),(472,'2017_08_27_064358_add_foreign_keys_to_servicesponsorships_table',0),(473,'2017_08_27_064358_add_foreign_keys_to_servicetransactions_table',0),(474,'2017_08_27_064358_add_foreign_keys_to_units_table',0),(475,'2017_08_27_064358_add_foreign_keys_to_voters_table',0),(476,'2017_09_17_155408_create_buildings_table',0),(477,'2017_09_17_155408_create_buildingtypes_table',0),(478,'2017_09_17_155408_create_businesscategories_table',0),(479,'2017_09_17_155408_create_businesses_table',0),(480,'2017_09_17_155408_create_businessregistrations_table',0),(481,'2017_09_17_155408_create_collections_table',0),(482,'2017_09_17_155408_create_document_requirements_table',0),(483,'2017_09_17_155408_create_documentrequests_table',0),(484,'2017_09_17_155408_create_documents_table',0),(485,'2017_09_17_155408_create_employeeposition_table',0),(486,'2017_09_17_155408_create_employees_table',0),(487,'2017_09_17_155408_create_facilities_table',0),(488,'2017_09_17_155408_create_facilitytypes_table',0),(489,'2017_09_17_155408_create_families_table',0),(490,'2017_09_17_155408_create_familymembers_table',0),(491,'2017_09_17_155408_create_generaladdresses_table',0),(492,'2017_09_17_155408_create_lots_table',0),(493,'2017_09_17_155408_create_participants_table',0),(494,'2017_09_17_155408_create_partrecipients_table',0),(495,'2017_09_17_155408_create_people_table',0),(496,'2017_09_17_155408_create_recipients_table',0),(497,'2017_09_17_155408_create_requestrequirements_table',0),(498,'2017_09_17_155408_create_requirements_table',0),(499,'2017_09_17_155408_create_reservations_table',0),(500,'2017_09_17_155408_create_residentaccountregistrations_table',0),(501,'2017_09_17_155408_create_residentaccounts_table',0),(502,'2017_09_17_155408_create_residentbackgrounds_table',0),(503,'2017_09_17_155408_create_residentregistrations_table',0),(504,'2017_09_17_155408_create_residents_table',0),(505,'2017_09_17_155408_create_services_table',0),(506,'2017_09_17_155408_create_servicesponsorships_table',0),(507,'2017_09_17_155408_create_servicetransactions_table',0),(508,'2017_09_17_155408_create_servicetypes_table',0),(509,'2017_09_17_155408_create_streets_table',0),(510,'2017_09_17_155408_create_sysutil_table',0),(511,'2017_09_17_155408_create_units_table',0),(512,'2017_09_17_155408_create_users_table',0),(513,'2017_09_17_155408_create_utilities_table',0),(514,'2017_09_17_155408_create_voters_table',0),(515,'2017_09_17_155416_add_foreign_keys_to_buildings_table',0),(516,'2017_09_17_155416_add_foreign_keys_to_businesses_table',0),(517,'2017_09_17_155416_add_foreign_keys_to_businessregistrations_table',0),(518,'2017_09_17_155416_add_foreign_keys_to_collections_table',0),(519,'2017_09_17_155416_add_foreign_keys_to_document_requirements_table',0),(520,'2017_09_17_155416_add_foreign_keys_to_documentrequests_table',0),(521,'2017_09_17_155416_add_foreign_keys_to_employeeposition_table',0),(522,'2017_09_17_155416_add_foreign_keys_to_facilities_table',0),(523,'2017_09_17_155416_add_foreign_keys_to_families_table',0),(524,'2017_09_17_155416_add_foreign_keys_to_familymembers_table',0),(525,'2017_09_17_155416_add_foreign_keys_to_generaladdresses_table',0),(526,'2017_09_17_155416_add_foreign_keys_to_lots_table',0),(527,'2017_09_17_155416_add_foreign_keys_to_participants_table',0),(528,'2017_09_17_155416_add_foreign_keys_to_partrecipients_table',0),(529,'2017_09_17_155416_add_foreign_keys_to_requestrequirements_table',0),(530,'2017_09_17_155416_add_foreign_keys_to_reservations_table',0),(531,'2017_09_17_155416_add_foreign_keys_to_residentaccountregistrations_table',0),(532,'2017_09_17_155416_add_foreign_keys_to_residentaccounts_table',0),(533,'2017_09_17_155416_add_foreign_keys_to_residentbackgrounds_table',0),(534,'2017_09_17_155416_add_foreign_keys_to_residentregistrations_table',0),(535,'2017_09_17_155416_add_foreign_keys_to_services_table',0),(536,'2017_09_17_155416_add_foreign_keys_to_servicesponsorships_table',0),(537,'2017_09_17_155416_add_foreign_keys_to_servicetransactions_table',0),(538,'2017_09_17_155416_add_foreign_keys_to_units_table',0),(539,'2017_09_17_155416_add_foreign_keys_to_voters_table',0),(540,'2017_09_18_065430_create_buildings_table',0),(541,'2017_09_18_065430_create_buildingtypes_table',0),(542,'2017_09_18_065430_create_businesscategories_table',0),(543,'2017_09_18_065430_create_businesses_table',0),(544,'2017_09_18_065430_create_businessregistrations_table',0),(545,'2017_09_18_065430_create_collections_table',0),(546,'2017_09_18_065430_create_document_requirements_table',0),(547,'2017_09_18_065430_create_documentrequests_table',0),(548,'2017_09_18_065430_create_documents_table',0),(549,'2017_09_18_065430_create_employeeposition_table',0),(550,'2017_09_18_065430_create_employees_table',0),(551,'2017_09_18_065430_create_facilities_table',0),(552,'2017_09_18_065430_create_facilitytypes_table',0),(553,'2017_09_18_065430_create_families_table',0),(554,'2017_09_18_065430_create_familymembers_table',0),(555,'2017_09_18_065430_create_generaladdresses_table',0),(556,'2017_09_18_065430_create_lots_table',0),(557,'2017_09_18_065430_create_participants_table',0),(558,'2017_09_18_065430_create_partrecipients_table',0),(559,'2017_09_18_065430_create_people_table',0),(560,'2017_09_18_065430_create_recipients_table',0),(561,'2017_09_18_065430_create_requestrequirements_table',0),(562,'2017_09_18_065430_create_requirements_table',0),(563,'2017_09_18_065430_create_reservations_table',0),(564,'2017_09_18_065430_create_residentaccountregistrations_table',0),(565,'2017_09_18_065430_create_residentaccounts_table',0),(566,'2017_09_18_065430_create_residentbackgrounds_table',0),(567,'2017_09_18_065430_create_residentregistrations_table',0),(568,'2017_09_18_065430_create_residents_table',0),(569,'2017_09_18_065430_create_services_table',0),(570,'2017_09_18_065430_create_servicesponsorships_table',0),(571,'2017_09_18_065430_create_servicetransactions_table',0),(572,'2017_09_18_065430_create_servicetypes_table',0),(573,'2017_09_18_065430_create_streets_table',0),(574,'2017_09_18_065430_create_sysutil_table',0),(575,'2017_09_18_065430_create_units_table',0),(576,'2017_09_18_065430_create_users_table',0),(577,'2017_09_18_065430_create_utilities_table',0),(578,'2017_09_18_065430_create_voters_table',0),(579,'2017_09_18_065438_add_foreign_keys_to_buildings_table',0),(580,'2017_09_18_065438_add_foreign_keys_to_businesses_table',0),(581,'2017_09_18_065438_add_foreign_keys_to_businessregistrations_table',0),(582,'2017_09_18_065438_add_foreign_keys_to_collections_table',0),(583,'2017_09_18_065438_add_foreign_keys_to_document_requirements_table',0),(584,'2017_09_18_065438_add_foreign_keys_to_documentrequests_table',0),(585,'2017_09_18_065438_add_foreign_keys_to_employeeposition_table',0),(586,'2017_09_18_065438_add_foreign_keys_to_facilities_table',0),(587,'2017_09_18_065438_add_foreign_keys_to_families_table',0),(588,'2017_09_18_065438_add_foreign_keys_to_familymembers_table',0),(589,'2017_09_18_065438_add_foreign_keys_to_generaladdresses_table',0),(590,'2017_09_18_065438_add_foreign_keys_to_lots_table',0),(591,'2017_09_18_065438_add_foreign_keys_to_participants_table',0),(592,'2017_09_18_065438_add_foreign_keys_to_partrecipients_table',0),(593,'2017_09_18_065438_add_foreign_keys_to_requestrequirements_table',0),(594,'2017_09_18_065438_add_foreign_keys_to_reservations_table',0),(595,'2017_09_18_065438_add_foreign_keys_to_residentaccountregistrations_table',0),(596,'2017_09_18_065438_add_foreign_keys_to_residentaccounts_table',0),(597,'2017_09_18_065438_add_foreign_keys_to_residentbackgrounds_table',0),(598,'2017_09_18_065438_add_foreign_keys_to_residentregistrations_table',0),(599,'2017_09_18_065438_add_foreign_keys_to_services_table',0),(600,'2017_09_18_065438_add_foreign_keys_to_servicesponsorships_table',0),(601,'2017_09_18_065438_add_foreign_keys_to_servicetransactions_table',0),(602,'2017_09_18_065438_add_foreign_keys_to_units_table',0),(603,'2017_09_18_065438_add_foreign_keys_to_voters_table',0),(604,'2017_09_20_030415_create_buildings_table',0),(605,'2017_09_20_030415_create_buildingtypes_table',0),(606,'2017_09_20_030415_create_businesscategories_table',0),(607,'2017_09_20_030415_create_businesses_table',0),(608,'2017_09_20_030415_create_businessregistrations_table',0),(609,'2017_09_20_030415_create_collections_table',0),(610,'2017_09_20_030415_create_document_requirements_table',0),(611,'2017_09_20_030415_create_documentrequests_table',0),(612,'2017_09_20_030415_create_documents_table',0),(613,'2017_09_20_030415_create_employeeposition_table',0),(614,'2017_09_20_030415_create_employees_table',0),(615,'2017_09_20_030415_create_facilities_table',0),(616,'2017_09_20_030415_create_facilitytypes_table',0),(617,'2017_09_20_030415_create_families_table',0),(618,'2017_09_20_030415_create_familymembers_table',0),(619,'2017_09_20_030415_create_generaladdresses_table',0),(620,'2017_09_20_030415_create_lots_table',0),(621,'2017_09_20_030415_create_messages_table',0),(622,'2017_09_20_030415_create_participants_table',0),(623,'2017_09_20_030415_create_partrecipients_table',0),(624,'2017_09_20_030415_create_people_table',0),(625,'2017_09_20_030415_create_recipients_table',0),(626,'2017_09_20_030415_create_requestrequirements_table',0),(627,'2017_09_20_030415_create_requirements_table',0),(628,'2017_09_20_030415_create_reservations_table',0),(629,'2017_09_20_030415_create_residentaccountregistrations_table',0),(630,'2017_09_20_030415_create_residentaccounts_table',0),(631,'2017_09_20_030415_create_residentbackgrounds_table',0),(632,'2017_09_20_030415_create_residentregistrations_table',0),(633,'2017_09_20_030415_create_residents_table',0),(634,'2017_09_20_030415_create_services_table',0),(635,'2017_09_20_030415_create_servicesponsorships_table',0),(636,'2017_09_20_030415_create_servicetransactions_table',0),(637,'2017_09_20_030415_create_servicetypes_table',0),(638,'2017_09_20_030415_create_streets_table',0),(639,'2017_09_20_030415_create_sysutil_table',0),(640,'2017_09_20_030415_create_units_table',0),(641,'2017_09_20_030415_create_users_table',0),(642,'2017_09_20_030415_create_utilities_table',0),(643,'2017_09_20_030415_create_voters_table',0),(644,'2017_09_20_030424_add_foreign_keys_to_buildings_table',0),(645,'2017_09_20_030424_add_foreign_keys_to_businesses_table',0),(646,'2017_09_20_030424_add_foreign_keys_to_businessregistrations_table',0),(647,'2017_09_20_030424_add_foreign_keys_to_collections_table',0),(648,'2017_09_20_030424_add_foreign_keys_to_document_requirements_table',0),(649,'2017_09_20_030424_add_foreign_keys_to_documentrequests_table',0),(650,'2017_09_20_030424_add_foreign_keys_to_employeeposition_table',0),(651,'2017_09_20_030424_add_foreign_keys_to_facilities_table',0),(652,'2017_09_20_030424_add_foreign_keys_to_families_table',0),(653,'2017_09_20_030424_add_foreign_keys_to_familymembers_table',0),(654,'2017_09_20_030424_add_foreign_keys_to_generaladdresses_table',0),(655,'2017_09_20_030424_add_foreign_keys_to_lots_table',0),(656,'2017_09_20_030424_add_foreign_keys_to_messages_table',0),(657,'2017_09_20_030424_add_foreign_keys_to_participants_table',0),(658,'2017_09_20_030424_add_foreign_keys_to_partrecipients_table',0),(659,'2017_09_20_030424_add_foreign_keys_to_requestrequirements_table',0),(660,'2017_09_20_030424_add_foreign_keys_to_reservations_table',0),(661,'2017_09_20_030424_add_foreign_keys_to_residentaccountregistrations_table',0),(662,'2017_09_20_030424_add_foreign_keys_to_residentaccounts_table',0),(663,'2017_09_20_030424_add_foreign_keys_to_residentbackgrounds_table',0),(664,'2017_09_20_030424_add_foreign_keys_to_residentregistrations_table',0),(665,'2017_09_20_030424_add_foreign_keys_to_services_table',0),(666,'2017_09_20_030424_add_foreign_keys_to_servicesponsorships_table',0),(667,'2017_09_20_030424_add_foreign_keys_to_servicetransactions_table',0),(668,'2017_09_20_030424_add_foreign_keys_to_units_table',0),(669,'2017_09_20_030424_add_foreign_keys_to_voters_table',0),(670,'2017_09_20_032022_create_buildings_table',0),(671,'2017_09_20_032022_create_buildingtypes_table',0),(672,'2017_09_20_032022_create_businesscategories_table',0),(673,'2017_09_20_032022_create_businesses_table',0),(674,'2017_09_20_032022_create_businessregistrations_table',0),(675,'2017_09_20_032022_create_collections_table',0),(676,'2017_09_20_032022_create_document_requirements_table',0),(677,'2017_09_20_032022_create_documentrequests_table',0),(678,'2017_09_20_032022_create_documents_table',0),(679,'2017_09_20_032022_create_employeeposition_table',0),(680,'2017_09_20_032022_create_employees_table',0),(681,'2017_09_20_032022_create_facilities_table',0),(682,'2017_09_20_032022_create_facilitytypes_table',0),(683,'2017_09_20_032022_create_families_table',0),(684,'2017_09_20_032022_create_familymembers_table',0),(685,'2017_09_20_032022_create_generaladdresses_table',0),(686,'2017_09_20_032022_create_lots_table',0),(687,'2017_09_20_032022_create_messages_table',0),(688,'2017_09_20_032022_create_participants_table',0),(689,'2017_09_20_032022_create_partrecipients_table',0),(690,'2017_09_20_032022_create_people_table',0),(691,'2017_09_20_032022_create_recipients_table',0),(692,'2017_09_20_032022_create_requestrequirements_table',0),(693,'2017_09_20_032022_create_requirements_table',0),(694,'2017_09_20_032022_create_reservations_table',0),(695,'2017_09_20_032022_create_residentaccountregistrations_table',0),(696,'2017_09_20_032022_create_residentaccounts_table',0),(697,'2017_09_20_032022_create_residentbackgrounds_table',0),(698,'2017_09_20_032022_create_residentregistrations_table',0),(699,'2017_09_20_032022_create_residents_table',0),(700,'2017_09_20_032022_create_services_table',0),(701,'2017_09_20_032022_create_servicesponsorships_table',0),(702,'2017_09_20_032022_create_servicetransactions_table',0),(703,'2017_09_20_032022_create_servicetypes_table',0),(704,'2017_09_20_032022_create_streets_table',0),(705,'2017_09_20_032022_create_sysutil_table',0),(706,'2017_09_20_032022_create_units_table',0),(707,'2017_09_20_032022_create_users_table',0),(708,'2017_09_20_032022_create_utilities_table',0),(709,'2017_09_20_032022_create_voters_table',0),(710,'2017_09_20_032044_add_foreign_keys_to_buildings_table',0),(711,'2017_09_20_032044_add_foreign_keys_to_businesses_table',0),(712,'2017_09_20_032044_add_foreign_keys_to_businessregistrations_table',0),(713,'2017_09_20_032044_add_foreign_keys_to_collections_table',0),(714,'2017_09_20_032044_add_foreign_keys_to_document_requirements_table',0),(715,'2017_09_20_032044_add_foreign_keys_to_documentrequests_table',0),(716,'2017_09_20_032044_add_foreign_keys_to_employeeposition_table',0),(717,'2017_09_20_032044_add_foreign_keys_to_facilities_table',0),(718,'2017_09_20_032044_add_foreign_keys_to_families_table',0),(719,'2017_09_20_032044_add_foreign_keys_to_familymembers_table',0),(720,'2017_09_20_032044_add_foreign_keys_to_generaladdresses_table',0),(721,'2017_09_20_032044_add_foreign_keys_to_lots_table',0),(722,'2017_09_20_032044_add_foreign_keys_to_messages_table',0),(723,'2017_09_20_032044_add_foreign_keys_to_participants_table',0),(724,'2017_09_20_032044_add_foreign_keys_to_partrecipients_table',0),(725,'2017_09_20_032044_add_foreign_keys_to_requestrequirements_table',0),(726,'2017_09_20_032044_add_foreign_keys_to_reservations_table',0),(727,'2017_09_20_032044_add_foreign_keys_to_residentaccountregistrations_table',0),(728,'2017_09_20_032044_add_foreign_keys_to_residentaccounts_table',0),(729,'2017_09_20_032044_add_foreign_keys_to_residentbackgrounds_table',0),(730,'2017_09_20_032044_add_foreign_keys_to_residentregistrations_table',0),(731,'2017_09_20_032044_add_foreign_keys_to_services_table',0),(732,'2017_09_20_032044_add_foreign_keys_to_servicesponsorships_table',0),(733,'2017_09_20_032044_add_foreign_keys_to_servicetransactions_table',0),(734,'2017_09_20_032044_add_foreign_keys_to_units_table',0),(735,'2017_09_20_032044_add_foreign_keys_to_voters_table',0),(736,'2017_09_20_161610_create_buildings_table',0),(737,'2017_09_20_161610_create_buildingtypes_table',0),(738,'2017_09_20_161610_create_businesscategories_table',0),(739,'2017_09_20_161610_create_businesses_table',0),(740,'2017_09_20_161610_create_businessregistrations_table',0),(741,'2017_09_20_161610_create_collections_table',0),(742,'2017_09_20_161610_create_document_requirements_table',0),(743,'2017_09_20_161610_create_documentrequests_table',0),(744,'2017_09_20_161610_create_documents_table',0),(745,'2017_09_20_161610_create_employeeposition_table',0),(746,'2017_09_20_161610_create_employees_table',0),(747,'2017_09_20_161610_create_facilities_table',0),(748,'2017_09_20_161610_create_facilitytypes_table',0),(749,'2017_09_20_161610_create_families_table',0),(750,'2017_09_20_161610_create_familymembers_table',0),(751,'2017_09_20_161610_create_generaladdresses_table',0),(752,'2017_09_20_161610_create_lots_table',0),(753,'2017_09_20_161610_create_messages_table',0),(754,'2017_09_20_161610_create_participants_table',0),(755,'2017_09_20_161610_create_partrecipients_table',0),(756,'2017_09_20_161610_create_people_table',0),(757,'2017_09_20_161610_create_recipients_table',0),(758,'2017_09_20_161610_create_requestrequirements_table',0),(759,'2017_09_20_161610_create_requirements_table',0),(760,'2017_09_20_161610_create_reservations_table',0),(761,'2017_09_20_161610_create_residentaccountregistrations_table',0),(762,'2017_09_20_161610_create_residentaccounts_table',0),(763,'2017_09_20_161610_create_residentbackgrounds_table',0),(764,'2017_09_20_161610_create_residentregistrations_table',0),(765,'2017_09_20_161610_create_residents_table',0),(766,'2017_09_20_161610_create_services_table',0),(767,'2017_09_20_161610_create_servicesponsorships_table',0),(768,'2017_09_20_161610_create_servicetransactions_table',0),(769,'2017_09_20_161610_create_servicetypes_table',0),(770,'2017_09_20_161610_create_streets_table',0),(771,'2017_09_20_161610_create_sysutil_table',0),(772,'2017_09_20_161610_create_units_table',0),(773,'2017_09_20_161610_create_users_table',0),(774,'2017_09_20_161610_create_utilities_table',0),(775,'2017_09_20_161610_create_voters_table',0),(776,'2017_09_20_161617_add_foreign_keys_to_buildings_table',0),(777,'2017_09_20_161617_add_foreign_keys_to_businesses_table',0),(778,'2017_09_20_161617_add_foreign_keys_to_businessregistrations_table',0),(779,'2017_09_20_161617_add_foreign_keys_to_collections_table',0),(780,'2017_09_20_161617_add_foreign_keys_to_document_requirements_table',0),(781,'2017_09_20_161617_add_foreign_keys_to_documentrequests_table',0),(782,'2017_09_20_161617_add_foreign_keys_to_employeeposition_table',0),(783,'2017_09_20_161617_add_foreign_keys_to_facilities_table',0),(784,'2017_09_20_161617_add_foreign_keys_to_families_table',0),(785,'2017_09_20_161617_add_foreign_keys_to_familymembers_table',0),(786,'2017_09_20_161617_add_foreign_keys_to_generaladdresses_table',0),(787,'2017_09_20_161617_add_foreign_keys_to_lots_table',0),(788,'2017_09_20_161617_add_foreign_keys_to_messages_table',0),(789,'2017_09_20_161617_add_foreign_keys_to_participants_table',0),(790,'2017_09_20_161617_add_foreign_keys_to_partrecipients_table',0),(791,'2017_09_20_161617_add_foreign_keys_to_requestrequirements_table',0),(792,'2017_09_20_161617_add_foreign_keys_to_reservations_table',0),(793,'2017_09_20_161617_add_foreign_keys_to_residentaccountregistrations_table',0),(794,'2017_09_20_161617_add_foreign_keys_to_residentaccounts_table',0),(795,'2017_09_20_161617_add_foreign_keys_to_residentbackgrounds_table',0),(796,'2017_09_20_161617_add_foreign_keys_to_residentregistrations_table',0),(797,'2017_09_20_161617_add_foreign_keys_to_services_table',0),(798,'2017_09_20_161617_add_foreign_keys_to_servicesponsorships_table',0),(799,'2017_09_20_161617_add_foreign_keys_to_servicetransactions_table',0),(800,'2017_09_20_161617_add_foreign_keys_to_units_table',0),(801,'2017_09_20_161617_add_foreign_keys_to_voters_table',0),(802,'2017_09_20_164901_create_buildings_table',0),(803,'2017_09_20_164901_create_buildingtypes_table',0),(804,'2017_09_20_164901_create_businesscategories_table',0),(805,'2017_09_20_164901_create_businesses_table',0),(806,'2017_09_20_164901_create_businessregistrations_table',0),(807,'2017_09_20_164901_create_collections_table',0),(808,'2017_09_20_164901_create_document_requirements_table',0),(809,'2017_09_20_164901_create_documentrequests_table',0),(810,'2017_09_20_164901_create_documents_table',0),(811,'2017_09_20_164901_create_employeeposition_table',0),(812,'2017_09_20_164901_create_employees_table',0),(813,'2017_09_20_164901_create_facilities_table',0),(814,'2017_09_20_164901_create_facilitytypes_table',0),(815,'2017_09_20_164901_create_families_table',0),(816,'2017_09_20_164901_create_familymembers_table',0),(817,'2017_09_20_164901_create_generaladdresses_table',0),(818,'2017_09_20_164901_create_lots_table',0),(819,'2017_09_20_164901_create_messages_table',0),(820,'2017_09_20_164901_create_participants_table',0),(821,'2017_09_20_164901_create_partrecipients_table',0),(822,'2017_09_20_164901_create_people_table',0),(823,'2017_09_20_164901_create_recipients_table',0),(824,'2017_09_20_164901_create_requestrequirements_table',0),(825,'2017_09_20_164901_create_requirements_table',0),(826,'2017_09_20_164901_create_reservations_table',0),(827,'2017_09_20_164901_create_residentaccountregistrations_table',0),(828,'2017_09_20_164901_create_residentaccounts_table',0),(829,'2017_09_20_164901_create_residentbackgrounds_table',0),(830,'2017_09_20_164901_create_residentregistrations_table',0),(831,'2017_09_20_164901_create_residents_table',0),(832,'2017_09_20_164901_create_services_table',0),(833,'2017_09_20_164901_create_servicesponsorships_table',0),(834,'2017_09_20_164901_create_servicetransactions_table',0),(835,'2017_09_20_164901_create_servicetypes_table',0),(836,'2017_09_20_164901_create_streets_table',0),(837,'2017_09_20_164901_create_sysutil_table',0),(838,'2017_09_20_164901_create_units_table',0),(839,'2017_09_20_164901_create_users_table',0),(840,'2017_09_20_164901_create_utilities_table',0),(841,'2017_09_20_164901_create_voters_table',0),(842,'2017_09_20_164907_add_foreign_keys_to_buildings_table',0),(843,'2017_09_20_164907_add_foreign_keys_to_businesses_table',0),(844,'2017_09_20_164907_add_foreign_keys_to_businessregistrations_table',0),(845,'2017_09_20_164907_add_foreign_keys_to_collections_table',0),(846,'2017_09_20_164907_add_foreign_keys_to_document_requirements_table',0),(847,'2017_09_20_164907_add_foreign_keys_to_documentrequests_table',0),(848,'2017_09_20_164907_add_foreign_keys_to_employeeposition_table',0),(849,'2017_09_20_164907_add_foreign_keys_to_facilities_table',0),(850,'2017_09_20_164907_add_foreign_keys_to_families_table',0),(851,'2017_09_20_164907_add_foreign_keys_to_familymembers_table',0),(852,'2017_09_20_164907_add_foreign_keys_to_generaladdresses_table',0),(853,'2017_09_20_164907_add_foreign_keys_to_lots_table',0),(854,'2017_09_20_164907_add_foreign_keys_to_messages_table',0),(855,'2017_09_20_164907_add_foreign_keys_to_participants_table',0),(856,'2017_09_20_164907_add_foreign_keys_to_partrecipients_table',0),(857,'2017_09_20_164907_add_foreign_keys_to_requestrequirements_table',0),(858,'2017_09_20_164907_add_foreign_keys_to_reservations_table',0),(859,'2017_09_20_164907_add_foreign_keys_to_residentaccountregistrations_table',0),(860,'2017_09_20_164907_add_foreign_keys_to_residentaccounts_table',0),(861,'2017_09_20_164907_add_foreign_keys_to_residentbackgrounds_table',0),(862,'2017_09_20_164907_add_foreign_keys_to_residentregistrations_table',0),(863,'2017_09_20_164907_add_foreign_keys_to_services_table',0),(864,'2017_09_20_164907_add_foreign_keys_to_servicesponsorships_table',0),(865,'2017_09_20_164907_add_foreign_keys_to_servicetransactions_table',0),(866,'2017_09_20_164907_add_foreign_keys_to_units_table',0),(867,'2017_09_20_164907_add_foreign_keys_to_voters_table',0),(868,'2017_09_20_171200_create_buildings_table',0),(869,'2017_09_20_171200_create_buildingtypes_table',0),(870,'2017_09_20_171200_create_businesscategories_table',0),(871,'2017_09_20_171200_create_businesses_table',0),(872,'2017_09_20_171200_create_businessregistrations_table',0),(873,'2017_09_20_171200_create_collections_table',0),(874,'2017_09_20_171200_create_document_requirements_table',0),(875,'2017_09_20_171200_create_documentrequests_table',0),(876,'2017_09_20_171200_create_documents_table',0),(877,'2017_09_20_171200_create_employeeposition_table',0),(878,'2017_09_20_171200_create_employees_table',0),(879,'2017_09_20_171200_create_facilities_table',0),(880,'2017_09_20_171200_create_facilitytypes_table',0),(881,'2017_09_20_171200_create_families_table',0),(882,'2017_09_20_171200_create_familymembers_table',0),(883,'2017_09_20_171200_create_generaladdresses_table',0),(884,'2017_09_20_171200_create_lots_table',0),(885,'2017_09_20_171200_create_messages_table',0),(886,'2017_09_20_171200_create_participants_table',0),(887,'2017_09_20_171200_create_partrecipients_table',0),(888,'2017_09_20_171200_create_people_table',0),(889,'2017_09_20_171200_create_recipients_table',0),(890,'2017_09_20_171200_create_requestrequirements_table',0),(891,'2017_09_20_171200_create_requirements_table',0),(892,'2017_09_20_171200_create_reservations_table',0),(893,'2017_09_20_171200_create_residentaccountregistrations_table',0),(894,'2017_09_20_171200_create_residentaccounts_table',0),(895,'2017_09_20_171200_create_residentbackgrounds_table',0),(896,'2017_09_20_171200_create_residentregistrations_table',0),(897,'2017_09_20_171200_create_residents_table',0),(898,'2017_09_20_171200_create_services_table',0),(899,'2017_09_20_171200_create_servicesponsorships_table',0),(900,'2017_09_20_171200_create_servicetransactions_table',0),(901,'2017_09_20_171200_create_servicetypes_table',0),(902,'2017_09_20_171200_create_streets_table',0),(903,'2017_09_20_171200_create_sysutil_table',0),(904,'2017_09_20_171200_create_units_table',0),(905,'2017_09_20_171200_create_users_table',0),(906,'2017_09_20_171200_create_utilities_table',0),(907,'2017_09_20_171200_create_voters_table',0),(908,'2017_09_20_171206_add_foreign_keys_to_buildings_table',0),(909,'2017_09_20_171206_add_foreign_keys_to_businesses_table',0),(910,'2017_09_20_171206_add_foreign_keys_to_businessregistrations_table',0),(911,'2017_09_20_171206_add_foreign_keys_to_collections_table',0),(912,'2017_09_20_171206_add_foreign_keys_to_document_requirements_table',0),(913,'2017_09_20_171206_add_foreign_keys_to_documentrequests_table',0),(914,'2017_09_20_171206_add_foreign_keys_to_employeeposition_table',0),(915,'2017_09_20_171206_add_foreign_keys_to_facilities_table',0),(916,'2017_09_20_171206_add_foreign_keys_to_families_table',0),(917,'2017_09_20_171206_add_foreign_keys_to_familymembers_table',0),(918,'2017_09_20_171206_add_foreign_keys_to_generaladdresses_table',0),(919,'2017_09_20_171206_add_foreign_keys_to_lots_table',0),(920,'2017_09_20_171206_add_foreign_keys_to_messages_table',0),(921,'2017_09_20_171206_add_foreign_keys_to_participants_table',0),(922,'2017_09_20_171206_add_foreign_keys_to_partrecipients_table',0),(923,'2017_09_20_171206_add_foreign_keys_to_requestrequirements_table',0),(924,'2017_09_20_171206_add_foreign_keys_to_reservations_table',0),(925,'2017_09_20_171206_add_foreign_keys_to_residentaccountregistrations_table',0),(926,'2017_09_20_171206_add_foreign_keys_to_residentaccounts_table',0),(927,'2017_09_20_171206_add_foreign_keys_to_residentbackgrounds_table',0),(928,'2017_09_20_171206_add_foreign_keys_to_residentregistrations_table',0),(929,'2017_09_20_171206_add_foreign_keys_to_services_table',0),(930,'2017_09_20_171206_add_foreign_keys_to_servicesponsorships_table',0),(931,'2017_09_20_171206_add_foreign_keys_to_servicetransactions_table',0),(932,'2017_09_20_171206_add_foreign_keys_to_units_table',0),(933,'2017_09_20_171206_add_foreign_keys_to_voters_table',0),(934,'2017_09_21_082559_create_buildings_table',0),(935,'2017_09_21_082559_create_buildingtypes_table',0),(936,'2017_09_21_082559_create_businesscategories_table',0),(937,'2017_09_21_082559_create_businesses_table',0),(938,'2017_09_21_082559_create_businessregistrations_table',0),(939,'2017_09_21_082559_create_collections_table',0),(940,'2017_09_21_082559_create_document_requirements_table',0),(941,'2017_09_21_082559_create_documentrequests_table',0),(942,'2017_09_21_082559_create_documents_table',0),(943,'2017_09_21_082559_create_employeeposition_table',0),(944,'2017_09_21_082559_create_employees_table',0),(945,'2017_09_21_082559_create_facilities_table',0),(946,'2017_09_21_082559_create_facilitytypes_table',0),(947,'2017_09_21_082559_create_families_table',0),(948,'2017_09_21_082559_create_familymembers_table',0),(949,'2017_09_21_082559_create_generaladdresses_table',0),(950,'2017_09_21_082559_create_logs_table',0),(951,'2017_09_21_082559_create_lots_table',0),(952,'2017_09_21_082559_create_messages_table',0),(953,'2017_09_21_082559_create_participants_table',0),(954,'2017_09_21_082559_create_partrecipients_table',0),(955,'2017_09_21_082559_create_people_table',0),(956,'2017_09_21_082559_create_recipients_table',0),(957,'2017_09_21_082559_create_requestrequirements_table',0),(958,'2017_09_21_082559_create_requirements_table',0),(959,'2017_09_21_082559_create_reservations_table',0),(960,'2017_09_21_082559_create_residentaccountregistrations_table',0),(961,'2017_09_21_082559_create_residentaccounts_table',0),(962,'2017_09_21_082559_create_residentbackgrounds_table',0),(963,'2017_09_21_082559_create_residentregistrations_table',0),(964,'2017_09_21_082559_create_residents_table',0),(965,'2017_09_21_082559_create_services_table',0),(966,'2017_09_21_082559_create_servicesponsorships_table',0),(967,'2017_09_21_082559_create_servicetransactions_table',0),(968,'2017_09_21_082559_create_servicetypes_table',0),(969,'2017_09_21_082559_create_streets_table',0),(970,'2017_09_21_082559_create_sysutil_table',0),(971,'2017_09_21_082559_create_units_table',0),(972,'2017_09_21_082559_create_users_table',0),(973,'2017_09_21_082559_create_utilities_table',0),(974,'2017_09_21_082559_create_voters_table',0),(975,'2017_09_21_082605_add_foreign_keys_to_buildings_table',0),(976,'2017_09_21_082605_add_foreign_keys_to_businesses_table',0),(977,'2017_09_21_082605_add_foreign_keys_to_businessregistrations_table',0),(978,'2017_09_21_082605_add_foreign_keys_to_collections_table',0),(979,'2017_09_21_082605_add_foreign_keys_to_document_requirements_table',0),(980,'2017_09_21_082605_add_foreign_keys_to_documentrequests_table',0),(981,'2017_09_21_082605_add_foreign_keys_to_employeeposition_table',0),(982,'2017_09_21_082605_add_foreign_keys_to_facilities_table',0),(983,'2017_09_21_082605_add_foreign_keys_to_families_table',0),(984,'2017_09_21_082605_add_foreign_keys_to_familymembers_table',0),(985,'2017_09_21_082605_add_foreign_keys_to_generaladdresses_table',0),(986,'2017_09_21_082605_add_foreign_keys_to_logs_table',0),(987,'2017_09_21_082605_add_foreign_keys_to_lots_table',0),(988,'2017_09_21_082605_add_foreign_keys_to_messages_table',0),(989,'2017_09_21_082605_add_foreign_keys_to_participants_table',0),(990,'2017_09_21_082605_add_foreign_keys_to_partrecipients_table',0),(991,'2017_09_21_082605_add_foreign_keys_to_requestrequirements_table',0),(992,'2017_09_21_082605_add_foreign_keys_to_reservations_table',0),(993,'2017_09_21_082605_add_foreign_keys_to_residentaccountregistrations_table',0),(994,'2017_09_21_082605_add_foreign_keys_to_residentaccounts_table',0),(995,'2017_09_21_082605_add_foreign_keys_to_residentbackgrounds_table',0),(996,'2017_09_21_082605_add_foreign_keys_to_residentregistrations_table',0),(997,'2017_09_21_082605_add_foreign_keys_to_services_table',0),(998,'2017_09_21_082605_add_foreign_keys_to_servicesponsorships_table',0),(999,'2017_09_21_082605_add_foreign_keys_to_servicetransactions_table',0),(1000,'2017_09_21_082605_add_foreign_keys_to_units_table',0),(1001,'2017_09_21_082605_add_foreign_keys_to_voters_table',0),(1002,'2017_09_26_213236_create_buildings_table',0),(1003,'2017_09_26_213236_create_buildingtypes_table',0),(1004,'2017_09_26_213236_create_businesscategories_table',0),(1005,'2017_09_26_213236_create_businesses_table',0),(1006,'2017_09_26_213236_create_businessregistrations_table',0),(1007,'2017_09_26_213236_create_collections_table',0),(1008,'2017_09_26_213236_create_document_requirements_table',0),(1009,'2017_09_26_213236_create_documentrequests_table',0),(1010,'2017_09_26_213236_create_documents_table',0),(1011,'2017_09_26_213236_create_employeeposition_table',0),(1012,'2017_09_26_213236_create_employees_table',0),(1013,'2017_09_26_213236_create_facilities_table',0),(1014,'2017_09_26_213236_create_facilitytypes_table',0),(1015,'2017_09_26_213236_create_families_table',0),(1016,'2017_09_26_213236_create_familymembers_table',0),(1017,'2017_09_26_213236_create_generaladdresses_table',0),(1018,'2017_09_26_213236_create_logs_table',0),(1019,'2017_09_26_213236_create_lots_table',0),(1020,'2017_09_26_213236_create_messages_table',0),(1021,'2017_09_26_213236_create_participants_table',0),(1022,'2017_09_26_213236_create_partrecipients_table',0),(1023,'2017_09_26_213236_create_people_table',0),(1024,'2017_09_26_213236_create_recipients_table',0),(1025,'2017_09_26_213236_create_requestrequirements_table',0),(1026,'2017_09_26_213236_create_requirements_table',0),(1027,'2017_09_26_213236_create_reservations_table',0),(1028,'2017_09_26_213236_create_residentaccountregistrations_table',0),(1029,'2017_09_26_213236_create_residentaccounts_table',0),(1030,'2017_09_26_213236_create_residentbackgrounds_table',0),(1031,'2017_09_26_213236_create_residentregistrations_table',0),(1032,'2017_09_26_213236_create_residents_table',0),(1033,'2017_09_26_213236_create_services_table',0),(1034,'2017_09_26_213236_create_servicesponsorships_table',0),(1035,'2017_09_26_213236_create_servicetransactions_table',0),(1036,'2017_09_26_213236_create_servicetypes_table',0),(1037,'2017_09_26_213236_create_streets_table',0),(1038,'2017_09_26_213236_create_sysutil_table',0),(1039,'2017_09_26_213236_create_units_table',0),(1040,'2017_09_26_213236_create_users_table',0),(1041,'2017_09_26_213236_create_utilities_table',0),(1042,'2017_09_26_213236_create_voters_table',0),(1043,'2017_09_26_213243_add_foreign_keys_to_buildings_table',0),(1044,'2017_09_26_213243_add_foreign_keys_to_businesses_table',0),(1045,'2017_09_26_213243_add_foreign_keys_to_businessregistrations_table',0),(1046,'2017_09_26_213243_add_foreign_keys_to_collections_table',0),(1047,'2017_09_26_213243_add_foreign_keys_to_document_requirements_table',0),(1048,'2017_09_26_213243_add_foreign_keys_to_documentrequests_table',0),(1049,'2017_09_26_213243_add_foreign_keys_to_employeeposition_table',0),(1050,'2017_09_26_213243_add_foreign_keys_to_facilities_table',0),(1051,'2017_09_26_213243_add_foreign_keys_to_families_table',0),(1052,'2017_09_26_213243_add_foreign_keys_to_familymembers_table',0),(1053,'2017_09_26_213243_add_foreign_keys_to_generaladdresses_table',0),(1054,'2017_09_26_213243_add_foreign_keys_to_logs_table',0),(1055,'2017_09_26_213243_add_foreign_keys_to_lots_table',0),(1056,'2017_09_26_213243_add_foreign_keys_to_messages_table',0),(1057,'2017_09_26_213243_add_foreign_keys_to_participants_table',0),(1058,'2017_09_26_213243_add_foreign_keys_to_partrecipients_table',0),(1059,'2017_09_26_213243_add_foreign_keys_to_requestrequirements_table',0),(1060,'2017_09_26_213243_add_foreign_keys_to_reservations_table',0),(1061,'2017_09_26_213243_add_foreign_keys_to_residentaccountregistrations_table',0),(1062,'2017_09_26_213243_add_foreign_keys_to_residentaccounts_table',0),(1063,'2017_09_26_213243_add_foreign_keys_to_residentbackgrounds_table',0),(1064,'2017_09_26_213243_add_foreign_keys_to_residentregistrations_table',0),(1065,'2017_09_26_213243_add_foreign_keys_to_services_table',0),(1066,'2017_09_26_213243_add_foreign_keys_to_servicesponsorships_table',0),(1067,'2017_09_26_213243_add_foreign_keys_to_servicetransactions_table',0),(1068,'2017_09_26_213243_add_foreign_keys_to_units_table',0),(1069,'2017_09_26_213243_add_foreign_keys_to_voters_table',0),(1070,'2017_10_08_104044_create_barangaycard_table',0),(1071,'2017_10_08_104044_create_buildings_table',0),(1072,'2017_10_08_104044_create_buildingtypes_table',0),(1073,'2017_10_08_104044_create_businesscategories_table',0),(1074,'2017_10_08_104044_create_businesses_table',0),(1075,'2017_10_08_104044_create_businessregistrations_table',0),(1076,'2017_10_08_104044_create_collections_table',0),(1077,'2017_10_08_104044_create_document_requirements_table',0),(1078,'2017_10_08_104044_create_documentrequests_table',0),(1079,'2017_10_08_104044_create_documents_table',0),(1080,'2017_10_08_104044_create_employeeposition_table',0),(1081,'2017_10_08_104044_create_employees_table',0),(1082,'2017_10_08_104044_create_facilities_table',0),(1083,'2017_10_08_104044_create_facilitytypes_table',0),(1084,'2017_10_08_104044_create_families_table',0),(1085,'2017_10_08_104044_create_familymembers_table',0),(1086,'2017_10_08_104044_create_logs_table',0),(1087,'2017_10_08_104044_create_lots_table',0),(1088,'2017_10_08_104044_create_messages_table',0),(1089,'2017_10_08_104044_create_participants_table',0),(1090,'2017_10_08_104044_create_partrecipients_table',0),(1091,'2017_10_08_104044_create_people_table',0),(1092,'2017_10_08_104044_create_recipients_table',0),(1093,'2017_10_08_104044_create_requestrequirements_table',0),(1094,'2017_10_08_104044_create_requirements_table',0),(1095,'2017_10_08_104044_create_reservations_table',0),(1096,'2017_10_08_104044_create_residentaccountregistrations_table',0),(1097,'2017_10_08_104044_create_residentaccounts_table',0),(1098,'2017_10_08_104044_create_residentbackgrounds_table',0),(1099,'2017_10_08_104044_create_residentregistrations_table',0),(1100,'2017_10_08_104044_create_residents_table',0),(1101,'2017_10_08_104044_create_services_table',0),(1102,'2017_10_08_104044_create_servicesponsorships_table',0),(1103,'2017_10_08_104044_create_servicetransactions_table',0),(1104,'2017_10_08_104044_create_servicetypes_table',0),(1105,'2017_10_08_104044_create_streets_table',0),(1106,'2017_10_08_104044_create_sysutil_table',0),(1107,'2017_10_08_104044_create_units_table',0),(1108,'2017_10_08_104044_create_users_table',0),(1109,'2017_10_08_104044_create_utilities_table',0),(1110,'2017_10_08_104044_create_voters_table',0),(1111,'2017_10_08_104051_add_foreign_keys_to_barangaycard_table',0),(1112,'2017_10_08_104051_add_foreign_keys_to_buildings_table',0),(1113,'2017_10_08_104051_add_foreign_keys_to_businesses_table',0),(1114,'2017_10_08_104051_add_foreign_keys_to_businessregistrations_table',0),(1115,'2017_10_08_104051_add_foreign_keys_to_collections_table',0),(1116,'2017_10_08_104051_add_foreign_keys_to_document_requirements_table',0),(1117,'2017_10_08_104051_add_foreign_keys_to_documentrequests_table',0),(1118,'2017_10_08_104051_add_foreign_keys_to_employeeposition_table',0),(1119,'2017_10_08_104051_add_foreign_keys_to_facilities_table',0),(1120,'2017_10_08_104051_add_foreign_keys_to_families_table',0),(1121,'2017_10_08_104051_add_foreign_keys_to_familymembers_table',0),(1122,'2017_10_08_104051_add_foreign_keys_to_logs_table',0),(1123,'2017_10_08_104051_add_foreign_keys_to_lots_table',0),(1124,'2017_10_08_104051_add_foreign_keys_to_messages_table',0),(1125,'2017_10_08_104051_add_foreign_keys_to_participants_table',0),(1126,'2017_10_08_104051_add_foreign_keys_to_partrecipients_table',0),(1127,'2017_10_08_104051_add_foreign_keys_to_requestrequirements_table',0),(1128,'2017_10_08_104051_add_foreign_keys_to_reservations_table',0),(1129,'2017_10_08_104051_add_foreign_keys_to_residentaccountregistrations_table',0),(1130,'2017_10_08_104051_add_foreign_keys_to_residentaccounts_table',0),(1131,'2017_10_08_104051_add_foreign_keys_to_residentbackgrounds_table',0),(1132,'2017_10_08_104051_add_foreign_keys_to_residentregistrations_table',0),(1133,'2017_10_08_104051_add_foreign_keys_to_services_table',0),(1134,'2017_10_08_104051_add_foreign_keys_to_servicesponsorships_table',0),(1135,'2017_10_08_104051_add_foreign_keys_to_servicetransactions_table',0),(1136,'2017_10_08_104051_add_foreign_keys_to_units_table',0),(1137,'2017_10_08_104051_add_foreign_keys_to_voters_table',0),(1138,'2017_10_09_004841_create_barangaycard_table',0),(1139,'2017_10_09_004841_create_buildings_table',0),(1140,'2017_10_09_004841_create_buildingtypes_table',0),(1141,'2017_10_09_004841_create_businesscategories_table',0),(1142,'2017_10_09_004841_create_businesses_table',0),(1143,'2017_10_09_004841_create_businessregistrations_table',0),(1144,'2017_10_09_004841_create_collections_table',0),(1145,'2017_10_09_004841_create_document_requirements_table',0),(1146,'2017_10_09_004841_create_documentrequests_table',0),(1147,'2017_10_09_004841_create_documents_table',0),(1148,'2017_10_09_004841_create_employeeposition_table',0),(1149,'2017_10_09_004841_create_employees_table',0),(1150,'2017_10_09_004841_create_facilities_table',0),(1151,'2017_10_09_004841_create_facilitytypes_table',0),(1152,'2017_10_09_004841_create_families_table',0),(1153,'2017_10_09_004841_create_familymembers_table',0),(1154,'2017_10_09_004841_create_logs_table',0),(1155,'2017_10_09_004841_create_lots_table',0),(1156,'2017_10_09_004841_create_messages_table',0),(1157,'2017_10_09_004841_create_participants_table',0),(1158,'2017_10_09_004841_create_partrecipients_table',0),(1159,'2017_10_09_004841_create_people_table',0),(1160,'2017_10_09_004841_create_recipients_table',0),(1161,'2017_10_09_004841_create_requestrequirements_table',0),(1162,'2017_10_09_004841_create_requirements_table',0),(1163,'2017_10_09_004841_create_reservations_table',0),(1164,'2017_10_09_004841_create_residentaccountregistrations_table',0),(1165,'2017_10_09_004841_create_residentaccounts_table',0),(1166,'2017_10_09_004841_create_residentbackgrounds_table',0),(1167,'2017_10_09_004841_create_residentregistrations_table',0),(1168,'2017_10_09_004841_create_residents_table',0),(1169,'2017_10_09_004841_create_services_table',0),(1170,'2017_10_09_004841_create_servicesponsorships_table',0),(1171,'2017_10_09_004841_create_servicetransactions_table',0),(1172,'2017_10_09_004841_create_servicetypes_table',0),(1173,'2017_10_09_004841_create_streets_table',0),(1174,'2017_10_09_004841_create_sysutil_table',0),(1175,'2017_10_09_004841_create_units_table',0),(1176,'2017_10_09_004841_create_users_table',0),(1177,'2017_10_09_004841_create_utilities_table',0),(1178,'2017_10_09_004841_create_voters_table',0),(1179,'2017_10_09_004849_add_foreign_keys_to_barangaycard_table',0),(1180,'2017_10_09_004849_add_foreign_keys_to_buildings_table',0),(1181,'2017_10_09_004849_add_foreign_keys_to_businesses_table',0),(1182,'2017_10_09_004849_add_foreign_keys_to_businessregistrations_table',0),(1183,'2017_10_09_004849_add_foreign_keys_to_collections_table',0),(1184,'2017_10_09_004849_add_foreign_keys_to_document_requirements_table',0),(1185,'2017_10_09_004849_add_foreign_keys_to_documentrequests_table',0),(1186,'2017_10_09_004849_add_foreign_keys_to_employeeposition_table',0),(1187,'2017_10_09_004849_add_foreign_keys_to_facilities_table',0),(1188,'2017_10_09_004849_add_foreign_keys_to_families_table',0),(1189,'2017_10_09_004849_add_foreign_keys_to_familymembers_table',0),(1190,'2017_10_09_004849_add_foreign_keys_to_logs_table',0),(1191,'2017_10_09_004849_add_foreign_keys_to_lots_table',0),(1192,'2017_10_09_004849_add_foreign_keys_to_messages_table',0),(1193,'2017_10_09_004849_add_foreign_keys_to_participants_table',0),(1194,'2017_10_09_004849_add_foreign_keys_to_partrecipients_table',0),(1195,'2017_10_09_004849_add_foreign_keys_to_requestrequirements_table',0),(1196,'2017_10_09_004849_add_foreign_keys_to_reservations_table',0),(1197,'2017_10_09_004849_add_foreign_keys_to_residentaccountregistrations_table',0),(1198,'2017_10_09_004849_add_foreign_keys_to_residentaccounts_table',0),(1199,'2017_10_09_004849_add_foreign_keys_to_residentbackgrounds_table',0),(1200,'2017_10_09_004849_add_foreign_keys_to_residentregistrations_table',0),(1201,'2017_10_09_004849_add_foreign_keys_to_services_table',0),(1202,'2017_10_09_004849_add_foreign_keys_to_servicesponsorships_table',0),(1203,'2017_10_09_004849_add_foreign_keys_to_servicetransactions_table',0),(1204,'2017_10_09_004849_add_foreign_keys_to_units_table',0),(1205,'2017_10_09_004849_add_foreign_keys_to_voters_table',0),(1206,'2017_10_12_115350_create_barangaycard_table',0),(1207,'2017_10_12_115350_create_buildings_table',0),(1208,'2017_10_12_115350_create_buildingtypes_table',0),(1209,'2017_10_12_115350_create_businesscategories_table',0),(1210,'2017_10_12_115350_create_businesses_table',0),(1211,'2017_10_12_115350_create_businessregistrations_table',0),(1212,'2017_10_12_115350_create_collections_table',0),(1213,'2017_10_12_115350_create_document_requirements_table',0),(1214,'2017_10_12_115350_create_documentrequests_table',0),(1215,'2017_10_12_115350_create_documents_table',0),(1216,'2017_10_12_115350_create_employeeposition_table',0),(1217,'2017_10_12_115350_create_employees_table',0),(1218,'2017_10_12_115350_create_facilities_table',0),(1219,'2017_10_12_115350_create_facilitytypes_table',0),(1220,'2017_10_12_115350_create_families_table',0),(1221,'2017_10_12_115350_create_familymembers_table',0),(1222,'2017_10_12_115350_create_logs_table',0),(1223,'2017_10_12_115350_create_lots_table',0),(1224,'2017_10_12_115350_create_messages_table',0),(1225,'2017_10_12_115350_create_participants_table',0),(1226,'2017_10_12_115350_create_partrecipients_table',0),(1227,'2017_10_12_115350_create_people_table',0),(1228,'2017_10_12_115350_create_recipients_table',0),(1229,'2017_10_12_115350_create_requestrequirements_table',0),(1230,'2017_10_12_115350_create_requirements_table',0),(1231,'2017_10_12_115350_create_reservations_table',0),(1232,'2017_10_12_115350_create_residentaccountregistrations_table',0),(1233,'2017_10_12_115350_create_residentaccounts_table',0),(1234,'2017_10_12_115350_create_residentbackgrounds_table',0),(1235,'2017_10_12_115350_create_residentregistrations_table',0),(1236,'2017_10_12_115350_create_residents_table',0),(1237,'2017_10_12_115350_create_services_table',0),(1238,'2017_10_12_115350_create_servicesponsorships_table',0),(1239,'2017_10_12_115350_create_servicetransactions_table',0),(1240,'2017_10_12_115350_create_servicetypes_table',0),(1241,'2017_10_12_115350_create_sponsoritems_table',0),(1242,'2017_10_12_115350_create_sponsors_table',0),(1243,'2017_10_12_115350_create_streets_table',0),(1244,'2017_10_12_115350_create_sysutil_table',0),(1245,'2017_10_12_115350_create_units_table',0),(1246,'2017_10_12_115350_create_users_table',0),(1247,'2017_10_12_115350_create_utilities_table',0),(1248,'2017_10_12_115350_create_voters_table',0),(1249,'2017_10_12_115357_add_foreign_keys_to_barangaycard_table',0),(1250,'2017_10_12_115357_add_foreign_keys_to_buildings_table',0),(1251,'2017_10_12_115357_add_foreign_keys_to_businesses_table',0),(1252,'2017_10_12_115357_add_foreign_keys_to_businessregistrations_table',0),(1253,'2017_10_12_115357_add_foreign_keys_to_collections_table',0),(1254,'2017_10_12_115357_add_foreign_keys_to_document_requirements_table',0),(1255,'2017_10_12_115357_add_foreign_keys_to_documentrequests_table',0),(1256,'2017_10_12_115357_add_foreign_keys_to_employeeposition_table',0),(1257,'2017_10_12_115357_add_foreign_keys_to_facilities_table',0),(1258,'2017_10_12_115357_add_foreign_keys_to_families_table',0),(1259,'2017_10_12_115357_add_foreign_keys_to_familymembers_table',0),(1260,'2017_10_12_115357_add_foreign_keys_to_logs_table',0),(1261,'2017_10_12_115357_add_foreign_keys_to_lots_table',0),(1262,'2017_10_12_115357_add_foreign_keys_to_messages_table',0),(1263,'2017_10_12_115357_add_foreign_keys_to_participants_table',0),(1264,'2017_10_12_115357_add_foreign_keys_to_partrecipients_table',0),(1265,'2017_10_12_115357_add_foreign_keys_to_requestrequirements_table',0),(1266,'2017_10_12_115357_add_foreign_keys_to_reservations_table',0),(1267,'2017_10_12_115357_add_foreign_keys_to_residentaccountregistrations_table',0),(1268,'2017_10_12_115357_add_foreign_keys_to_residentaccounts_table',0),(1269,'2017_10_12_115357_add_foreign_keys_to_residentbackgrounds_table',0),(1270,'2017_10_12_115357_add_foreign_keys_to_residentregistrations_table',0),(1271,'2017_10_12_115357_add_foreign_keys_to_services_table',0),(1272,'2017_10_12_115357_add_foreign_keys_to_servicesponsorships_table',0),(1273,'2017_10_12_115357_add_foreign_keys_to_servicetransactions_table',0),(1274,'2017_10_12_115357_add_foreign_keys_to_sponsoritems_table',0),(1275,'2017_10_12_115357_add_foreign_keys_to_sponsors_table',0),(1276,'2017_10_12_115357_add_foreign_keys_to_units_table',0),(1277,'2017_10_12_115357_add_foreign_keys_to_voters_table',0),(1278,'2017_10_12_180001_create_barangaycard_table',0),(1279,'2017_10_12_180001_create_buildings_table',0),(1280,'2017_10_12_180001_create_buildingtypes_table',0),(1281,'2017_10_12_180001_create_businesscategories_table',0),(1282,'2017_10_12_180001_create_businesses_table',0),(1283,'2017_10_12_180001_create_businessregistrations_table',0),(1284,'2017_10_12_180001_create_collections_table',0),(1285,'2017_10_12_180001_create_document_requirements_table',0),(1286,'2017_10_12_180001_create_documentrequests_table',0),(1287,'2017_10_12_180001_create_documents_table',0),(1288,'2017_10_12_180001_create_employeeposition_table',0),(1289,'2017_10_12_180001_create_employees_table',0),(1290,'2017_10_12_180001_create_facilities_table',0),(1291,'2017_10_12_180001_create_facilitytypes_table',0),(1292,'2017_10_12_180001_create_families_table',0),(1293,'2017_10_12_180001_create_familymembers_table',0),(1294,'2017_10_12_180001_create_generaladdresses_table',0),(1295,'2017_10_12_180001_create_items_table',0),(1296,'2017_10_12_180001_create_logs_table',0),(1297,'2017_10_12_180001_create_lots_table',0),(1298,'2017_10_12_180001_create_messages_table',0),(1299,'2017_10_12_180001_create_participants_table',0),(1300,'2017_10_12_180001_create_partrecipients_table',0),(1301,'2017_10_12_180001_create_people_table',0),(1302,'2017_10_12_180001_create_recipients_table',0),(1303,'2017_10_12_180001_create_requestrequirements_table',0),(1304,'2017_10_12_180001_create_requirements_table',0),(1305,'2017_10_12_180001_create_reservations_table',0),(1306,'2017_10_12_180001_create_residentaccountregistrations_table',0),(1307,'2017_10_12_180001_create_residentaccounts_table',0),(1308,'2017_10_12_180001_create_residentbackgrounds_table',0),(1309,'2017_10_12_180001_create_residentregistrations_table',0),(1310,'2017_10_12_180001_create_residents_table',0),(1311,'2017_10_12_180001_create_services_table',0),(1312,'2017_10_12_180001_create_servicesponsorships_table',0),(1313,'2017_10_12_180001_create_servicetransactions_table',0),(1314,'2017_10_12_180001_create_servicetypes_table',0),(1315,'2017_10_12_180001_create_sponsoritems_table',0),(1316,'2017_10_12_180001_create_sponsors_table',0),(1317,'2017_10_12_180001_create_streets_table',0),(1318,'2017_10_12_180001_create_sysutil_table',0),(1319,'2017_10_12_180001_create_units_table',0),(1320,'2017_10_12_180001_create_users_table',0),(1321,'2017_10_12_180001_create_utilities_table',0),(1322,'2017_10_12_180001_create_voters_table',0),(1323,'2017_10_12_180006_add_foreign_keys_to_barangaycard_table',0),(1324,'2017_10_12_180006_add_foreign_keys_to_buildings_table',0),(1325,'2017_10_12_180006_add_foreign_keys_to_businesses_table',0),(1326,'2017_10_12_180006_add_foreign_keys_to_businessregistrations_table',0),(1327,'2017_10_12_180006_add_foreign_keys_to_collections_table',0),(1328,'2017_10_12_180006_add_foreign_keys_to_document_requirements_table',0),(1329,'2017_10_12_180006_add_foreign_keys_to_documentrequests_table',0),(1330,'2017_10_12_180006_add_foreign_keys_to_employeeposition_table',0),(1331,'2017_10_12_180006_add_foreign_keys_to_facilities_table',0),(1332,'2017_10_12_180006_add_foreign_keys_to_families_table',0),(1333,'2017_10_12_180006_add_foreign_keys_to_familymembers_table',0),(1334,'2017_10_12_180006_add_foreign_keys_to_generaladdresses_table',0),(1335,'2017_10_12_180006_add_foreign_keys_to_logs_table',0),(1336,'2017_10_12_180006_add_foreign_keys_to_lots_table',0),(1337,'2017_10_12_180006_add_foreign_keys_to_messages_table',0),(1338,'2017_10_12_180006_add_foreign_keys_to_participants_table',0),(1339,'2017_10_12_180006_add_foreign_keys_to_partrecipients_table',0),(1340,'2017_10_12_180006_add_foreign_keys_to_requestrequirements_table',0),(1341,'2017_10_12_180006_add_foreign_keys_to_reservations_table',0),(1342,'2017_10_12_180006_add_foreign_keys_to_residentaccountregistrations_table',0),(1343,'2017_10_12_180006_add_foreign_keys_to_residentaccounts_table',0),(1344,'2017_10_12_180006_add_foreign_keys_to_residentbackgrounds_table',0),(1345,'2017_10_12_180006_add_foreign_keys_to_residentregistrations_table',0),(1346,'2017_10_12_180006_add_foreign_keys_to_services_table',0),(1347,'2017_10_12_180006_add_foreign_keys_to_servicesponsorships_table',0),(1348,'2017_10_12_180006_add_foreign_keys_to_servicetransactions_table',0),(1349,'2017_10_12_180006_add_foreign_keys_to_sponsoritems_table',0),(1350,'2017_10_12_180006_add_foreign_keys_to_sponsors_table',0),(1351,'2017_10_12_180006_add_foreign_keys_to_units_table',0),(1352,'2017_10_12_180006_add_foreign_keys_to_voters_table',0),(1353,'2017_10_12_233556_create_barangaycard_table',0),(1354,'2017_10_12_233556_create_buildings_table',0),(1355,'2017_10_12_233556_create_buildingtypes_table',0),(1356,'2017_10_12_233556_create_businesscategories_table',0),(1357,'2017_10_12_233556_create_businesses_table',0),(1358,'2017_10_12_233556_create_businessregistrations_table',0),(1359,'2017_10_12_233556_create_collections_table',0),(1360,'2017_10_12_233556_create_document_requirements_table',0),(1361,'2017_10_12_233556_create_documentrequests_table',0),(1362,'2017_10_12_233556_create_documents_table',0),(1363,'2017_10_12_233556_create_employeeposition_table',0),(1364,'2017_10_12_233556_create_employees_table',0),(1365,'2017_10_12_233556_create_facilities_table',0),(1366,'2017_10_12_233556_create_facilitytypes_table',0),(1367,'2017_10_12_233556_create_families_table',0),(1368,'2017_10_12_233556_create_familymembers_table',0),(1369,'2017_10_12_233556_create_generaladdresses_table',0),(1370,'2017_10_12_233556_create_items_table',0),(1371,'2017_10_12_233556_create_logs_table',0),(1372,'2017_10_12_233556_create_lots_table',0),(1373,'2017_10_12_233556_create_messages_table',0),(1374,'2017_10_12_233556_create_participants_table',0),(1375,'2017_10_12_233556_create_partrecipients_table',0),(1376,'2017_10_12_233556_create_people_table',0),(1377,'2017_10_12_233556_create_recipients_table',0),(1378,'2017_10_12_233556_create_requestrequirements_table',0),(1379,'2017_10_12_233556_create_requirements_table',0),(1380,'2017_10_12_233556_create_reservations_table',0),(1381,'2017_10_12_233556_create_residentaccountregistrations_table',0),(1382,'2017_10_12_233556_create_residentaccounts_table',0),(1383,'2017_10_12_233556_create_residentbackgrounds_table',0),(1384,'2017_10_12_233556_create_residentregistrations_table',0),(1385,'2017_10_12_233556_create_residents_table',0),(1386,'2017_10_12_233556_create_services_table',0),(1387,'2017_10_12_233556_create_servicesponsorships_table',0),(1388,'2017_10_12_233556_create_servicetransactions_table',0),(1389,'2017_10_12_233556_create_servicetypes_table',0),(1390,'2017_10_12_233556_create_sponsoritems_table',0),(1391,'2017_10_12_233556_create_sponsors_table',0),(1392,'2017_10_12_233556_create_streets_table',0),(1393,'2017_10_12_233556_create_sysutil_table',0),(1394,'2017_10_12_233556_create_units_table',0),(1395,'2017_10_12_233556_create_users_table',0),(1396,'2017_10_12_233556_create_utilities_table',0),(1397,'2017_10_12_233556_create_voters_table',0),(1398,'2017_10_12_233604_add_foreign_keys_to_barangaycard_table',0),(1399,'2017_10_12_233604_add_foreign_keys_to_buildings_table',0),(1400,'2017_10_12_233604_add_foreign_keys_to_businesses_table',0),(1401,'2017_10_12_233604_add_foreign_keys_to_businessregistrations_table',0),(1402,'2017_10_12_233604_add_foreign_keys_to_collections_table',0),(1403,'2017_10_12_233604_add_foreign_keys_to_document_requirements_table',0),(1404,'2017_10_12_233604_add_foreign_keys_to_documentrequests_table',0),(1405,'2017_10_12_233604_add_foreign_keys_to_employeeposition_table',0),(1406,'2017_10_12_233604_add_foreign_keys_to_facilities_table',0),(1407,'2017_10_12_233604_add_foreign_keys_to_families_table',0),(1408,'2017_10_12_233604_add_foreign_keys_to_familymembers_table',0),(1409,'2017_10_12_233604_add_foreign_keys_to_generaladdresses_table',0),(1410,'2017_10_12_233604_add_foreign_keys_to_logs_table',0),(1411,'2017_10_12_233604_add_foreign_keys_to_lots_table',0),(1412,'2017_10_12_233604_add_foreign_keys_to_messages_table',0),(1413,'2017_10_12_233604_add_foreign_keys_to_participants_table',0),(1414,'2017_10_12_233604_add_foreign_keys_to_partrecipients_table',0),(1415,'2017_10_12_233604_add_foreign_keys_to_requestrequirements_table',0),(1416,'2017_10_12_233604_add_foreign_keys_to_reservations_table',0),(1417,'2017_10_12_233604_add_foreign_keys_to_residentaccountregistrations_table',0),(1418,'2017_10_12_233604_add_foreign_keys_to_residentaccounts_table',0),(1419,'2017_10_12_233604_add_foreign_keys_to_residentbackgrounds_table',0),(1420,'2017_10_12_233604_add_foreign_keys_to_residentregistrations_table',0),(1421,'2017_10_12_233604_add_foreign_keys_to_services_table',0),(1422,'2017_10_12_233604_add_foreign_keys_to_servicesponsorships_table',0),(1423,'2017_10_12_233604_add_foreign_keys_to_servicetransactions_table',0),(1424,'2017_10_12_233604_add_foreign_keys_to_sponsoritems_table',0),(1425,'2017_10_12_233604_add_foreign_keys_to_sponsors_table',0),(1426,'2017_10_12_233604_add_foreign_keys_to_units_table',0),(1427,'2017_10_12_233604_add_foreign_keys_to_voters_table',0),(1428,'2017_10_14_141622_create_barangaycard_table',0),(1429,'2017_10_14_141622_create_buildings_table',0),(1430,'2017_10_14_141622_create_buildingtypes_table',0),(1431,'2017_10_14_141622_create_businesscategories_table',0),(1432,'2017_10_14_141622_create_businesses_table',0),(1433,'2017_10_14_141622_create_businessregistrations_table',0),(1434,'2017_10_14_141622_create_collections_table',0),(1435,'2017_10_14_141622_create_document_requirements_table',0),(1436,'2017_10_14_141622_create_documentrequests_table',0),(1437,'2017_10_14_141622_create_documents_table',0),(1438,'2017_10_14_141622_create_employeeposition_table',0),(1439,'2017_10_14_141622_create_employees_table',0),(1440,'2017_10_14_141622_create_facilities_table',0),(1441,'2017_10_14_141622_create_facilitytypes_table',0),(1442,'2017_10_14_141622_create_families_table',0),(1443,'2017_10_14_141622_create_familymembers_table',0),(1444,'2017_10_14_141622_create_generaladdresses_table',0),(1445,'2017_10_14_141622_create_itemreservations_table',0),(1446,'2017_10_14_141622_create_items_table',0),(1447,'2017_10_14_141622_create_logs_table',0),(1448,'2017_10_14_141622_create_lots_table',0),(1449,'2017_10_14_141622_create_messages_table',0),(1450,'2017_10_14_141622_create_participants_table',0),(1451,'2017_10_14_141622_create_partrecipients_table',0),(1452,'2017_10_14_141622_create_people_table',0),(1453,'2017_10_14_141622_create_recipients_table',0),(1454,'2017_10_14_141622_create_requestrequirements_table',0),(1455,'2017_10_14_141622_create_requirements_table',0),(1456,'2017_10_14_141622_create_reservations_table',0),(1457,'2017_10_14_141622_create_residentaccountregistrations_table',0),(1458,'2017_10_14_141622_create_residentaccounts_table',0),(1459,'2017_10_14_141622_create_residentbackgrounds_table',0),(1460,'2017_10_14_141622_create_residentregistrations_table',0),(1461,'2017_10_14_141622_create_residents_table',0),(1462,'2017_10_14_141622_create_services_table',0),(1463,'2017_10_14_141622_create_servicesponsorships_table',0),(1464,'2017_10_14_141622_create_servicetransactions_table',0),(1465,'2017_10_14_141622_create_servicetypes_table',0),(1466,'2017_10_14_141622_create_sponsoritems_table',0),(1467,'2017_10_14_141622_create_sponsors_table',0),(1468,'2017_10_14_141622_create_streets_table',0),(1469,'2017_10_14_141622_create_sysutil_table',0),(1470,'2017_10_14_141622_create_units_table',0),(1471,'2017_10_14_141622_create_users_table',0),(1472,'2017_10_14_141622_create_utilities_table',0),(1473,'2017_10_14_141622_create_voters_table',0),(1474,'2017_10_14_141628_add_foreign_keys_to_barangaycard_table',0),(1475,'2017_10_14_141628_add_foreign_keys_to_buildings_table',0),(1476,'2017_10_14_141628_add_foreign_keys_to_businesses_table',0),(1477,'2017_10_14_141628_add_foreign_keys_to_businessregistrations_table',0),(1478,'2017_10_14_141628_add_foreign_keys_to_collections_table',0),(1479,'2017_10_14_141628_add_foreign_keys_to_document_requirements_table',0),(1480,'2017_10_14_141628_add_foreign_keys_to_documentrequests_table',0),(1481,'2017_10_14_141628_add_foreign_keys_to_employeeposition_table',0),(1482,'2017_10_14_141628_add_foreign_keys_to_facilities_table',0),(1483,'2017_10_14_141628_add_foreign_keys_to_families_table',0),(1484,'2017_10_14_141628_add_foreign_keys_to_familymembers_table',0),(1485,'2017_10_14_141628_add_foreign_keys_to_generaladdresses_table',0),(1486,'2017_10_14_141628_add_foreign_keys_to_logs_table',0),(1487,'2017_10_14_141628_add_foreign_keys_to_lots_table',0),(1488,'2017_10_14_141628_add_foreign_keys_to_messages_table',0),(1489,'2017_10_14_141628_add_foreign_keys_to_participants_table',0),(1490,'2017_10_14_141628_add_foreign_keys_to_partrecipients_table',0),(1491,'2017_10_14_141628_add_foreign_keys_to_requestrequirements_table',0),(1492,'2017_10_14_141628_add_foreign_keys_to_reservations_table',0),(1493,'2017_10_14_141628_add_foreign_keys_to_residentaccountregistrations_table',0),(1494,'2017_10_14_141628_add_foreign_keys_to_residentaccounts_table',0),(1495,'2017_10_14_141628_add_foreign_keys_to_residentbackgrounds_table',0),(1496,'2017_10_14_141628_add_foreign_keys_to_residentregistrations_table',0),(1497,'2017_10_14_141628_add_foreign_keys_to_services_table',0),(1498,'2017_10_14_141628_add_foreign_keys_to_servicesponsorships_table',0),(1499,'2017_10_14_141628_add_foreign_keys_to_servicetransactions_table',0),(1500,'2017_10_14_141628_add_foreign_keys_to_sponsoritems_table',0),(1501,'2017_10_14_141628_add_foreign_keys_to_sponsors_table',0),(1502,'2017_10_14_141628_add_foreign_keys_to_units_table',0),(1503,'2017_10_14_141628_add_foreign_keys_to_voters_table',0),(1504,'2017_10_16_100557_create_barangaycard_table',0),(1505,'2017_10_16_100557_create_buildings_table',0),(1506,'2017_10_16_100557_create_buildingtypes_table',0),(1507,'2017_10_16_100557_create_businesscategories_table',0),(1508,'2017_10_16_100557_create_businesses_table',0),(1509,'2017_10_16_100557_create_businessregistrations_table',0),(1510,'2017_10_16_100557_create_collections_table',0),(1511,'2017_10_16_100557_create_document_requirements_table',0),(1512,'2017_10_16_100557_create_documentrequests_table',0),(1513,'2017_10_16_100557_create_documents_table',0),(1514,'2017_10_16_100557_create_employeeposition_table',0),(1515,'2017_10_16_100557_create_employees_table',0),(1516,'2017_10_16_100557_create_facilities_table',0),(1517,'2017_10_16_100557_create_facilitytypes_table',0),(1518,'2017_10_16_100557_create_families_table',0),(1519,'2017_10_16_100557_create_familymembers_table',0),(1520,'2017_10_16_100557_create_generaladdresses_table',0),(1521,'2017_10_16_100557_create_itemreservations_table',0),(1522,'2017_10_16_100557_create_items_table',0),(1523,'2017_10_16_100557_create_logs_table',0),(1524,'2017_10_16_100557_create_lots_table',0),(1525,'2017_10_16_100557_create_messages_table',0),(1526,'2017_10_16_100557_create_participants_table',0),(1527,'2017_10_16_100557_create_partrecipients_table',0),(1528,'2017_10_16_100557_create_people_table',0),(1529,'2017_10_16_100557_create_recipients_table',0),(1530,'2017_10_16_100557_create_requestrequirements_table',0),(1531,'2017_10_16_100557_create_requirements_table',0),(1532,'2017_10_16_100557_create_reservations_table',0),(1533,'2017_10_16_100557_create_residentaccountregistrations_table',0),(1534,'2017_10_16_100557_create_residentaccounts_table',0),(1535,'2017_10_16_100557_create_residentbackgrounds_table',0),(1536,'2017_10_16_100557_create_residentregistrations_table',0),(1537,'2017_10_16_100557_create_residents_table',0),(1538,'2017_10_16_100557_create_services_table',0),(1539,'2017_10_16_100557_create_servicesponsorships_table',0),(1540,'2017_10_16_100557_create_servicetransactions_table',0),(1541,'2017_10_16_100557_create_servicetypes_table',0),(1542,'2017_10_16_100557_create_sponsoritems_table',0),(1543,'2017_10_16_100557_create_sponsors_table',0),(1544,'2017_10_16_100557_create_streets_table',0),(1545,'2017_10_16_100557_create_sysutil_table',0),(1546,'2017_10_16_100557_create_units_table',0),(1547,'2017_10_16_100557_create_users_table',0),(1548,'2017_10_16_100557_create_utilities_table',0),(1549,'2017_10_16_100557_create_voters_table',0),(1550,'2017_10_16_100613_add_foreign_keys_to_barangaycard_table',0),(1551,'2017_10_16_100613_add_foreign_keys_to_buildings_table',0),(1552,'2017_10_16_100613_add_foreign_keys_to_businesses_table',0),(1553,'2017_10_16_100613_add_foreign_keys_to_businessregistrations_table',0),(1554,'2017_10_16_100613_add_foreign_keys_to_collections_table',0),(1555,'2017_10_16_100613_add_foreign_keys_to_document_requirements_table',0),(1556,'2017_10_16_100613_add_foreign_keys_to_documentrequests_table',0),(1557,'2017_10_16_100613_add_foreign_keys_to_employeeposition_table',0),(1558,'2017_10_16_100613_add_foreign_keys_to_facilities_table',0),(1559,'2017_10_16_100613_add_foreign_keys_to_families_table',0),(1560,'2017_10_16_100613_add_foreign_keys_to_familymembers_table',0),(1561,'2017_10_16_100613_add_foreign_keys_to_generaladdresses_table',0),(1562,'2017_10_16_100613_add_foreign_keys_to_logs_table',0),(1563,'2017_10_16_100613_add_foreign_keys_to_lots_table',0),(1564,'2017_10_16_100613_add_foreign_keys_to_messages_table',0),(1565,'2017_10_16_100613_add_foreign_keys_to_participants_table',0),(1566,'2017_10_16_100613_add_foreign_keys_to_partrecipients_table',0),(1567,'2017_10_16_100613_add_foreign_keys_to_requestrequirements_table',0),(1568,'2017_10_16_100613_add_foreign_keys_to_reservations_table',0),(1569,'2017_10_16_100613_add_foreign_keys_to_residentaccountregistrations_table',0),(1570,'2017_10_16_100613_add_foreign_keys_to_residentaccounts_table',0),(1571,'2017_10_16_100613_add_foreign_keys_to_residentbackgrounds_table',0),(1572,'2017_10_16_100613_add_foreign_keys_to_residentregistrations_table',0),(1573,'2017_10_16_100613_add_foreign_keys_to_services_table',0),(1574,'2017_10_16_100613_add_foreign_keys_to_servicesponsorships_table',0),(1575,'2017_10_16_100613_add_foreign_keys_to_servicetransactions_table',0),(1576,'2017_10_16_100613_add_foreign_keys_to_sponsoritems_table',0),(1577,'2017_10_16_100613_add_foreign_keys_to_sponsors_table',0),(1578,'2017_10_16_100613_add_foreign_keys_to_units_table',0),(1579,'2017_10_16_100613_add_foreign_keys_to_voters_table',0),(1580,'2017_10_15_181436_create_barangaycard_table',0),(1581,'2017_10_15_181436_create_buildings_table',0),(1582,'2017_10_15_181436_create_buildingtypes_table',0),(1583,'2017_10_15_181436_create_businesscategories_table',0),(1584,'2017_10_15_181436_create_businesses_table',0),(1585,'2017_10_15_181436_create_businessregistrations_table',0),(1586,'2017_10_15_181436_create_collections_table',0),(1587,'2017_10_15_181436_create_document_requirements_table',0),(1588,'2017_10_15_181436_create_documentrequests_table',0),(1589,'2017_10_15_181436_create_documents_table',0),(1590,'2017_10_15_181436_create_employeeposition_table',0),(1591,'2017_10_15_181436_create_employees_table',0),(1592,'2017_10_15_181436_create_facilities_table',0),(1593,'2017_10_15_181436_create_facilitytypes_table',0),(1594,'2017_10_15_181436_create_families_table',0),(1595,'2017_10_15_181436_create_familymembers_table',0),(1596,'2017_10_15_181436_create_generaladdresses_table',0),(1597,'2017_10_15_181436_create_itemreservations_table',0),(1598,'2017_10_15_181436_create_items_table',0),(1599,'2017_10_15_181436_create_logs_table',0),(1600,'2017_10_15_181436_create_lots_table',0),(1601,'2017_10_15_181436_create_messages_table',0),(1602,'2017_10_15_181436_create_participants_table',0),(1603,'2017_10_15_181436_create_partrecipients_table',0),(1604,'2017_10_15_181436_create_people_table',0),(1605,'2017_10_15_181436_create_recipients_table',0),(1606,'2017_10_15_181436_create_requestrequirements_table',0),(1607,'2017_10_15_181436_create_requirements_table',0),(1608,'2017_10_15_181436_create_reservations_table',0),(1609,'2017_10_15_181436_create_residentaccountregistrations_table',0),(1610,'2017_10_15_181436_create_residentaccounts_table',0),(1611,'2017_10_15_181436_create_residentbackgrounds_table',0),(1612,'2017_10_15_181436_create_residentregistrations_table',0),(1613,'2017_10_15_181436_create_residents_table',0),(1614,'2017_10_15_181436_create_services_table',0),(1615,'2017_10_15_181436_create_servicesponsorships_table',0),(1616,'2017_10_15_181436_create_servicetransactions_table',0),(1617,'2017_10_15_181436_create_servicetypes_table',0),(1618,'2017_10_15_181436_create_sponsoritems_table',0),(1619,'2017_10_15_181436_create_sponsors_table',0),(1620,'2017_10_15_181436_create_streets_table',0),(1621,'2017_10_15_181436_create_sysutil_table',0),(1622,'2017_10_15_181436_create_units_table',0),(1623,'2017_10_15_181436_create_users_table',0),(1624,'2017_10_15_181436_create_utilities_table',0),(1625,'2017_10_15_181436_create_voters_table',0),(1626,'2017_10_15_181443_add_foreign_keys_to_barangaycard_table',0),(1627,'2017_10_15_181443_add_foreign_keys_to_buildings_table',0),(1628,'2017_10_15_181443_add_foreign_keys_to_businesses_table',0),(1629,'2017_10_15_181443_add_foreign_keys_to_businessregistrations_table',0),(1630,'2017_10_15_181443_add_foreign_keys_to_collections_table',0),(1631,'2017_10_15_181443_add_foreign_keys_to_document_requirements_table',0),(1632,'2017_10_15_181443_add_foreign_keys_to_documentrequests_table',0),(1633,'2017_10_15_181443_add_foreign_keys_to_employeeposition_table',0),(1634,'2017_10_15_181443_add_foreign_keys_to_facilities_table',0),(1635,'2017_10_15_181443_add_foreign_keys_to_families_table',0),(1636,'2017_10_15_181443_add_foreign_keys_to_familymembers_table',0),(1637,'2017_10_15_181443_add_foreign_keys_to_generaladdresses_table',0),(1638,'2017_10_15_181443_add_foreign_keys_to_logs_table',0),(1639,'2017_10_15_181443_add_foreign_keys_to_lots_table',0),(1640,'2017_10_15_181443_add_foreign_keys_to_messages_table',0),(1641,'2017_10_15_181443_add_foreign_keys_to_participants_table',0),(1642,'2017_10_15_181443_add_foreign_keys_to_partrecipients_table',0),(1643,'2017_10_15_181443_add_foreign_keys_to_requestrequirements_table',0),(1644,'2017_10_15_181443_add_foreign_keys_to_reservations_table',0),(1645,'2017_10_15_181443_add_foreign_keys_to_residentaccountregistrations_table',0),(1646,'2017_10_15_181443_add_foreign_keys_to_residentaccounts_table',0),(1647,'2017_10_15_181443_add_foreign_keys_to_residentbackgrounds_table',0),(1648,'2017_10_15_181443_add_foreign_keys_to_residentregistrations_table',0),(1649,'2017_10_15_181443_add_foreign_keys_to_services_table',0),(1650,'2017_10_15_181443_add_foreign_keys_to_servicesponsorships_table',0),(1651,'2017_10_15_181443_add_foreign_keys_to_servicetransactions_table',0),(1652,'2017_10_15_181443_add_foreign_keys_to_sponsoritems_table',0),(1653,'2017_10_15_181443_add_foreign_keys_to_sponsors_table',0),(1654,'2017_10_15_181443_add_foreign_keys_to_units_table',0),(1655,'2017_10_15_181443_add_foreign_keys_to_voters_table',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (6,1,2,'2017-08-26 06:55:51'),(11,8,8,'2017-08-30 03:56:48'),(12,9,2,'2017-09-09 04:44:37'),(13,9,6,'2017-09-09 04:44:42'),(14,8,6,'2017-09-16 03:35:32'),(15,8,3,'2017-09-16 03:35:48'),(16,10,7,'2017-10-16 16:09:04'),(17,10,9,'2017-10-16 16:09:08'),(18,10,3,'2017-10-16 16:09:11'),(19,10,6,'2017-10-16 16:48:26'),(20,10,2,'2017-10-16 16:48:30'),(21,10,4,'2017-10-16 16:48:33'),(22,10,5,'2017-10-16 16:48:36'),(23,10,8,'2017-10-16 16:48:41'),(24,6,6,'2017-10-16 16:52:43'),(25,6,7,'2017-10-16 16:52:47'),(26,6,9,'2017-10-16 16:52:50'),(27,6,3,'2017-10-16 16:52:54'),(28,9,7,'2017-10-16 16:57:33'),(29,9,5,'2017-10-16 16:57:36');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partrecipients`
--

LOCK TABLES `partrecipients` WRITE;
/*!40000 ALTER TABLE `partrecipients` DISABLE KEYS */;
INSERT INTO `partrecipients` VALUES (1,16,2,1,0),(2,17,2,2,0),(3,18,2,1,0),(4,24,2,1,0),(5,12,2,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requestrequirements`
--

LOCK TABLES `requestrequirements` WRITE;
/*!40000 ALTER TABLE `requestrequirements` DISABLE KEYS */;
INSERT INTO `requestrequirements` VALUES (24,5,0,1),(25,5,0,3),(26,7,0,1),(27,7,0,2),(32,8,0,1),(33,8,0,3),(35,9,0,1),(36,9,0,2),(37,10,0,1),(38,11,0,1),(41,12,0,1),(42,12,0,2),(43,12,0,4),(45,14,0,1),(46,14,0,2),(47,15,0,1),(48,15,0,2),(49,15,0,4),(55,13,0,1),(56,13,0,4),(57,16,0,1),(58,16,0,2),(59,16,0,4),(60,20,0,1),(61,17,0,1),(62,17,0,2),(63,17,0,4),(64,21,0,1),(65,21,0,2),(66,21,0,4),(69,22,0,1),(70,22,0,2),(71,22,0,4),(74,23,0,1),(75,23,0,2),(76,23,0,4),(77,24,0,1),(78,24,0,2),(79,24,0,4);
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
  `reservationStart` datetime NOT NULL,
  `reservationEnd` datetime NOT NULL,
  `dateReserved` date NOT NULL,
  `eventStatus` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (20,'Debut','','2017-10-18 14:00:00','2017-10-18 18:00:00','2017-08-31','Done',2,1,'Paid',NULL,NULL,NULL,NULL),(21,'League','','2017-10-18 12:00:00','2017-10-18 14:00:00','2017-09-01','Done',5,1,'Paid',NULL,NULL,NULL,NULL),(22,'Birthday Party','','2017-10-18 20:00:00','2017-10-18 23:00:00','2017-09-06','Done',6,1,'Paid',NULL,NULL,NULL,NULL),(23,'Basket ball league','','2017-10-18 10:00:00','2017-10-18 12:00:00','2017-10-31','NYD',8,1,'Paid',NULL,NULL,NULL,NULL),(24,'Meeting','','2017-10-18 20:00:00','2017-10-18 09:00:00','2017-09-16','Done',2,1,'Paid',NULL,NULL,NULL,NULL),(25,'Dance Competition','','2017-10-18 10:00:00','2017-10-18 11:00:00','2017-09-16','Done',2,1,'Paid',NULL,NULL,NULL,NULL),(26,'Birthday Party ni bry','debut','2017-10-18 10:00:00','2017-10-18 12:00:00','2017-09-17','Done',5,1,'Paid',NULL,NULL,NULL,NULL),(27,'Birthday Party','','2017-10-18 20:00:00','2017-10-18 12:00:00','2017-09-25','Done',6,1,'Cancelled','undefined',NULL,NULL,NULL),(28,'Talumpati','','2017-10-18 10:00:00','2017-10-18 17:00:00','2017-10-14','Done',2,1,'Paid',NULL,NULL,NULL,NULL),(29,'Zumbaaaa','','2017-10-18 10:05:00','2017-10-18 11:05:00','2018-10-16','NYD',NULL,1,'Pending','Mang Kepweng',19,'kepweng@yahoo.com','09123456789'),(30,'Partyyy','Tugs tugs','2017-10-18 10:10:00','2017-10-18 11:10:00','2017-10-16','NYD',5,1,'Pending',NULL,NULL,NULL,NULL),(31,'Presentation','','2017-10-18 10:17:00','2017-10-18 11:17:00','2017-10-16','NYD',4,1,'Pending',NULL,NULL,NULL,NULL),(32,'Magic Show','','2017-10-18 10:19:00','2017-10-18 11:18:00','2017-10-19','NYD',4,1,'Paid',NULL,NULL,NULL,NULL),(33,'Singing Contest','','2017-10-18 18:00:00','2017-10-18 20:00:00','2017-10-29','NYD',NULL,1,'Paid','Chris Paul',22,'cp3@yahoo.com','09123456789'),(34,'HELLOWORLD2','HELLOWORLD2','2017-10-18 10:00:00','2017-10-18 14:15:00','2017-10-18','Extended',9,1,'Pending',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
INSERT INTO `residentbackgrounds` VALUES (2,'Software Engineer','₱50,001-₱100,000','2017-08-22',3,1,0),(3,'CPA','₱50,001-₱100,000','2017-08-22',4,1,0),(4,'CEO','₱100,001 and above','2017-08-22',5,1,0),(5,'CEO','₱100,001 and above','2017-08-27',2,1,0),(9,'CEO','₱100,001 and above','2017-08-29',6,1,0),(10,'None','₱0-₱10,000','2017-08-29',7,1,0),(11,'CEO','₱100,001 and above','2017-08-30',8,1,0),(18,'None','₱0-₱10,000','2017-10-08',9,1,0),(21,'Senior Programmer','₱50,001-₱100,000','2017-10-09',2,1,0),(23,'None','₱0-₱10,000','2017-10-17',11,1,0),(24,'None','₱0-₱10,000','2017-10-17',11,1,0),(25,'None','₱100,001 and above','2017-10-17',8,1,0),(26,'None','₱0-₱10,000','2017-10-17',8,1,0),(27,'Construction Worker','₱0-₱10,000','2017-10-17',11,1,0);
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
  `address` varchar(250) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateReg` date NOT NULL,
  PRIMARY KEY (`residentPrimeID`),
  KEY `fk_Residents_People1_idx` (`residentPrimeID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (2,'RES_001','Marc Joseph','Mendoza','Fuellas',NULL,'09263526321','M','1998-06-18','Single',NULL,'Autism','Official',1,'4bf0c0b006fa76b0f5b783874deddb06.jpg','258-H Teresa St. Sta Mesa, Manila','f.marcjoseph@yahoo.com','2017-09-11'),(3,'RES_002','Gianne Mae','Mendoza','Fuellas',NULL,'09123456789','F','1997-04-26','Married',NULL,'Hearing Loss','Official',1,'7c15f23c241b8569a845fd3c99b95d98.jpg','258-H Teresa St. Sta Mesa, Manila','gianne@yahoo.com','2017-08-15'),(4,'RES_003','Raymond','Averilla','Fuellas',NULL,'09876543211','M','1996-08-07','Married',NULL,'Hypothalamia','Official',1,'10.jpg','258-H Teresa St. Sta Mesa, Manila','raymond@yahoo.com','2017-09-20'),(5,'RES_004','Bryan James','Reyes','Illaga',NULL,'09876543212','M','1999-12-01','Widowed',NULL,NULL,'Transient',1,'11enrique.jpg','123-ABC Maligaya St. Marandang Cainta, RIzal','bryan@yahoo.com','2017-10-10'),(6,'RES_005','Moira Kelly','Antonio','Del Mundo',NULL,'09123456789','F','1998-02-08','Single',NULL,NULL,'Official',1,'15873194_386425791708882_1865123785069904347_n.jpg','8C Mahiyain St. Quezon City','moira@yahoo.com','2017-09-27'),(7,'RES_006','Moiro','Antonio','Del Mundo',NULL,'09263526321','M','2003-05-01','Single',NULL,NULL,'Official',1,'2015-12-25 18.20.31.jpg','8C Mahiyain St. Quezon City','moiro@yahoo.com','2017-10-15'),(8,'RES_007','John','Cruz','Perez',NULL,'09234567891','M','1998-04-01','Married',NULL,NULL,'Transient',1,'7c15f23c241b8569a845fd3c99b95d98.jpg','74 Sta Catalina Village Marikina City','paul@yahoo.com','2017-10-11'),(9,'RES_008','Kevin','Lopez','Ferrer',NULL,'09123456789','M','1960-01-01','Married','123123432SC',NULL,'Official',1,NULL,'asdasdasdasda','skuba@yahoo.com','2017-10-09'),(11,'RES_009','James','Joseph','Harden',NULL,'09562345432','M','1984-01-29','Married',NULL,NULL,'Official',1,NULL,'242 Hipodromo St. Sta Mesa, Manila','jharden@yahoo.com','2017-10-17');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetransactions`
--

LOCK TABLES `servicetransactions` WRITE;
/*!40000 ALTER TABLE `servicetransactions` DISABLE KEYS */;
INSERT INTO `servicetransactions` VALUES (1,'SERV_REG_001','2017 Contis Vaccination',1,4,7,'2017-01-01','2017-01-01','On-going',1),(6,'SERV_REG_002','2017 Pablo Vaccinations',1,NULL,NULL,'2017-09-26','2017-09-27','Finished',0),(7,'SERV_REG_003','2017 Valdez Circumcision',2,NULL,NULL,'2017-08-30',NULL,'Pending',1),(8,'SERV_REG_004','2017 Del Mundo Vaccination',1,NULL,NULL,'2017-09-05',NULL,'Finished',0),(9,'SERV_REG_005','Dog vaccine',1,NULL,NULL,'2017-09-16',NULL,'Finished',0),(10,'SERV_REG_006','Ultimate Ninja Vaccination',1,NULL,NULL,'2017-10-25',NULL,'Finished',0);
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
-- Table structure for table `sponsoritems`
--

DROP TABLE IF EXISTS `sponsoritems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsoritems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsorID` int(11) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sponsorID_idx` (`sponsorID`),
  CONSTRAINT `sponsorID` FOREIGN KEY (`sponsorID`) REFERENCES `sponsors` (`sponsorID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsoritems`
--

LOCK TABLES `sponsoritems` WRITE;
/*!40000 ALTER TABLE `sponsoritems` DISABLE KEYS */;
/*!40000 ALTER TABLE `sponsoritems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors` (
  `sponsorID` int(11) NOT NULL AUTO_INCREMENT,
  `resiID` int(11) DEFAULT NULL,
  `sID` int(11) NOT NULL,
  `dateSponsored` datetime NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sponsorID`),
  KEY `residentID_idx` (`resiID`),
  KEY `rID_idx` (`resiID`),
  KEY `sID_idx` (`sID`),
  CONSTRAINT `resiID` FOREIGN KEY (`resiID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE,
  CONSTRAINT `sID` FOREIGN KEY (`sID`) REFERENCES `servicetransactions` (`serviceTransactionPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
INSERT INTO `sponsors` VALUES (1,4,10,'2017-10-12 11:56:56','','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
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
  `position` varchar(45) NOT NULL,
  `accept` tinyint(4) NOT NULL DEFAULT '0',
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  `approval` tinyint(4) NOT NULL DEFAULT '0',
  `resident` tinyint(4) NOT NULL DEFAULT '0',
  `request` tinyint(4) NOT NULL DEFAULT '0',
  `reservation` tinyint(4) NOT NULL DEFAULT '0',
  `service` tinyint(4) NOT NULL DEFAULT '0',
  `business` tinyint(4) NOT NULL DEFAULT '0',
  `collection` tinyint(4) NOT NULL DEFAULT '0',
  `sponsorship` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'skubariwa','skubariwa@gmail.com','$2y$10$vvKYTszmeQ/1iDvnm9tfKeglftn9YhWA/c42esjAvsuoleM57M43u','2017-08-28 05:23:53','2017-08-28 05:23:53','QuNJ61Tz7XFmyLEqFnQqNnjpU6X3FJTD7f3LHgSYM1ix5QgylZ72i5esi536','Marc Joseph','Mendoza','Fuellas','Jr.','4bf0c0b006fa76b0f5b783874deddb06.jpg','Chairman',1,0,1,1,1,1,1,1,1,1),(2,'popo','popo@yahoo.com','$2y$10$kZ9qe7GlW5V1LFAQwUUEx.zSZQDRyPQukxSTdNV/uRsTJTBV1G8/S','2017-09-25 03:06:18','2017-08-28 05:33:05','ctBmYNR78rQEO0phnGhSX4UcoiknYPgEBeKiBqMyHm82uHObEDEgAt5SNw0F','Jason','Santos','Pediz','popo','36058_154619721235420_678295_n.jpg','Kagawad',1,0,1,1,1,1,1,1,1,1),(3,'Bryan_James','bryan_james.ilaga_lds@yahoo.com','$2y$10$Mm00HQmJ/UGUEbn7EpKXbOU7vpfyz6sT5u5AmUDnJ04QFYDMSP/Wi','2017-09-21 04:19:08','2017-08-29 08:08:53','026ZIDEtOeLu7l2yElHPhoYESdVp12A362XngVMyIRy9CWxb4asfjWapEuxb','Bryan James','Torcelino','Ilaga',NULL,'2015-12-25 18.20.31.jpg','Secretary',1,0,1,1,1,1,1,1,1,1),(4,'alahoy','alahoy@yahoo.com','$2y$10$mHFPFwSWpPJ/Eo5zAPv6TuZANJfOI3T/v.I29Ki7VwXkCmTZ.uxQu','2017-09-25 03:06:08','2017-09-17 17:04:25','wXYABLVabfjo6BXGhjBCdhoS5d77x0BgchHrmAqENuD8b274p1LdyWhzwGm2','Samuel','De Anto','Surgao','kjhdkjasd','15873194_386425791708882_1865123785069904347_n.jpg','Vice Chairman',1,0,1,1,1,1,1,1,1,1),(5,'moira','moi@yahoo.com','$2y$10$N65yjZvxahSpH0xdhCi92OxiGbKO/moW/FIRunow.tipwfrkw8CO2','2017-09-30 12:41:54','2017-09-30 12:41:25','PkXkCuNUZUErf1NBHANXeQw1017FNU9MqluPcnyUe1JwMuA4WxmeSuVnRWh7','Moira','Antonio','Del Mundo',NULL,'2b8e86a6ee7be2ed00170821098cf6aa.jpg','Secretary',1,0,0,0,0,0,0,0,0,0),(6,'gabe','gabe@yahoo.com','$2y$10$1RZBEwhDLTtxhrL7ivBjbOL1/6V4i0SnQ.EcoEid0ExBQYWz091qO','2017-09-30 12:50:57','2017-09-30 12:50:11','s6AfES8gSPpfcJdC5npKyOKGYVzwptAGVJSrhKwuiPMrmc55lowmOUQxHdrl','Gabe','Calabia','Espino',NULL,'FB_IMG_1457260028392.jpg','Secretary',1,0,0,0,0,0,0,0,0,0);
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
  `barangayIDAmount` double NOT NULL,
  `expirationID` tinyint(4) NOT NULL DEFAULT '1',
  `yearsOfExpiration` int(11) DEFAULT '2',
  `signaturePath` varchar(250) NOT NULL,
  PRIMARY KEY (`utilityID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
INSERT INTO `utilities` VALUES (1,'Brgy 629','123 Hipodromo St. Sta Mesa Manilasss','brgy_logo.png','ManilaSeal.png','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','REQ_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000','COLLE_000',150,1,2,'marc.png');
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

--
-- Dumping events for database 'dbBarangay'
--

--
-- Dumping routines for database 'dbBarangay'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-18  1:33:47
