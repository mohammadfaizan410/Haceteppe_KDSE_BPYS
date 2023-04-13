<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM form6 WHERE patient_id = ?";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute([$_POST["patient_id"]]);
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form6 SET 
                        form_num = ?,
                        patient_name = ?,
                        creation_date = ?,
                        update_date = ?,
                        sensory_perception = ?,
                        moisture = ?,
                        activity = ?,
                        mobility = ?,
                        nutrition = ?,
                        discomfort = ?,
                        total = ?,
                        risk= ?
                      WHERE patient_id = ?");

                    $stmt->execute([
                                    $_POST["form_num"],
                                    $_POST["patient_name"],
                                    $_POST["creation_date"],
                                    $_POST["update_date"],
                                    $_POST["sensory_perception"],                                    
                                    $_POST["moisture"],
                                    $_POST["activity"],
                                    $_POST["mobility"],
                                    $_POST["nutrition"],
                                    $_POST["discomfort"],
                                    $_POST["total"],
                                    $_POST["risk"],
                                    $_POST["patient_id"]
                                ]);

           
            echo  "Successfully updated form 6";
        }
        else {

            $stmt = $db->prepare("INSERT into form6 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                sensory_perception,
                moisture,
                activity,
                mobility,
                nutrition,
                discomfort,
                total,
                risk
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $stmt->execute([
                                    $_POST["form_num"],
                                    $_POST["patient_name"],
                                    $_POST["patient_id"],
                                    $_POST["creation_date"],
                                    $_POST["update_date"],
                                    $_POST["sensory_perception"],                                    
                                    $_POST["moisture"],
                                    $_POST["activity"],
                                    $_POST["mobility"],
                                    $_POST["nutrition"],
                                    $_POST["discomfort"],
                                    $_POST["total"],
                                    $_POST["risk"]
                                ]);

           
            echo "Successfully inserted into form6";
        }
    } else{

        echo "Error.";
    }
}
else{
    echo "Error.";
}
?>