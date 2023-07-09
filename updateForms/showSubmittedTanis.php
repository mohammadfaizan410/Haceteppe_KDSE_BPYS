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

$taniNames = array(
    1 => 'Gaz değişiminde bozulma',
    2 => 'Etkisiz solunum örüntüsü',
    3 => 'Etkisiz hava yolu temizliği ',
    4 => 'Sıvı volüm eksikliği',
    5 => 'Sıvı volüm fazlalığı',
    6 => 'Etkisiz periferik doku perfüzyonu',
    7 => 'Akut ağrı',
    8 => 'Kronik ağrı',
    9 => 'İdrar boşaltımında bozulma',
    10 => 'İshal',
    11 => 'Konstipasyon',
    12 => 'Dengesiz beslenme: Beden gereksiniminden az beslenme',
    13 => 'Fazla kilo',
    14 => 'Obezite',
    15 => 'Oral mukoz membranda bozulma',
    16 => 'Uyku örüntüsünde bozulma',
    17 => 'Konforda bozulma',
    18 => 'Fiziksel mobilitede bozulma',
    19 => 'Aktivite intoleransı',
    20 => 'Yorgunluk',
    21 => 'Bulantı',
    22 => 'Hipertermi',
    23 => 'Hipotermi',
    24 => 'Banyo yapmada öz bakım yetersizliği',
    25 => 'Beslenmede öz bakım yetersizliği',
    26 => 'Beslenmede öz bakım yetersizliği',
    27 => 'Giyinmede öz bakım yetersizliği',
    28 => 'Tuvalet ihtiyacını karşılamada öz bakım yetersizliği',
    29 => 'Deri bütünlüğünde bozulma',
    30 => 'Doku bütünlüğünde bozulma',
    31 => 'Sözel iletişimde bozulma',
    32 => 'Umutsuzluk',
    33 => 'Boş zaman aktivitelerinde yetersizlik',
    34 => 'Etkisiz sağlık yönetimi',
    35 => 'Anksiyete',
    36 => 'Kanama riski',
    37 => 'Düşme riski',
    38 => 'Enfeksiyon riski',
    39 => 'Aspirasyon riski',
    40 => 'Travma riski',
    41 => 'Oral mükoz membranda bozulma riski',
    42 => 'Elektrolit dengesizliği riski',
    43 => 'Sıvı volüm eksikliği riski',
    44 => 'Alerjik yanıt riski',
    45 => 'Vücut sıcaklığında dengesizlik riski',
    46 => 'Kan şekeri düzeyinde dengesizlik riski',
    47 => 'Gastrointestinal motilitede bozulma riski',
    48 => 'Deri bütünlüğünde bozulma riski',
    49 => 'Doku bütünlüğünde bozulma riski'
);

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
    <style>
        .entered-forms-ul-li{
                border: 3px solid white;
        }
        </style>
</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        $patientId = $_GET['patient_id'];
        $sql = "SELECT * FROM tani WHERE patient_id = " . $patientId . " and root_id = 0 ORDER BY tani_num";
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $allTanisStandalone = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
            $count = count($allTanisStandalone);
        } else {
            echo 'error';
            $count = 0;
        }
        $patientId = $_GET['patient_id'];
        $sql = "SELECT * FROM boshtani WHERE patient_id = " . $patientId . " and root_id = 0 ORDER BY tani_id";
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $boshTanis = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
            $countBosh = count($boshTanis);
        } else {
            echo 'error';
            $countBosh = 0;
        }
        ?>
        <div class="send-patient">
        <span class='close closeBtn' id='closeBtn1'>&times;</span>
        <p class='form-header'>Sunulan Tanı</p>
    <div class='row mb-5'>
        <div class='col-lg-12' style="font-weight : bold; font-size: large; border-bottom: 2px solid grey ">
        Hasta: <span style='color:black;font-weight : bold; font-size: large;'><?php echo $_GET['patient_name'] ?></span>
            </div>
            
    </div>
                <?php
                $i = 1;
                foreach($allTanisStandalone as $standAloneTani){
                    echo "<div style='border-bottom: 3px solid grey'>";
                    echo "<div class='row mb-3 mt-3 w-100 tani_container ".$i."_container>";
                    echo "<div class='col-lg-10 m-auto'>";
                    echo "<div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='".$i."_toggler'>
                        <span>Tani: ". $taniNames[$standAloneTani['tani_num']]. "</span>
                        <span>Tarih: ". $standAloneTani['creation_date']."</span>
                        <span>Saat: ". $standAloneTani['time']."</span>
                    </div>";
                    echo "</div>";

                    $sql = "SELECT * FROM tani WHERE patient_id = " . $patientId . " and root_id = " . $standAloneTani['tani_id'] . " ORDER BY tani_id ASC";
                    $smtmselect = $db->prepare($sql);
                    $result = $smtmselect->execute();
                    if ($result) {
                        $standAloneExtensions = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo 'error';
                    }

                    if ($standAloneExtensions){
                        $last_extension = end($standAloneExtensions);
                    } else {
                        $last_extension = $standAloneTani;
                    }

                    $taniExtensions = "<div class='row mt-2 w-100 ".$i."_extention_container'  style='display:none'>
                    <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $standAloneTani['tani_num'] . "-review.php?patient_id=" . $standAloneTani['patient_id'] . "&patient_name=" . $standAloneTani['patient_name'] . "&evaluation=" . $standAloneTani['evaluation'] . "&tani_id=".$standAloneTani['tani_id']."&tani_num=".$standAloneTani['tani_num']."&root_id=".$standAloneTani['root_id']."&parent_id=".$standAloneTani['parent_id']."&display=0'>
                    <div class='col-lg-8 m-auto mb-2'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='".$i."_toggler'>
                        <span>Numara: ". $standAloneTani['tani_id']. "</span>
                        <span>Tarih: ". $standAloneTani['creation_date']."</span>
                        <span>Saat: ". $standAloneTani['time']."</span>
                        </div>
                        </div>
                        </a>
                        </div>";

                    foreach($standAloneExtensions as $singleExtension){
                        $taniExtensions .= "<div class='row mt-2 w-100 ".$i ."_extention_container'  style='display:none'>
                        <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $singleExtension['tani_num'] . "-review.php?patient_id=" . $singleExtension['patient_id'] . "&patient_name=" . $singleExtension['patient_name'] . "&evaluation=" . $singleExtension['evaluation'] . "&tani_id=".$singleExtension['tani_id']."&tani_num=".$singleExtension['tani_num']."&root_id=".$standAloneTani['tani_id']."&parent_id=".$singleExtension['parent_id']."&display=0'>
                        <div class='col-lg-8 m-auto mb-2'>
                            <div class='btn btn-success w-100 d-flex justify-content-around' 
                            id='".$i ."_toggler'>
                            <span>Numara: ". $singleExtension['tani_id']. "</span>
                            <span>Tarih: ". $singleExtension['creation_date']."</span>
                            <span>Saat: ". $singleExtension['time']."</span>
                            </div>
                            </div>
                            </a>
                            </div>";
                    }

                    echo $taniExtensions;

                    if (($last_extension['noc_indicator_after_3'] != "null" && $last_extension['noc_indicator_after_3'] != "5") || ($last_extension['noc_indicator_after_2'] != "null" && $last_extension['noc_indicator_after_2'] != "5")
                    || $last_extension['noc_indicator_after'] != "5") {
                        echo "<div class='row mt-2 w-100 ".$i ."_extender_container' style='display:none'>
                        <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $last_extension['tani_num'] . "-review.php?patient_id=" . $last_extension['patient_id'] . "&patient_name=" . $last_extension['patient_name'] . "&evaluation=" . $last_extension['evaluation'] . "&tani_id=".$last_extension['tani_id']."&tani_num=".$last_extension['tani_num']."&root_id=".$standAloneTani['tani_id']."&parent_id=".$last_extension['parent_id']."&display=1'>
                        <div class='col-lg-8 m-auto mb-3'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' style='border: 2px dotted black; background-color:white; color : black;'> 
                        <span>Add Extension</span>
                        </div>
                        </div>
                        </a>
                        </div>";
                    } 
                
                    echo "</div>";
                    $i++;

                }
                $j = 1;
                foreach($boshTanis as $boshTani){
                    echo "<div style='border-bottom: 3px solid grey'>";
                    echo "<div class='row mb-3 mt-3 w-100 boshtani_container bosh".$j."_container>";
                    echo "<div class='col-lg-10 m-auto'>";
                    echo "<div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='bosh".$j."_toggler'>
                        <span>Bosh Tani Numara: ". $j. "</span>
                        <span>Tarih: ". $boshTani['creation_date']."</span>
                        <span>Saat: ". $boshTani['time']."</span>
                    </div>";
                    echo "</div>";

                    $sql = "SELECT * FROM boshtani WHERE patient_id = " . $patientId . " and root_id = " . $boshTani['tani_id'] . " ORDER BY tani_id ASC";
                    $smtmselect = $db->prepare($sql);
                    $result = $smtmselect->execute();
                    if ($result) {
                        $standAloneExtensions = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo 'error';
                    }

                    if ($standAloneExtensions){
                        $last_extension = end($standAloneExtensions);
                    } else {
                        $last_extension = $boshTani;
                    }

                    $taniExtensions = "<div class='row mt-2 w-100 bosh".$j."_extention_container'  style='display:none'>
                    <a class='boshtani-navigator' href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $boshTani['patient_id'] . "&patient_name=" . $boshTani['patient_name'] . "&tani_id=".$boshTani['tani_id']."&root_id=".$boshTani['root_id']."&display=0'>
                    <div class='col-lg-8 m-auto'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='bosh".$j."_toggler'>
                        <span>Numara: ". $boshTani['tani_id']. "</span>
                        <span>Tarih: ". $boshTani['creation_date']."</span>
                        <span>Saat: ". $boshTani['time']."</span>
                        </div>
                        </div>
                        </a>
                        </div>";
                    echo "<script>console.log('".json_encode($standAloneExtensions)."')</script>";
                    foreach($standAloneExtensions as $singleExtension){
                        $taniExtensions .= "<div class='row mt-2 w-100 bosh".$j ."_extention_container'  style='display:none'>
                        <a class='boshtani-navigator' href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $singleExtension['patient_id'] . "&patient_name=" . $singleExtension['patient_name'] . "&tani_id=".$singleExtension['tani_id']."&root_id=".$boshTani['tani_id']."&display=0'>
                        <div class='col-lg-8 m-auto'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='bosh".$j ."_toggler'>
                        <span>Numara: ". $singleExtension['tani_id']. "</span>
                        <span>Tarih: ". $singleExtension['creation_date']."</span>
                        <span>Saat: ". $singleExtension['time']."</span>
                        </div>
                        </div>
                        </a>
                        </div>";
                    }

                    echo $taniExtensions;

                    echo "<div class='row mt-2 w-100 bosh".$j ."_extender_container' style='display:none'>
                    <a class='boshtani-navigator' href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $last_extension['patient_id'] . "&patient_name=" . $last_extension['patient_name'] . "&tani_id=".$last_extension['tani_id']."&root_id=".$boshTani['tani_id']."&display=1'>
                    <div class='col-lg-8 m-auto mb-3'>
                    <div class='btn btn-success w-100 d-flex justify-content-around' style='border: 2px dotted black; background-color:white; color : black;'> 
                    <span>Add Extension</span>
                    </div>
                    </div>
                    </a>
                    </div>";
                    
                
                    echo "</div>";
                    $j++;

                }
                ?>
    </div>
    </div>
    <script>
   $(".tani_container").click(function (e) { 
    e.preventDefault();
    var tani_id = $(this).attr('class').split(' ')[5].split('_')[0];
    $('.' + tani_id + '_extention_container').toggle('slow');
    $('.' + tani_id + '_extender_container').toggle('slow');
});
$(".tani-navigator").click(function(e){
    e.preventDefault();
    $('#content').load(this.href);
})
$(".boshtani_container").click(function (e) { 
    e.preventDefault();
    var tani_id = $(this).attr('class').split(' ')[5].split('_')[0];
    console.log(tani_id)
    $('.' + tani_id + '_extention_container').toggle('slow');
    $('.' + tani_id + '_extender_container').toggle('slow');
});
$(".boshtani-navigator").click(function(e){
    e.preventDefault();
    $('#content').load(this.href);
})
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
</body>