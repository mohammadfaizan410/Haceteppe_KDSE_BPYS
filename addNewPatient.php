<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
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
    <meta charset="utf-8">
    <title>KDSE-BPYS</title>
    <style>
        .send-patient {
            align-self: center;
        }
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

<body style="background-color:white">
<div id="tick-container">
  <div id="tick"></div>
</div>
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid pt-4 px-4">
            <div class="send-patient">
                <h1 class="form-header">Yeni Hasta Ekle</h1>
                <div class="input-section-item">
                    <div class="patients-save">
                        <form action="" method="POST" class="patients-save-fields">

                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Adı:</p>
                                <input type="text" class="form-control" required name="name" id="diger" placeholder="Hasta Adı" maxlength = "25">
                            </div>
                            <div class="input-section d-flex">
                                <p class="usernamelabel">Hasta Soyadı:</p>
                                <input type="text" class="form-control" required name="surname" id="diger" placeholder="Hasta Soyadı" maxlength = "25">
                            </div>
                            <div class="input-section d-flex" style="padding-top: 5%;">
                                <p class="usernamelabel">Hasta Doğum Tarihi:</p>
                                <input type="date" class="form-control" required name="age" id="date" placeholder="Hasta Doğum Tarihi" max="2020-10-10">
                            </div>
                            <input type="submit" class="w-75 submit m-auto" name="submit" id="submit" value="Kaydet">
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(function() {
            $("a.showallforms").on("click", function(e) {
                e.preventDefault();
                $("#content").load("./showAllForms.php");
            })
        });
        $(window).on('resize scroll', function() {
  var container = $('#tick-container');
  var tick = $('#tick');

  var windowHeight = $(window).height();
  var containerHeight = container.outerHeight();

  // Calculate the top position of the container
  var topPosition = (windowHeight - containerHeight) / 2;

  // Set the top position of the container
  container.css('top', topPosition + 'px');
});

        $(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
                var id = <?php

                            $userid = $_SESSION['userlogin']['id'];
                            echo $userid
                            ?>;
                let patient_name = $("input[name='name']").val();
                let patient_surname = $("input[name='surname']").val();

                var today = new Date();
                var dt1 = $('#date').val();
                var birthDate = new Date(dt1);
                var years = today.getFullYear() - birthDate.getFullYear();

                // Set all border to default
                $(".form-control").css("border-color", "#ced4da");

                // Compare birth month and day with the current month and day
                if (
                (today.getMonth() < birthDate.getMonth()) ||
                (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())
                ) {
                years--;
                }
                if(patient_name ==""){
                    //change patient name to red
                    $("input[name='name']").css("border-color", "red");
                    return false;
                }
                else if(patient_surname ==""){
                    //change patient surname to red
                    $("input[name='surname']").css("border-color", "red");
                    return false;
                }
                else if(dt1 === ""){
                    $("input[name='date']").css("border-color", "red");
                    return false;
                }
                
                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/processAddPatient.php/',
                    data: {
                        patient_name: patient_name,
                        patient_surname: patient_surname,
                        id: id,
                        patient_age: years
                    },
                    success: function(data) {
                        $("#tick-container").fadeIn(800);

                        // Change the tick background to the animated GIF
                        $("#tick").css("background-image", "url('./check-2.gif')");

                        // Delay for 2 seconds (adjust the duration as needed)
                        setTimeout(function() {
                        // Load the content
                        $("#content").load("<?php echo $base_url; ?>/updateForms/showAllPatients.php");
                        $("#tick-container").fadeOut(600);
                        // Hide the tick container
                        }, 1000);
                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors',
                            'type': 'error'
                        })
                    }
                })




            })

        });
    </script>
</body>

</html>
