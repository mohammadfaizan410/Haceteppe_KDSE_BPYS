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
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">KATETER / DREN</h1>


            <div>

                <div class="d-flex justify-content-around p-4">
                    <p class="usernamelabel">Kateter / Dren</p>
                    <p class="usernamelabel">Yeri</p>
                    <p class="usernamelabel">Sayısı</p>
                    <p class="usernamelabel">Takılma Tarihi</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">
                    <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Periferik venöz kateter">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Periferik venöz kateter</span>
                                </label>
                            </div>
                        </div>
                        <input type="number" class="form-control w-25" disabled name="peripheralKaterarAmount" id="peripheralKaterarAmount">
                        <input type="text" class="form-control w-25" disabled name="peripheralKaterarLocation" id="peripheralKaterarLocation">
                        <input type="date" class="form-control w-25" disabled name="peripheralKaterarDate" id="peripheralKaterarDate">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">
                    <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Santral venöz kateter">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Santral venöz kateter </span>
                                </label>
                            </div>
                        </div>
                        <input type="number" class="form-control w-25" disabled name="centralKaterarNumber" id="centralKaterarNumber">
                        <input type="text" class="form-control w-25" disabled name="centralKaterarLocation" id="centralKaterarLocation">
                        <input type="date" class="form-control w-25" disabled name="centralKaterarDate" id="centralKaterarDate">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">
                    <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkboxes w-25">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="option1">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Dren </span>
                                </label>
                            </div>
                        </div>
                        <input type="number" class="form-control w-25" disabled name="drainKatererAmount" id="drainKatererAmount">
                        <input type="text" class="form-control w-25" disabled name="drainKatererLocation" id="drainKatererLocation">
                        <input type="date" class="form-control w-25" disabled name="drainKatererDate" id="drainKatererDate">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-section d-flex">
                    <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkboxes w-25">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="katererType" id="venöz_kateter"
                                    value="Diğer">
                                <label class="form-check-label" for="venöz_kateter">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                            </div>
                        </div>
                        <input type="number" class="form-control w-25" disabled name="otherKatereAmount" id="otherKatereAmount">
                        <input type="text" class="form-control w-25" disabled name="otherKatereLocation" id="otherKatereLocation">
                        <input type="date" class="form-control w-25" disabled name="otherKatereDate" id="otherKatereDate">
                    </div>
                </div>
            </div>
            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">


            <script>
            $(function() {
                $('#closeBtn').click(function(e) {
                    $("#content").load("formlar-student.php");

                })
            });
     
            $('.form-check-input[name="katererType"]').change(function(){
                if($(this).val() === 'Periferik venöz kateter'){
                    $('#peripheralKaterarAmount').prop('disabled', false);
                    $('#peripheralKaterarLocation').prop('disabled', false);
                    $('#peripheralKaterarDate').prop('disabled', false);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Santral venöz kateter'){
                    $('#centralKaterarNumber').prop('disabled', false);
                    $('#centralKaterarLocation').prop('disabled', false);
                    $('#centralKaterarDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Dren'){
                    $('#drainKatererAmount').prop('disabled', false);
                    $('#drainKatererLocation').prop('disabled', false);
                    $('#drainKatererDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#otherKatereAmount').prop('disabled', true);
                    $('#otherKatereLocation').prop('disabled', true);
                    $('#otherKatereDate').prop('disabled', true);
                }
                if($(this).val() === 'Diğer'){
                    $('#otherKatereAmount').prop('disabled', false);
                    $('#otherKatereLocation').prop('disabled', false);
                    $('#otherKatereDate').prop('disabled', false);
                    $('#peripheralKaterarAmount').prop('disabled', true);
                    $('#peripheralKaterarLocation').prop('disabled', true);
                    $('#peripheralKaterarDate').prop('disabled', true);
                    $('#centralKaterarNumber').prop('disabled', true);
                    $('#centralKaterarLocation').prop('disabled', true);
                    $('#centralKaterarDate').prop('disabled', true);
                    $('#drainKatererAmount').prop('disabled', true);
                    $('#drainKatererLocation').prop('disabled', true);
                    $('#drainKatererDate').prop('disabled', true);
                }
            })
            </script>

            <script>
            $(function() {
                $('#submit').click(function(e) {



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
                            let katererType = $(".form-check-input[name='katererType']:checked").val();
                            let peripheralKaterarAmount = $('#peripheralKaterarAmount').val();
                            let peripheralKaterarLocation = $('#peripheralKaterarLocation').val();
                            let peripheralKaterarDate = $('#peripheralKaterarDate').val();
                            let centralKaterarNumber = $('#centralKaterarNumber').val();
                            let centralKaterarLocation = $('#centralKaterarLocation').val();
                            let centralKaterarDate = $('#centralKaterarDate').val();
                            let drainKatererAmount = $('#drainKatererAmount').val();
                            let drainKatererLocation = $('#drainKatererLocation').val();
                            let drainKatererDate = $('#drainKatererDate').val();
                            let otherKatereAmount = $('#otherKatereAmount').val();
                            let otherKatereLocation = $('#otherKatereLocation').val();
                            let otherKatereDate = $('#otherKatereDate').val();


                            //custom validation

                        e.preventDefault()

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Kateter.php',
                            data: {
                               
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                katererType: katererType,
                                peripheralKaterarAmount: peripheralKaterarAmount,
                                peripheralKaterarLocation: peripheralKaterarLocation,
                                peripheralKaterarDate: peripheralKaterarDate,
                                centralKaterarNumber: centralKaterarNumber,
                                centralKaterarLocation: centralKaterarLocation,
                                centralKaterarDate: centralKaterarDate,
                                drainKatererAmount: drainKatererAmount,
                                drainKatererLocation: drainKatererLocation,
                                drainKatererDate: drainKatererDate,
                                otherKatereAmount: otherKatereAmount,
                                otherKatereLocation: otherKatereLocation,
                                otherKatereDate: otherKatereDate,
                                form_name: 'kateterForm1',

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>