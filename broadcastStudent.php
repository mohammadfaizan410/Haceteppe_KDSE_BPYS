<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
require_once("config-students.php");
if (isset($_SESSION['userlogin'])) {
    $myUser = $_SESSION['userlogin']['id'];
    $myEmail = $_SESSION['userlogin']['email'];
    $name = $_SESSION['userlogin']['name'];
    $surname = $_SESSION['userlogin']['surname'];
    $teacher_list = 'none';
    $all_messages = 'none';

    $sql = "SELECT * FROM teachers where email != '$myEmail'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $teacher_list = $result;
    } else {
        echo '';
    }
    }
    $sql = "SELECT * FROM messages WHERE (FIND_IN_SET(:userid, reciever_list) OR FIND_IN_SET('all_students', reciever_list)) ORDER BY id DESC";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userid', $myUser, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    // The current ID exists in the receiver list
    $all_messages = $result;
} else {
    // The current ID does not exist in the receiver list
    echo '';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
.btn-active{
    color : white;
    background-color: rgb(171, 93, 164) !important;
    border-top-right-radius: 50px ;
    border-bottom-right-radius: 50px ;
}
.message-content {
    word-wrap: break-word;
    width: 100%;
}
#all-messages-container *{
    font-size : 15px;
    font-weight : 800;
    color: black;
}
textarea::placeholder{
    color: black;
    text
}
    </style>
</head>
<body>
    <div class="container-fluid pt-4 px-4" style="overflow: hidden;">
        <div class="send-patient w-100" style="overflow: hidden;">
        <div class="w-100 p-4">
                <button class="btn btn-success mb-3 w-50 p-3" id="show-all-messages">Tüm Mesajları Göster</button>
                <div id="all-messages-container" class="input-section" style="display:none;">
                    <?php 
                    if($all_messages != 'none'){
                        foreach($all_messages as $message){
                            echo '<div class="input-section d-flex flex-column justify-content-center border-bottom p-4">';
                            echo '<div class="mb-2"><strong>Gönderen:</strong> '.$message['sender_name'].'</div>';
                            echo '<div class="mb-2"><strong>Konu</strong> '.$message['subject'].'</div>';
                            echo '<div><strong>Mesaj:<textarea class="w-100 input-section mt-4" disabled rows="5" placeholder="'.$message['message'].'"></textarea></div>';
                            echo '</div>';
                        }
                    } else{
                        echo '<p>There is no message</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="w-100 p-4">
                <button class="btn btn-success mb-3 w-50 p-3" id="send-to-teacher">Öğretmene mesaj gönderme</button>
                <div id="send-to-teacher-dropdown" class="input-section" style="display: none;">
                    <p>Konu Girin:</p>
                    <input type="text" class="form-control w-100" name="teacher-subject" />
                    <p>Mesaj Girin:</p>
                    <textarea class="form-control w-100" name="teacher-message" id='teacher-message' rows="10"></textarea> 
                    <div class="d-flex justify-content-around">
                        <div class="d-flex align-items-center">
                            <p>Herkese gönder?</p>
                            <input type="checkbox" class="form-check-input" id="broadcast-to-teachers">
                        </div>
                        <button class="btn btn-success w-25 m-3" id="teacher-selection">Öğretmen Seç</button>
                    </div>
                    <div id="teacher_list_container" class="" style="display: none;">
                        <?php 
                        if($teacher_list != 'none'){
                            foreach($teacher_list as $teacher){
                                echo '<div class="d-flex align-items-center justify-content-end border-bottom"><p class="">'.$teacher['email'].'</p><input type="checkbox" class="form-check-input" id="teacher-'.$teacher['id'].'"></div>';
                            }
                        } else{
                            echo '<p>There is no teacher</p>';
                        }
                        ?>
                    </div>
                    <button class="btn btn-success w-100" id="send-message-teachers">Gönder</button>
                </div>
            </div>
        </div>
    </div>
      

</body>
<script>

    $('#send-to-teacher').click(function (e) { 
            e.preventDefault();
            $(this).toggleClass('btn-active');
            $(this).next().toggle('slow');
          
        });
    
        $('#broadcast-to-teachers').on('change', function() {
            $('#teacher-selection').toggle();
            $('#teacher-selection').removeClass('btn-active');
            $('#teacher_list_container').css('display', 'none');
        });
        $('#teacher-selection').click(function(e){
        $(this).toggleClass('btn-active');
        $('#teacher_list_container').toggle();
        $('#teacher_list_container').toggleClass('input-section');
    });

$('#send-message-teachers').click(function (e){

        var message = $('#teacher-message').val();
        var subject = $('input[name="teacher-subject"]').val();
        console.log(message, subject)
        if('<?php echo json_encode($teacher_list); ?>' == 'none') return alert('There is no teacher');
        if(subject == '' || message == '') return alert('Please fill all the fields')
        e.preventDefault();
        if($('#broadcast-to-teachers').is(':checked')){
            $.ajax({
                type: "POST",
                url: "<?php echo $base_url; ?>/handleForum/broadCastToTeacher.php",
                data: {
                    sender_email : '<?php echo $myEmail; ?>',
                    senderName : '<?php echo $name.' '.$surname; ?>',
                    subject: subject,
                    message: message,
                    broadcast: true
                },
                success: function (response) {
                    if(response == 'success'){
                        alert('Mesaj gonnderildi');
                        $('#send-to-teacher-dropdown').toggle('slow');
                        $('input[name="teacher-subject"]').val('');
                        $('input[name="teacher-message"]').val('');
                        $('#teacher_list_container').css('display', 'none');
                        $('#teacher_list_container input[type="checkbox"]').each(function(){
                        $(this).prop('checked', false);
                    });  
                    $('#send-to-teacher').removeClass('btn-active');
                    }},
                error: function (response) {
                    console.log(response);
                    alert('Error')
                }
            });
        }else{
            console.log('inelse')
            var teacher_list = [];
            if($('#teacher_list_container input[type="checkbox"]:checked').length == 0) return alert('Please select at least one teacher')
            $('#teacher_list_container input[type="checkbox"]').each(function(){
                if($(this).is(':checked')){
                    teacher_list.push($(this).attr('id').split('-')[1]);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?php echo $base_url; ?>/handleForum/broadCastToTeacher.php",
                data: {
                    sender_email : '<?php echo $myEmail; ?>',
                    subject: subject,
                    message: message,
                    senderName : '<?php echo $name.' '.$surname; ?>',
                    student_list: teacher_list
                },
                success: function (response) {
                    if(response == 'success'){
                        alert('Mesaj gonderildi');
                        $('#send-to-teacher-dropdown').toggle('slow');
                        $('input[name="teacher-subject"]').val('');
                        $('input[name="teacher-message"]').val('');
                        $('#teacher_list_container').css('display', 'none');
                        $('#teacher_list_container input[type="checkbox"]').each(function(){
                        $(this).prop('checked', false);
                    });
                    $('#send-to-teacher').removeClass('btn-active');
                }

                },
                error: function (response) {
                    console.log(response);
                    alert('Error')
                }
            });
        }
    })
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$('#show-all-messages').click(function(e){
    e.preventDefault();
    $('#all-messages-container').toggle('slow');
    $(this).toggleClass('btn-active');
})


</script>
</html>
