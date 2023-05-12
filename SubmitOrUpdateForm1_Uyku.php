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
                                    UykuSuresi,
                                    UykuSorun,
                                    GündüzUykusu,
                                    UykudanYorgun,
                                    UyumaGüçlüğü,
                                    UykununBölünmesi,
                                    UykuSorunDiger,
                                    UykuyaDalmaAliskanligi,
                                    UykuyuEtkileyenFaktorler
                WHERE SDiger = ?");

$stmt->execute([
    $_POST["UykuSuresi"],
    $_POST["UykuSorun"],
    $_POST["GündüzUykusu"],
    $_POST["UykudanYorgun"],
    $_POST["UyumaGüçlüğü"],
    $_POST["UykununBölünmesi"],
    $_POST["UykuSorunDiger"],
    $_POST["UykuyaDalmaAliskanligi"],
    $_POST["UykuyuEtkileyenFaktorler"]
            ]);
            echo  "successfully updated";
        }
        else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                                    UykuSuresi,
                                    UykuSorun,
                                    GündüzUykusu,
                                    UykudanYorgun,
                                    UyumaGüçlüğü,
                                    UykununBölünmesi,
                                    UykuSorunDiger,
                                    UykuyaDalmaAliskanligi,
                                    UykuyuEtkileyenFaktorler
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
              
    $stmt->execute([
        $_POST["UykuSuresi"],
        $_POST["UykuSorun"],
        $_POST["GündüzUykusu"],
        $_POST["UykudanYorgun"],
        $_POST["UyumaGüçlüğü"],
        $_POST["UykununBölünmesi"],
        $_POST["UykuSorunDiger"],
        $_POST["UykuyaDalmaAliskanligi"],
        $_POST["UykuyuEtkileyenFaktorler"]
              ]);
            echo "succesfully inserted";
        }
    } else{

        echo "error";
    }
}
else{
    echo "error";
}
?>