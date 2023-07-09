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
require_once('../config-students.php');

$userid = $_SESSION['userlogin']['id'];
$sql = "SELECT * FROM bosaltimform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $bosaltimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($bosaltimform1)){
        $bosaltimform1 = $bosaltimform1[count($bosaltimform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM solunumgereksinimi_form1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $solunumgereksinimi_form1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($solunumgereksinimi_form1)){
        $solunumgereksinimi_form1 = $solunumgereksinimi_form1[count($solunumgereksinimi_form1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM calismaform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $calismaform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($calismaform1)){
        $calismaform1 = $calismaform1[count($calismaform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM egitimform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $egitimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($egitimform1)){
        $egitimform1 = $egitimform1[count($egitimform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form1_beslenme where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form1_beslenme = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form1_beslenme)){
        $form1_beslenme = $form1_beslenme[count($form1_beslenme) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form2 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form2)){
        $form2 = $form2[count($form2) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form3 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form3)){
        $form3 = $form3[count($form3) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form4 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form4)){
        $form4 = $form4[count($form4) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form5 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form5)){
        $form5 = $form5[count($form5) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form6 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form6)){
        $form6 = $form6[count($form6) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form7 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form7)){
        $form7 = $form7[count($form7) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form8 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form8)){
        $form8 = $form8[count($form8) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form9 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form9)){
        $form9 = $form9[count($form9) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form10 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form10)){
        $form10 = $form10[count($form10) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form11 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form11)){
        $form11 = $form11[count($form11) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form12 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form12)){
        $form12 = $form12[count($form12) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form13 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form13)){
        $form13 = $form13[count($form13) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form14 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form14)){
        $form14 = $form14[count($form14) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM form15 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($form15)){
        $form15 = $form15[count($form15) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM hareketform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $hareketform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($hareketform1)){
        $hareketform1 = $hareketform1[count($hareketform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM ilestimform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $ilestimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($ilestimform1)){
        $ilestimform1 = $ilestimform1[count($ilestimform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM katererform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $katererform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($katererform1)){
        $katererform1 = $katererform1[count($katererform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM ozgecmisform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $ozgecmisform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($ozgecmisform1)){
        $ozgecmisform1 = $ozgecmisform1[count($ozgecmisform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM uyukuform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $uyukuform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($uyukuform1)){
        $uyukuform1 = $uyukuform1[count($uyukuform1) - 1];
    }
} else {
    echo 'error';
}
$sql = "SELECT * FROM vucudutemizform1 where patient_id = " . $_GET['patient_id'] . "";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $vucudutemizform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($vucudutemizform1)){
        $vucudutemizform1 = $vucudutemizform1[count($vucudutemizform1) - 1];
    }
} else {
    echo 'error';
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





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
    <link href="style.css" rel="stylesheet">

    <!-- Template Stylesheet -->

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $_GET['patient_id'];
        $sql = "SELECT * FROM  patients  WHERE id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };

        ?>
        <div class="send-patient">
        <span class='close closeBtn' id='closeBtn1'>&times;</span>
        <div class='row'>
        <div class='col-lg-5' style="font-weight : bold; font-size: large;">
        Patient:<?php echo $_GET['patient_name'] ?>
            </div>
            
            <div class='col-lg-5' style="font-weight : bold; font-size: large;">
            ID:<?php echo $_GET['patient_id'] ?>
            </div>
</div>
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="pb-2">Sistem tarafından oluşturulan tanılama</p>

                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Tani Ad/numara göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
           var taniString = '';

                var patient_id = "<?php echo $_GET['patient_id']; ?>";
                 var patient_name = "<?php echo $_GET['patient_name']; ?>";
            
            $(function() {
                $("a.nav-items").on("click", function(e) {
                    e.preventDefault();
                    $("#content").load(this.href);
                });
            });
            $(function() {
                $("#closeBtn1").on("click", function(e) {
                    var url =
                        "<?php echo $base_url; ?>/updateForms/taniOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    e.preventDefault();
                    taniString ='';
                    $("#content").load(url);

                });
            });

            
        </script>
                    <script>
          var input = document.getElementById("searchInput");
var table = document.getElementById("dataTable");

input.addEventListener("input", function() {
  var filter = input.value.trim();

  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var name = row.cells[0].getElementsByTagName("a")[0].textContent

    if (name.includes(filter)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
});
            </script>



<script>
    
    var patient_id = "<?php echo $_GET['patient_id']; ?>";
    var patient_name = "<?php echo $_GET['patient_name']; ?>";
    var form2 = Object.keys(<?php echo json_encode($form2); ?>).length > 0 ? <?php echo json_encode($form2); ?> : undefined;
    var form3 = Object.keys(<?php echo json_encode($form3); ?>).length > 0 ? <?php echo json_encode($form3); ?> : undefined;
    var form4 = Object.keys(<?php echo json_encode($form4); ?>).length > 0 ? <?php echo json_encode($form4); ?> : undefined;
    var form5 = Object.keys(<?php echo json_encode($form5); ?>).length > 0 ? <?php echo json_encode($form5); ?> : undefined;
    var form6 = Object.keys(<?php echo json_encode($form6); ?>).length > 0 ? <?php echo json_encode($form6); ?> : undefined;
    var form7 = Object.keys(<?php echo json_encode($form7); ?>).length > 0 ? <?php echo json_encode($form7); ?> : undefined;
    var form8 = Object.keys(<?php echo json_encode($form8); ?>).length > 0 ? <?php echo json_encode($form8); ?> : undefined;
    var form9 = Object.keys(<?php echo json_encode($form9); ?>).length > 0 ? <?php echo json_encode($form9); ?> : undefined;
    var form10 = Object.keys(<?php echo json_encode($form10); ?>).length > 0 ? <?php echo json_encode($form10); ?> : undefined;
    var form11 = Object.keys(<?php echo json_encode($form11); ?>).length > 0 ? <?php echo json_encode($form11); ?> : undefined;
    var form12 = Object.keys(<?php echo json_encode($form12); ?>).length > 0 ? <?php echo json_encode($form12); ?> : undefined;
    var form13 = Object.keys(<?php echo json_encode($form13); ?>).length > 0 ? <?php echo json_encode($form13); ?> : undefined;
    var form14 = Object.keys(<?php echo json_encode($form14); ?>).length > 0 ? <?php echo json_encode($form14); ?> : undefined;
    var form15 = Object.keys(<?php echo json_encode($form15); ?>).length > 0 ? <?php echo json_encode($form15); ?> : undefined;
    var bosaltimform1 = Object.keys(<?php echo json_encode($bosaltimform1); ?>).length > 0 ? <?php echo json_encode($bosaltimform1); ?> : undefined;
    var solunumgereksinimi_form1 = Object.keys(<?php echo json_encode($solunumgereksinimi_form1); ?>).length > 0 ? <?php echo json_encode($solunumgereksinimi_form1); ?> : undefined;
    var calismaform1 = Object.keys(<?php echo json_encode($calismaform1); ?>).length > 0 ? <?php echo json_encode($calismaform1); ?> : undefined;
    var egitimform1 = Object.keys(<?php echo json_encode($egitimform1); ?>).length > 0 ? <?php echo json_encode($egitimform1); ?> : undefined;
    var form1_beslenme = Object.keys(<?php echo json_encode($form1_beslenme); ?>).length > 0 ? <?php echo json_encode($form1_beslenme); ?> : undefined;
    var hareketform1 = Object.keys(<?php echo json_encode($hareketform1); ?>).length > 0 ? <?php echo json_encode($hareketform1); ?> : undefined;
    var ilestimform1 = Object.keys(<?php echo json_encode($ilestimform1); ?>).length > 0 ? <?php echo json_encode($ilestimform1); ?> : undefined;
    var katererform1 = Object.keys(<?php echo json_encode($katererform1); ?>).length > 0 ? <?php echo json_encode($katererform1); ?> : undefined;
    var ozgecmisform1 = Object.keys(<?php echo json_encode($ozgecmisform1); ?>).length > 0 ? <?php echo json_encode($ozgecmisform1); ?> : undefined;
    var uyukuform1 = Object.keys(<?php echo json_encode($uyukuform1); ?>).length > 0 ? <?php echo json_encode($uyukuform1); ?> : undefined;
    var vucudutemizform1 = Object.keys(<?php echo json_encode($vucudutemizform1); ?>).length > 0 ? <?php echo json_encode($vucudutemizform1); ?> : undefined;


    if((form10 ? form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.heart_rate > 100 || form10.o2_status === 'Aliyor'  : false) || 
    ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) || ( solunumgereksinimi_form1 != undefined ?  solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon') : false)
    ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Bradipne') : false) ||(form10 ? form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel' : false) || (vucudutemizform1 ? vucudutemizform1.nailStructureProblem.split('/').includes('Çomaklaşma') : false)){
        taniString += 'tani1/';
    }
    if((form10 ? form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel' : false)
    ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) ||(solunumgereksinimi_form1  != undefined ?  solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon') : false) ||(solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon') : false)
    || (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.GogusHareketleri === 'Var' || solunumgereksinimi_form1.Krepitasyon_Alani.length > 0 || solunumgereksinimi_form1.Hassasiyet.length > 0 || solunumgereksinimi_form1.Kitle_Ozelligi.length > 0 : false )||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false)
    ){
        taniString += 'tani2/'
    }
    
    if((form10 ? form10.respiratory_rate < 16 || form10.respiratory_rate > 20 : false)
    || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Siyanoz') : false )
    || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon') : false) ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon') : false)
    ||(solunumgereksinimi_form1 != undefined ?  solunumgereksinimi_form1.airwayMethod === 'Trakeostomi'  || solunumgereksinimi_form1.airwayMethod === 'Endotrakeal tüp' || solunumgereksinimi_form1.BalgamType === 'Etkisiz balgam' || solunumgereksinimi_form1.Balgam === 'Var' || solunumgereksinimi_form1.coughOption === 'Etkisiz' : false)
    ){
        taniString += 'tani3/'
    }
    
    if((form10 ? form10.blood_pressure < 100 || form10.heart_rate > 100 || form10.heartrate_nature === 'Zayıf' : false) ||(vucudutemizform1 ? vucudutemizform1.skinAge === 'Zayıf' : false) ||(bosaltimform1 != undefined ?  bosaltimform1.IdrarRengi === 'Koyu sarı' : false) || (vucudutemizform1?  vucudutemizform1.skinMoisture === 'Kuru' : false) ||  (form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruma') : false) ||(form11 ? ((form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)-(form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)) > 0 : false)
    ||(form5 ? form5.total > 3 : false)){
        taniString += 'tani4/'
    }
    if((form10 ? form10.blood_pressure > 139 || form10.heartrate_nature === 'Dolgun' : false)
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false) || (form11 ? ((form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)- (form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)) > 0 : false)
    ||(form8 ? form8.edema_severity > 1 : false)){
        taniString += 'tani5/'
    }
    
    if((form10 ? form10.heartrate_location === 'Apikal' || form10.respiratory_nature === 'Zayıf' : false)
    || ( vucudutemizform1 ? vucudutemizform1.capillaryFillingProblem > 3 : false) || ( form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character === 'Yanıcı' : false)
    ||(vucudutemizform1 ?  vucudutemizform1.nailColorProblem.split('/').includes('Soluk beyaz') || vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik') || vucudutemizform1.nailColorProblem.split('/').includes('Sarı') : false)
    ){
        taniString += 'tani6/'
    }
   
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location.length > 1 || form2.pain_frequency.length > 1 || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character.length > 1 : false)
    || (form10 ? form10.heart_rate > 100 || form10.blood_pressure > 139 || form10.respiratory_rate > 20  : false)||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ){
        taniString += 'tani7/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location.length > 0 || form2.pain_frequency.length > 0 || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character.length > 0 || form2.pain_increase_factors.length > 1 || form2.pain_decrease_factors.length > 1 : false)
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ){
        taniString += 'tani8/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character.length > 0 : false)
    || (bosaltimform1 != undefined ? bosaltimform1.IdrarRengi === 'Açık kırmızı' || bosaltimform1.IdrarRengi === 'Koyu kırmızı' || bosaltimform1.IdrarBerrakligi === 'Bulanık': false) || 
    (bosaltimform1 != undefined ?  bosaltimform1.excretionIssues.split('/').includes('Üriner inkontinans') || bosaltimform1.excretionIssues.split('/').includes('Dizüri') : false) ||(bosaltimform1 != undefined ? bosaltimform1.protezlertable === 'Yarı Bağımlı' || bosaltimform1.protezlertable === 'Bağımlı'
    || bosaltimform1.Mesane_kateterizasyonu === 'Var' || bosaltimform1.ureterestomi === 'Var' || bosaltimform1.Sistostomi === 'Var' : false)
    ){
        taniString += 'tani9/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character.length > 0 : false)
    || (bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri >  10 || bosaltimform1.defekasyon_tekrari > 3 : false) ||(bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Diyare') : false)
    ){
        taniString += 'tani10/'
    }
    
    var hospitalStoolEmptyingDate = new Date(bosaltimform1 != undefined ? bosaltimform1.hospitalStoolEmptyingDate : '');
    var currentDate = new Date();
    var diffDays = Math.ceil(Math.abs(currentDate - hospitalStoolEmptyingDate) / (1000 * 3600 * 24));
    if((bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri <  6 || diffDays > 3 || bosaltimform1.defekasyon_tekrari > 3 : false) || (bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Konstipasyon') : false) || (bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Distansiyon') : false)||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') : false) || ( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ){
        taniString += 'tani11/'
    }
    
    if((bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri >  10 : false) ||(form1_beslenme ?  form1_beslenme.BKI <  18 || form1_beslenme.food_consumption_var === 'Daha az' : false) ||( form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') : false) ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false) ||( form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false)
    ||( form1_beslenme ? form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') : false) ||( form1_beslenme ? form1_beslenme.chewing_difficulty === 'Var' : false)
    ){
            taniString += 'tani12/'
        }
        

        if (
  (
    form1_beslenme &&
    (form1_beslenme.BKI > 25 || form1_beslenme.food_consumption_var === 'Daha fazla')
  ) ||
  (
    uyukuform1 &&
    uyukuform1.sleepProblem.split('/').includes('Uyuma Güçlüğü')
  ) ||
  (
    hareketform1 &&
    hareketform1.exercisingHabit.length === 0
  )
) {
  taniString += 'tani13/';
}


    if((form1_beslenme ? form1_beslenme.BKI >  30 || form1_beslenme.food_consumption_var === 'Daha fazla' : false)
    ){
        taniString += 'tani14/'
    }
    
    if(( form1_beslenme ? form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') : false) ||( form1_beslenme ? form1_beslenme.chewing_difficulty === 'Var' : false )||( form1_beslenme ? form1_beslenme.lip_color_issue_var.split(',').includes('Soluk') : false)
    ||( form1_beslenme ? form1_beslenme.lip_color_issue_var.split(',').includes('Kuru') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon') : false)
    ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kötü koku') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Nodül') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk') : false)
        ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti ödemi') : false) ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Apse') : false) ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti kanaması') : false) ||
        ( vucudutemizform1 ? vucudutemizform1.mouthCareFreq < 2 : false)
        ){
            taniString += 'tani15/'
        }
        
        
     if(( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Gündüz uykus') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uyuma güçlüğü') : false)
    ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykunun bölünmesi') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ||( uyukuform1 ?  uyukuform1.hospitalFactorsAffectingSleep.length > 0 : false)
     ){
        taniString += 'tani16/'
     }

     if(( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Gündüz uykus') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uyuma güçlüğü') : false)
    ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykunun bölünmesi') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Rahatsızlık') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Kaşıntı') : false)
    ||( form2 ?  form2.pain_duration === '6 Aydan Fazla' || form2.pain_duration !== '6 Aydan Fazla' : false)||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ){
        taniString += 'tani17/'
    }
    
    if(( hareketform1 ? hareketform1.changingPositionDependence === 'Yarı bağımlı' || hareketform1.changingPositionDependence === 'Bağımlı' ||
    hareketform1.walkingDependence === 'Yarı bağımlı' || hareketform1.walkingDependence === 'Bağımlı' ||  hareketform1.standingUpDependence === 'Yarı bağımlı' || hareketform1.standingUpDependence === 'Bağımlı' ||
    hareketform1.wearingClothesDependence === 'Yarı bağımlı' || hareketform1.wearingClothesDependence === 'Bağımlı' : false) ||( vucudutemizform1 ?  vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı' || vucudutemizform1.bodyCleansingDependence === 'Bağımlı' : false)
    || (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Baston') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Yürüteç') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi') : false)
    || (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false)
    ){
        taniString += 'tani18/'
    }
    
    if((solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne'): false) || ( form10 ? form10.blood_pressure > 139 || form10.heart_rate > 100 : false)||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ||( hareketform1 ? hareketform1.movementProblem.split('/').includes('Halsizlik') : false)
    ){
            taniString += 'tani19/'
        }
    
    if((uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false )
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false) || 
    (hareketform1 ? hareketform1.movementProblem.split('/').includes('Halsizlik') : false)
    ){
        taniString += 'tani20/'
    }
    if((form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false) ||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false)
     ){
        taniString += 'tani21/'
    }

     if((form10 ? form10.heart_rate > 100 || form10.respiratory_rate > 24 ||  form10.body_temperature > 38 : false)
     || (vucudutemizform1 ?  vucudutemizform1.skinTemperature === 'Artış' : false)
     ){
        taniString += 'tani22/'
     }
     if((form10 ? form10.heart_rate < 50 || form10.respiratory_nature === 'Yüzeyel' || form10.spo2_percentage < 95 || form10.body_temperature < 35 : false) ||(vucudutemizform1 ? vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik') : false)
     ||(form10 ? form10.blood_pressure > 139 : false)||( vucudutemizform1  ?  vucudutemizform1.capillaryFillingProblem > 3 : false)
     ){
         taniString += 'tani23/'
        }
     
        
        
        var bathDate = new Date(vucudutemizform1 ? vucudutemizform1.bathDate : '');
        var currentDate = new Date();
        var diffDays = Math.ceil(Math.abs(currentDate - bathDate) / (1000 * 3600 * 24));
        if(diffDays > 3 ||( vucudutemizform1 ? vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı'  || vucudutemizform1.bodyCleansingDependence === 'Bağımlı' : false) ||(vucudutemizform1 ? vucudutemizform1.bodyHairStructure.split('/').includes('Yağlı')  : false) 
        ||(vucudutemizform1 ?  vucudutemizform1.scalpHairProblem.split('/').includes('Yağlanma') : false) ||( vucudutemizform1 ? vucudutemizform1.bathingFrequency < 2 : false)
        ){
            taniString += 'tani24/'
        }
        
        if ((form1_beslenme ? form1_beslenme.cignemeRadio == "Var" || form1_beslenme.nutritional_needs == "Yarı Bağımlı" || form1_beslenme.nutritional_needs == "Bağımlı"
        || form1_beslenme.food_consumption_var == "Daha Az" || form1_beslenme.diet_eating_process == "Sonda ile" : false)) {
            taniString += 'tani25/'
        }
        
        if (( hareketform1 ? hareketform1.wearingClothesDependence == "Yarı Bağımlı" || hareketform1.wearingClothesDependence == "Bağımlı" : false)||( hareketform1 ? hareketform1.movementProblem.split('/').includes("Yorgunluk") : false)) {
            taniString += 'tani26/'
        }
        
        if ((bosaltimform1 != undefined ? bosaltimform1.stoolEmptyingHelp == "Yarı Bağımlı" || bosaltimform1.stoolEmptyingHelp == "Bağımlı" || bosaltimform1.protezlertable2 == "Yarı Bağımlı"
        || bosaltimform1.protezlertable2 == "Bağımlı" : false) ||(hareketform1 ?  hareketform1.standingUpDependence == "Bağımlı" || hareketform1.wearingClothesDependence == "Yarı Bağımlı" ||
        hareketform1.wearingClothesDependence == "Bağımlı" : false)||( vucudutemizform1 ?  vucudutemizform1.bodyCleansingDependence == "Yarı bağımlı" || vucudutemizform1.bodyCleansingDependence == "Bağımlı" : false)
        || (bosaltimform1 != undefined ? bosaltimform1.excretionProblems.split('/').includes("Fekal") : false) ||(bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes("Üriner inkontinans"): false)) {
            taniString += 'tani27/'  
        }
        
        if ((form7 ? form7.stage == "Evre I" || form7.stage == "Evre II" : false) ||( katererform1 ?  katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren" : false)
        ||( vucudutemizform1 ? vucudutemizform1.skinMoisture == "Var" :false)){
            taniString += 'tani28/'
        }
        
        if ((form7 ? form7.stage == "Evre III" || form7.stage == "Evre IV" || form7.stage == "Evrelendirilemeyen" || form7.stage == "Derin doku hasarı" : false)
        ||(form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') : false) ||(form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon'): false)){
            taniString += 'tani29/'    
        }
        console.log("i am here")
        
        if ((solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) || ( ilestimform1 ? ilestimform1.communicationProblem != "Yok"
        || ilestimform1.contactingStaffTrouble != "Yok" : false) ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.airwayMethod == "Trakeostomi" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp" : false)){
            taniString += 'tani30/'    
        }
        
        if ((form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false) ||(form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('İsteksiz'): false) 
        ||( ilestimform1 ?  ilestimform1.treatmentAcceptance == "Kabul etmiyor" : false) ||( uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false)
        ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü') : false)
        ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') : false) ||( ilestimform1 ? ilestimform1.reachTrouble != "Yok" || ilestimform1.companion == "Yok" : false)
            ||( calismaform1 ? calismaform1.workStatus == "Çalışmıyor" : false)){
                taniString += 'tani31/'
            }
            
            
            if ((uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false) ||( calismaform1  ? calismaform1.hobbies == "Yok" : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false)){
                taniString += 'tani32/'    
            }            
            if (( ilestimform1 ? ilestimform1.treatmentAcceptance !== "" : false)) {
                taniString += 'tani33/'
            }
            
            
            if ((hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
            ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false) ||( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||( uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false)
            ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü') : false)
            ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') : false)) {
                taniString += 'tani34/'
            }
            
            
            if ((form3 ? form3.total >= 5 : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Baston') : false)
            ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Yurutec') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi') : false)){
                taniString += 'tani36/'
            }
            
            if ((katererform1 ? katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren"
            || katererform1.katererType == "Diğer" : false) ||( bosaltimform1 != undefined ? bosaltimform1.Mesane_kateterizasyonu == "Var" : false) ||( ozgecmisform1 ? ozgecmisform1.smoking != "Yok" || ozgecmisform1.arrivalFromInput == "DM" : false)
            ||(form1_beslenme ?  form1_beslenme.BKI > 30 : false)){
                taniString += 'tani37/'
            }

            if (
                (bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri < 6 : false) ||
                (form1_beslenme ? form1_beslenme.chewing_difficulty == "Var" || form1_beslenme.gastric_residue == "Var" : false) ||
                (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.CoughOption == "Ektisiz" : false) ||
                (form1_beslenme ? form1_beslenme.diet_eating_process == "Sonda ile" : false) ||
                (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.airwayMethod == "Trakeostomi" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp" : false) ||
                (form1_beslenme ? form1_beslenme.nazogastrik_decompression_radio == "Var" : false) ||
                (bosaltimform1 != undefined ? bosaltimform1.excretionProblems.split('/').includes('Distansyon') : false) ||
                (bosaltimform1 != undefined ? bosaltimform1.excretionProblems.split('/').includes('Dışkı') : false)
                ) {
                taniString += 'tani38/';
                }

                if (
  (form1_beslenme ? form1_beslenme.BKI < 18 : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Gozluk') : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  (form5 ? (form5.total >= 3 ? form5.total <= 13 : false) : false)
) {
  taniString += 'tani39/';
}

if (
  (vucudutemizform1 ? vucudutemizform1.mouthCareFreq < 2 : false) ||
  (ozgecmisform1 ? ozgecmisform1.smoking !== "Yok" : false) ||
  (ozgecmisform1 ? ozgecmisform1.alcoholUsage === "Alkol" : false) ||
  (form1_beslenme ? form1_beslenme.lip_color_issue_var.split(',').includes('Kuru') : false) ||
  (form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk') : false) ||
  (form1_beslenme ? form1_beslenme.food_consumption_var === "Daha Az" : false) ||
  (form1_beslenme ? form1_beslenme.diet_eating_process === "Parenteral" : false) ||
  (form1_beslenme ? form1_beslenme.diet_eating_process === "Sonda ile" : false) ||
  (solunumgereksinimi_form1.aspirationNeeds != undefined ? solunumgereksinimi_form1.aspirationNeeds.split('/').includes('Oro_Nazofarengeal') : false)
) {
  taniString += 'tani40/';
}
if (
  (bosaltimform1 != undefined ? bosaltimform1.excretionProblems.split('/').includes('Diare') : false) ||
  (bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri > 10 : false) ||
  (bosaltimform1 != undefined ? bosaltimform1.hospitalStoolEmptyingFrequency > 3 : false) ||
  (form1_beslenme ? form1_beslenme.nutrition_issue_var.split('/').includes('Kusma') : false) ||
  (form8 ? form8.edema_severity === "1" : false) ||
  (form8 ? form8.edema_severity === "2" : false) ||
  (form8 ? form8.edema_severity === "3" : false) ||
  (form8 ? form8.edema_severity === "4" : false)
) {
  taniString += 'tani41/';
}
if (
  (bosaltimform1 ? bosaltimform1.excretionProblems.split('/').includes('Diare') : false) ||
  (form1_beslenme ? form1_beslenme.nutrition_issue_var.split('/').includes('Kusma') : false) ||
  (form1_beslenme ? form1_beslenme.liquid_consumption < 1000 : false) ||
  (katererform1 ? katererform1.katererType === "Dren" : false) ||
  (form1_beslenme ? form1_beslenme.BKI > 30 : false)
) {
  taniString += 'tani42/';
}

if (
  (ozgecmisform1 ? ozgecmisform1.allergies === "Var" : false) ||
  (ozgecmisform1 ? ozgecmisform1.transfusionReaction !== "Yok" : false) ||
  (ozgecmisform1 ? ozgecmisform1.kolbandi === "Kırmızı" : false) ||
  (ozgecmisform1 ? ozgecmisform1.arrivalFromInput === "Astım" : false)
) {
  taniString += 'tani43/';
}
if (
  (form1_beslenme ? form1_beslenme.BKI > 30 : false) ||
  (form10 ? form10.spo2_percentage < 95 : false) ||
  (form1_beslenme ? form1_beslenme.liquid_consumption < 1000 : false) ||
  (bosaltimform1 != undefined ? bosaltimform1.IdrarRengi === "Koyu sarı" : false) ||
  (form10 ? form10.blood_pressure < 100 : false) ||
  (form10 ? form10.heart_rate > 100 : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinAge === "Zayıf" : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  ((form5 ? form5.total >= 3 || form5.total <= 13 : false))
) {
  taniString += 'tani44/';
}
if (
  (ilestimform1 ? ilestimform1.treatmentAcceptance === "Kabul etmiyor" : false) ||
  (hareketform1 ? hareketform1.exercisingHabitInput === "Yok" : false) ||
  (ozgecmisform1 ? ozgecmisform1.arrivalFromInput === "DM" : false) ||
  (form1_beslenme ? form1_beslenme.food_consumption_var === "Daha Az" : false)
) {
  taniString += 'tani45/';
}
            var defekasyonZamani =bosaltimform1 != undefined ?  bosaltimform1.defekasyon_zamani : 0;

            var diffTime =defekasyonZamani !== 0 ? currentDate.getTime() - (defekasyonZamani * 24 * 60 * 60 * 1000) : 0; 
            var dayDiff = Math.floor(diffTime / (24 * 60 * 60 * 1000)); 

            if (
                dayDiff > 2 ||
  (form1_beslenme ? form1_beslenme.nutrition_issue_var === "Hazımsızlık" : false) ||
  (form1_beslenme ? form1_beslenme.food_consumption_var === "Daha Az" : false) ||
  (form1_beslenme ? form1_beslenme.diet_eating_process === "Parenteral" : false) ||
  (form1_beslenme ? form1_beslenme.diet_eating_process === "Sonda ile" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Yarı Bağımlı" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Bağımlı" : false) ||
  (hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false) ||
  (hareketform1 ? hareketform1.exercisingHabit === "Hayir" : false)
) {
  taniString += 'tani46/';
}

if (
  (form6 ? form6.total <= 14 : false) ||
  (form1_beslenme ? form1_beslenme.BKI < 18 : false) ||
  (form1_beslenme ? form1_beslenme.BKI > 35 : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinColorProblem === "Soluk" : false) ||
  (vucudutemizform1 ? vucudutemizform1.split('/').includes("Kızarıklık") : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinColorProblem === "Pigmentasyon artışı" : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinAge === "Zayıf" : false) ||
  (form10 ? form10.body_temperature > 38 : false) ||
  (form10 ? form10.body_temperature < 35 : false) ||
  (form1_beslenme ? form1_beslenme.nutritional_needs === "Yarı Bağımlı" : false) ||
  (form1_beslenme ? form1_beslenme.nutritional_needs === "Bağımlı" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Yarı Bağımlı" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Bağımlı" : false)
) {
  taniString += 'tani47/';
}

if (
  (form6 ? form6.total <= 14 : false) ||
  (form1_beslenme ? form1_beslenme.BKI < 18 : false) ||
  (form1_beslenme ? form1_beslenme.BKI > 35 : false) ||
  (form10 ? form10.heartrate_nature === "Zayıf" : false) ||
  (vucudutemizform1 ? (vucudutemizform1.capillaryFillingProblem !== "Yok" ? vucudutemizform1.capillaryFillingProblem > 3 : false) : false) ||
  (form8 ? (form8.edema_severity === "1" || form8.edema_severity === "2" || form8.edema_severity === "3" || form8.edema_severity === "4") : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinMoisture === "Kuru" : false) ||
  (form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk') : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Baston') : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Yurutec') : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi') : false)
) {
  taniString += 'tani48/';
}

if (
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  (ozgecmisform1 ? ozgecmisform1.allergies === "Var" : false) ||
  (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.airwayMethod === "Endotrakeal Tüp" : false)
) {
  taniString += 'tani49/';
}



console.log(taniString)



taniString.split('/').forEach(function(item) {
  if (item.trim() !== '') { // Check if item is not empty
    var row = $('<tr></tr>');
    var cell = $('<td colspan=2></td>').append(
      $('<div></div>').addClass('mt-3 entered-forms align-items-center').append(
        $('<a></a>').addClass('nav-items review btn btn-success w-50 p-3').attr({
          style: 'color: white;',
          href: "<?php echo $base_url; ?>/tanılar/" + item + ".php?patient_id=" + patient_id + "&patient_name=" + patient_name + "&root_id=0&parent_id=0",
        }).text(item)
      )
    );
    row.append(cell);
    $('#dataTable tbody').append(row);
  }
});
</script>
</body>

</html>