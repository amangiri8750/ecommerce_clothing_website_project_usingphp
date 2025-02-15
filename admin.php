<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
    <style>
      .row{
        height: 100vh;
        gap: 40px;

      }
      .row div{
        height: 40%;
        transition: .5s all linear;
      }
      .row div:hover{
        box-shadow: 1px 1px 3px 3px  black;

      }
      a{
        text-decoration: none;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark"><a href="loginmam.php" class="rounded p-2 bg-transparent   "><h1 class="text-light">login credentials</h1></a></div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark"><a href="" class="rounded p-2 bg-transparent"><h1 class="text-light">orders</h1></a></div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark"><a href="additem.php" class="rounded p-2 bg-transparent"><h1 class="text-light">add/remove feature product</h1></a></div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark"><a href="additem1.php" class="rounded p-2 bg-transparent"><h1 class="text-light">add/remove new arrivals</h1></a></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html> -->
<?php 
 session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f8f9fa; /* Light background for the body */

}
header{
    width: 100%;
}
#header{
   background-color: #e3e6f3;
     box-shadow: 0 5px 15px rgba(0,0 , 0, 0.06); 
      z-index: 999; 
     position: sticky;
    top: 0%;
    left: 0;  
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#navbar li,#signlog li{
    list-style: none;
    padding: 0 20px;
    position: relative;
    
}
img{
    padding: 20px;
}

        .row {
            height: 100vh;
            gap: 40px;
        }
        .row div {
            height: 40%;
            transition: .5s all linear;
            cursor: pointer; /* Change cursor to pointer on hover */
        }
        .row div:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* More pronounced shadow on hover */
            transform: translateY(-5px); /* Lift effect on hover */
        }
        a {
            text-decoration: none;
        }
        h1 {
            font-size: 1.5rem; /* Adjust font size for better readability */
        }
        .bg-dark {
            background-color: #343a40 ; /* Bootstrap dark background */
        }
        .rounded {
            border-radius: 15px; /* Increased border radius for a smoother look */
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-3 {
                flex: 0 0 90%; /* Stack items on smaller screens */
                max-width: 90%;
            }
        }
        .add{
            display: flex;
            align-items: center;
            justify-content: center;
        }
       .add  button a {
     text-decoration: none;

}
.add button{
    border: 1px solid black;
    width: 100px;
    
}
    </style>
</head>
<body>
<header id="header" class="">
        <a href="#"><img src="ecommerce/logos.png" class="logo navbar-brand" alt="err"></a>
        <h1><?php   echo $_SESSION['admi'] ; ?></h1>
       
    </header>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark">
                <a href="loginmam.php" class="rounded p-2 bg-transparent">
                    <h1 class="text-light">Login Credentials</h1>
                </a>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark">
                <a href="#" class="rounded p-2 bg-transparent">
                    <h1 class="text-light">Orders</h1>
                </a>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark">
                <a href="additem.php" class="rounded p-2 bg-transparent">
                    <h1 class="text-light">Add/Remove Featured Product</h1>
                </a>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center rounded bg-dark">
                <a href="additem1.php" class="rounded p-2 bg-transparent">
                    <h1 class="text-light">Add/Remove New Arrivals</h1>
                </a>
            </div>
        </div>
    </div>
   <div class="add"> <button class="rounded "><a href="logout.php" class="text-dark">logout</a></button></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
