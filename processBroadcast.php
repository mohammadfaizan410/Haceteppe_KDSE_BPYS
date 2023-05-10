<?php
require_once("config-students.php");
require_once('./lib/phpMailer/src/PHPMailer.php');
require_once('./lib/phpMailer/src/SMTP.php');
require_once('./lib/phpMailer/src/Exception.php');

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';


if(isset($_POST['name'])){

    $user_email = $_POST['email'];

    $user_name = $_POST['name'];
    $surname = $_POST['surname'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "SELECT email FROM students WHERE email != :user_email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_email', $user_email);
    $stmt->execute();
    $emails = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if ($emails) {
        foreach ($emails as $email) {
            $sql = "INSERT INTO broadcast (subject, email, to_email, message, name, surname) VALUES (:subject, :email, :to_email, :message, :name, :surname)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':email', $user_email);
            $stmt->bindParam(':to_email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':name', $user_name);
            $stmt->bindParam(':surname', $surname);
            $stmt->execute();
        }
        echo json_encode($emails);
    } else {
        echo 'No emails found.';
    }
} else
    echo 'post data not set';
?>