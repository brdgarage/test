CREATE TABLE `customer` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
 `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
 `customercode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
 `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci