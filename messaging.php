<?php
session_start();
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Hacettepe-KDSE-BPYS';
if (isset($_SESSION['userlogin'])) {
}
$myUser = $_SESSION['userlogin']['id'];
$myEmail = $_SESSION['userlogin']['email'];
$name = $_SESSION['userlogin']['name'];
require_once("config-messages.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php
    //   $userid = $_SESSION["userlogin"]["id"];
    //   $userName = $_SESSION["userlogin"]["name"];
    // $sql = "SELECT * FROM  convos  WHERE sender_id =" . $userid;
    //       $smtmselect = $db->prepare($sql);
    //       $result = $smtmselect->execute();
    //       if ($result) {
    //         $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    //         //convos exists
    //         if($values){
    //           $recieversIds = explode(",",$values[0]['reciever_ids']);
    //           $recieverNames = [];
    //           $recieversId = [];

    //           for ($i = 0; $i < count($recieversIds); $i++){
    //             // echo $recievers[$i];
    //             $sql = "SELECT id, name, surname FROM teachers students WHERE id = " . $recieversIds[$i];
    //             $smtmselect = $db->prepare($sql);
    //             $result2 = $smtmselect->execute();
    //             $recieverDetails = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
    //             $recieverNames[$i] = $recieverDetails[0]['name'];
    //             $recieverSurnames[$i] = $recieverDetails[0]['surname'];
    //             $recieverId[$i] = $recieverDetails[0]['id']; 

    //           }
    //         }else{
    //       echo "no conversations";
    //         }

    //     } else {
    //         echo "no conversations";a
    //     }

    ?>
    <h1 class="text-center mt-5 mb-5 form-header">Öğretmen veya Öğrenci Ara</h1>
    <div class="searchbar d-flex justify-content-center align-items-center" style="gap: 20px">
        <input type="text" class="form-control w-50" placeholder="E-Posta ile Öğretmen veya Öğrenci Sorgula" id="searchValue" aria-describedby="basic-addon1" maxlength="100">
        <button class="btn btn-primary" id="submit-search" type="submit">Ara</button>
    </div>
    <div class="searchResults">
    </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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

                if (subject !== '' && message !== '') {
                    $.ajax({
                        type: 'POST',
                        url: './sendBroadcast.php/',
                        data: {
                            email: email,
                            name: name,
                            subject: subject,
                            message: message
                        },
                        success: function(data) {
                            console.log(data)
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
            $("#submit-search").click(function(e) {
                e.preventDefault();
                var nameOrEmail = $('#searchValue').val();

                if (nameOrEmail !== "") {
                    $.ajax({
                        type: 'POST',
                        url: './process-search.php/?' + "nameOrEmail=" + nameOrEmail,
                        data: {},
                        success: function(data) {
                            console.log(data)
                            var userid = "<?php
                                            echo $myUser
                                            ?> ";
                            var myEmail = "<?php
                                            echo $myEmail
                                            ?> ";
                            $(".searchResults").html("");
                            if (JSON.parse(data).length > 0) {
                                JSON.parse(data).forEach(element => {
                                    if (element.email === myEmail) {
                                        $(".searchResults").html(
                                            "<h3>this is your email</h3>");
                                    } else
                                        $(".searchResults").html(
                                            "<div class='single-convo shadow m-5 p-3 border-5 rounded'><h3>" +
                                            element.name + " " + element.surname +
                                            "</h3><a style='color : black' class='pd-3' href='conversation.php/?senderID=" +
                                            userid + "&recieverID=" + element.id +
                                            " &name=" + element.name + "&surname=" +
                                            element.surname +
                                            "'><button type='button' class='btn btn-primary p-3 mt-3'>Sohbeti Görüntüle</button></a></div>"
                                        );
                                })
                            } else {
                                $(".searchResults").html(
                                    "<h3>No teacher or student found with that email</h3>");
                            }


                            $('#searchValue').val("");
                        },
                        error: function(data) {
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors',
                            })
                            console.log(data);
                        }
                    })
                }
            })

        });
    </script>


</body>

</html>