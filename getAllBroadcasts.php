<?php
require_once("config-students.php");
require_once('./lib/phpMailer/src/PHPMailer.php');
require_once('./lib/phpMailer/src/SMTP.php');
require_once('./lib/phpMailer/src/Exception.php');



if(isset($_POST['email'])){
    $user_email = $_POST['email'];
    $sql = "SELECT * FROM broadcast WHERE to_email = :to_email order by id desc";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':to_email', $user_email);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($messages);
} else
    echo 'post data not set';