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
$sleeping_problem = isset($_GET['sleeping_problem']) ? $_GET['sleeping_problem'] : "NaN";
$exercise_habit = isset($_GET['exercise_habit']) ? $_GET['exercise_habit'] : "NaN";
$family_history = isset($_GET['family_history']) ? $_GET['family_history'] : 'NaN';
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
                                <?php
                                echo "<p class='matchedfields' id='BKI' style='" . ($BKI == 'NaN' ? 'color: red' : 'color:blue ') . "'>BKİ: " . $BKI . "</p>";
                                echo "<p class='matchedfields' id='permitted_food_consumption' style='" . ($permitted_food_consumption == 'NaN' ? 'color:red ' : 'color: blue') . "'>Günlük olarak izin verilen besinlerin tüketimi:" . $permitted_food_consumption . "</p>";
                                echo "<p class='matchedfields' id='sleeping_problem' style='" . ($sleeping_problem == 'NaN' ? 'color: red' : 'color: blue') . "' >Uykuda sorun:" . $sleeping_problem . "</p>";
                                echo "<p class='matchedfields' id='exercise_habit' style='" . ($exercise_habit == 'NaN' ? 'color: red' : 'color: blue') . "'>Egzersiz yapma alışkanlığı:" . $exercise_habit . "</p>";
                                echo "<p class='matchedfields' id='family_history' style='" . ($family_history == 'NaN' ? 'color: red' : 'color: blue') . "'>Soy Geçmiş: " . $family_history . "</p>";
                                ?>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Fazla kilo </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın günlük olarak izin verilen besinleri tüketmesi </p>
                        </div>






                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="1: Hastanın sürekli izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın sürekli izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="2: Hastanın sık sık izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın sık sık izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="3: Hastanın bazen izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın bazen izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="noc_indicator" value="4: Hastanın nadiren izin verilenden daha fazla besin tüketimi var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın nadiren izin verilenden daha fazla besin tüketimi var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1" value="Hastanın ne zaman, nerede, ne yediği ile ilgili bir günlük tutması için teşvik edilir ve geçerli yeme kalıpları tanımlanır   ">
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
                                    <span class="checkbox-header">HHasta ile beraber verilmesi istenen kilo belirlenir</span>
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
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7" value="Hastayla güvene dayalı, destekleyici bir ilişki kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastayla güvene dayalı, destekleyici bir ilişki kurulur</span>
                                </label>
                            </div>
                            

                        
                    



                        <p class="usernamelabel">Eğitim:</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt8" value="Dengeli beslenmek için beslenme ilkeleri ve besin pramitleri hakkında bilgi verilir">
                            <label class="form-check-label" for="nurse_attempt">
                                <span class="checkbox-header">Dengeli beslenmek için beslenme ilkeleri ve besin pramitleri hakkında bilgi verilir </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt9" value="Kompleks karbonhidratlar ve proteinlerden oluşan bir diyet izlemesi ve basit şekerler, fast food, kafein ve yumuşak içeceklerden kaçınması gerektiği anlatılır">
                            <label class="form-check-label" for="nurse_attempt">
                                <span class="checkbox-header">Kompleks karbonhidratlar ve proteinlerden oluşan bir diyet izlemesi ve basit şekerler, fast food, kafein ve yumuşak içeceklerden kaçınması gerektiği anlatılır</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt10" value="Besin tüketimini arttırabileceği için, hastaya okuma, tv izleme gibi aktivitelerle birlikte yemek yememesi konusunda bilgi verilir">
                            <label class="form-check-label" for="nurse_attempt">
                                <span class="checkbox-header">Besin tüketimini arttırabileceği için, hastaya okuma, tv izleme gibi aktivitelerle birlikte yemek yememesi konusunda bilgi verilir</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt11" value="Hastaya ve bakım verenlerine alkol tüketiminin gıda emilimi üzerine etkisi hakkında bilgi verilir">
                            <label class="form-check-label" for="nurse_attempt">
                                <span class="checkbox-header">Hastaya ve bakım verenlerine alkol tüketiminin gıda emilimi üzerine etkisi hakkında bilgi verilir</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="nurse_education" id="nurse_attempt12" value="Hastaya ve bakım verenlerine obezite ya da yeme bozukluğuyla ilişkili olabilecek fiziksel problemler hakkında bilgi verilir">
                            <label class="form-check-label" for="nurse_attempt">
                                <span class="checkbox-header">Hastaya ve bakım verenlerine obezite ya da yeme bozukluğuyla ilişkili olabilecek fiziksel problemler hakkında bilgi verilir</span>
                            </label>
                        </div>

                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="collaborative_apps"
                                    id="nurse_attempt13"
                                    value="Beslenme ihtiyaçlarını karşılamak için gerekli kalori sayısı ve besin tipleri diyetisyenle birlikte belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Beslenme ihtiyaçlarını karşılamak için gerekli kalori sayısı ve besin tipleri diyetisyenle birlikte belirlenir</span>
                                </label>
                            </div>
                        </div>
                  
                        

 



                        <div class="input-section d-flex justify-content-between align-items-start" id="o2-delivery-container">
                        <div class="input-section d-flex ">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın günlük olarak izin verilen besinleri tüketmesi </p>
                        </div>
                            <div>
                                <p class="usernamelabel">NOC Gösterge: </p>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="1: Hastanın sürekli izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın sürekli izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="2: Hastanın sık sık izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın sık sık izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="3: Hastanın bazen izin verilenden daha fazla besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın bazen izin verilenden daha fazla besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                        id="noc_indicator"
                                        value="4: Hastanın nadiren izin verilenden daha fazla besin tüketimi var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın nadiren izin verilenden daha fazla besin tüketimi var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator_after" id="
                                        noc_indicator" value="5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir
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
                                                                <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">



                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>

</script>

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
                                        $userid = isset($_GET['patient_id']) ? $_GET['patient_id'] : 20;
                                        echo $userid
                                        ?>;
                                    $userid = $_GET['patient_id'];
                                   
                let patient_name = "<?php
                                        echo urldecode(isset($_GET['patient_name']) ? $_GET['patient_name'] : "test");
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