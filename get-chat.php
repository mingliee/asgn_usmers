<?php 
    session_start();
    if(isset($_SESSION['userID'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['userID'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM message LEFT JOIN user ON user.USER_ID = message.SENDER_ID
                WHERE (SENDER_ID = {$outgoing_id} AND RECEIVER_ID = {$incoming_id})
                OR (SENDER_ID = {$incoming_id} AND RECEIVER_ID = {$outgoing_id}) ORDER BY TIME";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $date=date("g:i a",strtotime($row['TIME']));
                if($row['SENDER_ID'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['CONTENT'] .'</p>
                                    <div class="msg-time">
                                    '. $date .'
                                    </div>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['CONTENT'] .'</p>
                                    <div class="msg-time to-left">
                                    '. $date .'
                                    </div>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
       // header("location: ../login.php");
    }

?>