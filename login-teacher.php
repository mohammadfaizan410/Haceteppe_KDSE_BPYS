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
<style>
        body {
  margin: 0; /* Remove default body margin */
  padding: 0; /* Remove default body padding */
}

#tick-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: none; /* Hide the tick container initially */
  align-items: center;
  justify-content: center;
  z-index: 9999;
  background-color: #ffffff;
}

#tick {
  width: 50%;
  height: 50%;
  background-size: contain;
  background-repeat: no-repeat;
  position: absolute;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) translateX(25%);
}
</style>
<body>
    <div id="tick-container">
  <div id="tick"></div>
</div>

    <div>
        <form action="" method="post">
            <div class="login-box login-login">

                <h1 class="header">KDSE-BPYS</h1>
                <h2 class="login">Hemşire Girişi</h2>

                <p class="labels">E-Posta</p>
                <input type="text" required name="email" id="email" placeholder="E-Posta Giriniz">
                <p class="labels">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz">
                <input type="submit" name="submit" id="login" value="Giriş Yap">
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
                        if ($.trim(data) === "Başarılı") {
                        $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            window.location.href = "teacher-main.php";
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 1000);            
                    }else{
                        alert(data)
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