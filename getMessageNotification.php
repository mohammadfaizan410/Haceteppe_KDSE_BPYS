<?php
session_start();

require_once("config-students.php");
require_once("config-teachers.php");

if (isset($_SESSION['userlogin'])) {
    $myUser = $_SESSION['userlogin']['id'];
    $myEmail = $_SESSION['userlogin']['email'];
    $name = $_SESSION['userlogin']['name'];
    $surname = $_SESSION['userlogin']['surname'];
    $teacher_list = 'none';
    $student_list = 'none';
    $all_messages = 'none';

    if ($_SESSION['userlogin']['type'] == 'teacher'){
        $sql = "SELECT * FROM teachers where email != '$myEmail'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $teacher_list = $result;
        } else {
            echo '';
        }
        $sql = "SELECT * FROM messages WHERE (FIND_IN_SET(:userid, reciever_list) OR FIND_IN_SET('all_teachers', reciever_list)) ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userid', $myUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($_SESSION['userlogin']['type'] == 'student'){
        $sql = "SELECT * FROM students where email != '$myEmail'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $teacher_list = $result;
        } else {
            echo '';
        }
        $sql = "SELECT * FROM messages WHERE (FIND_IN_SET(:userid, reciever_list) OR FIND_IN_SET('all_students', reciever_list)) ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userid', $myUser, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}

if ($result) {
    // The current ID exists in the receiver list
    $last_message = end($result);
} else {
    // The current ID does not exist in the receiver list
    echo '';
}

$current_time = date("Y-m-d H:i:s");
$current_hour = date("H", strtotime($current_time));
$current_minute = date("i", strtotime($current_time));

if (isset($last_message)){
    $hour_of_last_message = date("H", strtotime($last_message['time']));
    $minute_of_last_message = date("i", strtotime($last_message['time']));
}

if (isset($last_message) && $current_hour == $hour_of_last_message && $current_minute == $minute_of_last_message) {
    // Prepare the response as an associative array
    $response = array(
        'sender_name' => $last_message['sender_name']
    );
} else {
    $response = array(
        'sender_name' => 'none'
    );
}

// Check if it's an AJAX request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Set the response content type as JSON
    header('Content-Type: application/json');
    // Return the response as JSON
    echo json_encode($response);
    exit(); // Terminate the script
}

?>