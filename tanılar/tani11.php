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
$nurtritionArray = ["Bulantı", "Hazımsızlık", "Kusma", "Konstipasyon"];
$bowel_sounds = isset($_GET['bowel_sounds']) ? $_GET['bowel_sounds'] : "NaN";
$last_defacation = isset($_GET['last_defacation']) ? $_GET['last_defacation'] : "NaN";
$stool_feature = isset($_GET['stool_feature']) ? $_GET['stool_feature'] : 'NaN';
$stool_form = isset($_GET['stool_form']) ? $_GET['stool_form'] : 'NaN';
$excretion_problem = isset($_GET['excretion_problem']) ? $_GET['excretion_problem'] : 'NaN';
$nutrition_problem = isset($_GET['nutrition_problem']) ? $_GET['nutrition_problem'] : $nurtritionArray[array_rand($nurtritionArray)];
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
                                
                                echo "<p class='matchedfields' id='bowel_sounds' style='".($bowel_sounds == 'NaN' ? 'color: red' : 'color:blue ' )."'>Bağırsak sesleri: ".$bowel_sounds."</p>";
                                echo "<p class='matchedfields' id='last_defacation' style='".($last_defacation == 'NaN' ? 'color:red ' : 'color: blue' )."'>En son defekasyon:".$last_defacation."</p>";
                                echo "<p class='matchedfields' id='stool_feature' style='".($stool_feature == 'NaN' ? 'color: red' : 'color: blue' )."' >Gaitanın özelliği:".$stool_feature."</p>";
                                echo "<p class='matchedfields' id='stool_form' style='".($stool_feature == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$stool_feature."</p>";
                                echo "<p class='matchedfields' id='excretion_problem' style='".($excretion_problem == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$excretion_problem."</p>";
                                if(in_array($nutrition_problem, $nurtritionArray)){
                                    echo "<p class='matchedfields' id='nutrition_problem' style='color:red;'>Bağırsak Boşaltım sorunu:".$nutrition_problem."</p>";
                                }else{
                                    echo "<p class='matchedfields' id='nutrition_problem' style='color:blue;'>Bağırsak Boşaltım sorunu:".$nutrition_problem."</p>";
                                }
                                ?>
                            </div>

                        </div>
                         <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Konstipasyon</p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın gaitasının normal özellikte olması </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="1: Hastada hiç gaita çıkışı yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada hiç gaita çıkışı yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2: Hastada çok kuru ve çok az miktarda gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada çok kuru ve çok az miktarda gaita çıkışı var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="3: Hastada bazen kuru ve az miktarda gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada bazen kuru ve az miktarda gaita çıkışı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="4: Hastada nadiren kuru gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada nadiren kuru gaita çıkışı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastada yumuşak kıvamlı ve şekilli gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastada yumuşak kıvamlı ve şekilli gaita çıkışı var
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın bağırsak seslerinin normal sınırlarda olması </p>
                        </div>
                        
                        







                            <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator"
                                        value="1:Hastanın bağırsak sesleri yok">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">1:Hastanın bağırsak sesleri yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator"
                                        value="2:Hastanın bağırsak sesleri ciddi düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">2:Hastanın bağırsak sesleri ciddi düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator"
                                        value="3:Hastanın bağırsak seslerinde orta düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">3:Hastanın bağırsak seslerinde orta düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator"
                                        value="4:Hastanın bağırsak seslerinde hafif düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">4:Hastanın bağırsak seslerinde hafif düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="
                                        noc_indicator" value="5:Hastanın bağırsak sesleri normal (6-10/dk)">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">5:Hastanın bağırsak sesleri normal (6-10/dk)
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Bağırsak boşaltım sıklığı ve gaitanın özellikleri (miktar, kıvam, renk) takip edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bağırsak boşaltım sıklığı ve gaitanın özellikleri (miktar, kıvam, renk) takip edilirl</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Bağırsak sesleri düzenli aralıklarla takip edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bağırsak sesleri düzenli aralıklarla takip edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Konstipasyona neden olan ya da katkı sağlayan faktörler (ilaçlar, hareketsizlik, beslenme vb) belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Konstipasyona neden olan ya da katkı sağlayan faktörler (ilaçlar, hareketsizlik, beslenme vb) belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Defekasyon sırasında hasta mahremiyeti sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Defekasyon sırasında hasta mahremiyeti sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Tolere edebileceği ölçüde düzenli egzersiz yapması konusunda hasta teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Tolere edebileceği ölçüde düzenli egzersiz yapması konusunda hasta teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Kullanılan ilaçların gastrointestinal sisteme olan yan etkileri değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kullanılan ilaçların gastrointestinal sisteme olan yan etkileri değerlendirilir</span>
                                </label>
                            </div>
                            

                    



                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt7"
                                    id="nurse_attempt7"
                                    value="Düzenli bağırsak boşaltım alışkanlığının geliştirilmesi için eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Düzenli bağırsak boşaltım alışkanlığının geliştirilmesi için eğitim verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt8"
                                    id="nurse_attempt8"
                                    value="Defekasyonu kolaylaştırmak için, tuvalette iken alt abdomene nasıl masaj yapılacağı öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Defekasyonu kolaylaştırmak için, tuvalette iken alt abdomene nasıl masaj yapılacağı öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt9"
                                    id="nurse_attempt9"
                                    value="Hastaya defekasyon ihtiyacını ertelememesi konusunda bilgi verilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya defekasyon ihtiyacını ertelememesi konusunda bilgi verilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt10"
                                    id="nurse_attempt10"
                                    value="Hasta ve bakım verenleri uzun süreli laksatif kullanımının yan etkileri konusunda bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri uzun süreli laksatif kullanımının yan etkileri konusunda bilgilendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt11"
                                    id="nurse_attempt11"
                                    value="Hasta ve bakım verenlerine bağırsak boşaltımını düzenleyen besinler hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine bağırsak boşaltımını düzenleyen besinler hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt12"
                                    id="nurse_attempt12"
                                    value="Hastaya defekasyon sırasında kendini zorlamasının yaşamsal bulgularda değişikliğe ve kanamaya neden olabileceği hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya defekasyon sırasında kendini zorlamasının yaşamsal bulgularda değişikliğe ve kanamaya neden olabileceği hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt13"
                                    id="nurse_attempt13"
                                    value="İstem yapılan ilaçlar (analjezikler, bronkodilatörler, antiaritmikler, aeresoller, steroidler gibi) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine dirençli konstipasyon ya da tıkaç olması durumunda sağlık kurumuna başvurması konusunda bilgi verilir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt14"
                                    id="nurse_attempt14"
                                    value="Hastanın beslenmesi değerlendirilir ve beslenmenin düzenlenmesi için diyetisyenle görüşülür">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın beslenmesi değerlendirilir ve beslenmenin düzenlenmesi için diyetisyenle görüşülür</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt15"
                                    id="nurse_attempt15"
                                    value="İstemde yer alan ilaçlar (laksatif, analjezik, bağırsak motilitesini düzenleyici) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (laksatif, analjezik, bağırsak motilitesini düzenleyici) uygulanır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex justify    -content-between">
                            
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                           
                           <!--                              -->
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın gaitasının normal özellikte olması </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hastada hiç gaita çıkışı yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada hiç gaita çıkışı yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hastada çok kuru ve çok az miktarda gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada çok kuru ve çok az miktarda gaita çıkışı var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hastada bazen kuru ve az miktarda gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastada bazen kuru ve az miktarda gaita çıkışı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hastada nadiren kuru gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastada nadiren kuru gaita çıkışı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hastada yumuşak kıvamlı ve şekilli gaita çıkışı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastada yumuşak kıvamlı ve şekilli gaita çıkışı var
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>  
                           <!--                              -->

                           <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın bağırsak seslerinin normal sınırlarda olması </p>
                        </div>
                        
                        







                            <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="1:Hastanın bağırsak sesleri yok">
                                    <label class="form-check-label" for="noc_indicator_after2">
                                        <span class="checkbox-header">1:Hastanın bağırsak sesleri yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="2:Hastanın bağırsak sesleri ciddi düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator_after2">
                                        <span class="checkbox-header">2:Hastanın bağırsak sesleri ciddi düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="3:Hastanın bağırsak seslerinde orta düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator_after2">
                                        <span class="checkbox-header">3:Hastanın bağırsak seslerinde orta düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2"
                                        id="noc_indicator"
                                        value="4:Hastanın bağırsak seslerinde hafif düzeyde azalmış">
                                    <label class="form-check-label" for="noc_indicator_after2">
                                        <span class="checkbox-header">4:Hastanın bağırsak seslerinde hafif düzeyde azalmış</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after2" id="
                                        noc_indicator" value="5:Hastanın bağırsak sesleri normal (6-10/dk)">
                                    <label class="form-check-label" for="noc_indicator_after2">
                                        <span class="checkbox-header">5:Hastanın bağırsak sesleri normal (6-10/dk)
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
    var bowel_sounds = document.getElementById('bowel_sounds').innerText;
    var last_defacation = document.getElementById('last_defacation').innerText;
    var stool_feature = document.getElementById('stool_feature').innerText;
    var stool_form = document.getElementById('stool_form').innerText;
    var excretion_problem = document.getElementById('excretion_problem').innerText;
    var nutrition_problem = document.getElementById('nutrition_problem').innerText;

    var matchedfields_string = bowel_sounds + " / " + last_defacation + " / " + stool_feature +
        " / " + stool_form + " / " + excretion_problem + "/" + nutrition_problem;
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
                var l15 = document.getElementById("nurse_attempt15");

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
                    nurse_education += pl8 + "/";
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
                    collaborative_applications += pl14 + "/";
                }
                if (l15.checked == true) {
                    var pl15 = document.getElementById("nurse_attempt15").value;
                    collaborative_applications += pl15 + "/";
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/insertTanalar/tani11Insert.php',
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
                        noc_indicator2: noc_indicator,
                        noc_indicator_after:noc_indicator_after,
                        noc_indicator_after2: noc_indicator_after2,
                        nurse_attempt: nurse_attempt,
                        nurse_education :nurse_education,
                        collaborative_applications:collaborative_applications,
                        evaluation: evaluation,
                        matchedfields_string: matchedfields_string,
                    },
                    success: function(data) {
                        alert(data);
                        let url =
                            "<?php echo $base_url; ?>/taniReview/tani11Review.php?patient_id=" +
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