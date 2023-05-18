<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: main.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">KATETER / DREN</h1>


            <div>

                <div class="d-flex justify-content-around p-4">
                    <p class="usernamelabel">Kateter / Dren</p>
                    <p class="usernamelabel">Yeri</p>
                    <p class="usernamelabel">Sayısı</p>
                    <p class="usernamelabel">Takılma Tarihi</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">

                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="venöz_kateter" id="venöz_kateter" value="Periferik venöz kateter ">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Periferik venöz kateter </span>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control w-25" name="PYeri" id="PYeri">
                        <input type="text" class="form-control w-25" name="PSayısı" id="PSayısı">
                        <input type="text" class="form-control w-25" name="PTakılmaTarihi" id="PTakılmaTarihi">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">

                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="venöz_kateter" id="venöz_kateter" value="Santral venöz kateter">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Santral venöz kateter </span>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control w-25" name="SYeri" id="SYeri">
                        <input type="text" class="form-control w-25" name="SSayısı" id="SSayısı">
                        <input type="text" class="form-control w-25" name="STakılmaTarihi" id="STakılmaTarihi">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">

                        <div class="checkboxes w-25">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="venöz_kateter" id="venöz_kateter" value="option1">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Dren </span>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control w-25" name="DYeri" id="DYeri">
                        <input type="text" class="form-control w-25" name="DSayısı" id="DSayısı">
                        <input type="text" class="form-control w-25" name="DTakılmaTarihi" id="DTakılmaTarihi">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">

                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="venöz_kateter" id="venöz_kateter" value="Diğer">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                            </div>
                        </div>
                        <input type="text" class="form-control w-25" name="DiğerYeri" id="DiğerYeri">
                        <input type="text" class="form-control w-25" name="DiğerSayısı" id="DiğerSayısı">
                        <input type="text" class="form-control w-25" name="DiğerTakılmaTarihi" id="DiğerTakılmaTarihi">
                    </div>
                </div>
            </div>

            <script>
                $(function() {
                    $('#closeBtn').click(function(e) {
                        $("#content").load("formlar-student.php");

                    })
                });
            </script>

            <script>
                $(function() {
                    $('#submit').click(function(e) {


                        var valid = this.form.checkValidity();

                        if (valid) {
                            var id = <?php

                                        $userid = $_SESSION['userlogin']['id'];
                                        echo $userid
                                        ?>;
                            let venöz_kateter = $("input[name='venöz_kateter']:checked").val();
                            let PYeri = $("input[type='radio'][name='PYeri']").val();
                            let PSayısı = $("input[type='radio'][name='PSayısı']").val();
                            let PTakılmaTarihi = $("input[type='radio'][name='PTakılmaTarihi']").val();
                            let SYeri = $("input[type='radio'][name='SYeri']").val();
                            let SSayısı = $("input[type='radio'][name='SSayısı']").val();
                            let STakılmaTarihi = $("input[type='radio'][name='STakılmaTarihi']").val();
                            let DYeri = $("input[type='radio'][name='DYeri']").val();
                            let DSayısı = $("input[type='radio'][name='DSayısı']").val();
                            let DTakılmaTarihi = $("input[type='radio'][name='DTakılmaTarihi']").val();
                            let DigerYeri = $("input[type='radio'][name='DigerYeri']").val();
                            let DigerSayısı = $("input[type='radio'][name='DigerSayısı']").val();
                            let DigerTakılmaTarihi = $("input[type='radio'][name='DigerTakılmaTarihi']").val();



                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: 'student-patient.php',
                                data: {
                                    venöz_kateter: venöz_kateter,
                                    PYeri: PYeri,
                                    PSayısı: PSayısı,
                                    PTakılmaTarihi: PTakılmaTarihi,
                                    SYeri: SYeri,
                                    SSayısı: SSayısı,
                                    STakılmaTarihi: STakılmaTarihi,
                                    DYeri: DYeri,
                                    DSayısı: DSayısı,
                                    DTakılmaTarihi: DTakılmaTarihi,
                                    DigerYeri: DigerYeri,
                                    DigerSayısı: DigerSayısı,
                                    DigerTakılmaTarihi: DigerTakılmaTarihi

                                },
                                success: function(data) {
                                    alert("Success");
                                    location.reload(true)
                                },
                                error: function(data) {
                                    Swal.fire({
                                        'title': 'Errors',
                                        'text': 'There were errors',
                                        'type': 'error'
                                    })
                                }
                            })



                        }
                    })

                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>