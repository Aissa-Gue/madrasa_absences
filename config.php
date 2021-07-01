<?php
//ignore php errors
error_reporting(E_ERROR | E_PARSE);

//**** Developement db ****//
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "absences_db";

//**** Production db ****//
//$servername = "remotemysql.com";
//$username = "JIp30eTyr1";
//$password = "O2DI83iL9t";
//$dbname = "JIp30eTyr1";

$con = mysqli_connect($servername, $username, $password);
$db_selected = mysqli_select_db($con, $dbname);

if (!$db_selected) {
    $createDb = "CREATE DATABASE $dbname";
    mysqli_query($con, $createDb);
    include 'create_empty_db.php';
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo 'Failed to connect to database' . mysqli_connect_error();
}

// current date
$date = date("Y-m-d");

//arabic lang chars
mysqli_set_charset($conn, 'utf8');

// Levels
$level = array('الأولى تحضيري', 'الأولى ابتدائي', 'الثانية ابتدائي', 'الثالثة ابتدائي', 'الرابعة ابتدائي', 'الخامسة ابتدائي', 'الأولى متوسط', 'الثانية متوسط', 'الثالثة متوسط', 'الرابعة متوسط');

//Months
$month = array('جانفي', 'فيفري', 'مارس', 'أفريل', 'ماي', 'جوان', 'جويلية', 'أوت', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر');
