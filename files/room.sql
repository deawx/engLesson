/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50616
Source Host           : Localhost:3306
Source Database       : eng-lesson

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-04-24 16:07:16
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `room`
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('1', 'xxx');

-- ----------------------------
-- Table structure for `room_column`
-- ----------------------------
DROP TABLE IF EXISTS `room_column`;
CREATE TABLE `room_column` (
  `column_id` int(11) NOT NULL AUTO_INCREMENT,
  `column_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`column_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of room_column
-- ----------------------------
INSERT INTO `room_column` VALUES ('1', '1');
INSERT INTO `room_column` VALUES ('2', '2');
INSERT INTO `room_column` VALUES ('3', '3');
INSERT INTO `room_column` VALUES ('4', '4');

-- ----------------------------
-- Table structure for `room_row`
-- ----------------------------
DROP TABLE IF EXISTS `room_row`;
CREATE TABLE `room_row` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `row_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of room_row
-- ----------------------------
INSERT INTO `room_row` VALUES ('1', 'A');
INSERT INTO `room_row` VALUES ('2', 'B');
INSERT INTO `room_row` VALUES ('3', 'C');
INSERT INTO `room_row` VALUES ('4', 'D');

-- ----------------------------
-- Table structure for `room_seat`
-- ----------------------------
DROP TABLE IF EXISTS `room_seat`;
CREATE TABLE `room_seat` (
  `room_seat_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `column_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_seat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of room_seat
-- ----------------------------
INSERT INTO `room_seat` VALUES ('1', '1', '1', '1');
INSERT INTO `room_seat` VALUES ('2', '1', '1', '2');
INSERT INTO `room_seat` VALUES ('3', '1', '1', '3');
INSERT INTO `room_seat` VALUES ('4', '1', '1', '4');
INSERT INTO `room_seat` VALUES ('5', '1', '2', '1');
INSERT INTO `room_seat` VALUES ('6', '1', '2', '2');
INSERT INTO `room_seat` VALUES ('7', '1', '2', '3');
INSERT INTO `room_seat` VALUES ('8', '1', '2', '4');
INSERT INTO `room_seat` VALUES ('9', '1', '3', '1');
INSERT INTO `room_seat` VALUES ('10', '1', '3', '2');
INSERT INTO `room_seat` VALUES ('11', '1', '3', '3');
INSERT INTO `room_seat` VALUES ('12', '1', '3', '4');
INSERT INTO `room_seat` VALUES ('13', '1', '4', '1');
INSERT INTO `room_seat` VALUES ('14', '1', '4', '2');
INSERT INTO `room_seat` VALUES ('15', '1', '4', '3');
INSERT INTO `room_seat` VALUES ('16', '1', '4', '4');
