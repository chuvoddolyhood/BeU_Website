<?php
// Them moi hang hoa
    include './../../../Process/db/connect.php';
    if(isset($_GET["btn_submit"])){
        $username = $_GET['username'];
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

        // ===================================== THEM HANG HOA VO BANG chitietnhaphanghoa =======================================
        //Lay MSNV tu username
        $sql_get_MSNV = "SELECT `MSNV` FROM `nhanvien` WHERE `TaiKhoanNV`='$username'";
        $query_get_MSNV = mysqli_query($con, $sql_get_MSNV);
        $rows_get_MSNV = mysqli_fetch_array($query_get_MSNV);
        $MSNV = $rows_get_MSNV['MSNV'];

        //Lay thoi gian cua he thong
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = date("d-m-Y H:i:s");
        // echo $today;

        //Them thong tin vo bang nhaphanghoa
        $sql_add_nhaphanghoa = "INSERT INTO `chitietnhaphang`(`MSHH`, `SoLuong`, `DonGiaNhap`, `ThanhTien`, `NoiSanXuat`, `NgayNhap`, `MSNV`) 
            VALUES ($id_proudct,$productAmount,$productPriceImport,$productAmount*$productPriceImport,'$productManufacturer','$today',$MSNV)";
        $query_add_nhaphanghoa = mysqli_query($con, $sql_add_nhaphanghoa);


        if($sql_get_MSHH && $sql_add_img_product && $sql_add_nhaphanghoa){
            header("location: ./../../index.php?quanly=danhmuc&id=3");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>