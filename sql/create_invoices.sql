CREATE TABLE `invoices` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `vehicleid` int(11) NOT NULL,
 `amount` decimal(5,2) NOT NULL,
 `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `datepaid` timestamp NOT NULL,
 `method` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `jobnumber` int(11) NOT NULL,
 `vat` decimal(10,2) NOT NULL,
 `total` decimal(10,2) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci