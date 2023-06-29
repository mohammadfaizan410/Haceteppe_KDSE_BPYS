<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

if (!isset($_SESSION['userlogin'])) {
    header("Location: main.php");
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
    <link href="style.css" rel="stylesheet">

    <!-- Template Stylesheet -->

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
        $values = [];
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };

        ?>
        <div class="send-patient">

            <div class=" patients-save">

            </div>
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="pb-4">Hasta Listesi / Öneriler</p>

                </div>

                <div class="table-responsive">
                    <table class="table text-start align-middle table-hover mb-0">
                        <thead>
                            <tr class="darkcyan table-head">

                                <th scope="col" style="font-weight : bold; font-size: large;">İsim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Soyisim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Yaş</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Formlar</th>

                            </tr>
                            <?php
                            if (isset($values) && count($values) > 0) {
                                foreach ($values as $key => $value) {
                                    $fullName = $value['name'] . " " . $value['surname'];
                                    echo '<tr class="mb-4 align-items-center">                            
                                    <td scope="col" style="color: #333333;">' . $value['name'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['surname'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['age'] . '</td>
                                    <td scope="col"><a style="color: white;" class="showallforms btn btn-success p-3" href="#" data-patient-id="' . $value['patient_id'] . '" data-patient-name="' . $fullName . '">Formları Görüntüle</a></td>
                                </tr>';
                                }
                            }
                            ?>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
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

        <script>
            $(function() {
                $("a.showallforms").on("click", function(e) {
                    e.preventDefault();
                    var patient_id = $(this).data("patient-id");
                    var patient_name = $(this).data("patient-name");
                    var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                    $("#content").load(url);
                });
            });
        </script>

        <!-- Template Javascript -->
        <script src=""></script>
</body>

</html>