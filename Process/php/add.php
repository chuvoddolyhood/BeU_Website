<?php
    include("../db/connect.php");

    if(isset($_GET['add']) == 'cart'){
        $user_Name_client = $_GET['userName'];
        $product_id = $_GET['product_id'];
        $product_name = $_GET['product_name'];
        $product_price = $_GET['product_price'];
        $product_amount = $_GET['product_amount'];
        $product_category = $_GET['product_category'];
        
        $sql_get_cart_info = "select * from giohang where TaiKhoanKH = '$user_Name_client' and MSHH = '$product_id'";
        $sql_select = mysqli_query($con, $sql_get_cart_info);
        $row_select = mysqli_fetch_array($sql_select);
        
        if($row_select != null){
            $SoLuong = $row_select['SoLuong'] + $product_amount;
            $sql = "update giohang set SoLuong = '$SoLuong' where TaiKhoanKH = '$user_Name_client' and MSHH = '$product_id'";
        }else{
            $sql = "INSERT INTO giohang(TaiKhoanKH, MSHH, TenHangHoa, Gia, SoLuong, PhanLoai) VALUES ('$user_Name_client', '$product_id', '$product_name', '$product_price', '$product_amount', '$product_category');";
        }

        $sql_insert = mysqli_query($con, $sql);

        if($sql_insert){
            echo 'true';
        }else{
            echo 'false';
        }
    }
?>