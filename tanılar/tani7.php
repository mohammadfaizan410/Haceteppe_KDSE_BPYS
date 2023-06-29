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

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Akut ağrı </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın ağrısı olmadığını ifade etmesi </p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="1: Hastanın çok şiddetli düzeyde ağrısı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın çok şiddetli düzeyde ağrısı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="2: Hastanın şiddetli düzeyde ağrısı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın şiddetli düzeyde ağrısı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="3: Hastanın orta düzeyde ağrısı var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın orta düzeyde ağrısı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="4: Hastanın hafif düzeyde ağrısı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın hafif düzeyde ağrısı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın ağrısı yok  ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın ağrısı yok
                                        </span>
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
                                    value="Hastanın ağrısı değerlendirilir: yeri, başlangıç zamanı, türü, şiddeti ve sıklığı, arttıran ve azaltan faktörler, ağrıyla ilgili önceki deneyimleri.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ağrısı değerlendirilir: yeri, başlangıç
                                        zamanı, türü, şiddeti ve sıklığı, arttıran ve azaltan faktörler, ağrıyla ilgili
                                        önceki deneyimleri.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Hastanın ağrıyla ilgili davranışları değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ağrıyla ilgili davranışları
                                        değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Hasta, rahatlamasına yardımcı olabilecek girişimleri- pozisyon değiştirme, sırt masajı, sıcak soğuk uygulama, gevşeme teknikleri, vb- yapması için desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta, rahatlamasına yardımcı olabilecek girişimleri-
                                        pozisyon değiştirme, sırt masajı, sıcak soğuk uygulama, gevşeme teknikleri, vb-
                                        yapması için desteklenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Televizyon, radyo, oyun ve ziyaretçilerden yararlanılarak hastanın ağrı ve rahatsızlıktan ziyade aktivitelere odaklanması sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Televizyon, radyo, oyun ve ziyaretçilerden
                                        yararlanılarak hastanın ağrı ve rahatsızlıktan ziyade aktivitelere odaklanması
                                        sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Hastaya rahatsızlık verebilecek çevresel faktörler (gürültü, aydınlanma, sıcaklık gibi) kontrol altına alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya rahatsızlık verebilecek çevresel faktörler
                                        (gürültü, aydınlanma, sıcaklık gibi) kontrol altına alınır</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt7"
                                    value="Ağrının nedenleri, ne kadar süreceği ve girişimlerle ilgili yaşanabilecek sorunlar hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağrının nedenleri, ne kadar süreceği ve girişimlerle
                                        ilgili yaşanabilecek sorunlar hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt8"
                                    value="Ağrıyı arttıran faktörler ve baş etmede kullanılabilecek yöntemler konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağrıyı arttıran faktörler ve baş etmede
                                        kullanılabilecek yöntemler konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9"
                                    value="Ağrılı aktiviteler sırasında, sonrasında eğer mümkünse ağrı ortaya çıkmadan ya da artmadan önce farmakolojik ve nonfarmakalojik teknikleri birlikte kullanması hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağrılı aktiviteler sırasında, sonrasında eğer mümkünse
                                        ağrı ortaya çıkmadan ya da artmadan önce farmakolojik ve nonfarmakalojik
                                        teknikleri birlikte kullanması hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education"
                                    id="nurse_attempt10"
                                    value="Ağrı giderilmediği takdirde hemşireye haber verilmesi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Ağrı giderilmediği takdirde hemşireye haber verilmesi
                                        konusunda bilgi verilir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">İş Birliği Gerektiren Uygulamalar:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt11" value="İstemde yer alan ilaçlar (analjezikler) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (analjezikler)
                                        uygulanır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                                <p class="usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın ağrısı olmadığını ifade etmesi </p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="1: Hastanın çok şiddetli düzeyde ağrısı var">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">1: Hastanın çok şiddetli düzeyde ağrısı
                                                var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after" value="2: Hastanın şiddetli düzeyde ağrısı var">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">2: Hastanın şiddetli düzeyde ağrısı var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after" value="3: Hastanın orta düzeyde ağrısı var ">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">3: Hastanın orta düzeyde ağrısı var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after" value="4: Hastanın hafif düzeyde ağrısı var">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">4: Hastanın hafif düzeyde ağrısı var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="
                                        noc_indicator_after" value="5: Hastanın ağrısı yok  ">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">5: Hastanın ağrısı yok
                                            </span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım
                                planında tanımlı tanı olacak. </p>
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
                    table: 'tani7',
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