-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: dbBarangay
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

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
  `buildingCode` varchar(45) NOT NULL,
  `buildingName` varchar(45) NOT NULL,
  `buildingType` varchar(45) NOT NULL,
  PRIMARY KEY (`buildingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesscategories`
--

LOCK TABLES `businesscategories` WRITE;
/*!40000 ALTER TABLE `businesscategories` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentdetailrequests`
--

LOCK TABLES `documentdetailrequests` WRITE;
/*!40000 ALTER TABLE `documentdetailrequests` DISABLE KEYS */;
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
  `requestDate` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  PRIMARY KEY (`documentHeaderPrimeID`),
  KEY `fk_DocumentHeaderRequests_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_DocumentHeaderRequests_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentheaderrequests`
--

LOCK TABLES `documentheaderrequests` WRITE;
/*!40000 ALTER TABLE `documentheaderrequests` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (2,'asdfasdf001','asdfasdfsadf','fsdfsdfs','asdfasdfsdfsdf','Legal Document',100,1,1),(3,'asdfasdf002','asdfasdfasdf','fasdfasdf','fasdfasdfsdaf','Legal Document',100,1,1),(4,'DOC-PR1-001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {civilstatus}, and whose signature appears below is presently residing in {housenumber}|{buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {gender:opt} has no dorigatory record filed and / or pending case against {gender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {gender:opt} requirements.','Legal Document',150,1,0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
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
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`familyPrimeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
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
  `memberRelation` varchar(45) NOT NULL,
  `peoplePrimeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `familyPrimeID` int(11) NOT NULL,
  PRIMARY KEY (`familyMemberPrimeID`),
  KEY `fk_familyMembers_Residents1_idx` (`peoplePrimeID`),
  KEY `fk_FamilyMembers_Families1_idx` (`familyPrimeID`),
  CONSTRAINT `fk_FamilyMembers_Families1` FOREIGN KEY (`familyPrimeID`) REFERENCES `families` (`familyPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_familyMembers_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
/*!40000 ALTER TABLE `familymembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familyregistrations`
--

DROP TABLE IF EXISTS `familyregistrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familyregistrations` (
  `primeID` int(11) NOT NULL AUTO_INCREMENT,
  `registrationID` varchar(20) NOT NULL,
  `registrationDate` date NOT NULL,
  `familyPrimeID` int(11) NOT NULL,
  PRIMARY KEY (`primeID`),
  KEY `fk_FamilyRegistrations_Families1_idx` (`familyPrimeID`),
  CONSTRAINT `fk_FamilyRegistrations_Families1` FOREIGN KEY (`familyPrimeID`) REFERENCES `families` (`familyPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familyregistrations`
--

LOCK TABLES `familyregistrations` WRITE;
/*!40000 ALTER TABLE `familyregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `familyregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generaladdresses`
--

DROP TABLE IF EXISTS `generaladdresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generaladdresses` (
  `personAddressID` int(11) NOT NULL AUTO_INCREMENT,
  `addressID` int(11) NOT NULL,
  `addressType` varchar(30) NOT NULL,
  `residentPrimeID` int(11) DEFAULT NULL,
  `facilitiesPrimeID` int(11) DEFAULT NULL,
  `businessPrimeID` int(11) DEFAULT NULL,
  `houseID` int(11) DEFAULT NULL,
  `unitID` int(11) DEFAULT NULL,
  `streetID` int(11) DEFAULT NULL,
  PRIMARY KEY (`personAddressID`),
  KEY `fk_GeneralAddresses_Facilities1_idx` (`facilitiesPrimeID`),
  KEY `fk_GeneralAddresses_Businesses1_idx` (`businessPrimeID`),
  KEY `fk_GeneralAddresses_Residents1_idx` (`residentPrimeID`),
  KEY `fk_generaladdresses_houses1_idx` (`houseID`),
  KEY `fk_generaladdresses_units1_idx` (`unitID`),
  KEY `fk_generaladdresses_streets1_idx` (`streetID`),
  CONSTRAINT `fk_GeneralAddresses_Businesses1` FOREIGN KEY (`businessPrimeID`) REFERENCES `businesses` (`businessPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_GeneralAddresses_Facilities1` FOREIGN KEY (`facilitiesPrimeID`) REFERENCES `facilities` (`primeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_GeneralAddresses_Residents1` FOREIGN KEY (`residentPrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_houses1` FOREIGN KEY (`houseID`) REFERENCES `houses` (`houseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_streets1` FOREIGN KEY (`streetID`) REFERENCES `streets` (`streetID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_generaladdresses_units1` FOREIGN KEY (`unitID`) REFERENCES `units` (`unitID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `generaladdresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `houses` (
  `houseID` int(11) NOT NULL AUTO_INCREMENT,
  `houseCode` varchar(8) NOT NULL,
  `lotID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`houseID`),
  KEY `fk_Houses_Lots1_idx` (`lotID`),
  CONSTRAINT `fk_Houses_Lots1` FOREIGN KEY (`lotID`) REFERENCES `lots` (`lotID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houses`
--

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
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
  `peoplePrimeID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`backgroundPrimeID`),
  KEY `fk_residentBackgrounds_Residents1_idx` (`peoplePrimeID`),
  CONSTRAINT `fk_residentBackgrounds_Residents1` FOREIGN KEY (`peoplePrimeID`) REFERENCES `residents` (`residentPrimeID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetypes`
--

LOCK TABLES `servicetypes` WRITE;
/*!40000 ALTER TABLE `servicetypes` DISABLE KEYS */;
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
  `barangayID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  PRIMARY KEY (`streetID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `streets`
--

LOCK TABLES `streets` WRITE;
/*!40000 ALTER TABLE `streets` DISABLE KEYS */;
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
  `lotID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `houseID` int(11) DEFAULT NULL,
  `buildingID` int(11) DEFAULT NULL,
  PRIMARY KEY (`unitID`),
  KEY `fk_Units_Lots1_idx` (`lotID`),
  KEY `fk_Units_Houses1_idx` (`houseID`),
  KEY `fk_units_building1_idx` (`buildingID`),
  CONSTRAINT `fk_Units_Houses1` FOREIGN KEY (`houseID`) REFERENCES `houses` (`houseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Units_Lots1` FOREIGN KEY (`lotID`) REFERENCES `lots` (`lotID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_units_building1` FOREIGN KEY (`buildingID`) REFERENCES `buildings` (`buildingID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
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

-- Dump completed on 2017-07-27 10:49:31
