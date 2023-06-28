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
$sql = "SELECT * FROM form1_beslenme where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form1_beslenme = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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

            <h1 class="form-header">BESLENME GEREKSİNİMİ</h1>
            <div class="input-section d-flex">
                <p class="usernamelabel">Günlük öğün sayısı/zamanı </p>
                <input type="text" class="form-control" required name="OgunSayisi" id="OgunSayisi" maxlength="30" value="<?php echo $form1_beslenme[0]['OgunSayisi']?>">
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
                <input type="number" class="form-control" required name="Boy" id="Boy" maxlength="3">

                <p class="usernamelabel p-2">Kilo :</p>
                <input type="number" class="form-control" required name="Kilo" id="Kilo" maxlength="5">

                <p class="usernamelabel p-2">BKİ ( kg/m2 ):</p>
                <input type="number" class="form-control" required name="BKI" id="BKI">
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
                                                <input class="form-check-input nutritional_needs" type="radio" name='nutritional_needs'
                                                    id="nutritional_needs" value="Bağımsız">
                                                <label class="form-check-label" for="Bagimsiz">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutritional_needs" type="radio" name='nutritional_needs'
                                                    id="nutritional_needs" value="Yarı bağımlı">
                                                <label class="form-check-label" for="YariBagimli">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutritional_needs" type="radio" name='nutritional_needs'
                                                    id="nutritional_needs" value="Bağımlı">
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
                                                    id="diet" value="Normal Diyet">
                                                <label class="form-check-label" for="NormalDiyet">Normal Diyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='Diyet' type="radio" id="diet"
                                                    value="Ozel">
                                                <label class="form-check-label" for="Ozel">Özel
                                                    Diyet(Açıklayınız):
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required
                                                    name="OzelDiyet" id="diet_input" maxlength="100">
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
                    <input class="form-check-input food_consumption" type="radio" name="food-consumption"  value="Yok">
                    <label class="form-check-label" for="food-consumption-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input food_consumption" type="radio" name="food-consumption"  value="Var">
                    <label class="form-check-label" for="food-consumption-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="food_consumption_table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input food_consumption_var" type="radio" name="food-consumption-var-daha-az"  value="Daha Az">
                                <label class="form-check-label" for="food-consumption-daha-az">
                                    <span class="checkbox-header">Daha az</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input food_consumption_var" type="radio" name="food-consumption-var-daha-fazla"  value="Daha Fazla">
                                <label class="form-check-label" for="food-consumption-daha-fazla">
                                    <span class="checkbox-header">Daha fazla </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input food_consumption_var" type="radio" name="food-consumption-var-diger"  value="Diğer">
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
                    Miktarı<input type="number" class="form-control" required name="SiviTuketimi" id="liquid_consumption"
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
                            <input class="form-check-input" type="radio" name="şekli" id="diet_eating_process" value="Oral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Oral</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="şekli" id="diet_eating_process"
                                value="Parenteral">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Parenteral</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="şekli" id="diet_eating_process" value="Sonda ile">
                            <label class="form-check-label" for="BeslenmeSekli">
                                <span class="checkbox-header">Sonda ile</span>
                            </label>
                            <table class="ozgecmistable-wrapper" id="sonda_table">
                                <tbody>
                                    <tr>
                                        <td>
                                        
                                            <table id="nazogastrik_table">
                                                <tr>
                                                    <th>

                                                    <div class="form-check form-check-inline">
                                                            <input class="form-check-input" name="probe-type" type="radio"
                                                                id="with_probe" value="Nazogastrik">
                                                            <label class="form-check-label" for="Nazogastrik">Nazogastrik
                                                            </label>
                                                        </div>
                                                   </th>    
                                                    <td>
                                                        <div class="d-flex">
                                                        
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input nazal_radio" type="radio" name='nazal'
                                                                 value="Sag Nazal">
                                                                <label class="form-check-label" for="SagNazal">sağ nazal
                                                                    pasaj / Takılma Tarihi:</label>
                                                                <input type="text" class="form-control nazal_input" required
                                                                    name="sag_nazal_input">
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input nazal_radio" type="radio" name='nazal'
                                                                 value="Sol Nazal">
                                                                <label class="form-check-label" for="SolNazal">sol nazal
                                                                    pasaj / Takılma Tarihi </label>
                                                                <input type="text" class="form-control nazal_input" required
                                                                    name="sol_nazal_input" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>   
                                            </table>
                                        </td>
                                        

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex" id="Orogastrik_td">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="with_probe" value="Orogastrik">
                                                    <label class="form-check-label" for="Orogastrik">Orogastrik
                                                    </label>
                                                </div>
                                                <div>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="OrogastrikTakilmaTarihi" id="orogastrik_input">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex" id="Gastrostomi_td">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="with_probe" value="Gastrostomi">
                                                    <label class="form-check-label" for="Gastrostomi">Gastrostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="GastrostomiTarihi" id="gastrostomi_input">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable" id="Jejunostomi_td">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="probe-type" type="radio"
                                                        id="with_probe" value="Jejunostomi">
                                                    <label class="form-check-label" for="Jejunostomi">Jejunostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required
                                                        name="JejunostomiTarihi" id="jejunostomi_input">

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
                    <input class="form-check-input gastric_residue" type="radio" name="gastric_residue_yok" id="gastric_residue_yok"
                        value="Yok">
                    <label class="form-check-label" for="gastric_residue_yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input gastric_residue" type="radio" name="gastric-residue-var" id="gastric-residue-var"
                        value="Var">
                    <label class="form-check-label" for="gastric-residue-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="gastric_residue_table">
                    <tr>
                        <td>
                            <div>
                                Miltarı 
                                <input type="text" class="form-control" required name="gastric_residue_ml" id="gastric_residue_ml"
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
                    <input class="form-check-input nazogastrik_decompression_radio" type="radio" name="NazogastrikRadio-var"
                        value="Var">
                    <label class="form-check-label" for="yatisdurumuradio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input nazogastrik_decompression_radio" type="radio" name="NazogastrikRadio-yok"
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
                    <input class="form-check-input chewing_difficulty" type="radio" name="cignemeRadio-var" value="Var">
                    <label class="form-check-label" for="cignemeRadio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input chewing_difficulty" type="radio" name="cignemeRadio-yok" value="Yok">
                    <label class="form-check-label" for="cignemeradio">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Kilo kaybı </p>
                <div class="form-check">
                    <input class="form-check-input weight_loss" type="radio" name="weight-loss-yok" value="Yok">
                    <label class="form-check-label" for="weight-loss-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input weight_loss" type="radio" name="weight-loss-var"  value="Var">
                    <label class="form-check-label" for="weight-loss-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="weight_loss_table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_loss_var" type="radio" name="weight-loss-hizli"  value="Hızlı">
                                <label class="form-check-label" for="weight-loss-hizli">
                                    <span class="checkbox-header">Hızlı </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_loss_var" type="radio" name="weight-loss-kontrollu"  value="Kontrollü">
                                <label class="form-check-label" for="food-consumption-kontrollu">
                                    <span class="checkbox-header">Kontrollü</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_loss_var" type="radio" name="weight-loss-diger"  value="Diger">
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
                    <input class="form-check-input weight_gain" type="radio" name="weight-gain-yok"  value="Yok">
                    <label class="form-check-label" for="weight-gain-yok">
                        <span class="checkbox-header">Yok</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input weight_gain" type="radio" name="weight-gain-var"  value="Var">
                    <label class="form-check-label" for="weight-loss-var">
                        <span class="checkbox-header">Var</span>
                    </label>
                    <table class="weight_gain_table">
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_gain_var" type="radio" name="weight-gain-hizli"  value="Hızlı">
                                <label class="form-check-label" for="weight-gain-hizli">
                                    <span class="checkbox-header">Hızlı </span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_gain_var" type="radio" name="weight-gain-kontrollu"  value="Kontrollü">
                                <label class="form-check-label" for="weight-gain-kontrollu">
                                    <span class="checkbox-header">Kontrollü</span>
                                </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input weight_gain_var" type="radio" name="weight-gain-diger" value="Diger">
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
                            <input class="form-check-input nutrition_issue" type="radio" name="beslenmeIlgili" id="beslenmeileradio"
                                value="Yok">
                            <label class="form-check-label" for="beslenmeileumuradio-yok">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input nutrition_issue" type="radio" name="beslenmeIlgili" id="beslenmeileradio"
                                value="Var">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper nutrition_issue_table">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutrition_issue_var" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="Bulanti" value="Bulanti">
                                                <label class="form-check-label" for="Bulanti">Bulantı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutrition_issue_var" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="Kusma" value="Kusma">
                                                <label class="form-check-label" for="Kusma">Kusma</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutrition_issue_var" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="istahsizlik" value="İştahsızlık">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">İştahsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutrition_issue_var" type="checkbox"
                                                    name='beslenmeIlgilioptions' id="hazimsizlik" value="Hazımsızlık">
                                                <label class="form-check-label" for="Hazımsızlık">Hazımsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input nutrition_issue_var" type="checkbox"
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
                                    <input class="form-check-input lip_color_issue" type="radio" name="dudaklarinDurum"
                                        id="dudaklarRadio" value="Yok">
                                    <label class="form-check-label" for="dudaklarRadio-yok">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input lip_color_issue" type="radio" name="dudaklarinDurum"
                                        id="dudaklarRadio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper lip_color_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input lip_color_issue_var" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Kuru" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input lip_color_issue_var" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Soluk" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input lip_color_issue_var" name="dudaklarinDurumOptions"
                                                            type="checkbox" id="Siyanotik" value="Siyanotik">
                                                        <label class="form-check-label"
                                                            for="Siyanotik">Siyanotik</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input lip_color_issue_var" name="dudaklarinDurumOptions"
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
                                    <input class="form-check-input oral_mucosa_issue" type="radio" name="AgizMukozasi" id="AgizMukozasi"
                                        value="Yok">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input oral_mucosa_issue" type="radio" name="AgizMukozasi" id="AgizMukozasi"
                                        value="Var">
                                    <label class="form-check-label" for="AgizMukozasi">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper oral_mucosa_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input oral_mucosa_issue_var" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Koku" value="Kötü Koku">
                                                        <label class="form-check-label" for="Koku">Kötü
                                                            Koku</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input oral_mucosa_issue_var" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Ülserasyon" value="Ülserasyon">
                                                        <label class="form-check-label"
                                                            for="Ülserasyon">Ülserasyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input oral_mucosa_issue_var" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Nodul" value="Nodul">
                                                        <label class="form-check-label" for="Nodul">Nodul</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input oral_mucosa_issue_var" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Lezyon" value="Lezyon">
                                                        <label class="form-check-label" for="Lezyon">Lezyon </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input oral_mucosa_issue_var" name='AgizMukozasiOptions'
                                                            type="checkbox" id="Kuruluk" value="Kuruluk">
                                                        <label class="form-check-label" for="Kuruluk">Kuruluk </label>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                        <tr>
                                            <td class="protezlertable">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input oral_mucosa_issue_var" type="checkbox"
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
                                    <input class="form-check-input teeth_gums_issue" type="radio" name="DislerDisEtleri"
                                        id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input teeth_gums_issue" type="radio" name="DislerDisEtleri"
                                        id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper teeth_gums_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Protez">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Protez</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
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
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox3" value="Çürük">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Çürük</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox4" value="Apse">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Apse</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox5" value="Diş ağrısı">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diş ağrısı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
                                                            type="checkbox" id="inlineCheckbox5" value="Eksik Diş">
                                                        <label class="form-check-label" for="inlineCheckbox1">Eksik Diş
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input teeth_gums_issue_var" name="DislerDisEtleriOptions"
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
                                    <input class="form-check-input tongue_issue" type="radio" name="DilDurum" id="beslenmeileradio"
                                        value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input tongue_issue" type="radio" name="DilDurum" id="beslenmeilemuradio"
                                        value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper tongue_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tongue_issue_var" name="DilDurumOptions"
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
                                                        <input class="form-check-input tongue_issue_var" name="DilDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Lezyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tongue_issue_var" name="DilDurumOptions"
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
                                    <input class="form-check-input pharynx_issue" type="radio" name="FarenksDurum"
                                        id="beslenmeileradio" value="Yok">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input pharynx_issue" type="radio" name="FarenksDurum"
                                        id="beslenmeilemuradio" value="Var">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper pharynx_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input pharynx_issue_var" name="FarenksDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Enfeksiyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Enfeksiyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input pharynx_issue_var" name="FarenksDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Lezyon">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Lezyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input pharynx_issue_var" name="FarenksDurumOptions"
                                                            type="checkbox" id="inlineCheckbox1" value="Ödem">
                                                        <label class="form-check-label" for="inlineCheckbox1">Ödem
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input pharynx_issue_var" name="FarenksDurumOptions"
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
                                    <input class="form-check-input tonsils_issue" type="radio" name="TonsilaDurum" id="Tonsila"
                                        value="Yok">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input tonsils_issue" type="radio" name="TonsilaDurum" id="Tonsila"
                                        value="Var">
                                    <label class="form-check-label" for="Tonsila">
                                        <span class="checkbox-header"> Sorun Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper tonsils_issue_table">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tonsils_issue_var" name="TonsilaDurumOptions"
                                                            type="checkbox" id="TEnfeksiyon" value="Enfeksiyon">
                                                        <label class="form-check-label" for="TEnfeksiyon">Enfeksiyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tonsils_issue_var" name="TonsilaDurumOptions"
                                                            type="checkbox" id="TLezyon" value="Lezyon">
                                                        <label class="form-check-label" for="TLezyon">Lezyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tonsils_issue_var" type="checkbox" id="TOdem"
                                                            value="Ödem">
                                                        <label class="form-check-label" for="TOdem">Ödem
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tonsils_issue_var" type="checkbox"
                                                            id="TTonsilektomi" value="Tonsilektomi">
                                                        <label class="form-check-label" for="TTonsilektomi">Tonsilektomi
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input tonsils_issue_var" type="checkbox" id="TDiğer"
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
                                    <input class="form-check-input abdominal_issue" type="radio" name="AbdominalHassasiyet"
                                        id="AbdominalHassasiyet" value="Yok">
                                    <label class="form-check-label" for="AbdominalHassasiyet">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input abdominal_issue" type="radio" name="AbdominalHassasiyet"
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
                                    <input class="form-check-input abdominal_contour" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-straight" value="Düz">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Düz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input abdominal_contour" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-round" value="Yuvarlak">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">Yuvarlak</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input abdominal_contour" type="radio" name="AbdominalKontür"
                                        id="abdominal-contour-concave" value="İç Bükey">
                                    <label class="form-check-label" for="AbdominalKontür">
                                        <span class="checkbox-header">İç Bükey</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input abdominal_contour" type="radio" name="AbdominalKontür"
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
                                    <input class="form-check-input herniation" type="radio" name="Herniasyon" id="herniation-yok"
                                        value="Yok">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input herniation" type="radio" name="Herniasyon" id="herniation-var"
                                        value="Var">
                                    <label class="form-check-label" for="Herniasyon">
                                        <span class="checkbox-header"> Var. Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger herniation_input" name="HDiger" id="herniation-var-description"
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
                                    <input class="form-check-input umbelikus" type="radio" name="Umbilikus" id="umbilikus-collapsed"
                                        value="Çökük">
                                    <label class="form-check-label" for="Umbilikus">
                                        <span class="checkbox-header">Çökük </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input umbelikus" type="radio" name="Umbilikus" id="umbilikus-bump"
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
                                    <input class="form-check-input abdominal_rash" type="radio" name="AbdomenDokuntu"
                                        id="abdominal-rash-yok" value="Yok">
                                    <label class="form-check-label" for="AbdomenDokuntu">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input abdominal_rash" type="radio" name="AbdomenDokuntu"
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
                                    <input class="form-check-input abdominal_acites" type="radio" name="Asit" id="abdominal-acid-yok" value="Yok">
                                    <label class="form-check-label" for="Asit">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input abdominal_acites" type="radio" name="Asit" id="abdominal-acid-var" value="Var">
                                    <label class="form-check-label" for="Asit">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdomende Kitle:</p>

                        <div class="checkbox-wrapper d-flex abdominal_stuff_div">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header">Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Yeri" id="abdominal_mass_place"
                                        maxlength="40">
                                </div>
                                <div class="form-check">
                                    
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Büyüklüğü</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Buyuklugu" id="abdominal_mass_size">
                                </div>
                                <div class="form-check">
                                    
                                    <label class="form-check-label" for="Kitle">
                                        <span class="checkbox-header"> Özelliği</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="Ozelligi" id="abdominal_mass_description">
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
                                        <input class="form-check-input pigmentation" type="radio" name="KarinDerisi" id="KarinDerisi"
                                            value="Homojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Homojen</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input pigmentation" type="radio" name="KarinDerisi" id="KarinDerisi"
                                            value="Heterojen">
                                        <label class="form-check-label" for="KarinDerisi">
                                            <span class="checkbox-header"> Heterojen</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label stria" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Stria</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input stria" type="radio" name="Stria" id="Stria-yok" value="Yok">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input stria" type="radio" name="Stria" id="Stria-var" value="Var">
                                    <label class="form-check-label" for="Stria">
                                        <span class="checkbox-header"> Var</span>
                                    </label>
                                </div>

                            </div>

                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <label class="form-check-label " for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Skar </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input scar" type="radio" name="Skar-yok" id="Skar-yok" value="Yok">
                                    <label class="form-check-label" for="Skar">
                                        <span class="checkbox-header"> Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input scar" type="radio" name="Skar" id="Skar-var" value="Var">
                                    <label class="form-check-label" for="Skar-var">
                                        <span class="checkbox-header"> Var. Açıklama</span>
                                    </label>
                                    <input type="text" class="form-control scar_input" id="Skar-var-input" name="Skar-var-input" maxlength="30">

                                </div>

                            </div>
                        </div>

                    </div>
                    <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">

                </div>
            </div>







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
                });
            });
            $('#sonda_table :input').prop('disabled', true);
            $('.food_consumption_table :input').prop('disabled', true);
            $('.gastric_residue_table :input').prop('disabled', true);
            $('.weight_loss_table :input').prop('disabled', true);
            $('.weight_gain_table input').prop('disabled', true);
            $('#diet_input').prop('disabled', true);
            $('.nutrition_issue_table input').prop('disabled', true);
            $('.lip_color_issue_table input').prop('disabled', true);
            $('.oral_mucosa_issue_table input').prop('disabled', true);
            $('.teeth_gums_issue_table input').prop('disabled', true);
            $('.tongue_issue_table input').prop('disabled', true);
            $('.herniation_input').prop('disabled', true);
            $('.scar_input').prop('disabled', true);
            $('.pharynx_issue_table input').prop('disabled', true);
            $('.tonsils_issue_table input').prop('disabled', true);

            //Beslenme gereksinimini karşılamada 
            //?? missing, but works anyways???


            //Diyet
            $('input[type=radio][id="diet"]').change(function() {
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('#diet').not(this).prop('checked', false);
                }
                if ($('input[type=radio][id="diet"][value="Ozel"]').is(':checked')) {
                        $('#diet_input').prop('disabled', false);
                    } else {
                        $('#diet_input').prop('disabled', true);
                        $('#diet_input').val('');
                    }
            })

            //Günlük olarak izin verilen besinlerin tüketimi
            $('input.food_consumption').change(function() {
                var fields = $('input.food_consumption_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.food_consumption').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.food_consumption_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.food_consumption_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            $('input.food_consumption_var').change(function() {
                if ($(this).prop('checked')) {
                    $('input.food_consumption_var').not(this).prop('checked', false);
                }
            });
            
            //Beslenme şekli
            $('input[type=radio][id="diet_eating_process"]').change(function() {
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('#diet_eating_process').not(this).prop('checked', false);
                }
                if ($('input[type=radio][id="diet_eating_process"][value="Sonda ile"]').is(':checked')) {
                        $('#sonda_table input[type=radio][id="with_probe"]').prop('disabled', false);


                    } else {
                        $('#sonda_table input').prop('disabled', true);
                        $('#sonda_table input').prop('checked', false);
                        $('#sonda_table input[type=text]').val('');
                    }
            });

            //Sonda ile
            $('input[type=radio][id="with_probe"]').change(function() {
                var input_feilds = [$('#Orogastrik_td input[type=text]'), $('#Gastrostomi_td input[type=text]'),$('#Jejunostomi_td input[type=text]'), $('.nazal_radio'),$('.nazal_input')];
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('#with_probe').not(this).prop('checked', false);
                }
                //Nazogastrik
                if($(this).val() === "Nazogastrik"){
                    $('#nazogastrik_table td input[type=radio]').prop('disabled', false);
                    input_feilds.forEach((element,index) => {
                        if(index <= 2 ){
                        element.prop('disabled', true);
                        if(element.is(':text')){
                            element.val("");
                        }
                        }
                        
                    });
                }
                //Orogastrik
                else if($(this).val() === "Orogastrik"){
                    
                    input_feilds[0].prop('disabled', false);
                    input_feilds.forEach((element,index) => {
                       if((index !== 0) && (!Array.isArray(element))){
                        element.prop('disabled', true);
                        element.prop('checked', false);
                        if(element.is(':text')){
                            element.val("");
                        }
                       }
                       if(Array.isArray(element)){
                        element.forEach((element) => {
                            
                            element.prop('disabled', true);
                            element.prop('checked', false);
                            if(element.is(':text')){
                            element.val("");
                        }
                            
                        });

                       }
                    });
                    
                }
                //Gastrostomi
                else if($(this).val() === "Gastrostomi"){
                    input_feilds[1].prop('disabled', false);
                    input_feilds.forEach((element,index) => {
                       if((index !== 1) && (!Array.isArray(element))){
                        element.prop('disabled', true);
                        element.prop('checked', false);
                        if(element.is(':text')){
                            element.val("");
                        }
                       }
                       if(Array.isArray(element)){
                        element.forEach((element) => {
                            
                            element.prop('disabled', true);
                            element.prop('checked', false);
                            if(element.is(':text')){
                            element.val("");
                        }
                            
                           
                        });

                       }
                    });
                    
                }
                //Jejunostomi
                else if($(this).val() === "Jejunostomi"){
                    input_feilds[2].prop('disabled', false);
                    input_feilds.forEach((element,index) => {
                       if((index !== 2) && (!Array.isArray(element))){
                        element.prop('disabled', true);
                        element.prop('checked', false);
                        if(element.is(':text')){
                            element.val("");
                        }
                        
                       }
                       if(Array.isArray(element)){
                        element.forEach((element) => {
                            
                            element.prop('disabled', true);
                            element.prop('checked', false);
                            if(element.is(':text')){
                            element.val("");
                        }
                            
                           
                        });

                       }
                    });
                                  
                }
                       
            });

            //Nazogastrik
            $('input.nazal_radio').change(function() {
                if ($(this).val() === 'Sag Nazal') {
                    $('input.nazal_input[name="sag_nazal_input"]').prop('disabled', false);
                    $('input.nazal_input[name="sol_nazal_input"]').prop('disabled',true);
                    $('input.nazal_input[name="sol_nazal_input"]').val("");
                } else if ($(this).val() === 'Sol Nazal') {
                    $('input.nazal_input[name="sol_nazal_input"]').prop('disabled', false);
                    $('input.nazal_input[name="sag_nazal_input"]').prop('disabled', true);
                    $('input.nazal_input[name="sag_nazal_input"]').val("");                    
                }
            });

            //Gastrik Rezidü
            $('#gastric_residue_yok, #gastric-residue-var').change(function() {
                if ($(this).prop('checked')) {
                // Uncheck the other radio button
                $('#gastric_residue_yok, #gastric-residue-var').not(this).prop('checked', false);
                
                    if ($('#gastric-residue-var').prop('checked')){
                    $('.gastric_residue_table :input').prop('disabled', false); 
                }
                else {
                    $('.gastric_residue_table :input').prop('disabled', true); 
                    $('.gastric_residue_table :input[type="text"]').val(''); 
                }
                }
            });

            //Nazogastrik dekompresyon
            $('input.nazogastrik_decompression_radio').change(function() {
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.nazogastrik_decompression_radio').not(this).prop('checked', false);
                }

            });


            //Çiğneme Yutma Güçlüğü
            $('input.chewing_difficulty').change(function() {
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.chewing_difficulty').not(this).prop('checked', false);
                }

            });

            //Kilo kaybı
            $('input.weight_loss').change(function() {
                var fields = $('input.weight_loss_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.weight_loss').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.weight_loss_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.weight_loss_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            $('input.weight_loss_var').change(function() {
                if ($(this).prop('checked')) {
                    $('input.weight_loss_var').not(this).prop('checked', false);
                }
            });


             //Kilo alma
            $('input.weight_gain').change(function() {
                var fields = $('input.weight_gain_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.weight_gain').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.weight_gain_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.weight_gain_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            $('input.weight_gain_var').change(function() {
                if ($(this).prop('checked')) {
                    $('input.weight_gain_var').not(this).prop('checked', false);
                }
            });


            //Beslenme ile ilgili :
            $('input.nutrition_issue').change(function() {
                var fields = $('input.nutrition_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.nutrition_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.nutrition_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.nutrition_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Ağız ve Ağız Boşluğunun Değerlendirilmesi
            //Dudakların rengi ve yapısı 

            $('input.lip_color_issue').change(function() {
                var fields = $('input.lip_color_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.lip_color_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.lip_color_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.lip_color_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Ağız mukozası
            $('input.oral_mucosa_issue').change(function() {
                var fields = $('input.oral_mucosa_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.oral_mucosa_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.oral_mucosa_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.oral_mucosa_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });
            
            //Dişler ve Diş Etleri
            $('input.teeth_gums_issue').change(function() {
                var fields = $('input.teeth_gums_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.teeth_gums_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.teeth_gums_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.teeth_gums_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Dil
            $('input.tongue_issue').change(function() {
                var fields = $('input.tongue_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.tongue_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.tongue_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.tongue_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Farenks
            $('input.pharynx_issue').change(function() {
                var fields = $('input.pharynx_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.pharynx_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.pharynx_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.pharynx_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Tonsila
            $('input.tonsils_issue').change(function() {
                var fields = $('input.tonsils_issue_var');
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.tonsils_issue').not(this).prop('checked', false);

                    if($(this).val() === "Var"){
                        $('.tonsils_issue_table input').prop('disabled', false);
                    }
                    if($(this).val() === "Yok"){
                        $('.tonsils_issue_table input').prop('disabled', true);
                        fields.each(function(index, element) {
                            $(element).prop('checked', false);
                        
                    });
                    }
                    

                }
            });

            //Abdominal Değerlendirme
            //Abdominal Hassasiyet:
            $('input.abdominal_issue').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.abdominal_issue').not(this).prop('checked', false);
                }
            });

            //Abdominal Kontür:
            $('input.abdominal_contour').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.abdominal_contour').not(this).prop('checked', false);
                }
            });

            //Herniasyon:
            $('input.herniation').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.herniation').not(this).prop('checked', false);
                }

                if($(this).val() === "Var"){
                        $('.herniation_input').prop('disabled', false);
                    }
                    else {
                        $('.herniation_input').prop('disabled', true);
                        $('.herniation_input').val("");
                    }
            });

            //Umbilikus:
            $('input.umbelikus').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.umbelikus').not(this).prop('checked', false);
                }
            });

            //Abdomende Döküntü :
            $('input.abdominal_rash').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.abdominal_rash').not(this).prop('checked', false);
                }
            });

            //Abdomende Asit :
            $('input.abdominal_acites').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.abdominal_acites').not(this).prop('checked', false);
                }
            });

            //Karın Derisi
            //Pigmentasyon
            $('input.pigmentation').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.pigmentation').not(this).prop('checked', false);
                }
            });
            //Stria
            $('input.stria').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.stria').not(this).prop('checked', false);
                }
            });
            //Skar
            $('input.scar').change(function() {
                
                if ($(this).prop('checked')) {
                    // Uncheck the other radio button
                    $('input.scar').not(this).prop('checked', false);
                }

                if($(this).val() === "Var"){
                        $('.scar_input').prop('disabled', false);
                    }
                    else {
                        $('.scar_input').prop('disabled', true);
                        $('.scar_input').val("");
                    }
            });


    
            </script>

            <script>
           
                $('#submit').click(function(e) {
                    e.preventDefault();

                    var valid = checkValidity();

                    if (valid) {
                        var OgunSayisi = $('#OgunSayisi').val();
                        var TukettigiBesin = $('#TukettigiBesin').val();
                        var PisirmeYontemi = $('#PisirmeYontemi').val();
                        var Boy = $('#Boy').val();
                        var Kilo = $('#Kilo').val();
                        var BKI = $('#BKI').val();
                        var nutritional_needs = $('#nutritional_needs:checked').val();
                        var diet = $('#diet:checked').val();
                        var diet_input = $('#diet_input').val();
                        var food_consumption = $('input.food_consumption:checked').val();
                        var food_consumption_var = $('input.food_consumption_var:checked').val();
                        var liquid_consumption = $('input#liquid_consumption').val();
                        var diet_eating_process = $('input#diet_eating_process').val();
                        var with_probe = $('input#with_probe:checked').val();
                        var nazal_radio = $('input#nazal_radio').val();
                        var sag_nazal_input = $('input.nazal_input[name="sag_nazal_input"]').val();
                        var sol_nazal_input = $('input.nazal_input[name="sol_nazal_input"]').val();
                        var orogastrik_input = $('input#orogastrik_input').val();
                        var gastrostomi_input = $('input#gastrostomi_input').val();
                        var jejunostomi_input = $('input#jejunostomi_input').val();
                        var gastric_residue = $('input.gastric_residue:checked').val();
                        var gastric_residue_ml = $('input#gastric_residue_ml').val();
                        var nazogastrik_decompression_radio = $('input.nazogastrik_decompression_radio:checked').val();
                        var chewing_difficulty = $('input.chewing_difficulty:checked').val();
                        var weight_loss = $('input.weight_loss:checked').val();
                        var weight_loss_var = $('input.weight_loss_var:checked').val();
                        var weight_gain = $('input.weight_gain:checked').val();
                        var weight_gain_var = $('input.weight_gain_var:checked').val();

                        var nutrition_issue = $('input.nutrition_issue:checked').val();
                        var all_Inputs_nutrition_issue_var = $('input.nutrition_issue_var');
                        var nutrition_issue_var = [];
                        if (all_Inputs_nutrition_issue_var.length != 0) {
                        all_Inputs_nutrition_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                            nutrition_issue_var.push($(item).val());
                            }
                        });
                        }
                        var lip_color_issue = $('input.lip_color_issue:checked').val();
                        var all_Inputs_lip_color_issue_var = $('input.lip_color_issue_var');
                        var lip_color_issue_var = [];
                        if (all_Inputs_lip_color_issue_var.length != 0) {
                            all_Inputs_lip_color_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                lip_color_issue_var.push($(item).val());
                            }
                        });
                        }
                        var oral_mucosa_issue = $('input.oral_mucosa_issue:checked').val();
                        var all_Inputs_oral_mucosa_issue_var = $('input.oral_mucosa_issue_var');
                        var oral_mucosa_issue_var = [];
                        if (all_Inputs_oral_mucosa_issue_var.length != 0) {
                            all_Inputs_oral_mucosa_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                oral_mucosa_issue_var.push($(item).val());
                            }
                        });
                        }
                        var teeth_gums_issue = $('input.teeth_gums_issue:checked').val();
                        var all_Inputs_teeth_gums_issue_var = $('input.teeth_gums_issue_var');
                        var teeth_gums_issue_var = [];
                        if (all_Inputs_teeth_gums_issue_var.length != 0) {
                            all_Inputs_teeth_gums_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                teeth_gums_issue_var.push($(item).val());
                            }
                        });
                        }
                        var tongue_issue = $('input.tongue_issue:checked').val();
                        var all_Inputs_tongue_issue_var = $('input.tongue_issue_var');
                        var tongue_issue_var = [];
                        if (all_Inputs_tongue_issue_var.length != 0) {
                            all_Inputs_tongue_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                tongue_issue_var.push($(item).val());
                            }
                        });
                        }
                        var pharynx_issue = $('input.pharynx_issue:checked').val();
                        var all_Inputs_pharynx_issue_var = $('input.pharynx_issue_var');
                        var pharynx_issue_var = [];
                        if (all_Inputs_pharynx_issue_var.length != 0) {
                            all_Inputs_pharynx_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                pharynx_issue_var.push($(item).val());
                            }
                        });
                        }
                        var tonsils_issue = $('input.tonsils_issue:checked').val();
                        var all_Inputs_tonsils_issue_var = $('input.tonsils_issue_var');
                        var tonsils_issue_var = [];
                        if (all_Inputs_tonsils_issue_var.length != 0) {
                            all_Inputs_tonsils_issue_var.each(function(index, item) {
                            if ($(item).is(':checked')) {
                                tonsils_issue_var.push($(item).val());
                            }
                        });
                        }
                        var abdominal_issue = $('input.abdominal_issue:checked').val();
                        var abdominal_contour = $('input.abdominal_contour:checked').val();
                        var herniation = $('input.herniation:checked').val();
                        var herniation_input = $('input.herniation_input').val();
                        var umbelikus = $('input.umbelikus:checked').val();
                        var abdominal_rash = $('input.abdominal_rash:checked').val();
                        var abdominal_acites = $('input.abdominal_acites:checked').val();
                        var abdominal_mass_place = $('input#abdominal_mass_place').val();
                        var abdominal_mass_size = $('input#abdominal_mass_size').val();
                        var abdominal_mass_description = $('input#abdominal_mass_description').val();
                        var pigmentation = $('input.pigmentation:checked').val();
                        var stria = $('input.stria:checked').val();
                        var scar = $('input.scar:checked').val();
                        var scar_input = $('input.scar_input').val();

                        var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                        let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                        let yourDate = new Date();
                        let creation_date = yourDate.toISOString().split('T')[0];
                        let updateDate = yourDate.toISOString().split('T')[0];

                        var ajaxData = {
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                OgunSayisi: OgunSayisi,
                                TukettigiBesin:TukettigiBesin,
                                PisirmeYontemi:PisirmeYontemi,
                                Boy:Boy,
                                Kilo:Kilo,
                                BKI:BKI,
                                nutritional_needs:nutritional_needs,
                                diet:diet,
                                diet_input:diet_input ? diet_input : "empty",
                                food_consumption:food_consumption,
                                food_consumption_var:food_consumption_var ? food_consumption_var : "empty",
                                liquid_consumption:liquid_consumption,
                                diet_eating_process:diet_eating_process,
                                with_probe:with_probe ? with_probe : "empty",
                                nazal_radio:nazal_radio ? nazal_radio : "empty",
                                sag_nazal_input:sag_nazal_input ? sag_nazal_input : "empty",
                                sol_nazal_input:sol_nazal_input ? sol_nazal_input : "empty",
                                orogastrik_input:orogastrik_input ? orogastrik_input : "empty",
                                gastrostomi_input:gastrostomi_input ? gastrostomi_input : "empty",
                                jejunostomi_input:jejunostomi_input ? jejunostomi_input : "empty",
                                gastric_residue:gastric_residue,
                                gastric_residue_ml:gastric_residue_ml ? gastric_residue_ml : "empty",
                                nazogastrik_decompression_radio:nazogastrik_decompression_radio,
                                chewing_difficulty:chewing_difficulty,
                                weight_loss:weight_loss,
                                weight_loss_var:weight_loss_var ? weight_loss_var : "empty",
                                weight_gain:weight_gain,
                                weight_gain_var:weight_gain_var ? weight_gain_var : "empty",
                                nutrition_issue:nutrition_issue,
                                nutrition_issue_var:nutrition_issue_var.length ? nutrition_issue_var : "empty",
                                lip_color_issue:lip_color_issue,
                                lip_color_issue_var:lip_color_issue_var.length  ? lip_color_issue_var : "empty",
                                oral_mucosa_issue:oral_mucosa_issue,
                                oral_mucosa_issue_var:oral_mucosa_issue_var.length  ? oral_mucosa_issue_var : "empty",
                                teeth_gums_issue:teeth_gums_issue,
                                teeth_gums_issue_var:teeth_gums_issue_var.length  ? teeth_gums_issue_var : "empty",
                                tongue_issue:tongue_issue,
                                tongue_issue_var:tongue_issue_var.length  ? tongue_issue_var : "empty",
                                pharynx_issue:pharynx_issue,
                                pharynx_issue_var:pharynx_issue_var.length  ? pharynx_issue_var : "empty",
                                tonsils_issue:tonsils_issue,
                                tonsils_issue_var:tonsils_issue_var.length  ? tonsils_issue_var : "empty",
                                abdominal_issue:abdominal_issue,
                                abdominal_contour:abdominal_contour,
                                herniation:herniation,
                                herniation_input:herniation_input ? herniation_input : "empty",
                                umbelikus:umbelikus,
                                abdominal_rash:abdominal_rash,
                                abdominal_acites:abdominal_acites,
                                abdominal_mass_place:abdominal_mass_place,
                                abdominal_mass_size:abdominal_mass_size,
                                abdominal_mass_description:abdominal_mass_description,
                                pigmentation:pigmentation,
                                stria:stria,
                                scar:scar,
                                scar_input:scar_input ? scar_input : "empty",
                        }

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_BeslenmeGereksinimi.php',
                            data: ajaxData,
                            success: function(data) {
                            //     $("#tick-container").fadeIn(800);
                            // // Change the tick background to the animated GIF
                            // $("#tick").css("background-image", "url('./check-2.gif')");

                            // // Delay for 2 seconds (adjust the duration as needed)
                            // setTimeout(function() {
                            // // Load the content
                            // $("#content").load(url);
                            // $("#tick-container").fadeOut(600);
                            // // Hide the tick container
                            // }, 1000);
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

            });

            function scrollToInput(selector){
                    var parentDiv = $(`${selector}`).parent();
                    parentDiv.addClass('red-border');

                setTimeout(function() {
                    parentDiv.removeClass('red-border');
                }, 3000);

                    $('html, body').animate({
                    scrollTop: $(`${selector}`).offset().top
                    }, 500);
                    
            }

            function checkValidity(){
                //Günlük öğün sayısı/zamanı
                if($('#OgunSayisi').val() == ""){
                    scrollToInput('#OgunSayisi');
                    return false;
                }
                //Ağırlıklı olarak tükettiğiniz besinler nelerdir?
                if($('#TukettigiBesin').val() == ""){
                    scrollToInput('#TukettigiBesin');
                    return false;
                }

                //Sıklıkla kullandığınız pişirme yöntemleri nelerdir?
                if($('#PisirmeYontemi').val() == ""){
                    scrollToInput('#PisirmeYontemi');
                    return false;
                }

                //Boy 
                if($('#Boy').val() == ""){
                    scrollToInput('#Boy');
                    return false;
                }
                //Kilo
                if($('#Kilo').val() == ""){
                    scrollToInput('#Kilo');
                    return false;
                }
                //BKI
                if($('#BKI').val() == ""){
                    scrollToInput('#BKI');
                    return false;
                }
                //Beslenme gereksinimini karşılamada
                if ($('input.nutritional_needs:checked').length === 0) {
                    scrollToInput('input.nutritional_needs');
                    return false;
                }
                //Diyet
                if ($('input[type=radio][id="diet"]:checked').length === 0){
                    scrollToInput('input[type=radio][id="diet"]');
                    return false;
                }
                if ($('#diet[value="Ozel"]').is(':checked')) {
                    if ($('#diet_input').val().trim() === '') {
                        scrollToInput('#diet_input');
                            return false;
                    }
                }
                //Günlük olarak izin verilen besinlerin tüketimi
                if ($('input.food_consumption:checked').length === 0){
                    scrollToInput('input.food_consumption');
                    return false;
                }
                if ($('input.food_consumption[value="Var"]').is(':checked')){
                    if ($('input.food_consumption_var:checked').length === 0){
                        scrollToInput('input.food_consumption_var');
                    return false;
                    }
                }

                //Sıvı Tüketimi
                if($('#liquid_consumption').val() == ""){
                    scrollToInput('input#liquid_consumption');
                    return false;
                }
                
                //Beslenme şekli
                if ($('input[type=radio][id="diet_eating_process"]:checked').length === 0){
                    scrollToInput('input[type=radio][id="diet_eating_process"]');
                    return false;
                }

                //Beslenme şekli
                if ($('input#diet_eating_process:checked').length === 0){
                    scrollToInput('input#diet_eating_process');
                    return false;
                }

                // Sonda ile
                if($('input#diet_eating_process[value="Sonda ile"]').is(':checked')){
                    if ($('input#with_probe:checked').length === 0){
                        scrollToInput('input#with_probe');

                        return false;
                    }
                }

                //Nazogastrik
                if ($('input#with_probe[value="Nazogastrik"]').is(':checked')){
                        if($('input.nazal_radio:checked').length === 0){
                            scrollToInput('input.nazal_radio');

                            return false;
                        }
                        
                        else if($('input.nazal_radio[value="Sag Nazal"]').is(':checked')){
                            if($('input.nazal_input[name="sag_nazal_input"]').val() == ""){
                                scrollToInput('input.nazal_input[name="sag_nazal_input"]');

                                return false;
                            }
                        }

                        else if($('input.nazal_radio[value="Sol Nazal"]').is(':checked')){
                            if($('input.nazal_input[name="sol_nazal_input"]').val() == ""){
                                scrollToInput('input.nazal_input[name="sol_nazal_input"]');
                                return false;
                            }
                        }
                        
                }

                //Orogastrik
                if ($('input#with_probe[value="Orogastrik"]').is(':checked')){
                    if($('input#orogastrik_input').val().trim() === ''){
                        scrollToInput('input#orogastrik_input');

                        return false;
                    }

                }

                //Gastrostomi
                if ($('input#with_probe[value="Gastrostomi"]').is(':checked')){
                    if($('input#gastrostomi_input').val().trim() === ''){
                        scrollToInput('input#gastrostomi_input');

                        return false;
                    }

                }

                //Jejunostomi
                if ($('input#with_probe[value="Jejunostomi"]').is(':checked')){
                    if($('input#jejunostomi_input').val().trim() === ''){
                        scrollToInput('input#jejunostomi_input');

                        return false;
                    }

                }

                //Gastrik Rezidü
                if(!($('#gastric_residue_yok').is(':checked') || $('#gastric-residue-var').is(':checked'))){
                    scrollToInput('#gastric-residue-var');

                    return false;
                }

                if( $('#gastric-residue-var').is(':checked')){
                    if($('#gastric_residue_ml').val() == ""){
                        scrollToInput('#gastric_residue_ml');

                            return false;
                        }
                }
                //Nazogastrik dekompresyon
                if ($('input.nazogastrik_decompression_radio:checked').length === 0){
                    scrollToInput('input.nazogastrik_decompression_radio');

                    return false;
                }
                //Çiğneme Yutma Güçlüğü
                if ($('input.chewing_difficulty:checked').length === 0){
                    scrollToInput('input.chewing_difficulty');

                    return false;
                }
                //Kilo kaybı
                if ($('input.weight_loss:checked').length === 0){
                    scrollToInput('input.weight_loss');

                    return false;
                }
                if ($('input.weight_loss[value="Var"]').is(':checked')){
                    if($('input.weight_loss_var:checked').length === 0){
                        scrollToInput('input.weight_loss_var');

                        return false;
                    }
                }
                //Kilo alma
                if ($('input.weight_gain:checked').length === 0){
                    scrollToInput('input.weight_gain');
                    return false;
                }
                if ($('input.weight_gain[value="Var"]').is(':checked')){
                    if($('input.weight_gain_var:checked').length === 0){
                        scrollToInput('input.weight_gain_var');
                        return false;
                    }
                }

                //Beslenme ile ilgili :
                if ($('input.nutrition_issue:checked').length === 0){
                    scrollToInput('input.nutrition_issue');

                    return false;
                }
                if ($('input.nutrition_issue[value="Var"]').is(':checked')){
                    if ($('input.nutrition_issue_var:checked').length === 0){
                        scrollToInput('input.nutrition_issue_var');

                    return false;
                }
                }   

                //Ağız ve Ağız Boşluğunun Değerlendirilmesi
                //Dudakların rengi ve yapısı
                if ($('input.lip_color_issue:checked').length === 0){
                    scrollToInput('input.lip_color_issue');

                    return false;
                }
                if ($('input.lip_color_issue[value="Var"]').is(':checked')){
                    if ($('input.lip_color_issue_var:checked').length === 0){
                        scrollToInput('input.lip_color_issue_var');

                    return false;
                }
                }
                
                //Ağız mukozası
                if ($('input.oral_mucosa_issue:checked').length === 0){
                    scrollToInput('input.oral_mucosa_issue');
                    return false;
                }
                if ($('input.oral_mucosa_issue[value="Var"]').is(':checked')){
                    if ($('input.oral_mucosa_issue_var:checked').length === 0){
                        scrollToInput('input.oral_mucosa_issue_var');

                    return false;
                }
                }

                //Dişler ve Diş Etleri
                if ($('input.teeth_gums_issue:checked').length === 0){
                    scrollToInput('input.teeth_gums_issue');

                    return false;
                }
                if ($('input.teeth_gums_issue[value="Var"]').is(':checked')){
                    if ($('input.teeth_gums_issue_var:checked').length === 0){
                        scrollToInput('input.teeth_gums_issue_var');

                    return false;
                }
                }

                //Dil
                if ($('input.tongue_issue:checked').length === 0){
                    scrollToInput('input.tongue_issue');

                    return false;
                }
                if ($('input.tongue_issue[value="Var"]').is(':checked')){
                    if ($('input.tongue_issue_var:checked').length === 0){
                        scrollToInput('input.tongue_issue_var');

                    return false;
                }
                }

                //Farenks
                if ($('input.pharynx_issue:checked').length === 0){
                    scrollToInput('input.pharynx_issue');

                    return false;
                }
                if ($('input.pharynx_issue[value="Var"]').is(':checked')){
                    if ($('input.pharynx_issue_var:checked').length === 0){
                        scrollToInput('input.pharynx_issue_var');

                    return false;
                }
                }
                //Tonsila
                if ($('input.tonsils_issue:checked').length === 0){
                    scrollToInput('input.tonsils_issue');

                    return false;
                }
                if ($('input.tonsils_issue[value="Var"]').is(':checked')){
                    if ($('input.tonsils_issue_var:checked').length === 0){
                        scrollToInput('input.tonsils_issue_var');

                    return false;
                }
                }

                //Abdominal Değerlendirme
                //Abdominal Hassasiyet:
                if ($('input.abdominal_issue:checked').length === 0){
                    scrollToInput('input.abdominal_issue');

                    return false;
                }
                //Abdominal Kontür:
                if ($('input.abdominal_contour:checked').length === 0){
                    scrollToInput('input.abdominal_contour');

                    return false;
                }
                //Herniasyon
                if ($('input.herniation:checked').length === 0){
                    scrollToInput('input.herniation');

                    return false;
                }
                if ($('input.herniation[value="Var"]').is(':checked')){
                    if ($('input.herniation_input').val() === ""){
                        scrollToInput('input.herniation_input');

                    return false;
                }
                }
                //Umbilikus
                if ($('input.umbelikus:checked').length === 0){
                    scrollToInput('input.umbelikus');

                    return false;
                }
                //Abdomende Döküntü :
                if ($('input.abdominal_rash:checked').length === 0){
                    scrollToInput('input.abdominal_rash');

                    return false;
                }
                //Abdomende Asit :
                if ($('input.abdominal_acites:checked').length === 0){
                    scrollToInput('input.abdominal_acites');

                    return false;
                }
                //Abdomende Kitle:
                if (($('input#abdominal_mass_place').val() === "") || ($('input#abdominal_mass_size').val() === "") || ($('input#abdominal_mass_description').val() === "")  ){
                    scrollToInput('div.abdominal_stuff_div');

                    return false;
                }
                //Karın Derisi :
                //Pigmentasyon
                if ($('input.pigmentation:checked').length === 0){
                    scrollToInput('input.pigmentation');

                    return false;
                }
                //Stria
                if ($('input.stria:checked').length === 0){
                    scrollToInput('input.stria');

                    return false;
                }
                //Skar
                if ($('input.scar:checked').length === 0){
                    scrollToInput('input.scar');
                    return false;
                }
                if ($('input.scar[value="Var"]').is(':checked')){
                    if ($('input.scar_input').val() === ""){
                        scrollToInput('input.scar_input');

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
            <style>
                .red-border {
                border: 4px solid red;
                transition: border-color 0.3s ease-in-out;
            }
            </style>

            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>