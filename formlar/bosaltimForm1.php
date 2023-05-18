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
<style>
    .input-section{
        border-bottom: 2px solid black;
        padding: 50px;
    }
</style>
<div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">BOŞALTIM GEREKSİNİMİ </h1>


            <h3>BAĞIRSAK BOŞALTIMI</h3>

            <div class="input-section d-flex">
                <p class="usernamelabel">Bağırsak boşaltımını karşılamada </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio" name="protezlertable" id="protezlertable" value="Bağımsız">
                                                <label class="form-check-label" for="protezlertable">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio" name="protezlertable" id="protezlertable" value="Yarı bağımlı">
                                                <label class="form-check-label" for="protezlertable">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio" name="protezlertable" id="protezlertable" value="Bağımlı">
                                                <label class="form-check-label" for="protezlertable">Bağımlı
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
                <p class="usernamelabel">Hastaneye yatmadan önceki bağırsak boşaltım:</p>
                <div>

                    sıklığı: <input type="text" class=" form-control diger" required name="hospitalStoolEmptyingFrequency" id="sikligi">
                    zamanı: <input type="date" class=" form-control diger" required name="hospitalStoolEmptyingDate" id="zamani">
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Boşaltımda Sorun:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımSorun" id="BoşaltımSorun" value="Yok">
                            <label class="form-check-label" for="BoşaltımSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımSorun" id="BoşaltımSorun" value="Var">
                            <label class="form-check-label" for="BoşaltımSorun">
                                <span class="checkbox-header">Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox" id="Konstipasyon" value="Konstipasyon">
                                                <label class="form-check-label" for="Konstipasyon">Konstipasyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems"  type="checkbox" id="Diare" value="Diare">
                                                <label class="form-check-label" for="Diare">Diare </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems"  type="checkbox" id="Distansiyon" value="Distansiyon">
                                                <label class="form-check-label" for="Distansiyon">Distansiyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems"  type="checkbox" id="Fekal" value="Fekal">
                                                <label class="form-check-label" for="Fekal">Fekal
                                                    inkontinans</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems"  type="checkbox" id="Hemoroid" value="Hemoroid">
                                                <label class="form-check-label" for="Hemoroid">Hemoroid</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems"  type="checkbox" id="Dışkı" value="Dışkı">
                                                <label class="form-check-label" for="Dışkı">Dışkı tıkacı</label>
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
                <p class="usernamelabel">Bağırsak sesleri(/dk)</p>
                <input type="text" class="form-control" required name="bagirsak_sesleri" id="bagirsak_sesleri">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">En son ne zaman defekasyona çıktınız:</p>
                <input type="text" class="form-control" required name="defekasyon_zamani" id="defekasyon_zamani">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Son 24 saat içinde kaç kez defekasyona çıktınız:</p>
                <input type="text" class="form-control" required name="defekasyon_tekrari" id="defekasyon_tekrari">
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Boşaltım Şekli :</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımŞekli" id="BoşaltımŞekli" value="Yok">
                            <label class="form-check-label" for="BoşaltımŞekli">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>
                        </div>
                        </div>
                        <div class="form-check d-flex ">
                            <input class="form-check-input" type="radio" name="BoşaltımŞekli" id="BoşaltımŞekli" value="Var">
                            <label class="form-check-label " for="BoşaltımŞekli">
                                <span class="checkbox-header p-3">Sorun Var</span>
                            </label>
                            </div>
   
                            <table class="ozgecmistable-wrapper p-2">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                        <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Kolostom" value="Kolostom">
                                                    <label class="form-check-label" for="Kolostom">Kolostom</label>
                                                </div>
                                            <div class="d-flex">
                                                
                                                <div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="StomaRengi">Stomanın Rengi: </label>
                                                        <input type="text" class="diger form-control" required name="StomaRengi" id="StomaRengi">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Gaz1" value="Gaz">
                                                        <label class="form-check-label" for="Gaz1">Gaz</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="Koku1" value="Koku">
                                                        <label class="form-check-label" for="Koku1">Koku</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="DışkıSızıntısı" value="Dışkı sızıntısı">
                                                        <label class="form-check-label" for="DışkıSızıntısı1">Dışkı sızıntısı</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="Deri_irritasyonu" value="Deri irritasyonu">
                                                        <label class="form-check-label" for="Deri_irritasyonu1">Deri irritasyonu</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                        <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="İleostomi" value="İleostomi">
                                                    <label class="form-check-label" for="İleostomi">İleostomi</label>
                                            </div>
                                            <div class="d-flex">
                                                
                                                <div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="StomanınRengi">Stomanın Rengi: </label>
                                                        <input type="text" class="diger form-control" required name="StomanınRengi" id="StomanınRengi">
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Gaz" value="Gaz">
                                                        <label class="form-check-label" for="Gaz">Gaz:</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="Koku" value="Koku">
                                                        <label class="form-check-label" for="Koku">Koku</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="Dışkı_sızıntısı" value="Dışkı sızıntısı">
                                                        <label class="form-check-label" for="Dışkı_sızıntısı">Dışkı sızıntısı</label>
                                                    </div>
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" id="Deri_irritasyonu" value="Deri irritasyonu">
                                                        <label class="form-check-label" for="Deri_irritasyonu">Deri irritasyonu</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>

             
                
            </div>


            <h3>ÜRİNER BOŞALTIM</h3>
            <div class="input-section d-flex">
                <p class="usernamelabel">Üriner boşaltımını karşılamad</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2" id="protezlertable2" value="Bağımsız">
                                                <label class="form-check-label" for="protezlertable2">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2" id="protezlertable2" value="Yarı bağımlı">
                                                <label class="form-check-label" for="protezlertable2">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2" id="protezlertable2" value="Bağımlı">
                                                <label class="form-check-label" for="protezlertable2">Bağımlı
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

                <p class="usernamelabel">Boşaltımda Sorun</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımdaSorun" id="BoşaltımdaSorun" value="Sorun Yok">
                            <label class="form-check-label" for="BoşaltımdaSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımdaSorun" id="BoşaltımdaSorun" value="Sorun Var">
                            <label class="form-check-label" for="BoşaltımdaSorun">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Üriner_inkontinans1" value="Üriner inkontinans">
                                                <label class="form-check-label" for="Üriner_inkontinans1">Üriner inkontinans</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Dizüri1" value="Dizüri">
                                                <label class="form-check-label" for="Dizüri1">Dizüri</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="UrinerDiğer" value="Diğer">
                                                <label class="form-check-label" for="UrinerDiğer">Diğer</label>
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

                <p class="usernamelabel">Mesane kateterizasyonu </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Mesane_kateterizasyonu" id="Mesane_kateterizasyonu" value="Sorun Yok">
                            <label class="form-check-label" for="Mesane_kateterizasyonu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio" name="Mesane_kateterizasyonu" id="Mesane_kateterizasyonu" value="Sorun Var">
                            <label class="form-check-label" for="Mesane_kateterizasyonu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <div class="d-flex justify-content-start">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Takılma Tarihi: </span>
                                    </label>
                                    <input type="text" class="form-control diger" required name="mesane_takilma_tarihi" id="mesane_takilma_tarihi">
                                </div>
                                <div>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Üriner_inkontinans" value="Üriner inkontinans">
                                                        <label class="form-check-label" for="Üriner_inkontinans">Üriner inkontinans</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Dizüri" value="Dizüri">
                                                        <label class="form-check-label" for="Dizüri">Dizüri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Uriner_diger" value="Diğer">
                                                        <label class="form-check-label" for="Uriner_diger">Diğer</label>
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

                <p class="usernamelabel">Üreterestomi</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Üreterestomi" id="Üreterestomi" value="Yok">
                            <label class="form-check-label" for="Üreterestomi">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Üreterestomi" id="Üreterestomi" value="Var">
                            <label class="form-check-label" for="Üreterestomi">
                                <span class="checkbox-header"> Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="sağ" value="sağ">
                                                <label class="form-check-label" for="sağ">sağ </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="sol" value="sol">
                                                <label class="form-check-label" for="sol">sol</label>
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

                <p class="usernamelabel">Sistostomi </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sistostomi" id="Sistostomi" value="Yok">
                            <label class="form-check-label" for="Sistostomi">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sistostomi" id="Sistostomi" value="Var">
                            <label class="form-check-label" for="Sistostomi">
                                <span class="checkbox-header"> Var</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">İdrarın rengi</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi" value="Açık sarı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header">Açık sarı</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi" value="Koyu sarı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Koyu sarı</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi" value="Açık kırmızı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Açık kırmızı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi" value="Koyu kırmızı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Koyu kırmızı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">İdrarın berraklığı </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarBerrakligi" id="IdrarBerrakligi" value="Berrak">
                            <label class="form-check-label" for="IdrarBerrakligi">
                                <span class="checkbox-header">Berrak </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarBerrakligi" id="IdrarBerrakligi" value="Bulanık">
                            <label class="form-check-label" for="IdrarBerrakligi">
                                <span class="checkbox-header">Bulanık</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
    <script>
    $(function() {
        $('#closeBtn').click(function(e) {
            let patient_id = <?php
                  $userid = $_GET['patient_id'];
                  echo $userid
                  ?>;
                   let patient_name = "<?php
            echo urldecode($_GET['patient_name']);
                  ?>";
          var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id + "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
    </script>
    
    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
           
                  //var valid = this.form.checkValidity();
            if (valid) {
                let name = $('#name').val();
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
                    //let stoolEmptyingHelp = $("input[type='radio'][name='stoolEmptyingHelp']:checked").val();
                    //let hospitalStoolEmptyingFrequency =  $("input[name='hospitalStoolEmptyingFrequency']").val();
                    //let hospitalStoolEmptyingDate =  $("input[name='hospitalStoolEmptyingDate']").val();
                    //let BoşaltımSorun = '';
                    //if($("input[name='BoşaltımSorun']:checked").val() === "Var"){
                        //BoşaltımSorun = $('input[name="excretionProblems"]:checked').map(function() {
                                            //return this.value;
                                            //}).get().join(',');
                    //}else[
                        //BoşaltımSorun = 'Sorun yok'
                    //]
                    let protezlertable = $("input[type='radio'][name='protezlertable']:checked").val();
                    let sikligi = $("input[name='sikligi']").val();
                    let zamani = $("input[name='zamani']").val();
                    let BoşaltımSorun = $("input[type='radio'][name='BoşaltımSorun']:checked").val();
                    let Konstipasyon = $("input[name='Konstipasyon']").val();
                    let Diare = $("input[name='Diare']").val();
                    let Distansiyon = $("input[name='Distansiyon']").val();
                    let Fekal = $("input[name='Fekal']").val();
                    let Hemoroid = $("input[name='Hemoroid']").val();
                    let Dışkı = $("input[name='Dışkı']").val();
                    let BagirsakDiğer = $("input[name='BagirsakDiğer']").val();
                    let bagirsak_sesleri = $("input[name='bagirsak_sesleri']").val();
                    let defekasyon_zamani = $("input[name='defekasyon_zamani']").val();
                    let defekasyon_tekrari = $("input[name='defekasyon_tekrari']").val();
                    let BoşaltımŞekli = $("input[type='radio'][name='BoşaltımŞekli']:checked").val();
                    let Kolostom = $("input[name='Kolostom']").val();
                    let StomaRengi = $("input[type='radio'][name='StomaRengi']").val();
                    let Gaz1 = $("input[name='Gaz1']").val();
                    let Koku1 = $("input[type='radio'][name='Koku1']").val();
                    let DışkıSızıntısı1 = $("input[name='DışkıSızıntısı1']").val();
                    let Deri_irritasyonu1 = $("input[type='radio'][name='Deri_irritasyonu1']").val();
                    let İleostomi = $("input[name='İleostomi']").val();
                    let StomanınRengi = $("input[name='StomanınRengi']").val();
                    let Gaz = $("input[name='Gaz']").val();
                    let Koku = $("input[name='Koku']").val();
                    let Dışkı_sızıntısı = $("input[name='Dışkı_sızıntısı']").val();
                    let Deri_irritasyonu = $("input[name='Deri_irritasyonu']").val();
                    let Bağımsız = $("input[name='Bağımsız']").val();
                    let YarıBağımlı = $("input[name='YarıBağımlı']").val();
                    let Bağımlı = $("input[name='Bağımlı']").val();
                    let BoşaltımdaSorun = $("input[name='BoşaltımdaSorun']:checked").val();
                    let Üriner_inkontinans1 = $("input[name='Üriner_inkontinans']").val();
                    let Dizüri1 = $("input[name='Dizüri1']").val();
                    let UrinerDiğer = $("input[name='UrinerDiğer']").val();
                    let Mesane_kateterizasyonu = $("input[name='Mesane_kateterizasyonu']:checked").val();
                    let mesane_takilma_tarihi = $("input[name='mesane_takilma_tarihi']").val();
                    let Üriner_inkontinans = $("input[name='Üriner_inkontinans']").val();
                    let Dizüri = $("input[name='Dizüri']").val();
                    let Uriner_diger = $("input[name='Uriner_diger']").val();
                    let Üreterestomi = $("input[name='Üreterestomi']:checked").val();
                    let sağ = $("input[name='sağ']").val();
                    let sol = $("input[name='sol']").val();
                    let Sistostomi = $("input[name='Sistostomi']:checked").val();
                    let IdrarRengi = $("input[name='IdrarRengi']:checked").val();
                    let IdrarBerrakligi = $("input[name='IdrarBerrakligi']").val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/SubmitOrUpdateForm1_Bosaltim.php',
                                data: {
                           protezlertable:protezlertable,
                           sikligi:sikligi,
                           zamani:zamani,
                           BoşaltımSorun:BoşaltımSorun,
                           Konstipasyon:Konstipasyon,
                           Diare:Diare,
                           Distansiyon:Distansiyon,
                           Fekal:Fekal,
                           Hemoroid:Hemoroid,
                           Dışkı:Dışkı,
                           BagirsakDiğer:BagirsakDiğer,
                           bagirsak_sesleri:bagirsak_sesleri,
                           defekasyon_zamani:defekasyon_zamani,
                           BoşaltımŞekli:BoşaltımŞekli,
                           Kolostom:Kolostom,
                           StomaRengi:StomaRengi,
                           Gaz1:Gaz1,
                           Koku1:Koku1,
                           DışkıSızıntısı1:DışkıSızıntısı1,
                           Deri_irritasyonu1:Deri_irritasyonu1,
                           İleostomi:İleostomi,
                           StomanınRengi:StomanınRengi,
                           Gaz:Gaz,
                           Koku:Koku,
                           Dışkı_sızıntısı:Dışkı_sızıntısı,
                           Deri_irritasyonu:Deri_irritasyonu,
                           protezlertable2:protezlertable2,
                           BoşaltımdaSorun:BoşaltımdaSorun,
                           Üriner_inkontinans1:Üriner_inkontinans1,
                           Dizüri1:Dizüri1,
                           UrinerDiğer:UrinerDiğer,
                           Mesane_kateterizasyonu:Mesane_kateterizasyonu,
                           mesane_takilma_tarihi:mesane_takilma_tarihi,
                           Üriner_inkontinans:Üriner_inkontinans,
                           Dizüri:Dizüri,
                           Uriner_diger:Uriner_diger,
                           Üreterestomi:Üreterestomi,
                           sağ:sağ,
                           sol:sol,
                           Sistostomi:Sistostomi,
                           IdrarRengi:IdrarRengi,
                           IdrarBerrakligi:IdrarBerrakligi,

                                },
                                success: function(data) {
                                    alert("Success");
                                    location.reload(true)
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
