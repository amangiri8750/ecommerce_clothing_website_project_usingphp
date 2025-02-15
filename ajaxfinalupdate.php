<?php

$connect = mysqli_connect('localhost','root','','cara_clothes') or die("failed");


$upm = $_POST['upm'];
$uppp = $_POST['uppp'];
$upn= $_POST['upn'];
$upa = $_POST['upa'];
$upg = $_POST['upg'];
$quert = "UPDATE  users SET Pass='{$uppp}',addres= '{$upa}', Naam = '{$upn}' , gender = '{$upg}' WHERE Email = '{$upm}'";
// $output="";

$result  =mysqli_query($connect,$quert);

if($result){
    echo 1;
}else{
    echo 0;
}
