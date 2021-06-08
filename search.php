<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['userID'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM user LEFT JOIN AVATAR ON (AVATAR.AVATAR_ID=USER.AVATAR_ID)
     WHERE USER_NAME LIKE '%{$searchTerm}%' OR USER_EMAIL LIKE '%{$searchTerm}%' ";
    //echo 'sql:'.$sql;
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= '<div class="no-details">No user found...</div>';
    }
    echo $output;
?>