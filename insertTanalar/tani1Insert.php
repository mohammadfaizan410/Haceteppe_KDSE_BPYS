<?php
require_once("../config-students.php");
if (isset($_POST)) {
    $patient_id = $_POST['patient_id'];
    $patient_name = $_POST['patient_name'];
    $update_date = $_POST['update_date'];
    $problem_info = $_POST['problem_info'];
    $nurse_description = $_POST['nurse_description'];
    $noc_output = $_POST['noc_output'];
    $noc_indicator = $_POST['noc_indicator'];
    $noc_indicator_after = $_POST['noc_indicator_after'];
    $nurse_attempt = $_POST['nurse_attempt'];
    $nurse_education = $_POST['nurse_education'];
    $evaluation = $_POST['evaluation'];
    $matchedfields_string = $_POST['matchedfields_string'];


    $stmt = $db->prepare("Select * from  tani1 where patient_id = ?");
    $stmt->execute([$patient_id]);
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        $stmt = $db->prepare("UPDATE tani1 
        SET date = ?, problem_info = ?, nurse_description = ?, noc_output = ?, noc_indicator = ?, noc_indicator_after = ?, nurse_attempt = ?, nurse_education = ?, evaluation = ?, matchedfields_string = ?
        WHERE patient_id = ?");
        $result = $stmt->execute([$update_date, $problem_info, $nurse_description, $noc_output, $noc_indicator, $noc_indicator_after, $nurse_attempt, $nurse_education, $evaluation, $matchedfields_string, $patient_id]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        $stmt = $db->prepare("INSERT into tani1 
(
patient_id,
patient_name,
date,
problem_info,
nurse_description,
noc_output,
noc_indicator,
noc_indicator_after,
nurse_attempt,
nurse_education,
evaluation,
matchedfields_string
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([$patient_id, $patient_name, $update_date, $problem_info, $nurse_description, $noc_output, $noc_indicator, $noc_indicator_after, $nurse_attempt, $nurse_education, $evaluation, $matchedfields_string]);
        if ($result) {
            echo "succesfully inserted!";
        } else {
            echo $result;
        }
    }
} else {
    echo " Error: Post data not set";
}
