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
$stmt->execute([
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
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>