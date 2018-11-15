SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush00`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `items` varchar(8000) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `category_id2` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(8000) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `rush00`.`categories` (`id`, `name`) VALUES (NULL, 'drinks'), (NULL, 'tech'), (NULL, 'soft'), (NULL, 'hardware'), (NULL, 'other');

INSERT INTO `rush00`.`users` (`id`, `login`, `password`, `lastname`, `firstname`, `address`, `zipcode`, `city`, `admin`) VALUES (NULL, 'root', 'password', 'root', 'root', 'root', 69069, 'root', 1) ;

INSERT INTO `rush00`.`items` (`id`, `category_id`, `category_id2`, `name`, `price`) VALUES 
(NULL, 1, 0, 'Bath', 70),
(NULL, 1, 0, 'Router', 80),
(NULL, 1, 0, 'Case', 50),
(NULL, 1, 0, 'Wine', 90),
(NULL, 1, 2, 'Server', 110),
(NULL, 2, 0, 'Paints', 320),
(NULL, 2, 0, 'Station 3D', 460),
(NULL, 2, 0, 'Dreel', 380),
(NULL, 2, 0, 'Bacardi', 410),
(NULL, 2, 3, 'Swich', 340),
(NULL, 3, 0, 'Wisky', 690),
(NULL, 3, 0, 'TrySkin', 490);
