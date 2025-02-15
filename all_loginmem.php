<?php
$connect = mysqli_connect('localhost','root','','cara_clothes') or die("failed");



$quert = "SELECT * FROM users";

$check = mysqli_query($connect,$quert) ;

$output = "";

if(mysqli_num_rows($check) > 0){
    $output = '<table border="1" width="100%" cellpadding = "10px">
    <tr>
    <th width="100px">UserID</th>
    <th> name</th> 
    <th> gender</th> 
    <th> email</th> 
    <th> password</th> 
    <th> address</th> 
    <th width="100px">edit</th> 
    <th width="100px">delete</th> 
    </tr>';

    while($row = mysqli_fetch_assoc($check)){
    $output .= "<tr><td>{$row["UserID"]}</td>
    <td>{$row["Naam"]}</td>
    <td>{$row["gender"]}</td>
    <td>{$row["Email"]}</td>
    <td>{$row["Pass"]}</td>
    <td>{$row["addres"]}</td>

    <td><button class='edit' data-adit='{$row["UserID"]}'>edit</button</td>
    <td><button class='delete' data-emak='{$row["UserID"]}'>delete</button</td></tr>";
    }

    $output .= "</table>";
    mysqli_close($connect);
    echo $output;
}else{
 echo "no record found";
}






