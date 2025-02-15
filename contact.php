<?php 
session_start();
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
                <li class="nav-item"><a class="nav-link " href="index.php">home</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">shop</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">blog</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">about</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">contact</a></li>
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
    <section class="about-header">
        <h2>#let's _talk</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
    </section>
    <section id="contact-details" class="section-p1 row flex-column flex-md-row">
        <div class="details col">
            <span>get in touch</span>
            <h2>visit one of our agency locations or contact us today</h2>
            <h3>head office</h3>
            <div>
                <li>
                    <i class="fa-solid fa-map"></i>
                    <p>56 glassford streeet glasgow g1 1ul new york</p>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <p>contact@gmail.com</p>
                </li><li>
                    <i class="fa-solid fa-phone"></i>
                    <p>contact@gmail.com</p>
                </li><li>
                    <i class="fa-solid fa-clock"></i>
                    <p>monday to saturday</p>
                </li>
            </div>
        </div>
        <div class="map col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3509.8814569638703!2d77.30115792565613!3d28.392648186464626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1723113380063!5m2!1sen!2sin" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section id="form-details" class="row flex-column flex-md-row p-sm-5">
        <form class="col-md-8 mb-4 mb-md-0">
            <span>leave a message</span>
            <h2>we love to hear from  you</h2>
            <input type="text" placeholder="your name">
            <input type="email" placeholder="email">
            <input type="text" placeholder="subject">
            <textarea name="" id="" placeholder="your massage"></textarea>
            <button class="normal">submit</button>

        </form>
        <div class="people col-md-4 d-flex d-md-block  flex-column  align-items-center ">
            <div>
                <img src="ecommerce/people/1.png" alt="">
               <p> <span>john doe</span> senior marketing manager<br>phone: + 000 123 000 77 88<br>email: contact@example.com</p>
            </div>
            <div>
                <img src="ecommerce/people/2.png" alt="">
               <p> <span>william smith</span> senior marketing manager<br>phone: + 000 123 000 77 88<br>email: contact@example.com</p>
            </div>
            <div>
                <img src="ecommerce/people/3.png" alt="">
               <p> <span>ema stone</span> senior marketing manager<br>phone: + 000 123 000 77 88<br>email: contact@example.com</p>
            </div>
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
    
    <script src="script1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>