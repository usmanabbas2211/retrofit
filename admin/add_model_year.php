<?php
session_start();
if (!isset($_SESSION['admin'])){
    header("location:login.php");
}
include('includes/header.php');
include('includes/navbar.php');

include 'db.php';
        $conn=connect();
        $sql_categories="SELECT * FROM `tbl_model`";
        $res_categories=mysqli_query($conn,$sql_categories);?>
   <div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Model Year</h1>
    </div>
<div class="row">
<div class="col-md-8">
<form method="post" action="action.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-8">
            <label for="inputEmail4">Model Year</label>
            <input type="number" class="form-control" name="year" id="year" placeholder="Year...(1990)">
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-8">
                <label for="inputState">Choose Make</label>
                <select name="category" id="category" class="form-control">
                <option selected value="0">Choose...</option>
                <?php
                    while ($row_categories=mysqli_fetch_assoc($res_categories)) {
                ?>
                    <option value="<?php echo $row_categories['model_id'] ?>"><?php echo $row_categories['model_name']?></option>
                <?php        
                    }
                ?>
            
            </select>
            </div>
        </div>
        
        <button type="submit" onclick="return validate()" name="add_model_year" class="btn btn-primary mt-5 ml-5">Add Model</button>
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

