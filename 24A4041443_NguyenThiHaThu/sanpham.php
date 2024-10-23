<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<script>
    function kiemtraxoa(){
        return confirm("Bạn có muốn xóa sản phẩm này không?"); 
    }
</script>
<body>
    <h1>Môn kiểm tra: Lập trình web với PHP</h1>
    <p>Họ và tên học viên: Nguyễn Thị Hà Thu</p>
    <p>Ca: Thứ 5 ca 3</p>
    <hr>

    <!-- Bảng loại sản phẩm -->
     <div class="container">
        <div class="category">
            <table>
                <thead>
                    <th>Danh mục loại sản phẩm</th>
                </thead>
                <tbody>
                    <?php
                    include "connect.php"; 

                    $sql = "SELECT * from loaisp"; 
                    $result = mysqli_query($con, $sql); 
                    $row = mysqli_fetch_array($result); 

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <td><a href="#"><?php echo $row['Tenloai']?></a></td>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="product">
            <!-- Bảng hiển thị các sản phẩm -->
            <table>
                <thead>
                    <th>STT</th>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Hình ảnh</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * from sanpham"; 
                    $results = mysqli_query($con, $sql);
                    $i = 0; 

                    while($row = mysqli_fetch_array($results)){

                    ?>
                    <td><?php echo $i = $i + 1; ?></td>
                    <td><?php echo $row['Mahang'] ?></td>
                    <td><?php echo $row['Tenhang']?></td>
                    <td><img src="img/product/<?php echo $row['Hinhanh']?>" alt="hinhanh" width="100px" height="100px"></td>
                    <td><a href="#">Xem chi tiết</a></td>
                    <td><?php echo"<a href='xoa.php?id={$row['Mahang']}' onclick = kiemtraxoa()>"?>Xóa</a></td>
                    <td><?php echo"<a href='sua.php?id={$row['Mahang']}'>"?>Sửa</a></td>
                </tbody>
                <?php
                    }
                ?>
            </table>  
        </div>    
    </div>            
    <div class ="themsp">
        <a  href="them.php">Thêm sản phẩm</a>
    </div>
</body>
</html>