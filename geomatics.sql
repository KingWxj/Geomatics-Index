/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : geomatics

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-10-14 21:35:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for map_admin
-- ----------------------------
DROP TABLE IF EXISTS `map_admin`;
CREATE TABLE `map_admin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '管理员姓名',
  `password` varchar(100) DEFAULT NULL,
  `level` int(2) DEFAULT NULL COMMENT '管理员的级别，0级最高（学校）',
  `avaliable` int(2) DEFAULT NULL COMMENT '是否已禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_admin
-- ----------------------------
INSERT INTO `map_admin` VALUES ('1', 'HPU', '501e0bbac99eb3673e5df715eacd9d0efb5601f5', '0', '1');
INSERT INTO `map_admin` VALUES ('2', '学院', '501e0bbac99eb3673e5df715eacd9d0efb5601f5', '1', '1');
INSERT INTO `map_admin` VALUES ('3', '班主任', '501e0bbac99eb3673e5df715eacd9d0efb5601f5', '2', '1');
INSERT INTO `map_admin` VALUES ('4', '辅导员', '501e0bbac99eb3673e5df715eacd9d0efb5601f5', '3', '1');

-- ----------------------------
-- Table structure for map_certificate
-- ----------------------------
DROP TABLE IF EXISTS `map_certificate`;
CREATE TABLE `map_certificate` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stuId` varchar(13) DEFAULT NULL COMMENT '学生id',
  `name` varchar(100) DEFAULT NULL COMMENT '证书的说明信息',
  `route` varchar(100) DEFAULT NULL COMMENT '证书图片的上传路径',
  `verify` int(2) DEFAULT '0' COMMENT '证书的审核情况，0为未审核（默认），1为已审核，2为未通过',
  `score` int(11) DEFAULT NULL,
  `scoreLevel` int(4) DEFAULT '4',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_certificate
-- ----------------------------
INSERT INTO `map_certificate` VALUES ('32', '311509060410', '1', '/Uploads/Certificate/311509060410/14740277225000.jpg', '1', '6', '0', '2016-09-16 20:08:42');

-- ----------------------------
-- Table structure for map_character
-- ----------------------------
DROP TABLE IF EXISTS `map_character`;
CREATE TABLE `map_character` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stuId` varchar(13) DEFAULT NULL COMMENT '学生id',
  `typeid` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '证书的说明信息',
  `route` varchar(100) DEFAULT NULL COMMENT '证书图片的上传路径',
  `verify` int(2) DEFAULT '0' COMMENT '证书的审核情况，0为未审核（默认），1为已审核，2为未通过',
  `score` int(11) DEFAULT NULL,
  `scoreLevel` int(4) DEFAULT '4',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_character
-- ----------------------------
INSERT INTO `map_character` VALUES ('31', '311509060410', null, '2', '/Uploads/Certificate/311509060410/14740277329751.png', '0', null, '4', '2016-09-16 20:08:52');

-- ----------------------------
-- Table structure for map_consult
-- ----------------------------
DROP TABLE IF EXISTS `map_consult`;
CREATE TABLE `map_consult` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '留言的id，咨询小屋',
  `rootid` int(6) DEFAULT NULL COMMENT '留言的根id，话题的id',
  `uid` varchar(14) DEFAULT NULL COMMENT '用户（学生）的id，与留言（咨询）关联起来',
  `title` varchar(50) DEFAULT NULL,
  `content` text COMMENT '留言的主要内容',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_consult
-- ----------------------------

-- ----------------------------
-- Table structure for map_content
-- ----------------------------
DROP TABLE IF EXISTS `map_content`;
CREATE TABLE `map_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT '公告的标题（限制50字）',
  `info` varchar(50) DEFAULT NULL,
  `admin` varchar(20) DEFAULT NULL COMMENT '发布公告的管理员 id',
  `content` text COMMENT '公告的主要内容',
  `date` datetime DEFAULT NULL COMMENT '发布公告的日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=444 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_content
-- ----------------------------
INSERT INTO `map_content` VALUES ('441', '最新公告', '123', '1231', 'HPU', '<p>21346541231657456313.245646531324646541534634123</p>', '2016-09-11 15:48:49');
INSERT INTO `map_content` VALUES ('442', '校内新闻', '1', '2', 'HPU', '<p>3</p>', '2016-09-16 20:41:11');
INSERT INTO `map_content` VALUES ('443', '学院动态', '1', '2', 'HPU', '<p>3</p>', '2016-09-16 20:41:17');

-- ----------------------------
-- Table structure for map_down
-- ----------------------------
DROP TABLE IF EXISTS `map_down`;
CREATE TABLE `map_down` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '发布的下载文件的id',
  `title` varchar(50) DEFAULT NULL COMMENT '文件的标题和说明（50字）',
  `name` varchar(30) DEFAULT NULL COMMENT '文件名',
  `size` double(15,0) DEFAULT NULL COMMENT '文件大小',
  `route` varchar(100) DEFAULT NULL COMMENT '文件上传的路径',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_down
-- ----------------------------
INSERT INTO `map_down` VALUES ('39', '成绩单', '14740298678233.pdf', '339', '/Uploads/Files/2016-09-16/14740298678233.pdf', '2016-09-16 20:44:27');

-- ----------------------------
-- Table structure for map_dyfrule
-- ----------------------------
DROP TABLE IF EXISTS `map_dyfrule`;
CREATE TABLE `map_dyfrule` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `root1` varchar(255) NOT NULL COMMENT '一级目录',
  `root2` varchar(255) DEFAULT NULL COMMENT '二级目录',
  `root3` varchar(255) DEFAULT NULL COMMENT '三级目录',
  `root4` varchar(255) DEFAULT NULL COMMENT '四级目录',
  `score` int(4) unsigned DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_dyfrule
-- ----------------------------
INSERT INTO `map_dyfrule` VALUES ('1', '学习奖励分', '课程学习与学科竞赛加分', '国家奖', '特等', '13', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('2', '学习奖励分', '课程学习与学科竞赛加分', '国家奖', '一等奖', '11', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('3', '学习奖励分', '课程学习与学科竞赛加分', '国家奖', '二等奖', '10', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('4', '学习奖励分', '课程学习与学科竞赛加分', '国家奖', '三等奖', '8', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('5', '学习奖励分', '课程学习与学科竞赛加分', '国家奖', '优秀奖', '6', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('6', '学习奖励分', '课程学习与学科竞赛加分', '国家级', '特等', '11', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('7', '学习奖励分', '课程学习与学科竞赛加分', '国家级', '一等奖', '10', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('8', '学习奖励分', '课程学习与学科竞赛加分', '国家级', '二等奖', '8', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('9', '学习奖励分', '课程学习与学科竞赛加分', '国家级', '三等奖', '6', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('10', '学习奖励分', '课程学习与学科竞赛加分', '国家级', '优秀奖', '3', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('11', '学习奖励分', '课程学习与学科竞赛加分', '省部级', '特等', '7', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('12', '学习奖励分', '课程学习与学科竞赛加分', '省部级', '一等奖', '6', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('13', '学习奖励分', '课程学习与学科竞赛加分', '省部级', '二等奖', '5', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('14', '学习奖励分', '课程学习与学科竞赛加分', '省部级', '三等奖', '3', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('15', '学习奖励分', '课程学习与学科竞赛加分', '省部级', '优秀奖', '2', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('16', '学习奖励分', '课程学习与学科竞赛加分', '校级', '特等', '4', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('17', '学习奖励分', '课程学习与学科竞赛加分', '校级', '一等奖', '3', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('18', '学习奖励分', '课程学习与学科竞赛加分', '校级', '二等奖', '2', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('19', '学习奖励分', '课程学习与学科竞赛加分', '校级', '三等奖', '1', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('20', '学习奖励分', '课程学习与学科竞赛加分', '校级', '优秀奖', '1', '对于未设等级的获奖项目均按优秀奖计分');
INSERT INTO `map_dyfrule` VALUES ('21', '学习奖励分', '各类英语等级考试加分', '非英语专业', '英语四级考试（CET4）在425分以上', '2', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('22', '学习奖励分', '各类英语等级考试加分', '非英语专业', '英语四级考试（CET4）在560分以上', '5', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('23', '学习奖励分', '各类英语等级考试加分', '非英语专业', '英语六级考试（CET6）在425分以上', '5', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('24', '学习奖励分', '各类英语等级考试加分', '非英语专业', '英语六级考试（CET6）在560分以上', '6', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('25', '学习奖励分', '各类英语等级考试加分', '英语专业', '专业八级考试成绩60分以上', '2', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('26', '学习奖励分', '各类英语等级考试加分', '英语专业', '专业八级考试成绩80分以上', '5', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('27', '学习奖励分', '参加TOEFL、IELTS、GRE、GMAT考试加分', null, null, '6', '需经教务处，国际处审核、认定后加分，同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('28', '学习奖励分', '计算机等级考试加分', '全国计算机等级二级考试', '合格', '1', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('29', '学习奖励分', '计算机等级考试加分', '全国计算机等级二级考试', '优秀', '2', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('30', '学习奖励分', '计算机等级考试加分', '全国计算机等级三级考试', '合格', '2', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('31', '学习奖励分', '计算机等级考试加分', '全国计算机等级三级考试', '优秀', '3', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('32', '学习奖励分', '计算机等级考试加分', '全国计算机等级四级考试', '合格', '5', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('33', '学习奖励分', '计算机等级考试加分', '全国计算机等级四级考试', '优秀', '6', '同等级只计算一次，以后再次通过者，不再加分');
INSERT INTO `map_dyfrule` VALUES ('34', '学习奖励分', '其他全国性证书、资格考试加分', '亲自报由学院工作领导小组决定', null, null, '请持原件报由学院工作领导小组认定后加分');
INSERT INTO `map_dyfrule` VALUES ('35', '荣誉称号及活动获奖加分', '各级各类荣誉称号加分', '国家级', null, '10', '1.荣誉称号主要包括优秀学生、优秀学生干部、优秀团员、优秀团干等\n2.受国家、省。市表彰的先进班集体，其班委、团支部成员按先进个人对待，分别降一级加分\n3.本项所加分条款，不包括上学年学生综合评定中获奖的各类先进个人和集体');
INSERT INTO `map_dyfrule` VALUES ('36', '荣誉称号及活动获奖加分', '各级各类荣誉称号加分', '省级', null, '6', '1.荣誉称号主要包括优秀学生、优秀学生干部、优秀团员、优秀团干等\n2.受国家、省。市表彰的先进班集体，其班委、团支部成员按先进个人对待，分别降一级加分\n4.本项所加分条款，不包括上学年学生综合评定中获奖的各类先进个人和集体');
INSERT INTO `map_dyfrule` VALUES ('37', '荣誉称号及活动获奖加分', '各级各类荣誉称号加分', '市（校）级', null, '4', '1.荣誉称号主要包括优秀学生、优秀学生干部、优秀团员、优秀团干等\n2.受国家、省。市表彰的先进班集体，其班委、团支部成员按先进个人对待，分别降一级加分\n5.本项所加分条款，不包括上学年学生综合评定中获奖的各类先进个人和集体');
INSERT INTO `map_dyfrule` VALUES ('38', '荣誉称号及活动获奖加分', '各级各类荣誉称号加分', '学院级', null, '2', '1.荣誉称号主要包括优秀学生、优秀学生干部、优秀团员、优秀团干等\n2.受国家、省。市表彰的先进班集体，其班委、团支部成员按先进个人对待，分别降一级加分\n6.本项所加分条款，不包括上学年学生综合评定中获奖的各类先进个人和集体');
INSERT INTO `map_dyfrule` VALUES ('39', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '国家级', '一等', '8', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n2.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('40', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '国家级', '二等', '5', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n3.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('41', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '国家级', '三等', '4', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n4.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('42', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '国家级', '四等', '3', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n5.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('43', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '省级', '一等', '5', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n6.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('44', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '省级', '二等', '4', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n7.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('45', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '省级', '三等', '3', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n8.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('46', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '省级', '四等', '2', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n9.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('47', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '市（校）级', '一等', '3', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n10.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('48', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '市（校）级', '二等', '2', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n11.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('49', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '市（校）级', '三等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n12.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('50', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '市（校）级', '四等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n13.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('51', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '学院级', '一等', '2', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n14.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('52', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '学院级', '二等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n15.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('53', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '学院级', '三等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n16.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('54', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '学院级', '四等', '0', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n17.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('55', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '社团组织的第二课堂', '一等', '2', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n18.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('56', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '社团组织的第二课堂', '二等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n19.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('57', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '社团组织的第二课堂', '三等', '1', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n20.社团组织的第二课堂活动加分需经校团委盖章确认后生效');
INSERT INTO `map_dyfrule` VALUES ('58', '荣誉称号及活动获奖加分', '第二课堂比赛活动加分', '社团组织的第二课堂', '四等', '0', '1.四等奖及以下奖（含鼓励奖）按四等奖加分\n21.社团组织的第二课堂活动加分需经校团委盖章确认后生效');

-- ----------------------------
-- Table structure for map_evaluate
-- ----------------------------
DROP TABLE IF EXISTS `map_evaluate`;
CREATE TABLE `map_evaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_evaluate
-- ----------------------------
INSERT INTO `map_evaluate` VALUES ('1', '1', '1', '<p>1</p>', '2016-09-16');

-- ----------------------------
-- Table structure for map_exam
-- ----------------------------
DROP TABLE IF EXISTS `map_exam`;
CREATE TABLE `map_exam` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stuId` varchar(13) DEFAULT NULL COMMENT '学号',
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `subject` varchar(20) DEFAULT NULL COMMENT '学科类别',
  `score` double(10,0) DEFAULT NULL COMMENT '成绩',
  `mark` varchar(100) DEFAULT NULL COMMENT '备注',
  `verify` int(2) DEFAULT '1' COMMENT '成绩的审核状态',
  `fixScore` double(10,0) DEFAULT NULL COMMENT '待修改的成绩',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_exam
-- ----------------------------
INSERT INTO `map_exam` VALUES ('1119', '311509060410', '王晓杰', '666', '99', '呵呵', '0', '100');

-- ----------------------------
-- Table structure for map_excellent
-- ----------------------------
DROP TABLE IF EXISTS `map_excellent`;
CREATE TABLE `map_excellent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT '公告的标题（限制50字）',
  `info` varchar(50) DEFAULT NULL,
  `picroute` varchar(255) DEFAULT NULL,
  `admin` varchar(20) DEFAULT NULL COMMENT '发布公告的管理员 id',
  `content` text COMMENT '公告的主要内容',
  `date` datetime DEFAULT NULL COMMENT '发布公告的日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8632 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_excellent
-- ----------------------------

-- ----------------------------
-- Table structure for map_imgtoggle
-- ----------------------------
DROP TABLE IF EXISTS `map_imgtoggle`;
CREATE TABLE `map_imgtoggle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `sort` int(5) DEFAULT '100',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000006 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_imgtoggle
-- ----------------------------
INSERT INTO `map_imgtoggle` VALUES ('1000004', '666', '/Uploads/Imgtoggle/2016-09-11/14735793466288.jpg', '100', '2016-09-11 15:35:46');
INSERT INTO `map_imgtoggle` VALUES ('4', '3', '/Uploads/Imgtoggle/2016-07-27/14696165126964.jpg', '100', '2016-07-27 18:48:32');
INSERT INTO `map_imgtoggle` VALUES ('3', '4', '/Uploads/Imgtoggle/2016-07-27/14696165188410.jpg', '100', '2016-07-27 18:48:38');
INSERT INTO `map_imgtoggle` VALUES ('1000005', '111', '/Uploads/Imgtoggle/2016-09-03/14728882241486.png', '100', '2016-09-03 15:37:04');

-- ----------------------------
-- Table structure for map_nav
-- ----------------------------
DROP TABLE IF EXISTS `map_nav`;
CREATE TABLE `map_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `root` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `content` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_nav
-- ----------------------------
INSERT INTO `map_nav` VALUES ('1', '文章', '学院概况', '学院简介', '发布者信息', '<p style=\"text-align:center\"><img src=\"/ueditor/php/upload/image/20160728/1469713456549128.jpg\" title=\"1469713456549128.jpg\" alt=\"1469713456549128.jpg\" width=\"539\" height=\"285\"/></p><p><br/></p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('2', '文章', '学院概况', '机构设置', '发布者信息', '<p>主要内容</p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('3', '文章', '学院概况', '发展规划', '发布者信息', '<p>主要内容</p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('4', '文章', '学院概况', '学院领导', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('5', '文章', '专业设置', '测绘工程专业', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('6', '文章', '专业设置', '地理信息科学专业', '发布者信息', '<p>主要内容</p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('7', '文章', '专业设置', '资源环境与城乡规划管理专业', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('8', '文章', '专业设置', '土地资源专业', '发布者信息', '<p>主要内容</p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('9', '文章', '专业设置', '遥感科学与技术专业', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('10', '文章', '师资队伍', '院士名录', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('11', '文章', '师资队伍', '博导名录', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('12', '文章', '师资队伍', '教授风采', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('13', '文章', '师资队伍', '博士风采', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('14', '文章', '师资队伍', '外聘专家', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('15', '列表', '教学工作', '公告通知', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('16', '列表', '教学工作', '教学通知', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('17', '列表', '教学工作', '教学活动', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('18', '列表', '教学工作', '文件下载', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('19', '列表', '科研工作', '科研活动', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('20', '列表', '科研工作', '文件下载', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('21', '列表', '党建工作', '党建动态', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('22', '文章', '党建工作', '支部设置', '发布者信息', '<p>主要内容</p>', '2016-07-31');
INSERT INTO `map_nav` VALUES ('23', '列表', '党建工作', '支部生活', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('24', '列表', '党建工作', '党员风采', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('25', '列表', '党建工作', '反腐倡廉', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('26', '列表', '党建工作', '党务政务公开', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('27', '文章', '学生园地', '团委概况', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('28', '文章', '学生园地', '学生办概况', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('29', '文章', '学生园地', '研究生', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('30', '文章', '学生园地', '新闻公告', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('31', '文章', '学生园地', '检查公示', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('32', '文章', '学生园地', '网上团校', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('33', '文章', '学生园地', '精品活动', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('34', '文章', '招生就业', '招聘内容', '发布者信息', '主要内容', '2016-07-25');
INSERT INTO `map_nav` VALUES ('35', '文章', '招生就业', '就业信息', '发布者信息', '主要内容', '2016-07-25');

-- ----------------------------
-- Table structure for map_navlist
-- ----------------------------
DROP TABLE IF EXISTS `map_navlist`;
CREATE TABLE `map_navlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `info` varchar(50) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_navlist
-- ----------------------------

-- ----------------------------
-- Table structure for map_setting
-- ----------------------------
DROP TABLE IF EXISTS `map_setting`;
CREATE TABLE `map_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `value` int(3) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_setting
-- ----------------------------
INSERT INTO `map_setting` VALUES ('1', '咨询小屋匿名发言', 'noName', '1');

-- ----------------------------
-- Table structure for map_stu
-- ----------------------------
DROP TABLE IF EXISTS `map_stu`;
CREATE TABLE `map_stu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuId` varchar(13) DEFAULT NULL COMMENT '学号',
  `stuName` varchar(10) DEFAULT NULL COMMENT '学生姓名',
  `password` varchar(50) DEFAULT NULL COMMENT '学生密码sha1',
  `avaliable` int(2) DEFAULT '1' COMMENT '是否可用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=620 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_stu
-- ----------------------------
INSERT INTO `map_stu` VALUES ('619', '311509060410', '王晓杰', '501e0bbac99eb3673e5df715eacd9d0efb5601f5', '1');

-- ----------------------------
-- Table structure for map_sztzfrule
-- ----------------------------
DROP TABLE IF EXISTS `map_sztzfrule`;
CREATE TABLE `map_sztzfrule` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `root1` varchar(255) NOT NULL COMMENT '一级目录',
  `root2` varchar(255) DEFAULT NULL COMMENT '二级目录',
  `root3` varchar(255) DEFAULT NULL COMMENT '三级目录',
  `root4` varchar(255) DEFAULT NULL COMMENT '四级目录',
  `score` int(4) unsigned DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_sztzfrule
-- ----------------------------
INSERT INTO `map_sztzfrule` VALUES ('59', '素质拓展分', '科研训练及成果', '完成国家级项目或获奖', null, '5', '详见学生手册123页-124页');
INSERT INTO `map_sztzfrule` VALUES ('60', '素质拓展分', '科研训练及成果', '完成省级项目或获奖', null, '3', '详见学生手册123页-125页');
INSERT INTO `map_sztzfrule` VALUES ('61', '素质拓展分', '科研训练及成果', '完成校级级项目或获奖', null, '2', '详见学生手册123页-126页');
INSERT INTO `map_sztzfrule` VALUES ('62', '素质拓展分', '学术论文、报刊文章', '核心期刊、省级及以上报刊', '第一作者', '5', '详见学生手册123页-127页');
INSERT INTO `map_sztzfrule` VALUES ('63', '素质拓展分', '学术论文、报刊文章', '核心期刊、省级及以上报刊', '其他前三名', '2', '详见学生手册123页-128页');
INSERT INTO `map_sztzfrule` VALUES ('64', '素质拓展分', '学术论文、报刊文章', '一般刊物、市级或校级报刊', '第一作者', '3', '详见学生手册123页-129页');
INSERT INTO `map_sztzfrule` VALUES ('65', '素质拓展分', '学术论文、报刊文章', '一般刊物、市级或校级报刊', '其他前三名', '1', '详见学生手册123页-130页');
INSERT INTO `map_sztzfrule` VALUES ('66', '素质拓展分', '专利', '排名第一', null, '5', '详见学生手册123页-131页');
INSERT INTO `map_sztzfrule` VALUES ('67', '素质拓展分', '专利', '其他前五名', null, '2', '详见学生手册123页-132页');
INSERT INTO `map_sztzfrule` VALUES ('68', '素质拓展分', '文艺竞赛活动', '获国家级奖励', null, '5', '详见学生手册123页-133页');
INSERT INTO `map_sztzfrule` VALUES ('69', '素质拓展分', '文艺竞赛活动', '获省级奖励', null, '3', '详见学生手册123页-134页');
INSERT INTO `map_sztzfrule` VALUES ('70', '素质拓展分', '文艺竞赛活动', '获校级奖励', null, '2', '详见学生手册123页-135页');
INSERT INTO `map_sztzfrule` VALUES ('71', '素质拓展分', '考试认证', null, null, '3', '详见学生手册123页-136页');
INSERT INTO `map_sztzfrule` VALUES ('72', '素质拓展分', '各类讲座', null, null, '1', '详见学生手册123页-137页');
INSERT INTO `map_sztzfrule` VALUES ('73', '素质拓展分', '社会实践', '参加社会活动（含志愿者活动、慈善活动）4次以上', null, '1', '详见学生手册123页-138页');
INSERT INTO `map_sztzfrule` VALUES ('74', '素质拓展分', '社会实践', '提交社会调查报告并通过学院审核及答辩', null, '1', '详见学生手册123页-139页');
INSERT INTO `map_sztzfrule` VALUES ('75', '素质拓展分', '社会实践', '获校级表彰', null, '1', '详见学生手册123页-140页');
INSERT INTO `map_sztzfrule` VALUES ('76', '素质拓展分', '社会实践', '获省级以上表彰', null, '2', '详见学生手册123页-141页');
