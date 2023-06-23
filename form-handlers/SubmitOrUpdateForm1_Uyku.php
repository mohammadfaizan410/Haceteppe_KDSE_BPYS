
<?php
require_once("./config-students.php");

if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE uyukuform1 SET
        update_date = ?,
        averageSleepDuration = ?,
        sleepProblem = ?,
        sleepHelpHabits = ?,
        hospitalFactorsAffectingSleep = ?
        WHERE form_id = ?");
        $result = $stmt->execute([
            $_POST["creation_date"],
            $_POST["averageSleepDuration"],
            $_POST["sleepProblem"],
            $_POST["sleepHelpHabits"],
            $_POST["hospitalFactorsAffectingSleep"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } else {
        $stmt = $db->prepare("INSERT INTO uyukuform1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                averageSleepDuration,
                sleepProblem,
                sleepHelpHabits,
                hospitalFactorsAffectingSleep
               
            ) VALUES (?,   ?,    ?,    ?,    ?,    ?,    ?,    ?,    ?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["averageSleepDuration"],
            $_POST["sleepProblem"],
            $_POST["sleepHelpHabits"],
            $_POST["hospitalFactorsAffectingSleep"] 
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