<?php
    include("../../../../Process/db/connect.php");

    $user_Name = $_GET['userName'];
    $voucher_Name = $_GET['voucherName'];

    $sql_get_voucher_id = mysqli_query($con, "select MSVoucher from voucher where TenVoucher= '$voucher_Name'");
    $row_get_voucher_id = mysqli_fetch_array($sql_get_voucher_id);

    $sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH= '$user_Name'");
    $row_get_user_id = mysqli_fetch_array($sql_get_user_id);

    $voucher_ID = $row_get_game_id['MSVoucher'];
    $user_ID = $row_get_user_id['MSKH'];

    $sql_get_voucher_info = mysqli_query($con, "select * from voucherkh where MSKH='$user_Name' and MSVoucher='$voucher_ID'");
    
    if($row_get_voucher_info = mysqli_fetch_array($sql_get_voucher_info)){
        $SoLuong = $row_get_voucher_info['SoLuong'] + $SoLuong;
        $sql = "UPDATE voucherkh set SoLuong='$SoLuong' where MSKH='$user_ID' and MSVoucher='$voucher_ID'";
    }else{
        $sql = "INSERT INTO voucherkh(MSKH, MSVoucher, SoLuong) VALUES('$user_ID', '$voucher_ID', '1')";
    }

    // tru BeUToken:
    ...

    // echo $sql;

    $sql_insert = mysqli_query($con, $sql);

    if($sql_insert){
        echo 'true';
    }else{
        echo 'false';
    }
?>