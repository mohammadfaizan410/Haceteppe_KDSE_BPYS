<?php
require_once("config-teachers.php");
?>
<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = sha1(($_POST['password']));

    $sql = "INSERT INTO teachers (name, surname, email, password) VALUES(?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$name, $surname, $email, $password]);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else
    echo 'no data';
