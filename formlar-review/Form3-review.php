<?php
session_start();
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
$sql = "SELECT * FROM form3 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>e-BYRYS-KKDS</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../bootstrap.min.css" rel="stylesheet">

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
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Düşme Riski Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <!--<div class="input-section-wrapper">-->

                        <!--<div class="input-section-item">-->
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger"
                                placeholder="Patient Name" value="<?php echo $form3[0]['patient_name']; ?>">
                        </div>
                        ` <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger"
                                placeholder="Patient ID" value="<?php echo $form3[0]['patient_id']; ?>">
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörü</p>
                            <p class="usernamelabel" style="font-weight: bold;">Puan ( ≥ 5 Yüksek Risk )</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Konfüzyon / Dezoryantasyon: </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="confusion_point"
                                    id="confusionpoint" value="4">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Semptomatik Depresyon:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="symtomatic_depression_point"
                                    id="symtomatic_depression_point" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Boşaltım ihtiyacında sorun:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="evacuation_trouble"
                                    id="evacuation_trouble" value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Baş dönmesi:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dizziness_point"
                                    id="dizziness_point" value="option1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Cinsiyet (erkek):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gender_point" id="gender_point"
                                    value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Antiepileptik Grubu İlaç Alımı:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="epilepsy_drug_point"
                                    id="epilepsy_drug_point" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Benzodiazepin Grubu İlaç Alımı:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="benzo_drug_point"
                                    id="benzo_drug_point" value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <!--</div>-->

                        <!--<div class="input-section-item">-->

                        <div class="input-section d-flex" style="justify-content:space-around">
                            <p class="usernamelabel" style="font-weight: bold;">Sandalyeden Kalkma Testi</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kollarını Kullanmadan Kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="chair1"
                                    value="0">
                                <label class="form-check-label" for="test">
                                    <span class="checkbox-header">(0 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kalkmak için sandalye kolluğunu kullanıyor ancak tek denemede
                                kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="test" id="chair2" value="1">
                                <label class="form-check-label" for="test">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kalkmak için sandalye kolluğunu kullanıyor ancak birden fazla
                                denemede kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="test" id="chair3" value="3">
                                <label class="form-check-label" for="test">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yardım olmadan kalkamıyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="test" id="chair4" value="4">
                                <label class="form-check-label" for="test">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel" style="font-weight: bold;">Toplam:
                                "<?php echo $form3[0]['total']; ?>"</p>
                            <div class="form-check">
                                <output></output>
                            </div>
                        </div>
                        <div class="input-section-item"></div>

                        <p style="padding-inline: 15% 15%;">*Alınan puan 5'den düşük ise haftada bir kez yeniden
                            değerlendirme yapılır. Alınan puan 5 veya üzeri ise gün aşırı yeniden değerlendirme yapılır.
                        </p>

                        <!--</div>-->

                        <!--</div>-->

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    $(function() {
        $('#closeBtn').click(function(e) {
            $("#content").load("formlar-student.php");

        })
    });

    var confusionpoint = "<?php echo $form3[0]['confusion_point']; ?>"
    if (confusionpoint == "4") {
        console.log(confusionpoint);

        document.getElementById('confusionpoint').setAttribute('checked', 'checked');
    }
    if (confusionpoint == "") {
        console.log(confusionpoint);

        document.getElementById('confusionpoint').setAttribute('checked', '');
    }

    var symtomatic_depression_point = "<?php echo $form3[0]['symtomatic_depression_point']; ?>"
    if (symtomatic_depression_point == "2") {
        console.log(symtomatic_depression_point);

        document.getElementById('symtomatic_depression_point').setAttribute('checked', 'checked');
    }
    if (confusionpoint == "") {
        console.log(symtomatic_depression_point);

        document.getElementById('symtomatic_depression_point').setAttribute('checked', '');
    }

    var evacuation_trouble = "<?php echo $form3[0]['evacuation_trouble']; ?>"
    if (evacuation_trouble == "1") {
        console.log(evacuation_trouble);

        document.getElementById('evacuation_trouble').setAttribute('checked', 'checked');
    }
    if (evacuation_trouble == "") {
        console.log(evacuation_trouble);

        document.getElementById('evacuation_trouble').setAttribute('checked', '');
    }

    var dizziness_point = "<?php echo $form3[0]['dizziness_point']; ?>"
    if (dizziness_point == "1") {
        console.log(dizziness_point);

        document.getElementById('dizziness_point').setAttribute('checked', 'checked');
    }
    if (dizziness_point == "") {
        console.log(dizziness_point);

        document.getElementById('dizziness_point').setAttribute('checked', '');
    }

    var gender_point = "<?php echo $form3[0]['gender_point']; ?>"
    if (gender_point == "1") {
        console.log(gender_point);

        document.getElementById('gender_point').setAttribute('checked', 'checked');
    }
    if (gender_point == "") {
        console.log(gender_point);

        document.getElementById('gender_point').setAttribute('checked', '');
    }
    var epilepsy_drug_point = "<?php echo $form3[0]['epilepsy_drug_point']; ?>"
    if (epilepsy_drug_point == "2") {
        console.log(epilepsy_drug_point);

        document.getElementById('epilepsy_drug_point').setAttribute('checked', 'checked');
    }
    if (epilepsy_drug_point == "") {
        console.log(epilepsy_drug_point);

        document.getElementById('epilepsy_drug_point').setAttribute('checked', '');
    }

    var benzo_drug_point = "<?php echo $form3[0]['benzo_drug_point']; ?>"
    if (benzo_drug_point == "1") {
        console.log(benzo_drug_point);

        document.getElementById('benzo_drug_point').setAttribute('checked', 'checked');
    }
    if (benzo_drug_point == "") {
        console.log(benzo_drug_point);

        document.getElementById('benzo_drug_point').setAttribute('checked', '');
    }

    var arm_chair_point = "<?php echo $form3[0]['arm_chair_point']; ?>"
    if (arm_chair_point == "0") {
        console.log(arm_chair_point);

        document.getElementById('chair1').setAttribute('checked', 'checked');
    }
    if (arm_chair_point == "1") {
        console.log(arm_chair_point);

        document.getElementById('chair2').setAttribute('checked', 'checked');
    }
    if (arm_chair_point == "3") {
        console.log(arm_chair_point);

        document.getElementById('chair3').setAttribute('checked', 'checked');
    }
    if (arm_chair_point == "4") {
        console.log(arm_chair_point);

        document.getElementById('chair4').setAttribute('checked', 'checked');
    }
    </script>

    <script>
    $(function() {
        $('#submit').click(function(e) {
            console.log("inside ")
            e.preventDefault();
            var valid = this.form.checkValidity();

            if (valid) {
                var form_id = <?php echo $form_id ?>;

                var id = <?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                let name = $('#name').val();
                let surname = $('#surname').val();
                let age = $('#age').val();
                let not = $('#not').val();
                let form_num = 3;
                let patient_name = $("input[name='patient_name']").val();
                let patient_id = parseInt($("input[name='patient_id']").val());
                let yourDate = new Date()
                let creation_date = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let confusion_point = parseInt($("input[name='confusion_point']").val());
                let symtomatic_depression_point = parseInt($(
                    "input[name='symtomatic_depression_point']").val());
                let evacuation_trouble = parseInt($("input[name='evacuation_trouble']").val());
                let dizziness_point = parseInt($("input[name='dizziness_point']").val());
                let gender_point = parseInt($("input[name='gender_point']").val());
                let epilepsy_drug_point = parseInt($("input[name='epilepsy_drug_point']").val());
                let benzo_drug_point = parseInt($("input[name='benzo_drug_point']").val());
                let arm_chair_point = parseInt($("input[type='radio'][name='test']:checked").val());
                let total = confusion_point + symtomatic_depression_point + evacuation_trouble +
                    dizziness_point + gender_point + epilepsy_drug_point + benzo_drug_point;



                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Hacettepe-KDSE-BPYS/submitOrUpdateForm3.php',
                    data: {
                        isUpdate : true,
                          form_id: form_id,
                        form_num: form_num,
                        patient_name: patient_name,
                        patient_id: patient_id,
                        creation_date: creation_date,
                        update_date: updateDate,
                        confusion_point: confusion_point,
                        symtomatic_depression_point: symtomatic_depression_point,
                        evacuation_trouble: evacuation_trouble,
                        dizziness_point: dizziness_point,
                        gender_point: gender_point,
                        epilepsy_drug_point: epilepsy_drug_point,
                        benzo_drug_point: benzo_drug_point,
                        arm_chair_point: arm_chair_point,
                        total: total,
                    },
                    success: function(data) {
                        alert(data);
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
    })
    </script>
    <script src=""></script>
</body>

</html>