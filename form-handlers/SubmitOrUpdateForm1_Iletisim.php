
<?php
require_once("../config-students.php");

if (isset($_POST["patient_name"])) {

        $stmt = $db->prepare("INSERT INTO ilestimform1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                communicationProblem,
                companion,
                reachTrouble,
                contactingStaffTrouble,
                careAcceptance,
                careAcceptanceWilling,
                careAcceptanceNon,
                treatmentAcceptance
            ) VALUES (?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,   ?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["communicationProblem"],
            $_POST["companion"],
            $_POST["reachTrouble"],
            $_POST["contactingStaffTrouble"],
            $_POST["careAcceptance"],
            $_POST["careAcceptanceWilling"],
            $_POST["careAcceptanceNon"],
            $_POST["treatmentAcceptance"]
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo "Error: could not inserted!";
        }
    
} else {
    echo "Error: Post data not set!";
}
?>