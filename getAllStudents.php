<?php
require_once("config-students.php");
require_once('./lib/phpMailer/src/PHPMailer.php');
require_once('./lib/phpMailer/src/SMTP.php');
require_once('./lib/phpMailer/src/Exception.php');



if(isset($_POST['name'])){

    $sql = "SELECT * FROM students";
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