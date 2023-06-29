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

$tanı_dispne = $_GET['tanı_dispne'];
$tanı_IletisimEngeli = $_GET['tanı_IletisimEngeli'];
$tanı_PersonelleIletisim = $_GET['tanı_PersonelleIletisim'];
$tanı_Trakeostomi = $_GET['tanı_Trakeostomi'];
$tanı_EndotrakealTüp = $_GET['tanı_EndotrakealTüp'];
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
                                <p class="matchedfields" id="field_dispne"></p>
                                <p class="matchedfields" id="field_IletisimEngeli"></p>
                                <p class="matchedfields" id="field_PersonelleIletisim"></p>
                                <p class="matchedfields" id="field_Trakeostomi"></p>
                                <p class="matchedfields" id="field_EndotrakealTüp"></p>
                                

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Sözel iletişimde bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın bakım verenleri ve sağlık profesyoneli ile iletişim kurması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta hiç iletişim kurmaz </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta nadiren iletişim kurar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen iletişim kurar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4 : Hasta çoğunlukla iletişim kurar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hastanın iletişim kurmasında sorun yok
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın anadili, konuşma, işitme, okuma, anlama becerisi, diğerleriyle iletişim kurma becerisi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın anadili, konuşma, işitme, okuma, anlama becerisi, diğerleriyle iletişim kurma becerisi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hastayla düzenli bir şekilde birebir iletişim kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastayla düzenli bir şekilde birebir iletişim kurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hastayla yavaş yavaş, açıkça, alçak sesle ve yüzüne bakarak iletişim kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastayla yavaş yavaş, açıkça, alçak sesle ve yüzüne bakarak iletişim kurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hastaya basit ve açık direktifler verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya basit ve açık direktifler verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Rahat, aceleci olmayan ve yargılamayan bir tavırla bakım verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Rahat, aceleci olmayan ve yargılamayan bir tavırla bakım verilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="İki yönlü optimal iletişimi sağlamak için yardımcı araçlar (kartlar, görsel materyaller, kelime listeleri, bilgisayar) kullanılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İki yönlü optimal iletişimi sağlamak için yardımcı araçlar (kartlar, görsel materyaller, kelime listeleri, bilgisayar) kullanılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Hasta ile iletişimde bakım verenlerden ya da hastane çevirmeninden yardım alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile iletişimde bakım verenlerden ya da hastane çevirmeninden yardım alınır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="İletişim bozukluğu olan hastalara bağırmaktan kaçınılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İletişim bozukluğu olan hastalara bağırmaktan kaçınılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="İşitme engelli hastanın dikkatini çekmek için dokunulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İşitme engelli hastanın dikkatini çekmek için dokunulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="İşitme engeli olan hastayla iletişim kurarken, sağlık profesyoneli ağzının görünür olduğundan emin olur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İşitme engeli olan hastayla iletişim kurarken, sağlık profesyoneli ağzının görünür olduğundan emin olur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="İşitme engeli olan hasta, işitme cihazı kullanımı konusunda desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İşitme engeli olan hasta, işitme cihazı kullanımı konusunda desteklenir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Hasta iletişim kurmaya ve isteklerini ifade etmeye teşvik edilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta iletişim kurmaya ve isteklerini ifade etmeye teşvik edilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Hastanın iletişim kurma çabalarına dair olumlu pekiştirme yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın iletişim kurma çabalarına dair olumlu pekiştirme yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14" value="Aşırı gürültüyü ve duyusal stresi azaltmak için çevre düzenlemesi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aşırı gürültüyü ve duyusal stresi azaltmak için çevre düzenlemesi yapılır</span>
                                </label>
                            </div>
                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt15" value="Hastaya neden konuşamadığı ya da anlayamadığı uygun şekilde anlatılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya neden konuşamadığı ya da anlayamadığı uygun şekilde anlatılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt16" value="Uyaran ya da iletişim sağlamak için yakınlarının ziyaretlerinin arttırılması konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Uyaran ya da iletişim sağlamak için yakınlarının ziyaretlerinin arttırılması konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt17" value="Hasta ve bakım verenlerine konuşma cihazlarının (yemek borusundan konuşma, elektrolarenksler, trakeostomi için konuşma valfi vb) kullanımı konusunda eğitim verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine konuşma cihazlarının (yemek borusundan konuşma, elektrolarenksler, trakeostomi için konuşma valfi vb) kullanımı konusunda eğitim verilir</span>
                                </label>
                            </div>
                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt18" value="Gerektiğinde konuşma terapistine yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde konuşma terapistine yönlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt19" value="Gerektiğinde çevirmen desteği alınır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde çevirmen desteği alınır</span>
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
                            <p class="tanıdescription">Hastanın bakım verenleri ve sağlık profesyoneli ile iletişim kurması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="1: Hastanın oksijen satürasyonunda çok şiddetli düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">1: Hasta hiç iletişim kurmaz </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="2: Hastanın oksijen satürasyonunda şiddetli düzeyde bozulma var ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">2: Hasta nadiren iletişim kurar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="3: Hastanın oksijen satürasyonunda orta düzeyde bozulma var  ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">3: Hasta bazen iletişim kurar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after" value="4 : Hastanın oksijen satürasyonunda hafif düzeyde bozulma var">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">4 : Hasta çoğunlukla iletişim kurar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                    noc_indicator_after" value="5: Hastanın oksijen satürasyonunda bozulma yok ">
                                    <label class="form-check-label" for="noc_indicator_after">
                                        <span class="checkbox-header">5: Hastanın iletişim kurmasında sorun yok
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
        var tanı_dispne = <?= json_encode($tanı_dispne, JSON_UNESCAPED_UNICODE); ?>;;
        var tanı_IletisimEngeli = <?= json_encode($tanı_IletisimEngeli, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_PersonelleIletisim = <?= json_encode($tanı_PersonelleIletisim, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_Trakeostomi = <?= json_encode($tanı_Trakeostomi, JSON_UNESCAPED_UNICODE); ?>;
        var tanı_EndotrakealTüp = <?= json_encode($tanı_EndotrakealTüp, JSON_UNESCAPED_UNICODE); ?>;
        var field_dispne = document.getElementById('field_dispne');
        var field_IletisimEngeli = document.getElementById('field_IletisimEngeli');
        var field_PersonelleIletisim = document.getElementById('field_PersonelleIletisim');
        var field_Trakeostomi = document.getElementById('field_Trakeostomi');
        var field_EndotrakealTüp = document.getElementById('field_EndotrakealTüp');



        var dispne_string = "Solunum Sorunu: " + tanı_dispne;
        field_dispne.innerHTML = dispne_string;

        var IletisimEngeli_string = "Iletisim Engeli " + tanı_IletisimEngeli;
        field_IletisimEngeli.innerHTML = IletisimEngeli_string;

        var PersonelleIletisim_string = "Saglik Personeliyle Iletisim: " + tanı_PersonelleIletisim;
        field_PersonelleIletisim.innerHTML = PersonelleIletisim_string;

        var Trakeostomi_string = "Solunum Yolu: " + tanı_Trakeostomi;
        field_Trakeostomi.innerHTML = Trakeostomi_string;

        var EndotrakealTüp_string = "Solunumun Özelliği: " + tanı_EndotrakealTüp;
        field_EndotrakealTüp.innerHTML = EndotrakealTüp_string;

        if (tanı_dispne == "Var") {
            $('#field_dispne').css("color", "green");
        } else {
            $('#field_dispne').css("color", "red");
        }
        if (tanı_IletisimEngeli == "Var") {
            $('#field_IletisimEngeli').css("color", "green");
        } else {
            $('#field_IletisimEngeli').css("color", "red");
        }
        if (tanı_PersonelleIletisim == "Var") {
            $('#field_PersonelleIletisim').css("color", "green");
        } else {
            $('#field_PersonelleIletisim').css("color", "red");
        }
        if (tanı_Trakeostomi == "Trakeostomi") {
            $('#field_Trakeostomi').css("color", "green");
        } else {
            $('#field_Trakeostomi').css("color", "red");
        }
        if (tanı_EndotrakealTüp == "Endotrakeal Tüp") {
            $('#field_EndotrakealTüp').css("color", "green");
        } else {
            $('#field_EndotrakealTüp').css("color", "red");
        }

        var matchedfields_string = dispne_string + " / " + IletisimEngeli_string + " / " + PersonelleIletisim_string +
            " / " + Trakeostomi_string + " / " + EndotrakealTüp_string;
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
                let nurse_description = "Sözel iletişimde bozulma"
                let noc_output = "Hastanın bakım verenleri ve sağlık profesyoneli ile iletişim kurması"
                let noc_indicator = $("input[type='radio'][name='noc_indicator']:checked").val();
                let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked")
                    .val();

                let evaluation = "";
                console.log("values init")

                if (noc_indicator == "5: Hastanın iletişim kurmasında sorun yok") {
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