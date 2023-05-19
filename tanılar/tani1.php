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

$tanı_respiratory_rate = $_GET['tanı_respiratory_rate'];
$tanı_heart_rate = $_GET['tanı_heart_rate'];
$tanı_spo2_percentage = $_GET['tanı_spo2_percentage'];
$tanı_o2_status = $_GET['tanı_o2_status'];
$tanı_respiratory_nature = $_GET['tanı_respiratory_nature'];
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
                                <p class="matchedfields" id="field_respiratory_rate"></p>
                                <p class="matchedfields" id="field_heart_rate"></p>
                                <p class="matchedfields" id="field_spo2_percentage"></p>
                                <p class="matchedfields" id="field_o2_status"></p>
                                <p class="matchedfields" id="field_respiratory_nature"></p>

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Gaz değişiminde bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın oksijen satürasyonun %95’in üzerinde olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın oksijen satürasyonunda çok şiddetli
                                            düzeyde bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın oksijen satürasyonunda şiddetli
                                            düzeyde bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın oksijen satürasyonunda orta düzeyde
                                            bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4 : Hastanın oksijen satürasyonunda hafif düzeyde
                                            bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın oksijen satürasyonunda bozulma yok
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Yaşamsal bulgu takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaşamsal bulgu takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Pulse oksimetre ile oksijen satürasyonu izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Pulse oksimetre ile oksijen satürasyonu izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Solunum sesleri, hızı, derinliği, efor düzeyi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Solunum sesleri, hızı, derinliği, efor düzeyi
                                        değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hasta solukluk, siyanoz gibi bulgular açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta solukluk, siyanoz gibi bulgular açısından
                                        değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Hastanın bilinç durumu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bilinç durumu değerlendirilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Hastanın ventilasyon potansiyelini en yüksek düzeye çıkartmak için hastaya uygun pozisyon verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ventilasyon potansiyelini en yüksek düzeye
                                        çıkartmak için hastaya uygun pozisyon verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Gerektiğinde istemde yer alan oksijen tedavisi uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde istemde yer alan oksijen tedavisi
                                        uygulanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Kan gazı sonuçları izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kan gazı sonuçları izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Serum elektrolit düzeyleri izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Serum elektrolit düzeyleri izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Uygun sıklıkta ağız bakımı uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uygun sıklıkta ağız bakımı uygulanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Yeterli hidrasyon sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeterli hidrasyon sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Hastanın aspirasyon ihtiyacı değerlendirilir, gerektiğinde aspire edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın aspirasyon ihtiyacı değerlendirilir,
                                        gerektiğinde aspire edilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Hasta ve bakım verenlerine destek ekipmanlarının (kondansatör, oksijen maskesi, spirometre gibi) kullanımı öğretilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine destek ekipmanlarının
                                        (kondansatör, oksijen maskesi, spirometre gibi) kullanımı öğretilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Hasta ve bakım verenlerine uygulanan tedaviler hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine uygulanan tedaviler
                                        hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt15" value="Hasta ve bakım verenlerine solunum ve rahatlama teknikleri hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine solunum ve rahatlama
                                        teknikleri hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt16" value="Hasta ve bakım verenlerine etkili öksürme eğitimi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine etkili öksürme eğitimi
                                        verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt17" value="Hasta ve bakım verenlerine istem yapılan inhalerlerin kullanımı konusunda eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine istem yapılan inhalerlerin
                                        kullanımı konusunda eğitim verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt18" value="Anksiyeteyi azaltmak ve kontrol duygusunu arttırmak için hastaya uygulanacak girişimlerden önce açıklama yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Anksiyeteyi azaltmak ve kontrol duygusunu arttırmak
                                        için hastaya uygulanacak girişimlerden önce açıklama yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt19" value="İstem yapılan ilaçlar (analjezikler, bronkodilatörler, antiaritmikler, aeresoller, steroidler gibi) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstem yapılan ilaçlar (analjezikler, bronkodilatörler,
                                        antiaritmikler, aeresoller, steroidler gibi) uygulanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt20" value="Mekanik ventilasyon uygulanma ihtimali için gerekli hazırlıklar yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mekanik ventilasyon uygulanma ihtimali için gerekli
                                        hazırlıklar yapılır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım
                                planında tanımlı tanı olacak. </p>
                            <p class="tanıdescription"> Sorun çözümlendi:
                                5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak
                            </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın oksijen satürasyonun %95’in üzerinde olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">1: Hastanın oksijen satürasyonunda çok şiddetli
                                            düzeyde bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">2: Hastanın oksijen satürasyonunda şiddetli
                                            düzeyde bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">3: Hastanın oksijen satürasyonunda orta düzeyde
                                            bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">4 : Hastanın oksijen satürasyonunda hafif düzeyde
                                            bozulma var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator_after" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">5: Hastanın oksijen satürasyonunda bozulma yok
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>
                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>
        var tanı_respiratory_rate = <?= json_encode($tanı_respiratory_rate, JSON_UNESCAPED_UNICODE); ?>;;
        var tanı_heart_rate = <?= json_encode($tanı_heart_rate, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_spo2_percentage = <?= json_encode($tanı_spo2_percentage, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_o2_status = <?= json_encode($tanı_o2_status, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_respiratory_nature = <?= json_encode($tanı_respiratory_nature, JSON_UNESCAPED_UNICODE); ?>;
        var field_respiratory_rate = document.getElementById('field_respiratory_rate');
        var field_heart_rate = document.getElementById('field_heart_rate');
        var field_spo2_percentage = document.getElementById('field_spo2_percentage');
        var field_o2_status = document.getElementById('field_o2_status');
        var field_respiratory_nature = document.getElementById('field_respiratory_nature');

        var respiratory_rate_string = "Solunum Hızı: " + tanı_respiratory_rate;
        field_respiratory_rate.innerHTML = respiratory_rate_string;

        var heart_rate_string = "Nabız Hızı: " + tanı_heart_rate;
        field_heart_rate.innerHTML = heart_rate_string;

        var spo2_percentage_string = "SpO2: " + tanı_spo2_percentage;
        field_spo2_percentage.innerHTML = spo2_percentage_string;

        var o2_status_string = "O2 Tedavisi: " + tanı_o2_status;
        field_o2_status.innerHTML = o2_status_string;

        var respiratory_nature_string = "Solunumun Özelliği: " + tanı_respiratory_nature;
        field_respiratory_nature.innerHTML = respiratory_nature_string;

        if (tanı_respiratory_rate < 16 || tanı_respiratory_rate > 20) {
            $('#field_respiratory_rate').css("color", "green");
        } else {
            $('#field_respiratory_rate').css("color", "red");
        }
        if (tanı_heart_rate > 100) {
            $('#field_heart_rate').css("color", "green");
        } else {
            $('#field_heart_rate').css("color", "red");
        }
        if (tanı_spo2_percentage < 95) {
            $('#field_spo2_percentage').css("color", "green");
        } else {
            $('#field_spo2_percentage').css("color", "red");
        }
        if (tanı_o2_status == "Aliyor") {
            $('#field_o2_status').css("color", "green");
        } else {
            $('#field_o2_status').css("color", "red");
        }
        if (tanı_respiratory_nature === "Derin" || tanı_respiratory_nature === "Yüzeyel") {
            $('#field_respiratory_nature').css("color", "green");
        } else {
            $('#field_respiratory_nature').css("color", "red");
        }

        var matchedfields_string = respiratory_rate_string + " / " + heart_rate_string + " / " + spo2_percentage_string +
            " / " + o2_status_string + " / " + respiratory_nature_string;
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
                let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked")
                    .val();

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
                var l20 = document.getElementById("nurse_attempt20");

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
                    nurse_attempt += pl9 + "/";
                }
                if (l10.checked == true) {
                    var pl10 = document.getElementById("nurse_attempt10").value;
                    nurse_attempt += pl10 + "/";
                }
                if (l11.checked == true) {
                    var pl11 = document.getElementById("nurse_attempt11").value;
                    nurse_attempt += pl11 + "/";
                }
                if (l12.checked == true) {
                    var pl12 = document.getElementById("nurse_attempt12").value;
                    nurse_attempt += pl12 + "/";
                }
                if (l13.checked == true) {
                    var pl13 = document.getElementById("nurse_attempt13").value;
                    nurse_attempt += pl13 + "/";
                }
                if (l14.checked == true) {
                    var pl14 = document.getElementById("nurse_attempt14").value;
                    nurse_education += pl14 + "/";
                }
                if (l15.checked == true) {
                    var pl15 = document.getElementById("nurse_attempt15").value;
                    nurse_attempt += pl15 + "/";
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
                    nurse_education += pl18 + "/";
                }
                if (l19.checked == true) {
                    var pl19 = document.getElementById("nurse_attempt19").value;
                    nurse_education += pl19 + "/";
                }
                if (l20.checked == true) {
                    var pl20 = document.getElementById("nurse_attempt20").value;
                    nurse_education += pl20 + "/";
                }


                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/insertTanalar/tani1Insert.php',
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
                        noc_indicator_after: noc_indicator_after,
                        nurse_attempt: nurse_attempt,
                        nurse_education: nurse_education,
                        evaluation: evaluation,
                        matchedfields_string: matchedfields_string,
                    },
                    success: function(data) {
                        console.log("something happened")
                        alert(data);
                        let url =
                            "<?php echo $base_url; ?>/taniReview/tani1Review.php?patient_id=" +
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