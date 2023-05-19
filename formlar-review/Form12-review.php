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
$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
$sql = "SELECT * FROM form12 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
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
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">Sıvı İzlem</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" value="<?php echo $form12[0]['patient_name']; ?>" required name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form12[0]['patient_id']; ?>" required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sıvının Cinsi:</p>
                            <input type="text" class="form-control" required name="liquid_type" id="diger" placeholder="liquid_type" value="<?php echo $form12[0]['liquid_type']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Sıvının Hızı:</p>
                            <input type="text" class="form-control" required name="liquid_velocity" id="diger" placeholder="liquid_velocity" value="<?php echo $form12[0]['liquid_velocity']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="text" class="form-control" required name="delivery_time" id="diger" placeholder="delivery_time" value="<?php echo $form12[0]['delivery_time']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Seviye:</p>
                            <input type="text" class="form-control" required name="liquid_level" id="diger" placeholder="liquid_level" value="<?php echo $form12[0]['liquid_level']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Giden:</p>
                            <input type="text" class="form-control" required name="liquid_sent" id="diger" placeholder="liquid_sent" value="<?php echo $form12[0]['liquid_sent']; ?>">
                        </div>
                        <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
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
                console.log("clicked")
                var valid = this.form.checkValidity();

                if (valid) {
                    var form_id = <?php echo $form_id ?>;
                    let patient_name = $("input[name='patient_name']").val();
                    let patient_id = parseInt($("input[name='patient_id']").val());
                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var age = $('#age').val();
                    var not = $('#not').val();
                    let yourDate = new Date();
                    let form_num = 12;
                    let creationDate = yourDate.toISOString().split('T')[0];
                    let updateDate = yourDate.toISOString().split('T')[0];
                    let liquid_type = $("input[name='liquid_type']").val();
                    let liquid_velocity = $("input[name='liquid_velocity']").val();
                    let delivery_time = $("input[name='delivery_time']").val();
                    let liquid_level = $("input[name='liquid_level']").val();
                    let liquid_sent = $("input[name='liquid_sent']").val();
                    console.log("values initiated")

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $base_url; ?>/submitOrUpdateSivi_form12.php',
                        data: {
                            isUpdate: true,
                            form_id: form_id,
                            form_num: form_num,
                            patient_id: patient_id,
                            patient_name: patient_name,
                            creation_date: creationDate,
                            update_date: updateDate,
                            liquid_type: liquid_type,
                            liquid_velocity: liquid_velocity,
                            delivery_time: delivery_time,
                            liquid_level: liquid_level,
                            liquid_sent: liquid_sent
                        },
                        success: function(data) {
                            alert("Güncelleme Başarılı!");
                            let url =
                                "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                patient_id + "&patient_name=" + encodeURIComponent(
                                    patient_name);
                            $("#content").load(url);
                        },
                        error: function(data) {
                            console.log(data)
                        }
                    })



                }
            })

        });
    </script>
    <script src=""></script>
</body>

</html>