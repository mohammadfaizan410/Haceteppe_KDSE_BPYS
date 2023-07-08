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


    <!-- Template Stylesheet -->
    

    <style>
        .send-patient {
            align-self: center;
        }
        body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

#tick-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: none; /* Hide the tick container initially */
  align-items: center;
  justify-content: center;
  z-index: 9999;
  background-color: #ffffff;
}

#tick {
  width: 50%;
  height: 50%;
  background-size: contain;
  background-repeat: no-repeat;
  position: absolute;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) translateX(25%);
}
    </style>

</head>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="send-patient">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Basınç Yarası Formu</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;font-size:large">Değerlendirme Kriterleri</p>
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Oluşma Tarihi:</p>
                            <input type="date" class="form-control" required name="occurance_date" id="diger" placeholder="OluşmaTarihi">
                        </div>

                        <div class="input-section">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="servis" id="serviceWound" value="yes">
                                <label class="form-check-label" for="servis">
                                    <span class="checkbox-header">Yara serviste oluşmadı</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yeri:</p>
                            <input type="text" class="form-control" required name="location" id="location" placeholder="Yara Yerini Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Evresi:</p>
                            <input type="text" class="form-control" required name="stage" id="stage" placeholder="Yara Evresini Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Boyut (cm):</p>
                                    <p class="usernamelabel pb-3">Uzunluk:</p>
                                    <input type="number" class="form-control" required name="length" id="length" placeholder="Uzunluk Giriniz" min="0" max="1000">
                                    <p class="usernamelabel pb-3">Genişlik:</p>
                                    <input type="number" class="form-control" required name="width" id="width" placeholder="Genişlik Giriniz" min="0" max="1000">
                                    <p class="usernamelabel pb-3">Derinlik:</p>
                                    <input type="number" class="form-control" required name="depth" id="depth" placeholder="Derinlik Giriniz" min="0" max="1000">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara eksudası:</p>
                            <input type="text" class="form-control" required name="diger" id="wound-exudate" placeholder="Yara Eksudasını Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara görünümü:</p>
                            <p class="option-error" style="color : red; display : none">Lütfen bir seçenek belirleyin</p>
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
                                        <p class="usernamelabel pb-3">Diğer:</p>
                                        <input type="text" class="form-control" required name="YaraGörünümüDiger" id="diger" placeholder="Diğer">
                                </div>
                        </div>
                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yarada koku :</p>
                            <input type="text" class="form-control" required name="odor" id="odor" placeholder="Koku Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yarada tünelleşme:</p>
                            <input type="text" class="form-control" required name="tunnelling" id="tunnelling" placeholder="Tünelleşme Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yarada ödem:</p>
                            <input type="text" class="form-control" required name="edema" id="edema" placeholder="Ödem Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara kenarında maserasyon:</p>
                            <input type="text" class="form-control" required name="maceration" id="maceration" placeholder="Maserasyon Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara kenarında eritem:</p>
                            <input type="text" class="form-control" required name="erythema" id="erythema" placeholder="Eritem Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara kenarı soyulmuş:</p>
                            <input type="text" class="form-control" required name="peeling" id="peeling" placeholder="Sotulma Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara kenarı kuru:</p>
                            <input type="text" class="form-control" required name="dryness" id="dryness" placeholder="Kuruluk Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Yara bölgesinde ağrı:</p>
                            <input type="text" class="form-control" required name="pain" id="pain" placeholder="Ağrı Durumunu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Kullanılan Bakım Ürünleri:</p>
                            <input type="text" class="form-control" required name="careProducts" id="careProducts" placeholder="Kullanılan Ürünleri Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">Sonuç:</p>
                            <input type="text" class="form-control" required name="result" id="result" placeholder="Sonucu Giriniz" maxlength="500">
                        </div>

                        <div class="input-section">
                            <p class="usernamelabel pb-3">İyileşme Tarihi:</p>
                            <input type="date" class="form-control" required name="healingDate" id="healingDate" placeholder="İyileşmeTarihi">
                        </div>

                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            var chosenRadio = $('[name="YaraGörünümü"]');
            var chosenOther = $('[name="YaraGörünümüDiger"]');
            
            chosenOther.attr('disabled', true);

            chosenRadio.on('change', function(){
                var selectedValue = $(this).val();

                if (selectedValue === "Diğer"){
                    chosenOther.attr('disabled', false);
                } else {
                    chosenOther.val('');
                    chosenOther.attr('disabled', true);
                }
            });

        })

        $(function() {
            $('#closeBtn1').click(function(e) {
                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
                    "&patient_name=" + encodeURIComponent(patient_name);
                $("#content").load(url);

            })
        });
    </script>

    <script>
        $(function() {

            $('#submit').click(function(e) {
                e.preventDefault();

                if ($('[name="occurance_date"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="occurance_date"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="occurance_date"]').css('border-color', 'red');
                } else if ($('[name="location"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="location"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="location"]').css('border-color', 'red');
                } else if ($('[name="stage"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="stage"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="stage"]').css('border-color', 'red');
                } else if ($('[name="length"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="length"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="length"]').css('border-color', 'red');
                } else if ($('[name="width"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="width"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="width"]').css('border-color', 'red');
                } else if ($('[name="depth"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="depth"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="depth"]').css('border-color', 'red');
                } else if ($('[name="diger"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="diger"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="diger"]').css('border-color', 'red');
                } else if (!$('[name="YaraGörünümü"]').is(':checked')) {
                    $('html, body').animate({
                            scrollTop: $('.option-error').first().offset().top
                        }, 200);
                        // Display error message
                    $('.option-error').css('display', 'block');
                } else if ($('[name="YaraGörünümü"]:checked').val() === "Diğer" && $('#diger').val() === '') {
                    $('html, body').animate({
                            scrollTop: $('#diger').offset().top
                        }, 200);
                        //change border color
                    $('#diger').css('border-color', 'red');
                } else if ($('[name="odor"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="odor"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="odor"]').css('border-color', 'red');
                } else if ($('[name="tunnelling"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="tunnelling"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="tunnelling"]').css('border-color', 'red');
                } else if ($('[name="edema"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="edema"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="edema"]').css('border-color', 'red');
                } else if ($('[name="maceration"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="maceration"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="maceration"]').css('border-color', 'red');
                } else if ($('[name="erythema"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="erythema"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="erythema"]').css('border-color', 'red');
                } else if ($('[name="peeling"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="peeling"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="peeling"]').css('border-color', 'red');
                } else if ($('[name="dryness"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="dryness"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="dryness"]').css('border-color', 'red');
                } else if ($('[name="pain"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="pain"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="pain"]').css('border-color', 'red');
                } else if ($('[name="careProducts"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="careProducts"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="careProducts"]').css('border-color', 'red');
                } else if ($('[name="result"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="result"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="result"]').css('border-color', 'red');
                } else if ($('[name="healingDate"]').val() === "") {
                    $('html, body').animate({
                            scrollTop: $('[name="healingDate"]').offset().top
                        }, 200);
                        //change border color
                    $('[name="healingDate"]').css('border-color', 'red');
                } else {
                    
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
                    var dimentions =length + '/' + width + '/' + depth;;
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
                        url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm7.php',
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
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" +
                                patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                                $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 1000);
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

            });
        });
    </script>
    
</body>

</html>