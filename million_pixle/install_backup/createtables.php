<?PHP
// Version 3.7 PRO
// Full Installation
DB_query("DROP TABLE IF EXISTS `".$dbprefix."ban`",'#');
DB_query("CREATE TABLE `".$dbprefix."ban` (
  `ban_id` int(11) NOT NULL auto_increment,
  `ban` varchar(255) default NULL,
  `ban_site` tinyint(1) NOT NULL default '0',
  `ban_title` tinyint(1) NOT NULL default '0',
  `ban_url` tinyint(1) NOT NULL default '0',
  `ban_email` tinyint(1) NOT NULL default '0',
  `ban_feedback` tinyint(1) NOT NULL default '0',
  `ban_recommend` tinyint(1) NOT NULL default '0',
  `ban_newsletter` tinyint(1) NOT NULL default '0',
  `ban_top` tinyint(1) NOT NULL default '0',
  `ban_referrer` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ban_id`)
)",'#') ;

DB_query("INSERT INTO `".$dbprefix."ban` VALUES (1, '%localhost%', 0, 0, 0, 0, 0, 0, 0, 0, 1)",'#');
DB_query("INSERT INTO `".$dbprefix."ban` VALUES (2, '%yahoo%', 0, 0, 0, 0, 0, 0, 0, 0, 1)",'#');
DB_query("INSERT INTO `".$dbprefix."ban` VALUES (3, '%msn%', 0, 0, 0, 0, 0, 0, 0, 0, 1)",'#');
DB_query("INSERT INTO `".$dbprefix."ban` VALUES (4, '%google%', 0, 0, 0, 0, 0, 0, 0, 0, 1)",'#');
DB_query("INSERT INTO `".$dbprefix."ban` VALUES (5, '%iframe%', 0, 1, 0, 0, 0, 0, 0, 0, 1)",'#');

DB_query("DROP TABLE IF EXISTS `".$dbprefix."blog`",'#');
DB_query("CREATE TABLE `".$dbprefix."blog` (
  `blog_id` int(11) NOT NULL auto_increment,
  `lang` char(2) default NULL,
  `blog_datetime` datetime NOT NULL,
  `blog_title` varchar(255) default NULL,
  `blog_content` text NOT NULL,
  PRIMARY KEY  (`blog_id`)
)",'#') ;

DB_query("DROP TABLE IF EXISTS `".$dbprefix."config`",'#');
DB_query("CREATE TABLE `".$dbprefix."config` (
  `adminpass` varbinary(100) NOT NULL default 'admin',
  `admin_language` char(2) default 'en',
  `admin_datetime` datetime NOT NULL,
  `admindir` varchar(255) NOT NULL default 'control',
  `domainname` varchar(255) NOT NULL default '',
  `scriptpath` varchar(255) default NULL,
  `email_webmaster` varchar(255) NOT NULL default '',
  `email_feedback` varchar(255) NOT NULL default '',
  `standard_language` char(2) NOT NULL default 'en',
  `date_format` varchar(20) NOT NULL default 'd.m.Y',
  `timezone` varchar(10) NOT NULL default '0',
  `delete_days` int(6) NOT NULL default '2',
  `daily` tinyint(1) NOT NULL default '1',
  `daily_date` date default NULL,
  `email_paypal` varchar(255) default NULL,
  `2checkout_id` varchar(255) default NULL,
  `2checkout_product_id` varchar(255) default NULL,
  `email_stormpay` varchar(255) default NULL,
  `email_nochex` varchar(255) default NULL,
  `egold_account` varchar(255) default NULL,
  `email_alertpay` varchar(255) default NULL,
  `email_safepay` varchar(255) default NULL,
  `meta_keywords` text,
  `meta_description` text,
  `website_title` varchar(255) default NULL,
  `design` varchar(255) NOT NULL default 'millionpixel',
  `logo` varchar(255) default NULL,
  `google_adsense` text,
  `google_adsense_v` text,
  `legal_notice` text,
  `recommends` int(11) NOT NULL default '0',
  `mailing` tinyint(1) NOT NULL default '0',
  `mailingdate` datetime default NULL,
  `menu_top` tinyint(1) NOT NULL default '1',
  `menu_referrer` tinyint(1) NOT NULL default '1',
  `menu_traffic` tinyint(1) NOT NULL default '1',
  `menu_blog` tinyint(1) NOT NULL default '1',
  `menu_faq` tinyint(1) NOT NULL default '1',
  `menu_pixellist` tinyint(1) NOT NULL default '1',
  `menu_feedback` tinyint(1) NOT NULL default '1',
  `menu_recommend` tinyint(1) NOT NULL default '1',
  `menu_newsletter` tinyint(1) NOT NULL default '1',
  `menu_linkus` tinyint(1) NOT NULL default '1',
  `menu_legaln` tinyint(1) NOT NULL default '1',
  `ranking_value` mediumint(4) NOT NULL default '10',
  `referrer_value` mediumint(4) NOT NULL default '10',
  `submenu_style` tinyint(1) NOT NULL default '0',
  `locked` DATETIME ,
  PRIMARY KEY  (`adminpass`)
)",'#') ;

DB_query("INSERT INTO `".$dbprefix."config` VALUES ('admin', 'de', NOW(), 'control', '5starunity.com', 'http://5starunity.com', 'webmaster@5starunity.com', 'webmaster@5starunity.com', 'de', 'd.m.Y', '0', 4, 1, 0x323030362d30362d3131, 'paypal@5starunity.com', '', '', '', '', '', '', '', 'pixel advertisement, pixel', 'Get some pixels and link your website!', '5starunity.com', 'millionpixelpro', NULL, '', '', '', 9, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 10, 10, 1, NULL)",'#');


DB_query("DROP TABLE IF EXISTS `".$dbprefix."currency`",'#');
DB_query("CREATE TABLE `".$dbprefix."currency` (
  `iso` char(3) NOT NULL default '',
  `long` varchar(30) NOT NULL default '',
  `dec` smallint(6) NOT NULL default '2',
  `dec_point` char(3) NOT NULL default '.',
  `thousands` char(3) NOT NULL default ',',
  PRIMARY KEY  (`iso`)
)",'#') ;


DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('AUD', 'Australian Dollar', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('CAD', 'Canadian Dollar', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('CHF', 'Swiss Francs', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('EUR', 'Euro', 2, ',', '.')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('GBP', 'British Pound', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('JPY', 'Japanese Yen', 0, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('USD', 'US Dollar', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('CNY', 'Chinese Yuan Renminbi', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('SEK', 'Swedish Kronor', 2, ',', '.')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('DKK', 'Danish Kroner', 2, ',', '.')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('NOK', 'Norwegian Kroner', 2, ',', '.')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('BRL', 'Brazilian Real.', 2, ',', '.')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('THB', 'Thai Baht', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('PHP', 'Philippine Peso', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('TWD', 'Taiwan Dollar', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('MYR', 'Malaysian Ringgit', 2, '.', ',')",'#');
DB_query("INSERT INTO `".$dbprefix."currency` VALUES ('YTL', 'Turkish New Lira', 2, ',', '.')",'#');


DB_query("DROP TABLE IF EXISTS `".$dbprefix."faq`",'#');
DB_query("CREATE TABLE `".$dbprefix."faq` (
  `faq_id` int(11) NOT NULL auto_increment,
  `faq_nr` int(11) default NULL,
  `lang` char(2) default NULL,
  `faq_question` text,
  `faq_answer` text,
  PRIMARY KEY  (`faq_id`)
)",'#') ;


DB_query("DROP TABLE IF EXISTS `".$dbprefix."grids`",'#');
DB_query("CREATE TABLE `".$dbprefix."grids` (
  `gridid` int(10) unsigned NOT NULL auto_increment,
  `active` tinyint(1) NOT NULL default '1',
  `page_id` int(10) unsigned NOT NULL default '1',
  `x` varchar(10) NOT NULL default '100',
  `y` varchar(10) NOT NULL default '100',
  `name` varchar(200) default NULL,
  `page_slogan` varchar(255) NOT NULL default '',
  `page_name` varchar(255) default NULL,
  `plugin` tinyint(1) NOT NULL default '0',
  `grid_type` tinyint(4) NOT NULL default '0',
  `grid_template` varchar(255) default NULL,
  `track_clicks` tinyint(1) NOT NULL default '1',
  `unique_clicks` tinyint(1) NOT NULL default '1',
  `image_interlace` tinyint(1) NOT NULL default '0',
  `image_reduce` tinyint(1) NOT NULL default '0',
  `image_format` tinyint(1) NOT NULL default '1',
  `show_clicks` tinyint(1) NOT NULL default '1',
  `show_box` tinyint(1) NOT NULL default '1',
  `image_upload` tinyint(1) NOT NULL default '1',
  `image_upload_kbytes` int(5) NOT NULL default '250',
  `image_saveorig` tinyint(1) NOT NULL default '0',
  `image_logos` tinyint(1) NOT NULL default '1',
  `maxfields` smallint(4) default NULL,
  `minfields` smallint(4) default NULL,
  `new_window` tinyint(1) NOT NULL default '1',
  `zoom` tinyint(1) NOT NULL default '0',
  `expire_days` int(11) default NULL,
  `precontrol` tinyint(1) NOT NULL default '1',
  `adminmail` tinyint(1) NOT NULL default '1',
  `blockprice` decimal(10,2) NOT NULL default '0.00',
  `currency` char(3) NOT NULL default 'USD',
  `pay_currency` char(3) default NULL,
  `exchange_rate` decimal(6,5) default NULL,
  `blocksize_x` mediumint(9) NOT NULL default '10',
  `blocksize_y` mediumint(9) NOT NULL default '10',
  `blockimage` varchar(255) default NULL,
  `unique_url` tinyint(1) default NULL,
  `vat` decimal(6,2) default NULL,
  `featured_ads` tinyint(1) NOT NULL default '1',
  `vat_add` tinyint(1) default '0',
  `title_chars` smallint(6) NOT NULL default '70',
  `tooltip_style` text,
  `tooltip_layout` text,
  `image_resize_x` varchar(4) default NULL,
  `image_resize_y` varchar(4) default NULL,
  `grid_refresh` tinyint(2) default NULL,
  `reserve_pixel` tinyint(1) default NULL,
  `reserve_char` varchar(100) NOT NULL default 'R',
  `reserve_charcolor` varchar(7) NOT NULL default '#FFFFFF',
  `reserve_bgcolor` varchar(7) NOT NULL default '#000000',
  `buy_on_click` tinyint(1) NOT NULL default '0',
  `reserve_charsize` tinyint(2) NOT NULL default '1',
  `transparency` tinyint(2) NOT NULL default '0',
  `transparency_grey` tinyint(2) NOT NULL default '0',
  `animated` tinyint(1) default '0',
  `hoverimage` tinyint(1) NOT NULL default '0',
  `dontbuy` tinyint(1) default '0',
  `selection_color` varchar(7) NOT NULL default '#FF962C',
  `unselection_color` varchar(7) NOT NULL default '#969696',
  `group` int(9) NOT NULL default '0',
  `editpixel` tinyint(1)  NOT NULL DEFAULT '0',
  `popup` TINYINT( 1 ) DEFAULT '0' NOT NULL ,
  `popup_height` MEDIUMINT DEFAULT '600' NOT NULL ,
  `popup_width` MEDIUMINT DEFAULT '500' NOT NULL ,
  `real_url` TINYINT( 1 ) DEFAULT '0' NOT NULL ,
  PRIMARY KEY  (`gridid`)
)",'#') ;

DB_query("INSERT INTO `".$dbprefix."grids` VALUES (1, 1, 1, '40', '40', 'Example Grid', '', 'Example Page', 0, 0, '_block_3d_25.png', 1, 0, 0, 0, 1, 1, 1, 1, 250, 1, 1, 0, 0, 1, 0, 1095, 0, 0, 10.00, 'USD', '', 0.00000, 25, 25, 'block_orange.gif', 0, 0.00, 1, 0, 150, 'color: #000066; background-color: #e6ecff; border-width: 1px; border-style: solid; border-color: #003399; padding: 2px; width: 250; ', '_pixel_<br>_title_(_Hits_)', '', '', NULL, 1, 'R', '#FFFFFF', '#000000', 1, 1, 0, 0, 0, 0, 0, '#FFA500', '#969696', 0, 1, 0, 600, 500, 0)",'#');



DB_query("DROP TABLE IF EXISTS `".$dbprefix."ip`",'#');
DB_query("CREATE TABLE `".$dbprefix."ip` (
  `dailydatum` date NOT NULL,
  `ip` varchar(40) NOT NULL default '',
  `system` varchar(255) default NULL,
  `userid` int(11) unsigned default NULL,
  `refid` int(11) unsigned default NULL,
  KEY `dailydatum` (`dailydatum`,`ip`(10))
)",'#') ;

DB_query("DROP TABLE IF EXISTS `".$dbprefix."jobs`",'#');
DB_query("CREATE TABLE `".$dbprefix."jobs` (
  `job_id` int(11) NOT NULL auto_increment,
  `job_name` varchar(255) default NULL,
  `job_active` tinyint(1) default '0',
  `job_date` date default NULL,
  `job_every_weekday` tinyint(1) default NULL,
  `job_every_day` tinyint(2) unsigned zerofill default NULL,
  `job_every_month` tinyint(2) unsigned zerofill default NULL,
  `job_every_seconds` int(11) NOT NULL default '0',
  `job_laststart` datetime default NULL,
  `job_type` tinyint(2) NOT NULL default '0',
  `job_show` mediumint(9) NOT NULL default '0',
  `job_url` varchar(255) default NULL,
  `job_fieldused` tinyint(1) NOT NULL default '0',
  `job_gridpayed` tinyint(1) NOT NULL default '0',
  `job_fieldhighlight` int(11) NOT NULL default '0',
  `job_selfwindow` tinyint(1) NOT NULL default '0',
  `job_email_admin` tinyint(1) NOT NULL default '0',
  `job_email_user` varchar(255) default NULL,
  `job_gridid` int(11) default NULL,
  `job_selected_userid` varchar(255) default NULL,
  `job_selected_field` int(11) default NULL,
  `job_selected_gridid` int(11) default NULL,
  `job_selected_position` varchar(100) default NULL,
  PRIMARY KEY  (`job_id`)
)",'#');

DB_query("DROP TABLE IF EXISTS `".$dbprefix."languages`",'#');
DB_query("CREATE TABLE `".$dbprefix."languages` (
  `code` char(2) NOT NULL default '',
  `language` varchar(20) NOT NULL default '',
  `dec_point` char(3) NOT NULL default ',',
  `thousands` char(3) NOT NULL default '.',
  `charset` varchar(20) NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`code`)
)",'#') ;


DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('ar', 'arabic', ',', '.', 'windows-1256', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('bg', '&#1041;&#1098;&#1083', ',', '.', 'windows-1251', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('cs', '&#268;esky', ',', '.', 'iso-8859-2', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('de', 'Deutsch', ',', '.', 'iso-8859-1', 1)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('da', 'Dansk', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('el', 'greek', ',', '.', 'iso-8859-7', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('en', 'English', '.', ',', 'iso-8859-1', 1)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('es', 'Español', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('et', 'Eesti', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('fi', 'Suomi', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('fr', 'Français', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('he', 'hebrew', ',', '.', 'iso-8859-8-i', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('hu', 'hungarian', ',', '.', 'iso-8859-2', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('id', 'indonesian', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('it', 'Italiano', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('jp', 'Japanese', '.', ',', 'euc-jp', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('ko', '&#54620;&#44397;&#50', ',', '.', 'iso-8859-2', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('lt', 'Lietuvi&#371;', ',', '.', 'windows-1257', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('lv', 'Latviešu', ',', '.', 'windows-1257', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('nl', 'Nederlands', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('no', 'Norsk', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('pl', 'Polski', ',', '.', 'iso-8859-2', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('pt', 'Português', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('ro', 'romanian', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('ru', '&#1056;&#1091;cc&#10', '.', ',', 'windows-1251', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('sv', 'Svenska', ',', '.', 'iso-8859-1', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('th', 'thai', ',', '.', 'tis-620', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('tr', 'Türkçe', ',', '.', 'iso-8859-9', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('zh', 'chinese', ',', '.', 'big5', 0)",'#');
DB_query("INSERT INTO `".$dbprefix."languages` VALUES ('my', '', ',', '.', '', 0)",'#');


DB_query("DROP TABLE IF EXISTS `".$dbprefix."mailinglist`",'#');
DB_query("CREATE TABLE `".$dbprefix."mailinglist` (
  `email` varchar(255) NOT NULL default '',
  `lang` varchar(10) default NULL,
  `timestamp` timestamp NOT NULL,
  UNIQUE KEY `email` (`email`)
)",'#') ;


DB_query("DROP TABLE IF EXISTS `".$dbprefix."prices`",'#');
DB_query("CREATE TABLE `".$dbprefix."prices` (
  `price_id` int(11) NOT NULL auto_increment,
  `price_name` varchar(255) default NULL,
  `price_private` decimal(10,2) NOT NULL default '0.00',
  `price_comm` decimal(10,2) NOT NULL default '0.00',
  `price_color` varchar(7) default NULL,
  PRIMARY KEY  (`price_id`)
)",'#') ;


DB_query("DROP TABLE IF EXISTS `".$dbprefix."referrer`",'#');
DB_query("CREATE TABLE `".$dbprefix."referrer` (
  `refid` int(11) unsigned NOT NULL auto_increment,
  `referrer` varchar(150) NOT NULL default '',
  `hits` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`refid`)
)",'#') ;


DB_query("DROP TABLE IF EXISTS `".$dbprefix."user`",'#');
DB_query("CREATE TABLE `".$dbprefix."user` (
  `userid` int(11) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL default '',
  `url` text NOT NULL,
  `title` text,
  `felder` text NOT NULL,
  `kaesten` mediumint(5) unsigned NOT NULL default '0',
  `bild` mediumblob NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `lang` varchar(10) default NULL,
  `regdat` datetime NOT NULL,
  `uniqueid` varchar(150) default NULL,
  `submit` datetime default NULL,
  `gridid` int(10) unsigned NOT NULL default '1',
  `kosten` varchar(50) default NULL,
  `amount` decimal(10,2) default NULL,
  `currency` char(3) default NULL,
  `vat` decimal(6,2) default NULL,
  `vat_add` tinyint(1) NOT NULL default '0',
  `bildext` varchar(4) default NULL,
  `target` varchar(100) default NULL,
  `enddate` date default NULL,
  `reserved` tinyint(1) NOT NULL default '0',
  `logincode` varbinary(20) default NULL,
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `uniqueid` (`uniqueid`)
)",'#') ;


DB_query("DROP TABLE IF EXISTS `".$dbprefix."zones`",'#');
DB_query("CREATE TABLE `".$dbprefix."zones` (
  `zoneid` int(11) NOT NULL auto_increment,
  `gridid` int(11) NOT NULL default '0',
  `zonetype` tinyint(2) NOT NULL default '0',
  `felder` text,
  PRIMARY KEY  (`zoneid`)
)",'#') ;

return true;
?>