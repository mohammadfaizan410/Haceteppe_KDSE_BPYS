<?php
require_once("../config-students.php");
?>

<?php
if (isset($_POST)) {
    $sql = "SELECT * FROM  form1_solunumgereksinimi  WHERE SDiger =" . $_POST["SDiger"];
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form1_beslenmegereksinimi SET
                            radio1,
                            Konu,
                            Nerden,
                            NeZaman,
                            EgitimIstegi,
                            TedaviBasvurusu,
                            TedaviBasvurusuDiger
                WHERE SDiger = ?");

            $stmt->execute([
                $_POST["radio1"],
                $_POST["Konu"],
                $_POST["Nerden"],
                $_POST["NeZaman"],
                $_POST["EgitimIstegi"],
                $_POST["TedaviBasvurusu"],
                $_POST["TedaviBasvurusuDiger"]
            ]);
            echo  "Güncelleme Başarılı!";
        } else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                            radio1,
                            Konu,
                            Nerden,
                            NeZaman,
                            EgitimIstegi,
                            TedaviBasvurusu,
                            TedaviBasvurusuDiger
              ) VALUES (?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["radio1"],
                $_POST["Konu"],
                $_POST["Nerden"],
                $_POST["NeZaman"],
                $_POST["EgitimIstegi"],
                $_POST["TedaviBasvurusu"],
                $_POST["TedaviBasvurusuDiger"]
            ]);
            echo "succesfully inserted";
        }
    } else {

        echo "error";
    }
} else {
    echo "error";
}
?>