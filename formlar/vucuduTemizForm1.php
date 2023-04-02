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
            <h1 class="form-header">VÜCUDU TEMİZ VE BAKIMLI TUTMA</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">En Son Banyo Yaptığı Tarih :</p>
                <input type="date" class="form-control">
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Vücut temizliğini yapmada </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Bağımsız </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Yarı bağımlı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Bağımlı</span>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Banyo Sıklığı: :</p>
                <input type="text" class="form-control">
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Şekli:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Duş/Ayakta </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
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
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Soğuk </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Ilık </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
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
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header"> Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Duş Jeli ı </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger">

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
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Sabun </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Şampuan</span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger">

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
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Losyon </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Krem </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Deodarant/ Parfüm </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Roll-on </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Diğer:</span>
                                <input type="text" class="form-control diger">

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
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Tırnak bakımı </p>
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">El yıkama alışkanlığı </p>
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Perine bakımı </p>
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
                <input type="text" class="form-control w-25">
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Menstrual Hijyen
                </p>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Son adet tarihi </span>
                    </label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="beslenmeileradio">
                        <span class="checkbox-header">Süresi </span>
                    </label>
                    <input type="text" class="form-control">
                </div>
            </div>


            <div class="input-section d-flex">

                <p class="usernamelabel">Menstruasyonda kullandığı Ürün:</p>
                <div class="checkbox-wrapper d-flex align-items-center">
                    <div class="checkboxes">
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                            <label class="form-check-label" for="beslenmeileumuradio">
                                <span class="checkbox-header">Hazır ped </span>
                            </label>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Bez </span>

                            </label>
                        </div>
                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                            <label class="form-check-label" for="beslenmeileradio">
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
                            <input type="text" class="form-control diger">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">Değiştirme sıklığı : </span>
                            </label>
                            <input type="text" class="form-control diger">
                            <label class="form-check-label" for="beslenmeileradio">
                                <span class="checkbox-header">/Gün </span>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="beslenmeileradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Sarı.
                                                            Yeri… </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Soluk
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Kızarıklık. Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Siyanoz.
                                                            Yeri</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Renk
                                                            kaybı</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Pigmentasyon artışı. Yeri</label>
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun yok </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
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
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Normal </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Pürüzlü</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Sert</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Esnek</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Buruşuk</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">İnce</span>
                                        </label>
                                    </div>
                                </div>
                                <div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
                                            <span class="checkbox-header">Düz</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                        <label class="form-check-label" for="beslenmeileumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Normal </span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorum Yok</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Makül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Papül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Vezikül
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Peteşi</label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Purpura</label>
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Yağlı
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Kuru
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Sert
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Yumuşak</label>
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Alopesia</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Seyrek
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Tüylenmede
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1"> Kuruma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Yağlanma
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Kepeklenme</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Parazit</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Kitle.
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1"> Siyanotik
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Soluk
                                                            beyaz</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Sarı
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
                                    <input class="form-check-input" type="radio" name="beslenmeiledurumuradio" id="beslenmeileradio" value="option1">
                                    <label class="form-check-label" for="beslenmeileumuradio">
                                        <span class="checkbox-header">Sorun Yok </span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Var</span>

                                    </label>
                                    <table class="ozgecmistable-wrapper">
                                        <tbody>

                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">
                                                            Çomaklaşma </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Beyaz
                                                            lekeler</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Paronişya
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Diğer
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
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
                                        <span class="checkbox-header">Sorun Yok</span>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beslenmeileradio" id="beslenmeilemuradio" value="option2">
                                    <label class="form-check-label" for="beslenmeileradio">
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