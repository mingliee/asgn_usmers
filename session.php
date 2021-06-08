<?php
session_start();
require 'config.php';
if (isset($_SESSION["userEmail"])) {
    $userEmail = $_SESSION["userEmail"];
    $userID = $_SESSION["userID"];

    $admin="SELECT * FROM ADMIN WHERE USER_EMAIL='$userEmail'";
    if(mysqli_num_rows(mysqli_query($conn,$admin)))
    {
        $_SESSION['admin']='1';
    }else{
        $_SESSION['admin']='0';
    }
    $revokedSQL="SELECT USER_STATUS FROM USER WHERE USER_EMAIL='$userEmail'";
    $revoked=(mysqli_query($conn,$revokedSQL));
    if ( mysqli_num_rows($revoked)){
        $row = mysqli_fetch_array($revoked);
        $r=$row['USER_STATUS'];
    }
    if($r=="A")
    {
        $_SESSION['revoked']='0';
    }else{
        $_SESSION['revoked']='1';
    }

    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "login.php?m=sessionExpired";
    header("Location: $url");
}
//print_r($_SESSION);
?>