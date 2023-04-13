<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST["patient_name"])) {

    $sql = "SELECT * FROM  form3  WHERE patient_id =" . $_POST["patient_id"];
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form3 SET 
                        patient_name = ?,
                        form_num = ?,
                        update_date = ?,
                        creation_date = ?,
                        confusion_point = ?,
                        symtomatic_depression_point = ?,
                        evacuation_trouble = ?,
                        dizziness_point = ?,
                        gender_point = ?,
                        epilepsy_drug_point = ?,
                        benzo_drug_point = ?,
                        arm_chair_point = ?,
                        total = ?
                      WHERE patient_id = ?");

                    $stmt->execute([
                                    $_POST["patient_name"],
                                    $_POST["form_num"],
                                    $_POST["update_date"],
                                    $_POST["creation_date"],
                                    $_POST["confusion_point"],                                    
                                    $_POST["symtomatic_depression_point"],
                                    $_POST["evacuation_trouble"],
                                    $_POST["dizziness_point"],
                                    $_POST["gender_point"],
                                    $_POST["epilepsy_drug_point"],
                                    $_POST["benzo_drug_point"],
                                    $_POST["arm_chair_point"],
                                    $_POST["total"],
                                    $_POST["patient_id"]
                                ]);

           
            echo  "successfully updated";
        }
        else {

            $stmt = $db->prepare("INSERT into form3 (
                patient_name,
                patient_id,
                form_num,
                update_date,
                creation_date,
                confusion_point,
                symtomatic_depression_point,
                evacuation_trouble,
                dizziness_point,
                gender_point,
                epilepsy_drug_point,
                benzo_drug_point,
                arm_chair_point,
                total
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $stmt->execute([
                                    $_POST["patient_id"],
                                    $_POST["patient_name"],
                                    $_POST["form_num"],
                                    $_POST["creation_date"],
                                    $_POST["update_date"],
                                    $_POST["confusion_point"],                                    
                                    $_POST["symtomatic_depression_point"],
                                    $_POST["evacuation_trouble"],
                                    $_POST["dizziness_point"],
                                    $_POST["gender_point"],
                                    $_POST["epilepsy_drug_point"],
                                    $_POST["benzo_drug_point"],
                                    $_POST["arm_chair_point"],
                                    $_POST["total"]
                                ]);

           
            echo "succesfully inserted";
        }
    } else{

        echo "error";
    }
}
else{
    echo "error";
}
?>