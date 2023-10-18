<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

$message = '';
if (isset($_SESSION['email_alert'])) {
  $message = 'Email Already Existed';
}
require_once("config-students.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KDSE-BPYS</title>
    <link rel="stylesheet" href="style.css">

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
    <div id="validation-box">
        <form action="" method="post">
            <div class="login-box login-login" style=''>

                <h1 class="header">KDSE-BPYS</h1>
                <h2 class="login">E-Posta gönderildi, lütfen kodu giriniz!</h2>

                <p class="labels">Kod</p>
                <input type="text" required name="code" id="code" placeholder="Kodu Giriniz">
                <input type="submit" name="submit" id="validate" value="Giriş Yap">
                <button class='resend' id="sendEmail">Tekrar Gönder</button>
                <a href="main.php" class="lower-buttons" style="padding-top:10px"></i>Ana Sayfaya Dön</a>
            </div>
        </form>

    </div>



    <form action="" method="post">
        <div class="login-box login-signup" id="registrationForm">
            <h1 class="header">KDSE-BPYS</h1>
            <h2 class="login">Öğrenci Kaydı</h2>

            <p class="usernamelabel">İsim</p>
            <input type="text" required name="name" id="name" placeholder="İsim Giriniz">

            <p class="usernamelabel">Soyisim</p>
            <input type="text" required name="surname" id="surname" placeholder="Soyisim Giriniz">

            <p class="usernamelabel">E-Posta</p>
            <input type="email" required name="email" id="email" placeholder="E-Posta Giriniz">


            <p class="passwordlabel">Şifre</p>
            <input type="password" name="password" id="password" required placeholder="Şifre Giriniz" minlength="6">

            <p class="passwordlabel">Şifreyi Tekrar Girin</p>
            <input type="password" name="confirm-password" id="confirm-password" required
                placeholder="Şifreyi Tekrar Girin" minlength="6">
            <span id="error" style="color: red;"></span>
            <input type="submit" name="submit" id="register" value="Kayıt Ol">
            <a href="stuLogin.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o"
                    style="margin: 0; margin-right: 20px;"></i>Ana Sayfaya Dön</a>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$("#validation-box").css("display", "none");
</script>

<script>
var code = '';

$("#register").click(function(e) {
    e.preventDefault();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const email = $("#email").val();
    const password = $("#password").val();
    const confirmPass = $("#confirm-password").val();
    const passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    $("#error").text("");
    //check form validity
    if (name === "") {
        $("#error").text("Adı boş olamaz!");
    } else if (surname == "") {
        $("#error").text("Soyadı boş olamaz!");
    } else if (email == "") {
        $("#error").text("E-Posta boş olamaz!");
    } else if (!emailRegex.test(email)) {
        $("#error").text("E-Posta doğru formatta değil!");
    } else if (password == "") {
        $("#error").text("Şifre boş olamaz!");
    } else if (confirmPass == "") {
        $("#error").text("Şifre boş olamaz!");
    } else if (confirmPass !== password) {
        $("#error").text("Şifreler eşleşmiyor!");
    } else if (confirmPass === password && !passRegex.test(password)) {
        $("#error").text(
            "Şifre 1 sayı, 1 küçük harf, 1 büyük harf içermeli ve 8 ile 20 karakter uzunluğunda olmalı!"
        );
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo $base_url; ?>/checEmailAll.php",
            data: {
                email: email
            },
            success: function(response) {
                if (response == 'exists') {
                    $("#error").text("Girdiğiniz e-posta zaten kayıtlı!");
                }
                //email dosent exist
                else {
                    $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            $("#validation-box").css("display", "block");
                    $("#registrationForm").css("display", "none");
                            }, 1000); 
                  
                    console.log("<?php echo $base_url; ?>/sendEmailCode.php")
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $base_url; ?>/sendEmailCode.php",
                        data: {
                            email: email
                        },
                        success: function(response) {
                            code = response;

                        },
                        error: function(response) {
                            alert("Error : Server E-Posta Gönderemedi");
                        }
                    });

                    $("#sendEmail").click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $base_url; ?>/sendEmailCode.php",
                            data: {
                                email: email
                            },
                            success: function(response) {
                                code = response;
                                alert(
                                    "Kod tekrar yollandı, e-postanızı kontrol ediniz!"
                                );
                            },
                            error: function(response) {
                                alert("Error : Server E-Posta Gönderemedi");
                            }
                        });
                    });

                    $("#validate").click(function(e) {
                        e.preventDefault();
                        var codeEntered = $("#code").val();
                        $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");
                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#tick-container").fadeOut(600);
                            // Hide the tick containe
                            }, 1000); 
                        if (codeEntered == code) {
                            $.ajax({
                                type: "POST",
                                url: "<?php echo $base_url; ?>/process-student.php",
                                data: {
                                    name: name,
                                    surname: surname,
                                    email: email,
                                    password: password,
                                },
                                success: function(response) {
                                    alert("Başarılı");
                                    window.location.assign(
                                        "<?php echo $base_url; ?>/main.php")
                                },
                                error: function(response) {
                                    alert("Error : Server Error");
                                }
                            });
                        } else {
                            alert("Kodlar eşleşmiyor!")
                        }
                    });
                }
            },
            error: function(response) {
                alert("error : Server error")
            }
        });
    }
});
</script>



</html>