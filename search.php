<?php

$connect = mysqli_connect('localhost','root','','cara_clothes') or die("failed");


$search = $_POST['ser'];
$quert = "SELECT * FROM  users  WHERE Naam LIKE '%{$search}%'";
$output="";

$check =mysqli_query($connect,$quert);

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
    }
else{
    echo "record not found";
}
