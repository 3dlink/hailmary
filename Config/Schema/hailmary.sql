/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : hailmary

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2016-04-15 00:24:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for codes
-- ----------------------------
DROP TABLE IF EXISTS `codes`;
CREATE TABLE `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `pass_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of codes
-- ----------------------------

-- ----------------------------
-- Table structure for games
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pass_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of games
-- ----------------------------

-- ----------------------------
-- Table structure for login_tokens
-- ----------------------------
DROP TABLE IF EXISTS `login_tokens`;
CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for passes
-- ----------------------------
DROP TABLE IF EXISTS `passes`;
CREATE TABLE `passes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `top` int(11) DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `new_price` float DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of passes
-- ----------------------------

-- ----------------------------
-- Table structure for texts
-- ----------------------------
DROP TABLE IF EXISTS `texts`;
CREATE TABLE `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text,
  `faq` text,
  `contact` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of texts
-- ----------------------------
INSERT INTO `texts` VALUES ('1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', '045ce212b12837b6a68f9eeda3ecf242', '83132671d46057c17213eef021af2b55', 'admin@admin.com', 'Admin', '', '1', '1', '', '2016-03-29 09:55:25', '2016-04-12 19:04:38');

-- ----------------------------
-- Table structure for user_groups
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('1', 'Admin', 'Admin', '0', '2016-03-29 09:55:26', '2016-03-29 09:55:26');
INSERT INTO `user_groups` VALUES ('2', 'User', 'User', '1', '2016-03-29 09:55:26', '2016-03-29 09:55:26');
INSERT INTO `user_groups` VALUES ('3', 'Guest', 'Guest', '0', '2016-03-29 09:55:26', '2016-03-29 09:55:26');

-- ----------------------------
-- Table structure for user_group_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_group_permissions`;
CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_group_permissions
-- ----------------------------
INSERT INTO `user_group_permissions` VALUES ('1', '1', 'Pages', 'display', '1');
INSERT INTO `user_group_permissions` VALUES ('2', '2', 'Pages', 'display', '1');
INSERT INTO `user_group_permissions` VALUES ('3', '3', 'Pages', 'display', '1');
INSERT INTO `user_group_permissions` VALUES ('4', '1', 'UserGroupPermissions', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('5', '2', 'UserGroupPermissions', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('6', '3', 'UserGroupPermissions', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('7', '1', 'UserGroupPermissions', 'update', '1');
INSERT INTO `user_group_permissions` VALUES ('8', '2', 'UserGroupPermissions', 'update', '0');
INSERT INTO `user_group_permissions` VALUES ('9', '3', 'UserGroupPermissions', 'update', '0');
INSERT INTO `user_group_permissions` VALUES ('10', '1', 'UserGroups', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('11', '2', 'UserGroups', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('12', '3', 'UserGroups', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('13', '1', 'UserGroups', 'addGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('14', '2', 'UserGroups', 'addGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('15', '3', 'UserGroups', 'addGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('16', '1', 'UserGroups', 'editGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('17', '2', 'UserGroups', 'editGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('18', '3', 'UserGroups', 'editGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('19', '1', 'UserGroups', 'deleteGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('20', '2', 'UserGroups', 'deleteGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('21', '3', 'UserGroups', 'deleteGroup', '0');
INSERT INTO `user_group_permissions` VALUES ('22', '1', 'Users', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('23', '2', 'Users', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('24', '3', 'Users', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('25', '1', 'Users', 'viewUser', '1');
INSERT INTO `user_group_permissions` VALUES ('26', '2', 'Users', 'viewUser', '0');
INSERT INTO `user_group_permissions` VALUES ('27', '3', 'Users', 'viewUser', '0');
INSERT INTO `user_group_permissions` VALUES ('28', '1', 'Users', 'myprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('29', '2', 'Users', 'myprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('30', '3', 'Users', 'myprofile', '0');
INSERT INTO `user_group_permissions` VALUES ('31', '1', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('32', '2', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('33', '3', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('34', '1', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('35', '2', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('36', '3', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('37', '1', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('38', '2', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('39', '3', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('40', '1', 'Users', 'changePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('41', '2', 'Users', 'changePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('42', '3', 'Users', 'changePassword', '0');
INSERT INTO `user_group_permissions` VALUES ('43', '1', 'Users', 'changeUserPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('44', '2', 'Users', 'changeUserPassword', '0');
INSERT INTO `user_group_permissions` VALUES ('45', '3', 'Users', 'changeUserPassword', '0');
INSERT INTO `user_group_permissions` VALUES ('46', '1', 'Users', 'addUser', '1');
INSERT INTO `user_group_permissions` VALUES ('47', '2', 'Users', 'addUser', '0');
INSERT INTO `user_group_permissions` VALUES ('48', '3', 'Users', 'addUser', '0');
INSERT INTO `user_group_permissions` VALUES ('49', '1', 'Users', 'editUser', '1');
INSERT INTO `user_group_permissions` VALUES ('50', '2', 'Users', 'editUser', '0');
INSERT INTO `user_group_permissions` VALUES ('51', '3', 'Users', 'editUser', '0');
INSERT INTO `user_group_permissions` VALUES ('52', '1', 'Users', 'dashboard', '1');
INSERT INTO `user_group_permissions` VALUES ('53', '2', 'Users', 'dashboard', '1');
INSERT INTO `user_group_permissions` VALUES ('54', '3', 'Users', 'dashboard', '0');
INSERT INTO `user_group_permissions` VALUES ('55', '1', 'Users', 'deleteUser', '1');
INSERT INTO `user_group_permissions` VALUES ('56', '2', 'Users', 'deleteUser', '0');
INSERT INTO `user_group_permissions` VALUES ('57', '3', 'Users', 'deleteUser', '0');
INSERT INTO `user_group_permissions` VALUES ('58', '1', 'Users', 'makeActive', '1');
INSERT INTO `user_group_permissions` VALUES ('59', '2', 'Users', 'makeActive', '0');
INSERT INTO `user_group_permissions` VALUES ('60', '3', 'Users', 'makeActive', '0');
INSERT INTO `user_group_permissions` VALUES ('61', '1', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('62', '2', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('63', '3', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('64', '1', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('65', '2', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('66', '3', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('67', '1', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('68', '2', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('69', '3', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('70', '1', 'Users', 'makeActiveInactive', '1');
INSERT INTO `user_group_permissions` VALUES ('71', '2', 'Users', 'makeActiveInactive', '0');
INSERT INTO `user_group_permissions` VALUES ('72', '3', 'Users', 'makeActiveInactive', '0');
INSERT INTO `user_group_permissions` VALUES ('73', '1', 'Users', 'verifyEmail', '1');
INSERT INTO `user_group_permissions` VALUES ('74', '2', 'Users', 'verifyEmail', '0');
INSERT INTO `user_group_permissions` VALUES ('75', '3', 'Users', 'verifyEmail', '0');
INSERT INTO `user_group_permissions` VALUES ('76', '1', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('77', '2', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('78', '3', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('79', '1', 'Pages', 'sendMail', '1');
INSERT INTO `user_group_permissions` VALUES ('80', '2', 'Pages', 'sendMail', '1');
INSERT INTO `user_group_permissions` VALUES ('81', '3', 'Pages', 'sendMail', '1');
INSERT INTO `user_group_permissions` VALUES ('82', '1', 'Pages', 'upload', '1');
INSERT INTO `user_group_permissions` VALUES ('83', '2', 'Pages', 'upload', '1');
INSERT INTO `user_group_permissions` VALUES ('84', '3', 'Pages', 'upload', '1');
INSERT INTO `user_group_permissions` VALUES ('85', '1', 'Pages', 'faq', '1');
INSERT INTO `user_group_permissions` VALUES ('86', '2', 'Pages', 'faq', '1');
INSERT INTO `user_group_permissions` VALUES ('87', '3', 'Pages', 'faq', '1');
INSERT INTO `user_group_permissions` VALUES ('88', '1', 'Pages', 'contact', '1');
INSERT INTO `user_group_permissions` VALUES ('89', '2', 'Pages', 'contact', '1');
INSERT INTO `user_group_permissions` VALUES ('90', '3', 'Pages', 'contact', '1');
INSERT INTO `user_group_permissions` VALUES ('91', '1', 'Pages', 'about', '1');
INSERT INTO `user_group_permissions` VALUES ('92', '2', 'Pages', 'about', '1');
INSERT INTO `user_group_permissions` VALUES ('93', '3', 'Pages', 'about', '1');
