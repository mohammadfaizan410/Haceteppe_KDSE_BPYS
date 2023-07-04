<?php

require_once("../config-students.php");
?>
<?php
$data = json_decode(file_get_contents('php://input'), true);
$healing_date = DateTime::createFromFormat('Y-m-d', $data["healing_date"]);
$healing_date_formatted = $healing_date->format('Y-m-d');if (isset($data["patient_name"])) {

        $stmt = $db->prepare("INSERT INTO form7 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                occurance_date,
                service_wound ,
                location,
                stage,
                dimentions,
                wound_exudate,
                wound_appearance,
                odor,
                tunnelling,
                edema,
                maceration,
                erythema,
                peeling,
                dryness,
                pain,
                careProducts,
                result,
                healing_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $result = $stmt->execute([
            $data["form_num"],
            $data["patient_name"],
            $data["patient_id"],
            $data["creation_date"],
            $data["update_date"],
            $data["occurance_date"],
            $data["service_wound"],
            $data["location"],
            $data["stage"],
            $data["dimentions"],
            $data["wound_exudate"],
            $data["appearance_wound"],
            $data["odor"],
            $data["tunnelling"],
            $data["edema"],
            $data["maceration"],
            $data["erythema"],
            $data["peeling"],
            $data["dryness"],
            $data["pain"],
            $data["care_products"],
            $data["result"],
            $healing_date_formatted,
        ]);

        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo $result;
        }
    
} else {
    echo "Error.";
}
?>