<?php
include 'header.php';
if (isset($_POST['report'])) {
    $reportLevel = $_POST['reportLevel'];
    $reportMonth = $_POST['month'];
}
// report query
$reporthQuery = "SELECT a_students.stud_id,
name, birthdate, level,
count(b_absences.stud_id) as abs_count, year 
FROM a_students
LEFT JOIN b_absences ON a_students.stud_id=b_absences.stud_id WHERE (a_students.level LIKE '%$reportLevel%' $reportMonth)
GROUP BY a_students.stud_id HAVING abs_count != 0";



$reportResult = mysqli_query($conn, $reporthQuery);
// search num rows
$report_num_rows = mysqli_num_rows($reportResult);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>

<body>
    <div class="my_background_search pt-1">

        <!-- Alert -->
        <div class="alert alert-warning text-center mt-3" role="alert">
            <div class="row">
                <div class="col-sm">
                    <h5><strong>تقرير الغيابات</strong></h5>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-sm">
                    <strong> عدد الغائبات = </strong>
                    <?php echo $report_num_rows ?>
                </div>
            </div>
        </div>
        <!-- END Alert -->

        <div class="row container-fluid justify-content-sm-center">
            <div class="col-sm-9">
                <form action="report.php" method="post">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="level">المستوى الدراسي</label>
                        <select class="form-select" name="reportLevel" id="level">
                            <option value="" selected>-- اختر مستوى --</option>
                            <option value="<?php echo $level[0] ?>">
                                <?php echo $level[0] ?>
                            </option>

                            <option value="<?php echo $level[1] ?>">
                                <?php echo $level[1] ?>
                            </option>

                            <option value="<?php echo $level[2] ?>">
                                <?php echo $level[2] ?>
                            </option>

                            <option value="<?php echo $level[3] ?>">
                                <?php echo $level[3] ?>
                            </option>

                            <option value="<?php echo $level[4] ?>">
                                <?php echo $level[4] ?>
                            </option>

                            <option value="<?php echo $level[5] ?>">
                                <?php echo $level[5] ?>
                            </option>

                            <option value="<?php echo $level[6] ?>">
                                <?php echo $level[6] ?>
                            </option>

                            <option value="<?php echo $level[7] ?>">
                                <?php echo $level[7] ?>
                            </option>

                            <option value="<?php echo $level[8] ?>">
                                <?php echo $level[8] ?>
                            </option>

                            <option value="<?php echo $level[9] ?>">
                                <?php echo $level[9] ?>
                            </option>
                        </select>

                        <label class="input-group-text" for="month">الشهر </label>
                        <select class="form-select" name="month" id="month">
                            <option value="" selected>-- كل الأشهر --</option>

                            <option value="AND MONTH(b_absences.date) = '1'">
                                <?php echo $month[0] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '2'">
                                <?php echo $month[1] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '3'">
                                <?php echo $month[2] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '4'">
                                <?php echo $month[3] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '5'">
                                <?php echo $month[4] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '6'">
                                <?php echo $month[5] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '7'">
                                <?php echo $month[6] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '8'">
                                <?php echo $month[7] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '9'">
                                <?php echo $month[8] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '10'">
                                <?php echo $month[9] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '11'">
                                <?php echo $month[10] ?>
                            </option>

                            <option value="AND MONTH(b_absences.date) = '12'">
                                <?php echo $month[11] ?>
                            </option>

                        </select>
                        <input class="btn btn-primary" type="submit" name="report" value='تقرير'>
                    </div>
                </form>
            </div>
        </div>

        <!-- body table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">رقم التلميذة</th>
                    <th scope="col">الإسم الكامل</th>
                    <th scope="col" class="text-center">تاريخ الميلاد</th>
                    <th scope="col" class="text-center">المستوى</th>
                    <th scope="col" class="text-center">عدد الغيابات</th>
                    <th scope="col" class="text-center">السنة الدراسية</th>
                    <th scope="col" class="text-center">عرض المعلومات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($reportResult)) {
                ?>
                    <tr>
                        <th scope="row" class="text-center"><?php echo $row['stud_id'] ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td class="text-center"><?php echo $row['birthdate'] ?></td>
                        <td class="text-center"><?php echo $row['level'] ?></td>
                        <td class="text-center"><?php echo $row['abs_count'] ?></td>
                        <td class="text-center"><?php echo $row['year'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger" href="preview.php?stud_id=<?php echo $row['stud_id'] ?>&name=<?php echo $row['name'] ?>&birthdate=<?php echo $row['birthdate'] ?>&level=<?php echo $row['level'] ?>&year=<?php echo $row['year'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                if ($report_num_rows == 0) {
                    echo "<td></td><td></td><td></td>
                    <td class='text-center'>لا توجد نتائج</td>
                    <td></td><td></td><td></td>";
                }
                ?>
            </tbody>
        </table>

        <!-- END body table -->

    </div>
</body>

</html>