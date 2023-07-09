<?php
require_once("./config-students.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $newPassword = sha1($_POST['password']);
    $sql = "UPDATE teachers SET password = ? WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$newPassword, $email]);
    $result = $stmt->rowCount();

    if ($result > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'no data';
}
?>