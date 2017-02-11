-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: keystroke_biometrics
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `metrics`
--
CREATE DATABASE keystroke_biometrics;
use keystroke_biometrics;
DROP TABLE IF EXISTS `metrics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metrics` (
  `username` varchar(200) NOT NULL,
  `hold_time` varchar(10000) NOT NULL,
  `histogram` varchar(10000) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metrics`
--

LOCK TABLES `metrics` WRITE;
/*!40000 ALTER TABLE `metrics` DISABLE KEYS */;
INSERT INTO `metrics` VALUES ('dani','{\"t_hold\":{\"mean\":122.52,\"variance\":875.2896},\"h_hold\":{\"mean\":108.7,\"variance\":345.21},\"e_hold\":{\"mean\":134.39705882353,\"variance\":1026.357050173},\" _hold\":{\"mean\":141.52380952381,\"variance\":670.43990929705},\"q_hold\":{\"mean\":108.76923076923,\"variance\":728.1775147929},\"u_hold\":{\"mean\":96.222222222222,\"variance\":908.72839506173},\"i_hold\":{\"mean\":119.58333333333,\"variance\":307.24305555556},\"c_hold\":{\"mean\":121.91666666667,\"variance\":691.24305555556},\"k_hold\":{\"mean\":115.9,\"variance\":254.29},\"b_hold\":{\"mean\":101,\"variance\":861.2},\"r_hold\":{\"mean\":128.48717948718,\"variance\":589.68573307035},\"o_hold\":{\"mean\":131.22388059701,\"variance\":442.83047449321},\"w_hold\":{\"mean\":115.5,\"variance\":195.05},\"n_hold\":{\"mean\":106.34545454545,\"variance\":516.22611570248},\"f_hold\":{\"mean\":112.77777777778,\"variance\":717.50617283951},\"x_hold\":{\"mean\":132.5,\"variance\":116},\"j_hold\":{\"mean\":74.8,\"variance\":398.36},\"m_hold\":{\"mean\":118.36363636364,\"variance\":102.59504132231},\"p_hold\":{\"mean\":121.63636363636,\"variance\":207.86776859504},\"s_hold\":{\"mean\":126.16666666667,\"variance\":275.63888888889},\"v_hold\":{\"mean\":116.5,\"variance\":633.71153846154},\"l_hold\":{\"mean\":117.05263157895,\"variance\":352.57617728532},\"a_hold\":{\"mean\":133.80555555556,\"variance\":1283.2677469136},\"z_hold\":{\"mean\":145.55555555556,\"variance\":394.91358024691},\"y_hold\":{\"mean\":91.583333333333,\"variance\":218.99305555556},\"d_hold\":{\"mean\":124.35,\"variance\":809.9275},\"g_hold\":{\"mean\":114.91666666667,\"variance\":143.74305555556},\"Backspace_hold\":{\"mean\":96.648648648649,\"variance\":970.33601168736}}','{\"bins\":[8,2,6,8,6,12,34,44,52,49,68,67,54,38,39,39,34,37,29,21,14,16,12,14,10,7,7,6,5,1,5,2,3,2,0,2,3,2,1,1,2,0,4,1,0,1,3,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,1,1,1,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}'),('mihaela','{\"q_hold\":{\"mean\":375.14285714286,\"variance\":22771.265306122,\"occurrences\":7,\"m\":375.14285714286,\"s\":159398.85714286},\"t_hold\":{\"mean\":393.96296296296,\"variance\":13514.331961591,\"occurrences\":27,\"m\":393.96296296296,\"s\":364886.96296296},\"s_hold\":{\"mean\":385.92105263158,\"variance\":16291.599030471,\"occurrences\":38,\"m\":385.92105263158,\"s\":619080.76315789},\"g_hold\":{\"mean\":340.75,\"variance\":6954.6041666667,\"occurrences\":24,\"m\":340.75,\"s\":166910.5},\"a_hold\":{\"mean\":398.18333333333,\"variance\":6655.6830555556,\"occurrences\":60,\"m\":398.18333333333,\"s\":399340.98333333},\"v_hold\":{\"mean\":319.94117647059,\"variance\":7785.3494809689,\"occurrences\":17,\"m\":319.94117647059,\"s\":132350.94117647},\"f_hold\":{\"mean\":381.2972972973,\"variance\":7287.6143170197,\"occurrences\":37,\"m\":381.2972972973,\"s\":269641.72972973},\"b_hold\":{\"mean\":267,\"variance\":4624,\"occurrences\":2,\"m\":267,\"s\":9248},\"r_hold\":{\"mean\":403,\"variance\":2809,\"occurrences\":2,\"m\":403,\"s\":5618},\"e_hold\":{\"mean\":314.33333333333,\"variance\":1429.5555555556,\"occurrences\":3,\"m\":314.33333333333,\"s\":4288.6666666667},\"d_hold\":{\"mean\":272.33333333333,\"variance\":876.22222222222,\"occurrences\":3,\"m\":272.33333333333,\"s\":2628.6666666667},\"y_hold\":{\"mean\":211.5,\"variance\":30.25,\"occurrences\":2,\"m\":211.5,\"s\":60.5}}','{\"bins\":[4,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,1,0,1,0,3,1,4,5,5,2,3,6,7,5,4,10,7,11,7,9,14,9,10,14,13,16,7,10,10,2,2,1,1,3,3,0,1,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}'),('teodor','{\"t_hold\":{\"mean\":112.68,\"variance\":494.9376},\"h_hold\":{\"mean\":111.64705882353,\"variance\":181.75778546713},\"e_hold\":{\"mean\":159.64285714286,\"variance\":2058.1224489796},\" _hold\":{\"mean\":139.35658914729,\"variance\":354.24493720329},\"q_hold\":{\"mean\":100.125,\"variance\":112.859375},\"u_hold\":{\"mean\":102.35294117647,\"variance\":457.93425605536},\"i_hold\":{\"mean\":89.538461538462,\"variance\":558.7100591716},\"c_hold\":{\"mean\":98.888888888889,\"variance\":467.20987654321},\"k_hold\":{\"mean\":103.375,\"variance\":86.234375},\"b_hold\":{\"mean\":99,\"variance\":97},\"r_hold\":{\"mean\":130.93939393939,\"variance\":466.7842056933},\"o_hold\":{\"mean\":108.44827586207,\"variance\":343.45422116528},\"w_hold\":{\"mean\":101.5,\"variance\":225.25},\"n_hold\":{\"mean\":100.51020408163,\"variance\":491.39275301957},\"f_hold\":{\"mean\":93.75,\"variance\":36.4375},\"x_hold\":{\"mean\":133.125,\"variance\":799.609375},\"j_hold\":{\"mean\":117.5,\"variance\":289.75},\"m_hold\":{\"mean\":153.375,\"variance\":24.234375},\"p_hold\":{\"mean\":126.25,\"variance\":422.6875},\"s_hold\":{\"mean\":137.5,\"variance\":1221.65},\"v_hold\":{\"mean\":105.2380952381,\"variance\":420.08616780045},\"l_hold\":{\"mean\":106,\"variance\":116.33333333333},\"a_hold\":{\"mean\":120.77272727273,\"variance\":1036.6301652893},\"z_hold\":{\"mean\":126.5,\"variance\":58.25},\"y_hold\":{\"mean\":112.11764705882,\"variance\":266.45674740484},\"d_hold\":{\"mean\":112.10526315789,\"variance\":554.83102493075},\"g_hold\":{\"mean\":105.7619047619,\"variance\":409.80045351474},\"Backspace_hold\":{\"mean\":87.75,\"variance\":35.1875}}','{\"bins\":[3,2,3,9,11,15,31,29,51,59,50,39,38,34,29,20,26,18,29,17,11,7,12,8,5,9,2,8,5,2,1,3,5,2,2,0,1,4,0,1,5,1,2,3,1,0,0,0,3,1,2,0,1,3,3,1,0,0,1,0,0,1,1,1,0,2,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}');
/*!40000 ALTER TABLE `metrics` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-11  3:45:55
