<?php
include 'header.php';
// input values
if (!isset($_POST['search'])) {
    $id_name = '';
    $level = '';
    $order = '';
} else {
    $id_name = $_POST['id_name_input'];
    $level = $_POST['level_input'];
    $order =  $_POST['order_by_name'];
}
// Search query
$searchQuery = "SELECT a_students.stud_id,
name, birthdate, level, max(date) as date,
count( b_absences.stud_id) as abs_count, year 
FROM a_students
LEFT JOIN b_absences ON a_students.stud_id=b_absences.stud_id WHERE (a_students.stud_id = '$id_name' OR a_students.name LIKE '%$id_name%') AND a_students.level LIKE '%$level%'
GROUP BY a_students.stud_id $order";


$searchResult = mysqli_query($conn, $searchQuery);
// search num rows
$search_num_rows = mysqli_num_rows($searchResult);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <div class="my_background_search">
        <!-- search new -->
        <div class="row container-fluid justify-content-sm-center">
            <div class="col-sm-8">
                <form action="search.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3 mt-4">
                        <span class="input-group-text">ترتيب حسب</span>
                        <select class="col-sm-2" name="order_by_name">
                            <option value=""> الرقم</option>
                            <option value="ORDER BY `a_students`.`name` ASC" selected> الإسم</option>
                        </select>
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" placeholder="أدخل رقم أو اسم التلميذة" name="id_name_input" aria-label="Server">
                        <span class="input-group-text">المستوى:</span>
                        <input type="text" class="form-control" placeholder="أدخل مستوى" name="level_input">
                        <input class="btn btn-primary" type="submit" name="search" id="button-addon1" value="بحث">
                    </div>
                </form>
            </div>
        </div>
        <!-- END serch new -->
        <div class="container-fluid">
            <!-- Alert -->
            <div class="alert alert-warning text-center" role="alert">
                <strong> عدد النتائج = </strong>
                <?php echo $search_num_rows ?>
            </div>
            <!-- END Alert -->
            <!-- body table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">رقم التلميذة</th>
                        <th scope="col">الإسم الكامل</th>
                        <th scope="col" class="text-center">تاريخ الميلاد</th>
                        <th scope="col" class="text-center">المستوى</th>
                        <th scope="col" class="text-center">تاريخ آخر غياب</th>
                        <th scope="col" class="text-center">عدد الغيابات</th>
                        <th scope="col" class="text-center">السنة الدراسية</th>
                        <th scope="col" class="text-center">عرض المعلومات</th>
                        <th scope="col" class="text-center">تسجيل الغياب</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($searchResult)) {
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?php echo $row['stud_id'] ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td class="text-center"><?php echo $row['birthdate'] ?></td>
                            <td class="text-center"><?php echo $row['level'] ?></td>
                            <?php
                            if ($row['date'] == '') {
                                echo '<td class="text-center">- - - -</td>';
                            } else {
                            ?>
                                <td class="text-center"><?php echo $row['date'] ?></td>
                            <?php } ?>
                            <td class="text-center"><?php echo $row['abs_count'] ?></td>
                            <td class="text-center"><?php echo $row['year'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-danger" href="preview.php?stud_id=<?php echo $row['stud_id'] ?>&name=<?php echo $row['name'] ?>&birthdate=<?php echo $row['birthdate'] ?>&level=<?php echo $row['level'] ?>&year=<?php echo $row['year'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-outline-danger" href="add_abs.php?stud_id=<?php echo $row['stud_id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    if ($search_num_rows == 0)
                        echo "<td></td><td></td><td></td><td></td>
                    <td class='text-center'>لا توجد نتائج</td>
                    <td></td><td></td><td></td><td></td>";
                    ?>
                </tbody>
            </table>

            <!-- END body table -->
        </div>
    </div>
</body>