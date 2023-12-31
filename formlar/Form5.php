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
            <h1 class="form-header">GLASKOW KOMA SKALASI</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold; font-size:large">Gözleri Açabilme</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between">
                            <p class="usernamelabel pb-3">Spontan Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme"
                                    value="4">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Sözel Emirle Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme"
                                    value="3">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Ağrılı Uyaranla Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme"
                                    value="2">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Açmıyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme"
                                    value="1">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold; font-size:large">Motor Cevap</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Emirler Uyuyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="6">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(6 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Ağrıya lokalize (Ağrılı uyaranı uzaklaştırmaya çalışıyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="5">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(5 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Çekme (Ekstremitesini ağrılı uyarandan uzaklaştırmaya/çekmeye
                                çalışıyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="4">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Fleksiyon (Dekortike duruş):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="3">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Ekstansiyon (Deserebre duruş):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="2">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Tepki yok :</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap"
                                    value="1">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold; font-size:large">Sözel Tepki</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Oryante:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki"
                                    value="5">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(5 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Konfüze (Cümle kuruyor ancak yanıtlar yanlış):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki"
                                    value="4">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Uygunsuz cümleler (Bir ya da daha fazla yanlış yanıt):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki"
                                    value="3">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Anlamsız sesler (Hasta mırıldanıyor, inliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki"
                                    value="2">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel pb-3">Tepki yok:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki"
                                    value="1">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section"
                            style="justify-content:space-between; ">
                            <p class="usernamelabel" style="font-weight: bold;">Toplam:</p>
                            <div class="form-check">
                                <output></output>
                            </div>
                        </div>

                        <p style="">*GKS: 15 (Oryante), 13-14 (Konfüze), 8-13 (Stubor), 3-8
                            (Prekoma), 3 (Koma)</p>

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
            e.preventDefault()

            if (!$('[name="GözleriAçabilme"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="GözleriAçabilme"]').first().offset().top
                        }, 200);
                        // Display error message
                $('[name="GözleriAçabilme"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if (!$('[name="MotorCevap"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="MotorCevap"]').first().offset().top
                        }, 200);
                        // Display error message
                $('[name="MotorCevap"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else if (!$('[name="SözelTepki"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="SözelTepki"]').first().offset().top
                        }, 200);
                        // Display error message
                $('[name="SözelTepki"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                return false;
            } else {

                var valid = this.form.checkValidity();

                if (valid) {
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 6;
                    let yourDate = new Date()
                    let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                    var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                    let creation_date = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let eye_opening_points = parseInt($(
                        "input[type='radio'][name='GözleriAçabilme']:checked").val());
                    let motor_response_points = parseInt($("input[type='radio'][name='MotorCevap']:checked")
                        .val());
                    let verbal_response_points = parseInt($(
                        "input[type='radio'][name='SözelTepki']:checked").val());
                    let total = eye_opening_points + motor_response_points + verbal_response_points;

                    console.log(creation_date, updateDate, eye_opening_points, motor_response_points,
                        verbal_response_points, total);

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm5.php',
                        data: {
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            form_num: form_num,
                            patient_name: patient_name,
                            patient_id: patient_id,
                            creation_date: creation_date,
                            updateDate: updateDate,
                            eye_opening_points: eye_opening_points,
                            motor_response_points: motor_response_points,
                            verbal_response_points: verbal_response_points,
                            total: total
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
                            }, 1000);                        },
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