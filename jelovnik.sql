create database jelovnik;
use jelovnik;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS `administratori`;
CREATE TABLE `administratori` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  `lozinka` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO `administratori` VALUES ('1', 'Pero', 'Perić', 'pero', 'pero');

DROP TABLE IF EXISTS `jelo`;
CREATE TABLE `jelo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) DEFAULT NULL,
  `cijena` varchar(100) DEFAULT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `slika` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `jelo` VALUES ('1', 'Biftek', '150kn', 'Polupečeni odrezak goveđi', 'mid.jpg');

