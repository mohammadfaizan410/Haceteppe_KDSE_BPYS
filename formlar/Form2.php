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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
            <h1 class="form-header">Ağrı Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name">
                        </div>
                <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID">
                        </div>


                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <img src="./ağrı skalası.png" style="width:67%; height:auto;border: 1px solid;border-color: #246174; box-shadow:1px 1px 1px 1px #246174; border-radius: 20px;">
                        <div class="input-section d-flex" style="padding-top: 5%;">
                            <p class="usernamelabel">Ağrının Şiddeti:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="0. Yok">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">0. Yok</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="1-2. Çok Az">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">1-2. Çok Az</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="3-4. Biraz Fazl">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">3-4. Biraz Fazla</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="5-6. Çok">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">5-6. Çok</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="7-8. Fazla">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">7-8. Fazla</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti" value="option1">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">9-10. Dayanılmaz</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Süresi:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSuresi" id="AgriSuresi" value="option1">
                                <label class="form-check-label" for="AgriSuresi">
                                    <span class="checkbox-header">6 Aydan Az</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSuresi" id="AgriSuresi" value="option2">
                                <label class="form-check-label" for="AgriSuresi">
                                    <span class="checkbox-header">6 Aydan Fazla</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Yeri:</p>
                            <input type="text" class="form-control" required name="pain_location" id="diger" placeholder="Ağrının Yerini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Karakteri:</p>
                            <input type="text" class="form-control" required name="pain_character" id="diger" placeholder="Ağrının Karakterini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Sıklığı:</p>
                            <input type="text" class="form-control" required name="pain_frequency" id="diger" placeholder="Ağrının Sıklığını Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrıyı Arttıran Durumlar:</p>
                            <input type="text" class="form-control" required name="pain_increase_factors" id="diger" placeholder="Ağrıyı Arttıran Durumları Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrıyı Azaltan Durumlar:</p>
                            <input type="text" class="form-control" required name="pain_decrease_factors 1-2" id="diger" placeholder="Ağrıyı Azaltan Durumları Giriniz">
                        </div>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                </div>

            </div>
            </form>
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
                    let name = $('#name').val();
                    let surname = $('#surname').val();
                    let age = $('#age').val();
                    let not = $('#not').val();
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let yourDate = new Date()
                    let creation_date =  yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let fileNo = 2;
                    let painIntensity = $("input[type='radio'][name='AgriSiddeti']:checked").val();
                    let painDuration = $("input[type='radio'][name='AgriSuresi']:checked").val()==="option1" ? "Less than 6 months" : "More than 6 months";
                    let pain_location = $('input[name="pain_location"]').val();
                    let pain_character = $('input[name="pain_character"]').val();
                    let pain_frequency  = $('input[name="pain_frequency"]').val();
                    let pain_increase_factors =$('input[name="pain_increase_factors"]').val();
                    let pain_decrease_factors =$('input[name="pain_decrease_factors"]').val();
                    console.log(pain_decrease_factors)


                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: 'http://18.159.134.238/Hacettepe-KDSE-BPYS/submitOrUpdateForm2.php/',
                        data: {
                           patient_name :patient_name,
                           patient_id: patient_id,
                           form_num :fileNo,
                           creation_date:creation_date,
                           update_date :updateDate,
                           pain_intensity :painIntensity,
                           pain_duration :painDuration,
                           pain_location:pain_location,
                           pain_frequency: pain_frequency,
                           pain_character :pain_character,
                           pain_increase_factors:pain_increase_factors,
                           pain_decrease_factors:pain_decrease_factors
                        },
                        success: function(data) {
                            alert(data);
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