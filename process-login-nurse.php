<?php
session_start();

require_once('config-nurses.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM nurses WHERE email = ? AND password = ? LIMIT 1";
$smtmselect = $db->prepare($sql);
$result = $smtmselect->execute([$email, $password]);
if ($result) {
    $user = $smtmselect->fetch(PDO::FETCH_ASSOC);
    if ($smtmselect->rowCount() > 0) {
        $_SESSION['userlogin'] = $user;
        echo 'Successful';
    } else {
        echo 'Wrong e-mail or password';
    }
} else {
    echo 'error';
}
