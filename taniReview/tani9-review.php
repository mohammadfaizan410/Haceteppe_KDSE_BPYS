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
                            <p id="tani_usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">İdrar boşaltımında bozulma ı</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın idrarını ağrı ve rahatsızlık olmadan yapması </p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada idrar yapma sırasında sürekli ağrı ve
                                            rahatsızlık var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada idrar yapma sırasında sık sık ağrı ve
                                            rahatsızlık var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada idrar yapma sırasında bazen ağrı ve
                                            rahatsızlık var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada idrar yapma sırasında nadiren ağrı ve
                                            rahatsızlık var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastada idrar yapma sırasında ağrı ve
                                            rahatsızlık yok
                                        </span>
                                    </label>
                                </div>


                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın idrar kontrolünü sürdürmesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator2" value="1">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">1: Hastada sürekli inkontinans var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator2" value="2">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">2: Hastada sık sık inkontinans var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator2" value="3">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">3: Hastada bazen inkontinans var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator2" value="4">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">4: Hastada nadiren inkontinans var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="
                                        noc_indicator2" value="5">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">5: Hasta hiç inkontinans yok
                                        </span>
                                    </label>
                                </div>


                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın idrar boşaltımı; sıklık, yoğunluk, koku, miktar, renk açılarından izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın idrar boşaltımı; sıklık, yoğunluk, koku,
                                        miktar, renk açılarından izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hasta yeterli ve uygun sıvı alımı konusunda desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta yeterli ve uygun sıvı alımı konusunda
                                        desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Zamanlı-sözel tuvalete çıkma hatırlatıcıları kullanılarak hastanın idrar kontrolü arttırılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Zamanlı-sözel tuvalete çıkma hatırlatıcıları
                                        kullanılarak hastanın idrar kontrolü arttırılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Gece uykusu öncesi mesane boşaltımı konusunda hasta desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gece uykusu öncesi mesane boşaltımı konusunda hasta
                                        desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Gerekli ise mesane kateterizasyonu uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerekli ise mesane kateterizasyonu uygulanır</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt6" value="Hastaya idrara sıkışması durumunda hemen bu ihtiyacı gidermesi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya idrara sıkışması durumunda hemen bu ihtiyacı
                                        gidermesi konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt7" value="Hasta ve bakım verenlerine idrar yolu enfeksiyonu belirti ve bulguları öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine idrar yolu enfeksiyonu
                                        belirti ve bulguları öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt8" value="Hasta ve bakım verenlerine idrar çıkışının nasıl kaydedileceği hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine idrar çıkışının nasıl
                                        kaydedileceği hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9" value="Perineal bakım konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Perineal bakım konusunda bilgi verilir</span>
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt10" value="Pelvik kas egzersizleri öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Pelvik kas egzersizleri öğretilir
                                    </span>
                                </label>
                            </div>
                            <p class="usernamelabel">İş Birliği Gerektiren Uygulamalar:</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt11" value="İstemde yer alan ilaçlar (antibiyotik, analjezik, entipiretik) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (antibiyotik, analjezik,
                                        entipiretik) uygulanır</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt12" value="Gerektiğinde idrar analizi için örnek alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde idrar analizi için örnek alınır</span>
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
                            <div class="input-section d-flex">
                                <p id="tani_usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın idrarını ağrı ve rahatsızlık olmadan yapması</p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="1">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">1: Hastada idrar yapma sırasında sürekli ağrı
                                                ve rahatsızlık var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="2">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">2: Hastada idrar yapma sırasında sık sık ağrı
                                                ve rahatsızlık var
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="3">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">3: Hastada idrar yapma sırasında bazen ağrı ve
                                                rahatsızlık var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="4">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">4: Hastada idrar yapma sırasında nadiren ağrı
                                                ve rahatsızlık var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator_after" value="5">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">5: Hastada idrar yapma sırasında ağrı ve
                                                rahatsızlık yok
                                            </span>
                                        </label>
                                    </div>


                            </div>
                            <div class="input-section d-flex">
                                <p id="tani_usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın idrar kontrolünü sürdürmesi</p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="noc_indicator2_after" value="1">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">1: Hastada sürekli inkontinans var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="noc_indicator2_after" value="2">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">2: Hastada sık sık inkontinans var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="noc_indicator2_after" value="3">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">3: Hastada bazen inkontinans var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="noc_indicator2_after" value="4">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">4: Hastada nadiren inkontinans var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="
                                        noc_indicator2_after" value="5">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">5: Hasta hiç inkontinans yok
                                            </span>
                                        </label>
                                    </div>

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
                    
                    tani_num: 9,
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