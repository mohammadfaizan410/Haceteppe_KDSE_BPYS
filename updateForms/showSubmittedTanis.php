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
                    <p style="color : #333333; font-size: 20px" class="pb-2">Submitted Tanis</p>

                </div>

                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Search by date, number, time">
<div id='taniContainer'>                
                <?php
$i = 1;
foreach ($allTanisStandalone as $row) {
    $sql = "SELECT * FROM tani WHERE root_id = " . $row['tani_id'] . " ORDER BY tani_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $allExtensionTanis = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    $taniOptions = "<li class='entered-forms-ul-li m-auto btn btn-success w-100 mb-2'><a class='nav-items d-sm-flex justify-content-around' style='color: white;'
                        href='" . $base_url . "/taniReview/tani" . $row['tani_num'] . "-review.php?patient_id=" . $row['patient_id'] . "&patient_name=" . $row['patient_name'] . "&evaluation=" . $row['evaluation'] . "&tani_id=".$row['tani_id']."&tani_num=".$row['tani_num']."&root_id=".$row['root_id']."&parent_id=".$row['parent_id']."&display=0'><div>tani" . $row['tani_num'] . " </div><div>Date:".$row['creation_date']."</div><div>Time:".$row['time']."</div></a></li>";


    foreach ($allExtensionTanis as $row2) {
        $taniOptions .= "<li class='entered-forms-ul-li m-auto  btn btn-success w-100 mb-2'><a class='nav-items d-flex justify-content-around' style='color: white;'
                            href='" . $base_url . "/taniReview/tani" . $row2['tani_num'] . "-review.php?patient_id=" . $row2['patient_id'] . "&patient_name=" . $row2['patient_name'] . "&evaluation=" . $row2['evaluation'] . "&tani_id=".$row2['tani_id']."&tani_num=".$row2['tani_num']."&root_id=".$row2['root_id']."&parent_id=".$row2['parent_id']."&display=0'><div>tani" . $row2['tani_num'] . " </div><div>Date:".$row2['creation_date']."</div><div>Time:".$row2['time']."</div></a></li>";
    }

    if ($allExtensionTanis){
        $lastExtension = end($allExtensionTanis);
    } else {
        $lastExtension = $row;
    }
    echo '<div class="row">';
    echo "<div class='root-tani col-lg-12'>";
    echo "<button class='entered-forms btn btn-success m-auto align-items-center d-flex justify-content-around' id='tani".$i."_toggle'><div>Tani number: tani" . $row['tani_num'] . "</div><div>Date:".$lastExtension['creation_date']."</div><div>Time:".$lastExtension['time']."</div><div><span id='tani".$i."_caret'>&#9660;</span></div></button>";
    echo "<ul class='entered-forms-ul align-items-center w-75 m-auto mt-3 justify-content-center' id='tani".$i."_options' style='display:none; list-style-type: none;'>".$taniOptions."</ul>";
    if (($lastExtension['noc_indicator_after_3'] != "null" && $lastExtension['noc_indicator_after_3'] != "5") || ($lastExtension['noc_indicator_after_2'] != "null" && $lastExtension['noc_indicator_after_2'] != "5")
    || $lastExtension['noc_indicator_after'] != "5"){
        echo "<div class='entered-forms '><a class='nav-items review btn btn-success w-50 mb-4' style='color: #333333; display: none; background-color: white; border-style: dashed; text-align: center;' id='tani".$i."_add_extension' href='" . $base_url . "/taniReview/tani" . $lastExtension['tani_num'] . "-review.php?patient_id=" . $lastExtension['patient_id'] . "&patient_name=" . $lastExtension['patient_name'] . "&evaluation=" . $lastExtension['evaluation'] . "&tani_id=".$lastExtension['tani_id']."&tani_num=".$lastExtension['tani_num']."&root_id=".$row['tani_id']."&parent_id=".$lastExtension['parent_id']."&display=1'><span class='m-auto'>Add Extension</span></a></div>";
    }else{
        echo "<div class='entered-forms '></div>";
   
    }
    echo "</div>";
    echo '</div>';
  
    $i++;
}


$j = 1;
foreach ($boshTanis as $boshTani){
    $sql = "SELECT * FROM boshtani WHERE root_id = " . $boshTani['tani_id'] . " ORDER BY tani_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $allExtensionTanis = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }
    $taniOptions = "<div class='row searchable'><div class='col-lg-12 btn btn-success'><li class='entered-forms-ul-li'><a class='nav-items d-sm-flex justify-content-around' style='color: white;'
                        href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $boshTani['patient_id'] . "&patient_name=" . $boshTani['patient_name'] . "&tani_id=".$boshTani['tani_id']."&root_id=".$boshTani['root_id']."&tani_num=".$boshTani['tani_num']."&parent_id=".$boshTani['parent_id']."&display=0'><div>boshtani" . $j . " </div><div>Date:".$boshTani['creation_date']."</div><div>Time:".$boshTani['time']."</div></a></li></div></div>";


    foreach ($allExtensionTanis as $row2) {
        $taniOptions .= "<div class='row searchable'><div class='col-lg-12 btn btn-success'><li class='entered-forms-ul-li'><a class='nav-items d-flex justify-content-around' style='color: white;'
                            href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $row2['patient_id'] . "&patient_name=" . $row2['patient_name'] . "&tani_id=".$row2['tani_id']."&root_id=".$row2['root_id']."&tani_num=".$boshTani['tani_num']."&parent_id=".$row2['parent_id']."&display=0'><div>bosh tani" . $j . " </div><div>Date:".$row2['creation_date']."</div><div>Time:".$row2['time']."</div></a></li></div></div>";
    }

    if ($allExtensionTanis){
        $lastExtension = end($allExtensionTanis);
    } else {
        $lastExtension = $boshTani;
    }
    echo '<div class="row">';
    echo "<div class='root-tani col-lg-12'>";
    echo "<button class='entered-forms btn btn-success m-auto align-items-center d-flex justify-content-around' id='boshtani".$j."_toggle'><div>Tani number: boş tani " . $j . "</div><div>Date:".$boshTani['creation_date']."</div><div>Time:".$boshTani['time']."</div><div><span id='boshtani".$j."_caret'>&#9660;</span></div></button>";
    echo "<ul class='entered-forms-ul btn btn-success align-items-center w-75 mt-3' id='boshtani".$j."_options' style='display:none; list-style-type: none;'>".$taniOptions."</ul>";
    echo "<div class='entered-forms '><a class='nav-items review btn btn-success w-50 mb-4' style='color: #333333; display: none; background-color: white; border-style: dashed; text-align: center;' id='boshtani".$j."_add_extension' href='" . $base_url . "/taniReview/bosh-review.php?patient_id=" . $lastExtension['patient_id'] . "&patient_name=" . $lastExtension['patient_name'] . "&tani_id=".$lastExtension['tani_id']."&root_id=".$lastExtension['tani_id']."&tani_num=".$lastExtension['tani_num']."&parent_id=".$lastExtension['parent_id']."&display=1'><span class='m-auto'>Add Extension</span></a></div>";
    echo "</div>";
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col-lg-6" id="tani'.$boshTani['tani_id'].'" style="display: none">';
    echo '</div>';
    echo '</div>';
    $j++;
}
?>
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
                    e.preventDefault();
                    var url =
                        "<?php echo $base_url; ?>/updateForms/taniOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                });
            });   
        </script>
        <script>
            $(function(){
                count = <?php echo $count; ?>;
                for (let i = 1; i < count + 1; i++) {
                    $("button#tani"+i+"_toggle").on("click", function(e) {
                        e.preventDefault();
                        $("#tani"+i+"_options").slideToggle('slow');
                        $("#tani"+i+"_add_extension").css('display','flex');
                        if($("#tani"+i+"_caret").css("transform") === "none"){
                            $("#tani"+i+"_caret").css("transform", "rotate(180deg)");
                            
                        }
                        else{
                            $("#tani"+i+"_caret").css("transform", "");
                            $("#tani"+i+"_add_extension").css('display','none');
                        }
                    })
                }
            })
            $(function(){
                countBosh = <?php echo $countBosh; ?>;
                for (let j = 1; j < countBosh + 1; j++) {
                    $("button#boshtani"+j+"_toggle").on("click", function(e) {
                        e.preventDefault();
                        $("#boshtani"+j+"_options").slideToggle('slow');
                        $("#boshtani"+j+"_add_extension").css('display','flex');
                        if($("#boshtani"+j+"_caret").css("transform") === "none"){
                            $("#boshtani"+j+"_caret").css("transform", "rotate(180deg)");
                            
                        }
                        else{
                            $("#boshtani"+j+"_caret").css("transform", "");
                            $("#boshtani"+j+"_add_extension").css('display','none');
                        }
                    })
                }
            })
            $(document).ready(function() {
    $("#searchInput").on("input", function() {
        var input, filter, container, tanis, i, txtValue;
        input = $(this);
        filter = input.val().toUpperCase();
        container = $("#taniContainer");
        tanis = container.find(".root-tani");
        for (i = 0; i < tanis.length; i++) {
            txtValue = $(tanis[i]).text();
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                $(tanis[i]).show();
            } else {
                $(tanis[i]).hide();
            }
        }
    });
});
        </script>

</body>

</html>