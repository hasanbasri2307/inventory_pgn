/*
Navicat MySQL Data Transfer

Source Server         : 192.168.33.10
Source Server Version : 50547
Source Host           : 192.168.33.10:3306
Source Database       : db_eximp

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-24 00:29:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('3', 'Drilling and Production', '2016-04-18 01:34:23', '2016-04-18 01:34:23');

-- ----------------------------
-- Table structure for delivery_order
-- ----------------------------
DROP TABLE IF EXISTS `delivery_order`;
CREATE TABLE `delivery_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_do` varchar(20) NOT NULL,
  `do_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `po_id` int(11) unsigned NOT NULL,
  `file_do` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `do_to_po` (`po_id`),
  CONSTRAINT `do_to_po` FOREIGN KEY (`po_id`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of delivery_order
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `d_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'IT', '2016-04-17 02:25:14', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('2', 'HRD', '2016-04-17 02:25:30', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('3', 'Finance', '2016-04-17 02:25:38', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('4', 'Drilling', '2016-04-17 02:25:47', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('5', 'GA', '2016-04-17 02:25:56', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('6', 'Accounting', '2016-04-17 02:26:03', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('7', 'Logistik', '2016-04-17 02:26:26', '0000-00-00 00:00:00');
INSERT INTO `department` VALUES ('8', 'SCM', '2016-04-17 02:30:23', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for detail_do
-- ----------------------------
DROP TABLE IF EXISTS `detail_do`;
CREATE TABLE `detail_do` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `do_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ddo_to_product` (`product_id`),
  KEY `ddo_to_do` (`do_id`),
  CONSTRAINT `ddo_to_do` FOREIGN KEY (`do_id`) REFERENCES `delivery_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ddo_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_do
-- ----------------------------

-- ----------------------------
-- Table structure for detail_po
-- ----------------------------
DROP TABLE IF EXISTS `detail_po`;
CREATE TABLE `detail_po` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `po_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dto_to_po` (`po_id`),
  KEY `dpo_to_product` (`product_id`),
  CONSTRAINT `dpo_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dto_to_po` FOREIGN KEY (`po_id`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_po
-- ----------------------------

-- ----------------------------
-- Table structure for detail_ro
-- ----------------------------
DROP TABLE IF EXISTS `detail_ro`;
CREATE TABLE `detail_ro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ro_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `qty_req` int(10) NOT NULL,
  `qty_approve` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dro_to_ro` (`ro_id`),
  KEY `dro_to_product` (`product_id`),
  CONSTRAINT `dro_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dro_to_ro` FOREIGN KEY (`ro_id`) REFERENCES `request_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_ro
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `sub_cat_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `p_to_subcat` (`sub_cat_id`),
  CONSTRAINT `p_to_subcat` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'Pipa 10 mm', '50000000', 'pipa untuk drilling', '6', '2016-04-27 22:19:15', '2016-04-27 22:19:15');
INSERT INTO `product` VALUES ('2', 'Bor laut', '120000000', 'bor untuk laut', '7', '2016-04-27 22:20:14', '2016-04-27 22:20:14');
INSERT INTO `product` VALUES ('3', 'Drum minyak', '75000000', 'drum buat minyak', '7', '2016-04-27 22:22:19', '2016-04-27 22:22:19');

-- ----------------------------
-- Table structure for purchase_order
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE `purchase_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_po` varchar(20) NOT NULL,
  `ro_id` int(11) unsigned NOT NULL,
  `po_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `vendor_id` int(11) unsigned NOT NULL,
  `status_po` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `po_to_ro` (`ro_id`),
  KEY `po_to_vendor` (`vendor_id`),
  CONSTRAINT `po_to_ro` FOREIGN KEY (`ro_id`) REFERENCES `request_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `po_to_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------

-- ----------------------------
-- Table structure for request_order
-- ----------------------------
DROP TABLE IF EXISTS `request_order`;
CREATE TABLE `request_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_ro` varchar(20) NOT NULL,
  `date_ro` datetime NOT NULL,
  `req_by` int(11) unsigned NOT NULL,
  `dep_id` int(11) unsigned NOT NULL,
  `status_ro` varchar(1) NOT NULL,
  `reject_reason` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ro_to_user` (`req_by`),
  KEY `ro_to_dep` (`dep_id`),
  CONSTRAINT `ro_to_dep` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ro_to_user` FOREIGN KEY (`req_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of request_order
-- ----------------------------

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dep_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `stock` int(10) NOT NULL,
  `status_stock` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `stock_to_product` (`product_id`),
  KEY `stock_to_dep` (`dep_id`),
  CONSTRAINT `stock_to_dep` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stock_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock
-- ----------------------------

-- ----------------------------
-- Table structure for sub_category
-- ----------------------------
DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sub_cat_name` varchar(100) NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `subcat_to_cat` (`cat_id`),
  CONSTRAINT `subcat_to_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sub_category
-- ----------------------------
INSERT INTO `sub_category` VALUES ('6', 'Production Surface Equipment', '3', '2016-04-18 01:34:23', '2016-04-18 01:34:23');
INSERT INTO `sub_category` VALUES ('7', 'Derricks and Accesories', '3', '2016-04-18 01:34:23', '2016-04-18 01:34:23');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('administrator','staff','manager') COLLATE utf8_unicode_ci NOT NULL,
  `status_user` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep_id` int(11) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_to_dep` (`dep_id`),
  CONSTRAINT `users_to_dep` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Hasan Basri', 'hasanbasri2307@gmail.com', '$2y$10$0DBcKPFxKp2tcsrzWmzWaOfKm7uLvZWxMR9PByGJeQ8Hy53LtvBUq', 'administrator', '1', '8', 'L9mCvu6VAZSJb3fpUlF4VHhcMos7alzrynawkgYRk7LT2QfTh5FtYuJK0zSo', '2016-04-17 13:31:33', '2016-05-24 00:21:57');
INSERT INTO `users` VALUES ('2', 'Arif', 'arif@gmail.com', '$2y$10$IOjRovqtopSdve4SrtRKGuwzI5l4vYy94TgXpl9xIfNnPIkMZdJ1m', 'manager', '1', '8', 'tUt8WuYd528Xdu3y0pB4sR0FC5nVQf23WMO5gkVWPOqMmSK1yn1FjPRtivln', '2016-04-17 15:44:12', '2016-05-24 00:14:29');
INSERT INTO `users` VALUES ('4', 'Hendra Prastiawan', 'hendra@gmail.com', '$2y$10$VQn6SLN51437VNwhhwK6megRDzLRkX1cOy5jT2uRfLJ.SQkgtS0Au', 'staff', '1', '8', '3qfsTMgrgzMzaliZUWrgtNkxIP0cNKsyaDnWyG6rtW53K1viTMceCzrDYcaJ', '2016-04-17 20:54:15', '2016-05-24 00:26:55');
INSERT INTO `users` VALUES ('5', 'Riki', 'riki@gmail.com', '$2y$10$DzhF2UFJHvnKXm5g6XKMuuwsiL/BKmSAEE1Wjlh5.mYNJdtSn6NIC', 'staff', '1', '3', 'DvEZsyiM4sXTvAVTNoJLKIMenbEzHqmbIV6D03lMFnQVWpMsyIo6PF1ZLZ0j', '2016-04-27 21:53:15', '2016-05-23 16:03:04');
INSERT INTO `users` VALUES ('6', 'Suci', 'suci@gmail.com', '$2y$10$5gnbFtiUmOuDvbdmz0CRN.yo9NtxD92Y6Mf3qNVPWeaaPXmoJXMLu', 'staff', '1', '7', 'iL4ZMlhAEA7mv9GVZHlr2GS8qxMiOhWsjiCGvxmj4q5AhiNK7pzmYYrzi5EE', '2016-05-17 23:52:35', '2016-05-23 18:06:58');
INSERT INTO `users` VALUES ('8', 'beno', 'beno@gmail.com', '$2y$10$7nLW841cJNOqft.UdqQwa.PQDihegy5XWtWuldFkrHKyZd9carjrq', 'staff', '1', '1', 'mOw7u0eVzNPwpu5jCeZdpU3OA2c9MeqJ7Con9sxV4NFisfVWhaqI8xNUFrjJ', '2016-05-23 16:01:04', '2016-05-24 00:28:38');

-- ----------------------------
-- Table structure for vendor
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `v_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES ('1', 'PT. Sinarmas Jaya', '0219995213', '0211234255', 'Jalan kemanggisan 5. Jakarta Barat', '2016-05-22 21:48:27', '2016-05-22 21:48:27');
INSERT INTO `vendor` VALUES ('2', 'PT. Nusa Tiga Pipa', '021882355', '021423564', 'Jalan bandung raya no.15 , Bandung, Jawa Barat', '2016-05-22 21:49:02', '2016-05-22 21:49:02');
