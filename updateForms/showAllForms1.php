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

require_once('../config-students.php');
$patient_id = $_GET['patient_id'];
$patient_name = $_GET['patient_name'];
//echo $patient_id;
$sql = "SELECT * FROM  form2  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values1 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form3 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values2 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form4 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values3 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form5 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values4 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form6 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values5 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form7 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values6 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form8 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values7 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form9 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values8 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form10 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values9 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form11 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values10 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form12 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values11 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form13 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values12 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form14 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values13 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form15 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values14 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM ozgecmisform1 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values15 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM solunumgereksinimi_form1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values16 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  hareketform1 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values17 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM vucudutemizform1 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values18 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  katererform1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values19 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  ilestimform1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values20 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  calismaform1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values21 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  egitimform1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values22 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  bosaltimform1  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values23 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  form1_beslenme  WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values24 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};
$sql = "SELECT * FROM  uyukuform1 WHERE patient_id =" . $patient_id;
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute();
$values = [];
if ($result) {
        $values25 = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
} else {
        echo 'error';
};

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
        <div class="send-patient">
        <span class='close closeBtn' id='closeBtn1'>&times;</span>
            <div class="patients-table text-center rounded p-4" id="patients-table">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p style="color : #333333; font-size: 20px" class="pb-2">Yeni Formlar</p>

                </div>
                <div class="table-responsive">
                <input type="text" id="searchInput" class='form-control mb-5' placeholder="Form Ad göre ara">

                    <table class="table text-start align-middle table-hover mb-0" id='dataTable'>
                        <thead>
                        <tr class="darkcyan table-head">
                                <th scope="col" style="font-weight : bold; font-size: large;">Hasta:<?php echo $_GET['patient_name'] ?></th>
                            </tr>
                        <?php if (count($values24) == 0): ?>
                            <tr><td><div class="mt-3 entered-forms align-items-center"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                               href="<?php echo $base_url; ?>/formlar/beslenmeGereksinimi_form1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Form1_beslenme</a><div></td></tr>
                               <?php endif; ?> 
                        <?php if (count($values23) == 0): ?>
                               <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bosaltimForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">bosaltimForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values21) == 0): ?>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/calismaForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">calismaForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values22) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/egitimForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">egitimForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values17) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/hareketForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">hareketForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values20) == 0): ?>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/iletisimForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">iletisimForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values19) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/kateterForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">kateterForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values15) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/ozgecmis_form1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">ozgecmis_form1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values16) == 0): ?>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/solunumgereksinimi_form1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">solunumgereksinimi_form1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values25) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/uykuForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">uykuForm1</a>
                        </div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values18) == 0): ?>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/vucuduTemizForm1.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">vucuduTemizForm1</a>
                        </div></td></tr>
                        <?php endif; ?>
                        <?php if (count($values1) == 0): ?>
                        <tr><td> <div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color: white;"
                                href="<?php echo $base_url; ?>/formlar/Form2.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">EĞİTİM GEREKSİNİMİ</a></div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values2) == 0): ?>       
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form3.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Düşme Riski Değerlendirmesi
                                </a></div></td></tr>
                        <?php endif; ?> 
                        <?php if (count($values3) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form4.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Düşme Bildirimi</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values4) == 0): ?>
                        <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form5.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Glaskow Koma Skalası</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values5) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form6.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Braden Bası Yarası Risk Değerlendirme Aracı</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values6) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form7.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Basınç Yarası Formu</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values7) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form8.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Ödem Değerlendirmesi</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values8) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/tetkiksonuclari_form9.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">TETKİK SONUÇLARI GİRİŞİ</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values9) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/yasamsalbulgutakibi_form10.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">YAŞAMSAL BULGU TAKİBİİ   </a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values10) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/Form11.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">ALDIĞI ÇIKARDIĞI İZLEMİ</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values11) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/siviizlem.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Sıvı İzlem</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values12) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/medikaltedavi.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Medikal Tedavi</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values13) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/bakimplani.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Bakım Planı</a></div></td></tr>
                                <?php endif; ?> 
                        <?php if (count($values14) == 0): ?>
                                <tr><td><div class="mt-3 entered-forms"><a class="nav-items review btn btn-success w-50 p-3" style="color : white;"
                                href="<?php echo $base_url; ?>/formlar/gunlukbakimuygulamalari.php?patient_id=<?php echo $_GET['patient_id']; ?>&patient_name=<?php echo $_GET['patient_name']; ?>">Günlük Bakım Planı</a></div></td></tr>
                        <?php endif; ?>
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