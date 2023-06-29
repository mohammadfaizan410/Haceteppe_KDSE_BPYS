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
//Nausea, vomiting, lack of apetite
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
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Banyo yapmada öz bakım yetersizliği</p>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın düzenli aralıklarla desteksiz ya da destekle banyo yapması</p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator1" value="1: Hasta hiç banyo yapmıyor ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta hiç banyo yapmıyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator2" value="2: Hasta nadiren banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta nadiren banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator3" value="3: Hasta bazen banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator4" value="4: Hasta sık sık banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta sık sık banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator5" value="5: Hasta düzenli aralıklarla banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta düzenli aralıklarla banyo yapıyor</span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın vücut temizliği günlük olarak değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın vücut temizliği günlük olarak değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Hastanın fonksiyonel becerilerindeki değişiklikler izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın fonksiyonel becerilerindeki değişiklikler izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hasta banyo yapmada bağımsız olması için teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta banyo yapmada bağımsız olması için teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Hasta öz bakımı sırasında kendi hızını belirlemesi için teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta öz bakımı sırasında kendi hızını belirlemesi için teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Hasta öz bakımını tamamıyla kendi üstlenene kadar yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta öz bakımını tamamıyla kendi üstlenene kadar yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Mümkün olduğu kadar hastanın tercihleri ve ihtiyaçlarına (oturarak/ayakta yıkanma, istediği saatte duş alma gibi) göre öz bakım uygulamaları düzenlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Mümkün olduğu kadar hastanın tercihleri ve ihtiyaçlarına (oturarak/ayakta yıkanma, istediği saatte duş alma gibi) göre öz bakım uygulamaları düzenlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Havlu, sabun, deodorant, traş malzemeleri ve diğer gerekli malzemeleri yatak başucuna ya da banyoya yerleştirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Havlu, sabun, deodorant, traş malzemeleri ve diğer gerekli malzemeleri yatak başucuna ya da banyoya yerleştirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Banyo ortamı sıcak tutulur ve banyo süresince mahremiyete önem verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Banyo ortamı sıcak tutulur ve banyo süresince mahremiyete önem verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Hastanın desteksiz ya da destekle banyo yapması sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın desteksiz ya da destekle banyo yapması sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Hastanın derisinin durumu banyo sırasında değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın derisinin durumu banyo sırasında değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11" value="Gerektiğinde sabun yerine durulama gerektirmeyen temizleyiciler kullanılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde sabun yerine durulama gerektirmeyen temizleyiciler kullanılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12" value="Hasta uygun ekipmanla traş edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta uygun ekipmanla traş edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13" value="Gerektiğinde hastanın diş fırçalamasına yardım edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Gerektiğinde hastanın diş fırçalamasına yardım edilir</span>
                                </label>
                            </div>

                            
                           
                            <p id="tani_usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education1" value="Hasta ve bakım verenlerine banyo konusunda alternatif yöntemler hakkında bilgilendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine banyo konusunda alternatif yöntemler hakkında bilgilendirilir</span>
                                </label>
                            </div>
                           
                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps1" value="Hasta ve bakım verenleri evde bakım için sosyal hizmetlere yönlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenleri evde bakım için sosyal hizmetlere yönlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps2" value="Hasta bakım uygulamalarının planlanmasında fizyoterapi ve ergoterapi kaynakları (ayarlanabilir malzemeler) kullanılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta bakım uygulamalarının planlanmasında fizyoterapi ve ergoterapi kaynakları (ayarlanabilir malzemeler) kullanılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps3" value="İstemde yer alan ilaçlar (analjezikler) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (analjezikler) uygulanır</span>
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
                            <p class="tanıdescription">Hastanın düzenli aralıklarla desteksiz ya da destekle banyo yapması</p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after1" value="1: Hasta hiç banyo yapmıyor ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta hiç banyo yapmıyor </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after2" value="2: Hasta nadiren banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta nadiren banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after3" value="3: Hasta bazen banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta bazen banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after4" value="4: Hasta sık sık banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta sık sık banyo yapıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator_after5" value="5: Hasta düzenli aralıklarla banyo yapıyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta düzenli aralıklarla banyo yapıyor</span>
                                    </label>
                                </div>

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
                tani_name = 'tani21';
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