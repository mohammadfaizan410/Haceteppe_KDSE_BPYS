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
    <title>e-BYRYS-KKDS</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">

    <style>
        .send-patient {
            align-self: center;
        }
    </style>

</head>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Ödem Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <img src="./ödem.png" style="width:67%; height:auto;border: 1px solid;border-color: #246174; box-shadow:1px 1px 1px 1px #246174; border-radius: 20px;">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID">
                        </div>
                        <div class="input-section d-flex" style="padding-top: 5%;">
                            <p class="usernamelabel">Değerlendirilen Alan:</p>
                            <input type="text" class="form-control" required name="assessed_area" id="diger" placeholder="Değerlendirilen Alanı Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ödemin Şiddeti:</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="Ödem Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ödem Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="1">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+1</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="2">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+2</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="3">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+3</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="4">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+4</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {
            $('#closeBtn').click(function(e) {
                window.location.href = "javascript:history.go(-1)";

            })
        });
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault()

                var valid = this.form.checkValidity();

                if (valid) {
                    var id = <?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 8;
                     let patient_name = "<?php
            echo urldecode($_GET['patient_name']);
                  ?>";
                    var patient_id = <?php
                  $userid = $_GET['patient_id'];
                  echo $userid
                  ?>;
                    let yourDate = new Date()
                    let creationDate = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let assessed_area = $("input[name='assessed_area']").val();
                    let edema_severity = $("input[type='radio'][name='ÖdemŞiddeti']:checked").val();


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/submitOrUpdateForm8.php',
                        data: {
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            form_num:form_num,
                            patient_id:patient_id,
                            patient_name:patient_name,
                            creation_date:creationDate,
                            update_date :updateDate,
                            assessed_area: assessed_area,
                            edema_severity:edema_severity
                        },
                        success: function(data) {
                            console.log(data);
                            alert("Success");
                            window.location.href = "javascript:history.go(-1)";

                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })



                }
            })

        });
    </script>
    <script src=""></script>
</body>

</html>