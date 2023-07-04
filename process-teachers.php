<?php
require_once("config-teachers.php");
?>
<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = sha1(($_POST['password']));
    $admin = $_POST['admin'];

    $sql = "INSERT INTO teachers (name, surname, email, password, admin) VALUES(?,?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$name, $surname, $email, $password, $admin]);
    if ($result) {
        echo 'Başarılı';
    } else {
        echo 'Hata';
    }
} else
    echo 'no data';
