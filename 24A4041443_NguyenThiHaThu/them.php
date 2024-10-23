<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel = "stylesheet" href = "stylethem.css">
</head>

<!-- Xử lý thêm sản phẩm -->
<?php
    include "connect.php"; 
    if(isset($_POST['btn'])){
        // Lấy các trường
        $id = $_POST['ID']; 
        $name = $_POST['name']; 
        $img = $_FILES['img']['name']; 
        $img_file = $_FILES['img']['tmp_name']; 
        $des = $_POST['des']; 
        $price = $_POST['price']; 
        $cate = $_POST['cate']; 
        //Kiểm tra mã hàng đã có hay chưa
        $sqlcheck = "SELECT * from sanpham where Mahang = '$id'"; 
        $results = mysqli_query($con, $sqlcheck); 
        if(mysqli_num_rows($results) > 0){
            echo "<p style = 'color:red'>Mã hàng này đã tồn tại trong CSDL</p>"; 
        }
        else{
            $sql = "INSERT INTO sanpham (Mahang, Tenhang, Hinhanh, Mota, Giahang, Maloai) 
            VALUES ('$id', '$name', '$img', '$des', '$price', '$cate')"; 
            mysqli_query($con, $sql); 

            move_uploaded_file($img_file, "img/product/".$img); 
            
            header("location:sanpham.php?status=1");  
        }
    }
?>

<body>
    <!-- Form thêm -->
    <form action="them.php" method="POST" enctype="multipart/form-data">
        <h1>THÊM SẢN PHẨM</h1>
        <p>Mã hàng</p>
        <input type="text" name="ID" placeholder="Nhập mã hàng">
        <p>Tên hàng</p>
        <input type="text" name="name" placeholder="Nhập tên hàng">
        <p>Hình ảnh</p>
        <input type="file" name="img">
        <p>Mô tả</p>
        <input type="text" name="des" placeholder="Mô tả hàng hóa">
        <p>Giá hàng</p>
        <input type="text" name="price" placeholder="Nhập giá hàng">
        <p>Loại sản phẩm</p>
        <input type="text" name="cate" placeholder="Nhập loại sản phẩm">
        <hr>
        <button type="submit" name="btn">Thêm sản phẩm</button>
    </form>
    
        <!-- Các loại sản phẩm -->
        <table>
                <thead>
                    <th>Mã loại </th>
                    <th>Tên loại </th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from loaisp"; 
                    $result = mysqli_query($con, $sql); 
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <td><?php echo $row['Maloai']?></td>
                    <td><?php echo $row['Tenloai']?></td>
                </tbody>
                <?php
                    }
                    $con->close(); 
                ?>
        </table>
</body>
</html>


