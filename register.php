<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);


    $firstName = "";
    $lastName = "";
    $address = "";
    $password = "";

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "POST"){

        $firstName = $_POST['firstName'];
        $lastName = $_POST["lastName"];
        $address =  $_POST["address"];
        $password = $_POST["password"];
        $currentDate = date("Y-m-d");

        do{
            if(empty($firstName) || empty($lastName) || empty($address) || empty($password)){

                $errorMessage = "All the fields are required";
                break;

            }
            else{

                $sql =  "INSERT INTO incoming_users (firstName, lastName, address, password, createdAT) VALUES ('$firstName', '$lastName', '$address', '$password', '$currentDate')";

                $result = $connection->query($sql);

                if(!$result){
                    $errorMessage = "Invalid Query". $connection->error;
                    break;
                }


                $firstName = "";
                $lastName = "";
                $address = "";
                $password = "";

                $successMessage = "Registed Successfully";
            }
        }
        while(false);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div class="div w-75">
            <h1>Register</h1>
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
                            <strong>Registerd Successfully!</strong> $successMessage
                            <button type='butto' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        
                        ";
                        
                       
                   
                    }
                ?>

                
         
            <form method="post">
                    <div class="form-group">
                        <label for="inputEmail">First Name</label>
                        <input class="form-control"  placeholder="Email" name="firstName" value="<?php echo $firstName; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Last Name</label>
                        <input class="form-control"  placeholder="Email" name="lastName" value="<?php echo $lastName; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Address</label>
                        <input class="form-control"  placeholder="Email" name="address" value="<?php echo $address; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password"  placeholder="Password" value="<?php echo $password; ?>">
                    </div>
                 
                    <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
       
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>