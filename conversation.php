<?php
session_start();
if (isset($_SESSION['userlogin'])) {
}
$myUser = $_SESSION['userlogin']['id'];
require_once("config-messages.php");
if (isset($_GET)) {
     $senderId =  $_GET['senderID'] ;
    $recieverId = $_GET['recieverID'];
    $senderName = $_GET['name'];
    $senderSurname = $_GET['surname'];
     $userName = $_SESSION["userlogin"]['name'];
     $userID = $_SESSION["userlogin"]['id'];

    $sql = "SELECT * FROM  messages  WHERE sender_id =" . $senderId . " AND  recipient_Id =" . $recieverId . " OR sender_id =" . $recieverId . " AND  recipient_Id =" . $senderId . " ORDER by sent_at";
    $smtmselect = $db->prepare($sql);
    $messages = $smtmselect->execute();
    if ($messages) {
        $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
     }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div style=" position: absolute; margin-left:10%;  margin-bottom: 30px; height:90%; " class="conversation-box w-75 shadow border mt-5">
            <div class="title-box w-100 border shadow ">
                <?php 
                echo "<h3 class='p-4 ml-5'>$senderName $senderSurname</h3>";
                ?>
            </div>
            <div class="w-100 p-5" id="scrollable" style="overflow-y: scroll; height:80%" >
                   
        </div>
        <form action="" method="post" class="d-flex m-3" style="position: absolute; bottom: 0; width:90%; margin-top:30px">
                <input type="text" class="form-control" name="message" id="messageInput" aria-describedby="emailHelp" placeholder="Enter message...">
                <button type="submit" class="btn btn-primary" id="sendMessage">Send</button>
        </form>
            </div>
            <div >
                <div class="mt-3"></div>
                <p id="notEmpty" style="color:red"></p>
            </div> 
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.onload = function() {
                    console.log("hello")
                     var sender_id = <?php echo $senderId ?>;
                     var recipient_Id = <?php echo $recieverId ?>;
                     var senderName = <?php echo json_encode(ucfirst($senderName)) ?>;
                     var senderSurname = <?php echo json_encode(ucfirst($senderSurname)) ?>;
                     var userName = <?php echo json_encode(ucfirst($userName)) ?>;
                     var userID = <?php echo $userID ?>;

                       
                     $.ajax({
                        type: 'POST',
                        url: 'http://localhost/Hacettepe-KDSE-BPYS/updateConvo.php/',
                        data: {
                            sender_id: sender_id,
                            recipient_id: recipient_Id,
                            userID: userID,
                            senderName: senderName,
                            senderSurname: senderSurname,
                            userName : userName
                        },
                        success: function(data) {
                            console.log(data)
                            $('#scrollable').html(data);
                            var element = document.getElementById("scrollable");
                            element.scrollTop = element.scrollHeight;
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                                'type': 'error'
                            })
                        }
                    })
                   

        }

        window.setInterval(() => {
                     var sender_id = <?php echo $senderId ?>;
                     var recipient_Id = <?php echo $recieverId ?>;
                     var senderName = <?php echo json_encode(ucfirst($senderName)) ?>;
                     var senderSurname = <?php echo json_encode(ucfirst($senderSurname)) ?>;
                     var userName = <?php echo json_encode(ucfirst($userName)) ?>;
                     var userID = <?php echo $userID ?>;
  
                     $.ajax({
                        type: 'POST',
                        url: 'http://localhost/Hacettepe-KDSE-BPYS/updateConvo.php/',
                        data: {
                            sender_id: sender_id,
                            recipient_id: recipient_Id,
                            userID: userID,
                            senderName: senderName,
                            senderSurname: senderSurname,
                            userName : userName
                        },
                        success: function(data) {
                            $('#scrollable').html(data);
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                                'type': 'error'
                            })
                        }
                    })
        }, 3000);

        function pad(n){return n<10 ? '0'+n : n};

        $(document).ready(function() {
            $('#sendMessage').click(function(e) {
                e.preventDefault()
                var valid = this.form.checkValidity();
                if (valid) {
                    var currentTime = new Date();
                    var dateTime = currentTime.getFullYear() + "-" + pad(currentTime.getMonth() + 1) + "-" + pad(currentTime.getDay()) + " "  + currentTime.getHours() + ":"  + currentTime.getMinutes() + ":" + currentTime.getSeconds(); 
                    var message = $('#messageInput').val();
                     var sender_id = <?php echo $senderId ?>;
                     var recipient_Id = <?php echo $recieverId ?>;
                     var senderName = <?php echo json_encode( ucfirst($senderName)) ?>;
                     var senderSurname = <?php echo json_encode(ucfirst($senderSurname)) ?>;
                     var userName = <?php echo json_encode(ucfirst($userName)) ?>;
                     var userID = <?php echo $userID ?>;

                    if(message===''){
                        document.getElementById("notEmpty").innerText = "Message cannot be empty!"
                    }
                    else{
                        document.getElementById("notEmpty").innerText = "";
                       
                        $.ajax({
                        type: 'POST',
                        url: 'http://localhost/Hacettepe-KDSE-BPYS/process-messages.php/?',
                        data: {
                            sender_id: sender_id,
                            recipient_id: recipient_Id,
                            message: message,
                            sent_at : dateTime,
                            senderName: senderName,
                            senderSurname: senderSurname,
                            userName: userName,
                            userID : userID,

                        },
                        success: function(data) {
                            $('#messageInput').val("");
                            $('#scrollable').append(data);
                             var element = document.getElementById("scrollable");
                            element.scrollTop = element.scrollHeight;
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                                'type': 'error'
                            })
                        }
                    })
                    }
                }
                else {

                }
            })

        })
    </script>

    <script>


    </script>
</body>
</html>