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
    <div class='row mb-5'>
        <div class='col-lg-5' style="font-weight : bold; font-size: large;">
        Patient:<?php echo $_GET['patient_name'] ?>
            </div>
            
            <div class='col-lg-5' style="font-weight : bold; font-size: large;">
            ID:<?php echo $_GET['patient_id'] ?>
            </div>
    </div>
                <?php
                foreach($allTanisStandalone as $standAloneTani){
                    echo "<div style='border-bottom: 3px solid grey'>";
                    echo "<div class='row mb-3 mt-3 w-100 tani_container ".$standAloneTani['tani_id']."_container>";
                    echo "<div class='col-lg-10 m-auto'>";
                    echo "<div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='".$standAloneTani['tani_id']."_toggler'>
                        <span>Numara: ". $standAloneTani['tani_num']. "</span>
                        <span>Tarih: ". $standAloneTani['creation_date']."</span>
                        <span>Saat: ". $standAloneTani['time']."</span>
                    </div>";
                    echo "</div>";
                   
                    echo "<div class='row mt-2 w-100 ".$standAloneTani['tani_id']."_extention_container'  style='display:none'>
                    <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $standAloneTani['tani_num'] . "-review.php?patient_id=" . $standAloneTani['patient_id'] . "&patient_name=" . $standAloneTani['patient_name'] . "&evaluation=" . $standAloneTani['evaluation'] . "&tani_id=".$standAloneTani['tani_id']."&tani_num=".$standAloneTani['tani_num']."&root_id=".$standAloneTani['root_id']."&parent_id=".$standAloneTani['parent_id']."&display=0'>
                    <div class='col-lg-8 m-auto'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' 
                        id='".$standAloneTani['tani_id']."_toggler'>
                        <span>Numara: ". $standAloneTani['tani_id']. "</span>
                        <span>Tarih: ". $standAloneTani['creation_date']."</span>
                        <span>Saat: ". $standAloneTani['time']."</span>
                        </div>
                        </div>
                        </a>
                        </div>";

                    $sql = "SELECT * FROM tani WHERE patient_id = " . $patientId . " and root_id = " . $standAloneTani['tani_id'] . " ORDER BY tani_id ASC";
                    $smtmselect = $db->prepare($sql);
                    $result = $smtmselect->execute();
                    $standAloneExtensions = [];
                    if ($result) {
                        $standAloneExtensions = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo 'error';
                    }
                    if(count($standAloneExtensions) > 0){
                        $last_extension = end($standAloneExtensions);
                        foreach($standAloneExtensions as $singleExtension){
                            echo $singleExtension['tani_id'];
                            echo "<div class='row mt-2 w-100 ".$standAloneTani['tani_id']."_extention_container'  style='display:none'>
                            <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $singleExtension['tani_num'] . "-review.php?patient_id=" . $singleExtension['patient_id'] . "&patient_name=" . $singleExtension['patient_name'] . "&evaluation=" . $singleExtension['evaluation'] . "&tani_id=".$singleExtension['tani_id']."&tani_num=".$singleExtension['tani_num']."&root_id=".$standAloneTani['root_id']."&parent_id=".$singleExtension['parent_id']."&display=0'>
                            <div class='col-lg-8 m-auto'>
                                <div class='btn btn-success w-100 d-flex justify-content-around' 
                                id='".$singleExtension['tani_id']."_toggler'>
                                <span>Numara: ". $singleExtension['tani_id']. "</span>
                                <span>Tarih: ". $singleExtension['creation_date']."</span>
                                <span>Saat: ". $singleExtension['time']."</span>
                                </div>
                                </div>
                                </a>
                                </div>";
                            }
                              
                        }
                        if (count($standAloneExtensions) == 0) {
                            if ($standAloneTani['noc_indicator_after'] !== '5' && ($standAloneTani['noc_indicator_after_2'] !== '5' || $standAloneTani['noc_indicator_after_2'] === 'null') && ($standAloneTani['noc_indicator_after_3'] !== '5' || $standAloneTani['noc_indicator_after_3'] === 'null')) {
                                echo "<div class='row mt-2 w-100 ".$standAloneTani['tani_id']."_extender_container' style='display:none'>
                                <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $standAloneTani['tani_num'] . "-review.php?patient_id=" . $standAloneTani['patient_id'] . "&patient_name=" . $standAloneTani['patient_name'] . "&evaluation=" . $standAloneTani['evaluation'] . "&tani_id=".$standAloneTani['tani_id']."&tani_num=".$standAloneTani['tani_num']."&root_id=".$standAloneTani['root_id']."&parent_id=".$standAloneTani['parent_id']."&display=1'>
                                <div class='col-lg-8 m-auto mb-3'>
                                <div class='btn btn-success w-100 d-flex justify-content-around' style='border: 2px dotted black; background-color:white; color : black;'> 
                                <span>Add Extension</span>
                                </div>
                                </div>
                                </a>
                                </div>";
                            }
                        }
                        else if($last_extension['noc_indicator_after'] !==5 && ($standAloneTani['noc_indicator_after_2'] !== 5 || $standAloneTani['noc_indicator_after_2'] === 'null') &&  ($standAloneTani['noc_indicator_after_3'] !== 5 || $standAloneTani['noc_indicator_after_3'] === 'null') ){
                        echo $last_extension['tani_id'];
                        echo "<div class='row mt-2 w-100 ".$standAloneTani['tani_id']."_extender_container' style='display:none'>
                        <a class='tani-navigator' href='" . $base_url . "/taniReview/tani" . $last_extension['tani_num'] . "-review.php?patient_id=" . $last_extension['patient_id'] . "&patient_name=" . $last_extension['patient_name'] . "&evaluation=" . $last_extension['evaluation'] . "&tani_id=".$last_extension['tani_id']."&tani_num=".$last_extension['tani_num']."&root_id=".$last_extension['root_id']."&parent_id=".$last_extension['parent_id']."&display=1'>
                        <div class='col-lg-8 m-auto mb-3'>
                        <div class='btn btn-success w-100 d-flex justify-content-around' style='border: 2px dotted black; background-color:white; color : black;'> 
                        <span>Add Extension</span>
                        </div>
                        </div>
                        </a>
                        </div>";
                    }
                    
                    echo "</div>";

                }
                ?>
    </div>
    </div>
    <script>
   $(".tani_container").click(function (e) { 
    e.preventDefault();
    var tani_id = $(this).attr('class').split(' ')[5].split('_')[0];
    console.log(tani_id)
    $('.' + tani_id + '_extention_container').toggle('slow');
    $('.' + tani_id + '_extender_container').toggle('slow');
});
$(".tani-navigator").click(function(e){
    e.preventDefault();
    $('#content').load(this.href);
})
        </script>
</body>