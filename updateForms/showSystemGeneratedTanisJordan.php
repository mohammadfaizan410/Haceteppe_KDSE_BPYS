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
                          <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani2.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı2</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani3.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı3</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani4.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı4</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani5.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı5</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani6.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı6</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani7.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı7</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani8.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı8</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani9.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı9</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color: white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani10.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı10</a>
                            </div></td><t/r>

                            <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani11.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı11</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani12.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı12</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani13.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı13</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani14.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı14</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani15.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı15</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani16.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı16</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani17.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı17</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani18.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı18</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani19.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı19</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani20.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı20</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani21.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı21</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani22.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı22</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani23.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı23</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani24.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı24</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani25.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı25</a>
                            </div></td><t/r>
                            
                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani26.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı26</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani27.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı27</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani28.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı28</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani29.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı29</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani30.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı30</a>
                            </div></td><t/r>
                            
                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani31.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı31</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani32.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı32</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani33.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı33</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani34.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı34</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı35</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani2.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı36</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani3.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı37</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani4.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı38</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani5.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı39</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani6.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı40</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani7.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı41</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani8.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı42</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani9.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı43</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani10.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı44</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani11.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı45</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani12.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı46</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani13.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı47</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani14.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı48</a>
                            </div></td><t/r>

                            <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani15.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>&standalone='true'&root=''&parent=''">Tanı49</a>
                            </div></td><t/r>
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

            if (form1_beslenme.cignemeRadio == "Var" || form1_beslenme.nutritional_needs == "Yarı Bağımlı" || form1_beslenme.nutritional_needs == "Bağımlı"
            || form1_beslenme.food_consumption_var == "Daha Az" || form1_beslenme.diet_eating_process == "Sonda ile") {
                  taniArray.push("tani25");
            }

            if (hareketform1.wearingClothesDependence == "Yarı Bağımlı" || hareketform1.wearingClothesDependence == "Bağımlı" || hareketform1.movementProblemDesc.split('/').includes("Yorgunluk")) {
                  taniArray.push("tani26");
            }

            if (bosaltimform1.stoolEmptyingHelp == "Yarı Bağımlı" || bosaltimform1.stoolEmptyingHelp == "Bağımlı" || bosaltimform1.protezlertable2 == "Yarı Bağımlı"
            || bosaltimform1.protezlertable2 == "Bağımlı" || hareketform1.standingUpDependence == "Bağımlı" || hareketform1.wearingClothesDependence == "Yarı Bağımlı" ||
            hareketform1.wearingClothesDependence == "Bağımlı" || vucudutemizform1.bodyCleansingDependence == "Yarı bağımlı" || vucudutemizform1.bodyCleansingDependence == "Bağımlı" 
            || JSON.parse(bosaltimform1.excretionProblems).includes("Fekal") || JSON.parse(bosaltimform1.excretionIssues).includes("Üriner inkontinans")) {
                  taniArray.push("tani27");
            }

            if (form7.stage == "Evre I" || form7.stage == "Evre II" || katerer.katererType == "Periferik venöz kateter" || katerer.katererType == "Santral venöz  kateter" || katerer.katererType == "Dren" 
            || vucudutemizform1.skinMoisture == "Var"){
                    taniArray.push("tani28");
            }

            if (form7.stage == "Evre III" || form7.stage == "Evre IV" || form7.stage = "Evrelendirilemeyen" || form 7.stage == "Derin doku hasarı"
            || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Ülserasyon') || form1_beslenme.oral_mucosa_issue_var.split(',').includes('Lezyon')){
                    taniArray.push("tani29");
            }

            if (JSON.parse(solunumgereksinimi_form1.breathingProblems).include('Dispne') || ilestimform1.communicationProblem != "Yok"
            || ilestimform1.contactingStaffTrouble != "Yok" || solunumgereksinimi_form1.airwayMethod == "Trakeostomi" || solunumgereksinimi_form1.airwayMethod == "Endotrakeal Tüp"){
                    taniArray.push("tani30");
            }

            if (form1_beslenme.nutrition_issue_var.split(',').includes('İştahsızlık') || form1_beslenme.nutrition_issue_var.split(',').includes('İsteksiz')
            || ilestimform1.treatmentAcceptance == "Kabul etmiyor" || uyukuform1.sleepProblem.split('/').includes('Gündüz uykusu')
            || uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')
            || uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi') || ilestimform1.reachTrouble != "Yok" || ilestimform1.companion == "Yok" 
            || calismaform1.workStatus == "Çalışmıyor"){
                    taniArray.push("tani31");
            }

            if (uyukuform1.sleepProblem.split('/').includes('Gündüz uykusu') || calismaform1.hobbies == "Yok" || hareketform1.movementProblem.split('/').includes('Huzursuzluk')){
                    taniArray.push("tani32"); // add patient age
            }            

            if (ilestimform1.treatmentAcceptance == "Kabul etmiyor") {
                    taniArray.push("tani33");
            }

            if (hareketform1.movementProblem.split('/').includes('Huzursuzluk') || hareketform1.movementProblem.split('/').includes('Yorgunluk')
            || hareketform1.movementProblem.split('/').includes('Anksiyete') || uyukuform1.averageSleepDuration < 7 || uyukuform1.sleepProblem.split('/').includes('Gündüz uykusu')
            || uyukuform1.sleepProblem.split('/').includes('Uykudan yorgun kalkma') || uyukuform1.sleepProblem.split('/').includes('Uyuma güçlüğü')
            || uyukuform1.sleepProblem.split('/').includes('Uykunun bölünmesi')) {
                    taniArray.push("tani34");
            }


            
            if (form3.total >= 5 || ozgecmisform1.aidTools.split('/').includes('Tekerlekli Sandalye') || ozgecmisform1.aidTools.split('/').includes('Baston')
            || ozgecmisform1.aidTools.split('/').includes('Yurutec') || ozgecmisform1.aidTools.split('/').includes('Koltuk Degnegi')){
                taniArray.push("tani36");
            }

            if (katerer.katererType == "Periferik venöz kateter" || katerer.katererType == "Santral venöz  kateter" || katerer.katererType == "Dren"
            || katerer.katererType == "Diğer" || bosaltimform1.Mesane_kateterizasyonu == "Var" || ozgecmisform1.smoking != "Yok" || ozgecmisform1.arrivalFromInput == "DM"
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
            || form1_beslenme.liquid_consumption < 1000 || katerer.katererType == "Dren" || form1_beslenme.BKI > 30) {
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

            const currentDate = new Date();
            const timeDiff = currentDate.getTime() - bosaltimform1.defekasyon_zamani.getTime();

            const daysPassed = Math.floor(timeDiff / (1000 * 3600 * 24));

            if (daysPassed > 2 || form1_beslenme.nutrition_issue_var == "Hazımsızlık" || form1_beslenme.food_consumption_var == "Daha Az"
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

      </script>

</body>

</html>