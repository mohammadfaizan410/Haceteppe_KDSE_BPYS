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
            <h1 class="form-header">ÇALIŞMA, ÜRETME, BOŞ ZAMANINI DEĞERLENDİRME GEREKSİNİMİ</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel ">Düzenli bir işte çalışma durumu </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="DuzenliCalisma" id="DuzenliCalisma"
                                value="Çalışmıyor">
                            <label class="form-check-label" for="DuzenliCalisma">
                                <span class="checkbox-header">Çalışmıyor</span>
                            </label>
                            <div>

                                <label class="form-check-label" for="beslenmeileumuradio">
                                    <span class="checkbox-header">Süre:</span>
                                </label>
                                <input type="text" class="form-control diger" name="CalismiyorSure" id="CalismiyorSure">
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="DuzenliCalisma" id="DuzenliCalisma"
                                value="Çalışıyor">
                            <label class="form-check-label" for="DuzenliCalisma">
                                <span class="checkbox-header">Çalışıyor </span>
                            </label>
                            <div>

                                <label class="form-check-label" for="beslenmeileumuradio">
                                    <span class="checkbox-header">Süre:</span>
                                </label>
                                <input type="text" class="form-control diger" name="CalisiyorSure" id="CalisiyorSure">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Hastalığına bağlı iş yaşamına ara verme durumu </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IsIzni" id="IsIzni" value="Yok">
                            <label class="form-check-label" for="IsIzni">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="IsIzni" id="IsIzni" value="Var">
                            <label class="form-check-label" for="IsIzni">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="IsIzniDiger" id="IsIzniDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Sağlığı tehdit eden mesleki riskler </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="MeslekRiski" id="MeslekRiski"
                                value="Yok">
                            <label class="form-check-label" for="MeslekRiski">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="MeslekRiski" id="MeslekRiski"
                                value="Var">
                            <label class="form-check-label" for="MeslekRiski">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="MeslekRiskiDiger" id="MeslekRiskiDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Birlikte yaşadığı aile bireyleri </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="AileBireyleri" id="AileBireyleri"
                                value="option1">
                            <label class="form-check-label" for="AileBireyleri">
                                <span class="checkbox-header">Belirtiniz:</span>
                            </label>
                            <input type="text" class="form-control diger" name="AileBireyleriDiger"
                                id="AileBireyleriDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel ">Çocuk sayısı:</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="CocukSayisi" id="CocukSayisi"
                                value="option1">
                            <label class="form-check-label" for="CocukSayisi">
                                <span class="checkbox-header">Belirtiniz:</span>
                            </label>
                            <input type="text" class="form-control diger" name="CocukSayisiDiger" id="CocukSayisiDiger">
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Aile içindeki rolü:</p>
                <input type="text" class="form-control" name="AileRolu" id="AileRolu">
            </div>

            <div class="input-section d-flex">
                <p class="usernamelabel">Hobileri (Belirtiniz) :</p>
                <input type="text" class="form-control" name="Hobi" id="Hobi">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Hastane ortamındaki sosyal aktiviteleri:</p>

                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes ">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="TV izleme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">TV izleme</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="Gazete, kitap, dergi vs. okuma">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Gazete, kitap, dergi vs. okuma </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="Sohbet etme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Sohbet etme </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="El işi vs">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">El işi vs </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="Radyo dinleme">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Radyo dinleme </span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="HastaneAktivite" id="HastaneAktivite"
                                value="Diğer">
                            <label class="form-check-label" for="HastaneAktivite">
                                <span class="checkbox-header">Diğer: </span>
                            </label>
                            <input type="text" class="form-control diger" name="HastaneAktiviteDiger"
                                id="HastaneAktiviteDiger">
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
                let DuzenliCalisma = $("input[name='DuzenliCalisma']:checked").val();
                let CalismiyorSure = $("input[type='radio'][name='CalismiyorSure']").val();
                let CalisiyorSure = $("input[type='radio'][name='CalisiyorSure']").val();
                let IsIzni = $("input[type='radio'][name='IsIzni']:checked").val();
                let IsIzniDiger = $("input[type='radio'][name='IsIzniDiger']").val();
                let MeslekRiski = $("input[type='radio'][name='MeslekRiski']:checked").val();
                let MeslekRiskiDiger = $("input[type='radio'][name='MeslekRiskiDiger']").val();
                let AileBireyleri = $("input[type='radio'][name='AileBireyleri']:checked").val();
                let AileBireyleriDiger = $("input[type='radio'][name='AileBireyleriDiger']").val();
                let CocukSayisi = $("input[type='radio'][name='CocukSayisi']:checked").val();
                let CocukSayisiDiger = $("input[type='radio'][name='CocukSayisiDiger']").val();
                let AileRolu = $("input[type='radio'][name='AileRolu']").val();
                let Hobi = $("input[type='radio'][name='Hobi']").val();
                let HastaneAktivite = $("input[type='radio'][name='HastaneAktivite']:checked").val();
                let HastaneAktiviteDiger = $("input[type='radio'][name='HastaneAktiviteDiger']").val();



                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: 'student-patient.php',
                    data: {
                        DuzenliCalisma: DuzenliCalisma,
                        CalismiyorSure: CalismiyorSure,
                        CalisiyorSure: CalisiyorSure,
                        IsIzni: IsIzni,
                        IsIzniDiger: IsIzniDiger,
                        MeslekRiski: MeslekRiski,
                        MeslekRiskiDiger: MeslekRiskiDiger,
                        AileBireyleri: AileBireyleri,
                        AileBireyleriDiger: AileBireyleriDiger,
                        CocukSayisi: CocukSayisi,
                        CocukSayisiDiger: CocukSayisiDiger,
                        AileRolu: AileRolu,
                        Hobi: Hobi,
                        HastaneAktivite: HastaneAktivite,
                        HastaneAktiviteDiger: HastaneAktiviteDiger

                    },
                    success: function(data) {
                        alert("Başarılı");
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