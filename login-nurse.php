<?php
require_once("config-nurses.php");
session_start()

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
        <form action="" method="post">
            <div class="login-box login-login">

                <h1 class="header">e-BYRYS-KKDS</h1>
                <h2 class="login">Hemşire Girişi</h2>

                <p class="labels">Mail</p>
                <input type="text" required name="email" id="email" placeholder="Mail Giriniz">
                <p class="labels">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz">
                <input type="submit" name="submit" id="login" value="Login">
                <a href="#">Şifremi Unuttum</a>
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
                    url: 'process-login-nurse.php',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        alert(data)
                        if ($.trim(data) === "Successful") {
                            setTimeout('window.location.href = "nurse-main.php"', 1000);
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