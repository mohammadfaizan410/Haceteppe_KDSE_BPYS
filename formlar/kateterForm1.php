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
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">KATETER / DREN</h1>


            <div>

               
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                
                    <div class="input-section">
                        <div class="checkboxes">
                            <div class="form-check pb-3">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Periferik venöz kateter">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Periferik venöz kateter</span>
                                </label>
                            </div>
                        </div>
                        <input type="text" placeholder="yeri" class="form-control mb-2" disabled name="peripheralKaterarAmount" id="peripheralKaterarAmount">
                        <input type="text" placeholder="sayisi" class="form-control mb-2" disabled name="peripheralKaterarLocation" id="peripheralKaterarLocation">
                        <input type="date" class="form-control mb-2" disabled name="peripheralKaterarDate" id="peripheralKaterarDate">
                    </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section">
                        <div class="checkboxes">
                            <div class="form-check pb-3">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Santral venöz kateter">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Santral venöz kateter </span>
                                </label>
                            </div>
                        </div>
                        <input type="text" placeholder="yeri" class="form-control mb-2" disabled name="centralKaterarNumber" id="centralKaterarNumber">
                        <input type="text" placeholder="sayisi" class="form-control mb-2" disabled name="centralKaterarLocation" id="centralKaterarLocation">
                        <input type="date" class="form-control mb-2" disabled name="centralKaterarDate" id="centralKaterarDate">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section">
                        <div class="checkboxes">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Dren">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Dren </span>
                                </label>
                            </div>
                        </div>
                        <input type="text" placeholder="yeri" class="form-control mb-2" disabled name="drainKatererAmount" id="drainKatererAmount">
                        <input type="text" placeholder="sayisi" class="form-control mb-2" disabled name="drainKatererLocation" id="drainKatererLocation">
                        <input type="date" class="form-control mb-2" disabled name="drainKatererDate" id="drainKatererDate">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section">
                        <div class="checkboxes">
                            <div class="form-check pb-3">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Diğer">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                            </div>
                        </div>
                        <input type="text" placeholder="yeri" class="form-control mb-2" disabled name="otherKatereAmount" id="otherKatereAmount">
                        <input type="text" placeholder="sayisi" class="form-control mb-2" disabled name="otherKatereLocation" id="otherKatereLocation">
                        <input type="date" class="form-control mb-2" disabled name="otherKatereDate" id="otherKatereDate">
                    </div>
                </div>
            </div>
            <div class='d-flex'>
                <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">
    </div>




            <script>
            $(function() {
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
        var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
            "&patient_name=" + encodeURIComponent(patient_name);
        $("#content").load(url);
    })
            });
     
            $('.form-check-input[name="katererType"]').change(function(){
                if($(this).val() === 'Periferik venöz kateter'){
                    $('#peripheralKaterarAmount').prop('disabled', false);
                    $('#peripheralKaterarLocation').prop('disabled', false);
                    $('#peripheralKaterarDate').prop('disabled', false);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Santral venöz kateter'){
                    $('#centralKaterarNumber').prop('disabled', false);
                    $('#centralKaterarLocation').prop('disabled', false);
                    $('#centralKaterarDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Dren'){
                    $('#drainKatererAmount').prop('disabled', false);
                    $('#drainKatererLocation').prop('disabled', false);
                    $('#drainKatererDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Diğer'){
                    $('#otherKatereAmount').prop('disabled', false);
                    $('#otherKatereLocation').prop('disabled', false);
                    $('#otherKatereDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                }
            })
            </script>

            <script>
            $(function() {
                $('#submit').click(function(e) {



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
                            let katererType = $(".form-check-input[name='katererType']:checked").val();
                            let peripheralKaterarAmount = $('#peripheralKaterarAmount').val();
                            let peripheralKaterarLocation = $('#peripheralKaterarLocation').val();
                            let peripheralKaterarDate = $('#peripheralKaterarDate').val();
                            let centralKaterarNumber = $('#centralKaterarNumber').val();
                            let centralKaterarLocation = $('#centralKaterarLocation').val();
                            let centralKaterarDate = $('#centralKaterarDate').val();
                            let drainKatererAmount = $('#drainKatererAmount').val();
                            let drainKatererLocation = $('#drainKatererLocation').val();
                            let drainKatererDate = $('#drainKatererDate').val();
                            let otherKatereAmount = $('#otherKatereAmount').val();
                            let otherKatereLocation = $('#otherKatereLocation').val();
                            let otherKatereDate = $('#otherKatereDate').val();

                            //set error display none
                            $('.option-error').css('display', 'none');
                            //set border color to default
                            $('.form-control').css('border-color', '#ced4da');

                            //custom validation
                            if($(".form-check-input[name='katererType']:checked").length == 0){
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="katererType"]').first().offset().top
                                }, 200);
                                // set display block to show
                                $('.option-error').css('display', 'block');
                                return false;
                                
                            }

                            if($(".form-check-input[name='katererType']:checked").val() === 'Periferik venöz kateter'){
                                if($('#peripheralKaterarAmount').val() == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#peripheralKaterarAmount').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#peripheralKaterarAmount').css('border-color', 'red');
                                    return false;
                                }
                                if(peripheralKaterarLocation == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#peripheralKaterarLocation').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#peripheralKaterarLocation').css('border-color', 'red');
                                    return false;
                                }
                                if(peripheralKaterarDate == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#peripheralKaterarDate').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#peripheralKaterarDate').css('border-color', 'red');
                                    return false;
                                }
                            }
                            if($(".form-check-input[name='katererType']:checked").val() === 'Santral venöz kateter'){
                                if(centralKaterarNumber == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#centralKaterarNumber').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#centralKaterarNumber').css('border-color', 'red');
                                    return false;
                                }
                                if(centralKaterarLocation == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#centralKaterarLocation').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#centralKaterarLocation').css('border-color', 'red');
                                    return false;
                                }
                                if(centralKaterarDate == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#centralKaterarDate').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#centralKaterarDate').css('border-color', 'red');
                                    return false;
                                }
                            }
                            if($(".form-check-input[name='katererType']:checked").val() === 'Dren'){
                                if(drainKatererAmount == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#drainKatererAmount').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#drainKatererAmount').css('border-color', 'red');
                                    return false;
                                }
                                if(drainKatererLocation == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#drainKatererLocation').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#drainKatererLocation').css('border-color', 'red');
                                    return false;
                                }
                                if(drainKatererDate == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#drainKatererDate').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#drainKatererDate').css('border-color', 'red');
                                    return false;
                                }
                            }
                            if($(".form-check-input[name='katererType']:checked").val() === 'Diğer'){
                                if(otherKatereAmount == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#otherKatereAmount').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#otherKatereAmount').css('border-color', 'red');
                                    return false;
                                }
                                if(otherKatereLocation == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#otherKatereLocation').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#otherKatereLocation').css('border-color', 'red');
                                    return false;
                                }
                                if(otherKatereDate == ''){
                                    $('html, body').animate({
                                        scrollTop: $('#otherKatereDate').offset().top
                                    }, 200);
                                    // Change border color
                                    $('#otherKatereDate').css('border-color', 'red');
                                    return false;
                                }
                            }
                            
                        e.preventDefault()

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Kateter.php',
                            data: {
                               
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                katererType: katererType,
                                peripheralKaterarAmount: peripheralKaterarAmount,
                                peripheralKaterarLocation: peripheralKaterarLocation,
                                peripheralKaterarDate: peripheralKaterarDate,
                                centralKaterarNumber: centralKaterarNumber,
                                centralKaterarLocation: centralKaterarLocation,
                                centralKaterarDate: centralKaterarDate,
                                drainKatererAmount: drainKatererAmount,
                                drainKatererLocation: drainKatererLocation,
                                drainKatererDate: drainKatererDate,
                                otherKatereAmount: otherKatereAmount,
                                otherKatereLocation: otherKatereLocation,
                                otherKatereDate: otherKatereDate,
                                form_name: 'kateterForm1',

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            
</body>

</html>