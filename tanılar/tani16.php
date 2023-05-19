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
$average_sleep_time = isset($_GET['average_sleep_time']) ? $_GET['average_sleep_time'] : "NaN";
$sleep_problem = isset($_GET['sleep_problem']) ? $_GET['sleep_problem'] : "NaN";
$restlessness = isset($_GET['restlessness']) ? $_GET['restlessness'] : "NaN";
$fatigue  = isset($_GET['fatigue ']) ? $_GET['fatigue'] : "NaN";
$hospital_environment_factors = isset($_GET['hospital_environment_factors']) ? $_GET['hospital_environment_factors'] : "NaN";

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
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">
                                <?php         
                                echo "<p class='matchedfields' id='average_sleep_time' style='".($average_sleep_time == 'NaN' ? 'color: red' : 'color:blue ' )."'>Ortalama uyku süresi: ".$average_sleep_time."</p>";
                                echo "<p class='matchedfields' id='sleep_problem' style='".($sleep_problem == 'NaN' ? 'color:red ' : 'color: blue' )."'>Uykuda sorun:".$sleep_problem."</p>";
                                echo "<p class='matchedfields' id='restlessness' style='".($restlessness == 'NaN' ? 'color:red ' : 'color: blue' )."'>Huzursuzluk:".$restlessness."</p>";
                                echo "<p class='matchedfields' id='fatigue' style='".($fatigue == 'NaN' ? 'color:red ' : 'color: blue' )."'> Yorgunluk:".$fatigue."</p>";
                                echo "<p class='matchedfields' id='hospital_environment_factors' style='".($hospital_environment_factors == 'NaN' ? 'color:red ' : 'color: blue' )."'>Hastane ortamında uykusunu etkileyen faktörler:".$hospital_environment_factors."</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">OUyku örüntüsünde bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın gece bölünmeden uyuduğunun gözlemlenmesi</p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın gece uykusunda sürekli bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın gece uykusunda sürekli bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın gece uykusunda sık sık bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın gece uykusunda sık sık bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın gece uykusunda bazen bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın gece uykusunda bazen bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hastanın gece uykusunda nadiren bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın gece uykusunda nadiren bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın gece uykusunda bölünme yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın gece uykusunda bölünme yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hasta gece iyi uyuduğunu ifade etmesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="noc_indicator" value="1: Hasta sürekli gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta sürekli gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="noc_indicator" value="2: Hasta sık sık gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta sık sık gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="noc_indicator" value="3: Hasta bazen gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="noc_indicator" value="4: Hasta nadiren gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta nadiren gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="
                                        noc_indicator" value="5: Hasta gece iyi uyuduğunu ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta gece iyi uyuduğunu ifade eder
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın uyku/aktivite örüntüsü değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın uyku/aktivite örüntüsü değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Kullanılan ilaçların uyku örüntüsüne etkisi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kullanılan ilaçların uyku örüntüsüne etkisi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Uykuyu etkileyen çevresel faktörler tanımlanır, sakin ve sessiz bir çevre sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uykuyu etkileyen çevresel faktörler tanımlanır, sakin ve sessiz bir çevre sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Mümkünse hastaya tek kişilik oda sağlanır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mümkünse hastaya tek kişilik oda sağlanır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Mümkünse hastaya uygun oda arkadaşı sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mümkünse hastaya uygun oda arkadaşı sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Hastanın olağan uyku öncesi rutinlerini sürdürmesi için imkan (kitap okuma, duş yapma, çocuklar için oyuncak/battaniye vb) sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın olağan uyku öncesi rutinlerini sürdürmesi için imkan (kitap okuma, duş yapma, çocuklar için oyuncak/battaniye vb) sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Hastanın gün içerisinde uyuması sınırlandırılır ve bu doğrultuda aktivite planlamasına yardım edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın gün içerisinde uyuması sınırlandırılır ve bu doğrultuda aktivite planlamasına yardım edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Uyumayı desteklemek için masaj, pozisyon verme ve dokunma gibi teknikler uygulanır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uyumayı desteklemek için masaj, pozisyon verme ve dokunma gibi teknikler uygulanır </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Hastanın korku, çözülmemiş problemler ve çatışma gibi uykusuzluğa neden olan faktörleri tanımlamasına yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın korku, çözülmemiş problemler ve çatışma gibi uykusuzluğa neden olan faktörleri tanımlamasına yardımcı olunur</span>
                                </label>
                            </div>

                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Hastaya ve bakım verenlerine uyku örüntüsünün bozulmasına neden olabilecek faktörler (psikolojik, fizyolojik, yaşam tarzı değişiklikleri, uzun süreli çalışma saatleri, nöbetli çalışma vb) hakkında bilgi verilir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya ve bakım verenlerine uyku örüntüsünün bozulmasına neden olabilecek faktörler (psikolojik, fizyolojik, yaşam tarzı değişiklikleri, uzun süreli çalışma saatleri, nöbetli çalışma vb) hakkında bilgi verilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Hamilelik, hastalık, stres gibi durumlarda yeterli uykunun önemi açıklanır ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hamilelik, hastalık, stres gibi durumlarda yeterli uykunun önemi açıklanır </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Uykusunun bölünmemesi için akşam saatlerinde sıvı alımını azaltması ve yatmadan önce tuvalete gitmesi konusunda hastaya bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uykusunun bölünmemesi için akşam saatlerinde sıvı alımını azaltması ve yatmadan önce tuvalete gitmesi konusunda hastaya bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Uykuyu engelleyen yiyecek ve içecekleri (kahve, kola, çay gibi) yatma zamanında tüketmemesi söylenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uykuyu engelleyen yiyecek ve içecekleri (kahve, kola, çay gibi) yatma zamanında tüketmemesi söylenir</span>
                                </label>
                            </div>


                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Gerektiğinde istemde yer alan ilaçlar uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde istemde yer alan ilaçlar uygulanır</span>
                                </label>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın gece bölünmeden uyuduğunun gözlemlenmesi</p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hastanın gece uykusunda sürekli bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın gece uykusunda sürekli bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hastanın gece uykusunda sık sık bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın gece uykusunda sık sık bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hastanın gece uykusunda bazen bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın gece uykusunda bazen bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hastanın gece uykusunda nadiren bölünme var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın gece uykusunda nadiren bölünme var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hastanın gece uykusunda bölünme yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın gece uykusunda bölünme yok
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hasta gece iyi uyuduğunu ifade etmesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="1: Hasta sürekli gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta sürekli gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="2: Hasta sık sık gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta sık sık gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="3: Hasta bazen gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="4: Hasta nadiren gece iyi uyumadığını ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta nadiren gece iyi uyumadığını ifade eder</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2" id="
                                        noc_indicator" value="5: Hasta gece iyi uyuduğunu ifade eder">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta gece iyi uyuduğunu ifade eder 
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
        var average_sleep_time = document.getElementById('average_sleep_time').innerText;
        var sleep_problem = document.getElementById('sleep_problem').innerText;
        var restlessness = document.getElementById('restlessness').innerText;
        var fatigue = document.getElementById('fatigue').innerText;
        var hospital_environment_factors = document.getElementById('hospital_environment_factors').innerText;

    var matchedfields_string = average_sleep_time + " / " + sleep_problem + " / " + restlessness +
        " / " + fatigue + " / " + hospital_environment_factors;
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
                let noc_indicator2 = $("input[type='radio'][name='noc_indicator2']:checked").val();
                let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked").val();
                let noc_indicator_after2 = $("input[type='radio'][name='noc_indicator_after2']:checked").val();
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
                    collaborative_applications += pl14 + "/";
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/insertTanalar/tani16Insert.php',
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
                        noc_indicator2: noc_indicator2,
                        noc_indicator_after: noc_indicator_after,
                        noc_indicator_after2: noc_indicator_after2,
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
                            "<?php echo $base_url; ?>/taniReview/tani16Review.php?patient_id=" +
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