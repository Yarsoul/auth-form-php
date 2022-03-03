
CREATE DATABASE IF NOT EXISTS `my_data_form`
USE `my_data_form`;

CREATE TABLE IF NOT EXISTS `users_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DELETE FROM `users_status`;

INSERT INTO `users_status` (`id_status`, `status`) VALUES
	(1, 'admin'),
	(2, 'viewer'),
	(3, 'user');