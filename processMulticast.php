<?php
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
require_once($base_url."/config-students.php");
require_once('./lib/phpMailer/src/PHPMailer.php');
require_once('./lib/phpMailer/src/SMTP.php');
require_once('./lib/phpMailer/src/Exception.php');



if(isset($_POST['name'])){
    $user_email = $_POST['email'];
    $user_name = $_POST['name'];
    $surname = $_POST['surname'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $emailList = $_POST['emailList'];
    foreach ($emailList as $key => $value) {
        $sql = "INSERT INTO broadcast (subject, email, to_email, message, name, surname) VALUES (:subject, :email, :to_email, :message, :name, :surname)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':email', $user_email);
        $stmt->bindParam(':to_email', $value);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':name', $user_name);
        $stmt->bindParam(':surname', $surname);
        $stmt->execute();
    }
} else
    echo 'post data not set';
?>