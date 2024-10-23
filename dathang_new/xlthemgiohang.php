<?php
    session_start();
    include("connect.inp");
    $masp=$_POST['Masp'];
    $gia=$_POST['Gia'];
    $user=$_SESSION["user"];
        //Kiểm tra đã tồn tại giỏ hàng theo user chưa
    $sql_check="select * from dondathang where chedo=0 and nguoidathang='$user'";
    $result=$con->query($sql_check);  

    if($result->num_rows==0) //Chưa tồn tại giỏ hàng
    {
        //xác định hóa đơn mới khi trường sohoadon là kiểu số nguyên không tự động tăng
        $s_sohoadon="select max(sohoadon) as shd from dondathang";
        $result=$con->query($s_sohoadon);
        $row=$result->fetch_assoc();
        $sohoadon=$row["shd"]+1;
        //echo 'them đơn đặt hàng';
        $insert_dondathang="Insert into dondathang(sohoadon,nguoidathang,chedo) values($sohoadon,'$user',0)";
        $con->query($insert_dondathang);
        //lấy lại hóa đơn vừa thêm; cần lưu ý độ trên đồng bộ
       
    }
    else{
        $row=$result->fetch_assoc();
        $sohoadon=$row["sohoadon"];
    }
    
    
    //Thêm chi tiết đặt hàng ứng với đơn đặt hàng
    //if nếu sản phẩm đó trong giỏ hàng rồi thi không thêm nữa
    $insert_chitietdathang="Insert into chitietdathang(sohoadon,mahang,giaban,soluong) 
    values($sohoadon,'$masp',$gia,1)";
    //echo $insert_chitietdathang;
    if( $con->query($insert_chitietdathang)==TRUE)
        echo "Thanh cong";
    else
        echo "Lỗi";

    header("location:giohang.php");

?>