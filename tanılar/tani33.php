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

$tanı_TedaviyiKabullenme = $_GET['tanı_TedaviyiKabullenme'];
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
                                <p class="matchedfields" id="field_TedaviyiKabullenme"></p>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Etkisiz sağlık yönetimi</p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın tedavi programına uyum göstermesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta tedavi programına hiç uyum göstermez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta tedavi programına nadiren uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta tedavi programına bazen uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4 : Hasta tedavi programına sık sık uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta tedavi programına sürekli uyum gösterir
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın bilgi eksikliğini belirlemek için, hastalığı, komplikasyonları ve önerilen tedavileri anlama düzeyi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bilgi eksikliğini belirlemek için, hastalığı, komplikasyonları ve önerilen tedavileri anlama düzeyi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Tedavi planını yaşam tarzıyla bütünleştirirken karşılaşılan problem alanlarını tespit etmek için hasta ve bakım verenleri ile görüşülür">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Tedavi planını yaşam tarzıyla bütünleştirirken karşılaşılan problem alanlarını tespit etmek için hasta ve bakım verenleri ile görüşülür</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hastanın istendik değişiklik ile ilgili var olan bilgi ve beceri seviyesi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın istendik değişiklik ile ilgili var olan bilgi ve beceri seviyesi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hastanın sosyal ve fiziksel çevresi istendik davranışa yönelik destek derecesi açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın sosyal ve fiziksel çevresi istendik davranışa yönelik destek derecesi açısından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Hastanın tedavi planına uyumunu engelleyen durumları belirlemesinde destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi planına uyumunu engelleyen durumları belirlemesinde destek sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Hastanın tedavi planına uyumunu başarmada gerçekçi bir plan oluşturmasına yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi planına uyumunu başarmada gerçekçi bir plan oluşturmasına yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Hastaya değişim için hedef belirlemede yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya değişim için hedef belirlemede yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Belirlenen hedefi gerçekleştirmede, değiştirilmesi gereken hedef davranışları belirlemede yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Belirlenen hedefi gerçekleştirmede, değiştirilmesi gereken hedef davranışları belirlemede yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Hasta ile birlikte davranış değişikliğinin önündeki potansiyel engellerin neler olduğu belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile birlikte davranış değişikliğinin önündeki potansiyel engellerin neler olduğu belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Hasta ile birlikte davranış değişikliği için en etkili stratejiler belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile birlikte davranış değişikliği için en etkili stratejiler belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Hasta öncelikle kendi kendini güçlendirme konusunda teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta öncelikle kendi kendini güçlendirme konusunda teşvik edilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Hasta ve bakım verenlerine hastalık, komplikasyonlar ve önerilen tedaviler hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine hastalık, komplikasyonlar ve önerilen tedaviler hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Hasta ve bakım verenlerine sağlık hedeflerine özgü destek kaynakları ile ilgili bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine sağlık hedeflerine özgü destek kaynakları ile ilgili bilgi verilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Hastanın tedavi programına nasıl uyum sağlayacağını belirlemek için diğer sağlık çalışanlarıyla işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi programına nasıl uyum sağlayacağını belirlemek için diğer sağlık çalışanlarıyla işbirliği yapılır</span>
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
                            <p class="tanıdescription">Hastanın tedavi programına uyum göstermesi</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">1: Hasta tedavi programına hiç uyum göstermez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">2: Hasta tedavi programına nadiren uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">3: Hasta tedavi programına bazen uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">4 : Hasta tedavi programına sık sık uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">5: Hasta tedavi programına sürekli uyum gösterir
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>
                                                                <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">


                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>
        var tanı_TedaviyiKabullenme = <?= json_encode($tanı_TedaviyiKabullenme, JSON_UNESCAPED_UNICODE); ?>;;
        var field_TedaviyiKabullenme = document.getElementById('field_TedaviyiKabullenme');

        var TedaviyiKabullenme_string = "Tedaviyi Kabullenme: " + tanı_TedaviyiKabullenme;
        field_TedaviyiKabullenme.innerHTML = TedaviyiKabullenme_string;



        if (tanı_dispne == "Yok") {
            $('#field_TedaviyiKabullenme').css("color", "green");
        } else {
            $('#field_TedaviyiKabullenme').css("color", "red");
        }
    

        var matchedfields_string = TedaviyiKabullenme_string + " / ";
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
                let nurse_description = "Etkisiz sağlık yönetimi"
                let noc_output = "Hastanın tedavi programına uyum göstermesi"
                let noc_indicator = $("input[type='radio'][name='noc_indicator']:checked").val();
                let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked")
                    .val();

                let evaluation = "";
                console.log("values init")

                if (noc_indicator == "5: Hasta tedavi programına sürekli uyum gösterir ") {
                    evaluation +=
                        "Sorun çözümlendi:5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak"
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