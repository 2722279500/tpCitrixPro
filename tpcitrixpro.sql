/*
Navicat MySQL Data Transfer

Source Server         : 165服务器
Source Server Version : 50560
Source Host           : 47.105.100.165:3306
Source Database       : mianshi

Target Server Type    : MYSQL
Target Server Version : 50560
File Encoding         : 65001

Date: 2019-08-06 15:05:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_cate_id` int(10) NOT NULL DEFAULT '0' COMMENT '权限id',
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `username` varchar(50) NOT NULL COMMENT '账号(邮箱,手机号)',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `login_num` int(10) DEFAULT '1' COMMENT '登录次数',
  `login_time` int(10) NOT NULL COMMENT '登录时间',
  `login_ip` varchar(50) NOT NULL COMMENT '登录Ip',
  `login_token` varchar(255) NOT NULL COMMENT '登录token',
  `create_time` int(10) NOT NULL COMMENT '账号注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员列表';

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', '1', '执念Citrix', '2722279500@qq.com', '8c8e2c91b8b7f4044e5014511dbbdde0', '19', '1565074971', '127.0.0.1', 'M2RiMjA0ZGI3MDFlZjIyZmMzOGVjZjVhMjQ4YjczMjQ=', '1563842404');
INSERT INTO `tp_admin` VALUES ('2', '5', 'test', 'test@163.com', 'd3cd052027558376de5f8c0fd0a6b9ff', '5', '1563939650', '127.0.0.1', 'M2RiMjA0ZGI3MDFlZjIyZmMzOGVjZjVhMjQ4YjczMjQ=', '1563865721');
INSERT INTO `tp_admin` VALUES ('6', '4', 'deit', 'deit@163.com', '8c8e2c91b8b7f4044e5014511dbbdde0', '4', '1563932811', '127.0.0.1', 'M2RiMjA0ZGI3MDFlZjIyZmMzOGVjZjVhMjQ4YjczMjQ=', '1563928710');

-- ----------------------------
-- Table structure for tp_admin_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_cate`;
CREATE TABLE `tp_admin_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `menu_collect` text COMMENT '权限菜单',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `description` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `name` (`name`) USING BTREE,
  KEY `create_time` (`create_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='权限组列表';

-- ----------------------------
-- Records of tp_admin_cate
-- ----------------------------
INSERT INTO `tp_admin_cate` VALUES ('1', '超级管理员', '[\"99\",\"82\",\"83\",\"81\",\"84\",\"80\",\"85\",\"79\",\"86\",\"78\",\"87\",\"77\",\"88\",\"67\",\"72\",\"76\",\"75\",\"74\",\"73\",\"68\",\"71\",\"70\",\"69\",\"54\",\"64\",\"66\",\"65\",\"49\",\"57\",\"60\",\"59\",\"58\",\"51\",\"56\",\"55\",\"53\",\"50\",\"52\",\"48\",\"90\",\"89\",\"61\",\"63\",\"62\",\"39\",\"92\",\"97\",\"96\",\"95\",\"91\",\"94\",\"93\",\"41\",\"44\",\"43\",\"42\",\"40\",\"47\",\"46\",\"45\"]', '1563860144', '1563934903', '拥有后台应用的所有权限');
INSERT INTO `tp_admin_cate` VALUES ('4', '新闻小编', '[\"82\",\"83\",\"68\",\"71\",\"70\",\"69\"]', '1563862202', '1563862290', '拥有编辑文章的权限');
INSERT INTO `tp_admin_cate` VALUES ('5', '游客', '[\"99\",\"82\",\"81\",\"80\",\"79\",\"78\",\"77\",\"67\",\"72\",\"68\",\"54\",\"64\",\"49\",\"57\",\"51\",\"50\",\"48\",\"89\",\"61\",\"39\",\"92\",\"91\",\"41\",\"40\"]', '1563862390', '1563935379', '游客身份只允许看');

-- ----------------------------
-- Table structure for tp_config
-- ----------------------------
DROP TABLE IF EXISTS `tp_config`;
CREATE TABLE `tp_config` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) DEFAULT NULL COMMENT '配置的key键名',
  `value` varchar(512) DEFAULT NULL COMMENT '配置的val值',
  `type` varchar(64) DEFAULT NULL COMMENT '配置分组',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of tp_config
-- ----------------------------
INSERT INTO `tp_config` VALUES ('1', 'title', 'tpCitrixPro1.0论坛前端框架', 'forum', '网站名称');
INSERT INTO `tp_config` VALUES ('2', 'keywords', 'tpCitrixPro1.0论坛，社区，bbs管理框架', 'forum', '网站关键词');
INSERT INTO `tp_config` VALUES ('3', 'description', 'tpCitrixPro 1.0搭载ThinkPHP 5.0+layuicms 2.0完美契合的框架，社区，bbs，论坛前端框架', 'forum', '网站描述');
INSERT INTO `tp_config` VALUES ('5', 'title', 'tpCitrixPro1.0博客，企业站框架', 'index', '网站名称');
INSERT INTO `tp_config` VALUES ('6', 'keywords', 'tpCitrixPro1.0博客，企业站管理框架', 'index', '网站关键词');
INSERT INTO `tp_config` VALUES ('7', 'description', 'tpCitrixPro 1.0搭载ThinkPHP 5.0+layuicms 2.0完美契合的框架，博客，企业站前端框架', 'index', '网站描述');
INSERT INTO `tp_config` VALUES ('12', 'title', 'tpCitrixPro1.0博客，企业站框架', 'mobile', '网站名称');
INSERT INTO `tp_config` VALUES ('13', 'keywords', 'tpCitrixPro1.0博客，企业站管理框架', 'mobile', '网站关键词');
INSERT INTO `tp_config` VALUES ('14', 'description', 'tpCitrixPro 1.0搭载ThinkPHP 5.0+layuicms 2.0完美契合的框架，博客，企业站前端框架', 'mobile', '网站描述');

-- ----------------------------
-- Table structure for tp_menu
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL COMMENT '模块',
  `controller` varchar(100) NOT NULL COMMENT '控制器',
  `function` varchar(100) NOT NULL COMMENT '方法',
  `description` varchar(250) DEFAULT NULL COMMENT '描述',
  `is_display` int(1) NOT NULL DEFAULT '1' COMMENT '1显示在左侧菜单2只作为节点',
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '1权限节点',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级菜单0为顶级菜单',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '修改时间',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  `is_open` int(1) NOT NULL DEFAULT '0' COMMENT '0默认闭合1默认展开',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序值，越小越靠前',
  `menu_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `module` (`module`) USING BTREE,
  KEY `controller` (`controller`) USING BTREE,
  KEY `function` (`function`) USING BTREE,
  KEY `is_display` (`is_display`) USING BTREE,
  KEY `type` (`type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COMMENT='系统菜单表';

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('39', '权限管理', '', '', '', 'fa fa-bars', '1', '1', '0', '1563848798', '0', 'fa fa-users', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('40', '权限列表', 'admin', 'permission', 'index', '权限列表', '1', '1', '39', '1563849368', '1563870321', 'fa fa-align-left', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('41', '权限模块', 'admin', 'permissionCate', 'index', '权限模块', '1', '1', '39', '1563849401', '0', 'fa fa-th-large', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('42', '新增/编辑', 'admin', 'permissionCate', 'publish', '新增/编辑', '2', '1', '41', '1563849435', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('43', '删除', 'admin', 'permissionCate', 'infoDelete', '删除', '2', '1', '41', '1563849464', '1563870189', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('44', '快捷编辑', 'admin', 'permissionCate', 'changeTableVal', '快捷编辑', '2', '1', '41', '1563849488', '1563870219', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('45', '新增/编辑', 'admin', 'permission', 'publish', '新增/编辑', '2', '1', '40', '1563850044', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('46', '删除', 'admin', 'permission', 'infoDelete', '删除', '2', '1', '40', '1563850066', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('47', '快捷编辑', 'admin', 'permission', 'changeTableVal', '快捷编辑', '2', '1', '40', '1563850092', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('67', '资讯中心', '', '', '', '资讯中心', '1', '1', '0', '1563851277', '0', 'fa fa-star-half-empty', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('68', '资讯分类', 'admin', 'articleCate', 'index', '资讯分类', '1', '1', '67', '1563851312', '1563851351', 'fa fa-reorder', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('69', '新增/编辑', 'admin', 'articleCate', 'publish', '新增/编辑', '2', '1', '68', '1563851345', '0', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('70', '删除', 'admin', 'articleCate', 'delete', '删除', '2', '1', '68', '1563851488', '1563851511', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('97', '快捷编辑', 'admin', 'admin', 'changeTableVal', '快捷编辑', '2', '1', '92', '1563862943', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('71', '快捷编辑', 'admin', 'articleCate', 'changeTableVal', '快捷编辑', '2', '1', '68', '1563851556', '1563851567', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('72', '资讯列表', 'admin', 'article', 'index', '资讯列表', '1', '1', '67', '1563851598', '1563852700', 'fa fa-list', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('73', '快捷编辑', 'admin', 'article', 'changeTableVal', '快捷编辑', '2', '1', '72', '1563851622', '0', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('74', '新增/编辑', 'admin', 'article', 'publish', '新增/编辑', '2', '1', '72', '1563851666', '0', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('75', '删除', 'admin', 'Article', 'delete', '删除', '2', '1', '72', '1563851687', '0', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('76', '批量删除', 'admin', 'article', 'batchDelete', '批量删除', '2', '1', '72', '1563851713', '1563851722', '', '0', '10', '1');
INSERT INTO `tp_menu` VALUES ('91', '管理组', 'admin', 'adminCate', 'index', '管理组', '1', '1', '39', '1563852838', '1563853203', 'fa fa-list-alt', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('92', '管理员', 'admin', 'admin', 'index', '管理员', '1', '1', '39', '1563852874', '0', 'fa fa-user-secret', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('93', '新增/编辑', 'admin', 'adminCate', 'publish', '新增/编辑', '2', '1', '91', '1563862673', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('94', '删除', 'admin', 'adminCate', 'delete', '删除', '2', '1', '91', '1563862708', '1563870202', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('95', '新增/编辑', 'admin', 'admin', 'publish', '新增/编辑', '2', '1', '92', '1563862847', '0', '', '0', '10', '3');
INSERT INTO `tp_menu` VALUES ('96', '删除', 'admin', 'admin', 'infoDelete', '删除', '2', '1', '92', '1563862878', '0', '', '0', '10', '3');

-- ----------------------------
-- Table structure for tp_menu_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu_cate`;
CREATE TABLE `tp_menu_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `alias` varchar(255) NOT NULL COMMENT '别名',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '修改时间',
  `sort` int(11) NOT NULL COMMENT '排序',
  `icon` varchar(255) NOT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='权限分类';

-- ----------------------------
-- Records of tp_menu_cate
-- ----------------------------
INSERT INTO `tp_menu_cate` VALUES ('1', '应用首页', 'yygl', '1563844953', '1565074910', '100', '&#xe632;');
INSERT INTO `tp_menu_cate` VALUES ('3', '系统设置', 'xtsz', '1563845272', '1563867432', '98', '&#xe716;');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL COMMENT '账号',
  `user_password` varchar(255) DEFAULT NULL COMMENT '密码',
  `user_nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `user_mailbox` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `user_mobile` varchar(255) DEFAULT NULL COMMENT '手机号',
  `user_integral` float(11,2) DEFAULT NULL COMMENT '积分余额',
  `user_money` float(11,2) DEFAULT NULL COMMENT '现金余额',
  `qq_access_token` varchar(255) DEFAULT NULL COMMENT 'qq的token',
  `qq_openid` varchar(255) DEFAULT NULL COMMENT 'qq的openid',
  `qq_result` text COMMENT 'qq的详细信息',
  `status` tinyint(1) NOT NULL COMMENT '0未审核1已审核2已拒绝',
  `login_ip` int(11) NOT NULL COMMENT 'ip登录地址',
  `login_sum` int(11) NOT NULL COMMENT '登录次数',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `update_time` int(11) NOT NULL COMMENT '登录时间',
  `user_thumb` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of tp_user
-- ----------------------------
