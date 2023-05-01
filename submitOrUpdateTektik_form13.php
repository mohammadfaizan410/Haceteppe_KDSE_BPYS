<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form13 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
            $stmt = $db->prepare("INSERT INTO form13 (
                delivery_date,
                delivery_time,
                medicine_name,
                medicine_dose,
                delivery_method,
                treatment_timeRange
            ) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
        $_POST["delivery_date"],
        $_POST["delivery_time"],
        $_POST["medicine_name"],
        $_POST["medicine_dose"],
        $_POST["delivery_method"],
        $_POST["treatment_timeRange"]
]);
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>