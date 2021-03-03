<?php
include 'header.php';
include 'check.php';
// GET values from search.php
$stud_id = $_GET['stud_id'];
$name = $_GET['name'];
$birthdate = $_GET['birthdate'];
$level = $_GET['level'];
$year = $_GET['year'];
// show abs dates and number
$absQry = "SELECT date from b_absences WHERE stud_id = $stud_id AND date != 'null'";

$abs_result = mysqli_query($conn, $absQry);
$abs_nbr = mysqli_num_rows($abs_result);

// last abs date
$last_abs_qry = "SELECT max(date) as max_date from b_absences WHERE stud_id = '$stud_id'";
$last_abs_result = mysqli_query($conn, $absQry);
$abs_row = mysqli_fetch_row($last_abs_result);

?>
<script script type="text/javascript">
    function printExternal() {
        printWindow = window.open("print.php");
        printWindow.print();
        printWindow.close();
    }
</script>

<head>
    <link rel="stylesheet" type="text/css" media="print" href="print.css" />
</head>

<body>
    <div class="my_background_preview">

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card m-4 mt-5" style="max-width: 820px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/avatar.png" alt="avatar" width="160px" height="130px"><br>
                            <div class="m-3">
                                <span class="h5 my_title">عدد الغيابات:</span>
                                <strong class="my_font my_red"><?php echo $abs_nbr ?></strong>
                            </div>
                            <?php
                            // show button only when nbr_abs > 0
                            if ($abs_nbr != 0) {
                            ?>
                                <div class="mb-2">
                                    <a href="print.php?&name=<?php echo $name ?>&level=<?php echo $level ?>&last_abs=<?php echo $abs_row[0] ?>&abs_nbr=<?php echo $abs_nbr ?>" class="btn btn-danger m-3">
                                        عرض الاستدعاء
                                    </a>

                                </div>
                            <?php } ?>


                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title text-center my_title mb-5 mt-3">معلومات التلميذة</h4>

                                <div class="mb-3">
                                    <span class="h5">
                                        رقم التلميذة:
                                    </span>
                                    <strong class="my_font"><?php echo $stud_id ?></strong>
                                </div>

                                <div class="mb-3">
                                    <span class="h5">
                                        الإسم الكامل:
                                    </span>
                                    <strong class="my_font"><?php echo $name ?></strong>
                                </div>

                                <div class="mb-3">
                                    <span class="h5">
                                        تاريخ الميلاد:
                                    </span>
                                    <strong class="my_font"><?php echo $birthdate ?></strong>
                                </div>

                                <div class="mb-3">
                                    <span class="h5">
                                        المستوى:
                                    </span>
                                    <strong class="my_font"><?php echo $level ?></strong>
                                </div>

                                <div class="mb-3">
                                    <span class="h5">أيام الغيابات:</span>
                                    <?php
                                    if ($abs_nbr == 0)
                                        echo '
                                        <strong> لا يوجد </strong>';
                                    else
                                        while ($row = mysqli_fetch_array($abs_result)) {
                                    ?>
                                        <p class="text-center">
                                            <strong>
                                                <?php echo $row['date']; ?>
                                            </strong>
                                        </p>
                                    <?php  } ?>
                                </div>
                                <p class=" card-text"><small class="text-muted">تاريخ اليوم: <?php echo $date ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>