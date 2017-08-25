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
INSERT INTO `buildings` VALUES (1,1,'Maui Oasis',2,1,0),(2,3,'El Pueblo',2,1,0),(3,5,'444A-a',1,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesscategories`
--

LOCK TABLES `businesscategories` WRITE;
/*!40000 ALTER TABLE `businesscategories` DISABLE KEYS */;
INSERT INTO `businesscategories` VALUES (5,'Industrial','',1,0),(6,'kajshdakjsdh','',1,0);
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
  `peoplePrimeID` int(11) DEFAULT NULL,
  `residentPrimeID` int(11) DEFAULT NULL,
  `registrationDate` datetime NOT NULL,
  `removalDate` datetime DEFAULT NULL,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`registrationPrimeID`),
  KEY `fk_BusinessRegistrations_People1_idx` (`peoplePrimeID`),
  KEY `fk_businessregistrations_residents1_idx` (`residentPrimeID`),
  CONSTRAINT `fk_BusinessRegistrations_People1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_businessregistrations_residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businessregistrations`
--

LOCK TABLES `businessregistrations` WRITE;
/*!40000 ALTER TABLE `businessregistrations` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'COLLE_001','2017-08-24 12:25:59','2017-08-24 15:40:03',3,200,200,'Paid',5,NULL,2,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_requirements`
--

LOCK TABLES `document_requirements` WRITE;
/*!40000 ALTER TABLE `document_requirements` DISABLE KEYS */;
INSERT INTO `document_requirements` VALUES (1,1,1,2),(2,2,1,2),(3,2,2,1);
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
  PRIMARY KEY (`documentRequestPrimeID`),
  KEY `fk_DocumentHeaderRequests_Residents1_idx` (`residentPrimeID`),
  KEY `documentPrimeID_idx` (`documentsPrimeID`),
  CONSTRAINT `documentsPrimeID` FOREIGN KEY (`documentsPrimeID`) REFERENCES `documents` (`primeID`) ON UPDATE CASCADE,
  CONSTRAINT `residentPrimeID` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentrequests`
--

LOCK TABLES `documentrequests` WRITE;
/*!40000 ALTER TABLE `documentrequests` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {housenumber}|{buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Clearance',100,1,0),(2,'DOC_002','Certificate of Indigency','Indegency certification','This is to certify that..','Certification',100,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
INSERT INTO `facilitytypes` VALUES (2,'Covered Court',1,0),(3,'Parks',1,0),(4,'Chapel',1,0),(5,'Plaza',1,0),(6,'asdasd',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0),(3,'FAM_003',2,'asdas','2017-08-23',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (3,1,4,'Auntie',0),(4,2,5,'Self',0),(9,1,2,'Son',0),(17,3,3,'Wife',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
INSERT INTO `generaladdresses` VALUES (1,'Permanent Address',2,NULL,NULL,1,1,1,1),(2,'Permanent Address',3,NULL,NULL,3,2,3,2),(3,'Permanent Address',4,NULL,NULL,3,2,3,2),(4,'Permanent Address',5,NULL,NULL,5,3,5,3);
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
INSERT INTO `lots` VALUES (1,'1',1,1,0),(2,'2',1,1,0),(3,'1A',2,1,0),(4,'1B',2,1,0),(5,'30',3,1,0),(6,'31',3,1,0);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=412 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (229,'2017_08_20_131145_create_buildings_table',0),(230,'2017_08_20_131145_create_buildingtypes_table',0),(231,'2017_08_20_131145_create_businesscategories_table',0),(232,'2017_08_20_131145_create_businesses_table',0),(233,'2017_08_20_131145_create_businessregistrations_table',0),(234,'2017_08_20_131145_create_collections_table',0),(235,'2017_08_20_131145_create_document_requirements_table',0),(236,'2017_08_20_131145_create_documentdetailrequests_table',0),(237,'2017_08_20_131145_create_documentheaderrequests_table',0),(238,'2017_08_20_131145_create_documents_table',0),(239,'2017_08_20_131145_create_employeeposition_table',0),(240,'2017_08_20_131145_create_employees_table',0),(241,'2017_08_20_131145_create_facilities_table',0),(242,'2017_08_20_131145_create_facilitytypes_table',0),(243,'2017_08_20_131145_create_families_table',0),(244,'2017_08_20_131145_create_familymembers_table',0),(245,'2017_08_20_131145_create_generaladdresses_table',0),(246,'2017_08_20_131145_create_lots_table',0),(247,'2017_08_20_131145_create_participants_table',0),(248,'2017_08_20_131145_create_people_table',0),(249,'2017_08_20_131145_create_requirements_table',0),(250,'2017_08_20_131145_create_reservations_table',0),(251,'2017_08_20_131145_create_residentaccountregistrations_table',0),(252,'2017_08_20_131145_create_residentaccounts_table',0),(253,'2017_08_20_131145_create_residentbackgrounds_table',0),(254,'2017_08_20_131145_create_residentregistrations_table',0),(255,'2017_08_20_131145_create_residents_table',0),(256,'2017_08_20_131145_create_services_table',0),(257,'2017_08_20_131145_create_servicesponsorships_table',0),(258,'2017_08_20_131145_create_servicetransactions_table',0),(259,'2017_08_20_131145_create_servicetypes_table',0),(260,'2017_08_20_131145_create_streets_table',0),(261,'2017_08_20_131145_create_sysutil_table',0),(262,'2017_08_20_131145_create_units_table',0),(263,'2017_08_20_131145_create_users_table',0),(264,'2017_08_20_131145_create_utilities_table',0),(265,'2017_08_20_131145_create_voters_table',0),(266,'2017_08_20_131151_add_foreign_keys_to_buildings_table',0),(267,'2017_08_20_131151_add_foreign_keys_to_businesses_table',0),(268,'2017_08_20_131151_add_foreign_keys_to_businessregistrations_table',0),(269,'2017_08_20_131151_add_foreign_keys_to_collections_table',0),(270,'2017_08_20_131151_add_foreign_keys_to_document_requirements_table',0),(271,'2017_08_20_131151_add_foreign_keys_to_documentdetailrequests_table',0),(272,'2017_08_20_131151_add_foreign_keys_to_documentheaderrequests_table',0),(273,'2017_08_20_131151_add_foreign_keys_to_employeeposition_table',0),(274,'2017_08_20_131151_add_foreign_keys_to_facilities_table',0),(275,'2017_08_20_131151_add_foreign_keys_to_families_table',0),(276,'2017_08_20_131151_add_foreign_keys_to_familymembers_table',0),(277,'2017_08_20_131151_add_foreign_keys_to_generaladdresses_table',0),(278,'2017_08_20_131151_add_foreign_keys_to_lots_table',0),(279,'2017_08_20_131151_add_foreign_keys_to_participants_table',0),(280,'2017_08_20_131151_add_foreign_keys_to_reservations_table',0),(281,'2017_08_20_131151_add_foreign_keys_to_residentaccountregistrations_table',0),(282,'2017_08_20_131151_add_foreign_keys_to_residentaccounts_table',0),(283,'2017_08_20_131151_add_foreign_keys_to_residentbackgrounds_table',0),(284,'2017_08_20_131151_add_foreign_keys_to_residentregistrations_table',0),(285,'2017_08_20_131151_add_foreign_keys_to_services_table',0),(286,'2017_08_20_131151_add_foreign_keys_to_servicesponsorships_table',0),(287,'2017_08_20_131151_add_foreign_keys_to_servicetransactions_table',0),(288,'2017_08_20_131151_add_foreign_keys_to_units_table',0),(289,'2017_08_20_131151_add_foreign_keys_to_voters_table',0),(290,'2017_08_24_122308_create_buildings_table',0),(291,'2017_08_24_122308_create_buildingtypes_table',0),(292,'2017_08_24_122308_create_businesscategories_table',0),(293,'2017_08_24_122308_create_businesses_table',0),(294,'2017_08_24_122308_create_businessregistrations_table',0),(295,'2017_08_24_122308_create_collections_table',0),(296,'2017_08_24_122308_create_document_requirements_table',0),(297,'2017_08_24_122308_create_documentrequests_table',0),(298,'2017_08_24_122308_create_documents_table',0),(299,'2017_08_24_122308_create_employeeposition_table',0),(300,'2017_08_24_122308_create_employees_table',0),(301,'2017_08_24_122308_create_facilities_table',0),(302,'2017_08_24_122308_create_facilitytypes_table',0),(303,'2017_08_24_122308_create_families_table',0),(304,'2017_08_24_122308_create_familymembers_table',0),(305,'2017_08_24_122308_create_generaladdresses_table',0),(306,'2017_08_24_122308_create_lots_table',0),(307,'2017_08_24_122308_create_participants_table',0),(308,'2017_08_24_122308_create_people_table',0),(309,'2017_08_24_122308_create_recipients_table',0),(310,'2017_08_24_122308_create_requirements_table',0),(311,'2017_08_24_122308_create_reservations_table',0),(312,'2017_08_24_122308_create_residentaccountregistrations_table',0),(313,'2017_08_24_122308_create_residentaccounts_table',0),(314,'2017_08_24_122308_create_residentbackgrounds_table',0),(315,'2017_08_24_122308_create_residentregistrations_table',0),(316,'2017_08_24_122308_create_residents_table',0),(317,'2017_08_24_122308_create_services_table',0),(318,'2017_08_24_122308_create_servicesponsorships_table',0),(319,'2017_08_24_122308_create_servicetransactions_table',0),(320,'2017_08_24_122308_create_servicetypes_table',0),(321,'2017_08_24_122308_create_streets_table',0),(322,'2017_08_24_122308_create_sysutil_table',0),(323,'2017_08_24_122308_create_units_table',0),(324,'2017_08_24_122308_create_users_table',0),(325,'2017_08_24_122308_create_utilities_table',0),(326,'2017_08_24_122308_create_voters_table',0),(327,'2017_08_24_122313_add_foreign_keys_to_buildings_table',0),(328,'2017_08_24_122313_add_foreign_keys_to_businesses_table',0),(329,'2017_08_24_122313_add_foreign_keys_to_businessregistrations_table',0),(330,'2017_08_24_122313_add_foreign_keys_to_collections_table',0),(331,'2017_08_24_122313_add_foreign_keys_to_document_requirements_table',0),(332,'2017_08_24_122313_add_foreign_keys_to_documentrequests_table',0),(333,'2017_08_24_122313_add_foreign_keys_to_employeeposition_table',0),(334,'2017_08_24_122313_add_foreign_keys_to_facilities_table',0),(335,'2017_08_24_122313_add_foreign_keys_to_families_table',0),(336,'2017_08_24_122313_add_foreign_keys_to_familymembers_table',0),(337,'2017_08_24_122313_add_foreign_keys_to_generaladdresses_table',0),(338,'2017_08_24_122313_add_foreign_keys_to_lots_table',0),(339,'2017_08_24_122313_add_foreign_keys_to_participants_table',0),(340,'2017_08_24_122313_add_foreign_keys_to_reservations_table',0),(341,'2017_08_24_122313_add_foreign_keys_to_residentaccountregistrations_table',0),(342,'2017_08_24_122313_add_foreign_keys_to_residentaccounts_table',0),(343,'2017_08_24_122313_add_foreign_keys_to_residentbackgrounds_table',0),(344,'2017_08_24_122313_add_foreign_keys_to_residentregistrations_table',0),(345,'2017_08_24_122313_add_foreign_keys_to_services_table',0),(346,'2017_08_24_122313_add_foreign_keys_to_servicesponsorships_table',0),(347,'2017_08_24_122313_add_foreign_keys_to_servicetransactions_table',0),(348,'2017_08_24_122313_add_foreign_keys_to_units_table',0),(349,'2017_08_24_122313_add_foreign_keys_to_voters_table',0),(350,'2017_08_25_154702_create_buildings_table',0),(351,'2017_08_25_154702_create_buildingtypes_table',0),(352,'2017_08_25_154702_create_businesscategories_table',0),(353,'2017_08_25_154702_create_businesses_table',0),(354,'2017_08_25_154702_create_businessregistrations_table',0),(355,'2017_08_25_154702_create_collections_table',0),(356,'2017_08_25_154702_create_document_requirements_table',0),(357,'2017_08_25_154702_create_documentrequests_table',0),(358,'2017_08_25_154702_create_documents_table',0),(359,'2017_08_25_154702_create_employeeposition_table',0),(360,'2017_08_25_154702_create_employees_table',0),(361,'2017_08_25_154702_create_facilities_table',0),(362,'2017_08_25_154702_create_facilitytypes_table',0),(363,'2017_08_25_154702_create_families_table',0),(364,'2017_08_25_154702_create_familymembers_table',0),(365,'2017_08_25_154702_create_generaladdresses_table',0),(366,'2017_08_25_154702_create_lots_table',0),(367,'2017_08_25_154702_create_participants_table',0),(368,'2017_08_25_154702_create_partrecipients_table',0),(369,'2017_08_25_154702_create_people_table',0),(370,'2017_08_25_154702_create_recipients_table',0),(371,'2017_08_25_154702_create_requirements_table',0),(372,'2017_08_25_154702_create_reservations_table',0),(373,'2017_08_25_154702_create_residentaccountregistrations_table',0),(374,'2017_08_25_154702_create_residentaccounts_table',0),(375,'2017_08_25_154702_create_residentbackgrounds_table',0),(376,'2017_08_25_154702_create_residentregistrations_table',0),(377,'2017_08_25_154702_create_residents_table',0),(378,'2017_08_25_154702_create_services_table',0),(379,'2017_08_25_154702_create_servicesponsorships_table',0),(380,'2017_08_25_154702_create_servicetransactions_table',0),(381,'2017_08_25_154702_create_servicetypes_table',0),(382,'2017_08_25_154702_create_streets_table',0),(383,'2017_08_25_154702_create_sysutil_table',0),(384,'2017_08_25_154702_create_units_table',0),(385,'2017_08_25_154702_create_users_table',0),(386,'2017_08_25_154702_create_utilities_table',0),(387,'2017_08_25_154702_create_voters_table',0),(388,'2017_08_25_154711_add_foreign_keys_to_buildings_table',0),(389,'2017_08_25_154711_add_foreign_keys_to_businesses_table',0),(390,'2017_08_25_154711_add_foreign_keys_to_businessregistrations_table',0),(391,'2017_08_25_154711_add_foreign_keys_to_collections_table',0),(392,'2017_08_25_154711_add_foreign_keys_to_document_requirements_table',0),(393,'2017_08_25_154711_add_foreign_keys_to_documentrequests_table',0),(394,'2017_08_25_154711_add_foreign_keys_to_employeeposition_table',0),(395,'2017_08_25_154711_add_foreign_keys_to_facilities_table',0),(396,'2017_08_25_154711_add_foreign_keys_to_families_table',0),(397,'2017_08_25_154711_add_foreign_keys_to_familymembers_table',0),(398,'2017_08_25_154711_add_foreign_keys_to_generaladdresses_table',0),(399,'2017_08_25_154711_add_foreign_keys_to_lots_table',0),(400,'2017_08_25_154711_add_foreign_keys_to_participants_table',0),(401,'2017_08_25_154711_add_foreign_keys_to_partrecipients_table',0),(402,'2017_08_25_154711_add_foreign_keys_to_reservations_table',0),(403,'2017_08_25_154711_add_foreign_keys_to_residentaccountregistrations_table',0),(404,'2017_08_25_154711_add_foreign_keys_to_residentaccounts_table',0),(405,'2017_08_25_154711_add_foreign_keys_to_residentbackgrounds_table',0),(406,'2017_08_25_154711_add_foreign_keys_to_residentregistrations_table',0),(407,'2017_08_25_154711_add_foreign_keys_to_services_table',0),(408,'2017_08_25_154711_add_foreign_keys_to_servicesponsorships_table',0),(409,'2017_08_25_154711_add_foreign_keys_to_servicetransactions_table',0),(410,'2017_08_25_154711_add_foreign_keys_to_units_table',0),(411,'2017_08_25_154711_add_foreign_keys_to_voters_table',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,6,3,'2017-08-24 15:45:52'),(2,6,2,'2017-08-24 15:45:55');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partrecipients`
--

LOCK TABLES `partrecipients` WRITE;
/*!40000 ALTER TABLE `partrecipients` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipients`
--

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;
INSERT INTO `recipients` VALUES (2,'Dog',1,0),(3,'Plants',1,0);
/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,'Identity Card','',1,0),(2,'SSS','',1,0),(3,'BIR','',1,0),(4,'NBI CLEARANCE','',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (2,'2017 Contis Vaccination','asdhakjshd','01:00:00','02:00:00','2017-01-01',2,2,'Pending',NULL,NULL,NULL,NULL),(3,'HAHAHAHHA','asdasdasd','02:00:00','03:00:00','2017-01-01',NULL,2,'Pending',NULL,141113,'f.marcjoseph@yahoo.com','09123456789'),(4,'kajshdsakjdhkajsh','akjshdasjdh','15:01:00','17:01:00','2019-12-31',NULL,1,'Pending','kjhaskjdhaskdjh',190000,'kjahajkhdakjshd','kashdkjahsdkj'),(5,'fsdafsdsdfdsf','asdfasdfasdfsd','10:00:00','12:00:00','2017-08-25',2,1,'Pending',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
INSERT INTO `residentbackgrounds` VALUES (1,'CEO','₱100,001 and above','2017-08-22',2,1,0),(2,'Software Engineer','₱50,001-₱100,000','2017-08-22',3,1,0),(3,'CPA','₱50,001-₱100,000','2017-08-22',4,1,0),(4,'CEO','₱100,001 and above','2017-08-22',5,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (2,'RES_001','Marc Joseph','Mendoza','Fuellas',NULL,'09263526321','M','1998-06-18','Single',NULL,NULL,'Official',1,'profpic.jpg'),(3,'RES_002','Gianne Mae','Mendoza','Fuellas',NULL,'09123456789','F','1997-04-26','Single',NULL,NULL,'Official',1,'7c15f23c241b8569a845fd3c99b95d98.jpg'),(4,'RES_003','Raymond','Averilla','Fuellas',NULL,'09876543211','M','1996-08-07','Married',NULL,NULL,'Official',1,'10.jpg'),(5,'RES_004','Bryan James','Reyes','Illaga',NULL,'09876543212','M','1999-12-01','Widowed',NULL,NULL,'Transient',1,'11enrique.jpg');
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
INSERT INTO `services` VALUES (1,'SERV_001','Vaccination','',1,1,0),(2,'SERV_002','Circumcision','',1,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetransactions`
--

LOCK TABLES `servicetransactions` WRITE;
/*!40000 ALTER TABLE `servicetransactions` DISABLE KEYS */;
INSERT INTO `servicetransactions` VALUES (1,'SERV_REG_001','2017 Contis Vaccination',1,4,7,'2017-01-01','2017-01-01','Pending',1),(6,'SERV_REG_002','2017 Contis Vaccination',1,NULL,NULL,'2017-08-10',NULL,'On-going',0);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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
INSERT INTO `utilities` VALUES (1,'Brgy 629','Roselito Pagudpod','123 Hipodromo St. Sta Mesa Manila','asd','asd','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','FAC_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000','COLLE_000');
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

-- Dump completed on 2017-08-25 23:50:34
