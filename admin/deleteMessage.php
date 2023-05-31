<?php


  if( isset($_GET["id"])){

    $message_id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";
  
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM messages WHERE message_id=$message_id";
    $connection->query($sql);
  
}

header("location: messages.php?secretkey=578771b62a4c56df54353819e6c4134f");
exit;







?>