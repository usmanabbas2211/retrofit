<!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <!-- <h1 class="logo"><a href="index.php">Retrofit Auto Industries</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="assets/img/logo11.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){
            ?>
            <li class="active"><a href="index.php">Home</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="index.php">Home</a></li>
            <?php
          }?>
          <?php if(basename($_SERVER['PHP_SELF'])=='about.php'){
            ?>
            <li class="active"><a  href="about.php">About</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="about.php">About</a></li>
            <?php
          }?>

          <?php if(basename($_SERVER['PHP_SELF'])=='services.php'){
            ?>
            <li class="active"><a  href="services.php">Services</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="services.php">Services</a></li>
            <?php
          }?>

          <?php if(basename($_SERVER['PHP_SELF'])=='products.php'){
            ?>
            <li class="active"><a  href="products.php">Products</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="products.php">Products</a></li>
            <?php
          }?>
            
          <?php if(basename($_SERVER['PHP_SELF'])=='blog.php'){
          ?>
          <li class="active"><a  href="blog.php">Blog</a></li>
          <?php
          }else{ ?>
            <li class=""><a href="blog.php">Blog</a></li>
            <?php
          }?>

          <?php if(basename($_SERVER['PHP_SELF'])=='gallery.php'){
            ?>
            <li class="active"><a  href="gallery.php">Gallery</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="gallery.php">Gallery</a></li>
            <?php
          }?>

          <?php if(basename($_SERVER['PHP_SELF'])=='contact.php'){
            ?>
            <li class="active"><a  href="contact.php">contact</a></li>
            <?php
          }else{ ?>
            <li class=""><a href="contact.php">contact</a></li>
            <?php
          }?>
        </ul>

      </nav><!-- .nav-menu -->
      <a href="cart-details.php">
      <i class="fa fa-shopping-cart fa-2x ml-3"></i>
      <span class="ml-2 text-danger"><?php 
        if(!isset($_SESSION["cart"])){
          echo 0;
        }else{
          echo count($_SESSION["cart"]);
        }
        
      ?></span>
      </a>
      <a href="#" class="get-started-btn ml-auto">+92 300 7425673</a>
      

    </div>
  </header><!-- End Header -->
