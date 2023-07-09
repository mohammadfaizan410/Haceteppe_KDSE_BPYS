<?php
require_once("../config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
$time = date("Y-m-d H:i:s");
$table_name = 'boshtani';
if (isset($_POST["patient_name"])) {
    $stmt = $db->prepare("INSERT INTO $table_name (
            patient_id,
            patient_name,
            creation_date,
            update_date,
            tani_description,
            noc_cikti,
            noc_cikti_after,
            noc_indicator,
            noc_indicator_after,
            nurse_attempt,
            nurse_education,
            collaborative_apps,
            degerlendirme,
            time,
            root_id
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $result = $stmt->execute([
            $_POST['patient_id'],
            $_POST['patient_name'],
            $_POST['creation_date'],
            $_POST['update_date'],
            $_POST['tani_description'],
            $_POST['nocCikti'],
            $_POST['nocCikti_after'],
            $_POST['noc_indicator'],
            $_POST['noc_indicator_after'],
            $_POST['nurse_attempt'],
            $_POST['nurse_education'],
            $_POST['collaborative_apps'],
            $_POST['değerlendirme'],
            $time,
            $_POST['root_id'],
    ]);

    if ($result) {
        echo "Ekleme Başarılı";
    } else {
        echo "Ekleme Başarısız";
    }
} else {
    echo "Error.";
}
?>
