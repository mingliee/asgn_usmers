<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM message WHERE (RECEIVER_ID = {$row['USER_ID']}
                OR SENDER_ID = {$row['USER_ID']}) AND
                (SENDER_ID = {$outgoing_id} 
                OR RECEIVER_ID = {$outgoing_id})
                ORDER BY MESSAGE.TIME DESC LIMIT 1";
        //echo 'sql2:'.$sql2;
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['CONTENT'] : $result ="No message available";
        (strlen($result) > 23) ? $msg =  substr($result, 0, 23) . '...' : $msg = $result;
        if(isset($row2['SENDER_ID'])){
            ($outgoing_id == $row2['SENDER_ID']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }

        if($row['USER_ID']===$_SESSION['userID']){
            $name=$row['USER_NAME']." (me)";
        }else{
            $name=$row['USER_NAME'];
        }

        $now = time(); // or your date as well
        $your_date = strtotime($row2['TIME']);
        $datediff = ceil(($now - $your_date)/86400);

        if($datediff < 1){
            $date=date("g:i a",strtotime($row2['TIME']));
        }else{
            $date=date("j M y",strtotime($row2['TIME']));
        }
        if($row2['TIME']==null){
            $date=null;
            $spandot="";
        }else{
            $spandot="<span class='dot'>·</span>";
        }

        $avatar=$row['AVATAR_NAME'];
         if($avatar!=null){
             $avatarLink="img/avatar/".$avatar;
        }else{
            $avatarLink="img/author/avatar.jpg";
         }

        ("Offline now" == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['USER_ID']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="messages.php?from='. $row['USER_ID'] .'">
                    <div class="content">
                    <img src="'.$avatarLink.'" alt="">
                    <div class="details">
                        <span>'. $name.'</span>
                        <div class="details-info">
                        <p>'. $you . $msg .$spandot.'
                        <time class="lastSent" datetime="'.$row2['TIME'].'">'.$date.'</time></p>
                        </div>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>