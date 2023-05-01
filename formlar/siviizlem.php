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
            <h1 class="form-header">ALDIĞI ÇIKARDIĞI İZLEMİ</h1> 
            <div class="input-section-item">
                <div class="patients-save">
                    <form action="" method="POST" class="patients-save-fields">
                    <div class="input-section d-flex">
                            <p class="usernamelabel">Patient Name:</p>
                            <input type="text" class="form-control" required name="patient_name" id="diger" placeholder="Patient Name">
                        </div>
                `       <div class="input-section d-flex">
                            <p class="usernamelabel">Patient ID:</p>
                            <input type="text" class="form-control" required name="patient_id" id="diger" placeholder="Patient ID">
                        </div>
                `       
						<div class="input-section d-flex">
                            <p class="usernamelabel">zaman aralığını seçin: </p>
                            <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range" value="08.00-16.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">08.00-16.00</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range" value="16.00-24.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">16.00-24.00</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="time_range" id="time_range" value="24.00-08.00">
                                    <label class="form-check-label" for="ÖdemŞiddeti">
                                        <span class="checkbox-header">24.00-08.00</span>
                                    </label>
                                </div>
                            </div>
                        </div>
						<h2 class="form-header">Aldığı</h2> 
						<div class="input-section d-flex">
                            <p class="usernamelabel">IV:</p>
							<div class='d-flex flex-column w-75'>
								<input type="number" class="form-control mt-2" required name="iv_input1" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="iv_input2" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="iv_input3" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="iv_input4" id="diger" placeholder="IV input">
							</div>
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Kan Ürünü:</p>
							<div class='d-flex flex-column w-75'>
								<input type="number" class="form-control mt-2" required name="blood_product1" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="blood_product2" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="blood_product3" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="blood_product4" id="diger" placeholder="IV input">
							</div>
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Oral:</p>
							<div class='d-flex flex-column w-75'>
								<input type="number" class="form-control mt-2" required name="oral1" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="oral2" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="oral3" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="oral4" id="diger" placeholder="IV input">
							</div>
                        </div>


						<h2 class="form-header">Çıkardığı</h2> 
						<div class="input-section d-flex">
                            <p class="usernamelabel">İdrar:</p>
							<div class='d-flex flex-column w-75'>
								<input type="number" class="form-control mt-2" required name="idrar_input1" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="idrar_input2" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="idrar_input3" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="idrar_input4" id="diger" placeholder="IV input">
							</div>
                        </div>
						<div class="input-section d-flex">
                            <p class="usernamelabel">Gaita :</p>
							<div class='d-flex flex-column w-75'>
								<input type="number" class="form-control mt-2" required name="gaita_input1" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="gaita_input2" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="gaita_input3" id="diger" placeholder="IV input">
								<input type="number" class="form-control mt-2" required name="gaita_input4" id="diger" placeholder="IV input">
							</div>
                        </div>
							<input class="form-control submit" type="submit" name="submit" id="submit" value="Submit and enter new entry">
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
                  let form_num = 10;
                  let patient_name = $("input[name='patient_name']").val();
                  let patient_id = parseInt($("input[name='patient_id']").val());
                  let yourDate = new Date()
                  let creationDate = yourDate.toISOString().split('T')[0];
                  let updateDate = yourDate.toISOString().split('T')[0];
				  let time_range = $("input[type='radio'][name='time_range']:checked").val(); 

                  $.ajax({
                      type: 'POST',
                      url: 'http://18.159.134.238/Hacettepe-KDSE-BPYS/submitOrUpdateAldigi_form11.php',
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
                          time_range:time_range,
						  iv_input1:iv_input1,
						  iv_input2:iv_input2,
						  iv_input3:iv_input3,
						  iv_input4:iv_input4,
						  blood_product1:blood_product1,
						  blood_product2:blood_product2,
						  blood_product3:blood_product3,
						  blood_product4:blood_product4,
						  idrar_input1:idrar_input1,
						  idrar_input2:idrar_input2,
						  idrar_input3:idrar_input3,
						  idrar_input4:idrar_input4,
						  gaita_input1:gaita_input1,
						  gaita_input2:gaita_input2,
						  gaita_input3:gaita_input3,
						  gaita_input4:gaita_input4,
						  aldigi_total1:aldigi_total1,
						  aldigi_total2:aldigi_total2,
						  aldigi_total3:aldigi_total3,
						  aldigi_total4:aldigi_total4,
						  cikardigi_total1: cikardigi_total1,
						  cikardigi_total2: cikardigi_total2,
						  cikardigi_total3: cikardigi_total3,
						  cikardigi_total4: cikardigi_total4,
						  total : total
                      },
                      success: function(data) {
                          console.log(data);
                          alert("Success");
                      },
                      error: function(data) {
                          console.log(data);
                      }
                  })
              }
          })

      });
  </script>
      <script src=""></script>
      </body>

     </html>