<?php
include('includes/header.php');
include('includes/navbar.php');
include 'db.php';
$conn=connect();
if(isset($_GET['action'])){
    $client_id=$_GET['id'];
    $sql_del="DELETE FROM `tbl_enquiry` WHERE `enq_id`=$client_id";
    $res_del=mysqli_query($conn,$sql_del);
}
?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>


    </div>


    <table class="table table-responsive w-100">
        <thead class="thead-dark">
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Entry Time</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql_enq="SELECT * FROM `tbl_enquiry` ORDER BY `entry_time` DESC";
        $res_enq=mysqli_query($conn,$sql_enq);
        while ($row_enq=mysqli_fetch_assoc($res_enq)) {
            $enq_id=$row_enq['enq_id'];
            ?>
            <tr>
                <td><?php echo $row_enq['f_name'] ?></td>
                <td><?php echo $row_enq['l_name'] ?></td>
                <td><?php echo $row_enq['email'] ?></td>
                <td><?php echo $row_enq['phone'] ?></td>
                <td><?php echo $row_enq['con_id'] ?></td>
                <td><?php echo $row_enq['city_id'] ?></td>
                <td><?php echo $row_enq['subject'] ?></td>
                <td><?php echo $row_enq['message'] ?></td>
                <td><?php echo $row_enq['entry_time'] ?></td>
                <td><a class="btn btn-primary" href="order_details.php?enq_order_id=<?php echo $row_enq['enq_id'] ?>">View</a></td>
                <td><a class="btn btn-danger" href="other_orders.php?action=delete&id=<?php echo $row_enq['enq_id'] ?>">Delete</a></td>
            </tr>
            <?php
            }         
        ?>
        </tbody>
    </table>









<?php
include('includes/scripts.php');

?>