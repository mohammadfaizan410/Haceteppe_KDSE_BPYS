<?php
require_once("config-teachers.php");
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
session_start();

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
    <link href='https://css.gg/arrow-left-o.css' rel='stylesheet'>


</head>

<body>

    <div>
        <form action="" method="post">
            <div class="login-box login-login">

                <h1 class="header">KDSE-BPYS</h1>
                <h2 class="login">Hemşire Girişi</h2>

                <p class="labels">Mail</p>
                <input type="text" required name="email" id="email" placeholder="Mail Giriniz">
                <p class="labels">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz">
                <input type="submit" name="submit" id="login" value="Login">
                <a href="main.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o" style="margin: 0; margin-right: 20px;"></i>Ana Sayfaya Dön</a>
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>,
    <script>
        $(function() {
            $('#login').click(function(e) {

                var email = $('#email').val();
                var password = $('#password').val();
                console.log(email)

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process-login-teacher.php',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        alert(data)
                        if ($.trim(data) === "Başarılı") {
                            setTimeout('window.location.href = "teacher-main.php"', 1000);
                        }
                    },
                    error: function(data) {
                        alert('error');
                    }
                })

            })
        })
    </script>
</body>

</html>