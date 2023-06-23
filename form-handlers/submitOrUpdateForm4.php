<?php
require_once("../config-students.php");

if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {

        $stmt = $db->prepare("UPDATE form4 SET 
                    patient_name = ?,
                    updateDate = ?,
                    patient_gender = ?,
                    medical_diagnosis = ?,
                    place_of_fall = ?,
                    fall_date = ?,
                    fall_time = ?
                    last_fall_risk_score = ?
                    injury_status = ?
                    injury_severity = ?
                    fall_cause = ?
                    pre_fall_precautions = ?
                    pre_fall_general_condition = ?
                    post_fall_general_condition = ?
                  WHERE form_id = ?");

        $result = $stmt->execute([
            $_POST["patient_name"],
            $_POST["creation_date"],
            $_POST["patient_gender"],
            $_POST["medical_diagnosis"],
            $_POST["place_of_fall"],
            $_POST["fall_date"],
            $_POST["fall_time"],
            $_POST["last_fall_risk_score"],
            $_POST["injury_status"],
            $_POST["injury_severity"],
            $_POST["fall_cause"],
            $_POST["pre_fall_precautions"],
            $_POST["pre_fall_general_condition"],
            $_POST["post_fall_general_condition"],
            $_POST["form_id"]
        ]);

        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {


        $stmt = $db->prepare("INSERT INTO form4 (
                patient_name,
                patient_id,
                patient_gender,
                creation_date,
                update_date,
                medical_diagnosis,
                place_of_fall,
                fall_date,
                fall_time,
                last_fall_risk_score,
                injury_status,
                injury_severity,
                fall_cause,
                pre_fall_precautions,
                pre_fall_general_condition,
                post_fall_general_condition
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $result = $stmt->execute([
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["patient_gender"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["medical_diagnosis"],
            $_POST["place_of_fall"],
            $_POST["fall_date"],
            $_POST["fall_time"],
            $_POST["last_fall_risk_score"],
            $_POST["injury_status"],
            $_POST["injury_severity"],
            $_POST["fall_cause"],
            $_POST["pre_fall_precautions"],
            $_POST["pre_fall_general_condition"],
            $_POST["post_fall_general_condition"]
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
