<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "kamayan";

$connection = new mysqli($servername, $username, $password, $database);

$order_id = "";
$name = "";
$phone = "";
$address = "";
$landmark = "";
$payment = "";
$time = "";
$orders = "";
$notes = "";


$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] == "GET"){

    if( !isset($_GET["id"])){
        header("location", "orders.php");
        exit;
    }

    $order_id = $_GET["id"];


    $sql = "SELECT * FROM `orders` WHERE order_id = $order_id";
    $result =  $connection->query($sql);
    $row =  $result->fetch_assoc();

    if( !$row ){
        header("location", "orders.php");
        exit;
    }

    $name = $row["name"];
    $phone = $row["phone"];
    $address = $row["address"];
    $landmark = $row["landmark"];
    $payment = $row["payment"];
    $time = $row["deliveryTime"];
    $orders = $row["foodOrder"];
    $notes = $row["notes"];

}
else{
    $order_id = $_POST["order_id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $landmark = $_POST["landmark"];
    $payment = $_POST["payment"];
    $time = $_POST["deliveryTime"];
    $orders = $_POST["foodOrder"];
    $notes = $_POST["notes"];


    do{

        if(empty($name) || empty($phone) || empty($address) || empty($landmark) || empty($payment) || empty($time) || empty($orders) || empty($notes)){

            $errorMessage = "All the fields are required";
            break;

        }

        $sql = "UPDATE orders SET name = '$name', phone = '$phone', address = '$address', landmark = '$landmark' , payment = '$payment', deliveryTime = '$time', foodOrder = '$orders' , notes = '$notes' WHERE order_id=$order_id";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query". $connection->error;
            break;
        }

        $successMessage = "Updated Successfully";
        header("location: orders.php?secretkey=578771b62a4c56df54353819e6c4134f");
        exit;

    }
    while(false);
}




?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/menu.css"> 



</head>



<body>
    <div class="container-fluid d-flex justify-content-center align-items-stretch p-0">
        <header>
            <!-- Sidebar -->
                <div class="sidebar h-100">
                    <div class="container-fluid mb-5 p-4 d-flex justify-content-around align-items-center">
                        <i data-feather="menu" style="color: white"></i>
                        <h5 class="text-white p-0 text-center mb-0">Kamayan Dashboard</h5>
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

        <div class="container-fluid wrapper content p-5">
            <h1>Edit Order</h1>
            <?php 
                    if(!empty($errorMessage)){
                        echo "
                        
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Error!</strong> $errorMessage
                            <button type='butto' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        
                        ";
                        
                       
                   
                    }
                ?>

                <?php 
                    if(!empty($successMessage)){
                        echo "
                        
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Updated Successfully!</strong> $successMessage
                            <button type='butto' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        
                        ";
                        
                       
                   
                    }
                ?>
            <div class="main">
                <form method="post">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <div class="form-group">
                            <label for="inputEmail">Name</label>
                            <input class="form-control"   name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Phone</label>
                            <input class="form-control" name="phone" value="<?php echo $phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Address</label>
                            <input class="form-control" name="address" value="<?php echo $address; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Landmark</label>
                            <input class="form-control" id="inputPassword" name="landmark" value="<?php echo $landmark; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Payment</label>
                            <input class="form-control" id="inputPassword" name="payment" value="<?php echo $payment; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Time</label>
                            <input class="form-control" id="inputPassword" name="deliveryTime" value="<?php echo $time; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Orders</label>
                            <input class="form-control" id="inputPassword" name="foodOrder" value="<?php echo $orders; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Notes</label>
                            <input class="form-control" id="inputPassword" name="notes" value="<?php echo $notes; ?>">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
      
    </div>
  
    <script>
      feather.replace()
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>