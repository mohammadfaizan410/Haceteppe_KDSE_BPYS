<?php
require_once("../config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
$time = date("Y-m-d H:i:s");
$table_name = 'tani';
?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form11 SET

                WHERE tani_id = ?");

        $result =  $stmt->execute([

        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {

        $result =   $stmt = $db->prepare("INSERT INTO $table_name (
                patient_id,
                patient_name,
                creation_date,
                update_date,
                noc_indicator,
                noc_indicator_after,
                noc_indicator_2,
                noc_indicator_after_2,
                noc_indicator_3,
                noc_indicator_after_3,
                nurse_attempt,
                nurse_education,
                collaborative_apps,
                evaluation,
                parent_id,
                root_id,
                standalone,
                time

            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
                $_POST['patient_id'],
                $_POST['patient_name'],
                $_POST['creation_date'],
                $_POST['update_date'],
                $_POST['noc_indicator'],
                $_POST['noc_indicator_after'],
                $_POST['noc_indicator_2'],
                $_POST['noc_indicator_after_2'],
                $_POST['noc_indicator_3'],
                $_POST['noc_indicator_after_3'],
                $_POST['nurse_attempt'],
                $_POST['nurse_education'],
                $_POST['collaborative_apps'],
                $_POST['evaluation'],
                $_POST['parent_id'],
                $_POST['root_id'],
                $_POST['standalone'],
                $time
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo $result;
        }
    }
} else {
    echo "Error.";
}
?>