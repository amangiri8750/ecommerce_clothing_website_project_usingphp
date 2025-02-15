<?php 
// include "ecomdatabase.php";
$connet = mysqli_connect("localhost","root","","cara_clothes");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$admin = $_POST["code"];
$pass = $_POST["passwor"];

  $OUERY = "SELECT * FROM admi WHERE naam = '$admin' AND pass = '$pass'";
  $result =   mysqli_query($connet,$OUERY);



  if($result){
    if(mysqli_num_rows($result)== 1){
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["active"] = true;
            $_SESSION['admi'] = $row['naam'];
        header('location:admin.php');

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
    <title>Login Form</title>
    <link rel="stylesheet" href="">
    <style>
        /* Basic Reset */
body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

section{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    height: 100vh;
}

/* Login Container */
.login-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 100%;
    max-width: 400px;
}

/* Heading */
h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 1.75em;
    text-align: center;
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

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
    color: #333;
    background-color: #f9f9f9;
}

input:focus {
    border-color: #666;
    outline: none;
    background-color: #fff;
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
p{
    color: red;
}
marquee{
color: red;
font-size: 30px;}

    </style>
</head>
<body><header id="header" class="">
        <a href="#"><img src="ecommerce/logos.png" class="logo navbar-brand" alt="err"></a>
        
        <!-- <div class="users" id="signlog">
        <li class="nav-item"><a class="" href="log.php">login</a></li>
        <li class="nav-item"><a class=""  id="logott" href="" disabled>sign up</a></li>
    </div> -->
    </header>
    <marquee behavior="" direction="">this page is used to only admin login . normal users kindly use this link to login <a href="log.php">user login</a></marquee>
    <section>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">User ID</label>
                <input type="text" id="email" name="code" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="passwor" required>
            </div>
            <button type="click">Login</button>
            <!-- <p>*  if you don't have a login id please <a href="sign.php">sign up</a> first</p> -->
        </form>
    </div>
    </section>
</body>
</html>
