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
                <input type="text" class="form-control" required name="beslenmeGunlukZaman" id="beslenmeGunlukZaman">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Ağırlıklı olarak tükettiğiniz besinler nelerdir?</p>
                <input type="text" class="form-control" required name="beslenmeAgirilikliZaman" id="beslenmeAgirilikli">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sıklıkla kullandığınız pişirme yöntemleri nelerdir? </p>
                <input type="text" class="form-control" required name="beslenmeSikliklaZaman" id="beslenmeSikliklaZaman">
            </div>

            <div class="input-section d-flex ">
                <p class="usernamelabel p-2">Boy: </p>
                <input type="text" class="form-control" required name="beslenmeBoy" id="beslenmeBoy">

                <p class="usernamelabel p-2">Kilo:</p>
                <input type="text" class="form-control" required name="beslenmeKilo" id="beslenmeKilo">

                <p class="usernamelabel p-2">BKİ ( kg/m2 ):</p>
                <input type="text" class="form-control" required name="beslenmeBki" id="beslenmeBki">
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
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox3">Bağımlı
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
                                                <input class="form-check-input" type="checkbox" id="diyetinlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Normal Diyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Özel
                                                    Diyet(Açıklayınız):
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="beslenmeOzelDiyet" id="beslenmeOzelDiyet">
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
                    Miktarı<input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">
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
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option1">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Oral</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option1">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Parenteral</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="option2">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Sonda ile</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Nazogastrik
                                                    </label>
                                                </div>
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">sağ nazal
                                                            pasaj / Takılma Tarihi:</label>
                                                        <input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">sol nazal
                                                            pasaj / Takılma Tarihi </label>
                                                        <input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Orogastrik
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Gastrostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Jejunostomi
                                                    </label>
                                                </div>
                                                <label class="form-check-label" for="inlineCheckbox1">Takılma Tarihi:
                                                    <input type="text" class="form-control" required name="beslenmeSivi" id="beslenmeSiviTuketimi">

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
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio" value="option1">
                    <label class="form-check-label" for="yatisdurumuradio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NazogastrikRadio" id="NazogastrikRadio" value="option1">
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
                    <input class="form-check-input" type="radio" name="cignemeRadio" id="cignemeRadio" value="option1">
                    <label class="form-check-label" for="cignemeRadio">
                        <span class="checkbox-header">Var</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="cignemeRadio" id="cignemeRadio" value="option2">
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
                                                <label class="form-check-label" for="inlineCheckbox1">Bulantı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Kusma</label>
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
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Hazımsızlık</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Diğer</label>
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
                                                        <label class="form-check-label" for="inlineCheckbox1">Kuru</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Soluk</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Siyanotik</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diger</label>
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
                                                        <label class="form-check-label" for="inlineCheckbox1">Kötü
                                                            Koku</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Ülserasyon</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Nodul</label>
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
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diğer</label>
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
                                                        <label class="form-check-label" for="inlineCheckbox1">Enfeksiyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Lezyon
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Ödem
                                                            (Sağ/sol)</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Tonsilektomi </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diğer</label>
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
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Abdominal Kontür: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalradio">
                                        <span class="checkbox-header">Düz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalradio">
                                        <span class="checkbox-header"> Yuvarlak</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio2" id="beslenmeabdominalradio2" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalradio2">
                                        <span class="checkbox-header">İç Bükey </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio2" id="beslenmeabdominalradio2" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalradio2">
                                        <span class="checkbox-header"> Dış Bükey</span>

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
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header"> Var. Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Umbilikus: </p>

                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Çökük </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Yok</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeabdominalradio" id="beslenmeabdominalradio" value="option1">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header">Yeri</span>
                                    </label>
                                    <input type="text" class="form-control diger">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header"> Büyüklüğü</span>
                                    </label>
                                    <input type="text" class="form-control diger">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeabdominalumuradio">
                                        <span class="checkbox-header"> Özelliği</span>
                                    </label>
                                    <input type="text" class="form-control diger">
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
                                        <label class="form-check-label" for="beslenmeabdominalumuradio">
                                            <span class="checkbox-header">Pigmentasyon</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                        <label class="form-check-label" for="beslenmeabdominalumuradio">
                                            <span class="checkbox-header"> Homojen</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeabdominalumuradio" value="option2">
                                        <label class="form-check-label" for="beslenmeabdominalumuradio">
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

                            </div>
                            <div class="checkboxes d-flex">
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
                                        <span class="checkbox-header"> Var.Açıklama</span>
                                    </label>
                                    <input type="text" class="form-control diger" name="scaraciklama">

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
                            var name = $('#name').val();
                            var surname = $('#surname').val();
                            var age = $('#age').val();
                            var not = $('#not').val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: 'student-patient.php',
                                data: {
                                    id: id,
                                    name: name,
                                    surname: surname,
                                    age: age,
                                    not: not

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