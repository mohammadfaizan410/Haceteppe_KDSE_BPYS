<?php
require_once("config-students.php");
?>
<?php
if (isset($_GET["recipient_id"])) {
    $sender_id = $_GET['sender_id'];
    $recipient_id = $_GET['recipient_id'];
    $message = $_GET['message'];
    $sent_at = $_GET['dateTime'];

    $sql = "INSERT INTO messages (sender_id, recipient_id, message, sent_at) VALUES (?,?,?,?)";
    $smtminsert = $db->prepare($sql);
    $result = $smtminsert->execute([$sender_id, $recipient_id, $message, $sent_at]);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else
    echo 'no data';
?>