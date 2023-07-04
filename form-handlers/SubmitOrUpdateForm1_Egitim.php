
<?php
require_once("../config-students.php");

// form_name : 'form1Egitim',
// id: id,
// patient_id: patient_id,
// patient_name: patient_name,
// radio1: radio1,
// Konu: Konu,
// Nerden: Nerden,
// NeZaman: NeZaman,
// EgitimIstegi: EgitimIstegi,
// TedaviBasvurusu: TedaviBasvurusu,
// TedaviBasvurusuDiger: TedaviBasvurusuDiger

if (isset($_POST["patient_name"])) {

        $stmt = $db->prepare("INSERT INTO egitimform1 (
                form_name,
                patient_name,
                patient_id,
                creation_date,
                update_date,
                radio1,
                Konu,
                Nerden,
                NeZaman,
                EgitimIstegi,
                TedaviBasvurusu,
                TedaviBasvurusuDiger
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([
            $_POST["form_name"],
            $_POST["patient_name"],
            $_POST["patient_id"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["radio1"],
            $_POST["Konu"],
            $_POST["Nerden"],
            $_POST["NeZaman"],
            $_POST["EgitimIstegi"],
            $_POST["TedaviBasvurusu"],
            $_POST["TedaviBasvurusuDiger"]
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