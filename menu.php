<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Kamayan by Chef Evin & Catering Services</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <!--external style sheet-->
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/menu.css"> 
        <link rel="stylesheet" href="css/footer.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="css/swiper-bundle.min.css" />

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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="menu.php"  class="active">MENU</a></li>
                    <li><a href="reviews.php">REVIEWS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="order.php">ORDER</a></li>
                    <li><a href="admin/login.php">ADMIN</a></li>

                </ul>
            </nav>
        </header>

<!--MENUPAGE START--> 

        <div class="header_pic">
            <div class="header_text">
                <p>KAMAYAN MENU</p>
            </div>
        </div>

     

        <div class="menu">
            
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
                <img src='$row[imgPath]'>
                <div class='details'>
                    <div class='details-sub'>
                        <h5>$row[title]</h5>
                        <h5 class='price'> $row[price] </h5>
                    </div>
                    <p>$row[caption]</p>
                    <button>ORDER NOW</button>
                </div>
            </div>
                
                ";
            }
            
            ?>

           
<!--     
            <div class="food-items">
                <img src="images/best_seller/Fish_fillet.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Fish fillet </h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit dolor sit amet consectetur adipisicing elit.</p>
                    <button>Add To Cart</button>
                </div>
            </div>
    
            <div class="food-items">
                <img src="images/best_seller/Pork_chop.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Porkchop</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus quibusdam facilis, magni consectetur necessitatibus.</p>
                    <button>Add To Cart</button>
                </div>
            </div>
    
            <div class="food-items">
                <img src="images/best_seller/Seafood.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Seafood Mix</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    <button>Add To Cart</button>
                </div>
            </div>
    
            <div class="food-items">
                <img src="images/best_seller/Lumpia.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Lumpiang Shanghai</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit</p>
                    <button>Add To Cart</button>
                </div>
            </div>
    
            <div class="food-items">
                <img src="images/best_seller/Spaghetti.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Spaghetti</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus reiciendis nam non quia! Earum eveniet quia minus nemo.</p>
                    <button>Add To Cart</button>
                </div>
            </div>

            <div class="food-items">
                <img src="images/party_trays/Chicken_cordon_bleu.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Chicken Cordon Bleu</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus reiciendis nam non quia! Earum eveniet quia minus nemo.</p>
                    <button>Add To Cart</button>
                </div>
            </div>

            <div class="food-items">
                <img src="images/party_trays/Pork_steak.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Pork Steak</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus reiciendis nam non quia! Earum eveniet quia minus nemo.</p>
                    <button>Add To Cart</button>
                </div>
            </div>

            <div class="food-items">
                <img src="images/party_trays/Ginisang_gulay.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Ginisang Gulay</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus reiciendis nam non quia! Earum eveniet quia minus nemo.</p>
                    <button>Add To Cart</button>
                </div>
            </div>

            <div class="food-items">
                <img src="images/party_trays/Puto.jpg">
                <div class="details">
                    <div class="details-sub">
                        <h5>Puto</h5>
                        <h5 class="price"> 0.00 </h5>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus reiciendis nam non quia! Earum eveniet quia minus nemo.</p>
                    <button>Add To Cart</button>
                </div>
            </div> -->
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

        
        <!-- Swiper JS -->
        <script src="js/swiper-bundle.min.js"></script>
        
        <!--Java Files-->
        <script src="js/main.js"></script>
    </body>

    
</html>