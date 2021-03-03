<?php
include 'check.php';
if ($_GET['stud_id']) {
    $stud_id = $_GET['stud_id'];
    $add_abs_query = "INSERT INTO b_absences VALUES('0', '$stud_id', CURRENT_DATE(), CURRENT_TIME())";
    $add_abs_result = mysqli_query($conn, $add_abs_query);

    // redirect to home page
    if ($add_abs_result != 0) {
        header("refresh:0; url=home.php");
    } else {
        echo '<br><br>
    <h3 align= "center" style="color:white; background:red;padding:15px"> حدثت مشكلة ! لم يتم إضافة الغياب </h3>';
        echo mysqli_error($conn);
        header("refresh:2; url=home.php");
    }
}
