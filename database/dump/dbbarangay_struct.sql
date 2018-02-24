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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `dateReserved` datetime NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `maintenance` tinyint(4) NOT NULL DEFAULT '0',
  `report` tinyint(4) NOT NULL DEFAULT '0',
  `query` tinyint(4) NOT NULL DEFAULT '0',
  `utilities` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-24 19:01:29
