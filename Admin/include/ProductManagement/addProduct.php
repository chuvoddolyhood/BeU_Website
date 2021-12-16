<?php
    include './../../../Process/db/connect.php';
    if(isset($_GET["btn_submit"])){
		$productName = $_GET['productName'];
		$productDetail = $_GET['productDetail'];
		$productPrice = $_GET['productPrice'];
		$productAmount = $_GET['productAmount'];
		$productSaleoff = $_GET['productSaleoff'];
        $product_QuyCach = $_GET['product_QuyCach'];
		$productCategory = $_GET['productCategory'];
		$productManufacturer = $_GET['productManufacturer'];
		$productCountry = $_GET['productCountry'];
		$productStatus = $_GET['productStatus'];
		$productWarranty = $_GET['productWarranty'];
		$productSpecial = $_GET['productSpecial'];
        $productImg = $_GET['productImg'];

        echo $productName;
        echo $productDetail;
        echo $productPrice;
        echo $productAmount;
        echo $productSaleoff;
        echo $product_QuyCach;
        echo $productCategory;
        echo $productManufacturer;
        echo $productCountry;
        echo $productStatus;
        echo $productWarranty;
        echo $productSpecial;
        echo $productImg;


        // $sql_add_productCategory = "INSERT INTO `loaihanghoa`(`TenLoaiHang`) VALUES ('$nameTypeOfProduct')";
        // $query_add_productCategory = mysqli_query($con, $sql_add_productCategory);

        // if($sql_add_productCategory){
        //     header("location: ./../../index.php?quanly=danhmuc&id=3");
        //     echo '<script> alert("Saved");</script>';
        // } else {
        //     echo '<script> alert("Not Saved");</script>';
        // }
    }
?>