<?php
session_start();
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
<link href="bootstrap.min.css" rel="stylesheet">
<!-- Template Stylesheet -->
<link href="style.css" rel="stylesheet">
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
            <h1 class="form-header">GÜNLÜK BAKIM UYGULAMALARI</h1>
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                    	<div class="input-section d-flex">
                            <p class="usernamelabel">Uygulama Saati:</p>
                            <input type="text" class="form-control" required name="applicationTime" id="diger" placeholder="Application Time">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Uygulama Açıklaması:</p>
                            <input type="text" class="form-control" required name="applicationDescription" id="diger" placeholder="Application Description">
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Uygulama Adı </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Ağız Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ağız Bakımı</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Yüz Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yüz Bakımı</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="El Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">El Bakımı</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Ayak Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ayak Bakımı</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Vücut/Perine Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Vücut/Perine Bakımı</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Genel Vücut Banyosu">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Genel Vücut Banyosu</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Saç Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Saç Bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="NG Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">NG Bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="PEG bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">PEG bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Gastrik Rezidü Takibi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Gastrik Rezidü Takibi</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Mesane katatetizasyonu Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Mesane katatetizasyonu Bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Damar yolu bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Damar yolu bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="SVK bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">SVK bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Yara bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Yara bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Dren Bakımı">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Dren Bakımı</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Dren takibi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Dren takibi</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Kanama izlemi">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Kanama izlemi</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Ekstremite Elevasyonu">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Ekstremite Elevasyonu</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Sıcak uygulama">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Sıcak uygulama</span>
                                    </label>
                                </div>
								<div class="form-check">
                                    <input class="form-check-input" type="radio" name="uygulamaOption" id="ÖdemŞiddeti" value="Soğuk Uygulama">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">Soğuk Uygulama</span>
                                    </label>
                                </div>

                            </div>
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
				  let applicationTime = new Time()
                  let applicationDescription = $("input[name='applicationDescription']").val();
                  let patient_id = parseInt($("input[name='patient_id']").val());
                  let creationDate = yourDate.toISOString().split('T')[0];
                  let updateDate = yourDate.toISOString().split('T')[0];
                  let applicationTime = $("input[name='applicationTime']").val();
                  let applicationDescription = $("input[name='applicationDescription']").val();
                  let uygulamaOption =  $("input[type='radio'][name='uygulamaOption']:checked").val()
                  
                  console.log("values initiated")

                  $.ajax({
                      type: 'POST',
                      url: 'http://18.159.134.238/Hacettepe-KDSE-BPYS/submitOrUpdateGunlukbakim_form15.php',
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
                          applicationTime: applicationTime
                          applicationDescription: applicationDescription
                          uygulamaOption: uygulamaOption
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