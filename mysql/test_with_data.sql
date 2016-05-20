/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : 127.0.0.1:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2016-05-20 15:37:33
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
-- Records of compile_info
-- ----------------------------

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
-- Records of contest
-- ----------------------------

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
-- Records of contest_problem
-- ----------------------------

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
-- Records of privilege
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of problems
-- ----------------------------
INSERT INTO `problems` VALUES ('1000', 'A + B', '2000', '1000', '65536', '32768', 'Calculate <i>A + B</i>.', 'Each line will contain two integers <i>A</i> and <i>B</i>. Process to end of file.', 'For each case, output <i>A + B</i> in one line.', '1 1', '2', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1001', 'A + B Problem II', '2000', '1000', '65536', '32768', 'I have a very simple problem for you. Given two integers A and B, your job is to calculate the Sum of A + B.', 'The first line of the input contains an integer T(1<=T<=20) which means the number of test cases. Then T lines follow, each line consists of two positive integers, A and B. Notice that the integers are very large, that means you should not process them by using 32-bit integer. You may assume the length of each integer will not exceed 1000.', 'For each test case, you should output two lines. The first line is \"Case #:\", # means the number of the test case. The second line is the an equation \"A + B = Sum\", Sum means the result of A + B. Note there are some spaces int the equation. Output a blank line between two test cases.', '2<br>1 2<br>112233445566778899 998877665544332211', 'Case 1:<br>1 + 2 = 3<br><br>Case 2:<br>112233445566778899 + 998877665544332211 = 1111111111111111110', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1002', 'A + B Problem III', '1000', '1000', '65535', '65535', '读入两个小于100的正整数A和B,计算A+B. 需要注意的是:A和B的每一位数字由对应的英文单词给出.', '测试输入包含若干测试用例,每个测试用例占一行,格式为\"A + B =\",相邻两字符串有一个空格间隔.当A和B同时为0时输入结束,相应的结果不要输出. ', '对每个测试用例输出1行,即A+B的值.', 'one + two =<br>three four + five six =<br>zero seven + eight nine =<br>zero + zero =', '3<br>90<br>96', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1003', 'A + B for you again', '1000', '1000', '65535', '65535', 'Generally speaking, there are a lot of problems about strings processing. Now you encounter another such problem. If you get two strings, such as “asdf” and “sdfg”, the result of the addition between them is “asdfg”, for “sdf” is the tail substring of “asdf” and the head substring of the “sdfg” . However, the result comes as “asdfghjk”, when you have to add “asdf” and “ghjk” and guarantee the shortest string first, then the minimum lexicographic second, the same rules for other additions.', 'For each case, there are two strings (the chars selected just form ‘a’ to ‘z’) for you, and each length of theirs won’t exceed 10^5 and won’t be empty.', 'Print the ultimate string by the book.', 'asdf sdfg asdf ghjk', 'asdfga<br>sdfghjk', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1004', 'A + B Problem Too', '1000', '1000', '65535', '65535', 'This problem is also a A + B problem,but it has a little difference,you should determine does (a+b) could be divided with 86.For example ,if (A+B)=98,you should output no for result.', 'Each line will contain two integers A and B. Process to end of file.', 'For each case, if(A+B)%86=0,output yes in one line,else output no in one line.', '1 1\r\n8600 8600', 'no\r\nyes', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1005', 'A+B', '1000', '1000', '65535', '65535', '给定两个整数A和B，其表示形式是：从个位开始，每三位数用逗号&quot;,&quot;隔开。\r\n现在请计算A+B的结果，并以正常形式输出。', '输入包含多组数据数据，每组数据占一行，由两个整数A和B组成（-10^9 &lt; A,B &lt; 10^9）。', '请计算A+B的结果，并以正常形式输出，每组数据占一行。', '-234,567,890 123,456,789\r\n1,234 2,345,678', '-111111101\r\n2346912', null, 'yuquanac', null, 'Y', '0', '0');
INSERT INTO `problems` VALUES ('1006', '又一版 A+B', '1000', '1000', '65535', '65535', '输入两个不超过整型定义的非负10进制整数A和B(<=2^31-1)，输出A+B的m (1 < m <10)进制数。', '输入格式：测试输入包含若干测试用例。每个测试用例占一行，给出m和A，B的值。\r\n当m为0时输入结束。', '输出格式：每个测试用例的输出占一行，输出A+B的m进制数。', '8 1300 48\r\n2 1 7\r\n0', '2504\r\n1000', null, 'yuquanac', null, 'Y', '0', '0');

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
  PRIMARY KEY  (`solution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solution
-- ----------------------------
INSERT INTO `solution` VALUES ('4', '1000', 'admin', '0', '0', '2016-05-20 15:14:36', '0', '1', '127.0.0.1', '0');

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
-- Records of source_code
-- ----------------------------
INSERT INTO `source_code` VALUES ('4', '#include <cstdio>\r\nint main()\r\n{\r\n    int a,b;\r\n    while(scanf(\"%d%d\",&a,&b)!=-1)\r\n    {\r\n        printf(\"%d\\n\",a+b);\r\n    }\r\n    return 0;\r\n}');

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

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('admin', '000000', '0', '0', 'N', '0', null, null);
INSERT INTO `users` VALUES ('yuquanac', '000000', '0', '0', 'N', '0', null, null);
