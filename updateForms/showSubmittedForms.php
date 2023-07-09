<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: main.php");
}
        require_once('../config-students.php');
        $patient_id = $_GET['patient_id'];
        $patient_name = $_GET['patient_name'];
        $sql = "SELECT * FROM  form2  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form2 = '';
        if ($result) {
            $form2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form3 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form3 = [];
        if ($result) {
            $form3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form4 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form4 = [];
        if ($result) {
            $form4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form5 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form5 = [];
        if ($result) {
            $form5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form6 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form6 = [];
        if ($result) {
            $form6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form7 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form7 = [];
        if ($result) {
            $form7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form8 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form8 = [];
        if ($result) {
            $form8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form9 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form9 = [];
        if ($result) {
            $form9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form10 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form10 = [];
        if ($result) {
            $form10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form11 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form11 = [];
        if ($result) {
            $form11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form12 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form12 = [];
        if ($result) {
            $form12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form13 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form13 = [];
        if ($result) {
            $form13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form14 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form14 = [];
        if ($result) {
            $form14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form15 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form15 = [];
        if ($result) {
            $form15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM ozgecmisform1 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $ozgecmisform1 = [];
        if ($result) {
            $ozgecmisform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM solunumgereksinimi_form1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $solunumgereksinimi_form1 = [];
        if ($result) {
            $solunumgereksinimi_form1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  hareketform1 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $hareketform1 = [];
        if ($result) {
            $hareketform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM vucudutemizform1 WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $vucudutemizform1 = [];
        if ($result) {
            $vucudutemizform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  katererform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $katererform1 = [];
        if ($result) {
            $katererform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  ilestimform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $ilestimform1 = [];
        if ($result) {
            $ilestimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  calismaform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $calismaform1 = [];
        if ($result) {
            $calismaform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  egitimform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $egitimform1 = [];
        if ($result) {
            $egitimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  bosaltimform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $bosaltimform1 = [];
        if ($result) {
            $bosaltimform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  form1_beslenme  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form1_beslenme = [];
        if ($result) {
            $form1_beslenme = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  uyukuform1  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form1_uyku = [];
        if($result){
            $form1_uyku = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'error';
        };

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .add_extention {
                    border: 1px dashed black;
                    background-color: white;
                    color: black;
                }
                .add_extention:hover {
                    background-color: black;
                    color: white;
                }
                .submissions{
                    border: 3px solid white;
                    margin-bottom: 10px;
                }
                .selected{
                    background-color: rgb(206, 87, 107);
                    border-top-right-radius: 50px;
                    border-bottom-right-radius: 50px ;
                }
                .form-container{
                    border-bottom: 3px solid grey;
                    margin-bottom: 10px;
                    padding: 20px;
                }
            </style>

<body style="background-color:white">
    <div id="tick-container">
    <div id="tick"></div>
    </div>
        <div class="container-fluid pt-4 px-4">
            <div class="container-fluid pt-4 px-4">
                <div class="send-patient">
                <span class='close closeBtn' id='closeBtn1'>&times;</span>
                    <h1 class="form-header">Dordurmus Formlar</h1>
                    <!-- ÖZGEÇMİŞ -->
                    <div id="ozgecmisform1_container" class="row form-container">
                        <div class="col-lg-3 btn btn-success mb-2" id="ozgecmisform1_toggler">
                            <a><p>Özgeçmiş</p></a>
                        </div>
                        <?php
                        if (count($ozgecmisform1) > 0 && $ozgecmisform1 !== '') {
                            $ozgecmisform1_last_column = end($ozgecmisform1);
                            foreach ($ozgecmisform1 as $ozgecmisform1_columns) {
                                $form_id = $ozgecmisform1_columns["form_id"];
                                $date = $ozgecmisform1_columns["creation_date"];
                                $display = 1;
                                echo "
                                    <a class='form-navigation col-lg-3 btn btn-success ozgecmisform1_view_submissions submissions' style='display: none;''
                                    href='$base_url/formlar-review/Form1-ozgecmis-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                    >
                                    <p>Özgeçmiş</p>
                                    <p>$date</p>
                                    </a>";
                            }
                            echo "
                            <a class='form-navigation col-lg-3 btn btn-success ozgecmisform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                            href='" . $base_url . "/formlar-review/Form1-ozgecmis-review.php?form_id=" . $ozgecmisform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                            <p>Add Extension</p>
                            </a>  ";
                        } else {
                            echo "<div class='col-lg-3' id='ozgecmisform1_no_submission' style='display: none;'>
                                <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                            </div>";
                        }
                        ?>
                    </div>
                    <!-- ÖZGEÇMİŞ ends here -->

                        <!-- SOLUNUM GEREKSİNİMİ -->
                        <div id="solunumgereksinimi_form1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="solunumgereksinimi_form1_toggler">
                                <a><p>Solunum Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($solunumgereksinimi_form1) > 0 && $solunumgereksinimi_form1 !== '') {
                                $solunumgereksinimi_form1_last_column = end($solunumgereksinimi_form1);
                                foreach ($solunumgereksinimi_form1 as $solunumgereksinimi_form1_columns) {
                                    $form_id = $solunumgereksinimi_form1_columns["form_id"];
                                    $date = $solunumgereksinimi_form1_columns["creationDate"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success solunumgereksinimi_form1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Solunumgereksinimi-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Solunum Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success solunumgereksinimi_form1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Solunumgereksinimi-review.php?form_id=" . $solunumgereksinimi_form1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='solunumgereksinimi_form1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- SOLUNUM GEREKSİNİMİ ends here -->
                        <!-- BESLENME GEREKSİNİMİ -->
                        <div id="form1_beslenme_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form1_beslenme_toggler">
                                <a><p>Beslenme Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($form1_beslenme) > 0 && $form1_beslenme !== '') {
                                $form1_beslenme_last_column = end($form1_beslenme);
                                foreach ($form1_beslenme as $form1_beslenme_columns) {
                                    $form_id = $form1_beslenme_columns["form_id"];
                                    $date = $form1_beslenme_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form1_beslenme_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-beslenme-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Beslenme Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form1_beslenme_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-beslenme-review.php?form_id=" . $form1_beslenme_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form1_beslenme_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- BESLENME GEREKSİNİMİ ends here -->
                        <!-- BOŞALTIM GEREKSİNİMİ -->
                        <div id="bosaltimform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="bosaltimform1_toggler">
                                <a><p>Boşaltım Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($bosaltimform1) > 0 && $bosaltimform1 !== '') {
                                $bosaltimform1_last_column = end($bosaltimform1);
                                foreach ($bosaltimform1 as $bosaltimform1_columns) {
                                    $form_id = $bosaltimform1_columns["form_id"];
                                    $date = $bosaltimform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success bosaltimform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Bosaltim-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Boşaltım Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success bosaltimform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Bosaltim-review.php?form_id=" . $bosaltimform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='bosaltimform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- BOŞALTIM GEREKSİNİMİ ends here -->
                        <!-- HAREKET GEREKSİNİMİ -->
                        <div id="hareketform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="hareketform1_toggler">
                                <a><p>Hareket Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($hareketform1) > 0 && $hareketform1 !== '') {
                                $hareketform1_last_column = end($hareketform1);
                                foreach ($hareketform1 as $hareketform1_columns) {
                                    $form_id = $hareketform1_columns["form_id"];
                                    $date = $hareketform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success hareketform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-hereket-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Hareket Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success hareketform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-hereket-review.php?form_id=" . $hareketform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='hareketform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- HAREKET GEREKSİNİMİ ends here -->
                        <!-- UYKU GEREKSİNİMİ -->
                        <div id="form1_uyku_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form1_uyku_toggler">
                                <a><p>Uyku Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($form1_uyku) > 0 && $form1_uyku !== '') {
                                $form1_uyku_last_column = end($form1_uyku);
                                foreach ($form1_uyku as $form1_uyku_columns) {
                                    $form_id = $form1_uyku_columns["form_id"];
                                    $date = $form1_uyku_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form1_uyku_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-uyku-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Uyku Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form1_uyku_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-uyku-review.php?form_id=" . $form1_uyku_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form1_uyku_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- UYKU GEREKSİNİMİ ends here -->
                        <!-- VÜCUDU TEMİZ VE BAKIMLI TUTMA -->
                        <div id="vucudutemizform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="vucudutemizform1_toggler">
                                <a><p>Vücudunu Temiz ve Bakımlı Tutma</p></a>
                            </div>
                            <?php
                            if (count($vucudutemizform1) > 0 && $vucudutemizform1 !== '') {
                                $vucudutemizform1_last_column = end($vucudutemizform1);
                                foreach ($vucudutemizform1 as $vucudutemizform1_columns) {
                                    $form_id = $vucudutemizform1_columns["form_id"];
                                    $date = $vucudutemizform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success vucudutemizform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Vucudu-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Vücudunu Temiz ve Bakımlı Tutma</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success vucudutemizform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Vucudu-review.php?form_id=" . $vucudutemizform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='vucudutemizform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- VÜCUDU TEMİZ VE BAKIMLI TUTMA ends here -->
                        <!-- KATETER / DREN -->
                        <div id="katererform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="katererform1_toggler">
                                <a><p>Kateter / Dren</p></a>
                            </div>
                            <?php
                            if (count($katererform1) > 0 && $katererform1 !== '') {
                                $katererform1_last_column = end($katererform1);
                                foreach ($katererform1 as $katererform1_columns) {
                                    $form_id = $katererform1_columns["form_id"];
                                    $date = $katererform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success katererform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Katerer-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Kateter / Dren</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success katererform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Katerer-review.php?form_id=" . $katererform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='katererform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- KATETER / DREN ends here -->
                        <!-- İLETİŞİM KURMA GEREKSİNİMİ -->
                        <div id="ilestimform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="ilestimform1_toggler">
                                <a><p>İletişim Kurma Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($ilestimform1) > 0 && $ilestimform1 !== '') {
                                $ilestimform1_last_column = end($ilestimform1);
                                foreach ($ilestimform1 as $ilestimform1_columns) {
                                    $form_id = $ilestimform1_columns["form_id"];
                                    $date = $ilestimform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success ilestimform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Iletisim-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>İletişim Kurma Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success ilestimform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Iletisim-review.php?form_id=" . $ilestimform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='ilestimform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- İLETİŞİM KURMA GEREKSİNİMİ ends here -->
                        <!-- ÇALIŞMA, ÜRETME, BOŞ ZAMANINI DEĞERLENDİRME GEREKSİNİMİ -->
                        <div id="calismaform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="calismaform1_toggler">
                                <a><p>Çalışma, Üretme, Boş Zamanını Değerlendirme Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($calismaform1) > 0 && $calismaform1 !== '') {
                                $calismaform1_last_column = end($calismaform1);
                                foreach ($calismaform1 as $calismaform1_columns) {
                                    $form_id = $calismaform1_columns["form_id"];
                                    $date = $calismaform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success calismaform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-Calisma-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Çalışma, Üretme, Boş Zamanını Değerlendirme Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success calismaform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-Calisma-review.php?form_id=" . $calismaform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='calismaform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>

                        <!-- ÇALIŞMA, ÜRETME, BOŞ ZAMANINI DEĞERLENDİRME GEREKSİNİMİ ends here -->
                        <!-- EĞİTİM GEREKSİNİMİ -->
                        <div id="egitimform1_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="egitimform1_toggler">
                                <a><p>Eğitim Gereksinimi</p></a>
                            </div>
                            <?php
                            if (count($egitimform1) > 0 && $egitimform1 !== '') {
                                $egitimform1_last_column = end($egitimform1);
                                foreach ($egitimform1 as $egitimform1_columns) {
                                    $form_id = $egitimform1_columns["form_id"];
                                    $date = $egitimform1_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success egitimform1_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form1-egitim-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Eğitim Gereksinimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success egitimform1_add_extension add_extention' style='display: none; height: 80%; align-self: auto; '
                                href='" . $base_url . "/formlar-review/Form1-egitim-review.php?form_id=" . $egitimform1_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='egitimform1_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır
                                    </p>
                                    </div>";
                                }
                            ?>
                        </div>
                        <!-- EĞİTİM GEREKSİNİMİ ends here -->
                        



                        <!-- form2 -->
                        <div id="form2_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form2_toggler">
                                <a><p>Ağrı Değerlendirmesi</p></a>
                            </div>
                            <?php
                            if (count($form2) > 0 && $form2 !== '') {
                                $form2_last_column = end($form2);
                                foreach ($form2 as $form2_columns) {
                                    $form_id = $form2_columns["form_id"];
                                    $date = $form2_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form2_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form2-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Ağrı Değerlendirmesi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form2_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form2-review.php?form_id=" . $form2_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form2_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                        </div>
                        <!-- form2 ends here -->
                        
                        <!-- form3 -->
                        <div id="form3_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form3_toggler">
                                <a><p>Düşme Riski Değerlendirmesi</p></a>
                            </div>
                            <?php
                            if (count($form3) > 0 && $form3 !== '') {
                                $form3_last_column = end($form3);
                                foreach ($form3 as $form3_columns) {
                                    $form_id = $form3_columns["form_id"];
                                    $date = $form3_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form3_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form3-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Düşme Riski Değerlendirmesi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form3_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form3-review.php?form_id=" . $form3_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form3_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form3 ends here -->

                        <!-- form4 -->
                        <div id="form4_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form4_toggler">
                                <a><p>Düşme Bildirimi</p></a>
                            </div>
                            <?php
                            if (count($form4) > 0 && $form4 !== '') {
                                $form4_last_column = end($form4);
                                foreach ($form4 as $form4_columns) {
                                    $form_id = $form4_columns["form_id"];
                                    $date = $form4_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form4_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form4-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Düşme Bildirimi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form4_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form4-review.php?form_id=" . $form4_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form4_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form4 ends here -->

                        <!-- form5 -->
                        <div id="form5_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form5_toggler">
                                <a><p>Glaskow Koma Skalası</p></a>
                            </div>
                            <?php
                            if (count($form5) > 0 && $form5 !== '') {
                                $form5_last_column = end($form5);
                                foreach ($form5 as $form5_columns) {
                                    $form_id = $form5_columns["form_id"];
                                    $date = $form5_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form5_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form5-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Glaskow Koma Skalası</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form5_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form5-review.php?form_id=" . $form5_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form5_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form5 ends here -->

                        <!-- form6 -->
                        <div id="form6_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form6_toggler">
                                <a><p>Braden Bası Yarası Risk Değerlendirme Aracı</p></a>
                            </div>
                            <?php
                            if (count($form6) > 0 && $form6 !== '') {
                                $form6_last_column = end($form6);
                                foreach ($form6 as $form6_columns) {
                                    $form_id = $form6_columns["form_id"];
                                    $date = $form6_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form6_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form6-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Braden Bası Yarası Risk Değerlendirme Aracı</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form6_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form6-review.php?form_id=" . $form6_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form6_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form6 ends here -->

                        <!-- form7 -->
                        <div id="form7_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form7_toggler">
                                <a><p>Basınç Yarası Formu</p></a>
                            </div>
                            <?php
                            if (count($form7) > 0 && $form7 !== '') {
                                $form7_last_column = end($form7);
                                foreach ($form7 as $form7_columns) {
                                    $form_id = $form7_columns["form_id"];
                                    $date = $form7_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form7_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form7-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Basınç Yarası Formu</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form7_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form7-review.php?form_id=" . $form7_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form7_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form7 ends here -->

                        <!-- form8 -->
                        <div id="form8_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form8_toggler">
                                <a><p>Ödem Değerlendirmesi</p></a>
                            </div>
                            <?php
                            if (count($form8) > 0 && $form8 !== '') {
                                $form8_last_column = end($form8);
                                foreach ($form8 as $form8_columns) {
                                    $form_id = $form8_columns["form_id"];
                                    $date = $form8_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form8_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form8-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Ödem Değerlendirmesi</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form8_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form8-review.php?form_id=" . $form8_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form8_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>

                        <!-- form8 ends here -->

                        <!-- form9 -->
                        <div id="form9_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form9_toggler">
                                <a><p>TETKİK SONUÇLARI GİRİŞİ</p></a>
                            </div>
                            <?php
                            if (count($form9) > 0 && $form9 !== '') {
                                $form9_last_column = end($form9);
                                foreach ($form9 as $form9_columns) {
                                    $form_id = $form9_columns["form_id"];
                                    $date = $form9_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form9_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form9-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>TETKİK SONUÇLARI GİRİŞİ</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form9_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form9-review.php?form_id=" . $form9_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form9_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form9 ends here -->

                        <!-- form10 -->
                        <div id="form10_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form10_toggler">
                                <a><p>YAŞAMSAL BULGU TAKİBİİ</p></a>
                            </div>
                            <?php
                            if (count($form10) > 0 && $form10 !== '') {
                                $form10_last_column = end($form10);
                                foreach ($form10 as $form10_columns) {
                                    $form_id = $form10_columns["form_id"];
                                    $date = $form10_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form10_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form10-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>YAŞAMSAL BULGU TAKİBİİ</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form10_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form10-review.php?form_id=" . $form10_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>  ";
                            } else {
                                echo "<div class='col-lg-3' id='form10_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form10 ends here -->

                        <!-- form11 -->
                        <div id="form11_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form11_toggler">
                                <a><p>ALDIĞI ÇIKARDIĞI İZLEMİ</p></a>
                            </div>
                            <?php
                            if (count($form11) > 0 && $form11 !== '') {
                                $form11_last_column = end($form11);
                                foreach ($form11 as $form11_columns) {
                                    $form_id = $form11_columns["form_id"];
                                    $date = $form11_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form11_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form11-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>ALDIĞI ÇIKARDIĞI İZLEMİ</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "
                                <a class='form-navigation col-lg-3 btn btn-success form11_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form11-review.php?form_id=" . $form11_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='form11_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form11 ends here -->
                        
                        <!-- form12 -->
                        <div id="form12_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form12_toggler">
                                <a><p>Sıvı İzlem</p></a>
                            </div>
                            <?php
                            if (count($form12) > 0 && $form12 !== '') {
                                $form12_last_column = end($form12);
                                foreach ($form12 as $form12_columns) {
                                    $form_id = $form12_columns["form_id"];
                                    $date = $form12_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form12_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form12-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Sıvı İzlem</p>
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "<a class='form-navigation col-lg-3 btn btn-success form12_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form12-review.php?form_id=" . $form12_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='form12_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form12 ends here -->

                        <!-- form13 -->
                        <div id="form13_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form13_toggler">
                                <a><p>Medikal Tedavi</p></a>
                            </div>
                            <?php
                            if (count($form13) > 0 && $form13 !== '') {
                                $form13_last_column = end($form13);
                                foreach ($form13 as $form13_columns) {
                                    $form_id = $form13_columns["form_id"];
                                    $date = $form13_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form13_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form13-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Medikal Tedavi</p>
                                        <p>$date</p>
                                        </a>";
                                } 
                                echo "<a class='form-navigation col-lg-3 btn btn-success form13_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form13-review.php?form_id=" . $form13_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='form13_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form13 ends here -->

                        <!-- form14 -->
                        <div id="form14_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form14_toggler">
                                <a><p>Bakım Planı</p></a>
                            </div>
                            <?php
                            if (count($form14) > 0 && $form14 !== '') {
                                $form14_last_column = end($form14);
                                foreach ($form14 as $form14_columns) {
                                    $form_id = $form14_columns["form_id"];
                                    $date = $form14_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form14_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form14-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Bakım Planı</p>
                                        <p>$date</p>
                                        </a>"; 
                                }
                                echo "<a class='form-navigation col-lg-3 btn btn-success form14_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form14-review.php?form_id=" . $form14_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='form14_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form14 ends here -->

                        <!-- form15 -->
                        <div id="form15_container" class="row form-container">
                            <div class="col-lg-3 btn btn-success mb-2" id="form15_toggler">
                                <a><p>Günlük Bakım Planı</p></a>
                            </div>
                            <?php
                            if (count($form15) > 0 && $form15 !== '') {
                                $form15_last_column = end($form15);
                                foreach ($form15 as $form15_columns) {
                                    $form_id = $form15_columns["form_id"];
                                    $date = $form15_columns["creation_date"];
                                    $display = 1;
                                    echo "
                                        <a class='form-navigation col-lg-3 btn btn-success form15_view_submissions submissions' style='display: none;''
                                        href='$base_url/formlar-review/Form15-review.php?form_id=$form_id&patient_id=$patient_id&patient_name=$patient_name'
                                        >
                                        <p>Günlük Bakım Planı</p> 
                                        <p>$date</p>
                                        </a>";
                                }
                                echo "<a class='form-navigation col-lg-3 btn btn-success form15_add_extension add_extention' style='display: none; height: 80%; align-self: auto;'
                                href='" . $base_url . "/formlar-review/Form15-review.php?form_id=" . $form15_last_column['form_id'] . "&patient_id=" . $patient_id . "&patient_name=" . $patient_name . "&display=1'>
                                <p>Add Extension</p>
                                </a>";
                            } else {
                                echo "<div class='col-lg-3' id='form15_no_submission' style='display: none;'>
                                    <p>Bu form için hiçbir gönderiminiz bulunmamaktadır</p>
                                </div>";
                            }
                            ?>
                            </div>
                        <!-- form15 ends here -->
                


            














                </div>
            </div>
        </div>
    </body>
        <script>
            //closeBtn click
            var patient_id = "<?php echo $_GET['patient_id']; ?>";
            var patient_name = "<?php echo $_GET['patient_name']; ?>";
            console.log(patient_id, patient_name);
$(function() {
                
                $("#closeBtn1").on("click", function(e) {
                    e.preventDefault();
                    var url =
                        "<?php echo $base_url; ?>/updateForms/formOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                });
            }); 
        $(function() {
            //form2
            $('#form2_toggler').click(function() {
            $('#form2_container').children().not('#form2_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form3
            $('#form3_toggler').click(function() {
            $('#form3_container').children().not('#form3_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form4
            $('#form4_toggler').click(function() {
            $('#form4_container').children().not('#form4_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form5
            $('#form5_toggler').click(function() {
            $('#form5_container').children().not('#form5_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form6
            $('#form6_toggler').click(function() {
            $('#form6_container').children().not('#form6_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form7
            $('#form7_toggler').click(function() {
            $('#form7_container').children().not('#form7_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form8
            $('#form8_toggler').click(function() {
            $('#form8_container').children().not('#form8_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form9
            $('#form9_toggler').click(function() {
            $('#form9_container').children().not('#form9_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form10
            $('#form10_toggler').click(function() {
            $('#form10_container').children().not('#form10_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form11
            $('#form11_toggler').click(function() {
            $('#form11_container').children().not('#form11_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form12
            $('#form12_toggler').click(function() {
            $('#form12_container').children().not('#form12_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form13
            $('#form13_toggler').click(function() {
            $('#form13_container').children().not('#form13_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form14
            $('#form14_toggler').click(function() {
            $('#form14_container').children().not('#form14_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form15
            $('#form15_toggler').click(function() {
            $('#form15_container').children().not('#form15_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //ozgecmisform1
            $('#ozgecmisform1_toggler').click(function() {
            $('#ozgecmisform1_container').children().not('#ozgecmisform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //solunumgereksinimi
            $('#solunumgereksinimi_form1_toggler').click(function() {
            $('#solunumgereksinimi_form1_container').children().not('#solunumgereksinimi_form1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form1_beslenme
            $('#form1_beslenme_toggler').click(function() {
            $('#form1_beslenme_container').children().not('#form1_beslenme_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            // bosaltimform1
            $('#bosaltimform1_toggler').click(function() {
            $('#bosaltimform1_container').children().not('#bosaltimform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //hareketform1
            $('#hareketform1_toggler').click(function() {
            $('#hareketform1_container').children().not('#hareketform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //form1_uyku
            $('#form1_uyku_toggler').click(function() {
            $('#form1_uyku_container').children().not('#form1_uyku_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            // /vucudutemizform1
            $('#vucudutemizform1_toggler').click(function() {
            $('#vucudutemizform1_container').children().not('#vucudutemizform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //katererform1
            $('#katererform1_toggler').click(function() {
            $('#katererform1_container').children().not('#katererform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //ilestimform1
            $('#ilestimform1_toggler').click(function() {
            $('#ilestimform1_container').children().not('#ilestimform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //calismaform1
            $('#calismaform1_toggler').click(function() {
            $('#calismaform1_container').children().not('#calismaform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            //egitimform1
            $('#egitimform1_toggler').click(function() {
            $('#egitimform1_container').children().not('#egitimform1_toggler').toggle('slow');
            $(this).toggleClass('selected');
            });
            $('.form-navigation').click(function (e) { 
                e.preventDefault();

                $('#content').load(this.href);
            });

        });

   
        </script>

</html>