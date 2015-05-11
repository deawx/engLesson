/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50616
Source Host           : Localhost:3306
Source Database       : eng-lesson

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-05-11 14:53:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(80) COLLATE utf8_bin NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_mobile` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `attendance`
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `check_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of attendance
-- ----------------------------

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `booking_status` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `room_seat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1', '20', '1', 'Study', null);
INSERT INTO `booking` VALUES ('2', '5', '1', 'Reserved', null);
INSERT INTO `booking` VALUES ('4', '20', '2', 'Cancel', null);
INSERT INTO `booking` VALUES ('6', '20', '2', 'Reserved', null);
INSERT INTO `booking` VALUES ('7', '20', '5', 'Study', null);
INSERT INTO `booking` VALUES ('8', '24', '1', 'Cancel', null);
INSERT INTO `booking` VALUES ('9', '24', '2', 'Study', null);
INSERT INTO `booking` VALUES ('10', '29', '1', 'Reserved', null);
INSERT INTO `booking` VALUES ('11', '29', '2', 'Cancel', null);
INSERT INTO `booking` VALUES ('12', '29', '5', 'Study', null);
INSERT INTO `booking` VALUES ('15', '20', '1', 'Study', null);
INSERT INTO `booking` VALUES ('16', '24', '1', 'Study', null);
INSERT INTO `booking` VALUES ('17', '5', '1', 'Study', null);
INSERT INTO `booking` VALUES ('18', '20', '1', 'Study', null);
INSERT INTO `booking` VALUES ('19', '24', '1', 'Study', null);
INSERT INTO `booking` VALUES ('20', '34', '14', 'Study', null);
INSERT INTO `booking` VALUES ('21', '34', '15', 'Study', null);
INSERT INTO `booking` VALUES ('22', '34', '16', 'Study', null);
INSERT INTO `booking` VALUES ('23', '34', '17', 'Study', null);
INSERT INTO `booking` VALUES ('28', '34', '18', 'Reserved', '2');
INSERT INTO `booking` VALUES ('29', '37', '18', 'Study', '5');
INSERT INTO `booking` VALUES ('30', '34', '7', 'Reserved', '9');
INSERT INTO `booking` VALUES ('31', '38', '3', 'Study', '9');
INSERT INTO `booking` VALUES ('36', '26', '12', 'Study', null);
INSERT INTO `booking` VALUES ('37', '26', '1', 'Study', null);
INSERT INTO `booking` VALUES ('38', '34', '1', 'Study', null);
INSERT INTO `booking` VALUES ('39', '34', '5', 'Study', null);
INSERT INTO `booking` VALUES ('40', '39', '20', 'Reserved', '10');
INSERT INTO `booking` VALUES ('41', '36', '2', 'Study', null);
INSERT INTO `booking` VALUES ('42', '36', '12', 'Study', null);
INSERT INTO `booking` VALUES ('43', '36', '1', 'Study', null);
INSERT INTO `booking` VALUES ('44', '36', '5', 'Study', null);
INSERT INTO `booking` VALUES ('45', '36', '7', 'Study', null);
INSERT INTO `booking` VALUES ('62', '40', '14', 'Study', '3');
INSERT INTO `booking` VALUES ('63', '40', '15', 'Study', '3');
INSERT INTO `booking` VALUES ('64', '40', '16', 'Study', '3');
INSERT INTO `booking` VALUES ('65', '40', '17', 'Study', '3');
INSERT INTO `booking` VALUES ('66', '40', '18', 'Study', '3');
INSERT INTO `booking` VALUES ('67', '40', '20', 'Study', '3');
INSERT INTO `booking` VALUES ('68', '40', '21', 'Reserved', '3');
INSERT INTO `booking` VALUES ('69', '39', '14', 'Study', null);
INSERT INTO `booking` VALUES ('70', '40', '22', 'Study', '10');
INSERT INTO `booking` VALUES ('71', '40', '1', 'Reserved', '13');
INSERT INTO `booking` VALUES ('72', '40', '2', 'Reserved', '13');
INSERT INTO `booking` VALUES ('73', '40', '5', 'Reserved', '13');
INSERT INTO `booking` VALUES ('74', '40', '7', 'Reserved', '13');
INSERT INTO `booking` VALUES ('75', '40', '12', 'Reserved', '13');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `course_type` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `max_seat` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` double DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `enabled` varchar(1) COLLATE utf8_bin DEFAULT 'Y',
  `total_day` int(11) DEFAULT '10',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'startter eng lv1', 'Live', '20', '2015-04-05', '2015-05-31', '5000', '1', 'Y', '10');
INSERT INTO `course` VALUES ('2', 'startter eng lv2', 'Live', '20', '2015-04-05', '2015-05-31', '4000', '2', 'Y', '10');
INSERT INTO `course` VALUES ('3', 'eng corudfjf 3', 'Live', '33', '2015-04-05', '2015-05-31', '5500', '3', 'Y', '10');
INSERT INTO `course` VALUES ('4', 'english rent for lv4', 'Live', '44', '2015-04-05', '2015-05-31', '7000', '4', 'Y', '10');
INSERT INTO `course` VALUES ('5', 'fidngi corjcue eng5', 'Live', '15', '2015-04-05', '2015-05-31', '8400', '5', 'Y', '10');
INSERT INTO `course` VALUES ('6', 'videoi ginfgi eng5', 'Video', '15', '2015-04-05', '2015-05-31', '4400', '5', 'Y', '10');
INSERT INTO `course` VALUES ('7', 'vig ddvv expeort renf lv4', 'Video', '40', '2015-04-05', '2015-05-31', '3000', '4', 'Y', '10');
INSERT INTO `course` VALUES ('8', 'vifdeng corudfjf 3', 'Video', '33', '2015-04-05', '2015-05-31', '2400', '3', 'Y', '10');
INSERT INTO `course` VALUES ('11', 'ege level4 fortu df vedbeifjgnerer', 'Video', '50', '2015-04-09', '2015-04-19', '3200', '2', 'Y', '10');
INSERT INTO `course` VALUES ('13', 'Live Coure Level1 Alternative', 'Live', '5', '2015-04-24', '2015-04-29', '5000', '1', 'Y', '10');
INSERT INTO `course` VALUES ('14', 'VideoLevle1', 'Video', '11', '2015-04-24', '2015-04-29', '2333', '1', 'Y', '10');
INSERT INTO `course` VALUES ('15', 'Video Test Seat LEvel1', 'Video', '16', '2015-05-01', '2015-05-23', '5000', '1', 'Y', '10');

-- ----------------------------
-- Table structure for `exam`
-- ----------------------------
DROP TABLE IF EXISTS `exam`;
CREATE TABLE `exam` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `ispass` varchar(3) COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `test_date` date DEFAULT NULL,
  `exam_list_id` int(11) DEFAULT NULL,
  `register_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of exam
-- ----------------------------
INSERT INTO `exam` VALUES ('1', '5', '1', '0', '', '0', '2015-02-27', null, null);
INSERT INTO `exam` VALUES ('8', '20', '3', '0', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('10', '22', '3', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('11', '23', '4', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('12', '24', '3', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('13', '25', '4', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('14', '26', '4', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('15', '27', '3', '3', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('16', '28', '1', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('17', '29', '1', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('18', '31', '1', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('19', '32', '2', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('20', '33', '1', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('21', '34', '1', '1', '', '0', '2015-02-02', null, null);
INSERT INTO `exam` VALUES ('22', '36', '1', '0', '', '0', '2015-04-24', '2', null);
INSERT INTO `exam` VALUES ('27', '34', '1', '1', 'Y', '0', '2015-04-24', '4', '20');
INSERT INTO `exam` VALUES ('28', '37', '0', '0', '', '0', '2015-04-24', '2', null);
INSERT INTO `exam` VALUES ('29', '38', '0', '0', '', '0', '2015-04-29', '1', null);
INSERT INTO `exam` VALUES ('30', '39', '0', '0', '', '0', '2015-05-01', '2', null);
INSERT INTO `exam` VALUES ('31', '40', '0', '0', '', '0', '2015-05-01', '2', null);
INSERT INTO `exam` VALUES ('33', '40', '0', '1', 'N', '0', '2015-05-01', '4', '30');
INSERT INTO `exam` VALUES ('34', '40', '0', '1', 'N', '0', '2015-05-01', '3', '31');
INSERT INTO `exam` VALUES ('35', '41', '2', '0', '', '0', '2015-05-04', '1', null);

-- ----------------------------
-- Table structure for `exam_choice`
-- ----------------------------
DROP TABLE IF EXISTS `exam_choice`;
CREATE TABLE `exam_choice` (
  `exam_choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_question_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `choice` varchar(255) COLLATE utf8_bin NOT NULL,
  `enabled` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`exam_choice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of exam_choice
-- ----------------------------
INSERT INTO `exam_choice` VALUES ('1', '1', '1', 'His', 'Y');
INSERT INTO `exam_choice` VALUES ('2', '1', '2', 'He', 'Y');
INSERT INTO `exam_choice` VALUES ('3', '1', '3', 'Him', 'Y');
INSERT INTO `exam_choice` VALUES ('4', '1', '4', 'Her', 'Y');
INSERT INTO `exam_choice` VALUES ('5', '2', '1', 'Their', 'Y');
INSERT INTO `exam_choice` VALUES ('6', '2', '2', 'His', 'Y');
INSERT INTO `exam_choice` VALUES ('7', '2', '3', 'They', 'Y');
INSERT INTO `exam_choice` VALUES ('8', '2', '4', 'Hi ', 'Y');
INSERT INTO `exam_choice` VALUES ('9', '3', '1', 'their', 'Y');
INSERT INTO `exam_choice` VALUES ('10', '3', '2', 'them', 'Y');
INSERT INTO `exam_choice` VALUES ('11', '3', '3', 'its', 'Y');
INSERT INTO `exam_choice` VALUES ('12', '3', '4', 'they', 'Y');
INSERT INTO `exam_choice` VALUES ('13', '4', '1', 'inside', 'Y');
INSERT INTO `exam_choice` VALUES ('14', '4', '2', 'root out', 'Y');
INSERT INTO `exam_choice` VALUES ('15', '4', '3', 'prohibit', 'Y');
INSERT INTO `exam_choice` VALUES ('16', '4', '4', 'proof', 'Y');
INSERT INTO `exam_choice` VALUES ('29', '10', '1', 'airair', 'Y');
INSERT INTO `exam_choice` VALUES ('30', '10', '2', 'bible boboe', 'Y');
INSERT INTO `exam_choice` VALUES ('31', '10', '3', 'cat a vse ', 'Y');
INSERT INTO `exam_choice` VALUES ('32', '10', '4', 'diogdfdf', 'Y');
INSERT INTO `exam_choice` VALUES ('33', '11', '1', 'clocwejk l', 'Y');
INSERT INTO `exam_choice` VALUES ('34', '11', '2', 'nevowmoce', 'Y');
INSERT INTO `exam_choice` VALUES ('35', '11', '3', 'warli9 ce', 'Y');
INSERT INTO `exam_choice` VALUES ('36', '11', '4', 'mordor', 'Y');
INSERT INTO `exam_choice` VALUES ('37', '12', '1', 'him', 'Y');
INSERT INTO `exam_choice` VALUES ('38', '12', '2', 'her', 'Y');
INSERT INTO `exam_choice` VALUES ('39', '12', '3', 'hers', 'Y');
INSERT INTO `exam_choice` VALUES ('40', '12', '4', 'he', 'Y');
INSERT INTO `exam_choice` VALUES ('41', '13', '1', 'by', 'Y');
INSERT INTO `exam_choice` VALUES ('42', '13', '2', 'on', 'Y');
INSERT INTO `exam_choice` VALUES ('43', '13', '3', 'in', 'Y');
INSERT INTO `exam_choice` VALUES ('44', '13', '4', 'at', 'Y');
INSERT INTO `exam_choice` VALUES ('45', '14', '1', 'at', 'Y');
INSERT INTO `exam_choice` VALUES ('46', '14', '2', 'on', 'Y');
INSERT INTO `exam_choice` VALUES ('47', '14', '3', 'in', 'Y');
INSERT INTO `exam_choice` VALUES ('48', '14', '4', 'by', 'Y');
INSERT INTO `exam_choice` VALUES ('49', '15', '1', 'government ', 'Y');
INSERT INTO `exam_choice` VALUES ('50', '15', '2', 'professor', 'Y');
INSERT INTO `exam_choice` VALUES ('51', '15', '3', 'director', 'Y');
INSERT INTO `exam_choice` VALUES ('52', '15', '4', 'judge', 'Y');
INSERT INTO `exam_choice` VALUES ('53', '16', '1', 'atv', 'Y');
INSERT INTO `exam_choice` VALUES ('54', '16', '2', 'b', 'Y');
INSERT INTO `exam_choice` VALUES ('55', '16', '3', 'ccvb', 'Y');
INSERT INTO `exam_choice` VALUES ('56', '16', '4', 'drrr', 'Y');
INSERT INTO `exam_choice` VALUES ('57', '17', '1', 'yenzva', 'Y');
INSERT INTO `exam_choice` VALUES ('58', '17', '2', 'lenfebn', 'Y');
INSERT INTO `exam_choice` VALUES ('59', '17', '3', 'urbanm', 'Y');
INSERT INTO `exam_choice` VALUES ('60', '17', '4', 'notigot', 'Y');
INSERT INTO `exam_choice` VALUES ('61', '18', '1', 'myw ', 'Y');
INSERT INTO `exam_choice` VALUES ('62', '18', '2', 'stat', 'Y');
INSERT INTO `exam_choice` VALUES ('63', '18', '3', 'war', 'Y');
INSERT INTO `exam_choice` VALUES ('64', '18', '4', 'ggg', 'Y');
INSERT INTO `exam_choice` VALUES ('65', '19', '1', 'ok', 'Y');
INSERT INTO `exam_choice` VALUES ('66', '19', '2', 'coccuonutr', 'Y');
INSERT INTO `exam_choice` VALUES ('67', '19', '3', 'suamil', 'Y');
INSERT INTO `exam_choice` VALUES ('68', '19', '4', 'doudjfc', 'Y');
INSERT INTO `exam_choice` VALUES ('69', '20', '1', 'xccc', 'Y');
INSERT INTO `exam_choice` VALUES ('70', '20', '2', 'xxx', 'Y');
INSERT INTO `exam_choice` VALUES ('71', '20', '3', 'aaaa', 'Y');
INSERT INTO `exam_choice` VALUES ('72', '20', '4', 'cccc', 'Y');

-- ----------------------------
-- Table structure for `exam_list`
-- ----------------------------
DROP TABLE IF EXISTS `exam_list`;
CREATE TABLE `exam_list` (
  `exam_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `level` int(11) NOT NULL,
  `enabled` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`exam_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of exam_list
-- ----------------------------
INSERT INTO `exam_list` VALUES ('1', 'แบบทดสอบก่อนเรียน', '0', 'Y');
INSERT INTO `exam_list` VALUES ('2', ' ข้อสอบ Pretest ชุดที่ 2', '0', '');
INSERT INTO `exam_list` VALUES ('3', 'ทดสอบหลังเรียน เวล หนึ่ง', '1', 'Y');
INSERT INTO `exam_list` VALUES ('4', 'ทดสอบเลขเวลหนึ่ง ชุดที่สอง', '1', 'Y');

-- ----------------------------
-- Table structure for `exam_part`
-- ----------------------------
DROP TABLE IF EXISTS `exam_part`;
CREATE TABLE `exam_part` (
  `exam_part_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_list_id` int(11) DEFAULT NULL,
  `part_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `part_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `part_detail` varchar(3000) COLLATE utf8_bin DEFAULT NULL,
  `part_no` int(11) DEFAULT NULL,
  `enabled` varchar(1) COLLATE utf8_bin DEFAULT 'Y',
  PRIMARY KEY (`exam_part_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of exam_part
-- ----------------------------
INSERT INTO `exam_part` VALUES ('1', '1', 'choose correct answer', null, 'answer the qesution', '1', 'Y');
INSERT INTO `exam_part` VALUES ('2', '1', 'Reading', 'Directions: Choose the word that best completes each blank.', 'Chiang Mai Zoo9s Snow Dome will open its doors to tourists from Saturday. The temperature ….22....the 580-square-metre dome is as low as minus 5 degrees Celsius.                    The dome sports a Chinese background and also boasts a big “slider” for tourists to ride down in donut skis. \r\n“Snow is falling here,” zoo ...23....Thanapat Pongpamorn said yesterday, “The floor is covered with snow. I want to call this real snow, not …24.....snow, because it9s exactly like real snow. The only difference it the snow here does no fall naturally.”\r\nThe....25....fee is Bt150 for each adult and Bt100 per child. After paying the fee, tourists will be handed a coat and shoes to keep them warm inside the dome. Each tourist will be allowed to stay inside for 20 minutes. The dome, which cost Bt70 million to construct, can ...26.....no more than 50 tourists at a time.\r\n“Tourists can make a snow-man or any …27…. From the snow, if they like,” Thanapat said. The dome also has a…28…. zone for pandas.  “It will be the new home to the panda family,” Thanapat said. There are three pandas at the Chiang Mai Zoo O Chuang Chuang, Lin Hui and their…29…,which was born on May 27. The pandas are on loan from China.\r\nDeputy Chiang Mai Governor Chumporn Saengmanee says the snow dome will be like a second gift to the baby panda, which is now a…30.... The first gift was the three-day…31….held earlier this month to mark its birth.\r\n', '2', 'Y');
INSERT INTO `exam_part` VALUES ('5', '1', ' ส่วนของ Part ที่ 4aaaa', 'my part 4 check for error', '        error checking                     ', '4', 'Y');
INSERT INTO `exam_part` VALUES ('6', '2', ' Part 1', ' get the right qanswerr', 'cangofj otm,mnsdldmsdnmsaw4ekef', '1', 'Y');
INSERT INTO `exam_part` VALUES ('7', '3', ' part one', ' fot the cuntionfutioer', '               untion', '1', 'Y');
INSERT INTO `exam_part` VALUES ('8', '4', ' psefmo oen ', ' the apt mmmon eof aletenative pat4', '               ', '1', 'Y');

-- ----------------------------
-- Table structure for `exam_question`
-- ----------------------------
DROP TABLE IF EXISTS `exam_question`;
CREATE TABLE `exam_question` (
  `exam_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_list_id` int(11) NOT NULL,
  `exam_part_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_bin NOT NULL,
  `enabled` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'Y',
  `answer` int(11) NOT NULL,
  `answer_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`exam_question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of exam_question
-- ----------------------------
INSERT INTO `exam_question` VALUES ('1', '1', '1', '1', 'David lives in America.  ........... is an officer in CITI Bank', 'Y', '2', null);
INSERT INTO `exam_question` VALUES ('2', '1', '1', '2', 'Jack and his family have lunch in the restaurant. ........  Like Chinese food.', 'Y', '7', null);
INSERT INTO `exam_question` VALUES ('3', '1', '1', '3', 'Working with learning by doing is the best way to learn.......... capabilities.', 'Y', '9', null);
INSERT INTO `exam_question` VALUES ('4', '1', '2', '22', 'Choose Answer', 'Y', '13', null);
INSERT INTO `exam_question` VALUES ('10', '0', '5', '1', ' what when where why', 'Y', '29', null);
INSERT INTO `exam_question` VALUES ('11', '0', '5', '2', ' we ar re the iorabd juhniec', 'Y', '35', null);
INSERT INTO `exam_question` VALUES ('12', '0', '1', '4', ' Tina is a good employee. Her boss likes .............', 'Y', '38', null);
INSERT INTO `exam_question` VALUES ('13', '0', '1', '5', ' The artist spends many hours........... his studio', 'Y', '43', null);
INSERT INTO `exam_question` VALUES ('14', '0', '1', '6', 'His office is  ......... 45 Radio road.', 'Y', '45', null);
INSERT INTO `exam_question` VALUES ('15', '0', '2', '23', ' Choose answer', 'Y', '51', null);
INSERT INTO `exam_question` VALUES ('16', '0', '6', '1', ' are you spsemfna wnifloist', 'Y', '55', null);
INSERT INTO `exam_question` VALUES ('17', '0', '7', '1', ' fot theu untiyuebnr', 'Y', '60', null);
INSERT INTO `exam_question` VALUES ('18', '0', '8', '1', ' thep lare mvelfepaper patj', 'Y', '61', null);
INSERT INTO `exam_question` VALUES ('19', '0', '8', '2', ' mauyn ads is ', 'Y', '66', null);
INSERT INTO `exam_question` VALUES ('20', '0', '8', '3', ' sdfsdvcsv', 'Y', '72', null);

-- ----------------------------
-- Table structure for `main_course`
-- ----------------------------
DROP TABLE IF EXISTS `main_course`;
CREATE TABLE `main_course` (
  `main_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `course_detail` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` date DEFAULT NULL,
  `enabled` varchar(1) COLLATE utf8_bin DEFAULT 'Y',
  PRIMARY KEY (`main_course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of main_course
-- ----------------------------
INSERT INTO `main_course` VALUES ('1', 'Level 1 Beginning (ช่วงคะแนน 1 – 6 คะแนน ) ', 'สอนพื้นฐานทางภาษาอังกฤษสำหรับผู้ที่พื้นฐานทางภาษาไม่แข็งแรง ค่าใช้จ่ายหลักสูตร 2,000 บาท\r\n          ', '2015-04-08', null, 'Y');
INSERT INTO `main_course` VALUES ('2', 'Level 2 Pre-Intermediate', 'สอนการใช้ภาษาให้ถูกต้อง ควรใช้และไม่ควรใช้เมื่อไหร่ ความหมายที่แตกต่างและการนำไปใช้ ค่าใช้จ่ายหลักสูตร 1,500 บาท        ', '2015-04-18', null, 'Y');
INSERT INTO `main_course` VALUES ('3', 'Level 3-Intermediate', 'ฝึกพูดภาษาอังกฤษด้วยประโยคง่ายๆตามสถานที่ต่างๆ ค่าใช้จ่ายหลักสูตร 1500 บาท                      ', '2015-04-08', null, 'Y');
INSERT INTO `main_course` VALUES ('4', 'Level4-Upper-Intermediate', 'การนำภาษาอังกฤษไปใช้จริงในที่ทำงานและสถานที่ต่างๆ ค่าใช้จ่ายหลักสูตร 1,500 บาท       ', '2015-04-08', null, 'Y');
INSERT INTO `main_course` VALUES ('5', 'Level5-Advanced', 'สำนวนภาษาอังกฤษที่ควรรู้และเทคนิคทำอย่างไรให้เก่งภาษา บทสนทนาภาษาอังกฤษจากในชีวิตประจำวัน ค่าใช้จ่ายหลักสูตร 1000 บาท', '2015-04-11', null, 'Y');

-- ----------------------------
-- Table structure for `register`
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `register_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_bin DEFAULT 'Pending' COMMENT 'Pending ,Paid,Confirmed,Cancel',
  `file_name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `file_path` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `register_end_date` date DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  PRIMARY KEY (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES ('1', '5', '1', 'Cancel', 'precise-logo.png', null, '2015-04-05', '2015-04-08', '2015-04-05');
INSERT INTO `register` VALUES ('2', '20', '1', 'Pending', null, null, null, null, null);
INSERT INTO `register` VALUES ('5', '5', '3', 'Pending', null, null, null, null, null);
INSERT INTO `register` VALUES ('15', '26', '1', 'Paid', 'โลโก้1.png', null, '2015-04-09', '2015-04-12', '2015-04-09');
INSERT INTO `register` VALUES ('19', '5', '3', 'Printed', null, null, '2015-04-23', '2015-04-26', null);
INSERT INTO `register` VALUES ('20', '34', '13', 'PassTest', null, null, '2015-04-24', '2015-04-27', null);
INSERT INTO `register` VALUES ('21', '37', '13', 'Paid', 'ติดต่อเรา.doc', null, '2015-04-24', '2015-04-27', '2015-04-24');
INSERT INTO `register` VALUES ('22', '34', '1', 'Printed', null, null, '2015-04-28', '2015-05-01', null);
INSERT INTO `register` VALUES ('23', '36', '1', 'Printed', null, null, '2015-04-28', '2015-05-01', null);
INSERT INTO `register` VALUES ('27', '38', '3', 'Paid', 'room.sql', null, '2015-04-29', '2015-05-02', '2015-04-29');
INSERT INTO `register` VALUES ('29', '39', '13', 'Printed', null, null, '2015-05-01', '2015-05-04', null);
INSERT INTO `register` VALUES ('30', '40', '15', 'NotPassTest', '103307.jpg', null, '2015-05-01', '2015-05-04', '2015-05-01');
INSERT INTO `register` VALUES ('31', '40', '13', 'NotPassTest', null, null, '2015-05-01', '2015-05-04', null);
INSERT INTO `register` VALUES ('32', '40', '14', 'Pending', null, null, '2015-05-01', '2015-05-04', null);
INSERT INTO `register` VALUES ('33', '40', '1', 'Confirmed', null, null, '2015-05-01', '2015-05-04', null);
INSERT INTO `register` VALUES ('34', '41', '14', 'Printed', null, null, '2015-05-04', '2015-05-07', null);

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

-- ----------------------------
-- Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `max_seat` int(11) DEFAULT NULL,
  `enabled` varchar(1) COLLATE utf8_bin DEFAULT 'Y',
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of schedule
-- ----------------------------
INSERT INTO `schedule` VALUES ('1', '1', '1', '2015-04-25', '11:30:14', '13:30:19', '11', 'Y', '1');
INSERT INTO `schedule` VALUES ('2', '1', '1', '2015-04-30', '11:31:12', '13:30:19', '20', 'Y', '1');
INSERT INTO `schedule` VALUES ('3', '3', '2', '2015-05-28', '10:31:36', '12:31:48', '25', 'Y', '1');
INSERT INTO `schedule` VALUES ('5', '1', '2', '2015-04-28', '10:27:07', '14:27:09', '14', 'Y', '1');
INSERT INTO `schedule` VALUES ('6', '2', '1', '2015-04-29', '11:31:12', '13:30:19', '24', 'Y', '1');
INSERT INTO `schedule` VALUES ('7', '1', '1', '2022-09-15', '11:00:11', '12:00:00', '40', 'Y', '1');
INSERT INTO `schedule` VALUES ('12', '1', '1', '2015-04-15', '01:00:00', '02:00:00', '23', 'Y', '1');
INSERT INTO `schedule` VALUES ('13', '5', '1', '2015-04-23', '01:00:00', '02:00:00', '5', 'Y', '1');
INSERT INTO `schedule` VALUES ('14', '13', '1', '2015-04-24', '01:00:00', '02:00:00', '10', 'Y', '1');
INSERT INTO `schedule` VALUES ('15', '13', '1', '2015-04-25', '02:00:00', '03:00:00', '10', 'Y', '1');
INSERT INTO `schedule` VALUES ('16', '13', '1', '2015-04-26', '04:30:00', '05:30:00', '10', 'Y', '1');
INSERT INTO `schedule` VALUES ('17', '13', '1', '2015-04-27', '05:40:00', '05:50:00', '11', 'Y', '1');
INSERT INTO `schedule` VALUES ('18', '13', '1', '2015-04-28', '14:00:00', '15:00:00', '34', 'Y', '1');
INSERT INTO `schedule` VALUES ('19', '3', '2', '2015-04-24', '03:50:00', '04:40:00', '3', 'Y', '1');
INSERT INTO `schedule` VALUES ('20', '13', '1', '2015-05-01', '13:00:00', '02:00:00', '4', 'Y', '1');
INSERT INTO `schedule` VALUES ('21', '13', '1', '2015-05-02', '01:00:00', '02:00:00', '4', 'Y', '1');
INSERT INTO `schedule` VALUES ('22', '15', '1', '2015-05-09', '09:00:00', '12:00:00', '0', 'Y', '1');
INSERT INTO `schedule` VALUES ('23', '14', '1', '2015-05-01', '09:00:00', '12:00:00', null, 'Y', '1');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(80) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(100) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `user_type` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `level` int(11) DEFAULT '1',
  `create_date` date NOT NULL,
  `last_login` date NOT NULL,
  `last_logout` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('5', 'tostyle', '827ccb0eea8a706c4c34a16891f84e7b', 'steve', 'novak', '', 'unplugged_2d@hotmail.com', '0898898888', '', '', '3', '2015-04-04', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('20', 'Terry', 'dd5585a92b04d4420477ee6082770fd1', 'john', 'terry', '', 'unplugged_2d@hotmail.com', 'aaaaaaaaaaaaaa', '', '', '2', '2015-04-04', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('22', '', '', 'jonathan', 'walter', '', '', '', '', '', '1', '2015-04-09', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('23', '', '', 'gon', 'hunter', '', '', '', '', '', '1', '2015-04-09', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('24', 'joe', '46ebfdc1519946f436cd1081b525d98f', 'joe', 'iceberg', '', 'unplugged_2d@hotmail.com', '04594545', '', '', '1', '2015-04-09', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('25', '', '', 'johm', 'xx', '', '', '', '', '', '1', '2015-04-09', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('26', 'pant', '886b4234d8b36f85238d8b25b2488267', 'pan', 'pan', '', 'unplugged_2d@hotmail.com', '09777666', '', '', '1', '2015-04-09', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('27', '', '', 'alice', 'hunter', '', '', '', '', '', '1', '2015-04-11', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('28', '', '', 'cvcvxvcx', 'aaa', '', '', '', '', '', '1', '2015-04-11', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('29', 'john', '31ff4c4538fe1c10d6c340776be75822', 'ccc', 'axxc', '', 'unplugged_2d@hotmail.com', 'aaaa', '', '', '1', '2015-04-11', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('30', 'joe', '46ebfdc1519946f436cd1081b525d98f', 'som', 'wink', '', 'unplugged_2d@hotmail.com', 'asd', '', '', '1', '2015-04-13', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('31', '', '', 'anthony', 'advis', '', '', '', '', '', '1', '2015-04-18', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('32', '', '', 'onyx', 'forum', '', '', '', '', '', '1', '2015-04-22', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('33', 'joe', '46ebfdc1519946f436cd1081b525d98f', 'wood', 'gate', '', 'unplugged_2d@hotmail.com', '9842435', '', '', '1', '2015-04-22', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('34', 'diegos', '8b123b7a7cf86f5aa9424d1f379384d8', 'peater', 'pan', '', 'unplugged_2d@hotmail.com', '23432', '', '', '1', '2015-04-24', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('35', '', '', 'francis', 'gg', '', '', '', '', '', '1', '2015-04-24', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('36', 'diego', '8b123b7a7cf86f5aa9424d1f379384d8', 'eric', 'cantona', '', 'unplugged_2d@hotmail.com', 'ccccc', '', '', '1', '2015-04-24', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('37', 'diego', '8b123b7a7cf86f5aa9424d1f379384d8', 'stone', 'cold', '', 'unplugged_2d@hotmail.com', '334', '', '', '1', '2015-04-24', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('38', 'diego', '8b123b7a7cf86f5aa9424d1f379384d8', 'ok', 'naka', '', 'unplugged_2d@hotmail.com', 'sdfdsf', '', '', '3', '2015-04-29', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('39', 'video', '098f6bcd4621d373cade4e832627b4f6', 'video', 'test', '', 'unplugged_2d@hotmail.com', 'retert', '', '', '1', '2015-05-01', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('40', 'anthony', '1c4637c65b65c8129e285a2514bb7a94', 'anthony', 'davis', '', 'unplugged_2d@hotmail.com', '345435', '', '', '1', '2015-05-01', '0000-00-00', '0000-00-00');
INSERT INTO `student` VALUES ('41', 'kyle', '89ba023086e37a345839e0c6a0d272eb', 'kyle', 'lowry', '', 'unplugged_2d@hotmail.com', 'ertert', '', '', '1', '2015-05-04', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `user_type` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'teacher', '81dc9bdb52d04dc20036dbd8313ed055', 'คุฯครูมานี', 'มะลวัล', 'Teacher', null, null, null);
INSERT INTO `user` VALUES ('2', null, null, 'วงสัะกด', 'หกเขม้', 'Teacher', null, null, null);
INSERT INTO `user` VALUES ('3', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'myadmin', 'superuser', 'Admin', null, null, '2015-04-01');
INSERT INTO `user` VALUES ('5', 'ceo', '81dc9bdb52d04dc20036dbd8313ed055', 'jonathan', 'johnson', 'executive', null, null, '2015-04-23');

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_detail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `video_no` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `enabled` varchar(1) COLLATE utf8_bin DEFAULT 'Y',
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('1', 'คาบเรียนที่ 2', '12 Tenses - เรียนภาษาอังกฤษ English Grammar - ไวยากรณ์', 'lv1/level1_2.mp4', null, '1', 'Y', null);
INSERT INTO `video` VALUES ('3', 'คาบเรียนที่ 1', 'การใช้ have,has,had', 'lv1/level1_1.mp4', null, '1', 'Y', null);
INSERT INTO `video` VALUES ('4', 'การขอบคุณ ขอโทษ ตอบรับ ปฏิเสธ', 'การขอบคุณ ขอโทษ ตอบรับ ปฏิเสธ', 'Level3-Intermediate/ฝึกพูดภาษาอังกฤษ  การขอบคุณ ขอโทษ ตอบรับ ปฏิเสธ.mp4', '1', '3', 'Y', null);
INSERT INTO `video` VALUES ('5', 'ฝึกพูดภาษาอังกฤษ  คำถามชวนคุย', 'ฝึกพูดภาษาอังกฤษ  คำถามชวนคุย', 'Level3-Intermediate/ฝึกพูดภาษาอังกฤษ  คำถามชวนคุย.mp4', '2', '3', 'Y', null);
INSERT INTO `video` VALUES ('6', 'ฝึกพูดภาษาอังกฤษ  พูดในร้านอาหาร', 'ฝึกพูดภาษาอังกฤษ  พูดในร้านอาหาร', 'Level3-Intermediate/ฝึกพูดภาษาอังกฤษ  พูดในร้านอาหาร.mp4', '3', '3', 'Y', null);
INSERT INTO `video` VALUES ('7', 'พูดอังกฤษในการทำงาน', 'พูดอังกฤษในการทำงาน', 'Level4-Upper-Intermediate/พูดอังกฤษในการทำงาน 1.mp4', '1', '4', 'Y', null);
INSERT INTO `video` VALUES ('8', 'พูดอังกฤษในการทำงาน', 'พูดอังกฤษในการทำงาน', 'Level4-Upper-Intermediate/พูดอังกฤษในการทำงาน 2.mp4', '2', '4', 'Y', null);
INSERT INTO `video` VALUES ('9', 'พูดอังกฤษในการทำงาน', 'พูดอังกฤษในการทำงาน', 'Level4-Upper-Intermediate/พูดอังกฤษในการทำงาน 3.mp4', '3', '4', 'Y', null);
INSERT INTO `video` VALUES ('10', 'พูดอังกฤษในการทำงาน', 'พูดอังกฤษในการทำงาน', 'Level4-Upper-Intermediate/พูดอังกฤษในการทำงาน 4.mp4', '4', '4', 'Y', null);
INSERT INTO `video` VALUES ('11', 'พูดอังกฤษในการทำงาน', 'พูดอังกฤษในการทำงาน', 'Level4-Upper-Intermediate/พูดอังกฤษในการทำงาน 5.mp4', '5', '4', 'Y', null);
INSERT INTO `video` VALUES ('12', 'เรียนภาษาอังกฤษชีิวิตประจำวัน', 'เรียนภาษาอังกฤษชีิวิตประจำวัน', 'Level5-Advanced/เรียนภาษาอังกฤษชีิวิตประจำวัน.mp4', '1', '5', 'Y', null);
INSERT INTO `video` VALUES ('13', '18 สำนวนภาษาอังกฤษที่', '18 สำนวนภาษาอังกฤษที่', 'Level5-Advanced/18 สำนวนภาษาอังกฤษที่ \'ต้องรู้\' - by หลิงๆค่ะ.mp4', '2', '5', 'Y', null);
INSERT INTO `video` VALUES ('14', 'ออกเสียงภาษาอังกฤษ- Frog, Fog, Fork, Fudge, Peanut', 'ออกเสียงภาษาอังกฤษ- Frog, Fog, Fork, Fudge, Peanut', 'Level2-Pre-Intermediate/ออกเสียงภาษาอังกฤษ- Frog, Fog, Fork, Fudge, Peanuts.mp4', '1', '2', 'Y', null);
INSERT INTO `video` VALUES ('15', 'Why, While, Wild, Wine, Whine, White, Wide ออกเสียงต่างกันอย่างไร', 'Why, While, Wild, Wine, Whine, White, Wide ออกเสียงต่างกันอย่างไร', 'Level2-Pre-Intermediate/Why, While, Wild, Wine, Whine, White, Wide ออกเสียงต่างกันอย่างไร.mp4', '2', '2', 'Y', null);
INSERT INTO `video` VALUES ('16', 'Want To กับ Would Like To ต่างกันยังไง', 'Want To กับ Would Like To ต่างกันยังไง', 'Level2-Pre-Intermediate/Want To กับ Would Like To ต่างกันยังไง.mp4', '3', '2', 'Y', null);
INSERT INTO `video` VALUES ('17', 'Wait กับ Wet ออกเสียงต่างกันอย่างไร', 'Wait กับ Wet ออกเสียงต่างกันอย่างไร', 'Level2-Pre-Intermediate/Wait กับ Wet ออกเสียงต่างกันอย่างไร.mp4', '4', '2', 'Y', null);
INSERT INTO `video` VALUES ('18', 'Sorry กับ Apologize ต่างกันอย่างไร', 'Sorry กับ Apologize ต่างกันอย่างไร', 'Level2-Pre-Intermediate/Sorry กับ Apologize ต่างกันอย่างไร.mp4', '5', '2', 'Y', null);
INSERT INTO `video` VALUES ('19', 'So ใช้อย่างไร', 'So ใช้อย่างไร', 'Level2-Pre-Intermediate/So ใช้อย่างไร.mp4', '6', '2', 'Y', null);
INSERT INTO `video` VALUES ('20', 'So far, so good  ไม่ได้แปลว่า ไกลมาก ดีมาก', 'So far, so good  ไม่ได้แปลว่า ไกลมาก ดีมาก', 'Level2-Pre-Intermediate/So far, so good  ไม่ได้แปลว่า ไกลมาก ดีมาก.mp4', '7', '2', 'Y', null);
INSERT INTO `video` VALUES ('21', 'Shut up กับ Be quiet ใช้ยังไง', 'Shut up กับ Be quiet ใช้ยังไง', 'Level2-Pre-Intermediate/Shut up กับ Be quiet ใช้ยังไง.mp4', '8', '2', 'Y', null);
INSERT INTO `video` VALUES ('22', 'Say, Speak, Talk, Tell ใช้ต่างกันอย่างไรบ้าง', 'Say, Speak, Talk, Tell ใช้ต่างกันอย่างไรบ้าง', 'Level2-Pre-Intermediate/Say, Speak, Talk, Tell ใช้ต่างกันอย่างไรบ้าง.mp4', '9', '2', 'Y', null);
INSERT INTO `video` VALUES ('23', 'look, look after, กับ watch ใช้ต่างกันอย่างไร', 'look, look after, กับ watch ใช้ต่างกันอย่างไร', 'Level2-Pre-Intermediate/look, look after, กับ watch ใช้ต่างกันอย่างไร.mp4', '10', '2', 'Y', null);
INSERT INTO `video` VALUES ('24', 'a lot of, very, กับ much ใช้ต่างกันอย่างไร', 'a lot of, very, กับ much ใช้ต่างกันอย่างไร', 'Level2-Pre-Intermediate/a lot of, very, กับ much ใช้ต่างกันอย่างไร.mp4', '11', '2', 'Y', null);
INSERT INTO `video` VALUES ('25', '12 Tenses - เรียนภาษาอังกฤษ English Grammar - ไวยากรณ์.mp4', '12 Tenses - เรียนภาษาอังกฤษ English Grammar - ไวยากรณ์.mp4', 'Level1-Beginning/12 Tenses - เรียนภาษาอังกฤษ English Grammar - ไวยากรณ์.mp4', '1', '1', 'Y', null);
INSERT INTO `video` VALUES ('26', 'การใช้ always,usually,often,sometimes,never.mp4', 'การใช้ always,usually,often,sometimes,never.mp4', 'Level1-Beginning/การใช้ always,usually,often,sometimes,never.mp4', '2', '1', 'Y', null);
INSERT INTO `video` VALUES ('27', 'การใช้ did.mp4', 'การใช้ did.mp4', 'Level1-Beginning/การใช้ did.mp4', '3', '1', 'Y', null);
INSERT INTO `video` VALUES ('28', 'การใช้ do กับ does.mp4', 'การใช้ do กับ does.mp4', 'Level1-Beginning/การใช้ do กับ does.mp4', '4', '1', 'Y', null);
INSERT INTO `video` VALUES ('29', 'การใช้ have,has,had.mp4', 'การใช้ have,has,had.mp4', 'Level1-Beginning/การใช้ have,has,had.mp4', '5', '1', 'Y', null);
INSERT INTO `video` VALUES ('30', 'การแนะนำตัวในภาษาอังกฤษ.mp4', 'การแนะนำตัวในภาษาอังกฤษ.mp4', 'Level1-Beginning/การแนะนำตัวในภาษาอังกฤษ.mp4', '6', '1', 'Y', null);
INSERT INTO `video` VALUES ('31', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]01(บทที่4).mp4', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]01(บทที่4).mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]01(บทที่4).mp4', '7', '1', 'Y', null);
INSERT INTO `video` VALUES ('32', 'ไวยากรณ์อังกฤษเบื้องต้น  -[Pronouns]02.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น  -[Pronouns]02.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น  -[Pronouns]02.mp4', '8', '1', 'Y', null);
INSERT INTO `video` VALUES ('33', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]03.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]03.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]03.mp4', '9', '1', 'Y', null);
INSERT INTO `video` VALUES ('34', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]04.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]04.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น - [Pronouns]04.mp4', '10', '1', 'Y', null);
INSERT INTO `video` VALUES ('35', 'สอนไวยกรณ์ การใช้ Verb to be.mp4', 'สอนไวยกรณ์ การใช้ Verb to be.mp4', 'Level1-Beginning/สอนไวยกรณ์ การใช้ Verb to be.mp4', '11', '1', 'Y', null);
INSERT INTO `video` VALUES ('36', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]01(บทที่3).mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]01(บทที่3).mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]01(บทที่3).mp4', '12', '1', 'Y', null);
INSERT INTO `video` VALUES ('37', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]02.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]02.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]02.mp4', '13', '1', 'Y', null);
INSERT INTO `video` VALUES ('38', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]03.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]03.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]03.mp4', '14', '1', 'Y', null);
INSERT INTO `video` VALUES ('39', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]04.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]04.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]04.mp4', '15', '1', 'Y', null);
INSERT INTO `video` VALUES ('40', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]05.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]05.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Agreements]05.mp4', '16', '1', 'Y', null);
INSERT INTO `video` VALUES ('41', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]01(บทที่2).mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]01(บทที่2).mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Articles]01(บทที่2).mp4', '17', '1', 'Y', null);
INSERT INTO `video` VALUES ('42', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]02.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]02.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Articles]02.mp4', '18', '1', 'Y', null);
INSERT INTO `video` VALUES ('43', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]03.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Articles]03.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Articles]03.mp4', '19', '1', 'Y', null);
INSERT INTO `video` VALUES ('44', 'ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]01(บทที่1).mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]01(บทที่1).mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]01(บทที่1).mp4', '20', '1', 'Y', null);
INSERT INTO `video` VALUES ('45', 'ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]02.mp4', 'ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]02.mp4', 'Level1-Beginning/ไวยากรณ์อังกฤษเบื้องต้น -[Nouns]02.mp4', '21', '1', 'Y', null);
