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



    <link rel="icon" href="img/core-img/favicon.ico">


    <link rel="stylesheet" href="./style.css">
    <link href='https://css.gg/arrow-left-o.css' rel='stylesheet'>

</head>



<body>

<div id="validation-box">
        <form action="" method="post">
            <div class="login-box login-login" style= 'width : 50%;'>

                <h1 class="header">e-BYRYS-KKDS</h1>
                <h2 class="login">An email was sent to you, please enter the code</h2>

                <p class="labels">Kodu</p>
                <input type="text" required name="code" id="code" placeholder="enter code">
                <input type="submit" name="submit" id="validate" value="Giriş Yap">
                <button class='btn btn-primary' id="sendEmail">Send again</button>
                <a href="main.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o"
                        style="margin: 0; margin-right: 20px;"></i>Ana Sayfaya Dön</a>
</div>
        </form>

    </div>



        <form action="" method="post">
            <div class="login-box login-signup" id="registrationForm">
                <h1 class="header">e-BYRYS-KKDS</h1>
                <h2 class="login">Sign Up as Student</h2>

                <p class="usernamelabel">İsim</p>
                <input type="text" required name="name" id="name" placeholder="İsim Giriniz">

                <p class="usernamelabel">Soyisim</p>
                <input type="text" required name="surname" id="surname" placeholder="Soyisim Giriniz">

                <p class="usernamelabel">E-mail</p>
                <input type="email" required name="email" id="email" placeholder="E-mail Giriniz">


                <p class="passwordlabel">Şifre</p>
                <input type="password" name="password" id="password" required placeholder="Şifre Giriniz" minlength="6">

                <p class="passwordlabel">Şifreyi Tekrar Girin</p>
                <input type="password" name="confirm-password" id="confirm-password" required placeholder="Şifreyi Tekrar Girin"
                    minlength="6">
                <span id="error" style="color: red;"></span>
                <input type="submit" name="submit" id="register" value="Kayıt Ol">
                <a href="main.php" class="lower-buttons" style="padding-top:10px"><i class="gg-arrow-left-o"
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

        $("#register").click(function (e) { 
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
          if(name === ""){
            $("#error").text("Name cannot be empty");
          }
          else if(surname == ""){
            $("#error").text("Surname cannot be empty");
          }
          else if(email == ""){
            $("#error").text("email cannot be empty");
          }
          else if(!emailRegex.test(email)){
            $("#error").text("Email is not in correct format!");
          }
          else if(password == ""){
            $("#error").text("password fields cannot be empty");
          }
          else if(confirmPass == ""){
            $("#error").text("Passowrd fields cannot be empty");
          }
          else if(confirmPass !== password){
            $("#error").text("Passowrds do not match");
          }
          else if(confirmPass === password && !passRegex.test(password)){
            $("#error").text("Passwords must contain one digit, one lowercase letter, one uppercase letter and be between 8 and 20 characters long");
          }
          else{
            $.ajax({
              type: "POST",
              url: "<?php echo $base_url; ?>/checEmailAll.php",
              data:{
                email :email
              },
              success: function (response) {
                  if(trim(response) == 'exists' ){
                    $("#error").text("The email you entered already exists!");
                  }
                  //email dosent exist
                  else{
                    $("#validation-box").css("display", "block");
                    $("#registrationForm").css("display", "none");
                    $.ajax({
                      type: "POST",
                      url: "<?php echo $base_url; ?>/sendEmail.php",
                      data: {
                        email : email
                      },
                      success: function (response) {
                        code = response;
                      },
                      error:function(response){
                        alert("Error : server could not send email");
                      }
                    });
                  }
              },
              error : function (respose) { 
                alert("error : Server error")
               }
            });
          }  
        });


        
        $("#validate").click(function (e) { 
                      e.preventDefault();                
                      var codeEntered = $("#code").val();
                      if(codeEntered === code){
                               
                      $.ajax({  
                            type: "POST",
                            url: "<?php echo $base_url; ?>/process-student.php",
                            data: {
                                name : name,
                                surname:surname,
                                email:email,
                                password:password,
                              },
                              success: function (response) {
                                  console.log(response);
                                  alert("Successfull");
                                  window.location.assign("<?php echo $base_url; ?>/main.php")
                                },
                                error : function(response){
                                    console.log(response);
                                    alert("Error : Server Error");
                                  }
                                });
                      }else{
                        alert("codes do not match!")
                      }
                            });
          
    </script>
  


</html>
