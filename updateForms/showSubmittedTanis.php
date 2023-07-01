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
        $sql = "SELECT * FROM  tani1  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani2  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani3  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani4  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani5  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani6  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        };
        $sql = "SELECT * FROM  tani7  WHERE patient_id =" . $_GET['patient_id'];
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $tani7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
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
                            <tr>
                                <th scope="col" style="font-weight : bold; font-size: large;">tani ID</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Submission Date</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Submission Time</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">View</th>
                            </tr>
                           <?php
                           foreach($tani1 as $tani1){
                               echo "
                               <tr>
                               <td>".$tani1['tani_id']."</td>
                               <td>".$tani1['creation_date']."</td>
                               <td>".$tani1['time']."</td>
                               <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani1-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani1['tani_id']. "'>Tani1</a></td>
                               </tr>";
                            }
                            foreach($tani2 as $tani2){
                                echo "
                                <tr>
                                <td>".$tani2['tani_id']."</td>
                                <td>".$tani2['creation_date']."</td>
                                <td>".$tani2['time']."</td>
                                <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani2-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani2['tani_id']. "'>Tani2</a></td>
                                </tr>";
                             }
                                foreach($tani3 as $tani3){
                                    echo "
                                    <tr>
                                    <td>".$tani3['tani_id']."</td>
                                    <td>".$tani3['creation_date']."</td>
                                    <td>".$tani3['time']."</td>
                                    <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani3-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani3['tani_id']. "'>Tani3</a></td>
                                    </tr>";
                                }
                                foreach($tani4 as $tani4){
                                    echo "
                                    <tr>
                                    <td>".$tani4['tani_id']."</td>
                                    <td>".$tani4['creation_date']."</td>
                                    <td>".$tani4['time']."</td>
                                    <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani4-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani4['tani_id']. "'>Tani4</a></td>
                                    </tr>";
                                }
                                foreach($tani5 as $tani5){
                                    echo "
                                    <tr>
                                    <td>".$tani5['tani_id']."</td>
                                    <td>".$tani5['creation_date']."</td>
                                    <td>".$tani5['time']."</td>
                                    <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani5-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani5['tani_id']. "'>Tani5</a></td>
                                    </tr>";
                                }
                                foreach($tani6 as $tani6){
                                    echo "
                                    <tr>
                                    <td>".$tani6['tani_id']."</td>
                                    <td>".$tani6['creation_date']."</td>
                                    <td>".$tani6['time']."</td>
                                    <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani6-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani6['tani_id']. "'>Tani6</a></td>
                                    </tr>";
                                }
                                foreach($tani7 as $tani7){
                                    echo "
                                    <tr>
                                    <td>".$tani7['tani_id']."</td>
                                    <td>".$tani7['creation_date']."</td>
                                    <td>".$tani7['time']."</td>
                                    <td><a class='nav-items review btn btn-success p-3 w-75' style='color: white;' href='" . $base_url . "/taniReview/tani7-review.php?patient_id=" . $_GET['patient_id'] . "&patient_name=" . $_GET['patient_name'] . "&tani_id=" . $tani7['tani_id']. "'>Tani7</a></td>
                                    </tr>";
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