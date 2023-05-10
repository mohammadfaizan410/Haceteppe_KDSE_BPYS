<?php
require_once("config-students.php");
?>

<?php
if (isset($_POST)) {
    if(isset($_POST['isUpdate'])){
    $stmt = $db->prepare("UPDATE form2 SET
        update_date = ?,
        pain_intensity = ?,
        pain_duration = ?,
        pain_location = ?,
        pain_character = ?,
        pain_frequency = ?,
        pain_increase_factors = ?,
        pain_decrease_factors = ?
        WHERE form_id = ?");

      $stmt->execute([
        $_POST["creation_date"],
        $_POST["pain_intensity"],
        $_POST["pain_duration"],
        $_POST["pain_location"],
        $_POST["pain_character"],
        $_POST["pain_frequency"],
        $_POST["pain_increase_factors"],
        $_POST["pain_decrease_factors"],
        $_POST["form_id"]
      ]);
    }
    else{

      
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
          }
            
            else{
              echo "error";
}
?>