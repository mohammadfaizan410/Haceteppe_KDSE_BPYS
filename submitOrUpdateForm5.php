<?php
require_once("config-students.php");

if (isset($_POST["patient_name"])) {
        if(isset($_POST['isUpdate'])){

            $stmt = $db->prepare("UPDATE form5 SET 
                        patient_name = ?,
                        form_num = ?,
                        updateDate = ?,
                        eye_opening_points = ?,
                        motor_response_points = ?,
                        verbal_response_points = ?,
                        total = ?
                      WHERE form_id = ?");

$stmt->execute([
                $_POST["patient_name"],
                $_POST["form_num"],
                $_POST["creation_date"],
                $_POST["eye_opening_points"],
                $_POST["motor_response_points"],
                $_POST["verbal_response_points"],
                $_POST["total"],
                $_POST["form_id"]
            ]);
            
            echo  "successfully updated";
        } 
        else {

            $stmt = $db->prepare("INSERT into form5 (
                patient_name,
                patient_id,
                form_num,
                creation_date,
                updateDate,
                eye_opening_points,
                motor_response_points,
                verbal_response_points,
                total
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["patient_name"],
                $_POST["patient_id"],
                $_POST["form_num"],
                $_POST["creation_date"],
                $_POST["updateDate"],
                $_POST["eye_opening_points"],
                $_POST["motor_response_points"],
                $_POST["verbal_response_points"],
                $_POST["total"]
            ]);

            echo "successfully inserted";
        }
} else {
    echo "error";
}





