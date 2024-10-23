<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "contest1"; 

$con = new mysqli($host, $user, $pass, $dbname); 

if(!$con){
    echo "Lỗi kết nối".$con->connect_error; 
}
?>