

CREATE TABLE `a_students` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `level` varchar(30) NOT NULL,
  `year` varchar(25) NOT NULL,
  PRIMARY KEY (`stud_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO a_students VALUES
("102","بابا واعمر صفية بنت قاسم","2006-05-03","التحضيري","2018/2019"),
("103","الحاج موسى إلهام بنت محمد","2008-05-04","الأولى متوسط","2018/2019"),
("104","قزريط عائشة بنت باحمد","2006-08-05","الثانية متوسط","2018/2019"),
("105","حواش منة بنت بكير","2009-05-06","الثالثة متوسط","2018/2019"),
("106","الشيهاني خديجة بنت يوسف","2010-05-07","الرابعة متوسط","2018/2019"),
("107","الزعبي سمية بنت داود","2003-05-08","الأولى إبتدائي","2018/2019"),
("108","أويابة صفاء بنت إبراهيم","2009-05-09","الثانية إبتدائي","2018/2019"),
("109","بوحديبة مريم بنت موسى","2006-05-10","الثالثة إبتدائي","2018/2019"),
("110","الواهج أسماء بنت قاسم","2004-05-11","الرابعة إبتدائي","2018/2019"),
("111","الهيشر عائشة بنت محمد","2012-05-12","الخامسة إبتدائي","2018/2019");




CREATE TABLE `admins` (
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO admins VALUES
("admin","f9f6ca898aec81ced8363e81347b0533");




CREATE TABLE `b_absences` (
  `abs_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`abs_id`) USING BTREE,
  KEY `stud_id` (`stud_id`) USING BTREE,
  CONSTRAINT `b_absences_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `a_students` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




