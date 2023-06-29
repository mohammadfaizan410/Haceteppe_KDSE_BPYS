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
                            <p class="tanıdescription">Kanama riski</p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kanama belirti ve bulguları göstermemesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
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
                                        <span class="checkbox-header">5: Hastada kanama belirti ve bulgusu yok, risk devam ediyor</span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Yaşamsal bulgu takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaşamsal bulgu takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Hastanın bilinç durumu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bilinç durumu değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Pansumanlarının kanama takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Pansumanlarının kanama takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Yara ve insizyon bölgeleri için kanama takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara ve insizyon bölgeleri için kanama takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Yara iyileşme süreci takip edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yara iyileşme süreci takip edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Hastanın laboratuvar değerleri (Hemoglobin, hematokrit, trombosit, PTZ, INR) takip edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın laboratuvar değerleri (Hemoglobin, hematokrit, trombosit, PTZ, INR) takip edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="Hastada kanamaya sebep olabilecek travmalara (çarpma, burkma, düşme gibi) karşı önlem alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastada kanamaya sebep olabilecek travmalara (çarpma, burkma, düşme gibi) karşı önlem alınır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="Hastaya yapılacak gereksiz invaziv girişimlerden kaçınılır. İnvaziv girişim yapılması halinde, girişim yapılan alan kanama açısından izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya yapılacak gereksiz invaziv girişimlerden kaçınılır.
                                         İnvaziv girişim yapılması halinde, girişim yapılan alan kanama açısından izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9"
                                    value="Gerektiğinde tıraş makinesi ile tıraş yaptırılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde tıraş makinesi ile tıraş yaptırılır</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt10" value="Ağız hijyeni için yumuşak kıllı diş fırçası kullanımı önerilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Ağız hijyeni için yumuşak kıllı diş fırçası kullanımı önerilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt11" value="Hasta bakım verenlerine kanama belirti ve bulguları (nemli/soluk cilt, halsizlik ve baygınlık hissi, hızlı ve yüzeyel solunum, bilinç değişikliği, zayıf ve hızlı nabız, idrarda/gaitada/balgamda kan görülmesi, ciltte kızarıklıkların/morarmaların olması) öğretilir ve bu bulgular saptandığında hemşireyi bilgilendirmeleri gerektiği anlatılır">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta bakım verenlerine kanama belirti ve bulguları (nemli/soluk cilt, halsizlik ve baygınlık hissi,
                                         hızlı ve yüzeyel solunum, bilinç değişikliği, zayıf ve hızlı nabız, idrarda/gaitada/balgamda kan görülmesi,
                                          ciltte kızarıklıkların/morarmaların olması) öğretilir ve bu bulgular saptandığında hemşireyi bilgilendirmeleri gerektiği anlatılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt12"
                                    value="Pıhtılaşma bozukluğu olan hastalara antikoagülan kullanımından uzak durulması hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Pıhtılaşma bozukluğu olan hastalara antikoagülan kullanımından uzak durulması hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt13"
                                    value="Pıhtılaşma bozukluğu olan hastalara K vitamini içeren besinler ve bu besinlerin tüketimi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Pıhtılaşma bozukluğu olan hastalara K vitamini içeren besinler ve bu besinlerin tüketimi konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">İşbirliği Gerektiren Uygulamalar</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt14"
                                    value="Gerektiğinde istem yapılan kan ürünlerinin transfüzyonu yapılır">
                                <label class="form-check-label" for="collaborative_apps">
                                    <span class="checkbox-header">Gerektiğinde istem yapılan kan ürünlerinin transfüzyonu yapılır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription">Risk devam ediyor: 1-5 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.</p>
                            <p class="tanıdescription">Mevcut Tanı:Risk ortaya çıktıysa, gelişen durumla ilgili kayıt ve bakım planı yapılacak.</p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kanama belirti ve bulguları göstermemesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
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
                                        <span class="checkbox-header">5: Hastada kanama belirti ve bulgusu yok, risk devam ediyor</span>
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
        $(function(){
            $("#submit").click(function(e){
                e.preventDefault();

                var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
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
                    let noc_indicator_2 = $('.form-check-input[name="noc_indicator_2"]') ? $('.form-check-input[name=noc_indicator_2]:checked').val() : "null";
		        let noc_indicator_3 = $('.form-check-input[name="noc_indicator_3"]') ? $('.form-check-input[name=noc_indicator_3]:checked').val() : "null";
		        let noc_indicator_after_2 = $('.form-check-input[name="noc_indicator_after_2"]') ? $('.form-check-input[name=noc_indicator_after_2]:checked').val() : "null";
		        let noc_indicator_after_3 = $('.form-check-input[name="noc_indicator_after_3"]') ? $('.form-check-input[name=noc_indicator_after_3]:checked').val() : "null";
                let evaluation = "";
                console.log("values init")

                if (!$('[name="noc_indicator"]').is(':checked')) {
                    evaluation +=
                        "Risk Yok"
                } else {
                    evaluation +=
                        "Risk devam ediyor: 1-5 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak."
                }
                // not to db
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

                $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/insertTanalar/riskTani15Insert.php',
                data: {
                    table: 'tani35',
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
        })
    </script>
</body>
</html>