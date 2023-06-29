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
    <link href="../style.css" rel="stylesheet">
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
                            <p class="usernamelabel">Sorunla İlişkili Veriler:</p>
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
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Fiziksel mobilitede bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın etkili bir şekilde mobilize olması </p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
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
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

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

                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Üst ekstremitenin gücünü korumak ve geliştirmek için uygun egzersizler konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Üst ekstremitenin gücünü korumak ve geliştirmek için uygun egzersizler konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Yürüyüş için kaymayan ve destekleyici ayakkabı kullanımı için bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yürüyüş için kaymayan ve destekleyici ayakkabı kullanımı için bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Herhangi bir aktivite sırasında postürün ve vücut mekaniğinin nasıl korunacağı konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Herhangi bir aktivite sırasında postürün ve vücut mekaniğinin nasıl korunacağı konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Mobiliteye yardımcı araç gereçlerin (baston, yürüteç, koltuk değneği, tekerlekli sandalye) kullanımı gözlemlenir ve gerekli ise kullanımla ilgili eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mobiliteye yardımcı araç gereçlerin (baston, yürüteç, koltuk değneği, tekerlekli sandalye) kullanımı gözlemlenir ve gerekli ise kullanımla ilgili eğitim verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt15" value="Hastaya ve bakım verenlerine, hastanın cildini kaşıyarak tahriş etmemesi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya ve bakım verenlerine, hastanın cildini kaşıyarak tahriş etmemesi konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt16" value="Güvenli transfer ve ambulasyon konusunda eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Güvenli transfer ve ambulasyon konusunda eğitim verilir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt17" value="Bir egzersiz programı oluşturmak için fizyoterapistle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bir egzersiz programı oluşturmak için fizyoterapistle işbirliği yapılır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt18" value="Hareketliliği geliştirmek ve korumak için bir plan geliştirmede iş terapisti ve fizyoretapistle iş birliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hareketliliği geliştirmek ve korumak için bir plan geliştirmede iş terapisti ve fizyoretapistle iş birliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt19" value="İstemde yer alan ilaçlar gerektiğinde (analjezikler) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar gerektiğinde (analjezikler) uygulanır</span>
                                </label>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın etkili bir şekilde mobilize olması  </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
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
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.</p>
                            <p class="tanıdescription"> Sorun çözümlendi:
                                5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak
                            </p>
                        </div>
                                                                <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">



                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>
        var changing_position = document.getElementById('changing_position').innerText;
        var standing_up = document.getElementById('standing_up').innerText;
        var walking = document.getElementById('walking').innerText;
        var changing_clothes = document.getElementById('changing_clothes').innerText;
        var cleaning_body = document.getElementById('cleaning_body').innerText;
        var wheelchair_use = document.getElementById('wheelchair_use').innerText;
        var cane_use = document.getElementById('cane_use').innerText;
        var walker_use = document.getElementById('walker_use').innerText;
        var crutch_use = document.getElementById('crutch_use').innerText;
        var matchedfields_string = changing_position + " / " + standing_up + " / " + walking +
            " / " + changing_clothes + " / " + cleaning_body + "/" + wheelchair_use + "/" + cane_use + "/" + walker_use + "/" + crutch_use;
    </script>

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
                let problem_info = matchedfields_string
                let nurse_description = "Gaz değişiminde bozulma"
                let noc_output = "Hastanın oksijen satürasyonun %95’in üzerinde olması"
                let noc_indicator = $("input[type='radio'][name='noc_indicator']:checked").val();
                let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked").val();
                let evaluation = "";
                console.log("values init")

                if (noc_indicator == "5: Hastanın oksijen satürasyonunda bozulma yok") {
                    evaluation +=
                        "Sorun çözümlendi:5 gösterge seçildiyse;yeni günde bakım planına bu tanıyı taşımayacak"
                } else {
                    evaluation +=
                        "Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak."
                }
                let nurse_attempt = "";
                let nurse_education = '';
                let collaborative_applications = '';

                var l1 = document.getElementById("nurse_attempt1");
                var l2 = document.getElementById("nurse_attempt2");
                var l3 = document.getElementById("nurse_attempt3");
                var l4 = document.getElementById("nurse_attempt4");
                var l5 = document.getElementById("nurse_attempt5");
                var l6 = document.getElementById("nurse_attempt6");
                var l7 = document.getElementById("nurse_attempt7");
                var l8 = document.getElementById("nurse_attempt8");
                var l9 = document.getElementById("nurse_attempt9");
                var l10 = document.getElementById("nurse_attempt10");
                var l11 = document.getElementById("nurse_attempt11");
                var l12 = document.getElementById("nurse_attempt12");
                var l13 = document.getElementById("nurse_attempt13");
                var l14 = document.getElementById("nurse_attempt14");
                var l15 = document.getElementById("nurse_attempt15");
                var l16 = document.getElementById("nurse_attempt16");
                var l17 = document.getElementById("nurse_attempt17");
                var l18 = document.getElementById("nurse_attempt18");
                var l19 = document.getElementById("nurse_attempt19");


                if (l1.checked == true) {
                    var pl1 = document.getElementById("nurse_attempt1").value;
                    nurse_attempt += pl1 + "/";
                }
                if (l2.checked == true) {
                    var pl2 = document.getElementById("nurse_attempt2").value;
                    nurse_attempt += pl2 + "/";
                }
                if (l3.checked == true) {
                    var pl3 = document.getElementById("nurse_attempt3").value;
                    nurse_attempt += pl3 + "/";
                }
                if (l4.checked == true) {
                    var pl4 = document.getElementById("nurse_attempt4").value;
                    nurse_attempt += pl4 + "/";
                }
                if (l5.checked == true) {
                    var pl5 = document.getElementById("nurse_attempt5").value;
                    nurse_attempt += pl5 + "/";
                }
                if (l6.checked == true) {
                    var pl6 = document.getElementById("nurse_attempt6").value;
                    nurse_attempt += pl6 + "/";
                }
                if (l7.checked == true) {
                    var pl7 = document.getElementById("nurse_attempt7").value;
                    nurse_attempt += pl7 + "/";
                }
                if (l8.checked == true) {
                    var pl8 = document.getElementById("nurse_attempt8").value;
                    nurse_attempt += pl8 + "/";
                }
                if (l9.checked == true) {
                    var pl9 = document.getElementById("nurse_attempt9").value;
                    nurse_education += pl9 + "/";
                }
                if (l10.checked == true) {
                    var pl10 = document.getElementById("nurse_attempt10").value;
                    nurse_education += pl10 + "/";
                }
                if (l11.checked == true) {
                    var pl11 = document.getElementById("nurse_attempt11").value;
                    nurse_education += pl11 + "/";
                }
                if (l12.checked == true) {
                    var pl12 = document.getElementById("nurse_attempt12").value;
                    nurse_education += pl12 + "/";
                }
                if (l13.checked == true) {
                    var pl13 = document.getElementById("nurse_attempt13").value;
                    nurse_education += pl13 + "/";
                }
                if (l14.checked == true) {
                    var pl14 = document.getElementById("nurse_attempt14").value;
                    nurse_education += pl14 + "/";
                }
                if (l15.checked == true) {
                    var pl15 = document.getElementById("nurse_attempt15").value;
                    nurse_education += pl15 + "/";
                }
                if (l16.checked == true) {
                    var pl16 = document.getElementById("nurse_attempt16").value;
                    nurse_education += pl16 + "/";
                }
                if (l17.checked == true) {
                    var pl17 = document.getElementById("nurse_attempt17").value;
                    nurse_education += pl17 + "/";
                }
                if (l18.checked == true) {
                    var pl18 = document.getElementById("nurse_attempt18").value;
                    collaborative_applications += pl18 + "/";
                }
                if (l19.checked == true) {
                    var pl19 = document.getElementById("nurse_attempt19").value;
                    collaborative_applications += pl19 + "/";
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/insertTanalar/tani18Insert.php',
                    data: {
                        name: name,
                        surname: surname,
                        age: age,
                        form_num: form_num,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creationDate,
                        update_date: updateDate,
                        problem_info: problem_info,
                        nurse_description: nurse_description,
                        noc_output: noc_output,
                        noc_indicator: noc_indicator,
                        noc_indicator_after:noc_indicator_after,
                        nurse_attempt: nurse_attempt,
                        nurse_education: nurse_education,
                        collaborative_applications: collaborative_applications,
                        evaluation: evaluation,
                        matchedfields_string: matchedfields_string,
                    },
                    success: function(data) {
                        console.log("something happened")
                        alert(data);
                        let url =
                            "<?php echo $base_url; ?>/taniReview/tani18Review.php?patient_id=" +
                            patient_id + "&patient_name=" + encodeURIComponent(
                                patient_name);
                        $("#content").load(url);
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