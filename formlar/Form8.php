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
            <h1 class="form-header">Ödem Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <img src="./ödem.png" style="width:67%; height:auto;border: 1px solid;border-color: #246174; box-shadow:1px 1px 1px 1px #246174; border-radius: 20px;">
                        <div class="input-section d-flex" style="padding-top: 5%;">
                            <p class="usernamelabel">Değerlendirilen Alan:</p>
                            <input type="text" class="form-control" required name="assessed_area" id="diger" placeholder="Değerlendirilen Alanı Giriniz" maxlength="2000">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ödemin Şiddeti:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="Ödem Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ödem Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="1">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+1</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="2">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+2</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="3">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+3</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ÖdemŞiddeti" id="ÖdemŞiddeti" value="4">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">+4</span>
                                    </label>
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

                if ($('[name="assessed_area"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="assessed_area"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="assessed_area"]').css('border-color', 'red');
                } else if (!$('[name="ÖdemŞiddeti"]').is(':checked')) {
                    $('html, body').animate({
                            scrollTop: $('.option-error').first().offset().top
                        }, 200);
                        // Display error message
                    $('.option-error').css('display', 'block');
                } else {
                    var valid = this.form.checkValidity();

                    if (valid) {
                        var id = <?php

                                    $userid = $_SESSION['userlogin']['id'];
                                    echo $userid
                                    ?>;
                        var name = $('#name').val();
                        var surname = $('#surname').val();
                        var age = $('#age').val();
                        var not = $('#not').val();
                        let form_num = 8;
                        let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                        var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                        let yourDate = new Date()
                        let creationDate = yourDate.toISOString().split('T')[0];
                        let updateDate = yourDate.toISOString().split('T')[0];
                        let assessed_area = $("input[name='assessed_area']").val();
                        let edema_severity = $("input[type='radio'][name='ÖdemŞiddeti']:checked").val();


                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm8.php',
                            data: {
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
                            }, 1000);                            },
                            error: function(data) {
                                console.log(data)
                            }
                        })



                    }
            }
            })

        });
    </script>
    
</body>

</html>