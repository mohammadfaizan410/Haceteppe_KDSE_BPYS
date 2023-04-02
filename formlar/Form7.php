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
            <h1 class="form-header">Basınç Yarası</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Değerlendirme Kriterleri</p>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Oluşma Tarihi:</p>
                            <input type="date" class="form-control" required name="oluşmatarihi" id="oluşmatarihi" placeholder="OluşmaTarihi">
                        </div>

                        <div class="input-section d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="servis" id="servis" value="option1">
                                <label class="form-check-label" for="servis">
                                    <span class="checkbox-header">Yara serviste oluşmadı</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yeri:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Yara Yerini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Evresi:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Yara Evresini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Boyut (cm):</p>
                            <div class="form-check">
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Uzunluk:</p>
                                    <input type="text" class="form-control" required name="diger" id="diger" placeholder="Uzunluk Giriniz">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Genişlik:</p>
                                    <input type="text" class="form-control" required name="diger" id="diger" placeholder="Genişlik Giriniz">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Derinlik:</p>
                                    <input type="text" class="form-control" required name="diger" id="diger" placeholder="Derinlik Giriniz">
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara eksudası:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Yara Eksudasını Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara görünümü:</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Nekrotik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Sarı Nekroz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Siyah Eskar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Kırmızı</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Mor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Granülasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Epitelizasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="option1">
                                    <div class="input-section d-flex">
                                        <p class="usernamelabel">Diğer:</p>
                                        <input type="text" class="form-control" required name="diger" id="diger" placeholder="Diğer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada koku :</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Koku Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada tünelleşme:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Tünelleşme Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada ödem:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Ödem Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında maserasyon:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Maserasyon Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında eritem:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Eritem Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı soyulmuş:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Sotulma Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı kuru:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Kuruluk Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara bölgesinde ağrı:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Ağrı Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kullanılan Bakım Ürünleri:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Kullanılan Ürünleri Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sonuç:</p>
                            <input type="text" class="form-control" required name="diger" id="diger" placeholder="Sonucu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">İyileşme Tarihi:</p>
                            <input type="date" class="form-control" required name="oluşmatarihi" id="oluşmatarihi" placeholder="İyileşmeTarihi">
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