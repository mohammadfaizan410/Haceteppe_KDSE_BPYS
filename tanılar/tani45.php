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
                                <p class="matchedfields" id="field_respiratory_rate"></p>
                                <p class="matchedfields" id="field_heart_rate"></p>
                                <p class="matchedfields" id="field_spo2_percentage"></p>
                                <p class="matchedfields" id="field_o2_status"></p>
                                <p class="matchedfields" id="field_respiratory_nature"></p>

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Kan şekeri düzeyinde dengesizlik riski</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kan şekeri düzeyinin normal aralıkta olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                                        <span class="checkbox-header">5: Hastanın kan şekeri düzeyi normal aralıkta, risk devam ediyor</span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Glisemi takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Glisemi takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Hekim istemi ya da kurum prosedürlerine göre serum glikoz düzeyi izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hekim istemi ya da kurum prosedürlerine göre serum glikoz düzeyi izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Hipoglisemi ya da hiperglisemiye neden olan faktörler belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipoglisemi ya da hiperglisemiye neden olan faktörler belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Aldığı-Çıkardığı takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aldığı-Çıkardığı takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Hipoglisemi belirti ve bulguları (kan şekeri < 60 mg/dl, solukluk, taşikardi, terleme, bulanık görme, sinirlilik, konfüzyon) izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipoglisemi belirti ve bulguları (kan şekeri < 60 mg/dl, solukluk, taşikardi, terleme, bulanık görme, sinirlilik, konfüzyon) izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Hiperglisemi belirti ve bulguları (kan şekeri >300 mg/dl, nefeste aseton kokusu, idrarda keton, baş ağrısı, bulanık görme, kusma, poliüri, polidipsi, polifaji, halsizlik, uyuşukluk, hipotansiyon, taşikardi, kussmaul solunum) izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hiperglisemi belirti ve bulguları (kan şekeri >300 mg/dl, nefeste aseton kokusu, idrarda keton, baş ağrısı, bulanık görme, kusma, poliüri, polidipsi, polifaji, halsizlik, uyuşukluk, hipotansiyon, taşikardi, kussmaul solunum) izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="İdrarda keton takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İdrarda keton takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="IV açıklık sürdürülür">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">IV açıklık sürdürülür</span>
                                </label>
                            </div>
                            <p id="tani_usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9"
                                    value="Hasta ve bakım verenlerine diyabet hakkında bakım verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine diyabet hakkında bakım verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt10" value="Glikoz dengesini sağlamak için diyet ve egzersiz hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Glikoz dengesini sağlamak için diyet ve egzersiz hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt11" value="Diyabeti kontrol etmede kullanılan ilaçlar hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Diyabeti kontrol etmede kullanılan ilaçlar hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt12" value="Uygun şekilde glikoz takibi uygulaması hakkında eğitim verilir">
                                <label class="form-check-label" for="nurse_education">
                                    <span class="checkbox-header">Uygun şekilde glikoz takibi uygulaması hakkında eğitim verilir</span>
                                </label>
                            </div>
                            <p id="tani_usernamelabel">İşbirliği Gerektiren Uygulamalar</p>
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaboratıve_apps"
                                    id="nurse_attempt13" value="Diyet yönetimi için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="collaboratıve_apps">
                                    <span class="checkbox-header">Diyet yönetimi için diyetisyenle işbirliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaboratıve_apps"
                                    id="nurse_attempt14" value="İhtiyaç olduğunda ilaçları değiştirmede hasta ve diyabet ekibinin iş birliği yapması sağlanır">
                                <label class="form-check-label" for="collaboratıve_apps">
                                    <span class="checkbox-header">İhtiyaç olduğunda ilaçları değiştirmede hasta ve diyabet ekibinin iş birliği yapması sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaboratıve_apps"
                                    id="nurse_attempt15" value="Hipoglisemi/Hiperglisemi bulguları hakkında hekime bilgi verilir">
                                <label class="form-check-label" for="collaboratıve_apps">
                                    <span class="checkbox-header">Hipoglisemi/Hiperglisemi bulguları hakkında hekime bilgi verilir</span>
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
                            <p class="tanıdescription">Hastanın kan şekeri düzeyinin normal aralıkta olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                                        <span class="checkbox-header">5: Hastanın kan şekeri düzeyi normal aralıkta, risk devam ediyor</span>
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
            var url = "<?php echo $base_url; ?>/updateForms/showAllTanis.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
    </script>
    <script>
        $(function(){
            $("#submit").click(function(e){
                e.preventDefault();
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
                    let noc_indicator_2 = $('.form-check-input[name="noc_indicator_2"]').length > 0 ? $('.form-check-input[name="noc_indicator_2"]:checked').val() : "null";

		        let noc_indicator_3 = $('.form-check-input[name="noc_indicator_3"]').length > 0 ? $('.form-check-input[name="noc_indicator_3"]:checked').val() : "null";

		        let noc_indicator_after_2 = $('.form-check-input[name="noc_indicator_after_2"]').length > 0 ? $('.form-check-input[name="noc_indicator_after_2"]:checked').val() : "null";

		        let noc_indicator_after_3 = $('.form-check-input[name="noc_indicator_after_3"]').length > 0 ? $('.form-check-input[name="noc_indicator_after_3"]:checked').val() : "null";
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
                url:'<?php echo $base_url; ?>/tani-handler/submitOrUpdateTani.php',
                data: {
                    tani_num: 45,
                    table: 'tani45',
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
        })
    </script>
</body>
</html>