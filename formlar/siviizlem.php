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
    var_dump("there should be patientID below");
    var_dump($_GET['patient_id']);
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
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
    }

    th {
        background-color: #eee;
    }

    h1 {
        text-align: center;
    }

    tr,
    td {
        width: 200px;
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
            <h1 class="form-header">Sıvı İzlem</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Sıvının Cinsi:</p>
                            <input type="text" class="form-control" required name="liquid_type" id="liquid_type"
                                placeholder="Sıvının Cinsi" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Sıvının Hızı:</p>
                            <input type="text" class="form-control" required name="liquid_velocity" id="liquid_velocity"
                                placeholder="Sıvının Hızı" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Saat:</p>
                            <input type="time" class="form-control" required name="delivery_time" id="delivery_time"
                                placeholder="Saat">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Seviye:</p>
                            <input type="text" class="form-control" required name="liquid_level" id="liquid_level"
                                placeholder="Seviye" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Giden:</p>
                            <input type="text" class="form-control" required name="liquid_sent" id="liquid_sent"
                                placeholder="Giden" maxlength="200">
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

                let patient_name = "<?php
                                        echo urldecode($_GET['patient_name']);
                                        ?>";
                var patient_id = <?php
                                        $userid = $_GET['patient_id'];
                                        echo $userid
                                        ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let yourDate = new Date();
                let form_num = 12;
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let liquid_type = $("input[name='liquid_type']").val();
                let liquid_velocity = $("input[name='liquid_velocity']").val();
                let delivery_time = $("input[name='delivery_time']").val();
                let liquid_level = $("input[name='liquid_level']").val();
                let liquid_sent = $("input[name='liquid_sent']").val();


                //set all border to default color
                $('.form-control').css('border-color', '#ced4da');

                //custom validation
                // if($('#iv_input1').val() === ""){
                //     //scroll to iv_input1
                //     $('html, body').animate({
                //         scrollTop: $("#iv_input1").offset().top
                //     }, 200);
                //     //change border color
                //     $('#iv_input1').css('border-color', 'red');
                //     //stop function
                //     return false;
                // }

                if($('#liquid_type').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#liquid_type").offset().top
                    }, 200);
                    //change border color
                    $('#liquid_type').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#liquid_velocity').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#liquid_velocity").offset().top
                    }, 200);
                    //change border color
                    $('#liquid_velocity').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#delivery_time').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#delivery_time").offset().top
                    }, 200);
                    //change border color
                    $('#delivery_time').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#liquid_level').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#liquid_level").offset().top
                    }, 200);
                    //change border color
                    $('#liquid_level').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#liquid_sent').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#liquid_sent").offset().top
                    }, 200);
                    //change border color
                    $('#liquid_sent').css('border-color', 'red');
                    //stop function
                    return false;
                }



                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateSivi_form12.php',
                    data: {
                        form_num: form_num,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creationDate,
                        update_date: updateDate,
                        liquid_type: liquid_type,
                        liquid_velocity: liquid_velocity,
                        delivery_time: delivery_time,
                        liquid_level: liquid_level,
                        liquid_sent: liquid_sent
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
                        console.log(data)
                    }
                })
        })

    });
    </script>
    
</body>

</html>