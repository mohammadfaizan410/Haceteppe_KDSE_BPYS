<?php
session_start();
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-nurse.php");
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
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>e-BYRYS-KKDS</title>


    <link rel="icon" href="img/core-img/favicon.ico">


    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div>
        <p class="name">
            <?php
            echo $_SESSION['userlogin']['name']
            ?>
        </p>
    </div>
    <a class="logout" href="student-main.php?logout=true">Logout</a>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>,

    <script>

    </script>
</body>

</html>