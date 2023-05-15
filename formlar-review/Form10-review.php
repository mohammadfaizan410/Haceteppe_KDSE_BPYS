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


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->


    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">

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
    </style>

<body>
    <?php
    require_once('../config-students.php');
    $userid = $_SESSION['userlogin']['id'];
    $form_id = $_GET['form_id'];
    $sql = "SELECT * FROM form10 where form_id= $form_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    var_dump($form10);
    var_dump((int) $form10[0]['respiratory_rate']);
    $respiratory_rate = (int) $form10[0]['respiratory_rate'];
    ?>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">YAŞAMSAL BULGU TAKİBİİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required
                                value=<?php echo $form10[0]['patient_name']; ?> name="patient_name" id="diger"
                                placeholder="Patient Name" disabled>
                        </div>
                        ` <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value=<?php echo $form10[0]['patient_id']; ?>
                                required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        ` <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="time" class="form-control" value=<?php echo $form10[0]['time']; ?> required
                                name="time" id="diger" placeholder="Saat">
                        </div>

                        ` <div class="input-section d-flex">
                            <p class="usernamelabel">Vücut Sıcaklığı:</p>
                            <input type="text" class="form-control" required
                                value=<?php echo $form10[0]['body_temperature']; ?> name="body_temperature" id="diger"
                                placeholder="Vücut Sıcaklığı">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location"
                                        id="measurement_location" value="Timpanik*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Timpanik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location"
                                        id="measurement_location" value="Axillar">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Axillar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location"
                                        id="measurement_location" value="Oral">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Oral</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location"
                                        id="measurement_location" value="Rektal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Rektal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location"
                                        id="measurement_location" value="Temporal">
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
                                    <input class="form-check-input" type="radio" name="heartrate_location"
                                        id="heartrate_location" value="Apikal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Apikal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_location"
                                        id="heartrate_location" value="Periferik">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Periferik</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız hızı:</p>
                            <input type="text" class="form-control" value=<?php echo $form10[0]['heart_rate']; ?>
                                required name="heart_rate" id="diger" placeholder="Nabız hızı">
                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız niteliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature"
                                        id="heartrate_nature" value="Dolgun">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Dolgun</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature"
                                        id="heartrate_nature" value="Zayıf">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Zayıf</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature"
                                        id="heartrate_nature" value="Düzenli">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzenli</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature"
                                        id="heartrate_nature" value="Düzensiz">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzensiz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature"
                                        id="heartrate_nature" value="Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum sayısı:</p>
                            <input type="text" class="form-control"
                                value='<?php echo $form10[0]['respiratory_rate']; ?>' required name="respiratory_rate"
                                id="diger" placeholder="Solunum sayısı">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum Özelliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature"
                                        id="breathing_nature" value="Normal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Normal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature"
                                        id="breathing_nature" value="Derin">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Derin</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature"
                                        id="breathing_nature" value="Yüzeyel">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yüzeyel</span>
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kan basıncı:</p>
                            <input type="text" class="form-control" required
                                value=<?php echo $form10[0]['blood_pressure']; ?> name="blood_pressure" id="diger"
                                placeholder="Tetkik Sonucu">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">KB Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location"
                                        id="bp_measurement_location" value="Brakial(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location"
                                        id="bp_measurement_location" value="Brakial(Sol)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sol)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location"
                                        id="bp_measurement_location" value="Popliteal(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Popliteal(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location"
                                        id="bp_measurement_location" value="Popliteal(Sol)">
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
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_alm"
                                        value="Almıyor">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Almıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_al"
                                        value="Aliyor">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Aliyor</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">O2 verme Yöntemi: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_1"
                                        value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">O2 maske</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_2"
                                        value="Nazal kanül">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Nazal kanül</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_diger"
                                        value="Diğer">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Diğer</span>
                                    </label>
                                    <div class="input-section d-flex">
                                        <input type="text" class="form-control" required disabled name="o2_method_diger"
                                            id="o2_method_diger_input" placeholder="Yöntemi">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">SPO2 (%):</p>
                            <input type="text" class="form-control" required name="spo2_percentage"
                                value=<?php echo $form10[0]['spo2_percentage']; ?> id="diger" placeholder="SPO2 (%)">
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">Günlük Günlük Kilo Takibi Yapiliyor mi?</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="weight_input_toggle"
                                        value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yapilmiyorum</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-section" id="kilo_yapiliyor">
                            <p class="usernamelabel">Günlük Kilo Takibi:</p>
                            <input type="text" class="form-control" value=<?php echo $form10[0]['weight_input']; ?>
                                name="weight_input" id="diger" placeholder="Günlük Kilo Takibi">
                        </div>
                        <div class='tanı1-warning' id="tanı1-warning">
                            <p>Girdileriniz Gaz Değişiminde Bozulma Tanısı ile uyuşuyor bu tanıyı eklemek ister misiniz?
                            </p>
                            <a class='addtanı' href='#'>Ekle</a>
                        </div>
                        <input class="form-control submit" type="submit" name="submit" id="submit" value="Güncelle">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    var tanı_respiratory_rate = parseInt($("input[name='respiratory_rate']").val());
    var tanı_heart_rate = parseInt($("input[name='heart_rate']").val());
    var tanı_spo2_percentage = parseInt($("input[name='spo2_percentage']").val());
    var tanı_o2_status = '<?php echo $form10[0]['o2_status']; ?>'
    var tanı_respiratory_nature = '<?php echo $form10[0]['respiratory_nature']; ?>'
    console.log("AAAAAA");
    console.log($("input[type='radio'][name='o2_status']:checked").val())
    console.log(tanı_respiratory_nature);

    if (tanı_respiratory_rate < 16 || tanı_respiratory_rate > 20 || tanı_heart_rate > 100 || tanı_spo2_percentage <
        95 || tanı_o2_status == "Aliyor" || tanı_respiratory_nature === "Derin" || tanı_respiratory_nature === "Yüzeyel"
    ) {
        $('#tanı1-warning').css("display", "block");
        $(function() {
            $("a.addtanı").on("click", function(e) {
                e.preventDefault();
                console.log("tanı111111");
                // var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php";
                // $("#content").load(url);
            });
        });
    } else {
        $('#tanı1-warning').css("display", "none");
    }
    </script>
    <script>
    $(function() {
        $('#closeBtn').click(function(e) {
            let patient_name = $("input[name='patient_name']").val();
            let patient_id = parseInt($("input[name='patient_id']").val());
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });


    //preselecting inputs
    $('input[name="measurement_location"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['measurement_location']; ?>") {
            $(this).prop('checked', true);
        }
    });
    $('input[name="heartrate_nature"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['heartrate_nature']; ?>") {
            $(this).prop('checked', true);
        }
    });

    $('input[name="respiratory_nature"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['respiratory_nature']; ?>") {
            $(this).prop('checked', true);
        }
    });

    $('input[name="bp_measurement_location"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['bp_measurement_location']; ?>") {
            $(this).prop('checked', true);
        }
    });

    $('input[name="o2_status"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['o2_status']; ?>") {
            $(this).prop('checked', true);
        }
    });
    $('input[name="heartrate_location"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['heartrate_location']; ?>") {
            $(this).prop('checked', true);
        }
    });
    $('input[name="o2_method"]').each(function() {
        if ($(this).val() === "<?php echo $form10[0]['o2_method']; ?>") {
            $(this).prop('checked', true);
        }
    });



    $(function() {
        $('#closeBtn').click(function(e) {
            $("#content").load("formlar-student.php");

        })
    });
    </script>
    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()


            console.log("values initialized")
            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var form_id = <?php echo $form_id ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_num = 10;
            let patient_name = $("input[name='patient_name']").val();
            let patient_id = parseInt($("input[name='patient_id']").val());
            let yourDate = new Date()
            let creationDate = yourDate.toISOString().split('T')[0];
            let updateDate = yourDate.toISOString().split('T')[0];
            let time = $("input[name='time']").val();
            let body_temperature = $("input[name='body_temperature']").val();
            let heart_rate = $("input[name='heart_rate']").val();
            let heartrate_nature = $("input[type='radio'][name='heartrate_nature']:checked").val();
            let heartrate_location = $("input[type='radio'][name='heartrate_location']:checked").val();
            let respiratory_rate = $("input[name='respiratory_rate']").val();
            let respiratory_nature = $("input[type='radio'][name='respiratory_nature']:checked").val();
            let blood_pressure = $("input[name='blood_pressure']").val();
            let bp_measurement_location = $(
                "input[type='radio'][name='bp_measurement_location']:checked").val();
            let o2_status = $("input[type='radio'][name='o2_status']:checked").val();
            let o2_method = '';
            let measurement_location = $("input[type='radio'][name='measurement_location']:checked")
                .val();

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
                "input[name='weight_input']").val() : 'Yapilmiyorum';

            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/submitOrUpdateYasamsal_form10.php',
                data: {
                    isUpdate: true,
                    form_id: form_id,
                    id: id,
                    name: name,
                    surname: surname,
                    age: age,
                    not: not,
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
                    alert("SuccessFully Updated!");
                    let url =
                        "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                    $("#content").load(url);
                },
                error: function(data) {
                    console.log(data)
                }
            })

        })

    });
    </script>
    <script src=""></script>
</body>

</html>