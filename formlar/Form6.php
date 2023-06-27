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


    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">


    <style>
        .send-patient {
            align-self: center;
        }
        body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

#tick-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: none; /* Hide the tick container initially */
  align-items: center;
  justify-content: center;
  z-index: 9999;
  background-color: #ffffff;
}

#tick {
  width: 50%;
  height: 50%;
  background-size: contain;
  background-repeat: no-repeat;
  position: absolute;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) translateX(25%);
}
    </style>

</head>

<body>
    
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Braden Bası Yarası Risk Değerlendirme Aracı (> 5 Yaş)</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">


                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörleri (Uyaranın algılanması,
                                basınca karşı oluşan rahatsızlığın algılanması)</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                            <p class="usernamelabel">Biraz yeterli (Sözlü uyaranlara yanıt veriyor, sürekli iletişim
                                kuramıyor, yatak içerisinde çevrilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="3">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Tamamen yeterli (Sözlü uyaranlara yanıt veriyor. Duyu kusuru yok):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="RiskFaktörleri" id="RiskFaktörleri" value="4">
                                <label class="form-check-label" for="RiskFaktörleri">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Nemlilik (Vücudun nemliliği)</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                            <p class="usernamelabel">Çok ıslak (Deri çoğu zaman ıslak, her şiftte çarşafların en az bir
                                kez değiştirilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="2">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Bazen ıslak (Deri bazen ıslak, Çarşafların ıslandıkça
                                değiştirilmesi gerekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="3">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Nadiren ıslak (Deri genellikle kuru, Çarşafların rutin değişimini
                                gerektirmekte):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nemlilik" id="nemlilik" value="4">
                                <label class="form-check-label" for="nemlilik">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Aktivite (Fiziksel aktivitenin derecesi)
                            </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Yatağa bağımlı (Her türlü bakım gereksinimi yatakta karşılanıyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="1">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sandalyeye bağımlı <br>(Çok az yürüyebiliyor, sandalyeye
                                oturabilmesi için yardım gerekiyor, kendi ağırlığını kaldırmakta güçlük çekiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="2">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Bazen yürüyebiliyor <br>(Yardımla veya yardımsız kısa mesafede
                                yürüyebiliyor, çoğu zaman yatakta veya sandalyede oturuyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="3">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sık sık yürüyebiliyor (Günde en az iki defa oda dışına çıkabiliyor,
                                oda içinde 2 saatte bir yürüyebiliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="aktivite" id="aktivite" value="4">
                                <label class="form-check-label" for="aktivite">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Hareket (Pozisyonunu değiştirme ve
                                kontrol edebilme)</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                            <p class="usernamelabel">Çok hareketsiz <br>(Vücut ve ekstremite pozisyonunda hafif
                                değişiklik yapabiliyor, kendiliğinden pozisyonunu değiştiremiyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hareket" id="hareket" value="2">
                                <label class="form-check-label" for="hareket">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Az hareketli (Vücut ve ekstremitelerinde sık ancak hafif değişiklik
                                yapabiliyor):</p>
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
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Çok yetersiz (Asla öğünün tamamını yiyemiyor. Nadiren verilen
                                yemeğin 1/3’ünü yiyebiliyor.
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
                            <p class="usernamelabel">Yeterli (Verilen yemeğin yarısından fazlasını yiyebiliyor. Günde 4
                                kez protein alabiliyor.
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
                            <p class="usernamelabel">Çok iyi (Yemeğini çoğunlukla yiyor. Öğünleri reddetmiyor. Günde 4
                                defa protein alabiliyor.
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
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörleri(Uyaranın algılanması,
                                basınca karşı oluşan rahatsızlığın algılanması)</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sorun
                                <br>(Hareket ederken çok fazla yardıma gereksinimi var. Çarşafta kaydırmaksızın tamamen
                                kaldırılması olanaksız):
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
                                <br>(Çok az yardımla az ve güçsüz hareket edebiliyor. Hareket sırasında deri; çarşafa,
                                sandalyeye sürtünüyor):
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SurtunmeTahris" id="SurtunmeTahris" value="2">
                                <label class="form-check-label" for="SurtunmeTahris">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between;">
                            <p class="usernamelabel">Sorun yok (Yatakta ve sandalyede bağımsız hareket edebiliyor.
                                Kendini kaldırabilmek için yeterli kas gücü var):</p>
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
            $('#closeBtn1').click(function(e) {
                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                    "&patient_name=" + encodeURIComponent(patient_name);
                $("#content").load(url);

            })
        });
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault()

                if (!$('[name="RiskFaktörleri"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="RiskFaktörleri"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="RiskFaktörleri"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if (!$('[name="nemlilik"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="nemlilik"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="nemlilik"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if (!$('[name="aktivite"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="aktivite"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="aktivite"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if (!$('[name="hareket"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="hareket"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="hareket"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if (!$('[name="beslenme"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="beslenme"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="beslenme"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if (!$('[name="SurtunmeTahris"]').is(':checked')) {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                                scrollTop: $('[name="SurtunmeTahris"]').first().offset().top
                            }, 200);
                            // Display error message
                    $('[name="SurtunmeTahris"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else {

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
                        let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                        let patient_id = "<?php
                                            echo ($_GET['patient_id']);
                                            ?>";
                        let creation_date = yourDate.toISOString().split('T')[0];
                        let update_date = yourDate.toISOString().split('T')[0];
                        let sensory_perception = parseInt($(
                            "input[type='radio'][name='RiskFaktörleri']:checked").val());
                        let moisture = parseInt($("input[type='radio'][name='nemlilik']:checked").val());
                        let activity = parseInt($("input[type='radio'][name='aktivite']:checked").val());
                        let mobility = parseInt($("input[type='radio'][name='hareket']:checked").val());
                        let nutrition = parseInt($("input[type='radio'][name='beslenme']:checked").val());
                        let discomfort = parseInt($("input[type='radio'][name='SurtunmeTahris']:checked")
                            .val());
                        let total = sensory_perception + mobility + activity + moisture + nutrition +
                            discomfort;
                        let risk;
                        if (total <= 12) risk = "Risk Yok";
                        else if (total <= 14) risk = "Orta Risk";
                        else risk = "Yüksek Risk";


                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm6.php/',
                            data: {
                                id: id,
                                name: name,
                                surname: surname,
                                age: age,
                                not: not,
                                form_num: form_num,
                                patient_name: patient_name,
                                patient_id: patient_id,
                                creation_date: creation_date,
                                update_date: update_date,
                                sensory_perception: sensory_perception,
                                moisture: moisture,
                                activity: activity,
                                mobility: mobility,
                                nutrition: nutrition,
                                discomfort: discomfort,
                                total: total,
                                risk: risk


                            },
                            success: function(data) {
                                let url =
                                    "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                    patient_id + "&patient_name=" + encodeURIComponent(
                                        patient_name);
                                        $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 1000);

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
                }
            })

        });
    </script>
    <script src=""></script>
</body>

</html>