<?php
include 'header.php';
//show a_students
$showQuery = "SELECT * FROM a_students, b_absences WHERE a_students.stud_id = b_absences.stud_id AND b_absences.date != 'null' ORDER BY `date` DESC, `time` DESC";
$showResult = mysqli_query($conn, $showQuery);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <!-- body table -->
    <div class="container-fluid my_background_home">
        <!-- Alert -->
        <div class="alert alert-warning text-center mt-3" role="alert">
            <h5><strong>قائمة أحدث الغيابات</strong></h5>
        </div>
        <!-- END Alert -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">رقم التلميذة</th>
                    <th scope="col">الإسم الكامل</th>
                    <th scope="col" class="text-center">تاريخ الميلاد</th>
                    <th scope="col" class="text-center">المستوى</th>
                    <th scope="col" class="text-center"> تاريخ الغياب</th>
                    <th scope="col" class="text-center">عرض المعلومات</th>
                    <th scope="col" class="text-center"> حذف الغياب</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($showResult)) {
                ?>
                    <tr>
                        <th scope="row" class="text-center"><?php echo $row['stud_id'] ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td class="text-center"><?php echo $row['birthdate'] ?></td>
                        <td class="text-center"><?php echo $row['level'] ?></td>
                        <td class="text-center"><?php echo $row['date'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger" href="preview.php?stud_id=<?php echo $row['stud_id'] ?>&name=<?php echo $row['name'] ?>&birthdate=<?php echo $row['birthdate'] ?>&level=<?php echo $row['level'] ?>&year=<?php echo $row['year'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg> </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger" href="delete.php?stud_id=<?php echo $row['abs_id'] ?>&name=<?php echo $row['name'] ?>" onclick="return confirm('هل أنت متأكد؟')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

    <!-- END body table -->
</body>