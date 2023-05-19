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
            <h1 class="form-header">VÜCUDU TEMİZ VE BAKIMLI TUTMA</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">En Son Banyo Yaptığı Tarih :</p>
                <input type="date" class="form-control" name="BanyoTarihi" id="BanyoTarihi">
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Vücut temizliğini yapmada </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="VucutTemizligi" id="VucutTemizligi" value="Bağımsız">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="VucutTemizligi" id="VucutTemizligi" value="Yarı bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="VucutTemizligi" id="VucutTemizligi" value="Bağımlı">
                            <label class="form-check-label" for="VucutTemizligi">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Banyo Sıklığı: :</p>
                <input type="text" class="form-control" name="BanyoSikligi" id="BanyoSikligi">
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Şekli:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSekli" id="BanyoSekli" value="Duş/Ayakta">
                            <label class="form-check-label" for="BanyoSekli">
                                <span class="checkbox-header">Duş/Ayakta </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSekli" id="BanyoSekli" value="Küvet/Oturarak">
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
                            <input class="form-check-input" type="radio" name="SuSicakligi" id="SuSicakligi" value="Soğuk">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Soğuk </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SuSicakligi" id="SuSicakligi" value="Ilık">
                            <label class="form-check-label" for="SuSicakligi">
                                <span class="checkbox-header">Ilık </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="SuSicakligi" id="SuSicakligi" value="Çok Sıcak">
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
                            <input class="form-check-input" type="radio" name="TemizlikUrunu" id="TemizlikUrunu" value="Sabun">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header"> Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TemizlikUrunu" id="TemizlikUrunu" value="Duş Jeli">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header">Duş Jeli </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="TemizlikUrunu" id="TemizlikUrunu" value="Diğer:">
                            <label class="form-check-label" for="TemizlikUrunu">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" name="TemizlikUrunuDiger" id="TemizlikUrunuDiger">

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
                            <input class="form-check-input" type="radio" name="STemizlikUrunu" id="STemizlikUrunu" value="Sabun">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="STemizlikUrunu" id="STemizlikUrunu" value="Şampuan">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Şampuan</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="STemizlikUrunu" id="STemizlikUrunu" value="Diğer">
                            <label class="form-check-label" for="STemizlikUrunu">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" name="STemizlikUrunuDiger" id="STemizlikUrunuDiger">

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
                            <input class="form-check-input" type="radio" name="BanyoSonrasi" id="BanyoSonrasi" value="Losyon">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Losyon </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSonrasi" id="BanyoSonrasi" value="Krem">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Krem </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSonrasi" id="BanyoSonrasi" value="Deodarant/Parfüm">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Deodarant/Parfüm </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSonrasi" id="BanyoSonrasi" value="Roll-on ">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Roll-on </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BanyoSonrasi" id="BanyoSonrasi" value="Diğer">
                            <label class="form-check-label" for="BanyoSonrasi">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger" name="BanyoSonrasiDiger" id="BanyoSonrasiDiger">

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
                <input type="text" class="form-control w-25" name="AgizBakimSikligi" id="AgizBakimSikligi">
                <input type="text" class="form-control w-25" name="AgizBakimSekli" id="AgizBakimSekli">
                <input type="text" class="form-control w-25" name="AgizBakimMalzeme" id="AgizBakimMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Tırnak bakımı </p>
                <input type="text" class="form-control w-25" name="TirnakBakimSikligi" id="TirnakBakimSikligi">
                <input type="text" class="form-control w-25" name="TirnakBakimSekli" id="TirnakBakimSekli">
                <input type="text" class="form-control w-25" name="TirnakBakimMalzeme" id="TirnakBakimMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">El yıkama alışkanlığı </p>
                <input type="text" class="form-control w-25" name="ElYikamaSikligi" id="ElYikamaSikligi">
                <input type="text" class="form-control w-25" name="ElYikamaSekli" id="ElYikamaSekli">
                <input type="text" class="form-control w-25" name="ElYikamaMalzeme" id="ElYikamaMalzeme">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Perine bakımı </p>
                <input type="text" class="form-control w-25" name="PerineBakimSikligi" id="PerineBakimSikligi">
                <input type="text" class="form-control w-25" name="PerineBakimSekli" id="PerineBakimSekli">
                <input type="text" class="form-control w-25" name="PerineBakimMalzeme" id="PerineBakimMalzeme">
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Menstrual Hijyen
                </p>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Son adet tarihi </span>
                    </label>
                    <input type="text" class="form-control" name="MenstrualHijyen" id="MenstrualHijyen">
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Süresi </span>
                    </label>
                    <input type="text" class="form-control" name="MHSüresi" id="MHSüresi">
                </div>
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Menstruasyonda kullandığı Ürün:</p>
                <div class="checkbox-wrapper d-flex align-items-center">
                    <div class="checkboxes">
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="MKUrun" id="MKUrun" value="option1">
                            <label class="form-check-label" for="MKUrun">Hazır ped
                                <span class="checkbox-header">Hazır ped </span>
                            </label>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="MKUrun" id="MKUrun" value="Bez">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Bez </span>

                            </label>
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="MKUrun" id="MKUrun" value="Diğer">
                            <label class="form-check-label" for="MKUrun">
                                <span class="checkbox-header">Diğer: </span>

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
                            <input type="text" class="form-control diger" name="HPDegistirmeSikligi" id="HPDegistirmeSikligi">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio" name="BezDegistirmeSikligi" id="BezDegistirmeSikligi">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio" name="DigerDegistirmeSikligi" id="DigerDegistirmeSikligi">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Derinin Değerlendirilmesi </p>
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Renk Değişimi </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DeriRenkDegisimi" id="DeriRenkDegisimi" value="Yok">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DeriRenkDegisimi" id="DeriRenkDegisimi" value="Var">
                                    <label class="form-check-label" for="DeriRenkDegisimi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Sari" value="Sari">
                                                        <label class="form-check-label" for="Sari">Sarı.
                                                            Yeri… </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Soluk1" value="Soluk">
                                                        <label class="form-check-label" for="Soluk1">Soluk
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kızarıklık" value="Kızarıklık">
                                                        <label class="form-check-label" for="Kızarıklık">Kızarıklık. Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Siyanoz" value="Siyanoz">
                                                        <label class="form-check-label" for="Siyanoz">Siyanoz.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="RenkKaybı" value="Renk kaybı">
                                                        <label class="form-check-label" for="RenkKaybı">Renk
                                                            kaybı</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="PigmentasyonArtışı" value="Pigmentasyon artışı">
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
                                    <input class="form-check-input" type="radio" name="Nemlilik" id="Nemlilik" value="Sorun yok">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Nemlilik" id="Nemlilik" value="Var">
                                    <label class="form-check-label" for="Nemlilik">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
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
                                    <input class="form-check-input" type="radio" name="IsiDegisimi" id="IsiDegisimi" value="Sorun yok">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="IsiDegisimi" id="IsiDegisimi" value="Var">
                                    <label class="form-check-label" for="IsiDegisimi">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
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
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Normal">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Normal </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Pürüzlü">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Pürüzlü</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Sert">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Sert</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Esnek">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Esnek</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Buruşuk">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Buruşuk</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="İnce">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">İnce</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Düz">
                                        <label class="form-check-label" for="DerininYapisi">
                                            <span class="checkbox-header">Düz</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="DerininYapisi" id="DerininYapisi" value="Kalın">
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
                                    <input class="form-check-input" type="radio" name="DeriTurgoru" id="DeriTurgoru" value="Normal">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Normal </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DeriTurgoru" id="DeriTurgoru" value="Zayıf">
                                    <label class="form-check-label" for="DeriTurgoru">
                                        <span class="checkbox-header">Zayıf </span>
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
                                    <input class="form-check-input" type="radio" name="DerideSorun" id="DerideSorun" value="Sorum Yok">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Sorum Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DerideSorun" id="DerideSorun" value="Var">
                                    <label class="form-check-label" for="DerideSorun">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Makül" value="Makül">
                                                        <label class="form-check-label" for="Makül">Makül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Papül" value="Papül">
                                                        <label class="form-check-label" for="Papül">Papül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Vezikül" value="Vezikül">
                                                        <label class="form-check-label" for="Vezikül">Vezikül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Peteşi" value="Peteşi">
                                                        <label class="form-check-label" for="Peteşi">Peteşi</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Purpura" value="Purpura">
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





            <div class="input-section d-flex">
                <p class="usernamelabel">Saç ve Vücut Kılları
                </p>
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Yapısı </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="SacKil" id="SacKil" value="Sorun Yok">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="SacKil" id="SacKil" value="Var">
                                    <label class="form-check-label" for="SacKil">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Yağlı" value="Yağlı">
                                                        <label class="form-check-label" for="Yağlı">Yağlı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kuru" value="Kuru">
                                                        <label class="form-check-label" for="Kuru">Kuru
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Sert" value="Sert">
                                                        <label class="form-check-label" for="Sert">Sert
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Yumuşak" value="Yumuşak">
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
                                    <input class="form-check-input" type="radio" name="Dağılımı" id="Dağılımı" value="Sorun Yok">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Dağılımı" id="Dağılımı" value="Var">
                                    <label class="form-check-label" for="Dağılımı">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Alopesia" value="Alopesia">
                                                        <label class="form-check-label" for="Alopesia">Alopesia</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Seyrek" value="Seyrek">
                                                        <label class="form-check-label" for="Seyrek">Seyrek
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Tüylenmede" value="Tüylenmede">
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
                                    <input class="form-check-input" type="radio" name="SacDeri" id="SacDeri" value="Sorun Yok">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="SacDeri" id="SacDeri" value="Var">
                                    <label class="form-check-label" for="SacDeri">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kuruma" value="Kuruma">
                                                        <label class="form-check-label" for="Kuruma"> Kuruma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Yağlanma" value="Yağlanma">
                                                        <label class="form-check-label" for="Yağlanma">Yağlanma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kepeklenme" value="Kepeklenme">
                                                        <label class="form-check-label" for="Kepeklenme">Kepeklenme</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Parazit" value="Parazit">
                                                        <label class="form-check-label" for="Parazit">Parazit</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Kitle" value="Kitle">
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
            <div class="input-section d-flex">
                <p class="usernamelabel">Tırnaklar
                </p>
                <div class="w-50">
                    <div class="input-section d-flex">
                        <p class="usernamelabel ">Rengi </p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TirnakRengi" id="TirnakRengi" value="Sorun Yok">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TirnakRengi" id="TirnakRengi" value="Var">
                                    <label class="form-check-label" for="TirnakRengi">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Siyanotik" value="Siyanotik">
                                                        <label class="form-check-label" for="Siyanotik"> Siyanotik
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Soluk" value="Soluk">
                                                        <label class="form-check-label" for="Soluk">Soluk
                                                            beyaz</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Sarı" value="Sarı">
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
                                    <input class="form-check-input" type="radio" name="sekli" id="sekli" value="Sorun Yok">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sekli" id="sekli" value="Var">
                                    <label class="form-check-label" for="sekli">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Çomaklaşma" value="Çomaklaşma">
                                                        <label class="form-check-label" for="Çomaklaşma">
                                                            Çomaklaşma </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="BeyazLekeler" value="Beyaz Lekeler">
                                                        <label class="form-check-label" for="BeyazLekeler">Beyaz
                                                            lekeler</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Paronişya" value="Paronişya">
                                                        <label class="form-check-label" for="Paronişya">Paronişya
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
                                    <input class="form-check-input" type="radio" name="KapillerDolum" id="KapillerDolum" value="Sorun Yok">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Sorun Yok</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KapillerDolum" id="KapillerDolum" value="Var">
                                    <label class="form-check-label" for="KapillerDolum">
                                        <span class="checkbox-header">Var. Açıklayınız </span>
                                        <input type="text" class="form-control diger">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            let VucutTemizligi = $("input[name='VucutTemizligi']:checked").val();
                            let BanyoSikligi = $("input[name='BanyoSikligi']").val();
                            let BanyoSekli = parseInt($("input[name='BanyoSekli']:checked").val());
                            let SuSicakligi = $("input[type='radio'][name='SuSicakligi']:checked").val();
                            let TemizlikUrunu = $("input[name='TemizlikUrunu']:checked").val();
                            let TemizlikUrunuDiger = $("input[name='TemizlikUrunuDiger']").val();
                            let STemizlikUrunu = $("input[name='STemizlikUrunu']:checked").val();
                            let BanyoSonrasi = $("input[name='BanyoSonrasi']:checked").val();
                            let AgizBakimSikligi = $("input[name='AgizBakimSikligi']").val();
                            let AgizBakimSekli = $("input[name='AgizBakimSekli']").val();
                            let AgizBakimMalzeme = $("input[name='AgizBakimMalzeme']").val();
                            let TirnakBakimSikligi = $("input[name='TirnakBakimSikligi']").val();
                            let TirnakBakimSekli = $("input[type='radio'][name='TirnakBakimSekli']").val();
                            let TirnakBakimMalzeme = $("input[name='TirnakBakimMalzeme']").val();
                            let ElYikamaSikligi = $("input[name='ElYikamaSikligi']").val();
                            let ElYikamaSekli = $("input[type='radio'][name='ElYikamaSekli']").val();
                            let ElYikamaMalzeme = $("input[name='ElYikamaMalzeme']").val();
                            let PerineBakimSikligi = $("input[type='radio'][name='PerineBakimSikligi']").val();
                            let PerineBakimSekli = $("input[name='PerineBakimSekli']").val();
                            let PerineBakimMalzeme = $("input[type='radio'][name='PerineBakimMalzeme']").val();
                            let MenstrualHijyen = $("input[name='MenstrualHijyen']").val();
                            let MHSüresi = $("input[type='radio'][name='MHSüresi']").val();
                            let MKUrun = $("input[name='MKUrun']:checked").val();
                            let HPDegistirmeSikligi = $("input[name='HPDegistirmeSikligi']").val();
                            let BezDegistirmeSikligi = $("input[name='BezDegistirmeSikligi']").val();
                            let DigerDegistirmeSikligi = $("input[name='DigerDegistirmeSikligi']").val();
                            let DeriRenkDegisimi = $("input[name='DeriRenkDegisimi']:checked").val();
                            let Sari = $("input[name='Sari']").val();
                            let Soluk1 = $("input[name='Soluk1']").val();
                            let Kızarıklık = $("input[name='Kızarıklık']").val();
                            let Siyanoz = $("input[name='Siyanoz']").val();
                            let RenkKaybı = $("input[name='RenkKaybı']").val();
                            let PigmentasyonArtışı = $("input[name='PigmentasyonArtışı']").val();
                            let Nemlilik = $("input[name='Nemlilik']:checked").val();
                            let IsiDegisimi = $("input[name='IsiDegisimi']:checked").val();
                            let DerininYapisi = $("input[name='DerininYapisi']:checked").val();
                            let DeriTurgoru = $("input[name='DeriTurgoru']:checked").val();
                            let DerideSorun = $("input[name='DerideSorun']:checked").val();
                            let Makül = $("input[name='Makül']:checked").val();
                            let Papül = $("input[name='Papül']").val();
                            let Vezikül = $("input[name='Vezikül']").val();
                            let Peteşi = $("input[name='Peteşi']").val();
                            let Purpura = $("input[name='Purpura']").val();
                            let SacKil = $("input[name='SacKil']:checked").val();
                            let Yağlı = $("input[name='Yağlı']").val();
                            let Kuru = $("input[name='Kuru']").val();
                            let Sert = $("input[name='Sert']").val();
                            let Yumuşak = $("input[name='Yumuşak']").val();
                            let Dağılımı = $("input[name='Dağılımı']:checked").val();
                            let Alopesia = $("input[name='Alopesia']").val();
                            let Seyrek = $("input[name='Seyrek']").val();
                            let Tüylenmede = $("input[name='Tüylenmede']").val();
                            let SacDeri = $("input[name='SacDeri']:checked").val();
                            let Kuruma = $("input[name='Kuruma']").val();
                            let Yağlanma = $("input[name='Yağlanma']").val();
                            let Kepeklenme = $("input[name='Kepeklenme']").val();
                            let Parazit = $("input[name='Parazit']").val();
                            let Kitle = $("input[name='Kitle']").val();
                            let TirnakRengi = $("input[name='TirnakRengi']:checked").val();
                            let Siyanotik = $("input[name='Siyanotik']").val();
                            let Soluk = $("input[name='Soluk']").val();
                            let Sarı = $("input[name='Sarı']").val();
                            let sekli = $("input[name='sekli']:checked").val();
                            let Çomaklaşma = $("input[name='Çomaklaşma']").val();
                            let BeyazLekeler = $("input[name='BeyazLekeler']").val();
                            let Paronişya = $("input[name='Paronişya']").val();
                            let Diğer = $("input[name='Diğer']").val();
                            let KapillerDolum = $("input[name='KapillerDolum']:checked").val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/student-patient.php',
                                data: {
                                    VucutTemizligi: VucutTemizligi,
                                    BanyoSikligi: BanyoSikligi,
                                    BanyoSekli: BanyoSekli,
                                    SuSicakligi: SuSicakligi,
                                    TemizlikUrunu: TemizlikUrunu,
                                    TemizlikUrunuDiger: TemizlikUrunuDiger,
                                    STemizlikUrunu: STemizlikUrunu,
                                    BanyoSonrasi: BanyoSonrasi,
                                    AgizBakimSikligi: AgizBakimSikligi,
                                    AgizBakimSekli: AgizBakimSekli,
                                    AgizBakimMalzeme: AgizBakimMalzeme,
                                    TirnakBakimSikligi: TirnakBakimSikligi,
                                    TirnakBakimSekli: TirnakBakimSekli,
                                    TirnakBakimMalzeme: TirnakBakimMalzeme,
                                    ElYikamaSikligi: ElYikamaSikligi,
                                    ElYikamaSekli: ElYikamaSekli,
                                    ElYikamaMalzeme: ElYikamaMalzeme,
                                    PerineBakimSikligi: PerineBakimSikligi,
                                    PerineBakimSekli: PerineBakimSekli,
                                    PerineBakimMalzeme: PerineBakimMalzeme,
                                    MenstrualHijyen: MenstrualHijyen,
                                    MHSüresi: MHSüresi,
                                    MKUrun: MKUrun,
                                    HPDegistirmeSikligi: HPDegistirmeSikligi,
                                    BezDegistirmeSikligi: BezDegistirmeSikligi,
                                    DigerDegistirmeSikligi: DigerDegistirmeSikligi,
                                    DeriRenkDegisimi: DeriRenkDegisimi,
                                    Sari: Sari,
                                    Soluk1: Soluk1,
                                    Kızarıklık: Kızarıklık,
                                    Siyanoz: Siyanoz,
                                    RenkKaybı: RenkKaybı,
                                    PigmentasyonArtışı: PigmentasyonArtışı,
                                    Nemlilik: Nemlilik,
                                    IsiDegisimi: IsiDegisimi,
                                    DerininYapisi: DerininYapisi,
                                    DeriTurgoru: DeriTurgoru,
                                    DerideSorun: DerideSorun,
                                    Makül: Makül,
                                    Papül: Papül,
                                    Vezikül: Vezikül,
                                    Peteşi: Peteşi,
                                    Purpura: Purpura,
                                    SacKil: SacKil,
                                    Yağlı: Yağlı,
                                    Kuru: Kuru,
                                    Sert: Sert,
                                    Yumuşak: Yumuşak,
                                    Dağılımı: Dağılımı,
                                    Alopesia: Alopesia,
                                    Seyrek: Seyrek,
                                    Tüylenmede: Tüylenmede,
                                    SacDeri: SacDeri,
                                    Kuruma: Kuruma,
                                    Yağlanma: Yağlanma,
                                    Kepeklenme: Kepeklenme,
                                    Parazit: Parazit,
                                    Kitle: Kitle,
                                    TirnakRengi: TirnakRengi,
                                    Siyanotik: Siyanotik,
                                    Soluk: Soluk,
                                    Sarı: Sarı,
                                    sekli: sekli,
                                    Çomaklaşma: Çomaklaşma,
                                    BeyazLekeler: BeyazLekeler,
                                    Paronişya: Paronişya,
                                    Diğer: Diğer,
                                    KapillerDolum: KapillerDolum,

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