CREATE TABLE `vehiclehistory` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `vehicleID` int(11) NOT NULL,
 `historyText` text COLLATE utf8_unicode_ci NOT NULL,
 `user` int(11) DEFAULT NULL,
 `dateadded` datetime DEFAULT CURRENT_TIMESTAMP,
 `dateupdated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci