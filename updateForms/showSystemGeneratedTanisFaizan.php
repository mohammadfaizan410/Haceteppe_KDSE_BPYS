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
                            <tr><td><div class="mt-3 entered-forms align-items-center"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                               href="<?php echo $base_url; ?>/tanılar/tani1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı1</a><div></td><t/r>
                          
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
                        "<?php echo $base_url; ?>/updateForms/formOptions.php?patient_id=" +
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

    //tani 1 matching
     if(form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.heart_rate > 100 || form10.o2_status === 'Aliyor' || 
     JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') ||  JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hipoventilasyon')
     || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Bradipne') || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel' || vucudutemizform1.nailStructureProblem.split('/').includes('Çomaklaşma')){
            taniArray.push('tani1');
     }

     if(form10.respiratory_rate < 16 || form10.respiratory_rate > 20 || form10.respiratory_nature === 'Derin' || form10.respiratory_nature === 'Yüzeyel'
    || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Dispne') ||  JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hipoventilasyon') || JSON.parse(solunumgereksinimi_form1.breathingProblems).includes('Hiperventilasyon')
     )



</script>
</body>

</html>