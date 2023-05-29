<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);


    $name = "";
    $phone = "";
    $address = "";
    $landmark = "";
    $payment = "";
    $deliveryTime = "";
    $notes = "";
    $order = "";
    $quantity = "";


    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "POST"){

        $name = $_POST['name'];
        $phone = $_POST["phone"];
        $address =  $_POST["address"];
        $landmark = $_POST["landmark"];
        $payment = $_POST["payment"];
        $deliveryTime = $_POST["deliveryTime"];
        $order = $_POST["order"];
        $notes = $_POST["notes"];
        $quantity = $_POST["orderCount"];


        $filteredArray = array_filter($quantity, function($value) {
            return is_numeric($value) && trim($value) !== '';
        });

        $combinedArray = array_combine($order, $filteredArray);

        $allOrders = "";

        foreach ($combinedArray as $key => $value) {
            $allOrders.="Food: $key, Quantity: $value\n"; 
        }




        do{
            if(empty($name) || empty($phone) || empty($address) || empty($landmark) || empty($payment) || empty($deliveryTime) || empty($order)){

                $errorMessage = "All the fields are required";
                break;

            }
            else{

                $sql =  "INSERT INTO orders (name, phone, address, landmark, payment, deliveryTime, notes, foodOrder ) VALUES ('$name', '$phone', '$address', '$landmark', '$payment', '$deliveryTime', '$notes', '$allOrders')";

                $result = $connection->query($sql);

                if(!$result){
                    $errorMessage = "Invalid Query". $connection->error;
                    break;
                }


                $name = '';
                $phone = '';
                $address =  '';
                $landmark =  '';
                $payment = '';
                $deliveryTime = '';
                $notes = '';
                $order = '';

                



                $successMessage = "Your Order has been processed";
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
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/order.css"> 
        <link rel="stylesheet" href="css/footer.css">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body color text="#90C450">
        <div class="container">OPEN: Monday - Saturday 10:00 AM - 8:00 PM</div>
        <header>
            <div class="logo"><a href="index.html"><img src="images/kamayan_logo.jpg" alt="Kamayan Logo" height="60px"></a></div>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="navbar">
                <ul>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="menu.php">MENU</a></li>
                    <li><a href="reviews.php">REVIEWS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="order.php" class="active">ORDER</a></li>
                    <li><a href="admin/login.php">ADMIN</a></li>

                </ul>
                </ul>
            </nav>
        </header>

<!--BODY-->
        <div class="img_center">
            <div class="img_logo_order">
                <img src="images/logo_order.png" alt="Kamayan" width="500">
            </div>
        </div>

        <h1><u>Kamayan</u></h1>
        <div style="width:80%;margin:auto;">

        

    <form id="test-form" method="post">

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
                            <h5 style='margin: 20px; font-size: 20px'><strong>Order place succesully!</strong> $successMessage </h5>
                            <button type='butto' class='close' data-dismiss='alert' aria-label='Close'>
                            </button>
                        </div>
                        
                        ";
                        
                       
                   
                    }
                ?>

<!--FORM-->

<!--INFOS-->
        <fieldset>
            <legend>Personal Information</legend>
            <label>Name: </label><input type="text" name="name" required value="<?php echo $name; ?>">
            <br><br>

            <label>Mobile Number: </label><input type="text" name="phone" required value="<?php echo $phone; ?>">
            <br><br>

            <label>Delivery Address: </label><input type="text" name="address" required value="<?php echo $address; ?>">
            <br><br>

            

            <label>Nearest Landmark: </label><input type="text" name="landmark" required value="<?php echo $landmark; ?>">
       </fieldset>

        <p> <br> </p>

<!--ORDER-->
        <fieldset>

            <legend >Order Details</legend>

            <label>Payment Method: </label>
            <select name="payment" id="Method" required value="<?php echo $payment; ?>">
                <option value=""> None</option>
                <option value="Gcash"> Gcash</option>
                <option value="Cash on Delivery"> Cash On Delivery (COD)</option>
            </select>
            <br><br>
            <label>Preferred Delivery Time: </label><input type="time" name="deliveryTime" size="30" id="delivery time" required value="<?php echo $deliveryTime; ?>">
            <br><br>    
        </fieldset>
    
        <br>
        <fieldset><legend>Menu</legend>
        <div class="menus_check">

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
                 <input type='checkbox' name='order[]' value='$row[title]'/>$row[title]
                 <input type='number' name='orderCount[]' min='0' max='10' />
                
                ";
            }
            
            ?>
            
            <!-- <input type="checkbox" name="Fish fillet" value="2" />Fish fillet
            <input type="number" name="fish_num" id="2" min="0" max="10" />
            <input type="checkbox" name="Pork chop" value="2" />Pork chop
            <input type="number" name="porkchop_num" id="3" min="0" max="10" />
            <input type="checkbox" name="Seafood mix" value="1" />Mix Seafood
            <input type="number" name="seafood_num" id="4" min="0" max="10" /> 
            <input type="checkbox" name="Pork Steak" value="2" />Pork Steak
            <input type="number" name="lumpia_num" id="5" min="0" max="10" />

            <br><br>
            <input type="checkbox" name="Spaghetti" value="2" />Spaghetti
            <input type="number" name="spag_num" id="6" min="0" max="10" />
            <input type="checkbox" name="Chicken cordon bleu" value="2" />Chicken cordon bleu
            <input type="number" name="cordon_num" id="7" min="0" max="10" />
            <input type="checkbox" name="Lumpia" value="2" />Lumpia
            <input type="number" name="porksteak_num" id="7" min="0" max="10" />
            <input type="checkbox" name="Ginisang gulay" value="2" />Ginisang Gulay
            <input type="number" name="gulay_num" id="7" min="0" max="10" />
            <input type="checkbox" name="Puto" value="2" />Puto
            <input type="number" name="Puto_num" id="7" min="0" max="10" />
            <p><br /></p> -->
        </div>
        </fieldset>
        <p> <br> </p>

        <fieldset><legend>Notes</legend>
            <textarea name="notes" rows=5 cols="136.7" value="<?php echo $notes; ?>"></textarea>
        </fieldset>

        <p> <br> </p>

        <!--SUBMIT BUTTON-->
        <input type="SUBMIT" VALUE="SUBMIT">
        <input type="RESET" VALUE="RESET">
        
        </form>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="quick-links">
            <p><b>QUICK LINKS</b></p>
            <a href="about.html" target="_blank"><button>About</button></a>
            <a href="reviews.html" target="_blank"><button>Reviews</button></a>
            <a href="contact.html" target="_blank"><button>Contact Us</button></a>
        </div>

<!-- FOOTER-->

        <footer>
            <div class="footer">
                <div class="social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-snapchat"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
                <ul class="list">
                    <li><a href="#">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
                <p class="copyright">
                    WONDER PRENDS @ 2023
                </p>
            </div>
        </footer>

        <!--Java Files-->
    
        <script src="js/main.js"></script>

    </body>
</html>
