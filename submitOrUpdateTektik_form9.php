<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form9 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
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
$stmt->execute([
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
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>