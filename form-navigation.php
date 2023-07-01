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
        <div class="d-flex column" id="form-content">
            <!-- <a href="./formlar/ozgecmis.php" class="form-items" id="form1">Hasta Değerlendirme Formu</a>
            <a href="./formlar/solunumgereksinimi.php" class="form-items" id="form2">Solunum Gereksinimi</a>
            <a href="./formlar/beslenmeGereksinimi.php" class="form-items" id="form3">Beslenme Gereksinimi</a>
            <a href="./formlar/bosaltimform.php" class="form-items" id="form4">Boşaltım Gereksinimi</a>
            <a href="./formlar/hareketForm1.php" class="form-items" id="form5">Hareket Gereksinimi</a>
            <a href="./formlar/uykuForm1.php" class="form-items" id="form6">Uyku Gereksinimi</a>
            <a href="./formlar/vucuduTemizForm1.php" class="form-items" id="form7">Vücudu Temiz ve Bakımlı Tutma</a>
            <a href="./formlar/kateterForm1.php" class="form-items" id="form8">Kateter / Dren</a>
            <a href="./formlar/iletisimForm1.php" class="form-items" id="form9">İletişim Kurma Gereksinimi</a>
            <a href="./formlar/calismaForm1.php" class="form-items" id="form10">Çalışma, Üretme, Boş Zamanını
                Değerlendirme Gereksinimi</a>
            <a href="./formlar/egitimForm1.php" class="form-items" id="form11">Eğitim Gereksinimi</a>
            <a href="./formlar/Form2.php" class="form-items" id="form12">Form 2: Ağrı Tanılama</a>
            <a href="./formlar/Form3.php" class="form-items" id="form13">Form 3: Düşme Riski Değerlendirme</a>
            <a href="./formlar/Form4.php" class="form-items" id="form14">Form 4: Düşme Bildirimi</a>
            <a href="./formlar/Form5.php" class="form-items" id="form15">Form 5: Glaskow Koma Skalası</a>
            <a href="./formlar/Form6.php" class="form-items" id="form16">Form 6: Basınç Yarası Risk Değerlendirmesi</a>
            <a href="./formlar/Form7.php" class="form-items" id="form17">Form 7: Basınç Yarası</a>
            <a href="./formlar/Form8.php" class="form-items" id="form18">Form 8: Ödem Değerlendirme</a>
            <a href="./formlar/siviizlem.php" class="form-items" id="form19">Sıvı İzlem</a>
            <a href="./formlar/bakimplani.php" class="form-items" id="form20">Bakım Planı</a>
            <a href="./formlar/gunlukbakimuygulamalari.php" class="form-items" id="form21">Günlük Bakım Uygulamaları</a>
            <a href="./formlar/medikaltedavi.php" class="form-items" id="form22">Medikal Tedavi</a>
            <a href="./formlar/tetkiksonuclari.php" class="form-items" id="form23">Tetkik Sonuçları</a>
            <a href="./formlar/yasamsalbulgutakibi.php" class="form-items" id="form24">Yaşamsal Bulgu Takibi</a>
            <a href="./formlar/aldigicikardigiizlemi.php" class="form-items" id="form25">Aldığı Çıkardığı İzlemi</a> -->


        </div>
        <div class="navbutton-section">
            <button href="#" class="previous-btn" id="prev-btn">&laquo; Previous</button>
            <button href="#" class="next-btn" id="next-btn">Next &raquo;</button>
        </div>
    </div>



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
        var i = 0;
        $("#form-content").load("./formlar/ozgecmis.php");

        $("#next-btn").on("click", function(e) {
            console.log("nexxttt");
            console.log(i);

            e.preventDefault();
            if (i <= 25 && i >= 0) {
                i += 1;
                if (i == 0) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/ozgecmis.php");
                }
                if (i == 1) {
                    $("#form-content").load(
                        "<?php echo $base_url; ?>/formlar/aldigicikardigiizlemi_form11.php");

                }
                if (i == 2) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/beslenmeGereksinimi.php");
                }
                if (i == 3) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/bosaltimform.php");
                }
                if (i == 4) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/hareketForm1.php");
                }
                if (i == 5) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/uykuForm1.php");
                }
                if (i == 6) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/vucuduTemizForm1.php");
                }
                if (i == 7) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/kateterForm1.php");
                }
                if (i == 8) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/iletisimForm1.php");
                }
                if (i == 9) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/calismaForm1.php");
                }
                if (i == 10) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/egitimForm1.php");
                }
                if (i == 11) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form2.php");
                }
                if (i == 12) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form3.php");
                }
                if (i == 13) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form4.php");
                }
                if (i == 14) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form5.php");
                }
                if (i == 15) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form6.php");
                }

                if (i == 16) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form7.php");
                }
                if (i == 17) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/Form8.php");
                }
                if (i == 18) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/siviizlem.php");
                }
                if (i == 19) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/bakimplani.php");
                }
                if (i == 20) {
                    $("#form-content").load(
                        "<?php echo $base_url; ?>/formlar/gunlukbakimuygulamalari.php");
                }
                if (i == 21) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/medikaltedavi.php");
                }
                if (i == 22) {
                    $("#form-content").load(
                        "<?php echo $base_url; ?>/formlar/tetkiksonuclari_form9.php");
                }
                if (i == 23) {
                    $("#form-content").load(
                        "<?php echo $base_url; ?>/formlar/yasamsalbulgutakibi_form10.php");
                }
                if (i == 24) {
                    $("#form-content").load("<?php echo $base_url; ?>/formlar/solunumgereksinimi.php");
                }
                window.scrollTo(0, 0)
            }
        })

        $("#prev-btn").on("click", function(e) {
            console.log("prevv");
            console.log(i);
            e.preventDefault();
            if (i <= 25 && i > 0) {
                i -= 1;
                if (i == 0) {
                    $("#form-content").load("./formlar/ozgecmis.php");
                }
                if (i == 1) {
                    $("#form-content").load("./formlar/aldigicikardigiizlemi_form11.php");

                }
                if (i == 2) {
                    $("#form-content").load("./formlar/beslenmeGereksinimi.php");
                }
                if (i == 3) {
                    $("#form-content").load("./formlar/bosaltimform.php");
                }
                if (i == 4) {
                    $("#form-content").load("./formlar/hareketForm1.php");
                }
                if (i == 5) {
                    $("#form-content").load("./formlar/uykuForm1.php");
                }
                if (i == 6) {
                    $("#form-content").load("./formlar/vucuduTemizForm1.php");
                }
                if (i == 7) {
                    $("#form-content").load("./formlar/kateterForm1.php");
                }
                if (i == 8) {
                    $("#form-content").load("./formlar/iletisimForm1.php");
                }
                if (i == 9) {
                    $("#form-content").load("./formlar/calismaForm1.php");
                }
                if (i == 10) {
                    $("#form-content").load("./formlar/egitimForm1.php");
                }
                if (i == 11) {
                    $("#form-content").load("./formlar/Form2.php");
                }
                if (i == 12) {
                    $("#form-content").load("./formlar/Form3.php");
                }
                if (i == 13) {
                    $("#form-content").load("./formlar/Form4.php");
                }
                if (i == 14) {
                    $("#form-content").load("./formlar/Form5.php");
                }
                if (i == 15) {
                    $("#form-content").load("./formlar/Form6.php");
                }

                if (i == 16) {
                    $("#form-content").load("./formlar/Form7.php");
                }
                if (i == 17) {
                    $("#form-content").load("./formlar/Form8.php");
                }
                if (i == 18) {
                    $("#form-content").load("./formlar/siviizlem.php");
                }
                if (i == 19) {
                    $("#form-content").load("./formlar/bakimplani.php");
                }
                if (i == 20) {
                    $("#form-content").load("./formlar/gunlukbakimuygulamalari.php");
                }
                if (i == 21) {
                    $("#form-content").load("./formlar/medikaltedavi.php");
                }
                if (i == 22) {
                    $("#form-content").load("./formlar/tetkiksonuclari_form9.php");
                }
                if (i == 23) {
                    $("#form-content").load("./formlar/yasamsalbulgutakibi_form10.php");
                }
                if (i == 24) {
                    $("#form-content").load("./formlar/solunumgereksinimi.php");
                }
                window.scrollTo(0, 0)
            } else if (i < 0) {
                alert("geri gidemezsiniz")
            }
        })
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
    
</body>

</html>