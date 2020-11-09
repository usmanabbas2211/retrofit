<?php

session_start();
include 'admin/db.php';
$conn=connect();
include 'cart.php';
$key=$_POST['search'];
    $sql_products="SELECT * FROM `tbl_items` WHERE `item_name` LIKE '%".$key."%'";
    $res_products=mysqli_query($conn,$sql_products);
    $row=mysqli_num_rows($res_products);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Products - Retrofit Auto Industries</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
  <!-- custom -->
  <link href="assets/css/custom.css" rel="stylesheet">

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
        <?php if($row){ ?>
            <h2>Results Found</h2>
        <?php }else{ ?>
            <h2>No Results Found</h2>
        <?php } ?>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Products</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Products List ======= -->

<section class="products">
  <div class="container">
  
  <div class="row products">
  <?php
    while ($row_products=mysqli_fetch_assoc($res_products)){
      $product_id=$row_products['itemid'];
      $sql_img="SELECT * FROM `tbl_items_img` WHERE `itemid`=$product_id";
      $res_img=mysqli_query($conn,$sql_img);
      $row_img=mysqli_fetch_assoc($res_img)
      ?>
      
      <div class="col-md-3 item car mt-1">
        <div class="card shadow-sm mt-2" >
        <a href="product-details.php?detail_itemid=<?php echo $row_products['itemid'] ?>" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Product Details">
        <img class="card-img-top" src="admin\img\<?php echo $row_img['img_url'] ?>" alt="Card image cap">
        </a>
          
          <div class="card-body">
            <h5 class="card-title"><?php echo $row_products['item_name'] ?></h5>
            <span class="card-text">$600</span>
            <!-- <a href="portfolio-details.php" class="card-link ml-3">Details</a> -->
            <form class="d-inline float-right " style="margin-top:-8px" action="products.php?action=add&id=<?php echo $product_id; ?>" method="POST">
              <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
              <input type="hidden" name="quantity" class="form-control" value="1">
              <input type="submit" class="btn cart btn-danger" name="add" value="Add To Cart">
            </form>
          </div>
        </div>
      </div>
      <!-- col-md-3 -->
      <?php
    };
  ?>
    </div>
    <!-- row -->
   
       
  <!-- container -->
</section>

<!-- ======= End Products List ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php 
 include 'footer.php';
  ?><!-- End Footer -->

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

  <!-- List Grid -->
  <script src="assets/js/custom.js"></script>
  <script>
    // $(".cart").click(function(event){
    // event.preventDefault();
    // });
  </script>
</body>

</html>