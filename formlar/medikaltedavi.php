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
<html>

<head>
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
            <h1 class="form-header">Medikal Tedavi</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat:</p>
                            <input type="time" class="form-control" required name="delivery_time" id="diger"
                                placeholder="Saat">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Adı:</p>
                            <input type="text" class="form-control" required name="medicine_name" id="diger"
                                placeholder="İlacın Adı" maxlength="200">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Dozu:</p>
                            <input type="text" class="form-control" required name="medicine_dose" id="diger"
                                placeholder="İlacın Dozu" maxlength="200">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">İlacın Yolu:</p>
                            <input type="text" class="form-control" required name="delivery_method" id="diger"
                                placeholder="İlacın Yolu" maxlength="200">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Uygulama Zamanı:</p>
                            <input type="text" class="form-control" required name="treatment_timeRange" id="diger"
                                placeholder="Uygulama Zamanı" maxlength="200">
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
            let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
            let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
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
                let patient_name = "<?php
                                        echo urldecode($_GET['patient_name']);
                                        ?>";
                let patient_id = <?php
                                        $userid = $_GET['patient_id'];
                                        echo $userid
                                        ?>;
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
                        id: id,
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
                        alert("Ekleme Başarılı");
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