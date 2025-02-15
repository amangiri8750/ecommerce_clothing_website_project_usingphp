<?php 

$host = 'localhost';
$username = 'root'; 
$password = '';     
$db_name = 'cara_clothes'; 


$conn = new mysqli($host, $username, $password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = "/^[a-zA-Z]{2,20}$/i";
    $emc = "/^[\w]+@[\w]+\.[a-z]{2,6}$/i";

    $nerr = "";
    $eerr = "";
    $check = true; // Ensure to initialize this to true

    if (!preg_match($name, $_POST['name'])) {
        $nerr = "* name is not valid";
        $check = false;
    }

    if (!preg_match($emc, $_POST['email'])) {
        $eerr = "* email is not correct";
        $check = false;
    }

    if ($check) {
        $insert = "INSERT INTO users (Naam, gender, Email, addres, Pass, CreatedAT) VALUES ('$_POST[name]', '$_POST[gender]', '$_POST[email]', '$_POST[address]', '$_POST[pass]', NOW())";
        
        if ($conn->query($insert) === TRUE) {
            $userID = $conn->insert_id; // Get the ID of the newly inserted user
            echo "<script>alert('Your User ID for login purpose is: " . $userID . "');</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="">
    <style>
        /* Basic Reset */
body, h1, form, input, select, textarea, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    height: 100vh;
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
#signlog{
    display: flex;
    align-items: center;
    justify-content: space-between;
/* margin-right: -50px; */

}#signlog li {
    border-radius: 15px;
    padding: 12px 25px 12px 25px ;
    margin-right: 20px;
}
#signlog li:nth-child(1){
    background-color: #000;
}
#signlog li:nth-child(1) a{
    color: #fff;
}
#signlog li:nth-child(2){
    background-color: #fff;
}
#signlog li:nth-child(2) a{
    color: #000;
}

#navbar li a, #signlog li a{
    font-size: 16px;
    text-decoration: none;
    font-weight: 600;
    color: #1a1a1a;
    transition: 0.3s;
}


/* Form Container */
.form-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 500px;
}
.id{
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
span{
    color: red;
}


p{top: 100px;
    position: relative;
    width: 300px;
    height: 50px;
}

/* Heading */
h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.5em;
    text-align: center;
}
section{
    height: 150vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Form Elements */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
    color: #333;
}

input:focus, select:focus, textarea:focus {
    border-color: #666;
    outline: none;
}

/* Button Styling */
button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
}

button:hover {
    background-color: #555;
}

    </style>
</head>
<body>


    
<header id="header" class="">
        <a href="#"><img src="ecommerce/logos.png" class="logo navbar-brand" alt="err"></a>
        <div class="navbar navbar-expand-lg">
            <ul id="navbar" class="navbar-nav">
               
                <li class="nav-item"><a class="" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                </i><span><?php 
                $items = 0;
                if(isset($_SESSION['kart'])){
                    $items = count($_SESSION['kart']);
                    echo"(". $items. ")";
                }else{
                  
                }
                 ?></span></a></li>
               

            </ul>
        </div>
        <div class="users" id="signlog">
        <li class="nav-item"><a class="" href="log.php"><?php 
        
          if(isset($_SESSION['username'])){
            echo  "" . $_SESSION['username'];
          }else{
            echo "log in";
          }
        
        
        ?></a></li>
        <li class="nav-item"><a class=""  id="logott" href="<?php echo isset($_SESSION['username']) ? 'logout.php' : 'sign.php'; ?>"><?php
        
        if(isset($_SESSION['username'])){
            echo "log out";
          }else{
            echo "sign up";
          }
        
        
        ?></a></li>
    </div>
    </header>
   <div class="id"> <p><strong> <?php  
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     echo "Your User ID for login purpose is: " .$userID;
   }
   

?></strong> </p></div>
    <section><div class="form-container">
        <h1>Sign Up</h1>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" id="name" name="name" required>
                <span><?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo $nerr;
                }  ?></span>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <span><?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo $eerr;
                }  ?></span>
            </div>
            
            <div class="form-group">
                <label for="name">password</label>
                <input type="text" id="pass" name="pass" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    </section>
</body>
</html>
