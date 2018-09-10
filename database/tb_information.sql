/*
Navicat MySQL Data Transfer

Source Server         : localhost_v1
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : db_bbs

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-08-21 14:24:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_information
-- ----------------------------
DROP TABLE IF EXISTS `tb_information`;
CREATE TABLE `tb_information` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '消息主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '消息标题',
  `publisher` varchar(30) DEFAULT '' COMMENT '发布人',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `publish_time` timestamp NULL DEFAULT NULL,
  `richtext` text COMMENT '富文本区域',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_information
-- ----------------------------
INSERT INTO `tb_information` VALUES ('1', '最新产业联盟大会即将于2018年13月32号举行', '1', '0', '2018-08-05 21:53:02', '<a>111</a>');
INSERT INTO `tb_information` VALUES ('2', '最新产业联盟大会即将于2028年01月31号举行', '2', '1', '0000-00-00 00:00:00', null);
INSERT INTO `tb_information` VALUES ('3', '最新产业联盟大会即将于2038年02月18号举行', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `tb_information` VALUES ('4', '测试新闻', '1', '0', '2018-08-06 00:01:02', '<p>ceshixia</p>');
