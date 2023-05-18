<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (!isset($_SESSION['userlogin'])) {
    header("Location: main.php");
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
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <!-- Template Stylesheet -->
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
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">YAŞAMSAL BULGU TAKİBİİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="time" class="form-control" required name="time" id="diger" placeholder="Saat">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Vücut Sıcaklığı:</p>
                            <input type="text" class="form-control" required name="body_temperature" id="diger" placeholder="Vücut Sıcaklığı">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Timpanik*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Timpanik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Axillar">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Axillar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Oral">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Oral</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Rektal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Rektal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="measurement_location" id="measurement_location" value="Temporal">
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
                                    <input class="form-check-input" type="radio" name="heartrate_location" id="heartrate_location" value="Apikal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Apikal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_location" id="heartrate_location" value="Periferik">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Periferik</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız hızı:</p>
                            <input type="text" class="form-control" required name="heart_rate" id="diger" placeholder="Nabız hızı">
                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">Nabız niteliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Dolgun">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Dolgun</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Zayıf">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Zayıf</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Düzenli">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzenli</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Düzensiz">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Düzensiz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="heartrate_nature" id="heartrate_nature" value="Yok">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum sayısı:</p>
                            <input type="text" class="form-control" required name="respiratory_rate" id="diger" placeholder="Solunum sayısı">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Solunum Özelliği: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Normal">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Normal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Derin">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Derin</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respiratory_nature" id="breathing_nature" value="Yüzeyel">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yüzeyel</span>
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kan basıncı:</p>
                            <input type="text" class="form-control" required name="blood_pressure" id="diger" placeholder="Tetkik Sonucu">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">KB Ölçüm yeri: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Brakial(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Brakial(Sol)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Brakial(Sol)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Popliteal(Sağ)">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Popliteal(Sağ)</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bp_measurement_location" id="bp_measurement_location" value="Popliteal(Sol)">
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
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_alm" value="Almıyor">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Almıyor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_status" id="o2_status_al" value="Aliyor">
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
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_1" value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">O2 maske</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_2" value="Nazal kanül">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Nazal kanül</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="o2_method" id="o2_method_diger" value="Diğer">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Diğer</span>
                                    </label>
                                    <div class="input-section d-flex">
                                        <input type="text" class="form-control" required name="o2_method_diger" id="o2_method_diger_input" placeholder="Yöntemi">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="input-section d-flex">
                            <p class="usernamelabel">SPO2 (%):</p>
                            <input type="text" class="form-control" required name="spo2_percentage" id="diger" placeholder="SPO2 (%)">
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">Günlük Günlük Kilo Takibi Yapiliyor mi?</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="weight_input_toggle" value="O2 maske">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yapilmiyorum</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-section" id="kilo_yapiliyor">
                            <p class="usernamelabel">Günlük Kilo Takibi:</p>
                            <input type="text" class="form-control" name="weight_input" id="diger" placeholder="Günlük Kilo Takibi">
                        </div>
                        <input class="form-control submit" type='submit' name="submit" id="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script>
        $(function() {
            $('#closeBtn').click(function(e) {
                let patient_id = "<?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>";
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                $("#content").load(url);
            })
        });


        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault()
                var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 10;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
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
                let bp_measurement_location = $("input[type='radio'][name='bp_measurement_location']:checked").val();
                let o2_status = $("input[type='radio'][name='o2_status']:checked").val();
                let o2_method = '';
                let measurement_location = $("input[type='radio'][name='measurement_location']:checked").val();

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
                        respiratory_nature: respiratory_nature,
                        body_temperature: body_temperature,
                        heart_rate: heart_rate,
                        heartrate_location: heartrate_location,
                        heartrate_nature: heartrate_nature,
                        heartrate_respiratory: heartrate_nature,
                        respiratory_rate: respiratory_rate,
                        blood_pressure: blood_pressure,
                        measurement_location: measurement_location,
                        bp_measurement_location: bp_measurement_location,
                        o2_status: o2_status,
                        o2_method: o2_method,
                        spo2_percentage: spo2_percentage,
                        weight_input: weight_input
                    },
                    success: function(data) {
                        alert(data);
                        let url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                        $("#content").load(url);
                    },
                    error: function(data) {
                        console.log(data);
                        alert(data);
                    }
                })

            })

        });
    </script>
    <script src=""></script>
</body>

</html>