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


    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">
    <style>
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
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">ALDIĞI ÇIKARDIĞI İZLEMİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">zaman aralığını seçin: </p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                                <input type="number" class="form-control mt-2" required name="iv_input1" id="iv_input1"
                                    placeholder="IV" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="iv_input2" id="iv_input2"
                                    placeholder="IV" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="iv_input3" id="iv_input3"
                                    placeholder="IV" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="iv_input4" id="iv_input4"
                                    placeholder="IV" maxlength="5" min="0" max="10000">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kan Ürünü:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2" required name="blood_product1" id="blood_product1"
                                    placeholder="Kan Ürünü" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="blood_product2" id="blood_product2"
                                    placeholder="Kan Ürünü" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="blood_product3" id="blood_product3"
                                    placeholder="Kan Ürünü" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="blood_product4" id="blood_product4"
                                    placeholder="Kan Ürünü" maxlength="5" min="0" max="10000">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Oral:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2" required name="oral1" id="oral1"
                                    placeholder="Oral" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="oral2" id="oral2"
                                    placeholder="Oral" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="oral3" id="oral3"
                                    placeholder="Oral" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="oral4" id="oral4"
                                    placeholder="Oral" maxlength="5" min="0" max="10000">
                            </div>
                        </div>


                        <h2 class="form-header">Çıkardığı</h2>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İdrar:</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2" required name="idrar_input1" id="idrar_input1"
                                    placeholder="İdrar" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="idrar_input2" id="idrar_input2"
                                    placeholder="İdrar" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="idrar_input3" id="idrar_input3"
                                    placeholder="İdrar" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="idrar_input4" id="idrar_input4"
                                    placeholder="İdrar" maxlength="5" min="0" max="10000">
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Gaita :</p>
                            <div class='d-flex flex-column w-75'>
                                <input type="number" class="form-control mt-2" required name="gaita_input1" id="gaita_input1"
                                    placeholder="Gaita" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="gaita_input2" id="gaita_input2"
                                    placeholder="Gaita" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="gaita_input3" id="gaita_input3"
                                    placeholder="Gaita" maxlength="5" min="0" max="10000">
                                <input type="number" class="form-control mt-2" required name="gaita_input4" id="gaita_input4"
                                    placeholder="Gaita" maxlength="5" min="0" max="10000">
                            </div>
                        </div>
                        <input class="form-control submit" type="submit" name="submit" id="submit" value="Kaydet">
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
                $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 600);

        })
    });
    </script>
    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
            console.log("clicked")

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
                let patient_id = <?php
                                        $userid = $_GET['patient_id'];
                                        echo $userid
                                        ?>;
                let yourDate = new Date()
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let time_range = $("input[type='radio'][name='time_range']:checked").val();
                let iv_input1 = parseInt($("input[name='iv_input1']").val())
                let iv_input2 = parseInt($("input[name='iv_input2']").val()) ? parseInt($("input[name='iv_input2']").val()) : 0;
                let iv_input3 = parseInt($("input[name='iv_input3']").val()) ? parseInt($("input[name='iv_input3']").val()) : 0;
                let iv_input4 = parseInt($("input[name='iv_input4']").val()) ? parseInt($("input[name='iv_input4']").val()) : 0;
                let blood_product1 = parseInt($("input[name='blood_product1']").val()) ? parseInt($("input[name='blood_product1']").val()) : 0;
                let blood_product2 = parseInt($("input[name='blood_product2']").val()) ? parseInt($("input[name='blood_product2']").val()) : 0;
                let blood_product3 = parseInt($("input[name='blood_product3']").val()) ? parseInt($("input[name='blood_product3']").val()) : 0;
                let blood_product4 = parseInt($("input[name='blood_product4']").val()) ? parseInt($("input[name='blood_product4']").val()) : 0;
                let oral1 = parseInt($("input[name='oral1']").val())
                let oral2 = parseInt($("input[name='oral2']").val()) ? parseInt($("input[name='oral2']").val()) : 0;
                let oral3 = parseInt($("input[name='oral3']").val()) ? parseInt($("input[name='oral3']").val()) : 0;
                let oral4 = parseInt($("input[name='oral4']").val()) ? parseInt($("input[name='oral4']").val()) : 0;
                let idrar_input1 = parseInt($("input[name='idrar_input1']").val())
                let idrar_input2 = parseInt($("input[name='idrar_input2']").val()) ? parseInt($("input[name='idrar_input2']").val()) : 0;
                let idrar_input3 = parseInt($("input[name='idrar_input3']").val()) ? parseInt($("input[name='idrar_input3']").val()) : 0;
                let idrar_input4 = parseInt($("input[name='idrar_input4']").val()) ? parseInt($("input[name='idrar_input4']").val()) : 0;
                let gaita_input1 = parseInt($("input[name='gaita_input1']").val()) ? parseInt($("input[name='gaita_input1']").val()) : 0;
                let gaita_input2 = parseInt($("input[name='gaita_input2']").val()) ? parseInt($("input[name='gaita_input2']").val()) : 0;
                let gaita_input3 = parseInt($("input[name='gaita_input3']").val()) ? parseInt($("input[name='gaita_input3']").val()) : 0;
                let gaita_input4 = parseInt($("input[name='gaita_input4']").val()) ? parseInt($("input[name='gaita_input4']").val()) : 0;
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

                //custom validation
                //set all border colors to default
                $('.input').css('border-color', '#ced4da');
                //set all error messages to none
                $('.option-error').css('display', 'none');

                if($('.form-check-input[name="time_range"]:checked').length === 0){
                    // Scroll to time_range
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="time_range"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="time_range"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('#iv_input1').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#iv_input1").offset().top
                    }, 200);
                    //change border color
                    $('#iv_input1').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#blood_product1').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#blood_product1").offset().top
                    }, 200);
                    //change border color
                    $('#blood_product1').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#oral1').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#oral1").offset().top
                    }, 200);
                    //change border color
                    $('#oral1').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#idrar_input1').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#idrar_input1").offset().top
                    }, 200);
                    //change border color
                    $('#idrar_input1').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('#gaita_input1').val() === ""){
                    //scroll to iv_input1
                    $('html, body').animate({
                        scrollTop: $("#gaita_input1").offset().top
                    }, 200);
                    //change border color
                    $('#gaita_input1').css('border-color', 'red');
                    //stop function
                    return false;
                }


                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateAldigi_form11.php',
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
                        time_range: time_range,
                        iv_input1: iv_input1,
                        iv_input2: iv_input2,
                        iv_input3: iv_input3,
                        iv_input4: iv_input4,
                        oral1: oral1,
                        oral2: oral2,
                        oral3: oral3,
                        oral4: oral4,
                        blood_product1: blood_product1,
                        blood_product2: blood_product2,
                        blood_product3: blood_product3,
                        blood_product4: blood_product4,
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
                            patient_id + "&patient_name=" + encodeURIComponent(
                                patient_name);
                        $("#content").load(url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            
        })

    });
    </script>
    <script src=""></script>
</body>

</html>