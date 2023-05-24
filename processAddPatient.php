<?php
require_once("config-students.php");

?>

<?php
if (isset($_POST)) {
               $stmt = $db->prepare("INSERT INTO patients (
                id,
                name,
                surname,
                age
              ) VALUES (?, ?, ?, ?)");
              
    $stmt->execute([
                $_POST["id"],
                $_POST["patient_name"],
                $_POST["patient_surname"],
                $_POST["patient_age"],
              ]);
            echo "succesfully inserted";
        }
else{
    echo "error";
}
?>