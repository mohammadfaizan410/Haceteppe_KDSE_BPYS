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
                                    DuzenliCalisma,
                                    CalismiyorSure,
                                    CalisiyorSure,
                                    IsIzni,
                                    IsIzniDiger,
                                    MeslekRiski,
                                    MeslekRiskiDiger,
                                    AileBireyleri,
                                    AileBireyleriDiger,
                                    CocukSayisi,
                                    CocukSayisiDiger,
                                    AileRolu,
                                    Hobi,
                                    HastaneAktivite,
                                    HastaneAktiviteDiger
                WHERE SDiger = ?");

            $stmt->execute([
                $_POST["DuzenliCalisma"],
                $_POST["CalismiyorSure"],
                $_POST["CalisiyorSure"],
                $_POST["IsIzni"],
                $_POST["IsIzniDiger"],
                $_POST["MeslekRiski"],
                $_POST["MeslekRiskiDiger"],
                $_POST["AileBireyleri"],
                $_POST["AileBireyleriDiger"],
                $_POST["CocukSayisi"],
                $_POST["CocukSayisiDiger"],
                $_POST["AileRolu"],
                $_POST["Hobi"],
                $_POST["HastaneAktivite"],
                $_POST["HastaneAktiviteDiger"]
            ]);
            echo  "Güncelleme Başarılı!";
        } else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                                    DuzenliCalisma,
                                    CalismiyorSure,
                                    CalisiyorSure,
                                    IsIzni,
                                    IsIzniDiger,
                                    MeslekRiski,
                                    MeslekRiskiDiger,
                                    AileBireyleri,
                                    AileBireyleriDiger,
                                    CocukSayisi,
                                    CocukSayisiDiger,
                                    AileRolu,
                                    Hobi,
                                    HastaneAktivite,
                                    HastaneAktiviteDiger
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["DuzenliCalisma"],
                $_POST["CalismiyorSure"],
                $_POST["CalisiyorSure"],
                $_POST["IsIzni"],
                $_POST["IsIzniDiger"],
                $_POST["MeslekRiski"],
                $_POST["MeslekRiskiDiger"],
                $_POST["AileBireyleri"],
                $_POST["AileBireyleriDiger"],
                $_POST["CocukSayisi"],
                $_POST["CocukSayisiDiger"],
                $_POST["AileRolu"],
                $_POST["Hobi"],
                $_POST["HastaneAktivite"],
                $_POST["HastaneAktiviteDiger"]
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