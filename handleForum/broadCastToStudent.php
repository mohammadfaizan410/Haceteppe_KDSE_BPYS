<?php

$time = date("Y-m-d H:i:s");

require_once("../config-students.php");
if (isset($_POST['sender_email'])) {
    if(isset($_POST['broadcast'])){
        $studentList =  'all_students';
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sender_email = $_POST['sender_email'];
        $sender_name = $_POST['senderName'];
        $sql = "INSERT INTO messages (sender_email, sender_name, subject, message, reciever_list, time) VALUES(?,?,?,?,?,?)";
        $smtminsert = $db->prepare($sql);
        $result = $smtminsert->execute([$sender_email, $sender_name, $subject, $message, $studentList, $time]);
    }else{
        $studentList = implode(',', $_POST['student_list']);
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sender_email = $_POST['sender_email'];
        $sender_name = $_POST['senderName'];
        $sql = "INSERT INTO messages (sender_email,sender_name, subject, message, reciever_list, time) VALUES(?,?,?,?,?,?)";
        $smtminsert = $db->prepare($sql);
        $result = $smtminsert->execute([$sender_email, $sender_name, $subject, $message, $studentList, $time]);
    }
  
    if ($result) {
        echo 'success';
    } else {
        echo 'failed';
    }
} else {
    echo 'no data';
}
?>