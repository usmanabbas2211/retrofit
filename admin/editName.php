<?php
session_start();
if ($_SESSION['admin']!="afaq"){
    header("location:login.php");
}
include('includes/header.php');
include('includes/navbar.php');

include 'db.php';
$conn=connect();
if (isset($_GET['edit_product_id'])){
    $id=$_GET['edit_product_id'];
    $sql_product="SELECT * FROM `products` WHERE `product_id`=$id";
    $res_products=mysqli_query($conn,$sql_product);
    //to delete file permanently
   
}
        

?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit a product Name</h1>


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
                                <p class="card-text">Enter New Name</p>
                                <form action="action.php" method="post">
                                    <input type="hidden"  name="product_id" value="<?php echo $row_products['product_id'] ?>">
                                    <input type="text" name="name" class="form-control">
                                    <input type="submit" class="btn btn-primary mt-2" value="change" name="edit_name"onclick="return validate();" id="">
                                </form>
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
<script>
    
</script>
