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
    <div class="patients-table text-center rounded p-5" id="patients-table">
        <div class='row d-flex justify-content-around mt-5'>
            <div class='col-md-3 option_selector' id='showAllForms'>
                Submit a form
            </div> 
            <div class='col-md-3 option_selector' id='showSubmittedForms'>
                View submitted forms
            </div> 
        </div>
        <div class='row d-flex justify-content-around mt-5'>
            <div class='col-md-3 option_selector' id='showAllTanis'>
                Submit a tani
            </div> 
            <div class='col-md-3 option_selector' id='showSubmittedTani'>
                View submitted tanis
            </div> 
        </div>
        <div class='row d-flex justify-content-around mt-5 mb-5'>
            <div class='col-md-3  option_selector' id='showMatchingTanis' >
                View submitted tanis
            </div> 
            <div class='col-md-3 option_selector' id='showSubMatchingTanis'>
                view submitted matching tanis
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
            $('#showAllTanis').click(function() {
                var url = "<?php echo $base_url; ?>/updateForms/showAllTanis.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name); 
                
                $("#content").load(url);
            });

            
        </script>
</body>

</html>