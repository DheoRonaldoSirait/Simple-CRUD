<?php 
$con = mysqli_connect("localhost", "root","","crud");

if(!$con){
    die('connection fail'.mysqli_connect_error());
}

?>