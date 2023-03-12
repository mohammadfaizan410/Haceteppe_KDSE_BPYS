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
        require_once('config-students.php');
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
        <div class="d-flex column">
            <a href="ozgecmis.php" class="form-items">Hasta Değerlendirme Formu</a>
            <a href="solunumgereksinimi.php" class="form-items">Solunum Gereksinimi</a>


                                    </div>
                                </div>
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Medeni Durumu:</p>
                                <input type="text" class="form-control" required name="medeni" id="medeni"
                                    placeholder="Medeni Durumu Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Mesleği:</p>
                                <input type="text" class="form-control" required name="meslek" id="meslek"
                                    placeholder="Mesleği Durumu Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Eğitim Durumu:</p>
                                <input type="text" class="form-control" required name="egitim" id="egitim"
                                    placeholder="Eğitim Durumu Giriniz">
                            </div>

                        </div>

                        <div class="input-section-item">
                            <div class="input-section d-flex">
                                <p class="usernamelabel">Protokol/Dosya No:</p>
                                <input type="text" class="form-control" required name="dosyano" id="dosyano"
                                    placeholder="Protokol/Dosya No Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Yatış Tarihi:</p>
                                <input type="date" class="form-control" required name="yatistarihi" id="yatistarihi"
                                    placeholder="Protokol/Dosya No Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Bölüm:</p>
                                <input type="text" class="form-control" required name="bolum" id="bolum"
                                    placeholder="Bölüm Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Tıbbi Tanı:</p>
                                <input type="text" class="form-control" required name="tibbitani" id="tibbitani"
                                    placeholder="Bölüm Giriniz">
                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Doktor Adı Soyadı:</p>
                                <input type="text" class="form-control" required name="doktorname" id="doktorname"
                                    placeholder="Doktor Adı Soyadı Giriniz">
                            </div>



                            <div class="input-section d-flex">
                                <p class="usernamelabel">Çocuk Sayısı:</p>
                                <input type="text" class="form-control" required name="cocuksayi" id="cocuksayi"
                                    placeholder="Çocuk Sayısı Giriniz">
                            </div>

                            <div class="input-section d-flex">

                                <p class="usernamelabel">Sosyal Güvencesi:</p>
                                <div class="checkbox-wrapper d-flex">
                                    <div class="checkboxes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyalradio"
                                                id="sosyalradio" value="option1">
                                            <label class="form-check-label" for="sosyalradio">
                                                <span class="checkbox-header"> Resmi </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyalradio"
                                                id="sosyalradio" value="option2">
                                            <label class="form-check-label" for="sosyalradio">
                                                <span class="checkbox-header"> Ücretli </span>

                                            </label>

                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sosyalradio"
                                                id="sosyalradio" value="option3">
                                            <label class="form-check-label" for="sosyalradio">
                                                <span class="checkbox-header"> Diğer </span>

                                            </label>
                                            <input type="text" class="form-control" required name="diger" id="diger"
                                                placeholder="Diğer">
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
                                    <input class="form-check-input" type="radio" name="sosyalradio" id="sosyalradio"
                                        value="option1">
                                    <label class="form-check-label" for="sosyalradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sosyalradio" id="sosyalradio"
                                        value="option2">
                                    <label class="form-check-label" for="sosyalradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="diger" id="diger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Adres</p>
                        <input type="text" class="form-control not" required name="adres" id="adres"
                            placeholder="Adres giriniz">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Bilgi Alınan Kişi:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bilgikisiradio"
                                        id="bilgikisiradio" value="option1">
                                    <label class="form-check-label" for="bilgikisiradio">
                                        <span class="checkbox-header"> Kendisi </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bilgikisiradio"
                                        id="bilgikisiradio" value="option2">
                                    <label class="form-check-label" for="bilgikisiradio">
                                        <span class="checkbox-header"> Dosya </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bilgikisiradio"
                                        id="bilgikisiradio" value="option3">
                                    <label class="form-check-label" for="bilgikisiradio">
                                        <span class="checkbox-header"> Diğer </span>

                                    </label>
                                    <input type="text" class="form-control" required name="diger" id="diger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Kol Bandı Rengi:</p>
                        <input type="text" class="form-control" required name="kolbandi" id="kolbandi"
                            placeholder="Kol Bandı Rengi Giriniz">
                    </div>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Açıklayınız:</p>
                        <input type="text" class="form-control" required name="kolbandiaciklama" id="kolbandiaciklama"
                            placeholder="Açıklayınız">
                    </div>

                    <h1 class="form-header">Gerektiğinde Ulaşılabilecek Yakını</h1>

                    <div class="input-section d-flex">
                        <p class="usernamelabel">Adı Soyadı:</p>
                        <input type="text" class="form-control" required name="adsoyadyakin" id="adsoyadyakin"
                            placeholder="Adı Soyadı">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel">Yakınlık Derecesi:</p>
                        <input type="text" class="form-control" required name="yakinlikderece" id="yakinlikderece"
                            placeholder="Yakınlık Derecesi">
                    </div>
                    <div class="input-section d-flex">
                        <p class="usernamelabel">Telefon:</p>
                        <input type="text" class="form-control" required name="telefonyakin" id="telefonyakin"
                            placeholder="Telefon">
                    </div>
                    <div class="input-section d-flex">

                        <p class="usernamelabel">Adres</p>
                        <input type="text" class="form-control not" required name="adresyakin" id="adresyakin"
                            placeholder="Adres giriniz">
                    </div>

                    <h1 class="form-header">Özgeçmiş</h1>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Daha Önce Hastaneye Yatma Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
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
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Hastalıklar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Ameliyatlar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Geçirdiği Kazalar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Bulaşıcı Hastalığı:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Allerjik Reaksiyon:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
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
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Kan Grubu</p>
                        <input type="text" class="form-control not" required name="kangrubu" id="kangrubu"
                            placeholder="Kan Grubu giriniz">
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Daha Önce Kan Transfüzyonu Yaplıma Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Transfüzyon Sonrası Reaksiyon Gelişme Durumu:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-section d-flex">

                        <p class="usernamelabel">Hastaneye Yatmadan Önce Kullandığı İlaçlar:</p>
                        <div class="checkbox-wrapper d-flex">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option1">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                        id="yatisdurumuradio" value="option2">
                                    <label class="form-check-label" for="yatisdurumuradio">
                                        <span class="checkbox-header"> Var (Aşağıdaki Tabloda Açıklayınız) </span>

                                    </label>
                                    <input type="text" class="form-control" required name="yatisdiger" id="yatisdiger"
                                        placeholder="Diğer">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td>
                                    <div class="checkbox-wrapper d-flex">
                                        <div class="checkboxes">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option1">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R+ </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option2">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R-
                                                    </span>

                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td>
                                    <div class="checkbox-wrapper d-flex">
                                        <div class="checkboxes">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option1">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R+ </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option2">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R-
                                                    </span>

                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td>
                                    <div class="checkbox-wrapper d-flex">
                                        <div class="checkboxes">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option1">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R+ </span>
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="yatisdurumuradio"
                                                    id="yatisdurumuradio" value="option2">
                                                <label class="form-check-label" for="yatisdurumuradio">
                                                    <span class="checkbox-header"> R-
                                                    </span>

                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                                <td><input type="text" class="form-control ozgecmistable" required name="ozgecmistable1"
                                        id="ozgecmistable1" placeholder="..."></td>
                            </tr>
                        </tbody>
                    </table>

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
            $.ajaxSetup({
                cache: false
            }); // disable caching for all requests.

            // RAW Text/Html data from a file

            $(function() {
                $("a.form-items").on("click", function(e) {
                    e.preventDefault();
                    $("#content").load(this.href);
                })
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
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="main.js"></script>
</body>

</html>