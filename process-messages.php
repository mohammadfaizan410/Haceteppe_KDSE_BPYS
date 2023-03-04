<?php
require_once("config-students.php");
?>
<?php
if (isset($_POST["sender_id"])) {

    $sender_id = $_POST['sender_id'];
    $recipient_id = $_POST['recipient_id'];
    $message = $_POST['message'];
    $sent_at = $_POST['sent_at'];
    $senderName = $_POST["senderName"];
    $senderSurname = $_POST["senderSurname"];
    $username = $_POST["userName"];
    $userId = $_POST['userID'];
    $sql = "INSERT INTO messages (sender_id, recipient_id, message, sent_at) VALUES (?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$sender_id, $recipient_id, $message, $sent_at]);

    if ($result) {
        if($userId === $sender_id){
            echo "<div class='d-flex w-100'><div class='w-100 d-flex flex-column flex-end align-items-end'><div class='d-flex w-50 mb-2 mt-3'>Me {$sent_at}</div><div class='d-flex w-50 shadow p-2 mb-2' style='font : 20px' >{$message}</div></div></div>" ;
        }
           else{
               echo "<div class='d-flex w-100'><div class='w-100 d-flex flex-column flex-start align-items-start'><div class='d-flex w-50 mb-2 mt-3'>{$senderName} {$sent_at}</div><div class='d-flex w-50 shadow p-2 mb-2' style='font : 20px' >{$message}</div></div></div>" ;
            }
    }
    else {
            echo 'error';
        }
}
?>