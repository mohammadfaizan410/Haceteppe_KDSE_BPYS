<?php
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


    <link rel="icon" href="img/core-img/favicon.ico">


    <link rel="stylesheet" href="style.css">
    <link href='https://css.gg/arrow-left-o.css' rel='stylesheet'>

</head>

<body>

    <div>
        <form action="" method="post">
            <div class="login-box login-signup">

                <h1 class="header">KDSE-BPYS</h1>
                <h2 class="login">Sign Up as Student</h2>

                <p class="usernamelabel">İsim</p>
                <input type="text" required name="name" id="name" placeholder="İsim Giriniz">

                <p class="usernamelabel">Soyisim</p>
                <input type="text" required name="surname" id="surname" placeholder="Soyisim Giriniz">

                <p class="usernamelabel">E-mail</p>
                <input type="email" required name="email" id="email" placeholder="E-mail Giriniz"
                    oninput="sanitizeEmail()">
                <span id="email-error" style="display:none; color:red;">Lütfen geçerli bir e-posta adresi
                    giriniz.</span>

                <p class="passwordlabel">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz" minlength="6"
                    oninput="sanitizePassword()">
                <span id="password-error" style="display:none; color:red;">Şifre en az 6 karakter uzunluğunda
                    olmalıdır.</span>

                <input type="submit" name="submit" id="register" value="Kayıt Ol">
                <a href="main.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o" style="margin: 0; margin-right: 20px;"></i>Ana Sayfaya Dön</a>
        </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('#register').click(function(e) {

                var valid = this.form.checkValidity();

                if (valid) {

                    var name = $('#name').val();
                    var surname = $('#surname').val();
                    var email = $('#email').val();
                    var password = $('#password').val();

                    e.preventDefault()

                    $.ajax({
                        type: 'POST',
                        url: 'process-student.php',
                        data: {
                            name: name,
                            surname: surname,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            Swal.fire({
                                'title': 'Success',
                                'text': data,
                                'type': 'success'
                            })
                            setTimeout('window.location.href = "main.php"', 1000);

                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                                'type': 'error'
                            })
                        }
                    })


                } else {

                }

            })

        })
    </script>
    <script>
    function sanitizePassword() {
  var passwordInput = document.getElementById("password");
  passwordInput.value = passwordInput.value.replace(/[^a-zA-Z0-9_-]/g, '');

  var passwordError = document.getElementById("password-error");
  var emailInput = document.getElementById("email");
  var emailError = document.getElementById("email-error");

  // Check if email is valid
  if (!isValidEmail(emailInput.value)) {
    emailError.style.display = "inline";
    document.getElementById("register").style.display = 'none';
    return;
  } else {
    emailError.style.display = "none";
  }

  // Check if email is present in the database
  isEmailExist(emailInput.value, function(isPresent) {
    if (isPresent) {
      emailError.innerText =  "Bu e-posta adresi zaten kayıtlı. Lütfen farklı bir e-posta adresi seçin.";
      emailInput.setCustomValidity(
        "Bu e-posta adresi zaten kayıtlı. Lütfen farklı bir e-posta adresi seçin.");
      emailError.style.display = "block";
      document.getElementById("register").style.display = 'none';
    } else {
      emailInput.setCustomValidity("");
      emailError.style.display = "none";

      // Check if password is valid
      if (passwordInput.value.length < 6) {
        passwordError.style.display = "inline";
        document.getElementById("register").style.display = 'none';
      } else {
        passwordError.style.display = "none";
        document.getElementById("register").style.display = 'block';
      }
    }
  });
}
    </script>
    <script>
   function sanitizeEmail() {
  var emailInput = document.getElementById("email");
  emailInput.value = emailInput.value.replace(/[^a-zA-Z0-9@._-]/g, '');
  var emailError = document.getElementById("email-error");
  var passwordInput = document.getElementById("password");
  var passwordError = document.getElementById("password-error");

  // Check if email is valid
  if (!isValidEmail(emailInput.value)) {
    emailError.style.display = "inline";
    document.getElementById("register").style.display = 'none';
    return;
  } else {
    emailError.style.display = "none";
  }

  // Check if email is present in the database
  isEmailExist(emailInput.value, function(isPresent) {
    if (isPresent) {
      emailError.innerText =  "Bu e-posta adresi zaten kayıtlı. Lütfen farklı bir e-posta adresi seçin.";
      emailInput.setCustomValidity(
        "Bu e-posta adresi zaten kayıtlı. Lütfen farklı bir e-posta adresi seçin.");
      emailError.style.display = "block";
      document.getElementById("register").style.display = 'none';
    } else {
      emailInput.setCustomValidity("");
      emailError.style.display = "none";

      // Check if password is valid
      if (passwordInput.value.length < 6) {
        passwordError.style.display = "inline";
        document.getElementById("register").style.display = 'none';
      } else {
        passwordError.style.display = "none";
        document.getElementById("register").style.display = 'block';
      }
    }
  });
}
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
   
</script>
</body>

</html>