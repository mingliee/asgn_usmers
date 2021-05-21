<?php
session_start();

require '../config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE user SET USER_STATUS='A' WHERE TOKEN='$token'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['userID'] =$user['USER_ID'];
            $_SESSION['userEmail']=$user['USER_EMAIL'];
            $_SESSION['userStatus']="A"; //Pending, Active, Bar
            echo "username:".$user['USER_ID']." email: ".$user['USER_EMAIL']." status:". $_SESSION['userStatus'];
            header('location: ../main.php');
            exit(0);
        }
    } else {
        echo "User not found!";
        echo $sql;
    }
} else {
    echo "No token provided!";
}