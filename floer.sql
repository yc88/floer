/*
SQLyog Community v11.24 (64 bit)
MySQL - 5.1.73 : Database - floer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`floer` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `floer`;

/*Table structure for table `fl_banner` */

DROP TABLE IF EXISTS `fl_banner`;

CREATE TABLE `fl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(64) NOT NULL COMMENT '标题',
  `img_url` varchar(64) NOT NULL COMMENT '图片url',
  `link` varchar(64) NOT NULL COMMENT '链接地址',
  `type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '类型：1、PC 2、手机',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(3) NOT NULL DEFAULT '1' COMMENT '是否显示  1、显示 2、隐藏',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='banner表';

/*Data for the table `fl_banner` */

insert  into `fl_banner`(`id`,`title`,`img_url`,`link`,`type`,`sort`,`is_show`,`addtime`) values (1,'banner1','banner/20180511/1c0d4d3e58db9f4f8bb99bc84ce40b71.png','1',2,1,1,1526022729),(2,'banner2','banner/20180511/d0d32c9b070625b3f9826ad44a5ab8cf.png','2',2,2,1,1526029829),(3,'banner3','banner/20180511/22ebbb60fc53fb8cb36dc640ce97d774.png','3',2,3,1,1526022706);

/*Table structure for table `fl_course` */

DROP TABLE IF EXISTS `fl_course`;

CREATE TABLE `fl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增课程id',
  `classify_id` int(11) NOT NULL COMMENT '课程的分类id',
  `teacher_id` int(11) NOT NULL COMMENT '课程导师id',
  `courser_name` varchar(64) NOT NULL COMMENT '课程名称',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `begins_time` int(11) NOT NULL COMMENT '课程开始时间',
  `end_time` int(11) NOT NULL COMMENT '课程结束时间',
  `courser_num` int(10) NOT NULL COMMENT '上课人数',
  `courser_img` varchar(255) NOT NULL COMMENT '课程相关图片',
  `courser_detail` text COMMENT '课程相关介绍',
  `courser_price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '课程全价格',
  `depoit_price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '课程定金',
  `video_url` varchar(128) NOT NULL COMMENT '课程视频地址',
  `buy_number` int(11) DEFAULT NULL COMMENT '购买人数',
  `is_publish` tinyint(11) NOT NULL DEFAULT '1' COMMENT '是否发布 1 是 2 否',
  `add_author` int(11) NOT NULL COMMENT '课程添加者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='课程';

/*Data for the table `fl_course` */

insert  into `fl_course`(`id`,`classify_id`,`teacher_id`,`courser_name`,`addtime`,`begins_time`,`end_time`,`courser_num`,`courser_img`,`courser_detail`,`courser_price`,`depoit_price`,`video_url`,`buy_number`,`is_publish`,`add_author`) values (1,1,1,'3日高端巧克力专项课程',1526034643,1527782400,1528560000,24,'courseImg/20180510/c6ba0635f4a66e27918fde6ee0d2ea7c.png','','0.20','0.10','20180510/a7ea81c8cb65ecbab3cf67778c49ae30.mp4',8,1,1),(2,1,1,'13日法国甜点精品课程',1526034635,1527782400,1528560000,24,'courseImg/20180510/2e2ce78fdbc5d6b52057bfe87c1074a6.png,','','0.20','0.10','20180510/3c90cef61993abc9d516018da1228a20.mp4',5,1,1),(3,1,1,'13日法国甜点高级课程',1526034625,1527782400,1528560000,24,'courseImg/20180510/f4212b59ff80cbebb1f5a677e550351c.png,','','0.20','0.10','20180510/74b43ca630ce71144168072201c0c77f.mp4',6,1,1),(4,1,1,'24天法点明星系统课程',1526275077,1527782400,1528560000,24,'courseImg/20180510/42eea55c1e8f8512fab683d5b9b98ec8.png','','0.02','0.01','20180510/e925bc3b96268f47d5731cb5f3fe26c5.mp4',80,1,1),(5,2,1,'6日高端面包专项课程',1526034612,1527782400,1528560000,24,'courseImg/20180510/ed0a6cbcf5ed22fb5422ce90c9a4acd8.png','','0.20','0.10','20180510/6d5d3cf0caa078d20e4dd927888d6566.mp4',4,1,1);

/*Table structure for table `fl_course_cate` */

DROP TABLE IF EXISTS `fl_course_cate`;

CREATE TABLE `fl_course_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程分类自增id',
  `classify_name` varchar(64) NOT NULL COMMENT '课程分类名称',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fl_course_cate` */

insert  into `fl_course_cate`(`id`,`classify_name`,`addtime`) values (1,'甜点课程',1525245527),(2,'面包课程',1525245542);

/*Table structure for table `fl_course_complete` */

DROP TABLE IF EXISTS `fl_course_complete`;

CREATE TABLE `fl_course_complete` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '结业照相关自增id',
  `diploma_photo` varchar(64) DEFAULT NULL COMMENT '学员毕业证书',
  `addtime` int(11) DEFAULT NULL COMMENT '上传时间',
  `course_detail_photo` varchar(64) DEFAULT NULL COMMENT '课程介绍',
  `learn_photo` varchar(64) DEFAULT NULL COMMENT '你将学到',
  `course_photo` varchar(64) DEFAULT NULL COMMENT '课程大纲',
  `teacher_detail` varchar(64) DEFAULT NULL COMMENT '导师简绍',
  `production_photo` varchar(64) DEFAULT NULL COMMENT '学员作品照',
  `graduation_photo` varchar(64) DEFAULT NULL COMMENT '学员毕业合照',
  `course_id` int(11) NOT NULL COMMENT '课程的id',
  PRIMARY KEY (`id`)
) ENGINE=MEMORY AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='学校课程学员相关的毕业照 毕业证书表\r\n';

/*Data for the table `fl_course_complete` */

insert  into `fl_course_complete`(`id`,`diploma_photo`,`addtime`,`course_detail_photo`,`learn_photo`,`course_photo`,`teacher_detail`,`production_photo`,`graduation_photo`,`course_id`) values (1,'courseImg/20180510/9f3eb6143bb72454724b649e6ee25b82.jpg',1526034643,'courseImg/20180510/7e75215a13df4ef06e11e74a3c80bd78.jpg','courseImg/20180510/46060b791a9bcb5aec2dd2ffb12cb6bd.jpg','courseImg/20180510/d3bf6a51b829418003f9c4e608d66ad7.jpg','courseImg/20180511/9c7db04b834c8eccdb9b7639d3016f97.jpg','courseImg/20180510/a7e24258f7e4aa7397e7eddca3978937.jpg','courseImg/20180510/ddc533e524eb674067876a6ccb486ddb.jpg',1),(2,NULL,1525931213,'courseImg/20180510/e5c490417c7770bea5047e820fa8253a.png',NULL,'courseImg/20180510/7644d0d310574b3c645cfec31988a255.png',NULL,'courseImg/20180510/f199021e8085b97ce9b345277ff258f3.png',NULL,1),(3,'courseImg/20180510/e6a96955a24fe94642561f37b5afa0dc.jpg',1526034635,'courseImg/20180511/d15bfe3182850672dc918e21ce859312.png','courseImg/20180510/9e484638df6ec39443378242247caeaa.jpg','courseImg/20180510/17f16101eb8b5e644745752f3f5781c8.jpg','courseImg/20180511/86e2e9b359220e7f4f982ab451e156ad.jpg','courseImg/20180510/b27818946e62fd65b1ffc72edcc0e6c4.jpg','courseImg/20180510/da08e5ef7f3cd2f14f78b8366a0ab6ae.jpg',2),(4,'courseImg/20180510/d9b3d90d5a9cd0f9467e3a14d13c15a4.jpg',1526034625,'courseImg/20180510/82ab1aee303d3b9d7081665043d22bfc.jpg','courseImg/20180510/6870497cfddec1b8809214757c9c5f9e.jpg','courseImg/20180510/49526e5289c7888aa323c33869183204.jpg','courseImg/20180511/b26b5a143ab4ea32e0e6b9f00eae0fc9.jpg','courseImg/20180510/c45a445ae702f7c0aeeb0ab57f63521c.jpg','courseImg/20180510/4b7dd69326211009065ed0b065b03613.jpg',3),(5,'courseImg/20180510/b83a327ce56fcccd173cba729d6ede3d.jpg',1525947114,'courseImg/20180510/f7c57d127719549a2c9cb9fcd00f0676.jpg','courseImg/20180510/57b44a4fbea480d228f40f2bf7a8188c.jpg','courseImg/20180510/6f0505fe13e430913bde86e08f8378af.jpg',NULL,'courseImg/20180510/7decef7606eb900c4830fdef036891a8.jpg','courseImg/20180510/9103c804f5df3b0320e382590fc6d147.jpg',1),(6,'courseImg/20180510/a7e707102e4cae113fc9c7e8c87a34dd.jpg',1525947308,'courseImg/20180510/1a73490019c3d2181b73a0137f130edc.jpg','courseImg/20180510/563fd0547b977b264a9d86a8628dd080.jpg','courseImg/20180510/54da8e30336cde922417afc2b9c2dd31.jpg',NULL,'courseImg/20180510/7dda70156310c6869cb13476bc4b2df0.jpg','courseImg/20180510/b8ef0bea7911bde09621097caa1bf660.jpg',2),(7,'courseImg/20180510/4bc6cbb438b3433159965016aafc9068.jpg',1525947436,'courseImg/20180510/78f7f38747f7ed29e5fcf311e21d86dc.jpg','courseImg/20180510/cd80a5f9cd8727fc8b28a523295164c8.jpg','courseImg/20180510/040832776dcdc07eb4ffe2c77dc733d5.jpg',NULL,'courseImg/20180510/5984f2c08611b61da19d8153276e445a.jpg','courseImg/20180510/c69ced6412e8f866e147924675d6799b.jpg',3),(8,'courseImg/20180510/d3e612003f92db9e088ab1dcc1f0152e.jpg',1526275077,'courseImg/20180510/6faeaf5acead0d01e26173274223986c.jpg','courseImg/20180510/2a8c4b3f298c480c33cccfb2ca37293d.jpg','courseImg/20180510/8a7306408a436526efc8b10a312af6be.jpg','courseImg/20180511/ef87ec2ed3ef214bfe92d49d6a0f83f0.jpg','courseImg/20180510/553c816d98cb0204e7dcc6738dfdb173.jpg','courseImg/20180510/b80a33d4b0345bc9a8ebf5fcb4cb7a21.jpg',4),(9,'courseImg/20180510/0b46ff15d66df4e870503ac31d985832.jpg',1526034612,'courseImg/20180510/b6b27745d435f1941fb9cb095d8f7480.jpg','courseImg/20180510/c742c46202fa8958e53d4b3a5fd53c87.jpg','courseImg/20180510/69f74618e67e4287b190c3538b6878d2.jpg','courseImg/20180511/77f1b23e8770326790233f156ea9be21.jpg','courseImg/20180510/4b038aff5dc6b0c98ff71d36e12311f4.jpg','courseImg/20180510/02e1ab5c310c0008b888288fd750ba87.jpg',5);

/*Table structure for table `fl_info` */

DROP TABLE IF EXISTS `fl_info`;

CREATE TABLE `fl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增资讯id',
  `info_name` varchar(32) NOT NULL COMMENT '资讯标题',
  `info_img` varchar(64) DEFAULT NULL COMMENT '资讯图片',
  `info_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `info_detail` text NOT NULL COMMENT '资讯相关描述',
  `info_cate` int(11) NOT NULL COMMENT '资讯分类id',
  `info_author` int(11) NOT NULL DEFAULT '1' COMMENT '资讯编辑者',
  `is_show` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否显示 1是 2 否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `fl_info` */

insert  into `fl_info`(`id`,`info_name`,`info_img`,`info_time`,`info_detail`,`info_cate`,`info_author`,`is_show`) values (1,'关于我们','InfoImg/20180511/0e231ba4666f9fa2af939d0f78445f95.jpg',1526022254,'<p><span style=\"color: #000000;\">深圳市弗洛高等法式厨艺学校(ECFF)是中国最知名的法式甜点培训学校之一，也是我国第一所获得政府批准，冠名高等法式甜点的具有合法正规教学资质的培训学校，以及政府授权的高技能人才培育基地。</span></p><p><span style=\"color: #000000;\">学校成立于2014年初，至今已有数千名专业甜点从业者与爱好者在此参与不同课程，并找到了创业、生活的新方向。国内最早提出并设立“法点精品”与另外多种“法点专项”系列课程，课程编排科学，风格鲜明，辨识度高，在业内拥有很高的辨识度与知名度，已经成为许多同行参考的标杆。</span></p><p><br/></p>',1,1,1),(2,'about1','InfoImg/20180511/1db0014d669100aebf831ef3cf51fd0f.jpg',1526022305,'',1,1,1),(3,'about3','InfoImg/20180511/124e40171f95d543ebad5b60b97a0d10.jpg',1526022317,'',1,1,1),(4,'about4','InfoImg/20180511/6c10cc2d2c21184af613484d4aa46fd6.jpg',1526022331,'',1,1,1),(5,'about5','InfoImg/20180511/49d1e883fb830b3453e1f5ae128b3f44.jpg',1526022344,'',1,1,1),(6,'about6','InfoImg/20180511/5c8907f8367052f2139c4f1948b29270.jpg',1526022355,'',1,1,1),(7,'about7','InfoImg/20180511/278771f12da775900b0fef771d903615.jpg',1526022364,'',1,1,1);

/*Table structure for table `fl_info_cate` */

DROP TABLE IF EXISTS `fl_info_cate`;

CREATE TABLE `fl_info_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '资讯分类自增id',
  `cate_name` varchar(32) NOT NULL COMMENT '资讯分类名称',
  `cate_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `cate_detail` varchar(128) DEFAULT NULL COMMENT '资讯分类描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fl_info_cate` */

insert  into `fl_info_cate`(`id`,`cate_name`,`cate_time`,`cate_detail`) values (1,'关于我们',1525931492,'小程序个人中心关于我， ');

/*Table structure for table `fl_inform_sms` */

DROP TABLE IF EXISTS `fl_inform_sms`;

CREATE TABLE `fl_inform_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `course_name` varchar(16) NOT NULL COMMENT '通知的课程',
  `begin_time` datetime NOT NULL COMMENT '开课时间',
  `end_time` datetime NOT NULL COMMENT '终止时间',
  `smstime` datetime NOT NULL COMMENT '添加时间',
  `sms_author` int(11) NOT NULL COMMENT '操作者',
  `is_status` varchar(64) NOT NULL COMMENT '发送短信状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='短信通知学员上课信息';

/*Data for the table `fl_inform_sms` */

insert  into `fl_inform_sms`(`id`,`phone`,`course_name`,`begin_time`,`end_time`,`smstime`,`sms_author`,`is_status`) values (1,'15820287091','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(2,'18776150685','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(3,'13430214945','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(4,'15625430359','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(5,'13714756996','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(6,'13670281566','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(7,'18682038067','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:11',1,'ok'),(8,'18219440603','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(9,'18566294007','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(10,'15692423389','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(11,'13246705109','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(12,'18929368770','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(13,'18929381812','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(14,'18672771812','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(15,'19925461812','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(16,'13824318218','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(17,'18589033898','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(18,'18225494871','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(19,'18682083871','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:12',1,'ok'),(20,'17688978080','(课程通知测试)','2018-05-09 00:00:00','2018-05-25 00:00:00','2018-05-15 14:17:13',1,'ok');

/*Table structure for table `fl_like_question` */

DROP TABLE IF EXISTS `fl_like_question`;

CREATE TABLE `fl_like_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '点赞表自增id',
  `uid` int(11) NOT NULL COMMENT '点赞用户id',
  `question_id` int(11) NOT NULL COMMENT '点赞问题id',
  `like_time` int(11) NOT NULL COMMENT '点赞时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户点赞问题表';

/*Data for the table `fl_like_question` */

insert  into `fl_like_question`(`id`,`uid`,`question_id`,`like_time`) values (1,2,2,1525958181),(2,4,6,1526002995),(3,3,2,1526020805),(4,8,2,1526088669),(5,2,14,1526274153);

/*Table structure for table `fl_node` */

DROP TABLE IF EXISTS `fl_node`;

CREATE TABLE `fl_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(155) NOT NULL DEFAULT '' COMMENT '节点名称',
  `control_name` varchar(155) NOT NULL DEFAULT '' COMMENT '控制器名',
  `action_name` varchar(155) NOT NULL COMMENT '方法名',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是菜单项 1不是 2是',
  `type_id` int(11) NOT NULL COMMENT '父级节点id',
  `style` varchar(155) DEFAULT '' COMMENT '菜单样式',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `fl_node` */

insert  into `fl_node`(`id`,`node_name`,`control_name`,`action_name`,`is_menu`,`type_id`,`style`) values (1,'用户管理','#','#',2,0,'glyphicon glyphicon-user'),(2,'管理员管理','user','index',2,1,''),(3,'添加管理员','user','useradd',1,2,''),(4,'编辑管理员','user','useredit',1,2,''),(5,'删除管理员','user','userdel',1,2,''),(6,'角色管理','role','index',2,1,''),(7,'添加角色','role','roleadd',1,6,''),(8,'编辑角色','role','roleedit',1,6,''),(9,'删除角色','role','roledel',1,6,''),(10,'分配权限','role','giveaccess',1,6,''),(11,'节点管理','node','index',2,1,''),(12,'添加节点','node','nodeadd',1,11,''),(13,'编辑节点','node','nodeedit',1,11,''),(14,'删除节点','node','nodedel',1,11,''),(18,'系统管理','#','#',2,0,'glyphicon glyphicon-cog'),(24,'修改管理员密码','user','editpassword',1,2,''),(25,'站点设置','system','webconfig',2,18,''),(26,'会员管理','#','#',2,0,'fa fa-users'),(27,'课程管理','#','#',2,0,'fa fa-users'),(28,'订单管理','#','#',2,0,'fa fa-users'),(29,'课程列表','course','index',2,27,''),(30,'添加课程','course','addcourse',1,29,''),(31,'编辑课程','course','editcourse',1,29,''),(32,'删除课程','course','delcourse',1,29,''),(33,'课程分类','course','courseclassify',2,27,''),(34,'添加分类','course','addclassify',1,33,''),(35,'编辑分类','course','editclassify',1,33,''),(36,'删除分类','course','delclassify',1,33,''),(37,'导师管理','#','#',2,0,'fa fa-users'),(38,'导师列表','teacher','index',2,37,''),(39,'添加导师','teacher','addteacher',1,38,''),(40,'编辑导师','teacher','editteacher',1,38,''),(41,'删除导师','teacher','delteacher',1,38,''),(42,'咨询管理','#','#',2,0,'fa fa-users'),(43,'咨询列表','question','index',2,42,''),(44,'回复咨询','question','questionback',1,43,''),(45,'删除咨询','question','delquestion',1,43,''),(46,'课程详情','course','coursedetail',1,29,''),(47,'会员列表','member','index',2,26,''),(48,'添加会员','member','addmember',1,47,''),(49,'会员详情','member','memberdetail',1,47,''),(50,'编辑会员','member','editmember',1,47,''),(51,'删除会员','member','delmember',1,47,''),(52,'订单列表','order','index',2,28,''),(53,'订单详情','order','orderdetail',1,28,''),(54,'删除订单','order','delorder',1,52,''),(55,'首页banner','system','banner',2,18,''),(56,'添加banner','system','addbanner',1,55,''),(57,'编辑banner','system','editbanner',1,55,''),(58,'删除banner','system','delbanner',1,55,''),(59,'资讯管理','#','#',2,0,'fa fa-users'),(60,'资讯列表','info','index',2,59,''),(61,'资讯分类','info','infoclassify',2,59,''),(62,'添加资讯','info','addinfo',1,60,''),(63,'编辑资讯','info','editinfo',1,60,''),(64,'删除分类','info','delinfo',1,60,''),(65,'添加分类','info','addinfoclassify',1,61,''),(66,'编辑分类','info','editinfoclassify',1,61,''),(67,'删除分类','info','delinfoclassify',1,61,''),(68,'修改管理信息','user','edituserinfo',1,2,''),(69,'添加余款支付','order','addresidue',1,53,''),(70,'短信通知','sms','smsindex',2,27,''),(71,'发送通知','sms','sendsms',1,70,''),(72,'删除短信通知','sms','delsms',1,70,''),(73,'导出订单','order','orderexcel',1,28,'');

/*Table structure for table `fl_question` */

DROP TABLE IF EXISTS `fl_question`;

CREATE TABLE `fl_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题表自增id',
  `question_detail` text NOT NULL COMMENT '问题描述',
  `uid` int(11) NOT NULL COMMENT '提问者id',
  `question_time` int(11) NOT NULL COMMENT '提问时间',
  `is_answer` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否回复 1 否 2 是',
  `answer_author` int(11) NOT NULL COMMENT '回复者',
  `answer_time` int(11) NOT NULL COMMENT '回复时间',
  `answer_detail` text COMMENT '问题答案',
  `is_show` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否显示 1 是 2 否',
  `like` int(11) DEFAULT NULL COMMENT '点赞数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='提问';

/*Data for the table `fl_question` */

insert  into `fl_question`(`id`,`question_detail`,`uid`,`question_time`,`is_answer`,`answer_author`,`answer_time`,`answer_detail`,`is_show`,`like`) values (1,'公司在哪里',3,1525934381,1,0,0,NULL,1,NULL),(2,'24天课程包括哪些内容',2,1525939458,2,1,1525958155,'包括这些内容',1,3),(3,'甜点好吃吗',4,1525954313,1,0,0,NULL,1,NULL),(6,'fasasfs法法',1,1526001340,2,1,1526001378,'法师法师',1,1),(7,'您好，有人在线么?',2,1526008144,1,0,0,NULL,1,NULL),(8,'您好，有人在线么?',2,1526008144,1,0,0,NULL,1,NULL),(9,'海景酒店',10,1526009376,1,0,0,NULL,1,NULL),(11,'课程费用具体多少',3,1526020836,2,1,1526040566,'法师法杀手的说法是',1,NULL),(12,'请问，最近一期系统课是什么时候？',6,1526042850,1,0,0,NULL,1,NULL),(13,'24天最多有多少人上课？',8,1526088041,1,0,0,NULL,1,NULL),(14,'你好，能告知上课地址吗？',1,1526104570,2,1,1526104602,'sdasdas',1,1),(20,'上课时间',5,1526282119,2,1,1526282236,'具体上课时间我们会在安排好通知你',1,NULL),(21,'支付正常、提问正常',5,1526282356,2,1,1526282700,'好的，收到',1,NULL),(22,'短信通知及时，正常',5,1526282416,1,0,0,NULL,1,NULL),(23,'用户Logo显示不正常',5,1526284229,1,0,0,NULL,1,NULL);

/*Table structure for table `fl_residue` */

DROP TABLE IF EXISTS `fl_residue`;

CREATE TABLE `fl_residue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_id` int(11) NOT NULL COMMENT '购买id',
  `course_id` int(11) NOT NULL COMMENT '课程id',
  `order_no` varchar(20) NOT NULL COMMENT '订单编号',
  `price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '余额',
  `total_money` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '全额',
  `user_order_no` varchar(20) NOT NULL COMMENT '用户定金编号',
  `oktime` int(11) DEFAULT NULL COMMENT '用户付款时间',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '付款状态1 未付款 2 已付款 3未知',
  `pay_type` tinyint(3) DEFAULT '1' COMMENT '付款方式 1 wx 2 ali 3线下支付',
  `pay_type_no` varchar(128) DEFAULT NULL COMMENT '微信支付订单编号',
  `edit_author` int(11) DEFAULT NULL COMMENT '余款线下支付时编辑者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `fl_residue` */

insert  into `fl_residue`(`id`,`buy_id`,`course_id`,`order_no`,`price`,`total_money`,`user_order_no`,`oktime`,`status`,`pay_type`,`pay_type_no`,`edit_author`) values (1,5,3,'WX175151679A101571','0.10','0.20','WX175151639A549755',1526282083,2,1,'4200000158201805149673683189',NULL),(2,5,5,'WX175151909A529898','0.10','0.20','WX175151891A505697',1526282313,2,1,'4200000147201805149541024688',NULL),(3,1,4,'WX175154765A995349','0.01','0.02','WX175154374A535248',1526285168,2,1,'4200000140201805149757506461',NULL),(4,1,4,'OL175162780A989798','0.01','0.02','WX175156350A100575',1526293179,2,3,NULL,1),(5,7,2,'OL175162962A499798','0.10','0.20','WX175162878A100565',1526293361,2,3,NULL,1),(6,2,4,'OL175163090A499953','0.01','0.02','WX175162895A101981',1526293489,2,3,NULL,1),(7,2,4,'WX175163115A975097','0.00','0.02','WX175162895A101981',NULL,1,1,NULL,NULL),(8,7,4,'OL175163208A551004','0.01','0.02','WX175163191A545510',1526293607,2,3,NULL,1),(9,2,4,'WX175163213A999851','0.00','0.02','WX175162895A101981',NULL,1,1,NULL,NULL),(10,2,4,'OL175214677A529855','0.01','0.02','WX175162893A991024',1526345076,2,3,NULL,1),(11,1,4,'OL175235117A994854','0.01','0.02','WX175228129A484997',1526365516,2,3,NULL,1),(12,7,4,'WX175245944A555253','0.01','0.02','WX175245868A985010',1526376352,2,1,'4200000140201805150301149468',NULL);

/*Table structure for table `fl_role` */

DROP TABLE IF EXISTS `fl_role`;

CREATE TABLE `fl_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `role_name` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT '' COMMENT '权限节点数据',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `fl_role` */

insert  into `fl_role`(`id`,`role_name`,`rule`) values (1,'超级管理员','*'),(2,'我是测试1','1,2,3,4,5,24,6,7,8,9,10'),(4,'我是测试2','1,2,3,4,5,24'),(5,'教务老师-吴瑞琦','28,52,54,53,42,43,44,45');

/*Table structure for table `fl_site` */

DROP TABLE IF EXISTS `fl_site`;

CREATE TABLE `fl_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(32) DEFAULT NULL COMMENT '网址地址',
  `phone` varchar(12) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  `records` varchar(255) DEFAULT NULL COMMENT '备案号码',
  `web_name_z` varchar(64) DEFAULT NULL COMMENT '公司名称中',
  `web_name_y` varchar(64) DEFAULT NULL COMMENT '公司名称外',
  `logo` varchar(64) DEFAULT NULL COMMENT '网站logo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fl_site` */

insert  into `fl_site`(`id`,`site_url`,`phone`,`email`,`address`,`records`,`web_name_z`,`web_name_y`,`logo`) values (1,'www.florevp.com','18225494871','1246302096@qq.com','深圳华强北','粤ICP备14069093号','弗洛','flore','logo/20180507/de0239f221ba1f08edced19105ac8cac.jpg');

/*Table structure for table `fl_sms` */

DROP TABLE IF EXISTS `fl_sms`;

CREATE TABLE `fl_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` enum('register','login','set_password','forget_password','cash') NOT NULL COMMENT '类型',
  `ip` varchar(16) NOT NULL COMMENT 'IP地址',
  `code` int(6) NOT NULL COMMENT '验证码',
  `phone` varchar(11) NOT NULL COMMENT '手机号码',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8 COMMENT='短信验证码表';

/*Data for the table `fl_sms` */

insert  into `fl_sms`(`id`,`type`,`ip`,`code`,`phone`,`add_time`) values (79,'register','116.30.217.172',739630,'18225494871',1526033271),(78,'register','219.134.116.245',313252,'18225494871',1526010400),(77,'register','219.134.116.245',832665,'18929381812',1525957891),(76,'register','219.134.116.245',200178,'18929381812',1525957750),(75,'register','219.134.116.245',288817,'18929381812',1525957651),(74,'register','219.134.116.245',469886,'18225494871',1525955345),(73,'register','219.134.116.245',200970,'18225494871',1525952974),(72,'register','219.134.116.245',546530,'18225494871',1525952963),(71,'register','219.134.116.245',334551,'15545555555',1525938028),(70,'register','219.134.116.245',276391,'18929381812',1525937786),(69,'register','219.134.116.245',537169,'18929381812',1525937724),(68,'register','219.134.116.245',625685,'18929381812',1525937657),(67,'register','219.134.116.245',707082,'13246705109',1525933838),(66,'register','219.134.116.245',599865,'17688978080',1525859380),(65,'register','219.134.116.245',796342,'17688978080',1525858537),(64,'register','219.134.116.245',542001,'17688978080',1525855438),(63,'register','219.134.116.245',428010,'18225494871',1525855427),(62,'register','113.88.47.26',109951,'17688978080',1525844007),(61,'register','112.97.55.106',377458,'17688978080',1525836371),(60,'register','112.97.55.106',914981,'18225494871',1525836359),(40,'register','WX174704738A4998',8888,'18225494871',1525763903),(41,'register','WX174704738A4998',8888,'17688978080',1525763921),(42,'register','WX174704738A4998',8888,'17688978080',1525769433),(43,'register','113.88.47.26',996075,'17688978080',1525769458),(44,'register','113.88.47.26',926983,'18672771812',1525769461),(45,'register','113.81.235.209',822477,'18672771812',1525769594),(46,'register','113.81.235.209',903940,'18672771812',1525769745),(47,'register','113.81.235.209',150503,'18225494871',1525769876),(48,'register','113.88.47.26',160870,'18225494871',1525770037),(49,'register','113.88.47.26',568854,'18225494871',1525771459),(50,'register','113.88.47.26',146762,'18225494871',1525773750),(51,'register','113.88.47.26',285748,'18225494871',1525775339),(52,'register','113.88.47.26',789646,'18225494871',1525775810),(53,'register','113.88.47.26',818493,'18225494871',1525778295),(54,'register','113.81.235.209',644530,'18225494871',1525828184),(55,'register','112.97.55.106',222578,'18225494871',1525828453),(56,'register','112.97.55.106',633766,'17688978080',1525829225),(57,'register','112.97.55.106',511790,'17688978080',1525829229),(58,'register','112.97.55.106',958495,'18225494871',1525829239),(59,'register','112.97.55.106',657110,'18225494871',1525831610),(80,'register','116.30.217.172',507266,'18225494871',1526033606),(81,'register','116.30.217.172',131935,'18225494871',1526034073),(82,'register','113.88.47.234',274458,'18929381812',1526034506),(83,'register','113.88.47.234',969553,'18929381812',1526034868),(84,'register','116.30.217.172',783639,'18225494871',1526035138),(85,'register','113.88.47.234',920385,'13246705109',1526035383),(86,'register','113.88.47.234',507015,'13246705109',1526035384),(87,'register','113.88.47.234',450001,'18225494871',1526035458),(88,'register','113.88.47.234',161367,'13246705109',1526035462),(89,'register','113.88.47.234',229698,'18225494871',1526036695),(90,'register','113.88.47.234',551207,'18225494871',1526036698),(91,'register','113.88.47.234',381906,'17688978080',1526036705),(92,'register','116.30.217.172',180877,'17688978080',1526036843),(93,'register','116.30.217.172',136854,'17688978088',1526036928),(94,'register','116.30.217.172',618437,'17688978080',1526036968),(95,'register','113.88.47.234',485463,'18929381812',1526037188),(96,'register','113.88.47.234',470883,'18929381812',1526037384),(97,'register','113.88.47.234',416196,'18929381812',1526037497),(98,'register','113.88.47.234',577737,'18929381812',1526037807),(99,'register','113.88.47.234',521015,'18672771812',1526037816),(100,'register','113.91.88.209',397518,'18929368770',1526041195),(101,'register','223.73.2.192',411280,'18682083871',1526042565),(102,'register','116.30.217.172',174880,'15820287091',1526088077),(103,'register','116.30.217.172',975092,'15820287091',1526088959),(104,'register','116.30.217.172',551924,'18225494871',1526091191),(105,'register','116.30.217.172',879219,'17688978080',1526091213),(106,'register','116.30.217.172',593704,'18225494871',1526091258),(107,'register','116.30.217.172',338659,'17688978080',1526091392),(108,'register','116.30.217.172',231206,'18929381812',1526091458),(109,'register','116.30.217.172',435287,'18929381812',1526091527),(110,'register','113.88.47.234',840526,'18225494871',1526107142),(111,'register','116.30.217.172',605395,'18225494871',1526107210),(112,'register','116.30.217.172',768869,'17688978080',1526107782),(113,'register','113.88.47.234',780351,'18989381812',1526111426),(114,'register','113.88.47.234',699540,'18225494871',1526112283),(115,'register','113.88.47.234',788473,'18929381812',1526113202),(116,'register','113.88.47.234',742144,'18225494871',1526123224),(117,'register','113.88.47.234',941222,'18225494871',1526123375),(118,'register','116.30.217.172',545278,'18225494871',1526265323),(119,'register','112.97.224.52',361528,'17688978080',1526269591),(120,'register','219.134.117.121',367892,'13246705109',1526276383),(121,'register','219.134.117.121',669631,'13246705109',1526276403),(122,'register','219.134.117.121',788740,'13246705109',1526276456),(123,'register','219.134.117.121',337412,'13246705109',1526277135),(124,'register','219.134.117.121',526265,'13246705109',1526278396),(125,'register','113.88.47.223',917066,'17688978080',1526278568),(126,'register','113.88.47.223',430448,'18929381812',1526278593),(127,'register','219.134.117.121',931620,'13246705109',1526278640),(128,'register','113.88.47.223',666487,'18929381812',1526278729),(129,'register','219.134.117.121',623483,'13246705109',1526278912),(130,'register','219.134.117.121',100477,'13246705109',1526278927),(131,'register','219.134.117.121',763564,'13246705109',1526278928),(132,'register','219.134.117.121',531877,'13246705109',1526278959),(133,'register','219.134.117.121',752696,'13246705109',1526278959),(134,'register','219.134.117.121',778558,'13246705109',1526278959),(135,'register','219.134.117.121',438976,'13246705109',1526278960),(136,'register','219.134.117.121',752859,'13246705109',1526278960),(137,'register','219.134.117.121',556382,'13246705109',1526278982),(138,'register','219.134.117.121',629679,'17688978080',1526278999),(139,'register','113.88.47.223',767830,'17688978080',1526279143),(140,'register','113.88.47.223',898283,'18929381812',1526279499),(141,'register','113.88.47.223',671040,'18929381812',1526279578),(142,'register','113.88.47.223',394515,'18929381812',1526279675),(143,'register','112.97.50.200',771237,'18682083871',1526282025),(144,'register','112.97.50.200',872794,'18682083871',1526282178),(145,'register','112.97.50.200',163444,'18682083871',1526282270),(146,'register','112.97.50.200',816427,'18682083871',1526284427),(147,'register','113.88.47.223',175517,'18225494871',1526284753),(148,'register','113.88.47.223',664745,'17688978080',1526286732),(149,'register','113.88.47.223',234122,'18929381812',1526293232),(150,'register','113.88.47.223',128375,'13246705109',1526293268),(151,'register','113.88.47.223',578853,'18929381812',1526293572),(152,'register','113.88.47.223',471491,'18225494871',1526358509),(153,'register','116.24.94.20',680290,'18929381812',1526376247),(154,'register','116.30.217.172',733892,'18225494871',1526377416);

/*Table structure for table `fl_teacher` */

DROP TABLE IF EXISTS `fl_teacher`;

CREATE TABLE `fl_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导师自增id',
  `name_z` varchar(16) DEFAULT NULL COMMENT '导师中文名',
  `name_y` varchar(32) DEFAULT NULL COMMENT '导师英文名',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '导师性别 1 男 2 女',
  `age` int(11) DEFAULT NULL COMMENT '导师年龄',
  `teacher_img` varchar(64) DEFAULT NULL COMMENT '导师头像',
  `teacher_detail` text COMMENT '导师简介',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fl_teacher` */

insert  into `fl_teacher`(`id`,`name_z`,`name_y`,`sex`,`age`,`teacher_img`,`teacher_detail`,`addtime`) values (1,'派翠','Patrick Lemesle',1,42,'','法国导师',1525930902);

/*Table structure for table `fl_user` */

DROP TABLE IF EXISTS `fl_user`;

CREATE TABLE `fl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户自增id',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名称',
  `real_name` varchar(20) DEFAULT NULL COMMENT '用户真实姓名',
  `user_password` varchar(64) NOT NULL COMMENT '用户密码',
  `user_phone` varchar(11) DEFAULT NULL COMMENT '用户手机号码',
  `user_type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '用户角色 1是普通用户 2是商铺',
  `user_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '用户状态 1是正常 2 冻结',
  `user_source` enum('wx','app','web') NOT NULL DEFAULT 'wx' COMMENT '来源渠道 1微信小程序 2.app 3.web',
  `user_sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户性别 1 男 2 女',
  `user_photo` varchar(128) DEFAULT NULL COMMENT '用户头像',
  `openid` varchar(64) DEFAULT NULL COMMENT '用户授权id(主要来自小程序)',
  `user_login_time` int(11) DEFAULT NULL COMMENT '用户最后登录时间',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `fl_user` */

insert  into `fl_user`(`id`,`user_name`,`real_name`,`user_password`,`user_phone`,`user_type`,`user_status`,`user_source`,`user_sex`,`user_photo`,`openid`,`user_login_time`,`addtime`) values (1,'反','于v','','18225494871',1,1,'wx',1,'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLbiad2mPthtsXfpJKIBEgUqzAia2LeSrONrZZXeD6IvZgnvsiba1Vpy2qU6F7LDZLdzRw3zicS0ZAkBw/132','ok0WZ5QibUftsYf6XXCHZj2MwEY0',NULL,1526280091),(2,'AYWW','AYWW','','13246705109',1,1,'wx',1,'https://wx.qlogo.cn/mmopen/vi_32/PvicBORiaTDrhUa5h9B15WGA4AGgzUmtEbaZAjhhnqicHpicEDbPKsvmEfrhqonHrP24h7b4UKHVMIMIunQLRU1lzw/132','ok0WZ5dgxweB3OJLxuoHfF4P2Y28',NULL,1526280120),(3,NULL,NULL,'',NULL,1,1,'wx',1,NULL,'ok0WZ5bobXCxdjqNGyItzDXIqBzU',NULL,1526280361),(4,NULL,NULL,'',NULL,1,1,'wx',1,NULL,'ok0WZ5Qp7EJL_3LEx9-BPe8rkGAU',NULL,1526280432),(5,'Romain','我','','18682083871',1,1,'wx',1,'https://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83eqoiaJhgibygINL5EXIiaNjcJcSpCuticClPXsZcpWqRR6R1BPlHia7LNB6xBGDwnroibkLqHSRS396dOZg/13','ok0WZ5VrhaJsHBnDDZX5IMXbEULc',NULL,1526281974),(6,NULL,NULL,'',NULL,1,1,'wx',1,NULL,'ok0WZ5Swkh16Kw64zML7yo9b-vI0',NULL,1526290127),(7,'木已成','廖俊舟','','18929381812',1,1,'wx',1,'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJv7v3jkvzfX1tbHQ4fYqw2Jib3jKMaozvIkLiaWfLXJU42JTWmNVYebQ73r9gZZzdXI2sgj1n61MSw/132','ok0WZ5QIF7N_KKcusbC3x7zURlo4',NULL,1526293216);

/*Table structure for table `fl_user_admin` */

DROP TABLE IF EXISTS `fl_user_admin`;

CREATE TABLE `fl_user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '密码',
  `head` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '头像',
  `login_times` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '真实姓名',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `role_id` int(11) NOT NULL DEFAULT '1' COMMENT '用户角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `fl_user_admin` */

insert  into `fl_user_admin`(`id`,`user_name`,`password`,`head`,`login_times`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`role_id`) values (1,'yangcan','17a30769ff8f58e57de69c49d302a757','adminUserImg/20180420/878ef7a9f02300e9d7a574c80bd163e8.jpg',49,'116.30.217.172',1526381003,'杨灿',1,1),(3,'123456','17a30769ff8f58e57de69c49d302a757','',2,'127.0.0.1',1523690932,'哈哈哈',1,4);

/*Table structure for table `fl_user_order` */

DROP TABLE IF EXISTS `fl_user_order`;

CREATE TABLE `fl_user_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `buy_id` int(11) NOT NULL COMMENT '购买用户id',
  `course_id` int(11) NOT NULL COMMENT '购买的课程id',
  `order_no` varchar(20) NOT NULL COMMENT '订单编号',
  `price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '订单价格',
  `oktime` int(11) DEFAULT NULL COMMENT '付款时间',
  `addtime` int(11) DEFAULT NULL COMMENT '购买时间',
  `order_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '付款状态 1未付款 2 已付款 3未知',
  `tel` varchar(11) NOT NULL COMMENT '联系电话',
  `pay_type` int(3) NOT NULL DEFAULT '1' COMMENT '支付方式 1 微信支付 2支付宝 3其他',
  `pay_type_no` varchar(128) DEFAULT NULL COMMENT '支付方式订单号',
  `payment_type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '交款方式 1全款 2定金',
  `is_del` tinyint(2) DEFAULT '0' COMMENT '是否删除订单 0 未删除 1 已删除',
  `money_residue` decimal(9,2) DEFAULT '0.00' COMMENT '定金剩余支付金额',
  `residue_id` int(11) NOT NULL COMMENT '余额支付id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `fl_user_order` */

insert  into `fl_user_order`(`id`,`buy_id`,`course_id`,`order_no`,`price`,`oktime`,`addtime`,`order_status`,`tel`,`pay_type`,`pay_type_no`,`payment_type`,`is_del`,`money_residue`,`residue_id`) values (1,5,3,'WX175151639A549755','0.20',1526282048,1526282038,2,'18682083871',1,'4200000148201805149573802002',1,0,'0.00',1),(2,5,2,'WX175151791A101525','0.20',1526282194,1526282190,2,'18682083871',1,'4200000150201805149644123001',1,0,'0.00',0),(3,5,5,'WX175151891A505697','0.20',1526282295,1526282290,2,'18682083871',1,'4200000152201805149755405100',1,0,'0.00',2),(4,5,1,'WX175154043A971015','0.20',1526284450,1526284442,2,'18682083871',1,'4200000140201805149536020188',1,0,'0.00',0),(5,1,4,'WX175154374A535248','0.02',1526284780,1526284773,2,'18225494871',1,'4200000148201805149645852653',1,0,'0.00',3),(6,1,4,'WX175156350A100575','0.02',1526286754,1526286749,1,'17688978080',1,'4200000151201805149574284951',2,0,'0.00',1),(7,7,2,'WX175162865A485656','0.20',NULL,1526293264,1,'18929381812',1,NULL,1,0,'0.00',0),(8,7,2,'WX175162878A100565','0.20',1526293286,1526293277,1,'18929381812',1,'4200000153201805149689096578',2,0,'0.00',1),(9,2,4,'WX175162893A991024','0.02',NULL,1526293292,1,'13246705109',1,NULL,1,0,'0.00',1),(10,2,4,'WX175162895A101981','0.02',1526293307,1526293294,2,'13246705109',1,'4200000158201805149151733910',2,0,'0.00',1),(11,7,4,'WX175163191A545510','0.02',1526293599,1526293590,2,'18929381812',1,'4200000153201805149678537341',1,0,'0.00',1),(12,1,4,'WX175228129A484997','0.02',1526358533,1526358528,2,'18225494871',1,'4200000157201805159899397073',1,0,'0.00',1),(14,7,4,'WX175245868A985010','0.02',1526376274,1526376267,2,'18929381812',1,'4200000148201805150068879209',1,0,'0.00',12),(15,1,4,'WX175247030A534899','0.02',1526377438,1526377429,2,'18225494871',1,'4200000143201805150106360185',1,0,'0.00',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
