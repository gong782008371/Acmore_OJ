/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : 127.0.0.1:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2016-05-24 00:35:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for compile_info
-- ----------------------------
DROP TABLE IF EXISTS `compile_info`;
CREATE TABLE `compile_info` (
  `solution_id` int(11) NOT NULL,
  `error` text,
  PRIMARY KEY  (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for contest
-- ----------------------------
DROP TABLE IF EXISTS `contest`;
CREATE TABLE `contest` (
  `contest_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `start_time` datetime default NULL,
  `end_time` datetime default NULL,
  `defunct` char(1) NOT NULL default 'N',
  `private` int(11) default NULL,
  `langmask` int(11) default '1023',
  PRIMARY KEY  (`contest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for contest_problem
-- ----------------------------
DROP TABLE IF EXISTS `contest_problem`;
CREATE TABLE `contest_problem` (
  `problem_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL default '',
  `num` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for privilege
-- ----------------------------
DROP TABLE IF EXISTS `privilege`;
CREATE TABLE `privilege` (
  `username` varchar(20) NOT NULL,
  `rightstr` varchar(30) NOT NULL,
  `defunct` char(1) NOT NULL default 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for problems
-- ----------------------------
DROP TABLE IF EXISTS `problems`;
CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `java_time` int(11) NOT NULL default '2000',
  `other_time` int(11) NOT NULL default '1000',
  `java_mem` int(11) NOT NULL default '65536',
  `other_mem` int(11) NOT NULL default '32768',
  `description` text NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `sample_input` text NOT NULL,
  `sample_output` text NOT NULL,
  `hint` text,
  `author` text,
  `sample_program` text,
  `visiable` char(1) NOT NULL default 'Y',
  `total_submit` int(11) NOT NULL default '0',
  `accept_submit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`problem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for solution
-- ----------------------------
DROP TABLE IF EXISTS `solution`;
CREATE TABLE `solution` (
  `solution_id` int(11) NOT NULL auto_increment,
  `problem_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL default '0',
  `time` int(11) default '0',
  `memory` int(11) default '0',
  `in_date` datetime default NULL,
  `result` int(11) default '0',
  `language` int(11) default NULL,
  `ip` varchar(20) default NULL,
  `contest_id` int(11) default NULL,
  `code_length` int(11) default '0',
  PRIMARY KEY  (`solution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for source_code
-- ----------------------------
DROP TABLE IF EXISTS `source_code`;
CREATE TABLE `source_code` (
  `solution_id` int(11) NOT NULL,
  `source` text NOT NULL,
  PRIMARY KEY  (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `submit` int(11) NOT NULL default '0',
  `solved` int(11) NOT NULL default '0',
  `defunct` char(1) NOT NULL default 'N',
  `language` int(11) default '0',
  `school` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
