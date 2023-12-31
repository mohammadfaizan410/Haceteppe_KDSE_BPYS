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
$sql = "SELECT * FROM hareketform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $hareketform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="form-header">HAREKET GEREKSİNİMİ</h1>
            <div class="input-section">
                    <p class="usernamelabel pb-3">Patient Name:</p>
                    <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name" value="<?php echo $hareketform1[0]['patient_name']; ?>" disabled>
                </div>
                <div class="input-section">
                    <p class="usernamelabel pb-3">Patient ID:</p>
                    <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID" value="<?php echo $hareketform1[0]['patient_id']; ?>" disabled>
                </div>
         
                <div class="input-section">
                <label class="form-check-label pb-3" for="HareketAliskanligi">
                    Hastaneye yatmadan önceki düzenli egzersiz yapma alışkanlığı
                </label>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <input class="form-check-input" type="radio" id="exercisingHabitYok" value="yok" name="exercisingHabit">
                <label for="exercisingHabitYok">Yok</label>
                <input class="form-check-input" type="radio" id="exercisingHabitVar" value="var" name="exercisingHabit">
                <label for="exercisingHabitVar">Var</label>
                    <input type="text" class="form-control" disabled name="exercisingHabitInput" id="exercisingHabitInput">
            </div>
            <div class="input-section">

                <p class="usernamelabel pb-3">Hastanede egzersiz yapma durumuz</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inHospitalExercise" id="inHospitalExercise" value="Hayir">
                            <label class="form-check-label" for="EgzersizDurumu">
                                <span class="checkbox-header">Hayir</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inHospitalExercise" id="inHospitalExercise" value="Evet">
                            <label class="form-check-label" for="EgzersizDurumu">
                                <span class="checkbox-header">Evet</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" disabled name="exerciseType" id="romExcersise" value="ROM egzersizi">
                                                <label class="form-check-label" for="ROM_egzersizi">ROM egzersizi
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exerciseType" disabled id="exerciseType" value="Diğer">
                                                <label class="form-check-label" for="ROM_egzersizi_diger">Diğer</label>
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

                <p class="usernamelabel pb-3">Hareket etme isteği:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="movementProblem" id="movementProblem" value="Sorun Yok">
                            <label class="form-check-label" for="HareketIstegi">
                                <span class="checkbox-header">Sorun Yok </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="movementProblem" id="movementProblem" value="Var">
                            <label class="form-check-label" for="HareketIstegi">
                                <span class="checkbox-header">Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="movementProblemDesc" type="checkbox" id="movementProblemDesc" value="Halsizlik">
                                                <label class="form-check-label" for="Halsizlik">Halsizlik </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="movementProblemDesc" type="checkbox" id="movementProblemDesc" value="Yorgunluk">
                                                <label class="form-check-label" for="Yorgunluk">Yorgunluk</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="movementProblemDesc" type="checkbox" id="movementProblemDesc" value="Anksiyete">
                                                <label class="form-check-label" for="Huzursuzluk">Anksiyete</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="movementProblemDesc" type="checkbox" id="movementProblemDesc" value="Huzursuzluk">
                                                <label class="form-check-label" for="Huzursuzluk">Huzursuzluk</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="movementProblemDesc" type="checkbox" id="movementProblemDesc" value="Diğer">
                                                <label class="form-check-label" for="HDiğer">Diğer</label>
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

                <p class="usernamelabel pb-3">Kıyafetlerini giyme ve çıkarmada</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wearingClothesDependence" id="wearingClothesDependence" value="Bağımsız">
                            <label class="form-check-label" for="giyinme_soyunma">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wearingClothesDependence" id="wearingClothesDependence" value="Yarı bağımlı">
                            <label class="form-check-label" for="giyinme_soyunma">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="wearingClothesDependence" id="wearingClothesDependence" value="Bağımlı">
                            <label class="form-check-label" for="giyinme_soyunma">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">

                <p class="usernamelabel pb-3">Pozisyon değiştirmede </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="changingPositionDependence" id="changingPositionDependence" value="Bağımsız">
                            <label class="form-check-label" for="pozisyon_degistirme">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="changingPositionDependence" id="changingPositionDependence" value="Yarı bağımlı">
                            <label class="form-check-label" for="pozisyon_degistirme">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="changingPositionDependence" id="changingPositionDependence" value="Bağımlı">
                            <label class="form-check-label" for="pozisyon_degistirme">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">

                <p class="usernamelabel pb-3">Ayağa kalkmada </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="standingUpDependence" id="standingUpDependence" value="Bağımsız">
                            <label class="form-check-label" for="AyağaKalkma">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="standingUpDependence" id="standingUpDependence" value="Yarı bağımlı">
                            <label class="form-check-label" for="AyağaKalkma">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="standingUpDependence" id="standingUpDependence" value="Bağımlı">
                            <label class="form-check-label" for="AyağaKalkma">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section">

                <p class="usernamelabel pb-3">Yürümede</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walkingDependence" id="walkingDependence" value="Bağımsız">
                            <label class="form-check-label" for="yurume">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walkingDependence" id="walkingDependence" value="Yarı bağımlı">
                            <label class="form-check-label" for="yurume">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walkingDependence" id="walkingDependence" value="Bağımlı">
                            <label class="form-check-label" for="yurume">
                                <span class="checkbox-header">Bağımlı</span>
                            </label>
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
                    if("<?php echo $hareketform1[0]['exercisingHabit'] ?>" !== ""){
                        $('input[name="exercisingHabit"]').prop('checked', true);
                        $('input[name="exercisingHabitInput"]').prop('disabled', false);
                        $('input[name="exercisingHabitInput"]').val("<?php echo $hareketform1[0]['exercisingHabitInput'] ?>");
                    }
                    if ("<?php echo $hareketform1[0]['inHospitalExercise'] ?>" !== "Hayir") {
                        $('input[name="inHospitalExercise"][value="Evet"]').prop('checked', true);
                        $('.form-check-input[name="exerciseType"]').prop('disabled', false);
                        $('input[name="exerciseType"][value="<?php echo $hareketform1[0]['inHospitalExercise'] ?>"]').prop('checked', true);
                        }
                    else{
                        $('input[name="inHospitalExercise"][value="Hayir"]').prop('checked', true);
                        $('.form-check-input[name="exerciseType"]').prop('disabled', true);
                    }
                    if("<?php echo $hareketform1[0]['movementProblem'] ?>" !== "Sorun Yok"){
                        $('input[name="movementProblem"][value="Var"]').prop('checked', true);
                        $('.form-check-input[name="movementProblemDesc"]').prop('disabled', false);
                        let movementProblemDesc = "<?php echo $hareketform1[0]['movementProblem'] ?>".split("/");
                        for(let i = 0; i < movementProblemDesc.length; i++){
                            $('input[name="movementProblemDesc"][value="' + movementProblemDesc[i] + '"]').prop('checked', true);
                        }
                    }
                    else{
                        $('input[name="movementProblem"][value="Sorun Yok"]').prop('checked', true);
                        $('.form-check-input[name="movementProblemDesc"]').prop('disabled', true);
                    }
                    if("<?php echo $hareketform1[0]['wearingClothesDependence'] ?>" !== ""){
                        $('input[name="wearingClothesDependence"][value="<?php echo $hareketform1[0]['wearingClothesDependence'] ?>"]').prop('checked', true);
                    }
                    if("<?php echo $hareketform1[0]['changingPositionDependence'] ?>" !== ""){
                        $('input[name="changingPositionDependence"][value="<?php echo $hareketform1[0]['changingPositionDependence'] ?>"]').prop('checked', true);
                    }
                    if("<?php echo $hareketform1[0]['standingUpDependence'] ?>" !== ""){
                        $('input[name="standingUpDependence"][value="<?php echo $hareketform1[0]['standingUpDependence'] ?>"]').prop('checked', true);
                    }
                    if("<?php echo $hareketform1[0]['walkingDependence'] ?>" !== ""){
                        $('input[name="walkingDependence"][value="<?php echo $hareketform1[0]['walkingDependence'] ?>"]').prop('checked', true);
                    }

             
        </script>


            <script>
                
               $('input[name="exercisingHabit"]').val() === 'var' ? $('input[name="exercisingHabitInput"]').prop('disabled', false) : $('input[name="exercisingHabitInput"]').prop('disabled', true);

            $('.form-check-input[name="inHospitalExercise"]').change(function() {
                if ($(this).val() === 'Evet') {
                    $('input[name="exerciseType"]').prop('disabled', false);
                } else {
                    $('input[name="exerciseType"]').prop('disabled', true);
                }
                });

               
             $('.form-check-input[name="movementProblem"]').change(function() {
                console.log($(this).val());
                if ($(this).val() === 'Var') {
                    $('.form-check-input[name="movementProblemDesc"]').prop('disabled', false);
                } else {
                    $('.form-check-input[name="movementProblemDesc"]').prop('disabled', true);
                }
                });

    

                  
                $(function() {
                $('#closeBtn1').click(function(e) {
                    e.preventDefault();
                    console.log("close btn clicked");
                    if("<?php echo $_SESSION['userlogin']['type']?>" === "student"){
                 
                        let patient_id = <?php echo $patient_id ?>;
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

                            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
                            var form_id = <?php echo $_GET['form_id']; ?>;
                            var name = $('#name').val();
                            var surname = $('#surname').val();
                            var age = $('#age').val();
                            var not = $('#not').val();
                            let form_name = "hareketForm1";
                             let patient_name = $("input[name='patient_name']").val();
                             let patient_id = parseInt($("input[name='patient_id']").val());
                            let yourDate = new Date()
                            let creationDate = yourDate.toISOString().split('T')[0];
                            let updateDate = yourDate.toISOString().split('T')[0];
                            let exercisingHabit = $('input[name="exercisingHabit"]').val() ? $('input[name="exercisingHabit"]').val() : "Hayir";
                            let exercisingHabitInput = "";
                            if(exercisingHabit === "exercisingHabit"){
                                exercisingHabit = $('input[name="exercisingHabitInput"]').val();
                            }
                            let inHospitalExercise = $('input[name="inHospitalExercise"]:checked').val() === "Evet" ? $('input[name="exerciseType"]:checked').val() : "Hayir";
                            let movementProblem = $('.form-check-input[name="movementProblem"]:checked').val() === "Var" ? $('.form-check-input[name="movementProblemDesc"]:checked').map(function() {
                                return $(this).val();
                            }).get().join("/") : "Sorun Yok";
                            let wearingClothesDependence = $('input[name="wearingClothesDependence"]:checked').val();
                            let changingPositionDependence = $('input[name="changingPositionDependence"]:checked').val();
                            let standingUpDependence = $('input[name="standingUpDependence"]:checked').val();
                            let walkingDependence = $('input[name="walkingDependence"]:checked').val();

                            console.log("exercising habit: ", exercisingHabit, "in hospital exercise: ", inHospitalExercise, "movement problem: ", movementProblem, "wearing clothes dependence: ", wearingClothesDependence, "changing position dependence: ", changingPositionDependence, "standing up dependence: ", standingUpDependence, "walking dependence: ", walkingDependence);

                                  //set border color normal
                            $('.form-control').css('border-color', '#ced4da');
                            //set all error messages to none
                                $('.option-error').css('display', 'none');
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

                //             if($('.form-check-input[name="time_range"]:checked').length === 0){
                //     // Scroll to time_range
                //     $('html, body').animate({
                //         scrollTop: $('.form-check-input[name="time_range"]').first().offset().top
                //     }, 200);
                //     // Display error message
                //     $('.form-check-input[name="time_range"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                //     return false;
                // }

                            if($('.form-check-input[name="exercisingHabit"]:checked').length === 1 && $('input[name="exercisingHabitInput"]').val() === ""){
                                //scroll to exercisingHabit
                                      $('html, body').animate({
                                    scrollTop: $("#exercisingHabitInput").offset().top
                                }, 200);
                                //change border color
                                $('#exercisingHabitInput').css('border-color', 'red');
                                //stop function
                                return false;
                            }

                            if($('.form-check-input[name="inHospitalExercise"]:checked').length === 0){
                                //scroll to inHospitalExercise
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="inHospitalExercise"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="inHospitalExercise"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }
                            if($('.form-check-input[name="inHospitalExercise"]:checked').val() === "Evet" && $('.form-check-input[name="exerciseType"]:checked').length === 0){
                                //scroll to inHospitalExercise
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="inHospitalExercise"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="inHospitalExercise"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }

                            if($('.form-check-input[name="movementProblem"]:checked').length === 0){
                                //scroll to movementProblem
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="movementProblem"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="movementProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }
                            if($('.form-check-input[name="movementProblem"]:checked').length > 0 && $('.form-check-input[name="movementProblem"]:checked').val()=='Var' && $('.form-check-input[name="movementProblemDesc"]:checked').length === 0){
                                //scroll to movementProblem
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="movementProblem"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="movementProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }


                            if ($('.form-check-input[name="wearingClothesDependence"]:checked').length === 0) {
                                // Scroll to wearingClothesDependence
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="wearingClothesDependence"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="wearingClothesDependence"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                // Stop function
                                return false;
                                }

                            if($('.form-check-input[name="changingPositionDependence"]:checked').length === 0){
                                //scroll to changingPositionDependence
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="changingPositionDependence"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="changingPositionDependence"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }

                            if($('.form-check-input[name="standingUpDependence"]:checked').length === 0){
                                //scroll to standingUpDependence
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="standingUpDependence"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="standingUpDependence"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }

                            if($('.form-check-input[name="walkingDependence"]:checked').length === 0){
                                //scroll to walkingDependence
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="walkingDependence"]').first().offset().top
                                }, 200);
                                // Display error message
                                $('.form-check-input[name="walkingDependence"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                //stop function
                                return false;
                            }
                            console.log("values init and validation success ");

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Hareket.php',
                                data: {
                                    'form_id' : form_id,
                                    'isUpdate': true,
                                    'id': id,
                                    'name': name,
                                    'surname': surname,
                                    'age': age,
                                    'not': not,
                                    'form_name': form_name,
                                    'patient_name': patient_name,
                                    'patient_id': patient_id,
                                    'creation_date': creationDate,
                                    'update_date': updateDate,
                                    'exercisingHabit': exercisingHabit,
                                    'inHospitalExercise': inHospitalExercise,
                                    'movementProblem': movementProblem,
                                    'wearingClothesDependence': wearingClothesDependence,
                                    'changingPositionDependence': changingPositionDependence,
                                    'standingUpDependence': standingUpDependence,
                                    'walkingDependence': walkingDependence

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

            <!-- Template Javascript -->
            
</body>

</html>