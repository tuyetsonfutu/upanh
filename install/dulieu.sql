DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `ADMINID` bigint(20) NOT NULL auto_increment,
  `email` varchar(80) NOT NULL default '',
  `username` varchar(80) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`ADMINID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
  `AID` bigint(30) NOT NULL auto_increment,
  `description` varchar(200) NOT NULL default '',
  `code` text NOT NULL,
  `active` enum('1','0') NOT NULL default '1',
  PRIMARY KEY  (`AID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `advertisements` VALUES (1, '300 x 250 pixels', '<div style="width:300px; height:250px; border:1px solid #DFDFDF;" align="center"><br/><br/><br/><br/><br/><br/>Chèn Quảng Cáo Của Bạn Vào Đây</div>', '1');
INSERT INTO `advertisements` VALUES (2, '728 x 90 pixels', '<div style="width:728px; height:90px; border:1px solid #DFDFDF;" align="center"><br/><br/>Chèn Quảng Cáo Của Bạn Vào Đây</div>', '1');
INSERT INTO `advertisements` VALUES (3, 'Nhạy cảm 300 x 250 pixels', '<div style="width:300px; height:250px; border:1px solid #DFDFDF;" align="center"><br/><br/><br/><br/><br/><br/>Quảng Cáo Nhạy Cảm</div>', '1');
INSERT INTO `advertisements` VALUES (4, 'Nhạy cảm 728 x 90 pixels', '<div style="width:728px; height:90px; border:1px solid #DFDFDF;" align="center"><br/><br/>Quảng Cáo Nhạy Cảm</div>', '1');


DROP TABLE IF EXISTS `bans_ips`;
CREATE TABLE `bans_ips` (
  `ip` varchar(20) NOT NULL,
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `channels`;
CREATE TABLE `channels` (
  `CID` bigint(20) NOT NULL auto_increment,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY  (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `channels` VALUES (1, 'Hình ảnh');
INSERT INTO `channels` VALUES (2, 'Video');


DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `setting` varchar(60) NOT NULL default '',
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `config` VALUES ('site_email', 'hotro.facevui.com');
INSERT INTO `config` VALUES ('site_name', 'Face Vui');
INSERT INTO `config` VALUES ('maximum_results', '1000000');
INSERT INTO `config` VALUES ('items_per_page', '12');
INSERT INTO `config` VALUES ('approve_stories', '0');
INSERT INTO `config` VALUES ('metadescription', 'Truyện hài, xem ảnh hài, truyện bựa,truyện hài, truyện cười, truyện tranh, truyện bựa, video hài, clip hài, video cười');
INSERT INTO `config` VALUES ('metakeywords', 'Truyện hài, xem ảnh hài, truyện bựa,truyện hài, truyện cười, truyện tranh, truyện bựa, video hài, clip hài, video cười');
INSERT INTO `config` VALUES ('ver', '6.2 Ultimate');
INSERT INTO `config` VALUES ('FACEBOOK_PROFILE', '');
INSERT INTO `config` VALUES ('myes', '5');
INSERT INTO `config` VALUES ('mno', '5');
INSERT INTO `config` VALUES ('twitter', '');
INSERT INTO `config` VALUES ('FACEBOOK_APP_ID', '');
INSERT INTO `config` VALUES ('FACEBOOK_SECRET', '');
INSERT INTO `config` VALUES ('enable_fc', '1');
INSERT INTO `config` VALUES ('mtrend', '10');
INSERT INTO `config` VALUES ('quota', '15');
INSERT INTO `config` VALUES ('TWITTER_APP_ID', '');
INSERT INTO `config` VALUES ('TWITTER_APP_SECRET', '');
INSERT INTO `config` VALUES ('FACEBOOK_ADMIN', '');
INSERT INTO `config` VALUES ('lwm', '1');
INSERT INTO `config` VALUES ('twm', '0');
INSERT INTO `config` VALUES ('AUTOSCROLL', '1');
INSERT INTO `config` VALUES ('thumbs', '1');
INSERT INTO `config` VALUES ('displaywm', '1');
INSERT INTO `config` VALUES ('TC', '0');
INSERT INTO `config` VALUES ('safemode', '1');
INSERT INTO `config` VALUES ('ganalytics', '');
INSERT INTO `config` VALUES ('vupload', '1');
INSERT INTO `config` VALUES ('tupload', '1');
INSERT INTO `config` VALUES ('fixenabled', '0');
INSERT INTO `config` VALUES ('RSS', '1');
INSERT INTO `config` VALUES ('trendingenabled', '1');
INSERT INTO `config` VALUES ('voteforvisitor', '1');
INSERT INTO `config` VALUES ('SEO', '1');
INSERT INTO `config` VALUES ('truncate', '0');
INSERT INTO `config` VALUES ('recommended', '2');
INSERT INTO `config` VALUES ('rhome', '0');
INSERT INTO `config` VALUES ('populargags', '0');
INSERT INTO `config` VALUES ('wmfont', 'times.ttf');
INSERT INTO `config` VALUES ('fsize', '12');
INSERT INTO `config` VALUES ('topposts', '1');
INSERT INTO `config` VALUES ('topgags', '0');
INSERT INTO `config` VALUES ('channels', '1');
INSERT INTO `config` VALUES ('blackr', '0');
INSERT INTO `config` VALUES ('blackb', '0');
INSERT INTO `config` VALUES ('blackg', '0');
INSERT INTO `config` VALUES ('whiter', '238');
INSERT INTO `config` VALUES ('whiteb', '238');
INSERT INTO `config` VALUES ('whiteg', '238');
INSERT INTO `config` VALUES ('index', '2');
INSERT INTO `config` VALUES ('regredirect', '0');
INSERT INTO `config` VALUES ('postfolder', '/post/');
INSERT INTO `config` VALUES ('up_points', '10');
INSERT INTO `config` VALUES ('view_points', '1');
INSERT INTO `config` VALUES ('share1', '1');
INSERT INTO `config` VALUES ('share2', '2');
INSERT INTO `config` VALUES ('NSFWADS', '0');
INSERT INTO `config` VALUES ('mobilemode', '1');
INSERT INTO `config` VALUES ('mobile_per_page', '5');
INSERT INTO `config` VALUES ('m_url', 'http://m.facevui.com');


DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `USERID` bigint(20) NOT NULL auto_increment,
  `email` varchar(80) NOT NULL default '',
  `username` varchar(80) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `pwd` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL default '',
  `description` text NOT NULL,
  `posts` int(20) NOT NULL default '0',
  `yourviewed` int(20) NOT NULL default '0',
  `youviewed` bigint(20) NOT NULL default '0',
  `addtime` varchar(20) NOT NULL default '',
  `lastlogin` varchar(20) NOT NULL default '',
  `verified` char(1) NOT NULL default '1',
  `status` enum('1','0') NOT NULL default '1',
  `profilepicture` varchar(100) NOT NULL default '',
  `remember_me_key` varchar(32) default NULL,
  `remember_me_time` datetime default NULL,
  `ip` varchar(20) NOT NULL,
  `lip` varchar(20) NOT NULL,
  `website` varchar(200) NOT NULL,
  `news` int(1) NOT NULL default '0',
  `mylang` varchar(20) NOT NULL,
  `color1` varchar(6) NOT NULL default '555555',
  `filter` bigint(1) NOT NULL default '1',
  `points` bigint(20) NOT NULL,
  PRIMARY KEY  (`USERID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `members_passcode`;
CREATE TABLE `members_passcode` (
  `USERID` bigint(20) NOT NULL default '0',
  `code` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`USERID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `members_verifycode`;
CREATE TABLE `members_verifycode` (
  `USERID` bigint(20) NOT NULL default '0',
  `code` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`USERID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `members_verifycode` VALUES (0, 'h394Y1328501678');


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `PID` bigint(20) NOT NULL auto_increment,
  `USERID` bigint(20) NOT NULL default '0',
  `story` text NOT NULL,
  `contents` text NOT NULL,
  `tags` varchar(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `CID` bigint(20) NOT NULL,
  `nsfw` int(1) NOT NULL default '0',
  `pic` varchar(20) NOT NULL,
  `youtube_key` varchar(20) NOT NULL,
  `url` text NOT NULL,
  `time_added` varchar(20) default NULL,
  `date_added` date NOT NULL default '0000-00-00',
  `active` char(1) NOT NULL default '',
  `phase` bigint(1) NOT NULL default '0',
  `favclicks` bigint(50) NOT NULL default '0',
  `last_viewed` varchar(20) NOT NULL default '',
  `postviewed` bigint(20) NOT NULL default '0',
  `mod_yes` bigint(20) NOT NULL default '0',
  `mod_no` bigint(20) NOT NULL default '0',
  `pip` varchar(20) NOT NULL,
  `pip2` varchar(20) NOT NULL,
  `unfavclicks` bigint(50) NOT NULL default '0',
  `fix` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`PID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `posts_favorited`;
CREATE TABLE `posts_favorited` (
  `FID` bigint(20) NOT NULL auto_increment,
  `USERID` bigint(25) NOT NULL default '0',
  `PID` bigint(25) NOT NULL default '0',
  PRIMARY KEY  (`FID`),
  UNIQUE KEY `USERID` (`USERID`,`PID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `posts_reports`;
CREATE TABLE `posts_reports` (
  `RID` bigint(20) NOT NULL auto_increment,
  `PID` bigint(20) NOT NULL default '0',
  `time` varchar(20) default NULL,
  `ip` varchar(20) NOT NULL,
  `reason` bigint(1) NOT NULL,
  PRIMARY KEY  (`RID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `posts_unfavorited`;
CREATE TABLE `posts_unfavorited` (
  `FID` bigint(20) NOT NULL auto_increment,
  `USERID` bigint(25) NOT NULL default '0',
  `PID` bigint(25) NOT NULL default '0',
  PRIMARY KEY  (`FID`),
  UNIQUE KEY `USERID` (`USERID`,`PID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `static`;
CREATE TABLE `static` (
  `ID` bigint(30) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `value` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `static` VALUES (1, 'Điều khoản', 'Nhập nội dung điều khoản sử dụng vào đây.<br><br>\r\n\r\nĐược phép sử dụng HTML.');
INSERT INTO `static` VALUES (2, 'Chính sách bảo mật', 'Nhập nội dung chính sách bảo mật vào đây.<br><br>\r\n\r\nĐược phép sử dụng HTML.');
INSERT INTO `static` VALUES (3, 'Giới thiệu', 'Nhập nội dung giới thiệu website vào đây.<br><br>\r\n\r\nĐược phép sử dụng HTML.');
INSERT INTO `static` VALUES (4, 'Quy định', 'Nhập nội dung quy định sử dụng vào đây.<br><br>\r\n\r\nĐược phép sử dụng HTML.');
INSERT INTO `static` VALUES (5, 'Hỏi đáp', 'Nhập nội dung hỏi đáp vào đây.<br><br>\r\n\r\nĐược phép sử dụng HTML.');
