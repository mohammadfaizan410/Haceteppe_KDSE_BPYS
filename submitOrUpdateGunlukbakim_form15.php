<?php
require_once("config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST["isUpdate"])) {
        $stmt = $db->prepare("UPDATE form15 SET
        update_date = ?,
        applications = ?,
        hours = ?,
        description = ?
        WHERE form_id = ?");
        $result =  $stmt->execute([
            $_POST["creation_date"],
            $_POST["applications"],
            $_POST["hours"],
            $_POST["description"],
            $_POST["form_id"]
        ]);

        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {

        $result =  $stmt = $db->prepare("INSERT INTO form15 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                applications,
                hours,
                description
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["applications"],
            $_POST["hours"],
            $_POST["description"]
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