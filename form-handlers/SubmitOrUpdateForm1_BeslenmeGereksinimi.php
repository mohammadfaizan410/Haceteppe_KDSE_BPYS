
<?php
require_once("../config-students.php");

echo $_POST["nutrition_issue_var"];

if (isset($_POST["patient_name"])) {

    if (isset($_POST['isUpdate'])) {
        $stmt = $db->prepare("UPDATE form1_beslenme SET
        update_date = ?,
        workStatus = ?,
        workingTime = ?,
        nonWorkingTime = ?,
        workInterruption = ?,
        workInterruptionInput = ?,
        workRisk = ?,
        workRiskInput = ?,
        familyMembers = ?,
        numberOfChildren = ?,
        roleInFamily = ?,
        hobbies = ?,
        hospitalSocialActivities = ?,
        otherActivities = ?

        WHERE form_id = ?");
        $result = $stmt->execute([
            $_POST["creation_date"],
            $_POST["workStatus"],
            $_POST["workingTime"],
            $_POST["nonWorkingTime"],
            $_POST["workInterruption"],
            $_POST["workInterruptionInput"],
            $_POST["workRisk"],
            $_POST["workRiskInput"],
            $_POST["familyMembers"],
            $_POST["numberOfChildren"],
            $_POST["roleInFamily"],
            $_POST["hobbies"],
            $_POST["hospitalSocialActivities"],
            $_POST["otherActivities"],
            $_POST["form_id"]
        ]);
        if ($result) {
            echo $result;
        } else {
            echo "Error could not update data!";
        }
    } else {
        $stmt = $db->prepare("INSERT INTO form1_beslenme (
            patient_id,
            patient_name,
            creation_date,
            update_date,
            OgunSayisi,
            TukettigiBesin,
            PisirmeYontemi,
            Boy,
            Kilo,
            BKI,
            nutritional_needs,
            diet,
            diet_input,
            food_consumption,
            food_consumption_var,
            liquid_consumption,
            diet_eating_process,
            with_probe,
            nazal_radio,
            sag_nazal_input,
            sol_nazal_input,
            orogastrik_input,
            gastrostomi_input,
            jejunostomi_input,
            gastric_residue,
            gastric_residue_ml,
            nazogastrik_decompression_radio,
            chewing_difficulty,
            weight_loss,
            weight_loss_var,
            weight_gain,
            weight_gain_var,
            nutrition_issue,
            nutrition_issue_var,
            lip_color_issue,
            lip_color_issue_var,
            oral_mucosa_issue,
            oral_mucosa_issue_var,
            teeth_gums_issue,
            teeth_gums_issue_var,
            tongue_issue,
            tongue_issue_var,
            pharynx_issue,
            pharynx_issue_var,
            tonsils_issue,
            tonsils_issue_var,
            abdominal_issue,
            abdominal_contour,
            herniation,
            herniation_input,
            umbelikus,
            abdominal_rash,
            abdominal_acites,
            abdominal_mass_place,
            abdominal_mass_size,
            abdominal_mass_description,
            pigmentation,
            stria,
            scar,
            scar_input
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        $nutrition_issue_var =  $_POST["nutrition_issue_var"];
        if($_POST["nutrition_issue_var"] != "empty"){
            $nutrition_issue_var = serialize($nutrition_issue_var);
        }

        $lip_color_issue_var =  $_POST["lip_color_issue_var"];
        if($_POST["lip_color_issue_var"] != "empty"){
            $lip_color_issue_var = serialize($lip_color_issue_var);
        }

        $oral_mucosa_issue_var =  $_POST["oral_mucosa_issue_var"];
        if($_POST["oral_mucosa_issue_var"] != "empty"){
            $oral_mucosa_issue_var = serialize($oral_mucosa_issue_var);
        }

        $teeth_gums_issue_var =  $_POST["teeth_gums_issue_var"];
        if($_POST["teeth_gums_issue_var"] != "empty"){
            $teeth_gums_issue_var = serialize($teeth_gums_issue_var);
        }

        $tongue_issue_var =  $_POST["tongue_issue_var"];
        if($_POST["tongue_issue_var"] != "empty"){
            $tongue_issue_var = serialize($tongue_issue_var);
        }

        $pharynx_issue_var =  $_POST["pharynx_issue_var"];
        if($_POST["pharynx_issue_var"] != "empty"){
            $pharynx_issue_var = serialize($pharynx_issue_var);
        }

        $tonsils_issue_var =  $_POST["tonsils_issue_var"];
        if($_POST["tonsils_issue_var"] != "empty"){
            $tonsils_issue_var = serialize($tonsils_issue_var);
        }


        $result = $stmt->execute([
            $_POST["patient_id"],
            $_POST["patient_name"],
            $_POST["creation_date"],
            $_POST["update_date"],
            $_POST["OgunSayisi"],
            $_POST["TukettigiBesin"],
            $_POST["PisirmeYontemi"],
            $_POST["Boy"],
            $_POST["Kilo"],
            $_POST["BKI"],
            $_POST["nutritional_needs"],
            $_POST["diet"],
            $_POST["diet_input"],
            $_POST["food_consumption"],
            $_POST["food_consumption_var"],
            $_POST["liquid_consumption"],
            $_POST["diet_eating_process"],
            $_POST["with_probe"],
            $_POST["nazal_radio"],
            $_POST["sag_nazal_input"],
            $_POST["sol_nazal_input"],
            $_POST["orogastrik_input"],
            $_POST["gastrostomi_input"],
            $_POST["jejunostomi_input"],
            $_POST["gastric_residue"],
            $_POST["gastric_residue_ml"],
            $_POST["nazogastrik_decompression_radio"],
            $_POST["chewing_difficulty"],
            $_POST["weight_loss"],
            $_POST["weight_loss_var"],
            $_POST["weight_gain"],
            $_POST["weight_gain_var"],
            $_POST["nutrition_issue"],
            $nutrition_issue_var,
            $_POST["lip_color_issue"],
            $lip_color_issue_var,
            $_POST["oral_mucosa_issue"],
            $oral_mucosa_issue_var,
            $_POST["teeth_gums_issue"],
            $teeth_gums_issue_var,
            $_POST["tongue_issue"],
            $tongue_issue_var,
            $_POST["pharynx_issue"],
            $pharynx_issue_var,
            $_POST["tonsils_issue"],
            $tonsils_issue_var,
            $_POST["abdominal_issue"],
            $_POST["abdominal_contour"],
            $_POST["herniation"],
            $_POST["herniation_input"],
            $_POST["umbelikus"],
            $_POST["abdominal_rash"],
            $_POST["abdominal_acites"],
            $_POST["abdominal_mass_place"],
            $_POST["abdominal_mass_size"],
            $_POST["abdominal_mass_description"],
            $_POST["pigmentation"],
            $_POST["stria"],
            $_POST["scar"],
            $_POST["scar_input"]
        ]);

        if ($result) {
            echo "Ekleme Başarılı";
        } else {
            echo "Error: could not inserted!";
        }
    }
} else {
    echo "Error: Post data not set!";
}
?>