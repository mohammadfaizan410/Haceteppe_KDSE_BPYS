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

            <h1 class="form-header">SOLUNUM GEREKSİNİMİ</h1>
            <div class="input-section d-flex">

                <p class="usernamelabel">Solunumda:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="Bagimsiz">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Bağımsız</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="Yari Bagimli">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header"> Yarı bağımlı</span>

                            </label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="yatisdurumuradio" id="yatisdurumuradio" value="Bagimli">
                            <label class="form-check-label" for="yatisdurumuradio">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Solunumda sorun var mı?:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumSorunu" id="SolunumSorunu" value="Yok">
                            <label class="form-check-label" for="SolunumSorunu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumSorunu" id="SolunumSorunu" value="Var">
                            <label class="form-check-label" for="SolunumSorunu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Dispne" value="Dispne">
                                                <label class="form-check-label" for="Dispne">Dispne </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hiperventilasyon" value="Hiperventilasyon">
                                                <label class="form-check-label" for="Hiperventilasyon">Hiperventilasyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hipoventilasyon" value="Hipoventilasyon">
                                                <label class="form-check-label" for="Hipoventilasyon">Hipoventilasyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Takipne" value="Takipne">
                                                <label class="form-check-label" for="Takipne">Takipne
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Bradipne" value="Bradipne">
                                                <label class="form-check-label" for="Bradipne">Bradipne
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Siyanoz" value="Siyanoz">
                                                <label class="form-check-label" for="Siyanoz">Siyanoz
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Diğer" value="Diğer">
                                                <label class="form-check-label" for="Diğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="solunum_diger" id="solunum_diger" placeholder="Diğer">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumYolu" id="SolunumYolu" value="Yok">
                            <label class="form-check-label" for="SolunumYolu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SolunumYolu" id="SolunumYolu" value="Var">
                            <label class="form-check-label" for="SolunumYolu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Trakeostomi" value="Trakeostomi">
                                                <label class="form-check-label" for="Trakeostomi">Trakeostomi</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="EndotrakealTüp" value="Endotrakeal Tüp">
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
                                                <input class="form-check-input" type="checkbox" id="Etkisiz" value="Etkisiz">
                                                <label class="form-check-label" for="Etkisiz">Etkisiz</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="OksurmeDiğer" value="Diğer">
                                                <label class="form-check-label" for="OksurmeDiğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="oksurme_diger" id="oksurme_diger" placeholder="Diğer">
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
                                                <input class="form-check-input" type="checkbox" id="EtkisizBalgam" value="Etkisiz balgam">
                                                <label class="form-check-label" for="EtkisizBalgam">Etkisiz balgam
                                                    çıkartma</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NormalBalgam" value="Balgam">
                                                <label class="form-check-label" for="NormalBalgam">Balgam
                                                    Çıkamama</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="AşırıKıvamlı" value="Aşırı kıvamlı">
                                                <label class="form-check-label" for="AşırıKıvamlı">Aşırı kıvamlı
                                                    balgam</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="BalgamDiğer" value="Diğer">
                                                <label class="form-check-label" for="BalgamDiğer">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="balgam_diger" id="balgam_diger" placeholder="Diğer">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AspirasyonIhtiyaci" id="AspirasyonIhtiyaci" value="Yok">
                            <label class="form-check-label" for="AspirasyonIhtiyaci">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AspirasyonIhtiyaci" id="AspirasyonIhtiyaci" value="Var">
                            <label class="form-check-label" for="AspirasyonIhtiyaci">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Oro_Nazofarengeal" value="Oro_Nazofarengeal">
                                                <label class="form-check-label" for="Oro_Nazofarengeal">Oro - Nazofarengeal</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Trakeal" value="Trakeal">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BurunMuayenesi" id="BurunMuayenesi" value="Yok">
                            <label class="form-check-label" for="BurunMuayenesi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BurunMuayenesi" id="BurunMuayenesi" value="Var">
                            <label class="form-check-label" for="BurunMuayenesi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalMukoza" value="Nazal Mukoza">
                                                <label class="form-check-label" for="NazalMukoza">Nazal mukoza hiperemik</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalSeptumda" value="Nazal Septumda">
                                                <label class="form-check-label" for="NazalSeptumda">Nazal septumda deviasyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalKanama" value="Nazal Kanama">
                                                <label class="form-check-label" for="NazalKanama">Nazal kanama</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalLezyon" value="Nazal Lezyon">
                                                <label class="form-check-label" for="NazalLezyon">Nazal lezyon
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalAkinti" value="Nazal Akinti">
                                                <label class="form-check-label" for="NazalAkinti">Nazal akıntı</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="NazalDiger" value="Diger">
                                                <label class="form-check-label" for="NazalDiger">Diğer
                                                </label>
                                                <input type="text" class="form-control ozgecmistable" required name="nazal_diger" id="nazal_diger" placeholder="Diğer">
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
                                                <input class="form-check-input" type="checkbox" id="Sislik" value="Sislik">
                                                <label class="form-check-label" for="Sislik">Şişlik</label>
                                            </div>
                                        </td>

                                    </tr>


                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="TiroidDiger" value="Diger">
                                                <label class="form-check-label" for="TiroidDiger">Diğer
                                                </label>
                                                <p>Kitle
                                                    <input type="text" class="form-control" required name="tiroid_diger" id="tiroid_diger" placeholder="">
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
                                                <input class="form-check-input" type="checkbox" id="SagaKayma" value="Sağa Kayma">
                                                <label class="form-check-label" for="SagaKayma">Sağa Kayma</label>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="SolaKayma" value="Sola Kayma">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="LenfNodlari" id="LenfNodlari" value="Yok">
                            <label class="form-check-label" for="LenfNodlari">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="LenfNodlari" id="LenfNodlari" value="Var">
                            <label class="form-check-label" for="LenfNodlari">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <label class="form-check-label" for="Yeri">Yeri</label>

                                        <input type="text" class="form-control" required name="NodYeri" id="NodYeri" placeholder="Yeri">


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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SkapulaSimatrikligi" id="SkapulaSimatrikligi" value="Yok">
                            <label class="form-check-label" for="SkapulaSimatrikligi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SkapulaSimatrikligi" id="SkapulaSimatrikligi" value="Var">
                            <label class="form-check-label" for="SkapulaSimatrikligi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>

                        </div>

                    </div>
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Omurga deformitesi :</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="OmurgaDeform" id="OmurgaDeform" value="Yok">
                            <label class="form-check-label" for="OmurgaDeform">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="OmurgaDeform" id="OmurgaDeform" value="Var">
                            <label class="form-check-label" for="OmurgaDeform">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Kifoz" value="Kifoz">
                                                <label class="form-check-label" for="Kifoz">Kifoz </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Lordoz" value="Lordoz">
                                                <label class="form-check-label" for="Lordoz">Lordoz </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Skolyoz" value="Skolyoz">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusHareketleri" id="GogusHareketleri" value="Yok">
                            <label class="form-check-label" for="GogusHareketleri">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusHareketleri" id="GogusHareketleri" value="Var">
                            <label class="form-check-label" for="GogusHareketleri">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>

                        </div>

                    </div>
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Göğüs kafesinde :</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusKafesinde" id="GogusKafesinde" value="Yok">
                            <label class="form-check-label" for="GogusKafesinde">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusKafesinde" id="GogusKafesinde" value="Var">
                            <label class="form-check-label" for="GogusKafesinde">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KrepitasyonAlani" value="Krepitasyon / Alanı">
                                                <label class="form-check-label" for="KrepitasyonAlani">Krepitasyon / Alanı
                                                    <input type="text" class="form-control" required name="Krepitasyon_Alani" id="Krepitasyon_Alani" placeholder="">
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Hassasiyet" value="Hassasiyet">
                                                <label class="form-check-label" for="Hassasiyet">Hassasiyet
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KitleOzelligi" value="Kitle Ozelligi">
                                                <label class="form-check-label" for="KitleOzelligi">Kitle/Özelliği
                                                    <input type="text" class="form-control" required name="Kitle_Ozelligi" id="Kitle_Ozelligi" placeholder="">
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="KitleDiger" value="Diger">
                                                <label class="form-check-label" for="KitleDiger">Diğer
                                                    <input type="text" class="form-control" required name="Kitle_Diger" id="Kitle_Diger" placeholder="">
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
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusDeformitesi" id="GogusDeformitesi" value="Yok">
                            <label class="form-check-label" for="GogusDeformitesi">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="GogusDeformitesi" id="GogusDeformitesi" value="Var">
                            <label class="form-check-label" for="GogusDeformitesi">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="FiciGogus" value="Fıçı Göğüs">
                                                <label class="form-check-label" for="FiciGogus">Fıçı Göğüs
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="GuvercinGogus" value="Güvercin Göğüs">
                                                <label class="form-check-label" for="GuvercinGogus">Güvercin Göğüs
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Kunduracı" value="Kunduracı">
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

            <p class="usernamelabel">Solunum sistemi uygulaması </p>

            <div class="checkbox-wrapper d-flex">
                <div class="checkboxes d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Triflow / Spirometre">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Triflow / Spirometre</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Nebulizasyon">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Nebulizasyon </span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Derin Nefes Alma ve Öksürme Egzersizi">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Derin Nefes Alma ve Öksürme Egzersizi</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Soğuk buhar uygulama">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Soğuk buhar uygulama </span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Postural drenaj">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Postural drenaj </span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="SolunumSistemiUygilamasi" id="SolunumSistemiUygilamasi" value="Diğer">
                        <label class="form-check-label" for="SolunumSistemiUygilamasi">
                            <span class="checkbox-header"> Diğer </span>

                        </label>
                        <input type="text" class="form-control" required name="SolunumUygulamasi_diger" id="SolunumUygulamasi_diger" placeholder="Diğer">
                    </div>
                </div>
            </div>


            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">

            </form>
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
                            <?php foreach ($values as &$value)
                                echo "
                                <tr>
                                   
                                    <td style='
                                    color: white;'>" . $value["name"] . "</td>
                                    <td style='
                                    color: white;'>" . $value["surname"] . "</td>
                                    <td style='
                                    color: white;'>" . $value["age"] . "</td>
                                    <td style='
                                    color: white;'> " . $value["notlar"] . " </td>
                                </tr>"

                            ?>


                        </tbody>
                    </table>
                </div>
            </div> -->
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
                    let yatisdurumuradio = $("input[type='radio'][name='yatisdurumuradio']:checked").val();
                    let SolunumSorunu = $("input[name='SolunumSorunu']:checked").val();
                    let Dispne = $("input[name='Dispne']").val();
                    let Hiperventilasyon = $("input[name='Hiperventilasyon']").val();
                    let Hipoventilasyon = $("input[name='Hipoventilasyon']").val();
                    let Takipne = $("input[name='Takipne']").val();
                    let Bradipne = $("input[name='Bradipne']").val();
                    let Siyanoz = $("input[name='Siyanoz']").val();
                    let Diger = $("input[name='Diger']").val();
                    let solunum_diger = $("input[name='solunum_diger']").val();
                    let SolunumYolu = $("input[name='SolunumYolu']:checked").val();
                    let Trakeostomi = $("input[name='Diger']").val();
                    let EndotrakealTüp = $("input[name='EndotrakealTüp']").val();
                    let Oksurme = $("input[name='Oksurme']:checked").val();
                    let Etkisiz = $("input[name='Etkisiz']").val();
                    let OksurmeDiğer = $("input[name='OksurmeDiğer']").val();
                    let oksurme_diger = $("input[name='oksurme_diger']").val();
                    let Balgam = $("input[name='Balgam']:checked").val();
                    let EtkisizBalgam = $("input[name='EtkisizBalgam']").val();
                    let NormalBalgam = $("input[name='NormalBalgam']").val();
                    let AşırıKıvamlı = $("input[name='AşırıKıvamlı']").val();
                    let BalgamDiğer = $("input[name='BalgamDiğer']").val();
                    let balgam_diger = $("input[name='balgam_diger']").val();
                    let AspirasyonIhtiyaci = $("input[name='AspirasyonIhtiyaci']:checked").val();
                    let Oro_Nazofarengeal = $("input[name='Oro_Nazofarengeal']").val();
                    let Trakeal = $("input[name='Trakeal']").val();
                    let BurunMuayenesi = $("input[name='BurunMuayenesi']:checked").val();
                    let NazalMukoza = $("input[name='NazalMukoza']").val();
                    let NazalSeptumda = $("input[name='NazalSeptumda']").val();
                    let NazalKanama = $("input[name='NazalKanama']").val();
                    let NazalLezyon = $("input[name='NazalLezyon']").val();
                    let NazalAkinti = $("input[name='NazalAkinti']").val();
                    let NazalDiger = $("input[name='NazalDiger']").val();
                    let nazal_diger = $("input[name='nazal_diger']").val();
                    let TiroidBezi = $("input[name='TiroidBezi']:checked").val();
                    let Sislik = $("input[name='Sislik']").val();
                    let TiroidDiger = $("input[name='TiroidDiger']").val();
                    let Trakea = $("input[name='Trakea']:checked").val();
                    let SagaKayma = $("input[name='SagaKayma']").val();
                    let SolaKayma = $("input[name='SolaKayma']").val();
                    let LenfNodlari = $("input[name='LenfNodlari']:checked").val();
                    let Yeri = $("input[name='Yeri']").val();
                    let NodYeri = $("input[name='NodYeri']").val();
                    let NodDiğer = $("input[name='NodDiğer']").val();
                    let SkapulaSimatrikligi = $("input[name='SkapulaSimatrikligi']:checked").val();
                    let OmurgaDeform = $("input[name='OmurgaDeform']:checked").val();
                    let Kifoz = $("input[name='Kifoz']").val();
                    let Lordoz = $("input[name='Lordoz']").val();
                    let Skolyoz = $("input[name='Skolyoz']").val();
                    let GogusHareketleri = $("input[name='GogusHareketleri']:checked").val();
                    let GogusKafesinde = $("input[name='GogusKafesinde']:checked").val();
                    let KrepitasyonAlani = $("input[name='KrepitasyonAlani']").val();
                    let Krepitasyon_Alani = $("input[name='Krepitasyon_Alani']").val();
                    let Hassasiyet = $("input[name='Hassasiyet']").val();
                    let Kitle_Ozelligi = $("input[name='Kitle_Ozelligi']").val();
                    let KitleDiger = $("input[name='KitleDiger']").val();
                    let Kitle_Diger = $("input[name='Kitle_Diger']").val();
                    let GogusDeformitesi = $("input[name='GogusDeformitesi']:checked").val();
                    let FiciGogus = $("input[name='FiciGogus']").val();
                    let GuvercinGogus = $("input[name='GuvercinGogus']").val();
                    let Kunduracı = $("input[name='Kunduracı']").val();
                    let SolunumSistemiUygilamasi = $("input[name='SolunumSistemiUygilamasi']").val();
                    let SolunumUygulamasi_diger = $("input[name='SolunumUygulamasi_diger']").val();
                   
                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: 'http://18.159.134.238/KDSE-BPYS/SubmitOrUpdateForm1_SolunumGereksinimi.php/',
                        data: {
                            yatisdurumuradio:yatisdurumuradio,
                            SolunumSorunu:SolunumSorunu,
                            Dispne:Dispne,
                            Hiperventilasyon:Hiperventilasyon,
                            Hipoventilasyon:Hipoventilasyon,
                            Takipne:Takipne,
                            Bradipne:Bradipne,
                            Siyanoz:Siyanoz,
                            Diğer:Diğer,
                            solunum_diger:solunum_diger,
                            SolunumYolu:SolunumYolu,
                            Trakeostomi:Trakeostomi,
                            EndotrakealTüp:EndotrakealTüp,
                            Oksurme:Oksurme,
                            Etkisiz:Etkisiz,
                            OksurmeDiğer:OksurmeDiğer,
                            oksurme_diger:oksurme_diger,
                            Balgam:Balgam,
                            EtkisizBalgam:EtkisizBalgam,
                            NormalBalgam:NormalBalgam,
                            AşırıKıvamlı:AşırıKıvamlı,
                            BalgamDiğer:BalgamDiğer,
                            balgam_diger:balgam_diger,
                            AspirasyonIhtiyaci:AspirasyonIhtiyaci,
                            Oro_Nazofarengeal:Oro_Nazofarengeal,
                            Trakeal:Trakeal,
                            BurunMuayenesi:BurunMuayenesi,
                            NazalMukoza:NazalMukoza,
                            NazalSeptumda:NazalSeptumda,
                            NazalKanama:NazalKanama,
                            NazalLezyon:NazalLezyon,
                            NazalAkinti:NazalAkinti,
                            NazalDiger:NazalDiger,
                            nazal_diger:nazal_diger,
                            TiroidBezi:TiroidBezi,
                            Sislik:Sislik,
                            TiroidDiger:TiroidDiger,
                            Trakea:Trakea,
                            SagaKayma:SagaKayma,
                            SolaKayma:SolaKayma,
                            LenfNodlari:LenfNodlari,
                            Yeri:Yeri,
                            NodYeri:NodYeri,
                            NodDiger:NodDiger,
                            SkapulaSimatrikligi:SkapulaSimatrikligi,
                            OmurgaDeform:OmurgaDeform,
                            Kifoz:Kifoz,
                            Lordoz:Lordoz,
                            Skolyoz:Skolyoz,
                            GogusHareketleri:GogusHareketleri,
                            GogusKafesinde:GogusKafesinde,
                            KrepitasyonAlani:KrepitasyonAlani,
                            Krepitasyon_Alani:Krepitasyon_Alani,
                            Hassasiyet:Hassasiyet,
                            Kitle_Ozelligi:Kitle_Ozelligi,
                            KitleDiger:KitleDiger,
                            Kitle_Diger:Kitle_Diger,
                            GogusDeformitesi:GogusDeformitesi,
                            FiciGogus:FiciGogus,
                            GuvercinGogus:GuvercinGogus,
                            Kunduracı:Kunduracı,
                            SolunumSistemiUygilamasi:SolunumSistemiUygilamasi,
                            SolunumUygulamasi_diger:SolunumUygulamasi_diger,
                        },
                        success: function(data) {
                            alert(data);
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
