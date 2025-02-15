<?php

$connect = mysqli_connect('localhost','root','','student') or die("failed");
$limit_per_page = 5;
$page = "";
if(isset($_POST['page_id'])){
    $page = $_POST['page_id'];
}else{
    $page = 1;
}
$offset = ($page -1)*$limit_per_page;
$sql  = "SELECT * FROM studendata LIMIT {$offset},{$limit_per_page}";
$results = mysqli_query($connect,$sql);
$output = "";
if(mysqli_num_rows($results)>0){
    $output .=   '<table border="1" width="100%" cellpadding = "10px">
    <tr>
    <th width="100px">pass</th> 
    <th>email</th> 
    <th width="100px">edit</th> 
    <th width="100px">delete</th> 
    </tr>';

    while($row = mysqli_fetch_assoc($results)){
    $output .= "<tr><td>{$row["pass"]}</td><td>{$row["email"]}</td><td><button class='edit' data-adit='{$row["email"]}'>edit</button</td><td><button class='delete' data-emak='{$row["email"]}'>delete</button</td></tr>";

   
    } 
    $output .= "</table>";
    $sqlto = "SELECT * FROM studendata";
    $recods = mysqli_query($connect,$sqlto);
    $total_recod= mysqli_num_rows($recods);
    $tota_page = ceil($total_recod/$limit_per_page);
    for($i = 1;$i <=$tota_page;$i++){
        $output .="<a id={$i} href= ''>{$i}</a>";
    }
echo $output;
}else{
    echo "no record";
}