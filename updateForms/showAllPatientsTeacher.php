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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KDSE-BPYS</title>
</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
    <span class='close closeBtn m-3' id='closeBtn1'>&times;</span>

        <?php
        require_once('../config-students.php');
        $sql = "SELECT * FROM  patients  WHERE id =" . $_GET['student_id'];
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
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="pb-2">Hasta Listesi / Öneriler</p>
                    <p style="color : #333333; font-size: 20px" class="pb-2">Öğrenci: <?php echo $_GET['student_name']?></p>
                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Ad veya soyadına göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <thead>
                            <tr class="darkcyan table-head">

                                <th scope="col" style="font-weight : bold; font-size: large;">İsim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Soyisim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Yaş</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">formlar</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">tanilar</th>

                            </tr>
                            <?php
                            if (isset($values) && count($values) > 0) {
                                foreach ($values as $key => $value) {
                                    
                                    $fullName = $value['name'] . " " . $value['surname'];
                                    echo '<tr class="mb-4 align-items-center">                            
                                    <td scope="col" style="color: #333333;">' . $value['name'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['surname'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['age'] . '</td>
                                    <td scope="col"><a style="color: white;" id="showSubmittedforms" class="showallforms btn btn-success" href="#" data-student-name="'.$_GET['student_name'].'"  data-patient-id="' . $value['patient_id'] . '" data-patient-name="' . $fullName . '" >Submitted forms</a></td>
                                    <td scope="col"><a style="color: white;" id="showSubmittedtanis" class="showallforms btn btn-success" href="#" data-student-name="'.$_GET['student_name'].'" data-patient-id="' . $value['patient_id'] . '" data-patient-name="' . $fullName . '">Submitted tanis</a></td>
                                </tr>';
                                }
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
            $(function() {
                $("#closeBtn1").click(function() {
                    let url = "<?php echo $base_url; ?>/updateForms/showAllStudents.php";
                    $('#content').load(url);
                });
                $("#showSubmittedforms").click(function() {
                    var patient_id = $(this).data("patient-id");
                    var patient_name = $(this).data("patient-name");
                    var student_name = $(this).data("student-name");
                    var url = "<?php echo $base_url; ?>/updateForms/showFormsTeacher.php?patient_id=" +
                    patient_id + "&patient_name=" + encodeURIComponent(patient_name) + "&student_id=" + <?php echo $_GET['student_id'] ?> + "&student_name=" + encodeURIComponent(<?php echo json_encode($_GET['student_name']) ?>);
                    $('#content').load(url);
                });
                $('#showSubmittedtanis').click(function() {
                var patient_id = $(this).data("patient-id");
                var patient_name = $(this).data("patient-name");
                console.log(patient_id, patient_name);
                var url = "<?php echo $base_url; ?>/updateForms/showTanisTeacher.php?patient_id=" +
                    patient_id + "&patient_name=" + encodeURIComponent(patient_name) + "&student_id=" + <?php echo $_GET['student_id'] ?> + "&student_name=" + encodeURIComponent(<?php echo json_encode($_GET['student_name']) ?>);
                $('#content').load(url);
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
      var name = row.cells[0].textContent.toLowerCase();
      var surname = row.cells[1].textContent.toLowerCase();
      if (name.includes(filter) || surname.includes(filter) || (name + " " + surname).includes(filter)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  });
</script>
</body>

</html>