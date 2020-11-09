<?php
include 'db.php';
$conn=connect();

$sql_countries="SELECT * FROM `tbl_countries`";
$res_countries=mysqli_query($conn,$sql_countries);

$strJsonFileContents = file_get_contents("cities.json");
$array = json_decode($strJsonFileContents, true);



//echo $array['countries'][0]['name'];

while($row_countires=mysqli_fetch_assoc($res_countries)){
    $conuntry_code=$row_countires['con_name'];
    $id=$row_countires['con_id'];
    for($x=0; $x<count($array[$conuntry_code]); $x++){
        $city_name=$array[$city][$x];
        $sql_city="INSERT INTO `tbl_cities`(`con_id`, `city_name`) VALUES ($con_id,'$city_name')";
        $res_city = mysqli_query($conn, $sql_city);
        echo $array[$city][$x];
        echo '<br>';
    }
}




// for ($x = 0; $x < count($array['countries']); $x++) {
//     $conuntry_name= $array['countries'][$x]['name'];
//     $conuntry_code=$array['countries'][$x]['code'];
//     $phone_code=$array['countries'][$x]['phone_code'];
    
//     $sql="INSERT INTO `tbl_countries`(`con_name`, `con_code`, `con_phone`) 
//     VALUES ('$conuntry_name','$conuntry_code',$phone_code)";
//     $res1 = mysqli_query($conn, $sql);
    
//   }
