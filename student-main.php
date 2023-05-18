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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body class="stu-body">
    <div class="stu-body1">
        <div class="navigation-wrapper">
            <div class="navigation-left">
                <a href="" class="">
                    <h3 class=""><i class="fa fa-user-edit me-2"></i>KDSE-BPYS</h3>
                </a>

            </div>
            <div class="navigation-right">
                <div class="nav-items-wrapper">
                    <a href="messaging.php" class="nav-link nav-items"><i class="fa fa-comments me-2"></i>Chat</a>
                    <a href="./broadcast.php" class="nav-link nav-items"><i class="fa fa-comments me-2"></i>Broadcast/Multicast</a>
                    <a class="nav-link nav-items" href="./updateForms/showAllPatients.php"><i class="fa fa-comments me-2"></i>Show all Patients</a>
                    <a class="nav-link nav-items" href="./addNewPatient.php"><i class="fa fa-comments me-2"></i>Add new
                        Patient</a>

                </div>
                <div>

                    <a href="#" class="nav-link " data-bs-toggle="dropdown">
                        <span class="d-lg-inline-flex"><?php
                                                        echo '' . $_SESSION['userlogin']['name'] . ' ' . $_SESSION['userlogin']['surname'] . '';
                                                        ?></span></a>
                    <span class="status">Öğrenci</span>

                    <a class="black" href="student-main.php?logout=true">Çıkış Yap</a>

                </div>
            </div>






        </div>

    </div>
    <div class="stu-body1 stu-hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    </div>
    <div class="content" id="content">

    </div>
    <script>
        $(function() {
            $.ajaxSetup({
                cache: false
            }); // disable caching for all requests.
            $("#content").load("./updateForms/showAllPatients.php");

            // RAW Text/Html data from a file

            $(function() {
                $("a.nav-items").on("click", function(e) {
                    e.preventDefault();
                    $("#content").load(this.href);
                })
            })

        });
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

    <!-- Template Javascript -->
    <script src=""></script>
</body>

</html>