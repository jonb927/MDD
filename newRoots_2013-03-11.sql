# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: newRoots
# Generation Time: 2013-03-11 23:41:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nRsearch
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nRsearch`;

CREATE TABLE `nRsearch` (
  `nRsearch` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nRaddress` varchar(50) DEFAULT NULL,
  `nRstate` varchar(20) DEFAULT NULL,
  `nRcity` varchar(40) DEFAULT NULL,
  `nRzip` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`nRsearch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nRuser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nRuser`;

CREATE TABLE `nRuser` (
  `nRuserId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nRusername` varchar(40) NOT NULL,
  `nRemail` varchar(40) NOT NULL,
  PRIMARY KEY (`nRuserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
