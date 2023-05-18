<?php
require_once("config-students.php");
?>

<?php
if (isset($_POST)) {
    $sql = "SELECT * FROM  form1_solunumgereksinimi  WHERE Kitle_Ozelligi =" . $_POST["Kitle_Ozelligi"];
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if ($result) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        if (count($values) > 0) {
            $stmt = $db->prepare("UPDATE form1_solunumgereksinimi SET
                yatisdurumuradio,
                SolunumSorunu,
                Dispne,
                Hiperventilasyon,
                Hipoventilasyon,
                Takipne,
                Bradipne,
                Siyanoz,
                Diğer,
                solunum_diger,
                SolunumYolu,
                Trakeostomi,
                EndotrakealTüp,
                Oksurme,
                Etkisiz,
                OksurmeDiğer,
                oksurme_diger,
                Balgam,
                EtkisizBalgam,
                NormalBalgam,
                AşırıKıvamlı,
                BalgamDiğer,
                balgam_diger,
                AspirasyonIhtiyaci,
                Oro_Nazofarengeal,
                Trakeal,
                BurunMuayenesi,
                NazalMukoza,
                NazalSeptumda,
                NazalKanama,
                NazalLezyon,
                NazalAkinti,
                NazalDiger,
                nazal_diger,
                TiroidBezi,
                Sislik,
                TiroidDiger,
                Trakea,
                SagaKayma,
                SolaKayma,
                LenfNodlari,
                Yeri,
                NodYeri,
                NodDiger,
                SkapulaSimatrikligi,
                OmurgaDeform,
                Kifoz,
                Lordoz,
                Skolyoz,
                GogusHareketleri,
                GogusKafesinde,
                KrepitasyonAlani,
                Krepitasyon_Alani,
                Hassasiyet,
                Kitle_Ozelligi,
                KitleDiger,
                Kitle_Diger,
                GogusDeformitesi,
                FiciGogus,
                GuvercinGogus,
                Kunduracı,
                SolunumSistemiUygilamasi,
                SolunumUygulamasi_diger
                WHERE Kitle_Ozelligi = ?");

            $stmt->execute([
                $_POST["yatisdurumuradio"],
                $_POST["SolunumSorunu"],
                $_POST["Dispne"],
                $_POST["Hiperventilasyon"],
                $_POST["Hipoventilasyon"],
                $_POST["Takipne"],
                $_POST["Bradipne"],
                $_POST["Siyanoz"],
                $_POST["Diğer"],
                $_POST["solunum_diger"],
                $_POST["SolunumYolu"],
                $_POST["Trakeostomi"],
                $_POST["EndotrakealTüp"],
                $_POST["Oksurme"],
                $_POST["Etkisiz"],
                $_POST["OksurmeDiğer"],
                $_POST["oksurme_diger"],
                $_POST["Balgam"],
                $_POST["EtkisizBalgam"],
                $_POST["NormalBalgam"],
                $_POST["AşırıKıvamlı"],
                $_POST["BalgamDiğer"],
                $_POST["balgam_diger"],
                $_POST["AspirasyonIhtiyaci"],
                $_POST["Oro_Nazofarengeal"],
                $_POST["Trakeal"],
                $_POST["BurunMuayenesi"],
                $_POST["NazalMukoza"],
                $_POST["NazalSeptumda"],
                $_POST["NazalKanama"],
                $_POST["NazalLezyon"],
                $_POST["NazalAkinti"],
                $_POST["NazalDiger"],
                $_POST["nazal_diger"],
                $_POST["TiroidBezi"],
                $_POST["Sislik"],
                $_POST["TiroidDiger"],
                $_POST["Trakea"],
                $_POST["SagaKayma"],
                $_POST["SolaKayma"],
                $_POST["LenfNodlari"],
                $_POST["Yeri"],
                $_POST["NodYeri"],
                $_POST["NodDiger"],
                $_POST["SkapulaSimatrikligi"],
                $_POST["OmurgaDeform"],
                $_POST["Kifoz"],
                $_POST["Lordoz"],
                $_POST["Skolyoz"],
                $_POST["GogusHareketleri"],
                $_POST["GogusKafesinde"],
                $_POST["KrepitasyonAlani"],
                $_POST["Krepitasyon_Alani"],
                $_POST["Hassasiyet"],
                $_POST["Kitle_Ozelligi"],
                $_POST["KitleDiger"],
                $_POST["Kitle_Diger"],
                $_POST["GogusDeformitesi"],
                $_POST["FiciGogus"],
                $_POST["GuvercinGogus"],
                $_POST["Kunduracı"],
                $_POST["SolunumSistemiUygilamasi"],
                $_POST["SolunumUygulamasi_diger"]
            ]);
            echo  "Güncelleme Başarılı!";
        } else {
            $stmt = $db->prepare("INSERT INTO form1_solunumgereksinimi (
                yatisdurumuradio,
                SolunumSorunu,
                Dispne,
                Hiperventilasyon,
                Hipoventilasyon,
                Takipne,
                Bradipne,
                Siyanoz,
                Diğer,
                solunum_diger,
                SolunumYolu,
                Trakeostomi,
                EndotrakealTüp,
                Oksurme,
                Etkisiz,
                OksurmeDiğer,
                oksurme_diger,
                Balgam,
                EtkisizBalgam,
                NormalBalgam,
                AşırıKıvamlı,
                BalgamDiğer,
                balgam_diger,
                AspirasyonIhtiyaci,
                Oro_Nazofarengeal,
                Trakeal,
                BurunMuayenesi,
                NazalMukoza,
                NazalSeptumda,
                NazalKanama,
                NazalLezyon,
                NazalAkinti,
                NazalDiger,
                nazal_diger,
                TiroidBezi,
                Sislik,
                TiroidDiger,
                Trakea,
                SagaKayma,
                SolaKayma,
                LenfNodlari,
                Yeri,
                NodYeri,
                NodDiger,
                SkapulaSimatrikligi,
                OmurgaDeform,
                Kifoz,
                Lordoz,
                Skolyoz,
                GogusHareketleri,
                GogusKafesinde,
                KrepitasyonAlani,
                Krepitasyon_Alani,
                Hassasiyet,
                Kitle_Ozelligi,
                KitleDiger,
                Kitle_Diger,
                GogusDeformitesi,
                FiciGogus,
                GuvercinGogus,
                Kunduracı,
                SolunumSistemiUygilamasi,
                SolunumUygulamasi_diger
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                $_POST["yatisdurumuradio"],
                $_POST["SolunumSorunu"],
                $_POST["Dispne"],
                $_POST["Hiperventilasyon"],
                $_POST["Hipoventilasyon"],
                $_POST["Takipne"],
                $_POST["Bradipne"],
                $_POST["Siyanoz"],
                $_POST["Diğer"],
                $_POST["solunum_diger"],
                $_POST["SolunumYolu"],
                $_POST["Trakeostomi"],
                $_POST["EndotrakealTüp"],
                $_POST["Oksurme"],
                $_POST["Etkisiz"],
                $_POST["OksurmeDiğer"],
                $_POST["oksurme_diger"],
                $_POST["Balgam"],
                $_POST["EtkisizBalgam"],
                $_POST["NormalBalgam"],
                $_POST["AşırıKıvamlı"],
                $_POST["BalgamDiğer"],
                $_POST["balgam_diger"],
                $_POST["AspirasyonIhtiyaci"],
                $_POST["Oro_Nazofarengeal"],
                $_POST["Trakeal"],
                $_POST["BurunMuayenesi"],
                $_POST["NazalMukoza"],
                $_POST["NazalSeptumda"],
                $_POST["NazalKanama"],
                $_POST["NazalLezyon"],
                $_POST["NazalAkinti"],
                $_POST["NazalDiger"],
                $_POST["nazal_diger"],
                $_POST["TiroidBezi"],
                $_POST["Sislik"],
                $_POST["TiroidDiger"],
                $_POST["Trakea"],
                $_POST["SagaKayma"],
                $_POST["SolaKayma"],
                $_POST["LenfNodlari"],
                $_POST["Yeri"],
                $_POST["NodYeri"],
                $_POST["NodDiger"],
                $_POST["SkapulaSimatrikligi"],
                $_POST["OmurgaDeform"],
                $_POST["Kifoz"],
                $_POST["Lordoz"],
                $_POST["Skolyoz"],
                $_POST["GogusHareketleri"],
                $_POST["GogusKafesinde"],
                $_POST["KrepitasyonAlani"],
                $_POST["Krepitasyon_Alani"],
                $_POST["Hassasiyet"],
                $_POST["Kitle_Ozelligi"],
                $_POST["KitleDiger"],
                $_POST["Kitle_Diger"],
                $_POST["GogusDeformitesi"],
                $_POST["FiciGogus"],
                $_POST["GuvercinGogus"],
                $_POST["Kunduracı"],
                $_POST["SolunumSistemiUygilamasi"],
                $_POST["SolunumUygulamasi_diger"]
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