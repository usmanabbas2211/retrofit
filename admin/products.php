<?php
session_start();
if ($_SESSION['admin']!=1){
    header("location:login.php");
}
include('includes/header.php');
include('includes/navbar.php');
include 'db.php';
        $conn=connect();
        $sql_products="SELECT * FROM `products`";
        $res_products=mysqli_query($conn,$sql_products);

?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All products</h1>


    </div>


   <div class="row">
                <?php
                    while ($row_products=mysqli_fetch_assoc($res_products)) {
                ?>
                    <div class="col-md-3 mt-4 mr-5 col-sm-6">
                        <div class="card" style="">
                            <img class="card-img-top" src="<?php echo "../images/products/".$row_products['product_img'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_products['product_name']?></h5>
                                <!-- <p class="card-text">Details</p> -->
                                <a href="action.php?delete_product_id=<?php echo $row_products['product_id'] ?>" class="btn btn-primary">Delete</a>
                                <a href="editName.php?edit_product_id=<?php echo $row_products['product_id'] ?>" class="btn btn-primary">Edit Name</a>
                            </div>
                            </div>
                    </div>
                <?php        
                    }
                ?>
       
   </div>






<?php
include('includes/scripts.php');

?>