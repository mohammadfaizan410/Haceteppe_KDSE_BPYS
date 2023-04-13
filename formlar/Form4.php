<?php
session_start();
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

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
            <h1 class="form-header">Düşme Bildirimi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                    <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Cinsiyet : </p>
                            <input type="text" class="form-control" required name="patient_gender" id="diger" placeholder="Hasta Cinsiyetini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaş : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Hasta Yaşını Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Tıbbi Tanı : </p>
                            <input type="text" class="form-control" required name="medical_diagnosis" id="diger" placeholder="Tıbbi Tanıyı Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşülen Yer : </p>
                            <input type="text" class="form-control" required name="place_of_fall" id="diger" placeholder="Düşülen Yeri Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Tarihi : </p>
                            <input type="date" class="form-control" required name="fall_date" id="diger" placeholder="Düşme Tarihini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Saati : </p>
                            <input type="time" class="form-control" required name="fall_time" id="diger" placeholder="Düşme Saatini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Son Düşme Risk Skoru : </p>
                            <input type="text" class="form-control" required name="last_fall_risk_score" id="diger" placeholder="Risk Skorunu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaralanma Durumu : </p>
                            <input type="text" class="form-control" required name="injury_status" id="diger" placeholder="Yaralanma Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaralanma Şiddeti : </p>
                            <input type="text" class="form-control" required name="injury_severity" id="diger" placeholder="Yaralanma Şiddeti Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Nedeni : </p>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="Bireysel">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Bireysel</span>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="Kurumsal">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Kurumsal</span>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="Tanı ve Tedavi Prosedürleri">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Tanı ve Tedavi Prosedürleri</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Öncesi Alınan Önlemler : </p>
                            <input type="text" class="form-control" required name="pre_fall_precautions" id="diger" placeholder="Alınan Önlemleri Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Öncesi Genel Durumu : </p>
                            <input type="text" class="form-control" required name="pre_fall_general_condition" id="diger" placeholder="Genel Durumu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Sonrası Genel Durumu : </p>
                            <input type="text" class="form-control" required name="post_fall_general_condition" id="diger" placeholder="Genel Durumu Giriniz">
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
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 4;
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let patient_gender = $("input[name='patient_gender']").val();
                    let yourDate = new Date()
                    let creation_date =  yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let medical_diagnosis = $("input[name='medical_diagnosis']").val();
                    let place_of_fall = $("input[name='place_of_fall']").val();
                    let fall_date  = $("input[name='fall_date']").val();
                    let fall_time   = $("input[name='fall_time']").val();
                    let last_fall_risk_score   = $("input[name='last_fall_risk_score']").val();
                    let injury_status = $("input[name='injury_status']").val();
                    let injury_severity = $("input[name='injury_severity']").val();
                    let fall_cause  = $("input[type='radio'][name='DüşmeNedeni']:checked").val();
                    let pre_fall_precautions = $("input[name='pre_fall_precautions']").val();
                    let pre_fall_general_condition  = $("input[name='pre_fall_general_condition']").val();
                    let post_fall_general_condition   = $("input[name='post_fall_general_condition']").val();

                    



                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/Hacettepe-KDSE-BPYS/submitOrUpdateForm4.php/',
                        data: {
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            patient_name: patient_name,
                            patient_id: patient_id,
                            patient_gender: patient_gender,
                            update_date: updateDate,
                            creation_date: creation_date,
                            medical_diagnosis: medical_diagnosis,
                            place_of_fall: place_of_fall,
                            fall_date: fall_date,
                            fall_time: fall_time,
                            last_fall_risk_score: last_fall_risk_score,
                            injury_status: injury_status,
                            injury_severity: injury_severity,
                            fall_cause: fall_cause,
                            pre_fall_precautions: pre_fall_precautions,
                            pre_fall_general_condition: pre_fall_general_condition,
                            post_fall_general_condition: post_fall_general_condition

                        },
                        success: function(data) {
                            console.log(data)
                            alert("Success");
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
    <script src=""></script>
</body>

</html>