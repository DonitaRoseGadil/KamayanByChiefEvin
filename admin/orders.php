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
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    <link rel="stylesheet" href="../admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/menu.css"> 
    



</head>



<body>
    <div class="container-fluid d-flex justify-content-center align-items-stretch p-0 position-relative">
         <button id="hamburger" onCLick="toggleMenu()" class="btn hamburger d-flex justify-content-center align-items-center" style="position: absolute; left: 20px; top: -200px">
                <i data-feather="menu" color="#3D262A"></i>
                <h3 class="mb-0 mx-3">Menu</h3>
        </button>
        <header >
  
          

            <!-- Sidebar -->
                <div class="sidebar h-100" id="sidebar">
                    <div class="container-fluid mb-5 p-4 d-flex justify-content-around align-items-center d-flex justify-content-center align-items-center flex-column">
                        <div class="div d-flex justify-content-between align-items-center">
                            <h5 class="text-white p-0 text-center mb-0">Kamayan Dashboard</h5>
                            <button  onClick="toggleClose()" class="btn text-white d-flex justify-content-center align-items-center">
                                <p class="mb-0">Close</p>
                                <i data-feather="x" color="white"></i>

                            </button>

                        </div>
                        <img src="../images/kamayan_logo.jpg" class="img-fluid w-50 h-50 my-3" alt="">

                    </div>
                    <div class="navs">
                        <div class="route my-5">
                            <div class="div py-2 mx-4 d-flex justify-content-center align-items-center" style="background: #65240F; border-radius: 20px">
                            <a href="menu.php?secretkey=578771b62a4c56df54353819e6c4134f"><h3 class="text-white mb-0">Menu</h3></a>
                                
                            </div>
                        </div>
                        <div class="route my-5">
                            <div class="div py-2 mx-4 d-flex justify-content-center align-items-center" style="background: #65240F; border-radius: 20px">
                            <a href="messages.php?secretkey=578771b62a4c56df54353819e6c4134f"><h3 class="text-white mb-0">Messages</h3></a>
                            </div>
                        </div>
                        <div class="route my-5">
                            <div class="div py-2 mx-4 d-flex justify-content-center align-items-center" style="background: #65240F; border-radius: 20px">
                                <a href="orders.php?secretkey=578771b62a4c56df54353819e6c4134f"><h3 class="text-white mb-0">Orders</h3></a>
                            </div>
                        </div>
                        <div class="route my-5">
                            <div class="div py-2 mx-4 d-flex justify-content-center align-items-center" style="background: #65240F; border-radius: 20px">
                                <a href="logout.php"><h3 class="text-white mb-0">Logout</h3></a>
                            </div>
                        </div>
                </div>
            <!-- Sidebar -->
        </header>

        <div class="container-fluid wrapper content">
        <div class="div p-3 d-flex justify-content-around align-items-center">
            <h1>Orders</h1>
        </div>
        <div class="menu container-fluid w-100 p-5" style="min-height: 100vh">


       

        <div class="table-responsive">
                <table class="table" >
                <thead style="background: #3D262A">
                    <tr>
                    <th class="text-white" scope="col">Name</th>
                    <th class="text-white" scope="col">Phone</th>
                    <th class="text-white" scope="col">Address</th>
                    <th class="text-white" scope="col">Landmark</th>
                    <th class="text-white" scope="col">Payment</th>
                    <th class="text-white" scope="col">Time</th>
                    <th class="text-white" scope="col">Orders</th>
                    <th class="text-white" scope="col">Notes</th>
                    <th></th>
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

                        $sql = "SELECT * FROM orders";
                        $result = $connection->query($sql);
                        
                        if(!$result){
                            die('Invalid Query' . $connection->connect_error);
                        }
                        
                        while ($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                                <td>$row[name]</td>
                                <td>$row[phone]</td>
                                <td>$row[address]</td>
                                <td>$row[landmark]</td>
                                <td>$row[payment]</td>
                                <td>$row[deliveryTime]</td>
                                <td>$row[foodOrder]</td>
                                <td>$row[notes]</td>
                                <td>  <a class='btn btn-warning' href='editOrder.php?id=$row[order_id]&secretkey=578771b62a4c56df54353819e6c4134f'> Edit </a></td>
                                <td> <a class='btn btn-danger' href='deleteOrder.php?id=$row[order_id]' text-white'> Delete</a> </td>






                            </tr>
                            
                            ";
                        }
            
            ?>
         
                </tbody>
                </table>
        </div>

        </div>
        </div>
      
    </div>
    <script>

    function toggleMenu(){
            const sidebar = document.getElementById("sidebar")
            const hamburger = document.getElementById("hamburger")

            sidebar.style.marginLeft = "0px";
            hamburger.style.top = "-200px";

            console.log(hamburger)

            }

            function toggleClose(){
            const sidebar = document.getElementById("sidebar")
            const hamburger = document.getElementById("hamburger")

            sidebar.style.marginLeft = "-600px";
            hamburger.style.top = "20px";


            }
        

    </script>
  
    <script>
      feather.replace()
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>