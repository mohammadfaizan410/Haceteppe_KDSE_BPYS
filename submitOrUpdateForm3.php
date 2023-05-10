<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST["patient_name"])) {

    if(isset($_POST['isUpdate'])){

            $stmt = $db->prepare("UPDATE form3 SET 
                        update_date = ?,
                        confusion_point = ?,
                        symtomatic_depression_point = ?,
                        evacuation_trouble = ?,
                        dizziness_point = ?,
                        gender_point = ?,
                        epilepsy_drug_point = ?,
                        benzo_drug_point = ?,
                        arm_chair_point = ?,
                        total = ?
                      WHERE form_id = ?");

                    $stmt->execute([
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
                                    $_POST["form_id"]
                                ]);

           
            echo  "successfully updated";
        }

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
                                    $_POST["patient_name"],
                                    $_POST["patient_id"],
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
else{
    echo 'error' ;
}
?>