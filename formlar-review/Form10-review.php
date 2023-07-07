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
    $sql = "SELECT * FROM form10 where form_id= $form_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    $respiratory_rate = (int) $form10[0]['respiratory_rate'];
    ?>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">YAŞAMSAL BULGU TAKİBİİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required value=<?php echo json_encode($form10[0]['patient_name']); ?> name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value=<?php echo $form10[0]['patient_id']; ?> required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="time" class="form-control" value=<?php echo $form10[0]['time']; ?> required name="time" id="diger" placeholder="Saat">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Vücut Sıcaklığı:</p>
                            <input type="text" class="form-control" required value=<?php echo $form10[0]['body_temperature']; ?> name="body_temperature" id="diger" placeholder="Vücut Sıcaklığı">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Timpanik*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Timpanik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Axillar">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Axillar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Oral">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Oral</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Rektal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Rektal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Temporal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Temporal</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_location" id="heartrate_location" value="Apikal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Apikal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_location" id="heartrate_location" value="Periferik">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Periferik</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız hızı:</p>
                            <input type="text" class="form-control" value=<?php echo $form10[0]['heart_rate']; ?> required name="heart_rate" id="diger" placeholder="Nabız hızı">
                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız niteliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Dolgun">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Dolgun</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Zayıf">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Zayıf</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Düzenli">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzenli</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Düzensiz">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzensiz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum sayısı:</p>
                            <input type="text" class="form-control" value='<?php echo $form10[0]['respiratory_rate']; ?>' required name="respiratory_rate" id="diger" placeholder="Solunum sayısı">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum Özelliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Normal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Normal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Derin">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Derin</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Yüzeyel">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yüzeyel</span>
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kan basıncı:</p>
                            <input type="number" class="form-control" required value=<?php echo $form10[0]['blood_pressure']; ?> name="blood_pressure" id="diger" placeholder="Tetkik Sonucu">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">KB Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Brakial(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Brakial(Sol)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sol)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Popliteal(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Popliteal(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Popliteal(Sol)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Popliteal(Sol)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">O2 verme durum: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_alm" value="Almıyor">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Almıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_al" value="Aliyor">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Aliyor</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="input-section d-flex" id="o2-delivery-container">
                            <p class="usernamelabel">O2 verme Yöntemi: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_1" value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">O2 maske</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_2" value="Nazal kanül">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Nazal kanül</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <div class="">
                                        <input class="form-check-input" type="radio" name="o2_method" id="o2_method_diger" value="Diğer">
                                        <label class="form-check-label" for="ÖdemŞiddeti">
                                            <span class="checkbox-header">Diğer</span>
                                        </label>
                                    </div>
                                    <div class="input-section d-flex">
                                        <input type="text" class="form-control" required disabled name="o2_method_diger" id="o2_method_diger_input" placeholder="Yöntemi">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">SPO2 (%):</p>
                            <input type="text" class="form-control" required name="spo2_percentage" value=<?php echo $form10[0]['spo2_percentage']; ?> id="diger" placeholder="SPO2 (%)">
                        </div>
                        <div class="input-section d-flex" id="o2-delivery-container">
                            <p class="usernamelabel">Günlük Günlük Kilo Takibi Yapiliyor mi?</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="weight_input_toggle" value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yapilmiyorum</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-section d-flex" id="kilo_yapiliyor">
                            <p class="usernamelabel">Günlük Kilo Takibi:</p>
                            <input type="text" class="form-control" value="<?php echo $form10[0]['weight_input']; ?>" name="weight_input" id="diger" placeholder="Günlük Kilo Takibi">
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
    $(document).ready(function(){
        var o2delivery = $('[name="o2_status"]');

        var o2Method = $('[name="o2_method"]');
        var o2Other = $('[name="o2_method_diger"]');

        o2delivery.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Aliyor"){
                o2Method.prop('disabled', false);
                o2Other.attr('disabled', true);
            } else {
                o2Method.prop('checked', false).prop('disabled', true);
                o2Other.val('').attr('disabled', true);
            }
        })

        o2Method.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Diğer"){
                o2Other.attr('disabled', false);
            } else {
                o2Other.val('');
                o2Other.attr('disabled', true);
            }
        })

        var weightInputCheck = $('#weight_input_toggle');
        var weightInput = $('[name="weight_input"]');

        weightInput.attr('disabled', false);

        weightInputCheck.on('change', function(){
            if (!$(this).is(':checked')){
                weightInput.attr('disabled', false);
            } else {
                weightInput.val('').attr('disabled', true);
            }
        })
    })
    </script>

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

        //preselecting inputs
        $('.form-check-input[name="measurement_location"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['measurement_location']; ?>") {
                $(this).prop('checked', true);
            }
        });
        $('.form-check-input[name="heartrate_nature"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['heartrate_nature']; ?>") {
                $(this).prop('checked', true);
            }
        });

        $('.form-check-input[name="respiratory_nature"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['respiratory_nature']; ?>") {
                $(this).prop('checked', true);
            }
        });

        $('.form-check-input[name="bp_measurement_location"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['bp_measurement_location']; ?>") {
                $(this).prop('checked', true);
            }
        });

        $('.form-check-input[name="o2_status"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['o2_status']; ?>") {
                $(this).prop('checked', true);
            }
        });
        $('.form-check-input[name="heartrate_location"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['heartrate_location']; ?>") {
                $(this).prop('checked', true);
            }
        });
        $('.form-check-input[name="o2_method"]').each(function() {
            if ($(this).val() === "<?php echo $form10[0]['o2_method']; ?>") {
                $(this).prop('checked', true);
            }
        });
        if ("<?php echo $form10[0]['o2_status']; ?>" == "Aliyor"){
            $('[name="o2_method"]').prop('disabled', false);
        } else {
            $('[name="o2_method"]').prop('checked', false).prop('disabled', true);
        }

        if("<?php echo $form10[0]['o2_method']; ?>" !== "O2 maske" && "<?php echo $form10[0]['o2_method']; ?>" !== "Nazal kanül"){
            $('#o2_method_diger_input').prop('disabled', false);
            $('#o2_method_diger_input').val("<?php echo $form10[0]['o2_method']; ?>");
            $('#o2_method_diger').prop('checked', true);
        } else {
            $('#o2_method_diger_input').val('').prop('disabled', true);
        }


    </script>
    <script>
            $('#submit').click(function(e) {
                e.preventDefault()


                console.log("values initialized")
                
                       //set option error display to none
                $('.option-error').css('display', 'none');
                //set borders to original color
                $('input').css('border-color', '#ced4da');
                //custom validation
                    if($('#time').val()=== ""){
                        //scroll to time
                        $('html, body').animate({
                            scrollTop: $("#time").offset().top
                        }, 200);
                        //change border color
                        $('#time').css('border-color', 'red');
                        //stop function
                        return false;
                    }

                    else if($('#body_temperature').val()=== ""){
                        //scroll to body_temperature
                        $('html, body').animate({
                            scrollTop: $("#body_temperature").offset().top
                        }, 200);
                        //change border color
                        $('#body_temperature').css('border-color', 'red');
                        //stop function
                        return false;
                    }
                    else if($('.form-check-input[name="measurement_location"]:checked').length === 0){
                        //scroll to measurement_location
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="measurement_location"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="measurement_location"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                    else if($('.form-check-input[name="heartrate_location"]:checked').length === 0){
                        //scroll to heartrate_location
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="heartrate_location"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="heartrate_location"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                    else if($('#heart_rate').val()=== "" ){
                        //scroll to heart_rate
                        $('html, body').animate({
                            scrollTop: $("#heart_rate").offset().top
                        }, 200);
                        //change border color
                        $('#heart_rate').css('border-color', 'red');
                        //stop function
                        return false;
                    }

                    else if($('.form-check-input[name="heartrate_nature"]:checked').length === 0){
                        //scroll to heartrate_nature
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="heartrate_nature"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="heartrate_nature"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                   

                    else if($('#respiratory_rate').val()=== "" ){
                        //scroll to heart_rate
                        $('html, body').animate({
                            scrollTop: $("#respiratory_rate").offset().top
                        }, 200);
                        //change border color
                        $('#respiratory_rate').css('border-color', 'red');
                        //stop function
                        return false;
                    }

                    else if($('.form-check-input[name="respiratory_nature"]:checked').length === 0){
                        //scroll to respiratory_nature
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="respiratory_nature"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="respiratory_nature"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                    else if($('#blood_pressure').val()=== "" ){
                        //scroll to blood_pressure
                        $('html, body').animate({
                            scrollTop: $("#blood_pressure").offset().top
                        }, 200);
                        //change border color
                        $('#blood_pressure').css('border-color', 'red');
                        //stop function
                        return false;
                    }

                    else if($('.form-check-input[name="bp_measurement_location"]:checked').length === 0){
                        //scroll to bp_measurement_location
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="bp_measurement_location"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="bp_measurement_location"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                    else if($('.form-check-input[name="o2_status"]:checked').length === 0){
                        //scroll to o2_status
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="o2_status"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="o2_status"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }

                    else if($('.form-check-input[name="o2_status"]:checked').val() === "Aliyor" && $('.form-check-input[name="o2_method"]:checked').length === 0){
                        //scroll to o2_method
                        $('html, body').animate({
                            scrollTop: $('.form-check-input[name="o2_method"]').first().offset().top
                        }, 200);
                        // Display error message
                        $('.form-check-input[name="o2_method"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
                    }
                    else if($('.form-check-input[name="o2_status"]:checked').val() === "Aliyor" && $('.form-check-input[name="o2_method"]:checked').val() === "Diğer" && $('#o2_method_diger_input').val() === "" ){
                        //scroll to o2_method_diger_input
                        $('html, body').animate({
                            scrollTop: $('#o2_method_diger_input').offset().top
                        }, 200);
                        //change border color
                        $('#o2_method_diger_input').css('border-color', 'red');
                        //stop function
                        return false;
                    }
                    else if( $('#spo2_percentage').val()=== "" ){
                        //scroll to spo2_percentage
                        $('html, body').animate({
                            scrollTop: $("#spo2_percentage").offset().top
                        }, 200);
                        //change border color
                        $('#spo2_percentage').css('border-color', 'red');
                        //stop function
                        return false;
                    }
                    else {
                        var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
                        var form_id = <?php echo $form_id ?>;
                        let form_num = 10;
                        let patient_name = <?php echo json_encode($form10[0]['patient_name']); ?>;
                        var patient_id = "<?php echo $form10[0]['patient_id']; ?>"
                        let yourDate = new Date()
                        let creationDate = yourDate.toISOString().split('T')[0];
                        let updateDate = yourDate.toISOString().split('T')[0];
                        let time = $("input[name='time']").val();
                        let body_temperature = $("input[name='body_temperature']").val();
                        let measurement_location = $("input[type='radio'][name='measurement_location']:checked")
                            .val();
                        let heartrate_location = $("input[type='radio'][name='heartrate_location']:checked").val();
                        let heart_rate = $("input[name='heart_rate']").val();
                        let heartrate_nature = $("input[type='radio'][name='heartrate_nature']:checked").val();
                        let respiratory_rate = $("input[name='respiratory_rate']").val();
                        let respiratory_nature = $("input[type='radio'][name='respiratory_nature']:checked").val();
                        let blood_pressure = $("input[name='blood_pressure']").val();
                        let bp_measurement_location = $(
                            "input[type='radio'][name='bp_measurement_location']:checked").val();
                        let o2_status = $("input[type='radio'][name='o2_status']:checked").val();
                        let o2_method = '';

                        if (o2_status === "Almıyor") {
                            o2_method = "Almıyor";
                        } else {
                            if ($("input[type='radio'][name='o2_method']:checked").val() === "Diğer") {
                                o2_method = $("input[name='o2_method_diger']").val();
                            } else {
                                o2_method = $("input[type='radio'][name='o2_method']:checked").val();
                            }
                        };

                        let spo2_percentage = $("input[name='spo2_percentage']").val();
                        let weight_input = $('#kilo_yapiliyor').css("display") === 'flex' ? $(
                            "input[name='weight_input']").val() : 'Yapilmiyor';

                        if (o2_status === "Almıyor") {
                            o2_method = "Almıyor";
                        } else {
                            if ($("input[type='radio'][name='o2_method']:checked").val() === "Diğer") {
                                o2_method = $("input[name='o2_method_diger']").val();
                            } else {
                                o2_method = $("input[type='radio'][name='o2_method']:checked").val();
                            }
                        };


                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateYasamsal_form10.php',
                            data: {
                                
                                form_id: form_id,
                                id: id,
                                form_num: form_num,
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creationDate,
                                update_date: updateDate,
                                time: time,
                                body_temperature: body_temperature,
                                heart_rate: heart_rate,
                                heartrate_location: heartrate_location,
                                respiratory_nature: respiratory_nature,
                                heartrate_nature: heartrate_nature,
                                respiratory_rate: respiratory_rate,
                                blood_pressure: blood_pressure,
                                bp_measurement_location: bp_measurement_location,
                                measurement_location: measurement_location,
                                o2_status: o2_status,
                                o2_method: o2_method,
                                spo2_percentage: spo2_percentage,
                                weight_input: weight_input
                            },
                            success: function(data) {
                                let patient_id = "<?php echo $form10[0]['patient_id']; ?>";
                                let patient_name = "<?php echo $form10[0]['patient_name']; ?>";
                                let url =
                                    "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" +
                                    patient_id + "&patient_name=" + encodeURIComponent(patient_name);
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

    </script>
    
</body>

</html>