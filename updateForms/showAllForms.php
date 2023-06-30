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

    <!-- Libraries Stylesheet -->

    <link href="../style.css" rel="stylesheet">
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->


    <!-- Template Stylesheet -->

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_GET['patient_id'];
        $patient_name = $_GET['patient_name'];
        //echo $userid;
        $sql = "SELECT * FROM  form2  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form3 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form4 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form5 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form6 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form7 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form8 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form9 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form10 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form11 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form11 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form12 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form13 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form14 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form15 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM ozgecmisform1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM solunumgereksinimi_form1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values16 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  hareketform1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values17 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM vucudutemizform1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values18 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  katererform1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values19 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  ilestimform1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values20 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  calismaform1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values21 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  egitimform1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values22 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  bosaltimform1  WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values23 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        // $sql = "SELECT * FROM  form1_beslenme  WHERE patient_id =" . $userid;
        // $smtmselect = $db->prepare($sql);
        // $result = $smtmselect->execute();
        // $values = [];
        // if ($result) {
        //     $values24 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        // } else {
        //     echo 'error';
        // };

        $sql = "SELECT * FROM  tani1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $tani1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };

        $allForms = [
            'table1_data' => $values1,
            'table2_data' => $values2,
            'table3_data' => $values3,
            'table4_data' => $values4,
            'table5_data' => $values5,
            'table6_data' => $values6,
            'table7_data' => $values7,
            'table8_data' => $values8,
            'table9_data' => $values9,
            'table10_data' => $values10,
            'table11_data' => $values11,
            'table12_data' => $values12,
            'table13_data' => $values13,
            'table14_data' => $values14,
            'table15_data' => $values15,
            'table16_data' => $values16,
            'table17_data' => $values17,
            'table18_data' => $values18,
            'table19_data' => $values19,
            'table20_data' => $values20,
            'table21_data' => $values21,
            'table22_data' => $values22,
            'table23_data' => $values23,
            // 'table24_data' => $values24,
        ];

        ?>
        <div class="send-patient">

            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <div class="patients-save">
                
            </div>
            <div class="text-center rounded p-4" style="background-color: " id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                </div>
                <div class="table-responsive mb-4">
                    <h1 class='mb-5' style="color: black">Doldurulmuş Formlar</h1>
                    <div class="entered-forms-wrapper">
                        <?php
                        $form_1_options = '';
                        $form_2_options = '';
                        $form_3_options = '';
                        $form_4_options = '';
                        $form_5_options = '';
                        $form_6_options = '';
                        $form_7_options = '';
                        $form_8_options = '';
                        $form_9_options = '';
                        $form_10_options = '';
                        $form_11_options = '';
                        $form_12_options = '';
                        $form_13_options = '';
                        $form_14_options = '';
                        $form_15_options = '';
                        $form_16_options = '';
                        $form_17_options = '';
                        $form_18_options = '';
                        $form_19_options = '';
                        $form_20_options = '';
                        $form_21_options = '';
                        $form_22_options = '';
                        $form_23_options = '';
                        $form_24_options = '';
                        $form_25_options = '';



                        if (isset($allForms)) {
                            foreach ($allForms as $key => $currentTableAllForms) {
                                foreach ($currentTableAllForms as $currentKey => $form) {

                                    if ($key === 'table1_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_2_options .= '<li class="m-2 p-2 ">
                                        <div class="entered-forms align-items-center">
                                        <a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form2-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">Form2 Date: ' . $update_date . '</p>
                                        </a>
                                        <a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form2-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">View Tanis </p>
                                        </a>
                                        </div>
                                        </li>';
                                    }
                                    if ($key ===  'table2_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_3_options .= '<li class="m-2 p-2">
                                        <div class="entered-forms align-items-center">
                                        <a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form3-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">Form3 Date: ' . $update_date . '</p>
                                        </a>
                                        <a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form2-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">View Tanis </p>
                                        </a>
                                        </div>
                                        <div>Submitted Tani 1</div>
                                        <div class="w-75  m-auto mt-3 d-flex">
                                        <div class="w-50 border m-auto">
                                                tani 1 subimission
                                        </div>
                                        <div class="w-50 border m-auto">
                                                tani 1 extension
                                        </div>
                                        <div class="w-50 border m-auto">
                                                tani 1 extension
                                        </div>
                                        <div class="w-50 border m-auto">
                                                tani 1 extension
                                        </div>
                                        <div class="w-50 border m-auto">
                                                tani 1 extension
                                        </div>
                                       
                                        </div>
                                        </li>';
                                    }
                                    if ($key ===  'table3_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_4_options .= '<li class="m-2 p-2">
                                        <div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form4-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">Form4 Date: ' . $update_date . '</p>
                                        </a>
                                        <a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form2-review.php?form_id=' . $form_id . '">
                                        <p class="entered-forms-p">View Tanis </p>
                                        </a>
                                        </div>
                                        </li>';
                                    }
                                    if ($key ===  'table4_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_5_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form5-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form5 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table5_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_6_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3" style="color: white;" href="' . $base_url . '/formlar-review/Form6-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form6 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table6_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_7_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3" style="color: white;"  href="' . $base_url . '/formlar-review/Form7-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form7 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table7_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_8_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"  style="color: white;" href="' . $base_url . '/formlar-review/Form8-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form8 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table8_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_9_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"  style="color: white;" href="' . $base_url . '/formlar-review/Form9-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form9 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table9_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_10_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"  style="color: white;" href="' . $base_url . '/formlar-review/Form10-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form10 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table10_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_11_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"  style="color: white;" href="' . $base_url . '/formlar-review/Form11-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form11 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table11_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_12_options .= '<li class="m-2 p-2"><div class="entered-formsalign-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form12-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form12 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table12_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_13_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form13-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form13 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table13_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_14_options .= '<li class="m-2 p-2"><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form14-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form14 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table14_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_15_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form15-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form15 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table15_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_16_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-ozgecmis-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Ozgecmis Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table16_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["updateDate"];
                                        $form_17_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-Solunumgereksinimi-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Solunum Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table17_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_18_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-hereket-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Hareket Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table18_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_19_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-Vucudu-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Vucut Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table19_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_20_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-Katerer-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Katerer Date: ' . $update_date . '</p></a></div></li>';                                    }
                                 
                                    if ($key ===  'table20_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_21_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-Iletisim-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Ilestim Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table21_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_22_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-Calisma-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Calisma Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table23_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_24_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"  style="color: white;" href="' . $base_url . '/formlar-review/Form1-bosaltim-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Bosaltim Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table22_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_23_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-egitim-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Egitim Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    // if ($key ===  'table24_data') {
                                    //     $form_id = $form["form_id"];
                                    //     $update_date = $form["update_date"];
                                    //     $form_25_options .= '<li class="m-2 p-2 "><div class="entered-forms align-items-center"><a class="nav-items review btn btn-success p-3"   style="color: white;" href="' . $base_url . '/formlar-review/Form1-beslenme-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form1 Beslenme Date: ' . $update_date . '</p></a></div></li>';
                                    // }

                                };
                            };
                        };
                        
                        
                        if($form_16_options !== "" || $form_17_options !== "" || $form_18_options !== "" || $form_19_options !== "" ||  $form_20_options !== "" || $form_21_options !== "" || $form_22_options !== "" || $form_23_options !== "" || $form_24_options !== "" || $form_25_options !== "" ){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms  btn btn-success w-75 m-auto align-items-center'  id='form1_sections_toggle'>Form1 <span id='form1_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form1_sections_options' style='display:none'>";
                            if($form_24_options!==""){
                                echo "<li class='m-2'><div class='w-75 m-auto'>
                                <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form24_toggle'>Form1 Bosaltim <span id='form24_caret'>&#9660;<span></button>
                                <ul class='entered-forms-ul' id='form_24_options' style='display:none'>" . $form_24_options . "</ul>
                                </div></li>";}
                            if($form_16_options!==""){
                                echo "
                                <li class='m-2'><div class='w-75 m-auto'>
                                <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form16_toggle'>Form1 Ozgecmis <span id='form16_caret'>&#9660;<span></button>
                                <ul class='entered-forms-ul' id='form_16_options' style='display:none'>" . $form_16_options . "</ul>
                                </div></li>";
                            }
                            if($form_17_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                                <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form17_toggle'>Form1 Solunum <span id='form17_caret'>&#9660;<span></button>
                                <ul class='entered-forms-ul' id='form_17_options' style='display:none'>" . $form_17_options . "</ul>
                                </div></li>";
                            }
                            if($form_18_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                             <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form18_toggle'>Form1 Hereket <span id='form18_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_18_options' style='display:none'>" . $form_18_options . "</ul>
                            </div></li>";}
                            if($form_19_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form19_toggle'>Form1 Vucut <span id='form19_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_19_options' style='display:none'>" . $form_19_options . "</ul>
                            </div></li>";}
                            if($form_20_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form20_toggle'>Form1 Katerer <span id='form20_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_20_options' style='display:none'>" . $form_20_options . "</ul>
                            </div></li>";}
                            if($form_21_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form21_toggle'> Form1 Iletisim<span id='form21_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_21_options' style='display:none'>" . $form_21_options . "</ul>
                            </div></li>";}
                            if($form_22_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form22_toggle'>Form1 Calisma <span id='form22_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_22_options' style='display:none'>" . $form_22_options . "</ul>
                            </div></li>";}
                            if($form_23_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center'  id='form23_toggle'>Form1 Egitim <span id='form23_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_23_options' style='display:none'>" . $form_23_options . "</ul>
                            </div></li>";}
                            if($form_25_options!==""){
                            echo "<li class='m-2'><div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center' id='form25_toggle'>Form1 Beslenme <span id='form25_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_25_options' style='display:none'>" . $form_25_options . "</ul>
                            </div></li>";}
                             echo "</ul>
                            </div>";
                            }

                            if($form_2_options !== ""){
                                echo "<div class='w-100 m-auto'>
                                <button class='entered-forms  btn btn-success w-75 m-auto align-items-center' id='form2_toggle'>Form 2 <span id='form2_caret'>&#9660;</span></button>
                                <ul class='entered-forms-ul ' id='form_2_options' style='display:none'>" . $form_2_options . "</ul>
                                </div>";
                            }
                            if($form_3_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form3_toggle'>Form 3 <span id='form3_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_3_options' style='display:none'>" . $form_3_options . "</ul>
                            </div>";
                            }
                            if($form_4_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form4_toggle'>Form 4 <span id='form4_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_4_options' style='display:none'>" . $form_4_options . "</ul>
                            </div>";
                            }
                            if($form_5_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form5_toggle'>Form 5 <span id='form5_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_5_options' style='display:none'>" . $form_5_options . "</ul>
                            </div>";
                            }
                            if($form_6_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form6_toggle'>Form 6 <span id='form6_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_6_options' style='display:none'>" . $form_6_options . "</ul>
                            </div>";
                            }
                            if($form_7_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form7_toggle'>Form 7 <span id='form7_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_7_options' style='display:none'>" . $form_7_options . "</ul>
                            </div>";
                            }
                            if($form_8_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form8_toggle'>Form 8 <span id='form8_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_8_options' style='display:none'>" . $form_8_options . "</ul>
                            </div>";
                            }
                            if($form_9_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form9_toggle'>Form 9 <span id='form9_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_9_options' style='display:none'>" . $form_9_options . "</ul>
                            </div>";
                            }
                            if($form_10_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form10_toggle'>Form 10 <span id='form10_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_10_options' style='display:none'>" . $form_10_options . "</ul>
                            </div>";
                            }
                            if($form_11_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='form11_toggle'>Form 11 <span id='form11_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_11_options' style='display:none'>" . $form_11_options . "</ul>
                            </div>";
                            }
                            if($form_12_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center'  id='form12_toggle'>Form 12 <span id='form12_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_12_options' style='display:none'>" . $form_12_options . "</ul>
                            </div>";
                            }
                            if($form_13_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center'  id='form13_toggle'>Form 13 <span id='form13_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_13_options' style='display:none'>" . $form_13_options . "</ul>
                            </div>";
                            }
                            if($form_14_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center'  id='form14_toggle'>Form 14 <span id='form14_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_14_options' style='display:none'>" . $form_14_options . "</ul>
                            </div>";
                            }
                            if($form_15_options !== ""){
                            echo "<div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center'  id='form15_toggle'>Form 15 <span id='form15_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_15_options' style='display:none'>" . $form_15_options . "</ul>
                            </div>";
                            }
                        
                        ?>
                    </div>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>

                
                <div class="table-responsive">
                    <h1 class='mb-5 mt-5' style="color: black">Yeni Form Doldur</h1>
                    <div class="entered-forms-wrapper">
                    <div class='w-100 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='new_forms_toggle'>Formlar <span id='new_forms_caret'>&#9660;<span></button>
                            <input type="text" id="searchInputNewForms"  style='display:none' class='form-control  w-50 m-auto mb-2 mt-3' placeholder="Ad veya soyadına göre ara">
                        <ul class='entered-forms-ul' id='new_forms_options' style='display:none'>
                        <li><div class="mt-3 entered-forms align-items-center"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                               href="<?php echo $base_url; ?>/formlar/beslenmeGereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form1_beslenme</a><div></li>
                       <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bosaltimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">bosaltimForm1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/calismaForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">calismaForm1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/egitimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">egitimForm1</a>
                        </div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/hareketForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">hareketForm1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/iletisimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">iletisimForm1</a>
                        </div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/kateterForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">kateterForm1</a>
                        </div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/ozgecmis_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">ozgecmis_form1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/solunumgereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">solunumgereksinimi_form1</a>
                        </div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/uykuForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">uykuForm1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/vucuduTemizForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">vucuduTemizForm1</a>
                        </div></li>
                        <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color: white;"
                                href="<?php echo $base_url; ?>/formlar/Form2.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                2</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                3</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                4</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form5.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                5</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form6.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                6</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form7.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                7</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form8.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                8</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/tetkiksonuclari_form9.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                9</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/yasamsalbulgutakibi_form10.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                10</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form11.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                11</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/siviizlem.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                12</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/medikaltedavi.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                13</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bakimplani.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                14</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/gunlukbakimuygulamalari.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                15</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/tanılar/tani1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">tanı
                                1</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/tanılar/tani3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">tanı
                                3</a></div></li>
                        <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/tanılar/tani4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">tanı
                                4</a></div></li>
                                </ul>
                                
                        </div>

                    </div>
                    </div>

                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <h1 class="m-auto mb-5 mt-5 text-center" style="color: black">Yeni Tanı Doldur</h1>
                    <div class="entered-forms-wrapper">
                    <div class='w-100 m-auto'>
                    <button class='entered-forms toggle_button btn btn-success w-75 m-auto align-items-center' id='new_tanis_toggle'>Tanılar <span id='new_tanis_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='new_tanis_options' style='display:none'>
                            <li><div class="mt-3 entered-forms align-items-center"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                               href="<?php echo $base_url; ?>/tanılar/tani1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 1</a><div></li>
                          <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani2.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 2</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 3</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 4</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani5.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 5</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani6.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 6</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani7.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 7</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani8.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 8</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani9.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 9</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color: white;" 
                                  href="<?php echo $base_url; ?>/tanılar/tani10.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 10</a>
                            </div></li>

                            <li> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani11.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 11</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani12.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 12</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani13.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 13</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani14.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 14</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani15.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 15</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani16.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 16</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani17.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 17</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani18.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 18</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" 
                                  href="<?php echo $base_url; ?>/tanılar/tani19.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 19</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani20.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 20</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani21.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 21</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani22.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 22</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani23.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 23</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani24.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 24</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani25.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 25</a>
                            </div></li>
                            
                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani26.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 26</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani27.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 27</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani28.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 28</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani29.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 29</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani30.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 30</a>
                            </div></li>
                            
                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani31.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 31</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani32.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 32</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani33.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 33</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/tani34.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 34</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 35</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani2.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 36</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 37</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 38</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani5.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 39</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani6.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 40</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani7.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 41</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani8.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 42</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani9.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 43</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani10.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 44</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani11.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 45</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani12.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 46</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani13.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 47</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani14.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 48</a>
                            </div></li>

                            <li><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3"
                                  href="<?php echo $base_url; ?>/tanılar/riskTani15.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>&standalone=false&root=''&parent=''">Tanı 49</a>
                            </div></li>


 
 




                            
                            </ul>
                    
                    </div>
                    </div>

                </div>

            </div>
        </div>
        <script>
            //closeBtn click
            $(function() {
                $("#closeBtn1").on("click", function(e) {
                    console.log("closeBtn clicked");
                    e.preventDefault();
                    $("#content").load("<?php echo $base_url; ?>/updateForms/showAllPatients.php");
                })
            })

        $(function() {
            $("a.review").on("click", function(e) {
                e.preventDefault();
                $("#content").load(this.href);
            })
        })
        $(function() {
            $("a.newForm").on("click", function(e) {
                e.preventDefault();
                $("#content").load(this.href);
            })
        });
        $(function() {
            $("a.entered-forms-button").on("click", function(e) {
                e.preventDefault();
                $("#content").load(this.href);
            })
        });
        $(function() {
            $("button#form2_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_2_options").slideToggle('slow');
                if($("#form2_caret").css("transform") === "none"){
                    $("#form2_caret").css("transform", "rotate(180deg)");
                    
                }
                else{
                    $("#form2_caret").css("transform", "");
                }
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");

            })
        });
        $(function() {
            $("button#form3_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_3_options").slideToggle('slow');
                if($("#form3_caret").css("transform") === "none"){
                    $("#form3_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form3_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form4_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_4_options").slideToggle('slow');
                if($("#form4_caret").css("transform") === "none"){
                    $("#form4_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form4_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form5_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_5_options").slideToggle('slow');
                if($("#form5_caret").css("transform") === "none"){
                    $("#form5_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form5_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form6_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_6_options").slideToggle('slow');
                if($("#form6_caret").css("transform") === "none"){
                    $("#form6_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form6_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form7_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_7_options").slideToggle('slow');
                if($("#form7_caret").css("transform") === "none"){
                    $("#form7_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form7_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form8_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_8_options").slideToggle('slow');
                if($("#form8_caret").css("transform") === "none"){
                    $("#form8_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form8_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form9_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_9_options").slideToggle('slow');
                if($("#form9_caret").css("transform") === "none"){
                    $("#form9_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form9_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form10_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_10_options").slideToggle('slow');
                if($("#form10_caret").css("transform") === "none"){
                    $("#form10_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form10_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form11_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_11_options").slideToggle('slow');
                if($("#form11_caret").css("transform") === "none"){
                    $("#form11_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form11_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form12_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_12_options").slideToggle('slow');
                if($("#form12_caret").css("transform") === "none"){
                    $("#form12_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form12_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form13_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_13_options").slideToggle('slow');
                if($("#form13_caret").css("transform") === "none"){
                    $("#form13_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form13_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form14_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_14_options").slideToggle('slow');
                if($("#form14_caret").css("transform") === "none"){
                    $("#form14_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form14_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form15_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_15_options").slideToggle('slow');
                if($("#form15_caret").css("transform") === "none"){
                    $("#form15_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form15_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
                $("#form1_sections_options").slideUp('slow');
                $("#form1_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form16_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_16_options").slideToggle('slow');
                if($("#form16_caret").css("transform") === "none"){
                    $("#form16_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form16_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form17_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_17_options").slideToggle('slow');
                if($("#form17_caret").css("transform") === "none"){
                    $("#form17_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form17_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form18_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_18_options").slideToggle('slow');
                if($("#form18_caret").css("transform") === "none"){
                    $("#form18_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form18_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form19_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_19_options").slideToggle('slow');
                if($("#form19_caret").css("transform") === "none"){
                    $("#form19_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form19_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form20_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_20_options").slideToggle('slow');
                if($("#form20_caret").css("transform") === "none"){
                    $("#form20_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form20_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form21_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_21_options").slideToggle('slow');
                if($("#form21_caret").css("transform") === "none"){
                    $("#form21_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form21_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form1_sections_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form1_sections_options").slideToggle('slow');
                if($("#form1_caret").css("transform") === "none"){
                    $("#form1_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form1_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form22_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_22_options").slideToggle('slow');
                if($("#form22_caret").css("transform") === "none"){
                    $("#form22_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form22_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form23_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_23_options").slideToggle('slow');
                if($("#form23_caret").css("transform") === "none"){
                    $("#form23_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form23_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form24_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_24_options").slideToggle('slow');
                if($("#form24_caret").css("transform") === "none"){
                    $("#form24_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form24_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_25_options").slideUp('slow');
                $("#form25_caret").css("transform", "");
            })
        });
        $(function() {
            $("button#form25_toggle").on("click", function(e) {
                e.preventDefault();
                $("#form_25_options").slideToggle('slow');
                if($("#form25_caret").css("transform") === "none"){
                    $("#form25_caret").css("transform", "rotate(180deg)");
                }
                else{
                    $("#form25_caret").css("transform", "");
                }
                $("#form_2_options").slideUp('slow');
                $("#form2_caret").css("transform", "");
                $("#form_3_options").slideUp('slow');
                $("#form3_caret").css("transform", "");
                $("#form_4_options").slideUp('slow');
                $("#form4_caret").css("transform", "");
                $("#form_5_options").slideUp('slow');
                $("#form5_caret").css("transform", "");
                $("#form_6_options").slideUp('slow');
                $("#form6_caret").css("transform", "");
                $("#form_7_options").slideUp('slow');
                $("#form7_caret").css("transform", "");
                $("#form_8_options").slideUp('slow');
                $("#form8_caret").css("transform", "");
                $("#form_9_options").slideUp('slow');
                $("#form9_caret").css("transform", "");
                $("#form_10_options").slideUp('slow');
                $("#form10_caret").css("transform", "");
                $("#form_11_options").slideUp('slow');
                $("#form11_caret").css("transform", "");
                $("#form_12_options").slideUp('slow');
                $("#form12_caret").css("transform", "");
                $("#form_13_options").slideUp('slow');
                $("#form13_caret").css("transform", "");
                $("#form_14_options").slideUp('slow');
                $("#form14_caret").css("transform", "");
                $("#form_15_options").slideUp('slow');
                $("#form15_caret").css("transform", "");
                $("#form_16_options").slideUp('slow');
                $("#form16_caret").css("transform", "");
                $("#form_17_options").slideUp('slow');
                $("#form17_caret").css("transform", "");
                $("#form_18_options").slideUp('slow');
                $("#form18_caret").css("transform", "");
                $("#form_19_options").slideUp('slow');
                $("#form19_caret").css("transform", "");
                $("#form_20_options").slideUp('slow');
                $("#form20_caret").css("transform", "");
                $("#form_21_options").slideUp('slow');
                $("#form21_caret").css("transform", "");
                $("#form_22_options").slideUp('slow');
                $("#form22_caret").css("transform", "");
                $("#form_23_options").slideUp('slow');
                $("#form23_caret").css("transform", "");
                $("#form_24_options").slideUp('slow');
                $("#form24_caret").css("transform", "");
            })
        });
        //new_forms_toggle
        $(function() {
            $("button#new_forms_toggle").on("click", function(e) {
                e.preventDefault();
                $("#new_forms_options").slideToggle('slow');
                $("#searchInputNewForms").slideToggle('slow');
                $("#searchInputNewForms").val('');
                var currentScroll = $(window).scrollTop();
                var targetScroll = currentScroll + 500;
                if($("#new_forms_caret").css("transform") === "none"){
                   // Get the current scroll position

                    // Calculate the target scroll position

                    // Scroll to the target position
                    $('html, body').animate({
                    scrollTop: targetScroll
                    }, 400);
                }
                else{
                    $("#new_forms_caret").css("transform", "");
                    $('html, body').animate({
                        scrollTop : currentScroll - 500
                    },0)
                    resetSearch();
                }
            })
        });

        //new tanis toggle
        $(function() {
            $("button#new_tanis_toggle").on("click", function(e) {
                e.preventDefault();
                $("#new_tanis_options").slideToggle('slow');
                var currentScroll = $(window).scrollTop();
                var targetScroll = currentScroll + 500;
                if($("#new_tanis_caret").css("transform") === "none"){
                    $("#new_tanis_caret").css("transform", "rotate(180deg)");
                    $('html, body').animate({
                    scrollTop: targetScroll
                    }, 400);
                }
                else{
                    $("#new_tanis_caret").css("transform", "");
                    $('html, body').animate({
                        scrollTop : currentScroll - 500
                    },0)
                    
                }
            })
        });

   
        </script>
<script>
  // Get the input element and the list
  var input = document.getElementById("searchInputNewForms");
  var list = document.getElementById("new_forms_options");

  // Add an event listener to the input element
  input.addEventListener("input", function() {
    var filter = input.value.toLowerCase().trim(); // Convert search input to lowercase and remove leading/trailing whitespace

    // Iterate through each list item
    for (var i = 0; i < list.children.length; i++) {
      var listItem = list.children[i];
      var itemText = listItem.textContent.toLowerCase();

      // Show/hide the list item based on the search input
      if (itemText.includes(filter)) {
        listItem.style.display = "";
      } else {
        listItem.style.display = "none";
      }
    }
  });

  function resetSearch() {
    $("#searchInputNewForms").val(''); // Clear the search input value

    // Show all list items
    $("#new_forms_options li").each(function() {
      $(this).show();
    });
  }
</script>
        <script>


        </script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        
</body>

</html>