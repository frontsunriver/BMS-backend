/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : bms_db

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 04/02/2022 18:51:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_apartments
-- ----------------------------
DROP TABLE IF EXISTS `tbl_apartments`;
CREATE TABLE `tbl_apartments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `building_id` int(11) NULL DEFAULT NULL,
  `owner_id` int(11) NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_buildings
-- ----------------------------
DROP TABLE IF EXISTS `tbl_buildings`;
CREATE TABLE `tbl_buildings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `owner` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_buildings
-- ----------------------------
INSERT INTO `tbl_buildings` VALUES (2, 'History', '3 street', NULL, NULL, NULL);
INSERT INTO `tbl_buildings` VALUES (3, 'Norcova', '3th address', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_maintenances
-- ----------------------------
DROP TABLE IF EXISTS `tbl_maintenances`;
CREATE TABLE `tbl_maintenances`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `carried_date` date NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT 1,
  `trade_licence` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_message_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_message_detail`;
CREATE TABLE `tbl_message_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `message_id` int(11) NULL DEFAULT NULL,
  `reg_date` date NULL DEFAULT NULL,
  `read_status` int(255) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_message_detail
-- ----------------------------
INSERT INTO `tbl_message_detail` VALUES (1, 'Hello', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (2, 'fdsfdsasdf', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (3, 'fdsasdfdsa', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (4, 'fdsasdfds', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (5, 'fdsasdfsa', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (6, 'fdsasdfdsa', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (7, 'Do fdsa', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (8, 'Hi what are you doing now I am very busy and please let me know if you are free', 1, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (9, 'Hi I am here', 2, 2, '2022-01-26', 0);
INSERT INTO `tbl_message_detail` VALUES (10, 'Hi I have some problem. So I conatct you', 1, 1, '2022-01-26', 0);

-- ----------------------------
-- Table structure for tbl_messages
-- ----------------------------
DROP TABLE IF EXISTS `tbl_messages`;
CREATE TABLE `tbl_messages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `messages` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `reg_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_messages
-- ----------------------------
INSERT INTO `tbl_messages` VALUES (1, 1, 'Message test', 'fdsasdfdsasdf', '2022-01-26');
INSERT INTO `tbl_messages` VALUES (2, 1, 'Test Message', 'This is test messages', NULL);

-- ----------------------------
-- Table structure for tbl_move_opinions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_move_opinions`;
CREATE TABLE `tbl_move_opinions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `move_id` int(11) NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `reg_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_move_opinions
-- ----------------------------
INSERT INTO `tbl_move_opinions` VALUES (2, 9, 'Something went wrong', '2022-01-31');
INSERT INTO `tbl_move_opinions` VALUES (3, 5, 'Something is wrong\nPlease repost it again', '2022-01-31');
INSERT INTO `tbl_move_opinions` VALUES (4, 8, 'Something went worng\nNow I am waiting for the response\n', '2022-01-31');
INSERT INTO `tbl_move_opinions` VALUES (5, 9, 'Haha same again', '2022-01-31');

-- ----------------------------
-- Table structure for tbl_noc_move
-- ----------------------------
DROP TABLE IF EXISTS `tbl_noc_move`;
CREATE TABLE `tbl_noc_move`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `building_id` int(11) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `move_date` date NULL DEFAULT NULL,
  `tenants_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tenants_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tenants_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `attachfile_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `attachfile_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `owner_passport` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title_deed` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contract` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tenants_passport` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tenants_visa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tenants_emirates_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `move_type` int(3) NULL DEFAULT 1,
  `status` int(11) NULL DEFAULT 1,
  `user_id` int(11) NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `trade_licence` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `carried_content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_noc_move
-- ----------------------------
INSERT INTO `tbl_noc_move` VALUES (5, NULL, 2, 1, '2022-02-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 1, NULL, NULL, NULL);
INSERT INTO `tbl_noc_move` VALUES (6, NULL, 2, 1, '2022-01-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 1, NULL, 'uploads/temp.pdf', NULL);
INSERT INTO `tbl_noc_move` VALUES (8, NULL, 3, 4, '2022-01-29', '1234', 'test@gta.com', '123', NULL, NULL, 'uploads/temp.pdf', 'uploads/temp.png', 'uploads/temp.pdf', 'uploads/temp.pdf', 'uploads/temp.pdf', 'uploads/temp.pdf', 1, 1, 1, NULL, NULL, NULL);
INSERT INTO `tbl_noc_move` VALUES (9, NULL, 2, 1, '2022-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 1, NULL, 'uploads/temp.pdf', 'I want to fix this issues.\nCurrent now I am making the constructor.\n\nHahahaha');

-- ----------------------------
-- Table structure for tbl_notify
-- ----------------------------
DROP TABLE IF EXISTS `tbl_notify`;
CREATE TABLE `tbl_notify`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `submit_date` date NULL DEFAULT NULL,
  `photofile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `type` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_notify
-- ----------------------------
INSERT INTO `tbl_notify` VALUES (2, NULL, 'I have one question\nIn my house have some problem and I want to repair this errors', '2022-01-25', 'uploads/16572289041643078867.jpg', 1, 1);
INSERT INTO `tbl_notify` VALUES (3, NULL, 'fdsasdfdsadf', '2022-01-25', 'uploads/7902466661643078971.jpg', 1, 1);

-- ----------------------------
-- Table structure for tbl_notify_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_notify_detail`;
CREATE TABLE `tbl_notify_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `notify_id` int(11) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `submit_date` date NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_notify_detail
-- ----------------------------
INSERT INTO `tbl_notify_detail` VALUES (1, 1, 2, 'fdsasdf', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (2, 48, 2, 'fdsasdfrewq', '2022-01-29', NULL);
INSERT INTO `tbl_notify_detail` VALUES (3, 1, 2, 'This is the test Doc', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (4, 1, 2, 'fdsasdffdsa', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (5, 1, 2, 'fdsasdfdsa', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (6, 1, 2, 'fdsasdfdsasdfs', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (7, 1, 2, 'fdsasdfdsa', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (8, 1, 2, 'fdsasdfdsasdf', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (9, 1, 2, '222222', '2022-01-25', NULL);
INSERT INTO `tbl_notify_detail` VALUES (10, 1, 2, 'fdsasdfdsasdfffff', '2022-01-26', NULL);
INSERT INTO `tbl_notify_detail` VALUES (11, 1, 2, 'fdsasdfdsa222222', '2022-01-26', NULL);

-- ----------------------------
-- Table structure for tbl_owners
-- ----------------------------
DROP TABLE IF EXISTS `tbl_owners`;
CREATE TABLE `tbl_owners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `building_id` int(11) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `USER_UNIQUE_UNIT`(`user_id`, `unit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_owners
-- ----------------------------
INSERT INTO `tbl_owners` VALUES (3, 1, 2, 1);
INSERT INTO `tbl_owners` VALUES (4, 1, 3, 4);

-- ----------------------------
-- Table structure for tbl_units
-- ----------------------------
DROP TABLE IF EXISTS `tbl_units`;
CREATE TABLE `tbl_units`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `building_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_units
-- ----------------------------
INSERT INTO `tbl_units` VALUES (1, 'GF2', 2);
INSERT INTO `tbl_units` VALUES (3, '101', 3);
INSERT INTO `tbl_units` VALUES (4, '102', 3);

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` int(3) NULL DEFAULT 1,
  `building_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'Neymar', 'John', 'neymarjohn215@gmail.com', '202cb962ac59075b964b07152d234b70', '2432124', '12343214321', 'uploads/7165347501642519590.jpg', NULL, 2, 1);

SET FOREIGN_KEY_CHECKS = 1;
