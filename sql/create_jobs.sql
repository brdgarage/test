CREATE TABLE `jobs` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `jobnumber` int(11) NOT NULL,
 `item` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `trade` decimal(10,2) NOT NULL,
 `retail` decimal(10,2) NOT NULL,
 `warrentyexpires` date NOT NULL,
 `quantity` int(11) NOT NULL,
 `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci