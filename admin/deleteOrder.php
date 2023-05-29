<?php


  if( isset($_GET["id"])){

    $order_id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";
  
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM orders WHERE order_id=$order_id";
    $connection->query($sql);
  
}

header("location: orders.php?secretkey=578771b62a4c56df54353819e6c4134f");
exit;







?>