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
$sql = "SELECT * FROM form15 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="form-header">Günlük Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta Ad:</p>
                            <input type="text" class="form-control" value="<?php echo $form15[0]['patient_name']; ?>"
                                required name="patient_name" id="patient_name" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form15[0]['patient_id']; ?>"
                                required name="patient_id" id="patient_id" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Uygulamalar</p>
                            <input type="text" class="form-control" required name="applications" id="applications"
                                placeholder="applications" maxlength="100"
                                value="<?php echo $form15[0]['applications']; ?>">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Saat :</p>
                            <input type="time" class="form-control" required name="hours" id="hours"
                                value="<?php echo $form15[0]['hours']; ?>">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Açıklama Giriniz</p>
                            <input type="text" class="form-control" required name="description" id="description"
                                placeholder="Açıklama Giriniz" maxlength="250"
                                value="<?php echo $form15[0]['description']; ?>">
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
            console.log("clicked")

                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                var form_id = <?php echo $form_id ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 15;
                let patient_name = <?php echo json_encode($patient_name); ?>;
            let patient_id = <?php echo $patient_id ?>;
                let yourDate = new Date();
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let applications = $("input[name='applications']").val();
                let hours = $("input[name='hours']").val();
                let description = $("input[name='description']").val();
                
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

                if($('#applications').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#applications").offset().top
                    }, 200);
                    //change border color
                    $('#applications').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#hours').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#hours").offset().top
                    }, 200);
                    //change border color
                    $('#hours').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('#description').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#description").offset().top
                    }, 200);
                    //change border color
                    $('#description').css('border-color', 'red');
                    //stop function
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateGunlukbakim_form15.php',
                    data: {
                        form_id: form_id,
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
                        applications: applications,
                        hours: hours,
                        description: description
                    },
                    success: function(data) {
                        console.log(data);
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