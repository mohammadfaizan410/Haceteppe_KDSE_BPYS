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
require_once('../config-students.php');
$userid = $_SESSION['userlogin']['id'];
$form_id = $_GET['form_id'];
$sql = "SELECT * FROM form14 where form_id= $form_id";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
if ($result) {
    $form14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo 'error';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>e-BYRYS-KKDS</title>
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
<!-- Customized Bootstrap Stylesheet -->
<link href="../bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Template Stylesheet -->
<link href="../style.css" rel="stylesheet">
   <style>
		table {
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid black;
			padding: 10px;
		}
		th {
			background-color: #eee;
		}
    h1 {
            text-align: center;
    }
    tr, td{
      width: 200px;
    }
	</style>
  		<body>
		  <div class="container-fluid pt-4 px-4">
            <div class="send-patient">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">Günlük Bakım Planı</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                    <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control"  value="<?php echo $form15[0]['patient_name']; ?>" required name="patient_name" id="diger" placeholder="Patient Name" disabled>
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" value="<?php echo $form15[0]['patient_id']; ?>" required name="patient_id" id="diger" placeholder="Patient ID" disabled>
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Uygulamalar</p>
                            <input type="text" class="form-control" required name="applications" id="diger" placeholder="applications" maxlength="100" value="<?php echo $form15[0]['applications']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Saat :</p>
                            <input type="time" class="form-control" required name="hours" id="diger" value="<?php echo $form15[0]['hours']; ?>">
                        </div>
                        <div class="input-section d-flex">
                            <p class="usernamelabel">Açıklama Giriniz</p>
                            <input type="text" class="form-control" required name="description" id="diger" placeholder="Açıklama Giriniz" maxlength="250" value="<?php echo $form15[0]['description']; ?>">
                        </div>
                    <input type="submit" class="form-control submit" name="submit" id="submit" value="Kaydet">
                    </form>
                </div>
            </div>
        </div>

	
    </div>
    <script>
      $(function() {
          $('#closeBtn').click(function(e) {
              $("#content").load("formlar-student.php");

          })
      });
  </script>
<script>
      $(function() {
          $('#submit').click(function(e) {
              e.preventDefault()
              console.log("clicked")
              var valid = this.form.checkValidity();

              if (valid) {
                  var id = <?php
                  $userid = $_SESSION['userlogin']['id'];
                  echo $userid
                  ?>;
                  var name = $('#name').val();
                  var surname = $('#surname').val();
                  var age = $('#age').val();
                  var not = $('#not').val();
                  let form_num = 15;
                  var patient_id = <?php
                  $userid = $_GET['patient_id'];
                  echo $userid
                  ?>;
                   let patient_name = "<?php
                  echo urldecode($_GET['patient_name']);
                  ?>";
                  let yourDate = new Date();
                  let creationDate = yourDate.toISOString().split('T')[0];
                  let updateDate = yourDate.toISOString().split('T')[0];
                  let applications = $("input[name='applications']").val();
                  let hours = $("input[name='hours']").val();
                  let description = $("input[name='description']").val();
                  console.log("values initiated")

                  $.ajax({
                      type: 'POST',
                      url: '<?php echo $base_url; ?>/submitOrUpdateGunlukBakimPlani_form15.php',
                      data: {
                          id: id,
                          name: name,
                          surname: surname,
                          age: age,
                          not: not,
                          form_num:form_num,
                          patient_id:patient_id,
                          patient_name:patient_name,
                          creation_date:creationDate,
                          update_date :updateDate,
                          applications: applications,
                          hours: hours,
                          description: description
                      },
                      success: function(data) {
                          console.log(data);
                          alert("Success");
                      },
                      error: function(data) {
                          console.log(data)
                      }
                  })



              }
          })

      });
  </script>
      <script src=""></script>
      </body>

     </html>