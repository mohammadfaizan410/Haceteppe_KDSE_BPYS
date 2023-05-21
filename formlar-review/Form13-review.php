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
$sql = "SELECT * FROM form13 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="form-header">Medikal Tedavi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" value="<?php echo $form13[0]['patient_name']; ?>"
                                required name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form13[0]['patient_id']; ?>"
                                required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="time" class="form-control" required name="delivery_time" id="diger"
                                placeholder="delivery_time" value="<?php echo $form13[0]['delivery_time']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Adı:</p>
                            <input type="text" class="form-control" required name="medicine_name" id="diger"
                                placeholder="medicine_name" value="<?php echo $form13[0]['medicine_name']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Dozu:</p>
                            <input type="text" class="form-control" required name="medicine_dose" id="diger"
                                placeholder="medicine_dose" value="<?php echo $form13[0]['medicine_dose']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Yolu:</p>
                            <input type="text" class="form-control" required name="delivery_method" id="diger"
                                placeholder="delivery_method" value="<?php echo $form13[0]['delivery_method']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Uygulama Zamanı:</p>
                            <input type="text" class="form-control" required name="treatment_timeRange" id="diger"
                                placeholder="treatment_timeRange"
                                value="<?php echo $form13[0]['treatment_timeRange']; ?>">
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
                var id = <?php
                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                var form_id = <?php echo $form_id ?>;

                let patient_name = $("input[name='patient_name']").val();
                let patient_id = parseInt($("input[name='patient_id']").val());
                var name = $('#name').val();
                var surname = $('#surname').val();
                var age = $('#age').val();
                var not = $('#not').val();
                let form_num = 13;
                let yourDate = new Date();
                let applicationDescription = $("input[name='applicationDescription']").val();
                let creationDate = yourDate.toISOString().split('T')[0];
                let updateDate = yourDate.toISOString().split('T')[0];
                let delivery_date = creationDate;
                let delivery_time = $("input[name='delivery_time']").val();
                let medicine_name = $("input[name='medicine_name']").val();
                let medicine_dose = $("input[name='medicine_dose']").val();
                let delivery_method = $("input[name='delivery_method']").val();
                let treatment_timeRange = $("input[name='treatment_timeRange']").val();
                console.log("values initiated")

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/submitOrUpdateMedikal_form13.php',
                    data: {
                        isUpdate: true,
                        id: id,
                        form_id: form_id,
                        name: name,
                        surname: surname,
                        age: age,
                        not: not,
                        form_num: form_num,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creationDate,
                        update_date: updateDate,
                        delivery_date: delivery_date,
                        delivery_time: delivery_time,
                        medicine_name: medicine_name,
                        medicine_dose: medicine_dose,
                        delivery_method: delivery_method,
                        treatment_timeRange: treatment_timeRange
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