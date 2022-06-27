-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.29 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица my_php_service.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `password` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `salt` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `status_id` int NOT NULL DEFAULT '3',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COMMENT='Таблица с паролями';

-- Дамп данных таблицы my_php_service.user: ~7 rows (приблизительно)
DELETE FROM `user`;
INSERT INTO `user` (`user_id`, `login`, `password`, `salt`, `status_id`) VALUES
	(1, 'admin', '16dc767fd1f107831fa54ecb0f1ed210', '>jLK<2c"', 1),
	(2, 'moderator', 'cd33c6f33b464920a0f198b1deee3fdf', '$eE>hUeZ', 2),
	(3, 'user', '76583379664a1530d157af6efea86c45', ';VjnCkg<', 3),
	(4, 'Fedor', '5ffa8feafff5060dd16e2865bfab4f84', '?,,LYW1f', 2),
	(5, 'Vova', 'fe6b87762afcb99212c901c6d9317e36', 'x9P:3]fZ', 3),
	(6, 'Nadya', '1bf50105a1a4cf216e01f9ee2cce4ad1', 'O3.,U86@', 3),
	(7, 'Ivan', '9c373f8f7f068d24319ee42f51ce3454', '3O^%IUWg', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
