DROP TABLE IF EXISTS `wjoy_log`;
CREATE TABLE `wjoy_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(10) DEFAULT NULL,
  `longurl` varchar(9999) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
