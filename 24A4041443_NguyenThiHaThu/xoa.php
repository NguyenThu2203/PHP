<?php
    include "connect.php"; 
    
    $id = $_GET['id']; 
    $sql = "DELETE FROM sanpham Where Mahang = '$id'"; 

    mysqli_query($con, $sql); 
    header("location:sanpham.php"); 
    $con->close(); 
    
?>