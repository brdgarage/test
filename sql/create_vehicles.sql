CREATE TABLE `vehicles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `client_id` int(11) DEFAULT NULL,
 `make` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
 `model` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
 `colour` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
 `engine_size` decimal(3,2) DEFAULT NULL,
 `registration` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `trim` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
 `fuel` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
 `mot` date NULL,
 `service` date NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci