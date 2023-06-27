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




    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    <!-- Template Stylesheet -->
    <link href="./style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
            <h1 class="form-header">Ağrı Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <img src="./ağrı skalası.png"
                            style="width:67%; height:auto;border: 1px solid;border-color: #246174; box-shadow:1px 1px 1px 1px #246174; border-radius: 20px;">
                        <div class="input-section d-flex" style="padding-top: 5%;">
                            <p class="usernamelabel">Ağrının Şiddeti:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="0. Yok">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">0. Yok</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="1-2. Çok Az">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">1-2. Çok Az</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="3-4. Biraz Fazl">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">3-4. Biraz Fazla</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="5-6. Çok">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">5-6. Çok</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="7-8. Fazla">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">7-8. Fazla</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSiddeti" id="AgriSiddeti"
                                    value="option1">
                                <label class="form-check-label" for="AgriSiddeti">
                                    <span class="checkbox-header">9-10. Dayanılmaz</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Süresi:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSuresi" id="AgriSuresi"
                                    value="option1">
                                <label class="form-check-label" for="AgriSuresi">
                                    <span class="checkbox-header">6 Aydan Az</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AgriSuresi" id="AgriSuresi"
                                    value="option2">
                                <label class="form-check-label" for="AgriSuresi">
                                    <span class="checkbox-header">6 Aydan Fazla</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Yeri:</p>
                            <input type="text" class="form-control" required name="pain_location" id="pain_location"
                                placeholder="Ağrının Yerini Giriniz" maxlength="100">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Karakteri:</p>
                            <input type="text" class="form-control" required name="pain_character" id="diger"
                                placeholder="Ağrının Karakterini Giriniz" maxlength="500">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrının Sıklığı:</p>
                            <input type="text" class="form-control" required name="pain_frequency" id="diger"
                                placeholder="Ağrının Sıklığını Giriniz" maxlength="200">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrıyı Arttıran Durumlar:</p>
                            <input type="text" class="form-control" required name="pain_increase_factors" id="diger"
                                placeholder="Ağrıyı Arttıran Durumları Giriniz" maxlength="500">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ağrıyı Azaltan Durumlar:</p>
                            <input type="text" class="form-control" required name="pain_decrease_factors" id="diger"
                                placeholder="Ağrıyı Azaltan Durumları Giriniz" maxlength="500">
                        </div>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                </div>

            </div>
            </form>
        </div>
    </div>

    <script>
    $('#closeBtn1').click(function(e) {
        e.preventDefault();
        console.log("close btn clicked");
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
    </script>

    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
            if (!$('[name="AgriSiddeti"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="AgriSiddeti"]').first().offset().top
                        }, 200);
                        // Display error message
                $('[name="AgriSiddeti"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if (!$('[name="AgriSuresi"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="AgriSuresi"]').first().offset().top
                        }, 200);
                        // Display error message
                    $('[name="AgriSuresi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
            } else if ($('[name="pain_location"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pain_location"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pain_location"]').css('border-color', 'red');
                return false
            } else if ($('[name="pain_character"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pain_character"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pain_character"]').css('border-color', 'red');
                return false
            } else if ($('[name="pain_frequency"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pain_frequency"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pain_frequency"]').css('border-color', 'red');
                return false
            } else if ($('[name="pain_increase_factors"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pain_increase_factors"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pain_increase_factors"]').css('border-color', 'red');
                return false
            } else if ($('[name="pain_decrease_factors"]').val() === "") {
                $('html, body').animate({
                            scrollTop: $('[name="pain_decrease_factors"]').offset().top
                        }, 200);
                        //change border color
                $('[name="pain_decrease_factors"]').css('border-color', 'red');
                return false
            } else {

                var valid = this.form.checkValidity();
                if (valid) {
                    let name = $('#name').val();
                    let surname = $('#surname').val();
                    let age = $('#age').val();
                    let not = $('#not').val();

                    var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                    let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                    let yourDate = new Date()
                    let creation_date = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let fileNo = 2;
                    let painIntensity = $("input[type='radio'][name='AgriSiddeti']:checked").val();
                    let painDuration = $("input[type='radio'][name='AgriSuresi']:checked").val() ===
                        "option1" ? "Less than 6 months" : "More than 6 months";
                    let pain_location = $('input[name="pain_location"]').val();
                    let pain_character = $('input[name="pain_character"]').val();
                    let pain_frequency = $('input[name="pain_frequency"]').val();
                    let pain_increase_factors = $('input[name="pain_increase_factors"]').val();
                    let pain_decrease_factors = $('input[name="pain_decrease_factors"]').val();
                    console.log(pain_decrease_factors)



                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm2.php',
                        data: {
                            patient_id: patient_id,
                            patient_name: patient_name,
                            form_num: fileNo,
                            creation_date: creation_date,
                            update_date: updateDate,
                            pain_intensity: painIntensity,
                            pain_duration: painDuration,
                            pain_location: pain_location,
                            pain_frequency: pain_frequency,
                            pain_character: pain_character,
                            pain_increase_factors: pain_increase_factors,
                            pain_decrease_factors: pain_decrease_factors
                        },
                        success: function(data) {
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                patient_id + "&patient_name=" + encodeURIComponent(
                                patient_name);

                                $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(800);
                            // Hide the tick container
                            }, 2000);
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