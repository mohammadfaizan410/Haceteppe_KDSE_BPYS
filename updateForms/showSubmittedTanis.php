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


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">

    <!-- Template Stylesheet -->

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        $patientId = $_GET['patient_id'];
        $sql = "SELECT * FROM tani WHERE patient_id = " . $patientId . " AND standalone = 'true' GROUP BY tani_num ORDER BY creation_date DESC";
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $allTanisStandalone = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

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
                            <tr>
                                <th scope="col" style="font-weight : bold; font-size: large;">tani ID</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Submission Date</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Submission Time</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">View</th>
                            </tr>
                           <?php
                                foreach ($allTanisStandalone as $row) {
                                    echo '<tr>';
                                    echo '<td>' . $row['tani_id'] . '</td>';
                                    echo '<td>' . $row['creation_date'] . '</td>';
                                    echo '<td>'.$row['time'].'</td>';
                                    echo "<td><div class='entered-forms align-items-center'><a class='nav-items review btn btn-success w-100' style='color : white;'
                                    href='" . $base_url . "/taniReview/tani" . $row['tani_num'] . "-review.php?patient_id=" . $row['patient_id'] . "&patient_name=" . $row['patient_name'] . "&standalone=" . $row['standalone'] . "&evaluation=" . $row['evaluation'] . "&tani_id=".$row['tani_id']."&tani_num=".$row['tani_num']."'>tani" . $row['tani_num'] . "</a></div></td>";
                                    echo '</tr>';
                                }

                            ?>
                           
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
    var name = row.cells[3].getElementsByTagName("a")[0].textContent.toLowerCase();

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