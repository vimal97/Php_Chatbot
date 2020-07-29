<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chatbot";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn){
    //echo "Connected to db";
}else{
    //echo "Failed to connect";
}
?>