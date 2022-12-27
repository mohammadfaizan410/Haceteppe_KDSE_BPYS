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
        <?php
        echo 'bbbb';
        if (isset($_POST['submit'])) {
            echo 'aasdafa';
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            echo $name;
            $sql = "INSERT INTO nurses (name, surname, email, password) VALUES(?,?,?,?)";
            $smtminsert = $db->prepare($sql);
            $result = $smtminsert->execute([$name, $surname, $email, $password]);
            if ($result) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
        ?>
    </div>
    <div>
        <form action="" method="post">
            <div class="login-box login-signup">

                <h1 class="header">e-BYRYS-KKDS</h1>
                <h2 class="login">Sign Up as Nurse</h2>

                <p class="usernamelabel">Name</p>
                <input type="text" required name="name" id="name" placeholder="Enter name here">

                <p class="usernamelabel">Surname</p>
                <input type="text" required name="surname" id="surname" placeholder="Enter surname here">

                <p class="usernamelabel">E-mail</p>
                <input type="email" required name="email" id="email" placeholder="Enter e-mail here">

                <p class="passwordlabel">Password</p>
                <input type="password" name="password" id="password" required placeholder="Enter Password here">

                <input type="submit" name="submit" id="register" value="Sign Up">
                <a href="#">Forget Password</a>
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
                        url: 'process-nurse.php',
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
</body>

</html>