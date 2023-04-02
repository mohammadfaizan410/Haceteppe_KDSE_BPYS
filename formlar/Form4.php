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

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Hasta Adı : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Hasta Adını Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Cinsiyet : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Hasta Cinsiyetini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaş : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Hasta Yaşını Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Tıbbi Tanı : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Tıbbi Tanıyı Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşülen Yer : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Düşülen Yeri Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Tarihi : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Düşme Tarihini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Saati : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Düşme Saatini Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Son Düşme Risk Skoru : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Risk Skorunu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaralanma Durumu : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Yaralanma Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yaralanma Şiddeti : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Yaralanma Şiddeti Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Nedeni : </p>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="option1">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Bireysel</span>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="option1">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Kurumsal</span>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni" value="option1">
                                <label class="form-check-label" for="DüşmeNedeni">
                                    <span class="checkbox-header">Tanı ve Tedavi Prosedürleri</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Öncesi Alınan Önlemler : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Alınan Önlemleri Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Öncesi Genel Durumu : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Genel Durumu Giriniz">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Düşme Sonrası Genel Durumu : </p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Genel Durumu Giriniz">
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


                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: 'student-patient.php',
                        data: {
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not

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
    <script src=""></script>
</body>

</html>