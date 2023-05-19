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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">

    <style>
        .send-patient {
            align-self: center;
        }
    </style>

</head>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Basınç Yarası Formu</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Değerlendirme Kriterleri</p>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Oluşma Tarihi:</p>
                            <input type="date" class="form-control" required name="occurance_date" id="diger" placeholder="OluşmaTarihi">
                        </div>

                        <div class="input-section d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="servis" id="serviceWound" value="yes">
                                <label class="form-check-label" for="servis">
                                    <span class="checkbox-header">Yara serviste oluşmadı</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yeri:</p>
                            <input type="text" class="form-control" required name="location" id="location" placeholder="Yara Yerini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Evresi:</p>
                            <input type="text" class="form-control" required name="stage" id="stage" placeholder="Yara Evresini Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Boyut (cm):</p>
                            <div class="form-check">
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Uzunluk:</p>
                                    <input type="text" class="form-control" required name="length" id="length" placeholder="Uzunluk Giriniz">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Genişlik:</p>
                                    <input type="text" class="form-control" required name="width" id="width" placeholder="Genişlik Giriniz">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Derinlik:</p>
                                    <input type="text" class="form-control" required name="depth" id="depth" placeholder="Derinlik Giriniz">
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara eksudası:</p>
                            <input type="text" class="form-control" required name="diger" id="wound-exudate" placeholder="Yara Eksudasını Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara görünümü:</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Nekrotik">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Nekrotik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Sarı Nekroz">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Sarı Nekroz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Siyah Eskar">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Siyah Eskar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Kırmızı">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Kırmızı</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Mor">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Mor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Granülasyon">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Granülasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Epitelizasyon">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Epitelizasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü" value="Diğer">
                                    <div class="input-section d-flex">
                                        <p class="usernamelabel">Diğer:</p>
                                        <input type="text" class="form-control" required name="YaraGörünümüDiger" id="diger" placeholder="Diğer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada koku :</p>
                            <input type="text" class="form-control" required name="odor" id="odor" placeholder="Koku Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada tünelleşme:</p>
                            <input type="text" class="form-control" required name="tunnelling" id="tunnelling" placeholder="Tünelleşme Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada ödem:</p>
                            <input type="text" class="form-control" required name="edema" id="edema" placeholder="Ödem Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında maserasyon:</p>
                            <input type="text" class="form-control" required name="maceration" id="maceration" placeholder="Maserasyon Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında eritem:</p>
                            <input type="text" class="form-control" required name="erythema" id="erythema" placeholder="Eritem Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı soyulmuş:</p>
                            <input type="text" class="form-control" required name="peeling" id="peeling" placeholder="Sotulma Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı kuru:</p>
                            <input type="text" class="form-control" required name="dryness" id="dryness" placeholder="Kuruluk Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara bölgesinde ağrı:</p>
                            <input type="text" class="form-control" required name="pain" id="pain" placeholder="Ağrı Durumunu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kullanılan Bakım Ürünleri:</p>
                            <input type="text" class="form-control" required name="careProducts" id="careProducts" placeholder="Kullanılan Ürünleri Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sonuç:</p>
                            <input type="text" class="form-control" required name="result" id="result" placeholder="Sonucu Giriniz">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">İyileşme Tarihi:</p>
                            <input type="date" class="form-control" required name="healingDate" id="healingDate" placeholder="İyileşmeTarihi">
                        </div>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                e.preventDefault();
                console.log("hello from form 7x")
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                var studentId = $('#studentId').val();
                var formId = $('#formId').val();
                var formnum = 7;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var patient_id = "<?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>";
                let yourDate = new Date()
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                var occurance_date = $("input[name='occurance_date']").val();
                var service_wound = $("input[name='servis']").val();
                var location = $("input[name='location']").val();
                var stage = $("input[name='stage']").val();
                var length = $("input[name='length']").val();
                var width = $("input[name='width']").val();
                var depth = $("input[name='depth']").val();
                var dimentions = "" + length + 'cm/' + "" + width + 'cm/' + "" + depth + 'cm';
                var exudate = $('#wound-exudate').val();
                // var appearance_wound =$("input[type='radio'][name='YaraGörünümü']:checked").val() === "Diğer" ? $("input[name='YaraGörünümüDiger']").val() : $("input[type='radio'][name='YaraGörünümü']:checked").val();
                var appearance_wound = $("input[type='radio'][name='YaraGörünümü']:checked").val();
                var odor1 = $("input[name='odor']").val();
                var tunnelling1 = $("input[name='tunnelling']").val();
                var edema1 = $("input[name='edema']").val();
                var maceration1 = $("input[name='maceration']").val();
                var erythema1 = $("input[name='erythema']").val();
                var peeling1 = $("input[name='peeling']").val();
                var dryness1 = $("input[name='dryness']").val();
                var pain1 = $("input[name='pain']").val();
                var careProducts1 = $('#careProducts').val();
                var result1 = $("input[name='result']").val();
                var healingDate = $('#healingDate').val();


                console.log('after setting variables')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/submitOrUpdateForm7.php',
                    data: JSON.stringify({
                        name: name,
                        form_num: formnum,
                        patient_name: patient_name,
                        patient_id: patient_id,
                        creation_date: creationDate,
                        update_date: updateDate,
                        occurance_date: occurance_date,
                        service_wound: service_wound,
                        location: location,
                        stage: stage,
                        dimentions: dimentions,
                        wound_exudate: exudate,
                        appearance_wound: appearance_wound,
                        odor: odor1,
                        tunnelling: tunnelling1,
                        edema: edema1,
                        maceration: maceration1,
                        erythema: erythema1,
                        peeling: peeling1,
                        dryness: dryness1,
                        pain: pain1,
                        care_products: careProducts1,
                        result: result1,
                        healing_date: healingDate
                    }),
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

            });
        });
    </script>
    <script src=""></script>
</body>

</html>