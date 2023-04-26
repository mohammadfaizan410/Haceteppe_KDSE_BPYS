<?php
require_once("config-students.php");
?>
<?php

if (isset($_POST["patient_name"])) {
    $sql = "SELECT * FROM form8 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form7 SET 
                    update_date = ?,
                    assessed_area= ?,
                    edema_severity=?
                    WHERE patient_id = ?");
                    $stmt->execute([
                        $_POST["update_date"],
                        $_POST["assessed_area"],
                        $_POST["edema_severity"],
                        $_POST["patient_id"]
                    ]);

           
            echo  "Successfully updated form 7";
        }
        else {

            $stmt = $db->prepare("INSERT INTO form8 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                assessed_area,
                edema_severity
            ) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
        $_POST["form_num"],
        $_POST["patient_name"],
        $_POST["patient_id"],
        $_POST["creation_date"],
        $_POST["update_date"],   
        $_POST["assessed_area"],
        $_POST["edema_severity"] 
]);

           
            echo "Successfully inserted into form7";
        }
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>