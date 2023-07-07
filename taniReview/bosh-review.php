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
require_once("../config-students.php");
$userid = $_SESSION['userlogin']['id'];
$tani_id = $_GET['tani_id'];
$tani_num = $_GET['tani_num'];
$root_id = $_GET['root_id'];
$parent_id = $_GET['parent_id'];
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$display = $_GET['display'];
if($root_id == 0 && $parent_id == 0){
    $sql = "SELECT * FROM boshtani where tani_id= $tani_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $tani = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
}else{
    $sql = "SELECT * FROM boshtani where parent_id= $parent_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $tani = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
}
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
    .send-patient {
        align-self: center;
    }
    body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

#tick-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: none; /* Hide the tick container initially */
  align-items: center;
  justify-content: center;
  z-index: 9999;
  background-color: #ffffff;
}

#tick {
  width: 50%;
  height: 50%;
  background-size: contain;
  background-repeat: no-repeat;
  position: absolute;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) translateX(25%);
}
    </style>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>

    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Hemşirelik Tanıları:</p>
                            <input type='text' class="tanıdescription form-control" id='taniDescription' placeholder='Hemşirelik Tanıları'  value=<?php echo json_encode($tani[0]['taniDescription']) ?>/>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <input type='text' class="nocCikti form-control" id='nocCikti' placeholder='NOC Çıktıları' value=<?php echo json_encode($tani[0]['nocCikti']) ?> />
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <input type='text' class="nocGösterge form-control" id='nocGösterge' placeholder='NOC Gösterge'  value=<?php echo json_encode($tani[0]['nocGösterge']) ?>/>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nurseAttempt form-control" id='nurseAttempt' placeholder='Hemşirelik Girişimleri' value=<?php echo json_encode($tani[0]['nurse_attempt']) ?>/>
                            <p class="usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nurseEducation form-control"  id='nurseEducation' placeholder='Eğitim'value=<?php echo json_encode($tani[0]['nurse_education']) ?> />
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <input type='text' class="form-control" id='collaborativeApps' placeholder='İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR' value=<?php echo json_encode($tani[0]['collaborative_apps']) ?>/>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Değerlendirme:</p>
                            <input type='text' class="nocCikti form-control" id='değerlendirme' placeholder='Değerlendirme' value=<?php echo json_encode($tani[0]['değerlendirme']) ?>/>
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <input type='text' class="nocCikti form-control" id='nocCikti_after' placeholder='NOC Çıktıları'value=<?php echo json_encode($tani[0]['nocCikti_after']) ?> />
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nocGösterge form-control" id='nocGösterge_after' placeholder='NOC Gösterge' value=<?php echo json_encode($tani[0]['nocGösterge_after']) ?>/>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>


    </div>

    <script>
        //prefilling


    $(function() {
        $('#closeBtn1').click(function(e) {
            let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
            let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
            var url = "<?php echo $base_url; ?>/updateForms/showSubmittedTanis.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);
        })
    });
    if(<?php echo $display; ?> === 1){
        $('form').append('<input type="submit" class="d-flex w-75 submit m-auto justify-content-center mb-5" style="display: block" name="submit" id="submit" value="Kaydet">');
    }   

    </script>
    <script>
    $(function() {
        $('#submit').click(function(e) {
            console.log("clicked for tani 1")
            e.preventDefault();
            if($('#taniDescription').val() === ''){
                alert("Lütfen bir Hemşirelik Tanısı giriniz");
                return;
            }
            if($('#nocCikti').val() === ''){
                alert("Lütfen bir NOC Çıktısı giriniz");
                return;
            }
            if($('#nocCikti_after').val() === ''){
                alert("Lütfen bir NOC Çıktısı giriniz");
                return;
            }

            if($('#nocGösterge').val() === ''){
                alert("Lütfen bir NOC Göstergesi giriniz");
                return;
            }
            if($('#nurseAttempt').val() === ''){
                alert("Lütfen bir Hemşirelik Girişimi giriniz");
                return;
            }
            if($('#nurseEducation').val() === ''){
                alert("Lütfen bir Eğitim giriniz");
                return;
            }
            if($('#collaborativeApps').val() === ''){
                alert("Lütfen bir İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR giriniz");
                return;
            }
            if($('#nocGösterge_after').val() === ''){
                alert("Lütfen bir NOC Göstergesi giriniz");
                return;
            }
            if($('#değerlendirme').val() === ''){
                alert("Lütfen bir Değerlendirme giriniz");
                return;
            }
            if($('#nocCikti_after').val() === ''){
                alert("Lütfen bir NOC Çıktısı giriniz");
                return;
            }
            if($('#nocGösterge_after').val() === ''){
                alert("Lütfen bir NOC Göstergesi giriniz");
                return;
            }
            


            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
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
            let taniDescription = $('#taniDescription').val();
            let nocCikti = $('#nocCikti').val();
            let nocCikti_after = $('#nocCikti_after').val();
            let nocGösterge = $('#nocGösterge').val();
            let nurse_attempt = $('#nurseAttempt').val();
            let nurse_education = $('#nurseEducation').val();
            let collaborative_apps = $('#collaborativeApps').val();
            let değerlendirme = $('#değerlendirme').val();
            let noc_indicator = $('#nocGösterge').val();
            let noc_indicator_after = $('#nocGösterge_after').val();
                  
                $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/tani-handler/boshTaniHandler.php',
                data: {
                    tani_num: 0,
                    table: 'boshtani',
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
                    tani_description:$('#taniDescription').val(),
                    nocCikti: $('#nocCikti').val(),
                    nocCikti_after: $('#nocCikti_after').val(),
                    nocGösterge: $('#nocGösterge').val(),
                    nocGösterge_after: $('#nocGösterge_after').val(),
                    değerlendirme: $('#değerlendirme').val(),
                    noc_indicator: noc_indicator,
                    noc_indicator_after: noc_indicator_after,
                    nurse_attempt: nurse_attempt,
                    nurse_education: nurse_education,
                    collaborative_apps: collaborative_apps,
                    root_id : <?php echo $_GET['root_id']; ?>,
                    parent_id : <?php echo $_GET['parent_id']; ?>,  
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
    });
    </script>

</body>

</html>