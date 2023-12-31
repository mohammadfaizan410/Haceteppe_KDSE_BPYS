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
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Template Stylesheet -->
    
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
            <h1 class="form-header">İLAÇ ORDERI</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Saat:</p>
                            <input type="time" class="form-control" required name="delivery_time" id="delivery_time"
                                placeholder="Saat">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">İlacın Adı:</p>
                            <input type="text" class="form-control" required name="medicine_name" id="medicine_name"
                                placeholder="İlacın Adı" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">İlacın Dozu:</p>
                            <input type="text" class="form-control" required name="medicine_dose" id="medicine_dose"
                                placeholder="İlacın Dozu" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">İlacın Yolu:</p>
                            <input type="text" class="form-control" required name="delivery_method" id="delivery_method"
                                placeholder="İlacın Yolu" maxlength="200">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Uygulama Zamanı:</p>
                            <input type="text" class="form-control" required name="treatment_timeRange" id="treatment_timeRange"
                                placeholder="Uygulama Zamanı" maxlength="200">
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
            console.log("clicked")

                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                let patient_name = "<?php
                                        echo urldecode($_GET['patient_name']);
                                        ?>";
                let patient_id = <?php
                                        $userid = $_GET['patient_id'];
                                        echo $userid
                                        ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 13;
                let yourDate = new Date();
                let applicationDescription = $("input[name='applicationDescription']").val();
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let delivery_date = creationDate;
                let delivery_time = $("input[name='delivery_time']").val();
                let medicine_name = $("input[name='medicine_name']").val();
                let medicine_dose = $("input[name='medicine_dose']").val();
                let delivery_method = $("input[name='delivery_method']").val();
                let treatment_timeRange = $("input[name='treatment_timeRange']").val();

                //set border color normal
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

                if($('#applicationDescription').val() === ""){
                    //scroll to applicationDescription
                    $('html, body').animate({
                        scrollTop: $("#applicationDescription").offset().top
                    }, 200);
                    //change border color
                    $('#applicationDescription').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#delivery_time').val() === ""){
                    //scroll to delivery_time
                    $('html, body').animate({
                        scrollTop: $("#delivery_time").offset().top
                    }, 200);
                    //change border color
                    $('#delivery_time').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#medicine_name').val() === ""){
                    //scroll to medicine_name
                    $('html, body').animate({
                        scrollTop: $("#medicine_name").offset().top
                    }, 200);
                    //change border color
                    $('#medicine_name').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#medicine_dose').val() === ""){
                    //scroll to medicine_dose
                    $('html, body').animate({
                        scrollTop: $("#medicine_dose").offset().top
                    }, 200);
                    //change border color
                    $('#medicine_dose').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#delivery_method').val() === ""){
                    //scroll to delivery_method
                    $('html, body').animate({
                        scrollTop: $("#delivery_method").offset().top
                    }, 200);
                    //change border color
                    $('#delivery_method').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#treatment_timeRange').val() === ""){
                    //scroll to treatment_timeRange
                    $('html, body').animate({
                        scrollTop: $("#treatment_timeRange").offset().top
                    }, 200);
                    //change border color
                    $('#treatment_timeRange').css('border-color', 'red');
                    //stop function
                    return false;
                }




                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateMedikal_form13.php',
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
                        delivery_date: delivery_date,
                        delivery_time: delivery_time,
                        medicine_name: medicine_name,
                        medicine_dose: medicine_dose,
                        delivery_method: delivery_method,
                        treatment_timeRange: treatment_timeRange
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