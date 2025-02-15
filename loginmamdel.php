<?php


$connect = mysqli_connect('localhost','root','','cara_clothes') or die("failed");


$delid = $_POST["em"];
$quert = "DELETE FROM users WHERE UserID = '{$delid}'";



if(  mysqli_query($connect,$quert)){
    echo  1;
}else{
    echo  0;
}

