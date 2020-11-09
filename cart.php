<?php
if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_quantity' => $_POST["quantity"],
            );
            
                $_SESSION["cart"][$count] = $item_array;
            
            echo '<script>window.location="products.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="products.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
  }
  
  if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                
                $_SESSION["delete"] = "yes";
                // echo count($_SESSION["cart"]);
                // die();
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="cart-details.php"</script>';
            }
        }
    }
  }
  if(isset($_POST['update_q'])){
    $quantity=$_POST['quantity'];
    $product_id=$_POST['product_id'];
    
      foreach ($_SESSION["cart"] as $keys => $value){
          if ($value["product_id"] == $_POST["product_id"]){
             $_SESSION["cart"][$keys]["item_quantity"]=$quantity;
             echo '<script>window.location="cart-details.php"</script>';
          }
      }
  
  }
  if(isset($_GET['empty'])){
    foreach ($_SESSION["cart"] as $keys => $value){
        unset($_SESSION["cart"][$keys]);
    
    }
    echo '<script>window.location="cart-details.php"</script>';
  }