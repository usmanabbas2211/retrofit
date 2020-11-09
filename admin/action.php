<?php
include 'db.php';
$conn=connect();
if (isset($_POST['add_category'])) {
           $category = $_POST['category'];
           $sql = "INSERT INTO `tbl_category`(`category`) VALUES ('$category')";
            $res1 = mysqli_query($conn, $sql);
            if($res1){
                echo '<script>
            alert("Category Added ");
            window.location.href="add_category.php";
            </script>';

            }
}
    
//end of add category

if (isset($_POST['login_btn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql_user="SELECT * FROM `tbl_user` WHERE `password`=$password && `username`='$username'";
    $res_user=mysqli_query($conn,$sql_user);
    $row_user=mysqli_fetch_assoc($res_user);
    
    if($row_user){
        session_start();
        $user=$row_user['userid'];
        $_SESSION["admin"]="$user";
        echo '<script>
       
        window.location.href="index.php";
        </script>';
    }
    else{
        echo '<script>
            alert("Incorrect Email Or Password");
            window.location.href="login.php";
            </script>';
    }
    

}

if (isset($_GET['delete_product_id'])){
    $id=$_GET['delete_product_id'];
    $sql="DELETE FROM `products` WHERE `product_id`=$id";
    $res=mysqli_query($conn,$sql);
    //to delete file permanently
    $sql_delete="SELECT * FROM `products` WHERE `product_id`=$id";
    $res_delete=mysqli_query($conn,$sql_delete);
    while ($row_delete=mysqli_fetch_assoc($res_delete)){
        unlink('../images/products/'.$row_delete['product_img']);
    };
    
    
    echo '<script>
            alert("Product Deleted ");
            window.location.href="products.php";
            </script>';

}
if (isset($_POST['add_make'])) {
            $make = $_POST['make'];
            $category=$_POST['category'];
            $sql = "INSERT INTO `tbl_make`( `catid`, `make_name`) VALUES ($category,'$make')";
            $res1 = mysqli_query($conn, $sql);

            echo '<script>
            alert("Make Added ");
            window.location.href="add_make.php";
            </script>';

}//end of add_make

if (isset($_POST['add_feature'])) {
    $item_id=$_POST['category'];
    $feature=$_POST['feature'];
    $sql = "INSERT INTO `tbl_items_feature`( `itemid`, `description`) VALUES ($item_id,'$feature')";
    $res1 = mysqli_query($conn, $sql);

    echo '<script>
    alert("Feature Added");
    window.location.href="add_feature.php";
    </script>';

}//end of add_feature
if (isset($_POST['add_specs'])) {
    $item_id=$_POST['category'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $sql = "INSERT INTO `tbl_items_specs`(`itemid`, `title`, `description`) VALUES ($item_id,'$title','$description')";
    $res1 = mysqli_query($conn, $sql);

    echo '<script>
    alert("Specification Added");
    window.location.href="add_specs.php";
    </script>';

}//end of add_specs
if (isset($_POST['add_model'])) {
    $model = $_POST['model'];
    $make=$_POST['category'];
    $sql = "INSERT INTO `tbl_model`( `make_id`, `model_name`) VALUES ($make,'$model')";
    $res1 = mysqli_query($conn, $sql);

    echo '<script>
    alert("Model Added ");
    window.location.href="add_model.php";
    </script>';

}//end of add_model
if (isset($_POST['add_model_year'])) {
    $year = $_POST['year'];
    $model=$_POST['category'];
    $sql = "INSERT INTO `tbl_model_year`( `model_id`, `year`) VALUES ($model,$year)";
    $res1 = mysqli_query($conn, $sql);

    echo '<script>
    alert("Model Year Added ");
    window.location.href="add_model_year.php";
    </script>';

}//end of add_model
if (isset($_POST['add_warranty'])) {
    $warranty = $_POST['warranty'];
    
    $sql = "INSERT INTO `tbl_warranty`(`description`) VALUES ('$warranty')";
    $res1 = mysqli_query($conn, $sql);

    echo '<script>
    alert("Warranty Added ");
    window.location.href="add_warranty.php";
    </script>';

}//end of add_warranty
if (isset($_POST['add_item'])) {
   $article=$_POST['article'];
   $name=$_POST['name'];
   $description=$_POST['description'];
   $warranty=$_POST['warranty'];
   $admin=$_POST['admin'];
   $mat_id=$_POST['material'];
   $full_length=$_POST['full_length'];
   $shaft_length=$_POST['shaft_length'];
   $spline_count=$_POST['spline_count'];
   $wheel_stud=$_POST['wheel_stud'];
   $full_length_mm=$_POST['full_length_mm'];
   $shaft_length_mm=$_POST['shaft_length_mm'];
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'] / 1024 / 1024;
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $filename);
    $fileActulExt = strtolower(end($fileExt));

    $allowed = array('jpeg', 'jpg', 'png');

    if (in_array($fileActulExt, $allowed)) {
        if ($fileError === 0) {

            $fileNameNew = uniqid('', true) . "." . $fileActulExt;
            $fileDestinatioin = 'img/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatioin);

            


            $sql = "INSERT INTO `tbl_items`( `article_num`, `item_name`, `description`, `warranty_id` ,`entry_time`,`entry_byid` ,`edit_time`,`edit_byid`,`mat_id`,`full_length_in`, `shaft_length_in`, `spline_count`, `wheel_stud_hole_dia_in`, `full_length_mm`, `shaft_length_mm`) 
            VALUES ($article,'$name','$description',$warranty,NOW(),$admin,NOW(),$admin,$mat_id,$full_length,$shaft_length,$spline_count,$wheel_stud,$full_length_mm,$shaft_length_mm)";
            $res1 = mysqli_query($conn, $sql);

            $last_id = $conn->insert_id;
            $sql_image_url="INSERT INTO `tbl_items_img`(`itemid`, `img_url`) VALUES ($last_id,'$fileNameNew')";
            $res2=mysqli_query($conn,$sql_image_url);

            if($res1&&$res2){
                $sql_item="";
                echo '<script>
                alert("Item Added ");
                window.location.href="add_item.php";
                </script>';
            }

         }
     }
}//end of add_user
if(isset($_POST['edit_name'])){
    $product_id=$_POST['product_id'];
    $new_name=$_POST['name'];
    $sql_update="UPDATE `products` SET `product_name`='$new_name' WHERE `product_id`=$product_id";
    $res_update=mysqli_query($conn,$sql_update);
    if($res_update){
        echo '<script>
            alert("Name Changed ");
            window.location.href="products.php";
            </script>';
    }
}
if(isset($_POST['add_to_cart'])){
    $product_id=$_POST['product_id'];
    dd($product_id);
}