/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : jqerp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-22 09:47:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jq_system
-- ----------------------------
DROP TABLE IF EXISTS `jq_system`;
CREATE TABLE `jq_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(20) NOT NULL COMMENT '参数名称',
  `route` varchar(30) NOT NULL COMMENT '路由地址',
  `type` int(11) NOT NULL COMMENT '系统类型',
  `data` varchar(30) NOT NULL COMMENT '参数，数据值',
  `description` varchar(35) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jq_system
-- ----------------------------
INSERT INTO `jq_system` VALUES ('1', 'SYS_UP_WORK', '', '0', '07:00:00', '上班打卡时间');
INSERT INTO `jq_system` VALUES ('4', 'SYS_DO_WORK', '', '0', '17:30:00', '下班打卡时间');
