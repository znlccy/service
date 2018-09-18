/*
SQLyog Job Agent v12.09 (64 bit) Copyright(c) Webyog Inc. All Rights Reserved.


MySQL - 5.6.38 : Database - db_service
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_service` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_service`;

/*Table structure for table `tb_activity` */

DROP TABLE IF EXISTS `tb_activity`;

CREATE TABLE `tb_activity` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '活动主键',
  `title` varchar(255) DEFAULT '' COMMENT '活动标题',
  `content` text COMMENT '活动内容',
  `limit` int(32) DEFAULT '0' COMMENT '限制人数',
  `register` int(32) DEFAULT '0' COMMENT '注册人数',
  `status` tinyint(2) DEFAULT '1' COMMENT '活动状态',
  `recommend` tinyint(2) DEFAULT '1' COMMENT '活动推荐',
  `picture` varchar(255) DEFAULT '' COMMENT '活动图片',
  `address` varchar(255) DEFAULT '' COMMENT '简写地址',
  `location` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `begin_time` datetime DEFAULT NULL COMMENT '开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '结束时间',
  `apply_time` datetime DEFAULT NULL COMMENT '申请时间',
  `publisher` varchar(255) DEFAULT '' COMMENT '活动发布者',
  `auditor_method` tinyint(2) DEFAULT '0' COMMENT '审核方式',
  `rich_text` text COMMENT '活动富文本',
  `create_time` datetime DEFAULT NULL COMMENT '活动创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '活动更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tb_activity` */

insert  into `tb_activity` values (1,'2区撒旦法','2asfasf',0,0,1,1,'/images/20180907/ba8caed132632bbc3a4b1a306731d435.png','',NULL,NULL,NULL,NULL,NULL,0,'werwerwr','2018-09-07 17:31:26','2018-09-07 17:31:26'),(2,'2区撒旦法','2asfasf',0,0,0,1,'/images/20180907/ba8caed132632bbc3a4b1a306731d435.png','',NULL,NULL,NULL,NULL,NULL,0,'werwerwr','2018-09-07 17:41:36','2018-09-07 17:43:16'),(3,'qwerqwre','q23rqwerwer',0,0,1,0,'/images/20180907/ba8caed132632bbc3a4b1a306731d435.png','',NULL,NULL,NULL,NULL,NULL,0,'werfwerwer','2018-09-07 17:44:14','2018-09-07 17:46:33'),(4,'沃尔沃去玩儿群翁','沃尔沃',NULL,0,1,1,'/images/20180914/dc2f8c281ebb0793a32b2d9f7f38c0b9.png',NULL,NULL,NULL,NULL,NULL,'',0,'23热是东方卫视地方','2018-09-14 15:35:14','2018-09-14 15:35:14');


CREATE TABLE `tb_consult_policy` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `type_id` tinyint(2) DEFAULT '1' COMMENT '类型',
  `content` text COMMENT '内容',
  `status` tinyint(2) DEFAULT '1' COMMENT '状态',
  `publisher` varchar(255) DEFAULT '' COMMENT '发布人',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_consult_policy` */

insert  into `tb_consult_policy` values (1,'测试咨询',1,'测试咨询内容',0,NULL,'2018-09-05 15:44:40','2018-09-05 15:44:40'),(3,'测试网页咨询',1,'测试网页咨询',1,NULL,'2018-09-05 15:49:28','2018-09-05 15:49:28');



DROP TABLE IF EXISTS `tb_feedback`;

CREATE TABLE `tb_feedback` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '反馈主键',
  `investigate_id` int(12) DEFAULT NULL COMMENT '调查主键',
  `mobile` varchar(255) DEFAULT '' COMMENT '反馈手机',
  `create_time` datetime DEFAULT NULL COMMENT '反馈创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '反馈更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='问卷调查反馈';

/*Data for the table `tb_feedback` */

insert  into `tb_feedback` values (1,1,NULL,'2018-09-13 19:36:21','2018-09-13 19:36:21'),(2,2,'15900627585','2018-09-14 11:35:58','2018-09-14 11:36:01'),(3,2,'15874585522','2018-09-14 11:36:13','2018-09-14 11:36:15');

/*Table structure for table `tb_group` */

DROP TABLE IF EXISTS `tb_group`;

CREATE TABLE `tb_group` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '分组主键',
  `name` varchar(255) DEFAULT '' COMMENT '分组名称',
  `sort` tinyint(2) DEFAULT NULL COMMENT '分组排序',
  `create_time` datetime DEFAULT NULL COMMENT '分组创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '分组更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_group` */

insert  into `tb_group` values (1,'阿里服务商',2,'2018-09-13 14:08:50','2018-09-13 14:10:14'),(2,'腾讯服务商',1,'2018-09-13 17:02:44','2018-09-13 17:02:44');


DROP TABLE IF EXISTS `tb_investigate`;

CREATE TABLE `tb_investigate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问卷调查主键',
  `title` varchar(255) DEFAULT '' COMMENT '问卷调查标题',
  `publisher` varchar(255) DEFAULT '' COMMENT '问卷调查发布人',
  `status` tinyint(2) DEFAULT '1' COMMENT '问卷调查状态',
  `type` tinyint(4) DEFAULT NULL COMMENT '问卷调查类型',
  `count` int(60) DEFAULT '0' COMMENT '问卷调查统计',
  `create_time` datetime DEFAULT NULL COMMENT '问卷调查创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '问卷调查更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tb_investigate_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='问卷调查';

/*Data for the table `tb_investigate` */

insert  into `tb_investigate` values (1,'这是什么家伙','你好',1,NULL,0,'2018-09-11 16:18:13','2018-09-11 16:18:13'),(2,'这是什么家伙','',1,NULL,0,'2018-09-11 16:33:05',NULL),(3,'这是什么家伙','',1,NULL,0,'2018-09-11 16:35:57',NULL);



DROP TABLE IF EXISTS `tb_option`;

CREATE TABLE `tb_option` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '选项主键',
  `content` varchar(255) DEFAULT '' COMMENT '选项内容',
  `question_id` int(12) DEFAULT NULL COMMENT '问题主键',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `tb_option` */

insert  into `tb_option` values (1,'这是灰熊',1,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(2,'这是狮子',1,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(3,'这是大象',2,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(4,'这是蚂蚁',2,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(5,'这是灰熊',3,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(6,'这是狮子',3,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(19,'这是大象',3,'2018-09-11 16:35:58','2018-09-11 16:35:58'),(20,'这是蚂蚁',3,'2018-09-11 16:35:58','2018-09-11 16:35:58');



DROP TABLE IF EXISTS `tb_question`;

CREATE TABLE `tb_question` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '问题主键',
  `content` varchar(255) DEFAULT '' COMMENT '问题内容',
  `investigate_id` int(12) DEFAULT NULL COMMENT '调查主键',
  `create_time` datetime DEFAULT NULL COMMENT '问题创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '问题更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `tb_question` */

insert  into `tb_question` values (37,'熊',3,'2018-09-11 16:33:05','2018-09-11 16:33:05'),(38,'狮子',3,'2018-09-11 16:33:05','2018-09-11 16:33:05'),(39,'大象',3,'2018-09-11 16:33:06','2018-09-11 16:33:06'),(40,'蚂蚁',3,'2018-09-11 16:33:06','2018-09-11 16:33:06'),(41,'熊',3,'2018-09-11 16:35:57','2018-09-11 16:35:57'),(42,'狮子',3,'2018-09-11 16:35:57','2018-09-11 16:35:57'),(43,'大象',12,'2018-09-11 16:35:57','2018-09-11 16:35:57'),(44,'蚂蚁',12,'2018-09-11 16:35:57','2018-09-11 16:35:57');



DROP TABLE IF EXISTS `tb_service`;

CREATE TABLE `tb_service` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '服务主键',
  `name` varchar(80) DEFAULT '' COMMENT '商品名称',
  `group_id` int(12) DEFAULT NULL COMMENT '分组主键',
  `profile` varchar(255) DEFAULT '' COMMENT '商品简介',
  `description` varchar(255) DEFAULT '' COMMENT '商品描述',
  `picture` varchar(255) DEFAULT '' COMMENT '商品图片',
  `url` varchar(255) DEFAULT '' COMMENT '商品链接',
  `price` decimal(14,2) DEFAULT NULL COMMENT '商品价格',
  `recommend` tinyint(1) DEFAULT '1' COMMENT '商品是否推荐',
  `status` tinyint(1) DEFAULT '1' COMMENT '商品状态',
  `address` varchar(255) DEFAULT '' COMMENT '商品地址',
  `publisher` varchar(255) DEFAULT '' COMMENT '商品发布者',
  `create_time` datetime DEFAULT NULL COMMENT '商品创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '商品更新时间',
  `validate_time` datetime DEFAULT NULL COMMENT '商品有效时间',
  `rich_text` text COMMENT '商品富文本',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_service` */

insert  into `tb_service` values (1,'阿里服务提供者',1,'杭州阿里巴巴公司','阿里是马云创建的公司','/images/20180913/48f80ef74a896102215fa1285d6f7dd7.png','http://www.ali.com','1234.68',1,1,'asfdsfsfsadfq34dfdsf',NULL,'2018-09-13 16:45:07','2018-09-13 16:45:07','2018-09-13 16:45:07',''),(2,'腾讯服务商',2,'腾讯是一家IT公司','主营产品QQ，微信等等','/images/20180913/48f80ef74a896102215fa1285d6f7dd7.png','http://www.tencent.com','2385.23',1,1,'撒旦法',NULL,'2018-09-13 17:04:54','2018-09-13 17:04:54','2018-09-13 17:04:54','阿尔戈为');

DROP TABLE IF EXISTS `tb_user_activity`;

CREATE TABLE `tb_user_activity` (
  `user_id` int(12) NOT NULL COMMENT '用户主键',
  `activity_id` int(12) NOT NULL COMMENT '活动主键',
  `apply_time` datetime DEFAULT NULL COMMENT '活动申请时间',
  PRIMARY KEY (`user_id`,`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user_activity` */

insert  into `tb_user_activity` values (1,1,'2018-09-10 15:29:25'),(1,2,'2018-09-10 15:29:28'),(2,1,'2018-09-10 15:29:34'),(2,2,'2018-09-10 15:29:37'),(3,3,'2018-09-10 15:28:51');
