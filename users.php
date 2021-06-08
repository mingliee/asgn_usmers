<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['userID'];
    //SELECT * FROM MESSAGE INNER JOIN USER ON MESSAGE.SENDER_ID=USER.USER_ID OR MESSAGE.RECEIVER_ID=USER.USER_ID WHERE USER_ID!=33 GROUP BY ROOM_ID ORDER BY USER_ID
    $sql = "SELECT MESSAGE.CONTENT, MAX(MESSAGE.TIME) AS LATEST_TIME, USER.USER_ID,USER.USER_NAME,AVATAR.AVATAR_NAME FROM MESSAGE 
    INNER JOIN USER 
    ON MESSAGE.SENDER_ID=USER.USER_ID 
    OR MESSAGE.RECEIVER_ID=USER.USER_ID
    LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
    WHERE 
    (MESSAGE.RECEIVER_ID = {$outgoing_id} OR MESSAGE.SENDER_ID = {$outgoing_id}) 
    GROUP BY USER.USER_ID ORDER BY LATEST_TIME DESC";
    //echo 'sql5:'.$sql;
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>