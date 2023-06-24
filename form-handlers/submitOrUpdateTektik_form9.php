<?php
require_once("../config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form9 SET
        patient_name = ?,
        update_date = ?,
        date = ?,
        examination_type = ?,
        examination_result = ?,
        referance_value = ?
        WHERE form_id = ?");

        $result =  $stmt->execute([
            $_POST["patient_name"],
            $_POST["creation_date"],
            $_POST["date"],
            $_POST["examination_type"],
            $_POST["examination_result"],
            $_POST["referance_value"],
            $_POST["form_id"],
        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {
        $stmt = $db->prepare("INSERT INTO form9 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                date,
                examination_type,
                examination_result,
                referance_value
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["date"],
            $_POST["examination_type"],
            $_POST["examination_result"],
            $_POST["referance_value"],
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo $result;
        }
    }
} else {
    echo "Error";
}
?>