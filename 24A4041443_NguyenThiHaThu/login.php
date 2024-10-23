<?php
    if(isset($_POST['btn'])){
        $username = $_POST['user']; 
        $pass = $_POST['pass']; 

        if(($username == '123') && ($pass == '123')){
            header("location:sanpham.php"); 
        }else{
            echo "<p style = 'color:red'>Tên tài khoản hoặc mật khẩu không đúng</p>"; 
        }
    }
?>
    <form method = "POST">
        Username: <input type = "text" name = "user">
        <br>
        <br>
        Password: <input type = "pass" name = "pass">
        <hr>
        <Button type = "submit" name = 'btn'> Đăng nhập</Button>
    </form>
