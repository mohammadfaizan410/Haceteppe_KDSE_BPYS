
<?php
require_once("./config-students.php");

if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form10 SET
        update_date = ?,
        time = ? ,
        body_temperature = ?,
        heart_rate = ?,
        heartrate_location = ?,
        respiratory_nature = ?,
        heartrate_nature = ?,
        respiratory_rate = ?,
        blood_pressure = ?,
        bp_measurement_location = ?,
        measurement_location = ?,
        o2_status = ?,
        o2_method = ?,
        spo2_percentage = ?,
        weight_input = ?
        WHERE form_id = ?");

        $result = $stmt->execute([
            $_POST["creation_date"],
            $_POST["time"],
            $_POST["body_temperature"],
            $_POST["heart_rate"],
            $_POST["heartrate_location"],
            $_POST["respiratory_nature"],
            $_POST["heartrate_nature"],
            $_POST["respiratory_rate"],
            $_POST["blood_pressure"],
            $_POST["bp_measurement_location"],
            $_POST["measurement_location"],
            $_POST["o2_status"],
            $_POST["o2_method"],
            $_POST["spo2_percentage"],
            $_POST["weight_input"],
            $_POST["form_id"],
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } else {
        $stmt = $db->prepare("INSERT INTO form10 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                time,
                body_temperature,
                heart_rate,
                heartrate_location,
                respiratory_nature,
                heartrate_nature,
                respiratory_rate,
                blood_pressure,
                measurement_location,
                bp_measurement_location,
                o2_status,
                o2_method,
                spo2_percentage,
                weight_input
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["time"],
            $_POST["body_temperature"],
            $_POST["heart_rate"],
            $_POST["heartrate_location"],
            $_POST["respiratory_nature"],
            $_POST["heartrate_nature"],
            $_POST["respiratory_rate"],
            $_POST["blood_pressure"],
            $_POST["measurement_location"],
            $_POST["bp_measurement_location"],
            $_POST["o2_status"],
            $_POST["o2_method"],
            $_POST["spo2_percentage"],
            $_POST["weight_input"],
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