
<?php
require_once("./config-students.php");


if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE ilestimform1 SET
        update_date = ?,
        workStatus = ?,
        workingTime = ?,
        nonWorkingTime = ?,
        workInterruption = ?,
        workRisk = ?,
        familyMembers = ?,
        numberOfChildren = ?,
        roleInFamily = ?,
        hobbies = ?,
        otherActivities = ?

        WHERE form_id = ?");
        $result = $stmt->execute([
            $_POST["creation_date"],
            $_POST["workStatus"],
            $_POST["workingTime"],
            $_POST["nonWorkingTime"],
            $_POST["workInterruption"],
            $_POST["workRisk"],
            $_POST["familyMembers"],
            $_POST["numberOfChildren"],
            $_POST["roleInFamily"],
            $_POST["hobbies"],
            $_POST["otherActivities"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } else {
        $stmt = $db->prepare("INSERT INTO ilestimform1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                workStatus,
                workingTime,
                nonWorkingTime,
                workInterruption,
                workRisk,
                familyMembers,
                numberOfChildren,
                roleInFamily,
                hobbies,
                otherActivities
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["workStatus"],
            $_POST["workingTime"],
            $_POST["nonWorkingTime"],
            $_POST["workInterruption"],
            $_POST["workRisk"],
            $_POST["familyMembers"],
            $_POST["numberOfChildren"],
            $_POST["roleInFamily"],
            $_POST["hobbies"],
            $_POST["otherActivities"]
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