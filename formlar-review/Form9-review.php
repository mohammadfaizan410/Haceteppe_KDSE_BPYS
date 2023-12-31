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
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    

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
    <?php
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
    $sql = "SELECT * FROM form9 where form_id= $form_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    ?>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">TETKİK SONUÇLARI GİRİŞİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta Ad:</p>
                            <input type="text" class="form-control" value=<?php echo $form9[0]['patient_name']; ?>
                                required name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Hasta ID:</p>
                            <input type="text" class="form-control" value=<?php echo $form9[0]['patient_id']; ?>
                                required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Date:</p>
                            <input type="date" class="form-control" value=<?php echo $form9[0]['date']; ?> required
                                name="date" id="diger" placeholder="Patient ID">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Tetkik adı </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Tıbbi Biyokimya*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tıbbi Biyokimya*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Mikrobiyoloji*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Mikrobiyoloji*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Radyoloji Bulguları">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Radyoloji Bulguları</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Tomografi-Mr">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tomografi-Mr</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Ultrason-Doppler">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ultrason-Doppler</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Girişimsel Radyoloji">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Girişimsel Radyoloji</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="ÖdemŞiddeti"
                                        value="Kan Merkezi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Kan Merkezi</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Tetkik Sonucu :</p>
                            <input type="text" class="form-control" required name="examination_result"
                                value=<?php echo $form9[0]['examination_result']; ?> id="diger"
                                placeholder="Tetkik Sonucu">
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Referans Değeri :</p>
                            <input type="text" class="form-control" required name="referance_value"
                                value=<?php echo $form9[0]['referance_value']; ?> id="diger"
                                placeholder="Referans Değeri">
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
                let patient_name = <?php echo json_encode($patient_name); ?>;
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
    $('.form-check-input[name="tektikOption"]').each(function() {
        if ($(this).val() === '<?php echo $form9[0]['examination_type']; ?>') {
            $(this).prop('checked', true);
        }
    });


    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
            console.log("clicked")
            if ($('[name="examination_result"]').val() === "") {
                console.log('in here 1');
                $('html, body').animate({
                        scrollTop: $('[name="examination_result"]').offset().top
                    }, 200);
                    //change border color
                    $('[name="examination_result"]').css('border-color', 'red');
                    //stop function
                    return false;
            } else if ($('[name="referance_value"]').val() === "") {
                $('html, body').animate({
                        scrollTop: $('[name="referance_value"]').offset().top
                    }, 200);
                    //change border color
                    $('[name="referance_value"]').css('border-color', 'red');
                    //stop function
                    return false;
            } else {
                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                var form_id = <?php echo $form_id ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 9;
                let patient_name = <?php echo json_encode($patient_name);?>;
                let patient_id = <?php echo json_encode($patient_id);?>;
                let yourDate = new Date()
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let date = $("input[name='date']").val();
                let examination_type = $("input[type='radio'][name='tektikOption']:checked").val()
                let examination_result = $("input[name='examination_result']").val();
                console.log(examination_result)
                let referance_value = $("input[name='referance_value']").val();
                console.log("values initiated");

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateTektik_form9.php',
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
                        date: date,
                        examination_type: examination_type,
                        examination_result: examination_result,
                        referance_value: referance_value
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



            }
        })

    });
    </script>
    
</body>

</html>