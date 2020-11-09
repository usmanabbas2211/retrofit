<?php
include 'admin/db.php';
$conn=connect();
if(isset($_POST['query'])){
    $key=$_POST['query'];
    $output='';
    $sql="SELECT * FROM `tbl_items` WHERE `item_name` LIKE '%".$key."%'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $output .='<li>'.$row["item_name"].'</li>';
        }
    }else{
        $output .='<li>Item Not Found</li>';
    }
    echo $output;
}