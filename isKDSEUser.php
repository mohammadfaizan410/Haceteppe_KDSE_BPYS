<?php
require_once('config-students.php');
if(isset($_POST['userID'])){
    if($_POST['type'] == 'student'){
        $sql = "SELECT * FROM students WHERE id = '".$_POST['userID']."'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            if(count($result) > 0)
            echo 'exists';
        } else {
            echo 'error';
        }
    }
    if($_POST['type'] == 'teacher'){
        $sql = "SELECT * FROM teachers WHERE id = '".$_POST['userID']."'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            if(count($result) > 0)
            echo 'exists';
        } else {
            echo 'error';
        }
    }
}

?>