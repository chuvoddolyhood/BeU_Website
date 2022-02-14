<?php
    include("../db/connect.php");

    $user_Name_client = $_GET['userName'];
    $user_Voucher = $_GET['userVoucher'];

    //get user ID
    $sql_get_user_ID = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='$user_Name_client'");
    $row_get_user_ID = mysqli_fetch_array($sql_get_user_ID);
    $user_ID = $row_get_user_ID['MSKH'];

    //get voucher ID
    $sql_get_voucher_ID = mysqli_query($con, "select MSVoucher from voucher where TenVoucher='$user_Voucher'");
    $row_get_voucher_ID = mysqli_fetch_array($sql_get_voucher_ID);
    $voucher_ID = $row_get_voucher_ID['MSVoucher'];

    //get user's voucher quantity
    $sql_get_voucher_quantity = mysqli_query($con, "select SoLuong from voucherkh where MSKH='$user_ID' and MSVoucher='$voucher_ID'");
    $row_get_voucher_quantity = mysqli_fetch_array($sql_get_voucher_quantity);

    //calculate new user's voucher quantity
    $new_voucher_quantity = $row_get_voucher_quantity['SoLuong'] - 1;

    //delete if quantity = 0 and update if quantity > 0
    if($new_voucher_quantity == 0){
        $sql = "DELETE from voucherkh where MSKH='$user_ID' and MSVoucher='$voucher_ID'";
    }else{
        $sql = "UPDATE voucherkh set SoLuong='$new_voucher_quantity' where MSKH='$user_ID' and MSVoucher='$voucher_ID'";
    }

    // echo $sql;

    $sql_udpate_user_voucher = mysqli_query($con, $sql);

    if($sql_udpate_user_voucher){
        echo "true";
    }else{
        echo "false";
    }
?>