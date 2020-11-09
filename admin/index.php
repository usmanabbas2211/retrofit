<?php
// echo date("l jS \of F Y h:i:s A");

session_start();
$session_id=$_SESSION['admin'];

if (!isset($_SESSION['admin'])){
    header("location:login.php");
}

include('includes/header.php');
include('includes/navbar.php');

?>



    <div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-center">welcome Retrofit</h1>


    </div>


    
        </tbody>
    </table>









<?php
include('includes/scripts.php');

?>