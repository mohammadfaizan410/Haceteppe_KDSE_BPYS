<?php
require_once("config-students.php");
?>
<?php
$data = json_decode(file_get_contents('php://input'), true);

$healing_date = date('Y-m-d', strtotime($data["healing_date"]));
if (isset($data["patient_name"])) {
    if (isset($data["isUpdate"])){

        $stmt = $db->prepare("UPDATE form7 SET 
                    update_date = ?,
                    occurance_date = ?,
                    service_wound  = ?,
                    location = ?,
                    stage = ?,
                    dimentions = ?,
                    wound_exudate = ?,
                    wound_appearance = ?,
                    odor = ?,
                    tunnelling = ?,
                    edema = ?,
                    maceration = ?,
                    erythema = ?,
                    peeling = ?,
                    dryness = ?,
                    pain = ?,
                    careProducts = ?,
                    result = ?,
                    healing_date = ?
                      WHERE form_id = ?");

$stmt->execute([
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
                        $healing_date,
                        $data["form_id"],
                    ]);
                    
                    
                    echo  "Successfully updated form 7";
                }
                else {
                    
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
            
    $stmt->execute([
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
        $healing_date,
    ]);
    
    
    echo "Successfully inserted into form7";
}
}

else{
    echo "Error.";
}
?>