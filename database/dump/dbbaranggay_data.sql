-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: dbBarangay
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` VALUES (1,1,'Maui Oasis',2,1,0),(2,3,'El Pueblo',2,1,0),(3,5,'444A-a',1,1,0);
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `buildingtypes`
--

LOCK TABLES `buildingtypes` WRITE;
/*!40000 ALTER TABLE `buildingtypes` DISABLE KEYS */;
INSERT INTO `buildingtypes` VALUES (1,'House',1,0),(2,'Condominium',1,0);
/*!40000 ALTER TABLE `buildingtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `businesscategories`
--

LOCK TABLES `businesscategories` WRITE;
/*!40000 ALTER TABLE `businesscategories` DISABLE KEYS */;
INSERT INTO `businesscategories` VALUES (5,'Industrial','',1,0);
/*!40000 ALTER TABLE `businesscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `businessregistrations`
--

LOCK TABLES `businessregistrations` WRITE;
/*!40000 ALTER TABLE `businessregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `businessregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `document_requirements`
--

LOCK TABLES `document_requirements` WRITE;
/*!40000 ALTER TABLE `document_requirements` DISABLE KEYS */;
INSERT INTO `document_requirements` VALUES (1,1,1,2),(2,2,1,2),(3,2,2,1);
/*!40000 ALTER TABLE `document_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {housenumber}|{buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Clearance',100,1,0),(2,'DOC_002','Certificate of Indigency','Indegency certification','This is to certify that..','Certification',100,1,0);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employeeposition`
--

LOCK TABLES `employeeposition` WRITE;
/*!40000 ALTER TABLE `employeeposition` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeeposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,'FAC_001','Hipodromo Court','',0,0,2,100,200),(2,'FAC_002','Hipodromo Plaza','',0,0,5,100,150);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
INSERT INTO `facilitytypes` VALUES (2,'Covered Court',1,0),(3,'Parks',1,0),(4,'Chapel',1,0),(5,'Plaza',1,0);
/*!40000 ALTER TABLE `facilitytypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0);
/*!40000 ALTER TABLE `families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (3,1,4,'Auntie',0),(4,2,5,'Self',0),(9,1,2,'Son',0),(16,1,3,'Daughter',0);
/*!40000 ALTER TABLE `familymembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
INSERT INTO `generaladdresses` VALUES (1,'Permanent Address',2,NULL,NULL,1,1,1,1),(2,'Permanent Address',3,NULL,NULL,3,2,3,2),(3,'Permanent Address',4,NULL,NULL,3,2,3,2),(4,'Permanent Address',5,NULL,NULL,5,3,5,3);
/*!40000 ALTER TABLE `generaladdresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'1',1,1,0),(2,'2',1,1,0),(3,'1A',2,1,0),(4,'1B',2,1,0),(5,'30',3,1,0),(6,'31',3,1,0);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,'Identity Card','',1,0),(2,'SSS','',1,0),(3,'BIR','',1,0),(4,'NBI CLEARANCE','',1,0);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `residentaccountregistrations`
--

LOCK TABLES `residentaccountregistrations` WRITE;
/*!40000 ALTER TABLE `residentaccountregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentaccountregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `residentaccounts`
--

LOCK TABLES `residentaccounts` WRITE;
/*!40000 ALTER TABLE `residentaccounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `residentbackgrounds`
--

LOCK TABLES `residentbackgrounds` WRITE;
/*!40000 ALTER TABLE `residentbackgrounds` DISABLE KEYS */;
INSERT INTO `residentbackgrounds` VALUES (1,'CEO','₱100,001 and above','2017-08-22',2,1,0),(2,'Software Engineer','₱50,001-₱100,000','2017-08-22',3,1,0),(3,'CPA','₱50,001-₱100,000','2017-08-22',4,1,0),(4,'CEO','₱100,001 and above','2017-08-22',5,1,0);
/*!40000 ALTER TABLE `residentbackgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `residentregistrations`
--

LOCK TABLES `residentregistrations` WRITE;
/*!40000 ALTER TABLE `residentregistrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `residentregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (2,'RES_001','Marc Joseph','Mendoza','Fuellas',NULL,'09263526321','M','1998-06-18','Single',NULL,NULL,'Official',1,'profpic.jpg'),(3,'RES_002','Gianne Mae','Mendoza','Fuellas',NULL,'09123456789','F','1997-04-26','Single',NULL,NULL,'Official',1,'7c15f23c241b8569a845fd3c99b95d98.jpg'),(4,'RES_003','Raymond','Averilla','Fuellas',NULL,'09876543211','M','1996-08-07','Married',NULL,NULL,'Official',1,'10.jpg'),(5,'RES_004','Bryan James','Reyes','Illaga',NULL,'09876543212','M','1999-12-01','Widowed',NULL,NULL,'Transient',1,'11enrique.jpg');
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'SERV_001','Vaccination','',1,1,0),(2,'SERV_002','Circumcision','',1,1,0);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicesponsorships`
--

LOCK TABLES `servicesponsorships` WRITE;
/*!40000 ALTER TABLE `servicesponsorships` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicesponsorships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicetransactions`
--

LOCK TABLES `servicetransactions` WRITE;
/*!40000 ALTER TABLE `servicetransactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicetransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicetypes`
--

LOCK TABLES `servicetypes` WRITE;
/*!40000 ALTER TABLE `servicetypes` DISABLE KEYS */;
INSERT INTO `servicetypes` VALUES (1,'Health',NULL,1,0),(2,'Animal Welfare',NULL,1,0);
/*!40000 ALTER TABLE `servicetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `streets`
--

LOCK TABLES `streets` WRITE;
/*!40000 ALTER TABLE `streets` DISABLE KEYS */;
INSERT INTO `streets` VALUES (1,'Hipodromo',1,0),(2,'Teresa',1,0),(3,'Mahiyain',1,0);
/*!40000 ALTER TABLE `streets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sysutil`
--

LOCK TABLES `sysutil` WRITE;
/*!40000 ALTER TABLE `sysutil` DISABLE KEYS */;
/*!40000 ALTER TABLE `sysutil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'1',1,0,1),(2,'2',1,0,1),(3,'100',1,0,2),(4,'101',1,0,2),(5,'T1',1,0,3),(6,'T2',1,0,3);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
INSERT INTO `utilities` VALUES (1,'Brgy 629','Roselito Pagudpod','123 Hipodromo St. Sta Mesa Manila','asd','asd','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','REQ_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000');
/*!40000 ALTER TABLE `utilities` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23 10:50:40
