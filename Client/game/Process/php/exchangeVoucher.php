<?php
    include("../../../../Process/db/connect.php");

    $user_Name = $_GET['userName'];
    $voucher_Name = $_GET['voucherName'];

    // get voucher info:
    $sql_get_voucher_info = mysqli_query($con, "select MSVoucher, Token from voucher where TenVoucher= '$voucher_Name'");
    $row_get_voucher_info = mysqli_fetch_array($sql_get_voucher_info);

    // get user info
    $sql_get_user_info = mysqli_query($con, "select MSKH, BeUToken from khachhang where TaiKhoanKH= '$user_Name'");
    $row_get_user_info = mysqli_fetch_array($sql_get_user_info);

    // set voucher và user
    $voucher_ID = $row_get_voucher_info['MSVoucher'];
    $voucher_Token = $row_get_voucher_info['Token'];
    $user_ID = $row_get_user_info['MSKH'];
    $user_Token = $row_get_user_info['BeUToken'];
    
    // set new user token
    $user_Token = $user_Token - $voucher_Token;
    if($user_Token >= 0){
        $sql_update_user_token = "UPDATE khachhang set BeUToken='$user_Token' where MSKH='$user_ID'";

        // check voucher's quantity
        if($voucher_ID == 12){
            $SoLuong = 3;
            $voucher_ID = 11;
        }else{
            $SoLuong = 1;
        }

        // check if voucher already in user pocket
        $sql_get_voucher_quantity = "select SoLuong from voucherkh where MSKH='$user_ID' and MSVoucher='$voucher_ID'";
        $sql_select = mysqli_query($con, $sql_get_voucher_quantity);

        if($row_get_voucher_quantity = mysqli_fetch_array($sql_select)){ 
            $StackSoLuong = $row_get_voucher_quantity['SoLuong'] + $SoLuong;
            // echo "SoLuong: ".$row_get_voucher_quantity['SoLuong'];
            // echo "SoLuong: ".$SoLuong;
            // echo "Stack: ".$StackSoLuong;
            $sql = "UPDATE voucherkh set SoLuong='$StackSoLuong' where MSKH='$user_ID' and MSVoucher='$voucher_ID'";
        }else{
            $sql = "INSERT INTO voucherkh(MSKH, MSVoucher, SoLuong) VALUES('$user_ID', '$voucher_ID', '$SoLuong')";
        }

        $sql_insert = mysqli_query($con, $sql);
        $sql_update = mysqli_query($con, $sql_update_user_token);

        if($sql_insert && $sql_update){
            echo 'true';
        }else{
            echo 'false';
        }
    }else{
        echo 'lackofToken';
    }

    
?>