<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
echo $user.$pass;
if($user=="admin" && $pass=="123"){
    session_start();
    $_SESSION["user"]=$user;
    $_SESSION["permiss"]=1;
    header("location:home.php");
}
if($user=="K25" && $pass=="123"){
    session_start();
    $_SESSION["user"]=$user;
    $_SESSION["permiss"]=2;
    header("location:home.php");
}
#header("location:login.php");

?>