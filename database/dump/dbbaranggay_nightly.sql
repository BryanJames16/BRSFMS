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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` VALUES (3,1,'El Pueblo',2,1,0),(4,2,'#93 HG',1,1,0),(5,5,'Maui',2,1,0),(6,2,'#32 LM',1,1,0),(7,4,'Illumina',2,1,0);
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
INSERT INTO `buildingtypes` VALUES (1,'Houses',1,0),(2,'Condominium',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesscategories`
--

LOCK TABLES `businesscategories` WRITE;
/*!40000 ALTER TABLE `businesscategories` DISABLE KEYS */;
INSERT INTO `businesscategories` VALUES (2,'Industrial','',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (2,'BUS_001','Sari Sari Store','','Sole',2,1,0);
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
  `registrationID` varchar(20) NOT NULL,
  `registrationDate` datetime NOT NULL,
  `businessPrimeID` int(11) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`registrationPrimeID`),
  KEY `fk_BusinessRegistrations_Businesses1_idx` (`businessPrimeID`),
  KEY `fk_BusinessRegistrations_People1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_BusinessRegistrations_Businesses1` FOREIGN KEY (`businessPrimeID`) REFERENCES `businesses` (`businessPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_BusinessRegistrations_People1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businessregistrations`
--

LOCK TABLES `businessregistrations` WRITE;
/*!40000 ALTER TABLE `businessregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `businessregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentdetailrequests`
--

DROP TABLE IF EXISTS `documentdetailrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentdetailrequests` (
  `documentDetailPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `headerPrimeID` int(11) NOT NULL,
  `documentPrimeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`documentDetailPrimeID`,`headerPrimeID`),
  KEY `fk_DocumentDetailRequests_DocumentHeaderRequests1_idx` (`headerPrimeID`),
  KEY `fk_DocumentDetailRequests_Documents1_idx` (`documentPrimeID`),
  CONSTRAINT `fk_DocumentDetailRequests_DocumentHeaderRequests1` FOREIGN KEY (`headerPrimeID`) REFERENCES `documentheaderrequests` (`documentHeaderPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DocumentDetailRequests_Documents1` FOREIGN KEY (`documentPrimeID`) REFERENCES `documents` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentdetailrequests`
--

LOCK TABLES `documentdetailrequests` WRITE;
/*!40000 ALTER TABLE `documentdetailrequests` DISABLE KEYS */;
INSERT INTO `documentdetailrequests` VALUES (1,1,2,1),(2,2,2,1),(3,3,2,1),(4,4,2,1),(5,5,2,2);
/*!40000 ALTER TABLE `documentdetailrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentheaderrequests`
--

DROP TABLE IF EXISTS `documentheaderrequests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentheaderrequests` (
  `documentHeaderPrimeID` int(11) NOT NULL AUTO_INCREMENT,
  `requestID` varchar(20) NOT NULL,
  `requestDate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`documentHeaderPrimeID`),
  KEY `fk_DocumentHeaderRequests_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_DocumentHeaderRequests_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentheaderrequests`
--

LOCK TABLES `documentheaderrequests` WRITE;
/*!40000 ALTER TABLE `documentheaderrequests` DISABLE KEYS */;
INSERT INTO `documentheaderrequests` VALUES (1,'REQ_001','2017-07-27','Cancelled',1),(2,'REQ_002','2017-07-27','Pending',6),(3,'REQ_003','2017-07-28','Pending',7),(4,'REQ_004','2017-07-29','Pending',1),(5,'REQ_005','2017-07-29','Pending',5);
/*!40000 ALTER TABLE `documentheaderrequests` ENABLE KEYS */;
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
INSERT INTO `documents` VALUES (2,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {housenumber}|{buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Certification',100,1,0),(3,'DOC_002','Certificate of Indigency','','This is to chuchu','Certification',100,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (6,'FAC_001','Hipodromo Court','',0,0,3,100,150);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
INSERT INTO `facilitytypes` VALUES (3,'Covered Court',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',1,'Fuellas Family','2017-07-28',0),(2,'FAM_002',7,'Paglinawan Family','2017-07-28',0),(3,'FAM_003',5,'Illaga Family','2017-07-28',0),(4,'FAM_004',6,'Del Mundo Family','2017-07-28',0),(5,'FAM_005',16,'Salvador Family','2017-07-28',0),(6,'FAM_006',1,'asdSD','2017-07-28',1),(8,'FAM_007',17,'Aragon Family','2017-07-29',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (1,1,2,'Brother',0),(2,1,5,'Mother',0),(3,2,6,'Cousin',0),(4,2,17,'Brother',0);
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
  KEY `fk_GeneralAddresses_Businesses1_idx` (`businessPrimeID`),
  KEY `fk_GeneralAddresses_Residents1_idx` (`residentPrimeID`),
  KEY `fk_generaladdresses_units1_idx` (`unitID`),
  KEY `fk_generaladdresses_streets1_idx` (`streetID`),
  KEY `lotID_idx` (`lotID`),
  CONSTRAINT `fk_GeneralAddresses_Businesses1` FOREIGN KEY (`businessPrimeID`) REFERENCES `businesses` (`businessPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_GeneralAddresses_Facilities1` FOREIGN KEY (`facilitiesPrimeID`) REFERENCES `facilities` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_GeneralAddresses_Residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_streets1` FOREIGN KEY (`streetID`) REFERENCES `streets` (`streetID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_units1` FOREIGN KEY (`unitID`) REFERENCES `units` (`unitID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
INSERT INTO `generaladdresses` VALUES (1,'Current Address',23,NULL,NULL,3,1,2,4),(2,'Permanent Address',24,NULL,NULL,5,2,4,7),(4,'Current Address',26,NULL,NULL,6,2,4,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'5C',1,1,0),(2,'4C',1,1,0),(3,'10',2,1,0),(4,'20',2,1,0),(5,'3C',1,1,0);
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
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_07_31_074140_create_buildings_table',0),(2,'2017_07_31_074140_create_buildingtypes_table',0),(3,'2017_07_31_074140_create_businesscategories_table',0),(4,'2017_07_31_074140_create_businesses_table',0),(5,'2017_07_31_074140_create_businessregistrations_table',0),(6,'2017_07_31_074140_create_documentdetailrequests_table',0),(7,'2017_07_31_074140_create_documentheaderrequests_table',0),(8,'2017_07_31_074140_create_documents_table',0),(9,'2017_07_31_074140_create_employeeposition_table',0),(10,'2017_07_31_074140_create_employees_table',0),(11,'2017_07_31_074140_create_facilities_table',0),(12,'2017_07_31_074140_create_facilitytypes_table',0),(13,'2017_07_31_074140_create_families_table',0),(14,'2017_07_31_074140_create_familymembers_table',0),(15,'2017_07_31_074140_create_generaladdresses_table',0),(16,'2017_07_31_074140_create_lots_table',0),(17,'2017_07_31_074140_create_people_table',0),(18,'2017_07_31_074140_create_reservations_table',0),(19,'2017_07_31_074140_create_residentaccountregistrations_table',0),(20,'2017_07_31_074140_create_residentaccounts_table',0),(21,'2017_07_31_074140_create_residentbackgrounds_table',0),(22,'2017_07_31_074140_create_residentregistrations_table',0),(23,'2017_07_31_074140_create_residents_table',0),(24,'2017_07_31_074140_create_services_table',0),(25,'2017_07_31_074140_create_servicesponsorships_table',0),(26,'2017_07_31_074140_create_servicetypes_table',0),(27,'2017_07_31_074140_create_streets_table',0),(28,'2017_07_31_074140_create_sysutil_table',0),(29,'2017_07_31_074140_create_units_table',0),(30,'2017_07_31_074140_create_users_table',0),(31,'2017_07_31_074140_create_voters_table',0),(32,'2017_07_31_074145_add_foreign_keys_to_buildings_table',0),(33,'2017_07_31_074145_add_foreign_keys_to_businesses_table',0),(34,'2017_07_31_074145_add_foreign_keys_to_businessregistrations_table',0),(35,'2017_07_31_074145_add_foreign_keys_to_documentdetailrequests_table',0),(36,'2017_07_31_074145_add_foreign_keys_to_documentheaderrequests_table',0),(37,'2017_07_31_074145_add_foreign_keys_to_employeeposition_table',0),(38,'2017_07_31_074145_add_foreign_keys_to_facilities_table',0),(39,'2017_07_31_074145_add_foreign_keys_to_families_table',0),(40,'2017_07_31_074145_add_foreign_keys_to_familymembers_table',0),(41,'2017_07_31_074145_add_foreign_keys_to_generaladdresses_table',0),(42,'2017_07_31_074145_add_foreign_keys_to_lots_table',0),(43,'2017_07_31_074145_add_foreign_keys_to_reservations_table',0),(44,'2017_07_31_074145_add_foreign_keys_to_residentaccountregistrations_table',0),(45,'2017_07_31_074145_add_foreign_keys_to_residentaccounts_table',0),(46,'2017_07_31_074145_add_foreign_keys_to_residentbackgrounds_table',0),(47,'2017_07_31_074145_add_foreign_keys_to_residentregistrations_table',0),(48,'2017_07_31_074145_add_foreign_keys_to_services_table',0),(49,'2017_07_31_074145_add_foreign_keys_to_servicesponsorships_table',0),(50,'2017_07_31_074145_add_foreign_keys_to_units_table',0),(51,'2017_07_31_074145_add_foreign_keys_to_voters_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
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
  `peoplePrimeID` int(11) NOT NULL,
  `facilityPrimeID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`primeID`),
  KEY `fk_Reservations_People1_idx` (`peoplePrimeID`),
  KEY `fk_Reservations_Facilities1_idx` (`facilityPrimeID`),
  CONSTRAINT `fk_Reservations_Facilities1` FOREIGN KEY (`facilityPrimeID`) REFERENCES `facilities` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reservations_People1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `people` (`peoplePrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
INSERT INTO `residentbackgrounds` VALUES (4,'Safety Officer','₱0-₱10,000','2017-07-31',26,1,0),(5,'None','₱0-₱10,000','2017-07-30',26,1,0),(6,'Safety Officer','₱50,001-₱100,000','2017-08-01',26,1,0);
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
  `suffix` varchar(5) NOT NULL,
  `contactNumber` varchar(14) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthDate` date NOT NULL,
  `civilStatus` varchar(20) NOT NULL,
  `seniorCitizenID` varchar(20) DEFAULT NULL,
  `disabilities` varchar(250) DEFAULT NULL,
  `residentType` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`residentPrimeID`),
  KEY `fk_Residents_People1_idx` (`residentPrimeID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (1,'RES_001','Marc Joseph','Mendoza','Fuellas','Jr.','09234567891','M','1998-06-18','Single','',NULL,'Official',1),(2,'RES_002','Clariza','Mendoza','Fuellas','','09123456789','F','1978-04-16','Married','','','Transient',1),(5,'RES_003','Bryan James','Reyes','Illaga','','09654321761','M','1998-01-01','Single','',NULL,'Transient',1),(6,'RES_004','Moira Kelly','Antonio','Del Mundo','','09123456789','F','1998-02-08','Single','','','Transient',1),(7,'RES_005','Glen','Reyes','Paglinawan','','09123456789','M','2017-01-01','Married','',NULL,'Transient',1),(16,'RES_006','Janella','Desiderio','Salvador','','09123456789','F','1990-04-02','Single','','','Official',1),(17,'RES_007','Xendree','Romero','Aragon','','09123456789','M','2002-09-11','Single','','','Official',1),(23,'RES_008','Gail-Anne','Mendoza','Fuellas','','09123456789','F','1997-05-01','Single','','','Official',1),(24,'RES_009','Gianne Mae','Mendoza','Fuellas','','09123456789','F','1997-09-05','Single','',NULL,'Official',1),(26,'RES_010','Maria Akizia','Delima','Alvino','','09123456789','F','2002-12-31','Single','',NULL,'Official',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (6,'SERV_001','Tuli','',158,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetypes`
--

LOCK TABLES `servicetypes` WRITE;
/*!40000 ALTER TABLE `servicetypes` DISABLE KEYS */;
INSERT INTO `servicetypes` VALUES (158,'Health','',1,0),(159,'Skubariwa','',1,0);
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
INSERT INTO `streets` VALUES (1,'Teresa',1,0),(2,'Magdalene',1,0),(3,'Lubiran',1,0);
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
INSERT INTO `units` VALUES (2,'2',1,0,4),(3,'1',1,0,4),(4,'100',1,0,5),(5,'1A',1,0,7),(6,'2A',1,0,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Skubariwa','skubariwa@gmail.com','$2y$10$o7sbyFDyiHWht0rPcGEVQuPgXNL2ITbTjRViE2n8mwpAsFb0i0HZu','2017-07-26 11:58:18','2017-07-26 11:50:25','4lY6tOQgOOqjFvv4ru5wtp5dzgzO1SF79G3MvP02fiMWku0ISrt8Jt0bznMW','','','','',''),(2,'asdf','asdf@asdf.com','$2y$10$ZfbiKMOvv769UWE7o3zRLuaD3P5yG2JYfqL4REpOG.ofkD8Pnq1t6','2017-07-29 07:56:48','2017-07-29 07:56:48',NULL,'','','','',''),(3,'skubariwa','f.marcjoseph@yahoo.com','$2y$10$OmVA80gQiDWu8h6.rTD0MelxQEGLRK9K7OvXqVQFgRngfIGrSJ1ju','2017-07-29 14:22:43','2017-07-29 14:21:49','i37DpaM6O0geK2jXtg2tMfGLdE2Kcbzhvub2GQJu8KcZCboFfYwfXKOuiutS','Marc Joseph','Mendoza','Fuellas','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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

-- Dump completed on 2017-08-02 21:50:55
