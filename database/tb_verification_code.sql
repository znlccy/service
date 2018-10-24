/*
Navicat MySQL Data Transfer

Source Server         : localhost_v1
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : db_bbs

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-08-17 18:41:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_verification_code
-- ----------------------------
DROP TABLE IF EXISTS `tb_verification_code`;
CREATE TABLE `tb_verification_code` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '验证码主键',
  `mobile` varchar(30) DEFAULT '' COMMENT '手机号',
  `code` int(8) DEFAULT '0' COMMENT '验证码',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `expiration_time` datetime DEFAULT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
