<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['select'])) {
        if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1, 'image' => $_POST['img']);

        } else {
            $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
        
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommrce website</title>
    <link rel="stylesheet" href="ecom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li class="nav-item"><a class="nav-link active" href="shop.php">shop</a></li>
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
    <section id="prodetails" class="section-p1 row flex-column flex-md-row align-items-center align-items-md-start">
        <div class="single-pro-image col-md-5">
            <?php echo "<img src='$_POST[img]'width='100%'id='mainimg'>" ?>
            <div class="small-img-group">
                <div class="small-img-col">
                    <form action="sproduct.php" method="post"> <button type="submit" name="select"> <img
                                src="ecommerce/products/f1.jpg" width="100%" class="small-img" alt="">
                            <input type="hidden" name="item_name" value="cartoon astronaut t-shirts">
                            <input type="hidden" name="img" value="ecommerce/products/f1.jpg">
                            <input type="hidden" name="price" value="78">
                </button></form>

                </div>
            
            <div class="small-img-col">
                <form action="sproduct.php" method="post"> <button type="submit" name="select"> <img
                            src="ecommerce/products/f2.jpg" width="100%" class="small-img" alt="">
                        <input type="hidden" name="item_name" value="cartoon  t-shirts">
                        <input type="hidden" name="img" value="ecommerce/products/f2.jpg">
                        <input type="hidden" name="price" value="78">
            
            </button></form>
        </div>
        <div class="small-img-col">
            <form action="sproduct.php" method="post"> <button type="submit" name="select"> <img
                        src="ecommerce/products/f3.jpg" width="100%" class="small-img" alt="">
                    <input type="hidden" name="item_name" value=" astronaut t-shirts">
                    <input type="hidden" name="img" value="ecommerce/products/f3.jpg">
                    <input type="hidden" name="price" value="78">
        
        </button></form>
        </div>
        <div class="small-img-col">
            <form action="sproduct.php" method="post"> <button type="submit" name="select"> <img
                        src="ecommerce/products/f4.jpg" width="100%" class="small-img" alt="">
                    <input type="hidden" name="item_name" value="carton astronaut t-shirts">
                    <input type="hidden" name="img" value="ecommerce/products/f4.jpg">
                    <input type="hidden" name="price" value="78">
        
        </button></form>
        </div>
        </div>
        </div>
        <div class="single-pro-details col-md-5">
            <h6>home / t-shirt</h6>

            <?php echo "<h4>$_POST[item_name]</h4>"; ?>
            <?php echo "   <h2><span>$</span>$_POST[price]</h2>"; ?>

            <select>
                <option selected disabled>select size</option>
                <option>xl</option>
                <option>xxl</option>
                <option>small</option>
                <option>large</option>

            </select>
            <form action="<?php echo isset($_SESSION['username']) ? 'cart.php' : 'index.php'; ?>"  method="post">
                <input type='hidden' name='item_name' value=' <?php echo $_POST['item_name']; ?>'>
                <input type='hidden' name='price' value=' <?php echo $_POST['price']; ?>'>
                <input type='hidden' name='img' value=' <?php echo $_POST['img']; ?>'>
                <input type="number" value="1">
                <button type="submit" class="normal" name="addcart">add to cart</button>
            </form>

            <h4>product details</h4>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae magnam amet autem quidem quod
                exercitationem minus sequi reprehenderit assumenda mollitia, iure rerum neque animi officiis, maiores
                nisi iste non harum nulla pariatur, reiciendis est labore? Nam deleniti debitis distinctio? Laudantium
                magni harum, facere assumenda perferendis sunt doloremque ipsum officiis natus?</span>
        </div>
    </section>
    <section id="product1" class="section-p1">
    <div class="pro-container row align-items-center justify-content-around row-cols-lg-4 row-cols-sm-2">

    <?php 
require "additemcon.php";
$query = "SELECT * FROM items LIMIT 4";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>