<<?php
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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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

<body style="background-color:white">

<div id="tick-container">
  <div id="tick"></div>
</div>

    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <h1 class="form-header">EĞİTİM GEREKSİNİMİ</h1>

            <div class="input-section">
                <div>
                    <input type="checkbox" name="radio1">
                    <label for="radio1">Daha önce sağlık eğitimi</label>
                </div>
            </div>
            <div class="input-section">
                <div>
                    <p class="usernamelabel pb-3">Konusu</p>
                    <input type="text" class="form-control" disabled  name="Konu" id="Konu">
                </div>
                <div>
                    <p class="usernamelabel pb-3">Kimden/Nereden aldı</p>
                    <input type="text" class="form-control " disabled name="Nerden" id="Nerden">
                </div>
                <div>
                <p class="usernamelabel pb-3">Ne zaman aldı</p>
                    <input type="text" class="form-control" disabled name="NeZaman" id="NeZaman">
                </div>
            </div>

            <div class="input-section">
                <p class="usernamelabel pb-3">Sağlığınız ile ilgili hangi konularda eğitim almak istersiniz:</p>
                <input type="text" class="form-control"  name="EgitimIstegi" id="EgitimIstegi">
            </div>

            <div>
                <div class="d-flex align-items-center justify-content-start">
                    <input type="checkbox" name="TedaviBasvurusu" class="p-2">
                    <label class="p-2" for="TedaviBasvurusu">Sağlık sorununuz olduğunda tıbbi tedavi ve bakım dışında
                        başvurduğunuz herhangi bir kurum ya da yöntem var mı?</label>
                </div>
                <div class="input-section">
                    <p class="usernamelabel pb-3">Açıklayınız:</p>
                    <input type="text" class="form-control" disabled  name="TedaviBasvurusuDiger"
                        id="TedaviBasvurusuDiger">
                </div>
            </div>
            <div class='f-flex'>
            <input type="submit" class="submit m-auto" name="submit" id="submit" value="Kaydet">
                </div>
            </div>
            </form>
        </div>
    </div>




    <script>
    $(function() {
        $('#closeBtn1').click(function(e) {
        e.preventDefault();
        console.log("close btn clicked");
        let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
        let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
        var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
            "&patient_name=" + encodeURIComponent(patient_name);
        $("#content").load(url);
    })
    });

    if($('input[name="radio1"]').change(function() {
        if ($(this).is(':checked')) {
                    $('#Konu').prop('disabled', false);
                    $('#Nerden').prop('disabled', false);
                    $('#NeZaman').prop('disabled', false);
        }
        else{
                    $('#Konu').prop('disabled', true);
                    $('#Nerden').prop('disabled', true);
                    $('#NeZaman').prop('disabled', true);
                    $('#Konu').val('');
                    $('#Nerden').val('');
                    $('#NeZaman').val('');
        }
                }));
    if($('input[name="TedaviBasvurusu"]').change(function() {
        if ($(this).is(':checked')) {
                    $('#TedaviBasvurusuDiger').prop('disabled', false);
        }
        else{
            $('#TedaviBasvurusuDiger').prop('disabled', true);
            $('#TedaviBasvurusuDiger').val('');
        }
                }));
        
    </script>

    <script>
    $(function() {
        $('#submit').click(function(e) {



                var id = <?php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                let patient_name = "<?php
                                    echo urldecode($_GET['patient_name']);
                                    ?>";
                let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                                     let yourDate = new Date();
                            let creation_date = yourDate.toISOString().split('T')[0];
                            let updateDate = yourDate.toISOString().split('T')[0];
                let radio1 = $("input[name='radio1']").is(':checked') ? $("input[name='radio1']").val() : "";
                let Konu = $("input[name='Konu']").val() ? $("input[name='Konu']").val() : "";
                let Nerden = $("input[name='Nerden']").val() ? $("input[name='Nerden']").val() : "";    
                let NeZaman = $("input[name='NeZaman']").val() ? $("input[name='NeZaman']").val() : "";
                let EgitimIstegi = $("input[name='EgitimIstegi']").val() ? $("input[name='EgitimIstegi']").val() : "";
                let TedaviBasvurusu = $("input[name='TedaviBasvurusu']").is(":checked") ? $("input[name='TedaviBasvurusu']").val() : "";
                let TedaviBasvurusuDiger = $("input[name='TedaviBasvurusuDiger']").val() ? $("input[name='TedaviBasvurusuDiger']").val() : "";
                                 //set borders to default
    $('.form-control').css('border-color', '#ced4da');
               if($('input[name="radio1"]').is(':checked') && $('#Konu').val() === "" ){
                       //Scroll to companionInput
                       $('html, body').animate({
                                    scrollTop: $("#Konu").offset().top
                                }, 200);
                    // change border color
                    $('#Konu').css('border-color', 'red');
                                //stop function
                                return false;
               }else if($('input[name="radio1"]').is(':checked') && $('#Nerden').val() === "" ){
                       //Scroll to companionInput
                       $('html, body').animate({
                                    scrollTop: $("#Nerden").offset().top
                                }, 200);
                    // change border color
                    $('#Nerden').css('border-color', 'red');
                                //stop function
                                return false;
                }
                else if($('input[name="radio1"]').is(':checked') && $('#NeZaman').val() === "" ){
                          //Scroll to companionInput
                            $('html, body').animate({
                                         scrollTop: $("#NeZaman").offset().top
                                     }, 200);
                             // change border color
                             $('#NeZaman').css('border-color', 'red');
                                         //stop function
                                         return false;
                }else if($('#EgitimIstegi').val() === "" ){
                          //Scroll to companionInput
                            $('html, body').animate({
                                         scrollTop: $("#EgitimIstegi").offset().top
                                     }, 200);
                             // change border color
                             $('#EgitimIstegi').css('border-color', 'red');
                                         //stop function
                                         return false;
                                    }
                else if($('input[name="TedaviBasvurusu"]').is(':checked') && $('#TedaviBasvurusuDiger').val() == "" ){
                            //Scroll to companionInput
                                $('html, body').animate({
                                             scrollTop: $("#TedaviBasvurusuDiger").offset().top
                                         }, 200);
                                 // change border color
                                 $('#TedaviBasvurusuDiger').css('border-color', 'red');
                                             //stop function
                                             return false;
                }

                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $base_url; ?>/form-handlers/SubmitOrUpdateForm1_Egitim.php',
                    data: {
                        form_name : 'form1Egitim',
                        id: id,
                        patient_id: patient_id,
                        patient_name: patient_name,
                        creation_date: creation_date,
                        update_date: updateDate,
                        radio1: radio1,
                        Konu: Konu,
                        Nerden: Nerden,
                        NeZaman: NeZaman,
                        EgitimIstegi: EgitimIstegi,
                        TedaviBasvurusu: TedaviBasvurusu,
                        TedaviBasvurusuDiger: TedaviBasvurusuDiger

                    },
                    success: function(data) {
                         let patient_id = <?php
                                    $userid = $_GET['patient_id'];
                                    echo $userid
                                    ?>;
                            let patient_name = "<?php
                                                        echo urldecode($_GET['patient_name']);
                                                        ?>";
                            var url = "<?php echo $base_url; ?>/updateForms/showAllForms1.php?patient_id=" + patient_id +
                                "&patient_name=" + encodeURIComponent(patient_name);
                                $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load(url);
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    
</body>

</html>