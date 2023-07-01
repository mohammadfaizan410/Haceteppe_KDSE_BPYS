<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';

if (!isset($_SESSION['userlogin'])) {
    header("Location: main.php");
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
        $values = [];
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };

        ?>
        <div class="send-patient">
        <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="pb-2">Form List</p>

                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Form Ad göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <thead>
                            <tr class="darkcyan table-head">
                                <th scope="col" style="font-weight : bold; font-size: large;"></th>
                            </tr>
                           <tr><td><div class="mt-3 entered-forms align-items-center"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                               href="<?php echo $base_url; ?>/formlar/beslenmeGereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form1_beslenme</a><div></td></tr>
                       <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bosaltimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">bosaltimForm1</a>
                        </div></td></tr>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/calismaForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">calismaForm1</a>
                        </div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/egitimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">egitimForm1</a>
                        </div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/hareketForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">hareketForm1</a>
                        </div></td></tr>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/iletisimForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">iletisimForm1</a>
                        </div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/kateterForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">kateterForm1</a>
                        </div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/ozgecmis_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">ozgecmis_form1</a>
                        </div></td></tr>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/solunumgereksinimi_form1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">solunumgereksinimi_form1</a>
                        </div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/uykuForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">uykuForm1</a>
                        </div></td></tr>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/vucuduTemizForm1.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">vucuduTemizForm1</a>
                        </div></td></tr>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color: white;"
                                href="<?php echo $base_url; ?>/formlar/Form2.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form2</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form3.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form3
                                </a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form4.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form4</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form5.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form5</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form6.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form6</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form7.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form7</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form8.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form8</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/tetkiksonuclari_form9.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form9</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/yasamsalbulgutakibi_form10.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form10</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form11.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form11</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/siviizlem.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form12</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/medikaltedavi.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form13</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bakimplani.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form14</a></div></td></tr>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/gunlukbakimuygulamalari.php?patient_id=<?php echo $userid; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form15</a></div></td></tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
             var patient_id = "<?php echo $_GET['patient_id']; ?>";
                 var patient_name = "<?php echo $_GET['patient_name']; ?>";
            
            $(function() {
                $("a.nav-items").on("click", function(e) {
                    e.preventDefault();
                    $("#content").load(this.href);
                });
            });
            $(function() {
                
                $("#closeBtn1").on("click", function(e) {
                    e.preventDefault();
                    var url =
                        "<?php echo $base_url; ?>/updateForms/formOptions.php?patient_id=" +
                        patient_id + "&patient_name=" + encodeURIComponent(
                            patient_name);
                    $("#content").load(url);
                });
            });   
        </script>
                    <script>
          var input = document.getElementById("searchInput");
var table = document.getElementById("dataTable");

input.addEventListener("input", function() {
  var filter = input.value.toLowerCase().trim();

  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var name = row.cells[0].getElementsByTagName("a")[0].textContent.toLowerCase();

    if (name.includes(filter)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
});
            </script>
</body>

</html>