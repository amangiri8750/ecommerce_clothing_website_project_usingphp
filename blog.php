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
                <li class="nav-item"><a class="nav-link active" href="blog.php">blog</a></li>
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
    <section id="page-header"class=" blog-header">
        <h2>#readmore</h2>
        <p>read all case studies about our products</p>
    </section>
    <section id="blog" class="p-5">
      <div class="blog-box row ">
        <div class="blog-img col-md-5 mb-3 mb-md-0">
            <img src="ecommerce/blog/b1 (1).jpg" alt="">
        </div>
        <div class="blog-details col-md-5  ">
            <h4>the cotton-jersey zip-up hoodie</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro repudiandae sapiente beatae atque quis! Debitis maiores inventore, vero voluptatem tempore veritatis qui similique molestias incidunt dolores nemo officiis laborum dicta!</p>
            <a href="#" >continue reading</a>

        </div>
        <h1>13/01</h1>
      </div>
      <div class="blog-box row">
        <div class="blog-img col-md-5 mb-3 mb-md-0">
            <img src="ecommerce/blog/b2 (1).jpg" alt="">
        </div>
        <div class="blog-details col-md-5">
            <h4>how to style a quiff</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro repudiandae sapiente beatae atque quis! Debitis maiores inventore, vero voluptatem tempore veritatis qui similique molestias incidunt dolores nemo officiis laborum dicta!</p>
            <a href="#" >continue reading</a>

        </div>
        <h1>13/01</h1>
      </div>
      <div class="blog-box row">
        <div class="blog-img col-md-5 mb-3 mb-md-0">
            <img src="ecommerce/blog/b3.jpg" alt="">
        </div>
        <div class="blog-details col-md-5">
            <h4>must-have skater girl team</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro repudiandae sapiente beatae atque quis! Debitis maiores inventore, vero voluptatem tempore veritatis qui similique molestias incidunt dolores nemo officiis laborum dicta!</p>
            <a href="#" >continue reading</a>

        </div>
        <h1>13/01</h1>
      </div>
      <div class="blog-box row">
        <div class="blog-img col-md-5 mb-3 mb-md-0">
            <img src="ecommerce/blog/b4 (1).jpg" alt="">
        </div>
        <div class="blog-details col-md-5">
            <h4>runway-inspired trends</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro repudiandae sapiente beatae atque quis! Debitis maiores inventore, vero voluptatem tempore veritatis qui similique molestias incidunt dolores nemo officiis laborum dicta!</p>
            <a href="#" >continue reading</a>

        </div>
        <h1>13/01</h1>
      </div>
      <div class="blog-box row">
        <div class="blog-img col-md-5 mb-3 mb-md-0">
            <img src="ecommerce/blog/b6.jpg" alt="">
        </div>
        <div class="blog-details col-md-5">
            <h4>aw20 menswear trends</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro repudiandae sapiente beatae atque quis! Debitis maiores inventore, vero voluptatem tempore veritatis qui similique molestias incidunt dolores nemo officiis laborum dicta!</p>
            <a href="#" >continue reading</a>

        </div>
        <h1>13/01</h1>
      </div>
    </section>
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
       <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
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