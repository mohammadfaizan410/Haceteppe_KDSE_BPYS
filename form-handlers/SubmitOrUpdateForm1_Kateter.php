
<?php
require_once("../config-students.php");

if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE katererform1 SET
        update_date = ?,
        katererType = ?,
        peripheralKaterarAmount = ?,
        peripheralKaterarLocation = ?,
        peripheralKaterarDate   = ?,
        centralKaterarNumber = ?,
        centralKaterarLocation = ?,
        centralKaterarDate = ?,
        drainKatererAmount = ?,
        drainKatererLocation = ?,
        drainKatererDate = ?,
        otherKatereAmount = ?,
        otherKatereLocation = ?,
        otherKatereDate = ?
        WHERE form_id = ?");

        $result = $stmt->execute([
            $_POST["creation_date"],
            $_POST["katererType"],
            $_POST["peripheralKaterarAmount"],
            $_POST["peripheralKaterarLocation"],
            $_POST["peripheralKaterarDate"],
            $_POST["centralKaterarNumber"],
            $_POST["centralKaterarLocation"],
            $_POST["centralKaterarDate"],
            $_POST["drainKatererAmount"],
            $_POST["drainKatererLocation"],
            $_POST["drainKatererDate"],
            $_POST["otherKatereAmount"],
            $_POST["otherKatereLocation"],
            $_POST["otherKatereDate"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } else {
        $stmt = $db->prepare("INSERT INTO katererform1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                katererType,
                peripheralKaterarAmount,
                peripheralKaterarLocation,
                peripheralKaterarDate,
                centralKaterarNumber,
                centralKaterarLocation,
                centralKaterarDate,
                drainKatererAmount,
                drainKatererLocation,
                drainKatererDate,
                otherKatereAmount,
                otherKatereLocation,
                otherKatereDate
            ) VALUES (?, ?, ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["katererType"],
            $_POST["peripheralKaterarAmount"],
            $_POST["peripheralKaterarLocation"],
            $_POST["peripheralKaterarDate"],
            $_POST["centralKaterarNumber"],
            $_POST["centralKaterarLocation"],
            $_POST["centralKaterarDate"],
            $_POST["drainKatererAmount"],
            $_POST["drainKatererLocation"],
            $_POST["drainKatererDate"],
            $_POST["otherKatereAmount"],
            $_POST["otherKatereLocation"],
            $_POST["otherKatereDate"]
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