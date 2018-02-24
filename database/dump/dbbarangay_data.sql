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
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
INSERT INTO `buildings` VALUES (1,1,'Maui Oasis',2,1,0),(2,3,'El Pueblo',2,1,0),(3,5,'444A-a',1,0,0);
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
INSERT INTO `businesscategories` VALUES (5,'Industrial',NULL,1,0),(7,'Clothing','',1,0);
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
INSERT INTO `businessregistrations` VALUES (2,'20-1977L','Rickadee Salon','Rickadee Salon Corp.',2,'2017-09-20 17:33:30',NULL,0,'258 H. TERESA STREET STA. MESA MANILA',NULL,NULL,NULL,NULL,NULL,NULL,5),(8,'19-1236DL','Index Salon','Index Salon Corp.',6,'2017-09-21 02:08:18',NULL,0,'312-C Hipodromo St. Sta Mesa, Manila',NULL,NULL,NULL,NULL,NULL,NULL,7),(13,'87612-15236POl','Kempinsilan','Mirga Copr.',5,'2017-09-24 15:45:50',NULL,1,'5C Magadalene St. Sta Mesa, Manila',NULL,NULL,NULL,NULL,NULL,NULL,7);
/*!40000 ALTER TABLE `businessregistrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (12,'COLLE_001','2017-08-30 01:41:17','2017-09-16 03:31:47',3,600,1000,'Paid',20,NULL,2,NULL),(13,'COLLE_002','2017-08-30 01:42:00',NULL,3,200,NULL,'Pending',21,NULL,5,NULL),(14,'COLLE_003','2017-08-30 01:44:00',NULL,3,1400,NULL,'Pending',22,NULL,6,NULL),(15,'COLLE_004','2017-08-30 03:35:11','2017-08-30 03:37:06',3,200,300,'Paid',23,NULL,8,NULL),(16,'COLLE_005','2017-09-09 04:39:38',NULL,3,1800,NULL,'Pending',24,NULL,2,NULL),(17,'COLLE_006','2017-09-09 04:41:14','2017-09-09 04:41:48',3,100,1000,'Paid',25,NULL,2,NULL),(18,'COLLE_007','2017-09-16 03:23:05',NULL,3,200,NULL,'Pending',26,NULL,5,NULL);
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `document_requirements`
--

LOCK TABLES `document_requirements` WRITE;
/*!40000 ALTER TABLE `document_requirements` DISABLE KEYS */;
INSERT INTO `document_requirements` VALUES (2,2,1,2),(3,2,2,1),(9,3,1,1),(10,1,1,2),(11,1,2,1),(12,1,4,1);
/*!40000 ALTER TABLE `document_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `documentrequests`
--

LOCK TABLES `documentrequests` WRITE;
/*!40000 ALTER TABLE `documentrequests` DISABLE KEYS */;
INSERT INTO `documentrequests` VALUES (5,'REQ_001','2017-08-27','Approved',2,1,2,NULL),(6,'REQ_002','2017-08-27','Cancelled',4,2,1,NULL),(7,'REQ_003','2017-08-27','Rejected',3,2,1,'Rejected becuase there is no chuchu'),(8,'REQ_004','2017-08-27','Rejected',5,1,2,'Rejected because he is not saying the truth'),(9,'REQ_005','2017-08-29','Rejected',5,2,2,'Rejected because he doesn\'t have any proof'),(10,'REQ_006','2017-08-29','Approved',2,1,1,NULL),(11,'REQ_007','2017-08-29','Approved',7,3,1,NULL),(12,'REQ_008','2017-08-29','Approved',7,1,1,NULL),(13,'REQ_009','2017-08-29','Approved',6,1,2,NULL),(14,'REQ_010','2017-08-30','Approved',8,2,8,NULL),(15,'REQ_011','2017-09-09','Approved',2,1,1,NULL),(16,'REQ_012','2017-09-16','Rejected',2,1,1,'Rejected because she is so beautiful'),(17,'REQ_013','2017-09-16','Rejected',2,1,2,'hjgj'),(20,'REQ_014','2017-09-24','Rejected',5,3,1,'Rejected because Bryan is not qualified to get this document');
/*!40000 ALTER TABLE `documentrequests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'DOC_001','Barangay Clearance','Clearance of Barangay','To whom it may concern:<br><br>This is to certify that {lastname}, {firstname} {middlename}, {scivilstatus}, and whose signature appears below is presently residing in {buildingnumber}, {unit}, {lot}, {street}.<br><br>This is to certify that {sgender:opt} has no dorigatory record filed and / or pending case against {sgender:eopt} before this office.<br><br>This certification is being issued upon the request of the above named person with {sgender:sopt} requirements.','Clearance',100,1,0),(2,'DOC_002','Certificate of Indigency','Indegency certification','This is to certify that..','Certification',100,1,0),(3,'DOC_003','Certificate of No Work','No work certification','This is to certify...','Certification',50,1,0);
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
INSERT INTO `facilities` VALUES (1,'FAC_001','Hipodromo Courts',NULL,1,0,2,100,200),(2,'FAC_002','Hipodromo Plaza',NULL,1,0,5,100,150),(4,'FAC_003','asdhakjsh','ajksdh',1,1,2,0.04,0.02);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `facilitytypes`
--

LOCK TABLES `facilitytypes` WRITE;
/*!40000 ALTER TABLE `facilitytypes` DISABLE KEYS */;
INSERT INTO `facilitytypes` VALUES (2,'Covered Court',1,0),(3,'Parks',1,0),(4,'Chapel',1,0),(5,'Plaza',1,0),(6,'asdasd',1,1),(7,'Audio Visual Rooms',1,0);
/*!40000 ALTER TABLE `facilitytypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `families`
--

LOCK TABLES `families` WRITE;
/*!40000 ALTER TABLE `families` DISABLE KEYS */;
INSERT INTO `families` VALUES (1,'FAM_001',4,'Fuellas Family','2017-08-22',0),(2,'FAM_002',5,'Illaga Family','2017-08-22',0),(3,'FAM_003',2,'asdas','2017-08-23',1),(4,'FAM_004',6,'Del Mundo Family','2017-08-29',0),(5,'FAM_005',8,'Perez','2017-08-30',0),(6,'FAM_006',5,'Illagas Family','2017-09-16',0);
/*!40000 ALTER TABLE `families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `familymembers`
--

LOCK TABLES `familymembers` WRITE;
/*!40000 ALTER TABLE `familymembers` DISABLE KEYS */;
INSERT INTO `familymembers` VALUES (4,2,5,'Grandfather',0),(9,1,2,'Son',0),(18,1,3,'Daughter',0),(20,1,4,'Self',0),(21,2,3,'Self',0),(22,4,6,'Self',0),(24,4,7,'Brother',0),(25,5,8,'Self',0),(26,2,6,'Self',0);
/*!40000 ALTER TABLE `familymembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `generaladdresses`
--

LOCK TABLES `generaladdresses` WRITE;
/*!40000 ALTER TABLE `generaladdresses` DISABLE KEYS */;
INSERT INTO `generaladdresses` VALUES (1,'Permanent Address',2,NULL,NULL,3,2,3,2),(2,'Permanent Address',3,NULL,NULL,3,2,3,2),(3,'Permanent Address',4,NULL,NULL,3,2,3,2),(4,'Permanent Address',5,NULL,NULL,5,3,5,3),(5,'Permanent Address',6,NULL,NULL,5,3,5,3),(6,'Current Address',7,NULL,NULL,1,1,1,1),(7,'Permanent Address',8,NULL,NULL,3,2,3,2);
/*!40000 ALTER TABLE `generaladdresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (3,2,'Edited a resident',2,NULL,NULL,NULL,NULL,NULL,NULL,'2017-09-24 14:02:44','Resident'),(4,2,'Edited a resident',3,NULL,NULL,NULL,NULL,NULL,NULL,'2017-09-24 14:03:41','Resident'),(5,2,'Requested a document',NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-09-24 14:59:29','Document'),(6,2,'Rejected a document request',NULL,NULL,16,NULL,NULL,NULL,NULL,'2017-09-24 15:20:42','Document'),(9,2,'Rescheduled a reservation',NULL,NULL,NULL,22,NULL,NULL,NULL,'2017-09-24 15:37:00','Reservation'),(10,2,'Reserved a facility',NULL,NULL,NULL,27,NULL,NULL,NULL,'2017-09-24 15:37:00','Reservation'),(11,2,'Cancelled a reservation',NULL,NULL,NULL,27,NULL,NULL,NULL,'2017-09-24 15:37:40','Reservation'),(12,2,'Registered a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:45:50','Business'),(13,2,'Edited a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:48:08','Business'),(14,2,'Deleted a business',NULL,NULL,NULL,NULL,NULL,NULL,13,'2017-09-24 15:48:27','Business'),(16,2,'Edited a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:03:58','Service'),(19,2,'Started a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:07:23','Service'),(20,2,'Finished a service',NULL,NULL,NULL,NULL,NULL,6,NULL,'2017-09-24 16:07:53','Service'),(21,2,'Deleted a service',NULL,NULL,NULL,NULL,NULL,7,NULL,'2017-09-24 16:08:10','Service'),(22,1,'Rejected a document request',NULL,NULL,20,NULL,NULL,NULL,NULL,'2017-09-24 17:15:08','Document'),(23,1,'Rejected a document request',NULL,NULL,17,NULL,NULL,NULL,NULL,'2017-09-24 17:44:25','Document');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'31',1,1,0),(2,'2',1,1,0),(3,'1A',2,1,0),(4,'1B',2,1,0),(5,'30',3,1,0),(6,'31',3,1,0);
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Ikaw lang talaga ang minahal mula noon. Di padin magbabago sayo hanggang ngayon. Ano mang panahon ako\'y maghihintay hindi babaling sa iba.',1,2,'2017-09-25 15:16:36',1),(3,'Sige na nga',2,1,'2017-09-25 18:50:53',1),(4,'Ang pogi mo marc',1,2,'2017-09-25 18:51:54',1),(5,'HAHAHAHAHAHAHA lam ko na yun',2,1,'2017-09-25 18:57:01',1),(6,'Ewan ko sayo hahahaa',1,2,'2017-09-25 19:12:58',1),(7,'Huyyy iapprove mo na yung request ni Bryan',2,1,'2017-09-25 19:57:20',1),(8,'Ok na na-accept ko na',1,2,'2017-09-25 20:02:40',1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (229,'2017_08_20_131145_create_buildings_table',0),(230,'2017_08_20_131145_create_buildingtypes_table',0),(231,'2017_08_20_131145_create_businesscategories_table',0),(232,'2017_08_20_131145_create_businesses_table',0),(233,'2017_08_20_131145_create_businessregistrations_table',0),(234,'2017_08_20_131145_create_collections_table',0),(235,'2017_08_20_131145_create_document_requirements_table',0),(236,'2017_08_20_131145_create_documentdetailrequests_table',0),(237,'2017_08_20_131145_create_documentheaderrequests_table',0),(238,'2017_08_20_131145_create_documents_table',0),(239,'2017_08_20_131145_create_employeeposition_table',0),(240,'2017_08_20_131145_create_employees_table',0),(241,'2017_08_20_131145_create_facilities_table',0),(242,'2017_08_20_131145_create_facilitytypes_table',0),(243,'2017_08_20_131145_create_families_table',0),(244,'2017_08_20_131145_create_familymembers_table',0),(245,'2017_08_20_131145_create_generaladdresses_table',0),(246,'2017_08_20_131145_create_lots_table',0),(247,'2017_08_20_131145_create_participants_table',0),(248,'2017_08_20_131145_create_people_table',0),(249,'2017_08_20_131145_create_requirements_table',0),(250,'2017_08_20_131145_create_reservations_table',0),(251,'2017_08_20_131145_create_residentaccountregistrations_table',0),(252,'2017_08_20_131145_create_residentaccounts_table',0),(253,'2017_08_20_131145_create_residentbackgrounds_table',0),(254,'2017_08_20_131145_create_residentregistrations_table',0),(255,'2017_08_20_131145_create_residents_table',0),(256,'2017_08_20_131145_create_services_table',0),(257,'2017_08_20_131145_create_servicesponsorships_table',0),(258,'2017_08_20_131145_create_servicetransactions_table',0),(259,'2017_08_20_131145_create_servicetypes_table',0),(260,'2017_08_20_131145_create_streets_table',0),(261,'2017_08_20_131145_create_sysutil_table',0),(262,'2017_08_20_131145_create_units_table',0),(263,'2017_08_20_131145_create_users_table',0),(264,'2017_08_20_131145_create_utilities_table',0),(265,'2017_08_20_131145_create_voters_table',0),(266,'2017_08_20_131151_add_foreign_keys_to_buildings_table',0),(267,'2017_08_20_131151_add_foreign_keys_to_businesses_table',0),(268,'2017_08_20_131151_add_foreign_keys_to_businessregistrations_table',0),(269,'2017_08_20_131151_add_foreign_keys_to_collections_table',0),(270,'2017_08_20_131151_add_foreign_keys_to_document_requirements_table',0),(271,'2017_08_20_131151_add_foreign_keys_to_documentdetailrequests_table',0),(272,'2017_08_20_131151_add_foreign_keys_to_documentheaderrequests_table',0),(273,'2017_08_20_131151_add_foreign_keys_to_employeeposition_table',0),(274,'2017_08_20_131151_add_foreign_keys_to_facilities_table',0),(275,'2017_08_20_131151_add_foreign_keys_to_families_table',0),(276,'2017_08_20_131151_add_foreign_keys_to_familymembers_table',0),(277,'2017_08_20_131151_add_foreign_keys_to_generaladdresses_table',0),(278,'2017_08_20_131151_add_foreign_keys_to_lots_table',0),(279,'2017_08_20_131151_add_foreign_keys_to_participants_table',0),(280,'2017_08_20_131151_add_foreign_keys_to_reservations_table',0),(281,'2017_08_20_131151_add_foreign_keys_to_residentaccountregistrations_table',0),(282,'2017_08_20_131151_add_foreign_keys_to_residentaccounts_table',0),(283,'2017_08_20_131151_add_foreign_keys_to_residentbackgrounds_table',0),(284,'2017_08_20_131151_add_foreign_keys_to_residentregistrations_table',0),(285,'2017_08_20_131151_add_foreign_keys_to_services_table',0),(286,'2017_08_20_131151_add_foreign_keys_to_servicesponsorships_table',0),(287,'2017_08_20_131151_add_foreign_keys_to_servicetransactions_table',0),(288,'2017_08_20_131151_add_foreign_keys_to_units_table',0),(289,'2017_08_20_131151_add_foreign_keys_to_voters_table',0),(290,'2017_08_24_122308_create_buildings_table',0),(291,'2017_08_24_122308_create_buildingtypes_table',0),(292,'2017_08_24_122308_create_businesscategories_table',0),(293,'2017_08_24_122308_create_businesses_table',0),(294,'2017_08_24_122308_create_businessregistrations_table',0),(295,'2017_08_24_122308_create_collections_table',0),(296,'2017_08_24_122308_create_document_requirements_table',0),(297,'2017_08_24_122308_create_documentrequests_table',0),(298,'2017_08_24_122308_create_documents_table',0),(299,'2017_08_24_122308_create_employeeposition_table',0),(300,'2017_08_24_122308_create_employees_table',0),(301,'2017_08_24_122308_create_facilities_table',0),(302,'2017_08_24_122308_create_facilitytypes_table',0),(303,'2017_08_24_122308_create_families_table',0),(304,'2017_08_24_122308_create_familymembers_table',0),(305,'2017_08_24_122308_create_generaladdresses_table',0),(306,'2017_08_24_122308_create_lots_table',0),(307,'2017_08_24_122308_create_participants_table',0),(308,'2017_08_24_122308_create_people_table',0),(309,'2017_08_24_122308_create_recipients_table',0),(310,'2017_08_24_122308_create_requirements_table',0),(311,'2017_08_24_122308_create_reservations_table',0),(312,'2017_08_24_122308_create_residentaccountregistrations_table',0),(313,'2017_08_24_122308_create_residentaccounts_table',0),(314,'2017_08_24_122308_create_residentbackgrounds_table',0),(315,'2017_08_24_122308_create_residentregistrations_table',0),(316,'2017_08_24_122308_create_residents_table',0),(317,'2017_08_24_122308_create_services_table',0),(318,'2017_08_24_122308_create_servicesponsorships_table',0),(319,'2017_08_24_122308_create_servicetransactions_table',0),(320,'2017_08_24_122308_create_servicetypes_table',0),(321,'2017_08_24_122308_create_streets_table',0),(322,'2017_08_24_122308_create_sysutil_table',0),(323,'2017_08_24_122308_create_units_table',0),(324,'2017_08_24_122308_create_users_table',0),(325,'2017_08_24_122308_create_utilities_table',0),(326,'2017_08_24_122308_create_voters_table',0),(327,'2017_08_24_122313_add_foreign_keys_to_buildings_table',0),(328,'2017_08_24_122313_add_foreign_keys_to_businesses_table',0),(329,'2017_08_24_122313_add_foreign_keys_to_businessregistrations_table',0),(330,'2017_08_24_122313_add_foreign_keys_to_collections_table',0),(331,'2017_08_24_122313_add_foreign_keys_to_document_requirements_table',0),(332,'2017_08_24_122313_add_foreign_keys_to_documentrequests_table',0),(333,'2017_08_24_122313_add_foreign_keys_to_employeeposition_table',0),(334,'2017_08_24_122313_add_foreign_keys_to_facilities_table',0),(335,'2017_08_24_122313_add_foreign_keys_to_families_table',0),(336,'2017_08_24_122313_add_foreign_keys_to_familymembers_table',0),(337,'2017_08_24_122313_add_foreign_keys_to_generaladdresses_table',0),(338,'2017_08_24_122313_add_foreign_keys_to_lots_table',0),(339,'2017_08_24_122313_add_foreign_keys_to_participants_table',0),(340,'2017_08_24_122313_add_foreign_keys_to_reservations_table',0),(341,'2017_08_24_122313_add_foreign_keys_to_residentaccountregistrations_table',0),(342,'2017_08_24_122313_add_foreign_keys_to_residentaccounts_table',0),(343,'2017_08_24_122313_add_foreign_keys_to_residentbackgrounds_table',0),(344,'2017_08_24_122313_add_foreign_keys_to_residentregistrations_table',0),(345,'2017_08_24_122313_add_foreign_keys_to_services_table',0),(346,'2017_08_24_122313_add_foreign_keys_to_servicesponsorships_table',0),(347,'2017_08_24_122313_add_foreign_keys_to_servicetransactions_table',0),(348,'2017_08_24_122313_add_foreign_keys_to_units_table',0),(349,'2017_08_24_122313_add_foreign_keys_to_voters_table',0),(350,'2017_08_25_154702_create_buildings_table',0),(351,'2017_08_25_154702_create_buildingtypes_table',0),(352,'2017_08_25_154702_create_businesscategories_table',0),(353,'2017_08_25_154702_create_businesses_table',0),(354,'2017_08_25_154702_create_businessregistrations_table',0),(355,'2017_08_25_154702_create_collections_table',0),(356,'2017_08_25_154702_create_document_requirements_table',0),(357,'2017_08_25_154702_create_documentrequests_table',0),(358,'2017_08_25_154702_create_documents_table',0),(359,'2017_08_25_154702_create_employeeposition_table',0),(360,'2017_08_25_154702_create_employees_table',0),(361,'2017_08_25_154702_create_facilities_table',0),(362,'2017_08_25_154702_create_facilitytypes_table',0),(363,'2017_08_25_154702_create_families_table',0),(364,'2017_08_25_154702_create_familymembers_table',0),(365,'2017_08_25_154702_create_generaladdresses_table',0),(366,'2017_08_25_154702_create_lots_table',0),(367,'2017_08_25_154702_create_participants_table',0),(368,'2017_08_25_154702_create_partrecipients_table',0),(369,'2017_08_25_154702_create_people_table',0),(370,'2017_08_25_154702_create_recipients_table',0),(371,'2017_08_25_154702_create_requirements_table',0),(372,'2017_08_25_154702_create_reservations_table',0),(373,'2017_08_25_154702_create_residentaccountregistrations_table',0),(374,'2017_08_25_154702_create_residentaccounts_table',0),(375,'2017_08_25_154702_create_residentbackgrounds_table',0),(376,'2017_08_25_154702_create_residentregistrations_table',0),(377,'2017_08_25_154702_create_residents_table',0),(378,'2017_08_25_154702_create_services_table',0),(379,'2017_08_25_154702_create_servicesponsorships_table',0),(380,'2017_08_25_154702_create_servicetransactions_table',0),(381,'2017_08_25_154702_create_servicetypes_table',0),(382,'2017_08_25_154702_create_streets_table',0),(383,'2017_08_25_154702_create_sysutil_table',0),(384,'2017_08_25_154702_create_units_table',0),(385,'2017_08_25_154702_create_users_table',0),(386,'2017_08_25_154702_create_utilities_table',0),(387,'2017_08_25_154702_create_voters_table',0),(388,'2017_08_25_154711_add_foreign_keys_to_buildings_table',0),(389,'2017_08_25_154711_add_foreign_keys_to_businesses_table',0),(390,'2017_08_25_154711_add_foreign_keys_to_businessregistrations_table',0),(391,'2017_08_25_154711_add_foreign_keys_to_collections_table',0),(392,'2017_08_25_154711_add_foreign_keys_to_document_requirements_table',0),(393,'2017_08_25_154711_add_foreign_keys_to_documentrequests_table',0),(394,'2017_08_25_154711_add_foreign_keys_to_employeeposition_table',0),(395,'2017_08_25_154711_add_foreign_keys_to_facilities_table',0),(396,'2017_08_25_154711_add_foreign_keys_to_families_table',0),(397,'2017_08_25_154711_add_foreign_keys_to_familymembers_table',0),(398,'2017_08_25_154711_add_foreign_keys_to_generaladdresses_table',0),(399,'2017_08_25_154711_add_foreign_keys_to_lots_table',0),(400,'2017_08_25_154711_add_foreign_keys_to_participants_table',0),(401,'2017_08_25_154711_add_foreign_keys_to_partrecipients_table',0),(402,'2017_08_25_154711_add_foreign_keys_to_reservations_table',0),(403,'2017_08_25_154711_add_foreign_keys_to_residentaccountregistrations_table',0),(404,'2017_08_25_154711_add_foreign_keys_to_residentaccounts_table',0),(405,'2017_08_25_154711_add_foreign_keys_to_residentbackgrounds_table',0),(406,'2017_08_25_154711_add_foreign_keys_to_residentregistrations_table',0),(407,'2017_08_25_154711_add_foreign_keys_to_services_table',0),(408,'2017_08_25_154711_add_foreign_keys_to_servicesponsorships_table',0),(409,'2017_08_25_154711_add_foreign_keys_to_servicetransactions_table',0),(410,'2017_08_25_154711_add_foreign_keys_to_units_table',0),(411,'2017_08_25_154711_add_foreign_keys_to_voters_table',0),(412,'2017_08_27_064352_create_buildings_table',0),(413,'2017_08_27_064352_create_buildingtypes_table',0),(414,'2017_08_27_064352_create_businesscategories_table',0),(415,'2017_08_27_064352_create_businesses_table',0),(416,'2017_08_27_064352_create_businessregistrations_table',0),(417,'2017_08_27_064352_create_collections_table',0),(418,'2017_08_27_064352_create_document_requirements_table',0),(419,'2017_08_27_064352_create_documentrequests_table',0),(420,'2017_08_27_064352_create_documents_table',0),(421,'2017_08_27_064352_create_employeeposition_table',0),(422,'2017_08_27_064352_create_employees_table',0),(423,'2017_08_27_064352_create_facilities_table',0),(424,'2017_08_27_064352_create_facilitytypes_table',0),(425,'2017_08_27_064352_create_families_table',0),(426,'2017_08_27_064352_create_familymembers_table',0),(427,'2017_08_27_064352_create_generaladdresses_table',0),(428,'2017_08_27_064352_create_lots_table',0),(429,'2017_08_27_064352_create_participants_table',0),(430,'2017_08_27_064352_create_partrecipients_table',0),(431,'2017_08_27_064352_create_people_table',0),(432,'2017_08_27_064352_create_recipients_table',0),(433,'2017_08_27_064352_create_requestrequirements_table',0),(434,'2017_08_27_064352_create_requirements_table',0),(435,'2017_08_27_064352_create_reservations_table',0),(436,'2017_08_27_064352_create_residentaccountregistrations_table',0),(437,'2017_08_27_064352_create_residentaccounts_table',0),(438,'2017_08_27_064352_create_residentbackgrounds_table',0),(439,'2017_08_27_064352_create_residentregistrations_table',0),(440,'2017_08_27_064352_create_residents_table',0),(441,'2017_08_27_064352_create_services_table',0),(442,'2017_08_27_064352_create_servicesponsorships_table',0),(443,'2017_08_27_064352_create_servicetransactions_table',0),(444,'2017_08_27_064352_create_servicetypes_table',0),(445,'2017_08_27_064352_create_streets_table',0),(446,'2017_08_27_064352_create_sysutil_table',0),(447,'2017_08_27_064352_create_units_table',0),(448,'2017_08_27_064352_create_users_table',0),(449,'2017_08_27_064352_create_utilities_table',0),(450,'2017_08_27_064352_create_voters_table',0),(451,'2017_08_27_064358_add_foreign_keys_to_buildings_table',0),(452,'2017_08_27_064358_add_foreign_keys_to_businesses_table',0),(453,'2017_08_27_064358_add_foreign_keys_to_businessregistrations_table',0),(454,'2017_08_27_064358_add_foreign_keys_to_collections_table',0),(455,'2017_08_27_064358_add_foreign_keys_to_document_requirements_table',0),(456,'2017_08_27_064358_add_foreign_keys_to_documentrequests_table',0),(457,'2017_08_27_064358_add_foreign_keys_to_employeeposition_table',0),(458,'2017_08_27_064358_add_foreign_keys_to_facilities_table',0),(459,'2017_08_27_064358_add_foreign_keys_to_families_table',0),(460,'2017_08_27_064358_add_foreign_keys_to_familymembers_table',0),(461,'2017_08_27_064358_add_foreign_keys_to_generaladdresses_table',0),(462,'2017_08_27_064358_add_foreign_keys_to_lots_table',0),(463,'2017_08_27_064358_add_foreign_keys_to_participants_table',0),(464,'2017_08_27_064358_add_foreign_keys_to_partrecipients_table',0),(465,'2017_08_27_064358_add_foreign_keys_to_requestrequirements_table',0),(466,'2017_08_27_064358_add_foreign_keys_to_reservations_table',0),(467,'2017_08_27_064358_add_foreign_keys_to_residentaccountregistrations_table',0),(468,'2017_08_27_064358_add_foreign_keys_to_residentaccounts_table',0),(469,'2017_08_27_064358_add_foreign_keys_to_residentbackgrounds_table',0),(470,'2017_08_27_064358_add_foreign_keys_to_residentregistrations_table',0),(471,'2017_08_27_064358_add_foreign_keys_to_services_table',0),(472,'2017_08_27_064358_add_foreign_keys_to_servicesponsorships_table',0),(473,'2017_08_27_064358_add_foreign_keys_to_servicetransactions_table',0),(474,'2017_08_27_064358_add_foreign_keys_to_units_table',0),(475,'2017_08_27_064358_add_foreign_keys_to_voters_table',0),(476,'2017_09_17_155408_create_buildings_table',0),(477,'2017_09_17_155408_create_buildingtypes_table',0),(478,'2017_09_17_155408_create_businesscategories_table',0),(479,'2017_09_17_155408_create_businesses_table',0),(480,'2017_09_17_155408_create_businessregistrations_table',0),(481,'2017_09_17_155408_create_collections_table',0),(482,'2017_09_17_155408_create_document_requirements_table',0),(483,'2017_09_17_155408_create_documentrequests_table',0),(484,'2017_09_17_155408_create_documents_table',0),(485,'2017_09_17_155408_create_employeeposition_table',0),(486,'2017_09_17_155408_create_employees_table',0),(487,'2017_09_17_155408_create_facilities_table',0),(488,'2017_09_17_155408_create_facilitytypes_table',0),(489,'2017_09_17_155408_create_families_table',0),(490,'2017_09_17_155408_create_familymembers_table',0),(491,'2017_09_17_155408_create_generaladdresses_table',0),(492,'2017_09_17_155408_create_lots_table',0),(493,'2017_09_17_155408_create_participants_table',0),(494,'2017_09_17_155408_create_partrecipients_table',0),(495,'2017_09_17_155408_create_people_table',0),(496,'2017_09_17_155408_create_recipients_table',0),(497,'2017_09_17_155408_create_requestrequirements_table',0),(498,'2017_09_17_155408_create_requirements_table',0),(499,'2017_09_17_155408_create_reservations_table',0),(500,'2017_09_17_155408_create_residentaccountregistrations_table',0),(501,'2017_09_17_155408_create_residentaccounts_table',0),(502,'2017_09_17_155408_create_residentbackgrounds_table',0),(503,'2017_09_17_155408_create_residentregistrations_table',0),(504,'2017_09_17_155408_create_residents_table',0),(505,'2017_09_17_155408_create_services_table',0),(506,'2017_09_17_155408_create_servicesponsorships_table',0),(507,'2017_09_17_155408_create_servicetransactions_table',0),(508,'2017_09_17_155408_create_servicetypes_table',0),(509,'2017_09_17_155408_create_streets_table',0),(510,'2017_09_17_155408_create_sysutil_table',0),(511,'2017_09_17_155408_create_units_table',0),(512,'2017_09_17_155408_create_users_table',0),(513,'2017_09_17_155408_create_utilities_table',0),(514,'2017_09_17_155408_create_voters_table',0),(515,'2017_09_17_155416_add_foreign_keys_to_buildings_table',0),(516,'2017_09_17_155416_add_foreign_keys_to_businesses_table',0),(517,'2017_09_17_155416_add_foreign_keys_to_businessregistrations_table',0),(518,'2017_09_17_155416_add_foreign_keys_to_collections_table',0),(519,'2017_09_17_155416_add_foreign_keys_to_document_requirements_table',0),(520,'2017_09_17_155416_add_foreign_keys_to_documentrequests_table',0),(521,'2017_09_17_155416_add_foreign_keys_to_employeeposition_table',0),(522,'2017_09_17_155416_add_foreign_keys_to_facilities_table',0),(523,'2017_09_17_155416_add_foreign_keys_to_families_table',0),(524,'2017_09_17_155416_add_foreign_keys_to_familymembers_table',0),(525,'2017_09_17_155416_add_foreign_keys_to_generaladdresses_table',0),(526,'2017_09_17_155416_add_foreign_keys_to_lots_table',0),(527,'2017_09_17_155416_add_foreign_keys_to_participants_table',0),(528,'2017_09_17_155416_add_foreign_keys_to_partrecipients_table',0),(529,'2017_09_17_155416_add_foreign_keys_to_requestrequirements_table',0),(530,'2017_09_17_155416_add_foreign_keys_to_reservations_table',0),(531,'2017_09_17_155416_add_foreign_keys_to_residentaccountregistrations_table',0),(532,'2017_09_17_155416_add_foreign_keys_to_residentaccounts_table',0),(533,'2017_09_17_155416_add_foreign_keys_to_residentbackgrounds_table',0),(534,'2017_09_17_155416_add_foreign_keys_to_residentregistrations_table',0),(535,'2017_09_17_155416_add_foreign_keys_to_services_table',0),(536,'2017_09_17_155416_add_foreign_keys_to_servicesponsorships_table',0),(537,'2017_09_17_155416_add_foreign_keys_to_servicetransactions_table',0),(538,'2017_09_17_155416_add_foreign_keys_to_units_table',0),(539,'2017_09_17_155416_add_foreign_keys_to_voters_table',0),(540,'2017_09_18_065430_create_buildings_table',0),(541,'2017_09_18_065430_create_buildingtypes_table',0),(542,'2017_09_18_065430_create_businesscategories_table',0),(543,'2017_09_18_065430_create_businesses_table',0),(544,'2017_09_18_065430_create_businessregistrations_table',0),(545,'2017_09_18_065430_create_collections_table',0),(546,'2017_09_18_065430_create_document_requirements_table',0),(547,'2017_09_18_065430_create_documentrequests_table',0),(548,'2017_09_18_065430_create_documents_table',0),(549,'2017_09_18_065430_create_employeeposition_table',0),(550,'2017_09_18_065430_create_employees_table',0),(551,'2017_09_18_065430_create_facilities_table',0),(552,'2017_09_18_065430_create_facilitytypes_table',0),(553,'2017_09_18_065430_create_families_table',0),(554,'2017_09_18_065430_create_familymembers_table',0),(555,'2017_09_18_065430_create_generaladdresses_table',0),(556,'2017_09_18_065430_create_lots_table',0),(557,'2017_09_18_065430_create_participants_table',0),(558,'2017_09_18_065430_create_partrecipients_table',0),(559,'2017_09_18_065430_create_people_table',0),(560,'2017_09_18_065430_create_recipients_table',0),(561,'2017_09_18_065430_create_requestrequirements_table',0),(562,'2017_09_18_065430_create_requirements_table',0),(563,'2017_09_18_065430_create_reservations_table',0),(564,'2017_09_18_065430_create_residentaccountregistrations_table',0),(565,'2017_09_18_065430_create_residentaccounts_table',0),(566,'2017_09_18_065430_create_residentbackgrounds_table',0),(567,'2017_09_18_065430_create_residentregistrations_table',0),(568,'2017_09_18_065430_create_residents_table',0),(569,'2017_09_18_065430_create_services_table',0),(570,'2017_09_18_065430_create_servicesponsorships_table',0),(571,'2017_09_18_065430_create_servicetransactions_table',0),(572,'2017_09_18_065430_create_servicetypes_table',0),(573,'2017_09_18_065430_create_streets_table',0),(574,'2017_09_18_065430_create_sysutil_table',0),(575,'2017_09_18_065430_create_units_table',0),(576,'2017_09_18_065430_create_users_table',0),(577,'2017_09_18_065430_create_utilities_table',0),(578,'2017_09_18_065430_create_voters_table',0),(579,'2017_09_18_065438_add_foreign_keys_to_buildings_table',0),(580,'2017_09_18_065438_add_foreign_keys_to_businesses_table',0),(581,'2017_09_18_065438_add_foreign_keys_to_businessregistrations_table',0),(582,'2017_09_18_065438_add_foreign_keys_to_collections_table',0),(583,'2017_09_18_065438_add_foreign_keys_to_document_requirements_table',0),(584,'2017_09_18_065438_add_foreign_keys_to_documentrequests_table',0),(585,'2017_09_18_065438_add_foreign_keys_to_employeeposition_table',0),(586,'2017_09_18_065438_add_foreign_keys_to_facilities_table',0),(587,'2017_09_18_065438_add_foreign_keys_to_families_table',0),(588,'2017_09_18_065438_add_foreign_keys_to_familymembers_table',0),(589,'2017_09_18_065438_add_foreign_keys_to_generaladdresses_table',0),(590,'2017_09_18_065438_add_foreign_keys_to_lots_table',0),(591,'2017_09_18_065438_add_foreign_keys_to_participants_table',0),(592,'2017_09_18_065438_add_foreign_keys_to_partrecipients_table',0),(593,'2017_09_18_065438_add_foreign_keys_to_requestrequirements_table',0),(594,'2017_09_18_065438_add_foreign_keys_to_reservations_table',0),(595,'2017_09_18_065438_add_foreign_keys_to_residentaccountregistrations_table',0),(596,'2017_09_18_065438_add_foreign_keys_to_residentaccounts_table',0),(597,'2017_09_18_065438_add_foreign_keys_to_residentbackgrounds_table',0),(598,'2017_09_18_065438_add_foreign_keys_to_residentregistrations_table',0),(599,'2017_09_18_065438_add_foreign_keys_to_services_table',0),(600,'2017_09_18_065438_add_foreign_keys_to_servicesponsorships_table',0),(601,'2017_09_18_065438_add_foreign_keys_to_servicetransactions_table',0),(602,'2017_09_18_065438_add_foreign_keys_to_units_table',0),(603,'2017_09_18_065438_add_foreign_keys_to_voters_table',0),(604,'2017_09_20_030415_create_buildings_table',0),(605,'2017_09_20_030415_create_buildingtypes_table',0),(606,'2017_09_20_030415_create_businesscategories_table',0),(607,'2017_09_20_030415_create_businesses_table',0),(608,'2017_09_20_030415_create_businessregistrations_table',0),(609,'2017_09_20_030415_create_collections_table',0),(610,'2017_09_20_030415_create_document_requirements_table',0),(611,'2017_09_20_030415_create_documentrequests_table',0),(612,'2017_09_20_030415_create_documents_table',0),(613,'2017_09_20_030415_create_employeeposition_table',0),(614,'2017_09_20_030415_create_employees_table',0),(615,'2017_09_20_030415_create_facilities_table',0),(616,'2017_09_20_030415_create_facilitytypes_table',0),(617,'2017_09_20_030415_create_families_table',0),(618,'2017_09_20_030415_create_familymembers_table',0),(619,'2017_09_20_030415_create_generaladdresses_table',0),(620,'2017_09_20_030415_create_lots_table',0),(621,'2017_09_20_030415_create_messages_table',0),(622,'2017_09_20_030415_create_participants_table',0),(623,'2017_09_20_030415_create_partrecipients_table',0),(624,'2017_09_20_030415_create_people_table',0),(625,'2017_09_20_030415_create_recipients_table',0),(626,'2017_09_20_030415_create_requestrequirements_table',0),(627,'2017_09_20_030415_create_requirements_table',0),(628,'2017_09_20_030415_create_reservations_table',0),(629,'2017_09_20_030415_create_residentaccountregistrations_table',0),(630,'2017_09_20_030415_create_residentaccounts_table',0),(631,'2017_09_20_030415_create_residentbackgrounds_table',0),(632,'2017_09_20_030415_create_residentregistrations_table',0),(633,'2017_09_20_030415_create_residents_table',0),(634,'2017_09_20_030415_create_services_table',0),(635,'2017_09_20_030415_create_servicesponsorships_table',0),(636,'2017_09_20_030415_create_servicetransactions_table',0),(637,'2017_09_20_030415_create_servicetypes_table',0),(638,'2017_09_20_030415_create_streets_table',0),(639,'2017_09_20_030415_create_sysutil_table',0),(640,'2017_09_20_030415_create_units_table',0),(641,'2017_09_20_030415_create_users_table',0),(642,'2017_09_20_030415_create_utilities_table',0),(643,'2017_09_20_030415_create_voters_table',0),(644,'2017_09_20_030424_add_foreign_keys_to_buildings_table',0),(645,'2017_09_20_030424_add_foreign_keys_to_businesses_table',0),(646,'2017_09_20_030424_add_foreign_keys_to_businessregistrations_table',0),(647,'2017_09_20_030424_add_foreign_keys_to_collections_table',0),(648,'2017_09_20_030424_add_foreign_keys_to_document_requirements_table',0),(649,'2017_09_20_030424_add_foreign_keys_to_documentrequests_table',0),(650,'2017_09_20_030424_add_foreign_keys_to_employeeposition_table',0),(651,'2017_09_20_030424_add_foreign_keys_to_facilities_table',0),(652,'2017_09_20_030424_add_foreign_keys_to_families_table',0),(653,'2017_09_20_030424_add_foreign_keys_to_familymembers_table',0),(654,'2017_09_20_030424_add_foreign_keys_to_generaladdresses_table',0),(655,'2017_09_20_030424_add_foreign_keys_to_lots_table',0),(656,'2017_09_20_030424_add_foreign_keys_to_messages_table',0),(657,'2017_09_20_030424_add_foreign_keys_to_participants_table',0),(658,'2017_09_20_030424_add_foreign_keys_to_partrecipients_table',0),(659,'2017_09_20_030424_add_foreign_keys_to_requestrequirements_table',0),(660,'2017_09_20_030424_add_foreign_keys_to_reservations_table',0),(661,'2017_09_20_030424_add_foreign_keys_to_residentaccountregistrations_table',0),(662,'2017_09_20_030424_add_foreign_keys_to_residentaccounts_table',0),(663,'2017_09_20_030424_add_foreign_keys_to_residentbackgrounds_table',0),(664,'2017_09_20_030424_add_foreign_keys_to_residentregistrations_table',0),(665,'2017_09_20_030424_add_foreign_keys_to_services_table',0),(666,'2017_09_20_030424_add_foreign_keys_to_servicesponsorships_table',0),(667,'2017_09_20_030424_add_foreign_keys_to_servicetransactions_table',0),(668,'2017_09_20_030424_add_foreign_keys_to_units_table',0),(669,'2017_09_20_030424_add_foreign_keys_to_voters_table',0),(670,'2017_09_20_032022_create_buildings_table',0),(671,'2017_09_20_032022_create_buildingtypes_table',0),(672,'2017_09_20_032022_create_businesscategories_table',0),(673,'2017_09_20_032022_create_businesses_table',0),(674,'2017_09_20_032022_create_businessregistrations_table',0),(675,'2017_09_20_032022_create_collections_table',0),(676,'2017_09_20_032022_create_document_requirements_table',0),(677,'2017_09_20_032022_create_documentrequests_table',0),(678,'2017_09_20_032022_create_documents_table',0),(679,'2017_09_20_032022_create_employeeposition_table',0),(680,'2017_09_20_032022_create_employees_table',0),(681,'2017_09_20_032022_create_facilities_table',0),(682,'2017_09_20_032022_create_facilitytypes_table',0),(683,'2017_09_20_032022_create_families_table',0),(684,'2017_09_20_032022_create_familymembers_table',0),(685,'2017_09_20_032022_create_generaladdresses_table',0),(686,'2017_09_20_032022_create_lots_table',0),(687,'2017_09_20_032022_create_messages_table',0),(688,'2017_09_20_032022_create_participants_table',0),(689,'2017_09_20_032022_create_partrecipients_table',0),(690,'2017_09_20_032022_create_people_table',0),(691,'2017_09_20_032022_create_recipients_table',0),(692,'2017_09_20_032022_create_requestrequirements_table',0),(693,'2017_09_20_032022_create_requirements_table',0),(694,'2017_09_20_032022_create_reservations_table',0),(695,'2017_09_20_032022_create_residentaccountregistrations_table',0),(696,'2017_09_20_032022_create_residentaccounts_table',0),(697,'2017_09_20_032022_create_residentbackgrounds_table',0),(698,'2017_09_20_032022_create_residentregistrations_table',0),(699,'2017_09_20_032022_create_residents_table',0),(700,'2017_09_20_032022_create_services_table',0),(701,'2017_09_20_032022_create_servicesponsorships_table',0),(702,'2017_09_20_032022_create_servicetransactions_table',0),(703,'2017_09_20_032022_create_servicetypes_table',0),(704,'2017_09_20_032022_create_streets_table',0),(705,'2017_09_20_032022_create_sysutil_table',0),(706,'2017_09_20_032022_create_units_table',0),(707,'2017_09_20_032022_create_users_table',0),(708,'2017_09_20_032022_create_utilities_table',0),(709,'2017_09_20_032022_create_voters_table',0),(710,'2017_09_20_032044_add_foreign_keys_to_buildings_table',0),(711,'2017_09_20_032044_add_foreign_keys_to_businesses_table',0),(712,'2017_09_20_032044_add_foreign_keys_to_businessregistrations_table',0),(713,'2017_09_20_032044_add_foreign_keys_to_collections_table',0),(714,'2017_09_20_032044_add_foreign_keys_to_document_requirements_table',0),(715,'2017_09_20_032044_add_foreign_keys_to_documentrequests_table',0),(716,'2017_09_20_032044_add_foreign_keys_to_employeeposition_table',0),(717,'2017_09_20_032044_add_foreign_keys_to_facilities_table',0),(718,'2017_09_20_032044_add_foreign_keys_to_families_table',0),(719,'2017_09_20_032044_add_foreign_keys_to_familymembers_table',0),(720,'2017_09_20_032044_add_foreign_keys_to_generaladdresses_table',0),(721,'2017_09_20_032044_add_foreign_keys_to_lots_table',0),(722,'2017_09_20_032044_add_foreign_keys_to_messages_table',0),(723,'2017_09_20_032044_add_foreign_keys_to_participants_table',0),(724,'2017_09_20_032044_add_foreign_keys_to_partrecipients_table',0),(725,'2017_09_20_032044_add_foreign_keys_to_requestrequirements_table',0),(726,'2017_09_20_032044_add_foreign_keys_to_reservations_table',0),(727,'2017_09_20_032044_add_foreign_keys_to_residentaccountregistrations_table',0),(728,'2017_09_20_032044_add_foreign_keys_to_residentaccounts_table',0),(729,'2017_09_20_032044_add_foreign_keys_to_residentbackgrounds_table',0),(730,'2017_09_20_032044_add_foreign_keys_to_residentregistrations_table',0),(731,'2017_09_20_032044_add_foreign_keys_to_services_table',0),(732,'2017_09_20_032044_add_foreign_keys_to_servicesponsorships_table',0),(733,'2017_09_20_032044_add_foreign_keys_to_servicetransactions_table',0),(734,'2017_09_20_032044_add_foreign_keys_to_units_table',0),(735,'2017_09_20_032044_add_foreign_keys_to_voters_table',0),(736,'2017_09_20_161610_create_buildings_table',0),(737,'2017_09_20_161610_create_buildingtypes_table',0),(738,'2017_09_20_161610_create_businesscategories_table',0),(739,'2017_09_20_161610_create_businesses_table',0),(740,'2017_09_20_161610_create_businessregistrations_table',0),(741,'2017_09_20_161610_create_collections_table',0),(742,'2017_09_20_161610_create_document_requirements_table',0),(743,'2017_09_20_161610_create_documentrequests_table',0),(744,'2017_09_20_161610_create_documents_table',0),(745,'2017_09_20_161610_create_employeeposition_table',0),(746,'2017_09_20_161610_create_employees_table',0),(747,'2017_09_20_161610_create_facilities_table',0),(748,'2017_09_20_161610_create_facilitytypes_table',0),(749,'2017_09_20_161610_create_families_table',0),(750,'2017_09_20_161610_create_familymembers_table',0),(751,'2017_09_20_161610_create_generaladdresses_table',0),(752,'2017_09_20_161610_create_lots_table',0),(753,'2017_09_20_161610_create_messages_table',0),(754,'2017_09_20_161610_create_participants_table',0),(755,'2017_09_20_161610_create_partrecipients_table',0),(756,'2017_09_20_161610_create_people_table',0),(757,'2017_09_20_161610_create_recipients_table',0),(758,'2017_09_20_161610_create_requestrequirements_table',0),(759,'2017_09_20_161610_create_requirements_table',0),(760,'2017_09_20_161610_create_reservations_table',0),(761,'2017_09_20_161610_create_residentaccountregistrations_table',0),(762,'2017_09_20_161610_create_residentaccounts_table',0),(763,'2017_09_20_161610_create_residentbackgrounds_table',0),(764,'2017_09_20_161610_create_residentregistrations_table',0),(765,'2017_09_20_161610_create_residents_table',0),(766,'2017_09_20_161610_create_services_table',0),(767,'2017_09_20_161610_create_servicesponsorships_table',0),(768,'2017_09_20_161610_create_servicetransactions_table',0),(769,'2017_09_20_161610_create_servicetypes_table',0),(770,'2017_09_20_161610_create_streets_table',0),(771,'2017_09_20_161610_create_sysutil_table',0),(772,'2017_09_20_161610_create_units_table',0),(773,'2017_09_20_161610_create_users_table',0),(774,'2017_09_20_161610_create_utilities_table',0),(775,'2017_09_20_161610_create_voters_table',0),(776,'2017_09_20_161617_add_foreign_keys_to_buildings_table',0),(777,'2017_09_20_161617_add_foreign_keys_to_businesses_table',0),(778,'2017_09_20_161617_add_foreign_keys_to_businessregistrations_table',0),(779,'2017_09_20_161617_add_foreign_keys_to_collections_table',0),(780,'2017_09_20_161617_add_foreign_keys_to_document_requirements_table',0),(781,'2017_09_20_161617_add_foreign_keys_to_documentrequests_table',0),(782,'2017_09_20_161617_add_foreign_keys_to_employeeposition_table',0),(783,'2017_09_20_161617_add_foreign_keys_to_facilities_table',0),(784,'2017_09_20_161617_add_foreign_keys_to_families_table',0),(785,'2017_09_20_161617_add_foreign_keys_to_familymembers_table',0),(786,'2017_09_20_161617_add_foreign_keys_to_generaladdresses_table',0),(787,'2017_09_20_161617_add_foreign_keys_to_lots_table',0),(788,'2017_09_20_161617_add_foreign_keys_to_messages_table',0),(789,'2017_09_20_161617_add_foreign_keys_to_participants_table',0),(790,'2017_09_20_161617_add_foreign_keys_to_partrecipients_table',0),(791,'2017_09_20_161617_add_foreign_keys_to_requestrequirements_table',0),(792,'2017_09_20_161617_add_foreign_keys_to_reservations_table',0),(793,'2017_09_20_161617_add_foreign_keys_to_residentaccountregistrations_table',0),(794,'2017_09_20_161617_add_foreign_keys_to_residentaccounts_table',0),(795,'2017_09_20_161617_add_foreign_keys_to_residentbackgrounds_table',0),(796,'2017_09_20_161617_add_foreign_keys_to_residentregistrations_table',0),(797,'2017_09_20_161617_add_foreign_keys_to_services_table',0),(798,'2017_09_20_161617_add_foreign_keys_to_servicesponsorships_table',0),(799,'2017_09_20_161617_add_foreign_keys_to_servicetransactions_table',0),(800,'2017_09_20_161617_add_foreign_keys_to_units_table',0),(801,'2017_09_20_161617_add_foreign_keys_to_voters_table',0),(802,'2017_09_20_164901_create_buildings_table',0),(803,'2017_09_20_164901_create_buildingtypes_table',0),(804,'2017_09_20_164901_create_businesscategories_table',0),(805,'2017_09_20_164901_create_businesses_table',0),(806,'2017_09_20_164901_create_businessregistrations_table',0),(807,'2017_09_20_164901_create_collections_table',0),(808,'2017_09_20_164901_create_document_requirements_table',0),(809,'2017_09_20_164901_create_documentrequests_table',0),(810,'2017_09_20_164901_create_documents_table',0),(811,'2017_09_20_164901_create_employeeposition_table',0),(812,'2017_09_20_164901_create_employees_table',0),(813,'2017_09_20_164901_create_facilities_table',0),(814,'2017_09_20_164901_create_facilitytypes_table',0),(815,'2017_09_20_164901_create_families_table',0),(816,'2017_09_20_164901_create_familymembers_table',0),(817,'2017_09_20_164901_create_generaladdresses_table',0),(818,'2017_09_20_164901_create_lots_table',0),(819,'2017_09_20_164901_create_messages_table',0),(820,'2017_09_20_164901_create_participants_table',0),(821,'2017_09_20_164901_create_partrecipients_table',0),(822,'2017_09_20_164901_create_people_table',0),(823,'2017_09_20_164901_create_recipients_table',0),(824,'2017_09_20_164901_create_requestrequirements_table',0),(825,'2017_09_20_164901_create_requirements_table',0),(826,'2017_09_20_164901_create_reservations_table',0),(827,'2017_09_20_164901_create_residentaccountregistrations_table',0),(828,'2017_09_20_164901_create_residentaccounts_table',0),(829,'2017_09_20_164901_create_residentbackgrounds_table',0),(830,'2017_09_20_164901_create_residentregistrations_table',0),(831,'2017_09_20_164901_create_residents_table',0),(832,'2017_09_20_164901_create_services_table',0),(833,'2017_09_20_164901_create_servicesponsorships_table',0),(834,'2017_09_20_164901_create_servicetransactions_table',0),(835,'2017_09_20_164901_create_servicetypes_table',0),(836,'2017_09_20_164901_create_streets_table',0),(837,'2017_09_20_164901_create_sysutil_table',0),(838,'2017_09_20_164901_create_units_table',0),(839,'2017_09_20_164901_create_users_table',0),(840,'2017_09_20_164901_create_utilities_table',0),(841,'2017_09_20_164901_create_voters_table',0),(842,'2017_09_20_164907_add_foreign_keys_to_buildings_table',0),(843,'2017_09_20_164907_add_foreign_keys_to_businesses_table',0),(844,'2017_09_20_164907_add_foreign_keys_to_businessregistrations_table',0),(845,'2017_09_20_164907_add_foreign_keys_to_collections_table',0),(846,'2017_09_20_164907_add_foreign_keys_to_document_requirements_table',0),(847,'2017_09_20_164907_add_foreign_keys_to_documentrequests_table',0),(848,'2017_09_20_164907_add_foreign_keys_to_employeeposition_table',0),(849,'2017_09_20_164907_add_foreign_keys_to_facilities_table',0),(850,'2017_09_20_164907_add_foreign_keys_to_families_table',0),(851,'2017_09_20_164907_add_foreign_keys_to_familymembers_table',0),(852,'2017_09_20_164907_add_foreign_keys_to_generaladdresses_table',0),(853,'2017_09_20_164907_add_foreign_keys_to_lots_table',0),(854,'2017_09_20_164907_add_foreign_keys_to_messages_table',0),(855,'2017_09_20_164907_add_foreign_keys_to_participants_table',0),(856,'2017_09_20_164907_add_foreign_keys_to_partrecipients_table',0),(857,'2017_09_20_164907_add_foreign_keys_to_requestrequirements_table',0),(858,'2017_09_20_164907_add_foreign_keys_to_reservations_table',0),(859,'2017_09_20_164907_add_foreign_keys_to_residentaccountregistrations_table',0),(860,'2017_09_20_164907_add_foreign_keys_to_residentaccounts_table',0),(861,'2017_09_20_164907_add_foreign_keys_to_residentbackgrounds_table',0),(862,'2017_09_20_164907_add_foreign_keys_to_residentregistrations_table',0),(863,'2017_09_20_164907_add_foreign_keys_to_services_table',0),(864,'2017_09_20_164907_add_foreign_keys_to_servicesponsorships_table',0),(865,'2017_09_20_164907_add_foreign_keys_to_servicetransactions_table',0),(866,'2017_09_20_164907_add_foreign_keys_to_units_table',0),(867,'2017_09_20_164907_add_foreign_keys_to_voters_table',0),(868,'2017_09_20_171200_create_buildings_table',0),(869,'2017_09_20_171200_create_buildingtypes_table',0),(870,'2017_09_20_171200_create_businesscategories_table',0),(871,'2017_09_20_171200_create_businesses_table',0),(872,'2017_09_20_171200_create_businessregistrations_table',0),(873,'2017_09_20_171200_create_collections_table',0),(874,'2017_09_20_171200_create_document_requirements_table',0),(875,'2017_09_20_171200_create_documentrequests_table',0),(876,'2017_09_20_171200_create_documents_table',0),(877,'2017_09_20_171200_create_employeeposition_table',0),(878,'2017_09_20_171200_create_employees_table',0),(879,'2017_09_20_171200_create_facilities_table',0),(880,'2017_09_20_171200_create_facilitytypes_table',0),(881,'2017_09_20_171200_create_families_table',0),(882,'2017_09_20_171200_create_familymembers_table',0),(883,'2017_09_20_171200_create_generaladdresses_table',0),(884,'2017_09_20_171200_create_lots_table',0),(885,'2017_09_20_171200_create_messages_table',0),(886,'2017_09_20_171200_create_participants_table',0),(887,'2017_09_20_171200_create_partrecipients_table',0),(888,'2017_09_20_171200_create_people_table',0),(889,'2017_09_20_171200_create_recipients_table',0),(890,'2017_09_20_171200_create_requestrequirements_table',0),(891,'2017_09_20_171200_create_requirements_table',0),(892,'2017_09_20_171200_create_reservations_table',0),(893,'2017_09_20_171200_create_residentaccountregistrations_table',0),(894,'2017_09_20_171200_create_residentaccounts_table',0),(895,'2017_09_20_171200_create_residentbackgrounds_table',0),(896,'2017_09_20_171200_create_residentregistrations_table',0),(897,'2017_09_20_171200_create_residents_table',0),(898,'2017_09_20_171200_create_services_table',0),(899,'2017_09_20_171200_create_servicesponsorships_table',0),(900,'2017_09_20_171200_create_servicetransactions_table',0),(901,'2017_09_20_171200_create_servicetypes_table',0),(902,'2017_09_20_171200_create_streets_table',0),(903,'2017_09_20_171200_create_sysutil_table',0),(904,'2017_09_20_171200_create_units_table',0),(905,'2017_09_20_171200_create_users_table',0),(906,'2017_09_20_171200_create_utilities_table',0),(907,'2017_09_20_171200_create_voters_table',0),(908,'2017_09_20_171206_add_foreign_keys_to_buildings_table',0),(909,'2017_09_20_171206_add_foreign_keys_to_businesses_table',0),(910,'2017_09_20_171206_add_foreign_keys_to_businessregistrations_table',0),(911,'2017_09_20_171206_add_foreign_keys_to_collections_table',0),(912,'2017_09_20_171206_add_foreign_keys_to_document_requirements_table',0),(913,'2017_09_20_171206_add_foreign_keys_to_documentrequests_table',0),(914,'2017_09_20_171206_add_foreign_keys_to_employeeposition_table',0),(915,'2017_09_20_171206_add_foreign_keys_to_facilities_table',0),(916,'2017_09_20_171206_add_foreign_keys_to_families_table',0),(917,'2017_09_20_171206_add_foreign_keys_to_familymembers_table',0),(918,'2017_09_20_171206_add_foreign_keys_to_generaladdresses_table',0),(919,'2017_09_20_171206_add_foreign_keys_to_lots_table',0),(920,'2017_09_20_171206_add_foreign_keys_to_messages_table',0),(921,'2017_09_20_171206_add_foreign_keys_to_participants_table',0),(922,'2017_09_20_171206_add_foreign_keys_to_partrecipients_table',0),(923,'2017_09_20_171206_add_foreign_keys_to_requestrequirements_table',0),(924,'2017_09_20_171206_add_foreign_keys_to_reservations_table',0),(925,'2017_09_20_171206_add_foreign_keys_to_residentaccountregistrations_table',0),(926,'2017_09_20_171206_add_foreign_keys_to_residentaccounts_table',0),(927,'2017_09_20_171206_add_foreign_keys_to_residentbackgrounds_table',0),(928,'2017_09_20_171206_add_foreign_keys_to_residentregistrations_table',0),(929,'2017_09_20_171206_add_foreign_keys_to_services_table',0),(930,'2017_09_20_171206_add_foreign_keys_to_servicesponsorships_table',0),(931,'2017_09_20_171206_add_foreign_keys_to_servicetransactions_table',0),(932,'2017_09_20_171206_add_foreign_keys_to_units_table',0),(933,'2017_09_20_171206_add_foreign_keys_to_voters_table',0),(934,'2017_09_21_082559_create_buildings_table',0),(935,'2017_09_21_082559_create_buildingtypes_table',0),(936,'2017_09_21_082559_create_businesscategories_table',0),(937,'2017_09_21_082559_create_businesses_table',0),(938,'2017_09_21_082559_create_businessregistrations_table',0),(939,'2017_09_21_082559_create_collections_table',0),(940,'2017_09_21_082559_create_document_requirements_table',0),(941,'2017_09_21_082559_create_documentrequests_table',0),(942,'2017_09_21_082559_create_documents_table',0),(943,'2017_09_21_082559_create_employeeposition_table',0),(944,'2017_09_21_082559_create_employees_table',0),(945,'2017_09_21_082559_create_facilities_table',0),(946,'2017_09_21_082559_create_facilitytypes_table',0),(947,'2017_09_21_082559_create_families_table',0),(948,'2017_09_21_082559_create_familymembers_table',0),(949,'2017_09_21_082559_create_generaladdresses_table',0),(950,'2017_09_21_082559_create_logs_table',0),(951,'2017_09_21_082559_create_lots_table',0),(952,'2017_09_21_082559_create_messages_table',0),(953,'2017_09_21_082559_create_participants_table',0),(954,'2017_09_21_082559_create_partrecipients_table',0),(955,'2017_09_21_082559_create_people_table',0),(956,'2017_09_21_082559_create_recipients_table',0),(957,'2017_09_21_082559_create_requestrequirements_table',0),(958,'2017_09_21_082559_create_requirements_table',0),(959,'2017_09_21_082559_create_reservations_table',0),(960,'2017_09_21_082559_create_residentaccountregistrations_table',0),(961,'2017_09_21_082559_create_residentaccounts_table',0),(962,'2017_09_21_082559_create_residentbackgrounds_table',0),(963,'2017_09_21_082559_create_residentregistrations_table',0),(964,'2017_09_21_082559_create_residents_table',0),(965,'2017_09_21_082559_create_services_table',0),(966,'2017_09_21_082559_create_servicesponsorships_table',0),(967,'2017_09_21_082559_create_servicetransactions_table',0),(968,'2017_09_21_082559_create_servicetypes_table',0),(969,'2017_09_21_082559_create_streets_table',0),(970,'2017_09_21_082559_create_sysutil_table',0),(971,'2017_09_21_082559_create_units_table',0),(972,'2017_09_21_082559_create_users_table',0),(973,'2017_09_21_082559_create_utilities_table',0),(974,'2017_09_21_082559_create_voters_table',0),(975,'2017_09_21_082605_add_foreign_keys_to_buildings_table',0),(976,'2017_09_21_082605_add_foreign_keys_to_businesses_table',0),(977,'2017_09_21_082605_add_foreign_keys_to_businessregistrations_table',0),(978,'2017_09_21_082605_add_foreign_keys_to_collections_table',0),(979,'2017_09_21_082605_add_foreign_keys_to_document_requirements_table',0),(980,'2017_09_21_082605_add_foreign_keys_to_documentrequests_table',0),(981,'2017_09_21_082605_add_foreign_keys_to_employeeposition_table',0),(982,'2017_09_21_082605_add_foreign_keys_to_facilities_table',0),(983,'2017_09_21_082605_add_foreign_keys_to_families_table',0),(984,'2017_09_21_082605_add_foreign_keys_to_familymembers_table',0),(985,'2017_09_21_082605_add_foreign_keys_to_generaladdresses_table',0),(986,'2017_09_21_082605_add_foreign_keys_to_logs_table',0),(987,'2017_09_21_082605_add_foreign_keys_to_lots_table',0),(988,'2017_09_21_082605_add_foreign_keys_to_messages_table',0),(989,'2017_09_21_082605_add_foreign_keys_to_participants_table',0),(990,'2017_09_21_082605_add_foreign_keys_to_partrecipients_table',0),(991,'2017_09_21_082605_add_foreign_keys_to_requestrequirements_table',0),(992,'2017_09_21_082605_add_foreign_keys_to_reservations_table',0),(993,'2017_09_21_082605_add_foreign_keys_to_residentaccountregistrations_table',0),(994,'2017_09_21_082605_add_foreign_keys_to_residentaccounts_table',0),(995,'2017_09_21_082605_add_foreign_keys_to_residentbackgrounds_table',0),(996,'2017_09_21_082605_add_foreign_keys_to_residentregistrations_table',0),(997,'2017_09_21_082605_add_foreign_keys_to_services_table',0),(998,'2017_09_21_082605_add_foreign_keys_to_servicesponsorships_table',0),(999,'2017_09_21_082605_add_foreign_keys_to_servicetransactions_table',0),(1000,'2017_09_21_082605_add_foreign_keys_to_units_table',0),(1001,'2017_09_21_082605_add_foreign_keys_to_voters_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (6,1,2,'2017-08-26 06:55:51'),(11,8,8,'2017-08-30 03:56:48'),(12,9,2,'2017-09-09 04:44:37'),(13,9,6,'2017-09-09 04:44:42'),(14,8,6,'2017-09-16 03:35:32'),(15,8,3,'2017-09-16 03:35:48');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `partrecipients`
--

LOCK TABLES `partrecipients` WRITE;
/*!40000 ALTER TABLE `partrecipients` DISABLE KEYS */;
/*!40000 ALTER TABLE `partrecipients` ENABLE KEYS */;
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
-- Dumping data for table `recipients`
--

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;
INSERT INTO `recipients` VALUES (2,'Dog',1,0),(3,'Plants',1,0),(4,'Tree',1,0),(5,'Cats',1,0);
/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `requestrequirements`
--

LOCK TABLES `requestrequirements` WRITE;
/*!40000 ALTER TABLE `requestrequirements` DISABLE KEYS */;
INSERT INTO `requestrequirements` VALUES (24,5,0,1),(25,5,0,3),(26,7,0,1),(27,7,0,2),(32,8,0,1),(33,8,0,3),(35,9,0,1),(36,9,0,2),(37,10,0,1),(38,11,0,1),(41,12,0,1),(42,12,0,2),(43,12,0,4),(45,14,0,1),(46,14,0,2),(47,15,0,1),(48,15,0,2),(49,15,0,4),(55,13,0,1),(56,13,0,4),(57,16,0,1),(58,16,0,2),(59,16,0,4),(60,20,0,1),(61,17,0,1),(62,17,0,2),(63,17,0,4);
/*!40000 ALTER TABLE `requestrequirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,'Identity Card','ID',1,0),(2,'SSS','',1,0),(3,'BIR','',1,0),(4,'NBI CLEARANCE','',1,0),(5,'Office ID','Office ID',1,1),(6,'PhilHealth ID','',1,0);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (20,'Debut','','14:00:00','18:00:00','2017-08-31',2,1,'Paid',NULL,NULL,NULL,NULL),(21,'League','','12:00:00','14:00:00','2017-09-01',5,1,'Pending',NULL,NULL,NULL,NULL),(22,'Birthday Party','','20:00:00','23:00:00','2017-09-06',6,1,'Rescheduled',NULL,NULL,NULL,NULL),(23,'Basket ball league','','10:00:00','12:00:00','2017-10-31',8,1,'Paid',NULL,NULL,NULL,NULL),(24,'Test12345','test','20:00:00','09:00:00','2017-09-16',2,1,'Pending',NULL,NULL,NULL,NULL),(25,'qwewerqwerqwer','','10:00:00','11:00:00','2017-09-16',2,1,'Paid',NULL,NULL,NULL,NULL),(26,'Birthday Party ni bry','debut','10:00:00','12:00:00','2017-09-17',5,1,'Rescheduled',NULL,NULL,NULL,NULL),(27,'Birthday Party','','20:00:00','12:00:00','2017-09-25',6,1,'Cancelled','undefined',NULL,NULL,NULL);
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
INSERT INTO `residentbackgrounds` VALUES (1,'CEO','₱100,001 and above','2017-08-22',2,1,0),(2,'Software Engineer','₱50,001-₱100,000','2017-08-22',3,1,0),(3,'CPA','₱50,001-₱100,000','2017-08-22',4,1,0),(4,'CEO','₱100,001 and above','2017-08-22',5,1,0),(5,'CEO','₱100,001 and above','2017-08-27',2,1,0),(6,'CEO','₱100,001 and above','2017-08-27',2,1,0),(7,'CEO','₱50,001-₱100,000','2017-08-29',2,1,0),(8,'CEO','₱100,001 and above','2017-08-29',2,1,0),(9,'CEO','₱100,001 and above','2017-08-29',6,1,0),(10,'None','₱0-₱10,000','2017-08-29',7,1,0),(11,'CEO','₱100,001 and above','2017-08-30',8,1,0),(12,'CEO','₱100,001 and above','2017-08-30',2,1,0),(13,'CEO','₱100,001 and above','2017-09-24',2,1,0),(14,'CEO','₱100,001 and above','2017-09-24',2,1,0),(15,'CEO','₱100,001 and above','2017-09-24',2,1,0),(16,'Software Engineer','₱50,001-₱100,000','2017-09-24',3,1,0);
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
INSERT INTO `residents` VALUES (2,'RES_001','Marc Joseph','Mendoza','Fuellas',NULL,'09263526321','M','1998-06-18','Single',NULL,NULL,'Official',1,'4bf0c0b006fa76b0f5b783874deddb06.jpg'),(3,'RES_002','Gianne Mae','Mendoza','Fuellas',NULL,'09123456789','F','1997-04-26','Married',NULL,NULL,'Official',1,'7c15f23c241b8569a845fd3c99b95d98.jpg'),(4,'RES_003','Raymond','Averilla','Fuellas',NULL,'09876543211','M','1996-08-07','Married',NULL,NULL,'Official',1,'10.jpg'),(5,'RES_004','Bryan James','Reyes','Illaga',NULL,'09876543212','M','1999-12-01','Widowed',NULL,NULL,'Transient',1,'11enrique.jpg'),(6,'RES_005','Moira Kelly','Antonio','Del Mundo',NULL,'09123456789','F','1998-02-08','Single',NULL,NULL,'Official',1,'15873194_386425791708882_1865123785069904347_n.jpg'),(7,'RES_006','Moiro','Antonio','Del Mundo',NULL,'09263526321','M','2003-05-01','Single',NULL,NULL,'Official',1,'2015-12-25 18.20.31.jpg'),(8,'RES_007','John','Cruz','Perez',NULL,'09234567891','M','1998-04-01','Married',NULL,NULL,'Transient',1,'7c15f23c241b8569a845fd3c99b95d98.jpg');
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'SERV_001','Vaccination',NULL,1,1,0),(2,'SERV_002','Circumcision','',1,1,0);
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
INSERT INTO `servicetransactions` VALUES (1,'SERV_REG_001','2017 Contis Vaccination',1,4,7,'2017-01-01','2017-01-01','On-going',1),(6,'SERV_REG_002','2017 Contis Vaccinations',1,NULL,NULL,'2017-09-26','2017-09-27','Finished',0),(7,'SERV_REG_003','2017 Valdez Circumcision',2,NULL,NULL,'2017-08-30',NULL,'Pending',1),(8,'SERV_REG_004','2017 Del Mundo Vaccination',1,NULL,NULL,'2017-09-05',NULL,'Finished',0),(9,'SERV_REG_005','Dog vaccine',1,NULL,NULL,'2017-09-16',NULL,'Finished',0);
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
INSERT INTO `users` VALUES (1,'skubariwa','skubariwa@gmail.com','$2y$10$vvKYTszmeQ/1iDvnm9tfKeglftn9YhWA/c42esjAvsuoleM57M43u','2017-08-28 05:23:53','2017-08-28 05:23:53','6jnCDNJY7Wc1mi5kgy2LTmIFlQ6QaONaljSC1UQ4nJwUygBbwDx6CmgUWXKb','Marc Joseph','Mendoza','Fuellas','Jr.','4bf0c0b006fa76b0f5b783874deddb06.jpg','Chairman',1,0,1,1,1,1,1,1,1,1),(2,'popo','popo@yahoo.com','$2y$10$kZ9qe7GlW5V1LFAQwUUEx.zSZQDRyPQukxSTdNV/uRsTJTBV1G8/S','2017-09-25 03:06:18','2017-08-28 05:33:05','ctBmYNR78rQEO0phnGhSX4UcoiknYPgEBeKiBqMyHm82uHObEDEgAt5SNw0F','Jason','Santos','Pediz','popo','36058_154619721235420_678295_n.jpg','Kagawad',1,0,1,1,1,1,1,1,1,1),(3,'Bryan_James','bryan_james.ilaga_lds@yahoo.com','$2y$10$Mm00HQmJ/UGUEbn7EpKXbOU7vpfyz6sT5u5AmUDnJ04QFYDMSP/Wi','2017-09-21 04:19:08','2017-08-29 08:08:53','z8Tg8fbCHvTfRNXJEhWDZ1woLIaQ5MbbMb5l1JQVg14jKw57emVa00RN2zoz','Bryan James','Torcelino','Ilaga',NULL,'2015-12-25 18.20.31.jpg','Secretary',1,0,1,1,1,1,1,1,1,1),(4,'alahoy','alahoy@yahoo.com','$2y$10$mHFPFwSWpPJ/Eo5zAPv6TuZANJfOI3T/v.I29Ki7VwXkCmTZ.uxQu','2017-09-25 03:06:08','2017-09-17 17:04:25','wXYABLVabfjo6BXGhjBCdhoS5d77x0BgchHrmAqENuD8b274p1LdyWhzwGm2','Samuel','De Anto','Surgao','kjhdkjasd','15873194_386425791708882_1865123785069904347_n.jpg','Vice Chairman',1,0,1,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `utilities`
--

LOCK TABLES `utilities` WRITE;
/*!40000 ALTER TABLE `utilities` DISABLE KEYS */;
INSERT INTO `utilities` VALUES (1,'Brgy 629','Roselito Pagudpod','123 Hipodromo St. Sta Mesa Manila','asd','asd','FAC_000','DOC_000','SERV_000','RES_000','FAM_000','REQ_000','APPR_000','RSRV_000','SERV_REG_000','SPN_000','COLLE_000');
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

-- Dump completed on 2017-10-09 22:49:22
