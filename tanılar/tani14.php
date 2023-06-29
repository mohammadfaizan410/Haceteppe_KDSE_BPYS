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
$BKI = isset($_GET['BKI']) ? $_GET['BKI'] : "NaN";
$permitted_food_consumption = isset($_GET['permitted_food_consumption']) ? $_GET['permitted_food_consumption'] : "NaN";
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
                                echo "<p class='matchedfields' id='BKI' style='" . ($BKI == 'NaN' ? 'color: red' : 'color:blue ') . "'>BKİ: " . $BKI . "</p>";
                                echo "<p class='matchedfields' id='permitted_food_consumption' style='" . ($permitted_food_consumption == 'NaN' ? 'color:red ' : 'color: blue') . "'>Günlük olarak izin verilen besinlerin tüketimi:" . $permitted_food_consumption . "</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Obezite </p>
                        </div>
                       
                       
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın kilo verme isteğini sözel olarak ifade etmesi</p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın kilo vermeyle ilgili bir isteği yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın kilo vermeyle ilgili bir isteği yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hasta kilo vermeyle ilgili isteğini nadiren dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta kilo vermeyle ilgili isteğini nadiren dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hasta kilo vermeyle ilgili isteğini bazen dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta kilo vermeyle ilgili isteğini bazen dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hasta kilo vermeyle ilgili isteğini sık sık dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta kilo vermeyle ilgili isteğini sık sık dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hasta kilo vermeyle ilgili isteğini sürekli dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta kilo vermeyle ilgili isteğini sürekli dile getiriyor
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p id="tani_usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın ne zaman, nerede, ne yediği ile ilgili bir günlük tutması için teşvik edilir ve geçerli yeme kalıpları tanımlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın ne zaman, nerede, ne yediği ile ilgili bir günlük tutması için teşvik edilir ve geçerli yeme kalıpları tanımlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2" value="Kaydedilmiş besin içerikleri ve kalori alımı izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kaydedilmiş besin içerikleri ve kalori alımı izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3" value="Hasta ile beraber verilmesi istenen kilo belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile beraber verilmesi istenen kilo belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4" value="Kilo vermek için haftalık bir hedef belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kilo vermek için haftalık bir hedef belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5" value="Haftalık kilo takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Haftalık kilo takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6" value="Tolere edebileceği ölçüde düzenli egzersiz yapması konusunda hasta teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Tolere edebileceği ölçüde düzenli egzersiz yapması konusunda hasta teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Yeme bozukluğu ve obezite ile ilişkili olabilecek fiziksel problemlerin (uykunun bölünmesi, uyuma güçlüğü, solunum sıkıntısı, aktivite toleransının azalması vb) fark edilmesi için hastaya yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeme bozukluğu ve obezite ile ilişkili olabilecek fiziksel problemlerin (uykunun bölünmesi, uyuma güçlüğü, solunum sıkıntısı, aktivite toleransının azalması vb) fark edilmesi için hastaya yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8" value="Hastayla güvene dayalı, destekleyici bir ilişki kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastayla güvene dayalı, destekleyici bir ilişki kurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9" value="Hasta ile aşırı yemeye etki edebilecek kişisel sorunları hakkında iletişim kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile aşırı yemeye etki edebilecek kişisel sorunları hakkında iletişim kurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10" value="Kilo verme, diyetin devamlılığı, geliştirilmiş yeme davranışları ve egzersiz için olumlu destek sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kilo verme, diyetin devamlılığı, geliştirilmiş yeme davranışları ve egzersiz için olumlu destek sağlanır</span>
                                </label>
                            </div>


                            <p id="tani_usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt11" value="Kompleks karbonhidratlar ve proteinlerden oluşan bir diyet izlenmesi ve basit şekerler, fast food, kafein ve yumuşak içeceklerden kaçınması için bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kompleks karbonhidratlar ve proteinlerden oluşan bir diyet izlenmesi ve basit şekerler, fast food, kafein ve yumuşak içeceklerden kaçınması için bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt12" value="Tüketilecek gıdanın yağ ve kalori miktarını kontrol etmek için gıda satın alırken etiketlerin nasıl okunacağı öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Tüketilecek gıdanın yağ ve kalori miktarını kontrol etmek için gıda satın alırken etiketlerin nasıl okunacağı öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt13" value="Restoranlarda ve sosyal toplantılarda planlanan kalori ve besin alımı ile uyum içinde yemek seçimi öğretilir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Restoranlarda ve sosyal toplantılarda planlanan kalori ve besin alımı ile uyum içinde yemek seçimi öğretilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt14" value="Diyet danışmanlığı, egzersiz programları, yardımlaşma grupları gibi destek kaynakları hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Diyet danışmanlığı, egzersiz programları, yardımlaşma grupları gibi destek kaynakları hakkında bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt15" value="Hastaya ve bakım verenlerine alkol tüketiminin gıda emilimi üzerine etkisi hakkında bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya ve bakım verenlerine alkol tüketiminin gıda emilimi üzerine etkisi hakkında bilgi verilir</span>
                                </label>
                            </div>

                            <p id="tani_usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps" id="nurse_attempt16" value="Diyet yönetimi ve zayıflama programı için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Diyet yönetimi ve zayıflama programı için diyetisyenle işbirliği yapılır</span>
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
                            <p class="tanıdescription">Hastanın kilo verme isteğini sözel olarak ifade etmesi</p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p id="tani_usernamelabel">NOC Gösterge: </p>

                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hastanın kilo vermeyle ilgili bir isteği yok">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın kilo vermeyle ilgili bir isteği yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hasta kilo vermeyle ilgili isteğini nadiren dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hasta kilo vermeyle ilgili isteğini nadiren dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hasta kilo vermeyle ilgili isteğini bazen dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hasta kilo vermeyle ilgili isteğini bazen dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hasta kilo vermeyle ilgili isteğini sık sık dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hasta kilo vermeyle ilgili isteğini sık sık dile getiriyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hasta kilo vermeyle ilgili isteğini sürekli dile getiriyor">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta kilo vermeyle ilgili isteğini sürekli dile getiriyor
                                        </span>
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