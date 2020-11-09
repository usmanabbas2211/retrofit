<?php
include 'db.php';
$conn=connect();
if(isset($_GET['enq_order_id'])){
    $enq_id=$_GET['enq_order_id'];
}
if(isset($_GET["action"])){
    $enq_det_id= $_GET['id'];

    $sql_enq="SELECT * FROM `tbl_enquiry_detail` WHERE `enq_det_id`=$enq_det_id";
    $res_enq=mysqli_query($conn,$sql_enq);
    $row=mysqli_fetch_assoc($res_enq);
    $enq_id=$row['enq_id'];

    $sql_del="DELETE FROM `tbl_enquiry_detail` WHERE `enq_det_id`=$enq_det_id";
    $res_del=mysqli_query($conn,$sql_del);

}
include('includes/header.php');
include('includes/navbar.php');
?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>


    </div>


    <table class="table table-responsive w-100">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Image</th>
            <th scope="col">Quantity</th>
            <th scope="col">Warranty</th>
            <th scope="col">Material</th>
            <th scope="col">Location</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql_enq_det="SELECT * FROM `tbl_enquiry_detail` WHERE `enq_id`=$enq_id";
        $res_enq_det=mysqli_query($conn,$sql_enq_det);
        while ($row_enq_det=mysqli_fetch_assoc($res_enq_det)) {
            $itemid=$row_enq_det['itemid'];
           
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
            ?>
            <tr>
                <td><?php echo $row_item['item_name'] ?></td>
                <td style="width:13%"><img class="img-fluid" src="img\<?php echo $row_img['img_url'] ?>" alt="image cap"></td>
                <td><?php echo $row_enq_det['qty'] ?></td>
                <td><?php echo $row_warranty['description'] ?></td>
                <td><?php echo $row_mat['material_name'] ?></td>
                <td><?php echo $row_location['location_name'] ?></td>
                
                <td><a class="btn btn-danger" href="order_details.php?action=delete&id=<?php echo $row_enq_det['enq_det_id'] ?>">Delete</a></td>
            </tr>
            <?php
            }         
        ?>
        </tbody>
    </table>









<?php
include('includes/scripts.php');

?>