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


    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">UYKU GEREKSİNİMİ</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">Ortalama uyku süresi:</p>
                <input type="text" class="form-control" name="averageSleepDuration" id="averageSleepDuration">
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Uykuda Sorun </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sleepProblem" id="sleepProblem" value="Sorun Yok">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sleepProblem" id="sleepProblem" value="Sorun Var">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="sleepProblemDesc" value="Gündüz uykus">
                                                <label class="form-check-label" for="GündüzUykusU">Gündüz uykus </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class=" protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UykudanYorgun" value="Uykudan yorgun kalkma">
                                                        <label class="form-check-label" for="UykudanYorgun">Uykudan yorgun kalkma</label>
                                                    </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UyumaGüçlüğü" value="Uyuma güçlüğü">
                                                <label class="form-check-label" for="UyumaGüçlüğü">Uyuma güçlüğü</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="sleepProblemDesc" value="Uykunun Bölünmesi">
                                                <label class="form-check-label" for="UykununBölünmesi">Uykunun Bölünmesi</label>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="sleepProblemDesc" type="checkbox" id="UykuSorunDiger" value="Diğer">
                                                <label class="form-check-label" for="UykuSorunDiger">Diğer</label>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Uykuya dalmada yardımcı olan alışkanlıkları (kitap okuma, süt içme vb.)
                    (Açıklayınız):</p>
                <input type="text" class="form-control" name="sleepHelpHabits" id="UykuyaDalmaAliskanligi">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Hastane ortamında uykusunu etkileyen faktörler: (Açıklayınız):</p>
                <input type="text" class="form-control" name="hospitalFactorsAffectingSleep" id="UykuyuEtkileyenFaktorler">
            </div>
            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">


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
                        var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                            patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                        $("#content").load(url);

                    })
                });

                $('.form-check-input[name="sleepProblem"]').change(function() {
                    if ($(this).val() == "Sorun Var") {
                        $('input[name="sleepProblemDesc"]').prop('disabled', false);
                    } else {
                        $('input[name="sleepProblemDesc"]').prop('disabled', true);
                    }
                    });
                
                
            </script>

            <script>
                $(function() {
                    $('#submit').click(function(e) {
                        e.preventDefault()

                            let name = $('#name').val();
                            let surname = $('#surname').val();
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
                            let form_name = "uykuForm1";
                            let averageSleepDuration = $('#averageSleepDuration').val();
                            let sleepProblem = $('.form-check-input[name="sleepProblem"]:checked').val() === "Sorun Var" ? $("input[name='sleepProblemDesc']:checked").map(function() {
                                return $(this).val();
                            }).get().join("/") : "Sorun Yok";

                            let sleepHelpHabits = $('#UykuyaDalmaAliskanligi').val();
                            let hospitalFactorsAffectingSleep = $('#UykuyuEtkileyenFaktorler').val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/submitOrUpdateForm1_Uyku.php',
                                data: {
                                    patient_id: patient_id,
                                    patient_name: patient_name,
                                    form_name: form_name,
                                    creation_date: creation_date,
                                    update_date: updateDate,
                                    averageSleepDuration: averageSleepDuration,
                                    sleepProblem: sleepProblem,
                                    sleepHelpHabits: sleepHelpHabits,
                                    hospitalFactorsAffectingSleep: hospitalFactorsAffectingSleep,
                                },
                                success: function(data) {
                                    alert(data);
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


            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>
