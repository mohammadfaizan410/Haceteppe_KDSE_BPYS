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
$sql = "SELECT * FROM form5 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="../style.css" rel="stylesheet">

    <style>
        .send-patient {
            align-self: center;
        }
    </style>

</head>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Glaskow Koma Skalası</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name" value="<?php echo $form5[0]['patient_name']; ?>" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID" value="<?php echo $form5[0]['patient_id']; ?>" disabled>
                        </div>

                        <div class="input-section-item" style="">
                            <p class="usernamelabel" style="font-weight: bold;">Gözleri Açabilme</p>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Spontan Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme1" value="4">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Sözel Emirle Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme2" value="3">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Ağrılı Uyaranla Açabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme3" value="2">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Açmıyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GözleriAçabilme" id="GözleriAçabilme4" value="1">
                                <label class="form-check-label" for="GözleriAçabilme">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Motor Cevap</p>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Emirler Uyuyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap1" value="6">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(6 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Ağrıya lokalize (Ağrılı uyaranı uzaklaştırmaya çalışıyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap2" value="5">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(5 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Çekme (Ekstremitesini ağrılı uyarandan uzaklaştırmaya/çekmeye
                                çalışıyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap3" value="4">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Fleksiyon (Dekortike duruş):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap4" value="3">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Ekstansiyon (Deserebre duruş):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap5" value="2">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Tepki yok :</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="MotorCevap" id="MotorCevap6" value="1">
                                <label class="form-check-label" for="MotorCevap">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Sözel Tepki</p>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Oryante:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki1" value="5">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(5 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Konfüze (Cümle kuruyor ancak yanıtlar yanlış):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki2" value="4">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Uygunsuz cümleler (Bir ya da daha fazla yanlış yanıt):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki3" value="3">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Anlamsız sesler (Hasta mırıldanıyor, inliyor):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki4" value="2">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel">Tepki yok:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="SözelTepki" id="SözelTepki5" value="1">
                                <label class="form-check-label" for="SözelTepki">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="">
                            <p class="usernamelabel" style="font-weight: bold;">Toplam:
                                <?php echo $form5[0]['total']; ?></p>
                            <div class="form-check">
                                <output></output>
                            </div>
                        </div>

                        <p style="padding-inline: 15% 15%;">*GKS: 15 (Oryante), 13-14 (Konfüze), 8-13 (Stubor), 3-8
                            (Prekoma), 3 (Koma)</p>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {
            $('#closeBtn1').click(function(e) {
                let patient_name = $("input[name='patient_name']").val();
                let patient_id = parseInt($("input[name='patient_id']").val());
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                    "&patient_name=" + encodeURIComponent(patient_name);
                $("#content").load(url);

            })
        });

        var eye_opening_points = "<?php echo $form5[0]['eye_opening_points']; ?>"
        if (eye_opening_points == "4") {
            console.log(eye_opening_points);

            document.getElementById('GözleriAçabilme1').setAttribute('checked', 'checked');
        }
        if (eye_opening_points == "3") {
            console.log(eye_opening_points);

            document.getElementById('GözleriAçabilme2').setAttribute('checked', 'checked');
        }
        if (eye_opening_points == "2") {
            console.log(eye_opening_points);

            document.getElementById('GözleriAçabilme3').setAttribute('checked', 'checked');
        }
        if (eye_opening_points == "1") {
            console.log(eye_opening_points);

            document.getElementById('GözleriAçabilme4').setAttribute('checked', 'checked');
        }

        var motor_response_points = "<?php echo $form5[0]['motor_response_points']; ?>"
        if (motor_response_points == "6") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap1').setAttribute('checked', 'checked');
        }
        if (motor_response_points == "5") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap2').setAttribute('checked', 'checked');
        }
        if (motor_response_points == "4") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap3').setAttribute('checked', 'checked');
        }
        if (motor_response_points == "3") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap4').setAttribute('checked', 'checked');
        }
        if (motor_response_points == "2") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap5').setAttribute('checked', 'checked');
        }
        if (motor_response_points == "1") {
            console.log(motor_response_points);

            document.getElementById('MotorCevap6').setAttribute('checked', 'checked');
        }

        var verbal_response_points = "<?php echo $form5[0]['verbal_response_points']; ?>"
        if (verbal_response_points == "5") {
            console.log(verbal_response_points);

            document.getElementById('SözelTepki1').setAttribute('checked', 'checked');
        }
        if (verbal_response_points == "4") {
            console.log(verbal_response_points);

            document.getElementById('SözelTepki2').setAttribute('checked', 'checked');
        }
        if (verbal_response_points == "3") {
            console.log(verbal_response_points);

            document.getElementById('SözelTepki3').setAttribute('checked', 'checked');
        }
        if (verbal_response_points == "2") {
            console.log(verbal_response_points);

            document.getElementById('SözelTepki4').setAttribute('checked', 'checked');
        }
        if (verbal_response_points == "1") {
            console.log(verbal_response_points);

            document.getElementById('SözelTepki5').setAttribute('checked', 'checked');
        }
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault()

                var valid = this.form.checkValidity();

                if (valid) {

                    var form_id = <?php echo $form_id ?>;

                    var id = <?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                    var form_id = <?php echo $form_id ?>;
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let form_num = 6;
                    let yourDate = new Date()
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    let creation_date = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let eye_opening_points = parseInt($(
                        "input[type='radio'][name='GözleriAçabilme']:checked").val());
                    let motor_response_points = parseInt($("input[type='radio'][name='MotorCevap']:checked")
                        .val());
                    let verbal_response_points = parseInt($(
                        "input[type='radio'][name='SözelTepki']:checked").val());
                    let total = eye_opening_points + motor_response_points + verbal_response_points;



                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/submitOrUpdateForm5.php/',
                        data: {
                            isUpdate: true,
                            form_id: form_id,
                            id: id,
                            name: name,
                            surname: surname,
                            age: age,
                            not: not,
                            form_num: form_num,
                            patient_name: patient_name,
                            patient_id: patient_id,
                            creation_date: creation_date,
                            updateDate: updateDate,
                            eye_opening_points: eye_opening_points,
                            motor_response_points: motor_response_points,
                            verbal_response_points: verbal_response_points,
                            total: total
                        },
                        success: function(data) {
                            alert("Güncelleme Başarılı!");
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
    <script src=""></script>
</body>

</html>