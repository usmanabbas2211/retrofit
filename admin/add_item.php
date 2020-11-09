<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("location:login.php");
}
include('includes/header.php');
include('includes/navbar.php');

include 'db.php';
        $conn=connect();
        $sql_categories="SELECT * FROM `categories`";
        $res_categories=mysqli_query($conn,$sql_categories);

        $sql_warranty="SELECT * FROM `tbl_warranty`";
        $res_warranty=mysqli_query($conn,$sql_warranty);

        $sql_material="SELECT * FROM `tbl_material`";
        $res_material=mysqli_query($conn,$sql_material);
?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add An Item</h1>


    </div>
<div class="row">
<div class="col-md-8">
    <form method="post" action="action.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Article Number</label>
            <input type="number"  class="form-control" name="article" id="article" placeholder="article" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Item Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-8">
                <label for="inputState">Choose Warranty</label>
                <select name="warranty" id="warranty" class="form-control" required>
                <option value="0">Choose...</option>
                <?php
                    while ($row_warranty=mysqli_fetch_assoc($res_warranty)) {
                ?>
                    <option value="<?php echo $row_warranty['warranty_id'] ?>"><?php echo $row_warranty['description']?></option>
                <?php        
                    }
                ?>
            
            </select>
            </div>
        </div> 
        <div class="form-row">
            
            <div class="form-group col-md-8">
                <label for="inputState">Choose Material</label>
                <select name="material" id="material" class="form-control" required>
                <option value="0">Choose...</option>
                <?php
                    while ($row_material=mysqli_fetch_assoc($res_material)) {
                ?>
                    <option value="<?php echo $row_material['mat_id'] ?>"><?php echo $row_material['material_name']?></option>
                <?php        
                    }
                ?>
            
            </select>
            </div>
        </div> 
        <input type="hidden" name="admin" value="<?php echo $_SESSION['admin']?>">      
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Full Length</label>
            <input type="number" class="form-control" name="full_length" id="full_length" placeholder="inches" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Shaft Length</label>
            <input type="number" class="form-control" name="shaft_length" id="shaft_length" placeholder="inches" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Spline Count</label>
            <input type="number" class="form-control" name="spline_count" id="spline_count" placeholder="Spline" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Wheel Stud Hole Diameter</label>
            <input type="number" class="form-control" name="wheel_stud" id="wheel_stud" placeholder="Diameter" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Full Length</label>
            <input type="number" class="form-control" name="full_length_mm" id="full_length" placeholder="mm" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Shaft Length</label>
            <input type="number" class="form-control" name="shaft_length_mm" id="shaft_length" placeholder="mm" required>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-8">
            <label for="">Image</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        </div>
        
        <button type="submit" onclick="return validate()" name="add_item" class="btn btn-primary mt-5 ml-5">Add item</button>
    </form>
        
        
</div>
</div>
<?php
include('includes/scripts.php');

?>
<script>
function validate(){
    var warranty= document.querySelector('#warranty').value
    var material= document.querySelector('#material').value
    if(warranty==0){
        alert('Please select some warranty');
        return false
    }
    if(material==0){
        alert('Please select some material');
        return false
    }

    
}  
</script>