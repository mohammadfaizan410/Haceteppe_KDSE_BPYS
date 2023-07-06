<?php
require_once("../config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
$time = date("Y-m-d H:i:s");
$table_name = 'boshTani';
?>
<?php

if (isset($_POST["patient_name"])) {
        $result =   $stmt = $db->prepare("INSERT INTO $table_name (
                tani_num,
                patient_id,
                patient_name,
                creation_date,
                update_date,
                noc_indicator,
                noc_indicator_after,
                tani_description,
                noc_cikti,
                nurse_attempt,
                nurse_education,
                collaborative_apps,
                time

            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
                $_POST['tani_num'],
                $_POST['patient_id'],
                $_POST['patient_name'],
                $_POST['creation_date'],
                $_POST['update_date'],
                $_POST['noc_indicator'],
                $_POST['noc_indicator_after'],
                $_POST['tani_description'],
                $_POST['noc_cikti'],
                $_POST['nurse_attempt'],
                $_POST['nurse_education'],
                $_POST['collaborative_apps'],
                $time
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo $result;
        }
} else {
    echo "Error.";
}
?>