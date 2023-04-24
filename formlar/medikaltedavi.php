
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
include('connect.php');
if(isset($_POST['submit'])){
for($i=0;$i<count($_POST['tedavino']);$i++){
		$delivery_date = $_POST['delivery_date'][$i];
		$delivery_time = $_POST['delivery_time'][$i];
        $medicine_name = $_POST['medicine_name'][$i];
        $medicine_dose = $_POST['medicine_dose'][$i];
        $delivery_method = $_POST['delivery_method'][$i];
		$delivery_time = $_POST['delivery_time'][$i];
        
        if($delivery_date!=='' && $delivery_time!=='' && $medicine_name!=='' && $medicine_dose!=='' && $delivery_method!=='' && $delivery_time!==''){
    $sql="INSERT INTO form13(delivery_date,delivery_time,medicine_name,medicine_dose,delivery_method,delivery_time)VALUES('$delivery_date','$delivery_time','$medicine_name','$medicine_dose','$delivery_method','$delivery_time')";
            $stmt=$con->prepare($sql);
            $stmt->execute();
            //echo '<div class="alert alert-success" role="alert">Submitted Successfully</div>';
        }
        else{
             
            echo '<div class="alert alert-danger" role="alert">Error Submitting in Data</div>';*
        }
    }
    echo "<script type='text/javascript'>";
        echo "alert('Submitted successfully')";
        echo "</script>";
}
?>
<html>
<head>
<title>Form 13 Medikal Tedavi</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<style>
.container{
     
    width:80%;
    height:30%;
    padding:20px;
}
</style>
</head>
<body>
<div class="container">
<h3 align="center"><u>Medikal Tedavi</u></h3>
<br/><br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="col-sm-1">
          <label for="Age">Tedavi No:</label>
          <input type="text" class="form-control sl" name="tedavino[]" id="tedavino" value="1" readonly="">
        </div>

		<div class="col-sm-3">
         <label for="Delivery Date">Tedavi Tarihi:</label>
            <input type="date" id="ded" name="delivery_date[]" class="form-control"/>
        </div>

		<div class="col-sm-3">
          <label for="Delivery Time">Tedavi Saati:</label>
          <input type="text" class="form-control" name="delivery_time[]" id="dt" placeholder="Tedavi Saatini Giriniz">
        </div>
         
        <div class="col-sm-3">
          <label for="Medicine Name">İlacın Adı:</label>
          <input type="text" class="form-control" name="medicine_name[]" id="medicine_name" placeholder="Ilacin Adi">
        </div>
         
        <div class="col-sm-3">
         <label for="Medicine Dose">İlacın Dozu:</label>
          <input type="text" class="form-control" name="medicine_dose[]" id="md" placeholder="Ilacin Dozu">
        </div>
         
        <div class="col-sm-1">
          <label for="Delivery Method">Uygulama Yolu:</label>
          <input type="text" class="form-control" id="delivery_method" name="delivery_method[]" placeholder="Uygulama Yolu">
        </div>

		<div class="col-sm-3">
         <label for="Delivery Time">Uygulama Zamanı:</label>
          <input type="text" class="form-control" name="delivery_time[]" id="dt" placeholder="Uygulama Zamani">
        </div>
         
        
         
        </div><br/>
        <div id="next"></div>
        <br/>
    <button type="button" name="addrow" id="addrow" class="btn btn-success pull-right">Yeni Satır Ekle</button>
    <br/><br/>
    <button type="submit" name="submit" class="btn btn-info pull-left">Kaydet</button>
    </form>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
$('#addrow').click(function(){
        var length = $('.sl').length;
        var i   = parseInt(length)+parseInt(1);
        var newrow = $('#next').append('<div class="row"><div class="col-sm-1"><label for="Age">Tedavi No:</label><input type="text" class="form-control sl" name="tedavino[]" value="'+i+'" readonly=""></div><div class="col-sm-3"><label for="Delivery Date">Tedavi Tarihi:</label><input type="date" id="ded+i+" name="delivery_date[]" class="form-control"/></div><div class="col-sm-3"><label for="Delivery Time">Tedavi Saati:</label><input type="text" class="form-control" name="delivery_time[]" id="dt+i+" placeholder="Tedavi Saatini Giriniz"></div><div class="col-sm-3"><label for="Medicine Name">İlacın Adı:</label><input type="text" class="form-control" name="medicine_name[]" id="medicine_name+i+" placeholder="Ilacin Adi"></div><div class="col-sm-3"><label for="Medicine Dose">İlacın Dozu:</label><input type="text" class="form-control" name="medicine_dose[]" id="md+i+" placeholder="Ilacin Dozu"></div><div class="col-sm-1"><label for="Delivery Method">Uygulama Yolu:</label><input type="text" class="form-control" id="delivery_method+i+" name="delivery_method[]" placeholder="Uygulama Yolu"></div><div class="col-sm-3"><label for="Delivery Time">Uygulama Zamanı:</label><input type="text" class="form-control" name="delivery_time[]" id="dt+i+" placeholder="Uygulama Zamani"></div><input type="button" class="btnRemove btn-danger" value="Remove"/></div><br>');
         
        });
     
    // Removing event here
  $('body').on('click','.btnRemove',function() {
       $(this).closest('div').remove()
	   
  });
         
</script>
</body>
</html>