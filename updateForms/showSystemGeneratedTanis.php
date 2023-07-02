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
$sql = "SELECT * FROM bosaltimform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $bosaltimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $bosaltimform1 = $bosaltimform1[count($bosaltimform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM solunumgereksinimi_form1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $solunumgereksinimi_form1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $solunumgereksinimi_form1 = $solunumgereksinimi_form1[count($solunumgereksinimi_form1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM calismaform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $calismaform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $calismaform1 = $calismaform1[count($calismaform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM egitimform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $egitimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $egitimform1 = $egitimform1[count($egitimform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form1_beslenme";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form1_beslenme = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form1_beslenme = $form1_beslenme[count($form1_beslenme) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form2";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form2 = $form2[count($form2) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form3";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form3 = $form3[count($form3) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form4";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form4 = $form4[count($form4) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form5";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form5 = $form5[count($form5) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form6";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form6 = $form6[count($form6) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form7";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form7 = $form7[count($form7) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form8";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form8 = $form8[count($form8) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form9";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form9 = $form9[count($form9) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form10";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form10 = $form10[count($form10) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form11";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form11 = $form11[count($form11) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form12";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form12 = $form12[count($form12) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form13";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form13 = $form13[count($form13) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form14";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form14 = $form14[count($form14) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM form15";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $form15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $form15 = $form15[count($form15) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM hareketform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $hareketform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $hareketform1 = $hareketform1[count($hareketform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM ilestimform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $ilestimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $ilestimform1 = $ilestimform1[count($ilestimform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM katererform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $katererform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $katererform1 = $katererform1[count($katererform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM ozgecmisform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $ozgecmisform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $ozgecmisform1 = $ozgecmisform1[count($ozgecmisform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM uyukuform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $uyukuform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $uyukuform1 = $uyukuform1[count($uyukuform1) - 1];
} else {
    echo 'error';
}
$sql = "SELECT * FROM vucudutemizform1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();

if ($result) {
    $vucudutemizform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    $vucudutemizform1 = $vucudutemizform1[count($vucudutemizform1) - 1];
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
                    <p style="color : #333333; font-size: 20px" class="pb-2">Tani list</p>

                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Tani Ad/numara göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <thead>
                            <tr class="darkcyan table-head">
                                <th scope="col" style="font-weight : bold; font-size: large;"></th>
                            </tr>
                          
                           </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
       
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
                    $("#content").load(url);
                });
            });

            
        </script>
                    <script>
          var input = document.getElementById("searchInput");
var table = document.getElementById("dataTable");

input.addEventListener("input", function() {
  var filter = input.value.toLowerCase().trim();

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
    var form2 = <?php echo json_encode($form2); ?>;
    var form3 = <?php echo json_encode($form3); ?>;
    var form4 = <?php echo json_encode($form4); ?>;
    var form5 = <?php echo json_encode($form5); ?>;
    var form6 = <?php echo json_encode($form6); ?>;
    var form7 = <?php echo json_encode($form7); ?>;
    var form8 = <?php echo json_encode($form8); ?>;
    var form9 = <?php echo json_encode($form9); ?>;
    var form10 = <?php echo json_encode($form10); ?>;
    var form11 = <?php echo json_encode($form11); ?>;
    var form12 = <?php echo json_encode($form12); ?>;
    var form13 = <?php echo json_encode($form13); ?>;
    var form14 = <?php echo json_encode($form14); ?>;
    var form15 = <?php echo json_encode($form15); ?>;
    var bosaltimform1 = <?php echo json_encode($bosaltimform1); ?>;
    var calismaform1 = <?php echo json_encode($calismaform1); ?>;
    var egitimform1 = <?php echo json_encode($egitimform1); ?>;
    var form1_beslenme = <?php echo json_encode($form1_beslenme); ?>;
    var hareketform1 = <?php echo json_encode($hareketform1); ?>;
    var ilestimform1 = <?php echo json_encode($ilestimform1); ?>;
    var katererform1 = <?php echo json_encode($katererform1); ?>;
    var ozgecmisform1 = <?php echo json_encode($ozgecmisform1); ?>;
    var uyukuform1 = <?php echo json_encode($uyukuform1); ?>;
    var vucudutemizform1 = <?php echo json_encode($vucudutemizform1); ?>;
    var solunumgereksinimi_form1 = <?php echo json_encode($solunumgereksinimi_form1); ?>;
    var taniArray = [];
    console.log(typeof(solunumgereksinimi_form1.breathingProblems));
    //tani 1 matching
     if(form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.heart_rate > 100 || form10.o2_status === 'Aliyor' || 
     JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') ||  JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hipoventilasyon')
     || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Bradipne') || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel' || vucudutemizform1.nailStructureProblem.split('/').includes('Çomaklaşma')){
            taniArray.push('tani1');
     }

     if(form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel'
    || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') ||  JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hipoventilasyon') || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hiperventilasyon')
    || solunumgereksinimi_form1.GogusHareketleri === 'Var' || solunumgereksinimi_form1.Krepitasyon_Alani !== '' || solunumgereksinimi_form1.Hassasiyet !== '' || solunumgereksinimi_form1.Kitle_Ozelligi !== '' || hareketform1.movementProblem.split('/').includes('Anksiyete')
     ){
        taniArray.push('tani2')
     }

     if(form10.respiratory_rate < 16 || form10.respiratory_rate > 20
    || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Siyanoz') 
    ||  JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hipoventilasyon') || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hiperventilasyon')
    || solunumgereksinimi_form1.airwayMethod === 'Trakeostomi' || solunumgereksinimi_form1.airwayMethod === 'Endotrakeal tüp' || solunumgereksinimi_form1.BalgamType === 'Etkisiz balgam' || solunumgereksinimi_form1.Balgam === 'Var' || solunumgereksinimi_form1.coughOption === 'Etkisiz'
     ){
        taniArray.push('tani3')
     }

     if(form10.blood_pressure < 100 || form10.heart_rate > 100 || form10.heartrate_nature === 'Zayıf' || vucudutemizform1.skinAge === 'Zayıf' || bosaltimform1.IdrarRengi === 'Koyu sarı' || vucudutemizform1.skinMoisture === 'Kuru' || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruma') || ((form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)-(form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)) > 0
        || form5.total > 3){
        taniArray.push('tani4')
     }
     if(form10.blood_pressure > 139 || form10.heartrate_nature === 'Dolgun'
    || hareketform1.movementProblem.split('/').includes('Anksiyete') || ((form11.aldigi_total1 + form11.aldigi_total2 + form11.aldigi_total3 + form11.aldigi_total4)- (form11.cikardigi_total1 + form11.cikardigi_total2 + form11.cikardigi_total3 + form11.cikardigi_total4)) > 0
    || form8.edema_severity > 1 ){
        taniArray.push('tani5')
     }

     if(form10.heartrate_location !== 'Periferik' || form10.respiratory_nature === 'Zayıf'
     || vucudutemizform1.capillaryFillingProblem > 3 || form2.pain_intensity !== '1-2. Çok Az' || form2.pain_location === 'İdrar yaparken' || form2.pain_character === 'Yanıcı' 
     || vucudutemizform1.nailColorProblem.split('/').includes('Soluk beyaz ') || vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik') || vucudutemizform1.nailColorProblem.split('/').includes('Sarı')
     ){
        taniArray.push('tani6')
     }

     if(form2.pain_intensity !== '1-2. Çok Az' || form2.pain_location !=='' || form2.pain_frequency !=='' || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character !== ''
     || form10.heart_rate > 100 || form10.blood_pressure > 139 || form10.respiratory_rate > 20 || form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')
     ){
        taniArray.push('tani7')
     }

     if(form2.pain_intensity !== '1-2. Çok Az' || form2.pain_location !=='' || form2.pain_frequency !=='' || form2.pain_duration === '6 Aydan Fazla' || form2.pain_character !== '' || form2.pain_increase_factors !=='' || form2.pain_decrease_factors !==''
     || hareketform1.movementProblem.split('/').includes('Yorgunluk')
     ){
        taniArray.push('tani8')
     }

     if(form2.pain_intensity !== '1-2. Çok Az' || form2.pain_location === toLowerCase('İdrar yaparken') || form2.pain_character !== ''
        || bosaltimform1.IdrarRengi === 'Açık kırmızı' || bosaltimform1.IdrarRengi === 'Koyu kırmızı' || bosaltimform1.IdrarBerrakligi === 'Bulanık' ||
        JSON.parse(bosaltimform1.excretionIssues).includes('Üriner inkontinans') || JSON.parse(bosaltimform1.excretionIssues).includes('Dizüri') || bosaltimform1.protezlertable === 'Yarı Bağımlı' || bosaltimform1.protezlertable === 'Bağımlı'
        || bosaltimform1.Mesane_kateterizasyonu === 'Var' || bosaltimform1.ureterestomi === 'Var' || bosaltimform1.Sistostomi === 'Var'
     ){
        taniArray.push('tani9')
     }

     if(form2.pain_intensity !== '1-2. Çok Az' || form2.pain_location === toLowerCase('İdrar yaparken') || form2.pain_character !== ''
        || bosaltimform1.bagirsak_sesleri >  10 || bosaltimform1.defekasyon_tekrari > 3 || JSON.parse(bosaltimform1.excretionIssues).includes('Diyare')
     ){
        taniArray.push('tani10')
     }

    var hospitalStoolEmptyingDate = new Date(bosaltimform1.hospitalStoolEmptyingDate);
    var currentDate = new Date();
    var diffDays = Math.ceil(Math.abs(currentDate - hospitalStoolEmptyingDate) / (1000 * 3600 * 24));
     if(bosaltimform1.bagirsak_sesleri <  6 || diffDays > 3 || bosaltimform1.defekasyon_tekrari > 3 || JSON.parse(bosaltimform1.excretionIssues).includes('Konstipasyon') || JSON.parse(bosaltimform1.excretionIssues).includes('Distansiyon') || form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')
     || form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')
     ){
        taniArray.push('tani11')
     }
     
     if(bosaltimform1.bagirsak_sesleri >  10 || form1_beslenme.BKI <  18 || form1_beslenme.food_consumption_var === 'Daha az' ||  form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')
     || form1_beslenme.nutrition_issue_var.split(',').includes('Hazımsızlık') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma') ||  form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık')
       || form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') || form1_beslenme.chewing_difficulty === 'Var'
     ){
        taniArray.push('tani12')
     }

     if(form1_beslenme.BKI >  25 || form1_beslenme.food_consumption_var === 'Daha fazla' || uyukuform1.sleepProblem.split('/').includes('Uyuma Güçlüğü')
      ||  hareketform1.exercisingHabit !== '' 
     ){
        taniArray.push('tani13')
     }
     if(form1_beslenme.BKI >  30 || form1_beslenme.food_consumption_var === 'Daha fazla' 
     ){
        taniArray.push('tani14')
     }

     if(form1_beslenme.tongue_issue_var.split(',').includes('Tat almada değişim') || form1_beslenme.chewing_difficulty === 'Var' || form1_beslenme.lip_color_issue_var.split(',').includes('Soluk') 
        || form1_beslenme.lip_color_issue_var.split(',').includes('Kuru') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon')
        || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kötü koku') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Nodül') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')
        || form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti ödemi') || form1_beslenme.teeth_gums_issue_var.split(',').includes('Apse') || form1_beslenme.teeth_gums_issue_var.split(',').includes('Dişeti kanaması') ||
        vucudutemizform1.mouthCareFreq < 2
     ){
        taniArray.push('tani15')
     }


     if(uyukuform1.averageSleepDuration < 7 || uyukuform1.averageSleepDuration.split('/').includes('Gündüz uykus') || uyukuform1.averageSleepDuration.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.averageSleepDuration.split('/').includes('Uyuma güçlüğü')
    || uyukuform1.averageSleepDuration.split('/').includes('Uykunun bölünmesi') || hareketform1.movementProblem.split('/').includes('Huzursuzluk') || hareketform1.movementProblem.split('/').includes('Yorgunluk')
    || uyukuform1.hospitalFactorsAffectingSleep !== ''
     ){
        taniArray.push('tani16')
     }

     if(uyukuform1.averageSleepDuration < 7 || uyukuform1.averageSleepDuration.split('/').includes('Gündüz uykus') || uyukuform1.averageSleepDuration.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.averageSleepDuration.split('/').includes('Uyuma güçlüğü')
    || uyukuform1.averageSleepDuration.split('/').includes('Uykunun bölünmesi') || hareketform1.movementProblem.split('/').includes('Huzursuzluk') || hareketform1.movementProblem.split('/').includes('Rahatsızlık') || hareketform1.movementProblem.split('/').includes('Kaşıntı')
    || form2.pain_duration === '6 Aydan Fazla' || form2.pain_duration !== '6 Aydan Fazla' || form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı')
     ){
        taniArray.push('tani17')
     }

     if(hareketform1.changingPositionDependence === 'Yarı bağımlı' || hareketform1.changingPositionDependence === 'Bağımlı' ||
     hareketform1.walkingDependence === 'Yarı bağımlı' || hareketform1.walkingDependence === 'Bağımlı' ||  hareketform1.standingUpDependence === 'Yarı bağımlı' || hareketform1.standingUpDependence === 'Bağımlı' ||
      hareketform1.wearingClothesDependence === 'Yarı bağımlı' || hareketform1.wearingClothesDependence === 'Bağımlı' || vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı' || vucudutemizform1.bodyCleansingDependence === 'Bağımlı'
      || ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') || ozgecmisform1.aidTools.split('/').includes('Baston') || ozgecmisform1.aidTools.split('/').includes('Yürüteç') || ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi')
      || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne')
     ){
        taniArray.push('tani18')
     }

     if(JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') || form10.blood_pressure > 139 || form10.heart_rate > 100 || hareketform1.movementProblem.split('/').includes('Yorgunluk')
     || hareketform1.movementProblem.split('/').includes('Halsizlik')
     ){
        taniArray.push('tani19')
     }
     
     if(uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma')
     || hareketform1.movementProblem.split('/').includes('Yorgunluk') || 
     hareketform1.movementProblem.split('/').includes('Halsizlik')
     ){
        taniArray.push('tani20')
     }
     if(form1_beslenme.nutrition_issue_var.split(',').includes('Bulantı') || form1_beslenme.nutrition_issue_var.split(',').includes('Kusma')
     ||form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık')
     ){
        taniArray.push('tani21')
     }
     if(form10.heart_rate > 100 || form10.respiratory_rate > 24 ||  form10.body_temperature > 38
        || vucudutemizform1.skinTemperature === 'Artış'
     ){
        taniArray.push('tani22')
     }
     if(form10.heart_rate < 50 || form10.respiratory_nature === 'Yüzeyel' || form10.spo2_percentage < 95 || form10.body_temperature < 35 || vucudutemizform1.nailColorProblem.split('/').includes('Siyanotik')
     || form10.blood_pressure > 139 || vucudutemizform1.capillaryFillingProblem > 3
     ){
        taniArray.push('tani23')
     }
     
     
     
     var bathDate = new Date(vucudutemizform1.bathDate);
    var currentDate = new Date();
    var diffDays = Math.ceil(Math.abs(currentDate - bathDate) / (1000 * 3600 * 24));
     if(diffDays > 3 || vucudutemizform1.bodyCleansingDependence === 'Yarı bağımlı' || vucudutemizform1.bodyCleansingDependence === 'Bağımlı' || vucudutemizform1.bodyHairStructure.split('/').includes('Yağlı')  
     ||  vucudutemizform1.scalpHairProblem.split('/').includes('Yağlanma') || vucudutemizform1.bathingFrequency < 2 
     ){
        taniArray.push('tani24')
     }

     if (form1_beslenme.cignemeRadio == "Var" || form1_beslenme.nutritional_needs == "Yarı Bağımlı" || form1_beslenme.nutritional_needs == "Bağımlı"
            || form1_beslenme.food_consumption_var == "Daha Az" || form1_beslenme.diet_eating_process == "Sonda ile") {
                  taniArray.push("tani25");
            }

            if (hareketform1.wearingClothesDependence == "Yarı Bağımlı" || hareketform1.wearingClothesDependence == "Bağımlı" || hareketform1.movementProblem.split('/').includes("Yorgunluk")) {
                  taniArray.push("tani26");
            }

            if (bosaltimform1.stoolEmptyingHelp == "Yarı Bağımlı" || bosaltimform1.stoolEmptyingHelp == "Bağımlı" || bosaltimform1.protezlertable2 == "Yarı Bağımlı"
            || bosaltimform1.protezlertable2 == "Bağımlı" || hareketform1.standingUpDependence == "Bağımlı" || hareketform1.wearingClothesDependence == "Yarı Bağımlı" ||
            hareketform1.wearingClothesDependence == "Bağımlı" || vucudutemizform1.bodyCleansingDependence == "Yarı bağımlı" || vucudutemizform1.bodyCleansingDependence == "Bağımlı" 
            || JSON.parse(bosaltimform1.excretionProblems).includes("Fekal") || JSON.parse(bosaltimform1.excretionIssues).includes("Üriner inkontinans")) {
                  taniArray.push("tani27");
            }

            if (form7.stage == "Evre I" || form7.stage == "Evre II" || katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren" 
            || vucudutemizform1.skinMoisture == "Var"){
                    taniArray.push("tani28");
            }

            if (form7.stage == "Evre III" || form7.stage == "Evre IV" || form7.stage == "Evrelendirilemeyen" || form7.stage == "Derin doku hasarı"
            || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon')){
                    taniArray.push("tani29");
            }

            if (JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') || ilestimform1.communicationProblem != "Yok"
            || ilestimform1.contactingStaffTrouble != "Yok" || solunumgereksinimi_form1.airwayMethod == "Trakeostomi" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp"){
                    taniArray.push("tani30");
            }

            if (form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') || form1_beslenme.nutrition_issue_var.split(',').includes('İsteksiz')
            || ilestimform1.treatmentAcceptance == "Kabul etmiyor" || uyukuform1.sleepProblem.split('/').includes('Gündüz uykus')
            || uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')
            || uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') || ilestimform1.reachTrouble != "Yok" || ilestimform1.companion == "Yok" 
            || calismaform1.workStatus == "Çalışmıyor"){
                    taniArray.push("tani31");
            }


            if (uyukuform1.sleepProblem.split('/').includes('Gündüz uykus') || calismaform1.hobbies == "Yok" || hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                    taniArray.push("tani32"); // add patient age
            }            
            if (ilestimform1.treatmentAcceptance !== "") {
                    taniArray.push("tani33");
            }

            
            if (hareketform1.movementProblem.split('/').includes('Huzursuzluk') || hareketform1.movementProblem.split('/').includes('Yorgunluk')
            || hareketform1.movementProblem.split('/').includes('Anksiyete') || uyukuform1.averageSleepDuration < 7 || uyukuform1.sleepProblem.split('/').includes('Gündüz uykus')
            || uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')
            || uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')) {
                    taniArray.push("tani34");
            }


            if (form3.total >= 5 || ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') || ozgecmisform1.aidTools.split('/').includes('Baston')
            || ozgecmisform1.aidTools.split('/').includes('Yurutec') || ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi')){
                taniArray.push("tani36");
            }

            if (katererform1.katererType == "Periferik venöz kateter" || katererform1.katererType == "Santral venöz  kateter" || katererform1.katererType == "Dren"
            || katererform1.katererType == "Diğer" || bosaltimform1.Mesane_kateterizasyonu == "Var" || ozgecmisform1.smoking != "Yok" || ozgecmisform1.arrivalFromInput == "DM"
            || form1_beslenme.BKI > 30){
                taniArray.push("tani37");
            }

            if (bosaltimform1.bagirsak_sesleri < 6 || form1_beslenme.chewing_difficulty == "Var" || form1_beslenme.gastric_residue == "Var"
            || solunumgereksinimi_form1.CoughOption == "Ektisiz" || form1_beslenme.diet_eating_process == "Sonda ile" || solunumgereksinimi_form1.airwayMethod == "Trakeostomi"
            || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp" || form1_beslenme.nazogastrik_decompression_radio == "Var"
            || JSON.parse(bosaltimform1.excretionProblems).includes('Distansyon') || JSON.parse(bosaltimform1.excretionProblems).includes('Dışkı')){
                taniArray.push("tani38");
            }

            if (form1_beslenme.BKI < 18 || ozgecmisform1.aidTools.split('/').includes('Gozluk') || form5.verbal_response_points == 4 
            || (form5.total >= 3 && form5.total <= 13)){
                taniArray.push("tani39");
            }

            if (vucudutemizform1.mouthCareFreq < 2 || ozgecmisform1.smoking != "Yok" || ozgecmisform1.alcoholUsage == "Alkol" 
            || form1_beslenme.lip_color_issue_var.split(',').includes('Kuru') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')
            || form1_beslenme.food_consumption_var == "Daha Az" || form1_beslenme.diet_eating_process == "Parenteral" || form1_beslenme.diet_eating_process == "Sonda ile"
            || JSON.parse(solunumgereksinimi_form1.aspirationNeeds).includes('Oro_Nazofarengeal')){
                taniArray.push("tani40");
            }

            if (JSON.parse(bosaltimform1.excretionProblems).includes('Diare') || bosaltimform1.bagirsak_sesleri > 10 || bosaltimform1.hospitalStoolEmptyingFrequency > 3
            || form1_beslenme.nutrition_issue_var.split('/').includes('Kusma') || form8.edema_severity == "1" || form8.edema_severity == "2" 
            || form8.edema_severity == "3" || form8.edema_severity == "4"){
                taniArray.push("tani41");
            }

            if (JSON.parse(bosaltimform1.excretionProblems).includes('Diare') || form1_beslenme.nutrition_issue_var.split('/').includes('Kusma')
            || form1_beslenme.liquid_consumption < 1000 || katererform1.katererType == "Dren" || form1_beslenme.BKI > 30) {
                taniArray.push("tani42");
            }

            if (ozgecmisform1.allergies == "Var" || ozgecmisform1.transfusionReaction != "Yok" || ozgecmisform1.kolbandi == "Kırmızı"
            || ozgecmisform1.arrivalFromInput == "Astım"){
                taniArray.push("tani43");
            }

            if (form1_beslenme.BKI > 30 || form10.spo2_percentage < 95 || form1_beslenme.liquid_consumption < 1000 || bosaltimform1.IdrarRengi == "Koyu sarı"
            || form10.blood_pressure < 100 || form10.heart_rate > 100 || vucudutemizform1.skinAge == "Zayıf" || form5.verbal_response_points == 4 
            || (form5.total >= 3 && form5.total <= 13)){
                taniArray.push("tani44");
            }

            if (ilestimform1.treatmentAcceptance == "Kabul etmiyor" || hareketform1.exercisingHabitInput == "Yok" 
            || ozgecmisform1.arrivalFromInput == "DM" || form1_beslenme.food_consumption_var == "Daha Az") {
                taniArray.push("tani45");
            }
            var defekasyonZamani = bosaltimform1.defekasyon_zamani;
            var diffTime = currentDate.getTime() - (defekasyonZamani * 24 * 60 * 60 * 1000); 
            var dayDiff = Math.floor(diffTime / (24 * 60 * 60 * 1000)); 

            if (dayDiff > 2 || form1_beslenme.nutrition_issue_var == "Hazımsızlık" || form1_beslenme.food_consumption_var == "Daha Az"
            || form1_beslenme.diet_eating_process == "Parenteral" || form1_beslenme.diet_eating_process == "Sonda ile" 
            || hareketform1.changingPositionDependence == "Yarı Bağımlı" || hareketform1.changingPositionDependence == "Bağımlı"
            || hareketform1.movementProblem.split('/').includes('Anksiyete') || hareketform1.exercisingHabit == "Hayir"){
                taniArray.push("tani46");
            }

            if (form6.total <= 14 || form1_beslenme.BKI < 18 || form1_beslenme.BKI > 35 || vucudutemizform1.skinColorProblem == "Soluk"
            || vucudutemizform1.skinColorProblem == "Kızarıklık" || vucudutemizform1.skinColorProblem == "Pigmentasyon artışı"
            || vucudutemizform1.skinAge == "Zayıf" || form10.body_temperature > 38 || form10.body_temperature < 35 
            || form1_beslenme.nutritional_needs == "Yarı Bağımlı" || form1_beslenme.nutritional_needs == "Bağımlı"
            || hareketform1.changingPositionDependence == "Yarı Bağımlı" || hareketform1.changingPositionDependence == "Bağımlı"){
                taniArray.push("tani47");
            }

            if (form6.total <= 14 || form1_beslenme.BKI < 18 || form1_beslenme.BKI > 35 || form10.heartrate_nature == "Zayıf"
            || (vucudutemizform1.capillaryFillingProblem != "Yok" && vucudutemizform1.capillaryFillingProblem > 3) 
            ||form8.edema_severity == "1" || form8.edema_severity == "2" || form8.edema_severity == "3" || form8.edema_severity == "4"
            || vucudutemizform1.skinMoisture == "Kuru" || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Kuruluk')
            || ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') || ozgecmisform1.aidTools.split('/').includes('Baston')
            || ozgecmisform1.aidTools.split('/').includes('Yurutec') || ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi')){
                taniArray.push("tani48");
            }

            if (ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') || form5.verbal_response_points == 4
            || ozgecmisform1.allergies == "Var" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp"){
                taniArray.push("tani49");
            }


     










    //  || bosaltimform1.protezlertable === 'Yarı Bağımlı' || bosaltimform1.protezlertable === 'Bağımlı' || bosaltimform1.Mesane_kateterizasyonu === 'Var' || bosaltimform1.ureterestomi === 'Var' || bosaltimform1.Sistostomi === 'Var'

    taniArray.forEach(function(item) {
  console.log(item);
  var row = $('<tr></tr>');
  var cell = $('<td></td>').append(
    $('<div></div>').addClass('mt-3 entered-forms align-items-center').append(
      $('<a></a>').addClass('nav-items review btn btn-success w-50 p-3').attr({
        style: 'color: white;',
        href: "<?php echo $base_url; ?>/tanılar/" + item + ".php?patient_id=" + patient_id + "&patient_name=" + patient_name + "&standalone=true&root_id=null&parent_id=null",
      }).text(item)
    )
  );
  row.append(cell);
  $('#dataTable tbody').append(row);
});
</script>
</body>

</html>