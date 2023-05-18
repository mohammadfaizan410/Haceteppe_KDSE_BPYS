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
                                    venöz_kateter,
                                    PYeri,
                                    PSayısı,
                                    PTakılmaTarihi,
                                    SYeri,
                                    SSayısı,
                                    STakılmaTarihi,
                                    DYeri,
                                    DSayısı,
                                    DTakılmaTarihi,
                                    DigerYeri,
                                    DigerSayısı,
                                    DigerTakılmaTarihi
                WHERE SDiger = ?");

            $stmt->execute([
                $_POST["venöz_kateter"],
                $_POST["PYeri"],
                $_POST["PSayısı"],
                $_POST["PTakılmaTarihi"],
                $_POST["SYeri"],
                $_POST["SSayısı"],
                $_POST["STakılmaTarihi"],
                $_POST["DYeri"],
                $_POST["DSayısı"],
                $_POST["DTakılmaTarihi"],
                $_POST["DigerYeri"],
                $_POST["DigerSayısı"],
                $_POST["DigerTakılmaTarihi"]
            ]);
            echo  "Güncelleme Başarılı!";
        } else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                                    venöz_kateter,
                                    PYeri,
                                    PSayısı,
                                    PTakılmaTarihi,
                                    SYeri,
                                    SSayısı,
                                    STakılmaTarihi,
                                    DYeri,
                                    DSayısı,
                                    DTakılmaTarihi,
                                    DigerYeri,
                                    DigerSayısı,
                                    DigerTakılmaTarihi
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["venöz_kateter"],
                $_POST["PYeri"],
                $_POST["PSayısı"],
                $_POST["PTakılmaTarihi"],
                $_POST["SYeri"],
                $_POST["SSayısı"],
                $_POST["STakılmaTarihi"],
                $_POST["DYeri"],
                $_POST["DSayısı"],
                $_POST["DTakılmaTarihi"],
                $_POST["DigerYeri"],
                $_POST["DigerSayısı"],
                $_POST["DigerTakılmaTarihi"]
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