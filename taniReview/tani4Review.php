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
require_once("../config-students.php");
if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $stmt = $db->prepare("SELECT * from tani4 where patient_id = ?");
    $result = $stmt->execute([$patient_id]);
    if ($result) {
        $taniData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

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
</head>

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
                                $innerHtml = '';
                                $fieldsArray = explode("/", $taniData[0]["matchedfields_string"]);
                                foreach ($fieldsArray as $key => $value) {
                                    if (preg_match("/NaN/", $value)) {
                                        $innerHtml .= "<p style='color:red;'>$value</p>";
                                    } else {
                                        $innerHtml .= "<p>$value</p>";
                                    }
                                };
                                echo $innerHtml;
                                ?>
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator" disabled id="noc_indicator" checked>
                                        <label class="form-check-label" for="noc_indicator">
                                            <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator']" ?></span>
                                        </label>
                                    </div>

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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator2" disabled id="noc_indicator2" checked>
                                        <label class="form-check-label" for="noc_indicator2">
                                            <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator2']" ?></span>
                                        </label>
                                    </div>

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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="noc_indicator3" disabled id="noc_indicator3" checked>
                                        <label class="form-check-label" for="noc_indicator3">
                                            <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator3']" ?></span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>

                </div>
                <div class="input-section d-flex" style="flex-direction: column;">
                    <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                    <?php
                    $nurse_attempt = explode("/", $taniData[0]['nurse_attempt']);
                    foreach ($nurse_attempt as $value) {
                        $trimmed_value = trim($value);
                        if (!empty($trimmed_value)) {
                            echo "<div class='form-check'>
                                        <label class='form-check-label' for='nurse_attempt'>
                                            <span class='checkbox-header'>&#x2713; " . $trimmed_value . "</span>
                                        </label>
                                      </div>";
                        }
                    }
                    ?>
                </div>
                <div class="input-section d-flex" style="flex-direction: column;">
                    <p class="usernamelabel">Eğitim:</p>
                    <?php
                    $nurse_education = explode("/", $taniData[0]['nurse_education']);
                    foreach ($nurse_education as $value) {
                        $trimmed_value = trim($value);
                        if (!empty($trimmed_value)) {
                            echo "<div class='form-check'>
                                        <label class='form-check-label' for='nurse_attempt'>
                                            <span class='checkbox-header'>&#x2713; " . $trimmed_value . "</span>
                                        </label>
                                      </div>";
                        }
                    }
                    ?>
                </div>
                <div class="input-section d-flex" style="flex-direction: column;">
                    <p class="usernamelabel">İş Birliği Gerektiren Uygulamalar:</p>
                    <?php
                    $coop_attempt = explode("/", $taniData[0]['coop_attempt']);
                    foreach ($coop_attempt as $value) {
                        $trimmed_value = trim($value);
                        if (!empty($trimmed_value)) {
                            echo "<div class='form-check'>
                                        <label class='form-check-label' for='nurse_attempt'>
                                            <span class='checkbox-header'>&#x2713; " . $trimmed_value . "</span>
                                        </label>
                                      </div>";
                        }
                    }
                    ?>
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="noc_indicator_after" disabled id="noc_indicator_after" checked>
                                <label class="form-check-label" for="noc_indicator_after">
                                    <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator_after']" ?></span>
                                </label>
                            </div>

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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="noc_indicator2_after" disabled id="noc_indicator2_after" checked>
                                <label class="form-check-label" for="noc_indicator2_after">
                                    <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator2_after']" ?></span>
                                </label>
                            </div>

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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="noc_indicator3_after" disabled id="noc_indicator3_after" checked>
                                <label class="form-check-label" for="noc_indicator3_after">
                                    <span class="checkbox-header"><?php echo "$taniData[0]['noc_indicator3_after']" ?></span>
                                </label>
                            </div>

                        </div>
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
        const noc_indicator = document.querySelectorAll("#noc_indicator");
        noc_indicator.forEach(function(radio) {
            if (radio.value === "something") {
                radio.checked = true;
            }
        });
        const noc_indicator2 = document.querySelectorAll("#noc_indicator2");
        noc_indicator2.forEach(function(radio) {
            if (radio.value === "something") {
                radio.checked = true;
            }
        });
        const noc_indicator_after = document.querySelectorAll("#noc_indicator_after");
        noc_indicator_after.forEach(function(radio) {
            if (radio.value === "something") {
                radio.checked = true;
            }
        });
        const noc_indicator2_after = document.querySelectorAll("#noc_indicator2_after");
        noc_indicator2_after.forEach(function(radio) {
            if (radio.value === "something") {
                radio.checked = true;
            }
        });
    </script>
</body>

</html>