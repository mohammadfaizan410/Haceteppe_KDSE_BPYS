<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST)) {
    echo 'aasdafa';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];


    echo $name;
    $sql = "INSERT INTO patients (id ,name, surname, age) VALUES(?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$id, $name, $surname, $age]);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else
    echo 'no data';
