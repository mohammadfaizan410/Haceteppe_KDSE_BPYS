<?php
session_start();
if (isset($_SESSION['userlogin'])) {
    header("Location: student-main.php");
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
        <form action="" method="post">
            <div class="login-box login-login">

                <h1 class="header">e-BYRYS-KKDS</h1>
                <h2 class="login">Öğrenci Girişi</h2>

                <p class="labels">Mail</p>
                <input type="text" required name="email" id="email" placeholder="Mail Giriniz">
                <p class="labels">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz">
                <input type="submit" name="submit" id="login" value="Login">
                <a href="#">Forget Password</a>
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>,
    <script>
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
                        alert(data)
                        if ($.trim(data) === "Successful") {
                            setTimeout('window.location.href = "student-main.php"', 1000);
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