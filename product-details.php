<?php
session_start();
include 'admin/db.php';
include 'cart.php';
$conn=connect();
if(isset($_GET['detail_itemid'])){
  $itemid= $_GET['detail_itemid'];
  $sql_item="SELECT * FROM `tbl_items` WHERE `itemid`=$itemid";
  $res_item=mysqli_query($conn,$sql_item);
  $row_item=mysqli_fetch_assoc($res_item);

  $sql_img="SELECT * FROM `tbl_items_img` WHERE `itemid`=$itemid";
  $res_img=mysqli_query($conn,$sql_img);
  $row_img=mysqli_fetch_assoc($res_img);

  $warranty_id=$row_item['warranty_id'];
  $sql_warranty="SELECT * FROM `tbl_warranty` WHERE `warranty_id`=$warranty_id";
  $res_warranty=mysqli_query($conn,$sql_warranty);
  $row_warranty=mysqli_fetch_assoc($res_warranty);

  $mat_id=$row_item['mat_id'];
  $sql_mat="SELECT * FROM `tbl_material` WHERE `mat_id`=$mat_id";
  $res_mat=mysqli_query($conn,$sql_mat);
  $row_mat=mysqli_fetch_assoc($res_mat);

  $location_id=$row_item['location_id'];
  $sql_location="SELECT * FROM `tbl_locations` WHERE `location_id`=$location_id";
  $res_location=mysqli_query($conn,$sql_location);
  $row_location=mysqli_fetch_assoc($res_location);
}
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
            <li>Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
       
        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title"><?php echo $row_item['item_name'] ?></h2>
            <div class="owl-carousel portfolio-details-carousel">
            <img class="img-fluid" src="admin\img\<?php echo $row_img['img_url'] ?>" alt="Card image cap">
            <img class="img-fluid" src="admin\img\<?php echo $row_img['img_url'] ?>" alt="Card image cap">
            <img class="img-fluid" src="admin\img\<?php echo $row_img['img_url'] ?>" alt="Card image cap">
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Product information</h3>
            <ul>
              <li><strong>Warranty</strong>: <?php echo $row_warranty['description'] ?></li>
              <li><strong>Location</strong>: <?php echo $row_location['location_name'] ?></li>
              <li><strong>Material</strong>: <?php echo $row_mat['material_name'] ?></li>
              <li><strong>Full Length</strong>: <?php $row_item['full_length_in'] ?> inch</li>
              <li><strong>Shaft Length</strong>: <?php echo $row_item['shaft_length_in'] ?> inch</li>
              <li><strong>Spline Count</strong>: <?php echo $row_item['spline_count'] ?> </li>
              <li><strong>Wheel Stud Hole Diameter</strong>: <?php echo $row_item['wheel_stud_hole_dia_in'] ?> inch</li>
              <li><strong>Full Length</strong>: <?php echo $row_item['full_length_mm'] ?> mm</li>
              <li><strong>Shaft Length</strong>: <?php echo $row_item['shaft_length_mm'] ?> mm</li>
              <li><strong>Product URL</strong>: <a href="#">www.example.com</a></li>
            </ul>

            <p>
              <?php echo $row_item['description'] ?>
            </p>
            <form class="d-inline float-right " style="margin-top:-8px" action="product-details.php?action=add&id=<?php echo $itemid; ?>" method="POST">
              <input type="hidden" name="product_id" value="<?php echo $itemid ?>">
              <input type="hidden" name="quantity" class="form-control" value="1">
              <input type="submit" class="cart btn btn-danger btn-block mt-5" name="add" value="Add To Cart">
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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