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
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body style="background-color:white">
    
<div class="container-fluid pt-4 px-4">
    <div class="send-patient" style="aspect-ratio: 4/1;">
        <span class='close closeBtn' id='closeBtn1'>&times;</span>

        <div class="patients-table text-center rounded p-4" id="patients-table">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <p style="color : #333333; font-size: 20px" class="pb-2"></p>

            </div>
            <h2 class="pb-5">Hasta Formlar</h2>
            <div class="table-responsive mt-5" style="overflow-x: hidden;">
                  
                    <div class="row" style="border-bottom: 1px solid grey; padding-bottom: 10px;">
                        <div class="col-sm-6 col-lg-3">
                            <h4 style="text-align: left;"> ID</h4>
                            <h4 style="text-align: left;"><?php echo $_GET['patient_id'] ?></h4>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <h4 style="text-align: left;">Hasta Adı:</h4>
                            <h4 style="text-align: left; color: #333333;"><?php echo $_GET['patient_name'] ?></h4>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <h4 style="text-align: left;">Tüm Formlar</h4>
                            <h4 style="text-align: left;"><div class=' btn btn-success' id='showAllForms'>
                                    Tüm Formlar
                                </div></h4></div>
                        <div class="col-sm-6 col-lg-3">
                            <h4 style="text-align: left;">Gönderilen Formlar</h4>
                            <h4 style="text-align: left;"><div class=' btn btn-success' id='showSubmittedForms'>
                                    Gönderilen Formlar
                                </div></h4>
                        </div>
                    </div>

                      
                  
            </div>
        </div>
    </div>
</div>
        <script>      
            var patient_id = "<?php echo $_GET['patient_id']; ?>";
            var patient_name = "<?php echo $_GET['patient_name']; ?>";
            $('#showAllForms').click(function() {
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name); 
                $("#content").load(url);
            });
            $('#showSubmittedForms').click(function() {
                var url = "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name); 
                $("#content").load(url);
            });
            $(function() {
                
                $("#closeBtn1").on("click", function(e) {
                    e.preventDefault();
                    var url =
                        "<?php echo $base_url; ?>/updateForms/allOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                });
            });   
        </script>
</body>

</html>