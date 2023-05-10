<?php

$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
require_once("./config-messages.php");

if(isset($_POST['email'])){
    $user_email = $_POST['email'];
    $sql = "SELECT * FROM broadcast WHERE to_email = :to_email order by id desc";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':to_email', $user_email);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($messages);
    echo json_encode($messages);
} else
    echo 'post data not set';