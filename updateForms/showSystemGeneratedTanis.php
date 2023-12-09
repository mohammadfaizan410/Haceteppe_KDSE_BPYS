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
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="form-header">Sistem tarafından oluşturulan tanılama</p>

                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Tani Ad/numara göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <tbody>
                        <tr class="darkcyan table-head">
                                <th scope="col" style="font-weight : bold; font-size: large;">Hasta:<?php echo $_GET['patient_name'] ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
           var taniString = '';
           var taniValidInputs = {
            tani1Inputs : '',
            tani2Inputs : '',
            tani3Inputs : '',
            tani4Inputs : '',
            tani5Inputs : '',
            tani6Inputs : '',
            tani7Inputs : '',
            tani8Inputs : '',
            tani9Inputs : '',
            tani10Inputs : '',
            tani11Inputs : '',
            tani12Inputs : '',
            tani13Inputs : '',
            tani14Inputs : '',
            tani15Inputs : '',
            tani16Inputs : '',
            tani17Inputs : '',
            tani18Inputs : '',
            tani19Inputs : '',
            tani20Inputs : '',
            tani21Inputs : '',
            tani22Inputs : '',
            tani23Inputs : '',
            tani24Inputs : '',
            tani25Inputs : '',
            tani26Inputs : '',
            tani27Inputs : '',
            tani28Inputs : '',
            tani29Inputs : '',
            tani30Inputs : '',
            tani31Inputs : '',
            tani32Inputs : '',
            tani33Inputs : '',
            tani34Inputs : '',
            tani35Inputs : '',
            tani36Inputs : '',
            tani37Inputs : '',
            tani38Inputs : '',
            tani39Inputs : '',
            tani40Inputs : '',
            tani41Inputs : '',
            tani42Inputs : '',
            tani43Inputs : '',
            tani44Inputs : '',
            tani45Inputs : '',
            tani46Inputs : '',
            tani47Inputs : '',
            tani48Inputs : '',
            tani49Inputs : '',
           };

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
  var filter = input.value.trim().toLowerCase();

  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var name = row.cells[0].getElementsByTagName("a")[0].textContent.toLowerCase();

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
        if(form10){
            if(form10.respiratory_rate < 16){
                taniValidInputs.tani1Inputs += 'Solunum sayısı < 16 ';
            }
            if(form10.respiratory_rate > 20){
                taniValidInputs.tani1Inputs += '/Solunum sayısı > 20 ';
            }
            if(form10.heart_rate > 100){
                taniValidInputs.tani1Inputs += '/Nabız Hızı  > 100 ';
            }
            if(form10.o2_status === 'Aliyor'){
                taniValidInputs.tani1Inputs += '/O2 alıyor ';
            }
            if(form10.respiratory_nature === 'Derin'){
                taniValidInputs.tani1Inputs += '/Solunum Doğası : Derin ';
            }
            if(form10.respiratory_nature === 'Yüzeyel'){
                taniValidInputs.tani1Inputs += '/Solunum Doğası : Yüzeyel ';
            }
        }
        if(solunumgereksinimi_form1 != undefined){
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne')){
                taniValidInputs.tani1Inputs += '/Nefes sorunlari : Dispne ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon')){
                taniValidInputs.tani1Inputs += '/Nefes sorunlari : Hipoventilasyon ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Bradipne')){
                taniValidInputs.tani1Inputs += '/Nefes sorunlari : Bradipne ';
            }
        }
        if(vucudutemizform1){
            if(vucudutemizform1.nailStructureProblem.split('/').includes('Çomaklaşma')){
                taniValidInputs.tani1Inputs += '/Tırnak Yapısı Problemi : Çomaklaşma ';
            }
        }
        taniString += 'tani1/';
    }
    if((form10 ? form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel' : false)
    ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) ||(solunumgereksinimi_form1  != undefined ?  solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon') : false) ||(solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon') : false)
    || (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.GogusHareketleri === 'Var' || solunumgereksinimi_form1.Krepitasyon_Alani.length > 0 || solunumgereksinimi_form1.Hassasiyet.length > 0 || solunumgereksinimi_form1.Kitle_Ozelligi.length > 0 : false )||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false)
    ){
        if(form10){
            if(form10.respiratory_rate < 16){
                taniValidInputs.tani2Inputs += 'Solunum sayısı < 16 ';
            }
            if(form10.respiratory_rate > 20){
                taniValidInputs.tani2Inputs += '/Solunum sayısı > 20 ';
            }
            if(form10.respiratory_nature === 'Derin'){
                taniValidInputs.tani2Inputs += '/Solunum Doğası : Derin ';
            }
            
            if(form10.respiratory_nature === 'Yüzeyel'){
                taniValidInputs.tani2Inputs += '/Solunum Doğası : Yüzeyel ';
            }

        }
        if(solunumgereksinimi_form1 != undefined){
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne')){
                taniValidInputs.tani2Inputs += '/Nefes sorunlari : Dispne ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon')){
                taniValidInputs.tani2Inputs += '/Nefes sorunlari : Hipoventilasyon ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon')){
                taniValidInputs.tani2Inputs += '/Nefes sorunlari : Hiperventilasyon ';
            }
        }
        if(solunumgereksinimi_form1 != undefined){
            if(solunumgereksinimi_form1.GogusHareketleri === 'Var'){
                taniValidInputs.tani2Inputs += '/Göğüs Hareketleri : Var ';
            }
            if(solunumgereksinimi_form1.Krepitasyon_Alani.length > 0){
                taniValidInputs.tani2Inputs += '/Krepitasyon Alanı :   Var';
            }
            if(solunumgereksinimi_form1.Hassasiyet.length > 0){
                taniValidInputs.tani2Inputs += '/Hassasiyet : var';
            }
            if(solunumgereksinimi_form1.Kitle_Ozelligi.length > 0){
                taniValidInputs.tani2Inputs += '/Kitle Özelliği : var';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Anksiyete')){
                taniValidInputs.tani2Inputs += '/Hareket Sorunlari : Anksiyete ';
            }
        }
        taniString += 'tani2/'
    }
    
    if((form10 ? form10.respiratory_rate < 16 || form10.respiratory_rate > 20 : false)
    || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Siyanoz') : false )
    || ( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon') : false) ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon') : false)
    ||(solunumgereksinimi_form1 != undefined ?  solunumgereksinimi_form1.airwayMethod === 'Trakeostomi'  || solunumgereksinimi_form1.airwayMethod === 'Endotrakeal tüp' || solunumgereksinimi_form1.BalgamType === 'Etkisiz balgam' || solunumgereksinimi_form1.Balgam === 'Var' || solunumgereksinimi_form1.coughOption === 'Etkisiz' : false)
    ){
        if(form10){
            if(form10.respiratory_rate < 16){
                taniValidInputs.tani3Inputs += 'Solunum sayısı < 16 ';
            }
            if(form10.respiratory_rate > 20){
                taniValidInputs.tani3Inputs += '/Solunum sayısı > 20 ';
            }
        }

        if(solunumgereksinimi_form1 != undefined){
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne')){
                taniValidInputs.tani3Inputs += '/Nefes sorunlari : Dispne ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Siyanoz')){
                taniValidInputs.tani3Inputs += '/Nefes sorunlari : Siyanoz ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Hipoventilasyon')){
                taniValidInputs.tani3Inputs += '/Nefes sorunlari : Hipoventilasyon ';
            }
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Hiperventilasyon')){
                taniValidInputs.tani3Inputs += '/Nefes sorunlari : Hiperventilasyon ';
            }
            if(solunumgereksinimi_form1.airwayMethod === 'Trakeostomi'){
                taniValidInputs.tani3Inputs += '/Hava Yolu Yöntemi : Trakeostomi ';
            }
            if(solunumgereksinimi_form1.airwayMethod === 'Endotrakeal tüp'){
                taniValidInputs.tani3Inputs += '/Hava Yolu Yöntemi : Endotrakeal tüp ';
            }
            if(solunumgereksinimi_form1.BalgamType === 'Etkisiz balgam'){
                taniValidInputs.tani3Inputs += '/Balgam Tipi : Etkisiz balgam ';
            }
            if(solunumgereksinimi_form1.Balgam === 'Var'){
                taniValidInputs.tani3Inputs += '/Balgam : Var ';
            }
        }

        taniString += 'tani3/'
    }
    
    if((form10 ? form10.blood_pressure.split('/')[0] < 100 || form10.heart_rate > 100 || form10.heartrate_nature === 'Zayıf' : false) ||(vucudutemizform1 ? vucudutemizform1.skinAge === 'Zayıf' : false) ||(bosaltimform1 != undefined ?  bosaltimform1.IdrarRengi === 'Koyu sarı' : false) || (vucudutemizform1?  vucudutemizform1.skinMoisture === 'Kuru' : false) ||  (form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruma') : false) ||(form11 ? ((form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)-(form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)) > 0 : false)
    ||(form5 ? form5.total > 3 : false)){
        if(form10){
            if(form10.blood_pressure.split('/')[0] < 100){
                taniValidInputs.tani4Inputs += 'Kan Basıncı < 100 ';
            }
            if(form10.heart_rate > 100){
                taniValidInputs.tani4Inputs += '/Nabız Hızı  > 100 ';
            }
            if(form10.heartrate_nature === 'Zayıf'){
                taniValidInputs.tani4Inputs += '/Nabız Doğası : Zayıf ';
            }
        }
        if(vucudutemizform1){
            if(vucudutemizform1.skinAge === 'Zayıf'){
                taniValidInputs.tani4Inputs += '/Cilt Yaşı : Zayıf ';
            }
            if(vucudutemizform1.skinMoisture === 'Kuru'){
                taniValidInputs.tani4Inputs += '/Cilt Nemi : Kuru ';
            }
        }
        if(bosaltimform1 != undefined){
            if(bosaltimform1.IdrarRengi === 'Koyu sarı'){
                taniValidInputs.tani4Inputs += '/İdrar Rengi : Koyu sarı ';
            }
        }
        if(form1_beslenme){
            if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruma')){
                taniValidInputs.tani4Inputs += '/Ağız Mukozası Sorunları : Kuruma ';
            }
        }
        if(form11){
            if(((form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)-(form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)) > 0){
                taniValidInputs.tani4Inputs += '/Sıvı Denge Problemi : Var ';
            }
        }
        if(form5){
            if(form5.total > 3){
                taniValidInputs.tani4Inputs += '/Ateş : Var ';
            }
        }

        taniString += 'tani4/'
    }
    if((form10 ? form10.blood_pressure.split('/')[0] > 139 || form10.heartrate_nature === 'Dolgun' : false)
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false) || (form11 ? ((form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)- (form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)) > 0 : false)
    ||(form8 ? form8.edema_severity > 1 : false)){
        if(form10){
            if(form10.blood_pressure.split('/')[0] > 139){
                taniValidInputs.tani5Inputs += 'Kan Basıncı > 139 ';
            }
            if(form10.heartrate_nature === 'Dolgun'){
                taniValidInputs.tani5Inputs += '/Nabız Doğası : Dolgun ';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Anksiyete')){
                taniValidInputs.tani5Inputs += '/Hareket Sorunlari : Anksiyete ';
            }
        }
        if(form11){
            if(((form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)- (form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)) > 0){
                taniValidInputs.tani5Inputs += '/Sıvı Denge :' + ((form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)- (form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)) + ' ml fazla';
            }
        }
        if(form8){
            if(form8.edema_severity > 1){
                taniValidInputs.tani5Inputs += '/Ödem : Var ';
            }
        }
        taniString += 'tani5/'
    }
    
    if((form10 ? form10.heartrate_location === 'Apikal' || form10.respiratory_nature === 'Zayıf' : false)
    || ( vucudutemizform1 ? vucudutemizform1.capillaryFillingProblem > 3 : false) || ( form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character === 'Yanıcı' : false)
    ||(vucudutemizform1 ?  vucudutemizform1.nailColorProblem.split('/').includes('Soluk beyaz') || vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik') || vucudutemizform1.nailColorProblem.split('/').includes('Sarı') : false)
    ){
        if(form10){
            if(form10.heartrate_location === 'Apikal'){
                taniValidInputs.tani6Inputs += 'Nabız Yeri : Apikal ';
            }
            if(form10.respiratory_nature === 'Zayıf'){
                taniValidInputs.tani6Inputs += '/Solunum Doğası : Zayıf ';
            }
        }
        if(vucudutemizform1){
            if(vucudutemizform1.capillaryFillingProblem > 3){
                taniValidInputs.tani6Inputs += '/Kapiller Dolum Problemi : ' + vucudutemizform1.capillaryFillingProblem + ' sn';
            }
            if(vucudutemizform1.nailColorProblem.split('/').includes('Soluk beyaz')){
                taniValidInputs.tani6Inputs += '/Tırnak Rengi Problemi : Soluk beyaz ';
            }
            if(vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik')){
                taniValidInputs.tani6Inputs += '/Tırnak Rengi Problemi : Siyanotik ';
            }
            if(vucudutemizform1.nailColorProblem.split('/').includes('Sarı')){
                taniValidInputs.tani6Inputs += '/Tırnak Rengi Problemi : Sarı ';
            }
        }
        taniString += 'tani6/'
    }
   
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location.length > 1 || form2.pain_frequency.length > 1 || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character.length > 1 : false)
    || (form10 ? form10.heart_rate > 100 || form10.blood_pressure.split('/')[0] > 139 || form10.respiratory_rate > 20  : false)||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ){
        if(form2){
            if(form2.pain_intensity === '3-4. Biraz Fazla'){
                taniValidInputs.tani7Inputs += 'Ağrı Şiddeti : 3-4. Biraz Fazla ';
            }
            if(form2.pain_intensity === '5-6. Çok'){
                taniValidInputs.tani7Inputs += '/Ağrı Şiddeti : 5-6. Çok ';
            }
            if(form2.pain_intensity === '7-8. Fazla'){
                taniValidInputs.tani7Inputs += '/Ağrı Şiddeti : 7-8. Fazla ';
            }
            if(form2.pain_intensity === '9-10. Dayanılmaz'){
                taniValidInputs.tani7Inputs += '/Ağrı Şiddeti : 9-10. Dayanılmaz ';
            }
            if(form2.pain_location.length > 1){
                taniValidInputs.tani7Inputs += '/Ağrı Lokasyonu : ' + form2.pain_location + ' yerde ';
            }
            if(form2.pain_frequency.length > 1){
                taniValidInputs.tani7Inputs += '/Ağrı Sıklığı : ' + form2.pain_frequency + ' yerde ';
            }
            if(form2.pain_duration === '6 Aydan Fazla'){
                taniValidInputs.tani7Inputs += '/Ağrı Süresi : 6 Aydan Fazla ';
            }
            if(form2.pain_character.length > 1){
                taniValidInputs.tani7Inputs += '/Ağrı Karakteri : ' + form2.pain_character.length + ' yerde ';
            }
        }
        if(form10){
            if(form10.heart_rate > 100){
                taniValidInputs.tani7Inputs += '/Nabız Hızı  > 100 ';
            }
            if(form10.blood_pressure.split('/')[0] > 139){
                taniValidInputs.tani7Inputs += '/Kan Basıncı > 139 ';
            }
            if(form10.respiratory_rate > 20){
                taniValidInputs.tani7Inputs += '/Solunum Sayısı > 20 ';
            }
        }
        if(form1_beslenme){
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')){
                taniValidInputs.tani7Inputs += '/Beslenme Sorunları : Bulantı ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')){
                taniValidInputs.tani7Inputs += '/Beslenme Sorunları : Kusma ';
            }
        }

        taniString += 'tani7/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location.length > 0 || form2.pain_frequency.length > 0 || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character.length > 0 || form2.pain_increase_factors.length > 1 || form2.pain_decrease_factors.length > 1 : false)
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ){  
        if(form2){
            if(form2.pain_intensity === '3-4. Biraz Fazla'){
                taniValidInputs.tani8Inputs += 'Ağrı Şiddeti : 3-4. Biraz Fazla ';
            }
            if(form2.pain_intensity === '5-6. Çok'){
                taniValidInputs.tani8Inputs += '/Ağrı Şiddeti : 5-6. Çok ';
            }
            if(form2.pain_intensity === '7-8. Fazla'){
                taniValidInputs.tani8Inputs += '/Ağrı Şiddeti : 7-8. Fazla ';
            }
            if(form2.pain_intensity === '9-10. Dayanılmaz'){
                taniValidInputs.tani8Inputs += '/Ağrı Şiddeti : 9-10. Dayanılmaz ';
            }
            if(form2.pain_location.length > 0){
                taniValidInputs.tani8Inputs += '/Ağrı Lokasyonu : ' + form2.pain_location + ' yerde ';
            }
            if(form2.pain_frequency.length > 0){
                taniValidInputs.tani8Inputs += '/Ağrı Sıklığı : ' + form2.pain_frequency + ' yerde ';
            }
            if(form2.pain_duration === '6 Aydan Fazla'){
                taniValidInputs.tani8Inputs += '/Ağrı Süresi : 6 Aydan Fazla ';
            }
            if(form2.pain_character.length > 0){
                taniValidInputs.tani8Inputs += '/Ağrı Karakteri : ' + form2.pain_character.length + ' yerde ';
            }
            if(form2.pain_increase_factors.length > 1){
                taniValidInputs.tani8Inputs += '/Ağrı Artış Faktörleri : ' + form2.pain_increase_factors + ' yerde ';
            }
            if(form2.pain_decrease_factors.length > 1){
                taniValidInputs.tani8Inputs += '/Ağrı Azalış Faktörleri : ' + form2.pain_decrease_factors + ' yerde ';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Yorgunluk')){
                taniValidInputs.tani8Inputs += '/Hareket Sorunlari : Yorgunluk ';
            }
        }

        taniString += 'tani8/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character.length > 0 : false)
    || (bosaltimform1 != undefined ? bosaltimform1.IdrarRengi === 'Açık kırmızı' || bosaltimform1.IdrarRengi === 'Koyu kırmızı' || bosaltimform1.IdrarBerrakligi === 'Bulanık': false) || 
    (bosaltimform1 != undefined ?  bosaltimform1.excretionIssues.split('/').includes('Üriner inkontinans') || bosaltimform1.excretionIssues.split('/').includes('Dizüri') : false) ||(bosaltimform1 != undefined ? bosaltimform1.protezlertable === 'Yarı Bağımlı' || bosaltimform1.protezlertable === 'Bağımlı'
    || bosaltimform1.Mesane_kateterizasyonu === 'Var' || bosaltimform1.ureterestomi === 'Var' || bosaltimform1.Sistostomi === 'Var' : false)
    ){
        if(form2){
            if(form2.pain_intensity === '3-4. Biraz Fazla'){
                taniValidInputs.tani9Inputs += 'Ağrı Şiddeti : 3-4. Biraz Fazla ';
            }
            if(form2.pain_intensity === '5-6. Çok'){
                taniValidInputs.tani9Inputs += '/Ağrı Şiddeti : 5-6. Çok ';
            }
            if(form2.pain_intensity === '7-8. Fazla'){
                taniValidInputs.tani9Inputs += '/Ağrı Şiddeti : 7-8. Fazla ';
            }
            if(form2.pain_intensity === '9-10. Dayanılmaz'){
                taniValidInputs.tani9Inputs += '/Ağrı Şiddeti : 9-10. Dayanılmaz ';
            }
            if(form2.pain_location === 'İdrar yaparken'){
                taniValidInputs.tani9Inputs += '/Ağrı Lokasyonu : İdrar yaparken ';
            }
            if(form2.pain_character.length > 0){
                taniValidInputs.tani9Inputs += '/Ağrı Karakteri : ' + form2.pain_character.length + ' yerde ';
            }
        }
        if(bosaltimform1 != undefined){
            if(bosaltimform1.IdrarRengi === 'Açık kırmızı'){
                taniValidInputs.tani9Inputs += '/İdrar Rengi : Açık kırmızı ';
            }
            if(bosaltimform1.IdrarRengi === 'Koyu kırmızı'){
                taniValidInputs.tani9Inputs += '/İdrar Rengi : Koyu kırmızı ';
            }
            if(bosaltimform1.IdrarBerrakligi === 'Bulanık'){
                taniValidInputs.tani9Inputs += '/İdrar Berraklığı : Bulanık ';
            }
            if(bosaltimform1.excretionIssues.split('/').includes('Üriner inkontinans')){
                taniValidInputs.tani9Inputs += '/Boşaltım Sorunları : Üriner inkontinans ';
            }
            if(bosaltimform1.excretionIssues.split('/').includes('Dizüri')){
                taniValidInputs.tani9Inputs += '/Boşaltım Sorunları : Dizüri ';
            }
            if(bosaltimform1.protezlertable === 'Yarı Bağımlı'){
                taniValidInputs.tani9Inputs += '/Protezler : Yarı Bağımlı ';
            }
            if(bosaltimform1.protezlertable === 'Bağımlı'){
                taniValidInputs.tani9Inputs += '/Protezler : Bağımlı ';
            }
            if(bosaltimform1.Mesane_kateterizasyonu === 'Var'){
                taniValidInputs.tani9Inputs += 'Mesane kateterizasyonu : Sorun Var';
            }
            if(bosaltimform1.ureterestomi === 'Var'){
                taniValidInputs.tani9Inputs += '/Üreterostomi : Var ';
            }
            if(bosaltimform1.Sistostomi === 'Var'){
                taniValidInputs.tani9Inputs += '/Sistostomi : Var ';
            }
        }


        taniString += 'tani9/'
    }
    
    if((form2 ? form2.pain_intensity === '3-4. Biraz Fazla' ||  form2.pain_intensity === '5-6. Çok' || form2.pain_intensity === '7-8. Fazla' || form2.pain_intensity === '9-10. Dayanılmaz' || form2.pain_location === 'İdrar yaparken' || form2.pain_character.length > 0 : false)
    || (bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri >  10 || bosaltimform1.defekasyon_tekrari > 3 : false) ||(bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Diyare') : false)
    ){
        if(form2){
            if(form2.pain_intensity === '3-4. Biraz Fazla'){
                taniValidInputs.tani10Inputs += 'Ağrı Şiddeti : 3-4. Biraz Fazla ';
            }
            if(form2.pain_intensity === '5-6. Çok'){
                taniValidInputs.tani10Inputs += '/Ağrı Şiddeti : 5-6. Çok ';
            }
            if(form2.pain_intensity === '7-8. Fazla'){
                taniValidInputs.tani10Inputs += '/Ağrı Şiddeti : 7-8. Fazla ';
            }
            if(form2.pain_intensity === '9-10. Dayanılmaz'){
                taniValidInputs.tani10Inputs += '/Ağrı Şiddeti : 9-10. Dayanılmaz ';
            }
            if(form2.pain_location === 'İdrar yaparken'){
                taniValidInputs.tani10Inputs += '/Ağrı Lokasyonu : İdrar yaparken ';
            }
        }
        if(bosaltimform1 != undefined){
            if(bosaltimform1.bagirsak_sesleri >  10){
                taniValidInputs.tani10Inputs += '/Bağırsak Sesleri : ' + bosaltimform1.bagirsak_sesleri + ' yerde ';
            }
            if(bosaltimform1.defekasyon_tekrari > 3){
                taniValidInputs.tani10Inputs += '/Defekasyon Tekrarı : ' + bosaltimform1.defekasyon_tekrari + ' yerde ';
            }
            if(bosaltimform1.excretionIssues.split('/').includes('Diyare')){
                taniValidInputs.tani10Inputs += '/Boşaltım Sorunları : Diyare ';
            }
        }

        taniString += 'tani10/'
    }
    
    var hospitalStoolEmptyingDate = new Date(bosaltimform1 != undefined ? bosaltimform1.hospitalStoolEmptyingDate : '');
    var currentDate = new Date();
    var diffDays = Math.ceil(Math.abs(currentDate - hospitalStoolEmptyingDate) / (1000 * 3600 * 24));
    if((bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri <  6 || diffDays > 3 || bosaltimform1.defekasyon_tekrari > 3 : false) || (bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Konstipasyon') : false) || (bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes('Distansiyon') : false)||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') : false) || ( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ){
        if(bosaltimform1 != undefined){
            if(bosaltimform1.bagirsak_sesleri <  6){
                taniValidInputs.tani11Inputs += 'Bağırsak Sesleri : ' + bosaltimform1.bagirsak_sesleri + ' yerde ';
            }
            if(diffDays > 3){
                taniValidInputs.tani11Inputs += '/Hastanede Boşaltım Tarihi : ' + diffDays + ' gün önce ';
            }
            if(bosaltimform1.defekasyon_tekrari > 3){
                taniValidInputs.tani11Inputs += '/Defekasyon Tekrarı : ' + bosaltimform1.defekasyon_tekrari + ' yerde ';
            }
            if(bosaltimform1.excretionIssues.split('/').includes('Konstipasyon')){
                taniValidInputs.tani11Inputs += '/Boşaltım Sorunları : Konstipasyon ';
            }
            if(bosaltimform1.excretionIssues.split('/').includes('Distansiyon')){
                taniValidInputs.tani11Inputs += '/Boşaltım Sorunları : Distansiyon ';
            }
        }
        if(form1_beslenme){
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')){
                taniValidInputs.tani11Inputs += '/Beslenme Sorunları : Bulantı ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık')){
                taniValidInputs.tani11Inputs += '/Beslenme Sorunları : Hazımsızlık ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')){
                taniValidInputs.tani11Inputs += '/Beslenme Sorunları : Kusma ';
            }
        }

        taniString += 'tani11/'
    }
    
    if((bosaltimform1 != undefined ? bosaltimform1.bagirsak_sesleri >  10 : false) ||(form1_beslenme ?  form1_beslenme.BKI <  18 || form1_beslenme.food_consumption_var === 'Daha az' : false) ||( form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') : false) ||( form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false) ||( form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false)
    ||( form1_beslenme ? form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') : false) ||( form1_beslenme ? form1_beslenme.chewing_difficulty === 'Var' : false)
    ){
        if(bosaltimform1 != undefined){
            if(bosaltimform1.bagirsak_sesleri >  10){
                taniValidInputs.tani12Inputs += 'Bağırsak Sesleri : ' + bosaltimform1.bagirsak_sesleri + ' yerde ';
            }
        }
        if(form1_beslenme){
            if(form1_beslenme.BKI <  18){
                taniValidInputs.tani12Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
            }
            if(form1_beslenme.food_consumption_var === 'Daha az'){
                taniValidInputs.tani12Inputs += '/Besin Tüketimi : Daha az ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')){
                taniValidInputs.tani12Inputs += '/Beslenme Sorunları : Bulantı ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık')){
                taniValidInputs.tani12Inputs += '/Beslenme Sorunları : Hazımsızlık ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')){
                taniValidInputs.tani12Inputs += '/Beslenme Sorunları : Kusma ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık')){
                taniValidInputs.tani12Inputs += '/Beslenme Sorunları : İştahsızlık ';
            }
            if(form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim')){
                taniValidInputs.tani12Inputs += '/Dil Sorunları : Tat almada değişim ';
            }
            if(form1_beslenme.chewing_difficulty === 'Var'){
                taniValidInputs.tani12Inputs += '/Çiğneme Zorluğu : Var ';
            }
        }

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
    if(form1_beslenme){
        if(form1_beslenme.BKI > 25){
            taniValidInputs.tani13Inputs += 'BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
        if(form1_beslenme.food_consumption_var === 'Daha fazla'){
            taniValidInputs.tani13Inputs += '/Besin Tüketimi : Daha fazla ';
        }
    }
    if(uyukuform1){
        if(uyukuform1.sleepProblem.split('/').includes('Uyuma Güçlüğü')){
            taniValidInputs.tani13Inputs += '/Uyku Sorunları : Uyuma Güçlüğü ';
        }
    }
    if(hareketform1){
        if(hareketform1.exercisingHabit.length === 0){
            taniValidInputs.tani13Inputs += '/Egzersiz Alışkanlığı : Yok ';
        }
    }
  taniString += 'tani13/';
}


    if((form1_beslenme ? form1_beslenme.BKI >  30 || form1_beslenme.food_consumption_var === 'Daha fazla' : false)
    ){
        if(form1_beslenme){
            if(form1_beslenme.BKI >  30){
                taniValidInputs.tani14Inputs += 'BKI : ' + form1_beslenme.BKI + ' yerde ';
            }
            if(form1_beslenme.food_consumption_var === 'Daha fazla'){
                taniValidInputs.tani14Inputs += '/Besin Tüketimi : Daha fazla ';
            }
        }

        taniString += 'tani14/'
    }
    
    if(( form1_beslenme ? form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') : false) ||( form1_beslenme ? form1_beslenme.chewing_difficulty === 'Var' : false )||( form1_beslenme ? form1_beslenme.lip_color_issue_var.split(',').includes('Soluk') : false)
    ||( form1_beslenme ? form1_beslenme.lip_color_issue_var.split(',').includes('Kuru') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon') : false)
    ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kötü koku') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Nodül') : false) ||( form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk') : false)
        ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti ödemi') : false) ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Apse') : false) ||( form1_beslenme ? form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti kanaması') : false) ||
        ( vucudutemizform1 ? vucudutemizform1.mouthCareFreq < 2 : false)
        ){
            if(form1_beslenme){
                if(form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim')){
                    taniValidInputs.tani15Inputs += 'Dil Sorunları : Tat almada değişim ';
                }
                if(form1_beslenme.chewing_difficulty === 'Var'){
                    taniValidInputs.tani15Inputs += '/Çiğneme Zorluğu : Var ';
                }
                if(form1_beslenme.lip_color_issue_var.split(',').includes('Soluk')){
                    taniValidInputs.tani15Inputs += '/Dudak Rengi Problemi : Soluk ';
                }
                if(form1_beslenme.lip_color_issue_var.split(',').includes('Kuru')){
                    taniValidInputs.tani15Inputs += '/Dudak Rengi Problemi : Kuru ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon')){
                    taniValidInputs.tani15Inputs += '/Ağız Mukozası Problemi : Ülserasyon ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon')){
                    taniValidInputs.tani15Inputs += '/Ağız Mukozası Problemi : Lezyon ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kötü koku')){
                    taniValidInputs.tani15Inputs += '/Ağız Mukozası Problemi : Kötü koku ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Nodül')){
                    taniValidInputs.tani15Inputs += '/Ağız Mukozası Problemi : Nodül ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')){
                    taniValidInputs.tani15Inputs += '/Ağız Mukozası Problemi : Kuruluk ';
                }
                if(form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti ödemi')){
                    taniValidInputs.tani15Inputs += '/Diş ve Dişeti Problemi : Dişeti ödemi ';
                }
                if(form1_beslenme.teeth_gums_issue_var.split(',').includes('Apse')){
                    taniValidInputs.tani15Inputs += '/Diş ve Dişeti Problemi : Apse ';
                }
                if(form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti kanaması')){
                    taniValidInputs.tani15Inputs += '/Diş ve Dişeti Problemi : Dişeti kanaması ';
                }
            }
            if(vucudutemizform1){
                if(vucudutemizform1.mouthCareFreq < 2){
                    taniValidInputs.tani15Inputs += '/Ağız Bakım Sıklığı : ' + vucudutemizform1.mouthCareFreq + ' yerde ';
                }
            }

            taniString += 'tani15/'
        }
        
        
     if(( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false) ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü') : false)
    ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ||( uyukuform1 ?  uyukuform1.hospitalFactorsAffectingSleep.length > 0 : false)
     ){
        if(uyukuform1){
            if(uyukuform1.averageSleepDuration < 7){
                taniValidInputs.tani16Inputs += 'Ortalama Uyku Süresi : ' + uyukuform1.averageSleepDuration + ' yerde ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Gündüz uykus')){
                taniValidInputs.tani16Inputs += 'Uyuku Sorunlari: Gündüz uykus ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')){
                taniValidInputs.tani16Inputs += '/Uyuku Sorunlari: Uykudan yorgun kalkma ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')){
                taniValidInputs.tani16Inputs += '/Uyuku Sorunlari: Uyuma güçlüğü';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')){
                taniValidInputs.tani16Inputs += '/Uyuku Sorunlari: Uykunun bölünmesi ';
            }

            if(uyukuform1.hospitalFactorsAffectingSleep.length > 0){
                taniValidInputs.tani16Inputs += '/Hastanede Uyku Sorunları : ' + uyukuform1.hospitalFactorsAffectingSleep + ' yerde ';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                taniValidInputs.tani16Inputs += '/Hareket Sorunlari : Huzursuzluk ';
            }
            if(hareketform1.movementProblem.split('/').includes('Yorgunluk')){
                taniValidInputs.tani16Inputs += '/Hareket Sorunlari : Yorgunluk ';
            }
        }
        taniString += 'tani16/'
     }

     if(( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Gündüz uykus') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uyuma güçlüğü') : false)
    ||(uyukuform1 ? uyukuform1.averageSleepDuration.split('/').includes('Uykunun bölünmesi') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Rahatsızlık') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Kaşıntı') : false)
    ||( form2 ?  form2.pain_duration === '6 Aydan Fazla' || form2.pain_duration !== '6 Aydan Fazla' : false)||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false)
    ){
        if(uyukuform1){
            if(uyukuform1.averageSleepDuration < 7){
                taniValidInputs.tani17Inputs += 'Ortalama Uyku Süresi : ' + uyukuform1.averageSleepDuration + ' yerde ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Gündüz uykus')){
                taniValidInputs.tani17Inputs += 'Uyuku Sorunlari: Gündüz uykus ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')){
                taniValidInputs.tani17Inputs += '/Uyuku Sorunlari: Uykudan yorgun kalkma ';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')){
                taniValidInputs.tani17Inputs += '/Uyuku Sorunlari: Uyuma güçlüğü';
            }
            if(uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')){
                taniValidInputs.tani17Inputs += '/Uyuku Sorunlari: Uykunun bölünmesi ';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                taniValidInputs.tani17Inputs += '/Hareket Sorunlari : Huzursuzluk ';
            }
            if(hareketform1.movementProblem.split('/').includes('Rahatsızlık')){
                taniValidInputs.tani17Inputs += '/Hareket Sorunlari : Rahatsızlık ';
            }
            if(hareketform1.movementProblem.split('/').includes('Kaşıntı')){
                taniValidInputs.tani17Inputs += '/Hareket Sorunlari : Kaşıntı ';
            }
        }
        if(form2){
            if(form2.pain_duration === '6 Aydan Fazla'){
                taniValidInputs.tani17Inputs += '/Ağrı Süresi : 6 Aydan Fazla ';
            }
            if(form2.pain_duration !== '6 Aydan Fazla'){
                taniValidInputs.tani17Inputs += '/Ağrı Süresi : 6 Aydan Az ';
            }
        }
        if(form1_beslenme){
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')){
                taniValidInputs.tani17Inputs += '/Beslenme Sorunları : Bulantı ';
            }
        }
        taniString += 'tani17/'
    }
    
    if(( hareketform1 ? hareketform1.changingPositionDependence === 'Yarı bağımlı' || hareketform1.changingPositionDependence === 'Bağımlı' ||
    hareketform1.walkingDependence === 'Yarı bağımlı' || hareketform1.walkingDependence === 'Bağımlı' ||  hareketform1.standingUpDependence === 'Yarı bağımlı' || hareketform1.standingUpDependence === 'Bağımlı' ||
    hareketform1.wearingClothesDependence === 'Yarı bağımlı' || hareketform1.wearingClothesDependence === 'Bağımlı' : false) ||( vucudutemizform1 ?  vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı' || vucudutemizform1.bodyCleansingDependence === 'Bağımlı' : false)
    || (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Baston') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Yürüteç') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi') : false)
    || (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false)
    ){
        if(hareketform1){
            if(hareketform1.changingPositionDependence === 'Yarı bağımlı'){
                taniValidInputs.tani18Inputs += 'Yataktan kalkma bağımlılığı : Yarı bağımlı ';
            }
            if(hareketform1.changingPositionDependence === 'Bağımlı'){
                taniValidInputs.tani18Inputs += '/Yataktan kalkma bağımlılığı : Bağımlı ';
            }
            if(hareketform1.walkingDependence === 'Yarı bağımlı'){
                taniValidInputs.tani18Inputs += '/Yürüme bağımlılığı : Yarı bağımlı ';
            }
            if(hareketform1.walkingDependence === 'Bağımlı'){
                taniValidInputs.tani18Inputs += '/Yürüme bağımlılığı : Bağımlı ';
            }
            if(hareketform1.standingUpDependence === 'Yarı bağımlı'){
                taniValidInputs.tani18Inputs += '/Ayakta durma bağımlılığı : Yarı bağımlı ';
            }
            if(hareketform1.standingUpDependence === 'Bağımlı'){
                taniValidInputs.tani18Inputs += '/Ayakta durma bağımlılığı : Bağımlı ';
            }
            if(hareketform1.wearingClothesDependence === 'Yarı bağımlı'){
                taniValidInputs.tani18Inputs += '/Giyinme bağımlılığı : Yarı bağımlı ';
            }
            if(hareketform1.wearingClothesDependence === 'Bağımlı'){
                taniValidInputs.tani18Inputs += '/Giyinme bağımlılığı : Bağımlı ';
            }

        }
        if(vucudutemizform1){
            if(vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı'){
                taniValidInputs.tani18Inputs += '/Vücut temizliği bağımlılığı : Yarı bağımlı ';
            }
            if(vucudutemizform1.bodyCleansingDependence === 'Bağımlı'){
                taniValidInputs.tani18Inputs += '/Vücut temizliği bağımlılığı : Bağımlı ';
            }
        }



        taniString += 'tani18/'
    }
    
    if((solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne'): false) || ( form10 ? form10.blood_pressure.split('/')[0] > 139 || form10.heart_rate > 100 : false)||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
    ||( hareketform1 ? hareketform1.movementProblem.split('/').includes('Halsizlik') : false)
    ){
        if(solunumgereksinimi_form1){
            if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne')){
                taniValidInputs.tani19Inputs += 'Solunum Problemleri : Dispne ';
            }
        }
        if(form10){
            if(form10.blood_pressure.split('/')[0] > 139){
                taniValidInputs.tani19Inputs += '/Kan Basıncı : ' + form10.blood_pressure + ' yerde ';
            }
            if(form10.heart_rate > 100){
                taniValidInputs.tani19Inputs += '/Kalp Atış Hızı : ' + form10.heart_rate + ' yerde ';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Yorgunluk')){
                taniValidInputs.tani19Inputs += '/Hareket Sorunları : Yorgunluk ';
            }
            if(hareketform1.movementProblem.split('/').includes('Halsizlik')){
                taniValidInputs.tani19Inputs += '/Hareket Sorunları : Halsizlik ';
            }
        }

            taniString += 'tani19/'
        }
    
    if((uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false )
    ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false) || 
    (hareketform1 ? hareketform1.movementProblem.split('/').includes('Halsizlik') : false)
    ){
        if(uyukuform1){
            if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')){
                taniValidInputs.tani20Inputs += '/Uyuku Sorunlari: Uykudan yorgun kalkma';
            }
        }
        if(hareketform1){
            if(hareketform1.movementProblem.split('/').includes('Yorgunluk')){
                taniValidInputs.tani20Inputs += '/Hareket Sorunları : Yorgunluk ';
            }
            if(hareketform1.movementProblem.split('/').includes('Halsizlik')){
                taniValidInputs.tani20Inputs += '/Hareket Sorunları : Halsizlik ';
            }
        }
        taniString += 'tani20/'
    }
    if((form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') : false) ||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') : false)
    ||(form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false)
     ){
        if(form1_beslenme){
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')){
                taniValidInputs.tani21Inputs += '/Beslenme Sorunları : Bulantı ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')){
                taniValidInputs.tani21Inputs += '/Beslenme Sorunları : Kusma ';
            }
            if(form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık')){
                taniValidInputs.tani21Inputs += '/Beslenme Sorunları : İştahsızlık ';
            }
        }

        taniString += 'tani21/'
    }

     if((form10 ? form10.heart_rate > 100 || form10.respiratory_rate > 24 ||  form10.body_temperature > 38 : false)
     || (vucudutemizform1 ?  vucudutemizform1.skinTemperature === 'Artış' : false)
     ){
            if(form10){
                if(form10.heart_rate > 100){
                    taniValidInputs.tani22Inputs += 'Kalp Atış Hızı : ' + form10.heart_rate + ' yerde ';
                }
                if(form10.respiratory_rate > 24){
                    taniValidInputs.tani22Inputs += '/Solunum Hızı : ' + form10.respiratory_rate + ' yerde ';
                }
                if(form10.body_temperature > 38){
                    taniValidInputs.tani22Inputs += '/Vücut Sıcaklığı : ' + form10.body_temperature + ' yerde ';
                }
            }
            if(vucudutemizform1){
                if(vucudutemizform1.skinTemperature === 'Artış'){
                    taniValidInputs.tani22Inputs += '/Cilt Sıcaklığı : Artış ';
                }
            }
        taniString += 'tani22/'
     }
     if((form10 ? form10.heart_rate < 50 || form10.respiratory_nature === 'Yüzeyel' || form10.spo2_percentage < 95 || form10.body_temperature < 35 : false) ||(vucudutemizform1 ? vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik') : false)
     ||(form10 ? form10.blood_pressure.split('/')[0] > 139 : false)||( vucudutemizform1  ?  vucudutemizform1.capillaryFillingProblem > 3 : false)
     ){ 
        if(form10){
            if(form10.heart_rate < 50){
                taniValidInputs.tani23Inputs += 'Kalp Atış Hızı : ' + form10.heart_rate + ' yerde ';
            }
            if(form10.respiratory_nature === 'Yüzeyel'){
                taniValidInputs.tani23Inputs += 'Solunum doğası : Yüzeyel ';
            }
            if(form10.spo2_percentage < 95){
                taniValidInputs.tani23Inputs += '/SPO2 : ' + form10.spo2_percentage + ' yerde ';
            }
            if(form10.body_temperature < 35){
                taniValidInputs.tani23Inputs += '/Vücut Sıcaklığı : ' + form10.body_temperature + ' yerde ';
            }
            if(form10.blood_pressure.split('/')[0] > 139){
                taniValidInputs.tani23Inputs += '/Kan Basıncı : ' + form10.blood_pressure + ' yerde ';
            }
        }
        if(vucudutemizform1){
            if(vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik')){
                taniValidInputs.tani23Inputs += '/Tırnak Rengi Problemi : Siyanotik ';
            }
            if(vucudutemizform1.capillaryFillingProblem > 3){
                taniValidInputs.tani23Inputs += '/Kapiller Dolum Problemi : ' + vucudutemizform1.capillaryFillingProblem + ' yerde ';
            }
        }


         taniString += 'tani23/'
        }
     
        
        
        var bathDate = new Date(vucudutemizform1 ? vucudutemizform1.bathDate : '');
        var currentDate = new Date();
        var diffDays = Math.ceil(Math.abs(currentDate - bathDate) / (1000 * 3600 * 24));
        if(diffDays > 3 ||( vucudutemizform1 ? vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı'  || vucudutemizform1.bodyCleansingDependence === 'Bağımlı' : false) ||(vucudutemizform1 ? vucudutemizform1.bodyHairStructure.split('/').includes('Yağlı')  : false) 
        ||(vucudutemizform1 ?  vucudutemizform1.scalpHairProblem.split('/').includes('Yağlanma') : false) ||( vucudutemizform1 ? vucudutemizform1.bathingFrequency < 2 : false)
        ){
            if(vucudutemizform1){
                if(vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı'){
                    taniValidInputs.tani24Inputs += 'Vücut Temizliği Bağımlılığı : Yarı bağımlı ';
                }
                if(vucudutemizform1.bodyCleansingDependence === 'Bağımlı'){
                    taniValidInputs.tani24Inputs += '/Vücut Temizliği Bağımlılığı : Bağımlı ';
                }
                if(vucudutemizform1.bodyHairStructure.split('/').includes('Yağlı')){
                    taniValidInputs.tani24Inputs += '/Vücut Saç Yapısı : Yağlı ';
                }
                if(vucudutemizform1.scalpHairProblem.split('/').includes('Yağlanma')){
                    taniValidInputs.tani24Inputs += '/Saç Derisi Problemi : Yağlanma ';
                }
                if(vucudutemizform1.bathingFrequency < 2){
                    taniValidInputs.tani24Inputs += '/Banyo Sıklığı : ' + vucudutemizform1.bathingFrequency + ' yerde ';
                }
            }
            if(diffDays > 3){
                taniValidInputs.tani24Inputs += '/Banyo Tarihi : ' + vucudutemizform1.bathDate + ' yerde ';
            }
            taniString += 'tani24/'
        }
        
        if ((form1_beslenme ? form1_beslenme.cignemeRadio == "Var" || form1_beslenme.nutritional_needs == "Yarı Bağımlı" || form1_beslenme.nutritional_needs == "Bağımlı"
        || form1_beslenme.food_consumption_var == "Daha Az" || form1_beslenme.diet_eating_process == "Sonda ile" : false)) {
            
            if(form1_beslenme){
                if(form1_beslenme.cignemeRadio == "Var"){
                    taniValidInputs.tani25Inputs += 'Çiğneme Problemi : Var ';
                }
                if(form1_beslenme.nutritional_needs == "Yarı Bağımlı"){
                    taniValidInputs.tani25Inputs += '/Beslenme İhtiyacı : Yarı Bağımlı ';
                }
                if(form1_beslenme.nutritional_needs == "Bağımlı"){
                    taniValidInputs.tani25Inputs += '/Beslenme İhtiyacı : Bağımlı ';
                }
                if(form1_beslenme.food_consumption_var == "Daha Az"){
                    taniValidInputs.tani25Inputs += '/Yemek Tüketimi : Daha Az ';
                }
            }

            taniString += 'tani25/'
        }
        
        if (( hareketform1 ? hareketform1.wearingClothesDependence == "Yarı Bağımlı" || hareketform1.wearingClothesDependence == "Bağımlı" : false)||( hareketform1 ? hareketform1.movementProblem.split('/').includes("Yorgunluk") : false)) {
            if(hareketform1){
                if(hareketform1.wearingClothesDependence == "Yarı Bağımlı"){
                    taniValidInputs.tani26Inputs += 'Giyinme Bağımlılığı : Yarı Bağımlı ';
                }
                if(hareketform1.wearingClothesDependence == "Bağımlı"){
                    taniValidInputs.tani26Inputs += '/Giyinme Bağımlılığı : Bağımlı ';
                }
                if(hareketform1.movementProblem.split('/').includes("Yorgunluk")){
                    taniValidInputs.tani26Inputs += '/Hareket Sorunları : Yorgunluk ';
                }
            }

            taniString += 'tani26/'
        }
        
        if ((bosaltimform1 != undefined ? bosaltimform1.stoolEmptyingHelp == "Yarı Bağımlı" || bosaltimform1.stoolEmptyingHelp == "Bağımlı" || bosaltimform1.protezlertable2 == "Yarı Bağımlı"
        || bosaltimform1.protezlertable2 == "Bağımlı" : false) ||(hareketform1 ?  hareketform1.standingUpDependence == "Bağımlı" || hareketform1.wearingClothesDependence == "Yarı Bağımlı" ||
        hareketform1.wearingClothesDependence == "Bağımlı" : false)||( vucudutemizform1 ?  vucudutemizform1.bodyCleansingDependence == "Yarı bağımlı" || vucudutemizform1.bodyCleansingDependence == "Bağımlı" : false)
        || (bosaltimform1 != undefined ? bosaltimform1.excretionProblems.split('/').includes("Fekal") : false) ||(bosaltimform1 != undefined ? bosaltimform1.excretionIssues.split('/').includes("Üriner inkontinans"): false)) {
            if(bosaltimform1){
                if(bosaltimform1.stoolEmptyingHelp == "Yarı Bağımlı"){
                    taniValidInputs.tani27Inputs += 'Dışkılama Yardımı : Yarı Bağımlı ';
                }
                if(bosaltimform1.stoolEmptyingHelp == "Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Dışkılama Yardımı : Bağımlı ';
                }
                if(bosaltimform1.protezlertable2 == "Yarı Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Protezler : Yarı Bağımlı ';
                }
                if(bosaltimform1.protezlertable2 == "Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Protezler : Bağımlı ';
                }
                if(bosaltimform1.excretionProblems.split('/').includes("Fekal")){
                    taniValidInputs.tani27Inputs += '/Dışkılama Problemi : Fekal ';
                }
                if(bosaltimform1.excretionIssues.split('/').includes("Üriner inkontinans")){
                    taniValidInputs.tani27Inputs += '/Dışkılama Problemi : Üriner inkontinans ';
                }
            }
            if(hareketform1){
                if(hareketform1.standingUpDependence == "Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Ayakta Durma Bağımlılığı : Bağımlı ';
                }
                if(hareketform1.wearingClothesDependence == "Yarı Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Giyinme Bağımlılığı : Yarı Bağımlı ';
                }
                if(hareketform1.wearingClothesDependence == "Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Giyinme Bağımlılığı : Bağımlı ';
                }
            }
            if(vucudutemizform1){
                if(vucudutemizform1.bodyCleansingDependence == "Yarı bağımlı"){
                    taniValidInputs.tani27Inputs += '/Vücut Temizliği Bağımlılığı : Yarı bağımlı ';
                }
                if(vucudutemizform1.bodyCleansingDependence == "Bağımlı"){
                    taniValidInputs.tani27Inputs += '/Vücut Temizliği Bağımlılığı : Bağımlı ';
                }
            }

            taniString += 'tani27/'  
        }
        
        if ((form7 ? form7.stage == "Evre I" || form7.stage == "Evre II" : false) ||( katererform1 ?  katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren" : false)
        ||( vucudutemizform1 ? vucudutemizform1.skinMoisture == "Var" :false)){
            if(form7){
                if(form7.stage == "Evre I"){
                    taniValidInputs.tani28Inputs += 'Yara Evresi : Evre I ';
                }
                if(form7.stage == "Evre II"){
                    taniValidInputs.tani28Inputs += '/Yara Evresi : Evre II ';
                }
            }
            if(katererform1){
                if(katererform1.katererType == "Periferik venöz kateter"){
                    taniValidInputs.tani28Inputs += '/Kateter Tipi : Periferik venöz kateter ';
                }
                if(katererform1.katererType == "Santral venöz  kateter"){
                    taniValidInputs.tani28Inputs += '/Kateter Tipi : Santral venöz  kateter ';
                }
                if(katererform1.katererType == "Dren"){
                    taniValidInputs.tani28Inputs += '/Kateter Tipi : Dren ';
                }
            }
            if(vucudutemizform1){
                if(vucudutemizform1.skinMoisture == "Var"){
                    taniValidInputs.tani28Inputs += '/Cilt Nemi : Var ';
                }
            }
            taniString += 'tani28/'
        }
        
        if ((form7 ? form7.stage == "Evre III" || form7.stage == "Evre IV" || form7.stage == "Evrelendirilemeyen" || form7.stage == "Derin doku hasarı" : false)
        ||(form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') : false) ||(form1_beslenme ? form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon'): false)){
            if(form7){
                if(form7.stage == "Evre III"){
                    taniValidInputs.tani29Inputs += 'Yara Evresi : Evre III ';
                }
                if(form7.stage == "Evre IV"){
                    taniValidInputs.tani29Inputs += '/Yara Evresi : Evre IV ';
                }
                if(form7.stage == "Derin doku hasarı"){
                    taniValidInputs.tani29Inputs += '/Yara Evresi : Derin doku hasarı ';
                }
                if(form7.stage == "Evrelendirilemeyen"){
                    taniValidInputs.tani29Inputs += '/Yara Evresi : Evrelendirilemeyen ';
                }
            }
            if(form1_beslenme){
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon')){
                    taniValidInputs.tani29Inputs += '/Ağız Mukoza Problemi : Ülserasyon ';
                }
                if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon')){
                    taniValidInputs.tani29Inputs += '/Ağız Mukoza Problemi : Lezyon ';
                }
            }

            taniString += 'tani29/'    
        }
        console.log("i am here")
        
        if ((solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne') : false) || ( ilestimform1 ? ilestimform1.communicationProblem != "Yok"
        || ilestimform1.contactingStaffTrouble != "Yok" : false) ||( solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.airwayMethod == "Trakeostomi" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp" : false)){
            if(solunumgereksinimi_form1 !=undefined){
                if(solunumgereksinimi_form1.breathingProblems.split('/').includes('Dispne')){
                    taniValidInputs.tani30Inputs += 'Solunum Problemleri : Dispne ';
                }
                if(solunumgereksinimi_form1.airwayMethod == "Trakeostomi"){
                    taniValidInputs.tani30Inputs += '/Hava Yolu Yöntemi : Trakeostomi ';
                }
                if(solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp"){
                    taniValidInputs.tani30Inputs += '/Hava Yolu Yöntemi : Endotrakeal Tüp ';

                }
            }
            if(ilestimform1){
                if(ilestimform1.communicationProblem != "Yok"){
                    taniValidInputs.tani30Inputs += '/İletişim Problemi : Yok';
                }
                if(ilestimform1.contactingStaffTrouble != "Yok"){
                    taniValidInputs.tani30Inputs += '/Personel ile İletişim Problemi : Yok ';
                }
            }

            taniString += 'tani30/'    
        }
        
        if ((form1_beslenme ? form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') : false) ||(form1_beslenme ?  form1_beslenme.nutrition_issue_var.split(',').includes('İsteksiz'): false) 
        ||( ilestimform1 ?  ilestimform1.treatmentAcceptance == "Kabul etmiyor" : false) ||( uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false)
        ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü') : false)
        ||(uyukuform1 ?  uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') : false) ||( ilestimform1 ? ilestimform1.reachTrouble != "Yok" || ilestimform1.companion == "Yok" : false)
            ||( calismaform1 ? calismaform1.workStatus == "Çalışmıyor" : false)){
            if(form1_beslenme){
                if(form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık')){
                        taniValidInputs.tani31Inputs += 'Beslenme Sorunları : İştahsızlık ';
                }
                if(form1_beslenme.nutrition_issue_var.split(',').includes('İsteksiz')){
                    taniValidInputs.tani31Inputs += '/Beslenme Sorunları : İsteksiz ';
                }
            }
            if(ilestimform1){
                if(ilestimform1.treatmentAcceptance == "Kabul etmiyor"){
                    taniValidInputs.tani31Inputs += '/Tedavi Kabulü : Kabul etmiyor ';
                }
                if(ilestimform1.reachTrouble != "Yok"){
                    taniValidInputs.tani31Inputs += '/Ulaşım Problemi : Yok ';
                }
                if(ilestimform1.companion == "Yok"){
                    taniValidInputs.tani31Inputs += '/Refakatçi : Yok ';
                }
            }
            if(uyukuform1){
                if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')){
                    taniValidInputs.tani31Inputs += '/Uyku Sorunlari: Uykudan yorgun kalkma';
                }
                if(uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')){
                    taniValidInputs.tani31Inputs += '/Uyku Sorunlari: Uyuma güçlüğü';
                }
                if(uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')){
                    taniValidInputs.tani31Inputs += '/Uyku Sorunlari: Uykunun bölünmesi';
                }
            }
            if(calismaform1){
                if(calismaform1.workStatus == "Çalışmıyor"){
                    taniValidInputs.tani31Inputs += '/Çalışma Durumu : Çalışmıyor ';
                }
            }
                taniString += 'tani31/'
            }
            
            
            if ((uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false) ||( calismaform1  ? calismaform1.hobbies == "Yok" : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false)){
                if(uyukuform1){
                    if(uyukuform1.sleepProblem.split('/').includes('Gündüz uykus')){
                        taniValidInputs.tani32Inputs += 'Uyku Sorunlari: Gündüz uykus';
                    }
                }
                if(calismaform1){
                    if(calismaform1.hobbies == "Yok"){
                        taniValidInputs.tani32Inputs += '/Hobiler : Yok ';
                    }
                }
                if(hareketform1){
                    if(hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                        taniValidInputs.tani32Inputs += '/Hareket Sorunları : Huzursuzluk ';
                    }
                }
                taniString += 'tani32/'    
            }            
            if (( ilestimform1 ? ilestimform1.treatmentAcceptance !== "" : false)) {
                if(ilestimform1){
                    if(ilestimform1.treatmentAcceptance !== ""){
                        taniValidInputs.tani33Inputs += 'Tedavi Kabulü : Kabul';
                    }
                }
                taniString += 'tani33/'
            }
            
            
            if ((hareketform1 ? hareketform1.movementProblem.split('/').includes('Huzursuzluk') : false) ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Yorgunluk') : false)
            ||(hareketform1 ? hareketform1.movementProblem.split('/').includes('Anksiyete') : false) ||( uyukuform1 ? uyukuform1.averageSleepDuration < 7 : false) ||( uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') : false)
            ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') : false) ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü') : false)
            ||(uyukuform1 ? uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') : false)) {
                if(hareketform1){
                    if(hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                        taniValidInputs.tani34Inputs += 'Hareket Sorunları : Huzursuzluk ';
                    }
                    if(hareketform1.movementProblem.split('/').includes('Yorgunluk')){
                        taniValidInputs.tani34Inputs += '/Hareket Sorunları : Yorgunluk ';
                    }
                    if(hareketform1.movementProblem.split('/').includes('Anksiyete')){
                        taniValidInputs.tani34Inputs += '/Hareket Sorunları : Anksiyete ';
                    }
                }
                if(uyukuform1){
                    if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')){
                        taniValidInputs.tani34Inputs += '/Uyku Sorunlari: Uykudan yorgun kalkma';
                    }
                    if(uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')){
                        taniValidInputs.tani34Inputs += '/Uyku Sorunlari: Uyuma güçlüğü';
                    }
                    if(uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')){
                        taniValidInputs.tani34Inputs += '/Uyku Sorunlari: Uykunun bölünmesi';
                    }

                }
                taniString += 'tani34/'
            }
            
            
            if ((form3 ? form3.total >= 5 : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Baston') : false)
            ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Yurutec') : false) ||(ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi') : false)){
                if(form3){
                    if(form3.total >= 5){
                        taniValidInputs.tani35Inputs += 'Düşme Riski : Yüksek ';
                    }
                }
                if(ozgecmisform1){
                    if(ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye')){
                        taniValidInputs.tani35Inputs += '/Yardımcı Araçlar : Tekerlekli Sandalye ';
                    }
                    if(ozgecmisform1.aidTools.split('/').includes('Baston')){
                        taniValidInputs.tani35Inputs += '/Yardımcı Araçlar : Baston ';
                    }
                    if(ozgecmisform1.aidTools.split('/').includes('Yurutec')){
                        taniValidInputs.tani35Inputs += '/Yardımcı Araçlar : Yurutec ';
                    }
                    if(ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi')){
                        taniValidInputs.tani35Inputs += '/Yardımcı Araçlar : Koltuk Degnegi ';
                    }
                }

                taniString += 'tani36/'
            }
            
            if ((katererform1 ? katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren"
            || katererform1.katererType == "Diğer" : false) ||( bosaltimform1 != undefined ? bosaltimform1.Mesane_kateterizasyonu == "Var" : false) ||( ozgecmisform1 ? ozgecmisform1.smoking != "Yok" || ozgecmisform1.arrivalFromInput == "DM" : false)
            ||(form1_beslenme ?  form1_beslenme.BKI > 30 : false)){
                if(katererform1){
                    if(katererform1.katererType == "Periferik venöz kateter"){
                        taniValidInputs.tani37Inputs += 'Kateter Tipi : Periferik venöz kateter ';
                    }
                    if(katererform1.katererType == "Santral venöz  kateter"){
                        taniValidInputs.tani37Inputs += '/Kateter Tipi : Santral venöz  kateter ';
                    }
                    if(katererform1.katererType == "Dren"){
                        taniValidInputs.tani37Inputs += '/Kateter Tipi : Dren ';
                    }
                    if(katererform1.katererType == "Diğer"){
                        taniValidInputs.tani37Inputs += '/Kateter Tipi : Diğer ';
                    }
                }
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
                    if(bosaltimform1 != undefined){
                        if(bosaltimform1.bagirsak_sesleri < 6){
                            taniValidInputs.tani38Inputs += 'Bağırsak Sesleri : ' + bosaltimform1.bagirsak_sesleri + ' yerde ';
                        }
                        if(bosaltimform1.excretionProblems.split('/').includes('Distansyon')){
                            taniValidInputs.tani38Inputs += '/Dışkılama Problemi : Distansyon ';
                        }
                        if(bosaltimform1.excretionProblems.split('/').includes('Dışkı')){
                            taniValidInputs.tani38Inputs += '/Dışkılama Problemi : Dışkı ';
                        }
    
                    }
                    if(form1_beslenme){
                        if(form1_beslenme.chewing_difficulty == "Var"){
                            taniValidInputs.tani38Inputs += '/Çiğneme Problemi : Var ';
                        }
                        if(form1_beslenme.gastric_residue == "Var"){
                            taniValidInputs.tani38Inputs += '/Gastrik Rezidü : Var ';
                        }
                        if(form1_beslenme.diet_eating_process == "Sonda ile"){
                            taniValidInputs.tani38Inputs += '/Diyet Yeme Süreci : Sonda ile ';
                        }
                        if(form1_beslenme.nazogastrik_decompression_radio == "Var"){
                            taniValidInputs.tani38Inputs += '/Nazogastrik Dekompresyon : Var ';
                        }


                    }
                    if(solunumgereksinimi_form1 !== undefined){
                        if(solunumgereksinimi_form1.CoughOption == "Ektisiz"){
                            taniValidInputs.tani38Inputs += '/Öksürük : Ektisiz ';
                        }
                        if(solunumgereksinimi_form1.airwayMethod == "Trakeostomi"){
                            taniValidInputs.tani38Inputs += '/Hava Yolu Yöntemi : Trakeostomi ';
                        }
                        if(solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp"){
                            taniValidInputs.tani38Inputs += '/Hava Yolu Yöntemi : Endotrakeal Tüp ';
                        }

                    }

                taniString += 'tani38/';
                }

                if (
  (form1_beslenme ? form1_beslenme.BKI < 18 : false) ||
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Gozluk') : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  (form5 ? (form5.total >= 3 ? form5.total <= 13 : false) : false)
) {
    if(form1_beslenme){
        if(form1_beslenme.BKI < 18){
            taniValidInputs.tani39Inputs += 'BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
    }
    if(ozgecmisform1){
        if(ozgecmisform1.aidTools.split('/').includes('Gozluk')){
            taniValidInputs.tani39Inputs += '/Yardımcı Araçlar : Gozluk ';
        }
    }
    if(form5){
        if(form5.verbal_response_points === 4){
            taniValidInputs.tani39Inputs += '/Bilinç Durumu : 4 ';
        }
        if(form5.total >=3 || form5.total <= 13){
            taniValidInputs.tani39Inputs += '/Bilinç Durumu : 3-13 ';
        }
    }
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
  (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.aspirasyonNeeds.split('/').includes('Oro_Nazofarengeal') : false)
) {
    if(vucudutemizform1){
        if(vucudutemizform1.mouthCareFreq < 2){
            taniValidInputs.tani40Inputs += 'Ağız Bakım Sıklığı : ' + vucudutemizform1.mouthCareFreq + ' yerde ';
        }
    }
    if(ozgecmisform1){
        if(ozgecmisform1.smoking !== "Yok"){
            taniValidInputs.tani40Inputs += '/Sigara : Var ';
        }
        if(ozgecmisform1.alcoholUsage === "Alkol"){
            taniValidInputs.tani40Inputs += '/Alkol : Var ';
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.lip_color_issue_var.split(',').includes('Kuru')){
            taniValidInputs.tani40Inputs += '/Dudak Renk Problemi : Kuru ';
        }
        if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')){
            taniValidInputs.tani40Inputs += '/Ağız Mukoza Problemi : Kuruluk ';
        }
        if(form1_beslenme.food_consumption_var === "Daha Az"){
            taniValidInputs.tani40Inputs += '/Besin Tüketimi : Daha Az ';
        }
        if(form1_beslenme.diet_eating_process === "Parenteral"){
            taniValidInputs.tani40Inputs += '/Diyet Yeme Süreci : Parenteral ';
        }
        if(form1_beslenme.diet_eating_process === "Sonda ile"){
            taniValidInputs.tani40Inputs += '/Yeme Süreci : Sonda ile ';
        }
    }
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
if(bosaltimform1 != undefined){
    if(bosaltimform1.excretionProblems.split('/').includes('Diare')){
        taniValidInputs.tani41Inputs += 'Dışkılama Problemi : Diare ';
    }
    if(bosaltimform1.bagirsak_sesleri > 10){
        taniValidInputs.tani41Inputs += '/Bağırsak Sesleri : ' + bosaltimform1.bagirsak_sesleri + ' yerde ';
    }
    if(bosaltimform1.hospitalStoolEmptyingFrequency > 3){
        taniValidInputs.tani41Inputs += '/Hastane Dışkılama Sıklığı : ' + bosaltimform1.hospitalStoolEmptyingFrequency + ' yerde ';
    }
}
if(form1_beslenme){
    if(form1_beslenme.nutrition_issue_var.split('/').includes('Kusma')){
        taniValidInputs.tani41Inputs += '/Beslenme Sorunları : Kusma ';
    }
}
if(form8){
    if(form8.edema_severity === "1"){
        taniValidInputs.tani41Inputs += '/Ödem Şiddeti : 1 ';
    }
    if(form8.edema_severity === "2"){
        taniValidInputs.tani41Inputs += '/Ödem Şiddeti : 2 ';
    }
    if(form8.edema_severity === "3"){
        taniValidInputs.tani41Inputs += '/Ödem Şiddeti : 3 ';
    }
    if(form8.edema_severity === "4"){
        taniValidInputs.tani41Inputs += '/Ödem Şiddeti : 4 ';
    }
}
  taniString += 'tani41/';
}
if (
  (bosaltimform1 ? bosaltimform1.excretionProblems.split('/').includes('Diare') : false) ||
  (form1_beslenme ? form1_beslenme.nutrition_issue_var.split('/').includes('Kusma') : false) ||
  (form1_beslenme ? form1_beslenme.liquid_consumption < 1000 : false) ||
  (katererform1 ? katererform1.katererType === "Dren" : false) ||
  (form1_beslenme ? form1_beslenme.BKI > 30 : false)
) {
    if(bosaltimform1){
        if(bosaltimform1.excretionProblems.split('/').includes('Diare')){
            taniValidInputs.tani42Inputs += 'Dışkılama Problemi : Diare ';
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.nutrition_issue_var.split('/').includes('Kusma')){
            taniValidInputs.tani42Inputs += '/Beslenme Sorunları : Kusma ';
        }
        if(form1_beslenme.liquid_consumption < 1000){
            taniValidInputs.tani42Inputs += '/Sıvı Tüketimi : ' + form1_beslenme.liquid_consumption + ' yerde ';
        }
        if(form1_beslenme.BKI > 30){
            taniValidInputs.tani42Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
    }
    if(katererform1){
        if(katererform1.katererType === "Dren"){
            taniValidInputs.tani42Inputs += '/Kateter Tipi : Dren ';
        }
    }
  taniString += 'tani42/';
}

if (
  (ozgecmisform1 ? ozgecmisform1.allergies === "Var" : false) ||
  (ozgecmisform1 ? ozgecmisform1.transfusionReaction !== "Yok" : false) ||
  (ozgecmisform1 ? ozgecmisform1.kolbandi === "Kırmızı" : false) ||
  (ozgecmisform1 ? ozgecmisform1.arrivalFromInput === "Astım" : false)
) {
    if(ozgecmisform1){
        if(ozgecmisform1.allergies === "Var"){
            taniValidInputs.tani43Inputs += 'Alerji : Var ';
        }
        if(ozgecmisform1.transfusionReaction !== "Yok"){
            taniValidInputs.tani43Inputs += '/Transfüzyon Reaksiyonu : Yok ';
        }
        if(ozgecmisform1.kolbandi === "Kırmızı"){
            taniValidInputs.tani43Inputs += '/Kol Bandı : Kırmızı ';
        }
        if(ozgecmisform1.arrivalFromInput === "Astım"){
            taniValidInputs.tani43Inputs += '/Geliş Nedeni : Astım ';
        }
    }
  taniString += 'tani43/';
}
if (
  (form1_beslenme ? form1_beslenme.BKI > 30 : false) ||
  (form10 ? form10.spo2_percentage < 95 : false) ||
  (form1_beslenme ? form1_beslenme.liquid_consumption < 1000 : false) ||
  (bosaltimform1 != undefined ? bosaltimform1.IdrarRengi === "Koyu sarı" : false) ||
  (form10 && form10.blood_pressure ? parseInt(form10.blood_pressure.split('/')[0]) < 100 : false) ||
  (form10 ? form10.heart_rate > 100 : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinAge === "Zayıf" : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  ((form5 ? form5.total >= 3 || form5.total <= 13 : false))
) {
    if(form1_beslenme){
        if(form1_beslenme.BKI > 30){
            taniValidInputs.tani44Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
        if(form1_beslenme.liquid_consumption < 1000){
            taniValidInputs.tani44Inputs += '/Sıvı Tüketimi : ' + form1_beslenme.liquid_consumption + ' yerde ';
        }
    }
    if(form10){
        if(form10.spo2_percentage < 95){
            taniValidInputs.tani44Inputs += '/SPO2 : ' + form10.spo2_percentage + ' yerde ';
        }
        if(parseInt(form10.blood_pressure.split('/')[0]) < 100){
            taniValidInputs.tani44Inputs += '/Kan Basıncı : ' + form10.blood_pressure + ' yerde ';
        }
        if(form10.heart_rate > 100){
            taniValidInputs.tani44Inputs += '/Kalp Atış Hızı : ' + form10.heart_rate + ' yerde ';
        }
    }
    if(vucudutemizform1){
        if(vucudutemizform1.skinAge === "Zayıf"){
            taniValidInputs.tani44Inputs += '/Cilt Yaşı : Zayıf ';
        }
    }
    if(form5){
        if(form5.verbal_response_points === 4){
            taniValidInputs.tani44Inputs += '/Bilinç Durumu : 4 ';
        }
        if(form5.total >= 3 || form5.total <= 13){
            taniValidInputs.tani44Inputs += '/Bilinç Durumu : 3-13 ';
        }
    }
  taniString += 'tani44/';
}
if (
  (ilestimform1 ? ilestimform1.treatmentAcceptance === "Kabul etmiyor" : false) ||
  (hareketform1 ? hareketform1.exercisingHabitInput === "Yok" : false) ||
  (ozgecmisform1 ? ozgecmisform1.arrivalFromInput === "DM" : false) ||
  (form1_beslenme ? form1_beslenme.food_consumption_var === "Daha Az" : false)
) {
    if(ilestimform1){
        if(ilestimform1.treatmentAcceptance === "Kabul etmiyor"){
            taniValidInputs.tani45Inputs += 'Tedavi Kabulü : Kabul etmiyor ';
        }

    }
    if(hareketform1){
        if(hareketform1.exercisingHabitInput === "Yok"){
            taniValidInputs.tani45Inputs += '/Egzersiz Alışkanlığı : Yok ';
        }
    }
    if(ozgecmisform1){
        if(ozgecmisform1.arrivalFromInput === "DM"){
            taniValidInputs.tani45Inputs += '/Geliş Nedeni : DM ';
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.food_consumption_var === "Daha Az"){
            taniValidInputs.tani45Inputs += '/Besin Tüketimi : Daha Az ';
        }
    }
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
    if(form1_beslenme){
        if(form1_beslenme.nutrition_issue_var === "Hazımsızlık"){
            taniValidInputs.tani46Inputs += 'Beslenme Sorunları : Hazımsızlık ';
        }
        if(form1_beslenme.food_consumption_var === "Daha Az"){
            taniValidInputs.tani46Inputs += '/Besin Tüketimi : Daha Az ';
        }
        if(form1_beslenme.diet_eating_process === "Parenteral"){
            taniValidInputs.tani46Inputs += '/Diyet Yeme Süreci : Parenteral ';
        }
        if(form1_beslenme.diet_eating_process === "Sonda ile"){
            taniValidInputs.tani46Inputs += '/Diyet Yeme Süreci : Sonda Ile ';

        }
    }
    if(hareketform1){
        if(hareketform1.changingPositionDependence === "Yarı Bağımlı"){
            taniValidInputs.tani46Inputs += '/Pozisyon Değiştirme Bağımlılığı : Yarı Bağımlı ';
        }
        if(hareketform1.changingPositionDependence === "Bağımlı"){
            taniValidInputs.tani46Inputs += '/Pozisyon Değiştirme Bağımlılığı : Bağımlı ';
        }
        if(hareketform1.movementProblem.split('/').includes('Anksiyete')){
            taniValidInputs.tani46Inputs += '/Hareket Sorunları : Anksiyete ';
        }
        if(hareketform1.exercisingHabit === "Hayir"){
            taniValidInputs.tani46Inputs += '/egzersiz alışkanlığı : Evet';
        }
    }
  taniString += 'tani46/';
}

if (
  (form6 ? form6.total <= 14 : false) ||
  (form1_beslenme ? form1_beslenme.BKI < 18 : false) ||
  (form1_beslenme ? form1_beslenme.BKI > 35 : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinColorProblem === "Soluk" : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinColorProblem.split('/').includes("Kızarıklık") : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinColorProblem === "Pigmentasyon artışı" : false) ||
  (vucudutemizform1 ? vucudutemizform1.skinAge === "Zayıf" : false) ||
  (form10 ? form10.body_temperature > 38 : false) ||
  (form10 ? form10.body_temperature < 35 : false) ||
  (form1_beslenme ? form1_beslenme.nutritional_needs === "Yarı Bağımlı" : false) ||
  (form1_beslenme ? form1_beslenme.nutritional_needs === "Bağımlı" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Yarı Bağımlı" : false) ||
  (hareketform1 ? hareketform1.changingPositionDependence === "Bağımlı" : false)
) {
    if(form5){
        if(form5.total <=14){
            taniValidInputs.tani47Inputs += 'Braden Risk : Orta risk'
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.BKI < 18){
            taniValidInputs.tani47Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
        if(form1_beslenme.BKI > 35){
            taniValidInputs.tani47Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
        if(form1_beslenme.nutritional_needs === "Yarı Bağımlı"){
            taniValidInputs.tani47Inputs += '/Beslenme Gereksinimi : Yarı Bağımlı ';
        }
        if(form1_beslenme.nutritional_needs === "Bağımlı"){
            taniValidInputs.tani47Inputs += '/Beslenme Gereksinimi : Bağımlı ';
        }

    }
    if(vucudutemizform1){
        if(vucudutemizform1.skinColorProblem === "Soluk"){
            taniValidInputs.tani47Inputs += '/Cilt Rengi Problemi : Soluk ';
        }
        if(vucudutemizform1.skinColorProblem.split('/').includes("Kızarıklık")){
            taniValidInputs.tani47Inputs += '/Cilt Rengi Problemi : Kızarıklık ';
        }
        if(vucudutemizform1.skinColorProblem === "Pigmentasyon artışı"){
            taniValidInputs.tani47Inputs += '/Cilt Rengi Problemi : Pigmentasyon artışı ';
        }
        if(vucudutemizform1.skinAge === "Zayıf"){
            taniValidInputs.tani47Inputs += '/Cilt Yaşı : Zayıf ';
        }
    }
    if(form10){
        if(form10.body_temperature > 38){
            taniValidInputs.tani47Inputs += '/Vücut Isısı : ' + form10.body_temperature + ' yerde ';
        }
        if(form10.body_temperature < 35){
            taniValidInputs.tani47Inputs += '/Vücut Isısı : ' + form10.body_temperature + ' yerde ';
        }
    }
    if(hareketform1){
        if(hareketform1.changingPositionDependence === "Yarı Bağımlı"){
            taniValidInputs.tani47Inputs += '/Pozisyon Değiştirme Bağımlılığı : Yarı Bağımlı ';
        }
        if(hareketform1.changingPositionDependence === "Bağımlı"){
            taniValidInputs.tani47Inputs += '/Pozisyon Değiştirme Bağımlılığı : Bağımlı ';
        }
    }
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
    if(form6){
        if(form5.total <=14){
            taniValidInputs.tani48Inputs += 'Braden Risk : Orta risk'
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.BKI < 18){
            taniValidInputs.tani48Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
        if(form1_beslenme.BKI > 35){
            taniValidInputs.tani48Inputs += '/BKI : ' + form1_beslenme.BKI + ' yerde ';
        }
    }
    if(form10){
        if(form10.heartrate_nature === "Zayıf"){
            taniValidInputs.tani48Inputs += '/Kalp Atışı Doğası : Zayıf ';
        }
    }
    if(vucudutemizform1){
        if(vucudutemizform1.capillaryFillingProblem !== "Yok"){
            taniValidInputs.tani48Inputs += '/Kapiller Dolum Problemi : ' + vucudutemizform1.capillaryFillingProblem + ' yerde ';
        }
        if(vucudutemizform1.skinMoisture === "Kuru"){
            taniValidInputs.tani48Inputs += '/Cilt Nemi : Kuru ';
        }
    }
    if(form8){
        if(form8.edema_severity === "1"){
            taniValidInputs.tani48Inputs += '/Ödem Şiddeti : 1 ';
        }
        if(form8.edema_severity === "2"){
            taniValidInputs.tani48Inputs += '/Ödem Şiddeti : 2 ';
        }
        if(form8.edema_severity === "3"){
            taniValidInputs.tani48Inputs += '/Ödem Şiddeti : 3 ';
        }
        if(form8.edema_severity === "4"){
            taniValidInputs.tani48Inputs += '/Ödem Şiddeti : 4 ';
        }
    }
    if(form1_beslenme){
        if(form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')){
            taniValidInputs.tani48Inputs += '/Ağız Mukoza Problemi : Kuruluk ';
        }
    }
  taniString += 'tani48/';
}

if (
  (ozgecmisform1 ? ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') : false) ||
  (form5 ? form5.verbal_response_points === 4 : false) ||
  (ozgecmisform1 ? ozgecmisform1.allergies === "Var" : false) ||
  (solunumgereksinimi_form1 != undefined ? solunumgereksinimi_form1.airwayMethod === "Endotrakeal Tüp" : false)
) {
    if(ozgecmisform1){
        if(ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye')){
            taniValidInputs.tani49Inputs += 'Yardımcı Araç : Tekerlekli Sandalye ';
        }
        if(ozgecmisform1.allergies === "Var"){
            taniValidInputs.tani49Inputs += '/Alerji : Var ';
        }
    }
    if(form5){
        if(form5.verbal_response_points === 4){
            taniValidInputs.tani49Inputs += '/Bilinç Durumu : 4 ';
        }
    }
    if(solunumgereksinimi_form1){
        if(solunumgereksinimi_form1.airwayMethod === "Endotrakeal Tüp"){
            taniValidInputs.tani49Inputs += '/Hava Yolu Yöntemi : Trakeostomi ';
        }
    }
  taniString += 'tani49/';
}

var taniNames = {
    'tani1': 'Gaz değişiminde bozulma',
    'tani2': 'Etkisiz solunum örüntüsü',
    'tani3': 'Etkisiz hava yolu temizliği',
    'tani4': 'Sıvı volüm eksikliği',
    'tani5': 'Sıvı volüm fazlalığı',
    'tani6': 'Etkisiz periferik doku perfüzyonu',
    'tani7': 'Akut ağrı',
    'tani8': 'Kronik ağrı',
    'tani9': 'İdrar boşaltımında bozulma',
    'tani10': 'İshal',
    'tani11': 'Konstipasyon',
    'tani12': 'Dengesiz beslenme: Beden gereksiniminden az beslenme',
    'tani13': 'Fazla kilo',
    'tani14': 'Obezite',
    'tani15': 'Oral mukoz membranda bozulma',
    'tani16': 'Uyku örüntüsünde bozulma',
    'tani17': 'Konforda bozulma',
    'tani18': 'Fiziksel mobilitede bozulma',
    'tani19': 'Aktivite intoleransı',
    'tani20': 'Yorgunluk',
    'tani21': 'Bulantı',
    'tani22': 'Hipertermi',
    'tani23': 'Hipotermi',
    'tani24': 'Banyo yapmada öz bakım yetersizliği',
    'tani25': 'Beslenmede öz bakım yetersizliği',
    'tani26': 'Giyinmede öz bakım yetersizliği',
    'tani27': 'Tuvalet ihtiyacını karşılamada öz bakım yetersizliği',
    'tani28': 'Deri bütünlüğünde bozulma',
    'tani29': 'Doku bütünlüğünde bozulma',
    'tani30': 'Sözel iletişimde bozulma',
    'tani31': 'Umutsuzluk',
    'tani32': 'Boş zaman aktivitelerinde yetersizlik',
    'tani33': 'Etkisiz sağlık yönetimi',
    'tani34': 'Anksiyete',
    'tani35': 'Kanama riski',
    'tani36': 'Düşme riski',
    'tani37': 'Enfeksiyon riski',
    'tani38': 'Aspirasyon riski',
    'tani39': 'Travma riski',
    'tani40': 'Oral mükoz membranda bozulma riski',
    'tani41': 'Elektrolit dengesizliği riski',
    'tani42': 'Sıvı volüm eksikliği riski',
    'tani43': 'Alerjik yanıt riski',
    'tani44': 'Vücut sıcaklığında dengesizlik riski',
    'tani45': 'Kan şekeri düzeyinde dengesizlik riski',
    'tani46': 'Gastrointestinal motilitede bozulma riski',
    'tani47': 'Deri bütünlüğünde bozulma riski',
    'tani48': 'Doku bütünlüğünde bozulma riski',
    'tani49': 'Göz kuruluğu riski',
};

taniString.split('/').forEach(function(item) {
  if (item.trim() !== '') { // Check if item is not empty
    var row = $('<tr></tr>');
    var cell = $('<td colspan=2></td>').append(
      $('<div></div>').addClass('mt-3 entered-forms align-items-center').append(
        $('<a></a>').addClass('nav-items review btn btn-success w-50 p-3').attr({
          style: 'color: white;',
          href: "<?php echo $base_url; ?>/tanılar/" + item + ".php?patient_id=" + patient_id + "&patient_name=" + patient_name + "&taniValidInputs=" + taniValidInputs[item + 'Inputs']  + "&root_id=0&parent_id=0",
        }).text(taniNames[item])
      )
    );
    row.append(cell);
    $('#dataTable tbody').append(row);
  }
});
</script>
</body>

</html>