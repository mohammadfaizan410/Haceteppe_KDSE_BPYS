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

// $tanı_respiratory_rate = $_GET['tanı_respiratory_rate'];
// $tanı_heart_rate = $_GET['tanı_heart_rate'];
// $tanı_spo2_percentage = $_GET['tanı_spo2_percentage'];
// $tanı_o2_status = $_GET['tanı_o2_status'];
// $tanı_respiratory_nature = $_GET['tanı_respiratory_nature'];
$changing_position = isset($_GET['changing_position']) ? $_GET['changing_position'] : "NaN";
$standing_up = isset($_GET['standing_up']) ? $_GET['standing_up'] : "NaN";
$walking = isset($_GET['walking']) ? $_GET['walking'] : "NaN";
$changing_clothes   = isset($_GET['changing_clothes  ']) ? $_GET['changing_clothes '] : "NaN";
$cleaning_body  = isset($_GET['cleaning_body ']) ? $_GET['cleaning_body '] : "NaN";
$wheelchair_use  = isset($_GET['wheelchair_use ']) ? $_GET['wheelchair_use '] : "NaN";
$cane_use  = isset($_GET['cane_use ']) ? $_GET['cane_use '] : "NaN";
$walker_use  = isset($_GET['walker_use ']) ? $_GET['walker_use '] : "NaN";
$crutch_use  = isset($_GET['crutch_use ']) ? $_GET['crutch_use '] : "NaN";
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
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #eee;
        }

        h1 {
            text-align: center;
        }

        tr,
        td {
            width: 200px;
        }
    </style>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">
                                <?php         
                                echo "<p class='matchedfields' id='changing_position' style='".($changing_position == 'NaN' ? 'color: red' : 'color:blue ' )."'>Ortalama uyku süresi: ".$changing_position."</p>";
                                echo "<p class='matchedfields' id='standing_up' style='".($standing_up == 'NaN' ? 'color:red ' : 'color: blue' )."'>Uykuda sorun:".$standing_up."</p>";
                                echo "<p class='matchedfields' id='walking' style='".($walking == 'NaN' ? 'color:red ' : 'color: blue' )."'>Huzursuzluk:".$walking."</p>";
                                echo "<p class='matchedfields' id='changing_clothes' style='".($changing_clothes == 'NaN' ? 'color:red ' : 'color: blue' )."'> Rahatsızlık :".$changing_clothes."</p>";
                                echo "<p class='matchedfields' id='cleaning_body' style='".($cleaning_body == 'NaN' ? 'color:red ' : 'color: blue' )."'>Kaşıntı :".$cleaning_body."</p>";
                                echo "<p class='matchedfields' id='wheelchair_use' style='".($wheelchair_use == 'NaN' ? 'color:red ' : 'color: blue' )."'>Beslenmede Sorun:".$wheelchair_use."</p>";
                                echo "<p class='matchedfields' id='cane_use' style='".($cane_use == 'NaN' ? 'color:red ' : 'color: blue' )."'>Ağrının süresi :".$cane_use."</p>";
                                echo "<p class='matchedfields' id='walker_use' style='".($walker_use == 'NaN' ? 'color:red ' : 'color: blue' )."'>Ağrının süresi :".$walker_use."</p>";
                                echo "<p class='matchedfields' id='crutch_use' style='".($crutch_use == 'NaN' ? 'color:red ' : 'color: blue' )."'>Ağrının süresi :".$crutch_use."</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Fiziksel mobilitede bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın etkili bir şekilde mobilize olması </p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hasta hiç mobilize olmuyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta hiç mobilize olmuyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hasta nadiren mobilize oluyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta nadiren mobilize oluyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hasta bazen mobilizi oluyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen mobilizi oluyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hasta sık sık mobilize oluyor ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta sık sık mobilize oluyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5:Hastanın mobilizasyonunda sorun yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5:Hastanın mobilizasyonunda sorun yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Günlük yaşam aktivitelerini yerine getirme konusunda hastanın bağımsızlığı desteklenir, gerektiğinde yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Günlük yaşam aktivitelerini yerine getirme konusunda hastanın bağımsızlığı desteklenir, gerektiğinde yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Gerekmesi halinde hastaya tüm mobilizasyon süreçlerinde danışmanlık ve destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerekmesi halinde hastaya tüm mobilizasyon süreçlerinde danışmanlık ve destek sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hemşire çağrı cihazı hastanın ulaşabileceği bir yere yerleştirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hemşire çağrı cihazı hastanın ulaşabileceği bir yere yerleştirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hastanın tolere etme durumuna göre yatak dışında geçirilen zaman arttırılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tolere etme durumuna göre yatak dışında geçirilen zaman arttırılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Uzun süreli yatak istirahati sonrası ilk kalkışta, önce birkaç dakika yatağın kenarında oturması, daha sonra ayağa kalkması sağlanır.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uzun süreli yatak istirahati sonrası ilk kalkışta, önce birkaç dakika yatağın kenarında oturması, daha sonra ayağa kalkması sağlanır.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Hasta yürüyemiyorsa, tekerlekli sandalye/normal sandalyeye oturması sağlanarak, yatak dışına geçmesine yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta yürüyemiyorsa, tekerlekli sandalye/normal sandalyeye oturması sağlanarak, yatak dışına geçmesine yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Sürekli yatak içerisinde olan hasta için uygun yatak ve araç gereç kullanılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sürekli yatak içerisinde olan hasta için uygun yatak ve araç gereç kullanılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="İmmobil bir hastaya belirli programa göre en az 2 saatte bir pozisyon verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İmmobil bir hastaya belirli programa göre en az 2 saatte bir pozisyon verilir</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Aktivite sürecinde olumlu destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aktivite sürecinde olumlu destek sağlanır</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt10" value="Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt11" value="Üst ekstremitenin gücünü korumak ve geliştirmek için uygun egzersizler konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Üst ekstremitenin gücünü korumak ve geliştirmek için uygun egzersizler konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt12" value="Yürüyüş için kaymayan ve destekleyici ayakkabı kullanımı için bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yürüyüş için kaymayan ve destekleyici ayakkabı kullanımı için bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt13" value="Herhangi bir aktivite sırasında postürün ve vücut mekaniğinin nasıl korunacağı konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Herhangi bir aktivite sırasında postürün ve vücut mekaniğinin nasıl korunacağı konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt14" value="Mobiliteye yardımcı araç gereçlerin (baston, yürüteç, koltuk değneği, tekerlekli sandalye) kullanımı gözlemlenir ve gerekli ise kullanımla ilgili eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mobiliteye yardımcı araç gereçlerin (baston, yürüteç, koltuk değneği, tekerlekli sandalye) kullanımı gözlemlenir ve gerekli ise kullanımla ilgili eğitim verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt15" value="Hastaya ve bakım verenlerine, hastanın cildini kaşıyarak tahriş etmemesi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya ve bakım verenlerine, hastanın cildini kaşıyarak tahriş etmemesi konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt16" value="Güvenli transfer ve ambulasyon konusunda eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Güvenli transfer ve ambulasyon konusunda eğitim verilir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt17" value="Bir egzersiz programı oluşturmak için fizyoterapistle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bir egzersiz programı oluşturmak için fizyoterapistle işbirliği yapılır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt18" value="Hareketliliği geliştirmek ve korumak için bir plan geliştirmede iş terapisti ve fizyoretapistle iş birliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hareketliliği geliştirmek ve korumak için bir plan geliştirmede iş terapisti ve fizyoretapistle iş birliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt19" value="İstemde yer alan ilaçlar gerektiğinde (analjezikler) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar gerektiğinde (analjezikler) uygulanır</span>
                                </label>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.</p>
                            <p class="tanıdescription"> Sorun çözümlendi:
                                5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak
                            </p>
                        </div>
                            <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın etkili bir şekilde mobilize olması  </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hasta hiç mobilize olmuyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta hiç mobilize olmuyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hasta nadiren mobilize oluyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta nadiren mobilize oluyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hasta bazen mobilizi oluyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen mobilizi oluyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hasta sık sık mobilize oluyor ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta sık sık mobilize oluyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5:Hastanın mobilizasyonunda sorun yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5:Hastanın mobilizasyonunda sorun yok  
                                        </span>
                                    </label>
                                </div>

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
		        let noc_indicator_2 = $('.form-check-input[name="noc_indicator_2"]') ? $('.form-check-input[name=noc_indicator_2]:checked').val() : "null";
		        let noc_indicator_3 = $('.form-check-input[name="noc_indicator_3"]') ? $('.form-check-input[name=noc_indicator_3]:checked').val() : "null";
                let noc_indicator_after = $('.form-check-input[name="noc_indicator_after"]:checked').val();
		        let noc_indicator_after_2 = $('.form-check-input[name="noc_indicator_after_2"]') ? $('.form-check-input[name=noc_indicator_after_2]:checked').val() : "null";
        let noc_indicator_after_3 = $('.form-check-input[name="noc_indicator_after_3"]') ? $('.form-check-input[name=noc_indicator_after_3]:checked').val() : "null";
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
                    tani_num: 18,
                    table: 'tani18',
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
                    standalone: '<?php echo $_GET['standalone']; ?>',
parent_id:  '<?php echo $_GET['parent_id']; ?>',
root_id:  '<?php echo $_GET['root_id']; ?>'standalone']; ?>'
                },
                success: function(data) {
                    console.log("something happened")
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