<?php

    if (!isset($_GET['secretkey']) || $_GET['secretkey'] !== "578771b62a4c56df54353819e6c4134f") {
        die('Unauthorized access');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> By Chief Evin - Admin Panel </title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/menu.css">  

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
    
    <div class="container-fluid d-flex justify-content-center align-items-stretch p-0 position-relative">
        
        <div class="container-fluid wrapper content">
        <div class="div p-3 d-flex justify-content-around align-items-center">
            <h1>Messages</h1>
        </div>
        <div class="menu container-fluid w-100 p-5" style="min-height: 100vh">

        <div class="table-responsive">
                <table class="table" >
                <thead style="background: #3D262A">
                    <tr>
                    <th class="text-white" scope="col">First Name</th>
                    <th class="text-white" scope="col">Last Name</th>
                    <th class="text-white" scope="col">Email</th>
                    <th class="text-white" scope="col">Mobile Number</th>
                    <th class="text-white" scope="col">Message</th>
                    <th class="text-white" scope="col">Date</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
            
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "kamayan";
                    
                        $connection = new mysqli($servername, $username, $password, $database);
                    
                        if($connection->connect_error){
                            die('connection failed' . $connection->connect_error);
                        }       

                        $sql = "SELECT * FROM messages";
                        $result = $connection->query($sql);
                        
                        if(!$result){
                            die('Invalid Query' . $connection->connect_error);
                        }
                        
                        while ($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                                <td>$row[firstName]</td>
                                <td>$row[lastName]</td>
                                <td>$row[email]</td>
                                <td>$row[mobileNumber]</td>
                                <td>$row[message]</td>
                                <td>$row[createdAt]</td>
                                <td> <a class='btn btn-danger' href='deleteMessage.php?id=$row[message_id]' text-white'> Delete</a> </td>
                            </tr>";
                        }
            
            ?>
         
                </tbody>
                </table>
        </div>

        </div>
        </div>
      
    </div>

    <!--FOOTER SECTION STARTS-->
    <div class="footer">
        <div class="wrapper">
            <p class="text-center">2023 All rights reserved, Kamayan By Chief Evin. Developed By - Wonder Prends</p>
        </div>
    </div>
    <!--FOOTER SECTION ENDS-->
  
    <script>
      feather.replace()
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>