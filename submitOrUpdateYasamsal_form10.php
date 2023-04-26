<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form10 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
            $stmt = $db->prepare("INSERT INTO form10 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                time,
                body_temperature,
                heart_rate,
                heartrate_nature,
                respiratory_rate,
                blood_pressure,
                bp_measurement_location,
                o2_status,
                o2_method,
                spo2_percentage,
                weight_input
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
        $_POST["form_num"],
        $_POST["patient_name"],
        $_POST["patient_id"],
        $_POST["creation_date"],
        $_POST["update_date"],   
        $_POST["time"],   
        $_POST["body_temperature"],   
        $_POST["heart_rate"],
        $_POST["heartrate_nature"],
        $_POST["respiratory_rate"],
        $_POST["blood_pressure"],
        $_POST["bp_measurement_location"],
        $_POST["o2_status"],
        $_POST["o2_method"],
        $_POST["spo2_percentage"],
        $_POST["weight_input"],
]);
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>