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
#warning-container {
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

#warning {
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
.warning-btn{
    width: 100px;
    height: 30px;
  background-size: contain;
  background-repeat: no-repeat;
  margin: auto;
  background-color: red;
  border-radius: 10px;
  margin-left: 40px;
}
    </style>


<body style="background-color:white">
<div id="tick-container">
  <div id="tick"></div>
</div>
<div id="warning-container">
  <div id="warning"><p>Are you sure you want to delete this student?</p>
  <button id='confirm-delete' class='warning-btn'>Evet</button>
  <button id='cancel-delete' class='warning-btn' style='background-color: grey'>cancel</button>
  </div>
</div>
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('../config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  students";
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
                    <p style="color : #333333; font-size: 20px" class="pb-2">Student List</p>

                </div>

                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Ad veya soyadına göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <thead>
                            <tr class="darkcyan table-head">

                                <th scope="col" style="font-weight : bold; font-size: large;">İsim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Soyisim</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">e-posta</th>
                                <th scope="col" style="font-weight : bold; font-size: large;">Detaylar</th>
                                <?php
                                    if($_SESSION['userlogin']['admin'] ==='admin'){
                                        echo '<th scope="col" style="font-weight : bold; font-size: large;">İşlemler</th>';
                                    }
                                ?>

                            </tr>
                            <?php
                            if (isset($values) && count($values) > 0) {
                                foreach ($values as $key => $value) {
                                    
                                    $fullName = $value['name'] . " " . $value['surname'];
                                    echo '<tr class="mb-4 align-items-center" id="student-details-row">                            
                                    <td scope="col" style="color: #333333;">' . $value['name'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['surname'] . '</td>
                                    <td scope="col" style="color: #333333;">' . $value['email'] . '</td>
                                    <td scope="col"><a style="color: white;" class="showallforms btn btn-success p-3" href="#" data-student-id="' . $value['id'] . '" data-student-name="' . $fullName . '">Detayları Dörüntüle</a></td>';
                                    if($_SESSION['userlogin']['admin'] ==='admin'){
                                        echo '<td scope="col"><a style="color: white;" class="btn btn-danger p-3" id="disableStudent" data-student-email="' . $value['email'] . '">Öğrenciyi Devre Dışı Bırak</a></td>';
                                    }
                                    
                               echo '</tr>';
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
                $("a.showallforms").on("click", function(e) {
                    e.preventDefault();
                    var student_id = $(this).data("student-id");
                    var student_name = $(this).data("student-name");
                    var url = "<?php echo $base_url; ?>/updateForms/showAllPatientsTeacher.php?student_id=" +
                        student_id + "&student_name=" + encodeURIComponent(student_name);
                    $("#content").load(url);
                });
            });

            $('#disableStudent').click(function() {
                let student_email = $(this).data("student-email");
                $('#warning-container').fadeIn(100);
                $('#cancel-delete').click(function(){
                    $('#warning-container').fadeOut(100);
                });
                $('#confirm-delete').click(function(){
               $.ajax({
                url: "<?php echo $base_url?>/disableStudent.php?&email="+student_email,
                success: function (response) {
                    if(response === 'success'){
                        alert('Student disabled successfully')
                        $("#tick-container").fadeIn(800);
                            // Change the tick background to the animated GIF
                            $("#tick").css("background-image", "url('./check-2.gif')");

                            // Delay for 2 seconds (adjust the duration as needed)
                            setTimeout(function() {
                            // Load the content
                            $("#content").load("<?php echo $base_url?>/updateForms/showAllStudents.php");
                            $("#tick-container").fadeOut(600);
                            // Hide the tick container
                            }, 1000);
                    }
                    else{
                        alert(response)
                    }
                }
               });
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