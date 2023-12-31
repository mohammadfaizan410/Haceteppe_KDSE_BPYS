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
$sql = "SELECT * FROM ilestimform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $iletisim = $smtmselect->fetchAll(PDO::FETCH_ASSOC)[0];
} else {
    echo 'error';
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
            <h1 class="form-header">İLETİŞİM KURMA GEREKSİNİMİ</h1>



            <div class="input-section">
                <p class="usernamelabel pb-3">İletişim kurmasına engel olan herhangi bir durum</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicationProblem" id="communicationProblem"
                                value="Yok">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <div>
                            <input class="form-check-input" type="radio" name="communicationProblem" id="communicationProblem"
                                value="Var">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" disabled name="communicationProblemInput"
                                id="communicationProblemInput">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">
                <p class="usernamelabel pb-3">Refakatçisi</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="companion" id="companion" value="Yok">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                        <div>
                            <input class="form-check-input" type="radio" name="companion" id="companion" value="Var">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" disabled name="companionInput" id="companionInput">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">
                <p class="usernamelabel pb-3">Yakınlarına ulaşmada sıkıntısı</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reachTrouble" id="reachTrouble"
                                value="Yok">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                        <div>
                            <input class="form-check-input" type="radio" name="reachTrouble" id="reachTrouble"
                                value="Var">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="reachTroubleInput" disabled
                                id="reachTroubleInput">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">
                <p class="usernamelabel pb-3">Sağlık personeli ile iletişime geçmede sorun</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contactingStaffTrouble"
                                id="contactingStaffTrouble" value="Yok">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                        <div>
                            <input class="form-check-input" type="radio" name="contactingStaffTrouble"
                                id="contactingStaffTrouble" value="Var">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="contactingStaffTroubleInput" disabled
                                id="contactingStaffTroubleInput">
                        </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section">

                <p class="usernamelabel pb-3">Bakıma katılma </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="careAcceptance" id="careAcceptance"
                                value="Katılmıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header">Katılmıyor </span>
                            </label>

                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="İstekli1" disabled
                                                    value="İstekli" name="careAcceptanceNon">
                                                <label class="form-check-label"  for="İstekli1">İstekli </label>
                                            </div>
                                        </td>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="İsteksiz1" disabled
                                                    value="İsteksiz" name="careAcceptanceNon"> 
                                                <label class="form-check-label"  for="İsteksiz1">İsteksiz </label>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="careAcceptance" id="careAcceptance"
                                value="Katılıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header"> Katılıyor</span>
                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="careAcceptanceWilling" type="radio" id="İstekli" disabled
                                                    value="İstekli">
                                                <label class="form-check-label"  for="İstekli">İstekli</label>
                                            </div>
                                        </td> <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="careAcceptanceWilling" type="radio" id="İsteksiz"
                                                    value="İsteksiz">
                                                <label class="form-check-label"  for="İsteksiz">İsteksiz </label>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section">
                <p class="usernamelabel pb-3">Tedaviyi kabullenme </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="treatmentAcceptance"
                                id="TedaviyiKabullenme " value="Kabul ediyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul ediyor </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="treatmentAcceptance"
                                id="TedaviyiKabullenme " value="Kabul etmiyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul etmiyor (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="treatmentAcceptanceInput" disabled
                                id="TedaviyiKabullenmeDiger ">
                        </div>
                    </div>
                </div>
                </div>
                <div class='d-flex'>    
                <?php
                        if ($display == 1) {
                            echo '<input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">';
                        }
                        ?>
</div>

            </form>
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
        $(document).ready(function(){
            var communicationProblem = "<?php echo $iletisim['communicationProblem']; ?>";
            
            if (communicationProblem == "Yok"){
                $('[name="communicationProblem"][value="Yok"]').attr('checked', true);
                $('[name="communicationProblemInput"]').attr('disabled', true);
            } else {
                $('[name="communicationProblem"][value="Var"]').attr('checked', true);
                $('[name="communicationProblemInput"]').val(communicationProblem).attr('disabled', false);
            }

            $('[name="communicationProblem"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Var"){
                    $('[name="communicationProblemInput"]').attr('disabled', false);
                } else {
                    $('[name="communicationProblemInput"]').val('').attr('disabled', true);
                }
            });

            var companion = "<?php echo $iletisim['companion']; ?>";
            
            if (companion == "Yok"){
                $('[name="companion"][value="Yok"]').attr('checked', true);
                $('[name="companionInput"]').attr('disabled', true);
            } else {
                $('[name="companion"][value="Var"]').attr('checked', true);
                $('[name="companionInput"]').val(companion).attr('disabled', false);
            }
            

            $('[name="companion"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Var"){
                    $('[name="companionInput"]').attr('disabled', false);
                } else {
                    $('[name="companionInput"]').val('').attr('disabled', true);
                }
            });

            var reachTrouble = "<?php echo $iletisim['reachTrouble']; ?>";
            
            if (reachTrouble == "Yok"){
                $('[name="reachTrouble"][value="Yok"]').attr('checked', true);
                $('[name="reachTroubleInput"]').attr('disabled', true);
            } else {
                $('[name="reachTrouble"][value="Var"]').attr('checked', true);
                $('[name="reachTroubleInput"]').val(reachTrouble).attr('disabled', false);
            }

            $('[name="reachTrouble"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Var"){
                    $('[name="reachTroubleInput"]').attr('disabled', false);
                } else {
                    $('[name="reachTroubleInput"]').val('').attr('disabled', true);
                }
            });

            var contactingStaffTrouble = "<?php echo $iletisim['contactingStaffTrouble']; ?>";
            
            if (contactingStaffTrouble == "Yok"){
                $('[name="contactingStaffTrouble"][value="Yok"]').attr('checked', true);
                $('[name="contactingStaffTroubleInput"]').attr('disabled', true);
            } else {
                $('[name="contactingStaffTrouble"][value="Var"]').attr('checked', true);
                $('[name="contactingStaffTroubleInput"]').val(contactingStaffTrouble).attr('disabled', false);
            }

            $('[name="contactingStaffTrouble"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Var"){
                    $('[name="contactingStaffTroubleInput"]').attr('disabled', false);
                } else {
                    $('[name="contactingStaffTroubleInput"]').val('').attr('disabled', true);
                }
            });

            var careAcceptance = "<?php echo $iletisim['careAcceptance']; ?>";

            if (careAcceptance == "Katılmıyor"){
                var careAcceptanceNon = "<?php echo $iletisim['careAcceptanceNon']; ?>";

                $('[name="careAcceptance"][value="Katılmıyor"]').attr('checked', true);
                $('[name="careAcceptanceNon"]').prop('disabled', false);
                $('[name="careAcceptanceNon"][value="'+careAcceptanceNon+'"]').prop('checked', true);
                $('[name="careAcceptanceWilling"]').prop('disabled', true);
            } else {
                var careAcceptanceWilling = "<?php echo $iletisim['careAcceptanceWilling']; ?>";

                $('[name="careAcceptance"][value="Katılıyor"]').attr('checked', true);
                $('[name="careAcceptanceWilling"]').prop('disabled', false);
                $('[name="careAcceptanceWilling"][value="'+careAcceptanceWilling+'"]').prop('checked', true);
                $('[name="careAcceptanceNon"]').prop('disabled', true);
            }

            $('[name="careAcceptance"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Katılmıyor"){
                    $('[name="careAcceptanceWilling"]').prop('checked', false).prop('disabled', true);
                    $('[name="careAcceptanceNon"]').prop('disabled', false);
                } else {
                    $('[name="careAcceptanceNon"]').prop('checked', false).prop('disabled', true);
                    $('[name="careAcceptanceWilling"]').prop('disabled', false);
                }
            })

            var treatmentAcceptance = "<?php echo $iletisim['treatmentAcceptance']; ?>";
            
            if (treatmentAcceptance == "Kabul ediyor"){
                $('[name="treatmentAcceptance"][value="Kabul ediyor"]').attr('checked', true);
                $('[name="treatmentAcceptanceInput"]').attr('disabled', true);
            } else {
                $('[name="treatmentAcceptance"][value="Kabul etmiyor"]').attr('checked', true);
                $('[name="treatmentAcceptanceInput"]').val(treatmentAcceptance).attr('disabled', false);
            }

            $('[name="treatmentAcceptance"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Kabul etmiyor"){
                    $('[name="treatmentAcceptanceInput"]').attr('disabled', false);
                } else {
                    $('[name="treatmentAcceptanceInput"]').val('').attr('disabled', true);
                }
            });

        })
    </script>
    <script>
            $(function() {
                $('#submit').click(function(e) {
                    e.preventDefault()

                    console.log('submitted');

                    var id = "<?php

                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>";
                            var form_id = '<?php echo $form_id ?>';
                            var patient_id = "<?php echo $iletisim['patient_id']; ?>";
                            let patient_name = "<?php echo $iletisim['patient_name']; ?>";
                            let yourDate = new Date();
                            let creation_date = yourDate.toISOString().split('T')[0];
                            let updateDate = yourDate.toISOString().split('T')[0];
                            let communicationProblem = $("input[name='communicationProblem']:checked").val() === "Var" ? $('input[name="communicationProblemInput"]').val() : "Yok";
                            let companion = $("input[name='companion']:checked").val() === "Var" ? $('input[name="companionInput"]').val() : "Yok";
                            let reachTrouble = $("input[name='reachTrouble']:checked").val() === "Var" ? $('input[name="reachTroubleInput"]').val() : "Yok";
                            let contactingStaffTrouble = $("input[name='contactingStaffTrouble']:checked").val() === "Var" ? $('input[name="contactingStaffTroubleInput"]').val() : "Yok";
                            let careAcceptance = $("input[name='careAcceptance']:checked").val();
                            let careAcceptanceWilling = $("input[name='careAcceptanceWilling']:checked").val() ? $('input[name="careAcceptanceWilling"]:checked').val() : "Yok";
                            let careAcceptanceNon = $("input[name='careAcceptanceNon']:checked").val() ? $('input[name="careAcceptanceNon"]:checked').val() : "Yok";
                            let treatmentAcceptance = $("input[name='treatmentAcceptance']:checked").val() === "Kabul etmiyor" ? $('input[name="treatmentAcceptanceInput"]').val() : "Kabul ediyor";

                            console.log("communication problem:", communicationProblem, "companion:", companion, "reach trouble:", reachTrouble, "contacting staff trouble:", contactingStaffTrouble, "care acceptance:", careAcceptance, "care acceptance willing:", careAcceptanceWilling, "care acceptance non:", careAcceptanceNon, "treatment acceptance:", treatmentAcceptance )
                                       //set border color normal
                            $('.form-control').css('border-color', '#ced4da');
                            //set all error messages to none
                                $('.option-error').css('display', 'none');

                if($(".form-check-input[name='communicationProblem']:checked").length === 0){
                    // Scroll to communicationProblem
                    $('html, body').animate({
                        scrollTop: $("input[name='communicationProblem']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='communicationProblem']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='communicationProblem'][value='Var']:checked").length !== 0 && $('input[name="communicationProblemInput"]').val() === "" ){
                    //Scroll to communicationProblemInput
                    $('html, body').animate({
                                    scrollTop: $("#communicationProblemInput").offset().top
                                }, 200);
                    // change border color
                    $('#communicationProblemInput').css('border-color', 'red');
                                //stop function
                                return false;
                }

                else if($(".form-check-input[name='companion']:checked").length === 0){
                    // Scroll to companion
                    $('html, body').animate({
                        scrollTop: $("input[name='companion']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='companion']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='companion'][value='Var']:checked").length !== 0 && $('input[name="companionInput"]').val() === "" ){
                    //Scroll to companionInput
                    $('html, body').animate({
                                    scrollTop: $("#companionInput").offset().top
                                }, 200);
                    // change border color
                    $('#companionInput').css('border-color', 'red');
                                //stop function
                                return false;
                }

                else if($(".form-check-input[name='reachTrouble']:checked").length === 0){
                    // Scroll to reachTrouble
                    $('html, body').animate({
                        scrollTop: $("input[name='reachTrouble']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='reachTrouble']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='reachTrouble'][value='Var']:checked").length !== 0 && $('input[name="reachTroubleInput"]').val() === "" ){
                    //Scroll to reachTroubleInput
                    $('html, body').animate({
                                    scrollTop: $("#reachTroubleInput").offset().top
                                }, 200);
                    // change border color
                    $('#reachTroubleInput').css('border-color', 'red');
                                //stop function
                                return false;
                }

                else if($(".form-check-input[name='contactingStaffTrouble']:checked").length === 0){
                    // Scroll to contactingStaffTrouble
                    $('html, body').animate({
                        scrollTop: $("input[name='contactingStaffTrouble']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='contactingStaffTrouble']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;  
                }
                else if($(".form-check-input[name='contactingStaffTrouble'][value='Var']:checked").length !== 0 && $('input[name="contactingStaffTroubleInput"]').val() === "" ){
                    //Scroll to contactingStaffTroubleInput
                    $('html, body').animate({
                                    scrollTop: $("#contactingStaffTroubleInput").offset().top
                                }, 200);
                    // change border color
                    $('#contactingStaffTroubleInput').css('border-color', 'red');
                                //stop function
                                return false;
                }

                else if($(".form-check-input[name='careAcceptance']:checked").length === 0){
                    // Scroll to careAcceptance
                    $('html, body').animate({
                        scrollTop: $("input[name='careAcceptance']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='careAcceptance']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='careAcceptance']").is(':checked') && $("input[name='careAcceptance']:checked").val() === "Katılmıyor" && !$("input[name='careAcceptanceNon']").is(':checked')){
                    // Scroll to careAcceptanceWilling
                        $('html, body').animate({
                        scrollTop: $("input[name='careAcceptance']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='careAcceptance']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='careAcceptance']").is(':checked') && $("input[name='careAcceptance']:checked").val() === "Katılıyor" && !$("input[name='careAcceptanceWilling']").is(':checked')){
                    // Scroll to careAcceptanceWilling
                        $('html, body').animate({
                        scrollTop: $("input[name='careAcceptance']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='careAcceptance']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                else if(!$(".form-check-input[name='treatmentAcceptance']").is(':checked')){
                    // Scroll to treatmentAcceptance
                    $('html, body').animate({
                        scrollTop: $("input[name='treatmentAcceptance']").first().offset().top
                    }, 200);
                    // Display error message
                    $(".form-check-input[name='treatmentAcceptance']").first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                else if($(".form-check-input[name='treatmentAcceptance'][value='Kabul etmiyor']").is(':checked') && $('input[name="treatmentAcceptanceInput"]').val() === "" ){
                    //Scroll to treatmentAcceptanceInput
                    $('html, body').animate({
                                    scrollTop: $("[name='treatmentAcceptanceInput']").offset().top
                                }, 200);
                    // change border color
                    $('[name="treatmentAcceptanceInput"]').css('border-color', 'red');
                                //stop function
                                return false;
                } else {

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Iletisim.php',
                            data: {
                                
                                form_id: form_id,
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                communicationProblem: communicationProblem,
                                companion: companion,
                                reachTrouble: reachTrouble,
                                contactingStaffTrouble: contactingStaffTrouble,
                                careAcceptance: careAcceptance,
                                careAcceptanceWilling: careAcceptanceWilling,
                                careAcceptanceNon: careAcceptanceNon,
                                treatmentAcceptance: treatmentAcceptance,
                                form_name: 'iletisimForm1'
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
                                Swal.fire({
                                    'title': 'Errors',
                                    'text': 'There were errors',
                                    'type': 'error'
                                })
                                }
                            })
                        }
                
                        });
                        
                })

            </script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    </body>
</html>