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
$taniValidInputs = isset($_GET['taniValidInputs']) ? $_GET['taniValidInputs'] : '';
$taniValidInputs = isset($_GET['taniValidInputs']) ? $_GET['taniValidInputs'] : '';
//Nausea, vomiting, lack of apetite
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
                            <p class="tanıdescription">Doku bütünlüğünde bozulma </p>
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
                            <p class="tanıdescription">Hastanın doku ve mukoz membran bütünlüğünün sağlanması</p>
                        </div>


                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın doku ve muköz membranlarında çok şiddetli düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın doku ve muköz membranlarında şiddetli  düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın doku ve muköz membranlarında orta düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın doku ve muköz membranlarında hafif düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="5">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın doku ve muköz membranlarında bozulma yok</span>
                                    </label>
                                </div>

                        </div>


                

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın derisi, doku bütünlüğünde bozulma belirtileri açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın derisi, doku bütünlüğünde bozulma belirtileri açısından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın yatağı değerlendirilir. Statik hava içeren şişme yataklar, düşük hava kaybına sahip yataklar, hava-sıvı yatakları ve su yatakları da dahil olmak üzere basınç dengeleyici cihazların çalışma durumu kontrol edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın yatağı değerlendirilir. Statik hava içeren şişme yataklar, düşük hava kaybına sahip yataklar, hava-sıvı yatakları ve su yatakları da dahil olmak üzere basınç dengeleyici cihazların çalışma durumu kontrol edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Basıncı dengeleyen yatak kullanılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Basıncı dengeleyen yatak kullanılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Ağız ve ağız içi yapıları (dudaklar, dil, mukoz memranlar, dişler, dişetleri, diş protezleri) değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağız ve ağız içi yapıları (dudaklar, dil, mukoz memranlar, dişler, dişetleri, diş protezleri) değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastaya uygun ağız bakımı yapılır (bkz oral mukoz membranda bozulma)">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya uygun ağız bakımı yapılır (bkz oral mukoz membranda bozulma)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Düzenli aralıklarla pozisyon değiştirme ve yaraya baskı uygulamayacak şekilde pozisyon verilir
Yara Bakımı: Her pansuman değişikliğinde yara yeri değerlendirilir
">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Düzenli aralıklarla pozisyon değiştirme ve yaraya baskı uygulamayacak şekilde pozisyon verilir
Yara Bakımı: Her pansuman değişikliğinde yara yeri değerlendirilir
</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Yara; drenaj, koku, renk, derinlik, boyut, epitelizasyon ya da granülasyon yarlığı, nekrotik doku varlığı açılarından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara; drenaj, koku, renk, derinlik, boyut, epitelizasyon ya da granülasyon yarlığı, nekrotik doku varlığı açılarından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Yara uygun bir temizleyici ile temizlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara uygun bir temizleyici ile temizlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Yaranın özelliklerine uygun olan yara bakım ürünleri kullanılarak pansuman yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaranın özelliklerine uygun olan yara bakım ürünleri kullanılarak pansuman yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Çevre doku drenaj ve aşırı nemde uzak tutulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Çevre doku drenaj ve aşırı nemde uzak tutulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Yara fekal ve üriner kontaminasyondan korunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara fekal ve üriner kontaminasyondan korunur</span>
                                </label>
                            </div>


                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Hasta ve bakım verenleri yarada gelişebilecek enfeksiyon belirti ve bulguları hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri yarada gelişebilecek enfeksiyon belirti ve bulguları hakkında bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Hasta ve bakım verenlerine cilt bütünlüğü bozulma belirtileri hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine cilt bütünlüğü bozulma belirtileri hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Hasta ve bakım verenleri yara bakım uygulamaları hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri yara bakım uygulamaları hakkında bilgi verilir</span>
                                </label>
                            </div>


                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="Yara bakımı veya deri bütünlüğünün bozulmasını değerlendirmek, evrelendirmek, tedavi etmek ve kaydetmek konusunda yardım almak için yara bakım hemşiresi ile işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara bakımı veya deri bütünlüğünün bozulmasını değerlendirmek, evrelendirmek, tedavi etmek ve kaydetmek konusunda yardım almak için yara bakım hemşiresi ile işbirliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="Protein, mineral, kalori ve vitamin açısından zengin bir diyet için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Protein, mineral, kalori ve vitamin açısından zengin bir diyet için diyetisyenle işbirliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="Yaranın iyileşme potansiyelini arttırmak için enteral veya parenteral beslenme uygulaması konusunda hekimle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaranın iyileşme potansiyelini arttırmak için enteral veya parenteral beslenme uygulaması konusunda hekimle işbirliği yapılır</span>
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
                            <p class="tanıdescription">Hastanın doku ve mukoz membran bütünlüğünün sağlanması</p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="1">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın doku ve muköz membranlarında çok şiddetli düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="2">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın doku ve muköz membranlarında şiddetli  düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="3">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın doku ve muköz membranlarında orta düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="4">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın doku ve muköz membranlarında hafif düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="5">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın doku ve muköz membranlarında bozulma yok</span>
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
                    if("<?php echo isset($_GET['taniValidInputs']) ?>"){
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
                tani_name = 'tani21';
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
                }                $.ajax({
                type: 'POST',
                url:'<?php echo $base_url; ?>/tani-handler/submitOrUpdateTani.php',
                data: {
                    tani_num: 29,
                    table: 'tani29',
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