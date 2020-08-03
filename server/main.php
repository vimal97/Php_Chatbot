<?php
include "db.php";

if(isset($_POST["text"])){
    $msg = $_POST["text"];
    $query = mysqli_query($conn, "select * from question where ");
    $count = mysqli_num_rows($query);
    if($count == 0){
        $data = "I am not clear how to help you";
        $queryAddChat = mysqli_query($conn, "insert into chats(user, chatbot) values('$msg', '$data')");
    }else{
        while($row = mysqli_fetch_array($query)){
            $data = $row["answer"];
            $time = "12-13-2020";
            $queryAddChat = mysqli_query($conn, "insert into chats(user, chatbot) values('$msg', '$data')");
        } 
    }
    echo $msg." received at ".$data;
}
else{
    echo "Nothing received";
}
?>