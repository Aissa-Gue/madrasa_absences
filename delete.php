<?php
include 'check.php';
//initialize subscription
if (isset($_GET['stud_id'])) {
    $abs_id = $_GET['stud_id'];
    $name = $_GET['name'];

    $deleteQuery = "DELETE FROM b_absences WHERE abs_id = '$abs_id'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script> alert('تم حذف غياب التلميذة $name بنجاح') </script>";
        echo "<script> window.location.href= 'home.php'</script>";
    } else {
        echo "<script> alert('حدثت مشكلة: لم يتم حذف الغياب!!') </script>";
        echo "<script> window.location.href= 'home.php'</script>";
    }
}
