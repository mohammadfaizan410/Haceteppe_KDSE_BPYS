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
$taniValidInputs = isset($_GET['taniValidInputs']) ? $_GET['taniValidInputs'] : '';
$taniValidInputs = isset($_GET['taniValidInputs']) ? $_GET['taniValidInputs'] : '';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    
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

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Etkisiz periferik doku perfüzyonu </p>
                        </div>
                        <?php
                            if($taniValidInputs !== '') {
                                echo '<div class="input-section d-flex">
                                    <p id="tani_usernamelabel">Algılanan Sorunlar:</p>';
                                
                                $fields = explode('/', $taniValidInputs);
                                echo '<div>';
                                foreach($fields as $field) {
                                    echo '<p style="color:red">' . $field . '</p>';
                                };
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın periferik nabızlarının olması</p>
                        </div>
                        
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="1">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın periferik nabızları hiç hissedilmiyor
                                            var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın periferik nabızları büyük ölçüde
                                            hissedilmiyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="3">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın periferik nabızları zor
                                            hissediliyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="4">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın periferik nabızları biraz zayıf
                                            hissediliyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın periferik nabızları var
                                        </span>
                                    </label>
                                </div>


                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastada ödem olmaması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="noc_indicator_2"
                                        id="noc_indicator2" value="1">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">1: Hastada şiddetli düzeyde ödem var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="noc_indicator_2"
                                        id="noc_indicator2" value="2">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">2: Hastada önemli düzeyde ödem var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="noc_indicator_2"
                                        id="noc_indicator2" value="3">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">3: Hastada orta düzeyde ödem var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="noc_indicator_2"
                                        id="noc_indicator2" value="4">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">4: Hastada hafif düzeyde ödem var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="noc_indicator_2" id="
                                        noc_indicator2" value="5">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">5: Hastada ödem yok </span>
                                    </label>
                                </div>


                        </div>

                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kapiller dolum süresinin normal sınırda olması </p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_3"
                                        id="noc_indicator3" value="1">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">1: Hastanın kapiller dolum süresinde çok uzama
                                            var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_3"
                                        id="noc_indicator3"
                                        value="2">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">2: Hastanın kapiller dolum süresinde büyük ölçüde
                                            uzama var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_3"
                                        id="noc_indicator3"
                                        value="3">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">3: Hastanın kapiller dolum süresinde orta düzeyde
                                            uzama var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_3"
                                        id="noc_indicator3"
                                        value="4">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">4: Hastanın kapiller dolum süresinde biraz uzama
                                            var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_3" id="
                                        noc_indicator3" value="5">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">5: Hastanın kapiller dolum süresi normal (< 3
                                                sn)</span>
                                    </label>
                                </div>


                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Periferik dolaşım (nabızlar, ödem, kapiller dolum, renk, sıcaklık) değerlendirilir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Periferik dolaşım (nabızlar, ödem, kapiller dolum,
                                        renk, sıcaklık) değerlendirilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Sıvı dengesinin değerlendirilmesi için Aldığı-Çıkardığı takibi yapılır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sıvı dengesinin değerlendirilmesi için
                                        Aldığı-Çıkardığı takibi yapılır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Duyu değerlendirmesi (keskin, künt, sıcak, soğuk) yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Duyu değerlendirmesi (keskin, künt, sıcak, soğuk)
                                        yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Ekstremiteler hissizlik, karıncalanma, aşırı duyarlılık, duyularda azalma açılarından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ekstremiteler hissizlik, karıncalanma, aşırı
                                        duyarlılık, duyularda azalma açılarından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Ayakkabı, çorap, terlik, giysilerin ve varsa protezlerin hastaya uyumu kontrol edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ayakkabı, çorap, terlik, giysilerin ve varsa
                                        protezlerin hastaya uyumu kontrol edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Laboratuvar bulguları (PTZ, a-PTT, Trombosit sayısı, serum elektrolitleri) değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Laboratuvar bulguları (PTZ, a-PTT, Trombosit sayısı,
                                        serum elektrolitleri) değerlendirilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="Uygun sıklıkta pozisyon değişikliği sağlanır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uygun sıklıkta pozisyon değişikliği sağlanır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="Etkilenmiş ekstremitenin kimyasal, mekanik ya da termal travmalardan korunması sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Etkilenmiş ekstremitenin kimyasal, mekanik ya da
                                        termal travmalardan korunması sağlanır</span>
                                </label>
                            </div>
                            <p id="tani_usernamelabel">Arteriyel Yetmezlikte:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9"
                                    value="Hastanın periferik nabızları değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın periferik nabızları değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt10" value="Hastanın kapiller dolum süresi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kapiller dolum süresi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt11"
                                    value="Hastanın ekstremitelerinin rengi ve sıcaklığı değerlendirilir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ekstremitelerinin rengi ve sıcaklığı
                                        değerlendirilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt12" value="Gerektiğinde ekstremiteler ısıtılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde ekstremiteler ısıtılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt13"
                                    value="Hasta trombofilebit veya tromboembolizim açısından izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta trombofilebit veya tromboembolizim açısından
                                        izlenir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">Venöz Yetmezlikte:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt14"
                                    value="Sıvı yüklenmesi ve retansiyonu ile ilgili bulgular (CVP Artışı, ödem, boyun venlerinde dolgunluk, asit vb.) değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sıvı yüklenmesi ve retansiyonu ile ilgili bulgular
                                        (CVP Artışı, ödem, boyun venlerinde dolgunluk, asit vb.) değerlendirilir
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt15" value="Ödem değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ödem değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt16" value="Ödemli bölge cilt bütünlüğü açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ödemli bölge cilt bütünlüğü açısından
                                        değerlendirilir</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt17" value="Gerektiğinde ekstremite elevasyona alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde ekstremite elevasyona alınır</span>
                                </label>
                            </div>

                            <p class="usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt18"
                                    value="Hasta ve bakım verenlerine egzersizin periferik dolaşıma etkisi hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine egzersizin periferik
                                        dolaşıma etkisi hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt19"
                                    value="Hasta ve bakım verenleri yatak istirahati sırasında özellikle alt ekstremiteye pasif/aktif ROM egzersizlerinin yaptırılması konusunda desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri yatak istirahati sırasında
                                        özellikle alt ekstremiteye pasif/aktif ROM egzersizlerinin yaptırılması
                                        konusunda desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt20"
                                    value="Hasta ve bakım verenleri ekstremite sıcaklık değerlendirmesi, diyet ve ilaç kullanımına uyum, venöz staz oluşumunu önleme (bacak bacak üzerine atmama, dizleri bükmeme, egzersiz) konularında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri ekstremite sıcaklık
                                        değerlendirmesi, diyet ve ilaç kullanımına uyum, venöz staz oluşumunu önleme
                                        (bacak bacak üzerine atmama, dizleri bükmeme, egzersiz) konularında
                                        bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt21"
                                    value="Hasta ve bakım verenlerine ayak bakımı konusunda (ayakların düzenli olarak yıkanması, kurulanması, ayak derisinin uygun şekilde nemlendirilmesi, tırnakların düz kesilip törpülenmesi gibi) bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine ayak bakımı konusunda
                                        (ayakların düzenli olarak yıkanması, kurulanması, ayak derisinin uygun şekilde
                                        nemlendirilmesi, tırnakların düz kesilip törpülenmesi gibi) bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt22"
                                    value="Hasta ve bakım verenlerine banyo yaparken, otururken, uzanırken ya da pozisyon değiştirirken vücut bölümlerini izlemesi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine banyo yaparken, otururken,
                                        uzanırken ya da pozisyon değiştirirken vücut bölümlerini izlemesi konusunda
                                        bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt23"
                                    value="Hasta ve bakım verenleri deri bütünlüğünde görülen değişimler için cildin günlük olarak incelenmesi konusunda bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri deri bütünlüğünde görülen
                                        değişimler için cildin günlük olarak incelenmesi konusunda
                                        bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt24"
                                    value="Hasta ve bakım verenleri sıcak ya da soğuk uygulamalar sırasında gelişebilecek komplikasyonlar hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri sıcak ya da soğuk uygulamalar
                                        sırasında gelişebilecek komplikasyonlar hakkında bilgilendirilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">İş Birliği Gerektiren Uygulamalar:</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt25"
                                    value="İstem yapılan sıvılar ve  ilaçlar (analjezik, antikoagülan, vazodilatör, diüretikler vb) uygulanır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstem yapılan sıvılar ve ilaçlar (analjezik,
                                        antikoagülan, vazodilatör, diüretikler vb) uygulanır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt26"
                                    value="Sodyumdan kısıtlı diyet sağlanması konusunda diyetisyenle iş birliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sodyumdan kısıtlı diyet sağlanması konusunda
                                        diyetisyenle iş birliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt27"
                                    value="Sigara bırakma konusunda bilgilendirilir ve ilgili birimlere yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sigara bırakma konusunda bilgilendirilir ve ilgili
                                        birimlere yönlendirilir</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım
                                planında tanımlı tanı olacak. </p>
                            <p class="tanıdescription"> Sorun çözümlendi:
                                5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak
                            </p>
</div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="1">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">1: Hastanın periferik nabızları hiç
                                                hissedilmiyor
                                                var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="2">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">2: Hastanın periferik nabızları büyük ölçüde
                                                hissedilmiyor</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="3">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">3: Hastanın periferik nabızları zor
                                                hissediliyor</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="4">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">4: Hastanın periferik nabızları biraz zayıf
                                                hissediliyor</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="
                                        noc_indicator_after" value="5">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">5: Hastanın periferik nabızları var
                                            </span>
                                        </label>
                                    </div>


                            </div>
                            <div class="input-section d-flex">
                                <p id="tani_usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastada ödem olmaması</p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_2" id="noc_indicator_after_2"
                                            value="1">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">1: Hastada şiddetli düzeyde ödem var </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_2" id="noc_indicator_after_2"
                                            value="2">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">2: Hastada önemli düzeyde ödem var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_2" id="noc_indicator_after_2"
                                            value="3">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">3: Hastada orta düzeyde ödem var </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_2" id="noc_indicator_after_2"
                                            value="4">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">4: Hastada hafif düzeyde ödem var </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_2" id="
                                        noc_indicator2_after" value="5">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">5: Hastada ödem yok </span>
                                        </label>
                                    </div>


                            </div>

                            <div class="input-section d-flex">
                                <p id="tani_usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın kapiller dolum süresinin normal sınırda olması </p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_3" id="noc_indicator3_after"
                                            value="1">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">1: Hastanın kapiller dolum süresinde çok uzama
                                                var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_3" id="noc_indicator3_after"
                                            value="2">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">2: Hastanın kapiller dolum süresinde büyük
                                                ölçüde
                                                uzama var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_3" id="noc_indicator3_after"
                                            value="3">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">3: Hastanın kapiller dolum süresinde orta
                                                düzeyde
                                                uzama var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_3" id="noc_indicator3_after"
                                            value="4">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">4: Hastanın kapiller dolum süresinde biraz
                                                uzama
                                                var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator_after_3" id="
                                        noc_indicator3_after"
                                            value="5">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">5: Hastanın kapiller dolum süresi normal (< 3
                                                    sn)</span>
                                        </label>
                                    </div>


                            </div>
                           
                        </div>
                                                                <input type="submit" class="d-flex w-75 submit m-auto justify-content-center mb-5" name="submit" id="submit" value="Kaydet">              



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
            var url = "<?php echo $base_url; ?>/updateForms/showAllTanis.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
                if(<?php echo isset($_GET['taniValidInputs']) ?>){
                var url = "<?php echo $base_url; ?>/updateForms/showSystemGeneratedTanis.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
                }
            $("#content").load(url);

        })
    });
    </script>
    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
            if (!$('[name="noc_indicator"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator"]').offset().top
                    }, 200);
                $('[name="noc_indicator"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="noc_indicator_2"]').length && !$('[name="noc_indicator_2"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator_2"]').offset().top
                    }, 200);
                $('[name="noc_indicator_2"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="noc_indicator_3"]').length && !$('[name="noc_indicator_3"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator_3"]').offset().top
                    }, 200);
                $('[name="noc_indicator_3"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="nurse_attempt"]:checked').length === 0){
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="nurse_attempt"]').offset().top
                    }, 200);
                $('[name="nurse_attempt"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="nurse_education"]:checked').length === 0){
                $('.option-error').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="nurse_education"]').offset().top
                    }, 200);
                $('[name="nurse_education"]').first().closest('.input-section').find('.option-error1').css('display', 'block');
                return false;
            } else if ($('[name="collaborative_apps"]:checked').length === 0){
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="collaborative_apps"]').offset().top
                    }, 200);
                $('[name="collaborative_apps"]').first().closest('.input-section').find('.option-error2').css('display', 'block');
                return false;
            } else if (!$('[name="noc_indicator_after"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator_after"]').offset().top
                    }, 200);
                $('[name="noc_indicator_after"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="noc_indicator_after_2"]').length && !$('[name="noc_indicator_after_2"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator_after_2"]').offset().top
                    }, 200);
                $('[name="noc_indicator_after_2"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if ($('[name="noc_indicator_after_3"]').length && !$('[name="noc_indicator_after_3"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('.option-error1').css('display', 'none');
                $('.option-error2').css('display', 'none');
                $('html, body').animate({
                        scrollTop: $('[name="noc_indicator_after_3"]').offset().top
                    }, 200);
                $('[name="noc_indicator_after_3"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            }
            console.log("submit clicked")
            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_num = 15;
            var patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
            let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
            let yourDate = new Date();
            let creationDate = yourDate.toISOString().split('T')[0];
            let updateDate = yourDate.toISOString().split('T')[0];
            let nurse_attempt = $('.form-check-input[name="nurse_attempt"]:checked').map(function() {
                    return this.value;
                }).get().join('/');
                let nurse_education = $('.form-check-input[name="nurse_education"]:checked').map(function() {
                    return this.value;
                }).get().join('/');
                let collaborative_apps = $('.form-check-input[name="collaborative_apps"]:checked').map(function() {
                    return this.value;
                }).get().join('/');
                let noc_indicator = $('.form-check-input[name="noc_indicator"]:checked').val();
		        let noc_indicator_2 = $('.form-check-input[name="noc_indicator_2"]').length > 0 ? $('.form-check-input[name="noc_indicator_2"]:checked').val() : "null";

		        let noc_indicator_3 = $('.form-check-input[name="noc_indicator_3"]').length > 0 ? $('.form-check-input[name="noc_indicator_3"]:checked').val() : "null";

                let noc_indicator_after = $('.form-check-input[name="noc_indicator_after"]:checked').val();
		        let noc_indicator_after_2 = $('.form-check-input[name="noc_indicator_after_2"]').length > 0 ? $('.form-check-input[name="noc_indicator_after_2"]:checked').val() : "null";

        let noc_indicator_after_3 = $('.form-check-input[name="noc_indicator_after_3"]').length > 0 ? $('.form-check-input[name="noc_indicator_after_3"]:checked').val() : "null";
let evaluation = 'false';
                var firstCheckbox = $('.form-check-input[name="noc_indicator_after"]:last');
                var secondCheckbox = $('.form-check-input[name="noc_indicator_after_2"]:last');
                var thirdCheckbox = $('.form-check-input[name="noc_indicator_after_3"]:last');

                if (firstCheckbox.length > 0) {
                if (secondCheckbox.length > 0 && thirdCheckbox.length > 0) {
                    if (secondCheckbox.is(':checked') && thirdCheckbox.is(':checked')) {
                    let evaluation = 'true';         

                    }
                } else if (secondCheckbox.length > 0) {
                    if (secondCheckbox.is(':checked')) {
                        let evaluation = 'true';         

                    }
                } else {
                    if (firstCheckbox.is(':checked')) {
                        let evaluation = 'true';         

                    }
                }
                }


                $.ajax({
                type: 'POST',
                url:'<?php echo $base_url; ?>/tani-handler/submitOrUpdateTani.php',
                data: {
                    tani_num: 6,
                    table: 'tani6',
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
     
    
                   
                    noc_indicator: noc_indicator,
                    noc_indicator_after: noc_indicator_after,
                    noc_indicator_2: noc_indicator_2,
                    noc_indicator_after_2: noc_indicator_after_2,
                    noc_indicator_3: noc_indicator_3,
                    noc_indicator_after_3: noc_indicator_after_3,
                    nurse_attempt: nurse_attempt,
                    nurse_education: nurse_education,
                    collaborative_apps: collaborative_apps,
                    evaluation: evaluation,
                    
                    root_id : <?php echo $_GET['root_id']; ?>,
                    parent_id : <?php echo $_GET['parent_id']; ?>,
                    
                    
                                },
                success: function(data) {
                    alert(data)
                    let url =
                        "<?php echo $base_url; ?>/updateForms/showSubmittedTanis.php?patient_id=" +
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
;
                },
                error: function(data) {
                    console.log(data)
                }
            });
        })
    });
    </script>

</body>

</html>