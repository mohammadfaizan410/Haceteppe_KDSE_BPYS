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
    <link href="style.css" rel="stylesheet">
<style>
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

<body style="background-color:white">
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">UYKU GEREKSİNİMİ</h1>

            <div class="input-section">
                <p class="usernamelabel pb-3">Ortalama uyku süresi:</p>
                <input type="number" class="form-control" name="averageSleepDuration" id="averageSleepDuration">
            </div>

            <div class="input-section">

                <p class="usernamelabel pb-3">Uykuda Sorun </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sleepProblem" id="sleepProblem" value="Sorun Yok">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sleepProblem" id="sleepProblem" value="Sorun Var">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Var</span>

                            </label>
                        </div>
                    </div>
                           
                                            <div class="form-check">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="sleepProblemDesc" value="Gündüz uykus">
                                                <label class="form-check-label" for="GündüzUykusU">Gündüz uykus </label>
                                            </div>
                                     
                                                    <div class="form-check">
                                                        <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UykudanYorgun" value="Uykudan yorgun kalkma">
                                                        <label class="form-check-label" for="UykudanYorgun">Uykudan yorgun kalkma</label>
                                                    </div>
                                      
                                            <div class="form-check">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UyumaGüçlüğü" value="Uyuma güçlüğü">
                                                <label class="form-check-label" for="UyumaGüçlüğü">Uyuma güçlüğü</label>
                                            </div>
                                       
                                            <div class="form-check">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="sleepProblemDesc" value="Uykunun Bölünmesi">
                                                <label class="form-check-label" for="UykununBölünmesi">Uykunun Bölünmesi</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UykuSorunDiger" value="Diğer">
                                                <label class="form-check-label" for="UykuSorunDiger">Diğer</label>
                                            </div>
                                       
                </div>
            </div>

            <div class="input-section">
                <p class="usernamelabel pb-3">Uykuya dalmada yardımcı olan alışkanlıkları (kitap okuma, süt içme vb.)
                    (Açıklayınız):</p>
                <input type="text" class="form-control" name="sleepHelpHabits" id="UykuyaDalmaAliskanligi">
            </div>
            <div class="input-section">
                <p class="usernamelabel pb-3">Hastane ortamında uykusunu etkileyen faktörler: (Açıklayınız):</p>
                <input type="text" class="form-control" name="hospitalFactorsAffectingSleep" id="UykuyuEtkileyenFaktorler">
            </div>
            <div class='d-flex'>    
            <input class="submit m-auto " type='submit' name="submit" id="submit" value="Kayıt">
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
                        var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" +
                            patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                        $("#content").load(url);

                    })
                });

                $('.form-check-input[name="sleepProblem"]').change(function() {
                    if ($(this).val() == "Sorun Var") {
                        $('input[name="sleepProblemDesc"]').prop('disabled', false);
                    } else {
                        $('input[name="sleepProblemDesc"]').prop('disabled', true);
                    }
                    });
                
                
            </script>

            <script>
                $(function() {
                    $('#submit').click(function(e) {
                        e.preventDefault()

                        if ($('#averageSleepDuration').val() == ""){
                            $('html, body').animate({
                                    scrollTop: $("#averageSleepDuration").offset().top
                                }, 200);
                            // change border color
                            $('#averageSleepDuration').css('border-color', 'red');
                                //stop function
                                return false;
                        } else if (!$('[name="sleepProblem"]').is(':checked')){
                            $('html, body').animate({
                                scrollTop: $("input[name='sleepProblem']").first().offset().top
                            }, 200);
                            // Display error message
                            $(".form-check-input[name='sleepProblem']").first().closest('.input-section').find('.option-error').css('display', 'block');
                            return false;
                        } else if ($('[name="sleepProblem"]:checked').val() == "Sorun Var" && $('[name="sleepProblemDesc"]:checked').length == 0){
                            $('html, body').animate({
                                scrollTop: $("input[name='sleepProblem']").first().offset().top
                            }, 200);
                            // Display error message
                            $(".form-check-input[name='sleepProblem']").first().closest('.input-section').find('.option-error').css('display', 'block');
                            return false;
                        } else if ($('#UykuyaDalmaAliskanligi').val() == ""){
                            $('html, body').animate({
                                    scrollTop: $("#UykuyaDalmaAliskanligi").offset().top
                                }, 200);
                            // change border color
                            $('#UykuyaDalmaAliskanligi').css('border-color', 'red');
                                //stop function
                                return false;
                        } else if ($('#UykuyuEtkileyenFaktorler').val() == ""){
                            $('html, body').animate({
                                    scrollTop: $("#UykuyuEtkileyenFaktorler").offset().top
                                }, 200);
                            // change border color
                            $('#UykuyuEtkileyenFaktorler').css('border-color', 'red');
                                //stop function
                                return false;
                        }


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
                        let form_name = "uykuForm1";
                        let averageSleepDuration = $('#averageSleepDuration').val();
                        let sleepProblem = $('.form-check-input[name="sleepProblem"]:checked').val() === "Sorun Var" ? $("input[name='sleepProblemDesc']:checked").map(function() {
                            return $(this).val();
                        }).get().join("/") : "Sorun Yok";

                        let sleepHelpHabits = $('#UykuyaDalmaAliskanligi').val();
                        let hospitalFactorsAffectingSleep = $('#UykuyuEtkileyenFaktorler').val();


                        e.preventDefault()

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm1_Uyku.php',
                            data: {
                                patient_id: patient_id,
                                patient_name: patient_name,
                                form_name: form_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                averageSleepDuration: averageSleepDuration,
                                sleepProblem: sleepProblem,
                                sleepHelpHabits: sleepHelpHabits,
                                hospitalFactorsAffectingSleep: hospitalFactorsAffectingSleep,
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
                        }, 1000);                                },
                            error: function(data) {
                                Swal.fire({
                                    'title': 'Errors',
                                    'text': 'There were errors',
                                    'type': 'error'
                                })
                            }
                        })



                        
                    })

                });
            </script>


            <!-- Template Javascript -->
            
</body>

</html>
