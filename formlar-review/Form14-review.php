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
$sql = "SELECT * FROM form14 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
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
    <!-- Icon Font Stylesheet -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    
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
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Hasta Ad:</p>
                            <input type="text" class="form-control" value="<?php echo $form14[0]['patient_name']; ?>"
                                required name="patient_name" id="patient_name" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Hasta ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form14[0]['patient_id']; ?>"
                                required name="patient_id" id="patient_id" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Sorunla İlişkili Veriler:</p>
                            <input type="text" class="form-control" required name="problem_info" id="problem_info"
                                placeholder="problem_info" maxlength="100"
                                value="<?php echo $form14[0]['problem_info']; ?>">
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Hemşirelik Tanıları:</p>
                            <input type="text" class="form-control" required name="nurse_description" id="nurse_description"
                                placeholder="nurse_description" maxlength="250"
                                value="<?php echo $form14[0]['nurse_description']; ?>">
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">NOC Çıktıları:</p>
                            <input type="text" class="form-control" required name="noc_output" id="noc_output"
                                placeholder="noc_output" maxlength="250"
                                value="<?php echo $form14[0]['noc_output']; ?>">
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">NOC Gösterge:</p>
                            <input type="text" class="form-control" required name="noc_indicator" id="noc_indicator"
                                placeholder="noc_indicator" maxlength="250"
                                value="<?php echo $form14[0]['noc_indicator']; ?>">
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Hemşirelik Girişimleri:</p>
                            <input type="text" class="form-control" required name="nurse_attempt" id="nurse_attempt"
                                placeholder="nurse_attempt" maxlength="250"
                                value="<?php echo $form14[0]['nurse_attempt']; ?>">
                        </div>
                        <div class="input-section ">
                            <p class="usernamelabel pb-3">Değerlendirme:</p>
                            <input type="text" class="form-control" required name="evaluation" id="evaluation"
                                placeholder="evaluation" maxlength="250"
                                value="<?php echo $form14[0]['evaluation']; ?>">
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
    </script>
    <script>
        $('#submit').click(function(e) {
            e.preventDefault()

                var form_id = <?php echo $form_id ?>;
                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 14;
                let patient_name = <?php echo json_encode($patient_name); ?>;
                let patient_id = <?php echo $patient_id ?>;
                let yourDate = new Date();
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let problem_info = $("input[name='problem_info']").val();
                let nurse_description = $("input[name='nurse_description']").val();
                let noc_output = $("input[name='noc_output']").val();
                let noc_indicator = $("input[name='noc_indicator']").val();
                let nurse_attempt = $("input[name='nurse_attempt']").val();
                let evaluation = $("input[name='evaluation']").val();
                console.log("values initiated")
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

                if($('#problem_info').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#problem_info").offset().top
                    }, 200);
                    //change border color
                    $('#problem_info').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#nurse_description').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#nurse_description").offset().top
                    }, 200);
                    //change border color
                    $('#nurse_description').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#noc_output').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#noc_output").offset().top
                    }, 200);
                    //change border color
                    $('#noc_output').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#noc_indicator').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#noc_indicator").offset().top
                    }, 200);
                    //change border color
                    $('#noc_indicator').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#nurse_attempt').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#nurse_attempt").offset().top
                    }, 200);
                    //change border color
                    $('#nurse_attempt').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#evaluation').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#evaluation").offset().top
                    }, 200);
                    //change border color
                    $('#evaluation').css('border-color', 'red');
                    //stop function
                    return false;
                }


                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateBakimPlani_form14.php',
                    data: {
                        id: id,
                        form_id: form_id,
                        form_num: form_num,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creationDate,
                        update_date: updateDate,
                        noc_output: noc_output,
                        noc_indicator: noc_indicator,
                        problem_info: problem_info,
                        nurse_description: nurse_description,
                        nurse_attempt: nurse_attempt,
                        evaluation: evaluation
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



            
        })

    </script>
    
</body>

</html>