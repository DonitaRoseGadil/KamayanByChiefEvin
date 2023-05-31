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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="../css/menu.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            <h1>Kamayan Menu</h1>
            <button class="btn btn-primary add-menu-btn" data-toggle="tooltip" data-placement="top" title="Add Menu" onclick="window.location.href='addMenu.php?secretkey=578771b62a4c56df54353819e6c4134f'">
            <i class="fas fa-plus text-white"></i>
            </button>
        </div>

        <div class="menu container-fluid w-100 p-5" style="min-height: 100vh">

        <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "kamayan";
            
            $connection = new mysqli($servername, $username, $password, $database);
            
                if($connection->connect_error){
                    die('connection failed' . $connection->connect_error);
                }       

                $sql = "SELECT * FROM menu";
                $result = $connection->query($sql);
                
                if(!$result){
                    die('Invalid Query' . $connection->connect_error);
                }
                
                while ($row = $result->fetch_assoc()){
                    echo "
                    <div class='food-items'>
                    <img src='../$row[imgPath]'>
                    <div class='details'>
                        <div class='details-sub'>
                            <h5>$row[title]</h5>
                            <h5 class='price'> $row[price] </h5>
                        </div>
                        <p>$row[caption]</p>
                    </div>
                    <a class='btn btn-warning' href='editMenu.php?id=$row[menu_id]&secretkey=578771b62a4c56df54353819e6c4134f'> Edit </a>
                    <a class='btn btn-danger' href='deleteMenu.php?id=$row[menu_id]&secretkey=578771b62a4c56df54353819e6c4134f'> Delete</a>
                </div>
                    
                    ";
                }
     
        ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>