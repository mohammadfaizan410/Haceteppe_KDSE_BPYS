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
                            <p class="usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Etkisiz sağlık yönetimi  </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın tedavi programına uyum göstermesi</p>
                        </div>

                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hasta tedavi programına hiç uyum göstermez">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta tedavi programına hiç uyum göstermez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hasta tedavi programına nadiren uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta tedavi programına nadiren uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hasta tedavi programına bazen uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta tedavi programına bazen uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hasta tedavi programına sık sık uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta tedavi programına sık sık uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="5: Hasta tedavi programına sürekli uyum gösterir ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta tedavi programına sürekli uyum gösterir </span>
                                    </label>
                                </div>

                            </div>
                        </div>
                       

                

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın bilgi eksikliğini belirlemek için, hastalığı, komplikasyonları ve önerilen tedavileri anlama düzeyi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın bilgi eksikliğini belirlemek için, hastalığı, komplikasyonları ve önerilen tedavileri anlama düzeyi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Tedavi planını yaşam tarzıyla bütünleştirirken karşılaşılan problem alanlarını tespit etmek için hasta ve bakım verenleri ile görüşülür">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Tedavi planını yaşam tarzıyla bütünleştirirken karşılaşılan problem alanlarını tespit etmek için hasta ve bakım verenleri ile görüşülür</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın istendik değişiklik ile ilgili var olan bilgi ve beceri seviyesi değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın istendik değişiklik ile ilgili var olan bilgi ve beceri seviyesi değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın sosyal ve fiziksel çevresi istendik davranışa yönelik destek derecesi açısından değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın sosyal ve fiziksel çevresi istendik davranışa yönelik destek derecesi açısından değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın tedavi planına uyumunu engelleyen durumları belirlemesinde destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi planına uyumunu engelleyen durumları belirlemesinde destek sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastanın tedavi planına uyumunu başarmada gerçekçi bir plan oluşturmasına yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi planına uyumunu başarmada gerçekçi bir plan oluşturmasına yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hastaya değişim için hedef belirlemede yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya değişim için hedef belirlemede yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Belirlenen hedefi gerçekleştirmede, değiştirilmesi gereken hedef davranışları belirlemede yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Belirlenen hedefi gerçekleştirmede, değiştirilmesi gereken hedef davranışları belirlemede yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hasta ile birlikte davranış değişikliğinin önündeki potansiyel engellerin neler olduğu belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile birlikte davranış değişikliğinin önündeki potansiyel engellerin neler olduğu belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hasta ile birlikte davranış değişikliği için en etkili stratejiler belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile birlikte davranış değişikliği için en etkili stratejiler belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt" value="Hasta öncelikle kendi kendini güçlendirme konusunda teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta öncelikle kendi kendini güçlendirme konusunda teşvik edilir</span>
                                </label>
                            </div>


                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Hasta ve bakım verenlerine hastalık, komplikasyonlar ve önerilen tedaviler hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine hastalık, komplikasyonlar ve önerilen tedaviler hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_education" value="Hasta ve bakım verenlerine sağlık hedeflerine özgü destek kaynakları ile ilgili bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine sağlık hedeflerine özgü destek kaynakları ile ilgili bilgi verilir</span>
                                </label>
                            </div>


                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="collaborative_apps" value="Hastanın tedavi programına nasıl uyum sağlayacağını belirlemek için diğer sağlık çalışanlarıyla işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın tedavi programına nasıl uyum sağlayacağını belirlemek için diğer sağlık çalışanlarıyla işbirliği yapılır</span>
                                </label>
                            </div>

                          

                        </div>


                            
                             
                            
                            
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın tedavi programına uyum göstermesi</p>
                        </div>

                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="1: Hasta tedavi programına hiç uyum göstermez">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hasta tedavi programına hiç uyum göstermez</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="2: Hasta tedavi programına nadiren uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta tedavi programına nadiren uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="3: Hasta tedavi programına bazen uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta tedavi programına bazen uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="4: Hasta tedavi programına sık sık uyum gösterir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta tedavi programına sık sık uyum gösterir</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="noc_indicator" value="5: Hasta tedavi programına sürekli uyum gösterir ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta tedavi programına sürekli uyum gösterir </span>
                                    </label>
                                </div>

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
                    table: 'tani33',
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