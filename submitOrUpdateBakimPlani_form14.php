<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form14 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
            $stmt = $db->prepare("INSERT INTO form14 (
                problem_info,
                nurse_description,
                noc_output,
                noc_indicator,
                nurse_attempt,
                evaluation
            ) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
        $_POST["problem_info"],
        $_POST["nurse_description"],
        $_POST["noc_output"],
        $_POST["noc_indicator"],
        $_POST["nurse_attempt"],
        $_POST["evaluation"]
]);
        
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>