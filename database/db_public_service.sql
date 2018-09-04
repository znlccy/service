/*
Navicat MySQL Data Transfer

Source Server         : localhost_v1
Source Server Version : 50722
Source Host           : localhost:3306
Source Database       : db_public_service

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-08-30 19:38:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('20180815063134', 'Company', '2018-08-15 14:56:12', '2018-08-15 14:56:13', '0');
INSERT INTO `migrations` VALUES ('20180816023917', 'Space', '2018-08-20 01:02:54', '2018-08-20 01:02:54', '0');
INSERT INTO `migrations` VALUES ('20180816053848', 'OperationTeam', '2018-08-20 01:02:54', '2018-08-20 01:02:54', '0');
INSERT INTO `migrations` VALUES ('20180816072435', 'OperationTeamUsers', '2018-08-20 01:02:54', '2018-08-20 01:02:54', '0');
INSERT INTO `migrations` VALUES ('20180816072443', 'OperationTeamRoles', '2018-08-20 01:02:54', '2018-08-20 01:02:54', '0');
INSERT INTO `migrations` VALUES ('20180816085058', 'OtRole', '2018-08-20 11:23:28', '2018-08-20 11:23:28', '0');
INSERT INTO `migrations` VALUES ('20180816085068', 'OtUser', '2018-08-20 11:23:28', '2018-08-20 11:23:28', '0');
INSERT INTO `migrations` VALUES ('20180820031818', 'AddColumnOperationTeamIdToTbAdmin', '2018-08-20 11:23:28', '2018-08-20 11:23:28', '0');
INSERT INTO `migrations` VALUES ('20180820031819', 'AddColumnOperationTeamIdToTbAdmin', '2018-08-20 11:26:41', '2018-08-20 11:26:41', '0');
INSERT INTO `migrations` VALUES ('20180820031825', 'AddColumnOperationTeamIdToTbAdmin', '2018-08-20 11:36:53', '2018-08-20 11:36:54', '0');
INSERT INTO `migrations` VALUES ('20180820031829', 'AddColumnOperationTeamIdToTbAdmin', '2018-08-20 11:31:46', '2018-08-20 11:31:46', '0');
INSERT INTO `migrations` VALUES ('20180820055032', 'AddColumnToTbRole', '2018-08-20 13:51:30', '2018-08-20 13:51:30', '0');
INSERT INTO `migrations` VALUES ('20180821071615', 'Workplace', '2018-08-21 15:49:10', '2018-08-21 15:49:10', '0');
INSERT INTO `migrations` VALUES ('20180821093452', 'WorkplaceGroup', '2018-08-21 17:36:20', '2018-08-21 17:36:20', '0');
INSERT INTO `migrations` VALUES ('20180821151913', 'AddColumnToOperationTeam', '2018-08-21 23:20:45', '2018-08-21 23:20:45', '0');
INSERT INTO `migrations` VALUES ('20180822024538', 'EnterTeam', '2018-08-22 13:40:18', '2018-08-22 13:40:18', '0');
INSERT INTO `migrations` VALUES ('20180822070705', 'AddColumToEnterTeam', '2018-08-22 15:08:34', '2018-08-22 15:08:34', '0');
INSERT INTO `migrations` VALUES ('20180822074150', 'EnterTeamMember', '2018-08-22 15:52:52', '2018-08-22 15:52:52', '0');
INSERT INTO `migrations` VALUES ('20180822095612', 'Linkman', '2018-08-22 18:18:30', '2018-08-22 18:18:30', '0');
INSERT INTO `migrations` VALUES ('20180822095613', 'Linkman', '2018-08-23 10:01:39', '2018-08-23 10:01:39', '0');
INSERT INTO `migrations` VALUES ('20180822095614', 'Linkman', '2018-08-23 10:26:46', '2018-08-23 10:26:46', '0');
INSERT INTO `migrations` VALUES ('20180823055426', 'Development', '2018-08-23 13:59:22', '2018-08-23 13:59:22', '0');
INSERT INTO `migrations` VALUES ('20180823100401', 'Venue', '2018-08-23 19:51:25', '2018-08-23 19:51:25', '0');
INSERT INTO `migrations` VALUES ('20180824073432', 'Reservation', '2018-08-24 15:41:40', '2018-08-24 15:41:40', '0');
INSERT INTO `migrations` VALUES ('20180824092819', 'Equipment', '2018-08-24 17:43:44', '2018-08-24 17:43:44', '0');
INSERT INTO `migrations` VALUES ('20180824094404', 'EquipmentType', '2018-08-24 17:45:11', '2018-08-24 17:45:11', '0');
INSERT INTO `migrations` VALUES ('20180826060628', 'Department', '2018-08-26 14:09:53', '2018-08-26 14:09:53', '0');
INSERT INTO `migrations` VALUES ('20180826071444', 'Repair', '2018-08-26 15:25:05', '2018-08-26 15:25:05', '0');
INSERT INTO `migrations` VALUES ('20180826094118', 'Contract', '2018-08-27 11:58:16', '2018-08-27 11:58:16', '0');
INSERT INTO `migrations` VALUES ('20180826094119', 'Contract', '2018-08-27 11:54:13', '2018-08-27 11:54:13', '0');
INSERT INTO `migrations` VALUES ('20180826094128', 'Contract', '2018-08-27 11:59:52', '2018-08-27 11:59:52', '0');
INSERT INTO `migrations` VALUES ('20180826094313', 'ContractTemplate', '2018-08-27 11:54:33', '2018-08-27 11:54:33', '0');
INSERT INTO `migrations` VALUES ('20180826094314', 'ContractTemplate', '2018-08-27 11:58:16', '2018-08-27 11:58:16', '0');
INSERT INTO `migrations` VALUES ('20180827032943', 'HistoryTemplate', '2018-08-27 11:56:51', '2018-08-27 11:56:51', '0');
INSERT INTO `migrations` VALUES ('20180827032944', 'HistoryTemplate', '2018-08-27 11:58:16', '2018-08-27 11:58:16', '0');
INSERT INTO `migrations` VALUES ('20180827083334', 'Order', '2018-08-27 18:09:25', '2018-08-27 18:09:25', '0');
INSERT INTO `migrations` VALUES ('20180827094558', 'Invoice', '2018-08-27 18:09:25', '2018-08-27 18:09:25', '0');
INSERT INTO `migrations` VALUES ('20180828035719', 'OrderWorkplace', '2018-08-28 13:34:39', '2018-08-28 13:34:39', '0');

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `nickname` varchar(30) DEFAULT '' COMMENT '用户昵称',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `real_name` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_ip` varchar(80) DEFAULT '' COMMENT '创建的IP',
  `login_time` timestamp NULL DEFAULT NULL COMMENT '登录时间',
  `login_ip` varchar(80) DEFAULT '' COMMENT '登录的IP',
  `authentication` int(1) NOT NULL DEFAULT '0' COMMENT '手机验证',
  `operation_team_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属运营团队',
  `department_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '部门id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'zhangsan', '01d7f40760960e7bd9443513f22ab9af', '张三', '', '', '0', '1', '2018-08-22 01:25:04', '2018-08-22 01:25:04', '', '2018-08-01 00:39:00', '', '1', '1', '0');
INSERT INTO `tb_admin` VALUES ('2', 'lisi', '	25d55ad283aa400af464c76d713c07ad', '李四', '18915542276', '', '张三丰', '1', '2018-08-22 01:22:05', '2018-08-22 01:22:05', '127.0.0.1', '2018-08-01 00:39:00', '127.0.0.1', '1', '0', '0');
INSERT INTO `tb_admin` VALUES ('3', 'zhoawu', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '张三丰', '1', '2018-08-22 01:22:08', '2018-08-22 01:22:08', '127.0.0.1', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('4', 'chenliu', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '张三丰', '1', '2018-08-22 01:22:10', '2018-08-22 01:22:10', '127.0.0.1', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('5', 'zhangqi', 'c4ded2b85cc5be82fa1d2464eba9a7d3', '', '', '', '李四', '1', '2018-08-22 01:22:12', '2018-08-22 01:22:12', '127.0.0.1', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('6', 'chensi', 'e10adc3949ba59abbe56e057f20f883e', '', '15900785383', '', '张三丰', '1', '2018-08-22 01:22:14', '2018-08-22 01:22:14', '127.0.0.1', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('7', 'chensi', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '张三丰', '1', '2018-08-22 01:22:16', '2018-08-22 01:22:16', '127.0.0.1', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('8', '', '5053f342b0dff7356813525495497267', '', '18915542274', '', '过', '1', '2018-08-22 01:22:18', '2018-08-22 01:22:18', '124.74.243.30', '2018-08-01 00:46:39', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('9', '', '5053f342b0dff7356813525495497267', '', '18915542274', '', '过', '1', '2018-08-22 01:22:20', '2018-08-22 01:22:20', '124.74.243.30', '2018-08-01 00:39:00', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('10', '', '69ef1f4520ae237e4eddc8da5a7fa9b8', '', '12475412585', '', '给', '1', '2018-08-22 01:22:22', '2018-08-22 01:22:22', '124.74.243.30', '2018-08-01 00:47:39', '', '0', '0', '0');
INSERT INTO `tb_admin` VALUES ('16', '', '25d55ad283aa400af464c76d713c07ad', '', '13967741060', '', '王', '1', '2018-08-22 01:32:09', '2018-08-22 01:32:09', '124.74.243.30', '2018-08-01 00:47:39', '', '1', '0', '0');
INSERT INTO `tb_admin` VALUES ('18', '', '25d55ad283aa400af464c76d713c07ad', '', '17826815702', '', '王成威', '1', '2018-08-22 01:11:30', '2018-08-22 01:11:30', '::1', null, '', '1', '1', '0');

-- ----------------------------
-- Table structure for tb_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin_role`;
CREATE TABLE `tb_admin_role` (
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户角色对应关系';

-- ----------------------------
-- Records of tb_admin_role
-- ----------------------------
INSERT INTO `tb_admin_role` VALUES ('1', '1');
INSERT INTO `tb_admin_role` VALUES ('1', '2');
INSERT INTO `tb_admin_role` VALUES ('2', '1');
INSERT INTO `tb_admin_role` VALUES ('2', '2');
INSERT INTO `tb_admin_role` VALUES ('4', '2');
INSERT INTO `tb_admin_role` VALUES ('5', '1');
INSERT INTO `tb_admin_role` VALUES ('7', '1');
INSERT INTO `tb_admin_role` VALUES ('7', '2');
INSERT INTO `tb_admin_role` VALUES ('8', '1');
INSERT INTO `tb_admin_role` VALUES ('8', '2');
INSERT INTO `tb_admin_role` VALUES ('9', '1');
INSERT INTO `tb_admin_role` VALUES ('9', '2');
INSERT INTO `tb_admin_role` VALUES ('10', '1');
INSERT INTO `tb_admin_role` VALUES ('10', '2');
INSERT INTO `tb_admin_role` VALUES ('11', '1');
INSERT INTO `tb_admin_role` VALUES ('11', '2');
INSERT INTO `tb_admin_role` VALUES ('15', '1');
INSERT INTO `tb_admin_role` VALUES ('16', '1');
INSERT INTO `tb_admin_role` VALUES ('18', '1');

-- ----------------------------
-- Table structure for tb_area
-- ----------------------------
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE `tb_area` (
  `id` int(6) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `top_id` int(6) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_area
-- ----------------------------
INSERT INTO `tb_area` VALUES ('330503', '南浔区', '330500', '3');
INSERT INTO `tb_area` VALUES ('513223', '茂县', '513200', '3');
INSERT INTO `tb_area` VALUES ('430523', '邵阳县', '430500', '3');
INSERT INTO `tb_area` VALUES ('632222', '祁连县', '632200', '3');
INSERT INTO `tb_area` VALUES ('231225', '明水县', '231200', '3');
INSERT INTO `tb_area` VALUES ('140622', '应县', '140600', '3');
INSERT INTO `tb_area` VALUES ('530625', '永善县', '530600', '3');
INSERT INTO `tb_area` VALUES ('513332', '石渠县', '513300', '3');
INSERT INTO `tb_area` VALUES ('431201', '市辖区', '431200', '3');
INSERT INTO `tb_area` VALUES ('231202', '北林区', '231200', '3');
INSERT INTO `tb_area` VALUES ('652323', '呼图壁县', '652300', '3');
INSERT INTO `tb_area` VALUES ('610821', '神木县', '610800', '3');
INSERT INTO `tb_area` VALUES ('150801', '市辖区', '150800', '3');
INSERT INTO `tb_area` VALUES ('330300', '温州市', '330000', '2');
INSERT INTO `tb_area` VALUES ('140421', '长治县', '140400', '3');
INSERT INTO `tb_area` VALUES ('520323', '绥阳县', '520300', '3');
INSERT INTO `tb_area` VALUES ('441322', '博罗县', '441300', '3');
INSERT INTO `tb_area` VALUES ('320282', '宜兴市', '320200', '3');
INSERT INTO `tb_area` VALUES ('510923', '大英县', '510900', '3');
INSERT INTO `tb_area` VALUES ('350505', '泉港区', '350500', '3');
INSERT INTO `tb_area` VALUES ('371101', '市辖区', '371100', '3');
INSERT INTO `tb_area` VALUES ('530630', '水富县', '530600', '3');
INSERT INTO `tb_area` VALUES ('433127', '永顺县', '433100', '3');
INSERT INTO `tb_area` VALUES ('451102', '八步区', '451100', '3');
INSERT INTO `tb_area` VALUES ('340506', '博望区', '340500', '3');
INSERT INTO `tb_area` VALUES ('520627', '沿河土家族自治县', '520600', '3');
INSERT INTO `tb_area` VALUES ('640122', '贺兰县', '640100', '3');
INSERT INTO `tb_area` VALUES ('360728', '定南县', '360700', '3');
INSERT INTO `tb_area` VALUES ('360501', '市辖区', '360500', '3');
INSERT INTO `tb_area` VALUES ('441701', '市辖区', '441700', '3');
INSERT INTO `tb_area` VALUES ('431223', '辰溪县', '431200', '3');
INSERT INTO `tb_area` VALUES ('632521', '共和县', '632500', '3');
INSERT INTO `tb_area` VALUES ('371302', '兰山区', '371300', '3');
INSERT INTO `tb_area` VALUES ('623025', '玛曲县', '623000', '3');
INSERT INTO `tb_area` VALUES ('420804', '掇刀区', '420800', '3');
INSERT INTO `tb_area` VALUES ('230604', '让胡路区', '230600', '3');
INSERT INTO `tb_area` VALUES ('130110', '鹿泉区', '130100', '3');
INSERT INTO `tb_area` VALUES ('469006', '万宁市', '469000', '3');
INSERT INTO `tb_area` VALUES ('510132', '新津县', '510100', '3');
INSERT INTO `tb_area` VALUES ('620301', '市辖区', '620300', '3');
INSERT INTO `tb_area` VALUES ('620400', '白银市', '620000', '2');
INSERT INTO `tb_area` VALUES ('422825', '宣恩县', '422800', '3');
INSERT INTO `tb_area` VALUES ('131122', '武邑县', '131100', '3');
INSERT INTO `tb_area` VALUES ('210503', '溪湖区', '210500', '3');
INSERT INTO `tb_area` VALUES ('321081', '仪征市', '321000', '3');
INSERT INTO `tb_area` VALUES ('441800', '清远市', '440000', '2');
INSERT INTO `tb_area` VALUES ('330305', '洞头区', '330300', '3');
INSERT INTO `tb_area` VALUES ('451200', '河池市', '450000', '2');
INSERT INTO `tb_area` VALUES ('510800', '广元市', '510000', '2');
INSERT INTO `tb_area` VALUES ('410600', '鹤壁市', '410000', '2');
INSERT INTO `tb_area` VALUES ('350427', '沙县', '350400', '3');
INSERT INTO `tb_area` VALUES ('540237', '岗巴县', '540200', '3');
INSERT INTO `tb_area` VALUES ('130609', '徐水区', '130600', '3');
INSERT INTO `tb_area` VALUES ('513323', '丹巴县', '513300', '3');
INSERT INTO `tb_area` VALUES ('530700', '丽江市', '530000', '2');
INSERT INTO `tb_area` VALUES ('450502', '海城区', '450500', '3');
INSERT INTO `tb_area` VALUES ('650102', '天山区', '650100', '3');
INSERT INTO `tb_area` VALUES ('130623', '涞水县', '130600', '3');
INSERT INTO `tb_area` VALUES ('450621', '上思县', '450600', '3');
INSERT INTO `tb_area` VALUES ('469023', '澄迈县', '469000', '3');
INSERT INTO `tb_area` VALUES ('341181', '天长市', '341100', '3');
INSERT INTO `tb_area` VALUES ('710000', '台湾省', '0', '1');
INSERT INTO `tb_area` VALUES ('370124', '平阴县', '370100', '3');
INSERT INTO `tb_area` VALUES ('340225', '无为县', '340200', '3');
INSERT INTO `tb_area` VALUES ('610430', '淳化县', '610400', '3');
INSERT INTO `tb_area` VALUES ('620201', '市辖区', '620200', '3');
INSERT INTO `tb_area` VALUES ('511381', '阆中市', '511300', '3');
INSERT INTO `tb_area` VALUES ('430423', '衡山县', '430400', '3');
INSERT INTO `tb_area` VALUES ('371321', '沂南县', '371300', '3');
INSERT INTO `tb_area` VALUES ('371700', '菏泽市', '370000', '2');
INSERT INTO `tb_area` VALUES ('220523', '辉南县', '220500', '3');
INSERT INTO `tb_area` VALUES ('530922', '云县', '530900', '3');
INSERT INTO `tb_area` VALUES ('410883', '孟州市', '410800', '3');
INSERT INTO `tb_area` VALUES ('430703', '鼎城区', '430700', '3');
INSERT INTO `tb_area` VALUES ('330921', '岱山县', '330900', '3');
INSERT INTO `tb_area` VALUES ('542430', '尼玛县', '542400', '3');
INSERT INTO `tb_area` VALUES ('330103', '下城区', '330100', '3');
INSERT INTO `tb_area` VALUES ('141027', '浮山县', '141000', '3');
INSERT INTO `tb_area` VALUES ('445102', '湘桥区', '445100', '3');
INSERT INTO `tb_area` VALUES ('150501', '市辖区', '150500', '3');
INSERT INTO `tb_area` VALUES ('350925', '周宁县', '350900', '3');
INSERT INTO `tb_area` VALUES ('451300', '来宾市', '450000', '2');
INSERT INTO `tb_area` VALUES ('511101', '市辖区', '511100', '3');
INSERT INTO `tb_area` VALUES ('150430', '敖汉旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('650421', '鄯善县', '650400', '3');
INSERT INTO `tb_area` VALUES ('610103', '碑林区', '610100', '3');
INSERT INTO `tb_area` VALUES ('510801', '市辖区', '510800', '3');
INSERT INTO `tb_area` VALUES ('440282', '南雄市', '440200', '3');
INSERT INTO `tb_area` VALUES ('320923', '阜宁县', '320900', '3');
INSERT INTO `tb_area` VALUES ('150601', '市辖区', '150600', '3');
INSERT INTO `tb_area` VALUES ('450900', '玉林市', '450000', '2');
INSERT INTO `tb_area` VALUES ('411121', '舞阳县', '411100', '3');
INSERT INTO `tb_area` VALUES ('150781', '满洲里市', '150700', '3');
INSERT INTO `tb_area` VALUES ('150701', '市辖区', '150700', '3');
INSERT INTO `tb_area` VALUES ('440882', '雷州市', '440800', '3');
INSERT INTO `tb_area` VALUES ('110000', '北京市', '0', '1');
INSERT INTO `tb_area` VALUES ('430902', '资阳区', '430900', '3');
INSERT INTO `tb_area` VALUES ('320803', '淮安区', '320800', '3');
INSERT INTO `tb_area` VALUES ('141034', '汾西县', '141000', '3');
INSERT INTO `tb_area` VALUES ('140601', '市辖区', '140600', '3');
INSERT INTO `tb_area` VALUES ('510121', '金堂县', '510100', '3');
INSERT INTO `tb_area` VALUES ('341122', '来安县', '341100', '3');
INSERT INTO `tb_area` VALUES ('441500', '汕尾市', '440000', '2');
INSERT INTO `tb_area` VALUES ('620921', '金塔县', '620900', '3');
INSERT INTO `tb_area` VALUES ('340825', '太湖县', '340800', '3');
INSERT INTO `tb_area` VALUES ('320303', '云龙区', '320300', '3');
INSERT INTO `tb_area` VALUES ('450332', '恭城瑶族自治县', '450300', '3');
INSERT INTO `tb_area` VALUES ('653221', '和田县', '653200', '3');
INSERT INTO `tb_area` VALUES ('430923', '安化县', '430900', '3');
INSERT INTO `tb_area` VALUES ('540529', '隆子县', '540500', '3');
INSERT INTO `tb_area` VALUES ('510131', '蒲江县', '510100', '3');
INSERT INTO `tb_area` VALUES ('620724', '高台县', '620700', '3');
INSERT INTO `tb_area` VALUES ('540230', '康马县', '540200', '3');
INSERT INTO `tb_area` VALUES ('532523', '屏边苗族自治县', '532500', '3');
INSERT INTO `tb_area` VALUES ('451103', '平桂区', '451100', '3');
INSERT INTO `tb_area` VALUES ('230781', '铁力市', '230700', '3');
INSERT INTO `tb_area` VALUES ('211005', '弓长岭区', '211000', '3');
INSERT INTO `tb_area` VALUES ('210105', '皇姑区', '210100', '3');
INSERT INTO `tb_area` VALUES ('130927', '南皮县', '130900', '3');
INSERT INTO `tb_area` VALUES ('150525', '奈曼旗', '150500', '3');
INSERT INTO `tb_area` VALUES ('610113', '雁塔区', '610100', '3');
INSERT INTO `tb_area` VALUES ('510704', '游仙区', '510700', '3');
INSERT INTO `tb_area` VALUES ('350502', '鲤城区', '350500', '3');
INSERT INTO `tb_area` VALUES ('450804', '覃塘区', '450800', '3');
INSERT INTO `tb_area` VALUES ('340801', '市辖区', '340800', '3');
INSERT INTO `tb_area` VALUES ('120106', '红桥区', '120100', '3');
INSERT INTO `tb_area` VALUES ('510821', '旺苍县', '510800', '3');
INSERT INTO `tb_area` VALUES ('141000', '临汾市', '140000', '2');
INSERT INTO `tb_area` VALUES ('310117', '松江区', '310100', '3');
INSERT INTO `tb_area` VALUES ('450103', '青秀区', '450100', '3');
INSERT INTO `tb_area` VALUES ('330127', '淳安县', '330100', '3');
INSERT INTO `tb_area` VALUES ('360924', '宜丰县', '360900', '3');
INSERT INTO `tb_area` VALUES ('510603', '旌阳区', '510600', '3');
INSERT INTO `tb_area` VALUES ('331004', '路桥区', '331000', '3');
INSERT INTO `tb_area` VALUES ('632801', '格尔木市', '632800', '3');
INSERT INTO `tb_area` VALUES ('450127', '横县', '450100', '3');
INSERT INTO `tb_area` VALUES ('411423', '宁陵县', '411400', '3');
INSERT INTO `tb_area` VALUES ('130435', '曲周县', '130400', '3');
INSERT INTO `tb_area` VALUES ('411328', '唐河县', '411300', '3');
INSERT INTO `tb_area` VALUES ('360827', '遂川县', '360800', '3');
INSERT INTO `tb_area` VALUES ('621002', '西峰区', '621000', '3');
INSERT INTO `tb_area` VALUES ('150825', '乌拉特后旗', '150800', '3');
INSERT INTO `tb_area` VALUES ('610501', '市辖区', '610500', '3');
INSERT INTO `tb_area` VALUES ('469021', '定安县', '469000', '3');
INSERT INTO `tb_area` VALUES ('370103', '市中区', '370100', '3');
INSERT INTO `tb_area` VALUES ('350701', '市辖区', '350700', '3');
INSERT INTO `tb_area` VALUES ('510725', '梓潼县', '510700', '3');
INSERT INTO `tb_area` VALUES ('632725', '囊谦县', '632700', '3');
INSERT INTO `tb_area` VALUES ('210603', '振兴区', '210600', '3');
INSERT INTO `tb_area` VALUES ('110116', '怀柔区', '110100', '3');
INSERT INTO `tb_area` VALUES ('450722', '浦北县', '450700', '3');
INSERT INTO `tb_area` VALUES ('540526', '措美县', '540500', '3');
INSERT INTO `tb_area` VALUES ('620525', '张家川回族自治县', '620500', '3');
INSERT INTO `tb_area` VALUES ('361181', '德兴市', '361100', '3');
INSERT INTO `tb_area` VALUES ('371482', '禹城市', '371400', '3');
INSERT INTO `tb_area` VALUES ('140222', '天镇县', '140200', '3');
INSERT INTO `tb_area` VALUES ('140000', '山西省', '0', '1');
INSERT INTO `tb_area` VALUES ('150822', '磴口县', '150800', '3');
INSERT INTO `tb_area` VALUES ('222400', '延边朝鲜族自治州', '220000', '2');
INSERT INTO `tb_area` VALUES ('532922', '漾濞彝族自治县', '532900', '3');
INSERT INTO `tb_area` VALUES ('411727', '汝南县', '411700', '3');
INSERT INTO `tb_area` VALUES ('530622', '巧家县', '530600', '3');
INSERT INTO `tb_area` VALUES ('620401', '市辖区', '620400', '3');
INSERT INTO `tb_area` VALUES ('640105', '西夏区', '640100', '3');
INSERT INTO `tb_area` VALUES ('350626', '东山县', '350600', '3');
INSERT INTO `tb_area` VALUES ('411601', '市辖区', '411600', '3');
INSERT INTO `tb_area` VALUES ('440704', '江海区', '440700', '3');
INSERT INTO `tb_area` VALUES ('450521', '合浦县', '450500', '3');
INSERT INTO `tb_area` VALUES ('540502', '乃东区', '540500', '3');
INSERT INTO `tb_area` VALUES ('150428', '喀喇沁旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('230421', '萝北县', '230400', '3');
INSERT INTO `tb_area` VALUES ('140400', '长治市', '140000', '2');
INSERT INTO `tb_area` VALUES ('411081', '禹州市', '411000', '3');
INSERT INTO `tb_area` VALUES ('220800', '白城市', '220000', '2');
INSERT INTO `tb_area` VALUES ('130638', '雄县', '130600', '3');
INSERT INTO `tb_area` VALUES ('530723', '华坪县', '530700', '3');
INSERT INTO `tb_area` VALUES ('360100', '南昌市', '360000', '2');
INSERT INTO `tb_area` VALUES ('420201', '市辖区', '420200', '3');
INSERT INTO `tb_area` VALUES ('511700', '达州市', '510000', '2');
INSERT INTO `tb_area` VALUES ('210900', '阜新市', '210000', '2');
INSERT INTO `tb_area` VALUES ('610822', '府谷县', '610800', '3');
INSERT INTO `tb_area` VALUES ('610625', '志丹县', '610600', '3');
INSERT INTO `tb_area` VALUES ('370101', '市辖区', '370100', '3');
INSERT INTO `tb_area` VALUES ('532327', '永仁县', '532300', '3');
INSERT INTO `tb_area` VALUES ('530823', '景东彝族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('140321', '平定县', '140300', '3');
INSERT INTO `tb_area` VALUES ('632802', '德令哈市', '632800', '3');
INSERT INTO `tb_area` VALUES ('360823', '峡江县', '360800', '3');
INSERT INTO `tb_area` VALUES ('350623', '漳浦县', '350600', '3');
INSERT INTO `tb_area` VALUES ('440222', '始兴县', '440200', '3');
INSERT INTO `tb_area` VALUES ('130824', '滦平县', '130800', '3');
INSERT INTO `tb_area` VALUES ('341881', '宁国市', '341800', '3');
INSERT INTO `tb_area` VALUES ('530303', '沾益区', '530300', '3');
INSERT INTO `tb_area` VALUES ('440501', '市辖区', '440500', '3');
INSERT INTO `tb_area` VALUES ('220302', '铁西区', '220300', '3');
INSERT INTO `tb_area` VALUES ('360104', '青云谱区', '360100', '3');
INSERT INTO `tb_area` VALUES ('340303', '蚌山区', '340300', '3');
INSERT INTO `tb_area` VALUES ('340101', '市辖区', '340100', '3');
INSERT INTO `tb_area` VALUES ('150925', '凉城县', '150900', '3');
INSERT INTO `tb_area` VALUES ('210700', '锦州市', '210000', '2');
INSERT INTO `tb_area` VALUES ('210302', '铁东区', '210300', '3');
INSERT INTO `tb_area` VALUES ('230183', '尚志市', '230100', '3');
INSERT INTO `tb_area` VALUES ('230223', '依安县', '230200', '3');
INSERT INTO `tb_area` VALUES ('640221', '平罗县', '640200', '3');
INSERT INTO `tb_area` VALUES ('320505', '虎丘区', '320500', '3');
INSERT INTO `tb_area` VALUES ('130984', '河间市', '130900', '3');
INSERT INTO `tb_area` VALUES ('130425', '大名县', '130400', '3');
INSERT INTO `tb_area` VALUES ('371201', '市辖区', '371200', '3');
INSERT INTO `tb_area` VALUES ('441704', '阳东区', '441700', '3');
INSERT INTO `tb_area` VALUES ('441302', '惠城区', '441300', '3');
INSERT INTO `tb_area` VALUES ('522601', '凯里市', '522600', '3');
INSERT INTO `tb_area` VALUES ('140221', '阳高县', '140200', '3');
INSERT INTO `tb_area` VALUES ('220000', '吉林省', '0', '1');
INSERT INTO `tb_area` VALUES ('210903', '新邱区', '210900', '3');
INSERT INTO `tb_area` VALUES ('542500', '阿里地区', '540000', '2');
INSERT INTO `tb_area` VALUES ('620901', '市辖区', '620900', '3');
INSERT INTO `tb_area` VALUES ('141130', '交口县', '141100', '3');
INSERT INTO `tb_area` VALUES ('321201', '市辖区', '321200', '3');
INSERT INTO `tb_area` VALUES ('520401', '市辖区', '520400', '3');
INSERT INTO `tb_area` VALUES ('350923', '屏南县', '350900', '3');
INSERT INTO `tb_area` VALUES ('450702', '钦南区', '450700', '3');
INSERT INTO `tb_area` VALUES ('542400', '那曲地区', '540000', '2');
INSERT INTO `tb_area` VALUES ('411523', '新县', '411500', '3');
INSERT INTO `tb_area` VALUES ('620102', '城关区', '620100', '3');
INSERT INTO `tb_area` VALUES ('331001', '市辖区', '331000', '3');
INSERT INTO `tb_area` VALUES ('640323', '盐池县', '640300', '3');
INSERT INTO `tb_area` VALUES ('130730', '怀来县', '130700', '3');
INSERT INTO `tb_area` VALUES ('220382', '双辽市', '220300', '3');
INSERT INTO `tb_area` VALUES ('140901', '市辖区', '140900', '3');
INSERT INTO `tb_area` VALUES ('431123', '双牌县', '431100', '3');
INSERT INTO `tb_area` VALUES ('330324', '永嘉县', '330300', '3');
INSERT INTO `tb_area` VALUES ('420304', '郧阳区', '420300', '3');
INSERT INTO `tb_area` VALUES ('410203', '顺河回族区', '410200', '3');
INSERT INTO `tb_area` VALUES ('653225', '策勒县', '653200', '3');
INSERT INTO `tb_area` VALUES ('120112', '津南区', '120100', '3');
INSERT INTO `tb_area` VALUES ('650109', '米东区', '650100', '3');
INSERT INTO `tb_area` VALUES ('445103', '潮安区', '445100', '3');
INSERT INTO `tb_area` VALUES ('621226', '礼县', '621200', '3');
INSERT INTO `tb_area` VALUES ('500154', '开州区', '500100', '3');
INSERT INTO `tb_area` VALUES ('232700', '大兴安岭地区', '230000', '2');
INSERT INTO `tb_area` VALUES ('522623', '施秉县', '522600', '3');
INSERT INTO `tb_area` VALUES ('451227', '巴马瑶族自治县', '451200', '3');
INSERT INTO `tb_area` VALUES ('532624', '麻栗坡县', '532600', '3');
INSERT INTO `tb_area` VALUES ('520328', '湄潭县', '520300', '3');
INSERT INTO `tb_area` VALUES ('532900', '大理白族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('360323', '芦溪县', '360300', '3');
INSERT INTO `tb_area` VALUES ('533401', '香格里拉市', '533400', '3');
INSERT INTO `tb_area` VALUES ('410327', '宜阳县', '410300', '3');
INSERT INTO `tb_area` VALUES ('445101', '市辖区', '445100', '3');
INSERT INTO `tb_area` VALUES ('513436', '美姑县', '513400', '3');
INSERT INTO `tb_area` VALUES ('371311', '罗庄区', '371300', '3');
INSERT INTO `tb_area` VALUES ('410603', '山城区', '410600', '3');
INSERT INTO `tb_area` VALUES ('231100', '黑河市', '230000', '2');
INSERT INTO `tb_area` VALUES ('530628', '彝良县', '530600', '3');
INSERT INTO `tb_area` VALUES ('610302', '渭滨区', '610300', '3');
INSERT INTO `tb_area` VALUES ('130724', '沽源县', '130700', '3');
INSERT INTO `tb_area` VALUES ('510400', '攀枝花市', '510000', '2');
INSERT INTO `tb_area` VALUES ('630100', '西宁市', '630000', '2');
INSERT INTO `tb_area` VALUES ('230302', '鸡冠区', '230300', '3');
INSERT INTO `tb_area` VALUES ('152530', '正蓝旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('659002', '阿拉尔市', '659000', '3');
INSERT INTO `tb_area` VALUES ('230104', '道外区', '230100', '3');
INSERT INTO `tb_area` VALUES ('520423', '镇宁布依族苗族自治县', '520400', '3');
INSERT INTO `tb_area` VALUES ('421223', '崇阳县', '421200', '3');
INSERT INTO `tb_area` VALUES ('341523', '舒城县', '341500', '3');
INSERT INTO `tb_area` VALUES ('331123', '遂昌县', '331100', '3');
INSERT INTO `tb_area` VALUES ('620502', '秦州区', '620500', '3');
INSERT INTO `tb_area` VALUES ('320509', '吴江区', '320500', '3');
INSERT INTO `tb_area` VALUES ('231223', '青冈县', '231200', '3');
INSERT INTO `tb_area` VALUES ('430521', '邵东县', '430500', '3');
INSERT INTO `tb_area` VALUES ('411729', '新蔡县', '411700', '3');
INSERT INTO `tb_area` VALUES ('530827', '孟连傣族拉祜族佤族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('340200', '芜湖市', '340000', '2');
INSERT INTO `tb_area` VALUES ('222402', '图们市', '222400', '3');
INSERT INTO `tb_area` VALUES ('610115', '临潼区', '610100', '3');
INSERT INTO `tb_area` VALUES ('511304', '嘉陵区', '511300', '3');
INSERT INTO `tb_area` VALUES ('445122', '饶平县', '445100', '3');
INSERT INTO `tb_area` VALUES ('150702', '海拉尔区', '150700', '3');
INSERT INTO `tb_area` VALUES ('140426', '黎城县', '140400', '3');
INSERT INTO `tb_area` VALUES ('150423', '巴林右旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('441202', '端州区', '441200', '3');
INSERT INTO `tb_area` VALUES ('610727', '略阳县', '610700', '3');
INSERT INTO `tb_area` VALUES ('610828', '佳县', '610800', '3');
INSERT INTO `tb_area` VALUES ('510822', '青川县', '510800', '3');
INSERT INTO `tb_area` VALUES ('431101', '市辖区', '431100', '3');
INSERT INTO `tb_area` VALUES ('510811', '昭化区', '510800', '3');
INSERT INTO `tb_area` VALUES ('330825', '龙游县', '330800', '3');
INSERT INTO `tb_area` VALUES ('433123', '凤凰县', '433100', '3');
INSERT INTO `tb_area` VALUES ('500152', '潼南区', '500100', '3');
INSERT INTO `tb_area` VALUES ('360121', '南昌县', '360100', '3');
INSERT INTO `tb_area` VALUES ('350181', '福清市', '350100', '3');
INSERT INTO `tb_area` VALUES ('230706', '翠峦区', '230700', '3');
INSERT INTO `tb_area` VALUES ('440515', '澄海区', '440500', '3');
INSERT INTO `tb_area` VALUES ('610622', '延川县', '610600', '3');
INSERT INTO `tb_area` VALUES ('510500', '泸州市', '510000', '2');
INSERT INTO `tb_area` VALUES ('654301', '阿勒泰市', '654300', '3');
INSERT INTO `tb_area` VALUES ('441882', '连州市', '441800', '3');
INSERT INTO `tb_area` VALUES ('421121', '团风县', '421100', '3');
INSERT INTO `tb_area` VALUES ('513335', '巴塘县', '513300', '3');
INSERT INTO `tb_area` VALUES ('533323', '福贡县', '533300', '3');
INSERT INTO `tb_area` VALUES ('371521', '阳谷县', '371500', '3');
INSERT INTO `tb_area` VALUES ('131125', '安平县', '131100', '3');
INSERT INTO `tb_area` VALUES ('540300', '昌都市', '540000', '2');
INSERT INTO `tb_area` VALUES ('370500', '东营市', '370000', '2');
INSERT INTO `tb_area` VALUES ('610923', '宁陕县', '610900', '3');
INSERT INTO `tb_area` VALUES ('530426', '峨山彝族自治县', '530400', '3');
INSERT INTO `tb_area` VALUES ('230523', '宝清县', '230500', '3');
INSERT INTO `tb_area` VALUES ('632624', '达日县', '632600', '3');
INSERT INTO `tb_area` VALUES ('530902', '临翔区', '530900', '3');
INSERT INTO `tb_area` VALUES ('341203', '颍东区', '341200', '3');
INSERT INTO `tb_area` VALUES ('650200', '克拉玛依市', '650000', '2');
INSERT INTO `tb_area` VALUES ('220581', '梅河口市', '220500', '3');
INSERT INTO `tb_area` VALUES ('360103', '西湖区', '360100', '3');
INSERT INTO `tb_area` VALUES ('360735', '石城县', '360700', '3');
INSERT INTO `tb_area` VALUES ('422827', '来凤县', '422800', '3');
INSERT INTO `tb_area` VALUES ('130633', '易县', '130600', '3');
INSERT INTO `tb_area` VALUES ('130635', '蠡县', '130600', '3');
INSERT INTO `tb_area` VALUES ('513328', '甘孜县', '513300', '3');
INSERT INTO `tb_area` VALUES ('140201', '市辖区', '140200', '3');
INSERT INTO `tb_area` VALUES ('445202', '榕城区', '445200', '3');
INSERT INTO `tb_area` VALUES ('640202', '大武口区', '640200', '3');
INSERT INTO `tb_area` VALUES ('510322', '富顺县', '510300', '3');
INSERT INTO `tb_area` VALUES ('411421', '民权县', '411400', '3');
INSERT INTO `tb_area` VALUES ('511421', '仁寿县', '511400', '3');
INSERT INTO `tb_area` VALUES ('150422', '巴林左旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('532928', '永平县', '532900', '3');
INSERT INTO `tb_area` VALUES ('230000', '黑龙江省', '0', '1');
INSERT INTO `tb_area` VALUES ('532525', '石屏县', '532500', '3');
INSERT INTO `tb_area` VALUES ('650201', '市辖区', '650200', '3');
INSERT INTO `tb_area` VALUES ('431000', '郴州市', '430000', '2');
INSERT INTO `tb_area` VALUES ('210702', '古塔区', '210700', '3');
INSERT INTO `tb_area` VALUES ('621022', '环县', '621000', '3');
INSERT INTO `tb_area` VALUES ('410882', '沁阳市', '410800', '3');
INSERT INTO `tb_area` VALUES ('451027', '凌云县', '451000', '3');
INSERT INTO `tb_area` VALUES ('230622', '肇源县', '230600', '3');
INSERT INTO `tb_area` VALUES ('330205', '江北区', '330200', '3');
INSERT INTO `tb_area` VALUES ('653127', '麦盖提县', '653100', '3');
INSERT INTO `tb_area` VALUES ('130406', '峰峰矿区', '130400', '3');
INSERT INTO `tb_area` VALUES ('220284', '磐石市', '220200', '3');
INSERT INTO `tb_area` VALUES ('530581', '腾冲市', '530500', '3');
INSERT INTO `tb_area` VALUES ('421201', '市辖区', '421200', '3');
INSERT INTO `tb_area` VALUES ('430800', '张家界市', '430000', '2');
INSERT INTO `tb_area` VALUES ('220300', '四平市', '220000', '2');
INSERT INTO `tb_area` VALUES ('350901', '市辖区', '350900', '3');
INSERT INTO `tb_area` VALUES ('440115', '南沙区', '440100', '3');
INSERT INTO `tb_area` VALUES ('441702', '江城区', '441700', '3');
INSERT INTO `tb_area` VALUES ('140924', '繁峙县', '140900', '3');
INSERT INTO `tb_area` VALUES ('320301', '市辖区', '320300', '3');
INSERT INTO `tb_area` VALUES ('211101', '市辖区', '211100', '3');
INSERT INTO `tb_area` VALUES ('231025', '林口县', '231000', '3');
INSERT INTO `tb_area` VALUES ('420581', '宜都市', '420500', '3');
INSERT INTO `tb_area` VALUES ('610629', '洛川县', '610600', '3');
INSERT INTO `tb_area` VALUES ('341721', '东至县', '341700', '3');
INSERT INTO `tb_area` VALUES ('621222', '文县', '621200', '3');
INSERT INTO `tb_area` VALUES ('460300', '三沙市', '460000', '2');
INSERT INTO `tb_area` VALUES ('130626', '定兴县', '130600', '3');
INSERT INTO `tb_area` VALUES ('130129', '赞皇县', '130100', '3');
INSERT INTO `tb_area` VALUES ('430581', '武冈市', '430500', '3');
INSERT INTO `tb_area` VALUES ('350582', '晋江市', '350500', '3');
INSERT INTO `tb_area` VALUES ('540200', '日喀则市', '540000', '2');
INSERT INTO `tb_area` VALUES ('371524', '东阿县', '371500', '3');
INSERT INTO `tb_area` VALUES ('320830', '盱眙县', '320800', '3');
INSERT INTO `tb_area` VALUES ('210404', '望花区', '210400', '3');
INSERT INTO `tb_area` VALUES ('445203', '揭东区', '445200', '3');
INSERT INTO `tb_area` VALUES ('320106', '鼓楼区', '320100', '3');
INSERT INTO `tb_area` VALUES ('360921', '奉新县', '360900', '3');
INSERT INTO `tb_area` VALUES ('522727', '平塘县', '522700', '3');
INSERT INTO `tb_area` VALUES ('530828', '澜沧拉祜族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('220203', '龙潭区', '220200', '3');
INSERT INTO `tb_area` VALUES ('220681', '临江市', '220600', '3');
INSERT INTO `tb_area` VALUES ('440105', '海珠区', '440100', '3');
INSERT INTO `tb_area` VALUES ('231000', '牡丹江市', '230000', '2');
INSERT INTO `tb_area` VALUES ('130530', '新河县', '130500', '3');
INSERT INTO `tb_area` VALUES ('610401', '市辖区', '610400', '3');
INSERT INTO `tb_area` VALUES ('422828', '鹤峰县', '422800', '3');
INSERT INTO `tb_area` VALUES ('450226', '三江侗族自治县', '450200', '3');
INSERT INTO `tb_area` VALUES ('610324', '扶风县', '610300', '3');
INSERT INTO `tb_area` VALUES ('430211', '天元区', '430200', '3');
INSERT INTO `tb_area` VALUES ('610201', '市辖区', '610200', '3');
INSERT INTO `tb_area` VALUES ('140181', '古交市', '140100', '3');
INSERT INTO `tb_area` VALUES ('130634', '曲阳县', '130600', '3');
INSERT INTO `tb_area` VALUES ('230206', '富拉尔基区', '230200', '3');
INSERT INTO `tb_area` VALUES ('350401', '市辖区', '350400', '3');
INSERT INTO `tb_area` VALUES ('371427', '夏津县', '371400', '3');
INSERT INTO `tb_area` VALUES ('420106', '武昌区', '420100', '3');
INSERT INTO `tb_area` VALUES ('150303', '海南区', '150300', '3');
INSERT INTO `tb_area` VALUES ('451401', '市辖区', '451400', '3');
INSERT INTO `tb_area` VALUES ('410183', '新密市', '410100', '3');
INSERT INTO `tb_area` VALUES ('513432', '喜德县', '513400', '3');
INSERT INTO `tb_area` VALUES ('150204', '青山区', '150200', '3');
INSERT INTO `tb_area` VALUES ('411521', '罗山县', '411500', '3');
INSERT INTO `tb_area` VALUES ('140702', '榆次区', '140700', '3');
INSERT INTO `tb_area` VALUES ('140721', '榆社县', '140700', '3');
INSERT INTO `tb_area` VALUES ('211282', '开原市', '211200', '3');
INSERT INTO `tb_area` VALUES ('340000', '安徽省', '0', '1');
INSERT INTO `tb_area` VALUES ('653000', '克孜勒苏柯尔克孜自治州', '650000', '2');
INSERT INTO `tb_area` VALUES ('130302', '海港区', '130300', '3');
INSERT INTO `tb_area` VALUES ('131022', '固安县', '131000', '3');
INSERT INTO `tb_area` VALUES ('620422', '会宁县', '620400', '3');
INSERT INTO `tb_area` VALUES ('152502', '锡林浩特市', '152500', '3');
INSERT INTO `tb_area` VALUES ('530900', '临沧市', '530000', '2');
INSERT INTO `tb_area` VALUES ('532622', '砚山县', '532600', '3');
INSERT INTO `tb_area` VALUES ('410782', '辉县市', '410700', '3');
INSERT INTO `tb_area` VALUES ('430281', '醴陵市', '430200', '3');
INSERT INTO `tb_area` VALUES ('130925', '盐山县', '130900', '3');
INSERT INTO `tb_area` VALUES ('210811', '老边区', '210800', '3');
INSERT INTO `tb_area` VALUES ('530126', '石林彝族自治县', '530100', '3');
INSERT INTO `tb_area` VALUES ('542429', '巴青县', '542400', '3');
INSERT INTO `tb_area` VALUES ('131103', '冀州区', '131100', '3');
INSERT INTO `tb_area` VALUES ('310110', '杨浦区', '310100', '3');
INSERT INTO `tb_area` VALUES ('230709', '金山屯区', '230700', '3');
INSERT INTO `tb_area` VALUES ('430901', '市辖区', '430900', '3');
INSERT INTO `tb_area` VALUES ('140881', '永济市', '140800', '3');
INSERT INTO `tb_area` VALUES ('139002', '辛集市', '139000', '3');
INSERT INTO `tb_area` VALUES ('654000', '伊犁哈萨克自治州', '650000', '2');
INSERT INTO `tb_area` VALUES ('340304', '禹会区', '340300', '3');
INSERT INTO `tb_area` VALUES ('654004', '霍尔果斯市', '654000', '3');
INSERT INTO `tb_area` VALUES ('230605', '红岗区', '230600', '3');
INSERT INTO `tb_area` VALUES ('152202', '阿尔山市', '152200', '3');
INSERT INTO `tb_area` VALUES ('152525', '东乌珠穆沁旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('450325', '兴安县', '450300', '3');
INSERT INTO `tb_area` VALUES ('410802', '解放区', '410800', '3');
INSERT INTO `tb_area` VALUES ('231001', '市辖区', '231000', '3');
INSERT INTO `tb_area` VALUES ('410205', '禹王台区', '410200', '3');
INSERT INTO `tb_area` VALUES ('511528', '兴文县', '511500', '3');
INSERT INTO `tb_area` VALUES ('652827', '和静县', '652800', '3');
INSERT INTO `tb_area` VALUES ('321204', '姜堰区', '321200', '3');
INSERT INTO `tb_area` VALUES ('431126', '宁远县', '431100', '3');
INSERT INTO `tb_area` VALUES ('500242', '酉阳土家族苗族自治县', '500200', '3');
INSERT INTO `tb_area` VALUES ('440500', '汕头市', '440000', '2');
INSERT INTO `tb_area` VALUES ('361002', '临川区', '361000', '3');
INSERT INTO `tb_area` VALUES ('510901', '市辖区', '510900', '3');
INSERT INTO `tb_area` VALUES ('632800', '海西蒙古族藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('420822', '沙洋县', '420800', '3');
INSERT INTO `tb_area` VALUES ('620922', '瓜州县', '620900', '3');
INSERT INTO `tb_area` VALUES ('450125', '上林县', '450100', '3');
INSERT INTO `tb_area` VALUES ('150581', '霍林郭勒市', '150500', '3');
INSERT INTO `tb_area` VALUES ('140823', '闻喜县', '140800', '3');
INSERT INTO `tb_area` VALUES ('652324', '玛纳斯县', '652300', '3');
INSERT INTO `tb_area` VALUES ('360426', '德安县', '360400', '3');
INSERT INTO `tb_area` VALUES ('330382', '乐清市', '330300', '3');
INSERT INTO `tb_area` VALUES ('530403', '江川区', '530400', '3');
INSERT INTO `tb_area` VALUES ('411103', '郾城区', '411100', '3');
INSERT INTO `tb_area` VALUES ('321000', '扬州市', '320000', '2');
INSERT INTO `tb_area` VALUES ('210905', '清河门区', '210900', '3');
INSERT INTO `tb_area` VALUES ('440112', '黄埔区', '440100', '3');
INSERT INTO `tb_area` VALUES ('230102', '道里区', '230100', '3');
INSERT INTO `tb_area` VALUES ('445200', '揭阳市', '440000', '2');
INSERT INTO `tb_area` VALUES ('451023', '平果县', '451000', '3');
INSERT INTO `tb_area` VALUES ('420204', '下陆区', '420200', '3');
INSERT INTO `tb_area` VALUES ('522625', '镇远县', '522600', '3');
INSERT INTO `tb_area` VALUES ('421224', '通山县', '421200', '3');
INSERT INTO `tb_area` VALUES ('431003', '苏仙区', '431000', '3');
INSERT INTO `tb_area` VALUES ('430525', '洞口县', '430500', '3');
INSERT INTO `tb_area` VALUES ('652327', '吉木萨尔县', '652300', '3');
INSERT INTO `tb_area` VALUES ('410302', '老城区', '410300', '3');
INSERT INTO `tb_area` VALUES ('510700', '绵阳市', '510000', '2');
INSERT INTO `tb_area` VALUES ('540222', '江孜县', '540200', '3');
INSERT INTO `tb_area` VALUES ('350627', '南靖县', '350600', '3');
INSERT INTO `tb_area` VALUES ('512002', '雁江区', '512000', '3');
INSERT INTO `tb_area` VALUES ('410505', '殷都区', '410500', '3');
INSERT INTO `tb_area` VALUES ('441403', '梅县区', '441400', '3');
INSERT INTO `tb_area` VALUES ('130183', '晋州市', '130100', '3');
INSERT INTO `tb_area` VALUES ('340403', '田家庵区', '340400', '3');
INSERT INTO `tb_area` VALUES ('530401', '市辖区', '530400', '3');
INSERT INTO `tb_area` VALUES ('230524', '饶河县', '230500', '3');
INSERT INTO `tb_area` VALUES ('360105', '湾里区', '360100', '3');
INSERT INTO `tb_area` VALUES ('130700', '张家口市', '130000', '2');
INSERT INTO `tb_area` VALUES ('230207', '碾子山区', '230200', '3');
INSERT INTO `tb_area` VALUES ('140624', '怀仁县', '140600', '3');
INSERT INTO `tb_area` VALUES ('341802', '宣州区', '341800', '3');
INSERT INTO `tb_area` VALUES ('610925', '岚皋县', '610900', '3');
INSERT INTO `tb_area` VALUES ('430406', '雁峰区', '430400', '3');
INSERT INTO `tb_area` VALUES ('440604', '禅城区', '440600', '3');
INSERT INTO `tb_area` VALUES ('430101', '市辖区', '430100', '3');
INSERT INTO `tb_area` VALUES ('341101', '市辖区', '341100', '3');
INSERT INTO `tb_area` VALUES ('511600', '广安市', '510000', '2');
INSERT INTO `tb_area` VALUES ('370982', '新泰市', '370900', '3');
INSERT INTO `tb_area` VALUES ('532930', '洱源县', '532900', '3');
INSERT INTO `tb_area` VALUES ('150426', '翁牛特旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('610524', '合阳县', '610500', '3');
INSERT INTO `tb_area` VALUES ('321002', '广陵区', '321000', '3');
INSERT INTO `tb_area` VALUES ('130207', '丰南区', '130200', '3');
INSERT INTO `tb_area` VALUES ('140301', '市辖区', '140300', '3');
INSERT INTO `tb_area` VALUES ('320621', '海安县', '320600', '3');
INSERT INTO `tb_area` VALUES ('610824', '靖边县', '610800', '3');
INSERT INTO `tb_area` VALUES ('222426', '安图县', '222400', '3');
INSERT INTO `tb_area` VALUES ('420506', '夷陵区', '420500', '3');
INSERT INTO `tb_area` VALUES ('340422', '寿县', '340400', '3');
INSERT INTO `tb_area` VALUES ('440100', '广州市', '440000', '2');
INSERT INTO `tb_area` VALUES ('340301', '市辖区', '340300', '3');
INSERT INTO `tb_area` VALUES ('530113', '东川区', '530100', '3');
INSERT INTO `tb_area` VALUES ('130128', '深泽县', '130100', '3');
INSERT INTO `tb_area` VALUES ('650400', '吐鲁番市', '650000', '2');
INSERT INTO `tb_area` VALUES ('231083', '海林市', '231000', '3');
INSERT INTO `tb_area` VALUES ('130502', '桥东区', '130500', '3');
INSERT INTO `tb_area` VALUES ('350823', '上杭县', '350800', '3');
INSERT INTO `tb_area` VALUES ('411728', '遂平县', '411700', '3');
INSERT INTO `tb_area` VALUES ('140100', '太原市', '140000', '2');
INSERT INTO `tb_area` VALUES ('210115', '辽中区', '210100', '3');
INSERT INTO `tb_area` VALUES ('350182', '长乐市', '350100', '3');
INSERT INTO `tb_area` VALUES ('220702', '宁江区', '220700', '3');
INSERT INTO `tb_area` VALUES ('610326', '眉县', '610300', '3');
INSERT INTO `tb_area` VALUES ('210522', '桓仁满族自治县', '210500', '3');
INSERT INTO `tb_area` VALUES ('410303', '西工区', '410300', '3');
INSERT INTO `tb_area` VALUES ('530322', '陆良县', '530300', '3');
INSERT INTO `tb_area` VALUES ('141033', '蒲县', '141000', '3');
INSERT INTO `tb_area` VALUES ('450801', '市辖区', '450800', '3');
INSERT INTO `tb_area` VALUES ('421125', '浠水县', '421100', '3');
INSERT INTO `tb_area` VALUES ('411621', '扶沟县', '411600', '3');
INSERT INTO `tb_area` VALUES ('630104', '城西区', '630100', '3');
INSERT INTO `tb_area` VALUES ('653123', '英吉沙县', '653100', '3');
INSERT INTO `tb_area` VALUES ('220721', '前郭尔罗斯蒙古族自治县', '220700', '3');
INSERT INTO `tb_area` VALUES ('511922', '南江县', '511900', '3');
INSERT INTO `tb_area` VALUES ('350601', '市辖区', '350600', '3');
INSERT INTO `tb_area` VALUES ('130723', '康保县', '130700', '3');
INSERT INTO `tb_area` VALUES ('370921', '宁阳县', '370900', '3');
INSERT INTO `tb_area` VALUES ('150000', '内蒙古自治区', '0', '1');
INSERT INTO `tb_area` VALUES ('230305', '梨树区', '230300', '3');
INSERT INTO `tb_area` VALUES ('450206', '柳江区', '450200', '3');
INSERT INTO `tb_area` VALUES ('620822', '灵台县', '620800', '3');
INSERT INTO `tb_area` VALUES ('440804', '坡头区', '440800', '3');
INSERT INTO `tb_area` VALUES ('350824', '武平县', '350800', '3');
INSERT INTO `tb_area` VALUES ('500229', '城口县', '500200', '3');
INSERT INTO `tb_area` VALUES ('130629', '容城县', '130600', '3');
INSERT INTO `tb_area` VALUES ('530721', '玉龙纳西族自治县', '530700', '3');
INSERT INTO `tb_area` VALUES ('330381', '瑞安市', '330300', '3');
INSERT INTO `tb_area` VALUES ('350602', '芗城区', '350600', '3');
INSERT INTO `tb_area` VALUES ('360923', '上高县', '360900', '3');
INSERT INTO `tb_area` VALUES ('220524', '柳河县', '220500', '3');
INSERT INTO `tb_area` VALUES ('440703', '蓬江区', '440700', '3');
INSERT INTO `tb_area` VALUES ('532932', '鹤庆县', '532900', '3');
INSERT INTO `tb_area` VALUES ('431081', '资兴市', '431000', '3');
INSERT INTO `tb_area` VALUES ('230704', '友好区', '230700', '3');
INSERT INTO `tb_area` VALUES ('430382', '韶山市', '430300', '3');
INSERT INTO `tb_area` VALUES ('350400', '三明市', '350000', '2');
INSERT INTO `tb_area` VALUES ('150401', '市辖区', '150400', '3');
INSERT INTO `tb_area` VALUES ('360123', '安义县', '360100', '3');
INSERT INTO `tb_area` VALUES ('120119', '蓟州区', '120100', '3');
INSERT INTO `tb_area` VALUES ('451321', '忻城县', '451300', '3');
INSERT INTO `tb_area` VALUES ('640501', '市辖区', '640500', '3');
INSERT INTO `tb_area` VALUES ('500113', '巴南区', '500100', '3');
INSERT INTO `tb_area` VALUES ('530112', '西山区', '530100', '3');
INSERT INTO `tb_area` VALUES ('370783', '寿光市', '370700', '3');
INSERT INTO `tb_area` VALUES ('320100', '南京市', '320000', '2');
INSERT INTO `tb_area` VALUES ('330801', '市辖区', '330800', '3');
INSERT INTO `tb_area` VALUES ('513422', '木里藏族自治县', '513400', '3');
INSERT INTO `tb_area` VALUES ('371082', '荣成市', '371000', '3');
INSERT INTO `tb_area` VALUES ('370282', '即墨市', '370200', '3');
INSERT INTO `tb_area` VALUES ('520101', '市辖区', '520100', '3');
INSERT INTO `tb_area` VALUES ('451101', '市辖区', '451100', '3');
INSERT INTO `tb_area` VALUES ('371726', '鄄城县', '371700', '3');
INSERT INTO `tb_area` VALUES ('652302', '阜康市', '652300', '3');
INSERT INTO `tb_area` VALUES ('150301', '市辖区', '150300', '3');
INSERT INTO `tb_area` VALUES ('140827', '垣曲县', '140800', '3');
INSERT INTO `tb_area` VALUES ('430202', '荷塘区', '430200', '3');
INSERT INTO `tb_area` VALUES ('513221', '汶川县', '513200', '3');
INSERT INTO `tb_area` VALUES ('341202', '颍州区', '341200', '3');
INSERT INTO `tb_area` VALUES ('370113', '长清区', '370100', '3');
INSERT INTO `tb_area` VALUES ('371121', '五莲县', '371100', '3');
INSERT INTO `tb_area` VALUES ('370505', '垦利区', '370500', '3');
INSERT INTO `tb_area` VALUES ('620522', '秦安县', '620500', '3');
INSERT INTO `tb_area` VALUES ('210201', '市辖区', '210200', '3');
INSERT INTO `tb_area` VALUES ('520201', '钟山区', '520200', '3');
INSERT INTO `tb_area` VALUES ('230903', '桃山区', '230900', '3');
INSERT INTO `tb_area` VALUES ('371200', '莱芜市', '370000', '2');
INSERT INTO `tb_area` VALUES ('445201', '市辖区', '445200', '3');
INSERT INTO `tb_area` VALUES ('542526', '改则县', '542500', '3');
INSERT INTO `tb_area` VALUES ('370682', '莱阳市', '370600', '3');
INSERT INTO `tb_area` VALUES ('500101', '万州区', '500100', '3');
INSERT INTO `tb_area` VALUES ('431122', '东安县', '431100', '3');
INSERT INTO `tb_area` VALUES ('130130', '无极县', '130100', '3');
INSERT INTO `tb_area` VALUES ('341200', '阜阳市', '340000', '2');
INSERT INTO `tb_area` VALUES ('360322', '上栗县', '360300', '3');
INSERT INTO `tb_area` VALUES ('420921', '孝昌县', '420900', '3');
INSERT INTO `tb_area` VALUES ('511401', '市辖区', '511400', '3');
INSERT INTO `tb_area` VALUES ('411325', '内乡县', '411300', '3');
INSERT INTO `tb_area` VALUES ('511901', '市辖区', '511900', '3');
INSERT INTO `tb_area` VALUES ('522700', '黔南布依族苗族自治州', '520000', '2');
INSERT INTO `tb_area` VALUES ('530324', '罗平县', '530300', '3');
INSERT INTO `tb_area` VALUES ('350102', '鼓楼区', '350100', '3');
INSERT INTO `tb_area` VALUES ('232722', '塔河县', '232700', '3');
INSERT INTO `tb_area` VALUES ('431022', '宜章县', '431000', '3');
INSERT INTO `tb_area` VALUES ('210727', '义县', '210700', '3');
INSERT INTO `tb_area` VALUES ('130133', '赵县', '130100', '3');
INSERT INTO `tb_area` VALUES ('440402', '香洲区', '440400', '3');
INSERT INTO `tb_area` VALUES ('611021', '洛南县', '611000', '3');
INSERT INTO `tb_area` VALUES ('620423', '景泰县', '620400', '3');
INSERT INTO `tb_area` VALUES ('130303', '山海关区', '130300', '3');
INSERT INTO `tb_area` VALUES ('370481', '滕州市', '370400', '3');
INSERT INTO `tb_area` VALUES ('420505', '猇亭区', '420500', '3');
INSERT INTO `tb_area` VALUES ('512021', '安岳县', '512000', '3');
INSERT INTO `tb_area` VALUES ('410927', '台前县', '410900', '3');
INSERT INTO `tb_area` VALUES ('120110', '东丽区', '120100', '3');
INSERT INTO `tb_area` VALUES ('510781', '江油市', '510700', '3');
INSERT INTO `tb_area` VALUES ('130223', '滦县', '130200', '3');
INSERT INTO `tb_area` VALUES ('211324', '喀喇沁左翼蒙古族自治县', '211300', '3');
INSERT INTO `tb_area` VALUES ('320305', '贾汪区', '320300', '3');
INSERT INTO `tb_area` VALUES ('610116', '长安区', '610100', '3');
INSERT INTO `tb_area` VALUES ('211200', '铁岭市', '210000', '2');
INSERT INTO `tb_area` VALUES ('510115', '温江区', '510100', '3');
INSERT INTO `tb_area` VALUES ('411425', '虞城县', '411400', '3');
INSERT INTO `tb_area` VALUES ('360301', '市辖区', '360300', '3');
INSERT INTO `tb_area` VALUES ('140729', '灵石县', '140700', '3');
INSERT INTO `tb_area` VALUES ('610628', '富县', '610600', '3');
INSERT INTO `tb_area` VALUES ('610403', '杨陵区', '610400', '3');
INSERT INTO `tb_area` VALUES ('350429', '泰宁县', '350400', '3');
INSERT INTO `tb_area` VALUES ('331125', '云和县', '331100', '3');
INSERT INTO `tb_area` VALUES ('140826', '绛县', '140800', '3');
INSERT INTO `tb_area` VALUES ('411122', '临颍县', '411100', '3');
INSERT INTO `tb_area` VALUES ('532527', '泸西县', '532500', '3');
INSERT INTO `tb_area` VALUES ('610724', '西乡县', '610700', '3');
INSERT INTO `tb_area` VALUES ('440801', '市辖区', '440800', '3');
INSERT INTO `tb_area` VALUES ('152526', '西乌珠穆沁旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('131081', '霸州市', '131000', '3');
INSERT INTO `tb_area` VALUES ('320200', '无锡市', '320000', '2');
INSERT INTO `tb_area` VALUES ('341301', '市辖区', '341300', '3');
INSERT INTO `tb_area` VALUES ('220182', '榆树市', '220100', '3');
INSERT INTO `tb_area` VALUES ('411100', '漯河市', '410000', '2');
INSERT INTO `tb_area` VALUES ('341503', '裕安区', '341500', '3');
INSERT INTO `tb_area` VALUES ('520628', '松桃苗族自治县', '520600', '3');
INSERT INTO `tb_area` VALUES ('220301', '市辖区', '220300', '3');
INSERT INTO `tb_area` VALUES ('230203', '建华区', '230200', '3');
INSERT INTO `tb_area` VALUES ('331126', '庆元县', '331100', '3');
INSERT INTO `tb_area` VALUES ('510922', '射洪县', '510900', '3');
INSERT INTO `tb_area` VALUES ('441323', '惠东县', '441300', '3');
INSERT INTO `tb_area` VALUES ('230124', '方正县', '230100', '3');
INSERT INTO `tb_area` VALUES ('220802', '洮北区', '220800', '3');
INSERT INTO `tb_area` VALUES ('370102', '历下区', '370100', '3');
INSERT INTO `tb_area` VALUES ('520500', '毕节市', '520000', '2');
INSERT INTO `tb_area` VALUES ('410304', '瀍河回族区', '410300', '3');
INSERT INTO `tb_area` VALUES ('150823', '乌拉特前旗', '150800', '3');
INSERT INTO `tb_area` VALUES ('211011', '太子河区', '211000', '3');
INSERT INTO `tb_area` VALUES ('150727', '新巴尔虎右旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('131128', '阜城县', '131100', '3');
INSERT INTO `tb_area` VALUES ('232721', '呼玛县', '232700', '3');
INSERT INTO `tb_area` VALUES ('220201', '市辖区', '220200', '3');
INSERT INTO `tb_area` VALUES ('513437', '雷波县', '513400', '3');
INSERT INTO `tb_area` VALUES ('654200', '塔城地区', '650000', '2');
INSERT INTO `tb_area` VALUES ('360925', '靖安县', '360900', '3');
INSERT INTO `tb_area` VALUES ('522622', '黄平县', '522600', '3');
INSERT INTO `tb_area` VALUES ('441423', '丰顺县', '441400', '3');
INSERT INTO `tb_area` VALUES ('522628', '锦屏县', '522600', '3');
INSERT INTO `tb_area` VALUES ('630103', '城中区', '630100', '3');
INSERT INTO `tb_area` VALUES ('653122', '疏勒县', '653100', '3');
INSERT INTO `tb_area` VALUES ('220500', '通化市', '220000', '2');
INSERT INTO `tb_area` VALUES ('370283', '平度市', '370200', '3');
INSERT INTO `tb_area` VALUES ('130108', '裕华区', '130100', '3');
INSERT INTO `tb_area` VALUES ('654023', '霍城县', '654000', '3');
INSERT INTO `tb_area` VALUES ('120114', '武清区', '120100', '3');
INSERT INTO `tb_area` VALUES ('331000', '台州市', '330000', '2');
INSERT INTO `tb_area` VALUES ('513427', '宁南县', '513400', '3');
INSERT INTO `tb_area` VALUES ('130200', '唐山市', '130000', '2');
INSERT INTO `tb_area` VALUES ('654226', '和布克赛尔蒙古自治县', '654200', '3');
INSERT INTO `tb_area` VALUES ('620300', '金昌市', '620000', '2');
INSERT INTO `tb_area` VALUES ('341323', '灵璧县', '341300', '3');
INSERT INTO `tb_area` VALUES ('340181', '巢湖市', '340100', '3');
INSERT INTO `tb_area` VALUES ('430524', '隆回县', '430500', '3');
INSERT INTO `tb_area` VALUES ('320205', '锡山区', '320200', '3');
INSERT INTO `tb_area` VALUES ('410201', '市辖区', '410200', '3');
INSERT INTO `tb_area` VALUES ('460204', '天涯区', '460200', '3');
INSERT INTO `tb_area` VALUES ('520115', '观山湖区', '520100', '3');
INSERT INTO `tb_area` VALUES ('230406', '东山区', '230400', '3');
INSERT INTO `tb_area` VALUES ('522728', '罗甸县', '522700', '3');
INSERT INTO `tb_area` VALUES ('371523', '茌平县', '371500', '3');
INSERT INTO `tb_area` VALUES ('511702', '通川区', '511700', '3');
INSERT INTO `tb_area` VALUES ('410902', '华龙区', '410900', '3');
INSERT INTO `tb_area` VALUES ('659003', '图木舒克市', '659000', '3');
INSERT INTO `tb_area` VALUES ('420107', '青山区', '420100', '3');
INSERT INTO `tb_area` VALUES ('222403', '敦化市', '222400', '3');
INSERT INTO `tb_area` VALUES ('320681', '启东市', '320600', '3');
INSERT INTO `tb_area` VALUES ('371203', '钢城区', '371200', '3');
INSERT INTO `tb_area` VALUES ('511402', '东坡区', '511400', '3');
INSERT INTO `tb_area` VALUES ('230125', '宾县', '230100', '3');
INSERT INTO `tb_area` VALUES ('141032', '永和县', '141000', '3');
INSERT INTO `tb_area` VALUES ('610222', '宜君县', '610200', '3');
INSERT INTO `tb_area` VALUES ('331100', '丽水市', '330000', '2');
INSERT INTO `tb_area` VALUES ('540326', '八宿县', '540300', '3');
INSERT INTO `tb_area` VALUES ('410704', '凤泉区', '410700', '3');
INSERT INTO `tb_area` VALUES ('211400', '葫芦岛市', '210000', '2');
INSERT INTO `tb_area` VALUES ('540531', '浪卡子县', '540500', '3');
INSERT INTO `tb_area` VALUES ('440607', '三水区', '440600', '3');
INSERT INTO `tb_area` VALUES ('220723', '乾安县', '220700', '3');
INSERT INTO `tb_area` VALUES ('150723', '鄂伦春自治旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('654202', '乌苏市', '654200', '3');
INSERT INTO `tb_area` VALUES ('420200', '黄石市', '420000', '2');
INSERT INTO `tb_area` VALUES ('510403', '西区', '510400', '3');
INSERT INTO `tb_area` VALUES ('652826', '焉耆回族自治县', '652800', '3');
INSERT INTO `tb_area` VALUES ('610331', '太白县', '610300', '3');
INSERT INTO `tb_area` VALUES ('330424', '海盐县', '330400', '3');
INSERT INTO `tb_area` VALUES ('451222', '天峨县', '451200', '3');
INSERT INTO `tb_area` VALUES ('350128', '平潭县', '350100', '3');
INSERT INTO `tb_area` VALUES ('420683', '枣阳市', '420600', '3');
INSERT INTO `tb_area` VALUES ('430224', '茶陵县', '430200', '3');
INSERT INTO `tb_area` VALUES ('340201', '市辖区', '340200', '3');
INSERT INTO `tb_area` VALUES ('530925', '双江拉祜族佤族布朗族傣族自治县', '530900', '3');
INSERT INTO `tb_area` VALUES ('141102', '离石区', '141100', '3');
INSERT INTO `tb_area` VALUES ('360800', '吉安市', '360000', '2');
INSERT INTO `tb_area` VALUES ('532529', '红河县', '532500', '3');
INSERT INTO `tb_area` VALUES ('659006', '铁门关市', '659000', '3');
INSERT INTO `tb_area` VALUES ('450501', '市辖区', '450500', '3');
INSERT INTO `tb_area` VALUES ('450331', '荔浦县', '450300', '3');
INSERT INTO `tb_area` VALUES ('540328', '芒康县', '540300', '3');
INSERT INTO `tb_area` VALUES ('511100', '乐山市', '510000', '2');
INSERT INTO `tb_area` VALUES ('330702', '婺城区', '330700', '3');
INSERT INTO `tb_area` VALUES ('140110', '晋源区', '140100', '3');
INSERT INTO `tb_area` VALUES ('450302', '秀峰区', '450300', '3');
INSERT INTO `tb_area` VALUES ('653022', '阿克陶县', '653000', '3');
INSERT INTO `tb_area` VALUES ('520502', '七星关区', '520500', '3');
INSERT INTO `tb_area` VALUES ('610125', '户县', '610100', '3');
INSERT INTO `tb_area` VALUES ('140226', '左云县', '140200', '3');
INSERT INTO `tb_area` VALUES ('320507', '相城区', '320500', '3');
INSERT INTO `tb_area` VALUES ('652328', '木垒哈萨克自治县', '652300', '3');
INSERT INTO `tb_area` VALUES ('520602', '碧江区', '520600', '3');
INSERT INTO `tb_area` VALUES ('430111', '雨花区', '430100', '3');
INSERT INTO `tb_area` VALUES ('421127', '黄梅县', '421100', '3');
INSERT INTO `tb_area` VALUES ('410602', '鹤山区', '410600', '3');
INSERT INTO `tb_area` VALUES ('410700', '新乡市', '410000', '2');
INSERT INTO `tb_area` VALUES ('231086', '东宁市', '231000', '3');
INSERT INTO `tb_area` VALUES ('230225', '甘南县', '230200', '3');
INSERT INTO `tb_area` VALUES ('231101', '市辖区', '231100', '3');
INSERT INTO `tb_area` VALUES ('220623', '长白朝鲜族自治县', '220600', '3');
INSERT INTO `tb_area` VALUES ('510900', '遂宁市', '510000', '2');
INSERT INTO `tb_area` VALUES ('540329', '洛隆县', '540300', '3');
INSERT INTO `tb_area` VALUES ('540402', '巴宜区', '540400', '3');
INSERT INTO `tb_area` VALUES ('331102', '莲都区', '331100', '3');
INSERT INTO `tb_area` VALUES ('231200', '绥化市', '230000', '2');
INSERT INTO `tb_area` VALUES ('652701', '博乐市', '652700', '3');
INSERT INTO `tb_area` VALUES ('130300', '秦皇岛市', '130000', '2');
INSERT INTO `tb_area` VALUES ('411324', '镇平县', '411300', '3');
INSERT INTO `tb_area` VALUES ('510301', '市辖区', '510300', '3');
INSERT INTO `tb_area` VALUES ('350203', '思明区', '350200', '3');
INSERT INTO `tb_area` VALUES ('622921', '临夏县', '622900', '3');
INSERT INTO `tb_area` VALUES ('450100', '南宁市', '450000', '2');
INSERT INTO `tb_area` VALUES ('419001', '济源市', '419000', '3');
INSERT INTO `tb_area` VALUES ('230710', '五营区', '230700', '3');
INSERT INTO `tb_area` VALUES ('210781', '凌海市', '210700', '3');
INSERT INTO `tb_area` VALUES ('510107', '武侯区', '510100', '3');
INSERT INTO `tb_area` VALUES ('350981', '福安市', '350900', '3');
INSERT INTO `tb_area` VALUES ('131127', '景县', '131100', '3');
INSERT INTO `tb_area` VALUES ('230805', '东风区', '230800', '3');
INSERT INTO `tb_area` VALUES ('130523', '内丘县', '130500', '3');
INSERT INTO `tb_area` VALUES ('420626', '保康县', '420600', '3');
INSERT INTO `tb_area` VALUES ('350301', '市辖区', '350300', '3');
INSERT INTO `tb_area` VALUES ('360703', '南康区', '360700', '3');
INSERT INTO `tb_area` VALUES ('542523', '噶尔县', '542500', '3');
INSERT INTO `tb_area` VALUES ('500109', '北碚区', '500100', '3');
INSERT INTO `tb_area` VALUES ('140701', '市辖区', '140700', '3');
INSERT INTO `tb_area` VALUES ('510904', '安居区', '510900', '3');
INSERT INTO `tb_area` VALUES ('321084', '高邮市', '321000', '3');
INSERT INTO `tb_area` VALUES ('410306', '吉利区', '410300', '3');
INSERT INTO `tb_area` VALUES ('330902', '定海区', '330900', '3');
INSERT INTO `tb_area` VALUES ('653121', '疏附县', '653100', '3');
INSERT INTO `tb_area` VALUES ('510112', '龙泉驿区', '510100', '3');
INSERT INTO `tb_area` VALUES ('620923', '肃北蒙古族自治县', '620900', '3');
INSERT INTO `tb_area` VALUES ('520622', '玉屏侗族自治县', '520600', '3');
INSERT INTO `tb_area` VALUES ('230624', '杜尔伯特蒙古族自治县', '230600', '3');
INSERT INTO `tb_area` VALUES ('640200', '石嘴山市', '640000', '2');
INSERT INTO `tb_area` VALUES ('150302', '海勃湾区', '150300', '3');
INSERT INTO `tb_area` VALUES ('230229', '克山县', '230200', '3');
INSERT INTO `tb_area` VALUES ('610701', '市辖区', '610700', '3');
INSERT INTO `tb_area` VALUES ('330421', '嘉善县', '330400', '3');
INSERT INTO `tb_area` VALUES ('420606', '樊城区', '420600', '3');
INSERT INTO `tb_area` VALUES ('632822', '都兰县', '632800', '3');
INSERT INTO `tb_area` VALUES ('140802', '盐湖区', '140800', '3');
INSERT INTO `tb_area` VALUES ('230109', '松北区', '230100', '3');
INSERT INTO `tb_area` VALUES ('530125', '宜良县', '530100', '3');
INSERT INTO `tb_area` VALUES ('231182', '五大连池市', '231100', '3');
INSERT INTO `tb_area` VALUES ('450803', '港南区', '450800', '3');
INSERT INTO `tb_area` VALUES ('360881', '井冈山市', '360800', '3');
INSERT INTO `tb_area` VALUES ('320623', '如东县', '320600', '3');
INSERT INTO `tb_area` VALUES ('341621', '涡阳县', '341600', '3');
INSERT INTO `tb_area` VALUES ('540126', '达孜县', '540100', '3');
INSERT INTO `tb_area` VALUES ('341282', '界首市', '341200', '3');
INSERT INTO `tb_area` VALUES ('360700', '赣州市', '360000', '2');
INSERT INTO `tb_area` VALUES ('511824', '石棉县', '511800', '3');
INSERT INTO `tb_area` VALUES ('130521', '邢台县', '130500', '3');
INSERT INTO `tb_area` VALUES ('370900', '泰安市', '370000', '2');
INSERT INTO `tb_area` VALUES ('350201', '市辖区', '350200', '3');
INSERT INTO `tb_area` VALUES ('140200', '大同市', '140000', '2');
INSERT INTO `tb_area` VALUES ('320924', '射阳县', '320900', '3');
INSERT INTO `tb_area` VALUES ('610632', '黄陵县', '610600', '3');
INSERT INTO `tb_area` VALUES ('513224', '松潘县', '513200', '3');
INSERT INTO `tb_area` VALUES ('653201', '和田市', '653200', '3');
INSERT INTO `tb_area` VALUES ('445381', '罗定市', '445300', '3');
INSERT INTO `tb_area` VALUES ('220700', '松原市', '220000', '2');
INSERT INTO `tb_area` VALUES ('640502', '沙坡头区', '640500', '3');
INSERT INTO `tb_area` VALUES ('430725', '桃源县', '430700', '3');
INSERT INTO `tb_area` VALUES ('360502', '渝水区', '360500', '3');
INSERT INTO `tb_area` VALUES ('532532', '河口瑶族自治县', '532500', '3');
INSERT INTO `tb_area` VALUES ('340602', '杜集区', '340600', '3');
INSERT INTO `tb_area` VALUES ('420114', '蔡甸区', '420100', '3');
INSERT INTO `tb_area` VALUES ('511123', '犍为县', '511100', '3');
INSERT INTO `tb_area` VALUES ('621122', '陇西县', '621100', '3');
INSERT INTO `tb_area` VALUES ('511302', '顺庆区', '511300', '3');
INSERT INTO `tb_area` VALUES ('370212', '崂山区', '370200', '3');
INSERT INTO `tb_area` VALUES ('150623', '鄂托克前旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('431302', '娄星区', '431300', '3');
INSERT INTO `tb_area` VALUES ('450700', '钦州市', '450000', '2');
INSERT INTO `tb_area` VALUES ('330700', '金华市', '330000', '2');
INSERT INTO `tb_area` VALUES ('511111', '沙湾区', '511100', '3');
INSERT INTO `tb_area` VALUES ('430601', '市辖区', '430600', '3');
INSERT INTO `tb_area` VALUES ('410100', '郑州市', '410000', '2');
INSERT INTO `tb_area` VALUES ('210703', '凌河区', '210700', '3');
INSERT INTO `tb_area` VALUES ('320500', '苏州市', '320000', '2');
INSERT INTO `tb_area` VALUES ('340800', '安庆市', '340000', '2');
INSERT INTO `tb_area` VALUES ('150203', '昆都仑区', '150200', '3');
INSERT INTO `tb_area` VALUES ('611000', '商洛市', '610000', '2');
INSERT INTO `tb_area` VALUES ('421002', '沙市区', '421000', '3');
INSERT INTO `tb_area` VALUES ('130209', '曹妃甸区', '130200', '3');
INSERT INTO `tb_area` VALUES ('360481', '瑞昌市', '360400', '3');
INSERT INTO `tb_area` VALUES ('231005', '西安区', '231000', '3');
INSERT INTO `tb_area` VALUES ('420113', '汉南区', '420100', '3');
INSERT INTO `tb_area` VALUES ('420821', '京山县', '420800', '3');
INSERT INTO `tb_area` VALUES ('330206', '北仑区', '330200', '3');
INSERT INTO `tb_area` VALUES ('520325', '道真仡佬族苗族自治县', '520300', '3');
INSERT INTO `tb_area` VALUES ('350628', '平和县', '350600', '3');
INSERT INTO `tb_area` VALUES ('340523', '和县', '340500', '3');
INSERT INTO `tb_area` VALUES ('410721', '新乡县', '410700', '3');
INSERT INTO `tb_area` VALUES ('360424', '修水县', '360400', '3');
INSERT INTO `tb_area` VALUES ('410501', '市辖区', '410500', '3');
INSERT INTO `tb_area` VALUES ('445303', '云安区', '445300', '3');
INSERT INTO `tb_area` VALUES ('441226', '德庆县', '441200', '3');
INSERT INTO `tb_area` VALUES ('522635', '麻江县', '522600', '3');
INSERT INTO `tb_area` VALUES ('370613', '莱山区', '370600', '3');
INSERT INTO `tb_area` VALUES ('350625', '长泰县', '350600', '3');
INSERT INTO `tb_area` VALUES ('510183', '邛崃市', '510100', '3');
INSERT INTO `tb_area` VALUES ('420600', '襄阳市', '420000', '2');
INSERT INTO `tb_area` VALUES ('131182', '深州市', '131100', '3');
INSERT INTO `tb_area` VALUES ('530901', '市辖区', '530900', '3');
INSERT INTO `tb_area` VALUES ('441303', '惠阳区', '441300', '3');
INSERT INTO `tb_area` VALUES ('330781', '兰溪市', '330700', '3');
INSERT INTO `tb_area` VALUES ('420982', '安陆市', '420900', '3');
INSERT INTO `tb_area` VALUES ('410523', '汤阴县', '410500', '3');
INSERT INTO `tb_area` VALUES ('420700', '鄂州市', '420000', '2');
INSERT INTO `tb_area` VALUES ('441203', '鼎湖区', '441200', '3');
INSERT INTO `tb_area` VALUES ('431200', '怀化市', '430000', '2');
INSERT INTO `tb_area` VALUES ('533301', '泸水市', '533300', '3');
INSERT INTO `tb_area` VALUES ('520425', '紫云苗族布依族自治县', '520400', '3');
INSERT INTO `tb_area` VALUES ('441803', '清新区', '441800', '3');
INSERT INTO `tb_area` VALUES ('511603', '前锋区', '511600', '3');
INSERT INTO `tb_area` VALUES ('341126', '凤阳县', '341100', '3');
INSERT INTO `tb_area` VALUES ('430922', '桃江县', '430900', '3');
INSERT INTO `tb_area` VALUES ('610427', '彬县', '610400', '3');
INSERT INTO `tb_area` VALUES ('341124', '全椒县', '341100', '3');
INSERT INTO `tb_area` VALUES ('621027', '镇原县', '621000', '3');
INSERT INTO `tb_area` VALUES ('150725', '陈巴尔虎旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('330111', '富阳区', '330100', '3');
INSERT INTO `tb_area` VALUES ('450124', '马山县', '450100', '3');
INSERT INTO `tb_area` VALUES ('430822', '桑植县', '430800', '3');
INSERT INTO `tb_area` VALUES ('411201', '市辖区', '411200', '3');
INSERT INTO `tb_area` VALUES ('350322', '仙游县', '350300', '3');
INSERT INTO `tb_area` VALUES ('410726', '延津县', '410700', '3');
INSERT INTO `tb_area` VALUES ('310000', '上海市', '0', '1');
INSERT INTO `tb_area` VALUES ('530927', '沧源佤族自治县', '530900', '3');
INSERT INTO `tb_area` VALUES ('140727', '祁县', '140700', '3');
INSERT INTO `tb_area` VALUES ('410204', '鼓楼区', '410200', '3');
INSERT INTO `tb_area` VALUES ('231224', '庆安县', '231200', '3');
INSERT INTO `tb_area` VALUES ('130432', '广平县', '130400', '3');
INSERT INTO `tb_area` VALUES ('210214', '普兰店区', '210200', '3');
INSERT INTO `tb_area` VALUES ('540236', '萨嘎县', '540200', '3');
INSERT INTO `tb_area` VALUES ('141029', '乡宁县', '141000', '3');
INSERT INTO `tb_area` VALUES ('130503', '桥西区', '130500', '3');
INSERT INTO `tb_area` VALUES ('653224', '洛浦县', '653200', '3');
INSERT INTO `tb_area` VALUES ('370301', '市辖区', '370300', '3');
INSERT INTO `tb_area` VALUES ('622922', '康乐县', '622900', '3');
INSERT INTO `tb_area` VALUES ('522326', '望谟县', '522300', '3');
INSERT INTO `tb_area` VALUES ('511503', '南溪区', '511500', '3');
INSERT INTO `tb_area` VALUES ('513429', '布拖县', '513400', '3');
INSERT INTO `tb_area` VALUES ('540232', '仲巴县', '540200', '3');
INSERT INTO `tb_area` VALUES ('130902', '新华区', '130900', '3');
INSERT INTO `tb_area` VALUES ('360622', '余江县', '360600', '3');
INSERT INTO `tb_area` VALUES ('371401', '市辖区', '371400', '3');
INSERT INTO `tb_area` VALUES ('370686', '栖霞市', '370600', '3');
INSERT INTO `tb_area` VALUES ('522630', '台江县', '522600', '3');
INSERT INTO `tb_area` VALUES ('542423', '比如县', '542400', '3');
INSERT INTO `tb_area` VALUES ('350782', '武夷山市', '350700', '3');
INSERT INTO `tb_area` VALUES ('511303', '高坪区', '511300', '3');
INSERT INTO `tb_area` VALUES ('150802', '临河区', '150800', '3');
INSERT INTO `tb_area` VALUES ('610627', '甘泉县', '610600', '3');
INSERT INTO `tb_area` VALUES ('520121', '开阳县', '520100', '3');
INSERT INTO `tb_area` VALUES ('451201', '市辖区', '451200', '3');
INSERT INTO `tb_area` VALUES ('522324', '晴隆县', '522300', '3');
INSERT INTO `tb_area` VALUES ('361101', '市辖区', '361100', '3');
INSERT INTO `tb_area` VALUES ('431021', '桂阳县', '431000', '3');
INSERT INTO `tb_area` VALUES ('140700', '晋中市', '140000', '2');
INSERT INTO `tb_area` VALUES ('130801', '市辖区', '130800', '3');
INSERT INTO `tb_area` VALUES ('350123', '罗源县', '350100', '3');
INSERT INTO `tb_area` VALUES ('371428', '武城县', '371400', '3');
INSERT INTO `tb_area` VALUES ('410727', '封丘县', '410700', '3');
INSERT INTO `tb_area` VALUES ('310115', '浦东新区', '310100', '3');
INSERT INTO `tb_area` VALUES ('130725', '尚义县', '130700', '3');
INSERT INTO `tb_area` VALUES ('441204', '高要区', '441200', '3');
INSERT INTO `tb_area` VALUES ('511822', '荥经县', '511800', '3');
INSERT INTO `tb_area` VALUES ('320382', '邳州市', '320300', '3');
INSERT INTO `tb_area` VALUES ('530824', '景谷傣族彝族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('411300', '南阳市', '410000', '2');
INSERT INTO `tb_area` VALUES ('230407', '兴山区', '230400', '3');
INSERT INTO `tb_area` VALUES ('522629', '剑河县', '522600', '3');
INSERT INTO `tb_area` VALUES ('210701', '市辖区', '210700', '3');
INSERT INTO `tb_area` VALUES ('530325', '富源县', '530300', '3');
INSERT INTO `tb_area` VALUES ('370112', '历城区', '370100', '3');
INSERT INTO `tb_area` VALUES ('360403', '浔阳区', '360400', '3');
INSERT INTO `tb_area` VALUES ('360482', '共青城市', '360400', '3');
INSERT INTO `tb_area` VALUES ('150526', '扎鲁特旗', '150500', '3');
INSERT INTO `tb_area` VALUES ('211421', '绥中县', '211400', '3');
INSERT INTO `tb_area` VALUES ('222401', '延吉市', '222400', '3');
INSERT INTO `tb_area` VALUES ('341500', '六安市', '340000', '2');
INSERT INTO `tb_area` VALUES ('140212', '新荣区', '140200', '3');
INSERT INTO `tb_area` VALUES ('370302', '淄川区', '370300', '3');
INSERT INTO `tb_area` VALUES ('360724', '上犹县', '360700', '3');
INSERT INTO `tb_area` VALUES ('220602', '浑江区', '220600', '3');
INSERT INTO `tb_area` VALUES ('330101', '市辖区', '330100', '3');
INSERT INTO `tb_area` VALUES ('511521', '宜宾县', '511500', '3');
INSERT INTO `tb_area` VALUES ('360830', '永新县', '360800', '3');
INSERT INTO `tb_area` VALUES ('350700', '南平市', '350000', '2');
INSERT INTO `tb_area` VALUES ('411282', '灵宝市', '411200', '3');
INSERT INTO `tb_area` VALUES ('210212', '旅顺口区', '210200', '3');
INSERT INTO `tb_area` VALUES ('231085', '穆棱市', '231000', '3');
INSERT INTO `tb_area` VALUES ('511126', '夹江县', '511100', '3');
INSERT INTO `tb_area` VALUES ('440304', '福田区', '440300', '3');
INSERT INTO `tb_area` VALUES ('610300', '宝鸡市', '610000', '2');
INSERT INTO `tb_area` VALUES ('653001', '阿图什市', '653000', '3');
INSERT INTO `tb_area` VALUES ('450481', '岑溪市', '450400', '3');
INSERT INTO `tb_area` VALUES ('650104', '新市区', '650100', '3');
INSERT INTO `tb_area` VALUES ('610329', '麟游县', '610300', '3');
INSERT INTO `tb_area` VALUES ('654224', '托里县', '654200', '3');
INSERT INTO `tb_area` VALUES ('420115', '江夏区', '420100', '3');
INSERT INTO `tb_area` VALUES ('230703', '南岔区', '230700', '3');
INSERT INTO `tb_area` VALUES ('450321', '阳朔县', '450300', '3');
INSERT INTO `tb_area` VALUES ('330481', '海宁市', '330400', '3');
INSERT INTO `tb_area` VALUES ('131101', '市辖区', '131100', '3');
INSERT INTO `tb_area` VALUES ('350526', '德化县', '350500', '3');
INSERT INTO `tb_area` VALUES ('451021', '田阳县', '451000', '3');
INSERT INTO `tb_area` VALUES ('430203', '芦淞区', '430200', '3');
INSERT INTO `tb_area` VALUES ('341226', '颍上县', '341200', '3');
INSERT INTO `tb_area` VALUES ('140801', '市辖区', '140800', '3');
INSERT INTO `tb_area` VALUES ('610528', '富平县', '610500', '3');
INSERT INTO `tb_area` VALUES ('450110', '武鸣区', '450100', '3');
INSERT INTO `tb_area` VALUES ('230301', '市辖区', '230300', '3');
INSERT INTO `tb_area` VALUES ('130111', '栾城区', '130100', '3');
INSERT INTO `tb_area` VALUES ('320601', '市辖区', '320600', '3');
INSERT INTO `tb_area` VALUES ('350725', '政和县', '350700', '3');
INSERT INTO `tb_area` VALUES ('511723', '开江县', '511700', '3');
INSERT INTO `tb_area` VALUES ('620402', '白银区', '620400', '3');
INSERT INTO `tb_area` VALUES ('150205', '石拐区', '150200', '3');
INSERT INTO `tb_area` VALUES ('150105', '赛罕区', '150100', '3');
INSERT INTO `tb_area` VALUES ('632622', '班玛县', '632600', '3');
INSERT INTO `tb_area` VALUES ('610111', '灞桥区', '610100', '3');
INSERT INTO `tb_area` VALUES ('510726', '北川羌族自治县', '510700', '3');
INSERT INTO `tb_area` VALUES ('231081', '绥芬河市', '231000', '3');
INSERT INTO `tb_area` VALUES ('469000', '省直辖县级行政区划', '460000', '2');
INSERT INTO `tb_area` VALUES ('520327', '凤冈县', '520300', '3');
INSERT INTO `tb_area` VALUES ('360300', '萍乡市', '360000', '2');
INSERT INTO `tb_area` VALUES ('341182', '明光市', '341100', '3');
INSERT INTO `tb_area` VALUES ('652928', '阿瓦提县', '652900', '3');
INSERT INTO `tb_area` VALUES ('610500', '渭南市', '610000', '2');
INSERT INTO `tb_area` VALUES ('511725', '渠县', '511700', '3');
INSERT INTO `tb_area` VALUES ('610924', '紫阳县', '610900', '3');
INSERT INTO `tb_area` VALUES ('211201', '市辖区', '211200', '3');
INSERT INTO `tb_area` VALUES ('320800', '淮安市', '320000', '2');
INSERT INTO `tb_area` VALUES ('370685', '招远市', '370600', '3');
INSERT INTO `tb_area` VALUES ('140101', '市辖区', '140100', '3');
INSERT INTO `tb_area` VALUES ('530300', '曲靖市', '530000', '2');
INSERT INTO `tb_area` VALUES ('411224', '卢氏县', '411200', '3');
INSERT INTO `tb_area` VALUES ('640425', '彭阳县', '640400', '3');
INSERT INTO `tb_area` VALUES ('513435', '甘洛县', '513400', '3');
INSERT INTO `tb_area` VALUES ('360802', '吉州区', '360800', '3');
INSERT INTO `tb_area` VALUES ('130321', '青龙满族自治县', '130300', '3');
INSERT INTO `tb_area` VALUES ('230522', '友谊县', '230500', '3');
INSERT INTO `tb_area` VALUES ('371723', '成武县', '371700', '3');
INSERT INTO `tb_area` VALUES ('350402', '梅列区', '350400', '3');
INSERT INTO `tb_area` VALUES ('410821', '修武县', '410800', '3');
INSERT INTO `tb_area` VALUES ('371525', '冠县', '371500', '3');
INSERT INTO `tb_area` VALUES ('230901', '市辖区', '230900', '3');
INSERT INTO `tb_area` VALUES ('532501', '个旧市', '532500', '3');
INSERT INTO `tb_area` VALUES ('429021', '神农架林区', '429000', '3');
INSERT INTO `tb_area` VALUES ('420607', '襄州区', '420600', '3');
INSERT INTO `tb_area` VALUES ('652900', '阿克苏地区', '650000', '2');
INSERT INTO `tb_area` VALUES ('640303', '红寺堡区', '640300', '3');
INSERT INTO `tb_area` VALUES ('360731', '于都县', '360700', '3');
INSERT INTO `tb_area` VALUES ('140800', '运城市', '140000', '2');
INSERT INTO `tb_area` VALUES ('130601', '市辖区', '130600', '3');
INSERT INTO `tb_area` VALUES ('350702', '延平区', '350700', '3');
INSERT INTO `tb_area` VALUES ('610502', '临渭区', '610500', '3');
INSERT INTO `tb_area` VALUES ('211021', '辽阳县', '211000', '3');
INSERT INTO `tb_area` VALUES ('469025', '白沙黎族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('141121', '文水县', '141100', '3');
INSERT INTO `tb_area` VALUES ('330624', '新昌县', '330600', '3');
INSERT INTO `tb_area` VALUES ('350205', '海沧区', '350200', '3');
INSERT INTO `tb_area` VALUES ('320723', '灌云县', '320700', '3');
INSERT INTO `tb_area` VALUES ('411002', '魏都区', '411000', '3');
INSERT INTO `tb_area` VALUES ('340111', '包河区', '340100', '3');
INSERT INTO `tb_area` VALUES ('522633', '从江县', '522600', '3');
INSERT INTO `tb_area` VALUES ('810000', '香港特别行政区', '0', '1');
INSERT INTO `tb_area` VALUES ('431382', '涟源市', '431300', '3');
INSERT INTO `tb_area` VALUES ('500107', '九龙坡区', '500100', '3');
INSERT INTO `tb_area` VALUES ('440507', '龙湖区', '440500', '3');
INSERT INTO `tb_area` VALUES ('530128', '禄劝彝族苗族自治县', '530100', '3');
INSERT INTO `tb_area` VALUES ('532626', '丘北县', '532600', '3');
INSERT INTO `tb_area` VALUES ('540229', '仁布县', '540200', '3');
INSERT INTO `tb_area` VALUES ('430223', '攸县', '430200', '3');
INSERT INTO `tb_area` VALUES ('640424', '泾源县', '640400', '3');
INSERT INTO `tb_area` VALUES ('130125', '行唐县', '130100', '3');
INSERT INTO `tb_area` VALUES ('632525', '贵南县', '632500', '3');
INSERT INTO `tb_area` VALUES ('320201', '市辖区', '320200', '3');
INSERT INTO `tb_area` VALUES ('411330', '桐柏县', '411300', '3');
INSERT INTO `tb_area` VALUES ('430821', '慈利县', '430800', '3');
INSERT INTO `tb_area` VALUES ('320281', '江阴市', '320200', '3');
INSERT INTO `tb_area` VALUES ('513336', '乡城县', '513300', '3');
INSERT INTO `tb_area` VALUES ('140524', '陵川县', '140500', '3');
INSERT INTO `tb_area` VALUES ('610728', '镇巴县', '610700', '3');
INSERT INTO `tb_area` VALUES ('654325', '青河县', '654300', '3');
INSERT INTO `tb_area` VALUES ('410105', '金水区', '410100', '3');
INSERT INTO `tb_area` VALUES ('350521', '惠安县', '350500', '3');
INSERT INTO `tb_area` VALUES ('410103', '二七区', '410100', '3');
INSERT INTO `tb_area` VALUES ('341524', '金寨县', '341500', '3');
INSERT INTO `tb_area` VALUES ('360726', '安远县', '360700', '3');
INSERT INTO `tb_area` VALUES ('130804', '鹰手营子矿区', '130800', '3');
INSERT INTO `tb_area` VALUES ('540225', '拉孜县', '540200', '3');
INSERT INTO `tb_area` VALUES ('370211', '黄岛区', '370200', '3');
INSERT INTO `tb_area` VALUES ('341723', '青阳县', '341700', '3');
INSERT INTO `tb_area` VALUES ('360681', '贵溪市', '360600', '3');
INSERT INTO `tb_area` VALUES ('451122', '钟山县', '451100', '3');
INSERT INTO `tb_area` VALUES ('513225', '九寨沟县', '513200', '3');
INSERT INTO `tb_area` VALUES ('150625', '杭锦旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('340600', '淮北市', '340000', '2');
INSERT INTO `tb_area` VALUES ('310114', '嘉定区', '310100', '3');
INSERT INTO `tb_area` VALUES ('330824', '开化县', '330800', '3');
INSERT INTO `tb_area` VALUES ('522725', '瓮安县', '522700', '3');
INSERT INTO `tb_area` VALUES ('430981', '沅江市', '430900', '3');
INSERT INTO `tb_area` VALUES ('522722', '荔波县', '522700', '3');
INSERT INTO `tb_area` VALUES ('430802', '永定区', '430800', '3');
INSERT INTO `tb_area` VALUES ('410482', '汝州市', '410400', '3');
INSERT INTO `tb_area` VALUES ('230227', '富裕县', '230200', '3');
INSERT INTO `tb_area` VALUES ('110100', '北京市', '110000', '2');
INSERT INTO `tb_area` VALUES ('371100', '日照市', '370000', '2');
INSERT INTO `tb_area` VALUES ('411426', '夏邑县', '411400', '3');
INSERT INTO `tb_area` VALUES ('370702', '潍城区', '370700', '3');
INSERT INTO `tb_area` VALUES ('440783', '开平市', '440700', '3');
INSERT INTO `tb_area` VALUES ('540530', '错那县', '540500', '3');
INSERT INTO `tb_area` VALUES ('420922', '大悟县', '420900', '3');
INSERT INTO `tb_area` VALUES ('230803', '向阳区', '230800', '3');
INSERT INTO `tb_area` VALUES ('511112', '五通桥区', '511100', '3');
INSERT INTO `tb_area` VALUES ('371423', '庆云县', '371400', '3');
INSERT INTO `tb_area` VALUES ('220323', '伊通满族自治县', '220300', '3');
INSERT INTO `tb_area` VALUES ('532328', '元谋县', '532300', '3');
INSERT INTO `tb_area` VALUES ('469027', '乐东黎族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('150927', '察哈尔右翼中旗', '150900', '3');
INSERT INTO `tb_area` VALUES ('140224', '灵丘县', '140200', '3');
INSERT INTO `tb_area` VALUES ('210922', '彰武县', '210900', '3');
INSERT INTO `tb_area` VALUES ('621123', '渭源县', '621100', '3');
INSERT INTO `tb_area` VALUES ('445302', '云城区', '445300', '3');
INSERT INTO `tb_area` VALUES ('451402', '江州区', '451400', '3');
INSERT INTO `tb_area` VALUES ('451228', '都安瑶族自治县', '451200', '3');
INSERT INTO `tb_area` VALUES ('421100', '黄冈市', '420000', '2');
INSERT INTO `tb_area` VALUES ('520326', '务川仡佬族苗族自治县', '520300', '3');
INSERT INTO `tb_area` VALUES ('130529', '巨鹿县', '130500', '3');
INSERT INTO `tb_area` VALUES ('341225', '阜南县', '341200', '3');
INSERT INTO `tb_area` VALUES ('370104', '槐荫区', '370100', '3');
INSERT INTO `tb_area` VALUES ('431121', '祁阳县', '431100', '3');
INSERT INTO `tb_area` VALUES ('510903', '船山区', '510900', '3');
INSERT INTO `tb_area` VALUES ('360302', '安源区', '360300', '3');
INSERT INTO `tb_area` VALUES ('210204', '沙河口区', '210200', '3');
INSERT INTO `tb_area` VALUES ('330502', '吴兴区', '330500', '3');
INSERT INTO `tb_area` VALUES ('653024', '乌恰县', '653000', '3');
INSERT INTO `tb_area` VALUES ('620111', '红古区', '620100', '3');
INSERT INTO `tb_area` VALUES ('441225', '封开县', '441200', '3');
INSERT INTO `tb_area` VALUES ('220112', '双阳区', '220100', '3');
INSERT INTO `tb_area` VALUES ('513425', '会理县', '513400', '3');
INSERT INTO `tb_area` VALUES ('652723', '温泉县', '652700', '3');
INSERT INTO `tb_area` VALUES ('431300', '娄底市', '430000', '2');
INSERT INTO `tb_area` VALUES ('130681', '涿州市', '130600', '3');
INSERT INTO `tb_area` VALUES ('330681', '诸暨市', '330600', '3');
INSERT INTO `tb_area` VALUES ('320585', '太仓市', '320500', '3');
INSERT INTO `tb_area` VALUES ('130402', '邯山区', '130400', '3');
INSERT INTO `tb_area` VALUES ('640101', '市辖区', '640100', '3');
INSERT INTO `tb_area` VALUES ('350103', '台江区', '350100', '3');
INSERT INTO `tb_area` VALUES ('330000', '浙江省', '0', '1');
INSERT INTO `tb_area` VALUES ('621200', '陇南市', '620000', '2');
INSERT INTO `tb_area` VALUES ('421381', '广水市', '421300', '3');
INSERT INTO `tb_area` VALUES ('350825', '连城县', '350800', '3');
INSERT INTO `tb_area` VALUES ('130722', '张北县', '130700', '3');
INSERT INTO `tb_area` VALUES ('460108', '美兰区', '460100', '3');
INSERT INTO `tb_area` VALUES ('370826', '微山县', '370800', '3');
INSERT INTO `tb_area` VALUES ('500232', '武隆县', '500200', '3');
INSERT INTO `tb_area` VALUES ('350803', '永定区', '350800', '3');
INSERT INTO `tb_area` VALUES ('510402', '东区', '510400', '3');
INSERT INTO `tb_area` VALUES ('360500', '新余市', '360000', '2');
INSERT INTO `tb_area` VALUES ('370126', '商河县', '370100', '3');
INSERT INTO `tb_area` VALUES ('510101', '市辖区', '510100', '3');
INSERT INTO `tb_area` VALUES ('511902', '巴州区', '511900', '3');
INSERT INTO `tb_area` VALUES ('654003', '奎屯市', '654000', '3');
INSERT INTO `tb_area` VALUES ('430421', '衡阳县', '430400', '3');
INSERT INTO `tb_area` VALUES ('431281', '洪江市', '431200', '3');
INSERT INTO `tb_area` VALUES ('130924', '海兴县', '130900', '3');
INSERT INTO `tb_area` VALUES ('450326', '永福县', '450300', '3');
INSERT INTO `tb_area` VALUES ('430422', '衡南县', '430400', '3');
INSERT INTO `tb_area` VALUES ('410601', '市辖区', '410600', '3');
INSERT INTO `tb_area` VALUES ('540527', '洛扎县', '540500', '3');
INSERT INTO `tb_area` VALUES ('321102', '京口区', '321100', '3');
INSERT INTO `tb_area` VALUES ('130803', '双滦区', '130800', '3');
INSERT INTO `tb_area` VALUES ('610726', '宁强县', '610700', '3');
INSERT INTO `tb_area` VALUES ('150782', '牙克石市', '150700', '3');
INSERT INTO `tb_area` VALUES ('430412', '南岳区', '430400', '3');
INSERT INTO `tb_area` VALUES ('211103', '兴隆台区', '211100', '3');
INSERT INTO `tb_area` VALUES ('441201', '市辖区', '441200', '3');
INSERT INTO `tb_area` VALUES ('420583', '枝江市', '420500', '3');
INSERT INTO `tb_area` VALUES ('341525', '霍山县', '341500', '3');
INSERT INTO `tb_area` VALUES ('350500', '泉州市', '350000', '2');
INSERT INTO `tb_area` VALUES ('540500', '山南市', '540000', '2');
INSERT INTO `tb_area` VALUES ('130928', '吴桥县', '130900', '3');
INSERT INTO `tb_area` VALUES ('510124', '郫县', '510100', '3');
INSERT INTO `tb_area` VALUES ('460101', '市辖区', '460100', '3');
INSERT INTO `tb_area` VALUES ('542522', '札达县', '542500', '3');
INSERT INTO `tb_area` VALUES ('370612', '牟平区', '370600', '3');
INSERT INTO `tb_area` VALUES ('420923', '云梦县', '420900', '3');
INSERT INTO `tb_area` VALUES ('411500', '信阳市', '410000', '2');
INSERT INTO `tb_area` VALUES ('320105', '建邺区', '320100', '3');
INSERT INTO `tb_area` VALUES ('430301', '市辖区', '430300', '3');
INSERT INTO `tb_area` VALUES ('131000', '廊坊市', '130000', '2');
INSERT INTO `tb_area` VALUES ('141024', '洪洞县', '141000', '3');
INSERT INTO `tb_area` VALUES ('110111', '房山区', '110100', '3');
INSERT INTO `tb_area` VALUES ('610526', '蒲城县', '610500', '3');
INSERT INTO `tb_area` VALUES ('532924', '宾川县', '532900', '3');
INSERT INTO `tb_area` VALUES ('632821', '乌兰县', '632800', '3');
INSERT INTO `tb_area` VALUES ('623026', '碌曲县', '623000', '3');
INSERT INTO `tb_area` VALUES ('341004', '徽州区', '341000', '3');
INSERT INTO `tb_area` VALUES ('440981', '高州市', '440900', '3');
INSERT INTO `tb_area` VALUES ('620924', '阿克塞哈萨克族自治县', '620900', '3');
INSERT INTO `tb_area` VALUES ('511102', '市中区', '511100', '3');
INSERT INTO `tb_area` VALUES ('654322', '富蕴县', '654300', '3');
INSERT INTO `tb_area` VALUES ('210203', '西岗区', '210200', '3');
INSERT INTO `tb_area` VALUES ('330102', '上城区', '330100', '3');
INSERT INTO `tb_area` VALUES ('230401', '市辖区', '230400', '3');
INSERT INTO `tb_area` VALUES ('370600', '烟台市', '370000', '2');
INSERT INTO `tb_area` VALUES ('321311', '宿豫区', '321300', '3');
INSERT INTO `tb_area` VALUES ('361123', '玉山县', '361100', '3');
INSERT INTO `tb_area` VALUES ('430528', '新宁县', '430500', '3');
INSERT INTO `tb_area` VALUES ('469005', '文昌市', '469000', '3');
INSERT INTO `tb_area` VALUES ('321023', '宝应县', '321000', '3');
INSERT INTO `tb_area` VALUES ('450601', '市辖区', '450600', '3');
INSERT INTO `tb_area` VALUES ('520601', '市辖区', '520600', '3');
INSERT INTO `tb_area` VALUES ('130922', '青县', '130900', '3');
INSERT INTO `tb_area` VALUES ('410901', '市辖区', '410900', '3');
INSERT INTO `tb_area` VALUES ('421024', '江陵县', '421000', '3');
INSERT INTO `tb_area` VALUES ('511800', '雅安市', '510000', '2');
INSERT INTO `tb_area` VALUES ('610803', '横山区', '610800', '3');
INSERT INTO `tb_area` VALUES ('370827', '鱼台县', '370800', '3');
INSERT INTO `tb_area` VALUES ('310100', '上海市', '310000', '2');
INSERT INTO `tb_area` VALUES ('513326', '道孚县', '513300', '3');
INSERT INTO `tb_area` VALUES ('140107', '杏花岭区', '140100', '3');
INSERT INTO `tb_area` VALUES ('500110', '綦江区', '500100', '3');
INSERT INTO `tb_area` VALUES ('460100', '海口市', '460000', '2');
INSERT INTO `tb_area` VALUES ('450303', '叠彩区', '450300', '3');
INSERT INTO `tb_area` VALUES ('610801', '市辖区', '610800', '3');
INSERT INTO `tb_area` VALUES ('360902', '袁州区', '360900', '3');
INSERT INTO `tb_area` VALUES ('520221', '水城县', '520200', '3');
INSERT INTO `tb_area` VALUES ('340321', '怀远县', '340300', '3');
INSERT INTO `tb_area` VALUES ('510421', '米易县', '510400', '3');
INSERT INTO `tb_area` VALUES ('130726', '蔚县', '130700', '3');
INSERT INTO `tb_area` VALUES ('440800', '湛江市', '440000', '2');
INSERT INTO `tb_area` VALUES ('140825', '新绛县', '140800', '3');
INSERT INTO `tb_area` VALUES ('321300', '宿迁市', '320000', '2');
INSERT INTO `tb_area` VALUES ('420203', '西塞山区', '420200', '3');
INSERT INTO `tb_area` VALUES ('510401', '市辖区', '510400', '3');
INSERT INTO `tb_area` VALUES ('230600', '大庆市', '230000', '2');
INSERT INTO `tb_area` VALUES ('623024', '迭部县', '623000', '3');
INSERT INTO `tb_area` VALUES ('450329', '资源县', '450300', '3');
INSERT INTO `tb_area` VALUES ('420117', '新洲区', '420100', '3');
INSERT INTO `tb_area` VALUES ('441502', '城区', '441500', '3');
INSERT INTO `tb_area` VALUES ('220113', '九台区', '220100', '3');
INSERT INTO `tb_area` VALUES ('632626', '玛多县', '632600', '3');
INSERT INTO `tb_area` VALUES ('410811', '山阳区', '410800', '3');
INSERT INTO `tb_area` VALUES ('652722', '精河县', '652700', '3');
INSERT INTO `tb_area` VALUES ('520625', '印江土家族苗族自治县', '520600', '3');
INSERT INTO `tb_area` VALUES ('440301', '市辖区', '440300', '3');
INSERT INTO `tb_area` VALUES ('640302', '利通区', '640300', '3');
INSERT INTO `tb_area` VALUES ('632726', '曲麻莱县', '632700', '3');
INSERT INTO `tb_area` VALUES ('220881', '洮南市', '220800', '3');
INSERT INTO `tb_area` VALUES ('370687', '海阳市', '370600', '3');
INSERT INTO `tb_area` VALUES ('500241', '秀山土家族苗族自治县', '500200', '3');
INSERT INTO `tb_area` VALUES ('440802', '赤坎区', '440800', '3');
INSERT INTO `tb_area` VALUES ('310107', '普陀区', '310100', '3');
INSERT INTO `tb_area` VALUES ('211401', '市辖区', '211400', '3');
INSERT INTO `tb_area` VALUES ('140223', '广灵县', '140200', '3');
INSERT INTO `tb_area` VALUES ('441622', '龙川县', '441600', '3');
INSERT INTO `tb_area` VALUES ('520300', '遵义市', '520000', '2');
INSERT INTO `tb_area` VALUES ('371202', '莱城区', '371200', '3');
INSERT INTO `tb_area` VALUES ('450300', '桂林市', '450000', '2');
INSERT INTO `tb_area` VALUES ('522729', '长顺县', '522700', '3');
INSERT INTO `tb_area` VALUES ('540501', '市辖区', '540500', '3');
INSERT INTO `tb_area` VALUES ('421124', '英山县', '421100', '3');
INSERT INTO `tb_area` VALUES ('511825', '天全县', '511800', '3');
INSERT INTO `tb_area` VALUES ('371702', '牡丹区', '371700', '3');
INSERT INTO `tb_area` VALUES ('231282', '肇东市', '231200', '3');
INSERT INTO `tb_area` VALUES ('650103', '沙依巴克区', '650100', '3');
INSERT INTO `tb_area` VALUES ('231004', '爱民区', '231000', '3');
INSERT INTO `tb_area` VALUES ('540231', '定结县', '540200', '3');
INSERT INTO `tb_area` VALUES ('533422', '德钦县', '533400', '3');
INSERT INTO `tb_area` VALUES ('411302', '宛城区', '411300', '3');
INSERT INTO `tb_area` VALUES ('431225', '会同县', '431200', '3');
INSERT INTO `tb_area` VALUES ('340222', '繁昌县', '340200', '3');
INSERT INTO `tb_area` VALUES ('500104', '大渡口区', '500100', '3');
INSERT INTO `tb_area` VALUES ('610328', '千阳县', '610300', '3');
INSERT INTO `tb_area` VALUES ('220601', '市辖区', '220600', '3');
INSERT INTO `tb_area` VALUES ('410724', '获嘉县', '410700', '3');
INSERT INTO `tb_area` VALUES ('410502', '文峰区', '410500', '3');
INSERT INTO `tb_area` VALUES ('370830', '汶上县', '370800', '3');
INSERT INTO `tb_area` VALUES ('341321', '砀山县', '341300', '3');
INSERT INTO `tb_area` VALUES ('530400', '玉溪市', '530000', '2');
INSERT INTO `tb_area` VALUES ('370400', '枣庄市', '370000', '2');
INSERT INTO `tb_area` VALUES ('420601', '市辖区', '420600', '3');
INSERT INTO `tb_area` VALUES ('640402', '原州区', '640400', '3');
INSERT INTO `tb_area` VALUES ('411625', '郸城县', '411600', '3');
INSERT INTO `tb_area` VALUES ('152501', '二连浩特市', '152500', '3');
INSERT INTO `tb_area` VALUES ('510129', '大邑县', '510100', '3');
INSERT INTO `tb_area` VALUES ('370181', '章丘市', '370100', '3');
INSERT INTO `tb_area` VALUES ('430121', '长沙县', '430100', '3');
INSERT INTO `tb_area` VALUES ('450903', '福绵区', '450900', '3');
INSERT INTO `tb_area` VALUES ('441600', '河源市', '440000', '2');
INSERT INTO `tb_area` VALUES ('210901', '市辖区', '210900', '3');
INSERT INTO `tb_area` VALUES ('220221', '永吉县', '220200', '3');
INSERT INTO `tb_area` VALUES ('530114', '呈贡区', '530100', '3');
INSERT INTO `tb_area` VALUES ('511724', '大竹县', '511700', '3');
INSERT INTO `tb_area` VALUES ('440103', '荔湾区', '440100', '3');
INSERT INTO `tb_area` VALUES ('330302', '鹿城区', '330300', '3');
INSERT INTO `tb_area` VALUES ('210902', '海州区', '210900', '3');
INSERT INTO `tb_area` VALUES ('371426', '平原县', '371400', '3');
INSERT INTO `tb_area` VALUES ('230902', '新兴区', '230900', '3');
INSERT INTO `tb_area` VALUES ('130522', '临城县', '130500', '3');
INSERT INTO `tb_area` VALUES ('370214', '城阳区', '370200', '3');
INSERT INTO `tb_area` VALUES ('361100', '上饶市', '360000', '2');
INSERT INTO `tb_area` VALUES ('522627', '天柱县', '522600', '3');
INSERT INTO `tb_area` VALUES ('130101', '市辖区', '130100', '3');
INSERT INTO `tb_area` VALUES ('140581', '高平市', '140500', '3');
INSERT INTO `tb_area` VALUES ('140202', '城区', '140200', '3');
INSERT INTO `tb_area` VALUES ('411623', '商水县', '411600', '3');
INSERT INTO `tb_area` VALUES ('445281', '普宁市', '445200', '3');
INSERT INTO `tb_area` VALUES ('652923', '库车县', '652900', '3');
INSERT INTO `tb_area` VALUES ('330301', '市辖区', '330300', '3');
INSERT INTO `tb_area` VALUES ('429000', '省直辖县级行政区划', '420000', '2');
INSERT INTO `tb_area` VALUES ('410522', '安阳县', '410500', '3');
INSERT INTO `tb_area` VALUES ('511681', '华蓥市', '511600', '3');
INSERT INTO `tb_area` VALUES ('513401', '西昌市', '513400', '3');
INSERT INTO `tb_area` VALUES ('430602', '岳阳楼区', '430600', '3');
INSERT INTO `tb_area` VALUES ('220521', '通化县', '220500', '3');
INSERT INTO `tb_area` VALUES ('451481', '凭祥市', '451400', '3');
INSERT INTO `tb_area` VALUES ('130637', '博野县', '130600', '3');
INSERT INTO `tb_area` VALUES ('350723', '光泽县', '350700', '3');
INSERT INTO `tb_area` VALUES ('659004', '五家渠市', '659000', '3');
INSERT INTO `tb_area` VALUES ('621001', '市辖区', '621000', '3');
INSERT INTO `tb_area` VALUES ('130433', '馆陶县', '130400', '3');
INSERT INTO `tb_area` VALUES ('450503', '银海区', '450500', '3');
INSERT INTO `tb_area` VALUES ('422800', '恩施土家族苗族自治州', '420000', '2');
INSERT INTO `tb_area` VALUES ('430781', '津市市', '430700', '3');
INSERT INTO `tb_area` VALUES ('320981', '东台市', '320900', '3');
INSERT INTO `tb_area` VALUES ('511622', '武胜县', '511600', '3');
INSERT INTO `tb_area` VALUES ('450126', '宾阳县', '450100', '3');
INSERT INTO `tb_area` VALUES ('370784', '安丘市', '370700', '3');
INSERT INTO `tb_area` VALUES ('370704', '坊子区', '370700', '3');
INSERT INTO `tb_area` VALUES ('510727', '平武县', '510700', '3');
INSERT INTO `tb_area` VALUES ('430903', '赫山区', '430900', '3');
INSERT INTO `tb_area` VALUES ('130123', '正定县', '130100', '3');
INSERT INTO `tb_area` VALUES ('520402', '西秀区', '520400', '3');
INSERT INTO `tb_area` VALUES ('340203', '弋江区', '340200', '3');
INSERT INTO `tb_area` VALUES ('630202', '乐都区', '630200', '3');
INSERT INTO `tb_area` VALUES ('522322', '兴仁县', '522300', '3');
INSERT INTO `tb_area` VALUES ('441700', '阳江市', '440000', '2');
INSERT INTO `tb_area` VALUES ('653124', '泽普县', '653100', '3');
INSERT INTO `tb_area` VALUES ('211000', '辽阳市', '210000', '2');
INSERT INTO `tb_area` VALUES ('513430', '金阳县', '513400', '3');
INSERT INTO `tb_area` VALUES ('120100', '天津市', '120000', '2');
INSERT INTO `tb_area` VALUES ('411702', '驿城区', '411700', '3');
INSERT INTO `tb_area` VALUES ('130184', '新乐市', '130100', '3');
INSERT INTO `tb_area` VALUES ('150603', '康巴什区', '150600', '3');
INSERT INTO `tb_area` VALUES ('513433', '冕宁县', '513400', '3');
INSERT INTO `tb_area` VALUES ('610114', '阎良区', '610100', '3');
INSERT INTO `tb_area` VALUES ('420111', '洪山区', '420100', '3');
INSERT INTO `tb_area` VALUES ('653226', '于田县', '653200', '3');
INSERT INTO `tb_area` VALUES ('140425', '平顺县', '140400', '3');
INSERT INTO `tb_area` VALUES ('371622', '阳信县', '371600', '3');
INSERT INTO `tb_area` VALUES ('331101', '市辖区', '331100', '3');
INSERT INTO `tb_area` VALUES ('500108', '南岸区', '500100', '3');
INSERT INTO `tb_area` VALUES ('520623', '石阡县', '520600', '3');
INSERT INTO `tb_area` VALUES ('370401', '市辖区', '370400', '3');
INSERT INTO `tb_area` VALUES ('231281', '安达市', '231200', '3');
INSERT INTO `tb_area` VALUES ('429004', '仙桃市', '429000', '3');
INSERT INTO `tb_area` VALUES ('440600', '佛山市', '440000', '2');
INSERT INTO `tb_area` VALUES ('130607', '满城区', '130600', '3');
INSERT INTO `tb_area` VALUES ('320722', '东海县', '320700', '3');
INSERT INTO `tb_area` VALUES ('210112', '浑南区', '210100', '3');
INSERT INTO `tb_area` VALUES ('430723', '澧县', '430700', '3');
INSERT INTO `tb_area` VALUES ('653101', '喀什市', '653100', '3');
INSERT INTO `tb_area` VALUES ('321112', '丹徒区', '321100', '3');
INSERT INTO `tb_area` VALUES ('411481', '永城市', '411400', '3');
INSERT INTO `tb_area` VALUES ('652927', '乌什县', '652900', '3');
INSERT INTO `tb_area` VALUES ('532503', '蒙自市', '532500', '3');
INSERT INTO `tb_area` VALUES ('450923', '博白县', '450900', '3');
INSERT INTO `tb_area` VALUES ('140900', '忻州市', '140000', '2');
INSERT INTO `tb_area` VALUES ('150521', '科尔沁左翼中旗', '150500', '3');
INSERT INTO `tb_area` VALUES ('320206', '惠山区', '320200', '3');
INSERT INTO `tb_area` VALUES ('361026', '宜黄县', '361000', '3');
INSERT INTO `tb_area` VALUES ('330212', '鄞州区', '330200', '3');
INSERT INTO `tb_area` VALUES ('540400', '林芝市', '540000', '2');
INSERT INTO `tb_area` VALUES ('321301', '市辖区', '321300', '3');
INSERT INTO `tb_area` VALUES ('220400', '辽源市', '220000', '2');
INSERT INTO `tb_area` VALUES ('511502', '翠屏区', '511500', '3');
INSERT INTO `tb_area` VALUES ('320826', '涟水县', '320800', '3');
INSERT INTO `tb_area` VALUES ('210323', '岫岩满族自治县', '210300', '3');
INSERT INTO `tb_area` VALUES ('621101', '市辖区', '621100', '3');
INSERT INTO `tb_area` VALUES ('430482', '常宁市', '430400', '3');
INSERT INTO `tb_area` VALUES ('330203', '海曙区', '330200', '3');
INSERT INTO `tb_area` VALUES ('632321', '同仁县', '632300', '3');
INSERT INTO `tb_area` VALUES ('420504', '点军区', '420500', '3');
INSERT INTO `tb_area` VALUES ('211202', '银州区', '211200', '3');
INSERT INTO `tb_area` VALUES ('420602', '襄城区', '420600', '3');
INSERT INTO `tb_area` VALUES ('622923', '永靖县', '622900', '3');
INSERT INTO `tb_area` VALUES ('152224', '突泉县', '152200', '3');
INSERT INTO `tb_area` VALUES ('430100', '长沙市', '430000', '2');
INSERT INTO `tb_area` VALUES ('321100', '镇江市', '320000', '2');
INSERT INTO `tb_area` VALUES ('230303', '恒山区', '230300', '3');
INSERT INTO `tb_area` VALUES ('513426', '会东县', '513400', '3');
INSERT INTO `tb_area` VALUES ('420500', '宜昌市', '420000', '2');
INSERT INTO `tb_area` VALUES ('632523', '贵德县', '632500', '3');
INSERT INTO `tb_area` VALUES ('371725', '郓城县', '371700', '3');
INSERT INTO `tb_area` VALUES ('623000', '甘南藏族自治州', '620000', '2');
INSERT INTO `tb_area` VALUES ('440811', '麻章区', '440800', '3');
INSERT INTO `tb_area` VALUES ('230103', '南岗区', '230100', '3');
INSERT INTO `tb_area` VALUES ('513423', '盐源县', '513400', '3');
INSERT INTO `tb_area` VALUES ('621126', '岷县', '621100', '3');
INSERT INTO `tb_area` VALUES ('620524', '武山县', '620500', '3');
INSERT INTO `tb_area` VALUES ('220202', '昌邑区', '220200', '3');
INSERT INTO `tb_area` VALUES ('511301', '市辖区', '511300', '3');
INSERT INTO `tb_area` VALUES ('361001', '市辖区', '361000', '3');
INSERT INTO `tb_area` VALUES ('533423', '维西傈僳族自治县', '533400', '3');
INSERT INTO `tb_area` VALUES ('340824', '潜山县', '340800', '3');
INSERT INTO `tb_area` VALUES ('350900', '宁德市', '350000', '2');
INSERT INTO `tb_area` VALUES ('361021', '南城县', '361000', '3');
INSERT INTO `tb_area` VALUES ('533122', '梁河县', '533100', '3');
INSERT INTO `tb_area` VALUES ('450602', '港口区', '450600', '3');
INSERT INTO `tb_area` VALUES ('320902', '亭湖区', '320900', '3');
INSERT INTO `tb_area` VALUES ('152531', '多伦县', '152500', '3');
INSERT INTO `tb_area` VALUES ('341823', '泾县', '341800', '3');
INSERT INTO `tb_area` VALUES ('130900', '沧州市', '130000', '2');
INSERT INTO `tb_area` VALUES ('220183', '德惠市', '220100', '3');
INSERT INTO `tb_area` VALUES ('522636', '丹寨县', '522600', '3');
INSERT INTO `tb_area` VALUES ('513334', '理塘县', '513300', '3');
INSERT INTO `tb_area` VALUES ('450512', '铁山港区', '450500', '3');
INSERT INTO `tb_area` VALUES ('510705', '安州区', '510700', '3');
INSERT INTO `tb_area` VALUES ('231283', '海伦市', '231200', '3');
INSERT INTO `tb_area` VALUES ('540524', '琼结县', '540500', '3');
INSERT INTO `tb_area` VALUES ('530427', '新平彝族傣族自治县', '530400', '3');
INSERT INTO `tb_area` VALUES ('361023', '南丰县', '361000', '3');
INSERT INTO `tb_area` VALUES ('120105', '河北区', '120100', '3');
INSERT INTO `tb_area` VALUES ('532931', '剑川县', '532900', '3');
INSERT INTO `tb_area` VALUES ('652929', '柯坪县', '652900', '3');
INSERT INTO `tb_area` VALUES ('430522', '新邵县', '430500', '3');
INSERT INTO `tb_area` VALUES ('410923', '南乐县', '410900', '3');
INSERT INTO `tb_area` VALUES ('520403', '平坝区', '520400', '3');
INSERT INTO `tb_area` VALUES ('230506', '宝山区', '230500', '3');
INSERT INTO `tb_area` VALUES ('610428', '长武县', '610400', '3');
INSERT INTO `tb_area` VALUES ('130102', '长安区', '130100', '3');
INSERT INTO `tb_area` VALUES ('231003', '阳明区', '231000', '3');
INSERT INTO `tb_area` VALUES ('431028', '安仁县', '431000', '3');
INSERT INTO `tb_area` VALUES ('532500', '红河哈尼族彝族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('152201', '乌兰浩特市', '152200', '3');
INSERT INTO `tb_area` VALUES ('530323', '师宗县', '530300', '3');
INSERT INTO `tb_area` VALUES ('610425', '礼泉县', '610400', '3');
INSERT INTO `tb_area` VALUES ('451202', '金城江区', '451200', '3');
INSERT INTO `tb_area` VALUES ('210804', '鲅鱼圈区', '210800', '3');
INSERT INTO `tb_area` VALUES ('130532', '平乡县', '130500', '3');
INSERT INTO `tb_area` VALUES ('411422', '睢县', '411400', '3');
INSERT INTO `tb_area` VALUES ('510116', '双流区', '510100', '3');
INSERT INTO `tb_area` VALUES ('130527', '南和县', '130500', '3');
INSERT INTO `tb_area` VALUES ('450101', '市辖区', '450100', '3');
INSERT INTO `tb_area` VALUES ('310105', '长宁区', '310100', '3');
INSERT INTO `tb_area` VALUES ('330226', '宁海县', '330200', '3');
INSERT INTO `tb_area` VALUES ('411528', '息县', '411500', '3');
INSERT INTO `tb_area` VALUES ('650107', '达坂城区', '650100', '3');
INSERT INTO `tb_area` VALUES ('350212', '同安区', '350200', '3');
INSERT INTO `tb_area` VALUES ('140227', '大同县', '140200', '3');
INSERT INTO `tb_area` VALUES ('330900', '舟山市', '330000', '2');
INSERT INTO `tb_area` VALUES ('610122', '蓝田县', '610100', '3');
INSERT INTO `tb_area` VALUES ('430527', '绥宁县', '430500', '3');
INSERT INTO `tb_area` VALUES ('140303', '矿区', '140300', '3');
INSERT INTO `tb_area` VALUES ('431321', '双峰县', '431300', '3');
INSERT INTO `tb_area` VALUES ('530103', '盘龙区', '530100', '3');
INSERT INTO `tb_area` VALUES ('522301', '兴义市', '522300', '3');
INSERT INTO `tb_area` VALUES ('431002', '北湖区', '431000', '3');
INSERT INTO `tb_area` VALUES ('341324', '泗县', '341300', '3');
INSERT INTO `tb_area` VALUES ('410404', '石龙区', '410400', '3');
INSERT INTO `tb_area` VALUES ('370203', '市北区', '370200', '3');
INSERT INTO `tb_area` VALUES ('610927', '镇坪县', '610900', '3');
INSERT INTO `tb_area` VALUES ('230501', '市辖区', '230500', '3');
INSERT INTO `tb_area` VALUES ('340124', '庐江县', '340100', '3');
INSERT INTO `tb_area` VALUES ('410402', '新华区', '410400', '3');
INSERT INTO `tb_area` VALUES ('469029', '保亭黎族苗族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('360821', '吉安县', '360800', '3');
INSERT INTO `tb_area` VALUES ('411503', '平桥区', '411500', '3');
INSERT INTO `tb_area` VALUES ('640422', '西吉县', '640400', '3');
INSERT INTO `tb_area` VALUES ('230502', '尖山区', '230500', '3');
INSERT INTO `tb_area` VALUES ('540233', '亚东县', '540200', '3');
INSERT INTO `tb_area` VALUES ('440606', '顺德区', '440600', '3');
INSERT INTO `tb_area` VALUES ('513434', '越西县', '513400', '3');
INSERT INTO `tb_area` VALUES ('370202', '市南区', '370200', '3');
INSERT INTO `tb_area` VALUES ('450922', '陆川县', '450900', '3');
INSERT INTO `tb_area` VALUES ('630203', '平安区', '630200', '3');
INSERT INTO `tb_area` VALUES ('652825', '且末县', '652800', '3');
INSERT INTO `tb_area` VALUES ('350524', '安溪县', '350500', '3');
INSERT INTO `tb_area` VALUES ('130403', '丛台区', '130400', '3');
INSERT INTO `tb_area` VALUES ('341501', '市辖区', '341500', '3');
INSERT INTO `tb_area` VALUES ('220622', '靖宇县', '220600', '3');
INSERT INTO `tb_area` VALUES ('450305', '七星区', '450300', '3');
INSERT INTO `tb_area` VALUES ('450102', '兴宁区', '450100', '3');
INSERT INTO `tb_area` VALUES ('420625', '谷城县', '420600', '3');
INSERT INTO `tb_area` VALUES ('420100', '武汉市', '420000', '2');
INSERT INTO `tb_area` VALUES ('652823', '尉犁县', '652800', '3');
INSERT INTO `tb_area` VALUES ('360601', '市辖区', '360600', '3');
INSERT INTO `tb_area` VALUES ('150922', '化德县', '150900', '3');
INSERT INTO `tb_area` VALUES ('469001', '五指山市', '469000', '3');
INSERT INTO `tb_area` VALUES ('430529', '城步苗族自治县', '430500', '3');
INSERT INTO `tb_area` VALUES ('320900', '盐城市', '320000', '2');
INSERT INTO `tb_area` VALUES ('210682', '凤城市', '210600', '3');
INSERT INTO `tb_area` VALUES ('220106', '绿园区', '220100', '3');
INSERT INTO `tb_area` VALUES ('654324', '哈巴河县', '654300', '3');
INSERT INTO `tb_area` VALUES ('230904', '茄子河区', '230900', '3');
INSERT INTO `tb_area` VALUES ('211322', '建平县', '211300', '3');
INSERT INTO `tb_area` VALUES ('520123', '修文县', '520100', '3');
INSERT INTO `tb_area` VALUES ('510303', '贡井区', '510300', '3');
INSERT INTO `tb_area` VALUES ('621224', '康县', '621200', '3');
INSERT INTO `tb_area` VALUES ('630101', '市辖区', '630100', '3');
INSERT INTO `tb_area` VALUES ('130421', '邯郸县', '130400', '3');
INSERT INTO `tb_area` VALUES ('410381', '偃师市', '410300', '3');
INSERT INTO `tb_area` VALUES ('350303', '涵江区', '350300', '3');
INSERT INTO `tb_area` VALUES ('540525', '曲松县', '540500', '3');
INSERT INTO `tb_area` VALUES ('340822', '怀宁县', '340800', '3');
INSERT INTO `tb_area` VALUES ('420881', '钟祥市', '420800', '3');
INSERT INTO `tb_area` VALUES ('451081', '靖西市', '451000', '3');
INSERT INTO `tb_area` VALUES ('540121', '林周县', '540100', '3');
INSERT INTO `tb_area` VALUES ('310113', '宝山区', '310100', '3');
INSERT INTO `tb_area` VALUES ('511025', '资中县', '511000', '3');
INSERT INTO `tb_area` VALUES ('533400', '迪庆藏族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('130628', '高阳县', '130600', '3');
INSERT INTO `tb_area` VALUES ('110107', '石景山区', '110100', '3');
INSERT INTO `tb_area` VALUES ('621102', '安定区', '621100', '3');
INSERT INTO `tb_area` VALUES ('410222', '通许县', '410200', '3');
INSERT INTO `tb_area` VALUES ('140725', '寿阳县', '140700', '3');
INSERT INTO `tb_area` VALUES ('500238', '巫溪县', '500200', '3');
INSERT INTO `tb_area` VALUES ('140929', '岢岚县', '140900', '3');
INSERT INTO `tb_area` VALUES ('441481', '兴宁市', '441400', '3');
INSERT INTO `tb_area` VALUES ('511002', '市中区', '511000', '3');
INSERT INTO `tb_area` VALUES ('230404', '南山区', '230400', '3');
INSERT INTO `tb_area` VALUES ('411602', '川汇区', '411600', '3');
INSERT INTO `tb_area` VALUES ('632524', '兴海县', '632500', '3');
INSERT INTO `tb_area` VALUES ('350902', '蕉城区', '350900', '3');
INSERT INTO `tb_area` VALUES ('441224', '怀集县', '441200', '3');
INSERT INTO `tb_area` VALUES ('320506', '吴中区', '320500', '3');
INSERT INTO `tb_area` VALUES ('410928', '濮阳县', '410900', '3');
INSERT INTO `tb_area` VALUES ('140302', '城区', '140300', '3');
INSERT INTO `tb_area` VALUES ('370781', '青州市', '370700', '3');
INSERT INTO `tb_area` VALUES ('330600', '绍兴市', '330000', '2');
INSERT INTO `tb_area` VALUES ('530521', '施甸县', '530500', '3');
INSERT INTO `tb_area` VALUES ('120113', '北辰区', '120100', '3');
INSERT INTO `tb_area` VALUES ('610581', '韩城市', '610500', '3');
INSERT INTO `tb_area` VALUES ('360822', '吉水县', '360800', '3');
INSERT INTO `tb_area` VALUES ('331082', '临海市', '331000', '3');
INSERT INTO `tb_area` VALUES ('410527', '内黄县', '410500', '3');
INSERT INTO `tb_area` VALUES ('451425', '天等县', '451400', '3');
INSERT INTO `tb_area` VALUES ('532823', '勐腊县', '532800', '3');
INSERT INTO `tb_area` VALUES ('540302', '卡若区', '540300', '3');
INSERT INTO `tb_area` VALUES ('110114', '昌平区', '110100', '3');
INSERT INTO `tb_area` VALUES ('330200', '宁波市', '330000', '2');
INSERT INTO `tb_area` VALUES ('140105', '小店区', '140100', '3');
INSERT INTO `tb_area` VALUES ('420202', '黄石港区', '420200', '3');
INSERT INTO `tb_area` VALUES ('654025', '新源县', '654000', '3');
INSERT INTO `tb_area` VALUES ('513338', '得荣县', '513300', '3');
INSERT INTO `tb_area` VALUES ('411403', '睢阳区', '411400', '3');
INSERT INTO `tb_area` VALUES ('620825', '庄浪县', '620800', '3');
INSERT INTO `tb_area` VALUES ('530100', '昆明市', '530000', '2');
INSERT INTO `tb_area` VALUES ('341221', '临泉县', '341200', '3');
INSERT INTO `tb_area` VALUES ('513327', '炉霍县', '513300', '3');
INSERT INTO `tb_area` VALUES ('429005', '潜江市', '429000', '3');
INSERT INTO `tb_area` VALUES ('350922', '古田县', '350900', '3');
INSERT INTO `tb_area` VALUES ('610100', '西安市', '610000', '2');
INSERT INTO `tb_area` VALUES ('220104', '朝阳区', '220100', '3');
INSERT INTO `tb_area` VALUES ('451024', '德保县', '451000', '3');
INSERT INTO `tb_area` VALUES ('360281', '乐平市', '360200', '3');
INSERT INTO `tb_area` VALUES ('620725', '山丹县', '620700', '3');
INSERT INTO `tb_area` VALUES ('450802', '港北区', '450800', '3');
INSERT INTO `tb_area` VALUES ('542525', '革吉县', '542500', '3');
INSERT INTO `tb_area` VALUES ('321324', '泗洪县', '321300', '3');
INSERT INTO `tb_area` VALUES ('330603', '柯桥区', '330600', '3');
INSERT INTO `tb_area` VALUES ('510824', '苍溪县', '510800', '3');
INSERT INTO `tb_area` VALUES ('330211', '镇海区', '330200', '3');
INSERT INTO `tb_area` VALUES ('370200', '青岛市', '370000', '2');
INSERT INTO `tb_area` VALUES ('441426', '平远县', '441400', '3');
INSERT INTO `tb_area` VALUES ('520111', '花溪区', '520100', '3');
INSERT INTO `tb_area` VALUES ('330604', '上虞区', '330600', '3');
INSERT INTO `tb_area` VALUES ('510601', '市辖区', '510600', '3');
INSERT INTO `tb_area` VALUES ('330683', '嵊州市', '330600', '3');
INSERT INTO `tb_area` VALUES ('430722', '汉寿县', '430700', '3');
INSERT INTO `tb_area` VALUES ('610631', '黄龙县', '610600', '3');
INSERT INTO `tb_area` VALUES ('150627', '伊金霍洛旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('623021', '临潭县', '623000', '3');
INSERT INTO `tb_area` VALUES ('230321', '鸡东县', '230300', '3');
INSERT INTO `tb_area` VALUES ('430424', '衡东县', '430400', '3');
INSERT INTO `tb_area` VALUES ('371122', '莒县', '371100', '3');
INSERT INTO `tb_area` VALUES ('520203', '六枝特区', '520200', '3');
INSERT INTO `tb_area` VALUES ('451424', '大新县', '451400', '3');
INSERT INTO `tb_area` VALUES ('210681', '东港市', '210600', '3');
INSERT INTO `tb_area` VALUES ('152523', '苏尼特左旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('371323', '沂水县', '371300', '3');
INSERT INTO `tb_area` VALUES ('340705', '铜官区', '340700', '3');
INSERT INTO `tb_area` VALUES ('150206', '白云鄂博矿区', '150200', '3');
INSERT INTO `tb_area` VALUES ('420105', '汉阳区', '420100', '3');
INSERT INTO `tb_area` VALUES ('411627', '太康县', '411600', '3');
INSERT INTO `tb_area` VALUES ('500117', '合川区', '500100', '3');
INSERT INTO `tb_area` VALUES ('522723', '贵定县', '522700', '3');
INSERT INTO `tb_area` VALUES ('370125', '济阳县', '370100', '3');
INSERT INTO `tb_area` VALUES ('440205', '曲江区', '440200', '3');
INSERT INTO `tb_area` VALUES ('350583', '南安市', '350500', '3');
INSERT INTO `tb_area` VALUES ('330225', '象山县', '330200', '3');
INSERT INTO `tb_area` VALUES ('510504', '龙马潭区', '510500', '3');
INSERT INTO `tb_area` VALUES ('140931', '保德县', '140900', '3');
INSERT INTO `tb_area` VALUES ('152500', '锡林郭勒盟', '150000', '2');
INSERT INTO `tb_area` VALUES ('611025', '镇安县', '611000', '3');
INSERT INTO `tb_area` VALUES ('520624', '思南县', '520600', '3');
INSERT INTO `tb_area` VALUES ('411402', '梁园区', '411400', '3');
INSERT INTO `tb_area` VALUES ('540103', '堆龙德庆区', '540100', '3');
INSERT INTO `tb_area` VALUES ('350525', '永春县', '350500', '3');
INSERT INTO `tb_area` VALUES ('130709', '崇礼区', '130700', '3');
INSERT INTO `tb_area` VALUES ('654225', '裕民县', '654200', '3');
INSERT INTO `tb_area` VALUES ('411424', '柘城县', '411400', '3');
INSERT INTO `tb_area` VALUES ('330328', '文成县', '330300', '3');
INSERT INTO `tb_area` VALUES ('640400', '固原市', '640000', '2');
INSERT INTO `tb_area` VALUES ('361025', '乐安县', '361000', '3');
INSERT INTO `tb_area` VALUES ('610702', '汉台区', '610700', '3');
INSERT INTO `tb_area` VALUES ('610323', '岐山县', '610300', '3');
INSERT INTO `tb_area` VALUES ('411401', '市辖区', '411400', '3');
INSERT INTO `tb_area` VALUES ('370883', '邹城市', '370800', '3');
INSERT INTO `tb_area` VALUES ('350629', '华安县', '350600', '3');
INSERT INTO `tb_area` VALUES ('632522', '同德县', '632500', '3');
INSERT INTO `tb_area` VALUES ('540522', '贡嘎县', '540500', '3');
INSERT INTO `tb_area` VALUES ('450224', '融安县', '450200', '3');
INSERT INTO `tb_area` VALUES ('510600', '德阳市', '510000', '2');
INSERT INTO `tb_area` VALUES ('350101', '市辖区', '350100', '3');
INSERT INTO `tb_area` VALUES ('410621', '浚县', '410600', '3');
INSERT INTO `tb_area` VALUES ('440117', '从化区', '440100', '3');
INSERT INTO `tb_area` VALUES ('410803', '中站区', '410800', '3');
INSERT INTO `tb_area` VALUES ('510681', '广汉市', '510600', '3');
INSERT INTO `tb_area` VALUES ('150421', '阿鲁科尔沁旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('320214', '新吴区', '320200', '3');
INSERT INTO `tb_area` VALUES ('620982', '敦煌市', '620900', '3');
INSERT INTO `tb_area` VALUES ('411326', '淅川县', '411300', '3');
INSERT INTO `tb_area` VALUES ('230382', '密山市', '230300', '3');
INSERT INTO `tb_area` VALUES ('220722', '长岭县', '220700', '3');
INSERT INTO `tb_area` VALUES ('430600', '岳阳市', '430000', '2');
INSERT INTO `tb_area` VALUES ('421003', '荆州区', '421000', '3');
INSERT INTO `tb_area` VALUES ('441300', '惠州市', '440000', '2');
INSERT INTO `tb_area` VALUES ('139001', '定州市', '139000', '3');
INSERT INTO `tb_area` VALUES ('230230', '克东县', '230200', '3');
INSERT INTO `tb_area` VALUES ('330903', '普陀区', '330900', '3');
INSERT INTO `tb_area` VALUES ('141126', '石楼县', '141100', '3');
INSERT INTO `tb_area` VALUES ('370201', '市辖区', '370200', '3');
INSERT INTO `tb_area` VALUES ('211281', '调兵山市', '211200', '3');
INSERT INTO `tb_area` VALUES ('420701', '市辖区', '420700', '3');
INSERT INTO `tb_area` VALUES ('321283', '泰兴市', '321200', '3');
INSERT INTO `tb_area` VALUES ('530428', '元江哈尼族彝族傣族自治县', '530400', '3');
INSERT INTO `tb_area` VALUES ('371481', '乐陵市', '371400', '3');
INSERT INTO `tb_area` VALUES ('520382', '仁怀市', '520300', '3');
INSERT INTO `tb_area` VALUES ('139000', '省直辖县级行政区划', '130000', '2');
INSERT INTO `tb_area` VALUES ('421182', '武穴市', '421100', '3');
INSERT INTO `tb_area` VALUES ('340503', '花山区', '340500', '3');
INSERT INTO `tb_area` VALUES ('150523', '开鲁县', '150500', '3');
INSERT INTO `tb_area` VALUES ('410185', '登封市', '410100', '3');
INSERT INTO `tb_area` VALUES ('410400', '平顶山市', '410000', '2');
INSERT INTO `tb_area` VALUES ('654300', '阿勒泰地区', '650000', '2');
INSERT INTO `tb_area` VALUES ('530500', '保山市', '530000', '2');
INSERT INTO `tb_area` VALUES ('150522', '科尔沁左翼后旗', '150500', '3');
INSERT INTO `tb_area` VALUES ('120103', '河西区', '120100', '3');
INSERT INTO `tb_area` VALUES ('321001', '市辖区', '321000', '3');
INSERT INTO `tb_area` VALUES ('530101', '市辖区', '530100', '3');
INSERT INTO `tb_area` VALUES ('530722', '永胜县', '530700', '3');
INSERT INTO `tb_area` VALUES ('411501', '市辖区', '411500', '3');
INSERT INTO `tb_area` VALUES ('230381', '虎林市', '230300', '3');
INSERT INTO `tb_area` VALUES ('441623', '连平县', '441600', '3');
INSERT INTO `tb_area` VALUES ('371312', '河东区', '371300', '3');
INSERT INTO `tb_area` VALUES ('510300', '自贡市', '510000', '2');
INSERT INTO `tb_area` VALUES ('230707', '新青区', '230700', '3');
INSERT INTO `tb_area` VALUES ('430204', '石峰区', '430200', '3');
INSERT INTO `tb_area` VALUES ('430407', '石鼓区', '430400', '3');
INSERT INTO `tb_area` VALUES ('620702', '甘州区', '620700', '3');
INSERT INTO `tb_area` VALUES ('542527', '措勤县', '542500', '3');
INSERT INTO `tb_area` VALUES ('150200', '包头市', '150000', '2');
INSERT INTO `tb_area` VALUES ('430426', '祁东县', '430400', '3');
INSERT INTO `tb_area` VALUES ('371721', '曹县', '371700', '3');
INSERT INTO `tb_area` VALUES ('210400', '抚顺市', '210000', '2');
INSERT INTO `tb_area` VALUES ('210111', '苏家屯区', '210100', '3');
INSERT INTO `tb_area` VALUES ('360727', '龙南县', '360700', '3');
INSERT INTO `tb_area` VALUES ('421081', '石首市', '421000', '3');
INSERT INTO `tb_area` VALUES ('532625', '马关县', '532600', '3');
INSERT INTO `tb_area` VALUES ('610124', '周至县', '610100', '3');
INSERT INTO `tb_area` VALUES ('130528', '宁晋县', '130500', '3');
INSERT INTO `tb_area` VALUES ('360729', '全南县', '360700', '3');
INSERT INTO `tb_area` VALUES ('370100', '济南市', '370000', '2');
INSERT INTO `tb_area` VALUES ('371724', '巨野县', '371700', '3');
INSERT INTO `tb_area` VALUES ('530821', '宁洱哈尼族彝族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('511001', '市辖区', '511000', '3');
INSERT INTO `tb_area` VALUES ('522300', '黔西南布依族苗族自治州', '520000', '2');
INSERT INTO `tb_area` VALUES ('130501', '市辖区', '130500', '3');
INSERT INTO `tb_area` VALUES ('441401', '市辖区', '441400', '3');
INSERT INTO `tb_area` VALUES ('420901', '市辖区', '420900', '3');
INSERT INTO `tb_area` VALUES ('429006', '天门市', '429000', '3');
INSERT INTO `tb_area` VALUES ('430623', '华容县', '430600', '3');
INSERT INTO `tb_area` VALUES ('371103', '岚山区', '371100', '3');
INSERT INTO `tb_area` VALUES ('410702', '红旗区', '410700', '3');
INSERT INTO `tb_area` VALUES ('360429', '湖口县', '360400', '3');
INSERT INTO `tb_area` VALUES ('320113', '栖霞区', '320100', '3');
INSERT INTO `tb_area` VALUES ('530822', '墨江哈尼族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('522732', '三都水族自治县', '522700', '3');
INSERT INTO `tb_area` VALUES ('330483', '桐乡市', '330400', '3');
INSERT INTO `tb_area` VALUES ('511024', '威远县', '511000', '3');
INSERT INTO `tb_area` VALUES ('361125', '横峰县', '361100', '3');
INSERT INTO `tb_area` VALUES ('130429', '永年县', '130400', '3');
INSERT INTO `tb_area` VALUES ('620824', '华亭县', '620800', '3');
INSERT INTO `tb_area` VALUES ('350403', '三元区', '350400', '3');
INSERT INTO `tb_area` VALUES ('640300', '吴忠市', '640000', '2');
INSERT INTO `tb_area` VALUES ('331124', '松阳县', '331100', '3');
INSERT INTO `tb_area` VALUES ('610301', '市辖区', '610300', '3');
INSERT INTO `tb_area` VALUES ('445222', '揭西县', '445200', '3');
INSERT INTO `tb_area` VALUES ('230202', '龙沙区', '230200', '3');
INSERT INTO `tb_area` VALUES ('511011', '东兴区', '511000', '3');
INSERT INTO `tb_area` VALUES ('220605', '江源区', '220600', '3');
INSERT INTO `tb_area` VALUES ('610423', '泾阳县', '610400', '3');
INSERT INTO `tb_area` VALUES ('330482', '平湖市', '330400', '3');
INSERT INTO `tb_area` VALUES ('130903', '运河区', '130900', '3');
INSERT INTO `tb_area` VALUES ('371722', '单县', '371700', '3');
INSERT INTO `tb_area` VALUES ('540528', '加查县', '540500', '3');
INSERT INTO `tb_area` VALUES ('510823', '剑阁县', '510800', '3');
INSERT INTO `tb_area` VALUES ('500116', '江津区', '500100', '3');
INSERT INTO `tb_area` VALUES ('530627', '镇雄县', '530600', '3');
INSERT INTO `tb_area` VALUES ('420684', '宜城市', '420600', '3');
INSERT INTO `tb_area` VALUES ('321101', '市辖区', '321100', '3');
INSERT INTO `tb_area` VALUES ('632300', '黄南藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('211204', '清河区', '211200', '3');
INSERT INTO `tb_area` VALUES ('533124', '陇川县', '533100', '3');
INSERT INTO `tb_area` VALUES ('130526', '任县', '130500', '3');
INSERT INTO `tb_area` VALUES ('620103', '七里河区', '620100', '3');
INSERT INTO `tb_area` VALUES ('532801', '景洪市', '532800', '3');
INSERT INTO `tb_area` VALUES ('410804', '马村区', '410800', '3');
INSERT INTO `tb_area` VALUES ('610429', '旬邑县', '610400', '3');
INSERT INTO `tb_area` VALUES ('445322', '郁南县', '445300', '3');
INSERT INTO `tb_area` VALUES ('421101', '市辖区', '421100', '3');
INSERT INTO `tb_area` VALUES ('640121', '永宁县', '640100', '3');
INSERT INTO `tb_area` VALUES ('513431', '昭觉县', '513400', '3');
INSERT INTO `tb_area` VALUES ('350503', '丰泽区', '350500', '3');
INSERT INTO `tb_area` VALUES ('120115', '宝坻区', '120100', '3');
INSERT INTO `tb_area` VALUES ('130431', '鸡泽县', '130400', '3');
INSERT INTO `tb_area` VALUES ('150800', '巴彦淖尔市', '150000', '2');
INSERT INTO `tb_area` VALUES ('511921', '通江县', '511900', '3');
INSERT INTO `tb_area` VALUES ('370281', '胶州市', '370200', '3');
INSERT INTO `tb_area` VALUES ('451028', '乐业县', '451000', '3');
INSERT INTO `tb_area` VALUES ('623001', '合作市', '623000', '3');
INSERT INTO `tb_area` VALUES ('411000', '许昌市', '410000', '2');
INSERT INTO `tb_area` VALUES ('632723', '称多县', '632700', '3');
INSERT INTO `tb_area` VALUES ('210281', '瓦房店市', '210200', '3');
INSERT INTO `tb_area` VALUES ('653227', '民丰县', '653200', '3');
INSERT INTO `tb_area` VALUES ('540425', '察隅县', '540400', '3');
INSERT INTO `tb_area` VALUES ('341022', '休宁县', '341000', '3');
INSERT INTO `tb_area` VALUES ('433125', '保靖县', '433100', '3');
INSERT INTO `tb_area` VALUES ('360900', '宜春市', '360000', '2');
INSERT INTO `tb_area` VALUES ('621023', '华池县', '621000', '3');
INSERT INTO `tb_area` VALUES ('340604', '烈山区', '340600', '3');
INSERT INTO `tb_area` VALUES ('211321', '朝阳县', '211300', '3');
INSERT INTO `tb_area` VALUES ('131100', '衡水市', '130000', '2');
INSERT INTO `tb_area` VALUES ('620722', '民乐县', '620700', '3');
INSERT INTO `tb_area` VALUES ('320401', '市辖区', '320400', '3');
INSERT INTO `tb_area` VALUES ('420800', '荆门市', '420000', '2');
INSERT INTO `tb_area` VALUES ('530600', '昭通市', '530000', '2');
INSERT INTO `tb_area` VALUES ('451322', '象州县', '451300', '3');
INSERT INTO `tb_area` VALUES ('469024', '临高县', '469000', '3');
INSERT INTO `tb_area` VALUES ('360824', '新干县', '360800', '3');
INSERT INTO `tb_area` VALUES ('500111', '大足区', '500100', '3');
INSERT INTO `tb_area` VALUES ('410800', '焦作市', '410000', '2');
INSERT INTO `tb_area` VALUES ('441801', '市辖区', '441800', '3');
INSERT INTO `tb_area` VALUES ('513226', '金川县', '513200', '3');
INSERT INTO `tb_area` VALUES ('532502', '开远市', '532500', '3');
INSERT INTO `tb_area` VALUES ('451223', '凤山县', '451200', '3');
INSERT INTO `tb_area` VALUES ('513222', '理县', '513200', '3');
INSERT INTO `tb_area` VALUES ('320213', '梁溪区', '320200', '3');
INSERT INTO `tb_area` VALUES ('610523', '大荔县', '610500', '3');
INSERT INTO `tb_area` VALUES ('522327', '册亨县', '522300', '3');
INSERT INTO `tb_area` VALUES ('140726', '太谷县', '140700', '3');
INSERT INTO `tb_area` VALUES ('130203', '路北区', '130200', '3');
INSERT INTO `tb_area` VALUES ('411624', '沈丘县', '411600', '3');
INSERT INTO `tb_area` VALUES ('341100', '滁州市', '340000', '2');
INSERT INTO `tb_area` VALUES ('231181', '北安市', '231100', '3');
INSERT INTO `tb_area` VALUES ('520329', '余庆县', '520300', '3');
INSERT INTO `tb_area` VALUES ('620100', '兰州市', '620000', '2');
INSERT INTO `tb_area` VALUES ('360926', '铜鼓县', '360900', '3');
INSERT INTO `tb_area` VALUES ('431103', '冷水滩区', '431100', '3');
INSERT INTO `tb_area` VALUES ('654223', '沙湾县', '654200', '3');
INSERT INTO `tb_area` VALUES ('532329', '武定县', '532300', '3');
INSERT INTO `tb_area` VALUES ('140829', '平陆县', '140800', '3');
INSERT INTO `tb_area` VALUES ('530425', '易门县', '530400', '3');
INSERT INTO `tb_area` VALUES ('210301', '市辖区', '210300', '3');
INSERT INTO `tb_area` VALUES ('350122', '连江县', '350100', '3');
INSERT INTO `tb_area` VALUES ('150100', '呼和浩特市', '150000', '2');
INSERT INTO `tb_area` VALUES ('610831', '子洲县', '610800', '3');
INSERT INTO `tb_area` VALUES ('330104', '江干区', '330100', '3');
INSERT INTO `tb_area` VALUES ('371425', '齐河县', '371400', '3');
INSERT INTO `tb_area` VALUES ('130923', '东光县', '130900', '3');
INSERT INTO `tb_area` VALUES ('150223', '达尔罕茂明安联合旗', '150200', '3');
INSERT INTO `tb_area` VALUES ('411701', '市辖区', '411700', '3');
INSERT INTO `tb_area` VALUES ('440201', '市辖区', '440200', '3');
INSERT INTO `tb_area` VALUES ('120104', '南开区', '120100', '3');
INSERT INTO `tb_area` VALUES ('622926', '东乡族自治县', '622900', '3');
INSERT INTO `tb_area` VALUES ('610404', '渭城区', '610400', '3');
INSERT INTO `tb_area` VALUES ('320583', '昆山市', '320500', '3');
INSERT INTO `tb_area` VALUES ('130823', '平泉县', '130800', '3');
INSERT INTO `tb_area` VALUES ('451400', '崇左市', '450000', '2');
INSERT INTO `tb_area` VALUES ('460203', '吉阳区', '460200', '3');
INSERT INTO `tb_area` VALUES ('371329', '临沭县', '371300', '3');
INSERT INTO `tb_area` VALUES ('520424', '关岭布依族苗族自治县', '520400', '3');
INSERT INTO `tb_area` VALUES ('500237', '巫山县', '500200', '3');
INSERT INTO `tb_area` VALUES ('360428', '都昌县', '360400', '3');
INSERT INTO `tb_area` VALUES ('410526', '滑县', '410500', '3');
INSERT INTO `tb_area` VALUES ('640106', '金凤区', '640100', '3');
INSERT INTO `tb_area` VALUES ('140923', '代县', '140900', '3');
INSERT INTO `tb_area` VALUES ('520102', '南明区', '520100', '3');
INSERT INTO `tb_area` VALUES ('431025', '临武县', '431000', '3');
INSERT INTO `tb_area` VALUES ('360101', '市辖区', '360100', '3');
INSERT INTO `tb_area` VALUES ('410401', '市辖区', '410400', '3');
INSERT INTO `tb_area` VALUES ('211402', '连山区', '211400', '3');
INSERT INTO `tb_area` VALUES ('110117', '平谷区', '110100', '3');
INSERT INTO `tb_area` VALUES ('421221', '嘉鱼县', '421200', '3');
INSERT INTO `tb_area` VALUES ('220401', '市辖区', '220400', '3');
INSERT INTO `tb_area` VALUES ('430801', '市辖区', '430800', '3');
INSERT INTO `tb_area` VALUES ('421301', '市辖区', '421300', '3');
INSERT INTO `tb_area` VALUES ('520525', '纳雍县', '520500', '3');
INSERT INTO `tb_area` VALUES ('150929', '四子王旗', '150900', '3');
INSERT INTO `tb_area` VALUES ('621124', '临洮县', '621100', '3');
INSERT INTO `tb_area` VALUES ('411527', '淮滨县', '411500', '3');
INSERT INTO `tb_area` VALUES ('130631', '望都县', '130600', '3');
INSERT INTO `tb_area` VALUES ('510182', '彭州市', '510100', '3');
INSERT INTO `tb_area` VALUES ('360401', '市辖区', '360400', '3');
INSERT INTO `tb_area` VALUES ('440983', '信宜市', '440900', '3');
INSERT INTO `tb_area` VALUES ('230602', '萨尔图区', '230600', '3');
INSERT INTO `tb_area` VALUES ('370832', '梁山县', '370800', '3');
INSERT INTO `tb_area` VALUES ('410221', '杞县', '410200', '3');
INSERT INTO `tb_area` VALUES ('130828', '围场满族蒙古族自治县', '130800', '3');
INSERT INTO `tb_area` VALUES ('520522', '黔西县', '520500', '3');
INSERT INTO `tb_area` VALUES ('450800', '贵港市', '450000', '2');
INSERT INTO `tb_area` VALUES ('610829', '吴堡县', '610800', '3');
INSERT INTO `tb_area` VALUES ('310104', '徐汇区', '310100', '3');
INSERT INTO `tb_area` VALUES ('130131', '平山县', '130100', '3');
INSERT INTO `tb_area` VALUES ('141123', '兴县', '141100', '3');
INSERT INTO `tb_area` VALUES ('620802', '崆峒区', '620800', '3');
INSERT INTO `tb_area` VALUES ('520000', '贵州省', '0', '1');
INSERT INTO `tb_area` VALUES ('320481', '溧阳市', '320400', '3');
INSERT INTO `tb_area` VALUES ('370881', '曲阜市', '370800', '3');
INSERT INTO `tb_area` VALUES ('511425', '青神县', '511400', '3');
INSERT INTO `tb_area` VALUES ('410711', '牧野区', '410700', '3');
INSERT INTO `tb_area` VALUES ('532301', '楚雄市', '532300', '3');
INSERT INTO `tb_area` VALUES ('621201', '市辖区', '621200', '3');
INSERT INTO `tb_area` VALUES ('220822', '通榆县', '220800', '3');
INSERT INTO `tb_area` VALUES ('371602', '滨城区', '371600', '3');
INSERT INTO `tb_area` VALUES ('231226', '绥棱县', '231200', '3');
INSERT INTO `tb_area` VALUES ('451029', '田林县', '451000', '3');
INSERT INTO `tb_area` VALUES ('340701', '市辖区', '340700', '3');
INSERT INTO `tb_area` VALUES ('371502', '东昌府区', '371500', '3');
INSERT INTO `tb_area` VALUES ('440106', '天河区', '440100', '3');
INSERT INTO `tb_area` VALUES ('130428', '肥乡县', '130400', '3');
INSERT INTO `tb_area` VALUES ('310101', '黄浦区', '310100', '3');
INSERT INTO `tb_area` VALUES ('420527', '秭归县', '420500', '3');
INSERT INTO `tb_area` VALUES ('532331', '禄丰县', '532300', '3');
INSERT INTO `tb_area` VALUES ('610730', '佛坪县', '610700', '3');
INSERT INTO `tb_area` VALUES ('120117', '宁河区', '120100', '3');
INSERT INTO `tb_area` VALUES ('422822', '建始县', '422800', '3');
INSERT INTO `tb_area` VALUES ('620523', '甘谷县', '620500', '3');
INSERT INTO `tb_area` VALUES ('500233', '忠县', '500200', '3');
INSERT INTO `tb_area` VALUES ('440104', '越秀区', '440100', '3');
INSERT INTO `tb_area` VALUES ('150201', '市辖区', '150200', '3');
INSERT INTO `tb_area` VALUES ('410223', '尉氏县', '410200', '3');
INSERT INTO `tb_area` VALUES ('520626', '德江县', '520600', '3');
INSERT INTO `tb_area` VALUES ('341103', '南谯区', '341100', '3');
INSERT INTO `tb_area` VALUES ('450200', '柳州市', '450000', '2');
INSERT INTO `tb_area` VALUES ('450204', '柳南区', '450200', '3');
INSERT INTO `tb_area` VALUES ('450105', '江南区', '450100', '3');
INSERT INTO `tb_area` VALUES ('230822', '桦南县', '230800', '3');
INSERT INTO `tb_area` VALUES ('140722', '左权县', '140700', '3');
INSERT INTO `tb_area` VALUES ('610203', '印台区', '610200', '3');
INSERT INTO `tb_area` VALUES ('623022', '卓尼县', '623000', '3');
INSERT INTO `tb_area` VALUES ('231102', '爱辉区', '231100', '3');
INSERT INTO `tb_area` VALUES ('440825', '徐闻县', '440800', '3');
INSERT INTO `tb_area` VALUES ('140926', '静乐县', '140900', '3');
INSERT INTO `tb_area` VALUES ('540327', '左贡县', '540300', '3');
INSERT INTO `tb_area` VALUES ('511623', '邻水县', '511600', '3');
INSERT INTO `tb_area` VALUES ('370705', '奎文区', '370700', '3');
INSERT INTO `tb_area` VALUES ('530422', '澄江县', '530400', '3');
INSERT INTO `tb_area` VALUES ('210303', '铁西区', '210300', '3');
INSERT INTO `tb_area` VALUES ('341600', '亳州市', '340000', '2');
INSERT INTO `tb_area` VALUES ('530702', '古城区', '530700', '3');
INSERT INTO `tb_area` VALUES ('370323', '沂源县', '370300', '3');
INSERT INTO `tb_area` VALUES ('130534', '清河县', '130500', '3');
INSERT INTO `tb_area` VALUES ('321181', '丹阳市', '321100', '3');
INSERT INTO `tb_area` VALUES ('411082', '长葛市', '411000', '3');
INSERT INTO `tb_area` VALUES ('441402', '梅江区', '441400', '3');
INSERT INTO `tb_area` VALUES ('350802', '新罗区', '350800', '3');
INSERT INTO `tb_area` VALUES ('211422', '建昌县', '211400', '3');
INSERT INTO `tb_area` VALUES ('350603', '龙文区', '350600', '3');
INSERT INTO `tb_area` VALUES ('370684', '蓬莱市', '370600', '3');
INSERT INTO `tb_area` VALUES ('350206', '湖里区', '350200', '3');
INSERT INTO `tb_area` VALUES ('150402', '红山区', '150400', '3');
INSERT INTO `tb_area` VALUES ('330500', '湖州市', '330000', '2');
INSERT INTO `tb_area` VALUES ('340121', '长丰县', '340100', '3');
INSERT INTO `tb_area` VALUES ('511802', '雨城区', '511800', '3');
INSERT INTO `tb_area` VALUES ('513227', '小金县', '513200', '3');
INSERT INTO `tb_area` VALUES ('511132', '峨边彝族自治县', '511100', '3');
INSERT INTO `tb_area` VALUES ('150703', '扎赉诺尔区', '150700', '3');
INSERT INTO `tb_area` VALUES ('652801', '库尔勒市', '652800', '3');
INSERT INTO `tb_area` VALUES ('230184', '五常市', '230100', '3');
INSERT INTO `tb_area` VALUES ('210403', '东洲区', '210400', '3');
INSERT INTO `tb_area` VALUES ('640205', '惠农区', '640200', '3');
INSERT INTO `tb_area` VALUES ('321200', '泰州市', '320000', '2');
INSERT INTO `tb_area` VALUES ('510525', '古蔺县', '510500', '3');
INSERT INTO `tb_area` VALUES ('371402', '德城区', '371400', '3');
INSERT INTO `tb_area` VALUES ('360721', '赣县', '360700', '3');
INSERT INTO `tb_area` VALUES ('533103', '芒市', '533100', '3');
INSERT INTO `tb_area` VALUES ('411400', '商丘市', '410000', '2');
INSERT INTO `tb_area` VALUES ('150502', '科尔沁区', '150500', '3');
INSERT INTO `tb_area` VALUES ('370306', '周村区', '370300', '3');
INSERT INTO `tb_area` VALUES ('650106', '头屯河区', '650100', '3');
INSERT INTO `tb_area` VALUES ('341602', '谯城区', '341600', '3');
INSERT INTO `tb_area` VALUES ('230601', '市辖区', '230600', '3');
INSERT INTO `tb_area` VALUES ('230716', '上甘岭区', '230700', '3');
INSERT INTO `tb_area` VALUES ('130525', '隆尧县', '130500', '3');
INSERT INTO `tb_area` VALUES ('341701', '市辖区', '341700', '3');
INSERT INTO `tb_area` VALUES ('141122', '交城县', '141100', '3');
INSERT INTO `tb_area` VALUES ('210602', '元宝区', '210600', '3');
INSERT INTO `tb_area` VALUES ('630122', '湟中县', '630100', '3');
INSERT INTO `tb_area` VALUES ('510502', '江阳区', '510500', '3');
INSERT INTO `tb_area` VALUES ('440400', '珠海市', '440000', '2');
INSERT INTO `tb_area` VALUES ('140600', '朔州市', '140000', '2');
INSERT INTO `tb_area` VALUES ('140921', '定襄县', '140900', '3');
INSERT INTO `tb_area` VALUES ('610431', '武功县', '610400', '3');
INSERT INTO `tb_area` VALUES ('450324', '全州县', '450300', '3');
INSERT INTO `tb_area` VALUES ('522731', '惠水县', '522700', '3');
INSERT INTO `tb_area` VALUES ('152921', '阿拉善左旗', '152900', '3');
INSERT INTO `tb_area` VALUES ('321282', '靖江市', '321200', '3');
INSERT INTO `tb_area` VALUES ('430201', '市辖区', '430200', '3');
INSERT INTO `tb_area` VALUES ('230702', '伊春区', '230700', '3');
INSERT INTO `tb_area` VALUES ('420302', '茅箭区', '420300', '3');
INSERT INTO `tb_area` VALUES ('220283', '舒兰市', '220200', '3');
INSERT INTO `tb_area` VALUES ('500103', '渝中区', '500100', '3');
INSERT INTO `tb_area` VALUES ('210124', '法库县', '210100', '3');
INSERT INTO `tb_area` VALUES ('460107', '琼山区', '460100', '3');
INSERT INTO `tb_area` VALUES ('350800', '龙岩市', '350000', '2');
INSERT INTO `tb_area` VALUES ('130606', '莲池区', '130600', '3');
INSERT INTO `tb_area` VALUES ('511324', '仪陇县', '511300', '3');
INSERT INTO `tb_area` VALUES ('350121', '闽侯县', '350100', '3');
INSERT INTO `tb_area` VALUES ('340828', '岳西县', '340800', '3');
INSERT INTO `tb_area` VALUES ('340700', '铜陵市', '340000', '2');
INSERT INTO `tb_area` VALUES ('654022', '察布查尔锡伯自治县', '654000', '3');
INSERT INTO `tb_area` VALUES ('500000', '重庆市', '0', '1');
INSERT INTO `tb_area` VALUES ('220204', '船营区', '220200', '3');
INSERT INTO `tb_area` VALUES ('130105', '新华区', '130100', '3');
INSERT INTO `tb_area` VALUES ('532925', '弥渡县', '532900', '3');
INSERT INTO `tb_area` VALUES ('230722', '嘉荫县', '230700', '3');
INSERT INTO `tb_area` VALUES ('450107', '西乡塘区', '450100', '3');
INSERT INTO `tb_area` VALUES ('441284', '四会市', '441200', '3');
INSERT INTO `tb_area` VALUES ('511129', '沐川县', '511100', '3');
INSERT INTO `tb_area` VALUES ('611002', '商州区', '611000', '3');
INSERT INTO `tb_area` VALUES ('210101', '市辖区', '210100', '3');
INSERT INTO `tb_area` VALUES ('320211', '滨湖区', '320200', '3');
INSERT INTO `tb_area` VALUES ('340221', '芜湖县', '340200', '3');
INSERT INTO `tb_area` VALUES ('140821', '临猗县', '140800', '3');
INSERT INTO `tb_area` VALUES ('450109', '邕宁区', '450100', '3');
INSERT INTO `tb_area` VALUES ('370983', '肥城市', '370900', '3');
INSERT INTO `tb_area` VALUES ('210283', '庄河市', '210200', '3');
INSERT INTO `tb_area` VALUES ('360982', '樟树市', '360900', '3');
INSERT INTO `tb_area` VALUES ('610700', '汉中市', '610000', '2');
INSERT INTO `tb_area` VALUES ('513233', '红原县', '513200', '3');
INSERT INTO `tb_area` VALUES ('150104', '玉泉区', '150100', '3');
INSERT INTO `tb_area` VALUES ('610304', '陈仓区', '610300', '3');
INSERT INTO `tb_area` VALUES ('360430', '彭泽县', '360400', '3');
INSERT INTO `tb_area` VALUES ('350721', '顺昌县', '350700', '3');
INSERT INTO `tb_area` VALUES ('371701', '市辖区', '371700', '3');
INSERT INTO `tb_area` VALUES ('340123', '肥西县', '340100', '3');
INSERT INTO `tb_area` VALUES ('330108', '滨江区', '330100', '3');
INSERT INTO `tb_area` VALUES ('511803', '名山区', '511800', '3');
INSERT INTO `tb_area` VALUES ('441826', '连南瑶族自治县', '441800', '3');
INSERT INTO `tb_area` VALUES ('220103', '宽城区', '220100', '3');
INSERT INTO `tb_area` VALUES ('411322', '方城县', '411300', '3');
INSERT INTO `tb_area` VALUES ('430501', '市辖区', '430500', '3');
INSERT INTO `tb_area` VALUES ('341003', '黄山区', '341000', '3');
INSERT INTO `tb_area` VALUES ('411323', '西峡县', '411300', '3');
INSERT INTO `tb_area` VALUES ('370503', '河口区', '370500', '3');
INSERT INTO `tb_area` VALUES ('210300', '鞍山市', '210000', '2');
INSERT INTO `tb_area` VALUES ('540227', '谢通门县', '540200', '3');
INSERT INTO `tb_area` VALUES ('460201', '市辖区', '460200', '3');
INSERT INTO `tb_area` VALUES ('610827', '米脂县', '610800', '3');
INSERT INTO `tb_area` VALUES ('530924', '镇康县', '530900', '3');
INSERT INTO `tb_area` VALUES ('360521', '分宜县', '360500', '3');
INSERT INTO `tb_area` VALUES ('371083', '乳山市', '371000', '3');
INSERT INTO `tb_area` VALUES ('150123', '和林格尔县', '150100', '3');
INSERT INTO `tb_area` VALUES ('210502', '平山区', '210500', '3');
INSERT INTO `tb_area` VALUES ('500118', '永川区', '500100', '3');
INSERT INTO `tb_area` VALUES ('130825', '隆化县', '130800', '3');
INSERT INTO `tb_area` VALUES ('210102', '和平区', '210100', '3');
INSERT INTO `tb_area` VALUES ('330922', '嵊泗县', '330900', '3');
INSERT INTO `tb_area` VALUES ('510311', '沿滩区', '510300', '3');
INSERT INTO `tb_area` VALUES ('460400', '儋州市', '460000', '2');
INSERT INTO `tb_area` VALUES ('150981', '丰镇市', '150900', '3');
INSERT INTO `tb_area` VALUES ('411023', '许昌县', '411000', '3');
INSERT INTO `tb_area` VALUES ('220303', '铁东区', '220300', '3');
INSERT INTO `tb_area` VALUES ('320707', '赣榆区', '320700', '3');
INSERT INTO `tb_area` VALUES ('530601', '市辖区', '530600', '3');
INSERT INTO `tb_area` VALUES ('130127', '高邑县', '130100', '3');
INSERT INTO `tb_area` VALUES ('370911', '岱岳区', '370900', '3');
INSERT INTO `tb_area` VALUES ('150403', '元宝山区', '150400', '3');
INSERT INTO `tb_area` VALUES ('441301', '市辖区', '441300', '3');
INSERT INTO `tb_area` VALUES ('130104', '桥西区', '130100', '3');
INSERT INTO `tb_area` VALUES ('140927', '神池县', '140900', '3');
INSERT INTO `tb_area` VALUES ('320400', '常州市', '320000', '2');
INSERT INTO `tb_area` VALUES ('622901', '临夏市', '622900', '3');
INSERT INTO `tb_area` VALUES ('330304', '瓯海区', '330300', '3');
INSERT INTO `tb_area` VALUES ('530624', '大关县', '530600', '3');
INSERT INTO `tb_area` VALUES ('330822', '常山县', '330800', '3');
INSERT INTO `tb_area` VALUES ('130324', '卢龙县', '130300', '3');
INSERT INTO `tb_area` VALUES ('511923', '平昌县', '511900', '3');
INSERT INTO `tb_area` VALUES ('210213', '金州区', '210200', '3');
INSERT INTO `tb_area` VALUES ('230304', '滴道区', '230300', '3');
INSERT INTO `tb_area` VALUES ('469007', '东方市', '469000', '3');
INSERT INTO `tb_area` VALUES ('520527', '赫章县', '520500', '3');
INSERT INTO `tb_area` VALUES ('110102', '西城区', '110100', '3');
INSERT INTO `tb_area` VALUES ('330106', '西湖区', '330100', '3');
INSERT INTO `tb_area` VALUES ('440232', '乳源瑶族自治县', '440200', '3');
INSERT INTO `tb_area` VALUES ('520621', '江口县', '520600', '3');
INSERT INTO `tb_area` VALUES ('371601', '市辖区', '371600', '3');
INSERT INTO `tb_area` VALUES ('620123', '榆中县', '620100', '3');
INSERT INTO `tb_area` VALUES ('370700', '潍坊市', '370000', '2');
INSERT INTO `tb_area` VALUES ('652901', '阿克苏市', '652900', '3');
INSERT INTO `tb_area` VALUES ('410184', '新郑市', '410100', '3');
INSERT INTO `tb_area` VALUES ('440224', '仁化县', '440200', '3');
INSERT INTO `tb_area` VALUES ('320813', '洪泽区', '320800', '3');
INSERT INTO `tb_area` VALUES ('210106', '铁西区', '210100', '3');
INSERT INTO `tb_area` VALUES ('110106', '丰台区', '110100', '3');
INSERT INTO `tb_area` VALUES ('620621', '民勤县', '620600', '3');
INSERT INTO `tb_area` VALUES ('130301', '市辖区', '130300', '3');
INSERT INTO `tb_area` VALUES ('420281', '大冶市', '420200', '3');
INSERT INTO `tb_area` VALUES ('440303', '罗湖区', '440300', '3');
INSERT INTO `tb_area` VALUES ('421102', '黄州区', '421100', '3');
INSERT INTO `tb_area` VALUES ('530800', '普洱市', '530000', '2');
INSERT INTO `tb_area` VALUES ('513400', '凉山彝族自治州', '510000', '2');
INSERT INTO `tb_area` VALUES ('421303', '曾都区', '421300', '3');
INSERT INTO `tb_area` VALUES ('130322', '昌黎县', '130300', '3');
INSERT INTO `tb_area` VALUES ('210423', '清原满族自治县', '210400', '3');
INSERT INTO `tb_area` VALUES ('350921', '霞浦县', '350900', '3');
INSERT INTO `tb_area` VALUES ('410328', '洛宁县', '410300', '3');
INSERT INTO `tb_area` VALUES ('610402', '秦都区', '610400', '3');
INSERT INTO `tb_area` VALUES ('370681', '龙口市', '370600', '3');
INSERT INTO `tb_area` VALUES ('513301', '康定市', '513300', '3');
INSERT INTO `tb_area` VALUES ('542427', '索县', '542400', '3');
INSERT INTO `tb_area` VALUES ('371522', '莘县', '371500', '3');
INSERT INTO `tb_area` VALUES ('640104', '兴庆区', '640100', '3');
INSERT INTO `tb_area` VALUES ('411526', '潢川县', '411500', '3');
INSERT INTO `tb_area` VALUES ('540122', '当雄县', '540100', '3');
INSERT INTO `tb_area` VALUES ('610503', '华州区', '610500', '3');
INSERT INTO `tb_area` VALUES ('330411', '秀洲区', '330400', '3');
INSERT INTO `tb_area` VALUES ('420702', '梁子湖区', '420700', '3');
INSERT INTO `tb_area` VALUES ('610900', '安康市', '610000', '2');
INSERT INTO `tb_area` VALUES ('512001', '市辖区', '512000', '3');
INSERT INTO `tb_area` VALUES ('120102', '河东区', '120100', '3');
INSERT INTO `tb_area` VALUES ('610525', '澄城县', '610500', '3');
INSERT INTO `tb_area` VALUES ('320703', '连云区', '320700', '3');
INSERT INTO `tb_area` VALUES ('340323', '固镇县', '340300', '3');
INSERT INTO `tb_area` VALUES ('340405', '八公山区', '340400', '3');
INSERT INTO `tb_area` VALUES ('152923', '额济纳旗', '152900', '3');
INSERT INTO `tb_area` VALUES ('220102', '南关区', '220100', '3');
INSERT INTO `tb_area` VALUES ('430381', '湘乡市', '430300', '3');
INSERT INTO `tb_area` VALUES ('450225', '融水苗族自治县', '450200', '3');
INSERT INTO `tb_area` VALUES ('610481', '兴平市', '610400', '3');
INSERT INTO `tb_area` VALUES ('130624', '阜平县', '130600', '3');
INSERT INTO `tb_area` VALUES ('450123', '隆安县', '450100', '3');
INSERT INTO `tb_area` VALUES ('330523', '安吉县', '330500', '3');
INSERT INTO `tb_area` VALUES ('620602', '凉州区', '620600', '3');
INSERT INTO `tb_area` VALUES ('350305', '秀屿区', '350300', '3');
INSERT INTO `tb_area` VALUES ('440902', '茂南区', '440900', '3');
INSERT INTO `tb_area` VALUES ('130500', '邢台市', '130000', '2');
INSERT INTO `tb_area` VALUES ('131028', '大厂回族自治县', '131000', '3');
INSERT INTO `tb_area` VALUES ('130427', '磁县', '130400', '3');
INSERT INTO `tb_area` VALUES ('530102', '五华区', '530100', '3');
INSERT INTO `tb_area` VALUES ('210881', '盖州市', '210800', '3');
INSERT INTO `tb_area` VALUES ('330703', '金东区', '330700', '3');
INSERT INTO `tb_area` VALUES ('230126', '巴彦县', '230100', '3');
INSERT INTO `tb_area` VALUES ('340202', '镜湖区', '340200', '3');
INSERT INTO `tb_area` VALUES ('431301', '市辖区', '431300', '3');
INSERT INTO `tb_area` VALUES ('450327', '灌阳县', '450300', '3');
INSERT INTO `tb_area` VALUES ('411522', '光山县', '411500', '3');
INSERT INTO `tb_area` VALUES ('130627', '唐县', '130600', '3');
INSERT INTO `tb_area` VALUES ('411102', '源汇区', '411100', '3');
INSERT INTO `tb_area` VALUES ('361130', '婺源县', '361100', '3');
INSERT INTO `tb_area` VALUES ('610623', '子长县', '610600', '3');
INSERT INTO `tb_area` VALUES ('350481', '永安市', '350400', '3');
INSERT INTO `tb_area` VALUES ('460106', '龙华区', '460100', '3');
INSERT INTO `tb_area` VALUES ('150122', '托克托县', '150100', '3');
INSERT INTO `tb_area` VALUES ('220211', '丰满区', '220200', '3');
INSERT INTO `tb_area` VALUES ('440233', '新丰县', '440200', '3');
INSERT INTO `tb_area` VALUES ('520523', '金沙县', '520500', '3');
INSERT INTO `tb_area` VALUES ('211001', '市辖区', '211000', '3');
INSERT INTO `tb_area` VALUES ('220621', '抚松县', '220600', '3');
INSERT INTO `tb_area` VALUES ('341623', '利辛县', '341600', '3');
INSERT INTO `tb_area` VALUES ('632722', '杂多县', '632700', '3');
INSERT INTO `tb_area` VALUES ('152200', '兴安盟', '150000', '2');
INSERT INTO `tb_area` VALUES ('500200', '县', '500000', '2');
INSERT INTO `tb_area` VALUES ('340603', '相山区', '340600', '3');
INSERT INTO `tb_area` VALUES ('630224', '化隆回族自治县', '630200', '3');
INSERT INTO `tb_area` VALUES ('130404', '复兴区', '130400', '3');
INSERT INTO `tb_area` VALUES ('130224', '滦南县', '130200', '3');
INSERT INTO `tb_area` VALUES ('220801', '市辖区', '220800', '3');
INSERT INTO `tb_area` VALUES ('620121', '永登县', '620100', '3');
INSERT INTO `tb_area` VALUES ('532300', '楚雄彝族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('654201', '塔城市', '654200', '3');
INSERT INTO `tb_area` VALUES ('450681', '东兴市', '450600', '3');
INSERT INTO `tb_area` VALUES ('410311', '洛龙区', '410300', '3');
INSERT INTO `tb_area` VALUES ('130630', '涞源县', '130600', '3');
INSERT INTO `tb_area` VALUES ('410181', '巩义市', '410100', '3');
INSERT INTO `tb_area` VALUES ('511529', '屏山县', '511500', '3');
INSERT INTO `tb_area` VALUES ('632701', '玉树市', '632700', '3');
INSERT INTO `tb_area` VALUES ('230400', '鹤岗市', '230000', '2');
INSERT INTO `tb_area` VALUES ('230712', '汤旺河区', '230700', '3');
INSERT INTO `tb_area` VALUES ('140122', '阳曲县', '140100', '3');
INSERT INTO `tb_area` VALUES ('421126', '蕲春县', '421100', '3');
INSERT INTO `tb_area` VALUES ('152529', '正镶白旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('640000', '宁夏回族自治区', '0', '1');
INSERT INTO `tb_area` VALUES ('150624', '鄂托克旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('230221', '龙江县', '230200', '3');
INSERT INTO `tb_area` VALUES ('610725', '勉县', '610700', '3');
INSERT INTO `tb_area` VALUES ('341722', '石台县', '341700', '3');
INSERT INTO `tb_area` VALUES ('433122', '泸溪县', '433100', '3');
INSERT INTO `tb_area` VALUES ('410611', '淇滨区', '410600', '3');
INSERT INTO `tb_area` VALUES ('421222', '通城县', '421200', '3');
INSERT INTO `tb_area` VALUES ('520304', '播州区', '520300', '3');
INSERT INTO `tb_area` VALUES ('440308', '盐田区', '440300', '3');
INSERT INTO `tb_area` VALUES ('510521', '泸县', '510500', '3');
INSERT INTO `tb_area` VALUES ('130600', '保定市', '130000', '2');
INSERT INTO `tb_area` VALUES ('542521', '普兰县', '542500', '3');
INSERT INTO `tb_area` VALUES ('650502', '伊州区', '650500', '3');
INSERT INTO `tb_area` VALUES ('440881', '廉江市', '440800', '3');
INSERT INTO `tb_area` VALUES ('321003', '邗江区', '321000', '3');
INSERT INTO `tb_area` VALUES ('610422', '三原县', '610400', '3');
INSERT INTO `tb_area` VALUES ('430900', '益阳市', '430000', '2');
INSERT INTO `tb_area` VALUES ('431127', '蓝山县', '431100', '3');
INSERT INTO `tb_area` VALUES ('532929', '云龙县', '532900', '3');
INSERT INTO `tb_area` VALUES ('361121', '上饶县', '361100', '3');
INSERT INTO `tb_area` VALUES ('130708', '万全区', '130700', '3');
INSERT INTO `tb_area` VALUES ('220502', '东昌区', '220500', '3');
INSERT INTO `tb_area` VALUES ('310112', '闵行区', '310100', '3');
INSERT INTO `tb_area` VALUES ('433126', '古丈县', '433100', '3');
INSERT INTO `tb_area` VALUES ('371327', '莒南县', '371300', '3');
INSERT INTO `tb_area` VALUES ('441625', '东源县', '441600', '3');
INSERT INTO `tb_area` VALUES ('150425', '克什克腾旗', '150400', '3');
INSERT INTO `tb_area` VALUES ('360983', '高安市', '360900', '3');
INSERT INTO `tb_area` VALUES ('451221', '南丹县', '451200', '3');
INSERT INTO `tb_area` VALUES ('621000', '庆阳市', '620000', '2');
INSERT INTO `tb_area` VALUES ('210311', '千山区', '210300', '3');
INSERT INTO `tb_area` VALUES ('430702', '武陵区', '430700', '3');
INSERT INTO `tb_area` VALUES ('231123', '逊克县', '231100', '3');
INSERT INTO `tb_area` VALUES ('411281', '义马市', '411200', '3');
INSERT INTO `tb_area` VALUES ('530802', '思茅区', '530800', '3');
INSERT INTO `tb_area` VALUES ('511113', '金口河区', '511100', '3');
INSERT INTO `tb_area` VALUES ('540124', '曲水县', '540100', '3');
INSERT INTO `tb_area` VALUES ('430603', '云溪区', '430600', '3');
INSERT INTO `tb_area` VALUES ('440523', '南澳县', '440500', '3');
INSERT INTO `tb_area` VALUES ('469030', '琼中黎族苗族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('430721', '安乡县', '430700', '3');
INSERT INTO `tb_area` VALUES ('230108', '平房区', '230100', '3');
INSERT INTO `tb_area` VALUES ('320831', '金湖县', '320800', '3');
INSERT INTO `tb_area` VALUES ('522600', '黔东南苗族侗族自治州', '520000', '2');
INSERT INTO `tb_area` VALUES ('522624', '三穗县', '522600', '3');
INSERT INTO `tb_area` VALUES ('411723', '平舆县', '411700', '3');
INSERT INTO `tb_area` VALUES ('451421', '扶绥县', '451400', '3');
INSERT INTO `tb_area` VALUES ('150207', '九原区', '150200', '3');
INSERT INTO `tb_area` VALUES ('320322', '沛县', '320300', '3');
INSERT INTO `tb_area` VALUES ('131024', '香河县', '131000', '3');
INSERT INTO `tb_area` VALUES ('220701', '市辖区', '220700', '3');
INSERT INTO `tb_area` VALUES ('411001', '市辖区', '411000', '3');
INSERT INTO `tb_area` VALUES ('653222', '墨玉县', '653200', '3');
INSERT INTO `tb_area` VALUES ('211122', '盘山县', '211100', '3');
INSERT INTO `tb_area` VALUES ('430700', '常德市', '430000', '2');
INSERT INTO `tb_area` VALUES ('210000', '辽宁省', '0', '1');
INSERT INTO `tb_area` VALUES ('341023', '黟县', '341000', '3');
INSERT INTO `tb_area` VALUES ('210726', '黑山县', '210700', '3');
INSERT INTO `tb_area` VALUES ('231121', '嫩江县', '231100', '3');
INSERT INTO `tb_area` VALUES ('610800', '榆林市', '610000', '2');
INSERT INTO `tb_area` VALUES ('430112', '望城区', '430100', '3');
INSERT INTO `tb_area` VALUES ('654028', '尼勒克县', '654000', '3');
INSERT INTO `tb_area` VALUES ('411221', '渑池县', '411200', '3');
INSERT INTO `tb_area` VALUES ('511526', '珙县', '511500', '3');
INSERT INTO `tb_area` VALUES ('510683', '绵竹市', '510600', '3');
INSERT INTO `tb_area` VALUES ('140724', '昔阳县', '140700', '3');
INSERT INTO `tb_area` VALUES ('630123', '湟源县', '630100', '3');
INSERT INTO `tb_area` VALUES ('371621', '惠民县', '371600', '3');
INSERT INTO `tb_area` VALUES ('331127', '景宁畲族自治县', '331100', '3');
INSERT INTO `tb_area` VALUES ('370611', '福山区', '370600', '3');
INSERT INTO `tb_area` VALUES ('520524', '织金县', '520500', '3');
INSERT INTO `tb_area` VALUES ('411600', '周口市', '410000', '2');
INSERT INTO `tb_area` VALUES ('210200', '大连市', '210000', '2');
INSERT INTO `tb_area` VALUES ('632221', '门源回族自治县', '632200', '3');
INSERT INTO `tb_area` VALUES ('632600', '果洛藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('331003', '黄岩区', '331000', '3');
INSERT INTO `tb_area` VALUES ('532530', '金平苗族瑶族傣族自治县', '532500', '3');
INSERT INTO `tb_area` VALUES ('520330', '习水县', '520300', '3');
INSERT INTO `tb_area` VALUES ('320321', '丰县', '320300', '3');
INSERT INTO `tb_area` VALUES ('532623', '西畴县', '532600', '3');
INSERT INTO `tb_area` VALUES ('532326', '大姚县', '532300', '3');
INSERT INTO `tb_area` VALUES ('520100', '贵阳市', '520000', '2');
INSERT INTO `tb_area` VALUES ('230705', '西林区', '230700', '3');
INSERT INTO `tb_area` VALUES ('441721', '阳西县', '441700', '3');
INSERT INTO `tb_area` VALUES ('430181', '浏阳市', '430100', '3');
INSERT INTO `tb_area` VALUES ('150926', '察哈尔右翼前旗', '150900', '3');
INSERT INTO `tb_area` VALUES ('441521', '海丰县', '441500', '3');
INSERT INTO `tb_area` VALUES ('230811', '郊区', '230800', '3');
INSERT INTO `tb_area` VALUES ('410102', '中原区', '410100', '3');
INSERT INTO `tb_area` VALUES ('530921', '凤庆县', '530900', '3');
INSERT INTO `tb_area` VALUES ('361000', '抚州市', '360000', '2');
INSERT INTO `tb_area` VALUES ('210113', '沈北新区', '210100', '3');
INSERT INTO `tb_area` VALUES ('440901', '市辖区', '440900', '3');
INSERT INTO `tb_area` VALUES ('230708', '美溪区', '230700', '3');
INSERT INTO `tb_area` VALUES ('141125', '柳林县', '141100', '3');
INSERT INTO `tb_area` VALUES ('430300', '湘潭市', '430000', '2');
INSERT INTO `tb_area` VALUES ('431024', '嘉禾县', '431000', '3');
INSERT INTO `tb_area` VALUES ('430103', '天心区', '430100', '3');
INSERT INTO `tb_area` VALUES ('540323', '类乌齐县', '540300', '3');
INSERT INTO `tb_area` VALUES ('511903', '恩阳区', '511900', '3');
INSERT INTO `tb_area` VALUES ('130533', '威县', '130500', '3');
INSERT INTO `tb_area` VALUES ('469026', '昌江黎族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('210211', '甘井子区', '210200', '3');
INSERT INTO `tb_area` VALUES ('411524', '商城县', '411500', '3');
INSERT INTO `tb_area` VALUES ('141022', '翼城县', '141000', '3');
INSERT INTO `tb_area` VALUES ('410725', '原阳县', '410700', '3');
INSERT INTO `tb_area` VALUES ('370800', '济宁市', '370000', '2');
INSERT INTO `tb_area` VALUES ('632621', '玛沁县', '632600', '3');
INSERT INTO `tb_area` VALUES ('513300', '甘孜藏族自治州', '510000', '2');
INSERT INTO `tb_area` VALUES ('331122', '缙云县', '331100', '3');
INSERT INTO `tb_area` VALUES ('620800', '平凉市', '620000', '2');
INSERT INTO `tb_area` VALUES ('513324', '九龙县', '513300', '3');
INSERT INTO `tb_area` VALUES ('350213', '翔安区', '350200', '3');
INSERT INTO `tb_area` VALUES ('542431', '双湖县', '542400', '3');
INSERT INTO `tb_area` VALUES ('511400', '眉山市', '510000', '2');
INSERT INTO `tb_area` VALUES ('532822', '勐海县', '532800', '3');
INSERT INTO `tb_area` VALUES ('210501', '市辖区', '210500', '3');
INSERT INTO `tb_area` VALUES ('511500', '宜宾市', '510000', '2');
INSERT INTO `tb_area` VALUES ('330602', '越城区', '330600', '3');
INSERT INTO `tb_area` VALUES ('420116', '黄陂区', '420100', '3');
INSERT INTO `tb_area` VALUES ('411726', '泌阳县', '411700', '3');
INSERT INTO `tb_area` VALUES ('360402', '濂溪区', '360400', '3');
INSERT INTO `tb_area` VALUES ('330283', '奉化市', '330200', '3');
INSERT INTO `tb_area` VALUES ('654021', '伊宁县', '654000', '3');
INSERT INTO `tb_area` VALUES ('430921', '南县', '430900', '3');
INSERT INTO `tb_area` VALUES ('611026', '柞水县', '611000', '3');
INSERT INTO `tb_area` VALUES ('610825', '定边县', '610800', '3');
INSERT INTO `tb_area` VALUES ('422802', '利川市', '422800', '3');
INSERT INTO `tb_area` VALUES ('210500', '本溪市', '210000', '2');
INSERT INTO `tb_area` VALUES ('140621', '山阴县', '140600', '3');
INSERT INTO `tb_area` VALUES ('130701', '市辖区', '130700', '3');
INSERT INTO `tb_area` VALUES ('460205', '崖州区', '460200', '3');
INSERT INTO `tb_area` VALUES ('511826', '芦山县', '511800', '3');
INSERT INTO `tb_area` VALUES ('540101', '市辖区', '540100', '3');
INSERT INTO `tb_area` VALUES ('510802', '利州区', '510800', '3');
INSERT INTO `tb_area` VALUES ('445300', '云浮市', '440000', '2');
INSERT INTO `tb_area` VALUES ('360203', '珠山区', '360200', '3');
INSERT INTO `tb_area` VALUES ('420501', '市辖区', '420500', '3');
INSERT INTO `tb_area` VALUES ('340311', '淮上区', '340300', '3');
INSERT INTO `tb_area` VALUES ('410212', '祥符区', '410200', '3');
INSERT INTO `tb_area` VALUES ('231222', '兰西县', '231200', '3');
INSERT INTO `tb_area` VALUES ('330122', '桐庐县', '330100', '3');
INSERT INTO `tb_area` VALUES ('420528', '长阳土家族自治县', '420500', '3');
INSERT INTO `tb_area` VALUES ('621026', '宁县', '621000', '3');
INSERT INTO `tb_area` VALUES ('360825', '永丰县', '360800', '3');
INSERT INTO `tb_area` VALUES ('140121', '清徐县', '140100', '3');
INSERT INTO `tb_area` VALUES ('652824', '若羌县', '652800', '3');
INSERT INTO `tb_area` VALUES ('330110', '余杭区', '330100', '3');
INSERT INTO `tb_area` VALUES ('653126', '叶城县', '653100', '3');
INSERT INTO `tb_area` VALUES ('110113', '顺义区', '110100', '3');
INSERT INTO `tb_area` VALUES ('330282', '慈溪市', '330200', '3');
INSERT INTO `tb_area` VALUES ('621025', '正宁县', '621000', '3');
INSERT INTO `tb_area` VALUES ('140431', '沁源县', '140400', '3');
INSERT INTO `tb_area` VALUES ('350681', '龙海市', '350600', '3');
INSERT INTO `tb_area` VALUES ('610929', '白河县', '610900', '3');
INSERT INTO `tb_area` VALUES ('650121', '乌鲁木齐县', '650100', '3');
INSERT INTO `tb_area` VALUES ('623023', '舟曲县', '623000', '3');
INSERT INTO `tb_area` VALUES ('610527', '白水县', '610500', '3');
INSERT INTO `tb_area` VALUES ('371000', '威海市', '370000', '2');
INSERT INTO `tb_area` VALUES ('520400', '安顺市', '520000', '2');
INSERT INTO `tb_area` VALUES ('532926', '南涧彝族自治县', '532900', '3');
INSERT INTO `tb_area` VALUES ('131025', '大城县', '131000', '3');
INSERT INTO `tb_area` VALUES ('410182', '荥阳市', '410100', '3');
INSERT INTO `tb_area` VALUES ('130705', '宣化区', '130700', '3');
INSERT INTO `tb_area` VALUES ('420503', '伍家岗区', '420500', '3');
INSERT INTO `tb_area` VALUES ('410324', '栾川县', '410300', '3');
INSERT INTO `tb_area` VALUES ('510302', '自流井区', '510300', '3');
INSERT INTO `tb_area` VALUES ('640201', '市辖区', '640200', '3');
INSERT INTO `tb_area` VALUES ('451001', '市辖区', '451000', '3');
INSERT INTO `tb_area` VALUES ('360124', '进贤县', '360100', '3');
INSERT INTO `tb_area` VALUES ('152528', '镶黄旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('630000', '青海省', '0', '1');
INSERT INTO `tb_area` VALUES ('621227', '徽县', '621200', '3');
INSERT INTO `tb_area` VALUES ('150700', '呼伦贝尔市', '150000', '2');
INSERT INTO `tb_area` VALUES ('510682', '什邡市', '510600', '3');
INSERT INTO `tb_area` VALUES ('430408', '蒸湘区', '430400', '3');
INSERT INTO `tb_area` VALUES ('321203', '高港区', '321200', '3');
INSERT INTO `tb_area` VALUES ('371328', '蒙阴县', '371300', '3');
INSERT INTO `tb_area` VALUES ('360723', '大余县', '360700', '3');
INSERT INTO `tb_area` VALUES ('230826', '桦川县', '230800', '3');
INSERT INTO `tb_area` VALUES ('370300', '淄博市', '370000', '2');
INSERT INTO `tb_area` VALUES ('411681', '项城市', '411600', '3');
INSERT INTO `tb_area` VALUES ('230882', '富锦市', '230800', '3');
INSERT INTO `tb_area` VALUES ('130121', '井陉县', '130100', '3');
INSERT INTO `tb_area` VALUES ('620623', '天祝藏族自治县', '620600', '3');
INSERT INTO `tb_area` VALUES ('420525', '远安县', '420500', '3');
INSERT INTO `tb_area` VALUES ('410728', '长垣县', '410700', '3');
INSERT INTO `tb_area` VALUES ('530602', '昭阳区', '530600', '3');
INSERT INTO `tb_area` VALUES ('610921', '汉阴县', '610900', '3');
INSERT INTO `tb_area` VALUES ('320411', '新北区', '320400', '3');
INSERT INTO `tb_area` VALUES ('630223', '互助土族自治县', '630200', '3');
INSERT INTO `tb_area` VALUES ('542421', '那曲县', '542400', '3');
INSERT INTO `tb_area` VALUES ('220402', '龙山区', '220400', '3');
INSERT INTO `tb_area` VALUES ('410325', '嵩县', '410300', '3');
INSERT INTO `tb_area` VALUES ('450203', '鱼峰区', '450200', '3');
INSERT INTO `tb_area` VALUES ('230112', '阿城区', '230100', '3');
INSERT INTO `tb_area` VALUES ('120116', '滨海新区', '120100', '3');
INSERT INTO `tb_area` VALUES ('220122', '农安县', '220100', '3');
INSERT INTO `tb_area` VALUES ('451000', '百色市', '450000', '2');
INSERT INTO `tb_area` VALUES ('361030', '广昌县', '361000', '3');
INSERT INTO `tb_area` VALUES ('411721', '西平县', '411700', '3');
INSERT INTO `tb_area` VALUES ('340601', '市辖区', '340600', '3');
INSERT INTO `tb_area` VALUES ('532627', '广南县', '532600', '3');
INSERT INTO `tb_area` VALUES ('230804', '前进区', '230800', '3');
INSERT INTO `tb_area` VALUES ('650500', '哈密市', '650000', '2');
INSERT INTO `tb_area` VALUES ('500115', '长寿区', '500100', '3');
INSERT INTO `tb_area` VALUES ('330501', '市辖区', '330500', '3');
INSERT INTO `tb_area` VALUES ('654002', '伊宁市', '654000', '3');
INSERT INTO `tb_area` VALUES ('140424', '屯留县', '140400', '3');
INSERT INTO `tb_area` VALUES ('330201', '市辖区', '330200', '3');
INSERT INTO `tb_area` VALUES ('532528', '元阳县', '532500', '3');
INSERT INTO `tb_area` VALUES ('532901', '大理市', '532900', '3');
INSERT INTO `tb_area` VALUES ('331081', '温岭市', '331000', '3');
INSERT INTO `tb_area` VALUES ('451324', '金秀瑶族自治县', '451300', '3');
INSERT INTO `tb_area` VALUES ('431229', '靖州苗族侗族自治县', '431200', '3');
INSERT INTO `tb_area` VALUES ('513331', '白玉县', '513300', '3');
INSERT INTO `tb_area` VALUES ('610926', '平利县', '610900', '3');
INSERT INTO `tb_area` VALUES ('421281', '赤壁市', '421200', '3');
INSERT INTO `tb_area` VALUES ('350504', '洛江区', '350500', '3');
INSERT INTO `tb_area` VALUES ('350924', '寿宁县', '350900', '3');
INSERT INTO `tb_area` VALUES ('652922', '温宿县', '652900', '3');
INSERT INTO `tb_area` VALUES ('360722', '信丰县', '360700', '3');
INSERT INTO `tb_area` VALUES ('620503', '麦积区', '620500', '3');
INSERT INTO `tb_area` VALUES ('141082', '霍州市', '141000', '3');
INSERT INTO `tb_area` VALUES ('361128', '鄱阳县', '361100', '3');
INSERT INTO `tb_area` VALUES ('451226', '环江毛南族自治县', '451200', '3');
INSERT INTO `tb_area` VALUES ('451381', '合山市', '451300', '3');
INSERT INTO `tb_area` VALUES ('370829', '嘉祥县', '370800', '3');
INSERT INTO `tb_area` VALUES ('410622', '淇县', '410600', '3');
INSERT INTO `tb_area` VALUES ('320117', '溧水区', '320100', '3');
INSERT INTO `tb_area` VALUES ('513231', '阿坝县', '513200', '3');
INSERT INTO `tb_area` VALUES ('530825', '镇沅彝族哈尼族拉祜族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('620302', '金川区', '620300', '3');
INSERT INTO `tb_area` VALUES ('421300', '随州市', '420000', '2');
INSERT INTO `tb_area` VALUES ('431129', '江华瑶族自治县', '431100', '3');
INSERT INTO `tb_area` VALUES ('371003', '文登区', '371000', '3');
INSERT INTO `tb_area` VALUES ('411329', '新野县', '411300', '3');
INSERT INTO `tb_area` VALUES ('310151', '崇明区', '310100', '3');
INSERT INTO `tb_area` VALUES ('621100', '定西市', '620000', '2');
INSERT INTO `tb_area` VALUES ('360826', '泰和县', '360800', '3');
INSERT INTO `tb_area` VALUES ('440403', '斗门区', '440400', '3');
INSERT INTO `tb_area` VALUES ('469022', '屯昌县', '469000', '3');
INSERT INTO `tb_area` VALUES ('320903', '盐都区', '320900', '3');
INSERT INTO `tb_area` VALUES ('230921', '勃利县', '230900', '3');
INSERT INTO `tb_area` VALUES ('411104', '召陵区', '411100', '3');
INSERT INTO `tb_area` VALUES ('610722', '城固县', '610700', '3');
INSERT INTO `tb_area` VALUES ('610630', '宜川县', '610600', '3');
INSERT INTO `tb_area` VALUES ('420529', '五峰土家族自治县', '420500', '3');
INSERT INTO `tb_area` VALUES ('340302', '龙子湖区', '340300', '3');
INSERT INTO `tb_area` VALUES ('620622', '古浪县', '620600', '3');
INSERT INTO `tb_area` VALUES ('211301', '市辖区', '211300', '3');
INSERT INTO `tb_area` VALUES ('610101', '市辖区', '610100', '3');
INSERT INTO `tb_area` VALUES ('231002', '东安区', '231000', '3');
INSERT INTO `tb_area` VALUES ('150783', '扎兰屯市', '150700', '3');
INSERT INTO `tb_area` VALUES ('410411', '湛河区', '410400', '3');
INSERT INTO `tb_area` VALUES ('350424', '宁化县', '350400', '3');
INSERT INTO `tb_area` VALUES ('120000', '天津市', '0', '1');
INSERT INTO `tb_area` VALUES ('420301', '市辖区', '420300', '3');
INSERT INTO `tb_area` VALUES ('320381', '新沂市', '320300', '3');
INSERT INTO `tb_area` VALUES ('150900', '乌兰察布市', '150000', '2');
INSERT INTO `tb_area` VALUES ('540322', '贡觉县', '540300', '3');
INSERT INTO `tb_area` VALUES ('653129', '伽师县', '653100', '3');
INSERT INTO `tb_area` VALUES ('361126', '弋阳县', '361100', '3');
INSERT INTO `tb_area` VALUES ('511602', '广安区', '511600', '3');
INSERT INTO `tb_area` VALUES ('654027', '特克斯县', '654000', '3');
INSERT INTO `tb_area` VALUES ('152527', '太仆寺旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('620701', '市辖区', '620700', '3');
INSERT INTO `tb_area` VALUES ('350527', '金门县', '350500', '3');
INSERT INTO `tb_area` VALUES ('431221', '中方县', '431200', '3');
INSERT INTO `tb_area` VALUES ('431128', '新田县', '431100', '3');
INSERT INTO `tb_area` VALUES ('210103', '沈河区', '210100', '3');
INSERT INTO `tb_area` VALUES ('330783', '东阳市', '330700', '3');
INSERT INTO `tb_area` VALUES ('152222', '科尔沁右翼中旗', '152200', '3');
INSERT INTO `tb_area` VALUES ('510106', '金牛区', '510100', '3');
INSERT INTO `tb_area` VALUES ('652800', '巴音郭楞蒙古自治州', '650000', '2');
INSERT INTO `tb_area` VALUES ('152221', '科尔沁右翼前旗', '152200', '3');
INSERT INTO `tb_area` VALUES ('340722', '枞阳县', '340700', '3');
INSERT INTO `tb_area` VALUES ('431227', '新晃侗族自治县', '431200', '3');
INSERT INTO `tb_area` VALUES ('371102', '东港区', '371100', '3');
INSERT INTO `tb_area` VALUES ('371422', '宁津县', '371400', '3');
INSERT INTO `tb_area` VALUES ('431027', '桂东县', '431000', '3');
INSERT INTO `tb_area` VALUES ('450202', '城中区', '450200', '3');
INSERT INTO `tb_area` VALUES ('230129', '延寿县', '230100', '3');
INSERT INTO `tb_area` VALUES ('440784', '鹤山市', '440700', '3');
INSERT INTO `tb_area` VALUES ('330105', '拱墅区', '330100', '3');
INSERT INTO `tb_area` VALUES ('520302', '红花岗区', '520300', '3');
INSERT INTO `tb_area` VALUES ('540330', '边坝县', '540300', '3');
INSERT INTO `tb_area` VALUES ('522631', '黎平县', '522600', '3');
INSERT INTO `tb_area` VALUES ('140981', '原平市', '140900', '3');
INSERT INTO `tb_area` VALUES ('350302', '城厢区', '350300', '3');
INSERT INTO `tb_area` VALUES ('320904', '大丰区', '320900', '3');
INSERT INTO `tb_area` VALUES ('330303', '龙湾区', '330300', '3');
INSERT INTO `tb_area` VALUES ('350200', '厦门市', '350000', '2');
INSERT INTO `tb_area` VALUES ('330800', '衢州市', '330000', '2');
INSERT INTO `tb_area` VALUES ('371703', '定陶区', '371700', '3');
INSERT INTO `tb_area` VALUES ('210381', '海城市', '210300', '3');
INSERT INTO `tb_area` VALUES ('230113', '双城区', '230100', '3');
INSERT INTO `tb_area` VALUES ('441581', '陆丰市', '441500', '3');
INSERT INTO `tb_area` VALUES ('310106', '静安区', '310100', '3');
INSERT INTO `tb_area` VALUES ('320701', '市辖区', '320700', '3');
INSERT INTO `tb_area` VALUES ('361024', '崇仁县', '361000', '3');
INSERT INTO `tb_area` VALUES ('371424', '临邑县', '371400', '3');
INSERT INTO `tb_area` VALUES ('610400', '咸阳市', '610000', '2');
INSERT INTO `tb_area` VALUES ('640401', '市辖区', '640400', '3');
INSERT INTO `tb_area` VALUES ('430400', '衡阳市', '430000', '2');
INSERT INTO `tb_area` VALUES ('140203', '矿区', '140200', '3');
INSERT INTO `tb_area` VALUES ('350783', '建瓯市', '350700', '3');
INSERT INTO `tb_area` VALUES ('440229', '翁源县', '440200', '3');
INSERT INTO `tb_area` VALUES ('150824', '乌拉特中旗', '150800', '3');
INSERT INTO `tb_area` VALUES ('370725', '昌乐县', '370700', '3');
INSERT INTO `tb_area` VALUES ('360102', '东湖区', '360100', '3');
INSERT INTO `tb_area` VALUES ('130109', '藁城区', '130100', '3');
INSERT INTO `tb_area` VALUES ('610200', '铜川市', '610000', '2');
INSERT INTO `tb_area` VALUES ('440700', '江门市', '440000', '2');
INSERT INTO `tb_area` VALUES ('440306', '宝安区', '440300', '3');
INSERT INTO `tb_area` VALUES ('211221', '铁岭县', '211200', '3');
INSERT INTO `tb_area` VALUES ('360701', '市辖区', '360700', '3');
INSERT INTO `tb_area` VALUES ('469028', '陵水黎族自治县', '469000', '3');
INSERT INTO `tb_area` VALUES ('150724', '鄂温克族自治旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('530402', '红塔区', '530400', '3');
INSERT INTO `tb_area` VALUES ('621024', '合水县', '621000', '3');
INSERT INTO `tb_area` VALUES ('320684', '海门市', '320600', '3');
INSERT INTO `tb_area` VALUES ('340322', '五河县', '340300', '3');
INSERT INTO `tb_area` VALUES ('450423', '蒙山县', '450400', '3');
INSERT INTO `tb_area` VALUES ('330601', '市辖区', '330600', '3');
INSERT INTO `tb_area` VALUES ('540127', '墨竹工卡县', '540100', '3');
INSERT INTO `tb_area` VALUES ('530181', '安宁市', '530100', '3');
INSERT INTO `tb_area` VALUES ('211302', '双塔区', '211300', '3');
INSERT INTO `tb_area` VALUES ('433124', '花垣县', '433100', '3');
INSERT INTO `tb_area` VALUES ('140225', '浑源县', '140200', '3');
INSERT INTO `tb_area` VALUES ('140123', '娄烦县', '140100', '3');
INSERT INTO `tb_area` VALUES ('140429', '武乡县', '140400', '3');
INSERT INTO `tb_area` VALUES ('340802', '迎江区', '340800', '3');
INSERT INTO `tb_area` VALUES ('140930', '河曲县', '140900', '3');
INSERT INTO `tb_area` VALUES ('140300', '阳泉市', '140000', '2');
INSERT INTO `tb_area` VALUES ('610117', '高陵区', '610100', '3');
INSERT INTO `tb_area` VALUES ('430304', '岳塘区', '430300', '3');
INSERT INTO `tb_area` VALUES ('320501', '市辖区', '320500', '3');
INSERT INTO `tb_area` VALUES ('411203', '陕州区', '411200', '3');
INSERT INTO `tb_area` VALUES ('321322', '沭阳县', '321300', '3');
INSERT INTO `tb_area` VALUES ('511300', '南充市', '510000', '2');
INSERT INTO `tb_area` VALUES ('340406', '潘集区', '340400', '3');
INSERT INTO `tb_area` VALUES ('422823', '巴东县', '422800', '3');
INSERT INTO `tb_area` VALUES ('340122', '肥东县', '340100', '3');
INSERT INTO `tb_area` VALUES ('210411', '顺城区', '210400', '3');
INSERT INTO `tb_area` VALUES ('370601', '市辖区', '370600', '3');
INSERT INTO `tb_area` VALUES ('451423', '龙州县', '451400', '3');
INSERT INTO `tb_area` VALUES ('430200', '株洲市', '430000', '2');
INSERT INTO `tb_area` VALUES ('513424', '德昌县', '513400', '3');
INSERT INTO `tb_area` VALUES ('430321', '湘潭县', '430300', '3');
INSERT INTO `tb_area` VALUES ('130423', '临漳县', '130400', '3');
INSERT INTO `tb_area` VALUES ('420323', '竹山县', '420300', '3');
INSERT INTO `tb_area` VALUES ('421083', '洪湖市', '421000', '3');
INSERT INTO `tb_area` VALUES ('653130', '巴楚县', '653100', '3');
INSERT INTO `tb_area` VALUES ('620981', '玉门市', '620900', '3');
INSERT INTO `tb_area` VALUES ('330802', '柯城区', '330800', '3');
INSERT INTO `tb_area` VALUES ('210601', '市辖区', '210600', '3');
INSERT INTO `tb_area` VALUES ('530523', '龙陵县', '530500', '3');
INSERT INTO `tb_area` VALUES ('440701', '市辖区', '440700', '3');
INSERT INTO `tb_area` VALUES ('320804', '淮阴区', '320800', '3');
INSERT INTO `tb_area` VALUES ('360781', '瑞金市', '360700', '3');
INSERT INTO `tb_area` VALUES ('420303', '张湾区', '420300', '3');
INSERT INTO `tb_area` VALUES ('500151', '铜梁区', '500100', '3');
INSERT INTO `tb_area` VALUES ('450328', '龙胜各族自治县', '450300', '3');
INSERT INTO `tb_area` VALUES ('410305', '涧西区', '410300', '3');
INSERT INTO `tb_area` VALUES ('331121', '青田县', '331100', '3');
INSERT INTO `tb_area` VALUES ('540321', '江达县', '540300', '3');
INSERT INTO `tb_area` VALUES ('360734', '寻乌县', '360700', '3');
INSERT INTO `tb_area` VALUES ('513232', '若尔盖县', '513200', '3');
INSERT INTO `tb_area` VALUES ('131026', '文安县', '131000', '3');
INSERT INTO `tb_area` VALUES ('210181', '新民市', '210100', '3');
INSERT INTO `tb_area` VALUES ('610322', '凤翔县', '610300', '3');
INSERT INTO `tb_area` VALUES ('540000', '西藏自治区', '0', '1');
INSERT INTO `tb_area` VALUES ('451030', '西林县', '451000', '3');
INSERT INTO `tb_area` VALUES ('230701', '市辖区', '230700', '3');
INSERT INTO `tb_area` VALUES ('441601', '市辖区', '441600', '3');
INSERT INTO `tb_area` VALUES ('341300', '宿州市', '340000', '2');
INSERT INTO `tb_area` VALUES ('150821', '五原县', '150800', '3');
INSERT INTO `tb_area` VALUES ('230883', '抚远市', '230800', '3');
INSERT INTO `tb_area` VALUES ('330782', '义乌市', '330700', '3');
INSERT INTO `tb_area` VALUES ('511701', '市辖区', '511700', '3');
INSERT INTO `tb_area` VALUES ('532628', '富宁县', '532600', '3');
INSERT INTO `tb_area` VALUES ('440401', '市辖区', '440400', '3');
INSERT INTO `tb_area` VALUES ('540421', '工布江达县', '540400', '3');
INSERT INTO `tb_area` VALUES ('141021', '曲沃县', '141000', '3');
INSERT INTO `tb_area` VALUES ('542424', '聂荣县', '542400', '3');
INSERT INTO `tb_area` VALUES ('420104', '硚口区', '420100', '3');
INSERT INTO `tb_area` VALUES ('640100', '银川市', '640000', '2');
INSERT INTO `tb_area` VALUES ('511525', '高县', '511500', '3');
INSERT INTO `tb_area` VALUES ('440803', '霞山区', '440800', '3');
INSERT INTO `tb_area` VALUES ('320111', '浦口区', '320100', '3');
INSERT INTO `tb_area` VALUES ('220200', '吉林市', '220000', '2');
INSERT INTO `tb_area` VALUES ('512022', '乐至县', '512000', '3');
INSERT INTO `tb_area` VALUES ('540100', '拉萨市', '540000', '2');
INSERT INTO `tb_area` VALUES ('320600', '南通市', '320000', '2');
INSERT INTO `tb_area` VALUES ('130683', '安国市', '130600', '3');
INSERT INTO `tb_area` VALUES ('370321', '桓台县', '370300', '3');
INSERT INTO `tb_area` VALUES ('130802', '双桥区', '130800', '3');
INSERT INTO `tb_area` VALUES ('430225', '炎陵县', '430200', '3');
INSERT INTO `tb_area` VALUES ('510411', '仁和区', '510400', '3');
INSERT INTO `tb_area` VALUES ('141124', '临县', '141100', '3');
INSERT INTO `tb_area` VALUES ('320612', '通州区', '320600', '3');
INSERT INTO `tb_area` VALUES ('211102', '双台子区', '211100', '3');
INSERT INTO `tb_area` VALUES ('520112', '乌当区', '520100', '3');
INSERT INTO `tb_area` VALUES ('410326', '汝阳县', '410300', '3');
INSERT INTO `tb_area` VALUES ('532325', '姚安县', '532300', '3');
INSERT INTO `tb_area` VALUES ('511403', '彭山区', '511400', '3');
INSERT INTO `tb_area` VALUES ('320682', '如皋市', '320600', '3');
INSERT INTO `tb_area` VALUES ('530124', '富民县', '530100', '3');
INSERT INTO `tb_area` VALUES ('341800', '宣城市', '340000', '2');
INSERT INTO `tb_area` VALUES ('370634', '长岛县', '370600', '3');
INSERT INTO `tb_area` VALUES ('540523', '桑日县', '540500', '3');
INSERT INTO `tb_area` VALUES ('411200', '三门峡市', '410000', '2');
INSERT INTO `tb_area` VALUES ('140922', '五台县', '140900', '3');
INSERT INTO `tb_area` VALUES ('420381', '丹江口市', '420300', '3');
INSERT INTO `tb_area` VALUES ('211100', '盘锦市', '210000', '2');
INSERT INTO `tb_area` VALUES ('120111', '西青区', '120100', '3');
INSERT INTO `tb_area` VALUES ('620500', '天水市', '620000', '2');
INSERT INTO `tb_area` VALUES ('410421', '宝丰县', '410400', '3');
INSERT INTO `tb_area` VALUES ('520603', '万山区', '520600', '3');
INSERT INTO `tb_area` VALUES ('220403', '西安区', '220400', '3');
INSERT INTO `tb_area` VALUES ('620104', '西固区', '620100', '3');
INSERT INTO `tb_area` VALUES ('450222', '柳城县', '450200', '3');
INSERT INTO `tb_area` VALUES ('650402', '高昌区', '650400', '3');
INSERT INTO `tb_area` VALUES ('610330', '凤县', '610300', '3');
INSERT INTO `tb_area` VALUES ('511325', '西充县', '511300', '3');
INSERT INTO `tb_area` VALUES ('141129', '中阳县', '141100', '3');
INSERT INTO `tb_area` VALUES ('370501', '市辖区', '370500', '3');
INSERT INTO `tb_area` VALUES ('130727', '阳原县', '130700', '3');
INSERT INTO `tb_area` VALUES ('110115', '大兴区', '110100', '3');
INSERT INTO `tb_area` VALUES ('231221', '望奎县', '231200', '3');
INSERT INTO `tb_area` VALUES ('130926', '肃宁县', '130900', '3');
INSERT INTO `tb_area` VALUES ('371603', '沾化区', '371600', '3');
INSERT INTO `tb_area` VALUES ('130706', '下花园区', '130700', '3');
INSERT INTO `tb_area` VALUES ('370304', '博山区', '370300', '3');
INSERT INTO `tb_area` VALUES ('440513', '潮阳区', '440500', '3');
INSERT INTO `tb_area` VALUES ('330402', '南湖区', '330400', '3');
INSERT INTO `tb_area` VALUES ('130430', '邱县', '130400', '3');
INSERT INTO `tb_area` VALUES ('640381', '青铜峡市', '640300', '3');
INSERT INTO `tb_area` VALUES ('621221', '成县', '621200', '3');
INSERT INTO `tb_area` VALUES ('530629', '威信县', '530600', '3');
INSERT INTO `tb_area` VALUES ('220282', '桦甸市', '220200', '3');
INSERT INTO `tb_area` VALUES ('533324', '贡山独龙族怒族自治县', '533300', '3');
INSERT INTO `tb_area` VALUES ('140211', '南郊区', '140200', '3');
INSERT INTO `tb_area` VALUES ('411202', '湖滨区', '411200', '3');
INSERT INTO `tb_area` VALUES ('371581', '临清市', '371500', '3');
INSERT INTO `tb_area` VALUES ('320312', '铜山区', '320300', '3');
INSERT INTO `tb_area` VALUES ('371322', '郯城县', '371300', '3');
INSERT INTO `tb_area` VALUES ('421122', '红安县', '421100', '3');
INSERT INTO `tb_area` VALUES ('150124', '清水河县', '150100', '3');
INSERT INTO `tb_area` VALUES ('130000', '河北省', '0', '1');
INSERT INTO `tb_area` VALUES ('620600', '武威市', '620000', '2');
INSERT INTO `tb_area` VALUES ('150404', '松山区', '150400', '3');
INSERT INTO `tb_area` VALUES ('230800', '佳木斯市', '230000', '2');
INSERT INTO `tb_area` VALUES ('430502', '双清区', '430500', '3');
INSERT INTO `tb_area` VALUES ('451229', '大化瑶族自治县', '451200', '3');
INSERT INTO `tb_area` VALUES ('620721', '肃南裕固族自治县', '620700', '3');
INSERT INTO `tb_area` VALUES ('520113', '白云区', '520100', '3');
INSERT INTO `tb_area` VALUES ('610723', '洋县', '610700', '3');
INSERT INTO `tb_area` VALUES ('632823', '天峻县', '632800', '3');
INSERT INTO `tb_area` VALUES ('441802', '清城区', '441800', '3');
INSERT INTO `tb_area` VALUES ('610922', '石泉县', '610900', '3');
INSERT INTO `tb_area` VALUES ('230711', '乌马河区', '230700', '3');
INSERT INTO `tb_area` VALUES ('440608', '高明区', '440600', '3');
INSERT INTO `tb_area` VALUES ('441602', '源城区', '441600', '3');
INSERT INTO `tb_area` VALUES ('650100', '乌鲁木齐市', '650000', '2');
INSERT INTO `tb_area` VALUES ('110108', '海淀区', '110100', '3');
INSERT INTO `tb_area` VALUES ('431202', '鹤城区', '431200', '3');
INSERT INTO `tb_area` VALUES ('522634', '雷山县', '522600', '3');
INSERT INTO `tb_area` VALUES ('360313', '湘东区', '360300', '3');
INSERT INTO `tb_area` VALUES ('140723', '和顺县', '140700', '3');
INSERT INTO `tb_area` VALUES ('650205', '乌尔禾区', '650200', '3');
INSERT INTO `tb_area` VALUES ('622927', '积石山保安族东乡族撒拉族自治县', '622900', '3');
INSERT INTO `tb_area` VALUES ('130983', '黄骅市', '130900', '3');
INSERT INTO `tb_area` VALUES ('130401', '市辖区', '130400', '3');
INSERT INTO `tb_area` VALUES ('440883', '吴川市', '440800', '3');
INSERT INTO `tb_area` VALUES ('231084', '宁安市', '231000', '3');
INSERT INTO `tb_area` VALUES ('371325', '费县', '371300', '3');
INSERT INTO `tb_area` VALUES ('520301', '市辖区', '520300', '3');
INSERT INTO `tb_area` VALUES ('610928', '旬阳县', '610900', '3');
INSERT INTO `tb_area` VALUES ('451301', '市辖区', '451300', '3');
INSERT INTO `tb_area` VALUES ('653023', '阿合奇县', '653000', '3');
INSERT INTO `tb_area` VALUES ('330881', '江山市', '330800', '3');
INSERT INTO `tb_area` VALUES ('231124', '孙吴县', '231100', '3');
INSERT INTO `tb_area` VALUES ('320706', '海州区', '320700', '3');
INSERT INTO `tb_area` VALUES ('441823', '阳山县', '441800', '3');
INSERT INTO `tb_area` VALUES ('532531', '绿春县', '532500', '3');
INSERT INTO `tb_area` VALUES ('141023', '襄汾县', '141000', '3');
INSERT INTO `tb_area` VALUES ('150826', '杭锦后旗', '150800', '3');
INSERT INTO `tb_area` VALUES ('451323', '武宣县', '451300', '3');
INSERT INTO `tb_area` VALUES ('410801', '市辖区', '410800', '3');
INSERT INTO `tb_area` VALUES ('411628', '鹿邑县', '411600', '3');
INSERT INTO `tb_area` VALUES ('222406', '和龙市', '222400', '3');
INSERT INTO `tb_area` VALUES ('220781', '扶余市', '220700', '3');
INSERT INTO `tb_area` VALUES ('420682', '老河口市', '420600', '3');
INSERT INTO `tb_area` VALUES ('130126', '灵寿县', '130100', '3');
INSERT INTO `tb_area` VALUES ('441821', '佛冈县', '441800', '3');
INSERT INTO `tb_area` VALUES ('140401', '市辖区', '140400', '3');
INSERT INTO `tb_area` VALUES ('652822', '轮台县', '652800', '3');
INSERT INTO `tb_area` VALUES ('140603', '平鲁区', '140600', '3');
INSERT INTO `tb_area` VALUES ('520521', '大方县', '520500', '3');
INSERT INTO `tb_area` VALUES ('430621', '岳阳县', '430600', '3');
INSERT INTO `tb_area` VALUES ('522730', '龙里县', '522700', '3');
INSERT INTO `tb_area` VALUES ('411724', '正阳县', '411700', '3');
INSERT INTO `tb_area` VALUES ('320101', '市辖区', '320100', '3');
INSERT INTO `tb_area` VALUES ('320611', '港闸区', '320600', '3');
INSERT INTO `tb_area` VALUES ('230100', '哈尔滨市', '230000', '2');
INSERT INTO `tb_area` VALUES ('411301', '市辖区', '411300', '3');
INSERT INTO `tb_area` VALUES ('510921', '蓬溪县', '510900', '3');
INSERT INTO `tb_area` VALUES ('340500', '马鞍山市', '340000', '2');
INSERT INTO `tb_area` VALUES ('140522', '阳城县', '140500', '3');
INSERT INTO `tb_area` VALUES ('350624', '诏安县', '350600', '3');
INSERT INTO `tb_area` VALUES ('140322', '盂县', '140300', '3');
INSERT INTO `tb_area` VALUES ('361027', '金溪县', '361000', '3');
INSERT INTO `tb_area` VALUES ('410825', '温县', '410800', '3');
INSERT INTO `tb_area` VALUES ('370285', '莱西市', '370200', '3');
INSERT INTO `tb_area` VALUES ('451225', '罗城仫佬族自治县', '451200', '3');
INSERT INTO `tb_area` VALUES ('330803', '衢江区', '330800', '3');
INSERT INTO `tb_area` VALUES ('140728', '平遥县', '140700', '3');
INSERT INTO `tb_area` VALUES ('150424', '林西县', '150400', '3');
INSERT INTO `tb_area` VALUES ('532927', '巍山彝族回族自治县', '532900', '3');
INSERT INTO `tb_area` VALUES ('430405', '珠晖区', '430400', '3');
INSERT INTO `tb_area` VALUES ('370901', '市辖区', '370900', '3');
INSERT INTO `tb_area` VALUES ('210402', '新抚区', '210400', '3');
INSERT INTO `tb_area` VALUES ('140411', '郊区', '140400', '3');
INSERT INTO `tb_area` VALUES ('450108', '良庆区', '450100', '3');
INSERT INTO `tb_area` VALUES ('632625', '久治县', '632600', '3');
INSERT INTO `tb_area` VALUES ('530829', '西盟佤族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('150902', '集宁区', '150900', '3');
INSERT INTO `tb_area` VALUES ('419000', '省直辖县级行政区划', '410000', '2');
INSERT INTO `tb_area` VALUES ('330109', '萧山区', '330100', '3');
INSERT INTO `tb_area` VALUES ('340711', '郊区', '340700', '3');
INSERT INTO `tb_area` VALUES ('140828', '夏县', '140800', '3');
INSERT INTO `tb_area` VALUES ('445100', '潮州市', '440000', '2');
INSERT INTO `tb_area` VALUES ('510524', '叙永县', '510500', '3');
INSERT INTO `tb_area` VALUES ('451281', '宜州市', '451200', '3');
INSERT INTO `tb_area` VALUES ('540223', '定日县', '540200', '3');
INSERT INTO `tb_area` VALUES ('130827', '宽城满族自治县', '130800', '3');
INSERT INTO `tb_area` VALUES ('370406', '山亭区', '370400', '3');
INSERT INTO `tb_area` VALUES ('610204', '耀州区', '610200', '3');
INSERT INTO `tb_area` VALUES ('510105', '青羊区', '510100', '3');
INSERT INTO `tb_area` VALUES ('150722', '莫力达瓦达斡尔族自治旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('130930', '孟村回族自治县', '130900', '3');
INSERT INTO `tb_area` VALUES ('610721', '南郑县', '610700', '3');
INSERT INTO `tb_area` VALUES ('130132', '元氏县', '130100', '3');
INSERT INTO `tb_area` VALUES ('330723', '武义县', '330700', '3');
INSERT INTO `tb_area` VALUES ('441825', '连山壮族瑶族自治县', '441800', '3');
INSERT INTO `tb_area` VALUES ('421023', '监利县', '421000', '3');
INSERT INTO `tb_area` VALUES ('542426', '申扎县', '542400', '3');
INSERT INTO `tb_area` VALUES ('321183', '句容市', '321100', '3');
INSERT INTO `tb_area` VALUES ('341622', '蒙城县', '341600', '3');
INSERT INTO `tb_area` VALUES ('441200', '肇庆市', '440000', '2');
INSERT INTO `tb_area` VALUES ('230500', '双鸭山市', '230000', '2');
INSERT INTO `tb_area` VALUES ('420300', '十堰市', '420000', '2');
INSERT INTO `tb_area` VALUES ('220503', '二道江区', '220500', '3');
INSERT INTO `tb_area` VALUES ('410301', '市辖区', '410300', '3');
INSERT INTO `tb_area` VALUES ('420703', '华容区', '420700', '3');
INSERT INTO `tb_area` VALUES ('150121', '土默特左旗', '150100', '3');
INSERT INTO `tb_area` VALUES ('500105', '江北区', '500100', '3');
INSERT INTO `tb_area` VALUES ('440404', '金湾区', '440400', '3');
INSERT INTO `tb_area` VALUES ('430811', '武陵源区', '430800', '3');
INSERT INTO `tb_area` VALUES ('141001', '市辖区', '141000', '3');
INSERT INTO `tb_area` VALUES ('360981', '丰城市', '360900', '3');
INSERT INTO `tb_area` VALUES ('350100', '福州市', '350000', '2');
INSERT INTO `tb_area` VALUES ('370303', '张店区', '370300', '3');
INSERT INTO `tb_area` VALUES ('450701', '市辖区', '450700', '3');
INSERT INTO `tb_area` VALUES ('230505', '四方台区', '230500', '3');
INSERT INTO `tb_area` VALUES ('220600', '白山市', '220000', '2');
INSERT INTO `tb_area` VALUES ('361029', '东乡县', '361000', '3');
INSERT INTO `tb_area` VALUES ('610000', '陕西省', '0', '1');
INSERT INTO `tb_area` VALUES ('450924', '兴业县', '450900', '3');
INSERT INTO `tb_area` VALUES ('440705', '新会区', '440700', '3');
INSERT INTO `tb_area` VALUES ('152900', '阿拉善盟', '150000', '2');
INSERT INTO `tb_area` VALUES ('140623', '右玉县', '140600', '3');
INSERT INTO `tb_area` VALUES ('210421', '抚顺县', '210400', '3');
INSERT INTO `tb_area` VALUES ('542428', '班戈县', '542400', '3');
INSERT INTO `tb_area` VALUES ('510422', '盐边县', '510400', '3');
INSERT INTO `tb_area` VALUES ('131003', '广阳区', '131000', '3');
INSERT INTO `tb_area` VALUES ('211381', '北票市', '211300', '3');
INSERT INTO `tb_area` VALUES ('210802', '站前区', '210800', '3');
INSERT INTO `tb_area` VALUES ('530502', '隆阳区', '530500', '3');
INSERT INTO `tb_area` VALUES ('511823', '汉源县', '511800', '3');
INSERT INTO `tb_area` VALUES ('520103', '云岩区', '520100', '3');
INSERT INTO `tb_area` VALUES ('230300', '鸡西市', '230000', '2');
INSERT INTO `tb_area` VALUES ('650521', '巴里坤哈萨克自治县', '650500', '3');
INSERT INTO `tb_area` VALUES ('530626', '绥江县', '530600', '3');
INSERT INTO `tb_area` VALUES ('510304', '大安区', '510300', '3');
INSERT INTO `tb_area` VALUES ('430626', '平江县', '430600', '3');
INSERT INTO `tb_area` VALUES ('130306', '抚宁区', '130300', '3');
INSERT INTO `tb_area` VALUES ('341821', '郎溪县', '341800', '3');
INSERT INTO `tb_area` VALUES ('222424', '汪清县', '222400', '3');
INSERT INTO `tb_area` VALUES ('654221', '额敏县', '654200', '3');
INSERT INTO `tb_area` VALUES ('410106', '上街区', '410100', '3');
INSERT INTO `tb_area` VALUES ('530926', '耿马傣族佤族自治县', '530900', '3');
INSERT INTO `tb_area` VALUES ('230128', '通河县', '230100', '3');
INSERT INTO `tb_area` VALUES ('440113', '番禺区', '440100', '3');
INSERT INTO `tb_area` VALUES ('220422', '东辽县', '220400', '3');
INSERT INTO `tb_area` VALUES ('320412', '武进区', '320400', '3');
INSERT INTO `tb_area` VALUES ('410503', '北关区', '410500', '3');
INSERT INTO `tb_area` VALUES ('370828', '金乡县', '370800', '3');
INSERT INTO `tb_area` VALUES ('361102', '信州区', '361100', '3');
INSERT INTO `tb_area` VALUES ('421001', '市辖区', '421000', '3');
INSERT INTO `tb_area` VALUES ('411303', '卧龙区', '411300', '3');
INSERT INTO `tb_area` VALUES ('230521', '集贤县', '230500', '3');
INSERT INTO `tb_area` VALUES ('350104', '仓山区', '350100', '3');
INSERT INTO `tb_area` VALUES ('510113', '青白江区', '510100', '3');
INSERT INTO `tb_area` VALUES ('210921', '阜新蒙古族自治县', '210900', '3');
INSERT INTO `tb_area` VALUES ('140108', '尖草坪区', '140100', '3');
INSERT INTO `tb_area` VALUES ('522632', '榕江县', '522600', '3');
INSERT INTO `tb_area` VALUES ('320413', '金坛区', '320400', '3');
INSERT INTO `tb_area` VALUES ('431224', '溆浦县', '431200', '3');
INSERT INTO `tb_area` VALUES ('131126', '故城县', '131100', '3');
INSERT INTO `tb_area` VALUES ('640324', '同心县', '640300', '3');
INSERT INTO `tb_area` VALUES ('410823', '武陟县', '410800', '3');
INSERT INTO `tb_area` VALUES ('620200', '嘉峪关市', '620000', '2');
INSERT INTO `tb_area` VALUES ('430682', '临湘市', '430600', '3');
INSERT INTO `tb_area` VALUES ('340504', '雨山区', '340500', '3');
INSERT INTO `tb_area` VALUES ('431322', '新化县', '431300', '3');
INSERT INTO `tb_area` VALUES ('370000', '山东省', '0', '1');
INSERT INTO `tb_area` VALUES ('420900', '孝感市', '420000', '2');
INSERT INTO `tb_area` VALUES ('420526', '兴山县', '420500', '3');
INSERT INTO `tb_area` VALUES ('130728', '怀安县', '130700', '3');
INSERT INTO `tb_area` VALUES ('150901', '市辖区', '150900', '3');
INSERT INTO `tb_area` VALUES ('130702', '桥东区', '130700', '3');
INSERT INTO `tb_area` VALUES ('370782', '诸城市', '370700', '3');
INSERT INTO `tb_area` VALUES ('542422', '嘉黎县', '542400', '3');
INSERT INTO `tb_area` VALUES ('530321', '马龙县', '530300', '3');
INSERT INTO `tb_area` VALUES ('210100', '沈阳市', '210000', '2');
INSERT INTO `tb_area` VALUES ('430701', '市辖区', '430700', '3');
INSERT INTO `tb_area` VALUES ('511028', '隆昌县', '511000', '3');
INSERT INTO `tb_area` VALUES ('211382', '凌源市', '211300', '3');
INSERT INTO `tb_area` VALUES ('310109', '虹口区', '310100', '3');
INSERT INTO `tb_area` VALUES ('130531', '广宗县', '130500', '3');
INSERT INTO `tb_area` VALUES ('540325', '察雅县', '540300', '3');
INSERT INTO `tb_area` VALUES ('360222', '浮梁县', '360200', '3');
INSERT INTO `tb_area` VALUES ('431226', '麻阳苗族自治县', '431200', '3');
INSERT INTO `tb_area` VALUES ('451224', '东兰县', '451200', '3');
INSERT INTO `tb_area` VALUES ('650101', '市辖区', '650100', '3');
INSERT INTO `tb_area` VALUES ('530623', '盐津县', '530600', '3');
INSERT INTO `tb_area` VALUES ('610621', '延长县', '610600', '3');
INSERT INTO `tb_area` VALUES ('621125', '漳县', '621100', '3');
INSERT INTO `tb_area` VALUES ('150304', '乌达区', '150300', '3');
INSERT INTO `tb_area` VALUES ('632324', '河南蒙古族自治县', '632300', '3');
INSERT INTO `tb_area` VALUES ('511321', '南部县', '511300', '3');
INSERT INTO `tb_area` VALUES ('141030', '大宁县', '141000', '3');
INSERT INTO `tb_area` VALUES ('654323', '福海县', '654300', '3');
INSERT INTO `tb_area` VALUES ('411626', '淮阳县', '411600', '3');
INSERT INTO `tb_area` VALUES ('210504', '明山区', '210500', '3');
INSERT INTO `tb_area` VALUES ('420502', '西陵区', '420500', '3');
INSERT INTO `tb_area` VALUES ('350781', '邵武市', '350700', '3');
INSERT INTO `tb_area` VALUES ('610104', '莲湖区', '610100', '3');
INSERT INTO `tb_area` VALUES ('361022', '黎川县', '361000', '3');
INSERT INTO `tb_area` VALUES ('360828', '万安县', '360800', '3');
INSERT INTO `tb_area` VALUES ('520322', '桐梓县', '520300', '3');
INSERT INTO `tb_area` VALUES ('210422', '新宾满族自治县', '210400', '3');
INSERT INTO `tb_area` VALUES ('341824', '绩溪县', '341800', '3');
INSERT INTO `tb_area` VALUES ('131002', '安次区', '131000', '3');
INSERT INTO `tb_area` VALUES ('130208', '丰润区', '130200', '3');
INSERT INTO `tb_area` VALUES ('500112', '渝北区', '500100', '3');
INSERT INTO `tb_area` VALUES ('650204', '白碱滩区', '650200', '3');
INSERT INTO `tb_area` VALUES ('450405', '长洲区', '450400', '3');
INSERT INTO `tb_area` VALUES ('440982', '化州市', '440900', '3');
INSERT INTO `tb_area` VALUES ('350430', '建宁县', '350400', '3');
INSERT INTO `tb_area` VALUES ('150923', '商都县', '150900', '3');
INSERT INTO `tb_area` VALUES ('640181', '灵武市', '640100', '3');
INSERT INTO `tb_area` VALUES ('659000', '自治区直辖县级行政区划', '650000', '2');
INSERT INTO `tb_area` VALUES ('632224', '刚察县', '632200', '3');
INSERT INTO `tb_area` VALUES ('500100', '重庆市', '500000', '2');
INSERT INTO `tb_area` VALUES ('370523', '广饶县', '370500', '3');
INSERT INTO `tb_area` VALUES ('150626', '乌审旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('460000', '海南省', '0', '1');
INSERT INTO `tb_area` VALUES ('321111', '润州区', '321100', '3');
INSERT INTO `tb_area` VALUES ('421000', '荆州市', '420000', '2');
INSERT INTO `tb_area` VALUES ('510623', '中江县', '510600', '3');
INSERT INTO `tb_area` VALUES ('450330', '平乐县', '450300', '3');
INSERT INTO `tb_area` VALUES ('450323', '灵川县', '450300', '3');
INSERT INTO `tb_area` VALUES ('511181', '峨眉山市', '511100', '3');
INSERT INTO `tb_area` VALUES ('513329', '新龙县', '513300', '3');
INSERT INTO `tb_area` VALUES ('231201', '市辖区', '231200', '3');
INSERT INTO `tb_area` VALUES ('433130', '龙山县', '433100', '3');
INSERT INTO `tb_area` VALUES ('360600', '鹰潭市', '360000', '2');
INSERT INTO `tb_area` VALUES ('350124', '闽清县', '350100', '3');
INSERT INTO `tb_area` VALUES ('440900', '茂名市', '440000', '2');
INSERT INTO `tb_area` VALUES ('211003', '文圣区', '211000', '3');
INSERT INTO `tb_area` VALUES ('130732', '赤城县', '130700', '3');
INSERT INTO `tb_area` VALUES ('310118', '青浦区', '310100', '3');
INSERT INTO `tb_area` VALUES ('540324', '丁青县', '540300', '3');
INSERT INTO `tb_area` VALUES ('320602', '崇川区', '320600', '3');
INSERT INTO `tb_area` VALUES ('411024', '鄢陵县', '411000', '3');
INSERT INTO `tb_area` VALUES ('422826', '咸丰县', '422800', '3');
INSERT INTO `tb_area` VALUES ('450881', '桂平市', '450800', '3');
INSERT INTO `tb_area` VALUES ('141081', '侯马市', '141000', '3');
INSERT INTO `tb_area` VALUES ('540224', '萨迦县', '540200', '3');
INSERT INTO `tb_area` VALUES ('511523', '江安县', '511500', '3');
INSERT INTO `tb_area` VALUES ('650202', '独山子区', '650200', '3');
INSERT INTO `tb_area` VALUES ('410225', '兰考县', '410200', '3');
INSERT INTO `tb_area` VALUES ('360829', '安福县', '360800', '3');
INSERT INTO `tb_area` VALUES ('500230', '丰都县', '500200', '3');
INSERT INTO `tb_area` VALUES ('620902', '肃州区', '620900', '3');
INSERT INTO `tb_area` VALUES ('620801', '市辖区', '620800', '3');
INSERT INTO `tb_area` VALUES ('341021', '歙县', '341000', '3');
INSERT INTO `tb_area` VALUES ('640521', '中宁县', '640500', '3');
INSERT INTO `tb_area` VALUES ('320324', '睢宁县', '320300', '3');
INSERT INTO `tb_area` VALUES ('513428', '普格县', '513400', '3');
INSERT INTO `tb_area` VALUES ('130227', '迁西县', '130200', '3');
INSERT INTO `tb_area` VALUES ('440114', '花都区', '440100', '3');
INSERT INTO `tb_area` VALUES ('230623', '林甸县', '230600', '3');
INSERT INTO `tb_area` VALUES ('451302', '兴宾区', '451300', '3');
INSERT INTO `tb_area` VALUES ('632200', '海北藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('520122', '息烽县', '520100', '3');
INSERT INTO `tb_area` VALUES ('450311', '雁山区', '450300', '3');
INSERT INTO `tb_area` VALUES ('630121', '大通回族土族自治县', '630100', '3');
INSERT INTO `tb_area` VALUES ('230101', '市辖区', '230100', '3');
INSERT INTO `tb_area` VALUES ('150102', '新城区', '150100', '3');
INSERT INTO `tb_area` VALUES ('211404', '南票区', '211400', '3');
INSERT INTO `tb_area` VALUES ('513322', '泸定县', '513300', '3');
INSERT INTO `tb_area` VALUES ('532923', '祥云县', '532900', '3');
INSERT INTO `tb_area` VALUES ('341822', '广德县', '341800', '3');
INSERT INTO `tb_area` VALUES ('430000', '湖南省', '0', '1');
INSERT INTO `tb_area` VALUES ('620521', '清水县', '620500', '3');
INSERT INTO `tb_area` VALUES ('410506', '龙安区', '410500', '3');
INSERT INTO `tb_area` VALUES ('110105', '朝阳区', '110100', '3');
INSERT INTO `tb_area` VALUES ('320581', '常熟市', '320500', '3');
INSERT INTO `tb_area` VALUES ('410581', '林州市', '410500', '3');
INSERT INTO `tb_area` VALUES ('140430', '沁县', '140400', '3');
INSERT INTO `tb_area` VALUES ('532504', '弥勒市', '532500', '3');
INSERT INTO `tb_area` VALUES ('411327', '社旗县', '411300', '3');
INSERT INTO `tb_area` VALUES ('520600', '铜仁市', '520000', '2');
INSERT INTO `tb_area` VALUES ('433101', '吉首市', '433100', '3');
INSERT INTO `tb_area` VALUES ('510321', '荣县', '510300', '3');
INSERT INTO `tb_area` VALUES ('350304', '荔城区', '350300', '3');
INSERT INTO `tb_area` VALUES ('321302', '宿城区', '321300', '3');
INSERT INTO `tb_area` VALUES ('340103', '庐阳区', '340100', '3');
INSERT INTO `tb_area` VALUES ('421022', '公安县', '421000', '3');
INSERT INTO `tb_area` VALUES ('511527', '筠连县', '511500', '3');
INSERT INTO `tb_area` VALUES ('230111', '呼兰区', '230100', '3');
INSERT INTO `tb_area` VALUES ('451022', '田东县', '451000', '3');
INSERT INTO `tb_area` VALUES ('441624', '和平县', '441600', '3');
INSERT INTO `tb_area` VALUES ('371001', '市辖区', '371000', '3');
INSERT INTO `tb_area` VALUES ('320801', '市辖区', '320800', '3');
INSERT INTO `tb_area` VALUES ('210505', '南芬区', '210500', '3');
INSERT INTO `tb_area` VALUES ('430624', '湘阴县', '430600', '3');
INSERT INTO `tb_area` VALUES ('513200', '阿坝藏族羌族自治州', '510000', '2');
INSERT INTO `tb_area` VALUES ('410425', '郏县', '410400', '3');
INSERT INTO `tb_area` VALUES ('110109', '门头沟区', '110100', '3');
INSERT INTO `tb_area` VALUES ('141025', '古县', '141000', '3');
INSERT INTO `tb_area` VALUES ('370703', '寒亭区', '370700', '3');
INSERT INTO `tb_area` VALUES ('532524', '建水县', '532500', '3');
INSERT INTO `tb_area` VALUES ('130608', '清苑区', '130600', '3');
INSERT INTO `tb_area` VALUES ('430481', '耒阳市', '430400', '3');
INSERT INTO `tb_area` VALUES ('140824', '稷山县', '140800', '3');
INSERT INTO `tb_area` VALUES ('441621', '紫金县', '441600', '3');
INSERT INTO `tb_area` VALUES ('150222', '固阳县', '150200', '3');
INSERT INTO `tb_area` VALUES ('513337', '稻城县', '513300', '3');
INSERT INTO `tb_area` VALUES ('440203', '武江区', '440200', '3');
INSERT INTO `tb_area` VALUES ('230123', '依兰县', '230100', '3');
INSERT INTO `tb_area` VALUES ('441427', '蕉岭县', '441400', '3');
INSERT INTO `tb_area` VALUES ('621228', '两当县', '621200', '3');
INSERT INTO `tb_area` VALUES ('350501', '市辖区', '350500', '3');
INSERT INTO `tb_area` VALUES ('320302', '鼓楼区', '320300', '3');
INSERT INTO `tb_area` VALUES ('210803', '西市区', '210800', '3');
INSERT INTO `tb_area` VALUES ('510184', '崇州市', '510100', '3');
INSERT INTO `tb_area` VALUES ('360801', '市辖区', '360800', '3');
INSERT INTO `tb_area` VALUES ('410322', '孟津县', '410300', '3');
INSERT INTO `tb_area` VALUES ('141127', '岚县', '141100', '3');
INSERT INTO `tb_area` VALUES ('654024', '巩留县', '654000', '3');
INSERT INTO `tb_area` VALUES ('420205', '铁山区', '420200', '3');
INSERT INTO `tb_area` VALUES ('410202', '龙亭区', '410200', '3');
INSERT INTO `tb_area` VALUES ('511000', '内江市', '510000', '2');
INSERT INTO `tb_area` VALUES ('420624', '南漳县', '420600', '3');
INSERT INTO `tb_area` VALUES ('150500', '通辽市', '150000', '2');
INSERT INTO `tb_area` VALUES ('371728', '东明县', '371700', '3');
INSERT INTO `tb_area` VALUES ('230715', '红星区', '230700', '3');
INSERT INTO `tb_area` VALUES ('330726', '浦江县', '330700', '3');
INSERT INTO `tb_area` VALUES ('440512', '濠江区', '440500', '3');
INSERT INTO `tb_area` VALUES ('140882', '河津市', '140800', '3');
INSERT INTO `tb_area` VALUES ('530381', '宣威市', '530300', '3');
INSERT INTO `tb_area` VALUES ('341001', '市辖区', '341000', '3');
INSERT INTO `tb_area` VALUES ('230881', '同江市', '230800', '3');
INSERT INTO `tb_area` VALUES ('440904', '电白区', '440900', '3');
INSERT INTO `tb_area` VALUES ('440101', '市辖区', '440100', '3');
INSERT INTO `tb_area` VALUES ('420101', '市辖区', '420100', '3');
INSERT INTO `tb_area` VALUES ('410422', '叶县', '410400', '3');
INSERT INTO `tb_area` VALUES ('430104', '岳麓区', '430100', '3');
INSERT INTO `tb_area` VALUES ('652702', '阿拉山口市', '652700', '3');
INSERT INTO `tb_area` VALUES ('370923', '东平县', '370900', '3');
INSERT INTO `tb_area` VALUES ('131082', '三河市', '131000', '3');
INSERT INTO `tb_area` VALUES ('650105', '水磨沟区', '650100', '3');
INSERT INTO `tb_area` VALUES ('140402', '城区', '140400', '3');
INSERT INTO `tb_area` VALUES ('350425', '大田县', '350400', '3');
INSERT INTO `tb_area` VALUES ('331024', '仙居县', '331000', '3');
INSERT INTO `tb_area` VALUES ('532322', '双柏县', '532300', '3');
INSERT INTO `tb_area` VALUES ('340300', '蚌埠市', '340000', '2');
INSERT INTO `tb_area` VALUES ('640423', '隆德县', '640400', '3');
INSERT INTO `tb_area` VALUES ('440111', '白云区', '440100', '3');
INSERT INTO `tb_area` VALUES ('330522', '长兴县', '330500', '3');
INSERT INTO `tb_area` VALUES ('220381', '公主岭市', '220300', '3');
INSERT INTO `tb_area` VALUES ('511133', '马边彝族自治县', '511100', '3');
INSERT INTO `tb_area` VALUES ('230205', '昂昂溪区', '230200', '3');
INSERT INTO `tb_area` VALUES ('371501', '市辖区', '371500', '3');
INSERT INTO `tb_area` VALUES ('130581', '南宫市', '130500', '3');
INSERT INTO `tb_area` VALUES ('211481', '兴城市', '211400', '3');
INSERT INTO `tb_area` VALUES ('131102', '桃城区', '131100', '3');
INSERT INTO `tb_area` VALUES ('140106', '迎泽区', '140100', '3');
INSERT INTO `tb_area` VALUES ('445301', '市辖区', '445300', '3');
INSERT INTO `tb_area` VALUES ('533325', '兰坪白族普米族自治县', '533300', '3');
INSERT INTO `tb_area` VALUES ('371623', '无棣县', '371600', '3');
INSERT INTO `tb_area` VALUES ('141028', '吉县', '141000', '3');
INSERT INTO `tb_area` VALUES ('210114', '于洪区', '210100', '3');
INSERT INTO `tb_area` VALUES ('140830', '芮城县', '140800', '3');
INSERT INTO `tb_area` VALUES ('210604', '振安区', '210600', '3');
INSERT INTO `tb_area` VALUES ('445224', '惠来县', '445200', '3');
INSERT INTO `tb_area` VALUES ('610426', '永寿县', '610400', '3');
INSERT INTO `tb_area` VALUES ('371403', '陵城区', '371400', '3');
INSERT INTO `tb_area` VALUES ('410000', '河南省', '0', '1');
INSERT INTO `tb_area` VALUES ('450421', '苍梧县', '450400', '3');
INSERT INTO `tb_area` VALUES ('350600', '漳州市', '350000', '2');
INSERT INTO `tb_area` VALUES ('511781', '万源市', '511700', '3');
INSERT INTO `tb_area` VALUES ('610729', '留坝县', '610700', '3');
INSERT INTO `tb_area` VALUES ('450422', '藤县', '450400', '3');
INSERT INTO `tb_area` VALUES ('340881', '桐城市', '340800', '3');
INSERT INTO `tb_area` VALUES ('360112', '新建区', '360100', '3');
INSERT INTO `tb_area` VALUES ('530122', '晋宁县', '530100', '3');
INSERT INTO `tb_area` VALUES ('220582', '集安市', '220500', '3');
INSERT INTO `tb_area` VALUES ('533300', '怒江傈僳族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('320508', '姑苏区', '320500', '3');
INSERT INTO `tb_area` VALUES ('152524', '苏尼特右旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('411725', '确山县', '411700', '3');
INSERT INTO `tb_area` VALUES ('360602', '月湖区', '360600', '3');
INSERT INTO `tb_area` VALUES ('653128', '岳普湖县', '653100', '3');
INSERT INTO `tb_area` VALUES ('140423', '襄垣县', '140400', '3');
INSERT INTO `tb_area` VALUES ('130400', '邯郸市', '130000', '2');
INSERT INTO `tb_area` VALUES ('370402', '市中区', '370400', '3');
INSERT INTO `tb_area` VALUES ('360901', '市辖区', '360900', '3');
INSERT INTO `tb_area` VALUES ('410329', '伊川县', '410300', '3');
INSERT INTO `tb_area` VALUES ('610424', '乾县', '610400', '3');
INSERT INTO `tb_area` VALUES ('451031', '隆林各族自治县', '451000', '3');
INSERT INTO `tb_area` VALUES ('530424', '华宁县', '530400', '3');
INSERT INTO `tb_area` VALUES ('361129', '万年县', '361100', '3');
INSERT INTO `tb_area` VALUES ('320582', '张家港市', '320500', '3');
INSERT INTO `tb_area` VALUES ('130201', '市辖区', '130200', '3');
INSERT INTO `tb_area` VALUES ('441424', '五华县', '441400', '3');
INSERT INTO `tb_area` VALUES ('450205', '柳北区', '450200', '3');
INSERT INTO `tb_area` VALUES ('410781', '卫辉市', '410700', '3');
INSERT INTO `tb_area` VALUES ('530621', '鲁甸县', '530600', '3');
INSERT INTO `tb_area` VALUES ('130800', '承德市', '130000', '2');
INSERT INTO `tb_area` VALUES ('611022', '丹凤县', '611000', '3');
INSERT INTO `tb_area` VALUES ('360202', '昌江区', '360200', '3');
INSERT INTO `tb_area` VALUES ('650203', '克拉玛依区', '650200', '3');
INSERT INTO `tb_area` VALUES ('540202', '桑珠孜区', '540200', '3');
INSERT INTO `tb_area` VALUES ('340100', '合肥市', '340000', '2');
INSERT INTO `tb_area` VALUES ('451002', '右江区', '451000', '3');
INSERT INTO `tb_area` VALUES ('530923', '永德县', '530900', '3');
INSERT INTO `tb_area` VALUES ('350421', '明溪县', '350400', '3');
INSERT INTO `tb_area` VALUES ('520200', '六盘水市', '520000', '2');
INSERT INTO `tb_area` VALUES ('621121', '通渭县', '621100', '3');
INSERT INTO `tb_area` VALUES ('150400', '赤峰市', '150000', '2');
INSERT INTO `tb_area` VALUES ('511827', '宝兴县', '511800', '3');
INSERT INTO `tb_area` VALUES ('652325', '奇台县', '652300', '3');
INSERT INTO `tb_area` VALUES ('530302', '麒麟区', '530300', '3');
INSERT INTO `tb_area` VALUES ('140902', '忻府区', '140900', '3');
INSERT INTO `tb_area` VALUES ('210521', '本溪满族自治县', '210500', '3');
INSERT INTO `tb_area` VALUES ('220882', '大安市', '220800', '3');
INSERT INTO `tb_area` VALUES ('522726', '独山县', '522700', '3');
INSERT INTO `tb_area` VALUES ('320115', '江宁区', '320100', '3');
INSERT INTO `tb_area` VALUES ('220421', '东丰县', '220400', '3');
INSERT INTO `tb_area` VALUES ('610522', '潼关县', '610500', '3');
INSERT INTO `tb_area` VALUES ('350125', '永泰县', '350100', '3');
INSERT INTO `tb_area` VALUES ('220105', '二道区', '220100', '3');
INSERT INTO `tb_area` VALUES ('530826', '江城哈尼族彝族自治县', '530800', '3');
INSERT INTO `tb_area` VALUES ('441781', '阳春市', '441700', '3');
INSERT INTO `tb_area` VALUES ('610102', '新城区', '610100', '3');
INSERT INTO `tb_area` VALUES ('610826', '绥德县', '610800', '3');
INSERT INTO `tb_area` VALUES ('430511', '北塔区', '430500', '3');
INSERT INTO `tb_area` VALUES ('520181', '清镇市', '520100', '3');
INSERT INTO `tb_area` VALUES ('440605', '南海区', '440600', '3');
INSERT INTO `tb_area` VALUES ('230127', '木兰县', '230100', '3');
INSERT INTO `tb_area` VALUES ('330281', '余姚市', '330200', '3');
INSERT INTO `tb_area` VALUES ('431102', '零陵区', '431100', '3');
INSERT INTO `tb_area` VALUES ('654321', '布尔津县', '654300', '3');
INSERT INTO `tb_area` VALUES ('510812', '朝天区', '510800', '3');
INSERT INTO `tb_area` VALUES ('620821', '泾川县', '620800', '3');
INSERT INTO `tb_area` VALUES ('340104', '蜀山区', '340100', '3');
INSERT INTO `tb_area` VALUES ('230281', '讷河市', '230200', '3');
INSERT INTO `tb_area` VALUES ('431100', '永州市', '430000', '2');
INSERT INTO `tb_area` VALUES ('410423', '鲁山县', '410400', '3');
INSERT INTO `tb_area` VALUES ('451026', '那坡县', '451000', '3');
INSERT INTO `tb_area` VALUES ('513325', '雅江县', '513300', '3');
INSERT INTO `tb_area` VALUES ('522702', '福泉市', '522700', '3');
INSERT INTO `tb_area` VALUES ('611001', '市辖区', '611000', '3');
INSERT INTO `tb_area` VALUES ('630102', '城东区', '630100', '3');
INSERT INTO `tb_area` VALUES ('141101', '市辖区', '141100', '3');
INSERT INTO `tb_area` VALUES ('211004', '宏伟区', '211000', '3');
INSERT INTO `tb_area` VALUES ('370602', '芝罘区', '370600', '3');
INSERT INTO `tb_area` VALUES ('360400', '九江市', '360000', '2');
INSERT INTO `tb_area` VALUES ('330204', '江东区', '330200', '3');
INSERT INTO `tb_area` VALUES ('522325', '贞丰县', '522300', '3');
INSERT INTO `tb_area` VALUES ('411622', '西华县', '411600', '3');
INSERT INTO `tb_area` VALUES ('640500', '中卫市', '640000', '2');
INSERT INTO `tb_area` VALUES ('150524', '库伦旗', '150500', '3');
INSERT INTO `tb_area` VALUES ('410200', '开封市', '410000', '2');
INSERT INTO `tb_area` VALUES ('430124', '宁乡县', '430100', '3');
INSERT INTO `tb_area` VALUES ('211224', '昌图县', '211200', '3');
INSERT INTO `tb_area` VALUES ('371300', '临沂市', '370000', '2');
INSERT INTO `tb_area` VALUES ('430611', '君山区', '430600', '3');
INSERT INTO `tb_area` VALUES ('341801', '市辖区', '341800', '3');
INSERT INTO `tb_area` VALUES ('370785', '高密市', '370700', '3');
INSERT INTO `tb_area` VALUES ('441223', '广宁县', '441200', '3');
INSERT INTO `tb_area` VALUES ('410108', '惠济区', '410100', '3');
INSERT INTO `tb_area` VALUES ('350111', '晋安区', '350100', '3');
INSERT INTO `tb_area` VALUES ('522323', '普安县', '522300', '3');
INSERT INTO `tb_area` VALUES ('440823', '遂溪县', '440800', '3');
INSERT INTO `tb_area` VALUES ('350881', '漳平市', '350800', '3');
INSERT INTO `tb_area` VALUES ('210782', '北镇市', '210700', '3');
INSERT INTO `tb_area` VALUES ('659001', '石河子市', '659000', '3');
INSERT INTO `tb_area` VALUES ('130434', '魏县', '130400', '3');
INSERT INTO `tb_area` VALUES ('540234', '吉隆县', '540200', '3');
INSERT INTO `tb_area` VALUES ('500153', '荣昌区', '500100', '3');
INSERT INTO `tb_area` VALUES ('411700', '驻马店市', '410000', '2');
INSERT INTO `tb_area` VALUES ('340400', '淮南市', '340000', '2');
INSERT INTO `tb_area` VALUES ('130582', '沙河市', '130500', '3');
INSERT INTO `tb_area` VALUES ('610602', '宝塔区', '610600', '3');
INSERT INTO `tb_area` VALUES ('500236', '奉节县', '500200', '3');
INSERT INTO `tb_area` VALUES ('469002', '琼海市', '469000', '3');
INSERT INTO `tb_area` VALUES ('320104', '秦淮区', '320100', '3');
INSERT INTO `tb_area` VALUES ('220101', '市辖区', '220100', '3');
INSERT INTO `tb_area` VALUES ('141181', '孝义市', '141100', '3');
INSERT INTO `tb_area` VALUES ('450400', '梧州市', '450000', '2');
INSERT INTO `tb_area` VALUES ('451123', '富川瑶族自治县', '451100', '3');
INSERT INTO `tb_area` VALUES ('430302', '雨湖区', '430300', '3');
INSERT INTO `tb_area` VALUES ('441523', '陆河县', '441500', '3');
INSERT INTO `tb_area` VALUES ('540422', '米林县', '540400', '3');
INSERT INTO `tb_area` VALUES ('460202', '海棠区', '460200', '3');
INSERT INTO `tb_area` VALUES ('140427', '壶关县', '140400', '3');
INSERT INTO `tb_area` VALUES ('450981', '北流市', '450900', '3');
INSERT INTO `tb_area` VALUES ('350722', '浦城县', '350700', '3');
INSERT INTO `tb_area` VALUES ('211104', '大洼区', '211100', '3');
INSERT INTO `tb_area` VALUES ('130901', '市辖区', '130900', '3');
INSERT INTO `tb_area` VALUES ('210600', '丹东市', '210000', '2');
INSERT INTO `tb_area` VALUES ('652301', '昌吉市', '652300', '3');
INSERT INTO `tb_area` VALUES ('430102', '芙蓉区', '430100', '3');
INSERT INTO `tb_area` VALUES ('130602', '竞秀区', '130600', '3');
INSERT INTO `tb_area` VALUES ('360803', '青原区', '360800', '3');
INSERT INTO `tb_area` VALUES ('440601', '市辖区', '440600', '3');
INSERT INTO `tb_area` VALUES ('130283', '迁安市', '130200', '3');
INSERT INTO `tb_area` VALUES ('530501', '市辖区', '530500', '3');
INSERT INTO `tb_area` VALUES ('522701', '都匀市', '522700', '3');
INSERT INTO `tb_area` VALUES ('440781', '台山市', '440700', '3');
INSERT INTO `tb_area` VALUES ('141182', '汾阳市', '141100', '3');
INSERT INTO `tb_area` VALUES ('420704', '鄂城区', '420700', '3');
INSERT INTO `tb_area` VALUES ('341222', '太和县', '341200', '3');
INSERT INTO `tb_area` VALUES ('410101', '市辖区', '410100', '3');
INSERT INTO `tb_area` VALUES ('430105', '开福区', '430100', '3');
INSERT INTO `tb_area` VALUES ('340404', '谢家集区', '340400', '3');
INSERT INTO `tb_area` VALUES ('230603', '龙凤区', '230600', '3');
INSERT INTO `tb_area` VALUES ('152522', '阿巴嘎旗', '152500', '3');
INSERT INTO `tb_area` VALUES ('410922', '清丰县', '410900', '3');
INSERT INTO `tb_area` VALUES ('450921', '容县', '450900', '3');
INSERT INTO `tb_area` VALUES ('511323', '蓬安县', '511300', '3');
INSERT INTO `tb_area` VALUES ('511124', '井研县', '511100', '3');
INSERT INTO `tb_area` VALUES ('440305', '南山区', '440300', '3');
INSERT INTO `tb_area` VALUES ('230422', '绥滨县', '230400', '3');
INSERT INTO `tb_area` VALUES ('431230', '通道侗族自治县', '431200', '3');
INSERT INTO `tb_area` VALUES ('450000', '广西壮族自治区', '0', '1');
INSERT INTO `tb_area` VALUES ('341322', '萧县', '341300', '3');
INSERT INTO `tb_area` VALUES ('340521', '当涂县', '340500', '3');
INSERT INTO `tb_area` VALUES ('140109', '万柏林区', '140100', '3');
INSERT INTO `tb_area` VALUES ('450406', '龙圩区', '450400', '3');
INSERT INTO `tb_area` VALUES ('331023', '天台县', '331000', '3');
INSERT INTO `tb_area` VALUES ('500114', '黔江区', '500100', '3');
INSERT INTO `tb_area` VALUES ('131023', '永清县', '131000', '3');
INSERT INTO `tb_area` VALUES ('510185', '简阳市', '510100', '3');
INSERT INTO `tb_area` VALUES ('350703', '建阳区', '350700', '3');
INSERT INTO `tb_area` VALUES ('610303', '金台区', '610300', '3');
INSERT INTO `tb_area` VALUES ('361103', '广丰区', '361100', '3');
INSERT INTO `tb_area` VALUES ('110101', '东城区', '110100', '3');
INSERT INTO `tb_area` VALUES ('530524', '昌宁县', '530500', '3');
INSERT INTO `tb_area` VALUES ('140928', '五寨县', '140900', '3');
INSERT INTO `tb_area` VALUES ('440300', '深圳市', '440000', '2');
INSERT INTO `tb_area` VALUES ('340402', '大通区', '340400', '3');
INSERT INTO `tb_area` VALUES ('511424', '丹棱县', '511400', '3');
INSERT INTO `tb_area` VALUES ('420112', '东西湖区', '420100', '3');
INSERT INTO `tb_area` VALUES ('360733', '会昌县', '360700', '3');
INSERT INTO `tb_area` VALUES ('431228', '芷江侗族自治县', '431200', '3');
INSERT INTO `tb_area` VALUES ('341504', '叶集区', '341500', '3');
INSERT INTO `tb_area` VALUES ('500231', '垫江县', '500200', '3');
INSERT INTO `tb_area` VALUES ('330521', '德清县', '330500', '3');
INSERT INTO `tb_area` VALUES ('370105', '天桥区', '370100', '3');
INSERT INTO `tb_area` VALUES ('430500', '邵阳市', '430000', '2');
INSERT INTO `tb_area` VALUES ('430221', '株洲县', '430200', '3');
INSERT INTO `tb_area` VALUES ('430724', '临澧县', '430700', '3');
INSERT INTO `tb_area` VALUES ('420802', '东宝区', '420800', '3');
INSERT INTO `tb_area` VALUES ('230801', '市辖区', '230800', '3');
INSERT INTO `tb_area` VALUES ('371625', '博兴县', '371600', '3');
INSERT INTO `tb_area` VALUES ('140481', '潞城市', '140400', '3');
INSERT INTO `tb_area` VALUES ('130426', '涉县', '130400', '3');
INSERT INTO `tb_area` VALUES ('150429', '宁城县', '150400', '3');
INSERT INTO `tb_area` VALUES ('411502', '浉河区', '411500', '3');
INSERT INTO `tb_area` VALUES ('370812', '兖州区', '370800', '3');
INSERT INTO `tb_area` VALUES ('450401', '市辖区', '450400', '3');
INSERT INTO `tb_area` VALUES ('371301', '市辖区', '371300', '3');
INSERT INTO `tb_area` VALUES ('350581', '石狮市', '350500', '3');
INSERT INTO `tb_area` VALUES ('370801', '市辖区', '370800', '3');
INSERT INTO `tb_area` VALUES ('232723', '漠河县', '232700', '3');
INSERT INTO `tb_area` VALUES ('152922', '阿拉善右旗', '152900', '3');
INSERT INTO `tb_area` VALUES ('440281', '乐昌市', '440200', '3');
INSERT INTO `tb_area` VALUES ('654326', '吉木乃县', '654300', '3');
INSERT INTO `tb_area` VALUES ('131121', '枣强县', '131100', '3');
INSERT INTO `tb_area` VALUES ('520526', '威宁彝族回族苗族自治县', '520500', '3');
INSERT INTO `tb_area` VALUES ('341002', '屯溪区', '341000', '3');
INSERT INTO `tb_area` VALUES ('620421', '靖远县', '620400', '3');
INSERT INTO `tb_area` VALUES ('150622', '准格尔旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('530129', '寻甸回族彝族自治县', '530100', '3');
INSERT INTO `tb_area` VALUES ('350105', '马尾区', '350100', '3');
INSERT INTO `tb_area` VALUES ('511322', '营山县', '511300', '3');
INSERT INTO `tb_area` VALUES ('230405', '兴安区', '230400', '3');
INSERT INTO `tb_area` VALUES ('410104', '管城回族区', '410100', '3');
INSERT INTO `tb_area` VALUES ('330327', '苍南县', '330300', '3');
INSERT INTO `tb_area` VALUES ('410822', '博爱县', '410800', '3');
INSERT INTO `tb_area` VALUES ('331181', '龙泉市', '331100', '3');
INSERT INTO `tb_area` VALUES ('130304', '北戴河区', '130300', '3');
INSERT INTO `tb_area` VALUES ('370404', '峄城区', '370400', '3');
INSERT INTO `tb_area` VALUES ('540228', '白朗县', '540200', '3');
INSERT INTO `tb_area` VALUES ('320901', '市辖区', '320900', '3');
INSERT INTO `tb_area` VALUES ('510703', '涪城区', '510700', '3');
INSERT INTO `tb_area` VALUES ('450603', '防城区', '450600', '3');
INSERT INTO `tb_area` VALUES ('450703', '钦北区', '450700', '3');
INSERT INTO `tb_area` VALUES ('530111', '官渡区', '530100', '3');
INSERT INTO `tb_area` VALUES ('350426', '尤溪县', '350400', '3');
INSERT INTO `tb_area` VALUES ('320724', '灌南县', '320700', '3');
INSERT INTO `tb_area` VALUES ('511524', '长宁县', '511500', '3');
INSERT INTO `tb_area` VALUES ('130929', '献县', '130900', '3');
INSERT INTO `tb_area` VALUES ('500120', '璧山区', '500100', '3');
INSERT INTO `tb_area` VALUES ('451121', '昭平县', '451100', '3');
INSERT INTO `tb_area` VALUES ('330329', '泰顺县', '330300', '3');
INSERT INTO `tb_area` VALUES ('360483', '庐山市', '360400', '3');
INSERT INTO `tb_area` VALUES ('210321', '台安县', '210300', '3');
INSERT INTO `tb_area` VALUES ('110118', '密云区', '110100', '3');
INSERT INTO `tb_area` VALUES ('140525', '泽州县', '140500', '3');
INSERT INTO `tb_area` VALUES ('350423', '清流县', '350400', '3');
INSERT INTO `tb_area` VALUES ('431222', '沅陵县', '431200', '3');
INSERT INTO `tb_area` VALUES ('230700', '伊春市', '230000', '2');
INSERT INTO `tb_area` VALUES ('623027', '夏河县', '623000', '3');
INSERT INTO `tb_area` VALUES ('370786', '昌邑市', '370700', '3');
INSERT INTO `tb_area` VALUES ('230201', '市辖区', '230200', '3');
INSERT INTO `tb_area` VALUES ('820000', '澳门特别行政区', '0', '1');
INSERT INTO `tb_area` VALUES ('130524', '柏乡县', '130500', '3');
INSERT INTO `tb_area` VALUES ('440511', '金平区', '440500', '3');
INSERT INTO `tb_area` VALUES ('610626', '吴起县', '610600', '3');
INSERT INTO `tb_area` VALUES ('130731', '涿鹿县', '130700', '3');
INSERT INTO `tb_area` VALUES ('211303', '龙城区', '211300', '3');
INSERT INTO `tb_area` VALUES ('420000', '湖北省', '0', '1');
INSERT INTO `tb_area` VALUES ('410900', '濮阳市', '410000', '2');
INSERT INTO `tb_area` VALUES ('210401', '市辖区', '210400', '3');
INSERT INTO `tb_area` VALUES ('341302', '埇桥区', '341300', '3');
INSERT INTO `tb_area` VALUES ('520422', '普定县', '520400', '3');
INSERT INTO `tb_area` VALUES ('131123', '武强县', '131100', '3');
INSERT INTO `tb_area` VALUES ('230828', '汤原县', '230800', '3');
INSERT INTO `tb_area` VALUES ('360725', '崇义县', '360700', '3');
INSERT INTO `tb_area` VALUES ('130826', '丰宁满族自治县', '130800', '3');
INSERT INTO `tb_area` VALUES ('330401', '市辖区', '330400', '3');
INSERT INTO `tb_area` VALUES ('130982', '任丘市', '130900', '3');
INSERT INTO `tb_area` VALUES ('411101', '市辖区', '411100', '3');
INSERT INTO `tb_area` VALUES ('530724', '宁蒗彝族自治县', '530700', '3');
INSERT INTO `tb_area` VALUES ('130107', '井陉矿区', '130100', '3');
INSERT INTO `tb_area` VALUES ('230402', '向阳区', '230400', '3');
INSERT INTO `tb_area` VALUES ('460105', '秀英区', '460100', '3');
INSERT INTO `tb_area` VALUES ('130821', '承德县', '130800', '3');
INSERT INTO `tb_area` VALUES ('630105', '城北区', '630100', '3');
INSERT INTO `tb_area` VALUES ('130481', '武安市', '130400', '3');
INSERT INTO `tb_area` VALUES ('460200', '三亚市', '460000', '2');
INSERT INTO `tb_area` VALUES ('410926', '范县', '410900', '3');
INSERT INTO `tb_area` VALUES ('130703', '桥西区', '130700', '3');
INSERT INTO `tb_area` VALUES ('511801', '市辖区', '511800', '3');
INSERT INTO `tb_area` VALUES ('340102', '瑶海区', '340100', '3');
INSERT INTO `tb_area` VALUES ('520501', '市辖区', '520500', '3');
INSERT INTO `tb_area` VALUES ('510522', '合江县', '510500', '3');
INSERT INTO `tb_area` VALUES ('321182', '扬中市', '321100', '3');
INSERT INTO `tb_area` VALUES ('610603', '安塞区', '610600', '3');
INSERT INTO `tb_area` VALUES ('510501', '市辖区', '510500', '3');
INSERT INTO `tb_area` VALUES ('450500', '北海市', '450000', '2');
INSERT INTO `tb_area` VALUES ('340207', '鸠江区', '340200', '3');
INSERT INTO `tb_area` VALUES ('410300', '洛阳市', '410000', '2');
INSERT INTO `tb_area` VALUES ('340223', '南陵县', '340200', '3');
INSERT INTO `tb_area` VALUES ('540235', '聂拉木县', '540200', '3');
INSERT INTO `tb_area` VALUES ('653200', '和田地区', '650000', '2');
INSERT INTO `tb_area` VALUES ('370305', '临淄区', '370300', '3');
INSERT INTO `tb_area` VALUES ('630200', '海东市', '630000', '2');
INSERT INTO `tb_area` VALUES ('341700', '池州市', '340000', '2');
INSERT INTO `tb_area` VALUES ('630225', '循化撒拉族自治县', '630200', '3');
INSERT INTO `tb_area` VALUES ('371500', '聊城市', '370000', '2');
INSERT INTO `tb_area` VALUES ('530701', '市辖区', '530700', '3');
INSERT INTO `tb_area` VALUES ('532601', '文山市', '532600', '3');
INSERT INTO `tb_area` VALUES ('450312', '临桂区', '450300', '3');
INSERT INTO `tb_area` VALUES ('542425', '安多县', '542400', '3');
INSERT INTO `tb_area` VALUES ('421321', '随县', '421300', '3');
INSERT INTO `tb_area` VALUES ('653131', '塔什库尔干塔吉克自治县', '653100', '3');
INSERT INTO `tb_area` VALUES ('445321', '新兴县', '445300', '3');
INSERT INTO `tb_area` VALUES ('131001', '市辖区', '131000', '3');
INSERT INTO `tb_area` VALUES ('513333', '色达县', '513300', '3');
INSERT INTO `tb_area` VALUES ('350724', '松溪县', '350700', '3');
INSERT INTO `tb_area` VALUES ('440118', '增城区', '440100', '3');
INSERT INTO `tb_area` VALUES ('420324', '竹溪县', '420300', '3');
INSERT INTO `tb_area` VALUES ('150602', '东胜区', '150600', '3');
INSERT INTO `tb_area` VALUES ('371526', '高唐县', '371500', '3');
INSERT INTO `tb_area` VALUES ('420582', '当阳市', '420500', '3');
INSERT INTO `tb_area` VALUES ('320922', '滨海县', '320900', '3');
INSERT INTO `tb_area` VALUES ('150726', '新巴尔虎左旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('340522', '含山县', '340500', '3');
INSERT INTO `tb_area` VALUES ('421181', '麻城市', '421100', '3');
INSERT INTO `tb_area` VALUES ('350300', '莆田市', '350000', '2');
INSERT INTO `tb_area` VALUES ('350622', '云霄县', '350600', '3');
INSERT INTO `tb_area` VALUES ('522626', '岑巩县', '522600', '3');
INSERT INTO `tb_area` VALUES ('610327', '陇县', '610300', '3');
INSERT INTO `tb_area` VALUES ('360200', '景德镇市', '360000', '2');
INSERT INTO `tb_area` VALUES ('321323', '泗阳县', '321300', '3');
INSERT INTO `tb_area` VALUES ('533102', '瑞丽市', '533100', '3');
INSERT INTO `tb_area` VALUES ('130204', '古冶区', '130200', '3');
INSERT INTO `tb_area` VALUES ('650422', '托克逊县', '650400', '3');
INSERT INTO `tb_area` VALUES ('513230', '壤塘县', '513200', '3');
INSERT INTO `tb_area` VALUES ('340501', '市辖区', '340500', '3');
INSERT INTO `tb_area` VALUES ('350982', '福鼎市', '350900', '3');
INSERT INTO `tb_area` VALUES ('310120', '奉贤区', '310100', '3');
INSERT INTO `tb_area` VALUES ('210801', '市辖区', '210800', '3');
INSERT INTO `tb_area` VALUES ('330784', '永康市', '330700', '3');
INSERT INTO `tb_area` VALUES ('510104', '锦江区', '510100', '3');
INSERT INTO `tb_area` VALUES ('511722', '宣汉县', '511700', '3');
INSERT INTO `tb_area` VALUES ('530423', '通海县', '530400', '3');
INSERT INTO `tb_area` VALUES ('360421', '九江县', '360400', '3');
INSERT INTO `tb_area` VALUES ('532323', '牟定县', '532300', '3');
INSERT INTO `tb_area` VALUES ('540123', '尼木县', '540100', '3');
INSERT INTO `tb_area` VALUES ('130229', '玉田县', '130200', '3');
INSERT INTO `tb_area` VALUES ('442000', '中山市', '440000', '2');
INSERT INTO `tb_area` VALUES ('500235', '云阳县', '500200', '3');
INSERT INTO `tb_area` VALUES ('130981', '泊头市', '130900', '3');
INSERT INTO `tb_area` VALUES ('540102', '城关区', '540100', '3');
INSERT INTO `tb_area` VALUES ('361028', '资溪县', '361000', '3');
INSERT INTO `tb_area` VALUES ('620403', '平川区', '620400', '3');
INSERT INTO `tb_area` VALUES ('210224', '长海县', '210200', '3');
INSERT INTO `tb_area` VALUES ('130202', '路南区', '130200', '3');
INSERT INTO `tb_area` VALUES ('360201', '市辖区', '360200', '3');
INSERT INTO `tb_area` VALUES ('511601', '市辖区', '511600', '3');
INSERT INTO `tb_area` VALUES ('130632', '安新县', '130600', '3');
INSERT INTO `tb_area` VALUES ('450223', '鹿寨县', '450200', '3');
INSERT INTO `tb_area` VALUES ('500102', '涪陵区', '500100', '3');
INSERT INTO `tb_area` VALUES ('510100', '成都市', '510000', '2');
INSERT INTO `tb_area` VALUES ('420102', '江岸区', '420100', '3');
INSERT INTO `tb_area` VALUES ('421200', '咸宁市', '420000', '2');
INSERT INTO `tb_area` VALUES ('320118', '高淳区', '320100', '3');
INSERT INTO `tb_area` VALUES ('210800', '营口市', '210000', '2');
INSERT INTO `tb_area` VALUES ('210882', '大石桥市', '210800', '3');
INSERT INTO `tb_area` VALUES ('360000', '江西省', '0', '1');
INSERT INTO `tb_area` VALUES ('540226', '昂仁县', '540200', '3');
INSERT INTO `tb_area` VALUES ('230306', '城子河区', '230300', '3');
INSERT INTO `tb_area` VALUES ('451100', '贺州市', '450000', '2');
INSERT INTO `tb_area` VALUES ('341601', '市辖区', '341600', '3');
INSERT INTO `tb_area` VALUES ('210904', '太平区', '210900', '3');
INSERT INTO `tb_area` VALUES ('150221', '土默特右旗', '150200', '3');
INSERT INTO `tb_area` VALUES ('500243', '彭水苗族土家族自治县', '500200', '3');
INSERT INTO `tb_area` VALUES ('540426', '朗县', '540400', '3');
INSERT INTO `tb_area` VALUES ('440514', '潮南区', '440500', '3');
INSERT INTO `tb_area` VALUES ('210304', '立山区', '210300', '3');
INSERT INTO `tb_area` VALUES ('431124', '道县', '431100', '3');
INSERT INTO `tb_area` VALUES ('632724', '治多县', '632700', '3');
INSERT INTO `tb_area` VALUES ('220322', '梨树县', '220300', '3');
INSERT INTO `tb_area` VALUES ('411722', '上蔡县', '411700', '3');
INSERT INTO `tb_area` VALUES ('350211', '集美区', '350200', '3');
INSERT INTO `tb_area` VALUES ('421202', '咸安区', '421200', '3');
INSERT INTO `tb_area` VALUES ('210123', '康平县', '210100', '3');
INSERT INTO `tb_area` VALUES ('320404', '钟楼区', '320400', '3');
INSERT INTO `tb_area` VALUES ('620321', '永昌县', '620300', '3');
INSERT INTO `tb_area` VALUES ('360111', '青山湖区', '360100', '3');
INSERT INTO `tb_area` VALUES ('371600', '滨州市', '370000', '2');
INSERT INTO `tb_area` VALUES ('433100', '湘西土家族苗族自治州', '430000', '2');
INSERT INTO `tb_area` VALUES ('130636', '顺平县', '130600', '3');
INSERT INTO `tb_area` VALUES ('361124', '铅山县', '361100', '3');
INSERT INTO `tb_area` VALUES ('620900', '酒泉市', '620000', '2');
INSERT INTO `tb_area` VALUES ('410481', '舞钢市', '410400', '3');
INSERT INTO `tb_area` VALUES ('230307', '麻山区', '230300', '3');
INSERT INTO `tb_area` VALUES ('450821', '平南县', '450800', '3');
INSERT INTO `tb_area` VALUES ('210202', '中山区', '210200', '3');
INSERT INTO `tb_area` VALUES ('441324', '龙门县', '441300', '3');
INSERT INTO `tb_area` VALUES ('431001', '市辖区', '431000', '3');
INSERT INTO `tb_area` VALUES ('150600', '鄂尔多斯市', '150000', '2');
INSERT INTO `tb_area` VALUES ('610901', '市辖区', '610900', '3');
INSERT INTO `tb_area` VALUES ('140925', '宁武县', '140900', '3');
INSERT INTO `tb_area` VALUES ('340826', '宿松县', '340800', '3');
INSERT INTO `tb_area` VALUES ('320921', '响水县', '320900', '3');
INSERT INTO `tb_area` VALUES ('150300', '乌海市', '150000', '2');
INSERT INTO `tb_area` VALUES ('130535', '临西县', '130500', '3');
INSERT INTO `tb_area` VALUES ('630222', '民和回族土族自治县', '630200', '3');
INSERT INTO `tb_area` VALUES ('500106', '沙坪坝区', '500100', '3');
INSERT INTO `tb_area` VALUES ('621202', '武都区', '621200', '3');
INSERT INTO `tb_area` VALUES ('340803', '大观区', '340800', '3');
INSERT INTO `tb_area` VALUES ('532600', '文山壮族苗族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('511703', '达川区', '511700', '3');
INSERT INTO `tb_area` VALUES ('441422', '大埔县', '441400', '3');
INSERT INTO `tb_area` VALUES ('411381', '邓州市', '411300', '3');
INSERT INTO `tb_area` VALUES ('320311', '泉山区', '320300', '3');
INSERT INTO `tb_area` VALUES ('230403', '工农区', '230400', '3');
INSERT INTO `tb_area` VALUES ('370831', '泗水县', '370800', '3');
INSERT INTO `tb_area` VALUES ('110119', '延庆区', '110100', '3');
INSERT INTO `tb_area` VALUES ('410403', '卫东区', '410400', '3');
INSERT INTO `tb_area` VALUES ('130921', '沧县', '130900', '3');
INSERT INTO `tb_area` VALUES ('652700', '博尔塔拉蒙古自治州', '650000', '2');
INSERT INTO `tb_area` VALUES ('140311', '郊区', '140300', '3');
INSERT INTO `tb_area` VALUES ('540424', '波密县', '540400', '3');
INSERT INTO `tb_area` VALUES ('321202', '海陵区', '321200', '3');
INSERT INTO `tb_area` VALUES ('140428', '长子县', '140400', '3');
INSERT INTO `tb_area` VALUES ('370405', '台儿庄区', '370400', '3');
INSERT INTO `tb_area` VALUES ('440000', '广东省', '0', '1');
INSERT INTO `tb_area` VALUES ('520324', '正安县', '520300', '3');
INSERT INTO `tb_area` VALUES ('140781', '介休市', '140700', '3');
INSERT INTO `tb_area` VALUES ('450201', '市辖区', '450200', '3');
INSERT INTO `tb_area` VALUES ('230606', '大同区', '230600', '3');
INSERT INTO `tb_area` VALUES ('371326', '平邑县', '371300', '3');
INSERT INTO `tb_area` VALUES ('431026', '汝城县', '431000', '3');
INSERT INTO `tb_area` VALUES ('620723', '临泽县', '620700', '3');
INSERT INTO `tb_area` VALUES ('211081', '灯塔市', '211000', '3');
INSERT INTO `tb_area` VALUES ('431023', '永兴县', '431000', '3');
INSERT INTO `tb_area` VALUES ('420981', '应城市', '420900', '3');
INSERT INTO `tb_area` VALUES ('540521', '扎囊县', '540500', '3');
INSERT INTO `tb_area` VALUES ('370322', '高青县', '370300', '3');
INSERT INTO `tb_area` VALUES ('510723', '盐亭县', '510700', '3');
INSERT INTO `tb_area` VALUES ('511900', '巴中市', '510000', '2');
INSERT INTO `tb_area` VALUES ('340401', '市辖区', '340400', '3');
INSERT INTO `tb_area` VALUES ('411525', '固始县', '411500', '3');
INSERT INTO `tb_area` VALUES ('341201', '市辖区', '341200', '3');
INSERT INTO `tb_area` VALUES ('371324', '兰陵县', '371300', '3');
INSERT INTO `tb_area` VALUES ('530127', '嵩明县', '530100', '3');
INSERT INTO `tb_area` VALUES ('410323', '新安县', '410300', '3');
INSERT INTO `tb_area` VALUES ('370902', '泰山区', '370900', '3');
INSERT INTO `tb_area` VALUES ('341522', '霍邱县', '341500', '3');
INSERT INTO `tb_area` VALUES ('621021', '庆城县', '621000', '3');
INSERT INTO `tb_area` VALUES ('440307', '龙岗区', '440300', '3');
INSERT INTO `tb_area` VALUES ('371002', '环翠区', '371000', '3');
INSERT INTO `tb_area` VALUES ('360922', '万载县', '360900', '3');
INSERT INTO `tb_area` VALUES ('450721', '灵山县', '450700', '3');
INSERT INTO `tb_area` VALUES ('640301', '市辖区', '640300', '3');
INSERT INTO `tb_area` VALUES ('330182', '建德市', '330100', '3');
INSERT INTO `tb_area` VALUES ('530301', '市辖区', '530300', '3');
INSERT INTO `tb_area` VALUES ('230621', '肇州县', '230600', '3');
INSERT INTO `tb_area` VALUES ('533100', '德宏傣族景颇族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('140602', '朔城区', '140600', '3');
INSERT INTO `tb_area` VALUES ('220501', '市辖区', '220500', '3');
INSERT INTO `tb_area` VALUES ('530000', '云南省', '0', '1');
INSERT INTO `tb_area` VALUES ('360702', '章贡区', '360700', '3');
INSERT INTO `tb_area` VALUES ('650522', '伊吾县', '650500', '3');
INSERT INTO `tb_area` VALUES ('150921', '卓资县', '150900', '3');
INSERT INTO `tb_area` VALUES ('440204', '浈江区', '440200', '3');
INSERT INTO `tb_area` VALUES ('653223', '皮山县', '653200', '3');
INSERT INTO `tb_area` VALUES ('150125', '武川县', '150100', '3');
INSERT INTO `tb_area` VALUES ('330185', '临安市', '330100', '3');
INSERT INTO `tb_area` VALUES ('513228', '黑水县', '513200', '3');
INSERT INTO `tb_area` VALUES ('230714', '乌伊岭区', '230700', '3');
INSERT INTO `tb_area` VALUES ('150621', '达拉特旗', '150600', '3');
INSERT INTO `tb_area` VALUES ('632623', '甘德县', '632600', '3');
INSERT INTO `tb_area` VALUES ('320114', '雨花台区', '320100', '3');
INSERT INTO `tb_area` VALUES ('370522', '利津县', '370500', '3');
INSERT INTO `tb_area` VALUES ('331021', '玉环县', '331000', '3');
INSERT INTO `tb_area` VALUES ('520303', '汇川区', '520300', '3');
INSERT INTO `tb_area` VALUES ('431125', '江永县', '431100', '3');
INSERT INTO `tb_area` VALUES ('620122', '皋兰县', '620100', '3');
INSERT INTO `tb_area` VALUES ('622924', '广河县', '622900', '3');
INSERT INTO `tb_area` VALUES ('430401', '市辖区', '430400', '3');
INSERT INTO `tb_area` VALUES ('632223', '海晏县', '632200', '3');
INSERT INTO `tb_area` VALUES ('510108', '成华区', '510100', '3');
INSERT INTO `tb_area` VALUES ('230713', '带岭区', '230700', '3');
INSERT INTO `tb_area` VALUES ('430681', '汨罗市', '430600', '3');
INSERT INTO `tb_area` VALUES ('511621', '岳池县', '511600', '3');
INSERT INTO `tb_area` VALUES ('211300', '朝阳市', '210000', '2');
INSERT INTO `tb_area` VALUES ('652829', '博湖县', '652800', '3');
INSERT INTO `tb_area` VALUES ('620823', '崇信县', '620800', '3');
INSERT INTO `tb_area` VALUES ('230208', '梅里斯达斡尔族区', '230200', '3');
INSERT INTO `tb_area` VALUES ('513201', '马尔康市', '513200', '3');
INSERT INTO `tb_area` VALUES ('131124', '饶阳县', '131100', '3');
INSERT INTO `tb_area` VALUES ('450304', '象山区', '450300', '3');
INSERT INTO `tb_area` VALUES ('330400', '嘉兴市', '330000', '2');
INSERT INTO `tb_area` VALUES ('510722', '三台县', '510700', '3');
INSERT INTO `tb_area` VALUES ('230231', '拜泉县', '230200', '3');
INSERT INTO `tb_area` VALUES ('620700', '张掖市', '620000', '2');
INSERT INTO `tb_area` VALUES ('640522', '海原县', '640500', '3');
INSERT INTO `tb_area` VALUES ('410122', '中牟县', '410100', '3');
INSERT INTO `tb_area` VALUES ('520222', '盘县', '520200', '3');
INSERT INTO `tb_area` VALUES ('331002', '椒江区', '331000', '3');
INSERT INTO `tb_area` VALUES ('371400', '德州市', '370000', '2');
INSERT INTO `tb_area` VALUES ('421123', '罗田县', '421100', '3');
INSERT INTO `tb_area` VALUES ('652924', '沙雅县', '652900', '3');
INSERT INTO `tb_area` VALUES ('411321', '南召县', '411300', '3');
INSERT INTO `tb_area` VALUES ('230503', '岭东区', '230500', '3');
INSERT INTO `tb_area` VALUES ('130684', '高碑店市', '130600', '3');
INSERT INTO `tb_area` VALUES ('130822', '兴隆县', '130800', '3');
INSERT INTO `tb_area` VALUES ('340421', '凤台县', '340400', '3');
INSERT INTO `tb_area` VALUES ('230224', '泰来县', '230200', '3');
INSERT INTO `tb_area` VALUES ('360732', '兴国县', '360700', '3');
INSERT INTO `tb_area` VALUES ('230200', '齐齐哈尔市', '230000', '2');
INSERT INTO `tb_area` VALUES ('441501', '市辖区', '441500', '3');
INSERT INTO `tb_area` VALUES ('652828', '和硕县', '652800', '3');
INSERT INTO `tb_area` VALUES ('441881', '英德市', '441800', '3');
INSERT INTO `tb_area` VALUES ('110112', '通州区', '110100', '3');
INSERT INTO `tb_area` VALUES ('211002', '白塔区', '211000', '3');
INSERT INTO `tb_area` VALUES ('542524', '日土县', '542500', '3');
INSERT INTO `tb_area` VALUES ('150721', '阿荣旗', '150700', '3');
INSERT INTO `tb_area` VALUES ('632323', '泽库县', '632300', '3');
INSERT INTO `tb_area` VALUES ('141031', '隰县', '141000', '3');
INSERT INTO `tb_area` VALUES ('341024', '祁门县', '341000', '3');
INSERT INTO `tb_area` VALUES ('350428', '将乐县', '350400', '3');
INSERT INTO `tb_area` VALUES ('141100', '吕梁市', '140000', '2');
INSERT INTO `tb_area` VALUES ('320102', '玄武区', '320100', '3');
INSERT INTO `tb_area` VALUES ('450600', '防城港市', '450000', '2');
INSERT INTO `tb_area` VALUES ('370724', '临朐县', '370700', '3');
INSERT INTO `tb_area` VALUES ('370213', '李沧区', '370200', '3');
INSERT INTO `tb_area` VALUES ('532800', '西双版纳傣族自治州', '530000', '2');
INSERT INTO `tb_area` VALUES ('120118', '静海区', '120100', '3');
INSERT INTO `tb_area` VALUES ('611023', '商南县', '611000', '3');
INSERT INTO `tb_area` VALUES ('422801', '恩施市', '422800', '3');
INSERT INTO `tb_area` VALUES ('210104', '大东区', '210100', '3');
INSERT INTO `tb_area` VALUES ('210911', '细河区', '210900', '3');
INSERT INTO `tb_area` VALUES ('511423', '洪雅县', '511400', '3');
INSERT INTO `tb_area` VALUES ('510114', '新都区', '510100', '3');
INSERT INTO `tb_area` VALUES ('420902', '孝南区', '420900', '3');
INSERT INTO `tb_area` VALUES ('140502', '城区', '140500', '3');
INSERT INTO `tb_area` VALUES ('654026', '昭苏县', '654000', '3');
INSERT INTO `tb_area` VALUES ('320925', '建湖县', '320900', '3');
INSERT INTO `tb_area` VALUES ('620601', '市辖区', '620600', '3');
INSERT INTO `tb_area` VALUES ('410500', '安阳市', '410000', '2');
INSERT INTO `tb_area` VALUES ('320116', '六合区', '320100', '3');
INSERT INTO `tb_area` VALUES ('130205', '开平区', '130200', '3');
INSERT INTO `tb_area` VALUES ('532324', '南华县', '532300', '3');
INSERT INTO `tb_area` VALUES ('441400', '梅州市', '440000', '2');
INSERT INTO `tb_area` VALUES ('500240', '石柱土家族自治县', '500200', '3');
INSERT INTO `tb_area` VALUES ('211403', '龙港区', '211400', '3');
INSERT INTO `tb_area` VALUES ('130424', '成安县', '130400', '3');
INSERT INTO `tb_area` VALUES ('330901', '市辖区', '330900', '3');
INSERT INTO `tb_area` VALUES ('622925', '和政县', '622900', '3');
INSERT INTO `tb_area` VALUES ('150924', '兴和县', '150900', '3');
INSERT INTO `tb_area` VALUES ('653100', '喀什地区', '650000', '2');
INSERT INTO `tb_area` VALUES ('510503', '纳溪区', '510500', '3');
INSERT INTO `tb_area` VALUES ('610802', '榆阳区', '610800', '3');
INSERT INTO `tb_area` VALUES ('340811', '宜秀区', '340800', '3');
INSERT INTO `tb_area` VALUES ('220281', '蛟河市', '220200', '3');
INSERT INTO `tb_area` VALUES ('620101', '市辖区', '620100', '3');
INSERT INTO `tb_area` VALUES ('230204', '铁锋区', '230200', '3');
INSERT INTO `tb_area` VALUES ('350821', '长汀县', '350800', '3');
INSERT INTO `tb_area` VALUES ('341825', '旌德县', '341800', '3');
INSERT INTO `tb_area` VALUES ('652300', '昌吉回族自治州', '650000', '2');
INSERT INTO `tb_area` VALUES ('440200', '韶关市', '440000', '2');
INSERT INTO `tb_area` VALUES ('450901', '市辖区', '450900', '3');
INSERT INTO `tb_area` VALUES ('610112', '未央区', '610100', '3');
INSERT INTO `tb_area` VALUES ('370502', '东营区', '370500', '3');
INSERT INTO `tb_area` VALUES ('230110', '香坊区', '230100', '3');
INSERT INTO `tb_area` VALUES ('450403', '万秀区', '450400', '3');
INSERT INTO `tb_area` VALUES ('350926', '柘荣县', '350900', '3');
INSERT INTO `tb_area` VALUES ('653125', '莎车县', '653100', '3');
INSERT INTO `tb_area` VALUES ('360423', '武宁县', '360400', '3');
INSERT INTO `tb_area` VALUES ('610830', '清涧县', '610800', '3');
INSERT INTO `tb_area` VALUES ('140822', '万荣县', '140800', '3');
INSERT INTO `tb_area` VALUES ('510626', '罗江县', '510600', '3');
INSERT INTO `tb_area` VALUES ('530801', '市辖区', '530800', '3');
INSERT INTO `tb_area` VALUES ('141002', '尧都区', '141000', '3');
INSERT INTO `tb_area` VALUES ('320700', '连云港市', '320000', '2');
INSERT INTO `tb_area` VALUES ('150103', '回民区', '150100', '3');
INSERT INTO `tb_area` VALUES ('330701', '市辖区', '330700', '3');
INSERT INTO `tb_area` VALUES ('610600', '延安市', '610000', '2');
INSERT INTO `tb_area` VALUES ('370811', '任城区', '370800', '3');
INSERT INTO `tb_area` VALUES ('340706', '义安区', '340700', '3');
INSERT INTO `tb_area` VALUES ('430726', '石门县', '430700', '3');
INSERT INTO `tb_area` VALUES ('450301', '市辖区', '450300', '3');
INSERT INTO `tb_area` VALUES ('341125', '定远县', '341100', '3');
INSERT INTO `tb_area` VALUES ('620105', '安宁区', '620100', '3');
INSERT INTO `tb_area` VALUES ('341204', '颍泉区', '341200', '3');
INSERT INTO `tb_area` VALUES ('152223', '扎赉特旗', '152200', '3');
INSERT INTO `tb_area` VALUES ('360321', '莲花县', '360300', '3');
INSERT INTO `tb_area` VALUES ('150202', '东河区', '150200', '3');
INSERT INTO `tb_area` VALUES ('341102', '琅琊区', '341100', '3');
INSERT INTO `tb_area` VALUES ('150928', '察哈尔右翼后旗', '150900', '3');
INSERT INTO `tb_area` VALUES ('620501', '市辖区', '620500', '3');
INSERT INTO `tb_area` VALUES ('632700', '玉树藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('211223', '西丰县', '211200', '3');
INSERT INTO `tb_area` VALUES ('622900', '临夏回族自治州', '620000', '2');
INSERT INTO `tb_area` VALUES ('120101', '和平区', '120100', '3');
INSERT INTO `tb_area` VALUES ('341502', '金安区', '341500', '3');
INSERT INTO `tb_area` VALUES ('321012', '江都区', '321000', '3');
INSERT INTO `tb_area` VALUES ('140501', '市辖区', '140500', '3');
INSERT INTO `tb_area` VALUES ('500228', '梁平县', '500200', '3');
INSERT INTO `tb_area` VALUES ('652925', '新和县', '652900', '3');
INSERT INTO `tb_area` VALUES ('320000', '江苏省', '0', '1');
INSERT INTO `tb_area` VALUES ('450902', '玉州区', '450900', '3');
INSERT INTO `tb_area` VALUES ('330326', '平阳县', '330300', '3');
INSERT INTO `tb_area` VALUES ('370701', '市辖区', '370700', '3');
INSERT INTO `tb_area` VALUES ('650000', '新疆维吾尔自治区', '0', '1');
INSERT INTO `tb_area` VALUES ('410211', '金明区', '410200', '3');
INSERT INTO `tb_area` VALUES ('632322', '尖扎县', '632300', '3');
INSERT INTO `tb_area` VALUES ('611024', '山阳县', '611000', '3');
INSERT INTO `tb_area` VALUES ('320300', '徐州市', '320000', '2');
INSERT INTO `tb_area` VALUES ('451422', '宁明县', '451400', '3');
INSERT INTO `tb_area` VALUES ('150785', '根河市', '150700', '3');
INSERT INTO `tb_area` VALUES ('130100', '石家庄市', '130000', '2');
INSERT INTO `tb_area` VALUES ('610601', '市辖区', '610600', '3');
INSERT INTO `tb_area` VALUES ('220100', '长春市', '220000', '2');
INSERT INTO `tb_area` VALUES ('321281', '兴化市', '321200', '3');
INSERT INTO `tb_area` VALUES ('370683', '莱州市', '370600', '3');
INSERT INTO `tb_area` VALUES ('421087', '松滋市', '421000', '3');
INSERT INTO `tb_area` VALUES ('610582', '华阴市', '610500', '3');
INSERT INTO `tb_area` VALUES ('130225', '乐亭县', '130200', '3');
INSERT INTO `tb_area` VALUES ('141128', '方山县', '141100', '3');
INSERT INTO `tb_area` VALUES ('340621', '濉溪县', '340600', '3');
INSERT INTO `tb_area` VALUES ('520381', '赤水市', '520300', '3');
INSERT INTO `tb_area` VALUES ('370403', '薛城区', '370400', '3');
INSERT INTO `tb_area` VALUES ('320812', '清江浦区', '320800', '3');
INSERT INTO `tb_area` VALUES ('440785', '恩平市', '440700', '3');
INSERT INTO `tb_area` VALUES ('431381', '冷水江市', '431300', '3');
INSERT INTO `tb_area` VALUES ('652926', '拜城县', '652900', '3');
INSERT INTO `tb_area` VALUES ('140521', '沁水县', '140500', '3');
INSERT INTO `tb_area` VALUES ('150101', '市辖区', '150100', '3');
INSERT INTO `tb_area` VALUES ('540221', '南木林县', '540200', '3');
INSERT INTO `tb_area` VALUES ('330727', '磐安县', '330700', '3');
INSERT INTO `tb_area` VALUES ('510701', '市辖区', '510700', '3');
INSERT INTO `tb_area` VALUES ('230900', '七台河市', '230000', '2');
INSERT INTO `tb_area` VALUES ('330100', '杭州市', '330000', '2');
INSERT INTO `tb_area` VALUES ('420801', '市辖区', '420800', '3');
INSERT INTO `tb_area` VALUES ('150784', '额尔古纳市', '150700', '3');
INSERT INTO `tb_area` VALUES ('530326', '会泽县', '530300', '3');
INSERT INTO `tb_area` VALUES ('540423', '墨脱县', '540400', '3');
INSERT INTO `tb_area` VALUES ('420222', '阳新县', '420200', '3');
INSERT INTO `tb_area` VALUES ('420322', '郧西县', '420300', '3');
INSERT INTO `tb_area` VALUES ('350000', '福建省', '0', '1');
INSERT INTO `tb_area` VALUES ('610202', '王益区', '610200', '3');
INSERT INTO `tb_area` VALUES ('360730', '宁都县', '360700', '3');
INSERT INTO `tb_area` VALUES ('411025', '襄城县', '411000', '3');
INSERT INTO `tb_area` VALUES ('341702', '贵池区', '341700', '3');
INSERT INTO `tb_area` VALUES ('361127', '余干县', '361100', '3');
INSERT INTO `tb_area` VALUES ('610902', '汉滨区', '610900', '3');
INSERT INTO `tb_area` VALUES ('533123', '盈江县', '533100', '3');
INSERT INTO `tb_area` VALUES ('210624', '宽甸满族自治县', '210600', '3');
INSERT INTO `tb_area` VALUES ('350801', '市辖区', '350800', '3');
INSERT INTO `tb_area` VALUES ('513330', '德格县', '513300', '3');
INSERT INTO `tb_area` VALUES ('441900', '东莞市', '440000', '2');
INSERT INTO `tb_area` VALUES ('360425', '永修县', '360400', '3');
INSERT INTO `tb_area` VALUES ('340827', '望江县', '340800', '3');
INSERT INTO `tb_area` VALUES ('341000', '黄山市', '340000', '2');
INSERT INTO `tb_area` VALUES ('222405', '龙井市', '222400', '3');
INSERT INTO `tb_area` VALUES ('420103', '江汉区', '420100', '3');
INSERT INTO `tb_area` VALUES ('512000', '资阳市', '510000', '2');
INSERT INTO `tb_area` VALUES ('210711', '太和区', '210700', '3');
INSERT INTO `tb_area` VALUES ('510000', '四川省', '0', '1');
INSERT INTO `tb_area` VALUES ('632500', '海南藏族自治州', '630000', '2');
INSERT INTO `tb_area` VALUES ('130281', '遵化市', '130200', '3');
INSERT INTO `tb_area` VALUES ('140932', '偏关县', '140900', '3');
INSERT INTO `tb_area` VALUES ('410703', '卫滨区', '410700', '3');
INSERT INTO `tb_area` VALUES ('511501', '市辖区', '511500', '3');
INSERT INTO `tb_area` VALUES ('331022', '三门县', '331000', '3');
INSERT INTO `tb_area` VALUES ('420984', '汉川市', '420900', '3');
INSERT INTO `tb_area` VALUES ('620000', '甘肃省', '0', '1');
INSERT INTO `tb_area` VALUES ('522328', '安龙县', '522300', '3');
INSERT INTO `tb_area` VALUES ('310116', '金山区', '310100', '3');
INSERT INTO `tb_area` VALUES ('420325', '房县', '420300', '3');
INSERT INTO `tb_area` VALUES ('220821', '镇赉县', '220800', '3');
INSERT INTO `tb_area` VALUES ('140500', '晋城市', '140000', '2');
INSERT INTO `tb_area` VALUES ('430503', '大祥区', '430500', '3');
INSERT INTO `tb_area` VALUES ('141026', '安泽县', '141000', '3');
INSERT INTO `tb_area` VALUES ('500119', '南川区', '500100', '3');
INSERT INTO `tb_area` VALUES ('620826', '静宁县', '620800', '3');
INSERT INTO `tb_area` VALUES ('340208', '三山区', '340200', '3');
INSERT INTO `tb_area` VALUES ('621223', '宕昌县', '621200', '3');
INSERT INTO `tb_area` VALUES ('510181', '都江堰市', '510100', '3');
INSERT INTO `tb_area` VALUES ('621225', '西和县', '621200', '3');
INSERT INTO `tb_area` VALUES ('222404', '珲春市', '222400', '3');
INSERT INTO `tb_area` VALUES ('371626', '邹平县', '371600', '3');
INSERT INTO `tb_area` VALUES ('320402', '天宁区', '320400', '3');
INSERT INTO `tb_area` VALUES ('410701', '市辖区', '410700', '3');

-- ----------------------------
-- Table structure for tb_contract
-- ----------------------------
DROP TABLE IF EXISTS `tb_contract`;
CREATE TABLE `tb_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_no` varchar(20) NOT NULL COMMENT '合同编号',
  `order_no` varchar(20) NOT NULL COMMENT '关联订单',
  `contract_template_no` varchar(20) NOT NULL COMMENT '合同模板',
  `custom_content` text NOT NULL COMMENT '合同内容',
  `operator_id` int(11) NOT NULL COMMENT '创建者',
  `effective_time` date DEFAULT NULL COMMENT '生效时间',
  `failure_time` date DEFAULT NULL COMMENT '失效时间',
  `sign_date` date DEFAULT NULL COMMENT '签署日期',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_contract
-- ----------------------------
INSERT INTO `tb_contract` VALUES ('4', 'CN5b8534e4aa545', 'OR5b8534e4a62dc', 'CT5b83a46b8131f', '', '16', '2018-08-28', '2019-08-28', null, '1', '2018-08-28 19:41:24', '2018-08-28 19:41:24');
INSERT INTO `tb_contract` VALUES ('5', 'CN5b865f1aa602f', 'OR5b865f1aa2d66', 'CT5b83a46b8131f', '{\r\n	\"red\": \"红色\",\r\n	\"blue\": \"蓝色\",\r\n	\"black\": \"黑色\"\r\n}', '16', '2018-08-29', '2019-08-29', null, '1', '2018-08-29 16:53:46', '2018-08-29 16:53:46');
INSERT INTO `tb_contract` VALUES ('6', 'CN5b865fae2e004', 'OR5b865fae2c0c3', 'CT5b83a46b8131f', '{\r\n	\"red\": \"红色\",\r\n	\"blue\": \"蓝色\",\r\n	\"black\": \"黑色\"\r\n}', '16', '2018-08-29', '2019-08-29', null, '1', '2018-08-29 16:56:14', '2018-08-29 16:56:14');
INSERT INTO `tb_contract` VALUES ('7', 'CN5b86610884616', 'OR5b86610880b7d', 'CT5b83a46b8131f', '{\r\n	\"red\": \"红色\",\r\n	\"blue\": \"蓝色\",\r\n	\"black\": \"黑色\"\r\n}', '16', '2018-08-29', '2019-08-29', '2018-08-30', '3', '2018-08-29 17:02:00', '2018-08-30 13:58:24');

-- ----------------------------
-- Table structure for tb_contract_template
-- ----------------------------
DROP TABLE IF EXISTS `tb_contract_template`;
CREATE TABLE `tb_contract_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '模板标题',
  `template_no` varchar(20) NOT NULL COMMENT '模板编号',
  `remark` varchar(255) NOT NULL DEFAULT '0' COMMENT '备注',
  `rich_text` text NOT NULL COMMENT '富文本内容',
  `operator_id` int(11) NOT NULL COMMENT '创建人',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_contract_template
-- ----------------------------
INSERT INTO `tb_contract_template` VALUES ('1', '一般场地租赁合同', 'CT5b83a46b8131f', '一般场地租赁合同', '&lt;table&gt;111&lt;/table&gt;', '16', '1', '2018-08-27 14:16:46', '2018-08-27 15:12:43');

-- ----------------------------
-- Table structure for tb_department
-- ----------------------------
DROP TABLE IF EXISTS `tb_department`;
CREATE TABLE `tb_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '部门名称',
  `p_id` int(11) DEFAULT '0' COMMENT '部门名称',
  `description` varchar(255) NOT NULL COMMENT '部门描述',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_department
-- ----------------------------
INSERT INTO `tb_department` VALUES ('1', '人事', '0', '主要进行人事管理，团队内信息发布通知', '2018-08-26 14:48:33', '2018-08-26 14:49:42');

-- ----------------------------
-- Table structure for tb_development
-- ----------------------------
DROP TABLE IF EXISTS `tb_development`;
CREATE TABLE `tb_development` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enter_team_id` int(11) NOT NULL COMMENT '入驻团队',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '日期',
  `description` text NOT NULL COMMENT '描述',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_development
-- ----------------------------
INSERT INTO `tb_development` VALUES ('1', '1', '2018-08-23 14:32:18', '这里是纯文本介绍内容', '2018-08-23 14:32:18', null);

-- ----------------------------
-- Table structure for tb_enter_team
-- ----------------------------
DROP TABLE IF EXISTS `tb_enter_team`;
CREATE TABLE `tb_enter_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL DEFAULT '' COMMENT '公司名称',
  `admin_account` varchar(20) NOT NULL COMMENT '管理员账户',
  `business_license` varchar(30) NOT NULL DEFAULT '' COMMENT '营业执照',
  `bl_picture` varchar(80) NOT NULL COMMENT '营业执照扫描件',
  `legal_person` varchar(20) NOT NULL COMMENT '法人姓名',
  `id_card` varchar(18) NOT NULL COMMENT '法人身份证',
  `id_card_pictures` varchar(255) NOT NULL DEFAULT '' COMMENT '身份证正反扫描件',
  `main_business` varchar(30) NOT NULL COMMENT '主营业务',
  `develop_stage` varchar(30) NOT NULL DEFAULT '0' COMMENT '发展阶段',
  `description` text NOT NULL COMMENT '团队介绍',
  `logo` varchar(80) NOT NULL DEFAULT '' COMMENT '公司LOGO',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_enter_team
-- ----------------------------
INSERT INTO `tb_enter_team` VALUES ('1', '上海真的是一个有限公司', 'admin', 'YINYEZHIZHAO', '/images/20180822/c6e473f1835a674fdaff0fc05e0c8e3a.JPEG', '赵四', '22023119901009421x', '[\"\\/images\\/20180822\\/77675f98f6240734fd2929035bbadef7.jpg\",\"\\/images\\/20180822\\/fea5295f6ff6f70bff293b8084da2135.JPEG\"]', '影视节目制作', '寻求融资', '我i们是一家致力于爱情动作片的影视制作企业，目前在全世界各地均有分公司设立。我i们是一家致力于爱情动作片的影视制作企业，目前在全世界各地均有分公司设立。', '/images/20180822/8989cacd27d32683cf73847b1aea16d5.JPEG', '2018-08-22 14:30:53', '2018-08-22 14:58:39', '1');
INSERT INTO `tb_enter_team` VALUES ('2', '上海伪装者有限公司', 'admin', 'YINYEZHIZHAO', '/images/20180822/a023bea1952f543aa83203b2d513fe2d.jpg', '魏庄', '22023119901009421x', '[\"\\/images\\/20180822\\/2f9aa19a068b80bfcd994f75b32bf75f.jpg\",\"\\/images\\/20180822\\/3a9c4ba10fb5f85b4463d771b9aa791c.JPEG\"]', '影视节目制作', '寻求融资', '我i们是一家致力于爱情动作片的影视制作企业，目前在全世界各地均有分公司设立。我i们是一家致力于爱情动作片的影视制作企业，目前在全世界各地均有分公司设立。', '/images/20180822/35efaa2ceb29992ed47065e6e75b47de.JPEG', '2018-08-22 14:50:33', '2018-08-22 14:50:33', '1');

-- ----------------------------
-- Table structure for tb_enter_team_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_enter_team_member`;
CREATE TABLE `tb_enter_team_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `position` varchar(20) NOT NULL COMMENT '职务',
  `signature` varchar(100) NOT NULL DEFAULT '' COMMENT '签名',
  `achievement` text NOT NULL COMMENT '主要成就',
  `resume` text NOT NULL COMMENT '个人履历',
  `picture` varchar(80) NOT NULL DEFAULT '' COMMENT '形象图',
  `enter_team_id` int(11) NOT NULL COMMENT '入驻团队id',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_enter_team_member
-- ----------------------------
INSERT INTO `tb_enter_team_member` VALUES ('1', '胖虎', '安保人员', '不服就是赶', '打大雄', '打大雄', '/images/20180822/23c4f20007da018af2cb3873a196b2d4.JPEG', '1', '2018-08-22 16:39:35', '2018-08-22 16:39:35');

-- ----------------------------
-- Table structure for tb_equipment
-- ----------------------------
DROP TABLE IF EXISTS `tb_equipment`;
CREATE TABLE `tb_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_no` varchar(20) NOT NULL COMMENT '设备编号',
  `name` varchar(20) NOT NULL COMMENT '设备名称',
  `type_id` int(4) NOT NULL COMMENT '设备类型',
  `space_id` int(11) NOT NULL COMMENT '所属空间',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '设备状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_equipment
-- ----------------------------
INSERT INTO `tb_equipment` VALUES ('1', 'SHJK-G01', '投影', '1', '1', '1', '2018-08-24 18:48:30', '2018-08-24 18:48:30');

-- ----------------------------
-- Table structure for tb_equipment_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_equipment_type`;
CREATE TABLE `tb_equipment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '设备类型名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_equipment_type
-- ----------------------------
INSERT INTO `tb_equipment_type` VALUES ('1', '办公', '2018-08-24 18:16:05', '2018-08-24 18:16:05');

-- ----------------------------
-- Table structure for tb_history_template
-- ----------------------------
DROP TABLE IF EXISTS `tb_history_template`;
CREATE TABLE `tb_history_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '模板标题',
  `template_no` varchar(20) NOT NULL COMMENT '模板编号',
  `template_id` int(11) NOT NULL COMMENT '模板id',
  `remark` varchar(255) NOT NULL DEFAULT '0' COMMENT '备注',
  `rich_text` text NOT NULL COMMENT '富文本内容',
  `editor` int(11) NOT NULL COMMENT '编辑者',
  `status` int(2) NOT NULL COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_history_template
-- ----------------------------
INSERT INTO `tb_history_template` VALUES ('1', '一般场地租赁合同', 'CT5b83a45579133', '1', '一般场地租赁合同', '&lt;table&gt;111&lt;/table&gt;', '16', '1', '2018-08-27 15:12:43', '2018-08-27 15:12:43');

-- ----------------------------
-- Table structure for tb_information
-- ----------------------------
DROP TABLE IF EXISTS `tb_information`;
CREATE TABLE `tb_information` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '消息主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '消息标题',
  `publisher` int(11) NOT NULL COMMENT '发布人',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `publish_time` timestamp NULL DEFAULT NULL,
  `rich_text` text COMMENT '富文本区域',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_information
-- ----------------------------
INSERT INTO `tb_information` VALUES ('1', '最新产业联盟大会即将于2018年13月32号举行', '1', '0', '2018-08-05 21:53:02', '<a>111</a>');
INSERT INTO `tb_information` VALUES ('5', '测试消息', '16', '0', '2018-08-21 15:07:42', '');

-- ----------------------------
-- Table structure for tb_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tb_invoice`;
CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `opener_type` int(2) NOT NULL COMMENT '开具类型',
  `invoice_title` varchar(50) NOT NULL COMMENT '发票抬头',
  `type` int(2) NOT NULL COMMENT '发票类型',
  `tax` varchar(25) NOT NULL COMMENT '税务登记证号',
  `bank` varchar(50) DEFAULT NULL COMMENT '开户银行',
  `account` varchar(30) DEFAULT NULL COMMENT '开户账号',
  `address` varchar(255) DEFAULT NULL COMMENT '注册场所地址',
  `phone` varchar(13) DEFAULT NULL COMMENT '注册电话',
  `status` int(2) NOT NULL COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_invoice
-- ----------------------------
INSERT INTO `tb_invoice` VALUES ('25', 'OR5b8534e4a62dc', '1', '上海游达网络有限公司', '1', 'ks12345646', '中国工商银行上海浦东支行', 'ksnk1234565', '上海市浦东新区纳贤路800号', '021-65567577', '0', '2018-08-28 19:41:24', '2018-08-28 19:41:24');
INSERT INTO `tb_invoice` VALUES ('35', 'OR5b865f1aa2d66', '1', '上海伪装者有限公司', '1', 'fasdf45646', '上海工商银行', 'adfas451', '上海浦东新区张江高科', '021-65587877', '-1', '2018-08-29 16:53:46', '2018-08-29 16:53:46');
INSERT INTO `tb_invoice` VALUES ('36', 'OR5b865fae2c0c3', '1', '上海伪装者有限公司', '1', 'fasdf45646', '上海工商银行', 'adfas451', '上海浦东新区张江高科', '021-65587877', '-1', '2018-08-29 16:56:14', '2018-08-29 16:56:14');
INSERT INTO `tb_invoice` VALUES ('46', 'OR5b86610880b7d', '1', '上海伪装者有限公司', '1', 'fasdf45646', '上海工商银行', 'adfas451', '上海浦东新区张江高科', '021-65587877', '-1', '2018-08-29 17:02:00', '2018-08-29 17:02:00');

-- ----------------------------
-- Table structure for tb_linkman
-- ----------------------------
DROP TABLE IF EXISTS `tb_linkman`;
CREATE TABLE `tb_linkman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enter_team_id` int(11) NOT NULL COMMENT '入驻团队id',
  `a_linkman` varchar(30) NOT NULL DEFAULT '' COMMENT '行政联系人',
  `a_mobile` varchar(11) NOT NULL COMMENT '行政联系人电话',
  `a_email` varchar(30) NOT NULL COMMENT '行政邮箱',
  `a_remind` int(2) NOT NULL COMMENT '行政接收提醒方式(1=>短信,2=>邮箱)',
  `f_linkman` varchar(30) NOT NULL COMMENT '财务联系人',
  `f_mobile` varchar(11) NOT NULL COMMENT '财务联系人电话',
  `f_email` varchar(30) NOT NULL COMMENT '财务邮箱',
  `f_remind` int(2) NOT NULL COMMENT '财务接收提醒方式(1=>短信,2=>邮箱)',
  `e_linkman` varchar(30) NOT NULL COMMENT '紧急联系人',
  `e_mobile` varchar(11) NOT NULL COMMENT '紧急联系人电话',
  `e_email` varchar(30) NOT NULL COMMENT '紧急邮箱',
  `e_remind` int(2) NOT NULL COMMENT '紧急接收提醒方式(1=>短信,2=>邮箱)',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_linkman
-- ----------------------------
INSERT INTO `tb_linkman` VALUES ('1', '1', '小小', '17826815704', '789@163.com', '1', '小李', '17826815701', '456@163.co', '2', '小孙', '17826815703', '456@163.com', '2', '2018-08-23 11:43:28', '2018-08-23 11:46:40');
INSERT INTO `tb_linkman` VALUES ('2', '2', '', '', '', '0', '小为', '17826815706', '8467@163.com', '1', '', '', '', '0', '2018-08-23 11:48:16', '2018-08-23 11:48:16');

-- ----------------------------
-- Table structure for tb_operation_team
-- ----------------------------
DROP TABLE IF EXISTS `tb_operation_team`;
CREATE TABLE `tb_operation_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '运营团队全称',
  `leader_id` int(11) NOT NULL COMMENT '负责人',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `management_type` int(2) NOT NULL DEFAULT '0' COMMENT '管理模式',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_operation_team
-- ----------------------------
INSERT INTO `tb_operation_team` VALUES ('1', '测试运营团队', '1', '测试运营团队', '0', '2018-08-08 18:37:50', '2018-08-20 18:38:05', '1');

-- ----------------------------
-- Table structure for tb_operation_team_roles
-- ----------------------------
DROP TABLE IF EXISTS `tb_operation_team_roles`;
CREATE TABLE `tb_operation_team_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operation_team_id` int(11) NOT NULL COMMENT '运营团队id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_operation_team_roles
-- ----------------------------

-- ----------------------------
-- Table structure for tb_order
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单编号',
  `team_id` int(20) NOT NULL COMMENT '团队id',
  `contract_template_no` varchar(20) NOT NULL COMMENT '合同模板编号',
  `contract_years` int(4) NOT NULL DEFAULT '1' COMMENT '合同年限',
  `pay_type` int(2) NOT NULL DEFAULT '1' COMMENT '付款方式',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '定金',
  `total_price` decimal(10,2) DEFAULT '0.00' COMMENT '订单总价',
  `invoice_no` varchar(20) NOT NULL COMMENT '发票编号',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `operator_id` int(11) NOT NULL COMMENT '创建人',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_order
-- ----------------------------
INSERT INTO `tb_order` VALUES ('27', 'OR5b8534e4a62dc', '1', 'CT5b83a46b8131f', '1', '1', '1000.00', '10000.00', 'IN5b8534e4a66c4', '1000.00', '测试', '1', '16', '2018-08-28 19:41:24', '2018-08-28 19:41:24');
INSERT INTO `tb_order` VALUES ('37', 'OR5b865f1aa2d66', '2', 'CT5b83a46b8131f', '1', '1', '10000.00', null, 'IN5b865f1aa314e', '100.00', 'fjaskldfj', '1', '16', '2018-08-29 16:53:46', '2018-08-29 16:53:46');
INSERT INTO `tb_order` VALUES ('38', 'OR5b865fae2c0c3', '2', 'CT5b83a46b8131f', '1', '1', '10000.00', '100000.00', 'IN5b865fae2c4ac', '100.00', 'fjaskldfj', '1', '16', '2018-08-29 16:56:14', '2018-08-29 16:56:14');
INSERT INTO `tb_order` VALUES ('48', 'OR5b86610880b7d', '2', 'CT5b83a46b8131f', '1', '1', '10000.00', '100000.00', 'IN5b86610880f65', '100.00', 'fjaskldfj', '1', '16', '2018-08-29 17:02:00', '2018-08-29 17:02:00');

-- ----------------------------
-- Table structure for tb_order_workplace
-- ----------------------------
DROP TABLE IF EXISTS `tb_order_workplace`;
CREATE TABLE `tb_order_workplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `workplace_id` int(11) NOT NULL COMMENT '工位id',
  `workplace_area` decimal(10,2) DEFAULT NULL COMMENT '工位面积',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_order_workplace
-- ----------------------------
INSERT INTO `tb_order_workplace` VALUES ('8', '48', '1', '0.00', '2018-08-28 19:41:24', '2018-08-28 19:41:24');
INSERT INTO `tb_order_workplace` VALUES ('9', '27', '2', '200.00', '2018-08-28 19:41:24', '2018-08-28 19:41:24');
INSERT INTO `tb_order_workplace` VALUES ('10', '48', '2', '300.50', '2018-08-29 17:02:00', '2018-08-29 17:02:00');

-- ----------------------------
-- Table structure for tb_permission
-- ----------------------------
DROP TABLE IF EXISTS `tb_permission`;
CREATE TABLE `tb_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
  `path` varchar(100) NOT NULL DEFAULT '' COMMENT '权限路径',
  `pid` int(12) DEFAULT NULL COMMENT '父节点',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '权限描述',
  `sort` int(12) DEFAULT NULL COMMENT '排序',
  `level` int(12) DEFAULT NULL COMMENT '层次',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '权限状态',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `icon` varchar(18) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of tb_permission
-- ----------------------------
INSERT INTO `tb_permission` VALUES ('1', '系统管理', '/admin/server', '0', '系统管理的描述', '1', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('2', '角色管理', '/admin/role/role_list', '1', '角色管理的描述', '2', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('3', '角色添加/编辑', '/admin/role/add', '2', '角色添加/编辑的描述', '3', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('4', '角色删除', '/admin/role/delete', '2', '角色删除的描述', '4', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('5', '角色获取', '/admin/role/detail', '2', '角色获取的描述', '5', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('6', '获取用户权限', '/admin/role/get_role_permission', '2', '获取用户权限的描述', '6', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('7', '修改用户权限', '/admin/role/assign_role_permission', '2', '修改用户权限的描述', '7', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('8', '管理员管理', '/admin/admin/admin_list', '7', '管理员管理的描述', '8', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('9', '管理员添加/编辑', '/admin/admin/assign_user_role', '8', '管理员添加/编辑的描述', '9', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('10', '管理员删除', '-', '8', '管理员删除的描述', '10', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('11', '管理员获取', '/admin/admin/detail', '8', '管理员获取的描述', '11', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('12', '权限管理', '/admin/permission/node_list', '11', '权限管理的描述', '12', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('13', '权限添加/编辑', '/admin/permission/add', '12', '权限添加/编辑的描述', '13', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('14', '权限删除', '/admin/permission/delete', '12', '权限删除的描述', '14', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('15', '权限获取', '/admin/permission/detail', '12', '权限获取的描述', '15', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('16', '当前用户权限列表', '/admin/permission/node', '12', '当前用户权限列表的描述', '16', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('17', '轮播管理', '/admin/carousel', '0', '轮播管理的描述', '17', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('18', '轮播列表', '/admin/carousel/carousel_list', '17', '轮播列表的描述', '18', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('19', '轮播添加/编辑', '/admin/carousel/upload', '18', '轮播添加/编辑的描述', '19', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('20', '轮播删除', '/admin/carousel/delete', '18', '轮播删除的描述', '20', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('21', '轮播获取', '/admin/carousel/detail', '18', '轮播获取的描述', '21', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('22', '大赛管理', '/admin/competition', '0', '大赛管理的描述', '22', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('23', '大赛列表', '/admin/competition/index', '22', '大赛列表的描述', '23', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('24', '大赛添加/编辑', '/admin/competition/save', '23', '大赛添加/编辑的描述', '24', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('25', '大赛详细', '/admin/competition/detail', '23', '大赛详细的描述', '25', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('26', '大赛编辑', '/admin/competition/introduce', '23', '大赛编辑的描述', '26', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('27', '大赛删除', '/admin/competition/delete', '23', '大赛删除的描述', '27', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('28', '创业导师', '/admin/tutor/index', '27', '创业导师的描述', '28', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('29', '导师添加/编辑', '/admin/tutor/save', '28', '导师添加/编辑的描述', '29', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('30', '导师详细', '/admin/tutor/detail', '28', '导师详细的描述', '30', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('31', '导师删除', '/admin/tutor/delete', '28', '导师删除的描述', '31', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('32', '参赛团队', '/admin/team/index', '31', '参赛团队的描述', '32', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('33', '团队添加/编辑', '/admin/team/save', '32', '团队添加/编辑的描述', '33', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('34', '团队详细', '/admin/team/detail', '32', '团队详细的描述', '34', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('35', '团队删除', '/admin/team/delete', '32', '团队删除的描述', '35', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('36', '大赛新闻', '/admin/news/index', '35', '大赛新闻的描述', '36', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('37', '新闻添加/编辑', '/admin/news/save', '36', '新闻添加/编辑的描述', '37', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('38', '新闻详细', '/admin/news/detail', '36', '新闻详细的描述', '38', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('39', '新闻删除', '/admin/news/delete', '36', '新闻删除的描述', '39', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('40', '投资机构', '/admin/investor/index', '39', '投资机构的描述', '40', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('41', '机构添加/编辑', '/admin/investor/save', '40', '机构添加/编辑的描述', '41', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('42', '机构详细', '/admin/investor/detail', '40', '机构详细的描述', '42', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('43', '机构删除', '/admin/investor/delete', '40', '机构删除的描述', '43', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('44', '服务商', '/admin/sp/index', '43', '服务商的描述', '44', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('45', '服务商添加/编辑', '/admin/sp/save', '44', '服务商添加/编辑的描述', '45', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('46', '服务商详细', '/admin/sp/detail', '44', '服务商详细的描述', '46', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('47', '服务商删除', '/admin/sp/delete', '44', '服务商删除的描述', '47', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('48', '组织机构分组', '/admin/organizer_group/index', '47', '组织机构分组的描述', '48', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('49', '组织机构分组添加/编辑', '/admin/organizer_group/save', '48', '组织机构分组添加/编辑的描述', '49', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('50', '组织机构分组详细', '/admin/organizer_group/detail', '48', '组织机构分组详细的描述', '50', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('51', '组织机构分组删除', '/admin/organizer_group/delete', '48', '组织机构分组删除的描述', '51', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('52', '组织机构', '/admin/organizer/index', '51', '组织机构的描述', '52', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('53', '组织机构添加/编辑', '/admin/organizer/save', '52', '组织机构添加/编辑的描述', '53', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('54', '组织机构详细', '/admin/organizer/detail', '52', '组织机构详细的描述', '54', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('55', '组织机构删除', '/admin/organizer/delete', '52', '组织机构删除的描述', '55', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('56', '大赛论坛', '', '55', '大赛论坛的描述', '56', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('57', '论坛关联添加/编辑', '', '56', '论坛关联添加/编辑的描述', '57', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('58', '论坛关联删除', '', '56', '论坛关联删除的描述', '58', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('59', '论坛活动', '/admin/active', '0', '论坛活动的描述', '59', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('60', '活动管理', '/admin/active/index', '59', '活动管理的描述', '60', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('61', '活动添加/编辑活动', '/admin/active/save', '60', '活动添加/编辑活动的描述', '61', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('62', '活动删除', '/admin/active/delete', '60', '活动删除的描述', '62', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('63', '活动获取', '/admin/active/detail', '60', '活动获取的描述', '63', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('64', '活动已报名列表', '/admin/active/enroll_list', '60', '活动已报名列表的描述', '64', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('65', '活动报名审核', '/admin/active/check', '60', '活动报名审核的描述', '65', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('66', '活动回顾', '/admin/review/index', '65', '活动回顾的描述', '66', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('67', '回顾添加/编辑活动', '/admin/review/save', '66', '回顾添加/编辑活动的描述', '67', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('68', '回顾删除', '/admin/active/delete', '66', '回顾删除的描述', '68', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('69', '回顾获取', '/admin/review/detail', '66', '回顾获取的描述', '69', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('70', '服务资源商管理', '/admin/service', '0', '服务资源商管理的描述', '70', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('71', '服务资源商列表', '/admin/service/index', '70', '服务资源商列表的描述', '71', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('72', '服务资源商添加/编辑活动', '/admin/service/save', '71', '服务资源商添加/编辑活动的描述', '72', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('73', '服务资源商删除', '/admin/service/delete', '71', '服务资源商删除的描述', '73', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('74', '服务资源商获取', '/admin/service/detail', '71', '服务资源商获取的描述', '74', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('75', '服务资源商分类添加', '/admin/category/save', '71', '服务资源商分类添加的描述', '75', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('76', '用户管理', '/admin/user', '0', '用户管理的描述', '76', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('77', '用户列表', '/admin/user/user_list', '76', '用户列表的描述', '77', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('78', '用户添加/编辑活动', '/admin/user/create', '77', '用户添加/编辑活动的描述', '78', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('79', '用户删除', '/admin/user/delete', '77', '用户删除的描述', '79', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('80', '用户获取', '/admin/user/detail', '77', '用户获取的描述', '80', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('81', '消息管理', '/admin/information', '0', '消息管理的描述', '81', '1', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('82', '消息列表', '/admin/information/index', '81', '消息列表的描述', '82', '2', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('83', '消息添加/编辑活动', '/admin/information/save', '82', '消息添加/编辑活动的描述', '83', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('84', '消息删除', '/admin/information/delete', '82', '消息删除的描述', '84', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('85', '消息获取', '/admin/information/detail', '82', '消息获取的描述', '85', '3', '1', '1533780014', '');
INSERT INTO `tb_permission` VALUES ('86', '', '/admin/competition/add_forum', null, '', null, null, '0', '0', '');
INSERT INTO `tb_permission` VALUES ('87', '', '/admin/competition/delete_forum', null, '', null, null, '0', '0', '');
INSERT INTO `tb_permission` VALUES ('108', '后台用户修改密码', '/admin//admin/change_password', null, '后台用户修改密码', '85', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('109', '运营团队管理', '/admin/operation_team', '0', '运营团队管理', '0', '1', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('110', '运营团队列表', '/admin/operation_team/index', '109', '运营团队列表的描述', '109', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('111', '运营团队删除', '/admin/operation_team/delete', '109', '运营团队删除', '109', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('112', '运营团队新增更新', '/admin/operation_team/save', '109', '运营团队新增更新', '109', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('113', '运营团队详情', '/admin/operation_team/detail', '109', '运营团队详情的描述', '109', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('114', '空间管理', '/admin/space', '0', '空间管理的描述', '114', '1', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('115', '空间添加/编辑', '/admin/space/save', '114', '空间添加、编辑的描述', '115', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('116', '空间所属地区', '/admin/area/index', '114', '空间所属地区的描述', '116', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('117', '空间列表', '/admin/space/index', '114', '空间列表的描述', '117', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('118', '空间详情', '/admin/space/detail', '114', '空间详情的描述', '118', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('119', '空间删除', '/admin/space/delete', '114', '空间删除的描述', '119', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('120', '工位管理', '/admin/workplace', '0', '工位管理的描述', '120', '1', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('121', '工位新增/编辑', '/admin/workplace/save', '120', '工位新增/编辑的描述', '121', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('122', '工位列表', '/admin/workplace/index', '120', '工位列表管理', '122', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('123', '工位分组管理', '/admin/workplace_group', '0', '工位分组管理', '123', '1', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('124', '工位分组新增更新', '/admin/workplace_group/save', '123', '工位分组新增更新的描述', '124', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('125', '工位分组列表', '/admin/workplace_group/index', '123', '工位分组列表的管理', '125', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('126', '工位分组详情', '/admin/workplace_group/detail', '123', '工位分组详情的管理', '126', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('127', '工位分组删除', '/admin/workplace_group/delete', '123', '工位分组删除', '127', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('128', '运营团队负责人下拉列表', '/admin/operation_team/leader', '109', '运营团队负责人下拉列表', '128', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('129', '运营团队下拉列表', '/admin/admin/operation_team', '77', '运营团队下拉列表', '129', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('130', '后台用户信息', '/admin/admin/info', '77', '后台用户信息', '130', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('131', '后台管理员更改密码', '/admin/admin/change_password', '77', '后台管理员更改密码', '131', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('132', '入驻团队管理', '/admin/enter_team', '0', '入驻团队管理的描述', '132', '1', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('133', '入驻团队列表', '/admin/enter_team/index', '132', '入驻团队列表的描述', '133', '2', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('134', '入驻团队新增更新', '/admin/enter_team/save', '132', '入驻团队新增更新', '134', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('135', '入驻团队详情', '/admin/enter_team/detail', '132', '入驻团队详情', '135', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('136', '入驻团队删除', '/admin/enter_team/delete', '132', '入驻团队删除', '136', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('137', '场馆预约审核', '/admin/reservation/check', null, '场馆预约审核', '137', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('138', '合同模板新增更新', '/admin/contract_template/save', null, '合同模板新增更新', '138', '3', '1', '0', '');
INSERT INTO `tb_permission` VALUES ('139', '订单新增', '/admin/order/save', null, '订单新增', '139', '3', '1', '0', '');

-- ----------------------------
-- Table structure for tb_repair
-- ----------------------------
DROP TABLE IF EXISTS `tb_repair`;
CREATE TABLE `tb_repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL COMMENT '报修描述',
  `equipment_no` varchar(20) NOT NULL COMMENT '设备编号',
  `repair_man` varchar(255) NOT NULL COMMENT '报修人',
  `mobile` varchar(13) NOT NULL COMMENT '报修人电话',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_repair
-- ----------------------------
INSERT INTO `tb_repair` VALUES ('1', '东边的墙塌了', 'SS24241472', 'wang', '13967741061', '0', '2018-08-26 16:10:16', '2018-08-26 16:10:16');
INSERT INTO `tb_repair` VALUES ('2', '投影仪坏了', 'k520', 'wcw', '17826815702', '1', '2018-08-26 16:24:48', '2018-08-26 16:24:48');

-- ----------------------------
-- Table structure for tb_reservation
-- ----------------------------
DROP TABLE IF EXISTS `tb_reservation`;
CREATE TABLE `tb_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL COMMENT '场馆',
  `enter_team_id` int(11) NOT NULL COMMENT '团队',
  `date` date NOT NULL COMMENT '日期',
  `reservation_time` varchar(100) NOT NULL COMMENT '预约时间',
  `check_user` int(11) DEFAULT NULL COMMENT '审核人',
  `check_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '审核时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_reservation
-- ----------------------------
INSERT INTO `tb_reservation` VALUES ('1', '1', '1', '2018-08-25', '1', '16', '2018-08-26 17:35:38', '2018-08-24 16:45:13', '2018-08-26 17:35:38', '1');
INSERT INTO `tb_reservation` VALUES ('2', '2', '2', '2018-08-25', '1', null, null, '2018-08-24 16:46:01', null, '0');

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(12) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '角色类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='角色';

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES ('1', '超级管理员', '0', '商品管理员负责商品的查看修改删除等操作', '1', '10', '39', '40', null, '2018-08-01 00:48:53', '1', '0');
INSERT INTO `tb_role` VALUES ('2', '管理员', '0', '商品管理员负责财产的查看修改删除等操作', '0', '10', '37', '38', null, '2018-08-16 16:09:39', '1', '0');
INSERT INTO `tb_role` VALUES ('3', '会员', '0', '商品管理员负责宝物的查看修改删除等操作', '1', '10', '35', '36', null, '2018-08-16 16:09:41', '1', '0');
INSERT INTO `tb_role` VALUES ('16', '人事', '0', '主要进行人事管理，团队内信息发布通知', '1', '0', '1', '2', '2018-08-20 16:28:19', null, '1', '0');

-- ----------------------------
-- Table structure for tb_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `tb_role_permission`;
CREATE TABLE `tb_role_permission` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色Id',
  `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限ID',
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色权限对应表';

-- ----------------------------
-- Records of tb_role_permission
-- ----------------------------
INSERT INTO `tb_role_permission` VALUES ('1', '1');
INSERT INTO `tb_role_permission` VALUES ('1', '2');
INSERT INTO `tb_role_permission` VALUES ('1', '3');
INSERT INTO `tb_role_permission` VALUES ('1', '4');
INSERT INTO `tb_role_permission` VALUES ('1', '5');
INSERT INTO `tb_role_permission` VALUES ('1', '6');
INSERT INTO `tb_role_permission` VALUES ('1', '7');
INSERT INTO `tb_role_permission` VALUES ('1', '8');
INSERT INTO `tb_role_permission` VALUES ('1', '9');
INSERT INTO `tb_role_permission` VALUES ('1', '10');
INSERT INTO `tb_role_permission` VALUES ('1', '11');
INSERT INTO `tb_role_permission` VALUES ('1', '12');
INSERT INTO `tb_role_permission` VALUES ('1', '13');
INSERT INTO `tb_role_permission` VALUES ('1', '14');
INSERT INTO `tb_role_permission` VALUES ('1', '15');
INSERT INTO `tb_role_permission` VALUES ('1', '16');
INSERT INTO `tb_role_permission` VALUES ('1', '17');
INSERT INTO `tb_role_permission` VALUES ('1', '18');
INSERT INTO `tb_role_permission` VALUES ('1', '19');
INSERT INTO `tb_role_permission` VALUES ('1', '20');
INSERT INTO `tb_role_permission` VALUES ('1', '21');
INSERT INTO `tb_role_permission` VALUES ('1', '22');
INSERT INTO `tb_role_permission` VALUES ('1', '23');
INSERT INTO `tb_role_permission` VALUES ('1', '24');
INSERT INTO `tb_role_permission` VALUES ('1', '25');
INSERT INTO `tb_role_permission` VALUES ('1', '26');
INSERT INTO `tb_role_permission` VALUES ('1', '27');
INSERT INTO `tb_role_permission` VALUES ('1', '28');
INSERT INTO `tb_role_permission` VALUES ('1', '29');
INSERT INTO `tb_role_permission` VALUES ('1', '30');
INSERT INTO `tb_role_permission` VALUES ('1', '31');
INSERT INTO `tb_role_permission` VALUES ('1', '32');
INSERT INTO `tb_role_permission` VALUES ('1', '33');
INSERT INTO `tb_role_permission` VALUES ('1', '34');
INSERT INTO `tb_role_permission` VALUES ('1', '35');
INSERT INTO `tb_role_permission` VALUES ('1', '36');
INSERT INTO `tb_role_permission` VALUES ('1', '37');
INSERT INTO `tb_role_permission` VALUES ('1', '38');
INSERT INTO `tb_role_permission` VALUES ('1', '39');
INSERT INTO `tb_role_permission` VALUES ('1', '40');
INSERT INTO `tb_role_permission` VALUES ('1', '41');
INSERT INTO `tb_role_permission` VALUES ('1', '42');
INSERT INTO `tb_role_permission` VALUES ('1', '43');
INSERT INTO `tb_role_permission` VALUES ('1', '44');
INSERT INTO `tb_role_permission` VALUES ('1', '45');
INSERT INTO `tb_role_permission` VALUES ('1', '46');
INSERT INTO `tb_role_permission` VALUES ('1', '47');
INSERT INTO `tb_role_permission` VALUES ('1', '48');
INSERT INTO `tb_role_permission` VALUES ('1', '49');
INSERT INTO `tb_role_permission` VALUES ('1', '50');
INSERT INTO `tb_role_permission` VALUES ('1', '51');
INSERT INTO `tb_role_permission` VALUES ('1', '52');
INSERT INTO `tb_role_permission` VALUES ('1', '53');
INSERT INTO `tb_role_permission` VALUES ('1', '54');
INSERT INTO `tb_role_permission` VALUES ('1', '55');
INSERT INTO `tb_role_permission` VALUES ('1', '56');
INSERT INTO `tb_role_permission` VALUES ('1', '57');
INSERT INTO `tb_role_permission` VALUES ('1', '58');
INSERT INTO `tb_role_permission` VALUES ('1', '59');
INSERT INTO `tb_role_permission` VALUES ('1', '60');
INSERT INTO `tb_role_permission` VALUES ('1', '61');
INSERT INTO `tb_role_permission` VALUES ('1', '62');
INSERT INTO `tb_role_permission` VALUES ('1', '63');
INSERT INTO `tb_role_permission` VALUES ('1', '64');
INSERT INTO `tb_role_permission` VALUES ('1', '65');
INSERT INTO `tb_role_permission` VALUES ('1', '66');
INSERT INTO `tb_role_permission` VALUES ('1', '67');
INSERT INTO `tb_role_permission` VALUES ('1', '68');
INSERT INTO `tb_role_permission` VALUES ('1', '69');
INSERT INTO `tb_role_permission` VALUES ('1', '70');
INSERT INTO `tb_role_permission` VALUES ('1', '71');
INSERT INTO `tb_role_permission` VALUES ('1', '72');
INSERT INTO `tb_role_permission` VALUES ('1', '73');
INSERT INTO `tb_role_permission` VALUES ('1', '74');
INSERT INTO `tb_role_permission` VALUES ('1', '75');
INSERT INTO `tb_role_permission` VALUES ('1', '76');
INSERT INTO `tb_role_permission` VALUES ('1', '77');
INSERT INTO `tb_role_permission` VALUES ('1', '78');
INSERT INTO `tb_role_permission` VALUES ('1', '79');
INSERT INTO `tb_role_permission` VALUES ('1', '80');
INSERT INTO `tb_role_permission` VALUES ('1', '81');
INSERT INTO `tb_role_permission` VALUES ('1', '82');
INSERT INTO `tb_role_permission` VALUES ('1', '83');
INSERT INTO `tb_role_permission` VALUES ('1', '84');
INSERT INTO `tb_role_permission` VALUES ('1', '85');
INSERT INTO `tb_role_permission` VALUES ('1', '86');
INSERT INTO `tb_role_permission` VALUES ('1', '87');
INSERT INTO `tb_role_permission` VALUES ('1', '88');
INSERT INTO `tb_role_permission` VALUES ('1', '89');
INSERT INTO `tb_role_permission` VALUES ('1', '90');
INSERT INTO `tb_role_permission` VALUES ('1', '91');
INSERT INTO `tb_role_permission` VALUES ('1', '92');
INSERT INTO `tb_role_permission` VALUES ('1', '93');
INSERT INTO `tb_role_permission` VALUES ('1', '94');
INSERT INTO `tb_role_permission` VALUES ('1', '95');
INSERT INTO `tb_role_permission` VALUES ('1', '96');
INSERT INTO `tb_role_permission` VALUES ('1', '97');
INSERT INTO `tb_role_permission` VALUES ('1', '98');
INSERT INTO `tb_role_permission` VALUES ('1', '99');
INSERT INTO `tb_role_permission` VALUES ('1', '100');
INSERT INTO `tb_role_permission` VALUES ('1', '101');
INSERT INTO `tb_role_permission` VALUES ('1', '108');
INSERT INTO `tb_role_permission` VALUES ('1', '109');
INSERT INTO `tb_role_permission` VALUES ('1', '110');
INSERT INTO `tb_role_permission` VALUES ('1', '111');
INSERT INTO `tb_role_permission` VALUES ('1', '112');
INSERT INTO `tb_role_permission` VALUES ('1', '113');
INSERT INTO `tb_role_permission` VALUES ('1', '114');
INSERT INTO `tb_role_permission` VALUES ('1', '115');
INSERT INTO `tb_role_permission` VALUES ('1', '116');
INSERT INTO `tb_role_permission` VALUES ('1', '117');
INSERT INTO `tb_role_permission` VALUES ('1', '118');
INSERT INTO `tb_role_permission` VALUES ('1', '119');
INSERT INTO `tb_role_permission` VALUES ('1', '120');
INSERT INTO `tb_role_permission` VALUES ('1', '121');
INSERT INTO `tb_role_permission` VALUES ('1', '122');
INSERT INTO `tb_role_permission` VALUES ('1', '123');
INSERT INTO `tb_role_permission` VALUES ('1', '124');
INSERT INTO `tb_role_permission` VALUES ('1', '125');
INSERT INTO `tb_role_permission` VALUES ('1', '126');
INSERT INTO `tb_role_permission` VALUES ('1', '127');
INSERT INTO `tb_role_permission` VALUES ('1', '128');
INSERT INTO `tb_role_permission` VALUES ('1', '129');
INSERT INTO `tb_role_permission` VALUES ('1', '130');
INSERT INTO `tb_role_permission` VALUES ('1', '131');
INSERT INTO `tb_role_permission` VALUES ('1', '132');
INSERT INTO `tb_role_permission` VALUES ('1', '133');
INSERT INTO `tb_role_permission` VALUES ('1', '134');
INSERT INTO `tb_role_permission` VALUES ('1', '135');
INSERT INTO `tb_role_permission` VALUES ('1', '136');
INSERT INTO `tb_role_permission` VALUES ('1', '137');
INSERT INTO `tb_role_permission` VALUES ('1', '138');
INSERT INTO `tb_role_permission` VALUES ('1', '139');

-- ----------------------------
-- Table structure for tb_space
-- ----------------------------
DROP TABLE IF EXISTS `tb_space`;
CREATE TABLE `tb_space` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '空间全称',
  `operation_team_id` int(11) NOT NULL COMMENT '运营团队',
  `province_id` int(11) NOT NULL COMMENT '省份',
  `city_id` varchar(11) NOT NULL COMMENT '市',
  `district_id` varchar(11) NOT NULL DEFAULT '' COMMENT '区县',
  `short_name` varchar(20) NOT NULL COMMENT '空间简称',
  `address` varchar(100) NOT NULL COMMENT '空间地址',
  `short_description` varchar(100) NOT NULL COMMENT '空间简介',
  `description` text COMMENT '空间介绍',
  `position_picture` varchar(100) NOT NULL COMMENT '地理位置截图',
  `space_pictures` varchar(255) NOT NULL COMMENT '地理位置截图',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `enter_rate` decimal(4,2) DEFAULT '0.00' COMMENT '入驻率',
  PRIMARY KEY (`id`,`operation_team_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_space
-- ----------------------------
INSERT INTO `tb_space` VALUES ('1', '测试空间', '0', '120000', '120100', '120101', '空间简称', '上海浦东', '空间简述', null, '/images/20180821/59a9645d66fccd00e09ba83f9fc7c35f.JPEG', '[\"\\/images\\/20180821\\/d498830363ef90bbeaf9a5e11f4e913c.jpg\",\"\\/images\\/20180821\\/7b6e0717bb55dc6a25dce95089f9eee0.jpg\"]', '2018-08-21 12:34:46', '2018-08-21 12:34:46', '0.00');
INSERT INTO `tb_space` VALUES ('2', '浦东创想空间', '1', '310000', '310100', '310115', '创想空间', '纳贤路800号', '浦东创想空间', null, '/images/20180821/616fc2518d8edffb7e333ccc5da6d8db.JPEG', '[\"\\/images\\/20180821\\/013e4c926ca0ecd00c35ac15e6692d4f.jpg\",\"\\/images\\/20180821\\/89fefa7de2ef0bc13cf6ccc060b1cdb2.jpg\"]', '2018-08-21 14:03:32', '2018-08-21 14:03:32', '0.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
INSERT INTO `tb_user` VALUES ('21', 'wcw', '25f9e794323b453885f5181f1b624d0b', '17826815702', '846758255', '', '', '', '0', '2018-08-20 17:31:27', null, null, '');

-- ----------------------------
-- Table structure for tb_user_information
-- ----------------------------
DROP TABLE IF EXISTS `tb_user_information`;
CREATE TABLE `tb_user_information` (
  `user_id` int(12) NOT NULL COMMENT '用户主键',
  `info_id` int(12) NOT NULL COMMENT '消息主键',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`user_id`,`info_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user_information
-- ----------------------------
INSERT INTO `tb_user_information` VALUES ('1', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('3', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('5', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('6', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('6', '2', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('9', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('9', '2', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('9', '3', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('9', '4', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');
INSERT INTO `tb_user_information` VALUES ('19', '1', '1', '2018-08-21 15:02:04', '2018-08-21 15:02:04');

-- ----------------------------
-- Table structure for tb_venue
-- ----------------------------
DROP TABLE IF EXISTS `tb_venue`;
CREATE TABLE `tb_venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_no` varchar(10) NOT NULL COMMENT '场馆编号',
  `name` varchar(30) NOT NULL COMMENT '场馆名称',
  `space_id` varchar(30) NOT NULL COMMENT '所属空间',
  `accommodate_num` int(11) NOT NULL COMMENT '容纳人数',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `disable_time` varchar(100) DEFAULT NULL COMMENT '禁用时间范围',
  `status` int(2) NOT NULL COMMENT '状态',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_venue
-- ----------------------------
INSERT INTO `tb_venue` VALUES ('1', 'AK-47', '会议大厅', '1', '100', '举行重要的大会', null, '1', '2018-08-24 11:22:28', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_verification_code
-- ----------------------------
INSERT INTO `tb_verification_code` VALUES ('16', '13967741060', '862896', '2018-08-19 23:45:49', '2018-08-20 17:05:55', '2018-08-20 17:15:55');

-- ----------------------------
-- Table structure for tb_workplace
-- ----------------------------
DROP TABLE IF EXISTS `tb_workplace`;
CREATE TABLE `tb_workplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workplace_no` varchar(10) NOT NULL DEFAULT '0' COMMENT '工位ID',
  `space_id` int(11) NOT NULL COMMENT '所属空间',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '工位类型(0=>按个租赁，1=>按面积租赁)',
  `group_id` int(11) NOT NULL COMMENT '分组',
  `enter_team_id` int(11) DEFAULT NULL COMMENT '租赁团队',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '租赁单价',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '到期时间',
  `total_area` decimal(10,2) DEFAULT NULL COMMENT '总面积',
  `residual_area` decimal(10,2) DEFAULT NULL COMMENT '剩余面积',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_workplace
-- ----------------------------
INSERT INTO `tb_workplace` VALUES ('1', 'SHJK-A01', '1', '0', '1', '1', '10000.00', '1', '2018-08-30 10:57:00', null, '0.00', '2018-08-21 16:58:59', '2018-08-28 19:41:24');
INSERT INTO `tb_workplace` VALUES ('2', 'SHJK-A02', '2', '1', '1', null, '10000.00', '1', '2018-08-29 19:57:08', '1000.00', '299.50', '2018-08-21 16:59:23', '2018-08-29 17:02:00');

-- ----------------------------
-- Table structure for tb_workplace_group
-- ----------------------------
DROP TABLE IF EXISTS `tb_workplace_group`;
CREATE TABLE `tb_workplace_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '0' COMMENT '分组名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_workplace_group
-- ----------------------------
INSERT INTO `tb_workplace_group` VALUES ('1', 'A01', '2018-08-21 19:47:30', '2018-08-21 19:47:30');
