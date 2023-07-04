<?php
echo 'hello there';
require_once("config-students.php");

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "DELETE FROM students WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo 'success';
    } else {
        echo $result;
    }
} else {
    echo 'student dosent exist';
}
?>