<?php
    include "connect.php"; 

    $id = $_GET['id']; 
    $sql = "SELECT * FROM sanpham where Mahang = '$id'"; 

    $results = mysqli_query($con, $sql); 
    $row = mysqli_fetch_assoc($results); 
    if(isset($_POST['btn'])){
        $tenhang = $_POST['name']; 

        $img_name = $_FILES['img']['name']; 
        $img_file = $_FILES['img']['tmp_name'];
         
        move_uploaded_file($img_file, "img/product/".$img_name); 

        $sql = "UPDATE sanpham SET Tenhang = '$tenhang', Hinhanh = '$img_name'
                WHERE Mahang = '$id'"; 
        mysqli_query($con, $sql); 
        
        header("location:sanpham.php"); 

    }
?>

<h1>Chỉnh sửa sản phẩm: <?php echo $row['Mahang']?></h1>
<form method= 'POST' enctype="multipart/form-data" >
    <p><b>Tên hàng</b></p>
    <input type="text" name = 'name' value = '<?php echo $row['Tenhang'] ?>'>
    <p><b>Hình ảnh</b></p>
    <span><img width="200px" height="200px"  src = "img/product/<?php echo $row['Hinhanh']?>"></span>
    <br>
    <input type="file" name = "img">
    <br>
    <br>
    <button name = "btn" type = "submit"> Chỉnh sửa</button>
   
</form>

