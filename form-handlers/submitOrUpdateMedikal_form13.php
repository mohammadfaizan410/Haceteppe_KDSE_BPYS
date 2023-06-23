<?php
require_once("../config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form13
        SET
        update_date = ?,
        delivery_date = ?,
        delivery_time = ?,
        medicine_name = ?,
        medicine_dose = ?,
        delivery_method = ?,
        treatment_timeRange = ?
        WHERE form_id = ?");
        $result =  $stmt->execute([
            $_POST["creation_date"],
            $_POST["delivery_date"],
            $_POST["delivery_time"],
            $_POST["medicine_name"],
            $_POST["medicine_dose"],
            $_POST["delivery_method"],
            $_POST["treatment_timeRange"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {
        $stmt = $db->prepare("INSERT INTO form13 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                delivery_date,
                delivery_time,
                medicine_name,
                medicine_dose,
                delivery_method,
                treatment_timeRange
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result =  $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["delivery_date"],
            $_POST["delivery_time"],
            $_POST["medicine_name"],
            $_POST["medicine_dose"],
            $_POST["delivery_method"],
            $_POST["treatment_timeRange"]
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