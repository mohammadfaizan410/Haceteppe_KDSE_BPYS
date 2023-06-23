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

    // $('.form-check-input[name="careAcceptance"]').change(function(){
    //             if($(this).val() === 'Katılıyor'){
    //                 $('input[name="careAcceptanceWilling"]').prop('disabled', false);
    //                 $('input[name="careAcceptanceNon"]').prop('disabled', true);

    //             }else{
    //                 $('input[name="careAcceptanceWilling"]').prop('disabled', true);
    //                 $('input[name="careAcceptanceNon"]').prop('disabled', false);
    //             }
    //         })

    $('.form-check-input[name="workStatus"]').change(function(){
                if($(this).val() === 'Çalışıyor'){
                    $('input[name="workingTime"]').prop('disabled', false);
                    $('input[name="nonWorkingTime"]').prop('disabled', true);

                }else{
                    $('input[name="workingTime"]').prop('disabled', true);
                    $('input[name="nonWorkingTime"]').prop('disabled', false);
                }
            })
    
    $('.form-check-input[name="workInterruption"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="workInterruptionInput"]').prop('disabled', false);
                    

                }else{
                    $('input[name="workInterruptionInput"]').prop('disabled', true);
                    
                }
            })
    
    $('.form-check-input[name="workRisk"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="workRiskInput"]').prop('disabled', false);
                    

                }else{
                    $('input[name="workRiskInput"]').prop('disabled', true);
                    
                }
            })



    
    </script>

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
        var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
            "&patient_name=" + encodeURIComponent(patient_name);
        $("#content").load(url);
    })
    });
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
                            let workStatus = $('.form-check-input[name="workStatus"]:checked').val() ? $('.form-check-input[name="workStatus"]:checked').val() : 'none';
                            let workingTime = $('#CalisiyorSure').val() ? $('#CalisiyorSure').val() : '';
                            let nonWorkingTime = $('#CalismiyorSure').val() ? $('#CalismiyorSure').val() : '';
                            let workInterruption = $('input[name="workInterruption"]:checked').val() === 'Var' ? $('input[name="workInterruptionInput"]').val() : $('input[name="workInterruption"]:checked').val();
                            let workRisk = $('input[name="workRisk"]:checked').val() === 'Var' ? $('input[name="workRiskInput"]').val() : $('input[name="workRisk"]:checked').val();
                            let familyMembers = $('input[name="familyMembers"]').val() ? $('input[name="familyMembers"]').val() : '';
                            let numberOfChildren = $('input[name="numberOfChildren"]').val() ? $('input[name="numberOfChildren"]').val() : 0;
                             // let movementProblem = $('.form-check-input[name="movementProblem"]:checked').val() === "Var" ? $('.form-check-input[name="movementProblemDesc"]:checked').map(function() {
                            //     return $(this).val();
                            // }).get().join("/") : "Sorun Yok"
                            let roleInFamily = $('input[name="roleInFamily"]').val() ? $('input[name="roleInFamily"]').val() : '';
                            let hobbies = $('.form-check-input[name="hospitalSocialActivities"]:checked').map(function() {
                                return $(this).val();
                            }).get().join("/");
                            let otherActivities = $('input[name="otherSocialActivities"]').val() ? $('input[name="otherSocialActivities"]').val() : '';

                            console.log("wprkStatus: ", workStatus, "workingTime: ", workingTime, "nonWorkingTime: ", nonWorkingTime, "workInterruption: ", workInterruption, "workRisk: ", workRisk, "familyMembers: ", familyMembers, "numberOfChildren: ", numberOfChildren, "roleInFamily: ", roleInFamily, "hobbies: ", hobbies)


                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Calisma.php',
                    data: {
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creation_date,
                        update_date: updateDate,
                        workStatus: workStatus,
                        workingTime: workingTime,
                        nonWorkingTime: nonWorkingTime,
                        workInterruption: workInterruption,
                        workRisk: workRisk,
                        familyMembers: familyMembers,
                        numberOfChildren: numberOfChildren,
                        roleInFamily: roleInFamily,
                        hobbies: hobbies,
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

    <!-- Template Javascript -->
    <script src=""></script>
</body>

</html>