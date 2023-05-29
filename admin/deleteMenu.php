<?php


  if( isset($_GET["id"])){

    $menu_id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";
  
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM menu WHERE menu_id=$menu_id";
    $connection->query($sql);
  
}

header("location: menu.php?secretkey=578771b62a4c56df54353819e6c4134f");
exit;







?>