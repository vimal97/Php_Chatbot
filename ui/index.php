<html>
    <body>
        <?php
            $query = "select * from chats ORDER by date DESC";
            $res = mysqli_query($conn, $query)
            while($data = mysqli_fetch_array($res)){
                echo $data["user"]." ".$data["chatbot"]." ".$data["date"]
            }    
        ?>
    </body>
</html>