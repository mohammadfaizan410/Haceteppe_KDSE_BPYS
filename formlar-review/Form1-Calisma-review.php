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

$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
$sql = "SELECT * FROM calismaform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $calismaform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC)[0];
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


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
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
            <h1 class="form-header">ÇALIŞMA, ÜRETME, BOŞ ZAMANINI DEĞERLENDİRME GEREKSİNİMİ</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel ">Düzenli bir işte çalışma durumu </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workStatus" id="DuzenliCalisma"
                                value="Çalışmıyor">
                            <label class="form-check-label" for="DuzenliCalisma">
                                <span class="checkbox-header">Çalışmıyor</span>
                            </label>
                            <div>

                                <label class="form-check-label" for="beslenmeileumuradio">
                                    <span class="checkbox-header">Süre:</span>
                                </label>
                                <input type="text" class="form-control diger" name="nonWorkingTime" disabled id="CalismiyorSure">
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workStatus" id="DuzenliCalisma"
                                value="Çalışıyor">
                            <label class="form-check-label" for="DuzenliCalisma">
                                <span class="checkbox-header">Çalışıyor </span>
                            </label>
                            <div>

                                <label class="form-check-label" for="beslenmeileumuradio">
                                    <span class="checkbox-header">Süre:</span>
                                </label>
                                <input type="text" class="form-control diger" name="workingTime" disabled id="CalisiyorSure">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Hastalığına bağlı iş yaşamına ara verme durumu </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workInterruption" id="IsIzni" value="Yok">
                            <label class="form-check-label" for="IsIzni">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workInterruption" id="IsIzni" value="Var">
                            <label class="form-check-label" for="IsIzni">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="workInterruptionInput" disabled id="IsIzniDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Sağlığı tehdit eden mesleki riskler </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workRisk" id="MeslekRiski"
                                value="Yok">
                            <label class="form-check-label" for="MeslekRiski">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workRisk" id="MeslekRiski"
                                value="Var">
                            <label class="form-check-label" for="MeslekRiski">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="workRiskInput" id="MeslekRiskiDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Birlikte yaşadığı aile bireyleri </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <label class="form-check-label" for="AileBireyleri">
                                <span class="checkbox-header">Belirtiniz:</span>
                            </label>
                            <input type="text" class="form-control diger" name="familyMembers"
                                id="AileBireyleriDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Çocuk sayısı:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <label class="form-check-label" for="CocukSayisi">
                                <span class="checkbox-header">Belirtiniz:</span>
                            </label>
                            <input type="number" class="form-control diger" name="numberOfChildren" id="CocukSayisiDiger">
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Aile içindeki rolü:</p>
                <input type="text" class="form-control" name="roleInFamily" id="AileRolu">
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Hobileri (Belirtiniz) :</p>
                <input type="text" class="form-control" name="hobbies" id="Hobi">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Hastane ortamındaki sosyal aktiviteleri:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="TV izleme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">TV izleme</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="Gazete, kitap, dergi vs. okuma">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Gazete, kitap, dergi vs. okuma </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="Sohbet etme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Sohbet etme </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="El işi vs">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">El işi vs </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="Radyo dinleme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Radyo dinleme </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hospitalSocialActivities" id="HastaneAktivite"
                                value="Diğer">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Diğer: </span>
                            </label>
                            <input type="text" class="form-control diger" name="otherSocialActivities"
                                id="HastaneAktiviteDiger">
                        </div>
                        
                    </div>
                </div>
            </div>
            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var workStatus = "<?php echo $calismaform1['workStatus']; ?>";
            $('[name="workStatus"][value="'+workStatus+'"]').prop('checked', true);

            if (workStatus == "Çalışmıyor"){
                var nonWorkingTime = "<?php echo $calismaform1['nonWorkingTime']; ?>";
                $('[name="nonWorkingTime"]').val(nonWorkingTime).prop('disabled', false);
            } else {
                var workingTime = "<?php echo $calismaform1['workingTime']; ?>";
                $('[name="workingTime"]').val(workingTime).prop('disabled', false);
            }

            $('[name="workStatus"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Çalışmıyor"){
                    $('[name="workingTime"]').val('').prop('disabled', true);
                    $('[name="nonWorkingTime"]').prop('disabled', false);
                } else {
                    $('[name="nonWorkingTime"]').val('').prop('disabled', true);
                    $('[name="workingTime"]').prop('disabled', false);
                }
            })

            var workInterruption = "<?php echo $calismaform1['workInterruption']; ?>";
            $('[name="workInterruption"][value="'+workInterruption+'"]').prop('checked', true);

            if (workInterruption == "Var"){
                var workInterruptionInput = "<?php echo $calismaform1['workInterruptionInput']; ?>";
                $('[name="workInterruptionInput"]').val(workInterruptionInput).prop('disabled', false);
            }

            $('[name="workInterruption"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Yok"){
                    $('[name="workInterruptionInput"]').val('').prop('disabled', true);
                } else {
                    $('[name="workInterruptionInput"]').prop('disabled', false);
                }
            })

            var workRisk = "<?php echo $calismaform1['workRisk']; ?>";
            $('[name="workRisk"][value="'+workRisk+'"]').prop('checked', true);

            if (workRisk == "Var"){
                var workRiskInput = "<?php echo $calismaform1['workRiskInput']; ?>";
                $('[name="workRiskInput"]').val(workRiskInput).prop('disabled', false);
            } 

            $('[name="workRisk"]').on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Var"){
                    $('[name="workRiskInput"]').prop('disabled', false);
                } else {
                    $('[name="workRiskInput"]').val('').prop('disabled', true);
                }
            })

            var familyMembers = "<?php echo $calismaform1['familyMembers']; ?>";
            $('[name="familyMembers"]').val(familyMembers);

            var numberOfChildren = "<?php echo $calismaform1['numberOfChildren']; ?>";
            $('[name="numberOfChildren"]').val(numberOfChildren);

            
            var roleInFamily = "<?php echo $calismaform1['roleInFamily']; ?>";
            $('[name="roleInFamily"]').val(roleInFamily);

            var hobbies = "<?php echo $calismaform1['hobbies']; ?>";
            $('[name="hobbies"]').val(hobbies);

            var hospitalSocialActivities = <?php echo $calismaform1['hospitalSocialActivities']; ?>;
            hospitalSocialActivities.forEach(function(value) {
                $('[name="hospitalSocialActivities"][value="'+value+'"]').prop('checked', true);
                if (value === "Diğer") {
                    var otherSocialActivities = "<?php echo $calismaform1['otherActivities']; ?>"
                    $('[name="otherSocialActivities"]').prop('disabled', false);
                    $('[name="otherSocialActivities"]').val(otherSocialActivities);
                } else {
                    $('[name="otherSocialActivities"]').prop('disabled', true);
                }
            });

            $('[name="hospitalSocialActivities"][value="Diğer"]').on('change', function(){
                if (!$(this).is(':checked')){
                    $('[name="otherSocialActivities"]').val('').prop('disabled', true);
                } else {
                    $('[name="otherSocialActivities"]').prop('disabled', false);
                }
            })

        });
    </script>
    <script>
        $(function() {
            $('#submit').click(function(e) {
            console.log('pressed');
            e.preventDefault();

            if (!$('[name="workStatus"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                    scrollTop: $('[name="workStatus"]').offset().top
                }, 200);
                $('[name="workStatus"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
            } else if (!$('[name="workInterruption"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                    scrollTop: $('[name="workInterruption"]').offset().top
                }, 200);
                $('[name="workInterruption"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
            } else if (!$('[name="workRisk"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                    scrollTop: $('[name="workRisk"]').offset().top
                }, 200);
                $('[name="workRisk"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
            } else if (!$('[name="hospitalSocialActivities"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                    scrollTop: $('[name="hospitalSocialActivities"]').offset().top
                }, 200);
                $('[name="hospitalSocialActivities"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                        return false;
            } else if ($('[name="familyMembers"]').val() === '') {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="familyMembers"]').offset().top
                        }, 200);
                        //change border color
                $('[name="familyMembers"]').css('border-color', 'red');
            } else if ($('[name="numberOfChildren"]').val() === '') {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="numberOfChildren"]').offset().top
                        }, 200);
                        //change border color
                $('[name="numberOfChildren"]').css('border-color', 'red');
            } else if ($('[name="roleInFamily"]').val() === '') {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="roleInFamily"]').offset().top
                        }, 200);
                        //change border color
                $('[name="roleInFamily"]').css('border-color', 'red');
            } else if ($('[name="hobbies"]').val() === '') {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('[name="hobbies"]').offset().top
                        }, 200);
                        //change border color
                $('[name="hobbies"]').css('border-color', 'red');
            } else if ($('[name="workStatus"][value="Çalışmıyor"]').is(':checked') && $('[name="nonWorkingTime"]').val() === '') {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="nonWorkingTime"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="nonWorkingTime"]').css('border-color', 'red');
            } else if ($('[name="workStatus"][value="Çalışıyor"]').is(':checked') && $('[name="workingTime"]').val() === '') {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="workingTime"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="workingTime"]').css('border-color', 'red');
            } else if ($('[name="workInterruption"][value="Var"]').is(':checked') && $('[name="workInterruptionInput"]').val() === '') {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="workInterruptionInput"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="workInterruptionInput"]').css('border-color', 'red');
            } else if ($('[name="workRisk"][value="Var"]').is(':checked') && $('[name="workRiskInput"]').val() === '') {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="workRiskInput"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="workRiskInput"]').css('border-color', 'red');
            } else if ($('[name="hospitalSocialActivities"][value="Diğer"]').is(':checked') && $('[name="otherSocialActivities"]').val() === '') {
                    $('.option-error').css('display', 'none');
                    $('html, body').animate({
                            scrollTop: $('[name="otherSocialActivities"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="otherSocialActivities"]').css('border-color', 'red');
            } else {

                var id = '<?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>';
                var form_id = '<?php echo $form_id ?>';
                var patient_id = '<?php echo $calismaform1['patient_id']; ?>';
                let patient_name = "<?php echo $calismaform1['patient_name']; ?>";
                let yourDate = new Date()
                let creation_date = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let workStatus = $('.form-check-input[name="workStatus"]:checked').val();
                let workingTime = $('[name="workingTime"]').val();
                let nonWorkingTime = $('[name="nonWorkingTime"]').val();
                let workInterruption = $('input[name="workInterruption"]:checked').val();
                let workInterruptionInput = $('[name="workInterruptionInput"]').prop('disabled') ? null : $('[name="workInterruptionInput"]').val(); 
                let workRisk = $('input[name="workRisk"]:checked').val();
                let workRiskInput = $('[name="workRiskInput"]').prop('disabled') ? null : $('[name="workRiskInput"]').val();
                let familyMembers = $('input[name="familyMembers"]').val();
                let numberOfChildren = $('input[name="numberOfChildren"]').val();
                    // let movementProblem = $('.form-check-input[name="movementProblem"]:checked').val() === "Var" ? $('.form-check-input[name="movementProblemDesc"]:checked').map(function() {
                //     return $(this).val();
                // }).get().join("/") : "Sorun Yok"
                let roleInFamily = $('input[name="roleInFamily"]').val();
                let hobbies = $('[name="hobbies"]').val();
                // not to db
                var hospitalSocialActivitiesArr = [];
                        $('[name="hospitalSocialActivities"]:checked').each(function(){
                            hospitalSocialActivitiesArr.push($(this).val());
                        });
                        //
                let hospitalSocialActivities = JSON.stringify(hospitalSocialActivitiesArr);
                let otherActivities = $('input[name="otherSocialActivities"]').val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Calisma.php',
                    data: {
                        isUpdate: true,
                        form_id: form_id,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creation_date,
                        update_date: updateDate,
                        workStatus: workStatus,
                        workingTime: workingTime,
                        nonWorkingTime: nonWorkingTime,
                        workInterruption: workInterruption,
                        workInterruptionInput: workInterruptionInput,
                        workRisk: workRisk,
                        workRiskInput: workRiskInput,
                        familyMembers: familyMembers,
                        numberOfChildren: numberOfChildren,
                        roleInFamily: roleInFamily,
                        hobbies: hobbies,
                        hospitalSocialActivities: hospitalSocialActivities,
                        otherActivities: otherActivities,
                        form_name: 'calismaForm1'
                    },
                    success: function(data) {
                        alert(data)
                        console.log(data)
                        let url =
                                        "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                        patient_id + "&patient_name=" + encodeURIComponent(
                                            patient_name);
                                    $("#content").load(url);
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



        })

    });
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