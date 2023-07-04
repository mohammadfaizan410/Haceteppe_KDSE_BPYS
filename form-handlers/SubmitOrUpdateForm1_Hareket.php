
<?php
require_once("../config-students.php");

if (isset($_POST["patient_name"])) {

        $stmt = $db->prepare("INSERT INTO hareketForm1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                exercisingHabit,
                inHospitalExercise,
                movementProblem,
                wearingClothesDependence,
                changingPositionDependence,
                standingUpDependence,
                walkingDependence
            ) VALUES (?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["exercisingHabit"],
            $_POST["inHospitalExercise"],
            $_POST["movementProblem"],
            $_POST["wearingClothesDependence"],
            $_POST["changingPositionDependence"],
            $_POST["standingUpDependence"],
            $_POST["walkingDependence"]
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