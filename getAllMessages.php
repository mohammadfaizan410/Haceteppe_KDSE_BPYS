<?php
session_start();
require("./config-students.php");
$myUser = $_SESSION['userlogin']['id'];
$sql = "SELECT * FROM messages WHERE FIND_IN_SET(:userid, reciever_list) ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->bindParam(':userid', $myUser, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($result) {
    echo json_encode($result);
} else {
    echo 'error';
}
?>