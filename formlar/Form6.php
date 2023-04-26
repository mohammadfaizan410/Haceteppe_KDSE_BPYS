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
            <h1 class="form-header">Braden Bası Yarası Risk Değerlendirme Aracı (> 5 Yaş)</h1>
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


                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörleri (Uyaranın algılanması, basınca karşı oluşan rahatsızlığın algılanması)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Tamamen yetersiz (Ağrılı uyaranlara yanıt vermiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="1">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok yetersiz (Yalnız ağrılı uyaranlara yanıt veriyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="2">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Biraz yeterli (Sözlü uyaranlara yanıt veriyor, sürekli iletişim kuramıyor, yatak içerisinde çevrilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="3">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Tamamen yeterli (Sözlü uyaranlara yanıt veriyor. Duyu kusuru yok):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="4">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Nemlilik (Vücudun nemliliği)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sürekli ıslak (deri, ter, idrar, gaita ile sürekli ıslak):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="1">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok ıslak (Deri çoğu zaman ıslak, her şiftte çarşafların en az bir kez değiştirilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="2">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Bazen ıslak (Deri bazen ıslak, Çarşafların ıslandıkça değiştirilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="3">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Nadiren ıslak (Deri genellikle kuru, Çarşafların rutin değişimini gerektirmekte):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="4">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Aktivite (Fiziksel aktivitenin derecesi)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Yatağa bağımlı (Her türlü bakım gereksinimi yatakta karşılanıyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="1">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sandalyeye bağımlı <br>(Çok az yürüyebiliyor, sandalyeye oturabilmesi için yardım gerekiyor, kendi ağırlığını kaldırmakta güçlük çekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="2">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Bazen yürüyebiliyor <br>(Yardımla veya yardımsız kısa mesafede yürüyebiliyor, çoğu zaman yatakta veya sandalyede oturuyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="3">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sık sık yürüyebiliyor (Günde en az iki defa oda dışına çıkabiliyor, oda içinde 2 saatte bir yürüyebiliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="4">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Hareket (Pozisyonunu değiştirme ve kontrol edebilme)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Tamamen hareketsiz (Yardımsız pozisyon değiştirebiliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hareket" id="hareket" value="1">
                                <label class="form-check-label" for="hareket">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok hareketsiz <br>(Vücut ve ekstremite pozisyonunda hafif değişiklik yapabiliyor, kendiliğinden pozisyonunu değiştiremiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hareket" id="hareket" value="2">
                                <label class="form-check-label" for="hareket">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Az hareketli (Vücut ve ekstremitelerinde sık ancak hafif değişiklik yapabiliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hareket" id="hareket" value="3">
                                <label class="form-check-label" for="hareket">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Hareketli (Pozisyonunu yardımsız sıklıkla değiştirebiliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hareket" id="hareket" value="4">
                                <label class="form-check-label" for="hareket">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Beslenme (Beslenme Alışkanlığı)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok yetersiz (Asla öğünün tamamını yiyemiyor. Nadiren verilen yemeğin 1/3’ünü yiyebiliyor.
                                <br>İki öğün ya da daha az protein alabiliyor (Et ve süt ürünleri). Sıvı alımı az.
                                <br>Ağızdan sıvı desteği alamıyor. 5 günden fazla süredir IV ve berrak diyet alıyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="beslenme" id="beslenme" value="1">
                                <label class="form-check-label" for="beslenme">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Yetersiz (Verilen yemeğin yarısını, nadiren tamamını yiyebiliyor.
                                <br>Günde 3 defa protein, bazen destekleyici ek gıda alabiliyor.
                                <br>Uygun diyetin veya tüp ile verilen besinin birazını alabiliyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="beslenme" id="beslenme" value="2">
                                <label class="form-check-label" for="beslenme">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Yeterli (Verilen yemeğin yarısından fazlasını yiyebiliyor. Günde 4 kez protein alabiliyor.
                                <br>Ara sıra yemeği reddediyor. Verilmişse ek diyeti yada TPN’İ alabiliyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="beslenme" id="beslenme" value="3">
                                <label class="form-check-label" for="beslenme">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok iyi (Yemeğini çoğunlukla yiyor. Öğünleri reddetmiyor. Günde 4 defa protein alabiliyor.
                                <br>Genellikle öğün aralarında yiyor. Ek gıda gerekmiyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="beslenme" id="beslenme" value="4">
                                <label class="form-check-label" for="beslenme">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörleri(Uyaranın algılanması, basınca karşı oluşan rahatsızlığın algılanması)</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sorun
                                <br>(Hareket ederken çok fazla yardıma gereksinimi var. Çarşafta kaydırmaksızın tamamen kaldırılması olanaksız):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SurtunmeTahris" id="SurtunmeTahris" value="1">
                                <label class="form-check-label" for="SurtunmeTahris">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Olası sorun
                                <br>(Çok az yardımla az ve güçsüz hareket edebiliyor. Hareket sırasında deri; çarşafa, sandalyeye sürtünüyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SurtunmeTahris" id="SurtunmeTahris" value="2">
                                <label class="form-check-label" for="SurtunmeTahris">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sorun yok (Yatakta ve sandalyede bağımsız hareket edebiliyor. Kendini kaldırabilmek için yeterli kas gücü var):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SurtunmeTahris" id="SurtunmeTahris" value="3">
                                <label class="form-check-label" for="SurtunmeTahris">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel" style="font-weight: bold;">Toplam:</p>
                            <div class="form-check">
                                <output></output>
                            </div>
                        </div>

                        <p>*Yüksek risk: Toplam puan ≤ 12
                            <br>Orta risk: Toplam puan 13-14
                            <br>Düşük Risk: Toplam puan 15-16; 75 yaş üzeri için 15-18
                        </p>

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
                e.preventDefault()

                console.log("hello from form 6x")
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
                    let form_num = 6;
                    let yourDate = new Date()
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let creation_date =  yourDate.toISOString().split('T')[0];
                    let update_date = yourDate.toISOString().split('T')[0];
                    let sensory_perception = parseInt($("input[type='radio'][name='RiskFaktörleri']:checked").val());
                    let moisture = parseInt($("input[type='radio'][name='nemlilik']:checked").val());
                    let activity = parseInt($("input[type='radio'][name='aktivite']:checked").val());
                    let mobility = parseInt($("input[type='radio'][name='hareket']:checked").val());
                    let nutrition = parseInt($("input[type='radio'][name='beslenme']:checked").val());
                    let discomfort = parseInt($("input[type='radio'][name='SurtunmeTahris']:checked").val());
                    let total =sensory_perception +mobility +activity+ moisture + nutrition+ discomfort;
                    let risk;
                    if(total <= 12) risk = "no-risk"; 
                    else if ( total <= 14) risk = "medium"; 
                    else  risk = "high-risk"; 


                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/Hacettepe-KDSE-BPYS/submitOrUpdateForm6.php/',
                        data: {
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            form_num :form_num,
                            patient_name:patient_name,
                            patient_id:patient_id,
                            creation_date:creation_date,
                            update_date:update_date,
                            sensory_perception:sensory_perception,
                            moisture:moisture,
                            activity:activity,
                            mobility:mobility,
                            nutrition:nutrition,
                            discomfort:discomfort,
                            total:total,
                            risk :risk
                            

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