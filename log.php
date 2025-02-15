<?php 
$host = 'localhost';
$username = 'root'; 
$password = '';     
$db_name = 'cara_clothes'; 


$conn = new mysqli($host, $username, $password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$user = $_POST["cod"];
$passs = $_POST["passwo"];

  $OUERY = "SELECT * FROM users WHERE UserID = '$user' AND Pass = '$passs'";
  $result =   mysqli_query($conn,$OUERY);



  if($result){
    if(mysqli_num_rows($result)== 1){
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["active"] = true;
            $_SESSION['username'] = $row['Naam'];
        header('location:index.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
.add button a {
     text-decoration: none;

}
.add button{
    border: 1px solid black;
    width: 100px;
    
}

    </style>
</head>
<body><header id="header" class="">
        <a href="#"><img src="ecommerce/logos.png" class="logo navbar-brand" alt="err"></a>
        
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
    <section>
    <div class="login-container">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">User ID</label>
                <input type="text" id="email" name="cod" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="passwo" required>
            </div>
            <button type="submit">Login</button>
            <p>*  if you don't have a login id please <a href="sign.php">sign up</a> first</p>
        </form>
    </div>
    </section>
    <div class="add d-flex align-items-center justify-content-center">
    <button class="p-1 bg-danger" ><a href="adminlogin.php" class="text-light">Admin panel</a></button>
    </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
