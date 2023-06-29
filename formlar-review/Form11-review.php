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
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    <link href="../style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <?php
    require_once('../config-students.php');
    $userid = $_SESSION['userlogin']['id'];
    $form_id = $_GET['form_id'];
    $sql = "SELECT * FROM form11 where form_id= $form_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $form11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    ?>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">ALDIĞI ÇIKARDIĞI İZLEMİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" value="<?php echo $form11[0]['patient_name']; ?>"
                                required name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form11[0]['patient_id']; ?>"
                                required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">zaman aralığını seçin: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range"
                                        value="08.00-16.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">08.00-16.00</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range"
                                        value="16.00-24.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">16.00-24.00</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range"
                                        value="24.00-08.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">24.00-08.00</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 class="form-header">Aldığı</h2>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">IV:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['iv_input1']; ?>" required name="iv_input1" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['iv_input2']; ?>" required name="iv_input2" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['iv_input3']; ?>" required name="iv_input3" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['iv_input4']; ?>" required name="iv_input4" id="diger"
                                    placeholder="IV input">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kan Ürünü:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['blood_product1']; ?>" required name="blood_product1"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['blood_product2']; ?>" required name="blood_product2"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['blood_product3']; ?>" required name="blood_product3"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['blood_product4']; ?>" required name="blood_product4"
                                    id="diger" placeholder="IV input">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Oral:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['oral1']; ?>" required name="oral1" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['oral2']; ?>" required name="oral2" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['oral3']; ?>" required name="oral3" id="diger"
                                    placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['oral4']; ?>" required name="oral4" id="diger"
                                    placeholder="IV input">
                            </div>
                        </div>


                        <h2 class="form-header">Çıkardığı</h2>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İdrar:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['idrar_input1']; ?>" required name="idrar_input1"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['idrar_input2']; ?>" required name="idrar_input2"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['idrar_input3']; ?>" required name="idrar_input3"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['idrar_input4']; ?>" required name="idrar_input4"
                                    id="diger" placeholder="IV input">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Gaita :</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['gaita_input1']; ?>" required name="gaita_input1"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['gaita_input2']; ?>" required name="gaita_input2"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['gaita_input3']; ?>" required name="gaita_input3"
                                    id="diger" placeholder="IV input">
                                <input type="number" class="form-control mt-2"
                                    value="<?php echo $form11[0]['gaita_input4']; ?>" required name="gaita_input4"
                                    id="diger" placeholder="IV input">
                            </div>
                        </div>
                                            <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#closeBtn1').click(function(e) {
            let patient_name = $("input[name='patient_name']").val();
            let patient_id = parseInt($("input[name='patient_id']").val());
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })

    //preselecting checboxes
    $('input[name="time_range"]').each(function() {
        if ($(this).val() === "<?php echo $form11[0]['time_range']; ?>") {
            $(this).prop('checked', true);
        }
    });
    </script>
    <script>
        $('#submit').click(function(e) {
            e.preventDefault()
            console.log("clicked")

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
            let time_range = $("input[type='radio'][name='time_range']:checked").val();
            let iv_input1 = parseInt($("input[name='iv_input1']").val())
            let iv_input2 = parseInt($("input[name='iv_input2']").val())
            let iv_input3 = parseInt($("input[name='iv_input3']").val())
            let iv_input4 = parseInt($("input[name='iv_input4']").val())
            let blood_product1 = parseInt($("input[name='blood_product1']").val())
            let blood_product2 = parseInt($("input[name='blood_product2']").val())
            let blood_product3 = parseInt($("input[name='blood_product3']").val())
            let blood_product4 = parseInt($("input[name='blood_product4']").val())
            let oral1 = parseInt($("input[name='oral1']").val())
            let oral2 = parseInt($("input[name='oral2']").val())
            let oral3 = parseInt($("input[name='oral3']").val())
            let oral4 = parseInt($("input[name='oral4']").val())
            let idrar_input1 = parseInt($("input[name='idrar_input1']").val())
            let idrar_input2 = parseInt($("input[name='idrar_input2']").val())
            let idrar_input3 = parseInt($("input[name='idrar_input3']").val())
            let idrar_input4 = parseInt($("input[name='idrar_input4']").val())
            let gaita_input1 = parseInt($("input[name='gaita_input1']").val())
            let gaita_input2 = parseInt($("input[name='gaita_input2']").val())
            let gaita_input3 = parseInt($("input[name='gaita_input3']").val())
            let gaita_input4 = parseInt($("input[name='gaita_input4']").val())
            let aldigi_total1 = iv_input1 + blood_product1 + oral1;
            let aldigi_total2 = iv_input2 + blood_product2 + oral2;
            let aldigi_total3 = iv_input3 + blood_product3 + oral3;
            let aldigi_total4 = iv_input4 + blood_product4 + oral4;
            let cikardigi_total1 = idrar_input1 + gaita_input1;
            let cikardigi_total2 = idrar_input2 + gaita_input2;
            let cikardigi_total3 = idrar_input3 + gaita_input3;
            let cikardigi_total4 = idrar_input4 + gaita_input4;
            let total = aldigi_total1 + aldigi_total2 + aldigi_total3 + aldigi_total4 +
                cikardigi_total1 + cikardigi_total2 + cikardigi_total3 + cikardigi_total4;

            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateAldigi_form11.php',
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
                    time_range: time_range,
                    iv_input1: iv_input1,
                    iv_input2: iv_input2,
                    iv_input3: iv_input3,
                    iv_input4: iv_input4,
                    blood_product1: blood_product1,
                    blood_product2: blood_product2,
                    blood_product3: blood_product3,
                    blood_product4: blood_product4,
                    oral1: oral1,
                    oral2: oral2,
                    oral3: oral3,
                    oral4: oral4,
                    idrar_input1: idrar_input1,
                    idrar_input2: idrar_input2,
                    idrar_input3: idrar_input3,
                    idrar_input4: idrar_input4,
                    gaita_input1: gaita_input1,
                    gaita_input2: gaita_input2,
                    gaita_input3: gaita_input3,
                    gaita_input4: gaita_input4,
                    aldigi_total1: aldigi_total1,
                    aldigi_total2: aldigi_total2,
                    aldigi_total3: aldigi_total3,
                    aldigi_total4: aldigi_total4,
                    cikardigi_total1: cikardigi_total1,
                    cikardigi_total2: cikardigi_total2,
                    cikardigi_total3: cikardigi_total3,
                    cikardigi_total4: cikardigi_total4,
                    total: total
                },
                success: function(data) {
                    let url =
                        "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name);
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
                    console.log(data);
                }
            })
        })

    </script>
    <script src=""></script>
</body>

</html>