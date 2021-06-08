<?php 
    session_start();
    if(isset($_SESSION['userID'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['userID'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO message (RECEIVER_ID, SENDER_ID, CONTENT)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        //header("location: ../login.php");
    }


    
?>