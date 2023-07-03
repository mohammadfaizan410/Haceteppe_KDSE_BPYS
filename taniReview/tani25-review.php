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
require_once('../config-students.php');

$userid = $_SESSION['userlogin']['id'];
$tani_id = $_GET['tani_id'];
$tani_num = $_GET['tani_num'];
$sql = "SELECT * FROM tani where tani_id= $tani_id and tani_num= $tani_num";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $tani = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
}
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
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Beslenmede öz bakım yetersizliği </p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın desteksiz ya da destekle beslenmesinin sağlanması</p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hasta yemeklerini desteksiz ya da destekle yemez">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta yemeklerini desteksiz ya da destekle yemez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hasta yemeklerini desteksiz ya da destekle nadiren yer">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta yemeklerini desteksiz ya da destekle nadiren yer</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hasta yemeklerini desteksiz ya da destekle bazen yer ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta yemeklerini desteksiz ya da destekle bazen yer </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hasta yemeklerini desteksiz ya da destekle sık sık yer ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta yemeklerini desteksiz ya da destekle sık sık yer </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="5: Hasta yemeklerini desteksiz ya da destekle yer">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta yemeklerini desteksiz ya da destekle yer</span>
                                    </label>
                                </div>

                            </div>
                        </div>


                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın kendi kendine beslenme becerisindeki iyileşme/kötüleşme durumu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kendi kendine beslenme becerisindeki iyileşme/kötüleşme durumu değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hastada kendi kendine beslenme güçlüğüne yol açabilen duyusal, bilişsel ya da fiziksel yetersizlikleri izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastada kendi kendine beslenme güçlüğüne yol açabilen duyusal, bilişsel ya da fiziksel yetersizlikleri izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hastanın çiğneme ve yutma becerisi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın çiğneme ve yutma becerisi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hastanın yeterli beslenmeye yönelik besin alımı değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın yeterli beslenmeye yönelik besin alımı değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Hastanın diş protezinin durumu ve uyumu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın diş protezinin durumu ve uyumu değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Hasta takma dişlerini ve gözlüklerini kullanması için desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta takma dişlerini ve gözlüklerini kullanması için desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Yemeklerin tüketilmesi için uygun ortam [göze hoş görünmeyen malzemelerin (sürgü, ördek, aspirasyon vb) ortadan kaldırılması, atıkların uzaklaştırılması, odanın havalandırılması gibi] sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemeklerin tüketilmesi için uygun ortam [göze hoş görünmeyen malzemelerin (sürgü, ördek, aspirasyon vb) ortadan kaldırılması, atıkların uzaklaştırılması, odanın havalandırılması gibi] sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Hastanın bağımsız bir şekilde yemek yeme ve sıvı alımı desteklenir, yalnızca gerektiğinde yardım edilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bağımsız bir şekilde yemek yeme ve sıvı alımı desteklenir, yalnızca gerektiğinde yardım edilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Hastanın bağımsızlığını arttırmak için elle yiyebileceği besinleri (meyve, ekme gibi) kendisi yemesi için teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bağımsızlığını arttırmak için elle yiyebileceği besinleri (meyve, ekme gibi) kendisi yemesi için teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Besinler hastanın görme alanında tutulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Besinler hastanın görme alanında tutulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Hastanın kendi kendine beslenmesini desteklemek için yardımcı araçlar (uzun saplı kaşık-çatal, yuvarlak malzemler vb) sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kendi kendine beslenmesini desteklemek için yardımcı araçlar (uzun saplı kaşık-çatal, yuvarlak malzemler vb) sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Beslerken, besinlerin sırasını hastanın belirlemesine izin verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Beslerken, besinlerin sırasını hastanın belirlemesine izin verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Besinler küçük miktarlar şeklinde yedirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Besinler küçük miktarlar şeklinde yedirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Beslenme sırasında dikkatin dağılmasını önlemek için öğünler sessiz bir ortamda yedirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Beslenme sırasında dikkatin dağılmasını önlemek için öğünler sessiz bir ortamda yedirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt15" value="Yemek yedirirken acele edilmez">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemek yedirirken acele edilmez</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt16" value="Gerekirse ya da hasta isterse sıvıların tüketimi için pipet bulundurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerekirse ya da hasta isterse sıvıların tüketimi için pipet bulundurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt17" value="Hasta yemek öncesi ve yemek sonrası ağız bakımını uygulaması için desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta yemek öncesi ve yemek sonrası ağız bakımını uygulaması için desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt18" value="Hastanın rahatsız olması halinde yemek yeme sırasında mahremiyeti sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın rahatsız olması halinde yemek yeme sırasında mahremiyeti sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt19" value="Hasta beslenirken ve yemek saatlerine bakım veren/ebeveyn dahil edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta beslenirken ve yemek saatlerine bakım veren/ebeveyn dahil edilir</span>
                                </label>
                            </div>
                            

                            
                           
                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Bakım verenler disfaji belirti ve bulguları hakkında (yutkunamama, ağızdan devamlı salya gelmesi, konuşurken gurultuya benzer ses çıkarma, öksürme, ) bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bakım verenler disfaji belirti ve bulguları hakkında (yutkunamama, ağızdan devamlı salya gelmesi, konuşurken gurultuya benzer ses çıkarma, öksürme, ) bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Yardımcı araçların kullanımı öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yardımcı araçların kullanımı öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Yemek yeme ve sıvı tüketme konusunda alternatif yöntemler öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemek yeme ve sıvı tüketme konusunda alternatif yöntemler öğretilir</span>
                                </label>
                            </div>
                           
                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="Hasta ve bakım verenleri, evde bakım için sosyal hizmetlere yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri, evde bakım için sosyal hizmetlere yönlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="İstemde yer alan ilaçlar (antiemetikler, analjezikler) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (antiemetikler, analjezikler) uygulanır</span>
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
                            <p class="tanıdescription">Hastanın düzenli aralıklarla desteksiz ya da destekle banyo yapması</p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="1: Hasta yemeklerini desteksiz ya da destekle yemez">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta yemeklerini desteksiz ya da destekle yemez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="2: Hasta yemeklerini desteksiz ya da destekle nadiren yer">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta yemeklerini desteksiz ya da destekle nadiren yer</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="3: Hasta yemeklerini desteksiz ya da destekle bazen yer ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta yemeklerini desteksiz ya da destekle bazen yer </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="4: Hasta yemeklerini desteksiz ya da destekle sık sık yer ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta yemeklerini desteksiz ya da destekle sık sık yer </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after_5" value="5: Hasta yemeklerini desteksiz ya da destekle yer">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta yemeklerini desteksiz ya da destekle yer</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                          
                        </div>
                                                                <input type="submit" class="d-flex w-75 submit m-auto justify-content-center mb-5" name="submit" id="submit" value="Kaydet">              
submit" id="submit" value="Kaydet">              




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
            var url = "<?php echo $base_url; ?>/updateForms/showSubmittedTanis.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
</script>
<script>
    $(document).ready(function(){
        $('input[name="noc_indicator"][value="<?php echo $tani[0]['noc_indicator']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_2"][value="<?php echo $tani[0]['noc_indicator_2']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_3"][value="<?php echo $tani[0]['noc_indicator_3']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after"][value="<?php echo $tani[0]['noc_indicator_after']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after_2"][value="<?php echo $tani[0]['noc_indicator_after_2']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after_3"][value="<?php echo $tani[0]['noc_indicator_after_3']; ?>"]').prop('checked', true);

        "<?php echo $tani[0]['nurse_attempt']?>".split('/').forEach(element => {
            $('input[name="nurse_attempt"][value="' + element + '"]').prop('checked', true);
        });
        "<?php echo $tani[0]['nurse_education']?>".split('/').forEach(element => {
            $('input[name="nurse_education"][value="' + element + '"]').prop('checked', true);
        });
        "<?php echo $tani[0]['collaborative_apps']?>".split('/').forEach(element => {
            $('input[name="collaborative_apps"][value="' + element + '"]').prop('checked', true);
        });
    })
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
                    isUpdate: true,
                    tani_id: <?php echo $_GET['tani_id']; ?>,
                    tani_num: <?php echo $_GET['tani_num']; ?>,
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