<?php
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
session_start();
if(isset($_SESSION['userlogin'])){
    if($_SESSION['userlogin']['type'] == "teacher"){
        header("Location: teacher-main.php");
    }
    if($_SESSION['userlogin']['type'] == "student"){
        header("Location: student-main.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KDSE-BPYS</title>


    <link rel="icon" href="img/core-img/favicon.ico">


    <link rel="stylesheet" href="style.css">

</head>

<body>


    <div class="login-box">
        <div class="hacettepelogo-wrapper">
            <object class="hacettepelogo" data="hacettepelogo.svg" width="300" height="300"> </object>
            <p class="hemsire-fakulte">Hemşirelik Fakültesi</p>
        </div>


        <h1 class="header">KDSE-BPYS</h1>

        <div class="buttons-wrapper">
            <a class="buttons" style="color: white" href="./tLogin.php">Öğretmen Girişi</a>
            <a class="buttons" style="color: white" href="./stuLogin.php">Öğrenci Girişi</a>

            <!-- <a class="buttons" style="color: white" href="./registration-teacher.php">Öğretmen Kaydı</a>
            <a class="buttons" style="color: white" href="./registration-student.php">Öğrenci Kaydı</a> -->
        </div>
    </div>


</body>

</html>