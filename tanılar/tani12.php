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

// $tanı_respiratory_rate = $_GET['tanı_respiratory_rate'];
// $tanı_heart_rate = $_GET['tanı_heart_rate'];
// $tanı_spo2_percentage = $_GET['tanı_spo2_percentage'];
// $tanı_o2_status = $_GET['tanı_o2_status'];
// $tanı_respiratory_nature = $_GET['tanı_respiratory_nature'];
$BKI = isset($_GET['BKI']) ? $_GET['BKI'] : "NaN";
$permitted_food = isset($_GET['permitted_food']) ? $_GET['permitted_food'] : "NaN";
$nutrition_problem = isset($_GET['nutrition_problem']) ? $_GET['nutrition_problem'] : "NaN";
$excretion_problem = isset($_GET['excretion_problem']) ? $_GET['excretion_problem'] : "NaN";
$language_problem = isset($_GET['language_problem']) ? $_GET['language_problem'] : 'NaN';
$ingestion_problem = isset($_GET['ingestion_problem']) ? $_GET['ingestion_problem'] : 'NaN';
$feeding_problem = isset($_GET['feeding_problem']) ? $_GET['feeding_problem'] : 'NaN';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>e-BYRYS-KKDS</title>
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
                                <?php
                                
                                echo "<p class='matchedfields' id='BKI' style='".($BKI == 'NaN' ? 'color: red' : 'color:blue ' )."'>Bağırsak sesleri: ".$BKI."</p>";
                                echo "<p class='matchedfields' id='permitted_food' style='".($permitted_food == 'NaN' ? 'color:red ' : 'color: blue' )."'>En son defekasyon:".$permitted_food."</p>";
                                echo "<p class='matchedfields' id='nutrition_problem' style='".($nutrition_problem == 'NaN' ? 'color: red' : 'color: blue' )."' >Gaitanın özelliği:".$nutrition_problem."</p>";
                                echo "<p class='matchedfields' id='excretion_problem' style='".($excretion_problem == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$excretion_problem."</p>";
                                echo "<p class='matchedfields' id='language_problem' style='".($language_problem == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$language_problem."</p>";
                                echo "<p class='matchedfields' id='ingestion_problem' style='".($ingestion_problem == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$ingestion_problem."</p>";
                                echo "<p class='matchedfields' id='feeding_problem' style='".($feeding_problem == 'NaN' ? 'color: red' : 'color: blue' )."'>Bağırsak Boşaltım sorunu:".$feeding_problem."</p>";
                                ?>
                            </div>

                        </div>
                         <div class="input-section d-flex">
                            <p class="usernamelabel">Hemşirelik Tanıları:</p>
                            <p class="tanıdescription">Konstipasyon</p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın gaitasının normal özellikte olması </p>
                        </div>
                        

 



                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="1: Hastanın sürekli izin verilenden daha az besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">1: Hastanın sürekli izin verilenden daha az besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="2: Hastanın sık sık izin verilenden daha az besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">2: Hastanın sık sık izin verilenden daha az besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="3: Hastanın bazen izin verilenden daha az besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">3: Hastanın bazen izin verilenden daha az besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator"
                                        id="noc_indicator"
                                        value="4: Hastanın nadiren izin verilenden daha az besin tüketimi var">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">4: Hastanın nadiren izin verilenden daha az besin tüketimi var</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" id="
                                        noc_indicator" value="5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir ">
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header">5: Hasta günlük olarak izin verilen besinlerin tamamını tüketir 
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt1"
                                    value="Hastanın kalori ve besin alımı değerlendirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kalori ve besin alımı değerlendirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt2"
                                    value="Hastanın gıda tercihleri belirlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın gıda tercihleri belirlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt3"
                                    value="Hastaya egzersiz ve gıda alımı için haftalık gerçekçi amaçlar belirlemesine yardımcı olunur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya egzersiz ve gıda alımı için haftalık gerçekçi amaçlar belirlemesine yardımcı olunur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt4"
                                    value="Hastanın kişisel, kültürel ve dini inançlarına uygun yiyecekler sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın kişisel, kültürel ve dini inançlarına uygun yiyecekler sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt5"
                                    value="Hasta ile birlikte yemek çizelgesi, yeme ortamı, hastanın sevdiği ve sevmediği yiyecekler, yiyeceklerin sıcaklığını kapsayacak bir yemek planı geliştirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta ile birlikte yemek çizelgesi, yeme ortamı, hastanın sevdiği ve sevmediği yiyecekler, yiyeceklerin sıcaklığını kapsayacak bir yemek planı geliştirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt6"
                                    value="Hastanın iştahının en yüksek olduğu öğünde en yüksek kalorili besinlerin yenmesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın iştahının en yüksek olduğu öğünde en yüksek kalorili besinlerin yenmesi sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt7"
                                    value="Midede hazımsızlık yaratmamak için az az ve sık sık beslenmesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Midede hazımsızlık yaratmamak için az az ve sık sık beslenmesi sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt8"
                                    value="Yemeklerin tüketilmesi için uygun ortam [göze hoş görünmeyen malzemelerin (sürgü, ördek, aspirasyon vb) ortadan kaldırılması, atıkların uzaklaştırılması, odanın havalandırılması gibi] sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemeklerin tüketilmesi için uygun ortam [göze hoş görünmeyen malzemelerin (sürgü, ördek, aspirasyon vb) ortadan kaldırılması, atıkların uzaklaştırılması, odanın havalandırılması gibi] sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt9"
                                    value="Yutmayı kolaylaştırmak için hastaya yarı oturur ya da dik oturur pozisyon verilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yutmayı kolaylaştırmak için hastaya yarı oturur ya da dik oturur pozisyon verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt10"
                                    value="Yemek öncesi invaziv girişimler yapılmaz">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemek öncesi invaziv girişimler yapılmaz</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt11"
                                    value="Yemek öncesi hastanın yeterli dinlenmesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yemek öncesi hastanın yeterli dinlenmesi sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt12"
                                    value="Aspirasyonu önlemek için hasta yemek sonrası en az 30 dakika yarı oturur ya da dik oturur pozisyonda tutulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Aspirasyonu önlemek için hasta yemek sonrası en az 30 dakika yarı oturur ya da dik oturur pozisyonda tutulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt13"
                                    value="Laboratuvar bulguları (Transferin, Albumin, total protein, elektrolitler) izlenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Laboratuvar bulguları (Transferin, Albumin, total protein, elektrolitler) izlenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt14"
                                    value="Hastayla güvene dayalı, destekleyici bir ilişki kurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastayla güvene dayalı, destekleyici bir ilişki kurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt15"
                                    value="Kilo alımı ve ideal yeme davranışları için hastaya olumlu geri bildirimde bulunulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kilo alımı ve ideal yeme davranışları için hastaya olumlu geri bildirimde bulunulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt16"
                                    value="Çiğneme-yutma güçlüğü olan hastalarda yiyecekler ağızın etkin tarafına yerleştirilerek tüketilmesi sağlanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Çiğneme-yutma güçlüğü olan hastalarda yiyecekler ağızın etkin tarafına yerleştirilerek tüketilmesi sağlanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt17"
                                    value="Çiğneme-yutma güçlüğü olan hastalar gerektiği zaman enjektörle beslenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Çiğneme-yutma güçlüğü olan hastalar gerektiği zaman enjektörle beslenir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt18"
                                    value="Çiğneme-yutma güçlüğü olan hastalar için, gerektiğinde aspirasyon ihtiyacı doğabileceği için yatak yanında aspiratör hazır şekilde bulundurulur">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Çiğneme-yutma güçlüğü olan hastalar için, gerektiğinde aspirasyon ihtiyacı doğabileceği için yatak yanında aspiratör hazır şekilde bulundurulur</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt19"
                                    value="Bulantı ve kusmaya neden olabilecek faktörler belirlenerek, en aza indirilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bulantı ve kusmaya neden olabilecek faktörler belirlenerek, en aza indirilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt20"
                                    value="Bulantı ve kusmayı azaltmak için yemeklerden önce ve sonra ağız bakımı yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bulantı ve kusmayı azaltmak için yemeklerden önce ve sonra ağız bakımı yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt" id="nurse_attempt21"
                                    value="Kusma olması halinde, içeriğin rengi, miktarı ve sıklığı kaydedilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Kusma olması halinde, içeriğin rengi, miktarı ve sıklığı kaydedilir</span>
                                </label>
                            </div>
                            

                            <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın bağırsak seslerinin normal sınırlarda olması </p>
                        </div>
                        
                    



                            <p class="usernamelabel">Eğitim:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt22"
                                    id="nurse_attempt22"
                                    value="Bulantı ve kusmayı azaltmak için hastaya yavaş, derin nefes alma öğretilirr">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bulantı ve kusmayı azaltmak için hastaya yavaş, derin nefes alma öğretilirDüzenli bağırsak boşaltım alışkanlığının geliştirilmesi için eğitim verilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt23"
                                    id="nurse_attempt23"
                                    value="Bakım verenler, hastanın sevdiği ve yemesinde sakınca olmayan yemeklerin temini konusunda teşvik edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Bakım verenler, hastanın sevdiği ve yemesinde sakınca olmayan yemeklerin temini konusunda teşvik edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt24"
                                    id="nurse_attempt24"
                                    value="Hastaya ve bakım verenlerine kalori ve besin alımını nasıl takip edebileceği öğretilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastaya ve bakım verenlerine kalori ve besin alımını nasıl takip edebileceği öğretilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt25"
                                    id="nurse_attempt25"
                                    value="Hasta kendine uygun takma diş kullanımı veya diş bakım alışkanlığı edinmesi için desteklenir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hasta kendine uygun takma diş kullanımı veya diş bakım alışkanlığı edinmesi için desteklenir</span>
                                </label>
                            </div>

                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt26"
                                    id="nurse_attempt26"
                                    value="Günlük kalori gereksinimlerine uygun olan diyetin planlanması için diyetisyenle işbirliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Günlük kalori gereksinimlerine uygun olan diyetin planlanması için diyetisyenle işbirliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt27"
                                    id="nurse_attempt27"
                                    value="Yetersiz protein alan ya da protein kaybeden hastalar (anoreksiya nevroza, glomeruler hastalığı olan ya da diyaliz alan hastalar) için gerekli protein miktarının belirlenmesi için diyetisyenle görüşülür">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yetersiz protein alan ya da protein kaybeden hastalar (anoreksiya nevroza, glomeruler hastalığı olan ya da diyaliz alan hastalar) için gerekli protein miktarının belirlenmesi için diyetisyenle görüşülür</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt28"
                                    id="nurse_attempt28"
                                    value="Yeterli kalori alımının sürdürülmesi için iştah açıcılar, tamamlayıcı besinler, beslenme tüpü ile beslenme ya da TPN’ye ihtiyaç olup olmadığının belirlenmesi için hekimle iş birliği yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeterli kalori alımının sürdürülmesi için iştah açıcılar, tamamlayıcı besinler, beslenme tüpü ile beslenme ya da TPN’ye ihtiyaç olup olmadığının belirlenmesi için hekimle iş birliği yapılır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt29"
                                    id="nurse_attempt29"
                                    value="İstemde yer alan ilaçlar (antiemetikler, analjezikler vb) uygulanır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">İstemde yer alan ilaçlar (antiemetikler, analjezikler vb) uygulanır</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt30"
                                    id="nurse_attempt30"
                                    value="Yeme bozukluğu olan hastaya destek sağlanması için gerekli birimlere/kurumlara sevk edilir">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Yeme bozukluğu olan hastaya destek sağlanması için gerekli birimlere/kurumlara sevk edilir</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nurse_attempt31"
                                    id="nurse_attempt31"
                                    value="Hastanın yeterli yiyeceği satın alma ya da hazırlama konusunda sıkıntıları varsa, bu ihtiyacı karşılayabilecek organlar hakkında (belediyeler, valilik, sosyal yardım kuruluşları vb.) bilgilendirme yapılır">
                                <label class="form-check-label" for="nurse_attempt">
                                    <span class="checkbox-header">Hastanın yeterli yiyeceği satın alma ya da hazırlama konusunda sıkıntıları varsa, bu ihtiyacı karşılayabilecek organlar hakkında (belediyeler, valilik, sosyal yardım kuruluşları vb.) bilgilendirme yapılır</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Değerlendirme:</p>
                            <p class="tanıdescription"> Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak.</p>
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
    var BKI = document.getElementById('BKI').innerText;
    var permitted_food = document.getElementById('permitted_food').innerText;
    var nutrition_problem = document.getElementById('nutrition_problem').innerText;
    var excretion_problem = document.getElementById('excretion_problem').innerText;
    var language_problem = document.getElementById('language_problem').innerText;
    var ingestion_problem = document.getElementById('ingestion_problem').innerText;
    var feeding_problem = document.getElementById('feeding_problem').innerText;

    var matchedfields_string = BKI + " / " + permitted_food + " / " + nutrition_problem +
        " / " + excretion_problem + " / " + language_problem + "/" + language_problem + "/" +ingestion_problem + "/" +  feeding_problem;
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
                let evaluation = "";
                console.log("values init")

                if (noc_indicator == "5: Hastanın oksijen satürasyonunda bozulma yok") {
                    evaluation +=
                        "Sorun çözümlendi:5 gösterge seçildiyse;yeni günde bakım planına bu tanıyı taşımayacak"
                } else {
                    evaluation +=
                        "Sorun devam ediyor: 1-4 gösterge seçildiyse; yeni günde bakım planında tanımlı tanı olacak."
                }
                let nurse_attempt = "";
                let nurse_education = '';
                let collaborative_applications = '';

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
                var l19 = document.getElementById("nurse_attempt19");
                var l20 = document.getElementById("nurse_attempt20");
                var l21 = document.getElementById("nurse_attempt21");
                var l22 = document.getElementById("nurse_attempt22");
                var l23 = document.getElementById("nurse_attempt23");
                var l24 = document.getElementById("nurse_attempt24");
                var l25 = document.getElementById("nurse_attempt25");
                var l26 = document.getElementById("nurse_attempt26");
                var l27 = document.getElementById("nurse_attempt27");
                var l28 = document.getElementById("nurse_attempt28");
                var l29 = document.getElementById("nurse_attempt29");
                var l30 = document.getElementById("nurse_attempt30");
                var l31 = document.getElementById("nurse_attempt31");

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
                    nurse_attempt += pl14 + "/";
                }
                if (l15.checked == true) {
                    var pl15 = document.getElementById("nurse_attempt15").value;
                    nurse_attempt += pl15 + "/";
                }
                if (l16.checked == true) {
                    var pl16 = document.getElementById("nurse_attempt16").value;
                    nurse_attempt += pl16 + "/";
                }
                if (l17.checked == true) {
                    var pl17 = document.getElementById("nurse_attempt17").value;
                    nurse_attempt += pl17 + "/";
                }
                if (l18.checked == true) {
                    var pl18 = document.getElementById("nurse_attempt18").value;
                    nurse_attempt += pl18 + "/";
                }
                if (l19.checked == true) {
                    var pl19 = document.getElementById("nurse_attempt19").value;
                    nurse_attempt += pl19 + "/";
                }
                if (l20.checked == true) {
                    var pl20 = document.getElementById("nurse_attempt20").value;
                    nurse_attempt += pl20 + "/";
                }
                if (l21.checked == true) {
                    var pl21 = document.getElementById("nurse_attempt21").value;
                    nurse_attempt += pl21 + "/";
                }
                if (l22.checked == true) {
                    var pl22 = document.getElementById("nurse_attempt22").value;
                    nurse_education += pl22 + "/";
                }
                if (l23.checked == true) {
                    var pl23 = document.getElementById("nurse_attempt23").value;
                    nurse_education += pl23 + "/";
                }
                if (l24.checked == true) {
                    var pl24 = document.getElementById("nurse_attempt24").value;
                    nurse_education += pl24 + "/";
                }
                if (l25.checked == true) {
                    var pl15 = document.getElementById("nurse_attempt25").value;
                    nurse_education += pl25 + "/";
                }
                if (l26.checked == true) {
                    var pl26 = document.getElementById("nurse_attempt26").value;
                    collaborative_applications += pl26 + "/";
                }
                if (l27.checked == true) {
                    var pl27 = document.getElementById("nurse_attempt27").value;
                    collaborative_applications += pl15 + "/";
                }
                if (l28.checked == true) {
                    var pl28 = document.getElementById("nurse_attempt28").value;
                    collaborative_applications += pl15 + "/";
                }
                if (l29.checked == true) {
                    var pl29 = document.getElementById("nurse_attempt29").value;
                    collaborative_applications += pl15 + "/";
                }
                if (l30.checked == true) {
                    var pl30 = document.getElementById("nurse_attempt30").value;
                    collaborative_applications += pl15 + "/";
                }
                if (l31.checked == true) {
                    var pl31 = document.getElementById("nurse_attempt31").value;
                    collaborative_applications += pl15 + "/";
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
                        nurse_attempt: nurse_attempt,
                        nurse_education :nurse_education,
                        collaborative_applications: collaborative_applications,
                        evaluation: evaluation,
                        matchedfields_string: matchedfields_string,
                    },
                    success: function(data) {
                        console.log("something happened")
                        alert(data);
                        let url =
                            "<?php echo $base_url; ?>/taniReview/tani12Review.php?patient_id=" +
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