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
$sql = "SELECT * FROM form4 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="form-header">Düşme Bildirimi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta Ad:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name" value="<?php echo $form4[0]['patient_name']; ?>" disabled>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID" value="<?php echo $form4[0]['patient_id']; ?>" disabled>
                        </div>
                        <div class='input-section'>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <input type='radio' class='form-check-input' name='isDusme' id='dusmeYok' value='yok'>
                            <label for="dusmeYok">Düşme Yok</label>
                            <input type='radio' class='form-check-input' name='isDusme' id='dusmeVar' value='var'>
                            <label for="dusmeVar">Düşme Var</label>
        
                        </div>
                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Cinsiyet : </p>
                            <input type="text" class="form-control" required name="patient_gender" id="diger" placeholder="Hasta Cinsiyetini Giriniz" value="<?php echo $form4[0]['patient_gender']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Tıbbi Tanı : </p>
                            <input type="text" class="form-control" required name="medical_diagnosis" id="diger" placeholder="Tıbbi Tanıyı Giriniz" value="<?php echo $form4[0]['medical_diagnosis']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşülen Yer : </p>
                            <input type="text" class="form-control" required name="place_of_fall" id="diger" placeholder="Düşülen Yeri Giriniz" value="<?php echo $form4[0]['place_of_fall']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Tarihi : </p>
                            <input type="date" class="form-control" required name="fall_date" id="diger" placeholder="Düşme Tarihini Giriniz" value="<?php echo $form4[0]['fall_date']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Saati : </p>
                            <input type="time" class="form-control" required name="fall_time" id="diger" placeholder="Düşme Saatini Giriniz" value="<?php echo $form4[0]['fall_time']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Son Düşme Risk Skoru : </p>
                            <input type="number" class="form-control" required name="last_fall_risk_score" id="diger" placeholder="Risk Skorunu Giriniz" value="<?php echo $form4[0]['last_fall_risk_score']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Yaralanma Durumu : </p>
                            <input type="text" class="form-control" required name="injury_status" id="diger" placeholder="Yaralanma Durumunu Giriniz" value="<?php echo $form4[0]['injury_status']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Yaralanma Şiddeti : </p>
                            <input type="text" class="form-control" required name="injury_severity" id="diger" placeholder="Yaralanma Şiddeti Giriniz" value="<?php echo $form4[0]['injury_severity']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Nedeni : </p>
                            <div class="checkbox-wrapper">
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni1" value="Bireysel">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Bireysel</span>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni2" value="Kurumsal">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Kurumsal</span>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni3" value="Tanı ve Tedavi Prosedürleri">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Tanı ve Tedavi Prosedürleri</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Öncesi Alınan Önlemler : </p>
                            <input type="text" class="form-control" required name="pre_fall_precautions" id="diger" placeholder="Alınan Önlemleri Giriniz" value="<?php echo $form4[0]['pre_fall_precautions']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Öncesi Genel Durumu : </p>
                            <input type="text" class="form-control" required name="pre_fall_general_condition" id="diger" placeholder="Genel Durumu Giriniz" value="<?php echo $form4[0]['pre_fall_general_condition']; ?>">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Sonrası Genel Durumu : </p>
                            <input type="text" class="form-control" required name="post_fall_general_condition" id="diger" placeholder="Genel Durumu Giriniz" value="<?php echo $form4[0]['post_fall_general_condition']; ?>">
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

        $('input[type="radio"][name="isDusme"][value="<?php echo $form4[0]['isDusme']; ?>"]').attr('checked', 'checked');

        var fall_cause = "<?php echo $form4[0]['fall_cause']; ?>"
        if (fall_cause == "Bireysel") {
            console.log(fall_cause);

            document.getElementById('DüşmeNedeni1').setAttribute('checked', 'checked');
        }
        if (fall_cause == "Kurumsal") {
            console.log(fall_cause);

            document.getElementById('DüşmeNedeni2').setAttribute('checked', 'checked');
        }
        if (fall_cause == "Tanı ve Tedavi Prosedürleri") {
            console.log(fall_cause);

            document.getElementById('DüşmeNedeni3').setAttribute('checked', 'checked');
        }
        if (fall_cause == "NaN") {
            console.log(fall_cause);


        }
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {


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
                    let form_num = 4;
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let patient_gender = $("input[name='patient_gender']").val();
                    let yourDate = new Date()
                    let creation_date = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let medical_diagnosis = $("input[name='medical_diagnosis']").val();
                    let place_of_fall = $("input[name='place_of_fall']").val();
                    let fall_date = $("input[name='fall_date']").val();
                    let fall_time = $("input[name='fall_time']").val();
                    let last_fall_risk_score = $("input[name='last_fall_risk_score']").val();
                    let injury_status = $("input[name='injury_status']").val();
                    let injury_severity = $("input[name='injury_severity']").val();
                    let fall_cause = $("input[type='radio'][name='DüşmeNedeni']:checked").val();
                    let pre_fall_precautions = $("input[name='pre_fall_precautions']").val();
                    let pre_fall_general_condition = $("input[name='pre_fall_general_condition']").val();
                    let post_fall_general_condition = $("input[name='post_fall_general_condition']").val();





                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm4.php/',
                        data: {
                            
                            form_id: form_id,
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            patient_name: patient_name,
                            patient_id: patient_id,
                            patient_gender: patient_gender,
                            update_date: updateDate,
                            creation_date: creation_date,
                            medical_diagnosis: medical_diagnosis,
                            place_of_fall: place_of_fall,
                            fall_date: fall_date,
                            fall_time: fall_time,
                            last_fall_risk_score: last_fall_risk_score,
                            injury_status: injury_status,
                            injury_severity: injury_severity,
                            fall_cause: fall_cause,
                            pre_fall_precautions: pre_fall_precautions,
                            pre_fall_general_condition: pre_fall_general_condition,
                            post_fall_general_condition: post_fall_general_condition


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
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                                'type': 'error'
                            })
                        }
                    })



                }
            })

        });
    </script>
    
</body>

</html>