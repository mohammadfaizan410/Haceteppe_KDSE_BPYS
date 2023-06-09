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
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">UYKU GEREKSİNİMİ</h1>

            <div class="input-section d-flex">
                <p class="usernamelabel">Ortalama uyku süresi:</p>
                <input type="text" class="form-control" name="UykuSuresi" id="UykuSuresi">
            </div>

            <div class="input-section d-flex">

                <p class="usernamelabel">Uykuda Sorun </p>
                <div class="checkbox-wrapper d-flex">
                    <div class="checkboxes d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="UykuSorun" id="UykuSorun" value="Sorun Yok">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Yok</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="UykuSorun" id="UykuSorun" value="Sorun Var">
                            <label class="form-check-label" for="UykuSorun">
                                <span class="checkbox-header">Sorun Var</span>

                            </label>
                            <table class="ozgecmistable-wrapper">
                                <tbody>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="GündüzUykusu" value="GündüUykusu">
                                                <label class="form-check-label" for="GündüzUykusU>Gündüz uykus </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class=" protezlertable">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="UykudanYorgun" value="Uykudan yorgun">
                                                        <label class="form-check-label" for="UykudanYorgun">Uykudan
                                                            yorgun kalkma</label>
                                                    </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="UyumaGüçlüğü" value="Uyuma güçlüğü">
                                                <label class="form-check-label" for="UyumaGüçlüğü">Uyuma güçlüğü</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="UykununBölünmesi" value="Uykunun Bölünmesi">
                                                <label class="form-check-label" for="UykununBölünmesi">Uykunun
                                                    Bölünmesi</label>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td class="protezlertable">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="UykuSorunDiger" value="Diğer">
                                                <label class="form-check-label" for="UykuSorunDiger">Diğer</label>
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
                <p class="usernamelabel">Uykuya dalmada yardımcı olan alışkanlıkları (kitap okuma, süt içme vb.)
                    (Açıklayınız):</p>
                <input type="text" class="form-control" name="UykuyaDalmaAliskanligi" id="UykuyaDalmaAliskanligi">
            </div>
            <div class="input-section d-flex">
                <p class="usernamelabel">Hastane ortamında uykusunu etkileyen faktörler: (Açıklayınız):</p>
                <input type="text" class="form-control" name="UykuyuEtkileyenFaktorler" id="UykuyuEtkileyenFaktorler">
            </div>
            <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">


            <script>
                $(function() {
                    $('#closeBtn').click(function(e) {
                        let patient_id = <?php
                                            $userid = $_GET['patient_id'];
                                            echo $userid
                                            ?>;
                        let patient_name = "<?php
                                            echo urldecode($_GET['patient_name']);
                                            ?>";
                        var url = "<?php echo $base_url; ?>/updateForms/showAllForms.php?patient_id=" +
                            patient_id + "&patient_name=" + encodeURIComponent(patient_name);
                        $("#content").load(url);

                    })
                });
            </script>

            <script>
                $(function() {
                    $('#submit').click(function(e) {
                        e.preventDefault()

                        var valid = this.form.checkValidity();
                        if (valid) {
                            let name = $('#name').val();
                            let surname = $('#surname').val();
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
                            let fileNo = 160;
                            let UykuSuresi = $("input[name='UykuSuresi']").val();
                            let UykuSorun = parseInt($("input[type='radio'][name='UykuSorun']:checked")
                                .val());
                            let GündüzUykusu = $("input[name='GündüzUykusu']").val();
                            let UykudanYorgun = $("input[name='UykudanYorgun']").val();
                            let UyumaGüçlüğü = $("input[name='UyumaGüçlüğü']").val();
                            let UykununBölünmesi = $("input[name='UykununBölünmesi']").val();
                            let UykuSorunDiger = $("input[name='UykuSorunDiger']").val();
                            let UykuyaDalmaAliskanligi = $("input[name='UykuyaDalmaAliskanligi']").val();
                            let UykuyuEtkileyenFaktorler = $("input[name='UykuyuEtkileyenFaktorler']")
                                .val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $base_url; ?>/submitOrUpdateForm1_Uyku.php',
                                data: {
                                    patient_id: patient_id,
                                    patient_name: patient_name,
                                    form_num: fileNo,
                                    creation_date: creation_date,
                                    update_date: updateDate,
                                    UykuSuresi: UykuSuresi,
                                    UykuSorun: UykuSorun,
                                    GündüzUykusu: GündüzUykusu,
                                    UykudanYorgun: UykudanYorgun,
                                    UyumaGüçlüğü: UyumaGüçlüğü,
                                    UykununBölünmesi: UykununBölünmesi,
                                    UykuSorunDiger: UykuSorunDiger,
                                    UykuyaDalmaAliskanligi: UykuyaDalmaAliskanligi,
                                    UykuyuEtkileyenFaktorler: UykuyuEtkileyenFaktorler

                                },
                                success: function(data) {
                                    alert(data);
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



                        }
                    })

                });
            </script>


            <!-- Template Javascript -->
            <script src=""></script>
</body>

</html>
