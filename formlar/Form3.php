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
    <style>
    .send-patient {
        align-self: center;
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

</head>

<body>
    

<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Düşme Riski Değerlendirmesi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <!--<div class="input-section-wrapper">-->

                        <!--<div class="input-section-item">-->
                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörü</p>
                            <p class="usernamelabel" style="font-weight: bold;">Puan ( ≥ 5 Yüksek Risk )</p>
                        </div>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Konfüzyon / Dezoryantasyon: </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="confusion_point" id="RiskFactor"
                                    value="4">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Semptomatik Depresyon:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="symtomatic_depression_point"
                                    id="RiskFactor" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Boşaltım ihtiyacında sorun:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="evacuation_trouble"
                                    id="RiskFactor" value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Baş dönmesi:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dizziness_point" id="RiskFactor"
                                    value="option1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Cinsiyet (erkek):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gender_point" id="RiskFactor"
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
                                    id="RiskFactor" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Benzodiazepin Grubu İlaç Alımı:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="benzo_drug_point" id="RiskFactor"
                                    value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <!--</div>-->

                        <!--<div class="input-section-item">-->

                        <div class="input-section d-flex" style="justify-content:space-around">
                            <p class="usernamelabel" style="font-weight: bold;">Sandalyeden Kalkma Testi</p>
                            <p class="option-error1" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kollarını Kullanmadan Kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test"
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
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test"
                                    value="1">
                                <label class="form-check-label" for="get_up_without_arm">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kalkmak için sandalye kolluğunu kullanıyor ancak birden fazla
                                denemede kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test"
                                    value="3">
                                <label class="form-check-label" for="get_up_without_arm">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yardım olmadan kalkamıyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test"
                                    value="4">
                                <label class="form-check-label" for="get_up_without_arm">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel" style="font-weight: bold;">Toplam:</p>
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

                                                                <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">


                    </form>
                </div>
            </div>
        </div>
    </div>


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
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
    </script>

    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault();

            if (!$('#RiskFactor:checked').length){
                $('.option-error1').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('.option-error').first().offset().top
                        }, 200);
                        // Display error message
                $('.option-error').css('display', 'block');
            } else if (!$('[name="get_up_without_arm"]').is(':checked')) {
                $('.option-error').css('display', 'none');
                $('html, body').animate({
                            scrollTop: $('.option-error1').first().offset().top
                        }, 200);
                        // Display error message
                $('.option-error1').css('display', 'block');
            } else {

                var valid = this.form.checkValidity();

                if (valid) {
                    let name = $('#name').val();
                    let surname = $('#surname').val();
                    let age = $('#age').val();
                    let not = $('#not').val();
                    let form_num = 3;
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
                    let confusion_point = parseInt($("input[name='confusion_point']").val());
                    if (isNaN(confusion_point)) {
                        confusion_point = 0;
                    }
                    let symtomatic_depression_point = parseInt($(
                        "input[name='symtomatic_depression_point']").val());
                    if (isNaN(symtomatic_depression_point)) {
                        symtomatic_depression_point = 0;
                    }
                    let evacuation_trouble = parseInt($("input[name='evacuation_trouble']").val());
                    if (isNaN(evacuation_trouble)) {
                        evacuation_trouble = 0;
                    }
                    let dizziness_point = parseInt($("input[name='dizziness_point']").val());
                    if (isNaN(dizziness_point)) {
                        dizziness_point = 0;
                    }
                    let gender_point = parseInt($("input[name='gender_point']").val());
                    if (isNaN(gender_point)) {
                        gender_point = 0;
                    }
                    let epilepsy_drug_point = parseInt($("input[name='epilepsy_drug_point']").val());
                    if (isNaN(epilepsy_drug_point)) {
                        epilepsy_drug_point = 0;
                    }
                    let benzo_drug_point = parseInt($("input[name='benzo_drug_point']").val());
                    if (isNaN(benzo_drug_point)) {
                        benzo_drug_point = 0;
                    }
                    let arm_chair_point = parseInt($("input[type='radio'][name='test']:checked").val());
                    if (isNaN(arm_chair_point)) {
                        arm_chair_point = 0;
                    }
                    let total = confusion_point + symtomatic_depression_point + evacuation_trouble +
                        dizziness_point + gender_point + epilepsy_drug_point + benzo_drug_point;

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm3.php',
                        data: {
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
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
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

            }
        })
    })
    </script>
    <script src=""></script>
</body>

</html>