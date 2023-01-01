<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST)) {
    echo 'aasdafa';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = sha1(($_POST['password']));

    echo $name;
    $sql = "INSERT INTO students (name, surname, email, password) VALUES(?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$name, $surname, $email, $password]);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else
    echo 'no data';
