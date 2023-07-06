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
                            <input type='text' class="tanıdescription form-control" id='taniDescription' placeholder='Hemşirelik Tanıları' />
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <input type='text' class="nocCikti form-control" id='nocCikti' placeholder='NOC Çıktıları' />
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <input type='text' class="nocGösterge form-control" id='nocGösterge' placeholder='NOC Gösterge' />

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nurseAttempt form-control" id='nurseAttempt' placeholder='Hemşirelik Girişimleri' />
                            <p class="usernamelabel">Eğitim:</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nurseEducation form-control"  id='nurseEducation' placeholder='Eğitim' />
                            <p class="option-error2" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <input type='text' class="form-control" id='collaborativeApps' placeholder='İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR' />
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">Değerlendirme:</p>
                            <input type='text' class="nocCikti form-control" id='değerlendirme' placeholder='Değerlendirme' />
                        </div>
                        <div class="input-section d-flex">
                            <p id="tani_usernamelabel">NOC Çıktıları:</p>
                            <input type='text' class="nocCikti form-control" id='nocCikti_after' placeholder='NOC Çıktıları' />
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='text' class="nocGösterge form-control" id='nocGösterge_after' placeholder='NOC Gösterge' />
                            </div>

                        </div>
                        <input type="submit" class="d-flex w-75 submit m-auto justify-content-center mb-5" name="submit" id="submit" value="Kaydet">


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
            let nurse_attempt = $('#nurseAttempt').val();
            let nurse_education = $('#nurseEducation').val();
            let collaborative_apps = $('#collaborativeApps').val();
            let noc_indicator = $('#nocGösterge').val();
            let noc_indicator_after = $('#nocGösterge_after').val();
            
                if (firstCheckbox.length > 0) {
                if (secondCheckbox.length > 0 && thirdCheckbox.length > 0) {
                    if (secondCheckbox.is(':checked') && thirdCheckbox.is(':checked')) {
                    let evaluation = 'true';         

                    }
                } else if (secondCheckbox.length > 0) {
                    if (secondCheckbox.is(':checked')) {
                        let evaluation = 'true';         

                    }
                } else {
                    if (firstCheckbox.is(':checked')) {
                        let evaluation = 'true';         

                    }
                }
                }      
                $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/tani-handler/boshTaniHandler.php',
                data: {
                    tani_num: 1,
                    table: 'tani1',
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
                    tani_description: $('#taniDescription').val(),
                    noc_cikti: $('#nocCikti').val(),
                    noc_indicator: noc_indicator,
                    noc_indicator_after: noc_indicator_after,
                    nurse_attempt: nurse_attempt,
                    nurse_education: nurse_education,
                    collaborative_apps: collaborative_apps,
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