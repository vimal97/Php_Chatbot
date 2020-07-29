<?php
include "db.php";

if(isset($_POST["text"])){
    $msg = $_POST["text"];
    $query = mysqli_query($conn, "select * from question RLIKE '[[:<:]]".$msg."[[:>:]]'");
    $count = mysqli_num_rows($query);
    if($count == 0){
        $data = "I am not clear how to help you";
        $queryAddChat = mysqli_query($conn, "insert into chats(user, chatbot, date) values('$msg', '$data', $server_time)");
    }else{
        while($row = mysqli_fetch_array($query)){
            $data = $row["answer"];
            $queryAddChat = mysqli_query($conn, "insert into chats(user, chatbot, date) values('$msg', '$data', $server_time)");
        } 
    }
}
?>