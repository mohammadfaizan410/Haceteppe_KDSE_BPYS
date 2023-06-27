<?php
require_once("../config-students.php");
?>

<?php
if (isset($_POST)) {
    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE bosaltimform1 SET
            patient_id = ?,
            patient_name = ?,
            update_date = ?,
            stoolEmptyingHelp = ?,
            hospitalStoolEmptyingFrequency = ?,
            hospitalStoolEmptyingDate = ?,
            bosaltimSorun = ?,
            excretionProblems = ?,
            bagirsak_sesleri = ?,
            defekasyon_zamani = ?,
            defekasyon_tekrari = ?,
            bosaltimSekli = ?,
            excretionForm = ?,
            kolostomExcretionForm = ?,
            kolostomStomaninRengi = ?,
            ileostomiExcretionForm = ?,
            ileostomiStomaninRengi = ?,
            protezlertable = ?,
            bosaltimdaSorun = ?,
            excretionIssues = ?,
            Mesane_kateterizasyonu = ?,
            mesane_takilma_tarihi = ?,
            attachmentPurpose = ?,
            ureterestomi = ?,
            ureter = ?,
            Sistostomi = ?,
            IdrarRengi = ?,
            IdrarBerrakligi = ?
        WHERE form_id = ?");

        $result = $stmt->execute([
            $_POST["patient_id"],
            $_POST["patient_name"],
            $_POST["update_date"],
            $_POST["stoolEmptyingHelp"],
            $_POST["hospitalStoolEmptyingFrequency"],
            $_POST["hospitalStoolEmptyingDate"],
            $_POST["bosaltimSorun"],
            $_POST["excretionProblems"],
            $_POST["bagirsak_sesleri"],
            $_POST["defekasyon_zamani"],
            $_POST["defekasyon_tekrari"],
            $_POST["bosaltimSekli"],
            $_POST["excretionForm"],
            $_POST["kolostomExcretionForm"],
            $_POST["kolostomStomaninRengi"],
            $_POST["ileostomiExcretionForm"],
            $_POST["ileostomiStomaninRengi"],
            $_POST["protezlertable"],
            $_POST["bosaltimdaSorun"],
            $_POST["excretionIssues"],
            $_POST["Mesane_kateterizasyonu"],
            $_POST["mesane_takilma_tarihi"],
            $_POST["attachmentPurpose"],
            $_POST["ureterestomi"],
            $_POST["ureter"],
            $_POST["Sistostomi"],
            $_POST["IdrarRengi"],
            $_POST["IdrarBerrakligi"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo "Güncelleme Başarılı!";
        } else {
            echo $result;
        }
    } else {
            $stmt = $db->prepare("INSERT INTO bosaltimform1 (
                patient_id,
                patient_name,
                creation_date,
                update_date,
                stoolEmptyingHelp,
                hospitalStoolEmptyingFrequency,
                hospitalStoolEmptyingDate,
                bosaltimSorun,
                excretionProblems,
                bagirsak_sesleri,
                defekasyon_zamani,
                defekasyon_tekrari,
                bosaltimSekli,
                excretionForm,
                kolostomExcretionForm,
                kolostomStomaninRengi,
                ileostomiExcretionForm,
                ileostomiStomaninRengi,
                protezlertable,
                bosaltimdaSorun,
                excretionIssues,
                Mesane_kateterizasyonu,
                mesane_takilma_tarihi,
                attachmentPurpose,
                ureterestomi,
                ureter,
                Sistostomi,
                IdrarRengi,
                IdrarBerrakligi
              ) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
              
              $result = $stmt->execute([
                $_POST["patient_id"],
                $_POST["patient_name"],
                $_POST["creation_date"],
                $_POST["update_date"],
                $_POST["stoolEmptyingHelp"],
                $_POST["hospitalStoolEmptyingFrequency"],
                $_POST["hospitalStoolEmptyingDate"],
                $_POST["bosaltimSorun"],
                $_POST["excretionProblems"],
                $_POST["bagirsak_sesleri"],
                $_POST["defekasyon_zamani"],
                $_POST["defekasyon_tekrari"],
                $_POST["bosaltimSekli"],
                $_POST["excretionForm"],
                $_POST["kolostomExcretionForm"],
                $_POST["kolostomStomaninRengi"],
                $_POST["ileostomiExcretionForm"],
                $_POST["ileostomiStomaninRengi"],
                $_POST["protezlertable"],
                $_POST["bosaltimdaSorun"],
                $_POST["excretionIssues"],
                $_POST["Mesane_kateterizasyonu"],
                $_POST["mesane_takilma_tarihi"],
                $_POST["attachmentPurpose"],
                $_POST["ureterestomi"],
                $_POST["ureter"],
                $_POST["Sistostomi"],
                $_POST["IdrarRengi"],
                $_POST["IdrarBerrakligi"]
              ]);              
            if ($result) {
                echo $result;
            } else {
                echo $result;
            }
        }
} else {
    echo "error";
}
?>