<?php
function connect(){
    $connection = mysqli_connect('localhost', 'root', '', 'retrofit');
    if(!$connection){
        die('Failed to connect db');
    }
    return $connection;
}