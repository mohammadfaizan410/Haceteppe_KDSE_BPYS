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
$language_problem = isset($_GET['language_problem']) ? $_GET['language_problem'] : "NaN";
$ingestion_problems = isset($_GET['ingestion_problems']) ? $_GET['ingestion_problems'] : "NaN";
$lip_condition = isset($_GET['lip_condition']) ? $_GET['lip_condition'] : "NaN";
$mucous_condition = isset($_GET['mucous_condition']) ? $_GET['mucous_condition'] : "NaN";
$mouth_condition = isset($_GET['mouth_condition']) ? $_GET['mouth_condition'] : "NaN";
$oral_care = isset($_GET['oral_care']) ? $_GET['oral_care'] : "NaN";

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
                            <p id="tani_usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">
                                <?php
                                echo "<p class='matchedfields' id='language_problem' style='" . ($language_problem == 'NaN' ? 'color: red' : 'color:blue ') . "'>Dilde sorun: " . $language_problem . "</p>";
                                echo "<p class='matchedfields' id='ingestion_problems' style='" . ($ingestion_problems == 'NaN' ? 'color:red ' : 'color: blue') . "'>Yeme ve yutma güçlüğü:" . $ingestion_problems . "</p>";
                                echo "<p class='matchedfields' id='lip_condition' style='" . ($lip_condition == 'NaN' ? 'color:red ' : 'color: blue') . "'>Dudakların rengi ve yapısı:" . $lip_condition . "</p>";
                                echo "<p class='matchedfields' id='mucous_condition' style='" . ($mucous_condition == 'NaN' ? 'color:red ' : 'color: blue') . "'> Ağız mukozasında sorun:" . $mucous_condition . "</p>";
                                echo "<p class='matchedfields' id='mouth_condition' style='" . ($mouth_condition == 'NaN' ? 'color:red ' : 'color: blue') . "'>Dişler ve diş etlerinde sorun:" . $mouth_condition . "</p>";
                                echo "<p class='matchedfields' id='oral_care' style='" . ($oral_care == 'NaN' ? 'color:red ' : 'color: blue') . "'>Ağız bakımı :" . $oral_care . "</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Oral mukoz membranda bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın muköz membran bütünlüğünün sağlanması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın muköz membranlarında çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın muköz membranlarında çok şiddetli düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın muköz membranlarında şiddetli  düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın muköz membranlarında şiddetli düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın muköz membranlarında orta düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın muköz membranlarında orta düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hastanın muköz membranlarında hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın muköz membranlarında hafif düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın muköz membranlarında bozulma yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın muköz membranlarında bozulma yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastada ağız kokusunun olmaması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator" value="1: Hastada şiddetli ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada şiddetli ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator" value="2: Hastada ciddi ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada ciddi ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator" value="3: Hastada orta düzeyde ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada orta düzeyde ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="noc_indicator" value="4: Hastada hafif ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada hafif ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_2" id="
                                        noc_indicator" value="5: Hastada ağız kokusu yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastada ağız kokusu yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Ağız ve ağız içi yapıları (dudaklar, dil, mukoz memranlar, dişler, dişetleri, diş protezleri) değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağız ve ağız içi yapıları (dudaklar, dil, mukoz memranlar, dişler, dişetleri, diş protezleri) değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hastanın tat alma, yutma, ses kalitesi ve konforu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tat alma, yutma, ses kalitesi ve konforu değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hastanın ağız hijyeni alışkanlığı ve uygulamaları değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ağız hijyeni alışkanlığı ve uygulamaları değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hasta yemek öncesi ve yemek sonrası ağız bakımını uygulaması için desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta yemek öncesi ve yemek sonrası ağız bakımını uygulaması için desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Bilinci kapalı ya da ağız bakımını kendi kendine yerine getiremeyen hastalara uygun sıklıkta ağız bakımı uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bilinci kapalı ya da ağız bakımını kendi kendine yerine getiremeyen hastalara uygun sıklıkta ağız bakımı uygulanırr</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Baharatlı, tuzlu, asitli, kuru, pürüzlü veya sert gıdaların tüketilmemesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Baharatlı, tuzlu, asitli, kuru, pürüzlü veya sert gıdaların tüketilmemesi sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Şiddetli stomatit varlığında takma dişler çıkartılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Şiddetli stomatit varlığında takma dişler çıkartılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Sıvı alımının arttırılması konusunda hasta desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sıvı alımının arttırılması konusunda hasta desteklenir</span>
                                </label>
                            </div>


                            <p id="tani_usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9" value="Normal ağız ve diş sağlığını sağlamak için, ağız bakımı konusunda bilgi verilir: Yumuşak kıllı diş fırçası ya da tek kullanımlık ağız bakım süngerleri kullanımı gibi.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Normal ağız ve diş sağlığını sağlamak için, ağız bakımı konusunda bilgi verilir: Yumuşak kıllı diş fırçası ya da tek kullanımlık ağız bakım süngerleri kullanımı gibi.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt10" value="Kilo verme, diyetin devamlılığı, geliştirilmiş yeme davranışları ve egzersiz için olumlu destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kilo verme, diyetin devamlılığı, geliştirilmiş yeme davranışları ve egzersiz için olumlu destek sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt11" value="Gliserin, alkol ve diğer kurutucu ajan içeren ağız bakım ürünlerinin kullanılmaması konusunda hasta bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gliserin, alkol ve diğer kurutucu ajan içeren ağız bakım ürünlerinin kullanılmaması konusunda hasta bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt12" value="Şekerli ürünlerin tüketiminden ve sakız kullanımından uzak durması konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Şekerli ürünlerin tüketiminden ve sakız kullanımından uzak durması konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt13" value="İrritasyon ve yanıkları önlemek için tüketmemesi gereken besinler (çok sıcak/çok soğuk besinler, acı ve baharatlı besinler) konusunda bilgi verilir ve rahatsızlığı azaltmak için besinleri ılık olarak tüketmesi önerilir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İrritasyon ve yanıkları önlemek için tüketmemesi gereken besinler (çok sıcak/çok soğuk besinler, acı ve baharatlı besinler) konusunda bilgi verilir ve rahatsızlığı azaltmak için besinleri ılık olarak tüketmesi önerilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt14" value="Diyet danışmanlığı, egzersiz programları, yardımlaşma grupları gibi destek kaynakları hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Stomatit bulgu ve semptomları konusunda ve ne zaman sağlık kurumuna başvurması gerektiği konusunda bilgi verilir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt15" value="Hastanın dengeli bir diyetle besin alımı için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın dengeli bir diyetle besin alımı için diyetisyenle işbirliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt16" value="Mantar enfeksiyonu varsa antifungal gargara ya da oral lokal anestezik kullanımı için hekimle görüşülürr">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mantar enfeksiyonu varsa antifungal gargara ya da oral lokal anestezik kullanımı için hekimle görüşülür</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt17" value="İstem yapılan ilaçlar (analjezik, anestetik, antimikrobiyal, anti-inflamatuar vb) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstem yapılan ilaçlar (analjezik, anestetik, antimikrobiyal, anti-inflamatuar vb) uygulanır</span>
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
                            <p class="tanıdescription">Hastanın muköz membran bütünlüğünün sağlanması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hastanın muköz membranlarında çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın muköz membranlarında çok şiddetli düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hastanın muköz membranlarında şiddetli  düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın muköz membranlarında şiddetli  düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hastanın muköz membranlarında orta düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın muköz membranlarında orta düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hastanın muköz membranlarında hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın muköz membranlarında hafif düzeyde bozulma var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hastanın muköz membranlarında bozulma yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın muköz membranlarında bozulma yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                            
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastada ağız kokusunun olmaması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after_2"
                                        id="noc_indicator"
                                        value="1: Hastada şiddetli ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada şiddetli ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after_2"
                                        id="noc_indicator"
                                        value="2: Hastada ciddi ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada ciddi ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after_2"
                                        id="noc_indicator"
                                        value="3: Hastada orta düzeyde ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada orta düzeyde ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after_2"
                                        id="noc_indicator"
                                        value="4: Hastada hafif ağız kokusu var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada hafif ağız kokusu var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after_2" id="
                                        noc_indicator" value="5: Hastada ağız kokusu yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastada ağız kokusu yok 
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

                $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/insertTanalar/riskTani15Insert.php',
                data: {
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
                    problem_info: problem_info,
                    nurse_description: nurse_description,
                    noc_output: noc_output,
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
                    standalone: $_GET['standalone']
                },
                success: function(data) {
                    console.log("something happened")
                    let url =
                        "<?php echo $base_url; ?>/taniReview/riskTani15Review.php?patient_id=" +
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