<?php
    include("../db/connect.php");

    $user_Location_client = $_GET['userLocation'];
    $user_Phone_client = $_GET['userPhone'];
    $user_Name_client = $_GET['userName'];
    $bill_Staff = $_GET['billStaff'];
    $bill_Total = $_GET['billTotal'];
    $bill_Order_Date = $_GET['orderDate'];
    $bill_Delivery_Date = $_GET['deliveryDate'];
    $bill_Status = $_GET['billStatus'];

    // echo $user_Name_client;
    // echo $bill_Total;
    // echo $bill_Order_Date;
    // echo $bill_Delivery_Date;
    // echo $bill_Status;

    $sql = "INSERT INTO dathang(TaiKhoanKH, DiaChi, SoDienThoai, MSNV, TongCong, NgayDH, NgayGH, TrangThaiDH) VALUES ('$user_Name_client', '$user_Location_client', '$user_Phone_client', '$bill_Staff', '$bill_Total', '$bill_Order_Date', '$bill_Delivery_Date', '$bill_Status');";

    $sql_insert = mysqli_query($con, $sql);

    if($sql_insert){
        $sql_getmax_order = mysqli_query($con, "select max(SoDonDH) from dathang");
        $row_getmax_order = mysqli_fetch_array($sql_getmax_order);
        $sql_get_cart_detail = mysqli_query($con, "select gh.MSHH, SoLuong, gh.Gia, hh.GiamGia from giohang gh, hanghoa hh where gh.MSHH=hh.MSHH and TaiKhoanKH='".$user_Name_client."'");
        while($row_get_cart_detail = mysqli_fetch_array($sql_get_cart_detail)){
            $total_price = $row_get_cart_detail['Gia']*$row_get_cart_detail['SoLuong'];

            $detail_maxorder = $row_getmax_order['max(SoDonDH)'];
            $detail_MSHH = $row_get_cart_detail['MSHH'];
            $detail_SoLuong = $row_get_cart_detail['SoLuong'];
            $detail_Gia = $row_get_cart_detail['Gia'];
            $detail_GiamGia = $row_get_cart_detail['GiamGia'];

            $insert_string = "INSERT INTO chitietdathang(SoDonDH, MSHH, SoLuong, GiaTien, GiamGia, ThanhTien) VALUES ('$detail_maxorder', '$detail_MSHH', '$detail_SoLuong', '$detail_Gia', '$detail_GiamGia', '$total_price');";

            $sql_insert_bill_detail = mysqli_query($con, $insert_string);
        }

        $sql_delete = "delete from giohang where TaiKhoanKH='".$user_Name_client."'";
        $sql_delete_user_cart = mysqli_query($con, $sql_delete);
        echo 'true';
    }else{
        echo 'false';
    }
?>