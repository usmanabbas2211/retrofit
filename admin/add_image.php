<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("location:login.php");
}
include('includes/header.php');
include('includes/navbar.php');

include 'db.php';
        $conn=connect();
        $sql_categories="SELECT * FROM `tbl_items`";
        $res_categories=mysqli_query($conn,$sql_categories);
        

?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add items images</h1>


    </div>
<div class="row">
<div class="col-md-8">
<form method="post" action="action.php" enctype="multipart/form-data">
       
        
        <div class="form-row">
            
            <div class="form-group col-md-8">
                <label for="inputState">Choose Category</label>
                <select name="category" id="category" class="form-control" required>
                <option value="0">Choose...</option>
                <?php
                    while ($row_categories=mysqli_fetch_assoc($res_categories)) {
                ?>
                    <option value="<?php echo $row_categories['itemid'] ?>"><?php echo $row_categories['item_name']?></option>
                <?php        
                    }
                ?>
            
            </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Add Image</label>
            <input type="file" class="form-control" name="file"  required>
            </div>
        </div>
        
        <button type="submit" onclick="return validate()" name="add_image" class="btn btn-primary mt-5 ml-5">Add Image</button>
    </form>    
        
<?php
include('includes/scripts.php');

?>
<script>
function validate(){
    var select= document.querySelector('#category').value
    if(select==0){
        alert('Please select some category');
        return false
    }
    
}
</script>


