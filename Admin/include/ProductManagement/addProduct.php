<?php
    include './../../../Process/db/connect.php';
    if(isset($_GET["btn_submit"])){
		$productName = $_GET['productName'];
		$productDetail = $_GET['productDetail'];
		$productPrice = $_GET['productPrice'];
		$productAmount = $_GET['productAmount'];
        $productPriceImport = $_GET['productPriceImport'];
		$productSaleoff = $_GET['productSaleoff'];
        $product_QuyCach = $_GET['product_QuyCach'];
		$productCategory = $_GET['productCategory'];
		$productManufacturer = $_GET['productManufacturer'];
		$productCountry = $_GET['productCountry'];
		$productStatus = $_GET['productStatus'];
		$productWarranty = $_GET['productWarranty'];
		$productSpecial = $_GET['productSpecial'];
        $productImg = $_GET['productImg'];

        // echo 'TenHH: '.$productName;
        // echo '\nChi tiet'.$productDetail;
        // echo '\nGia ban'.$productPrice;
        // echo '\nSo luong'.$productAmount;
        // echo '\nGia sale '.$productSaleoff;
        // echo '\nGia nhap '.$productPriceImport;
        // echo '\nQuy cach: '.$product_QuyCach;
        // echo '\nLoai HH: '.$productCategory;
        // echo '\nHang SX: '.$productManufacturer;
        // echo '\nNoi SX: '.$productCountry;
        // echo '\nTrang thai: '.$productStatus;
        // echo '\nBao hanh: '.$productWarranty;
        // echo '\nDac biet: '.$productSpecial;
        // echo '\nTen hinh anh: '.$productImg;

        //Them du lieu vao bang HangHoa
        $sql_add_product = "INSERT INTO `hanghoa`(`TenHH`, `QuyCach`, `GiaNhap`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GiamGia`, `LoaiSanPham`, `HangHangHoa`, `NoiSXHangHoa`, `TinhTrang`, `BaoHanh`, `DacBiet`) 
                VALUES ('$productName','$product_QuyCach',$productPriceImport,$productPrice,$productAmount,$productCategory,$productSaleoff,'$productDetail','$productManufacturer','$productCountry','$productStatus','$productWarranty','$productSpecial')";
        $query_add_product = mysqli_query($con, $sql_add_product);


        //Lay MSHH vua them vao CSDL
        $sql_get_MSHH = "SELECT MSHH FROM `hanghoa` WHERE TenHH='$productName'";
        $query_get_MSHH = mysqli_query($con, $sql_get_MSHH);
        $rows_get_MSHH = mysqli_fetch_array($query_get_MSHH);

        // Bắt buộc phải có biến chuyển dữ liệu mới cho vào INSERT
        $id_proudct = $rows_get_MSHH['MSHH']; 

        //Them hinhanh vao CSDL
        $sql_add_img_product = "INSERT INTO `hinhhanghoa`(`TenHinh`, `MSHH`) VALUES ('$productImg',$id_proudct)";
        $query_add_img_product = mysqli_query($con, $sql_add_img_product);


        if($sql_get_MSHH && $sql_add_img_product){
            header("location: ./../../index.php?quanly=danhmuc&id=3");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>