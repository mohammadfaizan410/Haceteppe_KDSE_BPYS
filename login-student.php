<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

if(isset($_SESSION['userlogin'])){
    if($_SESSION['userlogin']['type'] == "teacher"){
        header("Location: teacher-main.php");
    }else{
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
    <link href='https://css.gg/arrow-left-o.css' rel='stylesheet'>
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

</head>

<body>
<div id="tick-container">
  <div id="tick"></div>
</div>

    <div class="login-box" id="reset-password-container" style="display: none;">
        <h1 class="header">KDSE-BPYS</h1>
        <h2 class="login">Öğrenci Girişi</h2>
        <div id="check-email-validity">
            <p class="labels">E-Posta</p>
            <input type="text" required name="email" id="check-email" placeholder="E-Posta Giriniz">
            <input  class="btn btn-success" type="submit" id="send-code-btn" value="Kod gönder" />
        </div>

        <div id="code-container" style="display: none;">
            <p class="labels">Kodu Giriniz</p>
            <input type="password" required name="kode" id="check-code" placeholder="Kodu Giriniz">
            <input class="btn btn-success" value="Girmek" type="submit" id="check-code-btn" />
        </div>

        <div id="password-resetter" style="display: none;">
            <p class="labels">Password </p>
            <input type="password" required name="new-password" id="new-password" placeholder="Sifre Giriniz">
            <p class="labels">Tekrar Password</p>
            <input type="password" required name="new-password-confirm" id="new-password-confirm" placeholder="Sifre Giriniz">
            <input class="btn btn-success" type="submit"value='Sıfırlama' id="reset-password-btn" />
        </div>

        <div id="close-reset-password" style="cursor: pointer;">Iptal</div>
    </div>


    <div>
        <form action="" method="post">
            <div class="login-box login-login">

                <h1 class="header">KDSE-BPYS</h1>
                <h2 class="login">Öğrenci Girişi</h2>

                <p class="labels">E-Posta</p>
                <input type="text" required name="email" id="email" placeholder="E-Posta Giriniz">
                <p class="labels">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz">
                <input type="submit" name="submit" id="login" value="Giriş Yap">
                <div id='forgot-password' class="lower-buttons" style="padding-top:10px; cursor: pointer;"><i class="gg-arrow-left-o"
                        style="margin-top: 10px;margin-bottom: 10px; margin-right: 20px;"></i> şifremi unuttum</div>
                <a href="stuLogin.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o"
                        style="margin: 0; margin-right: 20px;"></i>Ana Sayfaya Dön</a>
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>,
    <script>
    var code = '';
    $(function() {
        $('#login').click(function(e) {
            var valid = this.form.checkValidity();

            if (valid) {
                var email = $('#email').val();
                var password = $('#password').val();
                console.log(email)
            }
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'process-login-student.php',
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
                            window.location.href = "student-main.php";
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
    });

    $('#forgot-password').click(function(e) {
        $('#reset-password-container').show('slow');
        $('.login-login').hide('slow');
    })

    $('#send-code-btn').click(function(e) {
        var email = $('#check-email').val();
        $.ajax({
            type: 'POST',
            url: './checkEmailStudent.php',
            data: {
                email: email,
            },
            success: function(data) {
                if(data === 'exists'){
                 $.ajax({
                    type: "POST",
                    url: "./sendEmailCode.php",
                    data: {
                        email: email,
                    },
                    success: function (response) {
                        code = response;
                    }
                 });
                    $('#check-email-validity').hide('slow');
                    $('#code-container').show('slow');
                }else{
                    alert('E-posta mevcut değil');
                }
            },
            error: function(data) {
                alert('error');
            }
        })
    })


    $('#check-code-btn').click(function(e) {
        var codeEntered = $('#check-code').val();
        if(codeEntered === code){
            $('#code-container').hide('slow');
            $('#password-resetter').show('slow');
        }else{
            alert('Kod doğru değil');
        } 
    })

    $('#reset-password-btn').click(function(e) {
        var password = $('#new-password').val();
        var email = $('#check-email').val();
        $.ajax({
            type: 'POST',
            url: './changePasswordStudent.php',
            data: {
                email: email,
                password: password
            },
            success: function(data) {
                if(data === 'success'){
                    alert('Şifre değiştirildi');
                    $('#check-email-validity').show('slow');
                    $('#code-container').hide('slow');
                    $('#password-resetter').hide('slow');
                    $('#reset-password-container').hide('slow');
                    $('.login-login').show('slow');
                }else{
                    alert('Error in success');
                }
            },
            error: function(data) {
                alert('error');
            }
        })
    })

    $('#close-reset-password').click(function(e) {
        $('#check-email-validity').show('slow');
        $('#code-container').hide('slow');
        $('#password-resetter').hide('slow');
        $('#reset-password-container').hide('slow');
        $('.login-login').show('slow');
    })

    
    </script>
</body>

</html>