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
    <link href="../bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


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
                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel" style="font-weight: bold;">Risk Faktörü</p>
                            <p class="usernamelabel" style="font-weight: bold;">Puan ( ≥ 5 Yüksek Risk )</p>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Konfüzyon / Dezoryantasyon: </p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="confusion_point" id="RiskFactor" value="4">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(4 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Semptomatik Depresyon:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="symtomatic_depression_point" id="RiskFactor" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Boşaltım ihtiyacında sorun:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="evacuation_trouble" id="RiskFactor" value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Baş dönmesi:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dizziness_point" id="RiskFactor" value="option1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Cinsiyet (erkek):</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="gender_point" id="RiskFactor" value="1">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Antiepileptik Grubu İlaç Alımı:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="epilepsy_drug_point" id="RiskFactor" value="2">
                                <label class="form-check-label" for="RiskFactor">
                                    <span class="checkbox-header">(2 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Benzodiazepin Grubu İlaç Alımı:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="benzo_drug_point" id="RiskFactor" value="1">
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
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test" value="0">
                                <label class="form-check-label" for="test">
                                    <span class="checkbox-header">(0 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kalkmak için sandalye kolluğunu kullanıyor ancak tek denemede
                                kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test" value="1">
                                <label class="form-check-label" for="get_up_without_arm">
                                    <span class="checkbox-header">(1 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Kalkmak için sandalye kolluğunu kullanıyor ancak birden fazla
                                denemede kalkabiliyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test" value="3">
                                <label class="form-check-label" for="get_up_without_arm">
                                    <span class="checkbox-header">(3 puan)</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex" style="justify-content:space-between">
                            <p class="usernamelabel">Yardım olmadan kalkamıyor:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get_up_without_arm" id="test" value="4">
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

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(function() {
            $('#closeBtn').click(function(e) {
                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                $("#content").load(url);

            })
        });
    </script>

    <script>
        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
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
                        url: '<?php echo $base_url; ?>/submitOrUpdateForm3.php',
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
                            alert(data);
                            let url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
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
        })
    </script>
    <script src=""></script>
</body>

</html>