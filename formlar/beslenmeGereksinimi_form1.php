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
                <input type="text" class="form-control" required name="OgunSayisi" id="OgunSayisi" maxlength="30">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Ağırlıklı olarak tükettiğiniz besinler nelerdir?</p>
                <input type="text" class="form-control" required name="TukettigiBesin" id="TukettigiBesin"
                    maxlength="100">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sıklıkla kullandığınız pişirme yöntemleri nelerdir? </p>
                <input type="text" class="form-control" required name="PisirmeYontemi" id="PisirmeYontemi"
                    maxlength="100">
            </div>

            <div class="input-section d-flex ">
                <p class="usernamelabel p-2">Boy (cm): </p>
                <input type="int" class="form-control" required name="Boy" id="Boy" maxlength="3">

                <p class="usernamelabel p-2">Kilo :</p>
                <input type="number" class="form-control" required name="Kilo" id="Kilo" step='0.1' maxlength="5">

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
                                                <input class="form-check-input" type="radio" name='karşılamada'
                                                    id="Bagimsiz" value="Bagimsiz">
                                                <label class="form-check-label" for="Bagimsiz">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name='karşılamada'
                                                    id="YariBagimli" value="Yarı bağımlı">
                                                <label class="form-check-label" for="YariBagimli">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name='karşılamada'
                                                    id="Bagimli" value="Bagimli">
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
                                                <input class="form-check-input" name='Diyet' type="radio"
                                                    id="NormalDiyet" value="Normal Diyet">
                                                <label class="form-check-label" for="NormalDiyet">Normal Diyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='Diyet' type="radio" id="Ozel"
                                                    value="Ozel">
                                                <label class="form-check-label" for="Ozel">Özel
                                                    Diyet(Açıklayınız):
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="OzelDiyet" id="OzelDiyet" maxlength="100">
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
                <p class="usernamelabel">Günlük olarak izin verilen besinlerin tüketimi </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="food-consumption-yok" id="food-consumption-yok" value="Yok">
                    <label class="form-check-label" for="food-consumption-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="food-consumption-var" id="food-consumption-var" value="Var">
                    <label class="form-check-label" for="food-consumption-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="food-consumption-table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="food-consumption-daha-az" id="food-consumption-daha-az" value="Daha Az">
                                <label class="form-check-label" for="food-consumption-daha-az">
                                    <span class="checkbox-header">Daha az</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="food-consumption-daha-fazla" id="food-consumption-daha-fazla" value="Daha Fazla">
                                <label class="form-check-label" for="food-consumption-daha-fazla">
                                    <span class="checkbox-header">Daha fazla </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="food-consumption-daha-diger" id="food-consumption-daha-diger" value="Diger">
                                <label class="form-check-label" for="food-consumption-daha-diger">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sıvı Tüketimi</p>
                <div>
                    Miktarı<input type="text" class="form-control" required name="SiviTuketimi" id="SiviTuketimi"
                        maxlength="6">
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
                            <input class="form-check-input" type="radio" name="şekli" id="Oral" value="Oral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Oral</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="şekli" id="Parenteral"
                                value="Parenteral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Parenteral</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="şekli" id="Sonda" value="Sonda">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Sonda ile</span>
                            </label>
                            <table class="ozgecmistable-wrapper" id="sonda-table">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="Nazogastrik" value="Nazogastrik">
                                                    <label class="form-check-label" for="Nazogastrik">Nazogastrik
                                                    </label>
                                                </div>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name='nazal'
                                                            id="SagNazal" value="Sag Nazal">
                                                        <label class="form-check-label" for="SagNazal">sağ nazal
                                                            pasaj / Takılma Tarihi:</label>
                                                        <input type="text" class="form-control" required
                                                            name="PasajTakilmaTarihi1" id="PasajTakilmaTarihi1">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name='nazal'
                                                            id="SolNazal" value="Sol Nazal">
                                                        <label class="form-check-label" for="SolNazal">sol nazal
                                                            pasaj / Takılma Tarihi </label>
                                                        <input type="text" class="form-control" required
                                                            name="PasajTakilmaTarihi2" id="PasajTakilmaTarihi2">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex" id="Orogastrik-td">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="Orogastrik" value="Orogastrik">
                                                    <label class="form-check-label" for="Orogastrik">Orogastrik
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="OrogastrikTakilmaTarihi" id="OrogastrikTakilmaTarihi">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex" id="Gastrostomi-td">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="Gastrostomi" value="Gastrostomi">
                                                    <label class="form-check-label" for="Gastrostomi">Gastrostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="GastrostomiTarihi" id="GastrostomiTarihi">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable" id="Jejunostomi-td">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="Jejunostomi" value="Jejunostomi">
                                                    <label class="form-check-label" for="Jejunostomi">Jejunostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="JejunostomiTarihi" id="JejunostomiTarihi">

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
                <p class="usernamelabel">Gastrik Rezidü </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gastric-residue-yok" id="gastric-residue-yok"
                        value="Yok">
                    <label class="form-check-label" for="gastric-residue-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gastric-residue-var" id="gastric-residue-var"
                        value="Var">
                    <label class="form-check-label" for="gastric-residue-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="gastric-residue-table">
                    <tr>
                        <td>
                            <div>
                                Miltarı 
                                <input type="text" class="form-control" required name="gastric-residue-ml" id="gastric-residue-ml"
                                    maxlength="6">
                                ml.
                            </div>
                        </td>   
                    </tr>
                </table>
                </div>
            
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Nazogastrik dekompresyon</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio"
                        value="Var">
                    <label class="form-check-label" for="yatisdurumuradio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio"
                        value="Yok">
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
                <p class="usernamelabel">Kilo kaybı </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="weight-loss-yok" id="weight-loss-yok" value="Yok">
                    <label class="form-check-label" for="weight-loss-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="weight-loss-var" id="weight-loss-var" value="Var">
                    <label class="form-check-label" for="weight-loss-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="weight-loss-table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-loss-hizli" id="weight-loss-hizli" value="Hızlı">
                                <label class="form-check-label" for="weight-loss-hizli">
                                    <span class="checkbox-header">Hızlı </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-loss-kontrollu" id="weight-loss-kontrollu" value="Kontrollü">
                                <label class="form-check-label" for="food-consumption-kontrollu">
                                    <span class="checkbox-header">Kontrollü</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-loss-diger" id="weight-loss-diger" value="Diger">
                                <label class="form-check-label" for="weight-loss-diger">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>


            <div class="input-section d-flex">
                <p class="usernamelabel">Kilo alma </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="weight-gain-yok" id="weight-gain-yok" value="Yok">
                    <label class="form-check-label" for="weight-gain-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="weight-gain-var" id="weight-gain-var" value="Var">
                    <label class="form-check-label" for="weight-loss-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="weight-gain-table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-gain-hizli" id="weight-gain-hizli" value="Hızlı">
                                <label class="form-check-label" for="weight-gain-hizli">
                                    <span class="checkbox-header">Hızlı </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-gain-kontrollu" id="weight-gain-kontrollu" value="Kontrollü">
                                <label class="form-check-label" for="weight-gain-kontrollu">
                                    <span class="checkbox-header">Kontrollü</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="weight-gain-diger" id="weight-gain-diger" value="Diger">
                                <label class="form-check-label" for="weight-gain-diger">
                                    <span class="checkbox-header">Diğer</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>




            <div class="input-section d-flex">

                <p class="usernamelabel">Beslenme ile ilgili :</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeIlgili" id="beslenmeileradio"
                                value="Yok">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeIlgili" id="beslenmeilemuradio"
                                value="Var">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="Bulanti" value="Bulanti">
                                                <label class="form-check-label" for="Bulanti">Bulantı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="Kusma" value="Kusma">
                                                <label class="form-check-label" for="Kusma">Kusma</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">İştahsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="Hazımsızlık" value="Hazımsızlık">
                                                <label class="form-check-label" for="Hazımsızlık">Hazımsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="BDiger" value="Diger">
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
                                    <input class="form-check-input" type="radio" name="dudaklarinDurum"
                                        id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dudaklarinDurum"
                                        id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Kuru" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Soluk" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Siyanotik" value="Siyanotik">
                                                        <label class="form-check-label"
                                                            for="Siyanotik">Siyanotik</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="DDiger" value="Diger">
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
                                    <input class="form-check-input" type="radio" name="AgizMukozasi" id="AgizMukozasi"
                                        value="Yok">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AgizMukozasi" id="AgizMukozasi"
                                        value="Var">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Koku" value="Kötü Koku">
                                                        <label class="form-check-label" for="Koku">Kötü
                                                            Koku</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Ülserasyon" value="Ülserasyon">
                                                        <label class="form-check-label"
                                                            for="Ülserasyon">Ülserasyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Nodul" value="Nodul">
                                                        <label class="form-check-label" for="Nodul">Nodul</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Lezyon" value="Lezyon">
                                                        <label class="form-check-label" for="Lezyon">Lezyon </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Kuruluk" value="Kuruluk">
                                                        <label class="form-check-label" for="Kuruluk">Kuruluk </label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                        <tr>
                                            <td class="protezlertable">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name='AgizMukozasiOptions' id="inlineCheckbox1" value="Diğer">
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
                                    <input class="form-check-input" type="radio" name="DislerDisEtleri"
                                        id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DislerDisEtleri"
                                        id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Protez">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Protez</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox2"
                                                            value="Dişeti kanaması">
                                                        <label class="form-check-label" for="inlineCheckbox1">Dişeti
                                                            kanaması</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox3" value="Çürük">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Çürük</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox4" value="Apse">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Apse</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox5" value="Diş ağrısı">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diş ağrısı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox5" value="Eksik Diş">
                                                        <label class="form-check-label" for="inlineCheckbox1">Eksik Diş
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox6" value="Dişeti">
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
                                    <input class="form-check-input" type="radio" name="DilDurum" id="beslenmeileradio"
                                        value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DilDurum" id="beslenmeilemuradio"
                                        value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DilDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1"
                                                            value="Tat almada değişim">
                                                        <label class="form-check-label" for="inlineCheckbox1">Tat almada
                                                            değişim</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DilDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Lezyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="DilDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Nodül/Kist">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Nodül/Kist</label>
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
                                    <input class="form-check-input" type="radio" name="FarenksDurum"
                                        id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="FarenksDurum"
                                        id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="FarenksDurumOptions"
                                                            type="radio" id="inlineCheckbox1" value="Enfeksiyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Enfeksiyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="FarenksDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Lezyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="FarenksDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Ödem">
                                                        <label class="form-check-label" for="inlineCheckbox1">Ödem
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="FarenksDurumOptions"
                                                            type="checkbox" id="MDiğer" value="Diğer">
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
                                    <input class="form-check-input" type="radio" name="TonsilaDurum" id="Tonsila"
                                        value="Yok">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TonsilaDurum" id="Tonsila"
                                        value="Var">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="TonsilaDurumOptions"
                                                            type="checkbox" id="TEnfeksiyon" value="Enfeksiyon">
                                                        <label class="form-check-label" for="TEnfeksiyon">Enfeksiyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" name="TonsilaDurumOptions"
                                                            type="checkbox" id="TLezyon" value="Lezyon">
                                                        <label class="form-check-label" for="TLezyon">Lezyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TOdem"
                                                            value="Ödem">
                                                        <label class="form-check-label" for="TOdem">Ödem
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="TTonsilektomi" value="Tonsilektomi">
                                                        <label class="form-check-label" for="TTonsilektomi">Tonsilektomi
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="TDiğer"
                                                            value="Diğer">
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
                                    <input class="form-check-input" type="radio" name="AbdominalHassasiyet"
                                        id="AbdominalHassasiyet" value="Yok">
                                    <label class="form-check-label" for="AbdominalHassasiyet">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalHassasiyet"
                                        id="AbdominalHassasiyet" value="Var">
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
                                    <input class="form-check-input" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-straight" value="Düz">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Düz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-round" value="Yuvarlak">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Yuvarlak</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-concave" value="İç Bükey">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">İç Bükey</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-convex" value="Dış Bükey">
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
                                    <input class="form-check-input" type="radio" name="Herniasyon" id="herniation-yok"
                                        value="Yok">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Herniasyon" id="herniation-var"
                                        value="Var">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header"> Var. Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="HDiger" id="herniation-var-description"
                                        maxlength="40">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Umbilikus: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Umbilikus" id="umbilikus-collapsed"
                                        value="Çökük">
                                    <label class="form-check-label" for="Umbilikus">
                                        <span class="checkbox-header">Çökük </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Umbilikus" id="umbilikus-bump"
                                        value="Tümsek">
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
                                    <input class="form-check-input" type="radio" name="AbdomenDokuntu"
                                        id="abdominal-rash-yok" value="Yok">
                                    <label class="form-check-label" for="AbdomenDokuntu">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AbdomenDokuntu"
                                        id="abdominal-rash-var" value="Var">
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
                                    <input class="form-check-input" type="radio" name="Asit" id="abdominal-acid-yok" value="Yok">
                                    <label class="form-check-label" for="Asit">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Asit" id="abdominal-acid-var" value="Var">
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
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header">Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Yeri" id="abdominal-mass-place"
                                        maxlength="40">
                                </div>
                                <div class="form-check">
                                    
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Büyüklüğü</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Buyuklugu" id="abdominal-mass-size">
                                </div>
                                <div class="form-check">
                                    
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Özelliği</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Ozelligi" id="abdominal-mass-description">
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
                                        
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header">Pigmentasyon</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="KarinDerisi" id="KarinDerisi"
                                            value="Homojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Homojen</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="KarinDerisi" id="KarinDerisi"
                                            value="Heterojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Heterojen</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Stria</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Stria" id="Stria-yok" value="Yok">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Stria" id="Stria-var" value="Var">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>

                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Skar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Skar-yok" id="Skar-yok" value="Yok">
                                    <label class="form-check-label" for="Skar">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Skar" id="Skar-var" value="Var">
                                    <label class="form-check-label" for="Skar-var">
                                        <span class="checkbox-header"> Var. Açıklama</span>
                                    </label>
                                    <input type="text" class="form-control" id="Skar-var-input" name="Skar-var-input" maxlength="30">

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
            $('#sonda-table :input').prop('disabled', true);
            $('.food-consumption-table :input').prop('disabled', true);
            $('.gastric-residue-table :input').prop('disabled', true);
            $('.weight-loss-table :input').prop('disabled', true);
            $('.weight-gain-table :input').prop('disabled', true);
            $('input[type="radio"][name="nazal"]').prop('disabled', true);
            $('input[type="text"][name="OrogastrikTakilmaTarihi"]').prop('disabled', true);
            $('input[type="text"][name="GastrostomiTarihi"]').prop('disabled', true);
            $('input[type="text"][name="JejunostomiTarihi"]').prop('disabled', true);
            $('input[type="radio"][name="şekli"]').on('change', function() {
                if ($(this).val() === 'Sonda') {
                    $('#sonda-table :input').prop('disabled', false);
                } else {
                    $('#sonda-table :input').prop('disabled', true);
                    $('input[type="radio"][name="nazal"]').prop('disabled', true);
                    $('input[type="text"][name="OrogastrikTakilmaTarihi"]').val('')
                    $('input[type="text"][name="tatakem bck to"]').val('');
                    $('input[type="text"][name="JejunostomiTarihi"]').val('');
                    $('input[name=nazal]').val('');
                    $('input[name=nazal]').prop("checked", '');
                    $('#JejunostomiTarihi').val('');
                    $('#PasajTakilmaTarihi1').val('');
                    $('#PasajTakilmaTarihi2').val('');
                    $('#OrogastrikTakilmaTarihi').val('');
                    $('#GastrostomiTarihi').val('');
                }
            });

            $('#weight-gain-yok, #weight-gain-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#weight-gain-yok, #weight-gain-var').not(this).prop('checked', false);
                
                    if ($('#weight-gain-var').prop('checked')){
                    $('.weight-gain-table :input').prop('disabled', false); 
                }
                else {
                    $('.weight-gain-table :input').prop('disabled', true); 
                }
                }
            });

            $('#weight-loss-yok, #weight-loss-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#weight-loss-yok, #weight-loss-var').not(this).prop('checked', false);
                
                    if ($('#weight-loss-var').prop('checked')){
                    $('.weight-loss-table :input').prop('disabled', false); 
                }
                else {
                    $('.weight-loss-table :input').prop('disabled', true); 
                }
                }
            });

            $('#gastric-residue-yok, #gastric-residue-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#gastric-residue-yok, #gastric-residue-var').not(this).prop('checked', false);
                
                    if ($('#gastric-residue-var').prop('checked')){
                    $('.gastric-residue-table :input').prop('disabled', false); 
                }
                else {
                    $('.gastric-residue-table :input').prop('disabled', true); 
                }
                }
            });

            $('#food-consumption-yok, #food-consumption-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#food-consumption-yok, #food-consumption-var').not(this).prop('checked', false);
                
                    if ($('#food-consumption-var').prop('checked')){
                    $('.food-consumption-table :input').prop('disabled', false); 
                }
                else {
                    $('.food-consumption-table :input').prop('disabled', true); 
                }
                }
            });

            $('#Skar-yok, #Skar-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#Skar-yok, #Skar-var').not(this).prop('checked', false);
                if ($('#Skar-var').prop('checked')){
                    $('#Skar-var-input').prop('disabled', false); 
                }
                else {
                    $('#Skar-var-input').prop('disabled', true); 
                }
                }
            });

            $('#herniation-yok, #herniation-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#herniation-yok, #herniation-var').not(this).prop('checked', false);
                if ($('#herniation-var').prop('checked')){
                    $('#herniation-var-description').prop('disabled', false); 
                }
                else {
                    $('#herniation-var-description').prop('disabled', true); 
                }
                }
            });

            

            $('input[type="radio"][name="probe-type"]').on('change', function() {
                if ($(this).val() === 'Nazogastrik') {
                    $('input[type="radio"][name="nazal"]').prop('disabled', false);
                    $('input[type="text"][name="OrogastrikTakilmaTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="GastrostomiTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="JejunostomiTarihi"]').prop('disabled', true);
                }
                if ($(this).val() === 'Orogastrik') {
                    $('input[type="radio"][name="nazal"]').prop('disabled', true);
                    $('input[type="text"][name="OrogastrikTakilmaTarihi"]').prop('disabled', false);
                    $('input[type="text"][name="GastrostomiTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="JejunostomiTarihi"]').prop('disabled', true);
                }
                if ($(this).val() === 'Gastrostomi') {
                    $('input[type="radio"][name="nazal"]').prop('disabled', true);
                    $('input[type="text"][name="OrogastrikTakilmaTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="GastrostomiTarihi"]').prop('disabled', false);
                    $('input[type="text"][name="JejunostomiTarihi"]').prop('disabled', true);
                }
                if ($(this).val() === 'Jejunostomi') {
                    $('input[type="radio"][name="nazal"]').prop('disabled', true);
                    $('input[type="text"][name="OrogastrikTakilmaTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="GastrostomiTarihi"]').prop('disabled', true);
                    $('input[type="text"][name="JejunostomiTarihi"]').prop('disabled', false);
                }

            });
            </script>

            <script>
            $(function() {
                $('#submit').click(function(e) {
                    e.preventDefault();

                    var valid = checkValidity();

                    if (valid) {
                        var id = <?php $userid = $_SESSION['userlogin']['id'];
                                    echo $userid
                                    ?>;
                        var OgunSayisi = $('#OgunSayisi').val();
                        var TukettigiBesin = $('#TukettigiBesin').val();
                        var PisirmeYontemi = $('#PisirmeYontemi').val();
                        var Boy = $('#Boy').val();
                        var Kilo = $('#Kilo').val();
                        var BKI = $('#BKI').val();
                        var karsilamada = $('input[name="karşılamada"]:checked').val();



                        $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/submitOrUpdateYasamsal_form10.php',
                        data: {
                            isUpdate: false,
                            id: id,
                            name: name,
                            surname: surname,
                            
                        },
                        success: function(data) {
                            alert("Güncelleme Başarılı!");
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                            $("#content").load(url);
                        },
                        error: function(data) {
                            console.log(data)
                        }
                })

                    }
                    else {
                        alert("Lütfen formu eksiksiz doldurunuz!");
                    }

                })

            });

            function checkValidity(){
                //Günlük öğün sayısı/zamanı
                if($('#OgunSayisi').val() == ""){
                    return false;
                }
                //Ağırlıklı olarak tükettiğiniz besinler nelerdir?
                if($('#TukettigiBesin').val() == ""){
                    return false;
                }

                //Sıklıkla kullandığınız pişirme yöntemleri nelerdir?
                if($('#PisirmeYontemi').val() == ""){
                    return false;
                }

                //Boy 
                if($('#Boy').val() == ""){
                    return false;
                }
                //Kilo
                if($('#Kilo').val() == ""){
                    return false;
                }
                //BKI
                if($('#BKI').val() == ""){
                    return false;
                }
                //Beslenme gereksinimini karşılamada
                if (!($('#Bagimsiz').is(':checked') || $('#YariBagimli').is(':checked') || $('#Bagimli').is(':checked'))) {
                return false;
                }
                //Diyet NormalDiyet
                if(!$('#NormalDiyet').is(':checked')){
                    if($('#OzelDiyet').val() == ""){
                        return false;
                    }
                }

                return true;
            }
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