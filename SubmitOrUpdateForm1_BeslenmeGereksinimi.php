
<?php
require_once("./config-students.php");

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        // --- UPDATE FORM ---
        $stmt = $db->prepare("UPDATE form1_beslenme SET
        
        WHERE form_id = ?");

        $result = $stmt->execute([
            
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } 
    // --- NEW FORM ---
    else {
        $stmt = $db->prepare("INSERT INTO form1_beslenme (
                patient_name,
                patient_surname,
                patient_id,
                creation_date,
                update_date,
                daily_meals,
                general_foods,
                cooking_methods,
                bmi,
                nutritional_needs,
                general_diet,
                permitted_foods,
                fluid_consumption,
                main_diet_process,
                main_diet_with_probe,
                diet_process_installation_date,
                gastric_residue,
                nasogastric_decompression,
                eating_difficulty,
                weight_loss,
                weight_gain,
                nutrition_related,
                lips
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $result = $stmt->execute([
            $_POST["patient_name"],
            $_POST["patient_surname"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["daily_meals"],
            $_POST["general_foods"],
            $_POST["cooking_methods"],
            $_POST["bmi"],
            $_POST["nutritional_needs"],
            $_POST["general_diet"],
            $_POST["permitted_foods"],
            $_POST["fluid_consumption"],
            $_POST["main_diet_process"],
            $_POST["main_diet_with_probe"],
            $_POST["diet_process_installation_date"],
            $_POST["gastric_residue"],
            $_POST["nasogastric_decompression"],
            $_POST["eating_difficulty"],
            $_POST["weight_loss"],
            $_POST["weight_gain"],
            $_POST["nutrition_related"],
            $_POST["lips"], 
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo "Error: could not inserted!";
        }
    }
} else {
    echo "Error: Post data not set!";
}
?>