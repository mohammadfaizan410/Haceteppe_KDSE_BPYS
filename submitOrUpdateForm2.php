<?php
require_once("config-students.php");
?>

<?php
if (isset($_POST)) {
    $sql = "SELECT * FROM  form2  WHERE patient_id =" . $_POST["patient_id"];
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form2 SET
                patient_name = ?,
                patient_id = ?,
                form_num = ?,
                update_date = ?,
                pain_intensity = ?,
                pain_duration = ?,
                pain_location = ?,
                pain_character = ?,
                pain_frequency = ?,
                pain_increase_factors = ?,
                pain_decrease_factors = ?
                WHERE patient_id = ?");

$stmt->execute([
                $_POST["patient_name"],
                $_POST["patient_id"],
                $_POST["form_num"],
                $_POST["update_date"],
                $_POST["pain_intensity"],
                $_POST["pain_duration"],
                $_POST["pain_location"],
                $_POST["pain_character"],
                $_POST["pain_frequency"],
                $_POST["pain_increase_factors"],
                $_POST["pain_decrease_factors"],
                $_POST["patient_id"],
            ]);
            echo  "successfully updated";
        }
        else {
            $stmt = $db->prepare("INSERT INTO form2 (
                patient_name,
                patient_id,
                form_num,
                creation_date,
                update_date,
                pain_intensity,
                pain_duration,
                pain_location,
                pain_character,
                pain_frequency,
                pain_increase_factors,
                pain_decrease_factors
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
              
    $stmt->execute([
                $_POST["patient_name"],
                $_POST["patient_id"],
                $_POST["form_num"],
                $_POST["creation_date"],
                $_POST["update_date"],
                $_POST["pain_intensity"],
                $_POST["pain_duration"],
                $_POST["pain_location"],
                $_POST["pain_character"],
                $_POST["pain_frequency"],
                $_POST["pain_increase_factors"],
                $_POST["pain_decrease_factors"]
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