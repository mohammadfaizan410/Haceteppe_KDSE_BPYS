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
$fatigue  = isset($_GET['fatigue ']) ? $_GET['fatigue '] : "NaN";
$sleeping_problem = isset($_GET['sleeping_problem']) ? $_GET['sleeping_problem'] : "NaN";
$hct = isset($_GET['hct']) ? $_GET['hct'] : "NaN";
$Hb   = isset($_GET['Hb  ']) ? $_GET['Hb '] : "NaN";
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
                                echo "<p class='matchedfields' id='fatigue' style='".($fatigue == 'NaN' ? 'color: red' : 'color:blue ' )."'>Ortalama uyku süresi: ".$fatigue."</p>";
                                echo "<p class='matchedfields' id='sleeping_problem' style='".($sleeping_problem == 'NaN' ? 'color:red ' : 'color: blue' )."'>Uykuda sorun:".$sleeping_problem."</p>";
                                echo "<p class='matchedfields' id='hct' style='".($hct == 'NaN' ? 'color:red ' : 'color: blue' )."'>Huzursuzluk:".$hct."</p>";
                                echo "<p class='matchedfields' id='Hb' style='".($Hb == 'NaN' ? 'color:red ' : 'color: blue' )."'> Rahatsızlık :".$Hb."</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Yorgunluk</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kendini yorgun hissetmediğini ifade etmesi </p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hasta sürekli yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta sürekli yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hasta sık sık yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta sık sık yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hasta bazen yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hasta nadiren yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta nadiren yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hasta yorgun hissetmediğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta yorgun hissetmediğini ifade ediyor
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Yorgunluğun yaşam kalitesi üzerine etkisi belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yorgunluğun yaşam kalitesi üzerine etkisi belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hasta aşırı fiziksel ve duygusal yorgunluk belirtileri açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta aşırı fiziksel ve duygusal yorgunluk belirtileri açısından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hastanın aktiviteye verdiği kardiyorespiratuar yanıt (taşikardi, aritmi, dispne, terleme, solukluk, kan basıncı değişimleri, solunum sayısı) gözlemlenir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın aktiviteye verdiği kardiyorespiratuar yanıt (taşikardi, aritmi, dispne, terleme, solukluk, kan basıncı değişimleri, solunum sayısı) gözlemlenir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Uyku süresi ve kalitesi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uyku süresi ve kalitesi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Yeterli enerji sağlamak için besin alımı değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeterli enerji sağlamak için besin alımı değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Rahatlamayı kolaylaştırmak için çevresel uyaranlar kısıtlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Rahatlamayı kolaylaştırmak için çevresel uyaranlar kısıtlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Belirlenen dinlenme aralığında aktivite kısıtlaması ve yatak istirahati sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Belirlenen dinlenme aralığında aktivite kısıtlaması ve yatak istirahati sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Rahatlamayı sağlayacak aktiviteler (kitap okuma, iletişim kurma, müzik dinleme, puzzle yapma gibi) belirlenir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Rahatlamayı sağlayacak aktiviteler (kitap okuma, iletişim kurma, müzik dinleme, puzzle yapma gibi) belirlenir </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Gerekli ise ziyaretçi kısıtlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerekli ise ziyaretçi kısıtlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Kullanılan ilaçların yorgunluk üzerine etkisi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kullanılan ilaçların yorgunluk üzerine etkisi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Hasta ve bakım verenleri yorgunluk kaynaklı yaşam tarzı değişiklikleri için duygularını ifade etmeleri konusunda teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri yorgunluk kaynaklı yaşam tarzı değişiklikleri için duygularını ifade etmeleri konusunda teşvik edilir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt12" value="Hasta ve bakım verenlerine aktiviteyi azaltmayı gerektirecek yorgunluk belirti ve bulguları hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine aktiviteyi azaltmayı gerektirecek yorgunluk belirti ve bulguları hakkında bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt13" value="Hasta ve bakım verenlerine yorgunluğu yönetmek için aktiviteleri önceliklendirme ve zaman yönetimi hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine yorgunluğu yönetmek için aktiviteleri önceliklendirme ve zaman yönetimi hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt14" value="Hasta ve bakım verenlerine yorgunluk ve hastalık süreci arasındaki ilişki hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine yorgunluk ve hastalık süreci arasındaki ilişki hakkında bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt15" value="Rahatlamayı sağlamak için sakinleştirici aktiviteler (okuma, iletişim kurma, puzzle yapma gibi) önerilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Rahatlamayı sağlamak için sakinleştirici aktiviteler (okuma, iletişim kurma, puzzle yapma gibi) önerilir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt16" value="Kontraendike olmadıkça, beslenme planına yüksek enerjili yiyeceklerin tüketiminin arttırılması için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kontraendike olmadıkça, beslenme planına yüksek enerjili yiyeceklerin tüketiminin arttırılması için diyetisyenle işbirliği yapılır</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt17" value="Yorgunluk hastanın ilişkilerini önemli ölçüde etkiliyorsa psikiyatrik destek almaya yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yorgunluk hastanın ilişkilerini önemli ölçüde etkiliyorsa psikiyatrik destek almaya yönlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt18" value="Yorgunluk aile sürecinde bozulmaya neden oluyorsa aile terapisine yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yorgunluk aile sürecinde bozulmaya neden oluyorsa aile terapisine yönlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt19" value="İstemde yer alan ilaçlar (analjezikler, antidepresanlar) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (analjezikler, antidepresanlar) uygulanır</span>
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
                            <p class="tanıdescription">Hastanın kendini yorgun hissetmediğini ifade etmesi  </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hasta sürekli yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta sürekli yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hasta sık sık yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta sık sık yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hasta bazen yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hasta nadiren yorgun hissettiğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta nadiren yorgun hissettiğini ifade ediyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hasta yorgun hissetmediğini ifade ediyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta yorgun hissetmediğini ifade ediyor
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
                                        $userid = isset($_GET['patient_id']) ?$_GET['patient_id'] : 20;
                                        echo $userid
                                        ?>;
                let patient_name = "<?php
                                        echo urldecode(isset($_GET['patient_name']) ? $_GET['patient_name'] : "test");
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
                    tani_num: 20,
                    table: 'tani20',
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
                    standalone: '<?php echo $_GET['standalone']; ?>'
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