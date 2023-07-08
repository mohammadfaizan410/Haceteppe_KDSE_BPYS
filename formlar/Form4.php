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
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Cinsiyet : </p>
                            <input type="text" class="form-control" required name="patient_gender" id="diger"
                                placeholder="Hasta Cinsiyetini Giriniz" maxlength="10">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Tıbbi Tanı : </p>
                            <input type="text" class="form-control" required name="medical_diagnosis" id="diger"
                                placeholder="Tıbbi Tanıyı Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşülen Yer : </p>
                            <input type="text" class="form-control" required name="place_of_fall" id="diger"
                                placeholder="Düşülen Yeri Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Tarihi : </p>
                            <input type="date" class="form-control" required name="fall_date" id="diger"
                                placeholder="Düşme Tarihini Giriniz">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Saati : </p>
                            <input type="time" class="form-control" required name="fall_time" id="diger"
                                placeholder="Düşme Saatini Giriniz">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Son Düşme Risk Skoru : </p>
                            <input type="number" class="form-control" required name="last_fall_risk_score" id="diger"
                                placeholder="Risk Skorunu Giriniz" min="0" max="1000">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Yaralanma Durumu : </p>
                            <input type="text" class="form-control" required name="injury_status" id="diger"
                                placeholder="Yaralanma Durumunu Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Yaralanma Şiddeti : </p>
                            <input type="text" class="form-control" required name="injury_severity" id="diger"
                                placeholder="Yaralanma Şiddeti Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Nedeni : </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="fall-reason-wrapper">
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni"
                                        value="Bireysel">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Bireysel</span>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni"
                                        value="Kurumsal">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Kurumsal</span>
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="DüşmeNedeni" id="DüşmeNedeni"
                                        value="Tanı ve Tedavi Prosedürleri">
                                    <label class="form-check-label" for="DüşmeNedeni">
                                        <span class="checkbox-header">Tanı ve Tedavi Prosedürleri</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Öncesi Alınan Önlemler : </p>
                            <input type="text" class="form-control" required name="pre_fall_precautions" id="diger"
                                placeholder="Alınan Önlemleri Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Öncesi Genel Durumu : </p>
                            <input type="text" class="form-control" required name="pre_fall_general_condition"
                                id="diger" placeholder="Genel Durumu Giriniz" maxlength="255">
                        </div>

                        <div class="input-section" style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Düşme Sonrası Genel Durumu : </p>
                            <input type="text" class="form-control" required name="post_fall_general_condition"
                                id="diger" placeholder="Genel Durumu Giriniz" maxlength="255">
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
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
    </script>

    <script>
    $(function() {
        $('#submit').click(function(e) {

            if ($('[name="patient_gender"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="patient_gender"]').offset().top
                        }, 200);
                        //change border color
                $('[name="patient_gender"]').css('border-color', 'red');
                return false
            } else if ($('[name="medical_diagnosis"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="medical_diagnosis"]').offset().top
                        }, 200);
                        //change border color
                $('[name="medical_diagnosis"]').css('border-color', 'red');
                return false
            } else if ($('[name="place_of_fall"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="place_of_fall"]').offset().top
                        }, 200);
                        //change border color
                $('[name="place_of_fall"]').css('border-color', 'red');
                return false
            } else if ($('[name="fall_date"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="fall_date"]').offset().top
                        }, 200);
                        //change border color
                $('[name="fall_date"]').css('border-color', 'red');
                return false
            } else if ($('[name="fall_time"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="fall_time"]').offset().top
                        }, 200);
                        //change border color
                $('[name="fall_time"]').css('border-color', 'red');
                return false
            } else if ($('[name="last_fall_risk_score"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="last_fall_risk_score"]').offset().top
                        }, 200);
                        //change border color
                $('[name="last_fall_risk_score"]').css('border-color', 'red');
                return false
            } else if ($('[name="injury_status"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="injury_status"]').offset().top
                        }, 200);
                        //change border color
                $('[name="injury_status"]').css('border-color', 'red');
                return false
            } else if ($('[name="injury_severity"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="injury_severity"]').offset().top
                        }, 200);
                        //change border color
                $('[name="injury_severity"]').css('border-color', 'red');
                return false
            } else if (!$('[name="DüşmeNedeni"]').is(':checked')) {
                $('html, body').animate({
                            scrollTop: $('.option-error').first().offset().top
                        }, 200);
                        // Display error message
                $('.option-error').css('display', 'block');
            } else if ($('[name="pre_fall_precautions"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pre_fall_precautions"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pre_fall_precautions"]').css('border-color', 'red');
                return false
            } else if ($('[name="pre_fall_general_condition"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pre_fall_general_condition"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pre_fall_general_condition"]').css('border-color', 'red');
                return false
            } else if ($('[name="post_fall_general_condition"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="post_fall_general_condition"]').offset().top
                        }, 200);
                        //change border color
                $('[name="post_fall_general_condition"]').css('border-color', 'red');
                return false
            } else {
                var valid = this.form.checkValidity();

                if (valid) {
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 4;
                    let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                    var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
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
                                "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" +
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
            }
        })

    });
    </script>
    
</body>

</html>