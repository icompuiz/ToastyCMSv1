/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Listserv`
--

DROP TABLE IF EXISTS `Listserv`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `Listserv` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `Listserv`
--

LOCK TABLES `Listserv` WRITE;
/*!40000 ALTER TABLE `Listserv` DISABLE KEYS */;
/*!40000 ALTER TABLE `Listserv` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 478),
(2, 1, NULL, NULL, 'Administration', 2, 9),
(3, 2, NULL, NULL, 'admin_index', 3, 4),
(4, 2, NULL, NULL, 'isAuthorized', 5, 6),
(5, 1, NULL, NULL, 'Categories', 10, 33),
(6, 5, NULL, NULL, 'manager_index', 11, 12),
(7, 5, NULL, NULL, 'manager_add', 13, 14),
(8, 5, NULL, NULL, 'manager_edit', 15, 16),
(9, 5, NULL, NULL, 'manager_view', 17, 18),
(10, 5, NULL, NULL, 'manager_delete', 19, 20),
(11, 5, NULL, NULL, 'admin_index', 21, 22),
(12, 5, NULL, NULL, 'admin_add', 23, 24),
(13, 5, NULL, NULL, 'admin_edit', 25, 26),
(14, 5, NULL, NULL, 'admin_view', 27, 28),
(15, 5, NULL, NULL, 'admin_delete', 29, 30),
(16, 5, NULL, NULL, 'isAuthorized', 31, 32),
(17, 1, NULL, NULL, 'Content', 34, 43),
(18, 17, NULL, NULL, 'index', 35, 36),
(19, 17, NULL, NULL, 'home', 37, 38),
(20, 17, NULL, NULL, 'display', 39, 40),
(21, 17, NULL, NULL, 'isAuthorized', 41, 42),
(22, 1, NULL, NULL, 'Contents', 44, 67),
(23, 22, NULL, NULL, 'manager_forceUnlock', 45, 46),
(24, 22, NULL, NULL, 'manager_index', 47, 48),
(25, 22, NULL, NULL, 'manager_add', 49, 50),
(26, 22, NULL, NULL, 'manager_edit', 51, 52),
(27, 22, NULL, NULL, 'manager_view', 53, 54),
(28, 22, NULL, NULL, 'manager_delete', 55, 56),
(29, 22, NULL, NULL, 'admin_add', 57, 58),
(30, 22, NULL, NULL, 'admin_edit', 59, 60),
(31, 22, NULL, NULL, 'admin_view', 61, 62),
(32, 22, NULL, NULL, 'admin_delete', 63, 64),
(33, 22, NULL, NULL, 'isAuthorized', 65, 66),
(34, 1, NULL, NULL, 'Errors', 68, 73),
(35, 34, NULL, NULL, 'fourofour', 69, 70),
(36, 34, NULL, NULL, 'isAuthorized', 71, 72),
(37, 1, NULL, NULL, 'Events', 74, 117),
(38, 37, NULL, NULL, 'index', 75, 76),
(39, 37, NULL, NULL, 'view', 77, 78),
(40, 37, NULL, NULL, 'add', 79, 80),
(41, 37, NULL, NULL, 'edit', 81, 82),
(42, 37, NULL, NULL, 'delete', 83, 84),
(43, 37, NULL, NULL, 'calendar', 85, 86),
(44, 37, NULL, NULL, 'isCurrent', 87, 88),
(45, 37, NULL, NULL, 'authorize', 89, 90),
(46, 37, NULL, NULL, 'manager_index', 91, 92),
(47, 37, NULL, NULL, 'manager_view', 93, 94),
(48, 37, NULL, NULL, 'manager_add', 95, 96),
(49, 37, NULL, NULL, 'manager_edit', 97, 98),
(50, 37, NULL, NULL, 'manager_delete', 99, 100),
(51, 37, NULL, NULL, 'user_index', 101, 102),
(52, 37, NULL, NULL, 'user', 103, 104),
(53, 37, NULL, NULL, 'user_view', 105, 106),
(54, 37, NULL, NULL, 'user_add', 107, 108),
(55, 37, NULL, NULL, 'user_edit', 109, 110),
(56, 37, NULL, NULL, 'user_delete', 111, 112),
(57, 37, NULL, NULL, 'isAuthorized', 113, 114),
(58, 1, NULL, NULL, 'Fields', 118, 131),
(59, 58, NULL, NULL, 'index', 119, 120),
(60, 58, NULL, NULL, 'view', 121, 122),
(61, 58, NULL, NULL, 'add', 123, 124),
(62, 58, NULL, NULL, 'edit', 125, 126),
(63, 58, NULL, NULL, 'delete', 127, 128),
(64, 58, NULL, NULL, 'isAuthorized', 129, 130),
(65, 1, NULL, NULL, 'Galleries', 132, 151),
(66, 65, NULL, NULL, 'index', 133, 134),
(67, 65, NULL, NULL, 'view', 135, 136),
(68, 65, NULL, NULL, 'manager_index', 137, 138),
(69, 65, NULL, NULL, 'manager_view', 139, 140),
(70, 65, NULL, NULL, 'manager_add', 141, 142),
(71, 65, NULL, NULL, 'manager_edit', 143, 144),
(72, 65, NULL, NULL, 'manager_delete', 145, 146),
(73, 65, NULL, NULL, 'facebook', 147, 148),
(74, 65, NULL, NULL, 'isAuthorized', 149, 150),
(75, 1, NULL, NULL, 'Groups', 152, 167),
(76, 75, NULL, NULL, 'delete', 153, 154),
(77, 75, NULL, NULL, 'admin_index', 155, 156),
(78, 75, NULL, NULL, 'admin_add', 157, 158),
(79, 75, NULL, NULL, 'admin_edit', 159, 160),
(80, 75, NULL, NULL, 'admin_view', 161, 162),
(81, 75, NULL, NULL, 'admin_delete', 163, 164),
(82, 75, NULL, NULL, 'isAuthorized', 165, 166),
(83, 1, NULL, NULL, 'Logs', 168, 181),
(84, 83, NULL, NULL, 'index', 169, 170),
(85, 83, NULL, NULL, 'view', 171, 172),
(86, 83, NULL, NULL, 'add', 173, 174),
(87, 83, NULL, NULL, 'edit', 175, 176),
(88, 83, NULL, NULL, 'delete', 177, 178),
(89, 83, NULL, NULL, 'isAuthorized', 179, 180),
(90, 1, NULL, NULL, 'Management', 182, 189),
(91, 90, NULL, NULL, 'manager_index', 183, 184),
(92, 90, NULL, NULL, 'manager_member_groups', 185, 186),
(93, 90, NULL, NULL, 'isAuthorized', 187, 188),
(94, 1, NULL, NULL, 'MediaFiles', 190, 203),
(95, 94, NULL, NULL, 'manager_index', 191, 192),
(96, 94, NULL, NULL, 'manager_add', 193, 194),
(97, 94, NULL, NULL, 'manager_edit', 195, 196),
(98, 94, NULL, NULL, 'manager_view', 197, 198),
(99, 94, NULL, NULL, 'manager_delete', 199, 200),
(100, 94, NULL, NULL, 'isAuthorized', 201, 202),
(101, 1, NULL, NULL, 'MemberGroups', 204, 231),
(102, 101, NULL, NULL, 'view', 205, 206),
(103, 101, NULL, NULL, 'manager_index', 207, 208),
(104, 101, NULL, NULL, 'manager_add', 209, 210),
(105, 101, NULL, NULL, 'manager_edit', 211, 212),
(106, 101, NULL, NULL, 'manager_view', 213, 214),
(107, 101, NULL, NULL, 'manager_delete', 215, 216),
(108, 101, NULL, NULL, 'user_index', 217, 218),
(109, 101, NULL, NULL, 'isAuthorized', 219, 220),
(110, 1, NULL, NULL, 'Members', 232, 267),
(111, 110, NULL, NULL, 'index', 233, 234),
(112, 110, NULL, NULL, 'view', 235, 236),
(113, 110, NULL, NULL, 'add', 237, 238),
(114, 110, NULL, NULL, 'edit', 239, 240),
(115, 110, NULL, NULL, 'delete', 241, 242),
(116, 110, NULL, NULL, 'manager_add', 243, 244),
(117, 110, NULL, NULL, 'manager_edit', 245, 246),
(118, 110, NULL, NULL, 'manager_delete', 247, 248),
(119, 110, NULL, NULL, 'manager_index', 249, 250),
(120, 110, NULL, NULL, 'user_index', 251, 252),
(121, 110, NULL, NULL, 'user_view', 253, 254),
(122, 110, NULL, NULL, 'user_edit', 255, 256),
(123, 110, NULL, NULL, 'isAuthorized', 257, 258),
(124, 1, NULL, NULL, 'Menus', 268, 281),
(125, 124, NULL, NULL, 'index', 269, 270),
(126, 124, NULL, NULL, 'view', 271, 272),
(127, 124, NULL, NULL, 'add', 273, 274),
(128, 124, NULL, NULL, 'edit', 275, 276),
(129, 124, NULL, NULL, 'delete', 277, 278),
(130, 124, NULL, NULL, 'isAuthorized', 279, 280),
(131, 1, NULL, NULL, 'Pages', 282, 287),
(132, 131, NULL, NULL, 'display', 283, 284),
(133, 131, NULL, NULL, 'isAuthorized', 285, 286),
(134, 1, NULL, NULL, 'Permissions', 288, 295),
(135, 134, NULL, NULL, 'admin_index', 289, 290),
(136, 134, NULL, NULL, 'admin_setPermissions', 291, 292),
(137, 134, NULL, NULL, 'isAuthorized', 293, 294),
(138, 1, NULL, NULL, 'ProfileLayouts', 296, 315),
(139, 138, NULL, NULL, 'manager_index', 297, 298),
(140, 138, NULL, NULL, 'manager_add', 299, 300),
(141, 138, NULL, NULL, 'manager_edit', 301, 302),
(142, 138, NULL, NULL, 'manager_delete', 303, 304),
(143, 138, NULL, NULL, 'isAuthorized', 305, 306),
(144, 1, NULL, NULL, 'Profiles', 316, 343),
(145, 144, NULL, NULL, 'admin_index', 317, 318),
(146, 144, NULL, NULL, 'index', 319, 320),
(147, 144, NULL, NULL, 'view', 321, 322),
(148, 144, NULL, NULL, 'manager_add', 323, 324),
(149, 144, NULL, NULL, 'manager_edit', 325, 326),
(150, 144, NULL, NULL, 'manager_view', 327, 328),
(151, 144, NULL, NULL, 'user_index', 329, 330),
(152, 144, NULL, NULL, 'user_view', 331, 332),
(153, 144, NULL, NULL, 'user_edit', 333, 334),
(154, 144, NULL, NULL, 'isAuthorized', 335, 336),
(155, 1, NULL, NULL, 'Services', 344, 351),
(156, 155, NULL, NULL, 'mailinglist', 345, 346),
(157, 155, NULL, NULL, 'contact', 347, 348),
(158, 155, NULL, NULL, 'isAuthorized', 349, 350),
(159, 1, NULL, NULL, 'Settings', 352, 373),
(160, 159, NULL, NULL, 'admin_index', 353, 354),
(161, 159, NULL, NULL, 'admin_databases', 355, 356),
(162, 159, NULL, NULL, 'admin_database', 357, 358),
(163, 159, NULL, NULL, 'admin_csvdatabase', 359, 360),
(164, 159, NULL, NULL, 'admin_mysqldatabase', 361, 362),
(165, 159, NULL, NULL, 'admin_config', 363, 364),
(166, 159, NULL, NULL, 'admin_routes', 365, 366),
(167, 159, NULL, NULL, 'admin_variables', 367, 368),
(168, 159, NULL, NULL, 'admin_variable', 369, 370),
(169, 159, NULL, NULL, 'isAuthorized', 371, 372),
(170, 1, NULL, NULL, 'SiteLayouts', 374, 397),
(171, 170, NULL, NULL, 'manager_index', 375, 376),
(172, 170, NULL, NULL, 'manager_add', 377, 378),
(173, 170, NULL, NULL, 'manager_edit', 379, 380),
(174, 170, NULL, NULL, 'manager_view', 381, 382),
(175, 170, NULL, NULL, 'manager_delete', 383, 384),
(176, 170, NULL, NULL, 'isAuthorized', 385, 386),
(177, 1, NULL, NULL, 'Themes', 398, 411),
(178, 177, NULL, NULL, 'index', 399, 400),
(179, 177, NULL, NULL, 'view', 401, 402),
(180, 177, NULL, NULL, 'add', 403, 404),
(181, 177, NULL, NULL, 'edit', 405, 406),
(182, 177, NULL, NULL, 'delete', 407, 408),
(183, 177, NULL, NULL, 'isAuthorized', 409, 410),
(184, 1, NULL, NULL, 'UserManagement', 412, 417),
(185, 184, NULL, NULL, 'user_index', 413, 414),
(186, 184, NULL, NULL, 'isAuthorized', 415, 416),
(187, 1, NULL, NULL, 'Users', 418, 447),
(188, 187, NULL, NULL, 'login', 419, 420),
(189, 187, NULL, NULL, 'logout', 421, 422),
(190, 187, NULL, NULL, 'user_login', 423, 424),
(191, 187, NULL, NULL, 'manager_login', 425, 426),
(192, 187, NULL, NULL, 'admin_login', 427, 428),
(193, 187, NULL, NULL, 'manager_logout', 429, 430),
(194, 187, NULL, NULL, 'user_logout', 431, 432),
(195, 187, NULL, NULL, 'admin_logout', 433, 434),
(196, 187, NULL, NULL, 'admin_index', 435, 436),
(197, 187, NULL, NULL, 'admin_add', 437, 438),
(198, 187, NULL, NULL, 'admin_edit', 439, 440),
(199, 187, NULL, NULL, 'admin_view', 441, 442),
(200, 187, NULL, NULL, 'admin_delete', 443, 444),
(201, 187, NULL, NULL, 'isAuthorized', 445, 446),
(202, 1, NULL, NULL, 'AclExtras', 448, 449),
(203, 2, NULL, NULL, 'admin_member_groups', 7, 8),
(204, 37, NULL, NULL, 'manager_user', 115, 116),
(205, 1, NULL, NULL, 'FormSubmissions', 450, 459),
(206, 205, NULL, NULL, 'manager_index', 451, 452),
(207, 205, NULL, NULL, 'manager_view', 453, 454),
(208, 205, NULL, NULL, 'manager_download_submission_file', 455, 456),
(209, 205, NULL, NULL, 'manager_download_submissions', 457, 458),
(210, 1, NULL, NULL, 'Forms', 460, 477),
(211, 210, NULL, NULL, 'index', 461, 462),
(212, 210, NULL, NULL, 'success', 463, 464),
(213, 210, NULL, NULL, 'view', 465, 466),
(214, 210, NULL, NULL, 'manager_index', 467, 468),
(215, 210, NULL, NULL, 'manager_add', 469, 470),
(216, 210, NULL, NULL, 'manager_edit', 471, 472),
(217, 210, NULL, NULL, 'manager_delete', 473, 474),
(218, 210, NULL, NULL, 'manager_view', 475, 476),
(219, 101, NULL, NULL, 'admin_index', 221, 222),
(220, 101, NULL, NULL, 'admin_add', 223, 224),
(221, 101, NULL, NULL, 'admin_edit', 225, 226),
(222, 101, NULL, NULL, 'admin_view', 227, 228),
(223, 101, NULL, NULL, 'admin_delete', 229, 230),
(224, 110, NULL, NULL, 'admin_add', 259, 260),
(225, 110, NULL, NULL, 'admin_edit', 261, 262),
(226, 110, NULL, NULL, 'admin_delete', 263, 264),
(227, 110, NULL, NULL, 'admin_index', 265, 266),
(228, 138, NULL, NULL, 'admin_index', 307, 308),
(229, 138, NULL, NULL, 'admin_add', 309, 310),
(230, 138, NULL, NULL, 'admin_edit', 311, 312),
(231, 138, NULL, NULL, 'admin_delete', 313, 314),
(232, 144, NULL, NULL, 'admin_add', 337, 338),
(233, 144, NULL, NULL, 'admin_edit', 339, 340),
(234, 144, NULL, NULL, 'admin_view', 341, 342),
(235, 170, NULL, NULL, 'admin_index', 387, 388),
(236, 170, NULL, NULL, 'admin_add', 389, 390),
(237, 170, NULL, NULL, 'admin_edit', 391, 392),
(238, 170, NULL, NULL, 'admin_view', 393, 394),
(239, 170, NULL, NULL, 'admin_delete', 395, 396);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, NULL, 'Group', 2, NULL, 5, 6),
(3, NULL, 'Group', 3, NULL, 7, 8),
(4, 1, 'User', 1, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=266 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 3, '-1', '-1', '-1', '-1'),
(4, 2, 4, '-1', '-1', '-1', '-1'),
(5, 2, 6, '1', '1', '1', '1'),
(6, 2, 7, '1', '1', '1', '1'),
(7, 2, 8, '1', '1', '1', '1'),
(8, 2, 9, '1', '1', '1', '1'),
(9, 2, 10, '1', '1', '1', '1'),
(10, 2, 11, '-1', '-1', '-1', '-1'),
(11, 2, 12, '-1', '-1', '-1', '-1'),
(12, 2, 13, '-1', '-1', '-1', '-1'),
(13, 2, 14, '-1', '-1', '-1', '-1'),
(14, 2, 15, '-1', '-1', '-1', '-1'),
(15, 2, 16, '-1', '-1', '-1', '-1'),
(16, 2, 18, '-1', '-1', '-1', '-1'),
(17, 2, 19, '-1', '-1', '-1', '-1'),
(18, 2, 20, '-1', '-1', '-1', '-1'),
(19, 2, 21, '-1', '-1', '-1', '-1'),
(20, 2, 23, '1', '1', '1', '1'),
(21, 2, 24, '1', '1', '1', '1'),
(22, 2, 25, '1', '1', '1', '1'),
(23, 2, 26, '1', '1', '1', '1'),
(24, 2, 27, '1', '1', '1', '1'),
(25, 2, 28, '1', '1', '1', '1'),
(26, 2, 29, '-1', '-1', '-1', '-1'),
(27, 2, 30, '-1', '-1', '-1', '-1'),
(28, 2, 31, '-1', '-1', '-1', '-1'),
(29, 2, 32, '-1', '-1', '-1', '-1'),
(30, 2, 33, '-1', '-1', '-1', '-1'),
(31, 2, 38, '-1', '-1', '-1', '-1'),
(32, 2, 39, '-1', '-1', '-1', '-1'),
(33, 2, 40, '-1', '-1', '-1', '-1'),
(34, 2, 41, '-1', '-1', '-1', '-1'),
(35, 2, 42, '-1', '-1', '-1', '-1'),
(36, 2, 43, '-1', '-1', '-1', '-1'),
(37, 2, 44, '-1', '-1', '-1', '-1'),
(38, 2, 45, '-1', '-1', '-1', '-1'),
(39, 2, 46, '1', '1', '1', '1'),
(40, 2, 47, '1', '1', '1', '1'),
(41, 2, 48, '1', '1', '1', '1'),
(42, 2, 49, '1', '1', '1', '1'),
(43, 2, 50, '1', '1', '1', '1'),
(44, 2, 51, '-1', '-1', '-1', '-1'),
(45, 2, 52, '-1', '-1', '-1', '-1'),
(46, 2, 53, '-1', '-1', '-1', '-1'),
(47, 2, 54, '-1', '-1', '-1', '-1'),
(48, 2, 55, '-1', '-1', '-1', '-1'),
(49, 2, 56, '-1', '-1', '-1', '-1'),
(50, 2, 57, '-1', '-1', '-1', '-1'),
(51, 2, 59, '-1', '-1', '-1', '-1'),
(52, 2, 60, '-1', '-1', '-1', '-1'),
(53, 2, 61, '-1', '-1', '-1', '-1'),
(54, 2, 62, '-1', '-1', '-1', '-1'),
(55, 2, 63, '-1', '-1', '-1', '-1'),
(56, 2, 64, '-1', '-1', '-1', '-1'),
(57, 2, 66, '-1', '-1', '-1', '-1'),
(58, 2, 67, '-1', '-1', '-1', '-1'),
(59, 2, 68, '1', '1', '1', '1'),
(60, 2, 69, '1', '1', '1', '1'),
(61, 2, 70, '1', '1', '1', '1'),
(62, 2, 71, '1', '1', '1', '1'),
(63, 2, 72, '1', '1', '1', '1'),
(64, 2, 73, '-1', '-1', '-1', '-1'),
(65, 2, 74, '-1', '-1', '-1', '-1'),
(66, 2, 91, '1', '1', '1', '1'),
(67, 2, 92, '1', '1', '1', '1'),
(68, 2, 93, '-1', '-1', '-1', '-1'),
(69, 2, 95, '1', '1', '1', '1'),
(70, 2, 96, '1', '1', '1', '1'),
(71, 2, 97, '1', '1', '1', '1'),
(72, 2, 98, '1', '1', '1', '1'),
(73, 2, 99, '1', '1', '1', '1'),
(74, 2, 100, '-1', '-1', '-1', '-1'),
(75, 2, 102, '-1', '-1', '-1', '-1'),
(76, 2, 103, '1', '1', '1', '1'),
(77, 2, 104, '1', '1', '1', '1'),
(78, 2, 105, '1', '1', '1', '1'),
(79, 2, 106, '1', '1', '1', '1'),
(80, 2, 107, '1', '1', '1', '1'),
(81, 2, 108, '-1', '-1', '-1', '-1'),
(82, 2, 109, '-1', '-1', '-1', '-1'),
(83, 2, 111, '-1', '-1', '-1', '-1'),
(84, 2, 112, '-1', '-1', '-1', '-1'),
(85, 2, 113, '-1', '-1', '-1', '-1'),
(86, 2, 114, '-1', '-1', '-1', '-1'),
(87, 2, 115, '-1', '-1', '-1', '-1'),
(88, 2, 116, '1', '1', '1', '1'),
(89, 2, 117, '1', '1', '1', '1'),
(90, 2, 118, '1', '1', '1', '1'),
(91, 2, 119, '1', '1', '1', '1'),
(92, 2, 120, '-1', '-1', '-1', '-1'),
(93, 2, 121, '-1', '-1', '-1', '-1'),
(94, 2, 122, '-1', '-1', '-1', '-1'),
(95, 2, 123, '-1', '-1', '-1', '-1'),
(96, 2, 125, '-1', '-1', '-1', '-1'),
(97, 2, 126, '-1', '-1', '-1', '-1'),
(98, 2, 127, '-1', '-1', '-1', '-1'),
(99, 2, 128, '-1', '-1', '-1', '-1'),
(100, 2, 129, '-1', '-1', '-1', '-1'),
(101, 2, 130, '-1', '-1', '-1', '-1'),
(102, 2, 139, '1', '1', '1', '1'),
(103, 2, 140, '1', '1', '1', '1'),
(104, 2, 141, '1', '1', '1', '1'),
(105, 2, 142, '1', '1', '1', '1'),
(106, 2, 143, '-1', '-1', '-1', '-1'),
(107, 2, 145, '-1', '-1', '-1', '-1'),
(108, 2, 146, '-1', '-1', '-1', '-1'),
(109, 2, 147, '-1', '-1', '-1', '-1'),
(110, 2, 148, '1', '1', '1', '1'),
(111, 2, 149, '1', '1', '1', '1'),
(112, 2, 150, '1', '1', '1', '1'),
(113, 2, 151, '-1', '-1', '-1', '-1'),
(114, 2, 152, '-1', '-1', '-1', '-1'),
(115, 2, 153, '-1', '-1', '-1', '-1'),
(116, 2, 154, '-1', '-1', '-1', '-1'),
(117, 2, 156, '-1', '-1', '-1', '-1'),
(118, 2, 157, '-1', '-1', '-1', '-1'),
(119, 2, 158, '-1', '-1', '-1', '-1'),
(120, 2, 171, '1', '1', '1', '1'),
(121, 2, 172, '1', '1', '1', '1'),
(122, 2, 173, '1', '1', '1', '1'),
(123, 2, 174, '1', '1', '1', '1'),
(124, 2, 175, '1', '1', '1', '1'),
(125, 2, 176, '-1', '-1', '-1', '-1'),
(126, 2, 178, '-1', '-1', '-1', '-1'),
(127, 2, 179, '-1', '-1', '-1', '-1'),
(128, 2, 180, '-1', '-1', '-1', '-1'),
(129, 2, 181, '-1', '-1', '-1', '-1'),
(130, 2, 182, '-1', '-1', '-1', '-1'),
(131, 2, 183, '-1', '-1', '-1', '-1'),
(132, 2, 185, '-1', '-1', '-1', '-1'),
(133, 2, 186, '-1', '-1', '-1', '-1'),
(134, 3, 1, '-1', '-1', '-1', '-1'),
(135, 3, 3, '-1', '-1', '-1', '-1'),
(136, 3, 4, '-1', '-1', '-1', '-1'),
(137, 3, 6, '-1', '-1', '-1', '-1'),
(138, 3, 7, '-1', '-1', '-1', '-1'),
(139, 3, 8, '-1', '-1', '-1', '-1'),
(140, 3, 9, '-1', '-1', '-1', '-1'),
(141, 3, 10, '-1', '-1', '-1', '-1'),
(142, 3, 11, '-1', '-1', '-1', '-1'),
(143, 3, 12, '-1', '-1', '-1', '-1'),
(144, 3, 13, '-1', '-1', '-1', '-1'),
(145, 3, 14, '-1', '-1', '-1', '-1'),
(146, 3, 15, '-1', '-1', '-1', '-1'),
(147, 3, 16, '-1', '-1', '-1', '-1'),
(148, 3, 18, '-1', '-1', '-1', '-1'),
(149, 3, 19, '-1', '-1', '-1', '-1'),
(150, 3, 20, '-1', '-1', '-1', '-1'),
(151, 3, 21, '-1', '-1', '-1', '-1'),
(152, 3, 23, '-1', '-1', '-1', '-1'),
(153, 3, 24, '-1', '-1', '-1', '-1'),
(154, 3, 25, '-1', '-1', '-1', '-1'),
(155, 3, 26, '-1', '-1', '-1', '-1'),
(156, 3, 27, '-1', '-1', '-1', '-1'),
(157, 3, 28, '-1', '-1', '-1', '-1'),
(158, 3, 29, '-1', '-1', '-1', '-1'),
(159, 3, 30, '-1', '-1', '-1', '-1'),
(160, 3, 31, '-1', '-1', '-1', '-1'),
(161, 3, 32, '-1', '-1', '-1', '-1'),
(162, 3, 33, '-1', '-1', '-1', '-1'),
(163, 3, 38, '-1', '-1', '-1', '-1'),
(164, 3, 39, '-1', '-1', '-1', '-1'),
(165, 3, 40, '-1', '-1', '-1', '-1'),
(166, 3, 41, '-1', '-1', '-1', '-1'),
(167, 3, 42, '-1', '-1', '-1', '-1'),
(168, 3, 43, '-1', '-1', '-1', '-1'),
(169, 3, 44, '-1', '-1', '-1', '-1'),
(170, 3, 45, '-1', '-1', '-1', '-1'),
(171, 3, 46, '-1', '-1', '-1', '-1'),
(172, 3, 47, '-1', '-1', '-1', '-1'),
(173, 3, 48, '-1', '-1', '-1', '-1'),
(174, 3, 49, '-1', '-1', '-1', '-1'),
(175, 3, 50, '-1', '-1', '-1', '-1'),
(176, 3, 51, '-1', '-1', '-1', '-1'),
(177, 3, 52, '-1', '-1', '-1', '-1'),
(178, 3, 53, '-1', '-1', '-1', '-1'),
(179, 3, 54, '-1', '-1', '-1', '-1'),
(180, 3, 55, '-1', '-1', '-1', '-1'),
(181, 3, 56, '-1', '-1', '-1', '-1'),
(182, 3, 57, '-1', '-1', '-1', '-1'),
(183, 3, 59, '-1', '-1', '-1', '-1'),
(184, 3, 60, '-1', '-1', '-1', '-1'),
(185, 3, 61, '-1', '-1', '-1', '-1'),
(186, 3, 62, '-1', '-1', '-1', '-1'),
(187, 3, 63, '-1', '-1', '-1', '-1'),
(188, 3, 64, '-1', '-1', '-1', '-1'),
(189, 3, 66, '-1', '-1', '-1', '-1'),
(190, 3, 67, '-1', '-1', '-1', '-1'),
(191, 3, 68, '-1', '-1', '-1', '-1'),
(192, 3, 69, '-1', '-1', '-1', '-1'),
(193, 3, 70, '-1', '-1', '-1', '-1'),
(194, 3, 71, '-1', '-1', '-1', '-1'),
(195, 3, 72, '-1', '-1', '-1', '-1'),
(196, 3, 73, '-1', '-1', '-1', '-1'),
(197, 3, 74, '-1', '-1', '-1', '-1'),
(198, 3, 91, '-1', '-1', '-1', '-1'),
(199, 3, 92, '-1', '-1', '-1', '-1'),
(200, 3, 93, '-1', '-1', '-1', '-1'),
(201, 3, 95, '-1', '-1', '-1', '-1'),
(202, 3, 96, '-1', '-1', '-1', '-1'),
(203, 3, 97, '-1', '-1', '-1', '-1'),
(204, 3, 98, '-1', '-1', '-1', '-1'),
(205, 3, 99, '-1', '-1', '-1', '-1'),
(206, 3, 100, '-1', '-1', '-1', '-1'),
(207, 3, 102, '-1', '-1', '-1', '-1'),
(208, 3, 103, '-1', '-1', '-1', '-1'),
(209, 3, 104, '-1', '-1', '-1', '-1'),
(210, 3, 105, '-1', '-1', '-1', '-1'),
(211, 3, 106, '-1', '-1', '-1', '-1'),
(212, 3, 107, '-1', '-1', '-1', '-1'),
(213, 3, 108, '-1', '-1', '-1', '-1'),
(214, 3, 109, '-1', '-1', '-1', '-1'),
(215, 3, 111, '-1', '-1', '-1', '-1'),
(216, 3, 112, '-1', '-1', '-1', '-1'),
(217, 3, 113, '-1', '-1', '-1', '-1'),
(218, 3, 114, '-1', '-1', '-1', '-1'),
(219, 3, 115, '-1', '-1', '-1', '-1'),
(220, 3, 116, '-1', '-1', '-1', '-1'),
(221, 3, 117, '-1', '-1', '-1', '-1'),
(222, 3, 118, '-1', '-1', '-1', '-1'),
(223, 3, 119, '-1', '-1', '-1', '-1'),
(224, 3, 120, '-1', '-1', '-1', '-1'),
(225, 3, 121, '-1', '-1', '-1', '-1'),
(226, 3, 122, '-1', '-1', '-1', '-1'),
(227, 3, 123, '-1', '-1', '-1', '-1'),
(228, 3, 125, '-1', '-1', '-1', '-1'),
(229, 3, 126, '-1', '-1', '-1', '-1'),
(230, 3, 127, '-1', '-1', '-1', '-1'),
(231, 3, 128, '-1', '-1', '-1', '-1'),
(232, 3, 129, '-1', '-1', '-1', '-1'),
(233, 3, 130, '-1', '-1', '-1', '-1'),
(234, 3, 139, '-1', '-1', '-1', '-1'),
(235, 3, 140, '-1', '-1', '-1', '-1'),
(236, 3, 141, '-1', '-1', '-1', '-1'),
(237, 3, 142, '-1', '-1', '-1', '-1'),
(238, 3, 143, '-1', '-1', '-1', '-1'),
(239, 3, 145, '-1', '-1', '-1', '-1'),
(240, 3, 146, '-1', '-1', '-1', '-1'),
(241, 3, 147, '-1', '-1', '-1', '-1'),
(242, 3, 148, '-1', '-1', '-1', '-1'),
(243, 3, 149, '-1', '-1', '-1', '-1'),
(244, 3, 150, '-1', '-1', '-1', '-1'),
(245, 3, 151, '-1', '-1', '-1', '-1'),
(246, 3, 152, '-1', '-1', '-1', '-1'),
(247, 3, 153, '-1', '-1', '-1', '-1'),
(248, 3, 154, '-1', '-1', '-1', '-1'),
(249, 3, 156, '-1', '-1', '-1', '-1'),
(250, 3, 157, '-1', '-1', '-1', '-1'),
(251, 3, 158, '-1', '-1', '-1', '-1'),
(252, 3, 171, '-1', '-1', '-1', '-1'),
(253, 3, 172, '-1', '-1', '-1', '-1'),
(254, 3, 173, '-1', '-1', '-1', '-1'),
(255, 3, 174, '-1', '-1', '-1', '-1'),
(256, 3, 175, '-1', '-1', '-1', '-1'),
(257, 3, 176, '-1', '-1', '-1', '-1'),
(258, 3, 178, '-1', '-1', '-1', '-1'),
(259, 3, 179, '-1', '-1', '-1', '-1'),
(260, 3, 180, '-1', '-1', '-1', '-1'),
(261, 3, 181, '-1', '-1', '-1', '-1'),
(262, 3, 182, '-1', '-1', '-1', '-1'),
(263, 3, 183, '-1', '-1', '-1', '-1'),
(264, 3, 185, '-1', '-1', '-1', '-1'),
(265, 3, 186, '-1', '-1', '-1', '-1');


--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'navigation',NOW(),NOW(),NULL),(2,'footer',NOW(),NOW(),NULL),(3,'administrator',NOW(),NOW(),NULL),(4,'uncategorized',NOW(),NOW(),NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `html` text,
  `js` text,
  `css` text,
  `css_files` text,
  `js_files` text,
  `alias` varchar(255) default NULL,
  `category_id` int(11) default NULL,
  `redirect` text,
  `parent` int(11) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `ordering` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `events` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `start_time` datetime default NULL,
  `end_time` datetime default NULL,
  `full_description` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `location` varchar(255) NOT NULL default '',
  `picture` varchar(255) default NULL,
  `featured_event` tinyint(4) NOT NULL,
  `banner_image` varchar(255) default NULL,
  `categories` varchar(255) default NULL,
  `has_registration` enum('1','0') NOT NULL default '0',
  `registration_expiration_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `variables` text,
  `description` varchar(255) default NULL,
  `source` varchar(255) default NULL,
  `picture` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'root',NOW(),NOW(),'System administrators'),(2,'managers',NOW(),NOW(),'System users '),(3,'disabled users',NOW(),NOW(),'Disabled Users');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_entries`
--

DROP TABLE IF EXISTS `log_entries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `log_entries` (
  `id` int(11) NOT NULL auto_increment,
  `log_id` int(11) NOT NULL,
  `level` enum('error','informational','user_login','user_logout') default NULL,
  `source` varchar(255) default NULL,
  `message` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `log_entries`
--

LOCK TABLES `log_entries` WRITE;
/*!40000 ALTER TABLE `log_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'User','This Log documents all user model events',NOW(),NOW()),(2,'Uncategorized','Uncategorized log messages',NOW(),NOW()),(3,'Security','Lists events regarding system security',NOW(),NOW());
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `media_files` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `fileType` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_groups`
--

DROP TABLE IF EXISTS `member_groups`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `member_groups` (
  `id` int(11) NOT NULL auto_increment,
  `group_id` int(11) NOT NULL,
  `profile_layout_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `member_groups`
--

LOCK TABLES `member_groups` WRITE;
/*!40000 ALTER TABLE `member_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `members` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `member_group_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_layouts`
--

DROP TABLE IF EXISTS `profile_layouts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `profile_layouts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `css_files` text,
  `js_files` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `profile_layouts`
--

LOCK TABLES `profile_layouts` WRITE;
/*!40000 ALTER TABLE `profile_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` int(11) default NULL,
  `fields` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_layouts`
--

DROP TABLE IF EXISTS `site_layouts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `site_layouts` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `js_files` varchar(255) default NULL,
  `css_files` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `site_layouts`
--

LOCK TABLES `site_layouts` WRITE;
/*!40000 ALTER TABLE `site_layouts` DISABLE KEYS */;
INSERT INTO `site_layouts` VALUES (1,'administrator','The default layout for the configuration pages',NULL,NULL,NOW(),NOW()),(2,'main','The default layout for the main site',NULL,NULL,NOW(),NOW()),(3,'management','The default layout for the management pages',NULL,NULL,NOW(),NOW()),(4,'user_management','The default layout for the user management pages',NULL,NULL,NOW(),NOW());
/*!40000 ALTER TABLE `site_layouts` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(111) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fields` text,
  `js` text,
  `css` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Table structure for table `form_submissions`
--

DROP TABLE IF EXISTS `form_submissions`;
CREATE TABLE IF NOT EXISTS `form_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  `data` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;


DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `last_login` datetime default NULL,
  `full_name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'root','cd4cf863eb24671d90eae3da9b146af39c5ad606',1,NOW(),NOW(),NULL,'toasty','toast@toasty.om');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;