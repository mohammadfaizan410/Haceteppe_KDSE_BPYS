<?php
require_once("config-students.php");
?>

<?php
if (isset($_POST)) {
    if (isset($_POST['isUpdate'])) {
            $stmt = $db->prepare("UPDATE uykuForm1 SET
                                    update_date,
                                    UykuSuresi,
                                    UykuSorun,
                                    GündüzUykusu,
                                    UykudanYorgun,
                                    UyumaGüçlüğü,
                                    UykununBölünmesi,
                                    UykuSorunDiger,
                                    UykuyaDalmaAliskanligi,
                                    UykuyuEtkileyenFaktorler
                WHERE form_id = ?");

$stmt->execute([
    $_POST["creation_date"],
    $_POST["UykuSuresi"],
    $_POST["UykuSorun"],
    $_POST["GündüzUykusu"],
    $_POST["UykudanYorgun"],
    $_POST["UyumaGüçlüğü"],
    $_POST["UykununBölünmesi"],
    $_POST["UykuSorunDiger"],
    $_POST["UykuyaDalmaAliskanligi"],
    $_POST["UykuyuEtkileyenFaktorler"],
    $_POST["form_id"]
            ]);
      if($result){
      echo "Successfully Updated!";
      }
      else{
      echo $result;
      }
    }
        else {
            $stmt = $db->prepare("INSERT INTO uykuForm1 (
                                    patient_name,
                                    patient_id,
                                    form_num,
                                    creation_date,
                                    update_date,
                                    UykuSuresi,
                                    UykuSorun,
                                    GündüzUykusu,
                                    UykudanYorgun,
                                    UyumaGüçlüğü,
                                    UykununBölünmesi,
                                    UykuSorunDiger,
                                    UykuyaDalmaAliskanligi,
                                    UykuyuEtkileyenFaktorler
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
              
    $stmt->execute([
        $_POST["patient_name"],
        $_POST["patient_id"],
        $_POST["form_num"],
        $_POST["creation_date"],
        $_POST["update_date"],
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
              if($result){
                echo "Successfully Inserted!";
                }
                else{
                echo $result;
                }
              }
          }
    } else{

        echo "error";
    }
?>
