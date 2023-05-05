<?php
session_start();
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
    <title>e-BYRYS-KKDS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
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
            <span class='close closeBtn' id='closeBtn'>&times;</span>

            <h1 class="form-header">BESLENME GEREKSİNİMİ</h1>
            <div class="input-section d-flex">
                <p class="usernamelabel">Günlük öğün sayısı/zamanı </p>
                <input type="text" class="form-control" required name="OgunSayisi" id="OgunSayisi">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Ağırlıklı olarak tükettiğiniz besinler nelerdir?</p>
                <input type="text" class="form-control" required name="TukettigiBesin" id="TukettigiBesin">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sıklıkla kullandığınız pişirme yöntemleri nelerdir? </p>
                <input type="text" class="form-control" required name="PisirmeYontemi" id="PisirmeYontemi">
            </div>

            <div class="input-section d-flex ">
                <p class="usernamelabel p-2">Boy: </p>
                <input type="text" class="form-control" required name="Boy" id="Boy">

                <p class="usernamelabel p-2">Kilo:</p>
                <input type="text" class="form-control" required name="Kilo" id="Kilo">

                <p class="usernamelabel p-2">BKİ ( kg/m2 ):</p>
                <input type="text" class="form-control" required name="BKI" id="BKI">
            </div>



            <div class="input-section d-flex">
                <p class="usernamelabel">Beslenme gereksinimini karşılamada </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bagimsiz" value="Bagimsiz">
                                                <label class="form-check-label" for="Bagimsiz">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="YariBagimli" value="Yarı bağımlı">
                                                <label class="form-check-label" for="YariBagimli">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bagimli" value="Bagimli">
                                                <label class="form-check-label" for="Bagimli">Bağımlı
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
                <p class="usernamelabel">Diyet</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NormalDiyet" value="Normal Diyet">
                                                <label class="form-check-label" for="NormalDiyet">Normal Diyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Ozel" value="Ozel">
                                                <label class="form-check-label" for="Ozel">Özel
                                                    Diyet(Açıklayınız):
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="OzelDiyet" id="OzelDiyet">
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
                <p class="usernamelabel">Sıvı Tüketimi</p>
                <div>
                    Miktarı<input type="text" class="form-control" required name="SiviTuketimi" id="SiviTuketimi">
                    ml.
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">
                    Beslenme şekli
                </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Oral" id="Oral" value="Oral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Oral</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Parenteral" id="Parenteral" value="Parenteral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Parenteral</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sonda" id="Sonda" value="Sonda">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Sonda ile</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Nazogastrik" value="Nazogastrik">
                                                    <label class="form-check-label" for="Nazogastrik">Nazogastrik
                                                    </label>
                                                </div>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="SagNazal" value="Sag Nazal">
                                                        <label class="form-check-label" for="SagNazal">sağ nazal
                                                            pasaj / Takılma Tarihi:</label>
                                                        <input type="text" class="form-control" required name="PasajTakilmaTarihi1" id="PasajTakilmaTarihi1">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="SolNazal" value="Sol Nazal">
                                                        <label class="form-check-label" for="SolNazal">sol nazal
                                                            pasaj / Takılma Tarihi </label>
                                                        <input type="text" class="form-control" required name="PasajTakilmaTarihi2" id="PasajTakilmaTarihi2">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Orogastrik" value="Orogastrik">
                                                    <label class="form-check-label" for="Orogastrik">Orogastrik
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="OrogastrikTakilmaTarihi" id="OrogastrikTakilmaTarihi">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Gastrostomi" value="Gastrostomi">
                                                    <label class="form-check-label" for="Gastrostomi">Gastrostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="GastrostomiTarihi" id="GastrostomiTarihi">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Jejunostomi" value="Jejunostomi">
                                                    <label class="form-check-label" for="Jejunostomi">Jejunostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="JejunostomiTarihi" id="JejunostomiTarihi">

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
                <p class="usernamelabel">Nazogastrik dekompresyon</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio" value="Var">
                    <label class="form-check-label" for="yatisdurumuradio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio" value="Yok">
                    <label class="form-check-label" for="yatisdurumuradio">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>

            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">
                    Çiğneme Yutma Güçlüğü
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cignemeRadio" id="cignemeRadio" value="Var">
                    <label class="form-check-label" for="cignemeRadio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cignemeRadio" id="cignemeRadio" value="Yok">
                    <label class="form-check-label" for="cignemeradio">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Beslenme ile ilgili :</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="Yok">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="Var">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bulanti" value="Bulanti">
                                                <label class="form-check-label" for="Bulanti">Bulantı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Kusma" value="Kusma">
                                                <label class="form-check-label" for="Kusma">Kusma</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">İştahsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hazımsızlık" value="Hazımsızlık">
                                                <label class="form-check-label" for="Hazımsızlık">Hazımsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="BDiger" value="Diger">
                                                <label class="form-check-label" for="BDiger">Diğer</label>
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
                <p class="usernamelabel">Ağız ve Ağız Boşluğunun Değerlendirilmesi</p>

                <div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Dudakların rengi ve yapısı </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kuru" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Soluk" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Siyanotik" value="Siyanotik">
                                                        <label class="form-check-label" for="Siyanotik">Siyanotik</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="DDiger" value="Diger">
                                                        <label class="form-check-label" for="DDiger">Diger</label>
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

                        <p class="usernamelabel">Ağız mukozası </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AgizMukozasi" id="AgizMukozasi" value="Yok">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AgizMukozasi" id="AgizMukozasi" value="Var">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Koku" value="Kötü Koku">
                                                        <label class="form-check-label" for="Koku">Kötü
                                                            Koku</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Ülserasyon" value="Ülserasyon">
                                                        <label class="form-check-label" for="Ülserasyon">Ülserasyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Nodul" value="Nodul">
                                                        <label class="form-check-label" for="Nodul">Nodul</label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                        <tr>
                                            <td class="protezlertable">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Diğer</label>
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Dişler ve Diş Etleri </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Protez</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Dişeti
                                                            kanaması</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Çürük</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Apse</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diş ağrısı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Eksik Diş
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Dişeti
                                                            ödemi</label>
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

                        <p class="usernamelabel">Dil </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Tat almada
                                                            değişim</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Nodül/Kist</label>
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

                        <p class="usernamelabel">Farenks</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Enfeksiyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Ödem
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="MDiğer" value="Diğer
Diğer">
                                                        <label class="form-check-label" for="MDiğer">Diğer</label>
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

                        <p class="usernamelabel">Tonsila </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Tonsila" id="Tonsila" value="Yok">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Tonsila" id="Tonsila" value="Var">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TEnfeksiyon" value="Enfeksiyon">
                                                        <label class="form-check-label" for="TEnfeksiyon">Enfeksiyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TLezyon" value="Lezyon">
                                                        <label class="form-check-label" for="TLezyon">Lezyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TOdem" value="Ödem">
                                                        <label class="form-check-label" for="TOdem">Ödem
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TTonsilektomi" value="Tonsilektomi">
                                                        <label class="form-check-label" for="TTonsilektomi">Tonsilektomi </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TDiğer" value="Diğer">
                                                        <label class="form-check-label" for="TDiğer">Diğer</label>
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



            <div class="input-section d-flex">
                <p class="usernamelabel">Abdominal Değerlendirme</p>
                <div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdominal Hassasiyet: </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalHassasiyet" id="AbdominalHassasiyet" value="Yok">
                                    <label class="form-check-label" for="AbdominalHassasiyet">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalHassasiyet" id="AbdominalHassasiyet" value="Var">
                                    <label class="form-check-label" for="AbdominalHassasiyet">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdominal Kontür: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür" id="AbdominalKontür" value="Düz">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Düz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür" id="AbdominalKontür" value="Yuvarlak">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Yuvarlak</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür" id="AbdominalKontür" value="İç Bükey">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">İç Bükey</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür" id="AbdominalKontür" value="Dış Bükey">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Dış Bükey</span>

                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Herniasyon: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Herniasyon" id="Herniasyon" value="Yok">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Herniasyon" id="Herniasyon" value="Var">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header"> Var. Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="HDiger" id="HDiger">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Umbilikus: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Umbilikus" id="Umbilikus" value="Çökük">
                                    <label class="form-check-label" for="Umbilikus">
                                        <span class="checkbox-header">Çökük </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Umbilikus" id="Umbilikus" value="Tümsek">
                                    <label class="form-check-label" for="Umbilikus">
                                        <span class="checkbox-header">Tümsek</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdomende Döküntü : </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdomenDokuntu" id="AbdomenDokuntu" value="Yok">
                                    <label class="form-check-label" for="AbdomenDokuntu">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdomenDokuntu" id="AbdomenDokuntu" value="Var">
                                    <label class="form-check-label" for="AbdomenDokuntu">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdomende Asit : </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Asit" id="Asit" value="Yok">
                                    <label class="form-check-label" for="Asit">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Asit" id="Asit" value="Var">
                                    <label class="form-check-label" for="Asit">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdomende Kitle:</p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Kitle" id="Kitle" value="Yeri">
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header">Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="YDiger" id="YDiger">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Kitle" id="Kitle" value="Buyuklugu">
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Büyüklüğü</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="BDiger" id="BDiger">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Kitle" id="Kitle" value="Ozelligi">
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Özelliği</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="ODiger" id="ODiger">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Karın Derisi :</p>

                        <div>
                            <div class="checkbox-wrapper d-flex">
                                <div class="checkboxes d-flex">
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KarinDerisi" id="KarinDerisi" value="Pigmentasyon">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header">Pigmentasyon</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="KarinDerisi" id="KarinDerisi" value="Homojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Homojen</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="KarinDerisi" id="KarinDerisi" value="Heterojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Heterojen</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!--<div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Stria</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>-->
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Stria</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Stria" id="Stria" value="Yok">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Stria" id="Stria" value="Var">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Var.Açıklama</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="SDiger">

                                </div>

                            </div>
                        </div>

                    </div>
                    <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">

                </div>
            </div>







            <script>
                $(function() {
                    $('#closeBtn').click(function(e) {
                        $("#content").load("formlar-student.php");

                    })
                });
            </script>

            <script>
                $(function() {
                    $('#submit').click(function(e) {


                        var valid = this.form.checkValidity();

                        if (valid) {
                            var id = <?php

                                        $userid = $_SESSION['userlogin']['id'];
                                        echo $userid
                                        ?>;
                            var OgunSayisi = $('#OgunSayisi').val();
                            var TukettigiBesin = $('#TukettigiBesin').val();
                            var PisirmeYontemi = $('#PisirmeYontemi').val();
                            var Boy = $('#Boy').val();
                            var Kilo = $('#Kilo').val();
                            var BKI = $('#BKI').val();
                            var Bagimsiz = $('#Bagimsiz').val();
                            var YariBagimli = $('#YariBagimli').val();
                            var Bagimli = $('#Bagimli').val();
                            var NormalDiyet = $('#NormalDiyet').val();
                            var Ozel = $('#Ozel').val();
                            var OzelDiyet = $('#OzelDiyet').val();
                            var SiviTuketimi = $('#SiviTuketimi').val();
                            var Oral = $('#Oral').val();
                            var Parenteral = $('#Parenteral').val();
                            var Sonda = $('#Sonda').val();
                            var Nazogastrik = $('#Nazogastrik').val();
                            var SagNazal = $('#SagNazal').val();
                            var PasajTakilmaTarihi1 = $('#PasajTakilmaTarihi1').val();
                            var SolNazal = $('#SolNazal').val();
                            var PasajTakilmaTarihi2 = $('#PasajTakilmaTarihi2').val();
                            var Orogastrik = $('#Orogastrik').val();
                            var OrogastrikTakilmaTarihi = $('#OrogastrikTakilmaTarihi').val();
                            var Gastrostomi = $('#Gastrostomi').val();
                            var GastrostomiTarihi = $('#GastrostomiTarihi').val();
                            var Jejunostomi = $('#Jejunostomi').val();
                            var JejunostomiTarihi = $('#JejunostomiTarihi').val();
                            var NazogastrikRadio = $('#NazogastrikRadio').val();
                            var cignemeRadio = $('#cignemeRadio').val();
                            var beslenmeileradio = $('#beslenmeileradio').val();
                            var Bulanti = $('#Bulanti').val();
                            var Kusma = $('#Kusma').val();
                            var Hazımsızlık = $('#Hazımsızlık').val();
                            var BDiger = $('#BDiger').val();
                            var beslenmeileradio = $('#beslenmeileradio').val();
                            var Soluk = $('#Soluk').val();
                            var Siyanotik = $('#Siyanotik').val();
                            var DDiger = $('#DDiger').val();
                            var AgizMukozasi = $('#AgizMukozasi').val();
                            var Koku = $('#Koku').val();
                            var Ülserasyon = $('#Ülserasyon').val();
                            var Nodul = $('#Nodul').val();
                            var MDiger = $('#MDiger').val();
                            var Tonsila = $('#Tonsila').val();
                            var TEnfeksiyon = $('#TEnfeksiyon').val();
                            var TLezyon = $('#TLezyon').val();
                            var TOdem = $('#TOdem').val();
                            var Tonsilektomi = $('#Tonsilektomi').val();
                            var TDiğer = $('#TDiğer').val();
                            var AbdominalHassasiyet = $('#AbdominalHassasiyet').val();
                            var AbdominalKontür = $('#AbdominalKontür').val();
                            var Herniasyon = $('#Herniasyon').val();
                            var HDiger = $('#HDiger').val();
                            var Umbilikus = $('#Umbilikus').val();
                            var AbdomenDokuntu = $('#AbdomenDokuntu').val();
                            var Asit = $('#Asit').val();
                            var Kitle = $('#Kitle').val();
                            var YDiger = $('#YDiger').val();
                            var BDiger = $('#BDiger').val();
                            var ODiger = $('#ODiger').val();
                            var KarinDerisi = $('#KarinDerisi').val();
                            var Stria = $('#Stria').val();
                            var SDiger = $('#SDiger').val();

                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: 'student-patient.php',
                                data: {
                                    OgunSayisi: OgunSayisi,
                                    TukettigiBesin: TukettigiBesin,
                                    PisirmeYontemi: PisirmeYontemi,
                                    Boy: Boy,
                                    BKI: BKI,
                                    Bagimsiz:Bagimsiz,
                                    YariBagimli:YariBagimli,
                                    Bagimli:Bagimli,
                                    NormalDiyet:NormalDiyet,
                                    Ozel: Ozel,
                                    OzelDiyet:OzelDiyet,
                                    SiviTuketimi:SiviTuketimi,
                                    Oral:Oral,
                                    Parenteral:Parenteral,
                                    Sonda:Sonda, 
                                    Nazogastrik:Nazogastrik,
                                    SagNazal:SagNazal,
                                    PasajTakilmaTarihi1:PasajTakilmaTarihi1,
                                    SolNazal:SolNazal,
                                    PasajTakilmaTarihi2:PasajTakilmaTarihi2,
                                    Orogastrik:Orogastrik,
                                    OrogastrikTakilmaTarihi:OrogastrikTakilmaTarihi,
                                    Gastrostomi:Gastrostomi,
                                    GastrostomiTarihi:GastrostomiTarihi,
                                    Jejunostomi:Jejunostomi,
                                    JejunostomiTarihi:JejunostomiTarihi,
                                    NazogastrikRadio:NazogastrikRadio,
                                    cignemeRadio:cignemeRadio,
                                    beslenmeileradio:beslenmeileradio,
                                    Bulanti:Bulanti,
                                    Kusma:Kusma,
                                    Hazımsızlık:Hazımsızlık,
                                    BDiger:BDiger,
                                    beslenmeileradio:beslenmeileradio,
                                    Soluk:Soluk,
                                    Siyanotik:Siyanotik,
                                    DDiger:DDiger,
                                    AgizMukozasi:AgizMukozasi,
                                    Koku:Koku,
                                    Ülserasyon:Ülserasyon,
                                    Nodul:Nodul,
                                    MDiger:MDiger,
                                    Tonsila:Tonsila,
                                    TEnfeksiyon:TEnfeksiyon,
                                    TLezyon :TLezyon,
                                    TOdem:TOdem,
                                    Tonsilektomi:Tonsilektomi,
                                    TDiğer:TDiğer,
                                    AbdominalHassasiyet:AbdominalHassasiyet,
                                    AbdominalKontür:AbdominalKontür,
                                    Herniasyon :Herniasyon,
                                    HDiger:HDiger,
                                    Umbilikus:Umbilikus,
                                    AbdomenDokuntu:AbdomenDokuntu,
                                    Asit:Asit,
                                    Kitle :Kitle,
                                    YDiger:YDiger,
                                    BDiger:BDiger,
                                    ODiger:ODiger,
                                    KarinDerisi:KarinDerisi,
                                    Stria:Stria,
                                    SDiger:SDiger,

                                },
                                success: function(data) {
                                    alert("Success");
                                    location.reload(true)
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
