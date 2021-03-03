<?php
include 'header.php';
include 'check.php';
// GET values from preview.php
$name = $_GET['name'];
$level = $_GET['level'];
$last_abs = $_GET['last_abs'];
$abs_nbr = $_GET['abs_nbr'];

//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
<style>
    .my_background_print {
        font-family: 'Amiri', serif;
        font-size: 16px;
    }
</style>

<body>
    <div class="my_background_print">
        <div class="container my_border my_zoom_out my_mt">
            <div class="row">
                <div class="col-sm-auto">
                    <img src="img/logo.JPG" alt="logo" width="100px">
                </div>

                <div class="col-sm-auto text-center establishment pt-3">
                    <h3 class="my_est_font1">ابتدائية / متوسطة عمي سعيد -بنات- الرحبة</h3><br>
                    <h4 class="my_est_font2">إشعار بالغياب</h4>
                </div>

            </div><br>

            <div>
                <p>
                    <span>إلى ولي التلميذة: </span>
                    <strong><?php echo $name ?></strong>
                </p>
            </div>
            <div class="row">
                <div class="col-sm-auto">
                    <p>
                        <span>من السنة: </span>
                        <strong><?php echo $level ?></strong>
                    </p>
                </div>

                <div class="col-sm-auto">
                    <p>
                        <span>عدد الغيابات: </span>
                        <strong><?php echo $abs_nbr ?></strong>
                    </p>
                </div>
            </div>
            <div>
                <p>يؤسفنا إبلاغكم أن ابنتكم قد تغيبت عن الدراسة يوم:
                    <strong><?php echo $last_abs ?></strong>
                </p>

                <p>وعليه المطلوب منكم موافاتنا بسبب غيابها وتبرير ذلك بالرد كتابة أدناه أو بالحضور إلى المدرسة.</p>
                <p>غرداية يوم: <strong><?php echo $date ?></strong></p>
                <div class="my_mr_70">
                    <p class=""><strong>الإدارة: </strong></p><br>
                </div>
            </div>
            <section class="my_hidden1">
                <p class="text-center">---------------------------------------------------------------------------</p>
                <div class="text-center">
                    <h5 class="font-weight-bold text-underline">رد ولي الطالبة:</h5>
                    <div class="my_text_w">
                        <p>...................................................................................................................................</p>
                        <p>...................................................................................................................................</p>
                        <p>...................................................................................................................................</p>
                        <p>...................................................................................................................................</p>
                    </div>
                </div>
                <div>
                    <p>لقب واسم وإمضاء الولي:</p>
                    <p class="my_text_w text-end">
                        ..........................................................................</p>
                </div>
            </section>
            <div class="text-end my_position_fixed my_hidden" id="myReport" onclick="doPrint();return false;" ;>
                <a href="" class="btn btn-outline-danger my_radious">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    </svg>
                    <h5>طباعة</h5>
                </a>
            </div>
        </div>
        <script>
            function doPrint() {
                window.print();
                //window.history.back();
            }
        </script>
    </div>
</body>