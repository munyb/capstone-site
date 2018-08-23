-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: neo_site_data
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `coin_data`
--

DROP TABLE IF EXISTS `coin_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coin_data` (
  `id` text,
  `name` text,
  `symbol` text,
  `grank` text,
  `price_usd` text,
  `price_btc` text,
  `market_cap_usd` text,
  `available_supply` text,
  `total_supply` text,
  `max_supply` text,
  `percent_change_1h` text,
  `percent_change_24h` text,
  `percent_change_7d` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coin_data`
--

LOCK TABLES `coin_data` WRITE;
/*!40000 ALTER TABLE `coin_data` DISABLE KEYS */;
INSERT INTO `coin_data` VALUES ('deepbrain-chain','DeepBrain Chain','DBC','195','0.0136623826','0.00000215','20493574.0','1500000000.0','10000000000.0','10000000000.0','-1.66','-9.69','-2.71'),('gas','Gas','GAS','111','4.6014247418','0.00072492','46604956.0','10128375.0','17190378.0','100000000.0','-2.45','-7.43','10.22'),('neo','NEO','NEO','15','16.5349613642','0.00260496','1074772489.0','65000000.0','100000000.0','100000000.0','-1.0','-6.97','0.09'),('qlink','QLINK','QLC','303','0.0459699778','0.00000724','11032795.0','240000000.0','600000000.0','0','-4.39','-6.41','7.53'),('red-pulse','Red Pulse','RPX','259','0.0171070626','0.00000270','14191826.0','829588687.0','1362278592.0','0','-1.98','-12.43','16.25'),('thekey','THEKEY','TKY','198','0.0040039431','0.00000063','20260105.0','5060038287.0','9795844687.0','0','-2.11','-7.21','-0.28'),('trinity-network-credit','Trinity Network Credit','TNC','568','0.0103368103','0.00000163','3445603.0','333333333.0','1000000000.0','0','-2.16','-10.35','-10.6'),('zeepin','Zeepin','ZPT','218','0.035981018','0.00000567','17990509.0','500000000.0','1000000000.0','0','-1.61','-1.84','21.8'),('alphacat','Alphacat','ACAT','636','0.0009160311','0.00000014','2556119.0','2790428084.0','6250000000.0','0','-1.52','-9.5','-7.67'),('ontology','Ontology','ONT','26','2.0281029123','0.00031951','306836101.0','151292175.0','1000000000.0','0','0.26','-8.18','50.72'),('travala','Travala','AVA','711','0.0643899502','0.00001014','1817515.0','28226684.0','61571086.0','0','0.88','-4.47','-7.09'),('bridge-protocol','Bridge Protocol','TOLL','922','0.0020082763','0.00000032','458082.0','228097040.0','708097040.0','0','-1.14','-6.19','5.26'),('effect-ai','Effect.AI','EFX','642','0.0120337882','0.00000190','2487005.0','206668526.0','650000000.0','0','-1.1','6.44','21.71');
/*!40000 ALTER TABLE `coin_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `market_info`
--

DROP TABLE IF EXISTS `market_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `market_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `total_marketcap` text,
  `neo_dominance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `market_info`
--

LOCK TABLES `market_info` WRITE;
/*!40000 ALTER TABLE `market_info` DISABLE KEYS */;
INSERT INTO `market_info` VALUES (1,'1522946679',71);
/*!40000 ALTER TABLE `market_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_info`
--

DROP TABLE IF EXISTS `page_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_info` (
  `id` text,
  `name` text,
  `website` text,
  `twitter` text,
  `reddit` text,
  `telegram` text,
  `discord` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_info`
--

LOCK TABLES `page_info` WRITE;
/*!40000 ALTER TABLE `page_info` DISABLE KEYS */;
INSERT INTO `page_info` VALUES ('neo','NEO','https://neo.org','https://twitter.com/neo_blockchain','https://www.reddit.com/r/NEO/','https://telegram.me/Neo_Blockchain','https://discordapp.com/invite/DtzSb2Z'),('gas','Gas','https://neo.org','https://twitter.com/neo_blockchain','https://www.reddit.com/r/NEO/','https://telegram.me/Neo_Blockchain','https://discordapp.com/invite/DtzSb2Z'),('deepbrain-chain','DeepBrain Chain','https://www.deepbrainchain.org','https://twitter.com/deepbrainchain','https://www.reddit.com/r/DeepBrainChain/',NULL,NULL),('qlink','QLINK','https://qlink.mobi','https://twitter.com/qlinkmobi','https://www.reddit.com/r/Qlink',NULL,NULL),('red-pulse','Red Pulse','https://red-pulse.com','https://twitter.com/red_pulse_china','https://www.reddit.com/r/RedPulseToken',NULL,NULL),('zeepin','Zeepin','https://www.zeepin.io','https://twitter.com/ZeepinChain','https://www.reddit.com/r/ZEEPIN/',NULL,NULL),('thekey','THEKEY','https://www.thekey.vip/','https://twitter.com/thekeyvip','https://www.reddit.com/user/TheKeyVIP',NULL,NULL),('alphacat','Alphacat','https://www.alphacat.io','https://twitter.com/alphacat_io',NULL,'https://t.me/alphacatglobal',NULL),('trinity-network-credit','Trinity Network Credit','https://trinity.tech/','https://twitter.com/TrinityProtocol','https://www.reddit.com/r/TrinityNetworkCredit','https://t.me/TrinityStateChannels',NULL),('ontology','Ontology','https://ont.io/','https://twitter.com/ontologynetwork','https://www.reddit.com/r/OntologyNetwork/','https://t.me/OntologyNetwork','https://discordapp.com/invite/4TQujHj'),('travala','Travala','https://project.travala.com','https://twitter.com/travalacom','https://www.reddit.com/r/Travala/','https://t.me/travala','https://discordapp.com/invite/huF9A4h'),('bridge-protocol','Bridge Protocol','https://www.bridgeprotocol.io/','https://twitter.com/BridgeProtocol','https://www.reddit.com/r/iambridgeprotocol/','https://t.me/BRIDGEprotocol','https://discordapp.com/invite/yrj6p5K'),('effect-ai','Effect Ai','http://effect.ai','https://twitter.com/effectaix','https://www.reddit.com/r/effectai','tg://resolve?domain=effectai',NULL);
/*!40000 ALTER TABLE `page_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-23 13:27:29
