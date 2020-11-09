<?php
session_start();
if(!isset($_SESSION["cart"])){
  echo '<script>window.location="products.php"</script>';
}
$i=0;
foreach ($_SESSION["cart"] as $keys => $value){
  $i++;

}
if($i==0){
  echo '<script>window.location="products.php"</script>';
}
include 'admin/db.php';
$conn=connect();
include 'cart.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Products Details - Retrofit Auto Industries</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
  <!-- font-awasome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
  include 'header.php';
   ?><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Products</li>
            <li>Cart</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  <main id="main">
<h1 class="text-center">Shopping Cart</h1>
   <div class="container ">
    
    <div class="row mt-4">
        <div class="col-md-6 ">
            <table style="width:100%;">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Delete</th>
                </tr>
                <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                      $item_id=$value["product_id"];
                      $sql_product="SELECT * FROM `tbl_items` WHERE `itemid`=$item_id";
                      $res_product=mysqli_query($conn,$sql_product);
                      $row_product=mysqli_fetch_assoc($res_product);

                      $sql_img="SELECT * FROM `tbl_items_img` WHERE `itemid`=$item_id";
                      $res_img=mysqli_query($conn,$sql_img);
                      $row_img=mysqli_fetch_assoc($res_img);
                        ?>
                        <tr>
                            <td style="width:33%;"><img class="card-img-top" src="admin\img\<?php echo $row_img['img_url'] ?>" alt="Card image cap"></td>

                            <td>
                              <form action="cart-details.php" method="post">
                                <input type="number" min="1"  name="quantity"  value="<?php echo $value["item_quantity"]; ?>">
                                <input type="hidden" name="product_id"  value="<?php echo $value["product_id"]; ?>">
                                <input type="submit"  class="btn btn-xs btn btn-warning" name="update_q" value="update">
                              </form>
                            </td>
                            <td><a class="fa fa-trash" href="cart-details.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger "></span></a></td>

                        </tr>
                        <?php
                       
                    }
                        ?>
                       
                        <?php
                    }
                ?>
                <tr>
                </tr>
                
            </table>
                    <div class="text-center">
                      <a href="cart-details.php?empty"  class="btn btn-danger text-white ">Empty Cart</a>
                    </div>
        </div>
        <!-- end of col-md-6 -->
        <div class="col-md-6  ">
          <form action="action.php" method="post">
                    <input type="hidden" id="lat_long" name="lat_long" value="">
              <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" >
                  <span name="" id="fname-span" class="text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" >
                  <span name="" id="lname-span" class="text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" name="mail" id="mail" class="form-control" placeholder="Email" >
                  <span name="" id="mail-span" class="text-danger"></span>
              </div>
              <div class="form-group">
                  <label for="">Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Phone" >
              </div>
              <div class="form-group">
                  <label for="">Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Subject" >
              </div>
              <div class="form-group">
                  <label for="">Message</label>
                  <input type="text" name="message" class="form-control" placeholder="Message" >
              </div>
              <div class="form-group">
                  <label for="">Country</label>
                  <select name="country" id="country" class="form-control" required>
                  <option value="0">Choose...</option>
                  <?php
                      $sql_countries="SELECT * FROM `tbl_countries`";
                      $res_countries=mysqli_query($conn,$sql_countries);
                      while($row_countries=mysqli_fetch_assoc($res_countries)){                ?>
                      <option value="<?php echo $row_countries['con_id'] ?>"><?php echo $row_countries['con_name']?></option>
                  <?php        
                      }
                  ?>
              
                  </select>
                  
              </div>
              <div class="form-group">
                  <label for="">City</label>
                  <input type="text" name="city" class="form-control" placeholder="City" >
              </div>
              <div class="form-group">
                  <input type="submit" onclick="return validate();" name="enquiry" class="btn btn-danger mt-3 offset-md-10">
              </div>
          </form>
     </div>
    </div>
   </div>

   <!-- end row products-->
   <div class="row">
     
   </div>
   <!-- row form end -->
       
        
  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script>
        document.getElementById("fname").addEventListener("click", function() {
		    document.getElementById("fname-span").innerHTML = "";
		    });
        document.getElementById("lname").addEventListener("click", function() {
		    document.getElementById("lname-span").innerHTML = "";
		    });
        document.getElementById("mail").addEventListener("click", function() {
		    document.getElementById("mail-span").innerHTML = "";
		    });
        function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        function showPosition(position) {
          document.getElementById("lat_long").value = position.coords.latitude + 
          "," + position.coords.longitude;
        }
        getLocation();
    function validate(){
      var mail=document.getElementById('mail').value;
      var fname=document.getElementById('fname').value;
      var lname=document.getElementById('lname').value;
      var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
      if(fname==''){
        document.getElementById('fname-span').innerHTML='Please enter your first name';        
         return false;
      }
      if(lname==''){
        document.getElementById('lname-span').innerHTML='Please enter your first name';        
         return false;
      }
      if(mail==''){
        document.getElementById('mail-span').innerHTML='Enter your Email';        
         return false;
      }
      if(!regex.test(mail))
            {
              document.getElementById('mail-span').innerHTML='Use a valid Email';
                
                return false;
       }
      
       
    }
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>