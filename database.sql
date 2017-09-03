CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL auto_increment,
  `firstname` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `lastname` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;