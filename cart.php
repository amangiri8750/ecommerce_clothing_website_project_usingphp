<?php
session_start();
// session_destroy();



// session_destroy();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addcart'])) {
        if(isset($_SESSION['username'])){
        if (isset($_SESSION['kart'])) {
            $myitem = array_column($_SESSION['kart'], 'item_name');
            if (in_array($_POST['item_name'], $myitem)) {
                echo "<script>
            alert('items already added you can increase the quantity of the item');
            window.location.href = 'index.php';
            </script>";

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['kart'][$count] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1, 'image' => $_POST['img']);
                echo "<script>
           alert('items added');
           window.location.href = 'index.php';
           </script>";


            }
        }else {
            $_SESSION['kart'][0] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1,'image' => $_POST['img']);
            echo "<script>
            alert('items added');
            window.location.href = 'index.php';
            </script>";


        }}else{
            echo "<script>
            window.location.href = 'index.php';
            
            alert('you are not login in this page please login and after add the items if you are not have login id then you sign up')
            </script>";
        }
    }
    if (isset($_POST['remove_name'])) {
        foreach ($_SESSION['kart'] as $key => $value) {
            if ($value['item_name'] == $_POST['item_name']) {
                unset($_SESSION['kart'][$key]);
                // $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
            alert('item removed');
            window.location.href = 'cart.php'
            </script>";

            }
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
                <li class="nav-item"><a class="nav-link" href="shop.php">shop</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">blog</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">about</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">contact</a></li>
                <li class="nav-item"><a class="nav-link active" href="cart.php">
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
    <section id="cart" class="section-p1">
        <table width="100%" class="table">
            <thead>
                <tr>
                    <th scope="col">sr no.</th>
                    <th scope="col">image</th>
                    <th scope="col">product</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">subtotal</th>
                    <th scope="col">remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sr = 1;

                if (isset($_SESSION['kart'])) {

                   
                    foreach ($_SESSION['kart'] as $key => $value) {
                
                    
                        echo "
                     <tr>
                         <td scope='col'> $sr</td>
                         <td scope='col'> <img src='$value[image]'></td>
                         <td scope='col'><b> $value[item_name]</b></td>
                         <td scope='col'> <span>$</span>$value[price]<input type='hidden' class='pri' value='$value[price]' disabled></td>
                         <td scope='col'> <input type='text' oninput='amountFunc()'   class='quan'  value='$value[quantity]'></td>
                         <td scope='col' ><b><span>$</span> <span class='amount'>$value[price] <span></b></td>
                         <td scope='col'><form method='POST'>
                             <button name='remove_name' class='btn text-danger'><i class='fa-solid fa-trash'></i></button>
                             <input type='hidden' name='item_name' value='$value[item_name]'>
                         </form></td>
                     </tr>";
                   $sr =   $sr+1;

                    }

                } else {
                
                }

                ?>

            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1 row align-items-center  p-sm-5 p-3 ">
        <div id="coupon" class="col-md-6 ">
            <h3>apply coupon</h3>
            <div>
                <input type="text" placeholder="enter coupon code">
                <button class="normal">apply</button>
            </div>
        </div>
        <div id="subtotal" class="col-md-6">
            <h3>cart total</h3>
            <table>
                <tr>
                    <td>cart subtotal</td>
                    <td >$<span id="sub"></span></td>
                </tr>
                <tr>
                    <td>shipping</td>
                    <td >$<span id="ship">0</span></td>
                </tr>
                <tr>
                    <td><strong>total</strong></td>
                    <td ><strong>$</strong><span id="gttl"></span></td>
                </tr>
            </table>
            <button class="normal bg-success text-light">proceed for payment</button>
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
    

<script>var gt = 0;
        
        var pri = document.getElementsByClassName("pri");
        var quan = document.getElementsByClassName("quan");
        var amount = document.getElementsByClassName("amount");
        var grandtotal = document.getElementById("gttl");
        var subtotal = document.getElementById("sub");
        var shiping = document.getElementById("ship");
        function amountFunc() {
         
         gt =0;
            for(let item = 0; item<pri.length; item++)
            {
               amount[item].innerText  =pri[item].value*quan[item].value; 
               gt = gt + (pri[item].value)*(quan[item].value) ;
               subtotal.innerText = gt;
            }
            grandtotal.innerText = parseFloat(subtotal.innerText) + parseFloat(shiping.innerText);
            
            
           
            
        }
 amountFunc();


 
</script>
    <script src = "script1.js">
      
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>