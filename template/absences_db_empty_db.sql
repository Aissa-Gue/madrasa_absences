

CREATE TABLE `a_students` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `level` varchar(30) NOT NULL,
  `year` varchar(25) NOT NULL,
  PRIMARY KEY (`stud_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






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




