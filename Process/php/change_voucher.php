<?php
    include("../db/connect.php");

    $user_Name_client = $_GET['userName'];
    $voucher_ID = $_GET['voucherID'];
    $total_Price = $_GET['totalPrice'];

    $sql_get_voucher_info = mysqli_query($con, "select * from voucher where MSVoucher='$voucher_ID'");
    $row_get_voucher_info = mysqli_fetch_array($sql_get_voucher_info);

    $discount=0;

    // echo $total_Price;
    // echo $row_get_voucher_info['GiaTri'];

    if($row_get_voucher_info['LoaiVoucher'] == 1){
        $discount = $total_Price * $row_get_voucher_info['GiaTri'] / 100;
    }elseif($row_get_voucher_info['LoaiVoucher'] == 2) {
        $discount = 1000 * $row_get_voucher_info['GiaTri'];
    }elseif($row_get_voucher_info['LoaiVoucher'] == 3){
        $discount = 1000 * $row_get_voucher_info['GiaTri'];
    }

    $stringDiscount = number_format($discount);
    $stringTotal = number_format($total_Price - $discount + 30000);
    $stringValue = $stringDiscount."/".$stringTotal;

    echo $stringValue;
?>