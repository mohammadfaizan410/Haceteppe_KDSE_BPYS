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
        $sql = "SELECT * FROM  solunumgereksinimi_form1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  calismaform1 WHERE patient_id =" . $userid;
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
        $sql = "SELECT * FROM  ozgecmisform1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values18 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  vucudutemizform1 WHERE patient_id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $values = [];
        if ($result) {
            $values19 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };

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
        ];

        ?>
        <div class="send-patient">

            <div class=" patients-save">

            </div>
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 darkcyan table-title">Hasta Listesi / Öneriler</h6>

                </div>
                <div class="table-responsive">
                    <h1 class='mb-5 entered-forms-header'>Doldurulmuş Formlar</h1>
                    <div class="entered-forms-wrapper">
                        <?php
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

                        if (isset($allForms)) {
                            foreach ($allForms as $key => $currentTableAllForms) {
                                foreach ($currentTableAllForms as $currentKey => $form) {

                                    if ($key === 'table1_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_2_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success" style="color: white;" href="' . $base_url . '/formlar-review/Form2-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form2 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table2_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_3_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success" style="color: white;" href="' . $base_url . '/formlar-review/Form3-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form3 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table3_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_4_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success" style="color: white;" href="' . $base_url . '/formlar-review/Form4-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form4 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table4_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_5_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success " style="color: white;" href="' . $base_url . '/formlar-review/Form5-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form5 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table5_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_6_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success" style="color: white;" href="' . $base_url . '/formlar-review/Form6-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form6 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table6_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_7_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success" style="color: white;"  href="' . $base_url . '/formlar-review/Form7-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form7 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table7_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_8_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success"  style="color: white;" href="' . $base_url . '/formlar-review/Form8-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form8 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table8_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_9_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success"  style="color: white;" href="' . $base_url . '/formlar-review/Form9-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form9 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table9_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_10_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success"  style="color: white;" href="' . $base_url . '/formlar-review/Form10-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form10 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table10_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_11_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success"  style="color: white;" href="' . $base_url . '/formlar-review/Form11-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form11 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table11_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_12_options .= '<li class="m-2 p-2"><div class="entered-forms"><a class="nav-items review btn btn-success"   style="color: white;" href="' . $base_url . '/formlar-review/Form12-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form12 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table12_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_13_options .= '<li class="m-2 p-2 align-items-center"><div class="entered-forms"><a class="nav-items review btn btn-success"   style="color: white;" href="' . $base_url . '/formlar-review/Form13-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form13 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table13_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_14_options .= '<li class="m-2 p-2 align-items-center"><div class="entered-forms"><a class="nav-items review btn btn-success"   style="color: white;" href="' . $base_url . '/formlar-review/Form14-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form14 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table14_data') {
                                        $form_id = $form["form_id"];
                                        $update_date = $form["update_date"];
                                        $form_15_options .= '<li class="m-2 p-2 "><div class="entered-forms"><a class="nav-items review btn btn-success"   style="color: white;" href="' . $base_url . '/formlar-review/Form15-review.php?form_id=' . $form_id . '"><p class="entered-forms-p">Form15 Date: ' . $update_date . '</p></a></div></li>';
                                    }
                                    if ($key ===  'table15_data') {
                                        echo '<div class="entered-forms"><a class="nav-items review btn btn-success entered-forms-button" style="color : white;"  href="' . $base_url . '/formlar-review/Form1-Solunumgereksinimi-review.php?form_id=' . $form["form_id"] . '"><p class="entered-forms-p">Solunumgereksinimi_form1   Date:' . $form["updateDate"] . '</p></a></div>';
                                    }
                                    if ($key ===  'table16_data') {
                                        echo '<div class="entered-forms"><a class="nav-items review btn btn-success entered-forms-button" style="color : white;"  href="' . $base_url . '/formlar-review/Form1-Calisma-review.php?form_id=' . $form["form_id"] . '"><p class="entered-forms-p">Çalışma_form1   Date:' . $form["update_date"] . '</p></a></div>';
                                    }
                                    if ($key ===  'table17_data') {
                                        echo '<div class="entered-forms"><a class="nav-items review btn btn-success entered-forms-button" style="color : white;"  href="' . $base_url . '/formlar-review/Form1-hereket-review.php?form_id=' . $form["form_id"] . '"><p class="entered-forms-p">Herket_form1   Date:' . $form["update_date"] . '</p></a></div>';
                                    }
                                    if ($key ===  'table18_data') {
                                        echo '<div class="entered-forms"><a class="nav-items review btn btn-success entered-forms-button" style="color : white;"  href="' . $base_url . '/formlar-review/Form1-ozgecmis-review.php?form_id=' . $form["form_id"] . '"><p class="entered-forms-p">Ozgecmis_form1   Date:' . $form["update_date"] . '</p></a></div>';
                                    }
                                    if ($key ===  'table19_data') {
                                        echo '<div class="entered-forms"><a class="nav-items review btn btn-success entered-forms-button" style="color : white;"  href="' . $base_url . '/formlar-review/Form1-vucudu-review.php?form_id=' . $form["form_id"] . '"><p class="entered-forms-p">Vucudu_form1   Date:' . $form["update_date"] . '</p></a></div>';
                                    }
                                };
                            }
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms  btn btn-success w-50 m-auto align-items-center' id='form2_toggle'>Form 2 <span id='form2_caret'>&#9660;</span></button>
                            <ul class='entered-forms-ul ' id='form_2_options' style='display:none'>" . $form_2_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form3_toggle'>Form 3 <span id='form3_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_3_options' style='display:none'>" . $form_3_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form4_toggle'>Form 4 <span id='form4_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_4_options' style='display:none'>" . $form_4_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form5_toggle'>Form 5 <span id='form5_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_5_options' style='display:none'>" . $form_5_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form6_toggle'>Form 6 <span id='form6_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_6_options' style='display:none'>" . $form_6_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form7_toggle'>Form 7 <span id='form7_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_7_options' style='display:none'>" . $form_7_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form8_toggle'>Form 8 <span id='form8_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_8_options' style='display:none'>" . $form_8_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form9_toggle'>Form 9 <span id='form9_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_9_options' style='display:none'>" . $form_9_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form10_toggle'>Form 10 <span id='form10_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_10_options' style='display:none'>" . $form_10_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center' id='form11_toggle'>Form 11 <span id='form11_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_11_options' style='display:none'>" . $form_11_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center'  id='form12_toggle'>Form 12 <span id='form12_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_12_options' style='display:none'>" . $form_12_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center'  id='form13_toggle'>Form 13 <span id='form13_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_13_options' style='display:none'>" . $form_13_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center'  id='form14_toggle'>Form 14 <span id='form14_caret'>&#9660;<span></button>
                            <ul class='entered-forms-ul' id='form_14_options' style='display:none'>" . $form_14_options . "</ul>
                            </div>";
                            echo "<div class='w-75 m-auto'>
                            <button class='entered-forms toggle_button btn btn-success w-50 m-auto align-items-center'  id='form15_toggle'>Form 15 <span id='form15_caret'>&#9660;<span></button>
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
                    <h1 class='mb-5 entered-forms-header'>Doldurulmuş Tanılar</h1>
                    <div class="entered-forms-wrapper">
                        <div class="mt-3 entered-forms"><a class="nav-items entered-forms-button" style="color: white;"
                                href="<?php echo $base_url; ?>/taniReview/tani1Review.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Tanı
                                1</a></div>
                    </div>

                </div>

                <div class="table-responsive">
                    <h1 class='mb-5 entered-forms-header'>Yeni Form Doldur</h1>
                    <div class="entered-forms-wrapper">
                                                <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                               href="<?php echo $base_url; ?>/formlar/beslenmeGereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form1_beslenme</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bosaltimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">bosaltimForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/calismaForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">calismaForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/egitimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">egitimForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/hareketForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">hareketForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/iletisimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">iletisimForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/kateterForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">kateterForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/ozgecmis_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">ozgecmis_form1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/solunumgereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">solunumgereksinimi_form1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/uykuForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">uykuForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/vucuduTemizForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">vucuduTemizForm1</a>
                        </div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color: white;"
                                href="<?php echo $base_url; ?>/formlar/Form2.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                2</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                3</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                4</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form5.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                5</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form6.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                6</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form7.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                7</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form8.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                8</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/tetkiksonuclari_form9.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                9</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/yasamsalbulgutakibi_form10.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                10</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form11.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                11</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/siviizlem.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                12</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/medikaltedavi.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                13</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bakimplani.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                14</a></div>
                        <div class="mt-3 entered-forms"><a class="nav-items newForm" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/gunlukbakimuygulamalari.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $patient_name; ?>">Form
                                15</a></div>
                    </div>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
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
            })
        });
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
        <script src=""></script>
</body>

</html>
