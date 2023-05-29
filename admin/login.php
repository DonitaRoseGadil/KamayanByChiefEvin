<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);


    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "POST"){

        $username = $_POST['username'];
        $password = $_POST["password"];
       

        do{
           
            if($username == "kamayan" && $password == "kamayan123"){
                echo "yes";
                header("location: menu.php?secretkey=578771b62a4c56df54353819e6c4134f");
            }
            
        }
        while(false);

    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Kamayan by Chef Evin & Catering Services</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
      

        <div class="admin-login container-fluid vh-100 d-flex justify-content-center align-items-center flex-column">

        
            <form class="d-flex justify-content-center align-items-center w-75 flex-column" style="flex: 1" method="post">
                <h2 class="display-3 text-white my-5">ADMIN LOGIN</h2>
                <div class="d-flex flex-column justify-content-center align-items-center py-5 px-3" style="background: #3D262A; width: 30rem; border-radius: 20px   ">
                    <div class="form-group">
                        <label  for="exampleInputEmail1">Email address</label>
                        <input required  name="username"  class="form-control py-2 px-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input required type="password" name="password" class="form-control py-2 px-5" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="d-flex jsutify-content-between align-items-center flex-column">
                        <button type="submit" class="btn btn-primary mt-4">Login</button>
                        <button type="submit" class="btn btn-outline-primary mt-4 mx-3"><a href="returnHome.php">Return to Home Page</a></button>
                    </div>
                   

                </div>


            </form>

        </div>

     

    <!--Java Files-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>