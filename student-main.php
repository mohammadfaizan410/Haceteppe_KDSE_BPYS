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

$userid = $_SESSION['userlogin']['id'];
require_once('config-students.php');


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
    <style>
    .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 320px;
    height: 85px;
    background-color: white;
    padding: 10px;
    border: 3px solid darkslateblue;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    display: none;
    }

    .notification span {
        padding: 3px;
    }
    .message {
    font-size: 18px;
    }

    .close-btn {
    position: absolute;
    top: 0px;
    right: 9px;
    border: none;
    background-color: transparent;
    font-size: 35px;
    color: red;
    cursor: pointer;
    }

    </style>
</head>

<body class="stu-body">


    <div class="stu-body1" id="stu-body1">
        <div class="navigation-wrapper" id="navigation-wrapper">
            <div class="navigation-left">
                <object class="hacettepelogo" data="hacettepelogo.svg" width="300" height="300"> </object>
                <p class="hemsire-fakulte">Hemşirelik Fakültesi</p>
                <a href="" class="">
                    <h3 class=""><i class="fa fa-user-edit me-2"></i>KDSE-BPYS</h3>
                </a>
                <span class='close closehamburger' id='closeBtn'>&laquo;</span>

            </div>
            <div class=" navigation-right">
                <div class="nav-items-wrapper">
                    <a href="./broadcastStudent.php" class="nav-link nav-items"><i class="fa fa-comments me-2"></i>Forum</a>
                    <a class="nav-link nav-items" href="./updateForms/showAllPatients.php"><i
                            class="fa fa-comments-patient me-2"></i>Tüm hastaları göster</a>
                    <a class="nav-link nav-items" href="./addNewPatient.php"><i
                            class="fa fa-comments-patient me-2"></i>Yeni
                        hasta ekle</a>
                </div>
                <div class="user-info">

                    <a href="#" class="nav-link " data-bs-toggle="dropdown">
                        <span class="d-lg-inline-flex"><?php
                                                        echo '' . $_SESSION['userlogin']['name'] . ' ' . $_SESSION['userlogin']['surname'] . '';
                                                        ?></span></a>
                    <div class="user-info-lower">
                        <span class="status">Öğrenci</span>

                        <a class="red" href="student-main.php?logout=true">Çıkış Yap</a>
                    </div>
                </div>
            </div>






        </div>

    </div>

    <div class="stu-hamburger" id="stu-hamburger">
        <div class="hamburger-wrapper" id="hamburger-wrapper" onclick="hamburger()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
    </div>
    <div class="content" id="content">

    </div>
    <script>
    function hamburger() {

        const hamburger = document.getElementById('stu-hamburger');
        hamburger.classList.remove("d-block-resp");
        hamburger.classList.add("d-none-resp");

        const stubody1 = document.getElementById('stu-body1');
        stubody1.classList.remove("d-none-resp");
        stubody1.classList.add("d-block-resp");

        const navwrapper = document.getElementById('navigation-wrapper');
        navwrapper.classList.remove("d-none-resp");
        navwrapper.classList.add("d-block-resp");

        const closebtn = document.getElementById('closeBtn');
        closebtn.classList.remove("d-none-resp");
        closebtn.classList.add("d-block-resp");
    };
    $("#closeBtn").on("click", function(e) {
        const hamburger = document.getElementById('stu-hamburger');
        hamburger.classList.remove("d-none-resp");
        hamburger.classList.add("d-block-resp");

        const stubody1 = document.getElementById('stu-body1');
        stubody1.classList.remove("d-block-resp");
        stubody1.classList.add("d-none-resp");

        const navwrapper = document.getElementById('navigation-wrapper');
        navwrapper.classList.remove("d-block-resp");
        navwrapper.classList.add("d-none-resp");
    })
    window.addEventListener('DOMContentLoaded', function() {
        var notification = document.getElementById('notification');
        var closeBtn = document.getElementById('closeBtnNotification');

        notification.style.display = 'block';
       
        setTimeout(function() {
            notification.style.opacity -= 0.3;
            notification.style.pointerEvents = 'none';
        }, 4000);

        closeBtn.addEventListener('click', function() {
            notification.style.display = 'none';
        });
    });
    </script>
    <script>
    $(document).ready(function() {
       $.ajax({
        type: "get",
        url: "./getAllMessages.php",
        success: function (response) {
            console.log(JSON.parse(response))   
        }
       });
    })

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