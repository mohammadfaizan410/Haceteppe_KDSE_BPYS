<?php
require_once("config-students.php");
require_once('./lib/phpMailer/src/PHPMailer.php');
require_once('./lib/phpMailer/src/SMTP.php');
require_once('./lib/phpMailer/src/Exception.php');

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';


if(isset($_POST['name'])){
    $user_email = $_POST['email'];
    $sql = "SELECT * FROM students WHERE email != '$user_email'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $allStudents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($allStudents) {
        echo json_encode($allStudents);
    } else {
        echo 'no students to show';
    }
} else
    echo 'post data not set';
?>