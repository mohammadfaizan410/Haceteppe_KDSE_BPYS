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

                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Form Ad göre ara">
<?php
$i = 1;
$taniData = [];

foreach ($allTanisStandalone as $row) {
    $sql = "SELECT * FROM tani WHERE root_id = " . $row['tani_id'] . " ORDER BY tani_id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();

    if ($result) {
        $allExtensionTanis = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'error';
    }

    $taniOptions = "<div class='row searchable'><div class='col-lg-12 btn btn-success'><li class='entered-forms-ul-li'><a class='nav-items d-sm-flex justify-content-around' style='color: white;'
                        href='" . $base_url . "/taniReview/tani" . $row['tani_num'] . "-review.php?patient_id=" . $row['patient_id'] . "&patient_name=" . $row['patient_name'] . "&evaluation=" . $row['evaluation'] . "&tani_id=".$row['tani_id']."&tani_num=".$row['tani_num']."&root_id=".$row['root_id']."&parent_id=".$row['parent_id']."&display=0'><div>tani" . $row['tani_num'] . " </div><div>Date:".$row['creation_date']."</div><div>Time:".$row['time']."</div></a></li></div></div>";

    foreach ($allExtensionTanis as $row2) {
        $taniOptions .= "<div class='row searchable'><div class='col-lg-12 btn btn-success'><li class='entered-forms-ul-li'><a class='nav-items d-flex justify-content-around' style='color: white;'
                            href='" . $base_url . "/taniReview/tani" . $row2['tani_num'] . "-review.php?patient_id=" . $row2['patient_id'] . "&patient_name=" . $row2['patient_name'] . "&evaluation=" . $row2['evaluation'] . "&tani_id=".$row2['tani_id']."&tani_num=".$row2['tani_num']."&root_id=".$row2['root_id']."&parent_id=".$row2['parent_id']."&display=0'><div>tani" . $row2['tani_num'] . " </div><div>Date:".$row2['creation_date']."</div><div>Time:".$row2['time']."</div></a></li></div></div>";
    }

    if ($allExtensionTanis){
        $lastExtension = end($allExtensionTanis);
    } else {
        $lastExtension = $row;
    }

    $taniData[] = [
        'tani_num' => $row['tani_num'],
        'creation_date' => $lastExtension['creation_date'],
        'time' => $lastExtension['time'],
        'options' => $taniOptions
    ];

    $i++;
}
?>

<div id="taniContainer">
    <?php
    foreach ($taniData as $data) {
        echo '<div class="row">';
        echo "<div class='root-tani col-lg-12'>";
        echo "<button class='entered-forms btn btn-success m-auto align-items-center d-flex justify-content-around' id='tani".$i."_toggle'><div>Tani number: tani" . $data['tani_num'] . "</div><div>Date:".$data['creation_date']."</div><div>Time:".$data['time']."</div><div><span id='tani".$i."_caret'>&#9660;</span></div></button>";
        echo "<ul class='entered-forms-ul btn btn-success align-items-center w-75 mt-3' id='tani".$i."_options' style='display:none; list-style-type: none;'>".$data['options']."</ul>";
        echo "<div class='entered-forms '><a class='nav-items review btn btn-success w-50 mb-4' style='color: #333333; display: none; background-color: white; border-style: dashed; text-align: center;' id='tani".$i."_add_extension' href='" . $base_url . "/taniReview/tani" . $data['tani_num'] . "-review.php?patient_id=" . $lastExtension['patient_id'] . "&patient_name=" . $lastExtension['patient_name'] . "&evaluation=" . $lastExtension['evaluation'] . "&tani_id=".$lastExtension['tani_id']."&tani_num=".$data['tani_num']."&root_id=".$row['tani_id']."&parent_id=".$lastExtension['parent_id']."&display=1'><span class='m-auto'>Add Extension</span></a></div>";
        echo "</div>";
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="col-lg-6" id="tani'.$data['tani_num'].'" style="display: none">';
        echo '</div>';
        echo '</div>';
    }
    ?>
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
                console.log(count);
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
        </script>
<script>
   $("#searchInput").on("input", function() {
    var filter = $(this).val().toUpperCase();
    var tanis = $(".root-tani");

    tanis.each(function() {
        var txtValue = $(this).text().toUpperCase();
        if (txtValue.indexOf(filter) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
</script>
</body>

</html>