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
                                    IletisimEngeli,
                                    IletisimEngeliDiger,
                                    refakatci,
                                    refakatciDiger,
                                    UlasmaSikinti,
                                    UlasmaSikintiDiger,
                                    PersonelleIletisim,
                                    PersonelleIletisimDiger,
                                    BakımaKatılma,
                                    İstekli1,
                                    İsteksiz1,
                                    İstekli,
                                    İsteksiz,
                                    TedaviyiKabullenme,
                                    TedaviyiKabullenmeDiger
                WHERE SDiger = ?");

$stmt->execute([
    $_POST["IletisimEngeli"],
    $_POST["IletisimEngeliDiger"],
    $_POST["refakatci"],
    $_POST["refakatciDiger"],
    $_POST["UlasmaSikinti"],
    $_POST["UlasmaSikintiDiger"],
    $_POST["PersonelleIletisim"],
    $_POST["PersonelleIletisimDiger"],
    $_POST["BakımaKatılma"],
    $_POST["İstekli1"],
    $_POST["İsteksiz1"],
    $_POST["İstekli"],
    $_POST["İsteksiz"],
    $_POST["TedaviyiKabullenme"],
    $_POST["TedaviyiKabullenmeDiger"]
            ]);
            echo  "successfully updated";
        }
        else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                                    IletisimEngeli,
                                    IletisimEngeliDiger,
                                    refakatci,
                                    refakatciDiger,
                                    UlasmaSikinti,
                                    UlasmaSikintiDiger,
                                    PersonelleIletisim,
                                    PersonelleIletisimDiger,
                                    BakımaKatılma,
                                    İstekli1,
                                    İsteksiz1,
                                    İstekli,
                                    İsteksiz,
                                    TedaviyiKabullenme,
                                    TedaviyiKabullenmeDiger
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
              
    $stmt->execute([
        $_POST["IletisimEngeli"],
        $_POST["IletisimEngeliDiger"],
        $_POST["refakatci"],
        $_POST["refakatciDiger"],
        $_POST["UlasmaSikinti"],
        $_POST["UlasmaSikintiDiger"],
        $_POST["PersonelleIletisim"],
        $_POST["PersonelleIletisimDiger"],
        $_POST["BakımaKatılma"],
        $_POST["İstekli1"],
        $_POST["İsteksiz1"],
        $_POST["İstekli"],
        $_POST["İsteksiz"],
        $_POST["TedaviyiKabullenme"],
        $_POST["TedaviyiKabullenmeDiger"]
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