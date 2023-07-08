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
require_once('../config-students.php');
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
if (isset($_GET['display'])) {
    $display = $_GET['display'];
} else {
    $display = 0;
}
$sql = "SELECT * FROM form8 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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

</head>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Ödem Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <img src="./ödem.png" style="width:67%; height:auto;border: 1px solid;border-color: #246174; box-shadow:1px 1px 1px 1px #246174; border-radius: 20px;">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name" value="<?php echo $form8[0]['patient_name']; ?>" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID" value="<?php echo $form8[0]['patient_id']; ?>" disabled>
                        </div>
                        <div class="input-section d-flex" style="padding-top: 5%;">
                            <p class="usernamelabel">Değerlendirilen Alan:</p>
                            <input type="text" class="form-control" required name="assessed_area" id="diger" placeholder="Değerlendirilen Alanı Giriniz" value="<?php echo $form8[0]['assessed_area']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ödemin Şiddeti:</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti1" value="Ödem Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ödem Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti2" value="1">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+1</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti3" value="2">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+2</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti4" value="3">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+3</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti5" value="4">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+4</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($display == 1) {
                            echo '<input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
         $(function() {
                $('#closeBtn1').click(function(e) {
                    e.preventDefault();
                    console.log("close btn clicked");
                    if("<?php echo $_SESSION['userlogin']['type']?>" === "student"){
                        let patient_id = <?php echo $patient_id ? $patient_id : 0   ?> ;
                let patient_name = "<?php echo urldecode($patient_name); ?>";
                    var url = "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" + patient_id +
                        "&patient_name=" + encodeURIComponent(patient_name);
                    $("#content").load(url);}
                    else{
                        let patient_id = <?php echo $patient_id ? $patient_id : 0   ?> ;
                let patient_name = "<?php echo urldecode($patient_name); ?>";
                let student_id  = <?php echo $student_id ? $student_id : 0   ?>;
                let student_name = "<?php echo urldecode($student_name); ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showFormsTeacher.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name) + "&student_id=" + student_id + "&student_name=" + encodeURIComponent(student_name);
                $("#content").load(url);
                    }
                });
            });
        var edema_severity = "<?php echo $form8[0]['edema_severity']; ?>"
        if (edema_severity == "Ödem Yok") {
            console.log(edema_severity);

            document.getElementById('ÖdemŞiddeti1').setAttribute('checked', 'checked');
        }
        if (edema_severity == "1") {
            console.log(edema_severity);

            document.getElementById('ÖdemŞiddeti2').setAttribute('checked', 'checked');
        }
        if (edema_severity == "2") {
            console.log(edema_severity);

            document.getElementById('ÖdemŞiddeti3').setAttribute('checked', 'checked');
        }
        if (edema_severity == "3") {
            console.log(edema_severity);

            document.getElementById('ÖdemŞiddeti4').setAttribute('checked', 'checked');
        }
        if (edema_severity == "4") {
            console.log(edema_severity);

            document.getElementById('ÖdemŞiddeti5').setAttribute('checked', 'checked');
        }
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault()

                var valid = this.form.checkValidity();

                if (valid) {
                    var form_id = <?php echo $form_id ?>;
                    var id = <?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                    var form_id = <?php echo $form_id ?>;
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 8;
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let yourDate = new Date()
                    let creationDate = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let assessed_area = $("input[name='assessed_area']").val();
                    let edema_severity = $("input[type='radio'][name='ÖdemŞiddeti']:checked").val();


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm8.php',
                        data: {
                            
                            form_id: form_id,
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            form_num: form_num,
                            patient_id: patient_id,
                            patient_name: patient_name,
                            creation_date: creationDate,
                            update_date: updateDate,
                            assessed_area: assessed_area,
                            edema_severity: edema_severity
                        },
                        success: function(data) {
                                 let url =
                                "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" +
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
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })


                }
            })

        });
    </script>
    
</body>

</html>