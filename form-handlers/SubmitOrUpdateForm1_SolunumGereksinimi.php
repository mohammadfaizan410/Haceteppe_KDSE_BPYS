<?php
require_once("../config-students.php");
?>

<?php
if (isset($_POST)) {
    
        $stmt = $db->prepare("INSERT INTO solunumgereksinimi_form1 (
            form_name,
            patient_name,
            patient_id,
            creationDate,
            updateDate,
            yatisdurumuradio,
            SolunumSorunu,
            breathingProblems,
            solunum_diger,
            SolunumYolu,
            airwayMethod,
            Oksurme,
            coughOption,
            oksurme_diger,
            Balgam,
            BalgamType,
            balgam_diger,
            AspirasyonIhtiyaci,
            aspirasyonNeeds,
            BurunMuayenesi,
            nasalIssues,
            nazal_diger,
            TiroidBezi,
            thyroidIssue,
            TiroidDiger,
            Trakea,
            Shift,
            LenfNodlari,
            NodYeri,
            NodDiger,
            SkapulaSimatrikligi,
            OmurgaDeform,
            SpinalDeformities,
            GogusHareketleri,
            GogusKafesinde,
            Krepitasyon_Alani,
            Hassasiyet,
            Kitle_Ozelligi,
            Kitle_Diger,
            GogusDeformitesi,
            DeformityTypes,
            SolunumSistemiUygilamasi,
            SolunumUygulamasi_diger
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $result = $stmt->execute([
            $_POST['form_name'],
            $_POST['patient_name'],
            $_POST['patient_id'],
            $_POST['creationDate'],
            $_POST['updateDate'],
            $_POST["yatisdurumuradio"],
            $_POST["SolunumSorunu"],
            $_POST["breathingProblems"],
            $_POST["solunum_diger"],
            $_POST["SolunumYolu"],
            $_POST['airwayMethod'],
            $_POST["Oksurme"],
            $_POST['coughOption'],
            $_POST["oksurme_diger"],
            $_POST["Balgam"],
            $_POST['BalgamType'],
            $_POST["balgam_diger"],
            $_POST["AspirasyonIhtiyaci"],
            $_POST['aspirasyonNeeds'],
            $_POST["BurunMuayenesi"],
            $_POST['nasalIssues'],
            $_POST["nazal_diger"],
            $_POST["TiroidBezi"],
            $_POST['tiroidIssue'],
            $_POST["TiroidDiger"],
            $_POST["Trakea"],
            $_POST['Shift'],
            $_POST["LenfNodlari"],
            $_POST["NodYeri"],
            $_POST["NodDiger"],
            $_POST["SkapulaSimatrikligi"],
            $_POST["OmurgaDeform"],
            $_POST['SpinalDeformities'],
            $_POST["GogusHareketleri"],
            $_POST["GogusKafesinde"],
            $_POST["Krepitasyon_Alani"],
            $_POST["Hassasiyet"],
            $_POST["Kitle_Ozelligi"],
            $_POST["Kitle_Diger"],
            $_POST["GogusDeformitesi"],
            $_POST['DeformityTypes'],
            $_POST["SolunumSistemiUygilamasi"],
            $_POST["SolunumUygulamasi_diger"]
        ]);
        if ($result){
            echo "succesfully inserted";
        } else {
            echo $result;
        }
    
} else {
    echo 'error';
}
?>