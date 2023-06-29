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

$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
$sql = "SELECT * FROM vucudutemizform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $vucudutemizform1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">VÜCUDU TEMİZ VE BAKIMLI TUTMA</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">En Son Banyo Yaptığı Tarih :</p>
                <input type="date" class="form-control" name="bathDate" id="bathDate" value="<?php echo $vucudutemizform1[0]['bathDate']; ?>">
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Vücut temizliğini yapmada </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="bodyCleansingDependence" value="Bağımsız">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="bodyCleansingDependence" value="Yarı bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="bodyCleansingDependence" value="Bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Banyo Sıklığı: :</p>
                <input type="text" class="form-control" name="bathingFrequency" id="bathingFrequency" value="<?php echo $vucudutemizform1[0]['bathingFrequency']; ?>" >
            </div>

            <div class="input-section d-flex">
        
                <p class="usernamelabel">Şekli:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bathingMethod" id="bathingMethod" value="Duş/Ayakta">
                            <label class="form-check-label" for="BanyoSekli">
                                <span class="checkbox-header">Duş/Ayakta </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bathingMethod" id="bathingMethod" value="Küvet/Oturarak">
                            <label class="form-check-label" for="BanyoSekli">
                                <span class="checkbox-header">Küvet/Oturarak </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="input-section d-flex">

                <p class="usernamelabel">Banyo Suyunun Sıcaklığı </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="waterTemperature" value="Soğuk">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Soğuk </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="waterTemperature" value="Ilık">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Ilık </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="waterTemperature" value="Çok Sıcak">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Çok Sıcak </span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Temizlik Ürünü </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cleaningProduct" id="cleaningProduct" value="Sabun">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header"> Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cleaningProduct" id="cleaningProduct" value="Duş Jeli">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header">Duş Jeli </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cleaningProduct" id="cleaningProduct" value="Diğer">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" disabled name="cleaningProductDiger"  id="cleaningProductDiger">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Saç Temizlik Ürünü </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="hairCleaningProduct" value="Sabun">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="hairCleaningProduct" value="Şampuan">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Şampuan</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="hairCleaningProduct" value="Diğer">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" disabled name="hairCleaningProductDiger"  id="hairCleaningProductDiger">

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Banyo Sonrası </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="afterBathProduct" value="Losyon">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Losyon </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="afterBathProduct" value="Krem">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Krem </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="afterBathProduct" value="Deodarant/Parfüm">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Deodarant/Parfüm </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="afterBathProduct" value="Roll-on ">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Roll-on </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="afterBathProduct" value="Diğer">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" disabled name="afterBathProductDiger" id="afterBathProductDiger">

                            </label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="input-section d-flex">
                
                <p class="usernamelabel w-25">Uygulamalar </p>
                <p class="usernamelabel w-25">Sıklığı/Zamanı</p>
                <p class="usernamelabel w-25">Şekli</p>
                <p class="usernamelabel w-25">Kullanılan Malzeme</p>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Ağız bakımı (Diş protez bakımı) </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <input type="text" class="form-control w-25" name="mouthCareFreq" id="mouthCareFreq" value="<?php echo $vucudutemizform1[0]['mouthCareFreq']; ?>">
                <input type="text" class="form-control w-25" name="mouthCareMethod" id="mouthCareMethod" value="<?php echo $vucudutemizform1[0]['mouthCareMethod']; ?>">
                <input type="text" class="form-control w-25" name="mouthCareMaterial" id="mouthCareMethod" value="<?php echo $vucudutemizform1[0]['mouthCareMethod']; ?>">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Tırnak bakımı </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <input type="text" class="form-control w-25" name="nailCareFreq" id="nailCareFreq" value="<?php echo $vucudutemizform1[0]['mouthCareFreq']; ?>">
                <input type="text" class="form-control w-25" name="nailCareMethod" id="nailCareMethod" value="<?php echo $vucudutemizform1[0]['mouthCareFreq']; ?>">
                <input type="text" class="form-control w-25" name="nailCareMaterial" id="nailCareMaterial" value="<?php echo $vucudutemizform1[0]['mouthCareFreq']; ?>">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">El yıkama alışkanlığı </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <input type="text" class="form-control w-25" name="handWashingFreq" id="handWashingFreq" value="<?php echo $vucudutemizform1[0]['handWashingFreq']; ?>">
                <input type="text" class="form-control w-25" name="handWashingMethod" id="handWashingMethod" value="<?php echo $vucudutemizform1[0]['handWashingMethod']; ?>">
                <input type="text" class="form-control w-25" name="handWashingMaterial" id="handWashingMaterial" value="<?php echo $vucudutemizform1[0]['handWashingMaterial']; ?>">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Perine bakımı </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <input type="text" class="form-control w-25" name="periniumCareFreq" id="periniumCareFreq" value="<?php echo $vucudutemizform1[0]['periniumCareFreq']; ?>">
                <input type="text" class="form-control w-25" name="periniumCareMethod" id="periniumCareMethod" value="<?php echo $vucudutemizform1[0]['periniumCareMethod']; ?>">
                <input type="text" class="form-control w-25" name="periniumCareMaterial" id="periniumCareMaterial" value="<?php echo $vucudutemizform1[0]['periniumCareMaterial']; ?>">
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Menstrual Hijyen
                </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Son adet tarihi </span>
                    </label>
                    <input type="date" class="form-control" name="menstrualDate" id="menstrualDate" value="<?php echo $vucudutemizform1[0]['menstrualDate']; ?>">
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Süresi </span>
                    </label>
                    <input type="text" class="form-control" name="mensturalTime" id="mensturalTime" value="<?php echo $vucudutemizform1[0]['menstrualDate']; ?>">
                </div>
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Menstruasyonda kullandığı Ürün:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                <div class="checkbox-wrapper d-flex align-items-center">
                    <div class="checkboxes">
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="menstrualProduct" id="menstrualProduct" value="Hazır ped">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Hazır ped</span>
                            </label>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="menstrualProduct" id="menstrualProduct" value="Bez">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Bez </span>

                            </label>
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="menstrualProduct" id="menstrualProduct" value="Diğer">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Diğer: </span>
                                <input type="text" class="form-control" disabled name="menstrualProductDiger"  id="menstrualProductDiger">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">

                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>

                            </label>
                            <input type="text" class="form-control diger" disabled name="padReplacementFreq" id="padReplacementFreq">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger" disabled  name="bezReplacementFreq" id="bezReplacementFreq">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio" >
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger" disabled name="digerReplacementFreq" id="digerReplacementFreq">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex border p-3" >
                <p class="usernamelabel">Derinin Değerlendirilmesi </p>
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Renk Değişimi </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinColorProblem" id="skinColorProblem" value="Yok">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinColorProblem" id="skinColorProblem" value="Var">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled  name="skinColorProblemDesc" id="skinColorProblemDesc" value="Sari">
                                                        <label class="form-check-label" for="Sari">Sarı
                                                            Yeri… </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled  name="skinColorProblemDesc" id="skinColorProblemDesc" value="Soluk">
                                                        <label class="form-check-label" for="Soluk1">Soluk
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled  name="skinColorProblemDesc" id="skinColorProblemDesc" value="Kızarıklık">
                                                        <label class="form-check-label" for="Kızarıklık">Kızarıklık.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled  name="skinColorProblemDesc" id="skinColorProblemDesc" value="Siyanoz">
                                                        <label class="form-check-label" for="Siyanoz">Siyanoz.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="skinColorProblemDesc" value="Renk kaybı">
                                                        <label class="form-check-label" for="RenkKaybı">Renk
                                                            kaybı</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled  name="skinColorProblemDesc" id="skinColorProblemDesc" value="Pigmentasyon artışı">
                                                        <label class="form-check-label" for="PigmentasyonArtışı">Pigmentasyon artışı. Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Nemlilik </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinMoisture" id="skinMoisture" value="Sorun yok">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinMoisture" id="skinMoisture" value="Var">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled  name="skinMoistureInput" id="skinMoistureInput">
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Isı değişimi </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinTemperature" id="skinTemperature" value="Sorun yok">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinTemperature" id="skinTemperature" value="Var">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled  name="skinTemperatureInput">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Derinin yapısı </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Normal">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Normal </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Pürüzlü">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Pürüzlü</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Sert">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Sert</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Esnek">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Esnek</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Buruşuk">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Buruşuk</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="İnce">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">İnce</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Düz">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Düz</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="skinStructure" id="skinStructure" value="Kalın">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Kalın</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="input-section d-flex">

                        <p class="usernamelabel">Deri Turgoru </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinAge" id="skinAge" value="Normal">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Normal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinAge" id="skinAge" value="Zayıf">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Zayıf</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Deride Sorun </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinProblem" id="skinProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinProblem" id="skinProblem" value="Var">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input"  type="checkbox" disabled name="skinProblemDesc" id="skinProblemDesc" value="Makül">
                                                        <label class="form-check-label" for="Makül">Makül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input"  type="checkbox" disabled name="skinProblemDesc" id="skinProblemDesc" value="Papül">
                                                        <label class="form-check-label" for="Papül">Papül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input"  type="checkbox" disabled name="skinProblemDesc" id="skinProblemDesc" value="Vezikül">
                                                        <label class="form-check-label" for="Vezikül">Vezikül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input"  type="checkbox" disabled name="skinProblemDesc" id="skinProblemDesc" value="Peteşi">
                                                        <label class="form-check-label" for="Peteşi">Peteşi</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input"  type="checkbox" disabled name="skinProblemDesc" id="skinProblemDesc" value="Purpura">
                                                        <label class="form-check-label" for="Purpura">Purpura</label>
                                                    </div>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section d-flex border p-3">
                <p class="usernamelabel">Saç ve Vücut Kılları
                </p>
                
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Yapısı </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bodyHairStructure" id="bodyHairStructure" value="Sorun Yok">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bodyHairStructure" id="bodyHairStructure" value="Var">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="bodyHairStructureDesc" value="Yağlı">
                                                        <label class="form-check-label" for="Yağlı">Yağlı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="bodyHairStructureDesc" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="bodyHairStructureDesc" value="Sert">
                                                        <label class="form-check-label" for="Sert">Sert
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="bodyHairStructureDesc" value="Yumuşak">
                                                        <label class="form-check-label" for="Yumuşak">Yumuşak</label>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Dağılımı </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hairDistributionProblem" id="hairDistributionProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hairDistributionProblem" id="hairDistributionProblem" value="Var">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="hairDistributionProblemDesc" value="Alopesia">
                                                        <label class="form-check-label" for="Alopesia">Alopesia</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="hairDistributionProblemDesc" value="Seyrek">
                                                        <label class="form-check-label" for="Seyrek">Seyrek
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="hairDistributionProblemDesc" value="Tüylenmede">
                                                        <label class="form-check-label" for="Tüylenmede">Tüylenmede
                                                            Artış</label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Saçlı deri </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scalpHairProblem" id="scalpHairProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scalpHairProblem" id="scalpHairProblem" value="Var">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled name="scalpHairProblemDesc" type="checkbox" id="scalpHairProblemDesc" value="Kuruma">
                                                        <label class="form-check-label" for="Kuruma"> Kuruma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="scalpHairProblemDesc" value="Yağlanma">
                                                        <label class="form-check-label" for="Yağlanma">Yağlanma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="scalpHairProblemDesc" value="Kepeklenme">
                                                        <label class="form-check-label" for="Kepeklenme">Kepeklenme</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="scalpHairProblemDesc" value="Parazit">
                                                        <label class="form-check-label" for="Parazit">Parazit</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="scalpHairProblemDesc" value="Kitle">
                                                        <label class="form-check-label" for="Kitle">Kitle.
                                                            Açıklayınız</label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex border p-3">
                <p class="usernamelabel">Tırnaklar
                </p>
                
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                        <p class="usernamelabel ">Rengi </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailColorProblem" id="nailColorProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailColorProblem" id="nailColorProblem" value="Var">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="nailColorProblemDesc" value="Siyanotik">
                                                        <label class="form-check-label" for="Siyanotik"> Siyanotik
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="nailColorProblemDesc" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk
                                                            beyaz</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="nailColorProblemDesc" value="Sarı">
                                                        <label class="form-check-label" for="Sarı">Sarı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Şekli </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailStructureProblem" id="nailStructureProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailStructureProblem" id="nailStructureProblem" value="Var">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="nailStructureProblemDesc" value="Çomaklaşma">
                                                        <label class="form-check-label" for="Çomaklaşma">
                                                            Çomaklaşma </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" id="nailStructureProblemDesc" name="nailStructureProblemDesc" value="Beyaz Lekeler">
                                                        <label class="form-check-label" for="BeyazLekeler">Beyaz
                                                            lekeler</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="nailStructureProblemDesc" value="Paronişya">
                                                        <label class="form-check-label" for="Paronişya">Paronişya
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="nailStructureProblemDesc" value="Diğer">
                                                        <label class="form-check-label" for="Diğer">Diğer
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Kapiller Dolum </p>
                        <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capillaryFillingProblem" id="capillaryFillingProblem" value="Sorun Yok">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Sorun Yok</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capillaryFillingProblem" id="capillaryFillingProblem" value="Var">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled  name="capillaryFillingInput">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='d-flex'>    
    <input class="submit m-auto " type='submit' name="submit" id="submit" value="Kayıt">
</div>

            </form>
        </div>


    </div>

            <script>
                    $('#closeBtn1').click(function(e) {
        e.preventDefault();
        console.log("close btn clicked");
        let patient_id = "<?php echo $vucudutemizform1[0]['patient_id']; ?>"
        let patient_name = "<?php echo $vucudutemizform1[0]['patient_name']; ?>"
        var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
            "&patient_name=" + encodeURIComponent(patient_name);
        $("#content").load(url);
    })
            </script>

        <script>
              $('.form-check-input[name="cleaningProduct"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Diğer"){
                        $('[name="cleaningProductDiger"]').prop('disabled', false);
                    }else{
                        $('[name="cleaningProductDiger"]').prop('disabled', true);
                    }
                })
                $('.form-check-input[name="hairCleaningProduct"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Diğer"){
                        $('input[name="hairCleaningProductDiger"]').prop('disabled', false);
                    }else{
                        $('input[name="hairCleaningProductDiger"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="afterBathProduct"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Diğer"){
                        $('input[name="afterBathProductDiger"]').prop('disabled', false);
                    }else{
                        $('input[name="afterBathProductDiger"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="menstrualProduct"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Diğer"){
                        $('input[name="menstrualProductDiger"]').prop('disabled', false);
                    }else{
                        $('input[name="menstrualProductDiger"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="skinColorProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="skinColorProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="skinColorProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="skinMoisture"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="skinMoistureInput"]').prop('disabled', false);
                    }else{
                        $('input[name="skinMoistureInput"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="skinTemperature"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="skinTemperatureInput"]').prop('disabled', false);
                    }else{
                        $('input[name="skinTemperatureInput"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="skinProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="skinProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="skinProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="bodyHairStructure"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="bodyHairStructureDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="bodyHairStructureDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="hairDistributionProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="hairDistributionProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="hairDistributionProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="scalpHairProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="scalpHairProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="scalpHairProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="nailColorProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="nailColorProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="nailColorProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="nailStructureProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="nailStructureProblemDesc"]').prop('disabled', false);
                    }else{
                        $('input[name="nailStructureProblemDesc"]').prop('disabled', true);
                    }
                })

                $('.form-check-input[name="capillaryFillingProblem"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="capillaryFillingInput"]').prop('disabled', false);
                    }else{
                        $('input[name="capillaryFillingInput"]').prop('disabled', true);
                    }
                })
        //function for prefill$
        $(function(){
            //bodyCleansingDependence
            $(".form-check-input[name='bodyCleansingDependence']").each(function(){
                if($(this).val() === "<?php echo $vucudutemizform1[0]['bodyCleansingDependence']?>" ){
                    $(this).prop("checked", true);
                }
            })
            //bathingMethod
            $(".form-check-input[name='bathingMethod']").each(function(){
                if($(this).val() === "<?php echo $vucudutemizform1[0]['bathingMethod']?>" ){
                    $(this).prop("checked", true);
                }
            })
            //waterTemperature
            $(".form-check-input[name='waterTemperature']").each(function(){
                if($(this).val() === "<?php echo $vucudutemizform1[0]['waterTemperature']?>" ){
                    $(this).prop("checked", true);
                }
            })
            //cleaningProduct
            let cleaningProductValue = "<?php echo $vucudutemizform1[0]['cleaningProduct']?>";
            let radioValues = $(".form-check-input[name='cleaningProduct']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues.includes(cleaningProductValue)) {
            $(".form-check-input[name='cleaningProduct']").filter(function() {
                return $(this).val() === cleaningProductValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='cleaningProduct']").filter(function() {
                return $(this).val() === "Diğer";
            }).prop('checked', true);
            $("input[name='cleaningProductDiger']").val(cleaningProductValue);
            $("input[name='cleaningProductDiger']").prop('disabled', false);

            }
            //hairCleaningProduct
            let hairCleaningProductValue = "<?php echo $vucudutemizform1[0]['hairCleaningProduct']?>";
            let radioValues2 = $(".form-check-input[name='hairCleaningProduct']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues2.includes(hairCleaningProductValue)) {
            $(".form-check-input[name='hairCleaningProduct']").filter(function() {
                return $(this).val() === hairCleaningProductValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='hairCleaningProduct']").filter(function() {
                return $(this).val() === "Diğer";
            }).prop('checked', true);
            $("input[name='hairCleaningProductDiger']").val(hairCleaningProductValue);
            $("input[name='hairCleaningProductDiger']").prop('disabled', false);
            }
            
            //afterBathProduct
            let afterBathProductValue = "<?php echo $vucudutemizform1[0]['afterBathProduct']?>";
            let radioValues3 = $(".form-check-input[name='afterBathProduct']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues3.includes(afterBathProductValue)) {
            $(".form-check-input[name='afterBathProduct']").filter(function() {
                return $(this).val() === afterBathProductValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='afterBathProduct']").filter(function() {
                return $(this).val() === "Diğer";
            }).prop('checked', true);
            $("input[name='afterBathProductDiger']").val(afterBathProductValue);
            $("input[name='afterBathProductDiger']").prop('disabled', false);
            }
            
            //menstrualProduct
            $(".form-check-input[name='menstrualProduct']").each(function() {
                if ($(this).val() === "<?php echo $vucudutemizform1[0]['mensturalProduct']; ?>") {
                    $(this).prop("checked", true);
    
                    if($(this).val()==="Hazır ped"){
                        $("input[name='padReplacementFreq']").val("<?php echo $vucudutemizform1[0]['mensturalProductReplacement']; ?>");
                        $("input[name='padReplacementFreq']").prop('disabled', false);

                    }
                    if($(this).val()==="Bez"){
                        $("input[name='bezReplacementFreq']").val("<?php echo $vucudutemizform1[0]['mensturalProductReplacement']; ?>");
                        $("input[name='bezReplacementFreq']").prop('disabled', false);
                    }
                    if($(this).val()==="Diğer"){
                        $("input[name='digerReplacementFreq']").val("<?php echo $vucudutemizform1[0]['mensturalProductReplacement']; ?>");
                        $("input[name='digerReplacementFreq']").prop('disabled', false);
                    }
                }
                else{
                    if($(this).val() === "Diğer"){
                        $(this).prop("checked", true);
                        $("input[name='digerReplacementFreq']").val("<?php echo $vucudutemizform1[0]['mensturalProductReplacement']; ?>");
                        $("input[name='menstrualProductDiger']").val("<?php echo $vucudutemizform1[0]['mensturalProduct']; ?>");
                        $("input[name='digerReplacementFreq']").prop('disabled', false);
                        $("input[name='menstrualProductDiger']").prop('disabled', false);

                    } 
                }
            });
            //skinColorProblem
            let skinColorProblemArr = "<?php echo $vucudutemizform1[0]['skinColorProblem']; ?>".split("/");
            if(skinColorProblemArr[0] === "Yok"){
                $('input[name="skinColorProblem"][value="Yok"]').prop('checked', true);
            }else{
                $('input[name="skinColorProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='skinColorProblemDesc']").prop('disabled', false);
                $(".form-check-input[name='skinColorProblemDesc']").each(function() {
                    if (skinColorProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //skinMoisture
            let skinMoistureValue = "<?php echo $vucudutemizform1[0]['skinMoisture']; ?>";
            let radioValues4 = $(".form-check-input[name='skinMoisture']").map(function() {
            return $(this).val();
            }).get();
            
            if (radioValues4.includes(skinMoistureValue)) {
            $(".form-check-input[name='skinMoisture']").filter(function() {
                return $(this).val() === skinMoistureValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='skinMoisture']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='skinMoistureInput']").val(skinMoistureValue);
            $("input[name='skinMoistureInput']").prop('disabled', false);

            }
            //skinTemperature
            let skinTemperatureValue = "<?php echo $vucudutemizform1[0]['skinTemperature']; ?>";
            let radioValues5 = $(".form-check-input[name='skinTemperature']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues5.includes(skinTemperatureValue)) {
            $(".form-check-input[name='skinTemperature']").filter(function() {
                return $(this).val() === skinTemperatureValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='skinTemperature']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='skinTemperatureInput']").val(skinTemperatureValue);
            $("input[name='skinTemperatureInput']").prop('disabled', false);
            }
            //skinStructure
              $(".form-check-input[name='skinStructure']").each(function() {
                if ($(this).val() === "<?php echo $vucudutemizform1[0]['skinStructure']; ?>") {
                    $(this).prop("checked", true);
                }
            });
            //skinAge
            $(".form-check-input[name='skinAge']").each(function() {
                if ($(this).val() === "<?php echo $vucudutemizform1[0]['skinAge']; ?>") {
                    $(this).prop("checked", true);
                }
            });
            //skinProblem
            let skinProblemArr = "<?php echo $vucudutemizform1[0]['skinProblem']; ?>".split("/");
            if(skinProblemArr[0] === "Sorun Yok"){
                $('input[name="skinProblem"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="skinProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='skinProblemDesc']").prop('disabled', false)
                $(".form-check-input[name='skinProblemDesc']").each(function() {
                    if (skinProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }

           //bodyHairStructure
           let bodyHairStructureArr = "<?php echo $vucudutemizform1[0]['bodyHairStructure']; ?>".split("/");
            if(bodyHairStructureArr[0] === "Sorun Yok"){
                $('input[name="bodyHairStructure"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="bodyHairStructure"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='bodyHairStructureDesc']").prop('disabled', false)
                $(".form-check-input[name='bodyHairStructureDesc']").each(function() {
                    if (bodyHairStructureArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //hairDistributionProblem
            let hairDistributionProblemArr = "<?php echo $vucudutemizform1[0]['hairDistributionProblem']; ?>".split("/");
            if(hairDistributionProblemArr[0] === "Sorun Yok"){
                $('input[name="hairDistributionProblem"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="hairDistributionProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='hairDistributionProblemDesc']").prop('disabled', false)
                $(".form-check-input[name='hairDistributionProblemDesc']").each(function() {
                    if (hairDistributionProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //scalpHairProblem
            let scalpHairProblemArr = "<?php echo $vucudutemizform1[0]['scalpHairProblem']; ?>".split("/");
            if(scalpHairProblemArr[0] === "Sorun Yok"){
                $('input[name="scalpHairProblem"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="scalpHairProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='scalpHairProblemDesc']").prop('disabled', false)
                $(".form-check-input[name='scalpHairProblemDesc']").each(function() {
                    if (scalpHairProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //nailColorProblem
            let nailColorProblemArr = "<?php echo $vucudutemizform1[0]['nailColorProblem']; ?>".split("/");
            if(nailColorProblemArr[0] === "Sorun Yok"){
                $('input[name="nailColorProblem"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="nailColorProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='nailColorProblemDesc']").prop('disabled', false)
                $(".form-check-input[name='nailColorProblemDesc']").each(function() {
                    if (nailColorProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //nailStructureProblem
            let nailStructureProblemArr = "<?php echo $vucudutemizform1[0]['nailStructureProblem']; ?>".split("/");
            if(nailStructureProblemArr[0] === "Sorun Yok"){
                $('input[name="nailStructureProblem"][value="Sorun Yok"]').prop('checked', true);
            }else{
                $('input[name="nailStructureProblem"][value="Var"]').prop('checked', true);
                $(".form-check-input[name='nailStructureProblemDesc']").prop('disabled', false)
                $(".form-check-input[name='nailStructureProblemDesc']").each(function() {
                    if (nailStructureProblemArr.includes($(this).val())) {
                        $(this).prop("checked", true);
                    }
                });
            }
            //capillaryFillingProblem
            let capillaryFillingProblemValue = "<?php echo $vucudutemizform1[0]['capillaryFillingProblem']; ?>";
            let radioValues6 = $(".form-check-input[name='capillaryFillingProblem']").map(function() {
            return $(this).val();
            }).get();

            if (radioValues6.includes(capillaryFillingProblemValue)) {
            $(".form-check-input[name='capillaryFillingProblem']").filter(function() {
                return $(this).val() === capillaryFillingProblemValue;
            }).prop('checked', true);
            } else {
            $(".form-check-input[name='capillaryFillingProblem']").filter(function() {
                return $(this).val() === "Var";
            }).prop('checked', true);
            $("input[name='capillaryFillingInput']").val(capillaryFillingProblemValue);
            $("input[name='capillaryFillingInput']").prop('disabled', false);
            }
        })

        </script>



            <script>
                    $('#submit').click(function(e) {
                        e.preventDefault();
                        console.log("clicked")
                            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var form_id = <?php echo $vucudutemizform1[0]['form_id']; ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_name = "vucudutemizform1";
            let patient_name = "<?php echo $vucudutemizform1[0]['patient_name']; ?>"
            var patient_id = "<?php echo $vucudutemizform1[0]['patient_id']; ?>"
            let yourDate = new Date()
            let creationDate = yourDate.toISOString().split('T')[0];
            let updateDate = yourDate.toISOString().split('T')[0];
            let bathDate = $("input[name='bathDate']").val();
            let bodyCleansingDependence = $("input[name='bodyCleansingDependence']:checked").val();
            let bathingFrequency = $("input[name='bathingFrequency']").val(); 
            let bathingMethod = $("input[name='bathingMethod']:checked").val();
            let waterTemperature = $("input[name='waterTemperature']:checked").val();
            let cleaningProduct = $("input[name='cleaningProduct']:checked").val() === "Diğer" ? $("input[name='cleaningProductDiger']").val() : $("input[name='cleaningProduct']:checked").val();
            let hairCleaningProduct = $("input[name='hairCleaningProduct']:checked").val() === "Diğer" ? $("input[name='hairCleaningProductDiger']").val() : $("input[name='hairCleaningProduct']:checked").val();
            let afterBathProduct = $("input[name='afterBathProduct']:checked").val() === "Diğer" ? $("input[name='afterBathProductDiger']").val() : $("input[name='afterBathProduct']:checked").val();
            let mouthCareFreq = $("input[name='mouthCareFreq']").val();
            let mouthCareMethod = $("input[name='mouthCareMethod']").val();
            let mouthCareMaterial =  $("input[name='mouthCareMaterial']").val();
            let nailCareFreq = $("input[name='nailCareFreq']").val();
            let nailCareMethod = $("input[name='nailCareMethod']").val();
            let nailCareMaterial = $("input[name='nailCareMaterial']").val();
            let handWashingFreq = $("input[name='handWashingFreq']").val();
            let handWashingMethod = $("input[name='handWashingMethod']").val();
            let handWashingMaterial = $("input[name='handWashingMaterial']").val();
            let periniumCareMethod = $("input[name='periniumCareMethod']").val();
            let periniumCareMaterial = $("input[name='periniumCareMaterial']").val();
            let periniumCareFreq = $("input[name='periniumCareFreq']").val();
            let menstrualDate = $("input[name='menstrualDate']").val();
            let mensturalTime = $("input[name='mensturalTime']").val();
            let mensturalProduct = $("input[name='menstrualProduct']:checked").val() === "Diğer" ? $("input[name='menstrualProductDiger']").val() : $("input[name='menstrualProduct']:checked").val();
            let mensturalProductReplacement = "";
            if(mensturalProduct === "Hazır ped"){
                mensturalProductReplacement = $("input[name='padReplacementFreq']").val(); 
            }
            else if(mensturalProduct === "Bez"){
                mensturalProductReplacement = $("input[name='bezReplacementFreq']").val(); 
            }
            else{
                mensturalProductReplacement = $('#digerReplacementFreq').val(); 
            }
            let skinColorProblem = $("input[name='skinColorProblem']:checked").val() === "Var" ? $("input[name='skinColorProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='skinColorProblem']:checked").val();
            let skinMoisture = $("input[name='skinMoisture']:checked").val() === "Var" ? $("input[name='skinMoistureInput']").val() : "Sorun Yok";
            let skinTemperature = $("input[name='skinTemperature']:checked").val() === "Var" ? $("input[name='skinTemperatureInput']").val() : "Sorun Yok";
            let skinStructure = $("input[name='skinStructure']:checked").map(function(){return $(this).val();}).get().join("/");
            let skinAge = $("input[name='skinAge']:checked").val();
            let skinProblem = $("input[name='skinProblem']:checked").val() === "Var" ? $("input[name='skinProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='skinProblem']:checked").val();
            let bodyHairStructure = $("input[name='bodyHairStructure']:checked").val() === "Var" ? $("input[name='bodyHairStructureDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='bodyHairStructure']:checked").val();
            let hairDistributionProblem = $("input[name='hairDistributionProblem']:checked").val() === "Var" ? $("input[name='hairDistributionProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='hairDistributionProblem']:checked").val();
            let scalpHairProblem = $("input[name='scalpHairProblem']:checked").val() === "Var" ? $("input[name='scalpHairProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='scalpHairProblem']:checked").val();
            let nailColorProblem = $("input[name='nailColorProblem']:checked").val() === "Var" ? $("input[name='nailColorProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='nailColorProblem']:checked").val();
            let nailStructureProblem = $("input[name='nailStructureProblem']:checked").val() === "Var" ? $("input[name='nailStructureProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='nailStructureProblem']:checked").val();
            let capillaryFillingProblem = $("input[name='capillaryFillingProblem']:checked").val() === "Var" ? $("input[name='capillaryFillingInput']").val() : $("input[name='capillaryFillingProblem']:checked").val();
            console.log("all values initiation successfull");

             //set border color normal
             $('.form-control').css('border-color', '#ced4da');
                            //set all error messages to none
                                $('.option-error').css('display', 'none');
                            //custom validation
                            // if($('#iv_input1').val() === ""){
                            //     //scroll to iv_input1
                            //     $('html, body').animate({
                            //         scrollTop: $("#iv_input1").offset().top
                            //     }, 200);
                            //     //change border color
                            //     $('#iv_input1').css('border-color', 'red');
                            //     //stop function
                            //     return false;
                            // }

                //             if($('.form-check-input[name="time_range"]:checked').length === 0){
                //     // Scroll to time_range
                //     $('html, body').animate({
                //         scrollTop: $('.form-check-input[name="time_range"]').first().offset().top
                //     }, 200);
                //     // Display error message
                //     $('.form-check-input[name="time_range"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                //     return false;
                // }

                if($('#bathDate').val() === ""){
                    //scroll to bathDate
                    $('html, body').animate({
                        scrollTop: $("#bathDate").offset().top
                    }, 200);
                    //change border color
                    $('#bathDate').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="bodyCleansingDependence"]:checked').length === 0){
                    // Scroll to bodyCleansingDependence
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="bodyCleansingDependence"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="bodyCleansingDependence"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('#bathingFrequency').val() === ""){
                    //scroll to bathingFrequency
                    $('html, body').animate({
                        scrollTop: $("#bathingFrequency").offset().top
                    }, 200);
                    //change border color
                    $('#bathingFrequency').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="bathingMethod"]:checked').length === 0){
                    // Scroll to bathingMethod
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="bathingMethod"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="bathingMethod"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="waterTemperature"]:checked').length === 0){
                    // Scroll to waterTemperature
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="waterTemperature"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="waterTemperature"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="cleaningProduct"]:checked').length === 0){
                    // Scroll to cleaningProduct
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="cleaningProduct"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="cleaningProduct"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="cleaningProduct"]:checked').val() === "Diğer" && $('#cleaningProductDiger').val() === ""){
                    //scroll to cleaningProductDiger
                    $('html, body').animate({
                        scrollTop: $("#cleaningProductDiger").offset().top
                    }, 200);
                    //change border color
                    $('#cleaningProductDiger').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="hairCleaningProduct"]:checked').length === 0){
                    // Scroll to hairCleaningProduct
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="hairCleaningProduct"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="hairCleaningProduct"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="hairCleaningProduct"]:checked').val() === "Diğer" && $('#hairCleaningProductDiger').val() === ""){
                    //scroll to hairCleaningProductDiger
                    $('html, body').animate({
                        scrollTop: $("#hairCleaningProductDiger").offset().top
                    }, 200);
                    //change border color
                    $('#hairCleaningProductDiger').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="afterBathProduct"]:checked').length === 0){
                    // Scroll to afterBathProduct
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="afterBathProduct"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="afterBathProduct"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="afterBathProduct"]:checked').val() === "Diğer" && $('#afterBathProductDiger').val() === ""){
                    //scroll to afterBathProductDiger
                    $('html, body').animate({
                        scrollTop: $("#afterBathProductDiger").offset().top
                    }, 200);
                    //change border color
                    $('#afterBathProductDiger').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#mouthCareFreq").val() === ""){
                    //scroll to mouthCareFreq
                    $('html, body').animate({
                        scrollTop: $("#mouthCareFreq").offset().top
                    }, 200);
                    //change border color
                    $('#mouthCareFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#mouthCareMethod").val() === ""){
                    //scroll to mouthCareMethod
                    $('html, body').animate({
                        scrollTop: $("#mouthCareMethod").offset().top
                    }, 200);
                    //change border color
                    $('#mouthCareMethod').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#mouthCareMaterial").val() === ""){
                    //scroll to mouthCareMaterial
                    $('html, body').animate({
                        scrollTop: $("#mouthCareMaterial").offset().top
                    }, 200);
                    //change border color
                    $('#mouthCareMaterial').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#nailCareFreq").val() === ""){
                    //scroll to nailCareFreq
                    $('html, body').animate({
                        scrollTop: $("#nailCareFreq").offset().top
                    }, 200);
                    //change border color
                    $('#nailCareFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#nailCareMethod").val() === ""){
                    //scroll to nailCareMethod
                    $('html, body').animate({
                        scrollTop: $("#nailCareMethod").offset().top
                    }, 200);
                    //change border color
                    $('#nailCareMethod').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#nailCareMaterial").val() === ""){
                    //scroll to nailCareMaterial
                    $('html, body').animate({
                        scrollTop: $("#nailCareMaterial").offset().top
                    }, 200);
                    //change border color
                    $('#nailCareMaterial').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#handWashingFreq").val() === ""){
                    //scroll to handWashingFreq
                    $('html, body').animate({
                        scrollTop: $("#handWashingFreq").offset().top
                    }, 200);
                    //change border color
                    $('#handWashingFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#handWashingMethod").val() === ""){
                    //scroll to handWashingMethod
                    $('html, body').animate({
                        scrollTop: $("#handWashingMethod").offset().top
                    }, 200);
                    //change border color
                    $('#handWashingMethod').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#handWashingMaterial").val() === ""){
                    //scroll to handWashingMaterial
                    $('html, body').animate({
                        scrollTop: $("#handWashingMaterial").offset().top
                    }, 200);
                    //change border color
                    $('#handWashingMaterial').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#periniumCareFreq").val() === ""){
                    //scroll to periniumCareFreq
                    $('html, body').animate({
                        scrollTop: $("#periniumCareFreq").offset().top
                    }, 200);
                    //change border color
                    $('#periniumCareFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#periniumCareMethod").val() === ""){
                    //scroll to periniumCareMethod
                    $('html, body').animate({
                        scrollTop: $("#periniumCareMethod").offset().top
                    }, 200);
                    //change border color
                    $('#periniumCareMethod').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#periniumCareMaterial").val() === ""){
                    //scroll to periniumCareMaterial
                    $('html, body').animate({
                        scrollTop: $("#periniumCareMaterial").offset().top
                    }, 200);
                    //change border color
                    $('#periniumCareMaterial').css('border-color', 'red');
                    //stop function
                    return false;
                }

               

                if($("#menstrualDate").val() === ""){
                    //scroll to menstrualDate
                    $('html, body').animate({
                        scrollTop: $("#menstrualDate").offset().top
                    }, 200);
                    //change border color
                    $('#menstrualDate').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($("#mensturalTime").val() === ""){
                    //scroll to menstrualTime
                    $('html, body').animate({
                        scrollTop: $("#mensturalTime").offset().top
                    }, 200);
                    //change border color
                    $('#mensturalTime').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="menstrualProduct"]:checked').length === 0){
                    // Scroll to menstrualProduct
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="menstrualProduct"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="menstrualProduct"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="menstrualProduct"]:checked').val() === "Diğer" && $('#menstrualProductDiger').val() === ""){
                    //scroll to menstrualProductDiger
                    $('html, body').animate({
                        scrollTop: $("#menstrualProductDiger").offset().top
                    }, 200);
                    //change border color
                    $('#menstrualProductDiger').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('.form-check-input[name="menstrualProduct"]:checked').val() === "Hazır ped" && $('#padReplacementFreq').val() === ""){
                    //scroll to padReplacementFreq
                    $('html, body').animate({
                        scrollTop: $("#padReplacementFreq").offset().top
                    }, 200);
                    //change border color
                    $('#padReplacementFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('.form-check-input[name="menstrualProduct"]:checked').val() === "Bez" && $('#bezReplacementFreq').val() === ""){
                    //scroll to bezReplacementFreq
                    $('html, body').animate({
                        scrollTop: $("#bezReplacementFreq").offset().top
                    }, 200);
                    //change border color
                    $('#bezReplacementFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }
                if($('.form-check-input[name="menstrualProduct"]:checked').val() === "Diğer" && $('#digerReplacementFreq').val() === ""){
                    //scroll to digerReplacementFreq
                    $('html, body').animate({
                        scrollTop: $("#digerReplacementFreq").offset().top
                    }, 200);
                    //change border color
                    $('#digerReplacementFreq').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="skinColorProblem"]:checked').length === 0){
                    // Scroll to skinColorProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinColorProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinColorProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="skinColorProblem"]:checked').val() === "Var" && $('.form-check-input[name="skinColorProblemDesc"]:checked').length === 0){
                    // Scroll to skinColorProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinColorProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinColorProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="skinMoisture"]:checked').length === 0){
                    // Scroll to skinMoisture
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinMoisture"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinMoisture"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="skinMoisture"]:checked').val() === "Var" && $('#skinMoistureInput').val() === ""){
                    //scroll to skinMoistureInput
                    $('html, body').animate({
                        scrollTop: $("#skinMoistureInput").offset().top
                    }, 200);
                    //change border color
                    $('#skinMoistureInput').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="skinTemperature"]:checked').length === 0){
                    // Scroll to skinTemperature
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinTemperature"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinTemperature"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="skinTemperature"]:checked').val() === "Var" && $('#skinTemperatureInput').val() === ""){
                    //scroll to skinTemperatureInput
                    $('html, body').animate({
                        scrollTop: $("#skinTemperatureInput").offset().top
                    }, 200);
                    //change border color
                    $('#skinTemperatureInput').css('border-color', 'red');
                    //stop function
                    return false;
                }

                if($('.form-check-input[name="skinStructure"]:checked').length === 0){
                    // Scroll to skinStructure
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinStructure"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinStructure"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="skinAge"]:checked').length === 0){
                    // Scroll to skinAge
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinAge"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinAge"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="skinProblem"]:checked').length === 0){
                    // Scroll to skinProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="skinProblem"]:checked').val() === "Var" && $('.form-check-input[name="skinProblemDesc"]:checked').length === 0){
                    // Scroll to skinProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="skinProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="skinProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="bodyHairStructure"]:checked').length === 0){
                    // Scroll to bodyHairStructure
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="bodyHairStructure"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="bodyHairStructure"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="bodyHairStructure"]:checked').val() === "Var" && $('.form-check-input[name="bodyHairStructureDesc"]:checked').length === 0){
                    // Scroll to bodyHairStructure
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="bodyHairStructure"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="bodyHairStructure"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="hairDistributionProblem"]:checked').length === 0){
                    // Scroll to hairDistributionProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="hairDistributionProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="hairDistributionProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="hairDistributionProblem"]:checked').val() === "Var" && $('.form-check-input[name="hairDistributionProblemDesc"]:checked').length === 0){
                    // Scroll to hairDistributionProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="hairDistributionProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="hairDistributionProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="scalpHairProblem"]:checked').length === 0){
                    // Scroll to scalpHairProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="scalpHairProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="scalpHairProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="scalpHairProblem"]:checked').val() === "Var" && $('.form-check-input[name="scalpHairProblemDesc"]:checked').length === 0){
                    // Scroll to scalpHairProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="scalpHairProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="scalpHairProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="nailColorProblem"]:checked').length === 0){
                    // Scroll to nailColorProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="nailColorProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="nailColorProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="nailColorProblem"]:checked').val() === "Var" && $('.form-check-input[name="nailColorProblemDesc"]:checked').length === 0){
                    // Scroll to nailColorProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="nailColorProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="nailColorProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="nailStructureProblem"]:checked').length === 0){
                    // Scroll to nailStructureProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="nailStructureProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="nailStructureProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="nailStructureProblem"]:checked').val() === "Var" && $('.form-check-input[name="nailStructureProblemDesc"]:checked').length === 0){
                    // Scroll to nailStructureProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="nailStructureProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="nailStructureProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }

                if($('.form-check-input[name="capillaryFillingProblem"]:checked').length === 0){
                    // Scroll to capillaryFillingProblem
                    $('html, body').animate({
                        scrollTop: $('.form-check-input[name="capillaryFillingProblem"]').first().offset().top
                    }, 200);
                    // Display error message
                    $('.form-check-input[name="capillaryFillingProblem"]').first().closest('.input-section').find('.option-error').css('display', 'block');
                    return false;
                }
                if($('.form-check-input[name="capillaryFillingProblem"]:checked').val() === "Var" && $('#capillaryFillingInput').val() === ""){
                    //scroll to capillaryFillingInput
                    $('html, body').animate({
                        scrollTop: $("#capillaryFillingInput").offset().top
                    }, 200);
                    //change border color
                    $('#capillaryFillingInput').css('border-color', 'red');
                    //stop function
                    return false;
                }
                


                








                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Vucut.php',
                                data: {
                                    isUpdate : true,
                                    form_id : form_id,
                                    name : name,
                                    surname : surname,
                                    age : age,
                                    not : not,
                                    form_name : form_name,
                                    patient_name : patient_name,
                                    patient_id : patient_id,
                                    creation_date : creationDate,
                                    update_date : updateDate,
                                    bathDate : bathDate,
                                    bodyCleansingDependence : bodyCleansingDependence,
                                    bathingFrequency : bathingFrequency,
                                    bathingMethod : bathingMethod,
                                    waterTemperature : waterTemperature,
                                    cleaningProduct : cleaningProduct,
                                    hairCleaningProduct : hairCleaningProduct,
                                    afterBathProduct : afterBathProduct,
                                    mouthCareFreq : mouthCareFreq,
                                    mouthCareMethod : mouthCareMethod,
                                    mouthCareMaterial : mouthCareMaterial,
                                    nailCareFreq : nailCareFreq,
                                    nailCareMethod : nailCareMethod,
                                    nailCareMaterial : nailCareMaterial,
                                    handWashingFreq : handWashingFreq,
                                    handWashingMethod : handWashingMethod,
                                    handWashingMaterial : handWashingMaterial,
                                    periniumCareMethod : periniumCareMethod,
                                    periniumCareMaterial : periniumCareMaterial,
                                    periniumCareFreq : periniumCareFreq,
                                    menstrualDate: menstrualDate,
                                    mensturalTime : mensturalTime,
                                    mensturalProduct: mensturalProduct,
                                    mensturalProductReplacement: mensturalProductReplacement,
                                    skinColorProblem : skinColorProblem,
                                    skinMoisture : skinMoisture,
                                    skinTemperature : skinTemperature,
                                    skinStructure : skinStructure,
                                    skinAge : skinAge,
                                    skinProblem : skinProblem,
                                    bodyHairStructure : bodyHairStructure,
                                    hairDistributionProblem : hairDistributionProblem,
                                    scalpHairProblem : scalpHairProblem,
                                    nailColorProblem : nailColorProblem,
                                    nailStructureProblem : nailStructureProblem,
                                    capillaryFillingProblem : capillaryFillingProblem,
                                },
                                success: function(data) {
                                    let patient_name = "<?php echo $vucudutemizform1[0]['patient_name']; ?>"
                                    var patient_id = "<?php echo $vucudutemizform1[0]['patient_id']; ?>"
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
                                    Swal.fire({
                                        'title': 'Errors',
                                        'text': 'There were errors',
                                        'type': 'error'
                                    })
                                }
                            })
                    })

            </script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>