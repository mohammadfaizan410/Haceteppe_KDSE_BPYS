<?php
require_once("config-students.php");
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
                           HareketAliskanligi,
                           EgzersizDurumu,
                           ROM_egzersizi,
                           ROM_egzersizi_diger,
                           HareketIstegi,
                           Yorgunluk,
                           Huzursuzluk,
                           HDiğer,
                           giyinme_soyunma,
                           pozisyon_degistirme,
                           AyağaKalkma,
                           yurume
                WHERE SDiger = ?");

            $stmt->execute([
                $_POST["HareketAliskanligi"],
                $_POST["EgzersizDurumu"],
                $_POST["ROM_egzersizi"],
                $_POST["ROM_egzersizi_diger"],
                $_POST["HareketIstegi"],
                $_POST["Yorgunluk"],
                $_POST["Huzursuzluk"],
                $_POST["HDiğer"],
                $_POST["giyinme_soyunma"],
                $_POST["pozisyon_degistirme"],
                $_POST["AyağaKalkma"],
                $_POST["yurume"]
            ]);
            echo  "Güncelleme Başarılı!";
        } else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                           HareketAliskanligi,
                           EgzersizDurumu,
                           ROM_egzersizi,
                           ROM_egzersizi_diger,
                           HareketIstegi,
                           Yorgunluk,
                           Huzursuzluk,
                           HDiğer,
                           giyinme_soyunma,
                           pozisyon_degistirme,
                           AyağaKalkma,
                           yurume
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["HareketAliskanligi"],
                $_POST["EgzersizDurumu"],
                $_POST["ROM_egzersizi"],
                $_POST["ROM_egzersizi_diger"],
                $_POST["HareketIstegi"],
                $_POST["Yorgunluk"],
                $_POST["Huzursuzluk"],
                $_POST["HDiğer"],
                $_POST["giyinme_soyunma"],
                $_POST["pozisyon_degistirme"],
                $_POST["AyağaKalkma"],
                $_POST["yurume"]
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