<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:70%;
            margin-left:15%;
        }
        table,tr,td{
            border:1px solid;
        }
    </style>
</head>

<body>
    <script>
        function tinhtien(){
            var gia=document.getElementById("gia").innerHTML();
            var soluong=document.getElementById("soluong").innerHTML();
            document.getElementById("gia").innerHTML(gia*soluong);
        }
    </script>
    <?php
        include("connect.inp");
        session_start();
        $user='admin';
        if (isset($_SESSION["user"]))
            $user=$_SESSION["user"];
        
        //Xây dựng câu lệnh truy vấn lấy dữ liệu chi tiết đặt hàng
        $sql="SELECT chitietdathang.sohoadon,chitietdathang.mahang,tenhang,hinhanh,giaban,chitietdathang.soluong FROM sanpham inner join chitietdathang on sanpham.mahang=chitietdathang.mahang
        inner join dondathang on 
        dondathang.sohoadon=chitietdathang.sohoadon
         WHERE chedo=0 and nguoidathang='$user' ";
        echo $sql;
        //thực thi sql
        $result=$con->query($sql);
        //Đọc duyệt kết quả
        if($result->num_rows>0){
            //tạo một bảng
            //echo "Mã giỏ hàng: {$row['Sohoadon']} <br>";
            echo "<form action='xldathang.php' method='post' >";
            echo"<table><tr><td>STT</td><td>Mã hàng</td><td> 
            Tên hàng</td><td>Hình ảnh</td><td>Số lượng </td> <td> Giá bán</td><td>Thành tiền
            </td><td>Xóa</td></tr>"; 
            $i=1;    
            while($row=$result->fetch_assoc())
            {
                echo "<tr>
                <td>$i</td>
                <td >{$row['mahang']}<input type='hidden' value='{$row['mahang']}' name='mahang$i'></td>
                <td>{$row['tenhang']}</td>
                <td>{$row['hinhanh']} </td>
                <td id='soluong'>
                <input type='number' value='1' name='soluong$i' onchange='tinhtien();'></td> 
                <td id='gia'>{$row['giaban']}
                </td>
                <td id='thanhtien'></td>
                <td><a href='xoaLoai.php?mahang={$row['mahang']}&sohoadon={$row['sohoadon']}'>Xóa</a></td></tr>";
                 $i=$i+1;
            } 
            echo "</table>"; 
            echo "<input type='hidden' value='$i' name='slmahang'>";
   
        }//if đúng
        
        $con->close();
    ?>
    <div id="dathang" style="margin-left:20%">
    <H3> Thông tin giao hàng </H3>
    Người nhận hàng:<input type="text" value="" name="nguoinhan"><br>
    Địa chỉ nhận hàng:<input type="text" value="" name="diachi"><br>
    Số điện thoại liên hệ:<input type="text" value="" name="sodt"><br>
    <input type='submit' value ='Đặt hàng'>
    </div>
    </form>
</body>
</html>