<?php

$adminsQry = "CREATE TABLE `admins` (
	`username` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci'
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;";

$studentsQry = "CREATE TABLE `a_students` (
	`stud_id` INT(11) NOT NULL,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`birthdate` DATE NULL DEFAULT NULL,
	`level` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`year` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`stud_id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB";

$absencesQry = "CREATE TABLE `b_absences` (
	`abs_id` INT(11) NOT NULL AUTO_INCREMENT,
	`stud_id` INT(11) NOT NULL,
	`date` DATE NULL DEFAULT NULL,
	`time` TIME NULL DEFAULT NULL,
	PRIMARY KEY (`abs_id`) USING BTREE,
	INDEX `stud_id` (`stud_id`) USING BTREE,
	CONSTRAINT `b_absences_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `absences_db`.`a_students` (`stud_id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3";

$pwd = md5('madrasa');
$insAdminQry = "INSERT INTO admins VALUES('admin','$pwd')";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (
	mysqli_query($conn, $adminsQry) and
	mysqli_query($conn, $studentsQry) and
	mysqli_query($conn, $absencesQry) and
	mysqli_query($conn, $insAdminQry)
) {
	echo "Tables Created Successfully";
} else {
	echo "ERROR! can not create tables!";
}
