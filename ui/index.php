<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
                send = () => {
                    $.post("/chatbot/server/main.php",
                        {
                            text: $("#chatText").val()    
                        },
                        function(data, status){
                            console.log(JSON.strigify(data))
                        }
                    );
                    // var node = document.createElement("P");
                    // node.setAttribute("style", "float: left;");
                    // node.setAttribute("class", "row chat");
                    // node.innerHTML = document.getElementById("chatText").value
                    // var br = document.createElement("BR");
                    // document.getElementById("chat").appendChild(node)
                    // document.getElementById("chat").appendChild(br)
                    // document.getElementById("chat").appendChild(br)
                    // document.getElementById("chatText").value = ""
                }
        </script>
    </head>
    <body>
        <div class="chatbox col-md-4">
            <div id="chat">
            <?php
                include "../server/db.php";
                if($conn){
                    $query = "select * from chats ORDER by date DESC";
                    $res = mysqli_query($conn, $query);
                    while($data = mysqli_fetch_array($res)){
                        echo "<p class='row chat' style='float: left;'>";
                        echo $data["user"];
                        echo "</p></br>";
                        echo "<p class='row chat' style='float: right;'>";
                        echo nl2br($data["chatbot"]);
                        echo "</p></br>";
                        echo nl2br("\n\n");
                    }
                }else{
                    echo "Failed to connect";
                }    
            ?>
            </div>
            <div class="row col-md-12">
                <input id="chatText" class="col-md-10" type="text" placeholder="Ask your doubts here">
                <button class="col-md-2" onclick="send()">Send</button>
            </div>
        </div>
    </body>
</html>