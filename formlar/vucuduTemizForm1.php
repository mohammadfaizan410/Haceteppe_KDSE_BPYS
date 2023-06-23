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
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">VÜCUDU TEMİZ VE BAKIMLI TUTMA</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">En Son Banyo Yaptığı Tarih :</p>
                <input type="date" class="form-control" name="bathDate" id="bathDate">
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Vücut temizliğini yapmada </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="VucutTemizligi" value="Bağımsız">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="VucutTemizligi" value="Yarı bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bodyCleansingDependence" id="VucutTemizligi" value="Bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Banyo Sıklığı: :</p>
                <input type="text" class="form-control" name="bathingFrequency" id="BanyoSikligi">
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Şekli:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bathingMethod" id="BanyoSekli" value="Duş/Ayakta">
                            <label class="form-check-label" for="BanyoSekli">
                                <span class="checkbox-header">Duş/Ayakta </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bathingMethod" id="BanyoSekli" value="Küvet/Oturarak">
                            <label class="form-check-label" for="BanyoSekli">
                                <span class="checkbox-header">Küvet/Oturarak </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="input-section d-flex">

                <p class="usernamelabel">Banyo Suyunun Sıcaklığı </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="SuSicakligi" value="Soğuk">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Soğuk </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="SuSicakligi" value="Ilık">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Ilık </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waterTemperature" id="SuSicakligi" value="Çok Sıcak">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Çok Sıcak </span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Temizlik Ürünü </p>
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
                                <input type="text" class="form-control diger" name="cleaningProductDiger" disabled id="TemizlikUrunuDiger">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Saç Temizlik Ürünü </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="TemizlikUrunu" value="Sabun">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="STemizlikUrunu" value="Şampuan">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Şampuan</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hairCleaningProduct" id="STemizlikUrunu" value="Diğer">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" name="hairCleaningProductDiger" disabled id="STemizlikUrunuDiger">

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">Banyo Sonrası </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="BanyoSonrasi" value="Losyon">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Losyon </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="BanyoSonrasi" value="Krem">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Krem </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="BanyoSonrasi" value="Deodarant/Parfüm">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Deodarant/Parfüm </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="BanyoSonrasi" value="Roll-on ">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Roll-on </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="afterBathProduct" id="BanyoSonrasi" value="Diğer">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" name="afterBathProductDiger" id="BanyoSonrasiDiger">

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
                <input type="text" class="form-control w-25" name="mouthCareFreq" id="AgizBakimSikligi">
                <input type="text" class="form-control w-25" name="mouthCareMethod" id="AgizBakimSekli">
                <input type="text" class="form-control w-25" name="mouthCareMaterial" id="AgizBakimMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Tırnak bakımı </p>
                <input type="text" class="form-control w-25" name="nailCareFreq" id="TirnakBakimSikligi">
                <input type="text" class="form-control w-25" name="nailCareMethod" id="TirnakBakimSekli">
                <input type="text" class="form-control w-25" name="nailCareMaterial" id="TirnakBakimMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">El yıkama alışkanlığı </p>
                <input type="text" class="form-control w-25" name="handWashingFreq" id="ElYikamaSikligi">
                <input type="text" class="form-control w-25" name="handWashingMethod" id="ElYikamaSekli">
                <input type="text" class="form-control w-25" name="handWashingMaterial" id="ElYikamaMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Perine bakımı </p>
                <input type="text" class="form-control w-25" name="periniumCareFreq" id="PerineBakimSikligi">
                <input type="text" class="form-control w-25" name="periniumCareMethod" id="PerineBakimSekli">
                <input type="text" class="form-control w-25" name="periniumCareMaterial" id="PerineBakimMalzeme">
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Menstrual Hijyen
                </p>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Son adet tarihi </span>
                    </label>
                    <input type="text" class="form-control" name="menstrualHygiene" id="MenstrualHijyen">
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Süresi </span>
                    </label>
                    <input type="text" class="form-control" name="mensturalTime" id="MHSüresi">
                </div>
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Menstruasyonda kullandığı Ürün:</p>
                <div class="checkbox-wrapper d-flex align-items-center">
                    <div class="checkboxes">
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="mensturalProduct" id="MKUrun" value="Hazır ped">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Hazır ped</span>
                            </label>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="mensturalProduct" id="MKUrun" value="Bez">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Bez </span>

                            </label>
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="mensturalProduct" id="MKUrun" value="Diğer">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Diğer: </span>
                                <input type="text" class="form-control" name="mensturalProductDiger" disabled id="MHSüresi">
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
                            <input type="text" class="form-control diger" name="padReplacementFreq" id="HPDegistirmeSikligi">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger"  name="bezReplacementFreq" id="BezDegistirmeSikligi">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio" >
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger" name="digerReplacementFreq" id="DigerDegistirmeSikligi">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinColorProblem" id="DeriRenkDegisimi" value="Yok">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinColorProblem" id="DeriRenkDegisimi" value="Var">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="Sari" value="Sari">
                                                        <label class="form-check-label" for="Sari">Sarı.
                                                            Yeri… </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="Soluk1" value="Soluk">
                                                        <label class="form-check-label" for="Soluk1">Soluk
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="Kızarıklık" value="Kızarıklık">
                                                        <label class="form-check-label" for="Kızarıklık">Kızarıklık.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="Siyanoz" value="Siyanoz">
                                                        <label class="form-check-label" for="Siyanoz">Siyanoz.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="RenkKaybı" value="Renk kaybı">
                                                        <label class="form-check-label" for="RenkKaybı">Renk
                                                            kaybı</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" disabled name="skinColorProblemDesc" id="PigmentasyonArtışı" value="Pigmentasyon artışı">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinMoisture" id="Nemlilik" value="Sorun yok">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinMoisture" id="Nemlilik" value="Var">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled name="skinMoistureInput" id="DigerDegistirmeSikligi">
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Isı değişimi </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinHeat" id="IsiDegisimi" value="Sorun yok">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinHeat" id="IsiDegisimi" value="Var">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled name="skinHeatInput">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Derinin yapısı </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Normal">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Normal </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Pürüzlü">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Pürüzlü</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Sert">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Sert</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Esnek">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Esnek</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Buruşuk">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Buruşuk</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="İnce">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">İnce</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Düz">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Düz</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="skinStructure" id="DerininYapisi" value="Kalın">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinAge" id="DeriTurgoru" value="Normal">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Normal</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinAge" id="DeriTurgoru" value="Zayıf">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Zayıf</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Deride Sorun </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinProblem" id="DerideSorun" value="Sorun Yok">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Sorun Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="skinProblem" id="DerideSorun" value="Var">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="skinProblemDesc" id="Makül" value="Makül">
                                                        <label class="form-check-label" for="Makül">Makül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="skinProblemDesc" id="Papül" value="Papül">
                                                        <label class="form-check-label" for="Papül">Papül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="skinProblemDesc" id="Vezikül" value="Vezikül">
                                                        <label class="form-check-label" for="Vezikül">Vezikül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="skinProblemDesc" id="Peteşi" value="Peteşi">
                                                        <label class="form-check-label" for="Peteşi">Peteşi</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="skinProblemDesc" id="Purpura" value="Purpura">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bodyHairStructure" id="SacKil" value="Sorun Yok">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bodyHairStructure" id="SacKil" value="Var">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="Yağlı" value="Yağlı">
                                                        <label class="form-check-label" for="Yağlı">Yağlı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="Kuru" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="Sert" value="Sert">
                                                        <label class="form-check-label" for="Sert">Sert
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="bodyHairStructureDesc" id="Yumuşak" value="Yumuşak">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hairDistributionProblem" id="Dağılımı" value="Sorun Yok">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hairDistributionProblem" id="Dağılımı" value="Var">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="Alopesia" value="Alopesia">
                                                        <label class="form-check-label" for="Alopesia">Alopesia</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="Seyrek" value="Seyrek">
                                                        <label class="form-check-label" for="Seyrek">Seyrek
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="hairDistributionProblemDesc" id="Tüylenmede" value="Tüylenmede">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scalpHairProblem" id="SacDeri" value="Sorun Yok">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="scalpHairProblem" id="SacDeri" value="Var">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled name="scalpHairProblemDesc" type="checkbox" id="Kuruma" value="Kuruma">
                                                        <label class="form-check-label" for="Kuruma"> Kuruma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="Yağlanma" value="Yağlanma">
                                                        <label class="form-check-label" for="Yağlanma">Yağlanma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="Kepeklenme" value="Kepeklenme">
                                                        <label class="form-check-label" for="Kepeklenme">Kepeklenme</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="Parazit" value="Parazit">
                                                        <label class="form-check-label" for="Parazit">Parazit</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="scalpHairProblemDesc" id="Kitle" value="Kitle">
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
                        <p class="usernamelabel ">Rengi </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailColorProblem" id="TirnakRengi" value="Sorun Yok">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailColorProblem" id="TirnakRengi" value="Var">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="Siyanotik" value="Siyanotik">
                                                        <label class="form-check-label" for="Siyanotik"> Siyanotik
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="Soluk" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk
                                                            beyaz</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailColorProblemDesc" id="Sarı" value="Sarı">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailStructureProblem" id="sekli" value="Sorun Yok">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nailStructureProblem" id="sekli" value="Var">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="Çomaklaşma" value="Çomaklaşma">
                                                        <label class="form-check-label" for="Çomaklaşma">
                                                            Çomaklaşma </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" id="BeyazLekeler" name="nailStructureProblemDesc" value="Beyaz Lekeler">
                                                        <label class="form-check-label" for="BeyazLekeler">Beyaz
                                                            lekeler</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="Paronişya" value="Paronişya">
                                                        <label class="form-check-label" for="Paronişya">Paronişya
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" disabled type="checkbox" name="nailStructureProblemDesc" id="Diğer" value="Diğer">
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
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capillaryFillingProblem" id="KapillerDolum" value="Sorun Yok">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Sorun Yok</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="capillaryFillingProblem" id="KapillerDolum" value="Var">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger" disabled name="capillaryFillingInput">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex text-center">
                <input class="form-control submit m-auto " type='submit' name="submit" id="submit" value="Kayıt">
            </div>
        </form>
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
    })
                });
                $("#submit").click(function (e) {
                    e.preventDefault(); 
                    console.log("clicked")
                    
                });
                // $('input[name="sleepProblem"]').change(function() {
                //     if (this.checked.value == "Sorun Var") {
                //         $('input[name="sleepProblemDesc"]').prop('disabled', false);
                //     } else {
                //         $('input[name="sleepProblemDesc"]').prop('disabled', true);
                //     }
                //     });
                
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

                $('.form-check-input[name="skinHeat"]').change(function(){
                    console.log($(this).val())
                    if($(this).val() === "Var"){
                        $('input[name="skinHeatInput"]').prop('disabled', false);
                    }else{
                        $('input[name="skinHeatInput"]').prop('disabled', true);
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






            </script>

            <script>
               $(function() {

                    $('#submit').click(function(e) {
                        e.preventDefault();
                        console.log("clicked")
                            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_name = "vucudutemizform1";
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
            let bathDate = $("input[name='bathDate']").val();
            let bodyCleansingDependence = $("input[name='bodyCleansingDependence']:checked").val();
            let bathingFrequency = $("input[name='bathingFrequency']").val(); 
            let bathingMethod = $("input[name='bathingMethod']:checked").val();
            let waterTemperature = $("input[name='waterTemperature']:checked").val();
            let cleaningProduct = $("input[name='cleaningProduct']:checked").val() === "Diğer" ? $("input[name='cleaningProductDiger']").val() : $("input[name='cleaningProduct']:checked").val();
            let hairCleaningProduct = $("input[name='hairCleaningProduct']:checked").val() === "Diğer" ? $("input[name='hairCleaningProductDiger']").val() : $("input[name='hairCleaningProduct']:checked").val();
            let afterBathProduct = $("input[name='afterBathProduct']:checked").val() === "Diğer" ? $("input[name='afterBathProductDiger']").val() : $("input[name='afterBathProduct']:checked").val();
            let mouthCareFreq = $("input[name='mouthCareFreq']:checked").val();
            let mouthCareMethod = $("input[name='mouthCareMethod']:checked").val();
            let mouthCareMaterial =  $("input[name='mouthCareMaterial']:checked").val();
            let nailCareFreq = $("input[name='nailCareFreq']:checked").val();
            let nailCareMethod = $("input[name='nailCareMethod']:checked").val();
            let nailCareMaterial = $("input[name='nailCareMaterial']:checked").val();
            let handWashingFreq = $("input[name='handWashingFreq']:checked").val();
            let handWashingMethod = $("input[name='handWashingMethod']:checked").val();
            let handWashingMaterial = $("input[name='handWashingMaterial']:checked").val();
            let periniumCareMethod = $("input[name='periniumCareMethod']:checked").val();
            let periniumCareMaterial = $("input[name='periniumCareMaterial']:checked").val();
            let periniumCareFreq = $("input[name='periniumCareFreq']:checked").val();
            let menstrualHygiene = $("input[name='menstrualHygiene']").val();
            let mensturalTime = $("input[name='mensturalTime']").val();
            let mensturalProduct = $("input[name='mensturalProduct']:checked").val() === "Diğer" ? $("input[name='mensturalProductDiger']").val() : $("input[name='mensturalProduct']:checked").val();
            let mensturalProductReplacement = "";
            if(mensturalProduct === "Hazır ped"){
                mensturalProductReplacement = $("input[name='padReplacementFreq']").val(); 
            }
            if(mensturalProduct === "Bez"){
                mensturalProductReplacement = $("input[name='bezReplacementFreq']").val(); 
            }
            if(mensturalProduct === "Diğer"){
                mensturalProductReplacement = $("input[name='digerReplacementFreq']").val(); 
            }
            let skinColorProblem = $("input[name='skinColorProblem']:checked").val() === "Var" ? $("input[name='skinColorProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='skinColorProblem']:checked").val();
            let skinMoisture = $("input[name='skinMoisture']:checked").val() === "Var" ? $("input[name='skinMoistureInput']").val() : "Sorun Yok";
            let skinTemperature = $("input[name='skinTemperature']:checked").val() === "Var" ? $("input[name='skinTemperatureInput']").val() : "Sorun Yok";
            let skinStructure = $("input[name='skinStructure']:checked").map(function(){return $(this).val();}).get().join("/");
            let skinAge = $("input[name='skinStructure']:checked").val();
            let skinProblem = $("input[name='skinProblem']:checked").val() === "Var" ? $("input[name='skinProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='skinProblem']:checked").val();
            let bodyHairStructure = $("input[name='bodyHairStructure']:checked").val() === "Var" ? $("input[name='bodyHairStructureDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='bodyHairStructure']:checked").val();
            let hairDistributionProblem = $("input[name='hairDistributionProblem']:checked").val() === "Var" ? $("input[name='hairDistributionProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='hairDistributionProblem']:checked").val();
            let scalpHairProblem = $("input[name='scalpHairProblem']:checked").val() === "Var" ? $("input[name='scalpHairProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='scalpHairProblem']:checked").val();
            let nailColorProblem = $("input[name='nailColorProblem']:checked").val() === "Var" ? $("input[name='nailColorProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='nailColorProblem']:checked").val();
            let nailStructureProblem = $("input[name='nailStructureProblem']:checked").val() === "Var" ? $("input[name='nailStructureProblemDesc']:checked").map(function(){return $(this).val();}).get().join("/") : $("input[name='nailStructureProblem']:checked").val();
            let capillaryFillingProblem = $("input[name='capillaryFillingProblem']:checked").val() === "Var" ? $("input[name='capillaryFillingInput']").val() : $("input[name='capillaryFillingProblem']:checked").val();
            console.log("all values initiation successfull");

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Vucut.php',
                                data: {
                                    name : name,
                                    surname : surname,
                                    age : age,
                                    not : not,
                                    form_name : form_name,
                                    patient_name : patient_name,
                                    patient_id : patient_id,
                                    creationDate : creationDate,
                                    updateDate : updateDate,
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
                                    menstrualHygiene: menstrualHygiene,
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
                                    alert(data);
                                    console.log(data)
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