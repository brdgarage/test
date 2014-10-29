CREATE TABLE `address` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `line1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `line2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `town` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `county` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `postcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `clientid` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci