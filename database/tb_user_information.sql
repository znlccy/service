/*
Navicat MySQL Data Transfer

Source Server         : localhost_v1
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : db_bbs

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-08-21 14:24:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_user_information
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_information`;
CREATE TABLE `tb_user_information` (
  `userid` int(12) NOT NULL COMMENT '用户主键',
  `infoid` int(12) NOT NULL COMMENT '消息主键',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`userid`,`infoid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user_information
-- ----------------------------
INSERT INTO `tb_user_information` VALUES ('1', '1', '1');
INSERT INTO `tb_user_information` VALUES ('3', '1', '1');
INSERT INTO `tb_user_information` VALUES ('5', '1', '1');
INSERT INTO `tb_user_information` VALUES ('6', '1', '1');
INSERT INTO `tb_user_information` VALUES ('6', '2', '1');
INSERT INTO `tb_user_information` VALUES ('9', '1', '1');
INSERT INTO `tb_user_information` VALUES ('9', '2', '1');
INSERT INTO `tb_user_information` VALUES ('9', '3', '1');
INSERT INTO `tb_user_information` VALUES ('9', '4', '1');
INSERT INTO `tb_user_information` VALUES ('19', '1', '1');
