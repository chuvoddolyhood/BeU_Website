<?php
    include './../../../Process/db/connect.php';
    if(isset($_POST["btn_submit"])){
        $nameTypeOfProduct = $_POST["nameTypeOfProduct"];
        // echo $nameTypeOfProduct;
        $sql_add_productCategory = "INSERT INTO `loaihanghoa`(`TenLoaiHang`) VALUES ('$nameTypeOfProduct')";
        $query_add_productCategory = mysqli_query($con, $sql_add_productCategory);

        if($sql_add_productCategory){
            header("location: ./../../index.php?quanly=danhmuc&id=3");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>