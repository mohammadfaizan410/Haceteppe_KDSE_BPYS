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
<div class="table-responsive">
    <div class="container-fluid pt-4 px-4">
        <div class="patients-table text-center rounded p-5" id="patients-table">
            <span class="close closeBtn" id="closeBtn1">&times;</span>
            <div class="patient-details">
                <h2 class="pb-5">Patient Details</h2>
                <div class="row pt-5 pb-3 border-bottom">
                    <div class="col-lg-3 col-sm-6">
                        <h4 style="text-align: left;">Patient ID:</h4>
                        <h4 style="text-align: left;"><?php echo $_GET['patient_id'] ?></h4>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 style="text-align: left;">Patient Name:</h4>
                        <h4 style="text-align: left;"><?php echo $_GET['patient_name'] ?></h4>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 style="text-align: left;">Patient Forms:</h4>
                        <h4 style="text-align: left;"><a class="btn btn-success" id="formOptions">Show Forms</a></h4>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 style="text-align: left;">Patient Diagnosis:</h4>
                        <h4 style="text-align: left;"><a class="btn btn-success" id="taniOptions">Show tanis</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
      
            var patient_id = "<?php echo $_GET['patient_id']; ?>";
            var patient_name = "<?php echo $_GET['patient_name']; ?>";
            

            $('#formOptions').click(function() {
                var url = "<?php echo $base_url; ?>/updateForms/formOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name); 
                $("#content").load(url);
            });
            $('#taniOptions').click(function() {
                var url = "<?php echo $base_url; ?>/updateForms/taniOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name); 
                $("#content").load(url);
            });
            $(function() {
                
                $("#closeBtn1").on("click", function(e) {
                    e.preventDefault();
                    var url =
                        "<?php echo $base_url; ?>/updateForms/showAllPatients.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                });
            });   

            
        </script>
</body>

</html>