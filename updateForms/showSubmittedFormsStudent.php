<?php
        require_once('../config-students.php');
        $patient_id = $_GET['patient_id'];
        $patient_name = $_GET['patient_name'];
        $sql = "SELECT * FROM  form2  WHERE patient_id =" . $patient_id;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        $form2 = [];
        $form2_last_element = '';
        if ($result) {
            $form2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
            $form2_last_element = end($form2)
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
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <body style="background-color:white">
            <div id="tick-container">
            <div id="tick"></div>
            </div>
                <div class="container-fluid pt-4 px-4">
                    <div class="container-fluid pt-4 px-4">
                        <div class="send-patient">
                            <h1 class="form-header">Dordurmus Formlar</h1>
                                <div id='form1_container'>
                                </div>

                                <div id='form2_container' class="row">
                                        <div class="col-lg-12">

                                        </div>
                                        <dIv id="form2_forms_container" style="display: none;">

                                        </dIv>
                                </div>




                        </div>
                    </div>
                </div>
        </body>
        </body>
        </html>