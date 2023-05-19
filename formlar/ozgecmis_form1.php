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
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>

            <h1 class="form-header">HASTA DEĞERLENDİRME FORMU</h1>
            <div class=" patients-save">
                <form action="" method="" class="patients-save-fields">
                    <!--       <p class="usernamelabel">Hasta Adı Soyadı</p>
                    <input type="text" class="form-control" required name="name" id="name"
                        placeholder="Hasta Adı Soyadı Giriniz">

                    <p class="usernamelabel">Hasta Soyadı</p>
                    <input type="text" class="form-control" required name="surname" id="surname"
                        placeholder="Hasta Soyadı Giriniz">

                    <p class="usernamelabel">Hasta Yaşı</p>
                    <input type="text" class="form-control" required name="age" id="age"
                        placeholder="Hasta Yaşı Giriniz">

                    <p class="usernamelabel">Notlar</p>
                    <input type="text" class="form-control not" required name="not" id="not" placeholder="Not giriniz"> -->
                    <div class="input-section-wrapper">

                        <div class="input-section-item">

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Adı Soyadı:</p>
                                <input type="text" class="form-control" name="ad_soyad" id="ad_soyad" placeholder="Hasta Adı Soyadı Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Doğum Yeri:</p>
                                <input type="text" class="form-control" name="dogum_yeri" id="dogum_yeri" placeholder="Doğum Yeri Giriniz">
                            </div>

                            <!--<div class="input-section d-flex">
                                <p class="usernamelabel">Doğum Tarihi:</p>
                                <input type="date" class="form-control" name="doğumtarihi" id="doğumtarihi" placeholder="Hasta Adı Soyadı Giriniz">
                            </div>-->
                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Yaşı</p>
                                <input type="text" class="form-control" name="yas" id="yas" placeholder="Hasta Yaşı Giriniz">
                            </div>

                            <div class="input-section d-flex">

                                <p class="usernamelabel">Cinsiyeti:</p>
                                <div class="checkbox-wrapper d-flex">
                                    <div class="checkboxes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="Erkek">
                                            <label class="form-check-label" for="cinsiyet">
                                                <span class="checkbox-header"> Erkek </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="Kadın">
                                            <label class="form-check-label" for="cinsiyet">
                                                <span class="checkbox-header"> Kadın </span>

                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Medeni Durumu:</p>
                                <input type="text" class="form-control" required name="medeni_durum" id="medeni_durum" placeholder="Medeni Durumu Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Mesleği:</p>
                                <input type="text" class="form-control" required name="meslek" id="meslek" placeholder="Mesleği Durumu Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Eğitim Durumu:</p>
                                <input type="text" class="form-control" required name="egitim_durumu" id="egitim_durumu" placeholder="Eğitim Durumu Giriniz">
                            </div>

                        </div>

                        <div class="input-section-item">
                            <div class="input-section d-flex">
                                <p class="usernamelabel">Protokol/Dosya No:</p>
                                <input type="text" class="form-control" required name="protocol_file_no" id="protocol_file_no" placeholder="Protokol/Dosya No Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Yatış Tarihi:</p>
                                <input type="date" class="form-control" required name="yatis_tarihi" id="yatis_tarihi" placeholder="Protokol/Dosya No Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Bölüm:</p>
                                <input type="text" class="form-control" required name="bolum" id="bolum" placeholder="Bölüm Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Tıbbi Tanı:</p>
                                <input type="text" class="form-control" required name="tibbi_tani" id="tibbi_tani" placeholder="Tıbbi Tanıyı Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Doktor Adı Soyadı:</p>
                                <input type="text" class="form-control" required name="doktor_ad_soyad" id="doktor_ad_soyad" placeholder="Doktor Adı Soyadı Giriniz">
                            </div>



                            <div class="input-section d-flex">
                                <p class="usernamelabel">Çocuk Sayısı:</p>
                                <input type="text" class="form-control" required name="cocuk_sayisi" id="cocuk_sayisi" placeholder="Çocuk Sayısı Giriniz">
                            </div>

                            <div class="input-section d-flex">

                                <p class="usernamelabel">Sosyal Güvencesi:</p>
                                <div class="checkbox-wrapper d-flex">
                                    <div class="checkboxes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyal_guvencesi" id="sosyal_guvencesi" value="Resmi">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Resmi </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyal_guvencesi" id="sosyal_guvencesi" value="Ücretli">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Ücretli </span>

                                            </label>

                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyal_guvencesi" id="sosyal_guvencesi" value="Diğer">
                                            <label class="form-check-label" for="sosyal_guvencesi">
                                                <span class="checkbox-header"> Diğer </span>

                                            </label>
                                            <input type="text" class="form-control" required name="sosyal_guvence_diger" id="sosyal_guvence_diger" placeholder="Diğer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Dili:</p>
                        <input type="text" class="form-control" required name="dil" id="dil" placeholder="Dil Giriniz">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Tercüman Gereksinimi:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TercumanGereksinimi" id="TercumanGereksinimi" value="Yok">
                                    <label class="form-check-label" for="TercumanGereksinimi">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TercumanGereksinimi" id="TercumanGereksinimi" value="Var">
                                    <label class="form-check-label" for="TercumanGereksinimi">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="t_diger" id="t_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Kan Grubu</p>
                        <input type="text" class="form-control not" required name="kangrubu" id="kangrubu" placeholder="Kan Grubu giriniz">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Daha Önce Kan Transfüzyonu Yaplıma Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TransfuzyonYapilma" id="TransfuzyonYapilma" value="Yok">
                                    <label class="form-check-label" for="TransfuzyonYapilma">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TransfuzyonYapilma" id="TransfuzyonYapilma" value="Var">
                                    <label class="form-check-label" for="TransfuzyonYapilma">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Transfüzyon Sonrası Reaksiyon Gelişme Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TransfuzyonReaksiyonu" id="TransfuzyonReaksiyonu" value="Yok">
                                    <label class="form-check-label" for="TransfuzyonReaksiyonu">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="TransfuzyonReaksiyonu" id="TransfuzyonReaksiyonu" value="Var">
                                    <label class="form-check-label" for="TransfuzyonReaksiyonu">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="reaksiyon_diger" id="reaksiyon_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Bilgi Alınan Kişi:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="BilgiKisisi" id="BilgiKisisi" value="Kendisi">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Kendisi </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="BilgiKisisi" id="BilgiKisisi" value="Dosya">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Dosya </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="BilgiKisisi" id="BilgiKisisi" value="Diger">
                                    <label class="form-check-label" for="BilgiKisisi">
                                        <span class="checkbox-header"> Diğer </span>

                                    </label>
                                    <input type="text" class="form-control" required name="kisi_diger" id="kisi_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Kol Bandı Rengi:</p>
                        <input type="text" class="form-control" required name="kolbandi" id="kolbandi" placeholder="Kol Bandı Rengi Giriniz">
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Açıklayınız:</p>
                        <input type="text" class="form-control" required name="kolbandiaciklama" id="kolbandiaciklama" placeholder="Açıklayınız">
                    </div>

                    <h1 class="form-header">Gerektiğinde Ulaşılabilecek Yakını</h1>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Adı Soyadı:</p>
                        <input type="text" class="form-control" required name="adsoyadyakin" id="adsoyadyakin" placeholder="Adı Soyadı">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel">Yakınlık Derecesi:</p>
                        <input type="text" class="form-control" required name="yakinlikderece" id="yakinlikderece" placeholder="Yakınlık Derecesi">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel">Telefon:</p>
                        <input type="text" class="form-control" required name="telefonyakin" id="telefonyakin" placeholder="Telefon">
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Adres</p>
                        <input type="text" class="form-control not" required name="adresyakin" id="adresyakin" placeholder="Adres giriniz">
                    </div>

                    <h1 class="form-header">Özgeçmiş</h1>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Daha Önce Hastaneye Yatma Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YatisDurumu" id="YatisDurumu" value="Yok">
                                    <label class="form-check-label" for="YatisDurumu">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YatisDurumu" id="YatisDurumu" value="Var">
                                    <label class="form-check-label" for="YatisDurumu">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatis_durumu_diger" id="yatis_durumu_diger" placeholder="Diğer">
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
                                <td><input type="text" class="form-control ozgecmistable" required name="yatis_yili" id="yatis_yili" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="yatis_suresi" id="yatis_suresi" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="yatis_nedeni" id="yatis_nedeni" placeholder="..."></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Hastalıklar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiHastaliklar" id="GetirdigiHastaliklar" value="Yok">
                                    <label class="form-check-label" for="GetirdigiHastaliklar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiHastaliklar" id="GetirdigiHastaliklar" value="Var">
                                    <label class="form-check-label" for="GetirdigiHastaliklar">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="hastalik_diger" id="hastalik_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Ameliyatlar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiAmeliyatlar" id="GetirdigiAmeliyatlar" value="Yok">
                                    <label class="form-check-label" for="GetirdigiAmeliyatlar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiAmeliyatlar" id="GetirdigiAmeliyatlar" value="Var">
                                    <label class="form-check-label" for="GetirdigiAmeliyatlar">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="ameliyat_diger" id="ameliyat_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Kazalar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiKazalar" id="GetirdigiKazalar" value="option1">
                                    <label class="form-check-label" for="GetirdigiKazalar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="GetirdigiKazalar" id="GetirdigiKazalar" value="option2">
                                    <label class="form-check-label" for="GetirdigiKazalar">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="kaza_diger" id="kaza_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Bulaşıcı Hastalığı:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="BulasiciHastalik" id="BulasiciHastalik" value="Yok">
                                    <label class="form-check-label" for="BulasiciHastalik">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="BulasiciHastalik" id="BulasiciHastalik" value="Var">
                                    <label class="form-check-label" for="BulasiciHastalik">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="bulasici_diger" id="bulasici_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Allerjik Reaksiyon:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AlerjikReaksiyon" id="AlerjikReaksiyon" value="Yok">
                                    <label class="form-check-label" for="AlerjikReaksiyon">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AlerjikReaksiyon" id="AlerjikReaksiyon" value="Var">
                                    <label class="form-check-label" for="AlerjikReaksiyon">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="alerji_diger" id="alerji_diger" placeholder="Diğer">
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
                                <td><input type="text" class="form-control ozgecmistable" required name="Allerjen" id="Allerjen" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="Belirtiler" id="Belirtiler" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="Tedavi" id="Tedavi" placeholder="..."></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Hastaneye Yatmadan Önce Kullandığı İlaçlar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KullanilanIlaclar" id="KullanilanIlaclar" value="Yok">
                                    <label class="form-check-label" for="KullanilanIlaclar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KullanilanIlaclar" id="KullanilanIlaclar" value="Var">
                                    <label class="form-check-label" for="KullanilanIlaclar">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="ilaclar_diger" id="ilaclar_diger" placeholder="Diğer">
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
                                    <td><input type="text" class="form-control ozgecmistable" required name="IlacAdi" id="IlacAdi" placeholder="..."></td>
                                    <td>
                                        <div class="checkbox-wrapper d-flex">
                                            <div class="checkboxes recetecheckbox">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="Recete" id="Recete" value="R+">
                                                    <label class="form-check-label" for="Recete">
                                                        <span class="checkbox-header"> R+ </span>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="Recete" id="Recete" value="R-">
                                                    <label class="form-check-label" for="Recete">
                                                        <span class="checkbox-header"> R-
                                                        </span>

                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="KullanimSuresi" id="KullanimSuresi" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="Dozu" id="Dozu" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="Sikligi" id="Sikligi" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="AlinisYolu" id="AlinisYolu" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="Suresi" id="Suresi" placeholder="..."></td>
                                </tr>
                                <!--<tr>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
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
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
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
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>
                                    <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="..."></td>-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Kullandığı Araçlar/Protezler:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KullandigiAraclar" id="KullandigiAraclar" value="Yok">
                                    <label class="form-check-label" for="KullandigiAraclar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="KullandigiAraclar" id="KullandigiAraclar" value="Var">
                                    <label class="form-check-label" for="KullandigiAraclar">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="araclar_diger" id="araclar_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Gozluk" id="Gozluk" value="Gozluk">
                                        <label class="form-check-label" for="inlineCheckbox1">Gözlük </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="KontaktLens" id="KontaktLens" value="Kontakt Lens">
                                        <label class="form-check-label" for="inlineCheckbox1">Kontakt Lens </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="IsitmeCihazi" id="IsitmeCihazi" value="Isitme Cihazi">
                                        <label class="form-check-label" for="inlineCheckbox1">İşitme Cihazı </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Sag" id="Sag" value="Sag">
                                        <label class="form-check-label" for="inlineCheckbox1">Sağ </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Sol" id="Sol" value="Sol">
                                        <label class="form-check-label" for="inlineCheckbox1">Sol</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="DisProtezi" id="DisProtezi" value="Dis Protezi">
                                        <label class="form-check-label" for="inlineCheckbox1">Diş Protez </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="TekerlekliSandalye" id="TekerlekliSandalye" value="Tekerlekli Sandalye">
                                        <label class="form-check-label" for="inlineCheckbox1">Tekerlekli
                                            Sandalye</label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Baston" id="Baston" value="Baston">
                                        <label class="form-check-label" for="inlineCheckbox1">Baston </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Yurutec" id="Yurutec" value="Yurutec">
                                        <label class="form-check-label" for="inlineCheckbox1">Yürüteç (Walker) </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="KoltukDegnegi" id="KoltukDegnegi" value="Koltuk Degnegi">
                                        <label class="form-check-label" for="inlineCheckbox1">Koltuk Değneği</label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Diğer</p>

                                    <input type="text" class="form-control ozgecmistable" required name="protez_diger" id="protez_diger" placeholder="...">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Alışkanlıklar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Aliskanliklar" id="Aliskanliklar" value="Yok">
                                    <label class="form-check-label" for="Aliskanliklar">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Aliskanliklar" id="Aliskanliklar" value="Var">
                                    <label class="form-check-label" for="Aliskanliklar">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="aliskanlik_diger" id="aliskanlik_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Sigara" id="Sigara" value="Sigara">
                                        <label class="form-check-label" for="inlineCheckbox1">Sigara </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" required name="SMiktar" id="SMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" required name="SKullanimSureci" id="SKullanimSureci" placeholder="...">
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Alkol" id="Alkol" value="Alkol">
                                        <label class="form-check-label" for="inlineCheckbox1">Alkol </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" required name="AMiktar" id="AMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" required name="AKullanimSureci" id="AKullanimSureci" placeholder="...">
                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Cay" id="Cay" value="Cay">
                                        <label class="form-check-label" for="inlineCheckbox1">Çay </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" required name="CMiktar" id="CMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" required name="CKullanimSureci" id="CKullanimSureci" placeholder="...">
                                </td>
                            </tr>

                            <tr>
                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="Kahve" id="Kahve" value="Kahve">
                                        <label class="form-check-label" for="inlineCheckbox1">Kahve </label>
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" required name="KMiktar" id="KMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" required name="KKullanimSureci" id="KKullanimSureci" placeholder="...">
                                </td>
                            </tr>

                            <tr>

                                <td class="protezlertable">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox1">Diğer </label>
                                        <input type="text" class="form-control ozgecmistable" required name="DDiger" id="DDiger" placeholder="...">
                                    </div>
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Miktarı</p>

                                    <input type="text" class="form-control ozgecmistable" required name="DMiktar" id="DMiktar" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Kullanım Süreci</p>

                                    <input type="text" class="form-control ozgecmistable" required name="DKullanimSureci" id="DKullanimSureci" placeholder="...">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h1 class="form-header">Soygeçmiş</h1>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Ailesinde herhangi bir sağlık sorunu olan var mı?:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AileviSaglik" id="AileviSaglik" value="Yok">
                                    <label class="form-check-label" for="AileviSaglik">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="AileviSaglik" id="AileviSaglik" value="Var">
                                    <label class="form-check-label" for="AileviSaglik">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="ailevi_diger" id="ailevi_diger" placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="ozgecmistable-wrapper">
                        <tbody>
                            <tr>

                                <td class="protezlertable">
                                    <p class="usernamelabel">Yakınlık Derecesi</p>


                                </td>
                                <td class="protezlertable">
                                    <p class="usernamelabel">Tanısı</p>

                                </td>
                            </tr>
                            <tr>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable" required name="YakinlikDerecesi" id="YakinlikDerecesi" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable" required name="Tanisi" id="Tanisi" placeholder="...">
                                </td>

                            </tr>
                            <!--<tr>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="...">
                                </td>
                                <td class="protezlertable">
                                    <input type="text" class="form-control ozgecmistable" required name="ozgecmistable1" id="ozgecmistable1" placeholder="...">
                                </td>

                            </tr>-->
                        </tbody>
                    </table>

                    <h1 class="form-header">Hastalık Öyküsü</h1>

                    <p class="usernamelabel">Geldiği Yer </p>

                    <div class="checkbox-wrapper d-flex">
                        <div class="checkboxes d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GeldigiYer" id="GeldigiYer" value="Yogun Bakim">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Yoğun Bakım </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GeldigiYer" id="GeldigiYer" value="Poliklinik">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Poliklinik </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GeldigiYer" id="GeldigiYer" value="Acil Servis">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Acil Servis </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GeldigiYer" id="GeldigiYer" value="Ev">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Ev </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GeldigiYer" id="GeldigiYer" value="Diger">
                                <label class="form-check-label" for="GeldigiYer">
                                    <span class="checkbox-header"> Diğer </span>

                                </label>
                                <input type="text" class="form-control" required name="yer_diger" id="yer_diger" placeholder="Diğer">
                            </div>
                        </div>
                    </div>

                    <p class="usernamelabel"> Hastaneye Geliş Şekli </p>

                    <div class="checkbox-wrapper d-flex">
                        <div class="checkboxes d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GelisSekli" id="GelisSekli" value="Yuruyerek">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Yürüyerek </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GelisSekli" id="GelisSekli" value="Tekerlekli Sandalye">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Tekerlekli Sandalye </span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GelisSekli" id="GelisSekli" value="Sedye">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Sedye </span>
                                </label>
                            </div>



                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="GelisSekli" id="GelisSekli" value="Diger">
                                <label class="form-check-label" for="GelisSekli">
                                    <span class="checkbox-header"> Diğer </span>

                                </label>
                                <input type="text" class="form-control" required name="gelis_diger" id="gelis_diger" placeholder="Diğer">
                            </div>
                        </div>
                    </div>

                    <p class="usernamelabel">Şikayetler</p>
                    <input type="text" class="form-control not" required name="Sikayetler" id="Sikayetler" placeholder="Şikayetler">

                    <p class="usernamelabel">Tıbbi Tanı</p>
                    <input type="text" class="form-control not" required name="TibbiTani" id="TibbiTani" placeholder="Tıbbi Tanı">

                    <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
            </div>
            </form>
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
                        let surname = $('#surname').val();
                        let age = $('#age').val();
                        let not = $('#not').val();

                        var patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                        let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                        let ad_soyad = $("input[name='ad_soyad']").val();
                        let dogum_yeri = $("input[name='dogum_yeri']").val();
                        let yas = parseInt($("input[name='yas']").val());
                        let cinsiyet = $("input[type='radio'][name='cinsiyet']:checked").val();
                        let medeni_durum = $("input[name='medeni_durum']").val();
                        let meslek = $("input[name='meslek']").val();
                        let egitim_durumu = $("input[name='egitim_durumu']").val();
                        let protocol_file_no = $("input[name='protocol_file_no']").val();
                        let yatis_tarihi = $("input[name='yatis_tarihi']").val();
                        let bolum = $("input[name='bolum']").val();
                        let tibbi_tani = $("input[name='tibbi_tani']").val();
                        let doktor_ad_soyad = $("input[name='doktor_ad_soyad']").val();
                        let cocuk_sayisi = $("input[name='cocuk_sayisi']").val();
                        let sosyal_guvencesi = $("input[type='radio'][name='sosyal_guvencesi']:checked").val();
                        let sosyal_guvence_diger = $("input[name='sosyal_guvence_diger']").val();
                        let dil = $("input[name='dil']").val();
                        let TercumanGereksinimi = $("input[type='radio'][name='TercumanGereksinimi']:checked").val();
                        let t_diger = $("input[name='t_diger']").val();
                        let TransfuzyonYapilma = $("input[type='radio'][name='TransfuzyonYapilma']:checked").val();
                        let yatisdiger = $("input[name='yatisdiger']").val();
                        let TransfuzyonReaksiyonu = $("input[type='radio'][name='TransfuzyonReaksiyonu']:checked").val();
                        let reaksiyon_diger = $("input[name='reaksiyon_diger']").val();
                        let BilgiKisisi = $("input[type='radio'][name='BilgiKisisi']:checked").val();
                        let kisi_diger = $("input[name='kisi_diger']").val();
                        let kolbandi = $("input[name='kolbandi']").val();
                        let kolbandiaciklama = $("input[name='kolbandiaciklama']").val();
                        let adsoyadyakin = $("input[name='adsoyadyakin']").val();
                        let yakinlikderece = $("input[name='yakinlikderece']").val();
                        let telefonyakin = $("input[name='telefonyakin']").val();
                        let adresyakin = $("input[name='adresyakin']").val();
                        let YatisDurumu = $("input[name='YatisDurumu']:checked").val();
                        let yatis_durumu_diger = $("input[name='yatis_durumu_diger']").val();
                        let yatis_yili = $("input[name='yatis_yili']").val();
                        let yatis_suresi = $("input[name='yatis_suresi']").val();
                        let yatis_nedeni = $("input[name='yatis_nedeni']").val();
                        let GetirdigiHastaliklar = $("input[name='GetirdigiHastaliklar']:checked").val();
                        let hastalik_diger = $("input[name='hastalik_diger']").val();
                        let GetirdigiAmeliyatlar = $("input[name='GetirdigiAmeliyatlar']:checked").val();
                        let ameliyat_diger = $("input[name='ameliyat_diger']").val();
                        let GetirdigiKazalar = $("input[name='GetirdigiKazalar']:checked").val();
                        let kaza_diger = $("input[name='kaza_diger']").val();
                        let BulasiciHastalik = $("input[name='BulasiciHastalik']:checked").val();
                        let bulasici_diger = $("input[name='bulasici_diger']").val();
                        let AlerjikReaksiyon = $("input[name='AlerjikReaksiyon']:checked").val();
                        let alerji_diger = $("input[name='alerji_diger']").val();
                        let Allerjen = $("input[name='Allerjen']").val();
                        let Belirtiler = $("input[name='Belirtiler']").val();
                        let Tedavi = $("input[name='Tedavi']").val();
                        let KullanilanIlaclar = $("input[name='KullanilanIlaclar']:checked").val();
                        let ilaclar_diger = $("input[name='ilaclar_diger']").val();
                        let IlacAdi = $("input[name='IlacAdi']").val();
                        let Recete = $("input[name='Recete']:checked").val();
                        let KullanimSuresi = $("input[name='KullanimSuresi']").val();
                        let Dozu = $("input[name='Dozu']").val();
                        let Sikligi = $("input[name='Sikligi']").val();
                        let AlinisYolu = $("input[name='AlinisYolu']").val();
                        let Suresi = $("input[name='Suresi']").val();
                        let KullandigiAraclar = $("input[name='KullandigiAraclar']:checked").val();
                        let araclar_diger = $("input[name='araclar_diger']").val();
                        let Gozluk = $("input[name='Gozluk']").val();
                        let KontaktLens = $("input[name='KontaktLens']").val();
                        let IsitmeCihazi = $("input[name='IsitmeCihazi']").val();
                        let Sag = $("input[name='Sag']").val();
                        let Sol = $("input[name='Sol']").val();
                        let DisProtezi = $("input[name='DisProtezi']").val();
                        let TekerlekliSandalye = $("input[name='TekerlekliSandalye']").val();
                        let Baston = $("input[name='Baston']").val();
                        let Yurutec = $("input[name='Yurutec']").val();
                        let KoltukDegnegi = $("input[name='KoltukDegnegi']").val();
                        let protez_diger = $("input[name='protez_diger']").val();
                        let Aliskanliklar = $("input[name='Aliskanliklar']:checked").val();
                        let aliskanlik_diger = $("input[name='aliskanlik_diger']").val();
                        let Sigara = $("input[name='Sigara']").val();
                        let SMiktar = $("input[name='SMiktar']").val();
                        let SKullanimSureci = $("input[name='SKullanimSureci']").val();
                        let Alkol = $("input[name='Alkol']").val();
                        let AMiktar = $("input[name='AMiktar']").val();
                        let AKullanimSureci = $("input[name='AKullanimSureci']").val();
                        let Cay = $("input[name='Cay']").val();
                        let CMiktar = $("input[name='CMiktar']").val();
                        let CKullanimSureci = $("input[name='CKullanimSureci']").val();
                        let Kahve = $("input[name='Kahve']").val();
                        let KMiktar = $("input[name='KMiktar']").val();
                        let KKullanimSureci = $("input[name='KKullanimSureci']").val();
                        let DDiger = $("input[name='DDiger']").val();
                        let DMiktar = $("input[name='DMiktar']").val();
                        let DKullanimSureci = $("input[name='DKullanimSureci']").val();
                        let AileviSaglik = $("input[name='AileviSaglik']:checked").val();
                        let ailevi_diger = $("input[name='ailevi_diger']").val();
                        let YakinlikDerecesi = $("input[name='YakinlikDerecesi']").val();
                        let Tanisi = $("input[name='Tanisi']").val();
                        let GeldigiYer = $("input[name='GeldigiYer']:checked").val();
                        let yer_diger = $("input[name='yer_diger']").val();
                        let GelisSekli = $("input[name='GelisSekli']:checked").val();
                        let gelis_diger = $("input[name='gelis_diger']").val();
                        let Sikayetler = $("input[name='Sikayetler']").val();
                        let TibbiTani = $("input[name='TibbiTani']").val();

                        e.preventDefault()

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/SubmitOrUpdateForm1_Ozgecmis.php',
                            data: {
                                ad_soyad: ad_soyad,
                                dogum_yeri: dogum_yeri,
                                yas: yas,
                                cinsiyet: cinsiyet,
                                medeni_durum: medeni_durum,
                                meslek: meslek,
                                egitim_durumu: egitim_durumu,
                                protocol_file_no: protocol_file_no,
                                yatis_tarihi: yatis_tarihi,
                                bolum: bolum,
                                tibbi_tani: tibbi_tani,
                                doktor_ad_soyad: doktor_ad_soyad,
                                cocuk_sayisi: cocuk_sayisi,
                                sosyal_guvencesi: sosyal_guvencesi,
                                sosyal_guvence_diger: sosyal_guvence_diger,
                                dil: dil,
                                TercumanGereksinimi: TercumanGereksinimi,
                                t_diger: t_diger,
                                TransfuzyonYapilma: TransfuzyonYapilma,
                                yatisdiger: yatisdiger,
                                TransfuzyonReaksiyonu: TransfuzyonReaksiyonu,
                                reaksiyon_diger: reaksiyon_diger,
                                BilgiKisisi: BilgiKisisi,
                                kisi_diger: kisi_diger,
                                kolbandi: kolbandi,
                                kolbandiaciklama: kolbandiaciklama,
                                adsoyadyakin: adsoyadyakin,
                                yakinlikderece: yakinlikderece,
                                telefonyakin: telefonyakin,
                                adresyakin: adresyakin,
                                YatisDurumu: YatisDurumu,
                                yatis_durumu_diger: yatis_durumu_diger,
                                yatis_yili: yatis_yili,
                                yatis_suresi: yatis_suresi,
                                yatis_nedeni: yatis_nedeni,
                                GetirdigiHastaliklar: GetirdigiHastaliklar,
                                hastalik_diger: hastalik_diger,
                                GetirdigiAmeliyatlar: GetirdigiAmeliyatlar,
                                ameliyat_diger: ameliyat_diger,
                                GetirdigiKazalar: GetirdigiKazalar,
                                kaza_diger: kaza_diger,
                                BulasiciHastalik: BulasiciHastalik,
                                bulasici_diger: bulasici_diger,
                                AlerjikReaksiyon: AlerjikReaksiyon,
                                alerji_diger: alerji_diger,
                                Allerjen: Allerjen,
                                Belirtiler: Belirtiler,
                                Tedavi: Tedavi,
                                KullanilanIlaclar: KullanilanIlaclar,
                                ilaclar_diger: ilaclar_diger,
                                IlacAdi: IlacAdi,
                                Recete: Recete,
                                KullanimSuresi: KullanimSuresi,
                                Dozu: Dozu,
                                Sikligi: Sikligi,
                                AlinisYolu: AlinisYolu,
                                Suresi: Suresi,
                                KullandigiAraclar: KullandigiAraclar,
                                araclar_diger: araclar_diger,
                                Gozluk: Gozluk,
                                KontaktLens: KontaktLens,
                                IsitmeCihazi: IsitmeCihazi,
                                Sag: Sag,
                                Sol: Sol,
                                DisProtezi: DisProtezi,
                                TekerlekliSandalye: TekerlekliSandalye,
                                Baston: Baston,
                                Yurutec: Yurutec,
                                KoltukDegnegi: KoltukDegnegi,
                                protez_diger: protez_diger,
                                Aliskanliklar: Aliskanliklar,
                                aliskanlik_diger: aliskanlik_diger,
                                Sigara: Sigara,
                                SMiktar: SMiktar,
                                SKullanimSureci: SKullanimSureci,
                                Alkol: Alkol,
                                AMiktar: AMiktar,
                                AKullanimSureci: AKullanimSureci,
                                Cay: Cay,
                                CMiktar: CMiktar,
                                CKullanimSureci: CKullanimSureci,
                                Kahve: Kahve,
                                KMiktar: KMiktar,
                                KKullanimSureci: KKullanimSureci,
                                DDiger: DDiger,
                                DMiktar: DMiktar,
                                DKullanimSureci: DKullanimSureci,
                                AileviSaglik: AileviSaglik,
                                ailevi_diger: ailevi_diger,
                                YakinlikDerecesi: YakinlikDerecesi,
                                Tanisi: Tanisi,
                                GeldigiYer: GeldigiYer,
                                yer_diger: yer_diger,
                                GelisSekli: GelisSekli,
                                gelis_diger: gelis_diger,
                                Sikayetler: Sikayetler,
                                TibbiTani: TibbiTani
                            },
                            success: function(data) {
                                alert(data);
                                let url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                                $("#content").load(url);
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
        <!-- Template Javascript -->
        <script src=""></script>
</body>

</html>

<!--<div class="patients-table dark-blue text-center rounded p-4" id="patients-table">
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
        </script>-->