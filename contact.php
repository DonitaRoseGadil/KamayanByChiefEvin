<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kamayan";

    $connection = new mysqli($servername, $username, $password, $database);


    $firstName = "";
    $lastName = "";
    $email = "";
    $mobileNumber = "";
    $message = "";


    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == "POST"){

        $firstName = $_POST['firstName'];
        $lastName = $_POST["lastName"];
        $email =  $_POST["email"];
        $mobileNumber = $_POST["mobileNumber"];
        $message = $_POST["message"];
        $currentDate = date("Y-m-d");

        do{
            if(empty($firstName) || empty($lastName) || empty($email) || empty($message) || empty($mobileNumber)){

                $errorMessage = "All the fields are required";
                break;

            }
            else{

                $sql =  "INSERT INTO messages (firstName, lastName, email, mobileNumber, message, createdAt) VALUES ('$firstName', '$lastName', '$email', '$mobileNumber',  '$message', '$currentDate')";

                $result = $connection->query($sql);

                if(!$result){
                    $errorMessage = "Invalid Query". $connection->error;
                    break;
                }


                $firstName = "";
                $lastName = "";
                $email = "";
                $mobileNumber = "";
                $message = "";


                $successMessage = "Registed Successfully";
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
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" href="css/footer.css"> 

    </head>

    <body>
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
                    <li><a href="index.html" >HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="menu.php">MENU</a></li>
                    <li><a href="reviews.php">REVIEWS</a></li>
                    <li><a href="contact.php" class="active">CONTACT</a></li>
                    <li><a href="order.php">ORDER</a></li>
                    <li><a href="admin/login.php">ADMIN</a></li>

                </ul>
                </ul>
            </nav>
        </header>

        <div class="contact-us">
            <div class="title">
                <h2>Get in Touch</h2>
            </div>
            <div class="box">
                <!--FORM-->
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form method="post">
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>First Name</span>
                                    <input type="text" placeholder="John" name="firstName" value="<?php echo $firstName; ?>">
                                </div>
                                <div class="inputBox">
                                    <span>Last Name</span>
                                    <input type="text" placeholder="Doe" name="lastName" value="<?php echo $lastName; ?>">
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <span>Email</span>
                                    <input type="text" placeholder="johndoe@gmail.com" name="email" value="<?php echo $email; ?>">
                                </div>
                                <div class="inputBox">
                                    <span>Mobile Number</span>
                                    <input type="text" placeholder="+63 938 790 9863" name="mobileNumber" value="<?php echo $mobileNumber; ?>">
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea name="message" value="<?php echo $message; ?>" placeholder="Write your message here..."></textarea>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="Send">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <!--INFO-->
                <div class="contact info">
                    <h3>Contact Information</h3>
                    <div class="infoBox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>Purok 10, Brgy. Alawihao Daet Camarines Norte</p>
                        </div>
                        <div>
                            <span><ion-icon name="mail"></ion-icon></span>
                            <a href="mailto:kamayancateringservices@gmail.com">kamayancateringservices@gmail.com</a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href="tel:+63 946 182 2108">+63 946 182 2108</a>
                        </div>
                        <!--Social Medi Links-->
                        <ul class="sci">
                            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                            <li><a href="#"><ion-icon name="logo-snapchat"></ion-icon></a></li>
                            <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        </ul>
                    </div>
                </div>

                <!--MAP-->
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.437704339438!2d122.91594067501356!3d14.11033748631991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3398ae57889668c7%3A0xaa099d51be0d3b7!2s4W69%2B4CJ%2C%20Daet%2C%20Camarines%20Norte!5e0!3m2!1sen!2sph!4v1682313306563!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer">
                <div class="social">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-snapchat"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
                <ul class="list">
                    <li><a href="index.html">Home</a></li>
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/main.js"></script>

    </body>
</html>