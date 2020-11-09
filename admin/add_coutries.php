<?php
include 'db.php';
$conn=connect();
$strJsonFileContents = file_get_contents("countries.json");
$array = json_decode($strJsonFileContents, true);

for ($x = 0; $x < count($array['countries']); $x++) {
    $conuntry_name= $array['countries'][$x]['name'];
    $conuntry_code=$array['countries'][$x]['code'];
    $phone_code=$array['countries'][$x]['phone_code'];
    
    $sql="INSERT INTO `tbl_countries`(`con_name`, `con_code`, `con_phone`) 
    VALUES ('$conuntry_name','$conuntry_code',$phone_code)";
    $res1 = mysqli_query($conn, $sql);
    
  }
