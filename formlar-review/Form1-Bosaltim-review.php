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
$sql = "SELECT * FROM bosaltimform1 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $bosaltim = $smtmselect->fetchAll(PDO::FETCH_ASSOC)[0];
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

</head>
<div class="send-patient ta-center">
    <span class='close closeBtn' id='closeBtn1'>&times;</span>
    <h1 class="form-header">BOŞALTIM GEREKSİNİMİ </h1>
    <div class=" patients-save">
        <form action="" method="" class="patients-save-fields">

            <h3>BAĞIRSAK BOŞALTIMI</h3>
            <div class="input-section d-flex">
                <p class="usernamelabel">Bağırsak boşaltımını karşılamada </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio"
                                                    name="protezlertable" id="protezlertable" value="Bağımsız">
                                                <label class="form-check-label" for="protezlertable">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio"
                                                    name="protezlertable" id="protezlertable" value="Yarı bağımlı">
                                                <label class="form-check-label" for="protezlertable">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name='stoolEmptyingHelp' type="radio"
                                                    name="protezlertable" id="protezlertable" value="Bağımlı">
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

                    sıklığı: <input type="text" class=" form-control diger" required
                        name="hospitalStoolEmptyingFrequency" id="sikligi">
                    zamanı: <input type="date" class=" form-control diger" required name="hospitalStoolEmptyingDate"
                        id="zamani">
                </div>
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Boşaltımda Sorun:</p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımSorun" id="BoşaltımSorun"
                                value="Yok">
                            <label class="form-check-label" for="BoşaltımSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımSorun" id="BoşaltımSorun"
                                value="Var">
                            <label class="form-check-label" for="BoşaltımSorun">
                                <span class="checkbox-header">Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Konstipasyon" value="Konstipasyon">
                                                <label class="form-check-label" for="Konstipasyon">Konstipasyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Diare" value="Diare">
                                                <label class="form-check-label" for="Diare">Diare </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Distansiyon" value="Distansiyon">
                                                <label class="form-check-label" for="Distansiyon">Distansiyon</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Fekal" value="Fekal">
                                                <label class="form-check-label" for="Fekal">Fekal
                                                    inkontinans</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Hemoroid" value="Hemoroid">
                                                <label class="form-check-label" for="Hemoroid">Hemoroid</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="excretionProblems" type="checkbox"
                                                    id="Dışkı" value="Dışkı">
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımŞekli" id="BoşaltımŞekli"
                                value="Yok">
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
                                    <input class="form-check-input" type="radio" name="excretionForm" id="Kolostom" value="Kolostom">
                                    <label class="form-check-label" for="Kolostom">Kolostom</label>
                                </div>
                                <div class="d-flex">

                                    <div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="StomaRengi">Stomanın Rengi: </label>
                                            <input type="text" class="diger form-control" required name="StomaRengi"
                                                id="StomaRengi">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="excretionForm1" type="checkbox" id="Gaz1" value="Gaz">
                                            <label class="form-check-label" for="Gaz1">Gaz</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm1" type="checkbox" id="Koku1" value="Koku">
                                            <label class="form-check-label" for="Koku1">Koku</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm1" type="checkbox" id="DışkıSızıntısı"
                                                value="Dışkı sızıntısı">
                                            <label class="form-check-label" for="DışkıSızıntısı1">Dışkı
                                                sızıntısı</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm1" type="checkbox" id="Deri_irritasyonu"
                                                value="Deri irritasyonu">
                                            <label class="form-check-label" for="Deri_irritasyonu1">Deri
                                                irritasyonu</label>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="protezlertable">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="excretionForm" id="İleostomi" value="İleostomi">
                                    <label class="form-check-label" for="İleostomi">İleostomi</label>
                                </div>
                                <div class="d-flex">

                                    <div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="StomanınRengi">Stomanın Rengi: </label>
                                            <input type="text" class="diger form-control" required name="StomanınRengi"
                                                id="StomanınRengi">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="excretionForm2" type="checkbox" id="Gaz" value="Gaz">
                                            <label class="form-check-label" for="Gaz">Gaz:</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm2" type="checkbox" id="Koku" value="Koku">
                                            <label class="form-check-label" for="Koku">Koku</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm2" type="checkbox" id="Dışkı_sızıntısı"
                                                value="Dışkı sızıntısı">
                                            <label class="form-check-label" for="Dışkı_sızıntısı">Dışkı
                                                sızıntısı</label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" name="excretionForm2" type="checkbox" id="Deri_irritasyonu"
                                                value="Deri irritasyonu">
                                            <label class="form-check-label" for="Deri_irritasyonu">Deri
                                                irritasyonu</label>
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">

                        <div class="form-check">
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2"
                                                    id="protezlertable2" value="Bağımsız">
                                                <label class="form-check-label" for="protezlertable2">Bağımsız
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2"
                                                    id="protezlertable2" value="Yarı bağımlı">
                                                <label class="form-check-label" for="protezlertable2">Yarı bağımlı
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="protezlertable2"
                                                    id="protezlertable2" value="Bağımlı">
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımdaSorun" id="BoşaltımdaSorun"
                                value="Yok">
                            <label class="form-check-label" for="BoşaltımdaSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="BoşaltımdaSorun" id="BoşaltımdaSorun"
                                value="Var">
                            <label class="form-check-label" for="BoşaltımdaSorun">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Üriner_inkontinans1" name="excretionIssues"
                                                    value="Üriner inkontinans">
                                                <label class="form-check-label" for="Üriner_inkontinans1">Üriner
                                                    inkontinans</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="Dizüri1" name="excretionIssues"
                                                    value="Dizüri">
                                                <label class="form-check-label" for="Dizüri1">Dizüri</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="UrinerDiğer" name="excretionIssues"
                                                    value="Diğer">
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Mesane_kateterizasyonu"
                                id="Mesane_kateterizasyonu" value="Yok">
                            <label class="form-check-label" for="Mesane_kateterizasyonu">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check d-flex">
                            <input class="form-check-input" type="radio" name="Mesane_kateterizasyonu"
                                id="Mesane_kateterizasyonu" value="Var">
                            <label class="form-check-label" for="Mesane_kateterizasyonu">
                                <span class="checkbox-header"> Sorun Var</span>

                            </label>
                            <div class="d-flex justify-content-start">
                                <div class="form-check">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Takılma Tarihi: </span>
                                    </label>
                                    <input type="text" class="form-control diger" required name="mesane_takilma_tarihi"
                                        id="mesane_takilma_tarihi">
                                </div>
                                <div>
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Takılma Amacı: </span>
                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="attachmentPurpose"
                                                            id="Boşaltım" value="Boşaltım">
                                                        <label class="form-check-label" for="Boşaltım">Boşaltım</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="Mesane_irrigasyonu" name="attachmentPurpose"
                                                            value="Mesane_irrigasyonu">
                                                        <label class="form-check-label" for="Mesane irrigasyonu">Mesane irrigasyonu</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="attachmentPurpose"
                                                            id="Mesane_instilasyonu" value="Mesane instilasyonu">
                                                        <label class="form-check-label" for="Mesane_instilasyonu">Mesane instilasyonu</label>
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Üreterestomi" id="Üreterestomi"
                                value="Yok">
                            <label class="form-check-label" for="Üreterestomi">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Üreterestomi" id="Üreterestomi"
                                value="Var">
                            <label class="form-check-label" for="Üreterestomi">
                                <span class="checkbox-header"> Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="ureter" type="checkbox" id="sağ" value="sağ">
                                                <label class="form-check-label" for="sağ">sağ </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="ureter" type="checkbox" id="sol" value="sol">
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi"
                                value="Açık sarı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header">Açık sarı</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi"
                                value="Koyu sarı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Koyu sarı</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi"
                                value="Açık kırmızı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Açık kırmızı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarRengi" id="IdrarRengi"
                                value="Koyu kırmızı">
                            <label class="form-check-label" for="IdrarRengi">
                                <span class="checkbox-header"> Koyu kırmızı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">

                <p class="usernamelabel">İdrarın berraklığı </p>
                <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarBerrakligi" id="IdrarBerrakligi"
                                value="Berrak">
                            <label class="form-check-label" for="IdrarBerrakligi">
                                <span class="checkbox-header">Berrak </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IdrarBerrakligi" id="IdrarBerrakligi"
                                value="Bulanık">
                            <label class="form-check-label" for="IdrarBerrakligi">
                                <span class="checkbox-header">Bulanık</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
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

</script>
<script>
    var stoolEmptyingHelp = "<?php echo $bosaltim['stoolEmptyingHelp']; ?>";
    $('[name="stoolEmptyingHelp"][value="'+stoolEmptyingHelp+'"]').attr('checked', true);

    var hospitalStoolEmptyingFrequency = "<?php echo $bosaltim['hospitalStoolEmptyingFrequency']; ?>";
    $('[name="hospitalStoolEmptyingFrequency"]').val(hospitalStoolEmptyingFrequency);

    var hospitalStoolEmptyingDate = "<?php echo $bosaltim['hospitalStoolEmptyingDate']; ?>";
    $('[name="hospitalStoolEmptyingDate"]').val(hospitalStoolEmptyingDate);

    var BoşaltımSorun = "<?php echo $bosaltim['bosaltimSorun']; ?>";
    $('[name="BoşaltımSorun"][value="'+BoşaltımSorun+'"]').attr('checked', true);

    if ($('[name="BoşaltımSorun"]:checked').val() === "Var"){
        var excretionProblems = <?php echo $bosaltim['excretionProblems']; ?>;
        
        excretionProblems.forEach(function(value) {
                    $('[name="excretionProblems"][value="'+value+'"]').prop('checked', true);
                })
        $('[name="excretionProblems"]').prop('disabled', false);
    } else {
        $('[name="excretionProblems"]').prop('disabled', true);
    }

    $('[name="BoşaltımSorun"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Var"){
            $('[name="excretionProblems"]').prop('disabled', false);
        } else {
            $('[name="excretionProblems"]').prop('checked', false).prop('disabled', true);
        }
    })

    var bagirsak_sesleri = "<?php echo $bosaltim['bagirsak_sesleri']; ?>";
    $('[name="bagirsak_sesleri"]').val(bagirsak_sesleri);

    var defekasyon_zamani = "<?php echo $bosaltim['defekasyon_zamani']; ?>";
    $('[name="defekasyon_zamani"]').val(defekasyon_zamani);

    var defekasyon_tekrari = "<?php echo $bosaltim['defekasyon_tekrari']; ?>";
    $('[name="defekasyon_tekrari"]').val(defekasyon_tekrari);

    var protezlertable2 = "<?php echo $bosaltim['protezlertable']; ?>";
    $('[name="protezlertable2"][value="'+protezlertable2+'"]').attr('checked', true);

    var BoşaltımŞekli = "<?php echo $bosaltim['bosaltimSekli']; ?>";
    $('[name="BoşaltımŞekli"][value="'+BoşaltımŞekli+'"]').attr('checked', true);

    if (BoşaltımŞekli == "Var"){
        $('[name="excretionForm"]').prop('disabled', false);
        var excretionForm = "<?php echo $bosaltim['excretionForm']; ?>";
        $('[name="excretionForm"][value="'+excretionForm+'"]').attr('checked', true);
        if (excretionForm == "Kolostom") {
            var excretionForm1 = <?php echo $bosaltim['kolostomExcretionForm']; ?>;
            var kolostomStomaninRengi = "<?php echo $bosaltim['kolostomStomaninRengi']; ?>";
            excretionForm1.forEach(function(value) {
                    $('[name="excretionForm1"][value="'+value+'"]').prop('checked', true);
                })
            $('[name="StomaRengi"]').val(kolostomStomaninRengi).attr('disabled', false);
            $('[name="excretionForm1"]').prop('disabled', false);
            $('[name="StomanınRengi"]').attr('disabled', true);
            $('[name="excretionForm2"]').prop('disabled', true);
        } else {
            var excretionForm2 = <?php echo $bosaltim['ileostomiExcretionForm']; ?>;
            var ileostomiStomaninRengi = "<?php echo $bosaltim['ileostomiStomaninRengi']; ?>";
            excretionForm2.forEach(function(value) {
                    $('[name="excretionForm2"][value="'+value+'"]').prop('checked', true);
                })
            $('[name="StomanınRengi"]').val(ileostomiStomaninRengiStomaninRengi).attr('disabled', false);
            $('[name="excretionForm2"]').prop('disabled', false);
            $('[name="StomanRengi"]').attr('disabled', true);
            $('[name="excretionForm1"]').prop('disabled', true);
        }

    } else {
        $('[name="excretionForm"]').prop('disabled', true);
        $('[name="StomaRengi"]').attr('disabled', true);
        $('[name="excretionForm1"]').prop('disabled', true);
        $('[name="StomanınRengi"]').attr('disabled', true);
        $('[name="excretionForm2"]').prop('disabled', true);
    }

    $('[name="BoşaltımŞekli"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Var"){
            $('[name="excretionForm"]').prop('disabled', false);
            $('[name="StomaRengi"]').attr('disabled', true);
            $('[name="excretionForm1"]').prop('disabled', true);
            $('[name="StomanınRengi"]').attr('disabled', true);
            $('[name="excretionForm2"]').prop('disabled', true);
        } else {
            $('[name="excretionForm"]').prop('checked', false).prop('disabled', true);
            $('[name="StomaRengi"]').val('').attr('disabled', true);
            $('[name="excretionForm1"]').prop('checked', false).prop('disabled', true);
            $('[name="StomanınRengi"]').val('').attr('disabled', true);
            $('[name="excretionForm2"]').prop('checked', false).prop('disabled', true);
        }
    })

    $('[name="excretionForm"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Kolostom"){
            $('[name="StomaRengi"]').attr('disabled', false);
            $('[name="excretionForm1"]').prop('disabled', false);
            $('[name="StomanınRengi"]').val('').attr('disabled', true);
            $('[name="excretionForm2"]').prop('checked', false).prop('disabled', true);
        } else {
            $('[name="StomaRengi"]').attr('disabled', true);
            $('[name="excretionForm1"]').val('').prop('checked', false).prop('disabled', true);
            $('[name="StomanınRengi"]').attr('disabled', false);
            $('[name="excretionForm2"]').prop('disabled', false);
        }
    })

    var BoşaltımdaSorun = "<?php echo $bosaltim['bosaltimdaSorun']; ?>";
    $('[name="BoşaltımdaSorun"][value="'+BoşaltımdaSorun+'"]').attr('checked', true);

    if (BoşaltımdaSorun === "Var"){
        var excretionIssues = <?php echo $bosaltim['excretionIssues']; ?>;
        excretionIssues.forEach(function(value) {
                    $('[name="excretionIssues"][value="'+value+'"]').prop('checked', true);
                })
        $('[name="excretionIssues"]').prop('disabled', false);
    } else {
        $('[name="excretionIssues"]').prop('disabled', true);
    }

    $('[name="BoşaltımdaSorun"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Var"){
            $('[name="excretionIssues"]').prop('disabled', false);
        } else {
            $('[name="excretionIssues"]').prop('checked', false).prop('disabled', true);
        }
    })

    var Mesane_kateterizasyonu = "<?php echo $bosaltim['Mesane_kateterizasyonu']; ?>";
    $('[name="Mesane_kateterizasyonu"][value="'+Mesane_kateterizasyonu+'"]').attr('checked', true);

    if (Mesane_kateterizasyonu === "Var"){
        var mesane_takilma_tarihi = "<?php echo $bosaltim['mesane_takilma_tarihi']; ?>";
        var attachmentPurpose = <?php echo $bosaltim['attachmentPurpose']; ?>;
        attachmentPurpose.forEach(function(value) {
                    $('[name="attachmentPurpose"][value="'+value+'"]').prop('checked', true);
                })

        $('[name="attachmentPurpose"]').prop('disabled', false);
        $('[name="mesane_takilma_tarihi"]').val(mesane_takilma_tarihi).prop('disabled', false);
    } else {
        $('[name="attachmentPurpose"]').prop('disabled', true);
        $('[name="mesane_takilma_tarihi"]').prop('disabled', true);
    }

    $('[name="Mesane_kateterizasyonu"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Var"){
            $('[name="attachmentPurpose"]').prop('disabled', false);
            $('[name="mesane_takilma_tarihi"]').prop('disabled', false);
        } else {
            $('[name="attachmentPurpose"]').prop('checked', false).prop('disabled', true);
            $('[name="mesane_takilma_tarihi"]').val('').prop('disabled', true);
        }
    })

    var Üreterestomi = "<?php echo $bosaltim['ureterestomi']; ?>";
    $('[name="Üreterestomi"][value="'+Üreterestomi+'"]').attr('checked', true);

    if ($('[name="Üreterestomi"]:checked').val() === "Var"){
        $('[name="ureter"]').prop('disabled', false);
        var ureter = <?php echo $bosaltim['ureter']; ?>;
        ureter.forEach(function(value) {
                    $('[name="ureter"][value="'+value+'"]').prop('checked', true);
                })
    } else {
        $('[name="ureter"]').prop('disabled', false);
    }

    $('[name="Üreterestomi"]').on('change', function(){
        var selectedValue = $(this).val();

        if (selectedValue === "Var"){
            $('[name="ureter"]').prop('disabled', false);
        } else {
            $('[name="ureter"]').prop('checked', false).prop('disabled', true);
        }
    })

    var Sistostomi = "<?php echo $bosaltim['Sistostomi']; ?>";
    $('[name="Sistostomi"][value="'+Sistostomi+'"]').attr('checked', true);

    var IdrarRengi = "<?php echo $bosaltim['IdrarRengi']; ?>";
    $('[name="IdrarRengi"][value="'+IdrarRengi+'"]').attr('checked', true);

    var IdrarBerrakligi = "<?php echo $bosaltim['IdrarBerrakligi']; ?>";
    $('[name="IdrarBerrakligi"][value="'+IdrarBerrakligi+'"]').attr('checked', true);

</script>
<script>

$('#submit').click(function(e) {

    if (!$('[name="stoolEmptyingHelp"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="stoolEmptyingHelp"]').offset().top
            }, 200);
        $('[name="stoolEmptyingHelp"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="hospitalStoolEmptyingFrequency"]').val() === "") {
        $('.option-error').css('display', 'none');
            $('html, body').animate({
                        scrollTop: $('[name="hospitalStoolEmptyingFrequency"]').offset().top
                    }, 200);
                    //change border color
            $('[name="hospitalStoolEmptyingFrequency"]').css('border-color', 'red');
    } else if ($('[name="hospitalStoolEmptyingDate"]').val() === "") {
        $('.option-error').css('display', 'none');
            $('html, body').animate({
                        scrollTop: $('[name="hospitalStoolEmptyingDate"]').offset().top
                    }, 200);
                    //change border color
            $('[name="hospitalStoolEmptyingDate"]').css('border-color', 'red');
    } else if (!$('[name="BoşaltımSorun"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımSorun"]').offset().top
            }, 200);
        $('[name="BoşaltımSorun"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="BoşaltımSorun"]:checked').val() === "Var" && $('[name="excretionProblems"]:checked').length === 0) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımSorun"]').offset().top
            }, 200);
        $('[name="BoşaltımSorun"]').first().closest('.input-section').find('.option-error').css('display', 'block');
    } else if ($('[name="bagirsak_sesleri"]').val() === "") {
        $('.option-error').css('display', 'none');
            $('html, body').animate({
                        scrollTop: $('[name="bagirsak_sesleri"]').offset().top
                    }, 200);
                    //change border color
            $('[name="bagirsak_sesleri"]').css('border-color', 'red');
    } else if ($('[name="defekasyon_zamani"]').val() === "") {
        $('.option-error').css('display', 'none');
            $('html, body').animate({
                        scrollTop: $('[name="defekasyon_zamani"]').offset().top
                    }, 200);
                    //change border color
            $('[name="defekasyon_zamani"]').css('border-color', 'red');
    } else if ($('[name="defekasyon_tekrari"]').val() === "") {
        $('.option-error').css('display', 'none');
            $('html, body').animate({
                        scrollTop: $('[name="defekasyon_tekrari"]').offset().top
                    }, 200);
                    //change border color
            $('[name="defekasyon_tekrari"]').css('border-color', 'red');
    } else if (!$('[name="BoşaltımŞekli"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımŞekli"]').offset().top
            }, 200);
        $('[name="BoşaltımŞekli"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="BoşaltımŞekli"]:checked').val() === "Var" && !$('[name="excretionForm"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımŞekli"]').offset().top
            }, 200);
        $('[name="BoşaltımŞekli"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="BoşaltımŞekli"]:checked').val() === "Var" && $('[name="excretionForm"]:checked').val() === "Kolostom"
        && $('[name="StomaRengi"]').val() === "") {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                        scrollTop: $('[name="StomaRengi"]').offset().top
                    }, 200);
                    //change border color
        $('[name="StomaRengi"]').css('border-color', 'red');
    } else if ($('[name="BoşaltımŞekli"]:checked').val() === "Var" && $('[name="excretionForm"]:checked').val() === "Kolostom"
        && $('[name="excretionForm1"]:checked').length === 0) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımŞekli"]').offset().top
            }, 200);
        $('[name="BoşaltımŞekli"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="BoşaltımŞekli"]:checked').val() === "Var" && $('[name="excretionForm"]:checked').val() === "İleostomi"
        && $('[name="StomanınRengi"]').val() === "") {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                        scrollTop: $('[name="StomanınRengi"]').offset().top
                    }, 200);
                    //change border color
        $('[name="StomanınRengi"]').css('border-color', 'red');
    } else if ($('[name="BoşaltımŞekli"]').is(':checked') && $('[name="excretionForm"]:checked').val() === "İleostomi"
        && $('[name="excretionForm2"]:checked').length === 0) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımŞekli"]').offset().top
            }, 200);
        $('[name="BoşaltımŞekli"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="protezlertable2"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="protezlertable2"]').offset().top
            }, 200);
        $('[name="protezlertable2"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="BoşaltımdaSorun"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımdaSorun"]').offset().top
            }, 200);
        $('[name="BoşaltımdaSorun"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="BoşaltımdaSorun"]:checked').val() === "Var" && !$('[name="excretionIssues"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="BoşaltımdaSorun"]').offset().top
            }, 200);
        $('[name="BoşaltımdaSorun"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="Mesane_kateterizasyonu"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="Mesane_kateterizasyonu"]').offset().top
            }, 200);
        $('[name="Mesane_kateterizasyonu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="Mesane_kateterizasyonu"]:checked').val() === "Var" && $('[name="mesane_takilma_tarihi"]').val() === "") {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                        scrollTop: $('[name="mesane_takilma_tarihi"]').offset().top
                    }, 200);
                    //change border color
        $('[name="mesane_takilma_tarihi"]').css('border-color', 'red');
    } else if ($('[name="Mesane_kateterizasyonu"]:checked').val() === "Var" && $('[name="attachmentPurpose"]:checked').length === 0){
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="Mesane_kateterizasyonu"]').offset().top
            }, 200);
        $('[name="Mesane_kateterizasyonu"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="Üreterestomi"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="Üreterestomi"]').offset().top
            }, 200);
        $('[name="Üreterestomi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if ($('[name="Üreterestomi"]:checked').val() === "Var" && $('[name="ureter"]:checked').length === 0){
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="Üreterestomi"]').offset().top
            }, 200);
        $('[name="Üreterestomi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="Sistostomi"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="Sistostomi"]').offset().top
            }, 200);
        $('[name="Sistostomi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="IdrarRengi"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="IdrarRengi"]').offset().top
            }, 200);
        $('[name="IdrarRengi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else if (!$('[name="IdrarBerrakligi"]').is(':checked')) {
        $('.option-error').css('display', 'none');
        $('html, body').animate({
                scrollTop: $('[name="IdrarBerrakligi"]').offset().top
            }, 200);
        $('[name="IdrarBerrakligi"]').first().closest('.input-section').find('.option-error').css('display', 'block');
        return false;
    } else {

        e.preventDefault();

        var id = "<?php

                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>";
        var form_id = '<?php echo $form_id ?>';
        var patient_id = "<?php echo $bosaltim['patient_id']; ?>";
        let patient_name = "<?php echo $bosaltim['patient_name']; ?>";
        let yourDate = new Date()
        let creation_date = yourDate.toISOString().split('T')[0];
        let updateDate = yourDate.toISOString().split('T')[0];
        let stoolEmptyingHelp = $('[name="stoolEmptyingHelp"]:checked').val();
        let hospitalStoolEmptyingFrequency = $('[name="hospitalStoolEmptyingFrequency"]').val();
        let hospitalStoolEmptyingDate = $('[name="hospitalStoolEmptyingDate"]').val();
        let bosaltimSorun = $('[name="BoşaltımSorun"]:checked').val();
        var excretionProblemsArr = [];
                $('[name="excretionProblems"]:checked').each(function(){
                    excretionProblemsArr.push($(this).val());
                });
        let excretionProblems = JSON.stringify(excretionProblemsArr);
        let bagirsak_sesleri = $('[name="bagirsak_sesleri"]').val();
        let defekasyon_zamani = $('[name="defekasyon_zamani"]').val();
        let defekasyon_tekrari = $('[name="defekasyon_tekrari"]').val();
        let bosaltimSekli = $('[name="BoşaltımŞekli"]:checked').val();
        let excretionForm = $('[name="excretionForm"]').is('disabled') ? null : $('[name="excretionForm"]:checked').val();
        var kolostomExcretionFormArr = [];
                $('[name="excretionForm1"]:checked').each(function(){
                    kolostomExcretionFormArr.push($(this).val());
                });
        let kolostomExcretionForm = JSON.stringify(kolostomExcretionFormArr);
        let kolostomStomaninRengi = $('[name="StomaRengi"]').is('disabled') ? null : $('[name="StomaRengi"]').val();
        var ileostomiExcretionFormArr = [];
                $('[name="excretionForm2"]:checked').each(function(){
                    ileostomiExcretionFormArr.push($(this).val());
                });
        let ileostomiExcretionForm = JSON.stringify(ileostomiExcretionFormArr);
        let ileostomiStomaninRengi = $('[name="StomanınRengi"]').is('disabled') ? null : $('[name="StomanınRengi"]').val();
        let protezlertable = $("input[type='radio'][name='protezlertable2']:checked").val();
        let bosaltimdaSorun = $("input[name='BoşaltımdaSorun']:checked").val();
        var excretionIssuesArr = [];
                $('[name="excretionIssues"]:checked').each(function(){
                    excretionIssuesArr.push($(this).val());
                });
        let excretionIssues = JSON.stringify(excretionIssuesArr);
        let Mesane_kateterizasyonu = $("input[name='Mesane_kateterizasyonu']:checked").val();
        let mesane_takilma_tarihi = $("input[name='mesane_takilma_tarihi']").is('disabled') ? null : $("input[name='mesane_takilma_tarihi']").val();
        var attachmentPurposeArr = [];
                $('[name="attachmentPurpose"]:checked').each(function(){
                    attachmentPurposeArr.push($(this).val());
                });
        let attachmentPurpose = JSON.stringify(attachmentPurposeArr);
        let ureterestomi = $("input[name='Üreterestomi']:checked").val();
        var ureterArr = [];
                $('[name="ureter"]:checked').each(function(){
                    ureterArr.push($(this).val());
                });
        let ureter = JSON.stringify(ureterArr);
        let Sistostomi = $("input[name='Sistostomi']:checked").val();
        let IdrarRengi = $("input[name='IdrarRengi']:checked").val();
        let IdrarBerrakligi = $("input[name='IdrarBerrakligi']:checked").val();


        $.ajax({
            type: 'POST',
            url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Bosaltim.php',
            data: {
                isUpdate: true,
                form_id: form_id,
                patient_id: patient_id,
                patient_name: patient_name,
                creation_date: creation_date,
                update_date: updateDate,
                stoolEmptyingHelp: stoolEmptyingHelp,
                hospitalStoolEmptyingFrequency: hospitalStoolEmptyingFrequency,
                hospitalStoolEmptyingDate: hospitalStoolEmptyingDate,
                bosaltimSorun: bosaltimSorun,
                excretionProblems: excretionProblems,
                bagirsak_sesleri: bagirsak_sesleri,
                defekasyon_zamani: defekasyon_zamani,
                defekasyon_tekrari: defekasyon_tekrari,
                bosaltimSekli: bosaltimSekli,
                excretionForm: excretionForm,
                kolostomExcretionForm: kolostomExcretionForm,
                kolostomStomaninRengi: kolostomStomaninRengi,
                ileostomiExcretionForm: ileostomiExcretionForm,
                ileostomiStomaninRengi: kolostomStomaninRengi,
                protezlertable: protezlertable,
                bosaltimdaSorun: bosaltimdaSorun,
                excretionIssues: excretionIssues,
                Mesane_kateterizasyonu: Mesane_kateterizasyonu,
                mesane_takilma_tarihi: mesane_takilma_tarihi,
                attachmentPurpose: attachmentPurpose,
                ureterestomi: ureterestomi,
                ureter: ureter,
                Sistostomi: Sistostomi,
                IdrarRengi: IdrarRengi,
                IdrarBerrakligi: IdrarBerrakligi
            },
            success: function(data) {
                alert("Başarılı");
                location.reload(true)
                alert(data);
                let url =
                    "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                    patient_id + "&patient_name=" + encodeURIComponent(patient_name);
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
</body>
</html>