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
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';
$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : '';
$student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
if (isset($_GET['display'])) {
    $display = $_GET['display'];
} else {
    $display = 0;
}
$sql = "SELECT * FROM form7 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger"
                                placeholder="Patient Name" value="<?php echo $form7[0]['patient_name']; ?>" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger"
                                placeholder="Patient ID" value="<?php echo $form7[0]['patient_id']; ?>" disabled>
                        </div>

                        <div class="input-section-item" style="justify-content:space-between; padding: 5%">
                            <p class="usernamelabel" style="font-weight: bold;">Değerlendirme Kriterleri</p>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Oluşma Tarihi:</p>
                            <input type="date" class="form-control" required name="occurance_date" id="diger"
                                placeholder="OluşmaTarihi" value="<?php echo $form7[0]['occurance_date']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="servis" id="serviceWound"
                                    value="yes">
                                <label class="form-check-label" for="servis">
                                    <span class="checkbox-header">Yara serviste oluşmadı</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yeri:</p>
                            <input type="text" class="form-control" required name="location" id="location"
                                placeholder="Yara Yerini Giriniz" value="<?php echo $form7[0]['location']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Evresi:</p>
                            <input type="text" class="form-control" required name="stage" id="stage"
                                placeholder="Yara Evresini Giriniz" value="<?php echo $form7[0]['stage']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Boyut (cm):</p>
                            <div class="form-check">
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Uzunluk:</p>
                                    <input type="number" class="form-control" required name="length" id="length" placeholder="Uzunluk Giriniz" min="0" max="1000">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Genişlik:</p>
                                    <input type="number" class="form-control" required name="width" id="width" placeholder="Genişlik Giriniz" min="0" max="1000">
                                </div>
                                <div class="input-section d-flex">
                                    <p class="usernamelabel">Derinlik:</p>
                                    <input type="number" class="form-control" required name="depth" id="depth" placeholder="Derinlik Giriniz" min="0" max="1000">
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara eksudası:</p>
                            <input type="text" class="form-control" required name="diger" id="wound-exudate"
                                placeholder="Yara Eksudasını Giriniz" value="<?php echo $form7[0]['wound_exudate']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara görünümü:</p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="Nekrotik"
                                        value="Nekrotik">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Nekrotik</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="SarıNekroz"
                                        value="Sarı Nekroz">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Sarı Nekroz</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="SiyahEskar"
                                        value="Siyah Eskar">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Siyah Eskar</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="Kırmızı"
                                        value="Kırmızı">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Kırmızı</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="Mor"
                                        value="Mor">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Mor</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="Granülasyon"
                                        value="Granülasyon">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Granülasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="Epitelizasyon"
                                        value="Epitelizasyon">
                                    <label class="form-check-label" for="YaraGörünümü">
                                        <span class="checkbox-header">Epitelizasyon</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="YaraGörünümü" id="YaraGörünümü"
                                        value="Diğer">
                                    <div class="input-section d-flex">
                                        <p class="usernamelabel">Diğer:</p>
                                        <input type="text" class="form-control" required name="YaraGörünümüDiger"
                                            id="diger" placeholder="Diğer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada koku :</p>
                            <input type="text" class="form-control" required name="odor" id="odor"
                                placeholder="Koku Durumunu Giriniz" value="<?php echo $form7[0]['odor']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada tünelleşme:</p>
                            <input type="text" class="form-control" required name="tunnelling" id="tunnelling"
                                placeholder="Tünelleşme Durumunu Giriniz"
                                value="<?php echo $form7[0]['tunnelling']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yarada ödem:</p>
                            <input type="text" class="form-control" required name="edema" id="edema"
                                placeholder="Ödem Durumunu Giriniz" value="<?php echo $form7[0]['edema']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında maserasyon:</p>
                            <input type="text" class="form-control" required name="maceration" id="maceration"
                                placeholder="Maserasyon Durumunu Giriniz"
                                value="<?php echo $form7[0]['maceration']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarında eritem:</p>
                            <input type="text" class="form-control" required name="erythema" id="erythema"
                                placeholder="Eritem Durumunu Giriniz" value="<?php echo $form7[0]['erythema']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı soyulmuş:</p>
                            <input type="text" class="form-control" required name="peeling" id="peeling"
                                placeholder="Soyulma Durumunu Giriniz" value="<?php echo $form7[0]['peeling']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara kenarı kuru:</p>
                            <input type="text" class="form-control" required name="dryness" id="dryness"
                                placeholder="Kuruluk Durumunu Giriniz" value="<?php echo $form7[0]['dryness']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Yara bölgesinde ağrı:</p>
                            <input type="text" class="form-control" required name="pain" id="pain"
                                placeholder="Ağrı Durumunu Giriniz" value="<?php echo $form7[0]['pain']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Kullanılan Bakım Ürünleri:</p>
                            <input type="text" class="form-control" required name="careProducts" id="careProducts"
                                placeholder="Kullanılan Ürünleri Giriniz"
                                value="<?php echo $form7[0]['careProducts']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sonuç:</p>
                            <input type="text" class="form-control" required name="result" id="result"
                                placeholder="Sonucu Giriniz" value="<?php echo $form7[0]['result']; ?>">
                        </div>

                        <div class="input-section d-flex">
                            <p class="usernamelabel">İyileşme Tarihi:</p>
                            <input type="date" class="form-control" required name="healingDate" id="healingDate"
                                placeholder="İyileşmeTarihi" value="<?php echo $form7[0]['healing_date']; ?>">
                        </div>
                        <?php
                        if ($display == 1) {
                            echo '<input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    $(function() {
        $('#closeBtn1').click(function(e) {
            let patient_name = $("input[name='patient_name']").val();
            let patient_id = parseInt($("input[name='patient_id']").val());
            var url = "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" + patient_id +
                "&patient_name=" + encodeURIComponent(patient_name);
            $("#content").load(url);

        })
    });

    var wound_apperance = "<?php echo $form7[0]['wound_appearance']; ?>"
    console.log($("#serviceWound").val())
    if ($("#serviceWound").val() == "<?php echo $form7[0]['service_wound']; ?>") {
        $("#serviceWound").attr("checked", "checked");
    }
    if (wound_apperance == "Nekrotik") {
        console.log(wound_apperance);

        document.getElementById('Nekrotik').setAttribute('checked', 'checked');
    }
    if (wound_apperance.slice(0, 3) == "Sar") {
        console.log(wound_apperance);

        document.getElementById('SarıNekroz').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Siyah Eskar") {
        console.log(wound_apperance);

        document.getElementById('SiyahEskar').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Kırmızı") {
        console.log(wound_apperance);

        document.getElementById('Kırmızı').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Mor") {
        console.log(wound_apperance);

        document.getElementById('Mor').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Granülasyon") {
        console.log(wound_apperance);

        document.getElementById('Granülasyon').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Epitelizasyon") {
        console.log(wound_apperance);

        document.getElementById('Epitelizasyon').setAttribute('checked', 'checked');
    }
    if (wound_apperance == "Diğer") {
        console.log(wound_apperance);
        document.getElementById('diger').setAttribute('checked', 'checked');
    }
    </script>

    <script>
    $(function() {

        $('#submit').click(function(e) {
            e.preventDefault();
                var form_id = <?php echo $form_id ?>;
                
                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                var form_id = <?php echo $form_id ?>;
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                var studentId = $('#studentId').val();
                var formId = $('#formId').val();
                var formnum = 7;
                let patient_name = $("input[name='patient_name']").val();
                let patient_id = parseInt($("input[name='patient_id']").val());
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
                var dimentions = "" + length + "/" + width + "/" + depth;
                var exudate = $('#wound-exudate').val();
                // var appearance_wound =$("input[type='radio'][name='YaraGörünümü']:checked").val() === "Diğer" ? $("input[name='YaraGörünümüDiger']").val() : $("input[type='radio'][name='YaraGörünümü']:checked").val();
                var appearance_wound = $("input[type='radio'][name='YaraGörünümü']:checked").val() ? $("input[type='radio'][name='YaraGörünümü']:checked").val() : "";
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
                
                console.log("hello from form 7x")


                console.log('after setting variables')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/submitOrUpdateForm7.php',
                    data: JSON.stringify({
                        
                        form_id: form_id,
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
                        care_products: careProducts,
                        result: result1,
                        healing_date: healingDate
                    }),
                    success: function(data) {
                        alert(data)
                        let patient_id  = $("input[name='patient_id']").val();
                        let patient_name = $("input[name='patient_name']").val();
                         let url =
                            "<?php echo $base_url; ?>/updateForms/showSubmittedForms.php?patient_id=" +
                            patient_id + "&patient_name=" + encodeURIComponent(
                                patient_name);
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
            


        });
    });
    </script>
    
</body>

</html>