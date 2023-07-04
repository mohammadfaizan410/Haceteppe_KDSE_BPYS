<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: main.php");
}
require_once('../config-students.php');
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
if (isset($_GET['display'])) {
    $display = $_GET['display'];
} else {
    $display = 0;
}
$sql = "SELECT * FROM ozgecmisform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $ozgecmisform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">
    <style>
            body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

#tick-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: none; /* Hide the tick container initially */
  align-items: center;
  justify-content: center;
  z-index: 9999;
  background-color: #ffffff;
}

#tick {
  width: 50%;
  height: 50%;
  background-size: contain;
  background-repeat: no-repeat;
  position: absolute;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) translateX(25%);
}
    </style>

</head>

<body style="background-color:white">
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>

            <h1 class="form-header">HASTA DEĞERLENDİRME FORMU</h1>
            <div class=" patients-save">
                <form action="" method="" class="patients-save-fields p-3">
                    <div class="input-section-wrapper">

                        <div class="input-section-item">

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Hasta Adı Soyadı:</p>
                                <input type="text" class="form-control" name="nameSurname" id="nameSurname"
                                    placeholder="Hasta Adı Soyadı Giriniz" value="<?php echo $ozgecmisform1[0]['nameSurname'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Doğum Yeri:</p>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    placeholder="Doğum Yeri Giriniz" value="<?php echo $ozgecmisform1[0]['dob'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Hasta Yaşı</p>
                                <input type="number" class="form-control" name="age" id="age"
                                    placeholder="Hasta Yaşı Giriniz" value="<?php echo $ozgecmisform1[0]['age'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Cinsiyeti:</p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                                <div class="checkbox-wrapper d-flex">
                                    <div class="checkboxes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender"
                                                value="Erkek">
                                            <label class="form-check-label" for="cinsiyet">
                                                <span class="checkbox-header"> Erkek </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender"
                                                value="Kadın">
                                            <label class="form-check-label" for="cinsiyet">
                                                <span class="checkbox-header"> Kadın </span>

                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Medeni Durumu:</p>
                                <input type="text" class="form-control"  name="maritalStatus" id="maritalStatus"
                                    placeholder="Medeni Durumu Giriniz" value="<?php echo $ozgecmisform1[0]['maritalStatus'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Mesleği:</p>
                                <input type="text" class="form-control"  name="profession" id="profession"
                                    placeholder="Mesleği Durumu Giriniz" value="<?php echo $ozgecmisform1[0]['profession'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Eğitim Durumu:</p>
                                <input type="text" class="form-control"  name="education" id="education"
                                    placeholder="Eğitim Durumu Giriniz" value="<?php echo $ozgecmisform1[0]['education'] ?>">
                            </div>

                        </div>

                        <div class="input-section-item">
                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Protokol/Dosya No:</p>
                                <input type="text" class="form-control"  name="protocol_file_no"
                                    id="protocol_file_no" placeholder="Protokol/Dosya No Giriniz" value="<?php echo $ozgecmisform1[0]['protocol_file_no'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Yatış Tarihi:</p>
                                <input type="date" class="form-control"  name="admissionDate" id="admissionDate"
                                    placeholder="Protokol/Dosya No Giriniz" value="<?php echo $ozgecmisform1[0]['admissionDate'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Bölüm:</p>
                                <input type="text" class="form-control"  name="department" id="department"
                                    placeholder="Bölüm Giriniz" value="<?php echo $ozgecmisform1[0]['department'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Tıbbi Tanı:</p>
                                <input type="text" class="form-control"  name="diagnosis" id="diagnosis"
                                    placeholder="Tıbbi Tanıyı Giriniz" value="<?php echo $ozgecmisform1[0]['diagnosis'] ?>">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Doktor Adı Soyadı:</p>
                                <input type="text" class="form-control"  name="doctorName"
                                    id="doctorName" placeholder="Doktor Adı Soyadı Giriniz" value="<?php echo $ozgecmisform1[0]['doctorName'] ?>">
                            </div>



                            <div class="input-section d-flex">
                                <p class="usernamelabel m-2">Çocuk Sayısı:</p>
                                <input type="number" class="form-control"  name="numberOfChildren" id="numberOfChildren"
                                    placeholder="Çocuk Sayısı Giriniz" value="<?php echo $ozgecmisform1[0]['numberOfChildren'] ?>">
                            </div>

                            <div class="input-section d-flex">

                                <p class="usernamelabel m-2">Sosyal Güvencesi:</p>
                                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                                <div class="checkbox-wrapper d-flex">
                                    <div class="checkboxes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="socialSecurity"
                                                id="socialSecurity" value="Resmi">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Resmi </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="socialSecurity"
                                                id="socialSecurity" value="Ücretli">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Ücretli </span>

                                            </label>

                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="socialSecurity"
                                                id="socialSecurity" value="Diğer">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Diğer </span>

                                            </label>
                                            <input type="text" class="form-control" disabled name="socialSecuritOther"
                                                id="socialSecuritOther" placeholder="Diğer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel m-2">Dili:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <input type="text" class="form-control"  name="language" id="language" placeholder="Dil Giriniz" value="<?php echo $ozgecmisform1[0]['language'] ?>">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Tercüman Gereksinimi:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="translatorRequirement"
                                        id="translatorRequirement" value="Yok">
                                    <label class="form-check-label" for="TercumanGereksinimi">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="translatorRequirement"
                                        id="translatorRequirement" value="Var">
                                    <label class="form-check-label" for="TercumanGereksinimi">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled name="translatorRequirementInput" id="translatorRequirementInput"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Kan Grubu</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <input type="text" class="form-control not"  name="bloodGroup" id="bloodGroup"
                            placeholder="Kan Grubu giriniz" value="<?php echo $ozgecmisform1[0]['bloodGroup'] ?>">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Daha Önce Kan Transfüzyonu Yaplıma Durumu:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfusionStatus"
                                        id="transfusionStatus" value="Yok">
                                    <label class="form-check-label" for="TransfuzyonYapilma">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfusionStatus"
                                        id="transfusionStatus" value="Var">
                                    <label class="form-check-label" for="TransfuzyonYapilma">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled name="transfusionStatusInput" id="transfusionStatusInput"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Transfüzyon Sonrası Reaksiyon Gelişme Durumu:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfusionReaction"
                                        id="transfusionReaction" value="Yok">
                                    <label class="form-check-label" for="TransfuzyonReaksiyonu">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transfusionReaction"
                                        id="transfusionReaction" value="Var">
                                    <label class="form-check-label" for="TransfuzyonReaksiyonu">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled name="transfusionReactionInput"
                                        id="transfusionReactionInput" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Bilgi Alınan Kişi:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <input type="text" class="form-control"  name="infoPerson" id="infoPerson"
                            placeholder="Bilgi Alınan Kişi Giriniz" value="<?php echo $ozgecmisform1[0]['infoPerson'] ?>">
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infoStorageType" id="infoStorageType"
                                        value="Kendisi">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Kendisi </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infoStorageType" id="infoStorageType"
                                        value="Dosya">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Dosya </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infoStorageType" id="infoStorageType"
                                        value="Diger">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Diğer </span>

                                    </label>
                                    <input type="text" class="form-control" disabled name="infoStorageTypeInput" id="infoStorageTypeInput"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel m-2">Kol Bandı Rengi:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <input type="text" class="form-control" name="kolbandi" id="kolbandi"
                            placeholder="Kol Bandı Rengi Giriniz" value="<?php echo $ozgecmisform1[0]['kolbandi'] ?>">
                    </div>
                    <h1 class="form-header">Gerektiğinde Ulaşılabilecek Yakını</h1>

                    <div class="input-section d-flex">
                        <p class="usernamelabel m-2">Adı Soyadı:</p>
                        <input type="text" class="form-control"  name="relativeNameSurname" id="relativeNameSurname"
                            placeholder="Adı Soyadı" value="<?php echo $ozgecmisform1[0]['relativeNameSurname'] ?>">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel m-2">Yakınlık Derecesi:</p>
                        <input type="text" class="form-control"  name="relativeDistance" id="relativeDistance"
                            placeholder="Yakınlık Derecesi" value="<?php echo $ozgecmisform1[0]['relativeDistance'] ?>">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel m-2">Telefon:</p>
                        <input type="text" class="form-control"  name="relativePhone" id="relativePhone"
                            placeholder="Telefon" value="<?php echo $ozgecmisform1[0]['relativePhone'] ?>">
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Adres</p>
                        <input type="text" class="form-control not"  name="relativeAddress" id="relativeAddress"
                            placeholder="Adres giriniz" value="<?php echo $ozgecmisform1[0]['relativeAddress'] ?>">
                    </div>

                    <h1 class="form-header">Özgeçmiş</h1>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Daha Önce Hastaneye Yatma Durumu:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousHospitalization" id="previousHospitalization"
                                        value="Yok">
                                    <label class="form-check-label" for="YatisDurumu">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousHospitalization" id="previousHospitalization"
                                        value="Var">
                                    <label class="form-check-label" for="YatisDurumu">
                                        <span class="checkbox-header"> Var </span>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <th>Hastaneye Yatış Yılı</th>
                                <th>Hastanede Yatış Süresi</th>
                                <th>Hastaneye Yatış Nedeni</th>

                            </tr>
                            <tr>
                                <td><input type="number" min="1950" max="2099" class="form-control ozgecmistable"   name="hospitalization_year"
                                        id="hospitalization_year" placeholder="..." value="<?php echo $ozgecmisform1[0]['hospitalization_year']?>"></td>
                                <td><input type="text" class="form-control ozgecmistable"   name="hospitalization_location"
                                        id="hospitalization_location" placeholder="..." value="<?php echo $ozgecmisform1[0]['hospitalization_location']?>"></td>
                                <td><input type="text" class="form-control ozgecmistable"   name="hospitalization_reason"
                                        id="hospitalization_reason" placeholder="..." value="<?php echo $ozgecmisform1[0]['hospitalization_reason']?>"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Geçirdiği Hastalıklar:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="diseases"
                                        id="diseases" value="Yok">
                                    <label class="form-check-label" for="GetirdigiHastaliklar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="diseases"
                                        id="diseases" value="Var">
                                    <label class="form-check-label" for="GetirdigiHastaliklar">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled  name="diseasesInput"
                                        id="diseasesInput" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Geçirdiği Ameliyatlar:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousSurgeries"
                                        id="previousSurgeries" value="Yok">
                                    <label class="form-check-label" for="previousSurgeries">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousSurgeries"
                                        id="previousSurgeries" value="Var">
                                    <label class="form-check-label" for="previousSurgeries">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled  name="previousSurgeriesInput"
                                        id="previousSurgeriesInput" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Geçirdiği Kazalar:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="accidents"
                                        id="accidents" value="Yok">
                                    <label class="form-check-label" for="GetirdigiKazalar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="accidents"
                                        id="accidents" value="Var">
                                    <label class="form-check-label" for="GetirdigiKazalar">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled  name="accidentsInput" id="accidentsInput"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Bulaşıcı Hastalığı:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infectiousDisease"
                                        id="infectiousDisease" value="Yok">
                                    <label class="form-check-label" for="BulasiciHastalik">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="infectiousDisease"
                                        id="infectiousDisease" value="Var">
                                    <label class="form-check-label" for="BulasiciHastalik">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" disabled  name="infectiousDiseaseInput"
                                        id="infectiousDiseaseInput" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Allerjik Reaksiyon:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allergies"
                                        id="allergies" value="Yok">
                                    <label class="form-check-label" for="allergies">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allergies"
                                        id="allergies" value="Var">
                                    <label class="form-check-label" for="allergies">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <th>Allerjen</th>
                                <th>Belirtiler</th>
                                <th>Tedavi</th>

                            </tr>
                            <tr>
                                <td><input type="text" class="form-control ozgecmistable"  name="allergen"
                                        id="allergen" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergen'] ?>"></td >
                                <td><input type="text" class="form-control ozgecmistable"  name="allergySymptoms"
                                        id="allergySymptoms" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergySymptoms'] ?>"></td>
                                <td><input type="text" class="form-control ozgecmistable"  name="allergyTherapy"
                                        id="allergyTherapy" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2">Hastaneye Yatmadan Önce Kullandığı İlaçlar:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousMedications"
                                        id="previousMedications" value="Yok">
                                    <label class="form-check-label" for="previousMedications">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="previousMedications"
                                        id="previousMedications" value="Var">
                                    <label class="form-check-label" for="KullanilanIlaclar">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <table class="ozgecmistable-wrapper">
                            <tbody>
                                <tr>
                                    <th>İlacın Adı</th>
                                    <th>Reçete</th>
                                    <th>Kullanım Süresi</th>
                                    <th>Dozu</th>
                                    <th>Sıklığı</th>
                                    <th>Alınış Yolu</th>
                                    <th>Saatleri</th>

                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control ozgecmistable" disabled name="medicineName"
                                            id="medicineName" placeholder="..." value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                                    <td>
                                        <div class="checkbox-wrapper d-flex">
                                            <div class="checkboxes recetecheckbox">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled name="prescriptionType"
                                                        id="prescriptionType" value="R+">
                                                    <label class="form-check-label" for="prescriptionType">
                                                        <span class="checkbox-header"> R+ </span>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" disabled name="prescriptionType"
                                                        id="prescriptionType" value="R-">
                                                    <label class="form-check-label" for="prescriptionType">
                                                        <span class="checkbox-header"> R-
                                                        </span>

                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control ozgecmistable" 
                                            name="KullanimSuresi" id="KullanimSuresi" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="medicineDose"
                                            id="medicineDose" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="medicineFrequency"
                                            id="medicineFrequency" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="intakeMethod"
                                            id="intakeMethod" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="intakeTimes"
                                            id="intakeTimes" placeholder="..." disabled value="<?php echo $ozgecmisform1[0]['allergyTherapy'] ?>"></td>
                                </tr>
                                <!--<tr>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td>
                                        <div class="checkbox-wrapper d-flex">
                                            <div class="checkboxes recetecheckbox">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option1">
                                                    <label class="form-check-label" for="yatisdurumuradio">
                                                        <span class="checkbox-header"> R+ </span>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option2">
                                                    <label class="form-check-label" for="yatisdurumuradio">
                                                        <span class="checkbox-header"> R-
                                                        </span>

                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td>
                                        <div class="checkbox-wrapper d-flex">
                                            <div class="checkboxes recetecheckbox">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option1">
                                                    <label class="form-check-label" for="yatisdurumuradio">
                                                        <span class="checkbox-header"> R+ </span>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option2">
                                                    <label class="form-check-label" for="yatisdurumuradio">
                                                        <span class="checkbox-header"> R-
                                                        </span>

                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable"  name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="input-section d-flex justify-content-around">
                        <p class="usernamelabel m-2">Kullandığı Araçlar/Protezler:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                                    <div>
                                    <input class="form-check-input" type="radio" name="aidTools"
                                        id="KullandigiAraclar" value="Yok">
                                    <label class="form-check-label" for="KullandigiAraclar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="aidTools"
                                        id="KullandigiAraclar" value="Var">
                                        <label class="form-check-label" for="KullandigiAraclar">
                                            <span class="checkbox-header"> Var</span>
                                    </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc" id="aidToolsDesc"
                                            value="Gozluk">
                                        <label class="form-check-label" for="inlineCheckbox1">Gözlük </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc"
                                            id="aidToolsDesc" value="Kontakt Lens">
                                        <label class="form-check-label" for="inlineCheckbox1">Kontakt Lens </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc"
                                            id="aidToolsDesc" value="Isitme Cihazi">
                                        <label class="form-check-label" for="inlineCheckbox1">İşitme Cihazı </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc" id="aidToolsDesc" value="İşitme Cihazı (Sağ)">
                                        <label class="form-check-label" for="inlineCheckbox1">Sağ </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc" id="aidToolsDesc" value="İşitme Cihazı (Sol)">
                                        <label class="form-check-label" for="inlineCheckbox1">Sol</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc"
                                            id="aidToolsDesc" value="Dis Protezi">
                                        <label class="form-check-label" for="inlineCheckbox1">Diş Protez </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc"
                                            id="aidToolsDesc" value="Tekerlekli Sandalye">
                                        <label class="form-check-label" for="inlineCheckbox1">Tekerlekli
                                            Sandalye</label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc" id="aidToolsDesc"
                                            value="Baston">
                                        <label class="form-check-label" for="inlineCheckbox1">Baston </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc" id="aidToolsDesc"
                                            value="Yurutec">
                                        <label class="form-check-label" for="inlineCheckbox1">Yürüteç (Walker) </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" disabled name="aidToolsDesc"
                                            id="aidToolsDesc" value="Koltuk Degnegi">
                                        <label class="form-check-label" for="inlineCheckbox1">Koltuk Değneği</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel m-2 text-center">Alışkanlıklar:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="smoking" id="smoking"
                                            value="Sigara">
                                        <label class="form-check-label" for="inlineCheckbox1">Sigara </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable"  name="smokingAmount"
                                        id="smokingAmount" disabled placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" 
                                        name="smokingTime" id="smokingTime" disabled placeholder="...">
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholUsage" id="alcoholUsage"
                                            value="Alkol">
                                        <label class="form-check-label" for="inlineCheckbox1">Alkol </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" disabled  name="alcoholAmount"
                                        id="AMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Kullanım Süreci</p>

                                    <input type="text" disabled class="form-control ozgecmistable" 
                                        name="alcoholUsageTime" id="alcoholUsageTime" placeholder="...">
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="teaUsage" id="teaUsage" value="Cay">
                                        <label class="form-check-label" for="inlineCheckbox1">Çay </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" disabled name="teaUsageAmount"
                                        id="teaUsageAmount" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" 
                                        name="teaUsageTime" id="teaUsageTime" placeholder="...">
                                </td>
                            </tr>

                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  name="coffeeUsage" id="coffeeUsage"
                                            value="Kahve">
                                        <label class="form-check-label" for="inlineCheckbox1">Kahve </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" disabled name="coffeeUsageAmount"
                                        id="coffeeUsageAmount" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Kullanım Süreci</p>

                                    <input type="text" disabled class="form-control ozgecmistable" 
                                        name="coffeeUsageTime" id="coffeeUsageTime" placeholder="...">
                                </td>
                            </tr>

                            <tr>

                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="otherHabits"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox1">Diğer </label>
                                        <input type="text" class="form-control ozgecmistable"  name="otherHabitsInput"
                                            id="otherHabitsInput" placeholder="...">
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable"  name="otherHabitsAmount"
                                        id="otherHabitsAmount" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" 
                                        name="otherHabitsTime" id="otherHabitsTime" placeholder="...">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h1 class="form-header">Soygeçmiş</h1>
                    <div class="input-section ">

                        <p class="usernamelabel m-2">Ailesinde herhangi bir sağlık sorunu olan var mı?:</p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familyIllnesses" id="familyIllnesses"
                                        value="Yok">
                                    <label class="form-check-label" for="AileviSaglik">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="familyIllnesses" id="familyIllnesses"
                                        value="Var">
                                    <label class="form-check-label" for="AileviSaglik">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper d-flex flex-column">
                        <tbody>
                            <tr class="m-3">

                                <td class="protezlertable">
                                    <p class="usernamelabel m-2">Yakınlık Derecesi:  </p>

                                </td>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable" 
                                        name="familyMemberRelation" disabled id="familyMemberRelation" placeholder="...">
                                </td>
                                
                            </tr>
                            <tr class="m-3">
                            <td class="protezlertable">
                                    <p class="usernamelabel m-2">Tanısı:  </p>

                                </td>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable"  name="familyMemberIllness"
                                        id="familyMemberIllness" disabled placeholder="...">
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <div class='input-section'>
                        <h1 class="form-header">Hastalık Öyküsü</h1>
                        
                        <p class="usernamelabel m-2 m-3">Geldiği Yer </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="arrivalFrom" id="arrivalFrom"
                                    value="Yogun Bakim">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Yoğun Bakım </span>
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrivalFrom" id="arrivalFrom"
                                    value="Poliklinik">
                                    <label class="form-check-label" for="GeldigiYer">
                                        <span class="checkbox-header"> Poliklinik </span>
                                    </label>
                                </div>
                                
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrivalFrom" id="arrivalFrom"
                                value="Acil Servis">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Acil Servis </span>
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrivalFrom" id="arrivalFrom"
                                value="Ev">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Ev </span>
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrivalFrom" id="arrivalFrom"
                                value="Diger">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Diğer </span>
                                    
                                </label>
                                <input type="text" class="form-control" disabled name="arrivalFromInput" id="arrivalFromInput"
                                placeholder="Diğer">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class='input-section'>
                    <p class="usernamelabel m-2 m-3"> Hastaneye Geliş Şekli </p>
                    <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                    <div class="checkbox-wrapper d-flex">
                        <div class="checkboxes d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hospitalArrivalMethod" id="hospitalArrivalMethod"
                                    value="Yuruyerek">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Yürüyerek </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hospitalArrivalMethod" id="hospitalArrivalMethod"
                                    value="Tekerlekli Sandalye">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Tekerlekli Sandalye </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hospitalArrivalMethod" id="hospitalArrivalMethod"
                                    value="Sedye">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Sedye </span>
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hospitalArrivalMethod" id="hospitalArrivalMethod"
                                    value="Diger">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Diğer </span>

                                </label>
                                <input type="text" class="form-control"  name="hospitalArrivalMethodInput" id="hospitalArrivalMethodInput"
                                    placeholder="Diğer">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="input-section">
                        
                        <p class="usernamelabel m-2">Şikayetler</p>
                        <input type="text" class="form-control not"  name="complaints" id="complaints"
                        placeholder="Şikayetler" value="<?php echo $ozgecmisform1[0]['complaints'] ?>">
                        
                        <p class="usernamelabel m-2">Tıbbi Tanı</p>
                        <input type="text" class="form-control not"  name="medicalDiagnosis" id="medicalDiagnosis"
                        placeholder="Tıbbi Tanı" value="<?php echo $ozgecmisform1[0]['medicalDiagnosis'] ?>">
                    </div>
                    <div class='d-flex'>    
                    <?php
                        if ($display == 1) {
                            echo '<input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">';
                        }
                        ?>
</div>

            </form>
        </div>


    </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <script>
        $(function(){
            $('.form-check-input[name="gender"]').each(function(){
                console.log("<?php echo $ozgecmisform1[0]['gender'] ?>")
                if($(this).val() === "<?php echo $ozgecmisform1[0]['gender'] ?>" ){
                    $(this).prop('checked', true);
                }
            })

            //socialSecurity
           let socialSecurityValue = "<?php echo $ozgecmisform1[0]['socialSecurity']?>";
            let radioValues = $(".form-check-input[name='socialSecurity']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues.includes(socialSecurityValue)) {
            $(".form-check-input[name='socialSecurity']").filter(function() {
                return $(this).val() === socialSecurityValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='socialSecurity']").filter(function() {
                return $(this).val() === "Diğer";
            }).prop('checked', true);
            $("input[name='socialSecuritOther']").prop('disabled', false)
            $("input[name='socialSecuritOther']").val(socialSecurityValue);
            }

            //translatorRequirement
            let translatorRequirementValue = "<?php echo $ozgecmisform1[0]['translatorRequirement']?>";
            let translatorRequirementRadioValues = $(".form-check-input[name='translatorRequirement']").map(function() {
            return $(this).val();
            }).get();

            if (translatorRequirementRadioValues.includes(translatorRequirementValue)) {
            $(".form-check-input[name='translatorRequirement']").filter(function() {
                return $(this).val() === translatorRequirementValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='translatorRequirement']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='translatorRequirementInput']").prop('disabled', false);
            $("input[name='translatorRequirementInput']").val(translatorRequirementValue);
            }

            //transfusionStatus
            let transfusionStatusValue = "<?php echo $ozgecmisform1[0]['transfusionStatus']?>";
            let transfusionStatusRadioValues = $(".form-check-input[name='transfusionStatus']").map(function() {
            return $(this).val();
            }).get();

            if(transfusionStatusRadioValues.includes(transfusionStatusValue)){
                $(".form-check-input[name='transfusionStatus']").filter(function(){
                    return $(this).val() === transfusionStatusValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='transfusionStatus']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='transfusionStatusInput']").prop('disabled', false);
            $("input[name='transfusionStatusInput']").val(transfusionStatusValue)
            }

            //transfusionReaction
            let transfusionReactionValue = "<?php echo $ozgecmisform1[0]['transfusionReaction']?>";
            let transfusionReactionRadioValues = $(".form-check-input[name='transfusionReaction']").map(function() {
            return $(this).val();
            }).get();

            if(transfusionReactionRadioValues.includes(transfusionReactionValue)){
                $(".form-check-input[name='transfusionReaction']").filter(function(){
                    return $(this).val() === transfusionReactionValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='transfusionReaction']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='transfusionReactionInput']").prop('disabled', false);
            $("input[name='transfusionReactionInput']").val(transfusionReactionValue)
            }

            //infoStorageType
            let infoStorageTypeValue = "<?php echo $ozgecmisform1[0]['infoStorageType']?>";
            let infoStorageTypeRadioValues = $(".form-check-input[name='infoStorageType']").map(function() {
            return $(this).val();
            }).get();

            if(infoStorageTypeRadioValues.includes(infoStorageTypeValue)){
                $(".form-check-input[name='infoStorageType']").filter(function(){
                    return $(this).val() === infoStorageTypeValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='infoStorageType']").filter(function() {
                return $(this).val() === "Diger";
            }).prop('checked', true);
            $("input[name='infoStorageTypeInput']").prop('disabled', false);
            $("input[name='infoStorageTypeInput']").val(infoStorageTypeValue)
            }
            
            //previousHospitalization
            let previousHospitalizationValue = "<?php echo $ozgecmisform1[0]['previousHospitalization']?>";
            let previousHospitalizationRadioValues = $(".form-check-input[name='previousHospitalization']").map(function() {
            return $(this).val();
            }).get();

            if(previousHospitalizationRadioValues.includes(previousHospitalizationValue)){
                $(".form-check-input[name='previousHospitalization']").filter(function(){
                    return $(this).val() === previousHospitalizationValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='previousHospitalization']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("#hospitalization_year").prop('disabled', false);
            $("input[name='hospitalization_location']").prop('disabled', false);
            $("input[name='hospitalization_reason']").prop('disabled', false);
            }

            //diseases
            let diseasesValue = "<?php echo $ozgecmisform1[0]['diseases']?>";
            let diseasesRadioValues = $(".form-check-input[name='diseases']").map(function() {
            return $(this).val();
            }).get();

            if(diseasesRadioValues.includes(diseasesValue)){
                $(".form-check-input[name='diseases']").filter(function(){
                    return $(this).val() === diseasesValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='diseases']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='diseasesInput']").prop('disabled', false);
            $("input[name='diseasesInput']").val(diseasesValue)
            }

            //previousSurgeries
            let previousSurgeriesValue = "<?php echo $ozgecmisform1[0]['previousSurgeries']?>";
            let previousSurgeriesRadioValues = $(".form-check-input[name='previousSurgeries']").map(function() {
            return $(this).val();
            }).get();

            if(previousSurgeriesRadioValues.includes(previousSurgeriesValue)){
                $(".form-check-input[name='previousSurgeries']").filter(function(){
                    return $(this).val() === previousSurgeriesValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='previousSurgeries']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='previousSurgeriesInput']").prop('disabled', false);
            $("input[name='previousSurgeriesInput']").val(previousSurgeriesValue)
            }

            //accidents
            let accidentsValue = "<?php echo $ozgecmisform1[0]['accidents']?>";
            let accidentsRadioValues = $(".form-check-input[name='accidents']").map(function() {
            return $(this).val();
            }).get();

            if(accidentsRadioValues.includes(accidentsValue)){
                $(".form-check-input[name='accidents']").filter(function(){
                    return $(this).val() === accidentsValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='accidents']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='accidentsInput']").prop('disabled', false);
            $("input[name='accidentsInput']").val(accidentsValue)
            }

            //infectiousDisease
            let infectiousDiseaseValue = "<?php echo $ozgecmisform1[0]['infectiousDisease']?>";
            let infectiousDiseaseRadioValues = $(".form-check-input[name='infectiousDisease']").map(function() {
            return $(this).val();
            }).get();

            if(infectiousDiseaseRadioValues.includes(infectiousDiseaseValue)){
                $(".form-check-input[name='infectiousDisease']").filter(function(){
                    return $(this).val() === infectiousDiseaseValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='infectiousDisease']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='infectiousDiseaseInput']").prop('disabled', false);
            $("input[name='infectiousDiseaseInput']").val(infectiousDiseaseValue)
            }

            //allergies
            $('.form-check-input[name="allergies"]').each(function(){
                if($(this).val() === "<?php echo $ozgecmisform1[0]['allergies'] ?>" ){
                    $(this).prop('checked', true);
                }
                })

            //previousMedications
            $('.form-check-input[name="previousMedications"]').each(function(){
                if($(this).val() === "<?php echo $ozgecmisform1[0]['previousMedications'] ?>" ){
                    $(this).prop('checked', true);
                }
                })
            $('.form-check-input[name="prescriptionType"]').each(function(){
                if($(this).val() === "<?php echo $ozgecmisform1[0]['prescriptionType'] ?>" ){
                    $(this).prop('checked', true);
                }
                })

            //aidTools
            let aidToolsArr = "<?php echo $ozgecmisform1[0]['aidTools']; ?>".split("/");
            $(".form-check-input[name='aidTools']").each(function() {
                if(aidToolsArr[0] === "" || aidToolsArr[0] === "Yok"){
                    $('input[name="aidTools"][value="Yok"]').prop('checked', true);
                    $('.form-check-input[name="aidToolsDesc"]').prop('disabled', true);
                }else {
                    $('input[name="aidTools"][value="Var"]').prop('checked', true);
                    $(".form-check-input[name='aidToolsDesc']").each(function() {
                        if(aidToolsArr.includes($(this).val())){
                            $(this).prop('checked', true);
                        }
                    })
                    $('.form-check-input[name="aidToolsDesc"]').prop('disabled', false);
                }
            })

            //smoking
            if($('.form-check-input[name="smoking"]').val() === "<?php echo $ozgecmisform1[0]['smoking'] ?>"){
                $('.form-check-input[name="smoking"]').prop('checked', true);
                $('input[name="smokingAmount"]').prop('disabled', false);
                $('input[name="smokingTime"]').prop('disabled', false);
            }
            $('input[name="smokingAmount"]').val("<?php echo $ozgecmisform1[0]['smokingAmount'] ?>")
            $('input[name="smokingTime"]').val("<?php echo $ozgecmisform1[0]['smokingTime'] ?>")

            //alcoholUsage
            if($('.form-check-input[name="alcoholUsage"]').val() === "<?php echo $ozgecmisform1[0]['alcoholUsage'] ?>"){
                $('.form-check-input[name="alcoholUsage"]').prop('checked', true);
                $('input[name="alcoholAmount"]').prop('disabled', false);
                $('input[name="alcoholUsageTime"]').prop('disabled', false);

            }
            $('input[name="alcoholAmount"]').val("<?php echo $ozgecmisform1[0]['alcoholAmount'] ?>")
            $('input[name="alcoholUsageTime"]').val("<?php echo $ozgecmisform1[0]['alcoholUsageTime'] ?>")

            //teaUsage
            if($('.form-check-input[name="teaUsage"]').val() === "<?php echo $ozgecmisform1[0]['teaUsage'] ?>"){
                $('.form-check-input[name="teaUsage"]').prop('checked', true);
                $('input[name="teaUsageAmount"]').prop('disabled', false);
                $('input[name="teaUsageTime"]').prop('disabled', false);
            }
            $('input[name="teaUsageAmount"]').val("<?php echo $ozgecmisform1[0]['teaUsageAmount'] ?>")
            $('input[name="teaUsageTime"]').val("<?php echo $ozgecmisform1[0]['teaUsageTime'] ?>")

            //coffeeUsage
            if($('.form-check-input[name="coffeeUsage"]').val() === "<?php echo $ozgecmisform1[0]['coffeeUsage'] ?>"){
                $('.form-check-input[name="coffeeUsage"]').prop('checked', true);
                $('input[name="coffeeUsageAmount"]').prop('disabled', false);
                $('input[name="coffeeUsageTime"]').prop('disabled', false);
            }
            $('input[name="coffeeUsageAmount"]').val("<?php echo $ozgecmisform1[0]['coffeeUsageAmount'] ?>")
            $('input[name="coffeeUsageTime"]').val("<?php echo $ozgecmisform1[0]['coffeeUsageTime'] ?>")

            //otherHabits
            if($('.form-check-input[name="otherHabits"]').val() === "<?php echo $ozgecmisform1[0]['otherHabits'] ?>"){
                $('.form-check-input[name="otherHabits"]').prop('checked', true);
                $('input[name="otherHabitsAmount"]').prop('disabled', false);
                $('input[name="otherHabitsTime"]').prop('disabled', false);
            }
            $('input[name="otherHabitsAmount"]').val("<?php echo $ozgecmisform1[0]['otherHabitsAmount'] ?>")
            $('input[name="otherHabitsTime"]').val("<?php echo $ozgecmisform1[0]['otherHabitsTime'] ?>")

            //familyIllnesses
            let familyIllnessesValue = "<?php echo $ozgecmisform1[0]['familyIllnesses']?>";
            let familyIllnessesRadioValues = $(".form-check-input[name='familyIllnesses']").map(function() {
            return $(this).val();
            }).get();

            if(familyIllnessesRadioValues.includes(familyIllnessesValue)){
                $(".form-check-input[name='familyIllnesses']").filter(function(){
                    return $(this).val() === familyIllnessesValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='familyIllnesses']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='familyMemberRelation']").prop('disabled', false);
            $("input[name='familyMemberIllness']").prop('disabled', false);
            $("input[name='familyMemberRelation']").val("<?php echo $ozgecmisform1[0]['familyMemberRelation']?>")
            $("input[name='familyMemberIllness']").val("<?php echo $ozgecmisform1[0]['familyMemberIllness']?>")
            }

            //arrivalFrom
            let arrivalFromValue = "<?php echo $ozgecmisform1[0]['arrivalFrom']?>";
            let arrivalFromRadioValues = $(".form-check-input[name='arrivalFrom']").map(function() {
            return $(this).val();
            }).get();

            if(arrivalFromRadioValues.includes(arrivalFromValue)){
                $(".form-check-input[name='arrivalFrom']").filter(function(){
                    return $(this).val() === arrivalFromValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='arrivalFrom']").filter(function() {
                return $(this).val() === "Diger";
            }).prop('checked', true);
            $("input[name='arrivalFromInput']").prop('disabled', false);
            $("input[name='arrivalFromInput']").val("<?php echo $ozgecmisform1[0]['arrivalFrom']?>")
            }

            //hospitalArrivalMethod
            let hospitalArrivalMethodValue = "<?php echo $ozgecmisform1[0]['hospitalArrivalMethod']?>";
            let hospitalArrivalMethodRadioValues = $(".form-check-input[name='hospitalArrivalMethod']").map(function() {
            return $(this).val();
            }).get();

            if(hospitalArrivalMethodRadioValues.includes(hospitalArrivalMethodValue)){
                $(".form-check-input[name='hospitalArrivalMethod']").filter(function(){
                    return $(this).val() === hospitalArrivalMethodValue;
                }).prop('checked', true);
            }else {
            $(".form-check-input[name='hospitalArrivalMethod']").filter(function() {
                return $(this).val() === "Diger";
            }).prop('checked', true);
            $("input[name='hospitalArrivalMethodInput']").prop('disabled', false);
            $("input[name='hospitalArrivalMethodInput']").val("<?php echo $ozgecmisform1[0]['hospitalArrivalMethod']?>")
            }

         })

            </script>


        <script>
    $('.form-check-input[name="careAcceptance"]').change(function(){
                if($(this).val() === 'Katılıyor'){
                    $('input[name="careAcceptanceWilling"]').prop('disabled', false);
                    $('input[name="careAcceptanceNon"]').prop('disabled', true);

                }else{
                    $('input[name="careAcceptanceWilling"]').prop('disabled', true);
                    $('input[name="careAcceptanceNon"]').prop('disabled', false);
                }
            })

        $('.form-check-input[name="socialSecurity"]').change(function(){
            if($(this).val() === "Diğer"){
                $('input[name="socialSecuritOther"]').prop('disabled', false);
            }
            else{
                $('input[name="socialSecuritOther"]').prop('disabled', true);
            }
        })

        $('.form-check-input[name="translatorRequirement"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="translatorRequirementInput"]').prop('disabled', false);
            }
            else{
                $('input[name="translatorRequirementInput"]').prop('disabled', true);
            }
        })

        $('.form-check-input[name="transfusionStatus"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="transfusionStatusInput"]').prop('disabled', false);
            }
            else{
                $('input[name="transfusionStatusInput"]').prop('disabled', true);

            }
        })
        $('.form-check-input[name="transfusionReaction"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="transfusionReactionInput"]').prop('disabled', false);
            }
            else{
                $('input[name="transfusionReactionInput"]').prop('disabled', true);

            }
        })
        $('.form-check-input[name="infoStorageType"]').change(function(){
            if($(this).val() === "Diger"){
                $('input[name="infoStorageTypeInput"]').prop('disabled', false);
            }
            else{
                $('input[name="infoStorageTypeInput"]').prop('disabled', true);

            }
        })

        $('.form-check-input[name="previousHospitalization"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="hospitalization_year"]').prop('disabled', false);
                $('input[name="hospitalization_location"]').prop('disabled', false);
                $('input[name="hospitalization_reason"]').prop('disabled', false);
            }
            else{
                $('input[name="hospitalization_year"]').prop('disabled', true);
                $('input[name="hospitalization_location"]').prop('disabled', true);
                $('input[name="hospitalization_reason"]').prop('disabled', true);
            }
        })

        $('.form-check-input[name="diseases"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="diseasesInput"]').prop('disabled', false);
            }
            else{
                $('input[name="diseasesInput"]').prop('disabled', true);
            }
        })

        $('.form-check-input[name="previousSurgeries"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="previousSurgeriesInput"]').prop('disabled', false);
            }
            else{
                $('input[name="previousSurgeriesInput"]').prop('disabled', true);
            }
        })

        //accidents

        $('.form-check-input[name="accidents"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="accidentsInput"]').prop('disabled', false);

            }
            else{
                $('input[name="accidentsInput"]').prop('disabled', true);
            }
        })

        //infectiousDisease

        $('.form-check-input[name="infectiousDisease"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="infectiousDiseaseInput"]').prop('disabled', false);

            }
            else{
                $('input[name="infectiousDiseaseInput"]').prop('disabled', true);
            }
        })

        //allergies

        $('.form-check-input[name="allergies"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="allergen"]').prop('disabled', false);
                $('input[name="allergySymptoms"]').prop('disabled', false);
                $('input[name="allergyTherapy"]').prop('disabled', false);
            }
            else{
                $('input[name="allergen"]').prop('disabled', true);
                $('input[name="allergySymptoms"]').prop('disabled', true);
                $('input[name="allergyTherapy"]').prop('disabled', true);
            }
        })


        //previousMedications

        $('.form-check-input[name="previousMedications"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="medicineName"]').prop('disabled', false);
                $('input[name="prescriptionType"]').prop('disabled', false);
                $('input[name="medicineFrequency"]').prop('disabled', false);
                $('input[name="medicineDose"]').prop('disabled', false);
                $('input[name="intakeMethod"]').prop('disabled', false);
                $('input[name="intakeTimes"]').prop('disabled', false);
            }
            else{
                $('input[name="medicineName"]').prop('disabled', true);
                $('input[name="prescriptionType"]').prop('disabled', true);
                $('input[name="medicineFrequency"]').prop('disabled', true);
                $('input[name="medicineDose"]').prop('disabled', true);
                $('input[name="intakeMethod"]').prop('disabled', true);
                $('input[name="intakeTimes"]').prop('disabled', true);
            }
        })

        //aidTools

        $('.form-check-input[name="aidTools"]').change(function(){
            if($(this).val() === "Var"){
                $('.form-check-input[name="aidToolsDesc"]').prop('disabled', false);
            }
            else{
                $('.form-check-input[name="aidToolsDesc"]').prop('disabled', true);
            }
        })

        //smoking

        $('.form-check-input[name="smoking"]').change(function(){
            if($(this).val() === "Sigara"){
                $('input[name="smokingAmount"]').prop('disabled', false);
                $('input[name="smokingTime"]').prop('disabled', false);
            }
            else{
                $('input[name="smokingAmount"]').prop('disabled', true);
                $('input[name="smokingTime"]').prop('disabled', true);
            }
        })

        //alcoholUsage

        $('.form-check-input[name="alcoholUsage"]').change(function(){
            if($(this).val() === "Alkol"){
                $('input[name="alcoholAmount"]').prop('disabled', false);
                $('input[name="alcoholUsageTime"]').prop('disabled', false);
            }
            else{
                $('input[name="alcoholAmount"]').prop('disabled', true);
                $('input[name="alcoholUsageTime"]').prop('disabled', true);
            }
        })

        //teaUsage

        $('.form-check-input[name="teaUsage"]').change(function(){
            if($(this).val() === "Cay"){
                $('input[name="teaUsageAmount"]').prop('disabled', false);
                $('input[name="teaUsageTime"]').prop('disabled', false);
            }
            else{
                $('input[name="teaUsageAmount"]').prop('disabled', true);
                $('input[name="teaUsageTime"]').prop('disabled', true);
            }
        })

        //coffeeUsage

        $('.form-check-input[name="coffeeUsage"]').change(function(){
            if($(this).val() === "Kahve"){
                $('input[name="coffeeUsageAmount"]').prop('disabled', false);
                $('input[name="coffeeUsageTime"]').prop('disabled', false);
            }
            else{
                $('input[name="coffeeUsageAmount"]').prop('disabled', true);
                $('input[name="coffeeUsageTime"]').prop('disabled', true);
            }
        })

        //otherHabits

        $('.form-check-input[name="otherHabits"]').change(function(){
            if($(this).val() === "Diger"){
                $('input[name="otherHabitsInput"]').prop('disabled', false);
                $('input[name="otherHabitsAmount"]').prop('disabled', false);
                $('input[name="otherHabitsTime"]').prop('disabled', false);
            }
            else{
                $('input[name="otherHabitsInput"]').prop('disabled', true);
                $('input[name="otherHabitsAmount"]').prop('disabled', true);
                $('input[name="otherHabitsTime"]').prop('disabled', true);
            }
        })

        //familyIllnesses

        $('.form-check-input[name="familyIllnesses"]').change(function(){
            if($(this).val() === "Var"){
                $('input[name="familyMemberRelation"]').prop('disabled', false);
                $('input[name="familyMemberIllness"]').prop('disabled', false);
            }
            else{
                $('input[name="familyMemberRelation"]').prop('disabled', true);
                $('input[name="familyMemberIllness"]').prop('disabled', true);
            }
        })

        //arrivalFrom

        $('.form-check-input[name="arrivalFrom"]').change(function(){
            if($(this).val() === "Diger"){
                $('input[name="arrivalFromInput"]').prop('disabled', false);
            }
            else{
                $('input[name="arrivalFromInput"]').prop('disabled', true);
            }
        })

        //hospitalArrivalMethod

        $('.form-check-input[name="hospitalArrivalMethod"]').change(function(){
            if($(this).val() === "Diger"){
                $('input[name="hospitalArrivalMethodInput"]').prop('disabled', false);
            }
            else{
                $('input[name="hospitalArrivalMethodInput"]').prop('disabled', true);
            }
        })

        $(function() {
        $('#closeBtn1').click(function(e) {
            let patient_id = "<?php echo $ozgecmisform1[0]['patient_id']  ?>";
            let patient_name = "<?php echo $ozgecmisform1[0]['patient_name']  ?>";
            var url = "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    }); 
        </script>

        <script>
            $('#submit').click(function(e) {
                e.preventDefault()                
                            let age = $('#age').val();
                            let not = $('#not').val();

                            let patient_id = "<?php echo $ozgecmisform1[0]['patient_id']  ?>";
                             let patient_name = "<?php echo $ozgecmisform1[0]['patient_name']  ?>";
                            let form_name = "ozgecmis";
                            let yourDate = new Date()
                            let creation_date = yourDate.toISOString().split('T')[0];
                            let update_date = yourDate.toISOString().split('T')[0];
                            let nameSurname = $('#nameSurname').val();
                            let dob = $('#dob').val();
                            let gender = $('.form-check-input[name= "gender"]').val();
                            let maritalStatus = $('[name="maritalStatus"]').val();
                            let profession = $('#profession').val();
                            let education = $('#education').val();
                            let protocol_file_no = $('#protocol_file_no').val();
                            let admissionDate = $('#admissionDate').val();
                            let department = $('#department').val();
                            let diagnosis = $('#diagnosis').val();
                            let doctorName = $('#doctorName').val();
                            let numberOfChildren = $('#numberOfChildren').val();
                            let socialSecurity = $('.form-check-input[name="socialSecurity"]:checked').val() === "Diğer" ? $('#socialSecuritOther').val() : $('.form-check-input[name="socialSecurity"]:checked').val();
                            let language = $('#language').val();
                            let translatorRequirement = $('.form-check-input[name="translatorRequirement"]:checked').val() === "Var" ? $('#translatorRequirementInput').val() : $('.form-check-input[name="translatorRequirement"]:checked').val();
                            let bloodGroup = $('#bloodGroup').val();
                            let transfusionStatus = $('.form-check-input[name="transfusionStatus"]:checked').val() === "Var" ? $('#transfusionStatusInput').val() : $('.form-check-input[name="transfusionStatus"]:checked').val();
                            let transfusionReaction = $('.form-check-input[name="transfusionReaction"]:checked').val() === "Var" ? $('#transfusionReactionInput').val() : $('.form-check-input[name="transfusionReaction"]:checked').val();
                            let infoPerson = $('#infoPerson').val();
                            let infoStorageType = $('.form-check-input[name="infoStorageType"]:checked').val() === "Diger" ? $('#infoStorageTypeInput').val() : $('.form-check-input[name="infoStorageType"]:checked').val();
                            let kolbandi = $('input[name="kolbandi"]').val();
                            let relativeNameSurname = $('input[name="relativeNameSurname"]').val();
                            let relativePhone = $('input[name="relativePhone"]').val();
                            let relativeAddress = $('input[name="relativeAddress"]').val();
                            let relativeDistance = $('input[name="relativeDistance"]').val();
                            let previousHospitalization = $('.form-check-input[name="previousHospitalization"]:checked').val();
                            let hospitalization_year = $('input[name="hospitalization_year"]').val() ? $('input[name="hospitalization_year"]').val() : "";
                            let hospitalization_location = $('input[name="hospitalization_location"]').val() ? $('input[name="hospitalization_location"]').val() : "";
                            let hospitalization_reason = $('input[name="hospitalization_reason"]').val() ? $('input[name="hospitalization_reason"]').val() : "";
                            let diseases = $('.form-check-input[name="diseases"]:checked').val() === "Var" ? $('#diseasesInput').val() : $('.form-check-input[name="diseases"]:checked').val();
                            let previousSurgeries = $('.form-check-input[name="previousSurgeries"]:checked').val() === "Var" ? $('#previousSurgeriesInput').val() : $('.form-check-input[name="previousSurgeries"]:checked').val();
                            let accidents = $('.form-check-input[name="accidents"]:checked').val() === "Var" ? $('#accidentsInput').val() : $('.form-check-input[name="accidents"]:checked').val();
                            let infectiousDisease = $('.form-check-input[name="infectiousDisease"]:checked').val() === "Var" ? $('#infectiousDiseaseInput').val() : $('.form-check-input[name="infectiousDisease"]:checked').val();
                            let allergies = $('.form-check-input[name="allergies"]:checked').val();
                            let allergen = $('input[name="allergen"]').val() ? $('input[name="allergen"]').val() : "";
                            let allergySymptoms = $('input[name="allergySymptoms"]').val() ? $('input[name="allergySymptoms"]').val() : "";
                            let allergyTherapy = $('input[name="allergyTherapy"]').val() ? $('input[name="allergyTherapy"]').val() : "";
                            let previousMedications = $('.form-check-input[name="previousMedications"]:checked').val();
                            let medicineName = $('input[name="medicineName"]').val() ? $('input[name="medicineName"]').val() : "";
                            let prescriptionType = $('.form-check-input[name="prescriptionType"]:checked').val() ? $('.form-check-input[name="prescriptionType"]:checked').val() : "";
                            let medicineFrequency = $('input[name="medicineFrequency"]').val() ? $('input[name="medicineFrequency"]').val() : "";
                            let medicineDose = $('input[name="medicineDose"]').val() ? $('input[name="medicineDose"]').val() : "";
                            let intakeMethod = $('input[name="intakeMethod"]').val() ? $('input[name="intakeMethod"]').val() : "";
                            let intakeTimes = $('input[name="intakeTimes"]').val() ? $('input[name="intakeTimes"]').val() : "";
                            // let sleepProblem = $('.form-check-input[name="sleepProblem"]:checked').val() === "Sorun Var" ? $("input[name='sleepProblemDesc']:checked").map(function() {
                            //     return $(this).val();
                            // }).get().join("/") : "Sorun Yok";

                            let aidTools = $('.form-check-input[name="aidTools"]:checked').val() === "Var" ? $("input[name='aidToolsDesc']:checked").map(function() {
                                return $(this).val();
                            }).get().join("/") : "Yok";

                            let smoking = $('input[name="smoking"]').is(':checked') ? $('input[name="smoking"]').val() : "Yok"; 
                            let smokingAmount = $('input[name="smokingAmount"]').val() ? $('input[name="smokingAmount"]').val() : "";
                            let smokingTime = $('input[name="smokingTime"]').val() ? $('input[name="smokingTime"]').val() : "";
                            let alcoholUsage = $('input[name="alcoholUsage"]').val();
                            let alcoholAmount = $('input[name="alcoholAmount"]').val() ? $('input[name="alcoholAmount"]').val() : "";
                            let alcoholUsageTime = $('input[name="alcoholUsageTime"]').val() ? $('input[name="alcoholUsageTime"]').val() : "";
                            let teaUsage = $('input[name="teaUsage"]').is(':checked') ? $('input[name="teaUsage"]').val() : "Yok";
                            let teaUsageAmount = $('input[name="teaUsageAmount"]').val() ? $('input[name="teaUsageAmount"]').val() : "";
                            let teaUsageTime = $('input[name="teaUsageTime"]').val() ? $('input[name="teaUsageTime"]').val() : "";
                            let coffeeUsage = $('input[name="coffeeUsage"]').is(':checked') ? $('input[name="coffeeUsage"]').val() : "Yok";
                            let coffeeUsageAmount = $('input[name="coffeeUsageAmount"]').val() ? $('input[name="coffeeUsageAmount"]').val() : "";
                            let coffeeUsageTime = $('input[name="coffeeUsageTime"]').val() ? $('input[name="coffeeUsageTime"]').val() : "";
                            let otherHabits = $('input[name="otherHabits"]').is(':checked') ? $('input[name="otherHabits"]').val() : "Yok";
                            let otherHabitsInput = $('input[name="otherHabitsInput"]').val() ? $('input[name="otherHabitsInput"]').val() : "";
                            let otherHabitsAmount = $('input[name="otherHabitsAmount"]').val() ? $('input[name="otherHabitsAmount"]').val() : "";
                            let otherHabitsTime = $('input[name="otherHabitsTime"]').val() ? $('input[name="otherHabitsTime"]').val() : "";
                            let familyIllnesses = $('.form-check-input[name="familyIllnesses"]:checked').val();
                            let familyMemberRelation = $('input[name="familyMemberRelation"]').val() ? $('input[name="familyMemberRelation"]').val() : "";
                            let familyMemberIllness = $('input[name="familyMemberIllness"]').val() ? $('input[name="familyMemberIllness"]').val() : "";
                            let arrivalFrom = $('.form-check-input[name="arrivalFrom"]:checked').val() === "Diger" ? $('#arrivalFromInput').val() : $('.form-check-input[name="arrivalFrom"]:checked').val();
                            let hospitalArrivalMethod = $('.form-check-input[name="hospitalArrivalMethod"]:checked').val() === "Diger" ? $('#hospitalArrivalMethodInput').val() : $('.form-check-input[name="hospitalArrivalMethod"]:checked').val();
                            let complaints = $('input[name="complaints"]').val() ? $('input[name="complaints"]').val() : "";
                            let medicalDiagnosis = $('input[name="medicalDiagnosis"]').val() ? $('input[name="medicalDiagnosis"]').val() : "";
                            var form_id = <?php echo $_GET['form_id']; ?>;


                             //set border color normal
                            $('.form-control').css('border-color', '#ced4da');
                            $('#option-error').css('display', 'none');

                            //set all error messages to none
                                $('.option-error').css('display', 'none');
                            if(nameSurname == "") {
                                //scroll to nameSurname 
                                $('html, body').animate({
                                    scrollTop: $("#nameSurname").offset().top
                                }, 200);
                                //change border color
                                $('#nameSurname').css('border-color', 'red');
                                //stop function 
                                return false;
                            }
                            
                            if(dob == "") {
                                //scroll to dob
                                $('html, body').animate({
                                    scrollTop: $("#dob").offset().top
                                }, 200);
                                //change border color
                                $('#dob').css('border-color', 'red');
                                return false;
                            }

                            if(age == ""){
                                //scroll to age
                                $('html, body').animate({
                                    scrollTop: $("#age").offset().top
                                }, 200);
                                //change border color
                                $('#age').css('border-color', 'red');
                                return false;
                            }

                            // if(age == ""){
                            //     //scroll to age
                            //     $('html, body').animate({
                            //         scrollTop: $("#age").offset().top
                            //     }, 200);
                            //     //change border color
                            //     $('#age').css('border-color', 'red');
                            //     return false;
                            // }

                            //gender
                            if ($('.form-check-input[name="gender"]:checked').length === 0) {
                                // Scroll to gender
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="gender"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="gender"]').first().closest('.input-section').find('.option-error').css('display', 'block');;
                                return false;
                                }

                            //maritalStatus
                            if(maritalStatus == ""){
                                //scroll to maritalStatus
                                $('html, body').animate({
                                    scrollTop: $("#maritalStatus").offset().top
                                }, 200);
                                //change border color
                                $('#maritalStatus').css('border-color', 'red');
                                return false;
                            }

                            //profession
                            if(profession == ""){
                                //scroll to profession
                                $('html, body').animate({
                                    scrollTop: $("#profession").offset().top
                                }, 200);
                                //change border color
                                $('#profession').css('border-color', 'red');
                                return false;
                            }

                            //education
                            if(education == ""){
                                //scroll to education
                                $('html, body').animate({
                                    scrollTop: $("#education").offset().top
                                }, 200);
                                //change border color
                                $('#education').css('border-color', 'red');
                                return false;
                            }

                            //protocol_file_no
                            if(protocol_file_no == ""){
                                //scroll to protocol_file_no
                                $('html, body').animate({
                                    scrollTop: $("#protocol_file_no").offset().top
                                }, 200);
                                //change border color
                                $('#protocol_file_no').css('border-color', 'red');
                                return false;
                            }

                            //admissionDate
                            if(admissionDate == ""){
                                //scroll to admissionDate
                                $('html, body').animate({
                                    scrollTop: $("#admissionDate").offset().top
                                }, 200);
                                //change border color
                                $('#admissionDate').css('border-color', 'red');
                                return false;
                            }

                            //department
                            if(department == ""){
                                //scroll to department
                                $('html, body').animate({
                                    scrollTop: $("#department").offset().top
                                }, 200);
                                //change border color
                                $('#department').css('border-color', 'red');
                                return false;
                            }

                            //diagnosis
                            if(diagnosis == ""){
                                //scroll to diagnosis
                                $('html, body').animate({
                                    scrollTop: $("#diagnosis").offset().top
                                }, 200);
                                //change border color
                                $('#diagnosis').css('border-color', 'red');
                                return false;
                            }

                            //doctorName
                            if(doctorName == ""){
                                //scroll to doctorName
                                $('html, body').animate({
                                    scrollTop: $("#doctorName").offset().top
                                }, 200);
                                //change border color
                                $('#doctorName').css('border-color', 'red');
                                return false;
                            }

                            //numberOfChildren
                            if(numberOfChildren == ""){
                                //scroll to numberOfChildren
                                $('html, body').animate({
                                    scrollTop: $("#numberOfChildren").offset().top
                                }, 200);
                                //change border color
                                $('#numberOfChildren').css('border-color', 'red');
                                return false;
                            }

                            //first().closest('.input-section').find('.option-error').css('display', 'block');
                   


                            //socialSecurity
                            if ($('.form-check-input[name="socialSecurity"]:checked').length === 0) {
                                // Scroll to socialSecurity
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="socialSecurity"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="socialSecurity"]').first().closest('.input-section').find('.option-error').css('display', 'block');;
                                return false;
                                }
                            if( $('.form-check-input[name="socialSecurity"]:checked').val() === "Diğer" && $('#socialSecuritOther').val() == ""){
                                //scroll to socialSecuritOther
                                $('html, body').animate({
                                    scrollTop: $("#socialSecuritOther").offset().top
                                }, 200);
                                //change border color
                                $('#socialSecuritOther').css('border-color', 'red');
                                return false;
                            }

                            //language
                            if(language == ""){
                                //scroll to language
                                $('html, body').animate({
                                    scrollTop: $("#language").offset().top
                                }, 200);
                                //change border color
                                $('#language').css('border-color', 'red');
                                return false;
                            }

                            

                            //translatorRequirement
                            if ($('.form-check-input[name="translatorRequirement"]:checked').length === 0) {
                                // Scroll to translatorRequirement
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="translatorRequirement"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="translatorRequirement"]').first().closest('.input-section').find('.option-error').css('display', 'block');;
                                return false;
                                }
                            if( $('.form-check-input[name="translatorRequirement"]:checked').val() === "Var" && $('#translatorRequirementInput').val() == ""){
                                //scroll to translatorRequirementInput
                                $('html, body').animate({
                                    scrollTop: $("#translatorRequirementInput").offset().top
                                }, 200);
                                //change border color
                                $('#translatorRequirementInput').css('border-color', 'red');
                                return false;
                            }

                            //bloodType
                            if(bloodGroup == ""){
                                //scroll to bloodType
                                $('html, body').animate({
                                    scrollTop: $("#bloodGroup").offset().top
                                }, 200);
                                //change border color
                                $('#bloodGroup').css('border-color', 'red');
                                return false;
                            }

                            //transfusionStatus
                            if($('.form-check-input[name="transfusionStatus"]:checked').length === 0) {
                                // Scroll to transfusionStatus
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="transfusionStatus"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="transfusionStatus"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="transfusionStatus"]:checked').val() === "Var" && $('#transfusionStatusInput').val() == ""){
                                //scroll to transfusionStatusInput
                                $('html, body').animate({
                                    scrollTop: $("#transfusionStatusInput").offset().top
                                }, 200);
                                //change border color
                                $('#transfusionStatusInput').css('border-color', 'red');
                                return false;
                            }

                            //transfusionReaction
                            if($('.form-check-input[name="transfusionReaction"]:checked').length === 0) {
                                // Scroll to transfusionReaction
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="transfusionReaction"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="transfusionReaction"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="transfusionReaction"]:checked').val() === "Var" && $('#transfusionReactionInput').val() == ""){
                                //scroll to transfusionReactionInput
                                $('html, body').animate({
                                    scrollTop: $("#transfusionReactionInput").offset().top
                                }, 200);
                                //change border color
                                $('#transfusionReactionInput').css('border-color', 'red');
                                return false;
                            }

                            if(infoPerson === ""){
                                //scroll to infoPerson
                                $('html, body').animate({
                                    scrollTop: $("#infoPerson").offset().top
                                }, 200);
                                //change border color
                                $('#infoPerson').css('border-color', 'red');
                                return false;
                            }

                            //infoStorageType
                            if($('.form-check-input[name="infoStorageType"]:checked').length === 0) {
                                // Scroll to infoStorageType
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="infoStorageType"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="infoStorageType"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="infoStorageType"]:checked').val() === "Diger" && $('#infoStorageTypeInput').val() == ""){
                                //scroll to infoStorageTypeInput
                                $('html, body').animate({
                                    scrollTop: $("#infoStorageTypeInput").offset().top
                                }, 200);
                                //change border color
                                $('#infoStorageTypeInput').css('border-color', 'red');
                                return false;
                            }

                            //kolbandi
                            if(kolbandi == ""){
                                //scroll to kolbandi
                                $('html, body').animate({
                                    scrollTop: $("#kolbandi").offset().top
                                }, 200);
                                //change border color
                                $('#kolbandi').css('border-color', 'red');
                                return false;
                            }

                            //relativeNameSurname
                            if(relativeNameSurname == ""){
                                //scroll to relativeNameSurname
                                $('html, body').animate({
                                    scrollTop: $("#relativeNameSurname").offset().top
                                }, 200);
                                //change border color
                                $('#relativeNameSurname').css('border-color', 'red');
                                return false;
                            }

                             //relativeDistance
                             if(relativeDistance == ""){
                                //scroll to relativeDistance
                                $('html, body').animate({
                                    scrollTop: $("#relativeDistance").offset().top
                                }, 200);
                                //change border color
                                $('#relativeDistance').css('border-color', 'red');
                                return false;
                            }


                            //relativePhone
                            if(relativePhone == ""){
                                //scroll to relativePhone
                                $('html, body').animate({
                                    scrollTop: $("#relativePhone").offset().top
                                }, 200);
                                //change border color
                                $('#relativePhone').css('border-color', 'red');
                                return false;
                            }

                            //relativeAddress
                            if(relativeAddress == ""){
                                //scroll to relativeAddress
                                $('html, body').animate({
                                    scrollTop: $("#relativeAddress").offset().top
                                }, 200);
                                //change border color
                                $('#relativeAddress').css('border-color', 'red');
                                return false;
                            }

                           
                            //previousHospitalization
                            if($('.form-check-input[name="previousHospitalization"]:checked').length === 0) {
                                // Scroll to previousHospitalization
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="previousHospitalization"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="previousHospitalization"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="previousHospitalization"]:checked').val() === "Var" && $('#hospitalization_year').val() == ""){
                                //scroll to hospitalization_year
                                $('html, body').animate({
                                    scrollTop: $("#hospitalization_year").offset().top
                                }, 200);
                                //change border color
                                $('#hospitalization_year').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousHospitalization"]:checked').val() === "Var" && $('#hospitalization_location').val() == ""){
                                //scroll to hospitalization_location
                                $('html, body').animate({
                                    scrollTop: $("#hospitalization_location").offset().top
                                }, 200);
                                //change border color
                                $('#hospitalization_location').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousHospitalization"]:checked').val() === "Var" && $('#hospitalization_reason').val() == ""){
                                //scroll to hospitalization_reason
                                $('html, body').animate({
                                    scrollTop: $("#hospitalization_reason").offset().top
                                }, 200);
                                //change border color
                                $('#hospitalization_reason').css('border-color', 'red');
                                return false;
                            }

                            //diseases
                            if($('.form-check-input[name="diseases"]:checked').length === 0) {
                                // Scroll to diseases
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="diseases"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="diseases"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="diseases"]:checked').val() === "Var" && $('#diseasesInput').val() == ""){
                                //scroll to diseasesInput
                                $('html, body').animate({
                                    scrollTop: $("#diseasesInput").offset().top
                                }, 200);
                                //change border color
                                $('#diseasesInput').css('border-color', 'red');
                                return false;
                            }

                            //previousSurgeries
                            if($('.form-check-input[name="previousSurgeries"]:checked').length === 0) {
                                // Scroll to previousSurgeries
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="previousSurgeries"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="previousSurgeries"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="previousSurgeries"]:checked').val() === "Var" && $('#previousSurgeriesInput').val() == ""){
                                //scroll to previousSurgeriesInput
                                $('html, body').animate({
                                    scrollTop: $("#previousSurgeriesInput").offset().top
                                }, 200);
                                //change border color
                                $('#previousSurgeriesInput').css('border-color', 'red');
                                return false;
                            }
                            
                            //accidents
                            if($('.form-check-input[name="accidents"]:checked').length === 0) {
                                // Scroll to accidents
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="accidents"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="accidents"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="accidents"]:checked').val() === "Var" && $('#accidentsInput').val() == ""){
                                //scroll to accidentsInput
                                $('html, body').animate({
                                    scrollTop: $("#accidentsInput").offset().top
                                }, 200);
                                //change border color
                                $('#accidentsInput').css('border-color', 'red');
                                return false;
                            }

                            //infectiousDisease
                            if($('.form-check-input[name="infectiousDisease"]:checked').length === 0) {
                                // Scroll to infectiousDisease
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="infectiousDisease"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="infectiousDisease"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="infectiousDisease"]:checked').val() === "Var" && $('#infectiousDiseaseInput').val() == ""){
                                //scroll to infectiousDiseaseInput
                                $('html, body').animate({
                                    scrollTop: $("#infectiousDiseaseInput").offset().top
                                }, 200);
                                //change border color
                                $('#infectiousDiseaseInput').css('border-color', 'red');
                                return false;
                            }

                            //allergies
                            if($('.form-check-input[name="allergies"]:checked').length === 0) {
                                // Scroll to allergies
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="allergies"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="allergies"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="allergies"]:checked').val() === "Var" && $('#allergen').val() == ""){
                                //scroll to allergen
                                $('html, body').animate({
                                    scrollTop: $("#allergen").offset().top
                                }, 200);
                                //change border color
                                $('#allergen').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="allergies"]:checked').val() === "Var" && $('#allergySymptoms').val() == ""){
                                //scroll to allergySymptoms
                                $('html, body').animate({
                                    scrollTop: $("#allergySymptoms").offset().top
                                }, 200);
                                //change border color
                                $('#allergySymptoms').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="allergies"]:checked').val() === "Var" && $('#allergyTherapy').val() == ""){
                                //scroll to allergyTherapy
                                $('html, body').animate({
                                    scrollTop: $("#allergyTherapy").offset().top
                                }, 200);
                                //change border color
                                $('#allergyTherapy').css('border-color', 'red');
                                return false;
                            }

                            //previousMedications
                            if($('.form-check-input[name="previousMedications"]:checked').length === 0) {
                                // Scroll to previousMedications
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="previousMedications"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="previousMedications"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="previousMedications"]:checked').val() === "Var" && $('#medicineName').val() == ""){
                                //scroll to medicineName
                                $('html, body').animate({
                                    scrollTop: $("#medicineName").offset().top
                                }, 200);
                                //change border color
                                $('#medicineName').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousMedications"]:checked').val() === "Var" && $('#medicineDose').val() == ""){
                                //scroll to medicineDose
                                $('html, body').animate({
                                    scrollTop: $("#medicineDose").offset().top
                                }, 200);
                                //change border color
                                $('#medicineDose').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousMedications"]:checked').val() === "Var" && $('#medicineFrequency').val() == ""){
                                //scroll to medicineFrequency
                                $('html, body').animate({
                                    scrollTop: $("#medicineFrequency").offset().top
                                }, 200);
                                //change border color
                                $('#medicineFrequency').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousMedications"]:checked').val() === "Var" && $('#intakeMethod').val() == ""){
                                //scroll to intakeMethod
                                $('html, body').animate({
                                    scrollTop: $("#intakeMethod").offset().top
                                }, 200);
                                //change border color
                                $('#intakeMethod').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="previousMedications"]:checked').val() === "Var" && $('#intakeTimes').val() == ""){
                                //scroll to intakeTimes
                                $('html, body').animate({
                                    scrollTop: $("#intakeTimes").offset().top
                                }, 200);
                                //change border color
                                $('#intakeTimes').css('border-color', 'red');
                                return false;
                            }

                            //aidTools
                            if($('.form-check-input[name="aidTools"]:checked').length === 0) {
                                // Scroll to aidTools
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="aidTools"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="aidTools"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="aidTools"]:checked').val() === "Var" && $('.form-check-input[name="aidToolsDesc"]:checked').length === 0){
                                //scroll to aidTools
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="aidTools"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="aidTools"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }

                        

                            //familyIllnesses
                            if($('.form-check-input[name="familyIllnesses"]:checked').length === 0){
                                //scroll to familyIllnesses
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="familyIllnesses"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="familyIllnesses"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="familyIllnesses"]:checked').val() === "Var" && $('#familyMemberRelation').val() == ""){
                                //scroll to familyMemberRelation
                                $('html, body').animate({
                                    scrollTop: $("#familyMemberRelation").offset().top
                                }, 200);
                                //change border color
                                $('#familyMemberRelation').css('border-color', 'red');
                                return false;
                            }
                            if( $('.form-check-input[name="familyIllnesses"]:checked').val() === "Var" && $('#familyMemberIllness').val() == ""){
                                //scroll to familyMemberIllness
                                $('html, body').animate({
                                    scrollTop: $("#familyMemberIllness").offset().top
                                }, 200);
                                //change border color
                                $('#familyMemberIllness').css('border-color', 'red');
                                return false;
                            }

                            //arrivalFrom
                            if($('.form-check-input[name="arrivalFrom"]:checked').length === 0){
                                //scroll to arrivalFrom
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="arrivalFrom"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="arrivalFrom"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="arrivalFrom"]:checked').val() === "Diger" && $('#arrivalFromInput').val() == ""){
                                //scroll to arrivalFromInput
                                $('html, body').animate({
                                    scrollTop: $("#arrivalFromInput").offset().top
                                }, 200);
                                //change border color
                                $('#arrivalFromInput').css('border-color', 'red');
                                return false;
                            }

                            //hospitalArrivalMethod
                            if($('.form-check-input[name="hospitalArrivalMethod"]:checked').length === 0){
                                //scroll to hospitalArrivalMethod
                                $('html, body').animate({
                                    scrollTop: $('.form-check-input[name="hospitalArrivalMethod"]').first().offset().top
                                }, 200);
                                // Change border color
                                $('.form-check-input[name="hospitalArrivalMethod"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                                return false;

                            }
                            if( $('.form-check-input[name="hospitalArrivalMethod"]:checked').val() === "Diger" && $('#hospitalArrivalMethodInput').val() == ""){
                                //scroll to hospitalArrivalMethodInput
                                $('html, body').animate({
                                    scrollTop: $("#hospitalArrivalMethodInput").offset().top
                                }, 200);
                                //change border color
                                $('#hospitalArrivalMethodInput').css('border-color', 'red');
                                return false;
                            }

                            //complaints
                            if(complaints == ""){
                                //scroll to complaints
                                $('html, body').animate({
                                    scrollTop: $("#complaints").offset().top
                                }, 200);
                                //change border color
                                $('#complaints').css('border-color', 'red');
                                return false;
                            }

                            //medicalDiagnosis
                            if(medicalDiagnosis == ""){
                                //scroll to medicalDiagnosis
                                $('html, body').animate({
                                    scrollTop: $("#medicalDiagnosis").offset().top
                                }, 200);
                                //change border color
                                $('#medicalDiagnosis').css('border-color', 'red');
                                return false;
                            }
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Ozgecmis.php',
                        data: {
                            isUpdate : true,
                            form_id : form_id,
                            age: age,
                            patient_id: patient_id,
                            patient_name: patient_name,
                            form_name: form_name,
                            creation_date : creation_date,
                            update_date : update_date,
                            nameSurname: nameSurname,
                            dob : dob,
                            infoPerson : infoPerson,
                            gender: gender,
                            maritalStatus: maritalStatus,
                            profession: profession,
                            education: education,
                            protocol_file_no: protocol_file_no,
                            admissionDate: admissionDate,
                            department: department,
                            diagnosis: diagnosis,
                            doctorName: doctorName,
                            numberOfChildren: numberOfChildren,
                            socialSecurity: socialSecurity,
                            language: language,
                            translatorRequirement: translatorRequirement,
                            bloodGroup: bloodGroup,
                            transfusionStatus: transfusionStatus,
                            transfusionReaction: transfusionReaction,
                            infoStorageType: infoStorageType,
                            kolbandi: kolbandi,
                            relativeNameSurname: relativeNameSurname,
                            relativePhone: relativePhone,
                            relativeAddress: relativeAddress,
                            relativeDistance: relativeDistance,
                            previousHospitalization: previousHospitalization,
                            hospitalization_year: hospitalization_year,
                            hospitalization_location: hospitalization_location,
                            hospitalization_reason: hospitalization_reason,
                            diseases: diseases,
                            previousSurgeries: previousSurgeries,
                            accidents: accidents,
                            infectiousDisease: infectiousDisease,
                            allergies: allergies,
                            allergen: allergen,
                            allergySymptoms: allergySymptoms,
                            allergyTherapy: allergyTherapy,
                            previousMedications: previousMedications,
                            medicineName: medicineName,
                            prescriptionType: prescriptionType,
                            medicineFrequency: medicineFrequency,
                            medicineDose: medicineDose,
                            intakeMethod: intakeMethod,
                            intakeTimes: intakeTimes,
                            aidTools: aidTools,
                            smoking: smoking,
                            smokingAmount: smokingAmount,
                            smokingTime: smokingTime,
                            alcoholUsage: alcoholUsage,
                            alcoholAmount: alcoholAmount,
                            alcoholUsageTime: alcoholUsageTime,
                            teaUsage: teaUsage,
                            teaUsageAmount: teaUsageAmount,
                            teaUsageTime: teaUsageTime,
                            coffeeUsage: coffeeUsage,
                            coffeeUsageAmount: coffeeUsageAmount,
                            coffeeUsageTime: coffeeUsageTime,
                            otherHabits: otherHabits,
                            otherHabitsInput: otherHabitsInput,
                            otherHabitsAmount: otherHabitsAmount,
                            otherHabitsTime: otherHabitsTime,
                            familyIllnesses: familyIllnesses,
                            familyMemberRelation: familyMemberRelation,
                            familyMemberIllness: familyMemberIllness,
                            arrivalFrom: arrivalFrom,
                            hospitalArrivalMethod : hospitalArrivalMethod,
                            complaints: complaints,
                            medicalDiagnosis: medicalDiagnosis                       
                            
                        },
                        success: function(data) {
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" +
                                patient_id + "&patient_name=" + encodeURIComponent(
                                    patient_name);
                                    $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 1000);
                        },
                        error: function(data) {
                            alert("error");
                        }
                    })
            })

        </script>
        <!-- Template Javascript -->
        
</body>

</html>
