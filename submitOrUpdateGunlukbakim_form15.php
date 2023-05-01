<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form15 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
            $stmt = $db->prepare("INSERT INTO form9 (
                application_time,
                application_description,
                applicationType
            ) VALUES (?, ?, ?)");
$stmt->execute([
        $_POST["application_time"],
        $_POST["application_description"],
        $_POST["applicationType"],
       
]);
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>