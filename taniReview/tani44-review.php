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
$root_id = $_GET['root_id'];
$parent_id = $_GET['parent_id'];
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$display = $_GET['display'];
$sql = "SELECT * FROM tani where tani_id= $tani_id and tani_num=$tani_num";
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
                            <p class="tanıdescription">Vücut sıcaklığında dengesizlik riski</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın vücut sıcaklığının normal sınırlarda olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="1">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada şiddetli düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada önemli düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="3">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada orta düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="4">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada hafif düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın vücut sıcaklığı normal sınırlarda, risk devam ediyor</span>
                                    </label>
                                </div>


                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Yaşamsal bulgu takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaşamsal bulgu takibi yapılır</span>
                                </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Hipoterminin (titreme, solgunluk, siyanotik parmak yatağı, kapiller dolumda gecikme, piloereksiyon, distirmi) ve hiperterminin (terlemenin olmaması, bulantı, kusma, üşüme gibi) erken belirti ve bulguları açısından hasta değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipoterminin (titreme, solgunluk, siyanotik parmak yatağı, kapiller dolumda gecikme, piloereksiyon, distirmi) ve hiperterminin (terlemenin olmaması, bulantı, kusma, üşüme gibi) erken belirti ve bulguları açısından hasta değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Çevre sıcaklığı hastanın durumuna göre ayarlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Çevre sıcaklığı hastanın durumuna göre ayarlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hyperthermia"
                                    value="Hipertermi için:">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipertermi için:</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hyperthermia_val1"
                                        value="Sıcak günlerde yeterli miktarda sıvı alımı desteklenir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Sıcak günlerde yeterli miktarda sıvı alımı desteklenir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hyperthermia_val2"
                                        value="Sıcak günlerde aktivite sınırlamasına gidilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Sıcak günlerde aktivite sınırlamasına gidilir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hyperthermia_val3"
                                        value="Kıyafetlerin çevre sıcaklığına uygunluğu değerlendirilir, fazla olan kıyafetler çıkartılır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Kıyafetlerin çevre sıcaklığına uygunluğu değerlendirilir, fazla olan kıyafetler çıkartılır</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hypothermia"
                                    value="Hipotermi için:">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipotermi için:</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hypothermia_val1"
                                        value="Hastanın tolere edebileceği düzeyde aktivitesi arttırılır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Hastanın tolere edebileceği düzeyde aktivitesi arttırılır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hypothermia_val2"
                                        value="Çevre sıcaklığına uygun kıyafetler giymesi sağlanır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Çevre sıcaklığına uygun kıyafetler giymesi sağlanır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt" id="hypothermia_val3"
                                        value="Çevre sıcaklığına uygun kıyafetler giymesi sağlanır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Çevre sıcaklığına uygun kıyafetler giymesi sağlanır</span>
                                    </label>
                                </div>
                            </div>
                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9"
                                    value="Hasta ve bakım verenleri hipotermi (apati, dezoryantasyon ve konfüzyon, sersemlik, hipotansiyon, hipoglisemi, nabız ve solunum hızında azalma, sert ve soğuk cilt) ve hiperterminin (kuru cilt, baş ağrısı, nabızda artış, sinirlilik, halsizlik, ciltte kızarıklık) belirti ve bulguları hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta ve bakım verenleri hipotermi (apati, dezoryantasyon ve konfüzyon, sersemlik, hipotansiyon, hipoglisemi, nabız ve solunum hızında azalma, sert ve soğuk cilt) ve hiperterminin (kuru cilt, baş ağrısı, nabızda artış, sinirlilik, halsizlik, ciltte kızarıklık) belirti ve bulguları hakkında bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt10" value="Hasta ve bakım verenleri sıcaklık değişimiyle meydana gelecek dalgalanmaları en aza indirmek için bilgilendirilir (HİPERTERMİ: Sıcak günlerde yeterli sıvı alımı, aktivite sınırlaması, fazla kıyafetlerin çıkartılması gibi; HİPOTERMİ İÇİN: Hava akımının olmadığı ılık bir banyoda yıkanma, aktivitelerin arttırılması, uygun kıyafetlerin giyilmesi gibi)">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta ve bakım verenleri sıcaklık değişimiyle meydana gelecek dalgalanmaları en aza indirmek için bilgilendirilir (HİPERTERMİ: Sıcak günlerde yeterli sıvı alımı, aktivite sınırlaması, fazla kıyafetlerin çıkartılması gibi; HİPOTERMİ İÇİN: Hava akımının olmadığı ılık bir banyoda yıkanma, aktivitelerin arttırılması, uygun kıyafetlerin giyilmesi gibi)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt11" value="Hasta ve bakım verenlerine vücut sıcaklığının nasıl ölçüleceği öğretilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine vücut sıcaklığının nasıl ölçüleceği öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt12" value="Hasta ve bakım verenlerine gerektiğinde hasta odasında hava sirkülasyonu sağlayan bir fan kullanılması söylenir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine gerektiğinde hasta odasında hava sirkülasyonu sağlayan bir fan kullanılması söylenir</span>
                                </label>
                            </div>
                            <p id="tani_usernamelabel">İşbirliği Gerektiren Uygulamalar</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt13" value="İstemde yer alan farmakolojik yöntemler (antipretik) uygulanır">
                                <label class="form-check-label" for="collaborative_apps">
                                    <span class="checkbox-header">İstemde yer alan farmakolojik yöntemler (antipretik) uygulanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt14" value="Hasta yeterli sıvı alımı konusunda desteklenir, gerektiğinde IV sıvı tedavisi istemde yer aldığı şekilde uygulanır">
                                <label class="form-check-label" for="collaborative_apps">
                                    <span class="checkbox-header">Hasta yeterli sıvı alımı konusunda desteklenir, gerektiğinde IV sıvı tedavisi istemde yer aldığı şekilde uygulanır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription">Risk devam ediyor: 1-5 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.</p>
                            <p class="tanıdescription">Mevcut Tanı:Risk ortaya çıktıysa, gelişen durumla ilgili kayıt ve bakım planı yapılacak.</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın vücut sıcaklığının normal sınırlarda olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">1: Hastada şiddetli düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">2: Hastada önemli düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">3: Hastada orta düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">4: Hastada hafif düzeyde risk var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">5: Hastanın vücut sıcaklığı normal sınırlarda, risk devam ediyor</span>
                                    </label>
                                </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
<script>
     $(function() {
        $('#closeBtn1').click(function(e) {
            if("<?php echo $_SESSION['userlogin']['type']?>" === "student"){
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
            }else{
                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                let patient_name = "<?php echo urldecode($patient_name); ?>";
                let student_id  = <?php echo $student_id ? $student_id : 0   ?>;
                let student_name = "<?php echo urldecode($student_name); ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showTanisTeacher.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name) + "&student_id=" + student_id + "&student_name=" + encodeURIComponent(student_name);
                $("#content").load(url);
        }
    })
    });
    if(<?php echo $_GET['display']; ?> === 1){
        $('form').append('<input type="submit" class="d-flex w-75 submit m-auto justify-content-center mb-5" style="display: block" name="submit" id="submit" value="Kaydet">');
        }
</script>
<script>
    $(document).ready(function(){
        $('input[name="noc_indicator"][value="<?php echo $tani[0]['noc_indicator']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_2"][value="<?php echo $tani[0]['noc_indicator_2']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_3"][value="<?php echo $tani[0]['noc_indicator_3']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after"][value="<?php echo $tani[0]['noc_indicator_after']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after_2"][value="<?php echo $tani[0]['noc_indicator_after_2']; ?>"]').prop('checked', true);
        $('input[name="noc_indicator_after_3"][value="<?php echo $tani[0]['noc_indicator_after_3']; ?>"]').prop('checked', true);

        var nurse_attempt = <?php echo $tani[0]['nurse_attempt']; ?>;
        nurse_attempt.forEach(function(value) {
            $('[name="nurse_attempt"][value="'+value+'"]').prop('checked', true);
        })

        var nurse_education = <?php echo $tani[0]['nurse_education']; ?>;
        nurse_education.forEach(function(value) {
            $('[name="nurse_education"][value="'+value+'"]').prop('checked', true);
        })

        var collaborative_apps = <?php echo $tani[0]['collaborative_apps']; ?>;
        collaborative_apps.forEach(function(value) {
            $('[name="collaborative_apps"][value="'+value+'"]').prop('checked', true);
        })

        if ($('#hyperthermia').is(':checked')) {
                $('#hyperthermia_val1').prop('disabled', false);
                $('#hyperthermia_val2').prop('disabled', false);
                $('#hyperthermia_val3').prop('disabled', false);
                $('#hyperthermia').prop('checked', true);
                $('#hypothermia').prop('checked', false);
                $('#hypothermia_val1').prop('checked', false).prop('disabled', true);
                $('#hypothermia_val2').prop('checked', false).prop('disabled', true);
                $('#hypothermia_val3').prop('checked', false).prop('disabled', true);
            } else if ($('#hypothermia').is(':checked')) {
                $('#hypothermia_val1').prop('disabled', false);
                $('#hypothermia_val2').prop('disabled', false);
                $('#hypothermia_val3').prop('disabled', false);
                $('#hyperthermia').prop('checked', false);
                $('#hypothermia').prop('checked', true);
                $('#hyperthermia_val1').prop('checked', false).prop('disabled', true);
                $('#hyperthermia_val2').prop('checked', false).prop('disabled', true);
                $('#hyperthermia_val3').prop('checked', false).prop('disabled', true);
            }

            $('#hyperthermia').on('change', function(){
                if ($('#hyperthermia').is(':checked')) {
                    $('#hyperthermia_val1').prop('disabled', false);
                    $('#hyperthermia_val2').prop('disabled', false);
                    $('#hyperthermia_val3').prop('disabled', false);
                    $('#hypothermia').prop('checked', false);
                    $('#hypothermia_val1').prop('checked', false).prop('disabled', true);
                    $('#hypothermia_val2').prop('checked', false).prop('disabled', true);
                    $('#hypothermia_val3').prop('checked', false).prop('disabled', true);
                } else {
                    $('#hyperthermia_val1').prop('checked', false).prop('disabled', true);
                    $('#hyperthermia_val2').prop('checked', false).prop('disabled', true);
                    $('#hyperthermia_val3').prop('checked', false).prop('disabled', true);
                }
            })
            
            $('#hypothermia').on('change', function(){
                if ($('#hypothermia').is(':checked')) {
                    $('#hypothermia_val1').prop('disabled', false);
                    $('#hypothermia_val2').prop('disabled', false);
                    $('#hypothermia_val3').prop('disabled', false);
                    $('#hyperthermia').prop('checked', false);
                    $('#hyperthermia_val1').prop('checked', false).prop('disabled', true);
                    $('#hyperthermia_val2').prop('checked', false).prop('disabled', true);
                    $('#hyperthermia_val3').prop('checked', false).prop('disabled', true);
                } else {
                    $('#hypothermia_val1').prop('checked', false).prop('disabled', true);
                    $('#hypothermia_val2').prop('checked', false).prop('disabled', true);
                    $('#hypothermia_val3').prop('checked', false).prop('disabled', true);
                }
            })
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
                } else if ($('#hyperthermia').is(':checked') && (!$('#hyperthermia_val1').is(':checked') && !$('#hyperthermia_val2').is(':checked') && !$('#hyperthermia_val3').is(':checked'))){
                    console.log('hyperthermia', $('#hyperthermia').is(':checked'), $('#hyperthermia_val1').is(':checked'), $('#hyperthermia_val2').is(':checked'), $('#hyperthermia_val3').is(':checked'));
                    $('.option-error').css('display', 'none');
                    $('.option-error1').css('display', 'none');
                    $('.option-error2').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="nurse_attempt"]').offset().top
                        }, 200);
                    $('[name="nurse_attempt"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                } else if ($('#hypothermia').is(':checked') && !$('#hypothermia_val1').is(':checked') && !$('#hypothermia_val2').is(':checked') && !$('#hypothermia_val3').is(':checked')){
                    console.log('hypothermia', $('#hypothermia').is(':checked'), $('#hypothermia_val1').is(':checked'), $('#hypothermia_val2').is(':checked'), $('#hypothermia_val3').is(':checked'));
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
                var nurse_attemt_arr = [];
                        $('[name="nurse_attempt"]:checked').each(function(){
                            nurse_attemt_arr.push($(this).val());
                        });
                        //
                let nurse_attempt = JSON.stringify(nurse_attemt_arr);
                
                var nurse_education_arr = [];
                        $('[name="nurse_education"]:checked').each(function(){
                            nurse_education_arr.push($(this).val());
                        });
                        //
                let nurse_education = JSON.stringify(nurse_education_arr);

                var collaborative_apps_arr = [];
                        $('[name="collaborative_apps"]:checked').each(function(){
                            collaborative_apps_arr.push($(this).val());
                        });
                        //
                let collaborative_apps = JSON.stringify(collaborative_apps_arr);
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
                    
                    tani_num: <?php echo $_GET['tani_num']; ?>,
                    tani_id: <?php echo $_GET['tani_id']; ?>,
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