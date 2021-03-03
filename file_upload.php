<?php
include 'check.php';
//convert excel date format
function convertDate($dateValue)
{
    $unixDate = ($dateValue - 25569) * 86400;
    return gmdate("Y-m-d", $unixDate);
}

//import excel
$uploadfile = $_FILES['uploadfile']['tmp_name'];

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel = PHPExcel_IOFactory::load($uploadfile);
foreach ($objExcel->getWorksheetIterator() as $worksheet) {
    $highestrow = $worksheet->getHighestRow();

    for ($row = 2; $row <= $highestrow; $row++) {
        $stud_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
        $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $birthdate = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
        $birthdate = convertDate($birthdate);
        $level = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
        $year = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

        if ($stud_id != '') {
            //a_students table
            $insertqry = "INSERT INTO `a_students` VALUES ('$stud_id','$name', '$birthdate', '$level','$year')";

            if (mysqli_query($conn, $insertqry)) {
                echo
                    "<script>
                        alert('تم إضافة قائمة التلميذات بنجاح');
                        window.location.href= 'search.php';
                    </script>";
            } else {
                echo mysqli_error($conn);
                echo
                    "<script>
                        alert('حدثت مشكلة ! لم يتم إضافة قائمة التلميذات');
                        window.location.href= 'upload_form.php';
                    </script>";
            }
        }
    }
}
