/*
Navicat MySQL Data Transfer

Source Server         : localhost_v1
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : db_bbs

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-08-17 18:52:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(30) DEFAULT '' COMMENT '姓名',
  `password` varchar(40) DEFAULT '' COMMENT '密码',
  `mobile` varchar(40) DEFAULT NULL COMMENT '手机账号',
  `email` varchar(30) DEFAULT '' COMMENT '电子邮件',
  `company` varchar(48) DEFAULT '' COMMENT '公司',
  `career` varchar(30) DEFAULT '' COMMENT '职业',
  `occupation` varchar(23) DEFAULT '' COMMENT '行业',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态',
  `register_time` datetime DEFAULT NULL COMMENT '注册时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `login_time` datetime DEFAULT NULL COMMENT '登录时间',
  `login_ip` varchar(38) DEFAULT '' COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'znlccy', 'e35cf7b66449df565f93c607d5a81d09', '15900795242', '752255448@qq.com', '上海游达网络科技有限公司', 'Java开发', 'IT行业', '0', '0000-00-00 00:00:00', null, '0000-00-00 00:00:00', '127.0.0.1');
INSERT INTO `tb_user` VALUES ('2', '', 'a5dafec32f5fa8a644f94a1ba32dfbb4', '15900785382', '', '', '', '', '0', '0000-00-00 00:00:00', null, '0000-00-00 00:00:00', '');
INSERT INTO `tb_user` VALUES ('3', '张三丰', '7eadafc40e72c85d36be5edcb7a7368d', '15900785383', '12345678@qq.com', '上海游达网络科技邮箱公司', 'Java架构师', 'IT软件行业', '0', '0000-00-00 00:00:00', null, '0000-00-00 00:00:00', '127.0.0.1');
INSERT INTO `tb_user` VALUES ('4', '', 'a5dafec32f5fa8a644f94a1ba32dfbb4', '15001056491', '', '', '', '', '0', '0000-00-00 00:00:00', null, '0000-00-00 00:00:00', '');
INSERT INTO `tb_user` VALUES ('6', '', '5053f342b0dff7356813525495497267', '189155422711', '', '', '', '', '0', '0000-00-00 00:00:00', null, null, '');
INSERT INTO `tb_user` VALUES ('7', '', '554b87ed693d97518fb73869f36e4dba', '18915542277', '', '', '', '', '0', '0000-00-00 00:00:00', null, null, '');
INSERT INTO `tb_user` VALUES ('8', 'guo jun', '52030ea4ad1ef3ba886605eec0c6a5ad', '18915542275', '1@1.com', '1', '2', '3', '0', '0000-00-00 00:00:00', null, '0000-00-00 00:00:00', '222.71.239.112');
INSERT INTO `tb_user` VALUES ('9', '于东', '25d55ad283aa400af464c76d713c07ad', '18237177660', 'ycplay@qq.com', '上海游达', '5', '60303', '0', '0000-00-00 00:00:00', null, null, '');
INSERT INTO `tb_user` VALUES ('13', '过骏', '65235524', '18915542280', '4922@q.com', '1212', '1', '1', '0', '2018-08-08 15:12:34', null, null, '');
INSERT INTO `tb_user` VALUES ('15', '过骏2', '652355241', '18915542281', '4922@q.com', '1212', '1', '1', '0', '2018-08-08 15:14:26', null, null, '');
INSERT INTO `tb_user` VALUES ('17', '1123123', '3dbe00a167653a1aaee01d93e77e730e', '18915542312', '123@q.com', '1', '1', '1', '0', '2018-08-08 16:09:42', null, null, '');
INSERT INTO `tb_user` VALUES ('18', '11231234444', '3dbe00a167653a1aaee01d93e77e730e', '18915542311', '12443@q.com', '14', '2', '2', '0', '2018-08-08 16:12:09', null, null, '');
INSERT INTO `tb_user` VALUES ('19', '123', '5053f342b0dff7356813525495497267', '18915542276', '1@qq.com', '123', '1', '1', '0', '2018-08-15 21:48:58', '2018-08-15 21:50:05', '2018-08-15 21:50:09', '');
INSERT INTO `tb_user` VALUES ('20', '', '7373a72b2055c268492d6610fc9372c3', '13967741060', '', '', '', '', '0', null, null, null, '');
