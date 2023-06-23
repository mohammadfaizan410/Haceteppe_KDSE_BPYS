<?php
require_once("config-students.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

?>
<?php

if (isset($_POST["patient_name"])) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form11 SET
                 update_date= ?,
                time_range = ?,
                iv_input1 = ?,
                iv_input2 = ?,
                iv_input3 = ?,
                iv_input4 = ?,
                blood_product1 = ?,
                blood_product2 = ?,
                blood_product3 = ?,
                blood_product4 = ?,
                oral1 = ?,
                oral2 = ?,
                oral3 = ?,
                oral4 = ?,
                idrar_input1 = ?,
                idrar_input2 = ?,
                idrar_input3 = ?,
                idrar_input4 = ?,
                gaita_input1 = ?,
                gaita_input2 = ?,
                gaita_input3 = ?,
                gaita_input4 = ?,
                aldigi_total1 = ?,
                aldigi_total2 = ?,
                aldigi_total3 = ?,
                aldigi_total4 = ?,
                cikardigi_total1 = ?,
                cikardigi_total2 = ?,
                cikardigi_total3 = ?,
                cikardigi_total4 = ?,
                total = ?
                WHERE form_id = ?");

        $result =  $stmt->execute([
            $_POST["creation_date"],
            $_POST["time_range"],
            $_POST["iv_input1"],
            $_POST["iv_input2"],
            $_POST["iv_input3"],
            $_POST["iv_input4"],
            $_POST["blood_product1"],
            $_POST["blood_product2"],
            $_POST["blood_product3"],
            $_POST["blood_product4"],
            $_POST["oral1"],
            $_POST["oral2"],
            $_POST["oral3"],
            $_POST["oral4"],
            $_POST["idrar_input1"],
            $_POST["idrar_input2"],
            $_POST["idrar_input3"],
            $_POST["idrar_input4"],
            $_POST["gaita_input1"],
            $_POST["gaita_input2"],
            $_POST["gaita_input3"],
            $_POST["gaita_input4"],
            $_POST["aldigi_total1"],
            $_POST["aldigi_total2"],
            $_POST["aldigi_total3"],
            $_POST["aldigi_total4"],
            $_POST["cikardigi_total1"],
            $_POST["cikardigi_total2"],
            $_POST["cikardigi_total3"],
            $_POST["cikardigi_total4"],
            $_POST["total"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {

        $result =   $stmt = $db->prepare("INSERT INTO form11 (
                form_num,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                time_range,
                iv_input1,
                iv_input2,
                iv_input3,
                iv_input4,
                blood_product1,
                blood_product2,
                blood_product3,
                blood_product4,
                oral1,
                oral2,
                oral3,
                oral4,
                idrar_input1,
                idrar_input2,
                idrar_input3,
                idrar_input4,
                gaita_input1,
                gaita_input2,
                gaita_input3,
                gaita_input4,
                aldigi_total1,
                aldigi_total2,
                aldigi_total3,
                aldigi_total4,
                cikardigi_total1,
                cikardigi_total2,
                cikardigi_total3,
                cikardigi_total4,
                total
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST["form_num"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["time_range"],
            $_POST["iv_input1"],
            $_POST["iv_input2"],
            $_POST["iv_input3"],
            $_POST["iv_input4"],
            $_POST["blood_product1"],
            $_POST["blood_product2"],
            $_POST["blood_product3"],
            $_POST["blood_product4"],
            $_POST["oral1"],
            $_POST["oral2"],
            $_POST["oral3"],
            $_POST["oral4"],
            $_POST["idrar_input1"],
            $_POST["idrar_input2"],
            $_POST["idrar_input3"],
            $_POST["idrar_input4"],
            $_POST["gaita_input1"],
            $_POST["gaita_input2"],
            $_POST["gaita_input3"],
            $_POST["gaita_input4"],
            $_POST["aldigi_total1"],
            $_POST["aldigi_total2"],
            $_POST["aldigi_total3"],
            $_POST["aldigi_total4"],
            $_POST["cikardigi_total1"],
            $_POST["cikardigi_total2"],
            $_POST["cikardigi_total3"],
            $_POST["cikardigi_total4"],
            $_POST["total"],
        ]);
        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo $result;
        }
    }
} else {
    echo "Error.";
}
?>