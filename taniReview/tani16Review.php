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
    $stmt = $db->prepare("SELECT * from tani16 where patient_id = ?");
    $result = $stmt->execute([$patient_id]);
    if ($result) {
        $tani16Data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                $fieldsArray = explode("/", $tani14Data[0]["matchedfields_string"]);
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
                            <p class="tanıdescription">Oral mukoz membranda bozulma </p>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastanın muköz membran bütünlüğünün sağlanması </p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" disabled id="noc_indicator" checked>
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header"><?php echo "$tani16Data[0]['noc_indicator']" ?></span>
                                    </label>
                                </div>


                            </div>

                        </div>

                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Hemşirelik Girişimleri:</p>
                            <?php
                            $nurse_attempt = explode("/", $tani16Data[0]['nurse_attempt']);
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
                        <div class="input-section d-flex">
                            <p class="usernamelabel">NOC Çıktıları:</p>
                            <p class="tanıdescription">Hastada ağız kokusunun olmaması</p>
                        </div>
                        <div class="input-section" id="o2-delivery-container">
                            <p class="usernamelabel">NOC Gösterge: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" required name="noc_indicator" disabled id="noc_indicator" checked>
                                    <label class="form-check-label" for="noc_indicator">
                                        <span class="checkbox-header"><?php echo "$tani16Data[0]['noc_indicator2']" ?></span>
                                    </label>
                                </div>


                            </div>

                        </div>
                        <div class="input-section d-flex" style="flex-direction: column;">
                            <p class="usernamelabel">Eğitim:</p>
                            <?php
                            $nurse_education = explode("/", $tani16Data[0]['nurse_education']);
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
                            <p class="usernamelabel">İŞ BİRLİĞİ GEREKTİREN UYGULAMALAR:</p>
                            <?php
                            $collaborative_applications = explode("/", $tani16Data[0]['collaborative_applications']);
                            foreach ($collaborative_applications as $value) {
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


                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
    </script>
</body>

</html>