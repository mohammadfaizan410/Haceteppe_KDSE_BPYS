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
    var_dump("there should be patientID below");
    var_dump($_GET['patient_id']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    <!-- Template Stylesheet -->
    
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
</head>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">TETKİK SONUÇLARI GİRİŞİ</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Date:</p>
                            <input type="date" class="form-control" required name="date" id="date" placeholder="Tarih">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Tetkik adı </p>
                            <p id="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Tıbbi Biyokimya*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tıbbi Biyokimya*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Mikrobiyoloji*">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Mikrobiyoloji*</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Radyoloji Bulguları">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Radyoloji Bulguları</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Tomografi-Mr">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Tomografi-Mr</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Ultrason-Doppler">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ultrason-Doppler</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Girişimsel Radyoloji">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Girişimsel Radyoloji</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tektikOption" id="tektikOption" value="Kan Merkezi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Kan Merkezi</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Tetkik Sonucu :</p>
                            <input type="text" class="form-control" required name="examination_result" id="examination_result" placeholder="Tetkik Sonucu" maxlength="2000">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Referans Değeri :</p>
                            <input type="text" class="form-control" required name="referance_value" id="referance_value" placeholder="Referans Değeri" maxlength="200">
                        </div>
                    </div>
                </div>
                <div class='d-flex'>    
    <input class="submit m-auto " type='submit' name="submit" id="submit" value="Kayıt">
</div>

            </form>
        </div>


    </div>
</body>

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
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });

 
</script>
<script>
    $(function() {
        $('#submit').click(function(e) {
            console.log("clicked")
            e.preventDefault()
            let patient_name = "<?php
                                echo urldecode($_GET['patient_name']);
                                ?>";
            var patient_id = "<?php
                                $userid = $_GET['patient_id'];
                                echo $userid
                                ?>";
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_num = 9;
            let yourDate = new Date()
            let creationDate = yourDate.toISOString().split('T')[0];
            let updateDate = yourDate.toISOString().split('T')[0];
            let date = $("input[name='date']").val();
            let examination_type = $("input[type='radio'][name='tektikOption']:checked").val()
            let examination_result = $("input[name='examination_result']").val();
            let referance_value = $("input[name='referance_value']").val();
            console.log("values initiated")

            if($('#date').val() === ""){
                //scroll to date
                $('html, body').animate({
                    scrollTop: $("#date").offset().top
                }, 200);
                //change border color
                $('#date').css('border-color', 'red');
                //stop function
                return false;
            }

            else if($("input[type='radio'][name='tektikOption']:checked").length === 0){
                    //scroll to tektikOption
                    $('html, body').animate({
                        scrollTop: $("#option-error").offset().top
                    }, 200);
                    //change border color
                    $('#option-error').css('display', 'block');
                    //stop function
                    return false;
            }

            else if($('[name="examination_result"]').val() === ""){
                    //scroll to examination_result
                    $('html, body').animate({
                        scrollTop: $("#examination_result").offset().top
                    }, 200);
                    //change border color
                    $('#examination_result').css('border-color', 'red');
                    //stop function
                    return false;
            }

            else if($('#referance_value').val() === ""){
                    //scroll to referance_value
                    $('html, body').animate({
                        scrollTop: $("#referance_value").offset().top
                    }, 200);
                    //change border color
                    $('#referance_value').css('border-color', 'red');
                    //stop function
                    return false;
            }

            else {

            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateTektik_form9.php',
                data: {
                    name: name,
                    surname: surname,
                    age: age,
                    not: not,
                    form_num: form_num,
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
                    date: date,
                    examination_type: examination_type,
                    examination_result: examination_result,
                    referance_value: referance_value
                },
                success: function(data) {
                    alert(data);
                    let url =
                        "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                    $("#content").load(url);
                },
                error: function(data) {
                    console.log(data)
                }
            })
            }
            
        })

    });
</script>

</html>