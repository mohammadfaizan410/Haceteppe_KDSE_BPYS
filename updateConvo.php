<?php
require_once("config-students.php");
?>
<?php
if(isset($_POST['sender_id'])){
    $sender_id = $_POST['sender_id'];
    $reciever_id = $_POST['recipient_id'];
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    $senderName = $_POST['senderName'];
    $senderSurname = $_POST['senderSurname'];
    $sql = "SELECT * FROM  messages  WHERE sender_id =" . $sender_id . " AND  recipient_Id =" . $reciever_id . " OR sender_id =" . $reciever_id . " AND  recipient_Id =" . $sender_id . " ORDER by id";
    $smtmselect = $db->prepare($sql);
    $result = $smtmselect->execute();
    if($result){

        $htmlInner = "";
        $msgs = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0 ; $i < count($msgs); $i++){
            $message = $msgs[$i]['message'];
            $sent_at = $msgs[$i]['sent_at'];
            if($userID == $msgs[$i]['sender_id']){
                $htmlInner = $htmlInner. "" ."<div class='d-flex w-100'><div class='w-100 d-flex flex-column flex-end align-items-end'><div class='d-flex mb-2 mt-3'>Me {$sent_at}</div><div class='d-flex shadow p-2 mb-2' style='font : 20px; background-color:#ffcccc; width:40%; border-radius: 5px' >{$message}</div></div></div>" ;
            }
            else{
                $htmlInner = $htmlInner. "" ."<div class='d-flex w-100'><div class='w-100 d-flex flex-column flex-start align-items-start'><div class='d-flex w-50 mb-2 mt-3'>{$senderName} {$sent_at}</div><div class='d-flex shadow p-2 mb-2' style='font : 20px; background-color: #ffffff; width:40%; border-radius: 5px' >{$message}</div></div></div>";
            }
        };
        echo strval($htmlInner);
    }
    else{
        echo "no messages retrieved!";
    }
}

?>