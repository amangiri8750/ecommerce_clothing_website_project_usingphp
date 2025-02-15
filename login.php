<?php

// echo  $_SESSION['mtname'];
// include "login3.php";
$connect = mysqli_connect('localhost','root','','student') or die("failed");



$quert = "SELECT * FROM studendata";

$check = mysqli_query($connect,$quert) ;

$output = "";

if(mysqli_num_rows($check) > 0){
    $output = '<table border="1" width="100%" cellpadding = "10px">
    <tr>
    <th width="100px">pass</th> 
    <th>email</th> 
    <th width="100px">edit</th> 
    <th width="100px">delete</th> 
    </tr>';

    while($row = mysqli_fetch_assoc($check)){
    $output .= "<tr><td>{$row["pass"]}</td><td>{$row["email"]}</td><td><button class='edit' data-adit='{$row["email"]}'>edit</button</td><td><button class='delete' data-emak='{$row["email"]}'>delete</button</td></tr>";
    }

    $output .= "</table>";
    mysqli_close($connect);
    echo $output;
}else{
 
}












// $ferr = "";
// $lerr = "";
// $gerr = "";
// $eerr = "";
// $perr = "";
// $cperr = "";
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     $name =  "/^[a-zA-Z]{2,20}$/i";
//     $emc = "/^[\w]+@[\w]+\.[a-z]{2,6}$/i";
//     $passc = "/^[A-Z]{2,4}[a-z]{2,4}[0-9]{2,4}[@&$!]{2,4}$/";
//     $fname = $_POST["fn"];
//     $lname = $_POST["ln"];
//     $gender = $_POST["g"];
//     $email = $_POST["email"];
//     $pass = $_POST["pass"];
//     $cpass = $_POST["cpass"];
//     $ferr = "";
//      if(!preg_match($name, $fname)) {
//          $ferr = "first name is not valid";
//     }
//      if(!preg_match($name, $lname)) {
//         $lerr = "last name is not valid";
//     }
    
//      if(!preg_match($emc,$email)){
//         $eerr = "email is not correct";
//     }
//      if(!preg_match($passc, $pass)) {
//         $perr =" password is not strong ";
//     }
//      if($pass != $cpass){
//         $cperr = "confirm password is not match ";
//     }



    





    

// }
// 




// $database = "CREATE DATABASE student";
// $table = "CREATE TABLE studendata(
// Serialno INT AUTO_INCREMENT NOT NULL  UNIQUE,
// firstname VARCHAR(40) NOT NULL ,
// lastname VARCHAR(40) NOT NULL,
// email VARCHAR(40) NOT NULL UNIQUE PRIMARY KEY ,
// pass CHAR(40) NOT NULL,
// timing TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ";

// mysqli_query($connect,$table);



// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//      $insert = "INSERT INTO studendata(firstname,lastname,email,pass,timing,gender)
//      VALUES('$fname','$lname','$email','$cpass',now(),'$gender')";

//      mysqli_query($connect,$insert);        


//   if($check){
//     echo "yes";
//   }else{
//     echo "no";
//   }




// }







 ?>


 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            width: 100%;
            background-image: url(https://images.pexels.com/photos/7078717/pexels-photo-7078717.jpeg?auto=compress&cs=tinysrgb&w=600);
            display: flex;
            align-items: center;
            justify-content: space-around;
            backdrop-filter: blur(1px);
            background-size: 100% 100%;
            background-repeat: no-repeat;

        }

        form {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: black;
            height: 90%;
            width: 40%;
            background-color: rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px);
            box-shadow: 20px 20px solid white;
            border-radius: 10px;
            border: 1px solid black;
            display: flex;
            align-items: center;
            /* justify-content: space-around; */
            flex-direction: column;
            animation: aman .8s linear forwards;
        }

        @keyframes aman {
            from {
                /* transform: translateY(400px); */
                opacity: 0;
            }

            to {
                /* transform: translateY(0px); */
                opacity: 1;
            }

        }

        fieldset[id=header] {
            height: 15%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: none;
        }

        fieldset[id=identifier] {
            height: 5%;
            width: 90%;
            display: flex;
            align-items: end;
            justify-content: start;
            border: none;
        }

        fieldset[id=first] {
            height: 10%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            border: none;

        }

        fieldset[id=radio] {
            width: 90%;
        }

        fieldset {
            height: 7%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            border: none;

        }

        fieldset[id=first] input {
            height: 100%;
            width: 40%;
            background-color: rgba(255, 255, 255, .0);
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            color: black;
            font-size: 20px;

        }

        input {
            height: 100%;
            width: 90%;
            background-color: rgba(255, 255, 255, .0);
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            color: black;
            font-size: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        fieldset input[type=radio] {
            height: 50%;
            width: 10%;
            color: black;
        }

        fieldset[id=register] {
            height: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 90%;
        }

        fieldset button {
            height: 65%;
            width: 15%;
            font-size: 20px;
            border-radius: 70%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            color: white;
            transition: scale .3s linear;
        }

        button:hover {
            scale: .9;

            cursor: pointer;
        }

        hr {
            width: 90%;
            background-color: saddlebrown;
            color: aquamarine;
        }

        ::placeholder {
            color: rgba(0, 0, 0, .7);
        }

        form span {
            color: red;
        }

        .data {
            height: 40%;
            width: 25%;
            background-color: rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px);
            box-shadow: 20px 20px solid white;
            border-radius: 10px;
            border: 1px solid white;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }

        .data span {
            width: 90%;
        }
    </style> -->
</head>



<body>

   <!-- <form  method="post">
        <fieldset id="header">
            <h2>REGISTRATION FORM</h2>
            <p>register with us to get more details</p>
        </fieldset>
        <fieldset id="identifier">
            <p>Name</p>
        </fieldset>
        <fieldset id="first">
            <input type="text" name="fn" placeholder="first name">
            <input type="text" name="ln" placeholder="last name">

        </fieldset>
        <fieldset>
            <span></span>
            <span></span>

        </fieldset>
        <fieldset id="identifier">
            <p>gender</p>
        </fieldset>
        <fieldset id="radio">
            <label for="m">male</label>
            <input type="radio" id="m" name="g" value="male" checked>
            <label for="f">female</label>
            <input type="radio" id="f" name="g" value="female">
            <label for="o">other</label>
            <input type="radio" id="o" name="g" value="other">
        </fieldset>
        <fieldset>
            <span></span>


        </fieldset>
        <hr>
        <fieldset id="identifier">
            <p>Email</p>
        </fieldset>
        <fieldset>
            <input type="email" name="email" placeholder="enter email here">
        </fieldset>
        <fieldset>
            <span</span>


        </fieldset>

        <fieldset id="identifier">
            <p>password</p>
        </fieldset>
        <fieldset>
            <input type="password" name="pass" placeholder="enter password here">
        </fieldset>
        <fieldset>
            <span></span>


        </fieldset>
        <fieldset id="identifier">
            <p> confirm password</p>
        </fieldset>
        <fieldset>
            <input type="password" name="cpass" placeholder="enter password here">
        </fieldset>
        <fieldset>
            <span></span>


        </fieldset>
        <fieldset id="register">
            <!-- <a href="log.html" type="submit">register</a> -->
            <!-- <button type="submit">submit</button> -->
        <!-- </fieldset> -->






    <!-- </form> -->

    
   


</body>

</html> 