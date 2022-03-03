
CREATE DATABASE IF NOT EXISTS `my_data_form`
USE `my_data_form`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `salt` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `user_status` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='Таблица с паролями';

DELETE FROM `users`;

INSERT INTO `users` (`id`, `login`, `password`, `salt`, `user_status`) VALUES
	(5, 'admin', '16dc767fd1f107831fa54ecb0f1ed210', '>jLK<2c"', 1),
	(48, 'redactor', 'cd33c6f33b464920a0f198b1deee3fdf', '$eE>hUeZ', 2),
	(49, 'vova', '36d6a3432c3be7419ef5c18099a92e42', ',tL*`Z=j', 3);