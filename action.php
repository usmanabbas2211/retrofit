<?php
include 'admin/db.php';
$conn=connect();

if(isset($_POST['Add_to_cart'])){
    $product_id=$_POST['product_id'];
    $_SESSION["products"] = $product_id;
    
    echo '<script>
            
            window.location.href="portfolio.php";
            </script>';
}
if (isset($_POST['enquiry'])) {
    session_start();
    $timezone=ini_get('date.timezone');
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $lat_long=$_POST['lat_long'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    
    $sql_user="INSERT INTO `tbl_enquiry`(`f_name`, `l_name`, `email`, `phone`, `con_id`,`subject`, `message`,`geo_ip_address`,`geo_lat_long`,`geo_timezone`)
     VALUES ('$fname','$lname','$mail','$phone',$country,'$subject','$message','$ip_address','$lat_long','$timezone')";
    $res_user=mysqli_query($conn,$sql_user);
    $last_id = $conn->insert_id;
    foreach ($_SESSION["cart"] as $key => $value) {
        $products_ordered=$value["product_id"];
        $quantity=$value["item_quantity"];
        $sql_enq="INSERT INTO `tbl_enquiry_detail`(`enq_id`, `itemid`, `qty`)
         VALUES ($last_id,$products_ordered,$quantity)";
         $res_enq=mysqli_query($conn,$sql_enq);
    }
    
    foreach ($_SESSION["cart"] as $keys => $value){
            unset($_SESSION["cart"][$keys]);
        
    }
    $from="Retrofit.com";
    $to="info@retrofit.com";
    $subject="Order";
    $message="You Recieved An Order From ".$fname." ".$lname." Email ".$mail;
    $headers="From".$from;
    mail($to,$subject,$message,$headers);
   
    $from_client="Retrofit.com";
    $to_client="$mail";
    $subject_client="No Reply";
    $message_client="You Ordered on Our site. We will contact you soon. Admin!";
    $headers_client="From".$from;
    mail($to_client,$subject_client,$message_client,$headers_client);
    echo '<script>
    alert("Your Order Placed");
    window.location.href="index.php";
    </script>';

}//end of enquiry