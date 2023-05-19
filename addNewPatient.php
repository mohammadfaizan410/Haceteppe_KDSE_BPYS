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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
        .send-patient {
            align-self: center;
        }
    </style>

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid pt-4 px-4">
            <div class="send-patient">
                <h1 class="form-header">Yeni Hasta Ekle</h1>
                <div class="input-section-item">
                    <div class="patients-save">
                        <form action="" method="POST" class="patients-save-fields">

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Adı:</p>
                                <input type="text" class="form-control" required name="name" id="diger" placeholder="Patient Name">
                            </div>
                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Soyadı:</p>
                                <input type="text" class="form-control" required name="surname" id="diger" placeholder="Patient Surname">
                            </div>
                            <div class="input-section d-flex" style="padding-top: 5%;">
                                <p class="usernamelabel">Hasta Doğum Tarihi:</p>
                                <input type="date" class="form-control" required name="age" id="date" placeholder="Hasta Doğum Tarihi">
                            </div>
                    </div>

                    <input type="submit" class="form-control submit m-auto" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
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
                $("#content").load("./showAllForms.php");
            })
        });

        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
                var id = <?php

                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
                let patient_name = $("input[name='name']").val();
                let patient_surname = $("input[name='surname']").val();
                let patient_id = parseInt($("input[name='patient_id']").val());

                var minAge = 18;
                var today = new Date()
                //Calculates age from given Birth Date in the form//

                givenDate = new Date(today);
                var dt1 = document.getElementById('date').value;
                var birthDate = new Date(dt1);
                var years = (givenDate.getFullYear() - birthDate.getFullYear());

                if (givenDate.getMonth() < birthDate.getMonth() ||
                    givenDate.getMonth() == birthDate.getMonth() && givenDate.getDate() < birthDate
                    .getDate()) {
                    years--;
                }

                console.log(years);

                let patient_age = years
                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/processAddPatient.php/',
                    data: {
                        patient_name: patient_name,
                        patient_surname: patient_surname,
                        id: id,
                        patient_age: patient_age

                    },
                    success: function(data) {
                        alert(data);
                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors',
                            'type': 'error'
                        })
                    }
                })




            })

        });
    </script>

    <!-- Template Javascript -->
    <script src=""></script>
</body>

</html>