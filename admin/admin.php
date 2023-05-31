<?php

    if (!isset($_GET['secretkey']) || $_GET['secretkey'] !== "578771b62a4c56df54353819e6c4134f") {
        die('Unauthorized access');
    }
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> By Chief Evin - Admin Panel </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!--MENU SECTION STARTS-->
        <div class="topbar">
            <div class="wrapper">
                <ul>
                    <li><a href="admin.php?secretkey=578771b62a4c56df54353819e6c4134f">Home</a></li>
                    <li><a href="menu.php?secretkey=578771b62a4c56df54353819e6c4134f">Menu</a></li>
                    <li><a href="messages.php?secretkey=578771b62a4c56df54353819e6c4134f">Messages</a></li>
                    <li><a href="orders.php?secretkey=578771b62a4c56df54353819e6c4134f">Orders</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!--MENU SECTION ENDS-->

        <!--CONTENT SECTION STARTS-->
        <div class="main-content">
            <div class="wrapper">
        <h1>Welcome, Admin!</h1>
                <br><br>
                <h2>Dashboard</h2>
                <br><br>
                
        <?php 
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kamayan";
    
        $connection = new mysqli($servername, $username, $password, $database);
    
        if ($connection->connect_error) {
            die('Connection failed: ' . $connection->connect_error);
        }    
        
        // FOR MENUS

        $sql = "SELECT COUNT(*) AS total_menu FROM menu;";
        $result = $connection->query($sql);
                
        if (!$result) {
            die('Invalid Query: ' . $connection->error);
        }
    
        $row = $result->fetch_assoc();
        $total_menu = $row['total_menu'];

        // FOR MESSAGES

        $sql1 = "SELECT COUNT(*) AS total_messages FROM messages;";
        $result1 = $connection->query($sql1);
                
        if (!$result1) {
            die('Invalid Query: ' . $connection->error);
        }
    
        $row1 = $result1->fetch_assoc();
        $total_messages = $row1['total_messages'];

        // FOR ORDERS
        $sql2 = "SELECT COUNT(*) AS total_orders FROM orders;";
        $result2 = $connection->query($sql2);
                
        if (!$result2) {
            die('Invalid Query: ' . $connection->error);
        }
    
        $row2 = $result2->fetch_assoc();
        $total_orders = $row2['total_orders'];

        ?>
        
        <div class="col-3">
            <h1><?php echo $total_menu; ?></h1>
            <strong>Menu</strong>
        </div>
        
        <div class="col-3">
            <h1><?php echo $total_messages; ?></h1>
            <strong>Messages</strong>
        </div>
        
        <div class="col-3">
            <h1><?php echo $total_orders; ?></h1>
            <strong>Orders</strong>
        </div>
        
        <div class="clearfix"></div>
        </div>
        </div>
        <!--CONTENT SECTION ENDS-->

        <!--FOOTER SECTION STARTS-->
        <div class="footer">
            <div class="wrapper">
                <p class="text-center">2023 All rights reserved, Kamayan By Chief Evin. Developed By - Wonder Prends</p>
            </div>
        </div>
        <!--FOOTER SECTION ENDS-->
    </body>
</html>
