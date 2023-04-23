<?php
session_start();
require_once("config-messages.php");
if (isset($_SESSION['userlogin'])) {
    $myUser = $_SESSION['userlogin']['id'];
    $myEmail = $_SESSION['userlogin']['email'];
    $name = $_SESSION['userlogin']['name'];
    $surname = $_SESSION['userlogin']['surname'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./broadcastSyles.css">

    <title>Document</title>
</head>

<body>




    <div class='option mt-5 p-3'>
        <h4 class='btn btn-primary w-50 p-4 text-start' id='sendToAll'>Send a message to all students</h4>
    </div>
    <div class='option mt-3 p-3'>
        <h4 class='btn btn-primary  w-50 p-4 text-start' id='sendToSome'>Send message to selected students</h4>
    </div>

    <div id="broadcast-container" class='mt-5'>

        <div class="broadcastPrompt w-50 h-50  d-flex justify-content-center flex-column m-auto">
            <p>Enter Subject:</p>
            <input type="text" class="form-control mb-3" placeholder="Enter Subject" id="broadcastSubject"></input>
            <p>Enter Message:</p>
            <textarea type='text-area' rows="10" class='form-control mb-5' placeholder="Enter Message"
                id="broadcastMessage"> </textarea>
            <p id="error"></p>
            <div class="text-center m-auto p-3 w-50 d-flex justify-content-between">
                <div class="btn btn-primary p-3" id="sendBroadcast">Send</div>
                <div class='btn btn-primary p-3' id='close-broadcast-container'>close</div>
            </div>
        </div>
    </div>
    <div id="multicast-container">
        <div class="broadcastPrompt w-50 h-50 d-flex justify-content-center flex-column m-auto">
            <p>Enter Subject:</p>
            <input type="text" class="form-control mb-3" placeholder="Enter Subject" id="multicastSubject"></input>
            <p>Enter Message:</p>
            <textarea type='text-area' rows="10" class='form-control mb-5' placeholder="Enter Message"
                id="multicastMessage"> </textarea>
            <div class='btn btn-primary mb-3' id='show-student-list'>Select Students</div>
            <div id="student-selection-container">
            </div>
            <p id="multiCastError"></p>
            <div class=" text-center m-auto p-3 w-50 d-flex justify-content-between ">
                <div class="btn btn-primary p-3" id="sendMulticast">Send</div>
                <div class='btn btn-primary p-3' id='close-multicast-container'>close</div>
            </div>
        </div>
    </div>

    <div class='messagess'>
        <h4 id="messages-title" class=" d-flex flex-column mt-2 mb-4 p-3">My messages:</h4>
        <div class="messages-container d-flex flex-column mt-2 p-3" id='messages-container'>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    var count = 0;


    function showAllMessage() {
        var email = "<?php
                                  echo $myEmail
                ?> ";
        $.ajax({
            type: 'POST',
            url: 'http://localhost/Hacettepe-KDSE-BPYS/getAllBroadcasts.php/',
            data: {
                email: email,
            },
            success: function(data) {
                if (count != JSON.parse(data).length) {
                    count = JSON.parse(data).length;
                    $('#messages-container').html('');
                    let htmlString = '';

                    JSON.parse(data).forEach(element => {
                        htmlString += `
                  <div>
                  <div class='message-wrapper d-flex btn-primary mt-3'>
                  <div class='m-3 w-25'>${element.name}  ${element.surname}</div>
                  <div class='m-3 w-25'>${element.email}</div>
                  <div class='m-3 w-25'>${element.message.slice(0,5)}....</div>
                  <div class='m-3 w-25 btn btn-primary expand-message'>Show</div>
                  </div>
                  <div class='expanded-message'>
                  <div>From: ${element.name}</div>
                  <div>Email: ${element.email}</div>
                  <div>Subject: ${element.subject}</div>
                  <div>message: ${element.message}</div>
                  </div>
                  </div>`
                    })
                    $('#messages-container').html(htmlString);
                }

            },
            error: function(data) {
                Swal.fire({
                    'title': 'Errors',
                    'text': 'There were errors',
                    'type': 'error'
                })
                console.log(data);
            }
        })
    }
    showAllMessage();

    window.setInterval(() => showAllMessage(), 2000)

    $(function() {
        $(document).on('click', '.expand-message', function(e) {
            e.preventDefault();
            $(this).closest('.message-wrapper').next('.expanded-message').toggle();
            let text = $(this).text();
            console.log(text)
            if (text === "Show") {
                $(this).text('Hide');
            } else $(this).text('Show');
        });

        $(document).on('click', '.nav-link', function(e) {
            e.preventDefault();
            let link = $(this).attr('href');
            $('.content').load(link);
        });
    });



    $('#sendToAll').click(function(e) {
        e.preventDefault();
        let display = $('#broadcast-container').css('display');
        if (display === 'none')
            $('#broadcast-container').css('display', 'flex');
        $('#showAll').css('display', 'none');
        $('#sendToSome').css('display', 'none');
        $('#sendToAll').css('display', 'none');
    })

    $('#close-broadcast-container').click(function(e) {
        e.preventDefault();
        let display = $('#broadcast-container').css('display');
        if (display === 'flex')
            $('#broadcast-container').css('display', 'none');
        $('#sendToSome').css('display', 'flex');
        $('#sendToAll').css('display', 'flex');
        $('.messagess').css('display', 'block');

    })



    $('#sendToSome').click(function(e) {
        e.preventDefault();
        let display = $('#multicast-container').css('display');
        if (display === 'none')
            $('#multicast-container').css('display', 'flex');
        $('#sendToSome').css('display', 'none');
        $('#sendToAll').css('display', 'none');
        $('.messagess').css('display', 'none');

    })

    $('#close-multicast-container').click(function(e) {
        e.preventDefault();
        let display = $('#multicast-container').css('display');
        if (display === 'flex')
            $('#multicast-container').css('display', 'none');
        $('#sendToSome').css('display', 'flex');
        $('#sendToAll').css('display', 'flex');
        $('#student-selection-container').html('');
        $('#student-selection-container').css('display', 'none');
        $('#student-selection-container').html('');
        $('.messagess').css('display', 'block');

    })





    $('#show-student-list').click(function(e) {
        e.preventDefault();
        $('#student-selection-container').css('display', 'block');
        var name = "<?php
                                  echo $name
                ?> ";
        $.ajax({
            type: 'POST',
            url: 'http://localhost/Hacettepe-KDSE-BPYS/getAllStudents.php/',
            data: {
                name: name,
            },
            success: function(data) {
                let htmlString = '';
                console.log(JSON.parse(data));
                JSON.parse(data).forEach(student => {
                    htmlString += `<div class='listItem d-flex justify-content-between mt-3 p-3 btn-primary'>
                      <div class='w-25 text-start'>${student.name}</div>
                      <div class='w-25  text-start'>${student.surname}</div>
                      <div class='w-50 text-start'>${student.email}</div>
                      <div class='btn-primary'><input type='checkbox' value='${student.email}' name='selected-student'></input></div>
                  </div>`
                });
                $('#student-selection-container').html(htmlString);
            },
            error: function(data) {
                Swal.fire({
                    'title': 'Errors',
                    'text': 'There were errors',
                    'type': 'error'
                })
                console.log(data);
            }
        })
    })



    $(function() {
        $('#sendMulticast').click(function(e) {
            e.preventDefault();
            const emailList = [];
            $("input:checkbox[name=selected-student]:checked").each(function() {
                emailList.push($(this).val());
            });
            var subject = $('#multicastSubject').val();
            var message = $('#multicastMessage').val();
            var email = "<?php
                                  echo $myEmail
                ?> ";
            var name = "<?php
                                  echo $name
                ?> ";
            var surname = "<?php
                                  echo $surname
                ?> ";
            if (subject == '' || message == '') {
                $('#multiCastError').text('Fields cannot be empty!')
            } else if (emailList.length < 1) {
                $('#multiCastError').text('No students selected!')
            } else {
                $('#error').text('');
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Hacettepe-KDSE-BPYS/processMulticast.php/',
                    data: {
                        email: email,
                        name: name,
                        surname: surname,
                        subject: subject,
                        message: message,
                        emailList: emailList
                    },
                    success: function(data) {
                        alert('your message has been sent!');
                        $('#multicast-container').css('display', 'none');
                        $('#showAll').css('display', 'flex');
                        $('#sendToSome').css('display', 'flex');
                        $('#sendToAll').css('display', 'flex');
                        $('#student-selection-container').html('');
                        $('#student-selection-container').css('display', 'none');
                        $('#student-selection-container').html('');
                        $('.messagess').css('display', 'block');
                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors',
                            'type': 'error'
                        })
                        console.log(data);
                    }
                })
            }
        })
    });

    $(function() {
        $("#sendBroadcast").click(function(e) {
            e.preventDefault();
            var subject = $('#broadcastSubject').val();
            var message = $('#broadcastMessage').val();
            var email = "<?php
                                  echo $myEmail
                ?> ";
            var name = "<?php
                                  echo $name
                ?> ";
            var surname = "<?php
                                  echo $surname
                ?> ";

            if (subject !== '' && message !== '') {
                $('#error').text('');
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Hacettepe-KDSE-BPYS/processBroadcast.php/',
                    data: {
                        email: email,
                        name: name,
                        surname: surname,
                        subject: subject,
                        message: message
                    },
                    success: function(data) {
                        alert('your broadcast has been sent!');
                        $('#broadcast-container').css('display', 'none');
                        $('#showAll').css('display', 'flex');
                        $('#sendToSome').css('display', 'flex');
                        $('#sendToAll').css('display', 'flex');
                        $('.messagess').css('display', 'block');


                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors',
                            'type': 'error'
                        })
                        console.log(data);
                    }
                })
            } else $('#error').text('Fields cannot be empty!');
        })
    });
    </script>


</body>

</html>