<?php
$connect = mysqli_connect('localhost','root','','cara_clothes') or die("failed");


$upid = $_POST["elu"];
$quert = "SELECT * FROM users WHERE UserID = '{$upid}'";
$output="";

$result = mysqli_query($connect,$quert);
if($result){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= "
         <tr> <td>  <input type='text' id='upe' value='{$row["Email"]}' disabled ></td></tr>
           <tr>  <td> <input type='text' id='upg' value='{$row["gender"]}' ></td></tr>
           <tr>  <td> <input type='text' id='upn' value='{$row["Naam"]}' ></td></tr>
           <tr>  <td> <input type='text' id='upp' value='{$row["Pass"]}' ></td></tr>
           <tr>  <td> <input type='text' id='upa' value='{$row["addres"]}' ></td></tr>
           <tr>   <td><button class='upsumit'>save</button></td></tr>
           </div>
      ";



        }
    }
   echo $output; 
}else{

    echo"currntly not access for edit";
}
