-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 11:55 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `apt_warehouse`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `app_log`
-- 

CREATE TABLE `app_log` (
  `id_app_log` int(11) NOT NULL auto_increment,
  `al_url` varchar(255) NOT NULL,
  `al_user` varchar(255) NOT NULL,
  `al_ip_address` varchar(20) NOT NULL,
  `al_update_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_app_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `app_log`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `apt_bill`
-- 

CREATE TABLE `apt_bill` (
  `id_bill` int(11) NOT NULL auto_increment,
  `pay_code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `transaction_by` varchar(255) NOT NULL,
  `status` enum('open','closed') NOT NULL default 'open',
  `discount` decimal(20,3) NOT NULL,
  `discount_rp` decimal(20,2) NOT NULL,
  `tax` decimal(20,3) NOT NULL,
  `tax_rp` decimal(20,2) NOT NULL,
  `note` varchar(255) NOT NULL,
  `isvoid` enum('yes','no') NOT NULL default 'no',
  `paid_date` date NOT NULL,
  `update_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `update_by` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_bill`),
  KEY `pay_code` (`pay_code`),
  KEY `transaction_by` (`transaction_by`),
  KEY `paid_date` (`paid_date`),
  KEY `isvoid` (`isvoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `apt_bill`
-- 

INSERT INTO `apt_bill` VALUES (1, '20140801020008', 0, 0.00, 'admin', 'open', 0.000, 0.00, 0.000, 0.00, '', 'no', '0000-00-00', '2014-08-01 10:00:08', 'admin');
INSERT INTO `apt_bill` VALUES (2, '20140801054823', 0, 0.00, 'admin', 'open', 0.000, 0.00, 0.000, 0.00, '', 'no', '0000-00-00', '2014-08-01 13:48:23', 'admin');
INSERT INTO `apt_bill` VALUES (3, '20140801055138', 0, 0.00, 'admin', 'open', 0.000, 0.00, 0.000, 0.00, '', 'no', '0000-00-00', '2014-08-01 13:51:38', 'admin');
INSERT INTO `apt_bill` VALUES (4, '20140801055321', 0, 0.00, 'admin', 'open', 0.000, 0.00, 0.000, 0.00, '', 'no', '0000-00-00', '2014-08-01 13:53:21', 'admin');
INSERT INTO `apt_bill` VALUES (5, '20140801124253', 0, 0.00, 'admin', 'open', 0.000, 0.00, 0.000, 0.00, '', 'no', '0000-00-00', '2014-08-01 20:42:53', 'admin');
INSERT INTO `apt_bill` VALUES (6, '20140801062542', 6, 2314000.00, 'admin', '', 0.000, 0.00, 0.000, 0.00, '', 'no', '2014-08-01', '2014-08-02 02:25:42', 'admin');
INSERT INTO `apt_bill` VALUES (7, '20140801063412', 6, 210000.00, 'admin', 'closed', 0.000, 0.00, 0.000, 0.00, '', 'no', '2014-08-01', '2014-08-02 02:34:12', 'admin');
INSERT INTO `apt_bill` VALUES (8, '20140801063548', 10, 350000.00, 'admin', 'closed', 0.000, 0.00, 0.000, 0.00, '', 'no', '2014-08-01', '2014-08-02 02:35:48', 'admin');
INSERT INTO `apt_bill` VALUES (9, '20140801065919', 40, 1400000.00, 'admin', 'closed', 0.000, 0.00, 0.000, 0.00, '', 'no', '2014-08-01', '2014-08-02 02:59:19', 'admin');
INSERT INTO `apt_bill` VALUES (10, '20140801071917', 4, 162000.00, 'admin', 'closed', 0.000, 0.00, 0.000, 0.00, '', 'no', '2014-08-01', '2014-08-02 03:19:17', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `apt_bill_detail`
-- 

CREATE TABLE `apt_bill_detail` (
  `id_apt_dtl` int(11) NOT NULL auto_increment,
  `id_bill` int(11) NOT NULL,
  `aptd_code_obat` varchar(25) NOT NULL,
  `aptd_jum` int(11) NOT NULL,
  `aptd_harga` decimal(20,2) NOT NULL,
  `aptd_tax` decimal(20,2) NOT NULL,
  `aptd_disc` decimal(20,2) NOT NULL,
  `aptd_update_by` varchar(255) NOT NULL,
  `aptd_update_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_apt_dtl`),
  KEY `id_bill` (`id_bill`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `apt_bill_detail`
-- 

INSERT INTO `apt_bill_detail` VALUES (1, 1, '43573456346', 10, 35000.00, 3500.00, 0.00, 'admin', '2014-08-01 10:00:08');
INSERT INTO `apt_bill_detail` VALUES (2, 2, '43573456346', 1, 35000.00, 3500.00, 0.00, 'admin', '2014-08-01 13:48:23');
INSERT INTO `apt_bill_detail` VALUES (3, 3, '8990333162051', 5, 100000.00, 10000.00, 0.00, 'admin', '2014-08-01 13:51:38');
INSERT INTO `apt_bill_detail` VALUES (4, 4, '8996006856203', 10, 7000.00, 700.00, 0.00, 'admin', '2014-08-01 13:53:21');
INSERT INTO `apt_bill_detail` VALUES (5, 4, '43573456346', 6, 35000.00, 3500.00, 0.00, 'admin', '2014-08-01 13:54:32');
INSERT INTO `apt_bill_detail` VALUES (6, 4, '23451535', 1, 2000000.00, 200000.00, 0.00, 'admin', '2014-08-01 14:23:31');
INSERT INTO `apt_bill_detail` VALUES (7, 5, '8990333162051', 4, 100000.00, 10000.00, 0.00, 'admin', '2014-08-01 20:42:53');
INSERT INTO `apt_bill_detail` VALUES (8, 5, '7897y9789798', 7, 20000.00, 2000.00, 0.00, 'admin', '2014-08-01 20:56:29');
INSERT INTO `apt_bill_detail` VALUES (9, 6, '8990333162051', 3, 100000.00, 10000.00, 0.00, 'admin', '2014-08-02 02:25:42');
INSERT INTO `apt_bill_detail` VALUES (10, 6, '8996006856203', 2, 7000.00, 700.00, 0.00, 'admin', '2014-08-02 02:25:51');
INSERT INTO `apt_bill_detail` VALUES (11, 6, '23451535', 1, 2000000.00, 200000.00, 0.00, 'admin', '2014-08-02 02:26:56');
INSERT INTO `apt_bill_detail` VALUES (12, 7, '43573456346', 6, 35000.00, 3500.00, 0.00, 'admin', '2014-08-02 02:34:12');
INSERT INTO `apt_bill_detail` VALUES (13, 8, '43573456346', 10, 35000.00, 3500.00, 0.00, 'admin', '2014-08-02 02:35:48');
INSERT INTO `apt_bill_detail` VALUES (14, 9, '43573456346', 40, 35000.00, 3500.00, 0.00, 'admin', '2014-08-02 02:59:19');
INSERT INTO `apt_bill_detail` VALUES (15, 10, '8996006856203', 1, 7000.00, 700.00, 0.00, 'admin', '2014-08-02 03:19:17');
INSERT INTO `apt_bill_detail` VALUES (16, 10, '8990333162051', 1, 100000.00, 10000.00, 0.00, 'admin', '2014-08-02 03:19:29');
INSERT INTO `apt_bill_detail` VALUES (17, 10, '43573456346', 1, 35000.00, 3500.00, 0.00, 'admin', '2014-08-02 03:19:40');
INSERT INTO `apt_bill_detail` VALUES (18, 10, '7897y9789798', 1, 20000.00, 2000.00, 0.00, 'admin', '2014-08-02 03:19:52');

-- --------------------------------------------------------

-- 
-- Table structure for table `apt_bill_struk`
-- 

CREATE TABLE `apt_bill_struk` (
  `id_apt_struk` int(11) NOT NULL auto_increment,
  `apts_id_bill` int(11) NOT NULL,
  `apts_struk` blob NOT NULL,
  `apts_void` enum('yes','no') NOT NULL,
  `apts_update_by` varchar(255) NOT NULL,
  `apts_update_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_apt_struk`),
  KEY `apts_id_bill` (`apts_id_bill`,`apts_void`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `apt_bill_struk`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `apt_jenis`
-- 

CREATE TABLE `apt_jenis` (
  `id_apt_jns` int(11) NOT NULL auto_increment,
  `apt_code` varchar(10) NOT NULL,
  `apt_jenis` varchar(100) NOT NULL,
  `apt_void_status` enum('yes','no') NOT NULL default 'no',
  PRIMARY KEY  (`id_apt_jns`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `apt_jenis`
-- 

INSERT INTO `apt_jenis` VALUES (1, 'ALK', 'Alat Kesehatan', 'no');
INSERT INTO `apt_jenis` VALUES (2, 'CRN', 'Cairan', 'no');
INSERT INTO `apt_jenis` VALUES (3, 'CPS', 'Capsul', 'no');
INSERT INTO `apt_jenis` VALUES (4, 'INF', 'Infus', 'no');
INSERT INTO `apt_jenis` VALUES (5, 'INJ', 'Injeksi', 'no');
INSERT INTO `apt_jenis` VALUES (6, 'TBL', 'Tablet', 'no');
INSERT INTO `apt_jenis` VALUES (7, 'NRK', 'Narkotika', 'no');
INSERT INTO `apt_jenis` VALUES (8, 'OBS', 'Obat Bebas', 'no');
INSERT INTO `apt_jenis` VALUES (9, 'OBK', 'Obat Kanker', 'no');
INSERT INTO `apt_jenis` VALUES (10, 'OBKH', 'Obat Khusus', 'no');
INSERT INTO `apt_jenis` VALUES (11, 'SPT', 'Suppositoria', 'no');
INSERT INTO `apt_jenis` VALUES (12, 'SYP', 'Syrup', 'no');
INSERT INTO `apt_jenis` VALUES (13, 'ZLF', 'Zalf', 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `apt_obat`
-- 

CREATE TABLE `apt_obat` (
  `id_obat` int(11) NOT NULL auto_increment,
  `obt_barcode` varchar(50) NOT NULL,
  `obt_name` varchar(255) NOT NULL,
  `obt_jenis` varchar(10) NOT NULL,
  `obt_jumlah` int(11) NOT NULL,
  `obt_harga` decimal(20,2) NOT NULL,
  `obt_void_status` enum('yes','no') NOT NULL default 'no',
  `obt_update_by` varchar(255) NOT NULL,
  `obt_update_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id_obat`),
  KEY `obt_barcode` (`obt_barcode`),
  KEY `obt_name` (`obt_name`),
  KEY `obt_jenis` (`obt_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `apt_obat`
-- 

INSERT INTO `apt_obat` VALUES (1, '43573456346', '', 'CRN', 90, 0.00, 'yes', 'admin', '2014-07-23 10:07:46');
INSERT INTO `apt_obat` VALUES (2, '43573456346', '', 'CRN', 90, 0.00, 'yes', 'admin', '2014-07-23 10:13:09');
INSERT INTO `apt_obat` VALUES (3, '43573456346', 'ingus', 'CRN', 9, 35000.00, 'no', 'admin', '2014-07-23 10:13:57');
INSERT INTO `apt_obat` VALUES (5, '43573456346', 'ingus', 'CRN', 90, 346433462746.00, 'yes', 'admin', '2014-07-23 10:15:46');
INSERT INTO `apt_obat` VALUES (6, '7897y9789798', 'jarum suntik', 'ALK', 54, 20000.00, 'no', 'admin', '2014-07-23 14:27:37');
INSERT INTO `apt_obat` VALUES (7, '23451535', 'morphine', 'NRK', 9, 2000000.00, 'yes', 'admin', '2014-07-23 14:28:08');
INSERT INTO `apt_obat` VALUES (9, '8990333162051', '', 'ALK', 12, 0.00, 'yes', 'admin', '2014-07-28 10:26:14');
INSERT INTO `apt_obat` VALUES (10, '8990333162051', 'Kalpanax', 'CPS', 11, 100000.00, 'no', 'admin', '2014-07-28 10:27:12');
INSERT INTO `apt_obat` VALUES (11, '8996006856203', 'teh botol', 'INF', 2, 7000.00, 'no', 'admin', '2014-07-28 10:34:19');
INSERT INTO `apt_obat` VALUES (12, '8996006856203', 'test', 'ALK', 3, 10000.00, 'yes', 'admin', '2014-07-28 11:20:41');

-- --------------------------------------------------------

-- 
-- Table structure for table `apt_session`
-- 

CREATE TABLE `apt_session` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 
-- Dumping data for table `apt_session`
-- 

INSERT INTO `apt_session` VALUES ('2603f95ad1e63895b7ee70f958106ffc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36', 1407546789, '');
INSERT INTO `apt_session` VALUES ('b8498624481aa2c93866dae8c5894270', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36', 1407714879, '');
INSERT INTO `apt_session` VALUES ('ba8cc1fcfcad1804b8b760c9497987b4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36', 1407500160, 'a:2:{s:9:"user_data";s:0:"";s:10:"login_data";O:8:"stdClass":10:{s:7:"id_user";s:1:"1";s:11:"ur_password";s:40:"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3";s:7:"ur_nama";s:7:"testing";s:8:"ur_email";s:14:"test@tmail.com";s:8:"ur_level";s:4:"user";s:11:"ur_position";s:7:"cashier";s:9:"ur_telpon";s:10:"0889798687";s:11:"ur_username";s:4:"baru";s:11:"ur_approved";s:3:"yes";s:13:"ur_approve_by";s:5:"admin";}}');
INSERT INTO `apt_session` VALUES ('e8186a5fc2c69193124da29d0cf084a6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36', 1407547475, 'a:2:{s:9:"user_data";s:0:"";s:10:"login_data";O:8:"stdClass":10:{s:7:"id_user";s:1:"1";s:11:"ur_password";s:40:"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3";s:7:"ur_nama";s:7:"testing";s:8:"ur_email";s:14:"test@tmail.com";s:8:"ur_level";s:4:"user";s:11:"ur_position";s:7:"cashier";s:9:"ur_telpon";s:10:"0889798687";s:11:"ur_username";s:4:"baru";s:11:"ur_approved";s:3:"yes";s:13:"ur_approve_by";s:5:"admin";}}');

-- --------------------------------------------------------

-- 
-- Table structure for table `apt_user`
-- 

CREATE TABLE `apt_user` (
  `id_user` int(11) NOT NULL auto_increment,
  `ur_password` varchar(255) NOT NULL,
  `ur_nama` varchar(100) NOT NULL,
  `ur_email` varchar(100) NOT NULL,
  `ur_level` varchar(255) character set latin1 collate latin1_general_ci NOT NULL default 'user',
  `ur_position` varchar(100) NOT NULL,
  `ur_telpon` varchar(20) default NULL,
  `ur_username` varchar(30) NOT NULL,
  `ur_approved` enum('yes','no') NOT NULL default 'no',
  `ur_approve_by` varchar(255) default NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `apt_user`
-- 

INSERT INTO `apt_user` VALUES (1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'testing', 'test@tmail.com', 'user', 'cashier', '0889798687', 'baru', 'yes', 'admin');
