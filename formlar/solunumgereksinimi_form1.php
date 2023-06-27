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

            <h1 class="form-header">SOLUNUM GEREKSİNİMİ</h1>
            <div class="input-section d-flex">
                <p class="usernamelabel">Solunumda:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio"
                                value="Bagimsiz">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Bağımsız</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio"
                                value="Yari Bagimli">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header"> Yarı bağımlı</span>

                            </label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio"
                                value="Bagimli">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Solunumda sorun var mı?:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumSorunu" id="SolunumSorunu"
                                value="Yok">
                            <label class="form-check-label" for="SolunumSorunu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumSorunu" id="SolunumSorunu"
                                value="Var">
                            <label class="form-check-label" for="SolunumSorunu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Dispne" name="breathing-problem"
                                                    value="Dispne">
                                                <label class="form-check-label" for="Dispne">Dispne </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hiperventilasyon" name="breathing-problem"
                                                    value="Hiperventilasyon">
                                                <label class="form-check-label" for="Hiperventilasyon">Hiperventilasyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hipoventilasyon" name="breathing-problem"
                                                    value="Hipoventilasyon">
                                                <label class="form-check-label" for="Hipoventilasyon">Hipoventilasyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Takipne" name="breathing-problem"
                                                    value="Takipne">
                                                <label class="form-check-label" for="Takipne">Takipne
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bradipne" name="breathing-problem"
                                                    value="Bradipne">
                                                <label class="form-check-label" for="Bradipne">Bradipne
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Siyanoz" name="breathing-problem"
                                                    value="Siyanoz">
                                                <label class="form-check-label" for="Siyanoz">Siyanoz
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="breathing-not" name="breathing-problem"
                                                    value="Diğer">
                                                <label class="form-check-label" for="Diğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="solunum_diger" id="solunum_diger" placeholder="Diğer">
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

                <p class="usernamelabel">Solunum yolu:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumYolu" id="SolunumYolu"
                                value="Yok">
                            <label class="form-check-label" for="SolunumYolu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumYolu" id="SolunumYolu"
                                value="Var">
                            <label class="form-check-label" for="SolunumYolu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="AirwayMethod" id="Trakeostomi"
                                                    value="Trakeostomi">
                                                <label class="form-check-label" for="Trakeostomi">Trakeostomi</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="AirwayMethod" id="EndotrakealTüp"
                                                    value="Endotrakeal Tüp">
                                                <label class="form-check-label" for="EndotrakealTüp">Endotrakeal Tüp
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

                <p class="usernamelabel">Öksürme:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Oksurme" id="Oksurme" value="Yok">
                            <label class="form-check-label" for="Oksurme">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Oksurme" id="Oksurme" value="Var">
                            <label class="form-check-label" for="Oksurme">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="CoughOption" id="Etkisiz"
                                                    value="Etkisiz">
                                                <label class="form-check-label" for="Etkisiz">Etkisiz</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="CoughOption" id="OksurmeDiğer"
                                                    value="Diğer">
                                                <label class="form-check-label" for="OksurmeDiğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="oksurme_diger" id="oksurme_diger" placeholder="Diğer">
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

                <p class="usernamelabel">Balgam:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Balgam" id="Balgam" value="Yok">
                            <label class="form-check-label" for="Balgam">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Balgam" id="Balgam" value="Var">
                            <label class="form-check-label" for="Balgam">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="BalgamType" id="EtkisizBalgam"
                                                    value="Etkisiz balgam">
                                                <label class="form-check-label" for="EtkisizBalgam">Etkisiz balgam
                                                    çıkartma</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="BalgamType" id="NormalBalgam"
                                                    value="Balgam">
                                                <label class="form-check-label" for="NormalBalgam">Balgam
                                                    Çıkamama</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="BalgamType" id="AşırıKıvamlı"
                                                    value="Aşırı kıvamlı">
                                                <label class="form-check-label" for="AşırıKıvamlı">Aşırı kıvamlı
                                                    balgam</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="BalgamType" id="BalgamDiğer"
                                                    value="Diğer">
                                                <label class="form-check-label" for="BalgamDiğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="balgam_diger" id="balgam_diger" placeholder="Diğer">
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

                <p class="usernamelabel">Aspirasyon İhtiyacı:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AspirasyonIhtiyaci"
                                id="AspirasyonIhtiyaci" value="Yok">
                            <label class="form-check-label" for="AspirasyonIhtiyaci">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AspirasyonIhtiyaci"
                                id="AspirasyonIhtiyaci" value="Var">
                            <label class="form-check-label" for="AspirasyonIhtiyaci">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Oro_Nazofarengeal" name="Aspirasyon_need"
                                                    value="Oro_Nazofarengeal">
                                                <label class="form-check-label" for="Oro_Nazofarengeal">Oro -
                                                    Nazofarengeal</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Trakeal" name="Aspirasyon_need"
                                                    value="Trakeal">
                                                <label class="form-check-label" for="Trakeal">Trakeal</label>
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

                <p class="usernamelabel">Burun Muayenesi:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BurunMuayenesi" id="BurunMuayenesi"
                                value="Yok">
                            <label class="form-check-label" for="BurunMuayenesi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BurunMuayenesi" id="BurunMuayenesi"
                                value="Var">
                            <label class="form-check-label" for="BurunMuayenesi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalMukoza" name="NasalIssue"
                                                    value="Nazal Mukoza">
                                                <label class="form-check-label" for="NazalMukoza">Nazal mukoza
                                                    hiperemik</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalSeptumda" name="NasalIssue"
                                                    value="Nazal Septumda">
                                                <label class="form-check-label" for="NazalSeptumda">Nazal septumda
                                                    deviasyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalKanama" name="NasalIssue"
                                                    value="Nazal Kanama">
                                                <label class="form-check-label" for="NazalKanama">Nazal kanama</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalLezyon" name="NasalIssue"
                                                    value="Nazal Lezyon">
                                                <label class="form-check-label" for="NazalLezyon">Nazal lezyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalAkinti" name="NasalIssue"
                                                    value="Nazal Akinti">
                                                <label class="form-check-label" for="NazalAkinti">Nazal akıntı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalDiger" name="NasalIssue"
                                                    value="Diger">
                                                <label class="form-check-label" for="NazalDiger">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="nazal_diger" disabled id="nazal_diger" placeholder="Diğer">
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <p class="usernamelabel">Boyun:</p>

            <div class="input-section d-flex">

                <p class="usernamelabel">Tiroid bezi:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TiroidBezi" id="TiroidBezi" value="Yok">
                            <label class="form-check-label" for="TiroidBezi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TiroidBezi" id="TiroidBezi" value="Var">
                            <label class="form-check-label" for="TiroidBezi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="Sislik" name="ThyroidIssue"
                                                    value="Sislik">
                                                <label class="form-check-label" for="Sislik">Şişlik</label>
                                            </div>
                                        </td>

                                    </tr>


                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="TiroidDiger" name="ThyroidIssue"
                                                    value="Diger">
                                                <label class="form-check-label" for="TiroidDiger">Diğer
                                                </label>
                                                <p>Kitle
                                                    <input type="text" class="form-control" required name="tiroid_diger"
                                                        id="tiroid_diger" placeholder="Diğer">
                                                    Özelliği
                                                </p>
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

                <p class="usernamelabel">Trakea:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Trakea" id="Trakea" value="Yok">
                            <label class="form-check-label" for="Trakea">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Trakea" id="Trakea" value="Var">
                            <label class="form-check-label" for="Trakea">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="SagaKayma" name="Shift"
                                                    value="Sağa Kayma">
                                                <label class="form-check-label" for="SagaKayma">Sağa Kayma</label>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="SolaKayma" name="Shift"
                                                    value="Sola Kayma">
                                                <label class="form-check-label" for="SolaKayma">Sola Kayma</label>
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

                <p class="usernamelabel">Boyun lenf nodlarında büyüme:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="LenfNodlari" id="LenfNodlari"
                                value="Yok">
                            <label class="form-check-label" for="LenfNodlari">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="LenfNodlari" id="LenfNodlari"
                                value="Var">
                            <label class="form-check-label" for="LenfNodlari">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <label class="form-check-label" for="Yeri">Yeri</label>

                                        <input type="text" class="form-control" required name="NodYeri" id="NodYeri"
                                            placeholder="Yeri">


                                    </tr>




                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Diğer:</p>


                <input type="text" class="form-control not" required name="NodDiger" id="NodDiger" placeholder="Yeri">

            </div>

            <p class="usernamelabel">Toraks:</p>
            <p class="usernamelabel">Posterior Toraks:</p>

            <div class="input-section d-flex">

                <p class="usernamelabel">Skapulaların simetrikliği:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SkapulaSimatrikligi"
                                id="SkapulaSimatrikligi" value="Yok">
                            <label class="form-check-label" for="SkapulaSimatrikligi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SkapulaSimatrikligi"
                                id="SkapulaSimatrikligi" value="Var">
                            <label class="form-check-label" for="SkapulaSimatrikligi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>

                        </div>

                    </div>
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Omurga deformitesi :</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="OmurgaDeform" id="OmurgaDeform"
                                value="Yok">
                            <label class="form-check-label" for="OmurgaDeform">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="OmurgaDeform" id="OmurgaDeform"
                                value="Var">
                            <label class="form-check-label" for="OmurgaDeform">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Kifoz" name="SpinalDeformity"
                                                    value="Kifoz">
                                                <label class="form-check-label" for="Kifoz">Kifoz </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Lordoz" name="SpinalDeformity"
                                                    value="Lordoz">
                                                <label class="form-check-label" for="Lordoz">Lordoz </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Skolyoz" name="SpinalDeformity"
                                                    value="Skolyoz">
                                                <label class="form-check-label" for="Skolyoz">Skolyoz</label>
                                            </div>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <p class="usernamelabel">Anterior Toraks:</p>

            <div class="input-section d-flex">

                <p class="usernamelabel">Göğüs hareketleri :</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusHareketleri" id="GogusHareketleri"
                                value="Yok">
                            <label class="form-check-label" for="GogusHareketleri">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusHareketleri" id="GogusHareketleri"
                                value="Var">
                            <label class="form-check-label" for="GogusHareketleri">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>

                        </div>

                    </div>
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Göğüs kafesinde :</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusKafesinde" id="GogusKafesinde"
                                value="Yok">
                            <label class="form-check-label" for="GogusKafesinde">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusKafesinde" id="GogusKafesinde"
                                value="Var">
                            <label class="form-check-label" for="GogusKafesinde">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KrepitasyonAlani" name="ChestIssues"
                                                    value="Krepitasyon / Alanı">
                                                <label class="form-check-label" for="KrepitasyonAlani">Krepitasyon /
                                                    Alanı
                                                    <input type="text" class="form-control" required
                                                        name="Krepitasyon_Alani" id="Krepitasyon_Alani" placeholder="">
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hassasiyet" name="ChestIssues"
                                                    value="Hassasiyet">
                                                <label class="form-check-label" for="Hassasiyet">Hassasiyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KitleOzelligi" name="ChestIssues"
                                                    value="Kitle Ozelligi">
                                                <label class="form-check-label" for="KitleOzelligi">Kitle/Özelliği
                                                    <input type="text" class="form-control" required
                                                        name="Kitle_Ozelligi" id="Kitle_Ozelligi" placeholder="">
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KitleDiger" name="ChestIssues"
                                                    value="Diger">
                                                <label class="form-check-label" for="KitleDiger">Diğer
                                                    <input type="text" class="form-control" required name="Kitle_Diger"
                                                        id="Kitle_Diger" placeholder="">
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

                <p class="usernamelabel">Göğüs deformitesi :</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusDeformitesi" id="GogusDeformitesi"
                                value="Yok">
                            <label class="form-check-label" for="GogusDeformitesi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusDeformitesi" id="GogusDeformitesi"
                                value="Var">
                            <label class="form-check-label" for="GogusDeformitesi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="FiciGogus" name="DeformityType"
                                                    value="Fıçı Göğüs">
                                                <label class="form-check-label" for="FiciGogus">Fıçı Göğüs
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="GuvercinGogus" name="DeformityType"
                                                    value="Güvercin Göğüs">
                                                <label class="form-check-label" for="GuvercinGogus">Güvercin Göğüs
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Kunduracı" name="DeformityType"
                                                    value="Kunduracı">
                                                <label class="form-check-label" for="Kunduracı">Kunduracı Göğsü</label>
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
            <p class="usernamelabel">Solunum sistemi uygulaması </p>
            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
            <div class="checkbox-wrapper d-flex">
                <div class="checkboxes d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Triflow / Spirometre">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Triflow / Spirometre</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Nebulizasyon">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Nebulizasyon </span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Derin Nefes Alma ve Öksürme Egzersizi">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Derin Nefes Alma ve Öksürme Egzersizi</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Soğuk buhar uygulama">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Soğuk buhar uygulama </span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Postural drenaj">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Postural drenaj </span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi"
                            id="SolunumSistemiUygilamasi" value="Diger">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Diğer </span>

                        </label>
                        <input type="text" class="form-control" required name="SolunumUygulamasi_diger"
                            id="SolunumUygulamasi_diger" placeholder="Diğer">
                    </div>
                </div>
            </div>
            </div>

            <input class="form-control submit m-auto " type='submit' name="submit" id="submit" value="Kayıt">
             </form>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="patients-table dark-blue text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Hastalar</h6>

                </div>

                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">

                                <th scope="col">İsim</th>
                                <th scope="col">Soyisim</th>
                                <th scope="col">Yaş</th>
                                <th scope="col">Notlar</th>

                            </tr>
                        </thead>
                        <tbody>
                        


                        </tbody>
                    </table>
                </div>
            </div> -->
    <script>

    $(function() {
        $('#closeBtn1').click(function(e) {
        e.preventDefault();
        console.log("close btn clicked");
        let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
        let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
        var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
            "&patient_name=" + encodeURIComponent(patient_name);
        $("#content").load(url);
    })
    });

    $(document).ready(function() {
        var breathing = $('input[name="SolunumSorunu"]');
        var breathing_problem = $('.ozgecmistable-wrapper');
        var otherVal = $('[name="solunum_diger"]');

        breathing_problem.find('input[name="breathing-problem"]').prop('disabled', true).prop('checked', false);
        otherVal.prop('disabled', true)

        breathing.on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue === 'Yok') {
                breathing_problem.find('input[name="breathing-problem"]').prop('disabled', true).prop('checked', false);
                otherVal.val('');
                otherVal.prop('disabled', true)
            } else {
                breathing_problem.find('input[name="breathing-problem"]').prop('disabled', false);
                otherVal.prop('disabled', true)
            }
        });

        $('#breathing-not').on('change', function(){
            if (!$(this).is(':checked')){
                otherVal.val('');
                otherVal.prop('disabled', true);
            } else {
                otherVal.prop('disabled', false);
            }
        })


        var solunumYolu = $('[name="SolunumYolu"]');
        var airwayType = $('[name="AirwayMethod"]');

        airwayType.attr('disabled', true);

        solunumYolu.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok") {
                airwayType.prop('checked', false);
                airwayType.attr('disabled', true);
            } else {
                airwayType.attr('disabled', false);
            }
        })

        var oksurme = $('[name="Oksurme"]');
        var oksurmeOptions = $('[name="CoughOption"]');
        var oksurmeDigerInput = $('#oksurme_diger');

        oksurmeOptions.attr('disabled', true);
        oksurmeDigerInput.attr('disabled', true);

        oksurme.on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue === 'Yok') {
                oksurmeOptions.prop('checked', false);
                oksurmeOptions.attr('disabled', true);
                oksurmeDigerInput.val('')
                oksurmeDigerInput.attr('disabled', true);
            } else if (selectedValue === 'Var') {
                oksurmeOptions.attr('disabled', false);
                oksurmeDigerInput.attr('disabled', true);
            }
        });

        oksurmeOptions.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Diğer"){
                oksurmeDigerInput.attr('disabled', false);
            } else {
                oksurmeDigerInput.val('');
                oksurmeDigerInput.attr('disabled', true);
            }
        });
       
        var balgam = $('[name="Balgam"]');
        var balgamType = $('[name="BalgamType"]');
        var balgamOther = $('[name="balgam_diger"]');

        balgamType.attr('disabled', true);
        balgamOther.attr('disabled', true);

        balgam.on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                balgamType.prop('checked', false);
                balgamType.attr('disabled', true);
                balgamOther.val('').attr('disabled', true);
            } else {
                balgamType.attr('disabled', false);
                balgamOther.attr('disabled', true);
            }
        });

        balgamType.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Diğer"){
                balgamOther.attr('disabled', false);
            } else {
                balgamOther.val('').attr('disabled', true);
            }
        });

        var aspiration_need = $('[name=AspirasyonIhtiyaci]');
        var aspiration_type = breathing_problem.find('[name="Aspirasyon_need"]');
        
        aspiration_type.prop('disabled', true);

        aspiration_need.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                aspiration_type.prop('checked', false);
                aspiration_type.prop('disabled', true);
            } else {
                aspiration_type.prop('disabled', false);
            }

        });

        var noseExamination = $('[name="BurunMuayenesi"]');
        var nasalIssue = $('[name="NasalIssue"]');
        var nasalOtherCheckbox = $('#NazalDiger');
        var nasalOther = $('[name="nazal_diger"]');

        nasalIssue.prop('disabled', true);
        nasalOther.attr('disabled', true);

        noseExamination.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                nasalIssue.prop('checked', false);
                nasalIssue.prop('disabled', true);
                nasalOther.val('');
                nasalOther.attr('disabled', true);
            } else {
                nasalIssue.prop('disabled', false);
                nasalOther.attr('disabled', false);
            }
        });

        nasalIssue.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Diger"){
                nasalOther.attr('disabled', false);
            } else {
                nasalOther.val('');
                nasalOther.attr('disabled', true);
            }
        });

        nasalOtherCheckbox.on('change', function(){
            if (!$(this).is(':checked')) {
                nasalOther.val('');
                nasalOther.attr('disabled', true);
            }
        });

        var thyroidProblems = $('[name="TiroidBezi"]');
        var thyroidIssue = $('[name="ThyroidIssue"]');
        var thyroidOther = $('[name="tiroid_diger"]');

        thyroidIssue.attr('disabled', true);
        thyroidOther.attr('disabled', true);

        thyroidProblems.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                thyroidIssue.prop('checked', false);
                thyroidIssue.attr('disabled', true);
                thyroidOther.val('');
                thyroidOther.attr('disabled', true);
            } else {
                thyroidIssue.attr('disabled', false);
                thyroidOther.attr('disabled', true);
            }
        });

        thyroidIssue.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Diger"){
                thyroidOther.attr('disabled', false);
            } else {
                thyroidOther.val('');
            }
        });

        var tracheaProblem = $('[name="Trakea"]');
        var shift = $('[name="Shift"]');

        shift.prop('disabled', true);

        tracheaProblem.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok") {
                shift.prop('checked', false);
                shift.prop('disabled', true);
            } else {
                shift.prop('disabled', false);
            }
        })

        var lymphEnlargement = $('[name="LenfNodlari"]');
        var place = $('[name="NodYeri"]');

        place.attr('disabled', true);

        lymphEnlargement.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                place.val('')
                place.attr('disabled', true);
            } else {
                place.attr('disabled', false);
            }
        })

        var spineProblem = $('[name="OmurgaDeform"]');
        var deformityType = $('[name="SpinalDeformity"]');

        deformityType.prop('disabled', true);

        spineProblem.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                deformityType.prop('checked', false);
                deformityType.prop('disabled', true);
            } else {
                deformityType.prop('disabled', false);
            }
        });

        var chestCageProblems = $('[name="GogusKafesinde"]');
        var chestIssues = $('[name="ChestIssues"]');
        var chestOther = $('[name="KitleDiger"]');
        var krepitasyonAlani = $('[name="Krepitasyon_Alani"]');
        var kitleOzelligi = $('[name="Kitle_Ozelligi"]');
        var kitleDiger = $('[name="Kitle_Diger"]');
        var krepitasyonAlaniCheckBox = $('#KrepitasyonAlani');
        var kitleOzelligiCheckBox = $('#KitleOzelligi');
        var kitleDigerCheckBox = $('#KitleDiger');

        chestIssues.prop('disabled', true);
        chestOther.attr('disabled', true);
        krepitasyonAlani.attr('disabled', true);
        kitleOzelligi.attr('disabled', true);
        kitleDiger.attr('disabled', true);

        chestCageProblems.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                chestIssues.prop('checked', false);
                chestIssues.prop('disabled', true);
                chestOther.val('');
                chestOther.attr('disabled', true);
                krepitasyonAlani.val('');
                kitleOzelligi.val('');
                kitleDiger.val('');
                krepitasyonAlani.attr('disabled', true);
                kitleOzelligi.attr('disabled', true);
                kitleDiger.attr('disabled', true);
            } else {
                chestIssues.prop('disabled', false);
                chestOther.attr('disabled', true);
                krepitasyonAlani.attr('disabled', true);
                kitleOzelligi.attr('disabled', true);
                kitleDiger.attr('disabled', true);
            }
        });

        krepitasyonAlaniCheckBox.on('change', function(){
            if (!$(this).is(':checked')){
                krepitasyonAlani.val('');
                krepitasyonAlani.attr('disabled', true);
            } else {
                krepitasyonAlani.attr('disabled', false);
            }
        });

        kitleOzelligiCheckBox.on('change', function(){
            if (!$(this).is(':checked')){
                kitleOzelligi.val('');
                kitleOzelligi.attr('disabled', true);
            } else {
                kitleOzelligi.attr('disabled', false);
            }
        })

        kitleDigerCheckBox.on('change', function(){
            if (!$(this).is(':checked')){
                kitleDiger.val('');
                kitleDiger.attr('disabled', true);
            } else {
                kitleDiger.attr('disabled', false);
            }
        });

        var chestDeformity = $('[name="GogusDeformitesi"]');
        var chestDeformityType = $('[name="DeformityType"]');

        chestDeformityType.prop('disabled', true);

        chestDeformity.on('change', function(){
            var selectedValue = $(this).val();

            if (selectedValue === "Yok"){
                chestDeformityType.prop('checked', false);
                chestDeformityType.prop('disabled', true);
            } else {
                chestDeformityType.prop('disabled', false);
            }
        });

        var respiratorySystemAppOtherCheck = $('input[name="SolunumSistemiUygilamasi"][value="Diger"]');
        var respiratorySystemAppOther = $('[name="SolunumUygulamasi_diger"]');

        respiratorySystemAppOther.attr('disabled', true);

        respiratorySystemAppOtherCheck.on('change', function(){
            if (!$(this).is(':checked')){
                respiratorySystemAppOther.val('');
                respiratorySystemAppOther.attr('disabled', true);
            } else {
                respiratorySystemAppOther.attr('disabled', false);
            }
        })

    });

    </script>

    <script>
    $(function() {
        $('[name="submit"]').click(function(e) {
               //set border color to default
               $('.form-control').css('border-color', '#ced4da');
            //set all error fields to display none
            $('.option-error').css('display', 'none');

if (!$('[name="yatisdurumuradio"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="yatisdurumuradio"]').offset().top
    }, 200);
    $('[name="yatisdurumuradio"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} else if (!$('[name="SolunumSorunu"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="SolunumSorunu"]').offset().top
    }, 200);
    $('[name="SolunumSorunu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} 
else if ($('[name="SolunumSorunu"]:checked').val() == "Var" && !$('[name="breathing-problem"]').is(':checked')){   
        $('.option-error').css('display', 'none'); 
        $('html, body').animate({
        scrollTop: $('[name="SolunumSorunu"]').offset().top
        }, 200);
        $('[name="SolunumSorunu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
    } else if ($('#breathing-not').is(':checked') && $('[name="solunum_diger"]').val() === '') {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="solunum_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="solunum_diger"]').css('border-color', 'red');
    }
else if (!$('[name="SolunumYolu"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="SolunumYolu"]').offset().top
    }, 200);
    $('[name="SolunumYolu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="SolunumYolu"]:checked').val() == "Var" && !$('[name="AirwayMethod"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="SolunumYolu"]').offset().top
        }, 200);
        $('[name="SolunumYolu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
    } 
else if (!$('[name="Oksurme"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="Oksurme"]').offset().top
    }, 200);
    $('[name="Oksurme"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} 
else if ($('[name="Oksurme"]:checked').val() == "Var" && !$('[name="CoughOption"]').is(':checked')){
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="Oksurme"]').offset().top
        }, 200);
        $('[name="Oksurme"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } else if (($('#OksurmeDiğer').is(':checked') && $('[name="oksurme_diger"]').val() == '')) {
        $('html, body').animate({
                scrollTop: $('[name="oksurme_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="oksurme_diger"]').css('border-color', 'red');
     }
     else if (!$('[name="Balgam"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="Balgam"]').offset().top
    }, 200);
    $('[name="Balgam"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} else if ($('[name="Balgam"]:checked').val() === "Var" && (!$('[name="BalgamType"]').is(':checked'))) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="Balgam"]').offset().top
        }, 200);
        $('[name="Balgam"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } else if ($('[name="BalgamType"]:checked').val() === "Diğer" && $('[name="balgam_diger"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="balgam_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="balgam_diger"]').css('border-color', 'red');
     }
 else if (!$('[name="AspirasyonIhtiyaci"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="AspirasyonIhtiyaci"]').offset().top
    }, 200);
    $('[name="AspirasyonIhtiyaci"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} else if ($('[name="AspirasyonIhtiyaci"]:checked').val() == "Var" && !$('[name="Aspirasyon_need"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="AspirasyonIhtiyaci"]').offset().top
        }, 200);
        $('[name="AspirasyonIhtiyaci"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } 
else if (!$('[name="BurunMuayenesi"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="BurunMuayenesi"]').offset().top
    }, 200);
    $('[name="BurunMuayenesi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} 
else if ($('[name="BurunMuayenesi"]:checked').val() == "Var" && !$('[name="NasalIssue"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="BurunMuayenesi"]').offset().top
        }, 200);
        $('[name="BurunMuayenesi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } else if ($('#NazalDiger').is(':checked') && $('[name="nazal_diger"]').val() === "") {
        $('html, body').animate({
                scrollTop: $('[name="nazal_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="nazal_diger"]').css('border-color', 'red');
     }
else if (!$('[name="TiroidBezi"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="TiroidBezi"]').offset().top
    }, 200);
    $('[name="TiroidBezi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}  else if ($('[name="TiroidBezi"]:checked').val() === "Var" && !$('[name="ThyroidIssue"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="TiroidBezi"]').offset().top
        }, 200);
        $('[name="TiroidBezi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } else if ($('#TiroidDiger').is(':checked') && $('[name="tiroid_diger"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="tiroid_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="tiroid_diger"]').css('border-color', 'red');
     } 
else if (!$('[name="Trakea"]').is(':checked')) {
    $('html, body').animate({
        scrollTop: $('[name="Trakea"]').offset().top
    }, 200);
    $('[name="Trakea"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="Trakea"]:checked').val() == "Var" && !$('[name="Shift"]').is(':checked')) {
        $('html, body').animate({
        scrollTop: $('[name="Trakea"]').offset().top
        }, 200);
        $('[name="Trakea"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     }
 else if (!$('[name="LenfNodlari"]').is(':checked')) {
    $('html, body').animate({
        scrollTop: $('[name="LenfNodlari"]').offset().top
    }, 200);
    $('[name="LenfNodlari"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="LenfNodlari"]:checked').val() == "Var" && $('[name="NodYeri"]').val() === '') {
        $('html, body').animate({
        scrollTop: $('[name="NodYeri"]').offset().top
        }, 200);
        $('[name="NodYeri"]').css('border-color', 'red');
            return false;
     }
     else if ($('[name="NodDiger"]').val() === '') {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
                scrollTop: $('[name="NodDiger"]').offset().top
            }, 200);
            //change border color
    $('[name="NodDiger"]').css('border-color', 'red');
    
    return false;
}
 else if (!$('[name="SkapulaSimatrikligi"]').is(':checked')) {
    $('html, body').animate({
        scrollTop: $('[name="SkapulaSimatrikligi"]').offset().top
    }, 200);
    $('[name="SkapulaSimatrikligi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
} else if (!$('[name="OmurgaDeform"]').is(':checked')) {
    $('html, body').animate({
        scrollTop: $('[name="OmurgaDeform"]').offset().top
    }, 200);
    $('[name="OmurgaDeform"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="OmurgaDeform"]:checked').val() == "Var" && !$('[name="SpinalDeformity"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="OmurgaDeform"]').offset().top
        }, 200);
        $('[name="OmurgaDeform"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } 
else if (!$('[name="GogusHareketleri"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="GogusHareketleri"]').offset().top
    }, 200);
    $('[name="GogusHareketleri"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
 else if (!$('[name="GogusKafesinde"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="GogusKafesinde"]').offset().top
    }, 200);
    $('[name="GogusKafesinde"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}   else if ($('[name="GogusKafesinde"]:checked').val() == "Var" && !$('[name="ChestIssues"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="GogusKafesinde"]').offset().top
        }, 200);
        $('[name="GogusKafesinde"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     } 
     else if ($('#KrepitasyonAlani').is(':checked') && $('[name="Krepitasyon_Alani"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="Krepitasyon_Alani"]').offset().top
            }, 200);
            //change border color
        $('[name="Krepitasyon_Alani"]').css('border-color', 'red');
        return false;
    } else if ($('#KitleOzelligi').is(':checked') && $('[name="Kitle_Ozelligi"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="Kitle_Ozelligi"]').offset().top
            }, 200);
            //change border color
        $('[name="Kitle_Ozelligi"]').css('border-color', 'red');
        return false;
    } else if ($('#KitleDiger').is(':checked') && $('[name="Kitle_Diger"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="Kitle_Diger"]').offset().top
            }, 200);
            //change border color
        $('[name="Kitle_Diger"]').css('border-color', 'red');
    }
else if (!$('[name="GogusDeformitesi"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="GogusDeformitesi"]').offset().top
    }, 200);
    $('[name="GogusDeformitesi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="GogusDeformitesi"]:checked').val() == "Var" && !$('[name="DeformityType"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
        scrollTop: $('[name="GogusDeformitesi"]').offset().top
        }, 200);
        $('[name="GogusDeformitesi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
     }
 else if (!$('[name="SolunumSistemiUygilamasi"]').is(':checked')) {
    $('.option-error').css('display', 'none');
    $('html, body').animate({
        scrollTop: $('[name="SolunumSistemiUygilamasi"]').offset().top
    }, 200);
    $('[name="SolunumSistemiUygilamasi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
            return false;
}
else if ($('[name="SolunumSistemiUygilamasi"][value="Diger"]').is(':checked') && $('[name="SolunumUygulamasi_diger"]').val() === '') {
        $('html, body').animate({
                scrollTop: $('[name="SolunumUygulamasi_diger"]').offset().top
            }, 200);
            //change border color
        $('[name="SolunumUygulamasi_diger"]').css('border-color', 'red');
        return false;
    }
 
      else {

                    var valid = true;
                    if (valid) {
                        var id = <?php
                                    $userid = $_SESSION['userlogin']['id'];
                                    echo $userid
                                    ?>;
                        let form_name = "solunumgereksinimi";
                        let patient_name = "<?php
                                                echo urldecode($_GET['patient_name']);
                                                ?>";
                        var patient_id = <?php
                                                $userid = $_GET['patient_id'];
                                                echo $userid
                                                ?>;
                        let yourDate = new Date()
                        let creationDate = yourDate.toISOString().split('T')[0];
                        let updateDate = yourDate.toISOString().split('T')[0];
                        let yatisdurumuradio = $("input[type='radio'][name='yatisdurumuradio']:checked").val();
                        let SolunumSorunu = $("input[name='SolunumSorunu']:checked").val();
                        // not to db
                        var breathingProblemArr = [];
                        $('[name="breathing-problem"]:checked').each(function(){
                            breathingProblemArr.push($(this).val());
                        });
                        //
                        let breathingProblems = JSON.stringify(breathingProblemArr);
                        let solunum_diger = $("input[name='solunum_diger']").prop("disabled") ? null : $("input[name='solunum_diger']").val();
                        let SolunumYolu = $("input[name='SolunumYolu']:checked").val();
                        let airwayMethod = $('input[name="AirwayMethod"]').prop('disabled') ? '' : $('input[name="AirwayMethod"]:checked').val();
                        let Oksurme = $("input[name='Oksurme']:checked").val();
                        let coughOption = $('input[name="CoughOption"]').prop('disabled') ? null : $('input[name="CoughOption"]:checked').val();
                        let oksurme_diger = $("input[name='oksurme_diger']").attr('disabled') ? null : $("input[name='oksurme_diger']").val();
                        let Balgam = $("input[name='Balgam']:checked").val();
                        let BalgamType = $('input[name="BalgamType"]').prop('disabled') ? null : $('input[name="BalgamType"]:checked').val();
                        let balgam_diger = $("input[name='balgam_diger']").attr('disabled') ? null : $("input[name='balgam_diger']").val();
                        let AspirasyonIhtiyaci = $("input[name='AspirasyonIhtiyaci']:checked").val();
                        // not to db
                        var aspirasyonNeedsArr = [];
                        $('[name="Aspirasyon_need"]:checked').each(function () {
                            aspirasyonNeedsArr.push($(this).val());
                        });
                        //
                        let aspirasyonNeeds = JSON.stringify(aspirasyonNeedsArr);
                        let BurunMuayenesi = $("input[name='BurunMuayenesi']:checked").val();
                        // not to db
                        var nasalIssuesArr = [];
                        $('[name="NasalIssue"]:checked').each(function(){
                            nasalIssuesArr.push($(this).val());
                        });
                        //
                        let nasalIssues = JSON.stringify(nasalIssuesArr);
                        let nazal_diger = $("input[name='nazal_diger']").attr('disabled') ? null : $("input[name='nazal_diger']").val();
                        let TiroidBezi = $("input[name='TiroidBezi']:checked").val();
                        let tiroidIssue = $('input[name="ThyroidIssue"]').prop('disabled') ? null : $('input[name="ThyroidIssue"]:checked').val();
                        let TiroidDiger = $('input[name="tiroid_diger"]').attr('disabled') ? null : $('input[name="tiroid_diger"]').val();
                        let Trakea = $("input[name='Trakea']:checked").val();
                        let Shift = $('input[name="Shift"]').prop('disabled') ? null : $('input[name="Shift"]:checked').val();
                        let LenfNodlari = $("input[name='LenfNodlari']:checked").val();
                        let NodYeri = $("input[name='NodYeri']").attr('disabled') ? null : $("input[name='NodYeri']").val();
                        let NodDiger = $("input[name='NodDiger']").val();
                        let SkapulaSimatrikligi = $("input[name='SkapulaSimatrikligi']:checked").val();
                        let OmurgaDeform = $("input[name='OmurgaDeform']:checked").val();
                        // not to db
                        var SpinalDeformitiesArr = [];
                        $('[name="SpinalDeformity"]:checked').each(function(){
                            SpinalDeformitiesArr.push($(this).val());
                        });
                        //
                        let SpinalDeformities = JSON.stringify(SpinalDeformitiesArr);
                        let GogusHareketleri = $("input[name='GogusHareketleri']:checked").val();
                        let GogusKafesinde = $("input[name='GogusKafesinde']:checked").val();
                        let Krepitasyon_Alani = $("input[name='Krepitasyon_Alani']").attr('disabled') ? null : $("input[name='Krepitasyon_Alani']").val();
                        let Hassasiyet = $("input[name='ChestIssues']").attr('disabled') ? null : $("#Hassasiyet").val();
                        let Kitle_Ozelligi = $("input[name='Kitle_Ozelligi']").attr('disabled') ? null : $("input[name='Kitle_Ozelligi']").val();
                        let Kitle_Diger = $("input[name='Kitle_Diger']").attr('disabled') ? null : $("input[name='Kitle_Diger']").val();
                        let GogusDeformitesi = $("input[name='GogusDeformitesi']:checked").val();
                        // not to db
                        var DeformityTypesArr = [];
                        $('input[name="DeformityType"]:checked').each(function(){
                            DeformityTypesArr.push($(this).val());
                        });
                        //
                        let DeformityTypes = JSON.stringify(DeformityTypesArr);
                        // not to db
                        var SolunumSistemiUygilamasiArr = []
                        $('input[name="SolunumSistemiUygilamasi"]:checked').each(function(){
                            SolunumSistemiUygilamasiArr.push($(this).val());
                        });
                        //
                        let SolunumSistemiUygilamasi = JSON.stringify(SolunumSistemiUygilamasiArr);
                        let SolunumUygulamasi_diger = $("input[name='SolunumUygulamasi_diger']").attr('disabled') ? null : $("input[name='SolunumUygulamasi_diger']").val();           

                        e.preventDefault()

                        console.log('Submit button is pressed')

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_SolunumGereksinimi.php/',
                            data: {
                                form_name: form_name,
                                patient_name: patient_name,
                                patient_id: patient_id,
                                creationDate: creationDate,
                                updateDate: updateDate,
                                yatisdurumuradio: yatisdurumuradio,
                                SolunumSorunu: SolunumSorunu,
                                breathingProblems: breathingProblems,
                                solunum_diger: solunum_diger,
                                SolunumYolu: SolunumYolu,
                                airwayMethod: airwayMethod,
                                Oksurme: Oksurme,
                                coughOption: coughOption,
                                oksurme_diger: oksurme_diger,
                                Balgam: Balgam,
                                BalgamType: BalgamType,
                                balgam_diger: balgam_diger,
                                AspirasyonIhtiyaci: AspirasyonIhtiyaci,
                                aspirasyonNeeds: aspirasyonNeeds,
                                BurunMuayenesi: BurunMuayenesi,
                                nasalIssues: nasalIssues,
                                nazal_diger: nazal_diger,
                                TiroidBezi: TiroidBezi,
                                tiroidIssue: tiroidIssue,
                                TiroidDiger: TiroidDiger,
                                Trakea: Trakea,
                                Shift: Shift,
                                LenfNodlari: LenfNodlari,
                                NodYeri: NodYeri,
                                NodDiger: NodDiger,
                                SkapulaSimatrikligi: SkapulaSimatrikligi,
                                OmurgaDeform: OmurgaDeform,
                                SpinalDeformities: SpinalDeformities,
                                GogusHareketleri: GogusHareketleri,
                                GogusKafesinde: GogusKafesinde,
                                Krepitasyon_Alani: Krepitasyon_Alani,
                                Hassasiyet: Hassasiyet,
                                Kitle_Ozelligi: Kitle_Ozelligi,
                                Kitle_Diger: Kitle_Diger,
                                GogusDeformitesi: GogusDeformitesi,
                                DeformityTypes: DeformityTypes,
                                SolunumSistemiUygilamasi: SolunumSistemiUygilamasi,
                                SolunumUygulamasi_diger: SolunumUygulamasi_diger,
                            },
                            success: function(data) {
                                alert(data);
                                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                                let patient_name = "<?php
                                                            echo urldecode($_GET['patient_name']);
                                                            ?>";
                                var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                                    "&patient_name=" + encodeURIComponent(patient_name);

                                    $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(800);
                            // Hide the tick container
                            }, 2000);

                            },
                            error: function(data) {
                                Swal.fire({
                                    'title': 'Errors',
                                    'text': 'There were errors',
                                    'type': 'error'
                                })
                            }
                        })

                    }
                }

            
        })

    });
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