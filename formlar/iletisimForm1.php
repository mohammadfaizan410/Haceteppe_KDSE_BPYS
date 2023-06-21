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
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
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
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">İLETİŞİM KURMA GEREKSİNİMİ</h1>



            <div class="input-section d-flex">
                <p class="usernamelabel">İletişim kurmasına engel olan herhangi bir durum</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicationProblem" id="IletisimEngeli"
                                value="Yok">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="communicationProblem" id="IletisimEngeli"
                                value="Var">
                            <label class="form-check-label" for="IletisimEngeli">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" disabled name="communicationProblemInput"
                                id="IletisimEngeliDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Refakatçisi</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="companion" id="refakatci" value="Yok">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="companion" id="refakatci" value="Var">
                            <label class="form-check-label" for="refakatci">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" disabled name="companionInput" id="refakatciDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Yakınlarına ulaşmada sıkıntısı</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reachTrouble" id="UlasmaSikinti"
                                value="Yok">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reachTrouble" id="UlasmaSikinti"
                                value="Var">
                            <label class="form-check-label" for="UlasmaSikinti">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="reachTroubleInput" disabled
                                id="UlasmaSikintiDiger">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Sağlık personeli ile iletişime geçmede sorun</p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contactingStaffTrouble"
                                id="PersonelleIletisim" value="Yok">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contactingStaffTrouble"
                                id="PersonelleIletisim" value="Var">
                            <label class="form-check-label" for="PersonelleIletisim">
                                <span class="checkbox-header">Var: (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="contactingStaffTroubleInput" disabled
                                id="PersonelleIletisimDiger">
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section d-flex">

                <p class="usernamelabel">Bakıma katılma </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="careAcceptance" id="BakımaKatılma"
                                value="Katılmıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header">Katılmıyor </span>
                            </label>

                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="İstekli1" disabled
                                                    value="İstekli" name="careAcceptanceNon">
                                                <label class="form-check-label"  for="İstekli1">İstekli </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="İsteksiz1" disabled
                                                    value="İsteksiz" name="careAcceptanceNon"> 
                                                <label class="form-check-label"  for="İsteksiz1">İsteksiz </label>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="careAcceptance" id="BakımaKatılma"
                                value="Katılıyor">
                            <label class="form-check-label" for="BakımaKatılma">
                                <span class="checkbox-header"> Katılıyor</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="careAcceptanceWilling" type="radio" id="İstekli" disabled
                                                    value="İstekli">
                                                <label class="form-check-label"  for="İstekli">İstekli</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled name="careAcceptanceWilling" type="radio" id="İsteksiz"
                                                    value="İsteksiz">
                                                <label class="form-check-label"  for="İsteksiz">İsteksiz </label>
                                            </div>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            <div class="input-section d-flex">
                <p class="usernamelabel">Tedaviyi kabullenme </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="treatmentAcceptance"
                                id="TedaviyiKabullenme " value="Kabul ediyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul ediyor </span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="treatmentAcceptance"
                                id="TedaviyiKabullenme " value="Kabul etmiyor">
                            <label class="form-check-label" for="TedaviyiKabullenme ">
                                <span class="checkbox-header">Kabul etmiyor (Açıklayınız)</span>
                            </label>
                            <input type="text" class="form-control diger" name="treatmentAcceptanceInput" disabled
                                id="TedaviyiKabullenmeDiger ">
                        </div>
                    </div>
                </div>
                <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
            </div>
            <script>
            $(function() {
                $('#closeBtn').click(function(e) {
                    $("#content").load("formlar-student.php");

                })
            });


            // $('.form-check-input[name="inHospitalExercise"]').change(function() {
            //     console.log($(this).val());
            //     if ($(this).val() === 'Evet') {
            //         $('input[name="exerciseType"]').prop('disabled', false);
            //     } else {
            //         $('input[name="exerciseType"]').prop('disabled', true);
            //     }
            //     });

            $('.form-check-input[name="communicationProblem"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="communicationProblemInput"]').prop('disabled', false);
                }else{
                    $('input[name="communicationProblemInput"]').prop('disabled', true);
                }
            })

            $('.form-check-input[name="companion"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="companionInput"]').prop('disabled', false);
                }else{
                    $('input[name="companionInput"]').prop('disabled', true);
                }
            })

            $('.form-check-input[name="reachTrouble"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="reachTroubleInput"]').prop('disabled', false);
                }else{
                    $('input[name="reachTroubleInput"]').prop('disabled', true);
                }
            })

            $('.form-check-input[name="contactingStaffTrouble"]').change(function(){
                if($(this).val() === 'Var'){
                    $('input[name="contactingStaffTroubleInput"]').prop('disabled', false);
                }else{
                    $('input[name="contactingStaffTroubleInput"]').prop('disabled', true);
                }
            })

            $('.form-check-input[name="treatmentAcceptance"]').change(function(){
                if($(this).val() === 'Kabul etmiyor'){
                    $('input[name="treatmentAcceptanceInput"]').prop('disabled', false);
                }else{
                    $('input[name="treatmentAcceptanceInput"]').prop('disabled', true);
                }
            })


            $('.form-check-input[name="careAcceptance"]').change(function(){
                if($(this).val() === 'Katılıyor'){
                    $('input[name="careAcceptanceWilling"]').prop('disabled', false);
                    $('input[name="careAcceptanceNon"]').prop('disabled', true);

                }else{
                    $('input[name="careAcceptanceWilling"]').prop('disabled', true);
                    $('input[name="careAcceptanceNon"]').prop('disabled', false);
                }
            })


            </script>

            <script>
            $(function() {
                $('#submit').click(function(e) {



                        let age = $('#age').val();
                            let not = $('#not').val();

                            var patient_id = <?php
                                                $userid = $_GET['patient_id'];
                                                echo $userid
                                                ?>;
                            let patient_name = "<?php
                                                echo urldecode($_GET['patient_name']);
                                                ?>";
                            let yourDate = new Date()
                            let creation_date = yourDate.toISOString().split('T')[0];
                            let updateDate = yourDate.toISOString().split('T')[0];
                            // let movementProblem = $('.form-check-input[name="movementProblem"]:checked').val() === "Var" ? $('.form-check-input[name="movementProblemDesc"]:checked').map(function() {
                            //     return $(this).val();
                            // }).get().join("/") : "Sorun Yok";
                            let communicationProblem = $("input[name='communicationProblem']:checked").val() === "Var" ? $('input[name="communicationProblemInput"]').val() : "Yok";
                            let companion = $("input[name='companion']:checked").val() === "Var" ? $('input[name="companionInput"]').val() : "Yok";
                            let reachTrouble = $("input[name='reachTrouble']:checked").val() === "Var" ? $('input[name="reachTroubleInput"]').val() : "Yok";
                            let contactingStaffTrouble = $("input[name='contactingStaffTrouble']:checked").val() === "Var" ? $('input[name="contactingStaffTroubleInput"]').val() : "Yok";
                            let careAcceptance = $("input[name='careAcceptance']:checked").val();
                            let careAcceptanceWilling = $("input[name='careAcceptanceWilling']:checked").val() ? $('input[name="careAcceptanceWilling"]:checked').val() : "Yok";
                            let careAcceptanceNon = $("input[name='careAcceptanceNon']:checked").val() ? $('input[name="careAcceptanceNon"]:checked').val() : "Yok";
                            let treatmentAcceptance = $("input[name='treatmentAcceptance']:checked").val() === "Kabul etmiyor" ? $('input[name="treatmentAcceptanceInput"]').val() : "Kabul ediyor";

                            console.log("communication problem:", communicationProblem, "companion:", companion, "reach trouble:", reachTrouble, "contacting staff trouble:", contactingStaffTrouble, "care acceptance:", careAcceptance, "care acceptance willing:", careAcceptanceWilling, "care acceptance non:", careAcceptanceNon, "treatment acceptance:", treatmentAcceptance )


                        e.preventDefault()

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $base_url; ?>/SubmitOrUpdateForm1_Iletisim.php',
                            data: {
                                patient_id: patient_id,
                                patient_name: patient_name,
                                creation_date: creation_date,
                                update_date: updateDate,
                                communicationProblem: communicationProblem,
                                companion: companion,
                                reachTrouble: reachTrouble,
                                contactingStaffTrouble: contactingStaffTrouble,
                                careAcceptance: careAcceptance,
                                careAcceptanceWilling: careAcceptanceWilling,
                                careAcceptanceNon: careAcceptanceNon,
                                treatmentAcceptance: treatmentAcceptance,
                                form_name: 'iletisimForm1'
                            },
                            success: function(data) {
                                alert(data);
                                console.log(data);
                                let url =
                                        "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                                        patient_id + "&patient_name=" + encodeURIComponent(
                                            patient_name);
                                    $("#content").load(url);
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
            <script src=""></script>
</body>

</html>