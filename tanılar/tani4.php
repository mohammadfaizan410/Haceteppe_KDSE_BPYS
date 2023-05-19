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

$tanı_respiratory_rate = $_GET['tanı_respiratory_rate'];
$tanı_heart_rate = $_GET['tanı_heart_rate'];
$tanı_spo2_percentage = $_GET['tanı_spo2_percentage'];
$tanı_o2_status = $_GET['tanı_o2_status'];
$tanı_respiratory_nature = $_GET['tanı_respiratory_nature'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">
    <style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
    }

    th {
        background-color: #eee;
    }

    h1 {
        text-align: center;
    }

    tr,
    td {
        width: 200px;
    }
    </style>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sorunla İlişkili Veriler:</p>
                            <div class="matchedfields-wrapper">


                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Sıvı volüm eksikliği </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın 24 saatlik aldığı/çıkardığı sıvıların dengede olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="1: Hastada çok şiddetli düzeyde sıvı kaybı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastada çok şiddetli düzeyde sıvı kaybı
                                            var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2: Hastanın hava yollarında şiddetli düzeyde tıkanıklık var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastada şiddetli düzeyde sıvı kaybı var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="3:Hastada orta düzeyde sıvı kaybı var ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3:Hastada orta düzeyde sıvı kaybı var </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator" value="4:Hastada hafif düzeyde sıvı kaybı var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4:Hastada hafif düzeyde sıvı kaybı var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5:Hastanın aldığı/ çıkardığı sıvılar dengededir">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5:Hastanın aldığı/ çıkardığı sıvılar dengededir
                                        </span>
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın idrar konsantrasyonunun normal olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator2" value="1: Hastanın idrarı ileri derecede yoğundur">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">1: Hastanın idrarı ileri derecede yoğundur</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator2" value="2: Hastanın idrarı yoğundur">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">2: Hastanın idrarı yoğundur</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator2" value="3: Hastanın idrarı orta düzeyde yoğundur">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">3: Hastanın idrarı orta düzeyde yoğundur</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2"
                                        id="noc_indicator2" value="4: Hastanın idrarı biraz yoğundur">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">4: Hastanın idrarı biraz yoğundur</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator2" id="
                                        noc_indicator2"
                                        value="5: Hastanın idrarı normaldir (1005< İdrar dansitesi < 1030)">
                                    <label class="form-check-label" for="noc_indicator2">
                                        <span class="checkbox-header">5: Hastanın idrarı normaldir (1005< İdrar
                                                dansitesi < 1030) </span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın hidrasyon durumunun (derinin ve ağız mukozasının
                                nemliliği, deri turgoru) normal olması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator3"
                                        id="noc_indicator3"
                                        value="1: Hastanın derisi ve ağız mukozası aşırı düzeyde kuru; deri turgoru aşırı zayıflamıştır">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">1: Hastanın derisi ve ağız mukozası aşırı düzeyde
                                            kuru; deri turgoru aşırı zayıflamıştır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator3"
                                        id="noc_indicator3"
                                        value="2: Hastanın derisi ve ağız mukozası çok kuru; deri turgoru çok zayıflamıştır">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">2: Hastanın derisi ve ağız mukozası çok kuru; deri
                                            turgoru çok zayıflamıştır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator3"
                                        id="noc_indicator3"
                                        value="3: Hastanın derisi ve ağız mukozası oldukça kuru; deri turgoru oldukça zayıflamıştır">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">3: Hastanın derisi ve ağız mukozası oldukça kuru;
                                            deri turgoru oldukça zayıflamıştır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator3"
                                        id="noc_indicator3"
                                        value="4: Hastanın derisi ve ağız mukozası biraz kuru; deri turgoru biraz zayıflamıştır">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">4: Hastanın derisi ve ağız mukozası biraz kuru;
                                            deri turgoru biraz zayıflamıştır</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator3" id="
                                        noc_indicator3"
                                        value="5: Hastanın derisi ve ağız mukozasının nemliliği ve deri turgoru normaldir">
                                    <label class="form-check-label" for="noc_indicator3">
                                        <span class="checkbox-header">5: Hastanın derisi ve ağız mukozasının nemliliği
                                            ve deri turgoru normaldir</span>
                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Yaşamsal bulgu takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yaşamsal bulgu takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Hastanın hidrasyon durumu değerlendirilir ( muköz membranların nemliliği, deri turgoru, vb)">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın hidrasyon durumu değerlendirilir ( muköz
                                        membranların nemliliği, deri turgoru, vb)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Baş dönmesi ve postural hipotansiyon varlığı değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Baş dönmesi ve postural hipotansiyon varlığı
                                        değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Hipotansiyon durumunda kontraendike değilse hastaya trandelanburg pozisyonu verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hipotansiyon durumunda kontraendike değilse hastaya
                                        trandelanburg pozisyonu verilir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Hastanın kişi, yer ve zaman oryantasyonu değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kişi, yer ve zaman oryantasyonu
                                        değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Sıvı dengesinin değerlendirilmesi için Aldığı-Çıkardığı takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Sıvı dengesinin değerlendirilmesi için
                                        Aldığı-Çıkardığı takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="Her gün aynı saatte, benzer özellikte kıyafetlerle, günlük kilo takibi yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Her gün aynı saatte, benzer özellikte kıyafetlerle,
                                        günlük kilo takibi yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="Hasta oral sıvı alımı konusunda desteklenir ">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta oral sıvı alımı konusunda desteklenir </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9"
                                    value="Hasta kanama bulguları açısından (hematemez, hemoptizi, melena vb.) izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta kanama bulguları açısından (hematemez,
                                        hemoptizi, melena vb.) izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt10"
                                    value="Laboratuvar bulguları (Hct, Hemoglobin, BUN, Albumin, total protein, serum elektrolitleri) izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Laboratuvar bulguları (Hct, Hemoglobin, BUN, Albumin,
                                        total protein, serum elektrolitleri) izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt11"
                                    value="Hastanın diyaresi varsa; diyarenin sıklığı, gaitanın özellikleri (renk, koku, miktar, kıvam) değerlendirilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın diyaresi varsa; diyarenin sıklığı, gaitanın
                                        özellikleri (renk, koku, miktar, kıvam) değerlendirilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt12"
                                    value="Hastanın kusması varsa; kusmanın sıklığı, içeriğin özellikleri (renk, koku, miktar) değerlendirilir.">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kusması varsa; kusmanın sıklığı, içeriğin
                                        özellikleri (renk, koku, miktar) değerlendirilir.</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt13"
                                    value="Hastanın yara drenajı varsa; drenajın miktarı ve özelliği değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın yara drenajı varsa; drenajın miktarı ve
                                        özelliği değerlendirilir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt14"
                                    value="Hasta ve bakım verenlerine sıvı volüm eksikliği komplikasyonlarının belirtileri öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine sıvı volüm eksikliği
                                        komplikasyonlarının belirtileri öğretilir
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt15"
                                    value="Hasta ve bakım verenlerine aldığı çıkardığı sıvıları nasıl izleyeceği konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine aldığı çıkardığı sıvıları
                                        nasıl izleyeceği konusunda bilgi verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt16"
                                    value="Hasta ve bakım verenlerine  su içmenin önemi konusunda bilgi verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ve bakım verenlerine su içmenin önemi konusunda
                                        bilgi verilir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">İş Birliği Gerektiren Uygulamalar:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt17" value="İstem yapılan sıvıların infüzyonu yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstem yapılan sıvıların infüzyonu yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt"
                                    id="nurse_attempt18" value="İstem yapılan kan ürünlerinin transfüzyonu yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstem yapılan kan ürünlerinin transfüzyonu
                                        yapılır</span>
                                </label>
                            </div>

                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <div class="input-section d-flex">
                                <p class="usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın 24 saatlik aldığı/çıkardığı sıvıların dengede olması
                                </p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="1: Hastada çok şiddetli düzeyde sıvı kaybı var">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">1: Hastada çok şiddetli düzeyde sıvı kaybı
                                                var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after"
                                            value="2: Hastanın hava yollarında şiddetli düzeyde tıkanıklık var ">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">2: Hastada şiddetli düzeyde sıvı kaybı var
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after" value="3:Hastada orta düzeyde sıvı kaybı var ">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">3:Hastada orta düzeyde sıvı kaybı var </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="noc_indicator_after" value="4:Hastada hafif düzeyde sıvı kaybı var">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">4:Hastada hafif düzeyde sıvı kaybı var</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator_after"
                                            id="
                                        noc_indicator_after" value="5:Hastanın aldığı/ çıkardığı sıvılar dengededir">
                                        <label class="form-check-label" for="noc_indicator_after">
                                            <span class="checkbox-header">5:Hastanın aldığı/ çıkardığı sıvılar
                                                dengededir
                                            </span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div class="input-section d-flex">
                                <p class="usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın idrar konsantrasyonunun normal olması</p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator2_after" id="noc_indicator2_after"
                                            value="1: Hastanın idrarı ileri derecede yoğundur">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">1: Hastanın idrarı ileri derecede
                                                yoğundur</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator2_after" id="noc_indicator2_after"
                                            value="2: Hastanın idrarı yoğundur">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">2: Hastanın idrarı yoğundur</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator2_after" id="noc_indicator2_after"
                                            value="3: Hastanın idrarı orta düzeyde yoğundur">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">3: Hastanın idrarı orta düzeyde
                                                yoğundur</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator2_after" id="noc_indicator2_after"
                                            value="4: Hastanın idrarı biraz yoğundur">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">4: Hastanın idrarı biraz yoğundur</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator2_after" id="
                                        noc_indicator2_after"
                                            value="5: Hastanın idrarı normaldir (1005< İdrar dansitesi < 1030)">
                                        <label class="form-check-label" for="noc_indicator2_after">
                                            <span class="checkbox-header">5: Hastanın idrarı normaldir (1005< İdrar
                                                    dansitesi < 1030) </span>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div class="input-section d-flex">
                                <p class="usernamelabel">NOC Çıktıları:</p>
                                <p class="tanıdescription">Hastanın hidrasyon durumunun (derinin ve ağız mukozasının
                                    nemliliği, deri turgoru) normal olması</p>
                            </div>
                            <div class="input-section" id="o2-delivery-container">
                                <p class="usernamelabel">NOC Gösterge: </p>
                                <div class="form-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator3_after" id="noc_indicator3_after"
                                            value="1: Hastanın derisi ve ağız mukozası aşırı düzeyde kuru; deri turgoru aşırı zayıflamıştır">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">1: Hastanın derisi ve ağız mukozası aşırı
                                                düzeyde
                                                kuru; deri turgoru aşırı zayıflamıştır</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator3_after" id="noc_indicator3_after"
                                            value="2: Hastanın derisi ve ağız mukozası çok kuru; deri turgoru çok zayıflamıştır">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">2: Hastanın derisi ve ağız mukozası çok kuru;
                                                deri
                                                turgoru çok zayıflamıştır</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator3_after" id="noc_indicator3_after"
                                            value="3: Hastanın derisi ve ağız mukozası oldukça kuru; deri turgoru oldukça zayıflamıştır">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">3: Hastanın derisi ve ağız mukozası oldukça
                                                kuru;
                                                deri turgoru oldukça zayıflamıştır</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator3_after" id="noc_indicator3_after"
                                            value="4: Hastanın derisi ve ağız mukozası biraz kuru; deri turgoru biraz zayıflamıştır">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">4: Hastanın derisi ve ağız mukozası biraz
                                                kuru;
                                                deri turgoru biraz zayıflamıştır</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required
                                            name="noc_indicator3_after" id="
                                        noc_indicator3_after"
                                            value="5: Hastanın derisi ve ağız mukozasının nemliliği ve deri turgoru normaldir">
                                        <label class="form-check-label" for="noc_indicator3_after">
                                            <span class="checkbox-header">5: Hastanın derisi ve ağız mukozasının
                                                nemliliği
                                                ve deri turgoru normaldir</span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım
                                planında tanımlı tanı olacak. </p>
                            <p class="tanıdescription"> Sorun çözümlendi:
                                5 gösterge seçildiyse; yeni günde bakım planına bu tanıyı taşımayacak
                            </p>
                        </div>
                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script>
    var tanı_respiratory_rate = <?= json_encode($tanı_respiratory_rate, JSON_UNESCAPED_UNICODE); ?>;;
    var tanı_heart_rate = <?= json_encode($tanı_heart_rate, JSON_UNESCAPED_UNICODE); ?>;
    var tanı_spo2_percentage = <?= json_encode($tanı_spo2_percentage, JSON_UNESCAPED_UNICODE); ?>;
    var tanı_o2_status = <?= json_encode($tanı_o2_status, JSON_UNESCAPED_UNICODE); ?>;
    var tanı_respiratory_nature = <?= json_encode($tanı_respiratory_nature, JSON_UNESCAPED_UNICODE); ?>;
    var field_respiratory_rate = document.getElementById('field_respiratory_rate');
    var field_heart_rate = document.getElementById('field_heart_rate');
    var field_spo2_percentage = document.getElementById('field_spo2_percentage');
    var field_o2_status = document.getElementById('field_o2_status');
    var field_respiratory_nature = document.getElementById('field_respiratory_nature');

    var respiratory_rate_string = "Solunum Hızı: " + tanı_respiratory_rate;
    field_respiratory_rate.innerHTML = respiratory_rate_string;

    var heart_rate_string = "Nabız Hızı: " + tanı_heart_rate;
    field_heart_rate.innerHTML = heart_rate_string;

    var spo2_percentage_string = "SpO2: " + tanı_spo2_percentage;
    field_spo2_percentage.innerHTML = spo2_percentage_string;

    var o2_status_string = "O2 Tedavisi: " + tanı_o2_status;
    field_o2_status.innerHTML = o2_status_string;

    var respiratory_nature_string = "Solunumun Özelliği: " + tanı_respiratory_nature;
    field_respiratory_nature.innerHTML = respiratory_nature_string;

    if (tanı_respiratory_rate < 16 || tanı_respiratory_rate > 20) {
        $('#field_respiratory_rate').css("color", "green");
    } else {
        $('#field_respiratory_rate').css("color", "red");
    }

    if (tanı_respiratory_nature === "Yüzeyel") {
        $('#field_respiratory_nature').css("color", "green");
    } else {
        $('#field_respiratory_nature').css("color", "red");
    }

    var matchedfields_string = respiratory_rate_string + " / " + respiratory_nature_string;
    </script>

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
            var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });
    </script>
    <script>
    $(function() {
        $('#submit').click(function(e) {
            e.preventDefault()
            console.log("submit clicked")
            var id = <?php
                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
            var name = $('#name').val();
            var surname = $('#surname').val();
            var age = $('#age').val();
            var not = $('#not').val();
            let form_num = 15;
            var patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
            let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
            let yourDate = new Date();
            let creationDate = yourDate.toISOString().split('T')[0];
            let updateDate = yourDate.toISOString().split('T')[0];
            let problem_info = matchedfields_string
            let nurse_description = "Gaz değişiminde bozulma"
            let noc_output = "Hastanın oksijen satürasyonun %95’in üzerinde olması"

            let noc_indicator = $("input[type='radio'][name='noc_indicator']:checked").val();

            let noc_indicator_after = $("input[type='radio'][name='noc_indicator_after']:checked")
                .val();

            let noc_indicator2 = $("input[type='radio'][name='noc_indicator2']:checked").val();

            let noc_indicator2_after = $("input[type='radio'][name='noc_indicator2_after']:checked")
                .val();

            let noc_indicator3 = $("input[type='radio'][name='noc_indicator3']:checked").val();

            let noc_indicator3_after = $("input[type='radio'][name='noc_indicator3_after']:checked")
                .val();
            let evaluation =
                "Sorun çözümlendi:5 gösterge seçildiyse;yeni günde bakım planına bu tanıyı taşımayacak Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.";
            console.log("values init")


            let nurse_attempt = "";
            let nurse_education = '';
            let coop_attempt = '';

            var l1 = document.getElementById("nurse_attempt1");
            var l2 = document.getElementById("nurse_attempt2");
            var l3 = document.getElementById("nurse_attempt3");
            var l4 = document.getElementById("nurse_attempt4");
            var l5 = document.getElementById("nurse_attempt5");
            var l6 = document.getElementById("nurse_attempt6");
            var l7 = document.getElementById("nurse_attempt7");
            var l8 = document.getElementById("nurse_attempt8");
            var l9 = document.getElementById("nurse_attempt9");
            var l10 = document.getElementById("nurse_attempt10");
            var l11 = document.getElementById("nurse_attempt11");
            var l12 = document.getElementById("nurse_attempt12");
            var l13 = document.getElementById("nurse_attempt13");
            var l14 = document.getElementById("nurse_attempt14");
            var l15 = document.getElementById("nurse_attempt15");
            var l16 = document.getElementById("nurse_attempt16");
            var l17 = document.getElementById("nurse_attempt17");
            var l18 = document.getElementById("nurse_attempt18");


            if (l1.checked == true) {
                var pl1 = document.getElementById("nurse_attempt1").value;
                nurse_attempt += pl1 + "/";
            }
            if (l2.checked == true) {
                var pl2 = document.getElementById("nurse_attempt2").value;
                nurse_attempt += pl2 + "/";
            }
            if (l3.checked == true) {
                var pl3 = document.getElementById("nurse_attempt3").value;
                nurse_attempt += pl3 + "/";
            }
            if (l4.checked == true) {
                var pl4 = document.getElementById("nurse_attempt4").value;
                nurse_attempt += pl4 + "/";
            }
            if (l5.checked == true) {
                var pl5 = document.getElementById("nurse_attempt5").value;
                nurse_attempt += pl5 + "/";
            }
            if (l6.checked == true) {
                var pl6 = document.getElementById("nurse_attempt6").value;
                nurse_attempt += pl6 + "/";
            }
            if (l7.checked == true) {
                var pl7 = document.getElementById("nurse_attempt7").value;
                nurse_attempt += pl7 + "/";
            }
            if (l8.checked == true) {
                var pl8 = document.getElementById("nurse_attempt8").value;
                nurse_attempt += pl8 + "/";
            }
            if (l9.checked == true) {
                var pl9 = document.getElementById("nurse_attempt9").value;
                nurse_attempt += pl9 + "/";
            }
            if (l10.checked == true) {
                var pl10 = document.getElementById("nurse_attempt10").value;
                nurse_attempt += pl10 + "/";
            }
            if (l11.checked == true) {
                var pl11 = document.getElementById("nurse_attempt11").value;
                nurse_attempt += pl11 + "/";
            }
            if (l12.checked == true) {
                var pl12 = document.getElementById("nurse_attempt12").value;
                nurse_attempt += pl12 + "/";
            }
            if (l13.checked == true) {
                var pl13 = document.getElementById("nurse_attempt13").value;
                nurse_attempt += pl13 + "/";
            }
            if (l14.checked == true) {
                var pl14 = document.getElementById("nurse_attempt14").value;
                nurse_education += pl14 + "/";
            }
            if (l15.checked == true) {
                var pl15 = document.getElementById("nurse_attempt15").value;
                nurse_education += pl15 + "/";
            }
            if (l16.checked == true) {
                var pl16 = document.getElementById("nurse_attempt16").value;
                nurse_education += pl16 + "/";
            }
            if (l17.checked == true) {
                var pl17 = document.getElementById("nurse_attempt17").value;
                coop_attempt += pl17 + "/";
            }
            if (l18.checked == true) {
                var pl18 = document.getElementById("nurse_attempt18").value;
                coop_attempt += pl18 + "/";
            }




            $.ajax({
                type: 'POST',
                url: '<?php echo $base_url; ?>/insertTanalar/tani1Insert.php',
                data: {
                    name: name,
                    surname: surname,
                    age: age,
                    form_num: form_num,
                    patient_id: patient_id,
                    patient_name: patient_name,
                    creation_date: creationDate,
                    update_date: updateDate,
                    problem_info: problem_info,
                    nurse_description: nurse_description,
                    noc_output: noc_output,
                    noc_indicator: noc_indicator,
                    noc_indicator2: noc_indicator2,
                    noc_indicator3: noc_indicator3,
                    noc_indicator_after: noc_indicator_after,
                    noc_indicator2_after: noc_indicator2_after,
                    noc_indicator3_after: noc_indicator3_after,
                    nurse_attempt: nurse_attempt,
                    nurse_education: nurse_education,
                    coop_attempt: coop_attempt,
                    evaluation: evaluation,
                    matchedfields_string: matchedfields_string,
                },
                success: function(data) {
                    console.log("something happened")
                    alert(data);
                    let url =
                        "<?php echo $base_url; ?>/taniReview/tani4Review.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                },
                error: function(data) {
                    console.log(data)
                }
            });
        })
    });
    </script>

</body>

</html>