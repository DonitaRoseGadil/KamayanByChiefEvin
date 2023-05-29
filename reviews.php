<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);


    $user = "";
    $email = "";
    $comment = "";

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "POST"){

        $user = $_POST['username'];
        $email = $_POST["email"];
        $comment =  $_POST["comment"];


        do{
            if(empty($user) || empty($email) || empty($comment)){

                $errorMessage = "All the fields are required";
                break;

            }
            else{

                $sql =  "INSERT INTO reviews (username, email, comment) VALUES ('$user', '$email', '$comment')";

                $result = $connection->query($sql);

                if(!$result){
                    $errorMessage = "Invalid Query". $connection->error;
                    break;
                }


                $user = "";
                $email = "";
                $comment = "";

                $successMessage = "Commented Successfully";
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
    <!--external style sheet-->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/reviews.css"> 
    <link rel="stylesheet" href="css/footer.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Box Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  </head>

  <body>
    <div class="container">OPEN: Monday - Saturday 10:00 AM - 8:00 PM</div>
    <header>
      <div class="logo"><a href="index.html"><img src="images/kamayan_logo.jpg" alt="Kamayan Logo" height="60px"></a></div>
      <div class="hamburger" onclick="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>

      <nav class="navbar">
            <ul>
                <li><a href="index.html" >HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="reviews.php" class="active">REVIEWS</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="order.php">ORDER</a></li>
                <li><a href="admin/login.php">ADMIN</a></li>

            </ul>
      </nav>
    </header>

<!--NEWSFEED FORM-->


    <div class="newsfeed">
      
      <div class="post">
        <h2 class="post-title">Give Us Some Review: </h2>
        <br>
        <img class="post-img" src="images/kamayan_logo.jpg" alt="product">
        <br><br>
        <p class="post-content" align="justify">Are you looking for a catering service that goes above and beyond to make your event extraordinary? Look no further than Kamayan. 
          We are passionate about creating unforgettable culinary experiences that will impress your guests and leave a lasting impression.
          <br><br>Contact us today to discuss your upcoming event and let us showcase our expertise in creating a customized catering experience that will make your occasion truly remarkable.
          Trust to bring culinary excellence and a personal touch to your special event.</p>


    

<!--COMMENTS FORM-->          
        <div class="comments">
          <h3 class="comments-title">Comments:</h3>
          <ul class="comments-list">
          <?php 
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "kamayan";
        
            $connection = new mysqli($servername, $username, $password, $database);
        
            if($connection->connect_error){
                die('connection failed' . $connection->connect_error);
            }       

            $sql = "SELECT * FROM reviews";
            $result = $connection->query($sql);
            
            if(!$result){
                die('Invalid Query' . $connection->connect_error);
            }
            
            while ($row = $result->fetch_assoc()){
                echo "
                <li class='comment' style='background: #3D262A; padding: 15px; border-radius: 20px; margin: 20px 0'>

                <div  style='color: white'  class='comment-author'>$row[username]:
                  <p style='font-size: 10px;'> $row[email]</p>
                </div>
                <div style='color: white;' class='comment-body'>$row[comment]</div>
              </li>
  
             
                
                ";
            }
            
            ?>
           
          </ul>
          
<!--ADD COMMENT FORM-->


          <form class="add-comment-form" method="post">
          <br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"  value="<?php echo $user; ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  value="<?php echo $email; ?>">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment"  value="<?php echo $comment; ?>"></textarea>
            <button type="submit">Add Comment</button>
          </form>
        </div>
      </div>
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