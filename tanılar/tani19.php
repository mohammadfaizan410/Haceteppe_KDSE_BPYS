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
$Dispne  = isset($_GET['Dispne ']) ? $_GET['Dispne '] : "NaN";
$systolic_bp = isset($_GET['systolic_bp']) ? $_GET['systolic_bp'] : "NaN";
$diastolic_bp = isset($_GET['diastolic_bp']) ? $_GET['diastolic_bp'] : "NaN";
$pulse_rate   = isset($_GET['pulse_rate  ']) ? $_GET['pulse_rate '] : "NaN";
$fatigue  = isset($_GET['fatigue ']) ? $_GET['fatigue '] : "NaN";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>e-BYRYS-KKDS</title>
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
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">
                                <?php         
                                echo "<p class='matchedfields' id='Dispne' style='".($Dispne == 'NaN' ? 'color: red' : 'color:blue ' )."'>Ortalama uyku süresi: ".$Dispne."</p>";
                                echo "<p class='matchedfields' id='systolic_bp' style='".($systolic_bp == 'NaN' ? 'color:red ' : 'color: blue' )."'>Uykuda sorun:".$systolic_bp."</p>";
                                echo "<p class='matchedfields' id='diastolic_bp' style='".($diastolic_bp == 'NaN' ? 'color:red ' : 'color: blue' )."'>Huzursuzluk:".$diastolic_bp."</p>";
                                echo "<p class='matchedfields' id='pulse_rate' style='".($pulse_rate == 'NaN' ? 'color:red ' : 'color: blue' )."'> Rahatsızlık :".$pulse_rate."</p>";
                                echo "<p class='matchedfields' id='fatigue' style='".($fatigue == 'NaN' ? 'color:red ' : 'color: blue' )."'>Kaşıntı :".$fatigue."</p>";
                                ?>
                            </div>

                        </div>
                         <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Aktivite intoleransı  </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın aktivite toleransı göstermesi  </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="1:Hastanın aktiviteye toleransı yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1:Hastanın aktiviteye toleransı yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2:Hastanın aktiviteye toleransı sık sık yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2:Hastanın aktiviteye toleransı sık sık yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="3:Hastanın aktiviteye toleransı bazen yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3:Hastanın aktiviteye toleransı bazen yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="4:Hastanın aktiviteye toleransı nadiren yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4:Hastanın aktiviteye toleransı nadiren yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın aktivite toleransı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın aktivite toleransı var 
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Aktiviteye karşı gelişen kardiyorespiratör yanıt değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aktiviteye karşı gelişen kardiyorespiratör yanıt değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Aktivite öncesi, sırası ve sonrası yaşamsal bulgu takibi yapılır ve yaşamsal bulgular hasta için beklenen sınırlarda değilse ya da aktivitenin tolere edilmediğine dair belirti ve bulgu (göğüs ağrısı, vertigo, dispne) varsa aktivite sonlandırılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aktivite öncesi, sırası ve sonrası yaşamsal bulgu takibi yapılır ve yaşamsal bulgular hasta için beklenen sınırlarda değilse ya da aktivitenin tolere edilmediğine dair belirti ve bulgu (göğüs ağrısı, vertigo, dispne) varsa aktivite sonlandırılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Aktiviteyi arttırmaya yönelik hastanın motivasyonu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aktiviteyi arttırmaya yönelik hastanın motivasyonu değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Hastanın tolere edebileceği kadar yavaş bir şekilde pozisyon değiştirmesine, oturmasına, kalkmasına, hareket etmesine yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tolere edebileceği kadar yavaş bir şekilde pozisyon değiştirmesine, oturmasına, kalkmasına, hareket etmesine yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Yeterli enerji sağlamak için besin alımı değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeterli enerji sağlamak için besin alımı değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Hastanın uyku düzeni izlenir ve günlük toplam uyku süresi kaydedilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın uyku düzeni izlenir ve günlük toplam uyku süresi kaydedilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="İhtiyaç olması halinde, hastaya fiziksel aktivitelerde destek olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İhtiyaç olması halinde, hastaya fiziksel aktivitelerde destek olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="Hastanın ağrısı bir faktör ise, aktivite öncesinde ağrının yönetilmesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ağrısı bir faktör ise, aktivite öncesinde ağrının yönetilmesi sağlanır</span>
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9"
                                    value="Hastanın enerjisinin yüksek olduğu zamanlara aktivite planlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın enerjisinin yüksek olduğu zamanlara aktivite planlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10"
                                value="Aktivite ve dinlenme periyotlarını sırasıyla yapması için teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aktivite ve dinlenme periyotlarını sırasıyla yapması için teşvik edilir</span>
                                </label>
                            </div>
                            
                            <p class="usernamelabel">Eğitim:</p>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                id="nurse_attempt11"
                                value="Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kas gücünü korumak ve geliştirmek için aktif ve pasif ROM egzersizleri konusunda bilgilendirilir ve yapması konusunda hasta desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt12"
                                    value="Sıklıkla kullandığı objeler hastanın kolay ulaşabileceği yerde bulundurmak gibi enerjinin korunmasına yönelik tedbirler öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sıklıkla kullandığı objeler hastanın kolay ulaşabileceği yerde bulundurmak gibi enerjinin korunmasına yönelik tedbirler öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt13"
                                    value="Bağımsızlığını ve dayanıklılığını arttırmak için hasta ve bakım verenle birlikte aktiviteler planlanır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Bağımsızlığını ve dayanıklılığını arttırmak için hasta ve bakım verenle birlikte aktiviteler planlanır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt14"
                                        value="Enerji düzeyini korumak ve sürdürmek için hastanın besin tüketimi değerlendirilir ve yeterli beslenmenin önemi anlatılır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Enerji düzeyini korumak ve sürdürmek için hastanın besin tüketimi değerlendirilir ve yeterli beslenmenin önemi anlatılır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt15"
                                        value="Aktivite sırasında gevşeme teknikleri (dikkati başka yöne çekme, hayal kurma gibi) öğretilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Aktivite sırasında gevşeme teknikleri (dikkati başka yöne çekme, hayal kurma gibi) öğretilir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt16"
                                        value="Aktivite sırasında kontrollü nefes kullanımı öğretilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Aktivite sırasında kontrollü nefes kullanımı öğretilir</span>
                                    </label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt17"
                                        value="Hasta ve bakım verenlerine aktivite intoleransı belirti ve bulguları öğretilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Hasta ve bakım verenlerine aktivite intoleransı belirti ve bulguları öğretilir </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt18"
                                        value="Gerekli ise, aktivite sırasında oksijen kullanımı öğretilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Gerekli ise, aktivite sırasında oksijen kullanımı öğretilir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt19"
                                        value="Aktivite intoleransının aile ve iş yaşamına olası etkileri anlatılır ">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Aktivite intoleransının aile ve iş yaşamına olası etkileri anlatılır </span>
                                    </label>
                                </div>
                                <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt20"
                                        value="Kontraendike olmadıkça, beslenme planına yüksek enerjili yiyeceklerin tüketiminin arttırılması için diyetisyenle işbirliği yapılır">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Kontraendike olmadıkça, beslenme planına yüksek enerjili yiyeceklerin tüketiminin arttırılması için diyetisyenle işbirliği yapılır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt21"
                                        value="İş uğraş terapistleriyle birlikte hastaya uygun aktivite programları planlanır ve hastanın uyumu değerlendirilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">İş uğraş terapistleriyle birlikte hastaya uygun aktivite programları planlanır ve hastanın uyumu değerlendirilir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt22"
                                        value="İhtiyaç duyulması halinde, hasta evde bakım hizmetlerinden yararlanabilmesi için yönlendirilir">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">İhtiyaç duyulması halinde, hasta evde bakım hizmetlerinden yararlanabilmesi için yönlendirilir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                        id="nurse_attempt23"
                                        value="Gerekli ise psikolojik destek alabileceği birimlere yönlendirilir ">
                                    <label class="form-check-label" for="nurse_attempt">
                                        <span class="checkbox-header">Gerekli ise psikolojik destek alabileceği birimlere yönlendirilir </span>
                                    </label>
                                </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın aktivite toleransı göstermesi  </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1:Hastanın aktiviteye toleransı yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1:Hastanın aktiviteye toleransı yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2:Hastanın aktiviteye toleransı sık sık yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2:Hastanın aktiviteye toleransı sık sık yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3:Hastanın aktiviteye toleransı bazen yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3:Hastanın aktiviteye toleransı bazen yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4:Hastanın aktiviteye toleransı nadiren yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4:Hastanın aktiviteye toleransı nadiren yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hastanın aktivite toleransı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın aktivite toleransı var 
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
                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">

                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>
    var Dispne = document.getElementById('Dispne').innerText;
    var systolic_bp = document.getElementById('systolic_bp').innerText;
    var diastolic_bp = document.getElementById('diastolic_bp').innerText;
    var pulse_rate = document.getElementById('pulse_rate').innerText;
    var fatigue = document.getElementById('fatigue').innerText;
   
    var matchedfields_string = Dispne + " / " + systolic_bp + " / " + diastolic_bp +
        " / " + pulse_rate + " / " + fatigue;
    </script>

    <script>
    $(function() {
        $('#closeBtn').click(function(e) {
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
                                        $userid = isset($_GET['patient_id']) ?$_GET['patient_id'] : 20;
                                        echo $userid
                                        ?>;
                let patient_name = "<?php
                                        echo urldecode(isset($_GET['patient_name']) ? $_GET['patient_name'] : "test");
                                        ?>";
                let yourDate = new Date();
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let problem_info = matchedfields_string;
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
                var l20 = document.getElementById("nurse_attempt20");
                var l21 = document.getElementById("nurse_attempt21");
                var l22 = document.getElementById("nurse_attempt22");
                var l23 = document.getElementById("nurse_attempt23");

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
                    nurse_education += pl18 + "/";
                }
                if (l19.checked == true) {
                    var pl19 = document.getElementById("nurse_attempt19").value;
                    nurse_education += pl19 + "/";
                }
                if (l20.checked == true) {
                    var pl20 = document.getElementById("nurse_attempt20").value;
                    collaborative_applications += pl20 + "/";
                }
                if (l21.checked == true) {
                    var pl21 = document.getElementById("nurse_attempt21").value;
                    collaborative_applications += pl21 + "/";
                }
                if (l22.checked == true) {
                    var pl22 = document.getElementById("nurse_attempt22").value;
                    collaborative_applications += pl22 + "/";
                }
                if (l23.checked == true) {
                    var pl23 = document.getElementById("nurse_attempt23").value;
                    collaborative_applications += pl23 + "/";
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/insertTanalar/tani19Insert.php',
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
                        nurse_education :nurse_education,
                        collaborative_applications: collaborative_applications,
                        evaluation: evaluation,
                        matchedfields_string: matchedfields_string,
                    },
                    success: function(data) {
                        console.log("something happened")
                        alert(data);
                        let url =
                            "<?php echo $base_url; ?>/taniReview/tani19Review.php?patient_id=" +
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