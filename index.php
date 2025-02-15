<?php



$host = 'localhost';
$username = 'root'; 
$password = '';     
$db_name = 'cara_clothes'; 
$table_name1 = 'admi';
$table_name2 = 'items'; 
$table_name3 = 'items1';
$table_name4 = 'users'; 

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($conn->query($sql) === TRUE) {
    // echo "Database '$db_name' is ready!<br>";

    $conn->select_db($db_name);

    // Check if the table exists
    $table_check1 = "SHOW TABLES LIKE '$table_name1'";
    $result1 = $conn->query($table_check1);

    if ($result1->num_rows == 0) {
        // Create the table if it doesn't exist
        $create_table_sql1 = "CREATE TABLE $table_name1 (
            naam VARCHAR(255) NOT NULL ,
            pass VARCHAR(255) NOT NULL
        )";

        if ($conn->query($create_table_sql1) === TRUE) {
            // echo "Table '$table_name1' created successfully!";
        } else {
            // echo "Error creating table: " . $conn->error;
        }


        $insert1  = "INSERT INTO $table_name1 (naam,pass) VALUES('admin','admin')";
        if ($conn->query( $insert1) === TRUE) {
            // echo "Table '$table_name1' inserted successfully!";
        } else {
            // echo "Error inserting table: " . $conn->error;
        }
    } 








    $table_check2 = "SHOW TABLES LIKE '$table_name2'";
    $result2 = $conn->query($table_check2);

    if ($result2->num_rows == 0) {
        // Create the table if it doesn't exist
        $create_table_sql2 = "CREATE TABLE $table_name2 (
            srn INT AUTO_INCREMENT PRIMARY KEY,
            producturl VARCHAR(255) NOT NULL UNIQUE,
            productname VARCHAR(255) NOT NULL UNIQUE,
            price INT NOT NULL
        )";

        if ($conn->query($create_table_sql2) === TRUE) {
            // echo "Table '$table_name2' created successfully!";
        } else {
            // echo "Error creating table: " . $conn->error;
        }

        $increment1  = "ALTER TABLE $table_name2 AUTO_INCREMENT = 69777";
        if ($conn->query( $increment1) === TRUE) {
            // echo "Table '$table_name2' increment successfully!";
        } else {
            // echo "Error incrementing table: " . $conn->error;
        }



        $insert2  = "INSERT INTO $table_name2 (producturl,productname,price) VALUES('f1.jpg','shirts1',5645),
        ('f2.jpg','shirts2',7865),
        ('f3.jpg','shirts3',8745),
        ('f4.jpg','shirts4',4645),
        ('f5.jpg','shirts5',3445),
        ('f6.jpg','shirts6',0945),
        ('f7.jpg','shirts7',5695),
        ('f8.jpg','shirts8',5640)";
        if ($conn->query( $insert2) === TRUE) {
            // echo "Table '$table_name2' inserted successfully!";
        } else {
            // echo "Error inserting table: " . $conn->error;
        }
    } 







    $table_check3 = "SHOW TABLES LIKE '$table_name3'";
    $result3 = $conn->query($table_check3);

    if ($result3->num_rows == 0) {
        // Create the table if it doesn't exist
        $create_table_sql3 = "CREATE TABLE $table_name3 (
            srn INT AUTO_INCREMENT PRIMARY KEY,
            producturl VARCHAR(255) NOT NULL UNIQUE,
            productname VARCHAR(255) NOT NULL UNIQUE,
            price INT NOT NULL
        )";

        if ($conn->query($create_table_sql3) === TRUE) {
            // echo "Table '$table_name3' created successfully!";
        } else {
            // echo "Error creating table: " . $conn->error;
        }


        $increment2  = "ALTER TABLE $table_name3 AUTO_INCREMENT = 59777";
        if ($conn->query( $increment2) === TRUE) {
            // echo "Table '$table_name3' increment successfully!";
        } else {
            // echo "Error incrementing table: " . $conn->error;
        }


        $insert3  = "INSERT INTO $table_name3 (producturl,productname,price) VALUES('n1.jpg','newshirts1',8845),
        ('n2.jpg','newshirts2',7865),
        ('n3.jpg','newshirts3',87845),
        ('n4.jpg','newshirts4',4645),
        ('n5.jpg','newshirts5',34545),
        ('n6.jpg','newshirts6',0945),
        ('n7.jpg','newshirts7',5655),
        ('n8.jpg','newshirts8',5620)";
        if ($conn->query( $insert3) === TRUE) {
            // echo "Table '$table_name3' inserted successfully!";
        } else {
            // echo "Error inserting table: " . $conn->error;
        }
    }








    $table_check4 = "SHOW TABLES LIKE '$table_name4'";
    $result4 = $conn->query($table_check4);

    if ($result4->num_rows == 0) {
        // Create the table if it doesn't exist
        $create_table_sql4 = "CREATE TABLE $table_name4 (
            UserID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
            Naam VARCHAR(255) NOT NULL,
            gender VARCHAR(255) NOT NULL,
            Email VARCHAR(255) NOT NULL UNIQUE,
            addres VARCHAR(255) NOT NULL,
            Pass int NOT NULL,
            CreatedAT  TIMESTAMP DEFAULT CURRENT_TIMESTAMP


        )";

        if ($conn->query($create_table_sql4) === TRUE) {
            // echo "Table '$table_name4' created successfully!";
        } else {
            // echo "Error creating table: " . $conn->error;
        }


        $increment3  = "ALTER TABLE $table_name4 AUTO_INCREMENT = 669777";
        if ($conn->query( $increment3) === TRUE) {
            // echo "Table '$table_name4' increment successfully!";
        } else {
            // echo "Error incrementing table: " . $conn->error;
        }
    } 







    
} else {
    echo "Error creating database: " . $conn->error;
}


session_start();


if(!isset($_SESSION['username'])){
    header('location:captcha.html');
}


$timeout_duration =  60*60;

if(isset($_SESSION['last_activity'])){
    $time_since_last_activity = time() - $_SESSION['last_activity'];
    if( $time_since_last_activity > $timeout_duration){
       
        header('location:logout.php');
    }
}


$_SESSION['last_activity'] = time();

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommrce website</title>
    <link rel="stylesheet" href="ecom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  

</head>
<body>
<header class="container-fluid" id="header">
    <nav class="navbar navbar-expand-lg " >
       
    <a href="#"><img src="ecommerce/logos.png" class="logo navbar-brand" alt="err"></a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="navbar" class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="index.php">home</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">shop</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">blog</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">about</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">contact</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span><?php 
                        $items = 0;
                        if (isset($_SESSION['kart'])) {
                            $items = count($_SESSION['kart']);
                            echo "(" . $items . ")";
                        }
                    ?></span>
                </a></li>
                <li class="nav-item d-flex d-lg-none">
                    <a class="" id="logott" href="<?php echo isset($_SESSION['username']) ? 'logout.php' : 'sign.php'; ?>">
                        <?php echo isset($_SESSION['username']) ? "log out" : "sign up"; ?>
                    </a>
                </li>
            </ul>
            <div class="users d-none d-lg-flex" id="signlog">
                <li class="nav-item"><a class="" href="log.php">
                    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "log in"; ?>
                </a></li>
                <li class=" d-none d-lg-flex">
                    <a class="" id="logott" href="<?php echo isset($_SESSION['username']) ? 'logout.php' : 'sign.php'; ?>">
                        <?php echo isset($_SESSION['username']) ? "log out" : "sign up"; ?>
                    </a>
                </li>
            </div>
          </div>
        
      </nav>
      
</header>
      <div class="users d-flex d-lg-none absolute" id="signlog">
                <li class="nav-item"><a class="" href="log.php">
                    <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "log in"; ?>
                </a></li></div>


    <section id="hero" class="">
        <h4 class="">trade-in-offer</h4>
        <h2 class="">super value deals</h2>
        <h1 class="">on all products</h1>
        <p class="">save more with coupons & up to 70% off</p>
        <button class="">shop now</button>
    </section>
    <section id="feature" class="section-p1 row align-items-center justify-content-around show-animate">
        <div class="fe-box col-lg-2 col-md-4 col-sm-6 animate">
            <img src="ecommerce/featurs/f1.png" alt="">
            <h6>free shipping</h6>
        </div>
        <div class="fe-box col-lg-2 col-md-4 col-sm-6">
            <img src="ecommerce/featurs/f2.png" alt="">
            <h6>online order</h6>
        </div>
        <div class="fe-box col-lg-2 col-md-4 col-sm-6">
            <img src="ecommerce/featurs/f3.png" alt="">
            <h6>save money</h6>
        </div><div class="fe-box col-lg-2 col-md-4 col-sm-6">
            <img src="ecommerce/featurs/f4.png" alt="">
            <h6>promotion</h6>
        </div>
        <div class="fe-box col-lg-2 col-md-4 col-sm-6">
            <img src="ecommerce/featurs/f5.png" alt="">
            <h6>happy sell</h6>
        </div>
        <div class="fe-box col-lg-2 col-md-4 col-sm-6">
            <img src="ecommerce/featurs/f6.png" alt="">
            <h6>24*7 support</h6>
        </div>
        
    </section>
    <section id="product1" class="section-p1">
        <h2>featured products</h2>
        <p>summer collection new modern design</p>
        <div class="pro-container row align-items-center justify-content-around row-cols-lg-4 row-cols-sm-2">
        <?php 
require "additemcon.php";
$query = "SELECT * FROM items";
$result = mysqli_query($connet,$query);
if(mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_assoc($result)){
        echo " <form action='sproduct.php' method='post'>
            <div class='pro  ' >
                <img src='{$row["producturl"]}' alt=''>
                <div class='des'>
                    <span>adidas</span>
                    <h5>{$row['productname']}</h5>
                    <div class='star'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
                    <h4>{$row["price"]}</h4>
                    <input type='hidden' name='item_name' value='{$row['productname']}'>
                    <input type='hidden' name='img' value='{$row['producturl']}'>
                    <input type='hidden' name='price' value={$row['price']}>
                </div>
               <button type='submit' class='kart' name='select'><i class='fa-solid fa-cart-shopping '></i></button>
                
            </div></form>";
    }
}

?>
    </section>
    <section id="banner" class="section-m1 ">
        <h4 class="">repair services</h4>
        <h2 class="text-center">up to <span>70% off</span> - all t-shirts & accessories</h2>
        <button class="normal ">explore more</button>
    </section>
    <section id="product1" class="section-p1">
        <h2>new arrivals</h2>
        <p>summer collection new modern design</p>
        <div class="pro-container pro-container row align-items-center justify-content-around row-cols-lg-4 row-cols-sm-2">
        <?php 
require "additemcon.php";
$query = "SELECT * FROM items1";
$result = mysqli_query($connet,$query);
if(mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_assoc($result)){
        echo " <form action='sproduct.php' method='post'>
            <div class='pro  ' >
                <img src='{$row["producturl"]}' alt=''>
                <div class='des'>
                    <span>adidas</span>
                    <h5>{$row['productname']}</h5>
                    <div class='star'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
                    <h4>{$row["price"]}</h4>
                    <input type='hidden' name='item_name' value='{$row['productname']}'>
                    <input type='hidden' name='img' value='{$row['producturl']}'>
                    <input type='hidden' name='price' value={$row['price']}>
                </div>
               <button type='submit' class='kart' name='select'><i class='fa-solid fa-cart-shopping '></i></button>
                
            </div></form>";
    }
}
?>
        </div>
    </section>
    <section id="sm-banner" class="section-p1 row align-items-center justify-content-around">
        <div class="banner-box col-lg-5 col-md-8 mb-lg-0 mb-4">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>the best classic dress is on sale at cara</span>
            <button class="white">learn more</button>
        </div>
        <div class="banner-box banner-box2 col-lg-5 col-md-8">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>the best classic dress is on sale at cara</span>
            <button class="white">collection</button>
        </div>
    </section>
    <section id="newsletter" class="section-p1 section-m1 row  justify-content-between  flex-column flex-md-row">
        <div class="newstext col">
            <h4>sign up for newsletters</h4>
            <p>get e-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <div class="form col justify-content-md-end">
            <input type="text" placeholder="your email address">
            <button class="normal">sign up</button>
        </div>
    </section>
    <footer class="section-p1 row  " id="">
        <div class="colu col-md-4 col-sm-6 ">
            <img class="logo" src="ecommerce/logos.png" alt="">
            <h4>contact</h4>
            <p><strong> address:</strong> 562 wellington road, street 32, san francisco </p>
            <p><strong> phone:</strong>+01 2222 365 /(+91) 01 2345 6789</p>
            <p><strong> hours:</strong> 10:00 - 18:00, mon - sat </p>
            <div class="follow">
                <h4>follow us</h4>
                <div class="icon">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
            </div>
        </div>
        <div class="colu col-md-2 col-sm-6">
            <h4>about</h4>
            <a href="#">about us</a>
            <a href="#">delivery information</a>
            <a href="#">privacy policy</a>
            <a href="#">terms & condition</a>
            <a href="#">contact us</a>
        </div>
        <div class="colu col-md-2 col-sm-6">
            <h4>my account</h4>
            <a href="#">sign in </a>
            <a href="#">view cart</a>
            <a href="#">my wishlist</a>
            <a href="#">track mt order</a>
            <a href="#">help</a>
        </div>
        <div class="colu install col-md-4 col-sm-6">
            <h4>install app</h4>
            <p>from app store or goggle play</p>
            <div class="roo">
                <img src="ecommerce/pay/app.jpg" alt="">
                <img src="ecommerce/pay/play.jpg" alt="">

            </div>
            <p>secured payment gateaway</p>
            <img src="ecommerce/pay/pay.png" alt="">
            

        </div>
       
    </footer>
    <footer class="section-p1">
        <div class="copyright">
            <p>@ 2021, tech2 etc - HTML CSS ecommerce template </p>
        </div>
    </footer>
    <script>
     
    </script>
    <script src="script1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>