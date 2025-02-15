<?php
$connect = mysqli_connect('localhost','root','','student') or die("failed");

$emal = $_POST['emaal'];
$pas = $_POST['pasu'];

$insrt = "INSERT INTO studendata(email,pass) VALUES('{$emal}','{$pas}')";
$check1 = mysqli_query($connect,$insrt);

if($check1){
    echo 1;
}else{
    echo 0;
}