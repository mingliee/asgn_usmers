<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "usmers";

$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);
date_default_timezone_set("Asia/Kuala_Lumpur");

//$conn=false;
if(!$conn){
    header("Location:404.php");
    exit();
    echo "connection failed";
    die("Connection failed: ".mysqli_connect_error());
    
}
?>