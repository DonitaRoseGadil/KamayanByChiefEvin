<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);

    $menu_id = "";
    $title = "";
    $price = "";
    $caption = "";
    $imgPath = "";

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "GET"){

        if( !isset($_GET["id"])){
            header("location", "menu.php");
            exit;
        }

        $menu_id = $_GET["id"];

        $sql = "SELECT * FROM menu WHERE menu_id=$menu_id";
        $result =  $connection->query($sql);
        $row =  $result->fetch_assoc();

        if( !$row ){
            header("location", "menu.php");
            exit;
        }

        $title = $row["title"];
        $price = $row["price"];
        $caption = $row["caption"];
        $imgPath = $row["imgPath"];

    }
    else{
        $menu_id = $_POST['menu_id'];
        $title = $_POST['title'];
        $price = $_POST["price"];
        $caption =  $_POST["caption"];
        $imgPath = $_POST["imgPath"];


        do{

            if(empty($title) || empty($price) || empty($caption) || empty($imgPath)){

                $errorMessage = "All the fields are required";
                break;

            }

            $sql = "UPDATE menu SET title = '$title', price = '$price', caption = '$caption', imgPath = '$imgPath' WHERE menu_id=$menu_id";
            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid Query". $connection->error;
                break;
            }

            $successMessage = "Added Successfully";
            header("location: menu.php?secretkey=578771b62a4c56df54353819e6c4134f");
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
    <title> By Chief Evin - Admin Panel </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../css/menu.css"> 
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-stretch p-0">  
        <div class="container-fluid wrapper content p-5">
            <h1>Edit Menu</h1>
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
            <div class="main">
                <form method="post">
                        <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                        <div class="form-group">
                            <label for="inputEmail">Title</label>
                            <input class="form-control"   name="title" value="<?php echo $title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Price</label>
                            <input class="form-control" name="price" value="<?php echo $price; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Caption</label>
                            <input class="form-control" name="caption" value="<?php echo $caption; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">ImgPath</label>
                            <input class="form-control" id="inputPassword" name="imgPath"  placeholder="images/best_seller/filename.jpg" value="<?php echo $imgPath; ?>">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update Menu</button>
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