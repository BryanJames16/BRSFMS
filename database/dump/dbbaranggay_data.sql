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
-- Dumping data for table `documentrequests`
--

LOCK TABLES `documentrequests` WRITE;
/*!40000 ALTER TABLE `documentrequests` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentrequests` ENABLE KEYS */;
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
INSERT INTO `facilities` VALUES (1,'FAC_001','Hipodromo Court',NULL,1,0,2,100,200),(2,'FAC_002','Hipodromo Plaza',NULL,1,0,5,100,150),(4,'FAC_003','asdhakjsh','ajksdh',1,1,2,0.04,0.02);
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
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0),(3,'FAM_003',2,'asdas','2017-08-23',1);
/*!40000 ALTER TABLE `families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (3,1,4,'Auntie',0),(4,2,5,'Self',0),(9,1,2,'Son',0),(17,3,3,'Wife',0);
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
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (229,'2017_08_20_131145_create_buildings_table',0),(230,'2017_08_20_131145_create_buildingtypes_table',0),(231,'2017_08_20_131145_create_businesscategories_table',0),(232,'2017_08_20_131145_create_businesses_table',0),(233,'2017_08_20_131145_create_businessregistrations_table',0),(234,'2017_08_20_131145_create_collections_table',0),(235,'2017_08_20_131145_create_document_requirements_table',0),(236,'2017_08_20_131145_create_documentdetailrequests_table',0),(237,'2017_08_20_131145_create_documentheaderrequests_table',0),(238,'2017_08_20_131145_create_documents_table',0),(239,'2017_08_20_131145_create_employeeposition_table',0),(240,'2017_08_20_131145_create_employees_table',0),(241,'2017_08_20_131145_create_facilities_table',0),(242,'2017_08_20_131145_create_facilitytypes_table',0),(243,'2017_08_20_131145_create_families_table',0),(244,'2017_08_20_131145_create_familymembers_table',0),(245,'2017_08_20_131145_create_generaladdresses_table',0),(246,'2017_08_20_131145_create_lots_table',0),(247,'2017_08_20_131145_create_participants_table',0),(248,'2017_08_20_131145_create_people_table',0),(249,'2017_08_20_131145_create_requirements_table',0),(250,'2017_08_20_131145_create_reservations_table',0),(251,'2017_08_20_131145_create_residentaccountregistrations_table',0),(252,'2017_08_20_131145_create_residentaccounts_table',0),(253,'2017_08_20_131145_create_residentbackgrounds_table',0),(254,'2017_08_20_131145_create_residentregistrations_table',0),(255,'2017_08_20_131145_create_residents_table',0),(256,'2017_08_20_131145_create_services_table',0),(257,'2017_08_20_131145_create_servicesponsorships_table',0),(258,'2017_08_20_131145_create_servicetransactions_table',0),(259,'2017_08_20_131145_create_servicetypes_table',0),(260,'2017_08_20_131145_create_streets_table',0),(261,'2017_08_20_131145_create_sysutil_table',0),(262,'2017_08_20_131145_create_units_table',0),(263,'2017_08_20_131145_create_users_table',0),(264,'2017_08_20_131145_create_utilities_table',0),(265,'2017_08_20_131145_create_voters_table',0),(266,'2017_08_20_131151_add_foreign_keys_to_buildings_table',0),(267,'2017_08_20_131151_add_foreign_keys_to_businesses_table',0),(268,'2017_08_20_131151_add_foreign_keys_to_businessregistrations_table',0),(269,'2017_08_20_131151_add_foreign_keys_to_collections_table',0),(270,'2017_08_20_131151_add_foreign_keys_to_document_requirements_table',0),(271,'2017_08_20_131151_add_foreign_keys_to_documentdetailrequests_table',0),(272,'2017_08_20_131151_add_foreign_keys_to_documentheaderrequests_table',0),(273,'2017_08_20_131151_add_foreign_keys_to_employeeposition_table',0),(274,'2017_08_20_131151_add_foreign_keys_to_facilities_table',0),(275,'2017_08_20_131151_add_foreign_keys_to_families_table',0),(276,'2017_08_20_131151_add_foreign_keys_to_familymembers_table',0),(277,'2017_08_20_131151_add_foreign_keys_to_generaladdresses_table',0),(278,'2017_08_20_131151_add_foreign_keys_to_lots_table',0),(279,'2017_08_20_131151_add_foreign_keys_to_participants_table',0),(280,'2017_08_20_131151_add_foreign_keys_to_reservations_table',0),(281,'2017_08_20_131151_add_foreign_keys_to_residentaccountregistrations_table',0),(282,'2017_08_20_131151_add_foreign_keys_to_residentaccounts_table',0),(283,'2017_08_20_131151_add_foreign_keys_to_residentbackgrounds_table',0),(284,'2017_08_20_131151_add_foreign_keys_to_residentregistrations_table',0),(285,'2017_08_20_131151_add_foreign_keys_to_services_table',0),(286,'2017_08_20_131151_add_foreign_keys_to_servicesponsorships_table',0),(287,'2017_08_20_131151_add_foreign_keys_to_servicetransactions_table',0),(288,'2017_08_20_131151_add_foreign_keys_to_units_table',0),(289,'2017_08_20_131151_add_foreign_keys_to_voters_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
INSERT INTO `people` VALUES (1,'PER_001','MMM','AAAFFF','ASDASD',NULL,'09123456789','M',1,0);
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
INSERT INTO `reservations` VALUES (2,'2017 Contis Vaccination','asdhakjshd','01:00:00','02:00:00','2017-01-01',2,2,'Pending',NULL,NULL,NULL,NULL),(3,'HAHAHAHHA','asdasdasd','02:00:00','03:00:00','2017-01-01',NULL,2,'Pending',NULL,141113,'f.marcjoseph@yahoo.com','09123456789'),(4,'kajshdsakjdhkajsh','akjshdasjdh','15:01:00','17:01:00','2019-12-31',NULL,1,'Pending','kjhaskjdhaskdjh',190000,'kjahajkhdakjshd','kashdkjahsdkj'),(5,'Birthday','asdfasdfsdfsdfsaddsfaa','03:03:00','15:03:00','2017-08-08',NULL,2,'Pending','Hello',9999999,'asldfajsldf@ksdjfhak.com','0901931133');
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
INSERT INTO `servicetransactions` VALUES (1,'SERV_REG_001','2017 Contis Vaccination',1,4,7,'2017-01-01','2017-01-01','Pending',0);
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
INSERT INTO `utilities` VALUES (1,'Brgy 629','Roselito Pagudpod','123 Hipodromo St. Sta Mesa Manila','asd','asd','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','REQ_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000','COL_000');
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

-- Dump completed on 2017-08-23 19:04:02
