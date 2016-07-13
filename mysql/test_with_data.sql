-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `compile_info`
--

DROP TABLE IF EXISTS `compile_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compile_info` (
  `solution_id` int(11) NOT NULL,
  `error` text,
  PRIMARY KEY (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compile_info`
--

LOCK TABLES `compile_info` WRITE;
/*!40000 ALTER TABLE `compile_info` DISABLE KEYS */;
INSERT INTO `compile_info` VALUES (5,'Main.cpp: In function â€˜int main()â€™:\nMain.cpp:5:20: error: â€˜aâ€™ was not declared in this scope\n     printf(\"%d\n\", a + b);\r\n                    ^\nMain.cpp:5:24: error: â€˜bâ€™ was not declared in this scope\n     printf(\"%d\n\", a + b);\r\n                        ^\n9'),(25,'Main.cpp: In function â€˜int main()â€™:\nMain.cpp:5:20: error: â€˜aâ€™ was not declared in this scope\n     printf(\"%d\n\", a + b);\r\n                    ^\nMain.cpp:5:24: error: â€˜bâ€™ was not declared in this scope\n     printf(\"%d\n\", a + b);\r\n                        ^\næ'),(52,'Main.cpp: In function â€˜void slove()â€™:\nMain.cpp:31:13: error: â€˜strrevâ€™ was not declared in this scope\n     strrev(a);  strrev(b);\r\n             ^\nd±Eß'),(53,'Main.cpp: In function â€˜void slove()â€™:\nMain.cpp:51:13: error: â€˜strrevâ€™ was not declared in this scope\n     strrev(a);\r\n             ^\n'),(57,'Main.c:1:17: fatal error: cstdio: No such file or directory\n #include<cstdio>\r\n                 ^\ncompilation terminated.\nÇŠT'),(59,'Main.c:1:17: fatal error: cstdio: No such file or directory\n #include<cstdio>\r\n                 ^\ncompilation terminated.\n%dM'),(60,'Main.c:1:17: fatal error: cstdio: No such file or directory\n #include<cstdio>\r\n                 ^\ncompilation terminated.\n%dM'),(74,'Main.c:1:17: fatal error: cstdio: No such file or directory\n #include<cstdio>\r\n                 ^\ncompilation terminated.\n@€'),(83,'Main.c:7:1: error: unknown type name â€˜boolâ€™\n bool DFS(int now)\r\n ^\nMain.c: In function â€˜DFSâ€™:\nMain.c:9:21: error: â€˜falseâ€™ undeclared (first use in this function)\n if(vis[now]) return false;\r\n                     ^\nMain.c:9:21: note: each undeclared identifier is reported only once for each function it appears in\nMain.c:10:21: error: â€˜trueâ€™ undeclared (first use in this function)\n if(now == B) return true;\r\n                     ^\nMain.c:12:1: error: unknown type name â€˜boolâ€™\n bool down = false, up = false;\r\n ^\n '),(84,'Main.c:7:1: error: unknown type name â€˜boolâ€™\n bool DFS(int now)\r\n ^\nMain.c: In function â€˜DFSâ€™:\nMain.c:9:21: error: â€˜falseâ€™ undeclared (first use in this function)\n if(vis[now]) return false;\r\n                     ^\nMain.c:9:21: note: each undeclared identifier is reported only once for each function it appears in\nMain.c:10:21: error: â€˜trueâ€™ undeclared (first use in this function)\n if(now == B) return true;\r\n                     ^\nMain.c:12:1: error: unknown type name â€˜boolâ€™\n bool down = false, up = false;\r\n ^\n '),(85,'Main.c:7:1: error: unknown type name â€˜boolâ€™\n bool DFS(int now)\r\n ^\nMain.c: In function â€˜DFSâ€™:\nMain.c:9:21: error: â€˜falseâ€™ undeclared (first use in this function)\n if(vis[now]) return false;\r\n                     ^\nMain.c:9:21: note: each undeclared identifier is reported only once for each function it appears in\nMain.c:10:21: error: â€˜trueâ€™ undeclared (first use in this function)\n if(now == B) return true;\r\n                     ^\nMain.c:12:1: error: unknown type name â€˜boolâ€™\n bool down = false, up = false;\r\n ^\n '),(88,'Main.cpp:1:1: error: â€˜ggghhjJffcccccfvvhJfdgj6dfbjJdXgbgszvbâ€™ does not name a type\n ggghhjJffcccccfvvhJfdgj6dfbjJdXgbgszvb\n ^\n');
/*!40000 ALTER TABLE `compile_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest`
--

DROP TABLE IF EXISTS `contest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest` (
  `contest_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `visiable` char(1) NOT NULL DEFAULT 'N',
  `private` int(11) DEFAULT NULL,
  `langmask` int(11) DEFAULT '1023',
  PRIMARY KEY (`contest_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest`
--

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;
INSERT INTO `contest` VALUES (1000,'这是一个测试竞赛','2016-06-12 09:00:00','2016-06-12 14:00:00','Y',NULL,1023),(1001,'这是第二个测试竞赛','2016-06-12 23:00:00','2016-06-12 23:59:00','Y',NULL,1023),(1002,'这是第三个测试竞赛','2016-06-14 09:10:00','2016-06-14 14:10:00','Y',NULL,1023),(1003,'这是第四个比赛','2016-06-13 08:00:00','2016-06-13 21:00:00','Y',NULL,1023);
/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest_problem`
--

DROP TABLE IF EXISTS `contest_problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest_problem` (
  `problem_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest_problem`
--

LOCK TABLES `contest_problem` WRITE;
/*!40000 ALTER TABLE `contest_problem` DISABLE KEYS */;
INSERT INTO `contest_problem` VALUES (1000,1001,'',NULL),(1001,1001,'',NULL),(1002,1001,'',NULL),(1003,1001,'',NULL),(1004,1001,'',NULL),(1005,1001,'',NULL),(1006,1001,'',NULL),(1000,1002,'',NULL),(1001,1002,'',NULL),(1007,1002,'',NULL),(1009,1002,'',NULL),(1000,1003,'',NULL),(1001,1003,'',NULL),(1002,1003,'',NULL),(1003,1003,'',NULL),(1004,1003,'',NULL),(1005,1003,'',NULL),(1006,1003,'',NULL),(1007,1003,'',NULL),(1008,1003,'',NULL),(1009,1003,'',NULL),(1010,1003,'',NULL),(1011,1003,'',NULL),(1012,1003,'',NULL),(1012,1000,'',NULL),(1010,1000,'',NULL),(1008,1000,'',NULL),(1006,1000,'',NULL);
/*!40000 ALTER TABLE `contest_problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilege` (
  `username` varchar(20) NOT NULL,
  `rightstr` varchar(30) NOT NULL,
  `defunct` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilege`
--

LOCK TABLES `privilege` WRITE;
/*!40000 ALTER TABLE `privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `java_time` int(11) NOT NULL DEFAULT '2000',
  `other_time` int(11) NOT NULL DEFAULT '1000',
  `java_mem` int(11) NOT NULL DEFAULT '65536',
  `other_mem` int(11) NOT NULL DEFAULT '32768',
  `description` text NOT NULL,
  `input` text NOT NULL,
  `output` text NOT NULL,
  `sample_input` text NOT NULL,
  `sample_output` text NOT NULL,
  `hint` text,
  `author` text,
  `sample_program` text,
  `visiable` char(1) NOT NULL DEFAULT 'N',
  `total_submit` int(11) NOT NULL DEFAULT '0',
  `accept_submit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`problem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1013 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1000,'A + B',2,1,64,32,'Calculate <i>A + B</i>.','Each line will contain two integers <i>A</i> and <i>B</i>. Process to end of file.','For each case, output <i>A + B</i> in one line.','1 1','2',NULL,'yuquanac',NULL,'Y',55,24),(1001,'A + B Problem II',2,1,64,32,'I have a very simple problem for you. Given two integers A and B, your job is to calculate the Sum of A + B.','The first line of the input contains an integer T(1<=T<=20) which means the number of test cases. Then T lines follow, each line consists of two positive integers, A and B. Notice that the integers are very large, that means you should not process them by using 32-bit integer. You may assume the length of each integer will not exceed 1000.','For each test case, you should output two lines. The first line is \"Case #:\", # means the number of the test case. The second line is the an equation \"A + B = Sum\", Sum means the result of A + B. Note there are some spaces int the equation. Output a blank line between two test cases.','2<br>1 2<br>112233445566778899 998877665544332211','Case 1:<br>1 + 2 = 3<br><br>Case 2:<br>112233445566778899 + 998877665544332211 = 1111111111111111110',NULL,'yuquanac',NULL,'Y',8,2),(1002,'A + B Problem III',2,1,64,32,'读入两个小于100的正整数A和B,计算A+B. 需要注意的是:A和B的每一位数字由对应的英文单词给出.','测试输入包含若干测试用例,每个测试用例占一行,格式为\"A + B =\",相邻两字符串有一个空格间隔.当A和B同时为0时输入结束,相应的结果不要输出. ','对每个测试用例输出1行,即A+B的值.','one + two =<br>three four + five six =<br>zero seven + eight nine =<br>zero + zero =','3<br>90<br>96',NULL,'yuquanac',NULL,'Y',1,0),(1003,'A + B for you again',2,1,64,32,'Generally speaking, there are a lot of problems about strings processing. Now you encounter another such problem. If you get two strings, such as “asdf” and “sdfg”, the result of the addition between them is “asdfg”, for “sdf” is the tail substring of “asdf” and the head substring of the “sdfg” . However, the result comes as “asdfghjk”, when you have to add “asdf” and “ghjk” and guarantee the shortest string first, then the minimum lexicographic second, the same rules for other additions.','For each case, there are two strings (the chars selected just form ‘a’ to ‘z’) for you, and each length of theirs won’t exceed 10^5 and won’t be empty.','Print the ultimate string by the book.','asdf sdfg asdf ghjk','asdfga<br>sdfghjk',NULL,'yuquanac',NULL,'Y',2,0),(1004,'A + B Problem Too',2,1,64,32,'This problem is also a A + B problem,but it has a little difference,you should determine does (a+b) could be divided with 86.For example ,if (A+B)=98,you should output no for result.','Each line will contain two integers A and B. Process to end of file.','For each case, if(A+B)%86=0,output yes in one line,else output no in one line.','1 1\r\n8600 8600','no\r\nyes',NULL,'yuquanac',NULL,'Y',0,0),(1005,'A+B',2,1,64,32,'给定两个整数A和B，其表示形式是：从个位开始，每三位数用逗号&quot;,&quot;隔开。\r\n现在请计算A+B的结果，并以正常形式输出。','输入包含多组数据数据，每组数据占一行，由两个整数A和B组成（-10^9 &lt; A,B &lt; 10^9）。','请计算A+B的结果，并以正常形式输出，每组数据占一行。','-234,567,890 123,456,789\r\n1,234 2,345,678','-111111101\r\n2346912',NULL,'yuquanac',NULL,'Y',0,0),(1006,'又一版 A+B',2,1,64,32,'输入两个不超过整型定义的非负10进制整数A和B(<=2^31-1)，输出A+B的m (1 < m <10)进制数。','输入格式：测试输入包含若干测试用例。每个测试用例占一行，给出m和A，B的值。\r\n当m为0时输入结束。','输出格式：每个测试用例的输出占一行，输出A+B的m进制数。','8 1300 48\r\n2 1 7\r\n0','2504\r\n1000',NULL,'yuquanac',NULL,'Y',1,0),(1007,'矩形A + B',2,1,64,32,'给你一个高为n ，宽为m列的网格，计算出这个网格中有多少个矩形。','第一行输入一个t, 表示有t组数据，然后每行输入n,m,分别表示网格的高和宽 ( n < 100 , m < 100).','每行输出网格中有多少个矩形.','2\r\n1 2\r\n2 4','3\r\n30',NULL,'yuquanac',NULL,'Y',0,0),(1008,'人见人爱A+B',2,1,64,32,'HDOJ上面已经有10来道A+B的题目了，相信这些题目曾经是大家的最爱，希望今天的这个A+B能给大家带来好运，也希望这个题目能唤起大家对ACM曾经的热爱。\r\n这个题目的A和B不是简单的整数，而是两个时间，A和B 都是由3个整数组成，分别表示时分秒，比如，假设A为34 45 56，就表示A所表示的时间是34小时 45分钟 56秒。','输入数据有多行组成，首先是一个整数N，表示测试实例的个数，然后是N行数据，每行有6个整数AH,AM,AS,BH,BM,BS，分别表示时间A和B所对应的时分秒。题目保证所有的数据合法。','对于每个测试实例，输出A+B，每个输出结果也是由时分秒3部分组成，同时也要满足时间的规则（即：分和秒的取值范围在0~59），每个输出占一行，并且所有的部分都可以用32位整数表示。','2\r\n1 2 3 4 5 6\r\n34 45 56 12 23 34','5 7 9\r\n47 9 30',NULL,'yuquanac',NULL,'Y',0,0),(1009,'火星A+B',2,1,64,32,'读入两个不超过25位的火星正整数A和B，计算A+B。需要注意的是：在火星上，整数不是单一进制的，第n位的进制就是第n个素数。例如：地球上的10进制数2，在火星上记为“1,0”，因为火星个位数是2进制的；地球上的10进制数38，在火星上记为“1,1,1,0”，因为火星个位数是2进制的，十位数是3进制的，百位数是5进制的，千位数是7进制的……\r\n\\\'\\\'\\\'\\l\'l\'\'l\'\"\"//\'','测试输入包含若干测试用例，每个测试用例占一行，包含两个火星正整数A和B，火星整数的相邻两位数用逗号分隔，A和B之间有一个空格间隔。当A或B为0时输入结束，相应的结果不要输出。','对每个测试用例输出1行，即火星表示法的A+B的值。','1,0 2,1\r\n4,2,0 1,2,0\r\n1 10,6,4,2,1\r\n0 0','1,0,1\r\n1,1,1,0\r\n1,0,0,0,0,0',NULL,'yuquanac',NULL,'Y',0,0),(1010,'A + B',20,20,64,32,'Calculate <i>A + B</i>.','Each line will contain two integers <i>A</i> and <i>B</i>. Process to end of file.','For each case, output <i>A + B</i> in one line.','1 1','2',NULL,'yuquanac',NULL,'Y',10,6),(1011,'ElemenT的表达式',2,1,64,32,'ElemenT 喜欢研究数学表达式，由于他IQ并不高，所以他只会研究三个数的加法与乘法运算，并加一些括号。\r\n意思是 有a，b，c这三个数，在三个数中插入 乘号 或 加号 或 小括号（）。运算得到的结果，他希望这个结果最大。\r\n比如1,2,3这三个数，他可以这样运算：（当然只是列举了一部分）\r\n1+2*3=7 \r\n1*(2+3)=5 \r\n1*2*3=6 \r\n(1+2)*3=9 \r\n注意，__ElemenT 规定了三个数的顺序，也就是说，没有(1+3)*2 这样的情况。别问为什么，IQ低导致了他不会这样计算。\r\n上述例子，最大值即 9.','第一行为一个正整数T (T<=10)\r\n接下来T组数据，每组数据\r\n输入三个正整数a,b,c（1<=a,b,c<=10）。','对于每组T，输出一个整数，代表a,b,c经过上述运算 得到的最大值。','1\r\n1 2 3','9',NULL,'yuquanac',NULL,'Y',1,0);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solution` (
  `solution_id` int(11) NOT NULL AUTO_INCREMENT,
  `problem_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `memory` int(11) DEFAULT '0',
  `in_date` datetime DEFAULT NULL,
  `result` int(11) DEFAULT '0',
  `language` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `contest_id` int(11) DEFAULT NULL,
  `code_length` int(11) DEFAULT '0',
  PRIMARY KEY (`solution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (4,1000,'admin',7,2868,'2016-05-20 15:14:36',1,1,'127.0.0.1',0,0),(5,1000,'admin',0,0,'2016-05-24 02:01:08',3,1,'113.240.233.248',0,0),(6,1000,'admin',8,2864,'2016-05-24 02:06:33',1,1,'113.240.233.248',0,0),(7,1000,'admin',1999,2852,'2016-05-24 02:08:08',6,1,'113.240.233.248',0,0),(8,1000,'admin',1000,2876,'2016-05-24 02:08:41',6,1,'113.240.233.248',0,0),(9,1000,'admin',1000,2888,'2016-05-24 02:09:18',6,1,'113.240.233.248',0,0),(10,1000,'admin',7,2892,'2016-05-24 02:10:25',8,1,'113.240.233.248',0,0),(11,1000,'admin',7,2900,'2016-05-24 02:11:32',4,1,'113.240.233.248',0,0),(12,1000,'admin',8,2908,'2016-05-24 02:12:02',1,1,'113.240.233.248',0,0),(13,1000,'admin',7,2908,'2016-05-24 02:12:14',2,1,'113.240.233.248',0,0),(14,1000,'admin',8,2916,'2016-05-24 02:13:33',2,1,'113.240.233.248',0,0),(15,1000,'admin',7,2928,'2016-05-24 02:35:02',2,1,'113.240.233.248',0,0),(16,1000,'admin',7,2932,'2016-05-24 02:36:08',5,1,'113.240.233.248',0,0),(17,1000,'admin',1000,2944,'2016-05-24 02:59:49',6,1,'113.240.233.248',0,0),(18,1000,'ElemenT',8,2952,'2016-05-24 20:40:57',1,1,'218.77.55.155',0,0),(19,1000,'admin',7,1080,'2016-05-28 15:43:44',1,1,'222.240.152.233',0,0),(20,1000,'admin',7,1080,'2016-05-28 15:44:14',4,1,'222.240.152.233',0,0),(21,1000,'admin',2000,1072,'2016-05-28 15:46:13',6,1,'222.240.152.233',0,0),(22,1000,'admin',7,1080,'2016-05-28 16:05:48',1,1,'222.240.152.233',0,0),(23,1000,'admin',8,2736,'2016-05-31 10:11:37',1,1,'113.240.233.248',0,0),(24,1000,'jkl',8,2756,'2016-06-08 16:38:56',1,1,'222.240.152.229',0,0),(25,1000,'admin',0,0,'2016-06-09 03:23:42',3,1,'113.240.233.248',0,0),(26,1000,'admin',2003,2744,'2016-06-09 03:25:02',6,1,'113.240.233.248',0,0),(27,1000,'admin',8,1080,'2016-06-11 19:10:26',1,1,'110.53.169.250',0,0),(28,1000,'admin',1999,1072,'2016-06-11 19:11:07',6,1,'110.53.169.250',0,0),(29,1010,'admin',20927,1072,'2016-06-11 22:50:30',6,1,'110.53.169.250',0,125),(30,1010,'admin',473,2792,'2016-06-11 22:59:23',5,1,'110.53.169.250',0,125),(31,1000,'yuquanac',8,2800,'2016-06-11 23:03:48',1,1,'110.53.169.250',0,110),(32,1012,'admin',8,2816,'2016-06-11 23:28:51',1,1,'218.77.55.155',0,562),(33,1000,'test1',8,2824,'2016-06-11 23:30:52',1,1,'110.53.169.250',0,113),(34,1010,'test1',9,2828,'2016-06-11 23:31:15',1,1,'110.53.169.250',0,113),(35,1002,'test1',8,2832,'2016-06-11 23:34:33',4,1,'110.53.169.250',0,116),(36,1012,'test1',8,1084,'2016-06-12 00:05:09',1,1,'110.53.169.250',0,565),(37,1012,'admin',7,2780,'2016-06-12 22:57:28',1,1,'110.53.169.250',0,563),(38,1012,'admin',7,2804,'2016-06-12 23:36:30',1,1,'110.53.169.250',0,563),(39,1000,'admin',8,2820,'2016-06-12 23:37:10',1,1,'110.53.169.250',1001,109),(40,1003,'admin',9,2824,'2016-06-12 23:37:24',4,1,'110.53.169.250',1001,109),(41,1001,'yuquanac',9,2828,'2016-06-12 23:39:54',4,1,'110.53.169.250',1001,601),(42,1001,'yuquanac',7,2832,'2016-06-12 23:40:04',4,1,'110.53.169.250',0,689),(43,1001,'yuquanac',8,2840,'2016-06-12 23:40:35',4,1,'110.53.169.250',1001,689),(44,1000,'admin',8,2844,'2016-06-12 23:41:49',1,1,'110.53.169.250',1001,108),(45,1012,'admin',7,2848,'2016-06-12 23:51:19',1,1,'110.53.169.250',0,563),(46,1000,'admin',7,2852,'2016-06-12 23:52:11',1,1,'110.53.169.250',1001,110),(47,1000,'admin',8,2856,'2016-06-12 23:55:48',1,1,'110.53.169.250',0,110),(48,1000,'yuquanac',8,2860,'2016-06-13 00:26:20',4,1,'110.53.169.250',1001,107),(49,1000,'yuquanac',8,2900,'2016-06-13 00:26:41',4,1,'110.53.169.250',1001,107),(50,1000,'yuquanac',7,2944,'2016-06-13 00:26:51',1,1,'110.53.169.250',1001,107),(51,1001,'yuquanac',9,2980,'2016-06-13 00:29:05',4,1,'110.53.169.250',1001,689),(52,1001,'yuquanac',0,0,'2016-06-13 00:36:07',3,1,'106.16.80.247',1001,1187),(53,1001,'yuquanac',0,0,'2016-06-13 00:38:16',3,1,'106.16.80.247',1001,1361),(54,1001,'yuquanac',9,2984,'2016-06-13 00:38:38',1,1,'106.16.80.247',1001,1362),(55,1000,'admin',8,2988,'2016-06-13 01:59:22',1,1,'106.16.80.247',0,110),(56,1000,'admin',8,2784,'2016-06-13 02:09:02',1,3,'106.16.80.247',0,108),(57,1000,'admin',0,0,'2016-06-13 02:09:30',3,3,'106.16.80.247',0,131),(58,1000,'admin',7,1080,'2016-06-13 02:10:03',1,1,'106.16.80.247',0,131),(59,1000,'admin',0,0,'2016-06-13 02:14:50',3,3,'106.16.80.247',0,131),(60,1000,'admin',0,0,'2016-06-13 02:17:02',3,3,'106.16.80.247',0,132),(61,1000,'admin',7,1080,'2016-06-13 02:17:25',1,1,'106.16.80.247',0,132),(62,1000,'gongjing',8,1080,'2016-06-13 02:55:11',1,1,'110.53.169.250',0,135),(63,1010,'gongjing',7,1080,'2016-06-13 02:55:40',1,1,'110.53.169.250',0,135),(64,1010,'admin',21172,1080,'2016-06-13 02:56:25',6,3,'110.53.169.250',0,122),(65,1010,'admin',7,2792,'2016-06-13 03:01:17',2,1,'110.53.169.250',0,161),(66,1000,'admin',7,1076,'2016-06-13 03:02:21',8,3,'110.53.169.250',0,188),(67,1000,'admin',7,1084,'2016-06-13 03:02:41',4,3,'110.53.169.250',0,124),(68,1001,'admin',7,1696,'2016-06-13 03:21:02',1,1,'110.53.169.250',0,1363),(69,1010,'admin',8,2880,'2016-06-13 03:21:51',1,1,'110.53.169.250',0,132),(70,1010,'admin',7,2788,'2016-06-13 08:21:32',1,1,'222.240.152.198',1003,130),(71,1000,'admin',7,2800,'2016-06-13 08:21:52',4,1,'222.240.152.198',1003,130),(72,1000,'admin',1071,2808,'2016-06-13 08:22:19',6,1,'222.240.152.198',1003,138),(73,1000,'admin',8,2816,'2016-06-13 08:22:48',1,1,'222.240.152.198',1003,130),(74,1003,'admin',0,0,'2016-06-13 08:23:13',3,3,'222.240.152.198',1003,130),(75,1006,'admin',7,2780,'2016-06-13 08:25:00',4,1,'222.240.152.198',1003,130),(76,1000,'yuquanac',8,2796,'2016-06-13 08:26:01',1,1,'222.240.152.198',1003,130),(77,1010,'yuquanac',7,2780,'2016-06-13 08:26:45',1,3,'222.240.152.198',1003,109),(78,1000,'test1',8,2820,'2016-06-13 08:30:47',1,1,'222.240.152.198',1003,130),(79,1012,'admin',7,2824,'2016-06-13 08:31:57',1,1,'222.240.152.198',1003,563),(80,1010,'gongjing',7,2784,'2016-06-13 13:18:13',1,1,'110.53.173.63',1003,131),(81,1000,'gongjing',8,2804,'2016-06-13 13:22:55',4,1,'110.53.173.63',1003,131),(82,1012,'admin',9,2840,'2016-06-13 14:15:58',1,1,'222.240.152.198',0,562),(83,1000,'admin',0,0,'2016-06-13 16:27:32',3,3,'222.240.152.198',0,562),(84,1000,'admin',0,0,'2016-06-13 16:30:08',3,3,'222.240.152.198',0,562),(85,1000,'admin',0,0,'2016-06-13 16:30:21',3,3,'222.240.152.198',0,562),(86,1000,'admin',1049,1084,'2016-06-13 16:30:39',6,1,'222.240.152.198',0,562),(87,1000,'admin',1099,1084,'2016-06-13 16:33:38',6,1,'222.240.152.198',0,562),(88,1011,'admin',0,0,'2016-06-22 17:43:12',3,1,'113.221.92.43',0,38);
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source_code`
--

DROP TABLE IF EXISTS `source_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source_code` (
  `solution_id` int(11) NOT NULL,
  `source` text NOT NULL,
  PRIMARY KEY (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source_code`
--

LOCK TABLES `source_code` WRITE;
/*!40000 ALTER TABLE `source_code` DISABLE KEYS */;
INSERT INTO `source_code` VALUES (4,'#include <cstdio>\r\nint main()\r\n{\r\n    int a,b;\r\n    while(scanf(\"%d%d\",&a,&b)!=-1)\r\n    {\r\n        printf(\"%d\\n\",a+b);\r\n    }\r\n    return 0;\r\n}'),(5,'#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"%d\\n\", a + b);\r\n    return 0;\r\n}'),(6,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}'),(7,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1);\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}'),(8,'#include <stdio.h>\r\nint a[30000000];\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1);\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}'),(9,'#include <stdio.h>\r\nint x[30000000];\r\nint main()\r\n{\r\n    int a, b;\r\n    for (int i = 0; i < 30000000; i ++)x[i] = 1;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}'),(10,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1) printf(\"ssssssssssssssssssssssssssssssssssssss\");\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}'),(11,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a - b);\r\n    return 0;\r\n}'),(12,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\\n\", a + b);\r\n    return 0;\r\n}'),(13,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"\\n%d\\n\\n\", a + b);\r\n    return 0;\r\n}'),(14,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    int x[10];\r\n    x[10] = 0;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"\\n%d\\n\\n\", a + b);\r\n    return 0;\r\n}'),(15,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    int x[10];\r\n    x[-2] = 0;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"\\n%d\\n\\n\", a + b);\r\n    return 0;\r\n}'),(16,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    int x[10]={0};\r\n    for(int i = 1; i <100;i++)x[i] = x[i-1];\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"\\n%d\\n\\n\", a + b);\r\n    return 0;\r\n}'),(17,'#include <stdio.h>\r\nint x[13000000];\r\nint main()\r\n{\r\n    int a, b;\r\n    for (int i  = 0; i < 13000000; i ++)x[i]=i;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n    return 0;\r\n}'),(18,'#include <cstdio>\r\nint main() {\r\n    int a, b;\r\n    while(scanf(\"%d%d\", &a, &b) != EOF) {\r\n         printf(\"%d\\n\", a + b);\r\n    }\r\n    return 0;\r\n}'),(19,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a + b);\r\n}'),(20,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a - b);\r\n}'),(21,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n        while(1);\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a - b);\r\n}'),(22,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a + b);\r\n}'),(23,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a + b);\r\n}'),(24,'#include <iostream>\r\nusing namespace std;\r\nint a, b;\r\nint main() {\r\n  cin >> a >> b;\r\n  cout << a + b << endl;\r\n  return 0;\r\n}'),(25,'#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"%d\\n\", a + b);\r\n    return 0;\r\n}'),(26,'#include <stdio.h>\r\n\r\nint main()\r\n{\r\n	int a, b;\r\n        while(1);\r\n	scanf(\"%d %d\", &a, &b);\r\n	printf(\"%d\\n\", a - b);\r\n}			'),(27,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(28,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1);\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(29,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1);\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(30,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1)    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}						'),(31,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(32,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(33,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}						'),(34,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}						'),(35,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}									'),(36,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}			'),(37,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}	'),(38,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}	'),(39,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}		'),(40,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}		'),(41,'#include<stdio.h>   \r\n#include<string.h>   \r\nint main()  \r\n{  \r\n    char a[100]={\'0\'},b[100]={\'0\'};  \r\n    while(~scanf(\"%s%s\",a,b))  \r\n    {  \r\n        int i;  \r\n        int lena=strlen(a),lenb=strlen(b),j,s[110]={0};  \r\n        for(i=0,j=lena-1;i<=j;i++,j--){int t=a[i]-\'0\';a[i]=a[j]-\'0\';a[j]=t;}  \r\n        for(i=0,j=lenb-1;i<=j;i++,j--){int t=b[i]-\'0\';b[i]=b[j]-\'0\';b[j]=t;}  \r\n        int c=0,k;  \r\n        for(i=0;i<100;i++)  \r\n        {  \r\n            k=a[i]+b[i]+c;  \r\n            s[i]=k%10;  \r\n            c=k/10;  \r\n        }  \r\n        for(i=100;s[i]==0;i--);  \r\n    }  \r\n    return 0;  \r\n}'),(42,'#include<stdio.h>   \r\n#include<string.h>   \r\nint main()  \r\n{  \r\n    char a[100]={\'0\'},b[100]={\'0\'};  \r\n    while(~scanf(\"%s%s\",a,b))  \r\n    {  \r\n        int i;  \r\n        int lena=strlen(a),lenb=strlen(b),j,s[110]={0};  \r\n        for(i=0,j=lena-1;i<=j;i++,j--){int t=a[i]-\'0\';a[i]=a[j]-\'0\';a[j]=t;}  \r\n        for(i=0,j=lenb-1;i<=j;i++,j--){int t=b[i]-\'0\';b[i]=b[j]-\'0\';b[j]=t;}  \r\n        int c=0,k;  \r\n        for(i=0;i<100;i++)  \r\n        {  \r\n            k=a[i]+b[i]+c;  \r\n            s[i]=k%10;  \r\n            c=k/10;  \r\n        }  \r\n        for(i=100;s[i]==0;i--);  \r\n        for(j=i;j>=0;j--)  \r\n            printf(\"%d\",s[j]);  \r\n        printf(\"\\n\");  \r\n    }  \r\n    return 0;  \r\n}'),(43,'#include<stdio.h>   \r\n#include<string.h>   \r\nint main()  \r\n{  \r\n    char a[100]={\'0\'},b[100]={\'0\'};  \r\n    while(~scanf(\"%s%s\",a,b))  \r\n    {  \r\n        int i;  \r\n        int lena=strlen(a),lenb=strlen(b),j,s[110]={0};  \r\n        for(i=0,j=lena-1;i<=j;i++,j--){int t=a[i]-\'0\';a[i]=a[j]-\'0\';a[j]=t;}  \r\n        for(i=0,j=lenb-1;i<=j;i++,j--){int t=b[i]-\'0\';b[i]=b[j]-\'0\';b[j]=t;}  \r\n        int c=0,k;  \r\n        for(i=0;i<100;i++)  \r\n        {  \r\n            k=a[i]+b[i]+c;  \r\n            s[i]=k%10;  \r\n            c=k/10;  \r\n        }  \r\n        for(i=100;s[i]==0;i--);  \r\n        for(j=i;j>=0;j--)  \r\n            printf(\"%d\",s[j]);  \r\n        printf(\"\\n\");  \r\n    }  \r\n    return 0;  \r\n}'),(44,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(45,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}	'),(46,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(47,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(48,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a - b);\r\n}'),(49,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a * b);\r\n}'),(50,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(51,'#include<stdio.h>   \r\n#include<string.h>   \r\nint main()  \r\n{  \r\n    char a[100]={\'0\'},b[100]={\'0\'};  \r\n    while(~scanf(\"%s%s\",a,b))  \r\n    {  \r\n        int i;  \r\n        int lena=strlen(a),lenb=strlen(b),j,s[110]={0};  \r\n        for(i=0,j=lena-1;i<=j;i++,j--){int t=a[i]-\'0\';a[i]=a[j]-\'0\';a[j]=t;}  \r\n        for(i=0,j=lenb-1;i<=j;i++,j--){int t=b[i]-\'0\';b[i]=b[j]-\'0\';b[j]=t;}  \r\n        int c=0,k;  \r\n        for(i=0;i<100;i++)  \r\n        {  \r\n            k=a[i]+b[i]+c;  \r\n            s[i]=k%10;  \r\n            c=k/10;  \r\n        }  \r\n        for(i=100;s[i]==0;i--);  \r\n        for(j=i;j>=0;j--)  \r\n            printf(\"%d\",s[j]);  \r\n        printf(\"\\n\");  \r\n    }  \r\n    return 0;  \r\n}'),(52,'#include <map>\r\n#include <set>\r\n#include <stack>\r\n#include <queue>\r\n#include <cmath>\r\n#include <ctime>\r\n#include <vector>\r\n#include <cstdio>\r\n#include <cctype>\r\n#include <cstring>\r\n#include <cstdlib>\r\n#include <iostream>\r\n#include <algorithm>\r\nusing namespace std;\r\n#define INF 0x3f3f3f3f\r\n#define MAX(a,b) (a > b ? a : b)\r\n#define MIN(a,b) (a < b ? a : b)\r\n#define mem0(a) memset(a,0,sizeof(a))\r\n\r\ntypedef long long LL;\r\nconst double eps = 1e-12;\r\nconst int MAXN = 1005;\r\nconst int MAXM = 5005;\r\n\r\nchar a[MAXN], b[MAXN];\r\n\r\nvoid slove()\r\n{\r\n    int lena = strlen(a);\r\n    int lenb = strlen(b);\r\n    strrev(a);  strrev(b);\r\n    int p = 0;\r\n    while(a[p] || b[p])\r\n    {\r\n        if(a[p]>=\'0\') a[p] -= \'0\';\r\n        if(b[p]>=\'0\') b[p] -= \'0\';\r\n        a[p] += b[p];\r\n        a[p+1] += a[p]/10;\r\n        a[p] = a[p] % 10 + \'0\';\r\n        p++;\r\n    }\r\n    strrev(a);\r\n}\r\n\r\nint main()\r\n{\r\n    int T, Case=0;\r\n    scanf(\"%d\", &T);\r\n    while(T--)\r\n    {\r\n        mem0(a); mem0(b);\r\n        scanf(\"%s %s%*c\", a, b);\r\n        printf(\"Case %d:\\n\", ++Case);\r\n        printf(\"%s + %s = \", a, b);\r\n        slove();\r\n        printf(\"%s\\n\", a);\r\n        if(T) printf(\"\\n\");\r\n    }\r\n    return 0;\r\n}\r\n'),(53,'#include <map>\r\n#include <set>\r\n#include <stack>\r\n#include <queue>\r\n#include <cmath>\r\n#include <ctime>\r\n#include <vector>\r\n#include <cstdio>\r\n#include <cctype>\r\n#include <cstring>\r\n#include <cstdlib>\r\n#include <iostream>\r\n#include <algorithm>\r\nusing namespace std;\r\n#define INF 0x3f3f3f3f\r\n#define MAX(a,b) (a > b ? a : b)\r\n#define MIN(a,b) (a < b ? a : b)\r\n#define mem0(a) memset(a,0,sizeof(a))\r\n\r\ntypedef long long LL;\r\nconst double eps = 1e-12;\r\nconst int MAXN = 1005;\r\nconst int MAXM = 5005;\r\n\r\nchar a[MAXN], b[MAXN];\r\n\r\nvoid strrevv(char * s) \r\n{\r\n    int len = strlen(s);\r\n    for (int i = 0, j = len - 1; i < j; i ++, j--)\r\n    {\r\n        char t = s[i]; s[i] = s[j]; s[j] = t;\r\n    }\r\n}\r\n\r\nvoid slove()\r\n{\r\n    int lena = strlen(a);\r\n    int lenb = strlen(b);\r\n    strrevv(a);  strrevv(b);\r\n    int p = 0;\r\n    while(a[p] || b[p])\r\n    {\r\n        if(a[p]>=\'0\') a[p] -= \'0\';\r\n        if(b[p]>=\'0\') b[p] -= \'0\';\r\n        a[p] += b[p];\r\n        a[p+1] += a[p]/10;\r\n        a[p] = a[p] % 10 + \'0\';\r\n        p++;\r\n    }\r\n    strrev(a);\r\n}\r\n\r\nint main()\r\n{\r\n    int T, Case=0;\r\n    scanf(\"%d\", &T);\r\n    while(T--)\r\n    {\r\n        mem0(a); mem0(b);\r\n        scanf(\"%s %s%*c\", a, b);\r\n        printf(\"Case %d:\\n\", ++Case);\r\n        printf(\"%s + %s = \", a, b);\r\n        slove();\r\n        printf(\"%s\\n\", a);\r\n        if(T) printf(\"\\n\");\r\n    }\r\n    return 0;\r\n}\r\n'),(54,'#include <map>\r\n#include <set>\r\n#include <stack>\r\n#include <queue>\r\n#include <cmath>\r\n#include <ctime>\r\n#include <vector>\r\n#include <cstdio>\r\n#include <cctype>\r\n#include <cstring>\r\n#include <cstdlib>\r\n#include <iostream>\r\n#include <algorithm>\r\nusing namespace std;\r\n#define INF 0x3f3f3f3f\r\n#define MAX(a,b) (a > b ? a : b)\r\n#define MIN(a,b) (a < b ? a : b)\r\n#define mem0(a) memset(a,0,sizeof(a))\r\n\r\ntypedef long long LL;\r\nconst double eps = 1e-12;\r\nconst int MAXN = 1005;\r\nconst int MAXM = 5005;\r\n\r\nchar a[MAXN], b[MAXN];\r\n\r\nvoid strrevv(char * s) \r\n{\r\n    int len = strlen(s);\r\n    for (int i = 0, j = len - 1; i < j; i ++, j--)\r\n    {\r\n        char t = s[i]; s[i] = s[j]; s[j] = t;\r\n    }\r\n}\r\n\r\nvoid slove()\r\n{\r\n    int lena = strlen(a);\r\n    int lenb = strlen(b);\r\n    strrevv(a);  strrevv(b);\r\n    int p = 0;\r\n    while(a[p] || b[p])\r\n    {\r\n        if(a[p]>=\'0\') a[p] -= \'0\';\r\n        if(b[p]>=\'0\') b[p] -= \'0\';\r\n        a[p] += b[p];\r\n        a[p+1] += a[p]/10;\r\n        a[p] = a[p] % 10 + \'0\';\r\n        p++;\r\n    }\r\n    strrevv(a);\r\n}\r\n\r\nint main()\r\n{\r\n    int T, Case=0;\r\n    scanf(\"%d\", &T);\r\n    while(T--)\r\n    {\r\n        mem0(a); mem0(b);\r\n        scanf(\"%s %s%*c\", a, b);\r\n        printf(\"Case %d:\\n\", ++Case);\r\n        printf(\"%s + %s = \", a, b);\r\n        slove();\r\n        printf(\"%s\\n\", a);\r\n        if(T) printf(\"\\n\");\r\n    }\r\n    return 0;\r\n}\r\n'),(55,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(56,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(57,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(58,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(59,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(60,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}		'),(61,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}		'),(62,'\r\n#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(63,'\r\n#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(64,'#include<stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1)    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}			'),(65,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    int x[10];\r\n    x[-2] = 0;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"\\n%d\\n\\n\", a + b);\r\n    return 0;\r\n}		'),(66,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1) printf(\"ssssssssssssssssssssssssssssssssssssss\");\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a + b);\r\n    return 0;\r\n}			'),(67,'#include <stdio.h>\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\", a * b);\r\n    return 0;\r\n}			'),(68,'#include <map>\r\n#include <set>\r\n#include <stack>\r\n#include <queue>\r\n#include <cmath>\r\n#include <ctime>\r\n#include <vector>\r\n#include <cstdio>\r\n#include <cctype>\r\n#include <cstring>\r\n#include <cstdlib>\r\n#include <iostream>\r\n#include <algorithm>\r\nusing namespace std;\r\n#define INF 0x3f3f3f3f\r\n#define MAX(a,b) (a > b ? a : b)\r\n#define MIN(a,b) (a < b ? a : b)\r\n#define mem0(a) memset(a,0,sizeof(a))\r\n\r\ntypedef long long LL;\r\nconst double eps = 1e-12;\r\nconst int MAXN = 1005;\r\nconst int MAXM = 5005;\r\n\r\nchar a[MAXN], b[MAXN];\r\n\r\nvoid strrevv(char * s) \r\n{\r\n    int len = strlen(s);\r\n    for (int i = 0, j = len - 1; i < j; i ++, j--)\r\n    {\r\n        char t = s[i]; s[i] = s[j]; s[j] = t;\r\n    }\r\n}\r\n\r\nvoid slove()\r\n{\r\n    int lena = strlen(a);\r\n    int lenb = strlen(b);\r\n    strrevv(a);  strrevv(b);\r\n    int p = 0;\r\n    while(a[p] || b[p])\r\n    {\r\n        if(a[p]>=\'0\') a[p] -= \'0\';\r\n        if(b[p]>=\'0\') b[p] -= \'0\';\r\n        a[p] += b[p];\r\n        a[p+1] += a[p]/10;\r\n        a[p] = a[p] % 10 + \'0\';\r\n        p++;\r\n    }\r\n    strrevv(a);\r\n}\r\n\r\nint main()\r\n{\r\n    int T, Case=0;\r\n    scanf(\"%d\", &T);\r\n    while(T--)\r\n    {\r\n        mem0(a); mem0(b);\r\n        scanf(\"%s %s%*c\", a, b);\r\n        printf(\"Case %d:\\n\", ++Case);\r\n        printf(\"%s + %s = \", a, b);\r\n        slove();\r\n        printf(\"%s\\n\", a);\r\n        if(T) printf(\"\\n\");\r\n    }\r\n    return 0;\r\n}\r\n	'),(69,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}		'),(70,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(71,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a - b);\r\n}'),(72,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    while(1)scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(73,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(74,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(75,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(76,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(77,'#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(78,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}'),(79,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}	'),(80,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a + b);\r\n}	'),(81,'#include<cstdio>\r\nusing namespace std;\r\n\r\nint main()\r\n{\r\n    int a, b;\r\n    scanf(\"%d %d\", &a, &b);\r\n    printf(\"%d\\n\", a - b);\r\n}	'),(82,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(83,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(84,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(85,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(86,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(87,'#include <stdio.h>\r\n#include <string.h>\r\n\r\nint T, N, A, B;\r\nint K[50], vis[50];\r\n\r\nbool DFS(int now)\r\n{\r\nif(vis[now]) return false;\r\nif(now == B) return true;\r\nvis[now] = true;\r\nbool down = false, up = false;\r\nif(now - K[now] >= 1) down = DFS(now - K[now]);\r\nif(now + K[now] <= N) up = DFS(now + K[now]);\r\nvis[now] = false;\r\nreturn down || up;\r\n}\r\n\r\nint main()\r\n{\r\nwhile(~scanf(\"%d\", &T))while(T--)\r\n{\r\nmemset(vis, 0, sizeof(vis));\r\nscanf(\"%d%d%d\", &N, &A, &B);\r\nfor(int i=1;i<=N;i++)\r\nscanf(\"%d\", &K[i]);\r\nprintf(\"%s\\n\", DFS(A) ? \"YES\" : \"NO\");\r\n}\r\nreturn 0;\r\n}'),(88,'ggghhjJffcccccfvvhJfdgj6dfbjJdXgbgszvb');
/*!40000 ALTER TABLE `source_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `submit` int(11) NOT NULL DEFAULT '0',
  `solved` int(11) NOT NULL DEFAULT '0',
  `defunct` char(1) NOT NULL DEFAULT 'N',
  `language` int(11) DEFAULT '1',
  `school` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','000000',61,4,'N',0,NULL,NULL,'admin'),('yuquanac','000000',13,3,'N',0,NULL,NULL,'https://github.com/gong782008371'),('test1','test1',5,3,'N',1,'','','this is a test username'),('gongjing','000000',4,2,'N',1,'','','生命不息，刷题不止');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-13 16:32:17
