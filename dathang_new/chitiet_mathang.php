<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="margin-left:30%">
    <H3>Hiển thị thông tin sản phẩm chọn</H3>

    <?php
        session_start();
        include("connect.inp");
        $masp=$_GET["Masp"];
        $sql="SELECT * FROM sanpham where mahang='$masp'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        echo "<form method='POST' action='xlThemgiohang.php'>";
        echo "Masp: {$row['mahang']} <br><input type='hidden' name='Masp' value='{$row['mahang']}'>";
        echo "Tensp: {$row['tenhang']} <br>";
        echo "Gia: {$row['giahang']} <br><input type='hidden' name='Gia' value='{$row['giahang']}'>";
        if (isset($_SESSION["user"]))
            {
                echo "<input type='submit' value='Đưa vào giỏ hàng'>";
            }
        echo"</form">
        $con->close();

    ?>
    </div>
</body>
</html>