
<?php
require_once("../config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form12 SET
        patient_name = ?,
        update_date = ?,
        liquid_type = ?,
        liquid_velocity = ?,
        delivery_time = ?,
        liquid_level = ?,
        liquid_sent = ?
        WHERE form_id = ?");

        $result = $stmt->execute([
            $_POST["patient_name"],
            $_POST["creation_date"],
            $_POST["liquid_type"],
            $_POST["liquid_velocity"],
            $_POST["delivery_time"],
            $_POST["liquid_level"],
            $_POST["liquid_sent"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {
        $stmt = $db->prepare("INSERT INTO form12 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                liquid_type,
                liquid_velocity,
                delivery_time,
                liquid_level,
                liquid_sent
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result =  $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["liquid_type"],
            $_POST["liquid_velocity"],
            $_POST["delivery_time"],
            $_POST["liquid_level"],
            $_POST["liquid_sent"]
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
