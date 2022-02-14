<?php
// Them hang hoa co san
    include './../../../Process/db/connect.php';
    if(isset($_GET["btn_submit"])){
        $username = $_GET['username'];
		$MSHH = $_GET['MSHH'];
		$amountOfProduct = $_GET['amountOfProduct'];
        $priceProductImport = $_GET['priceProductImport'];
		
        // echo 'MSHH: '.$MSHH;
        // echo '\namountOfProduct'.$amountOfProduct;

        //Lay so luong hang hien co trong CSDL
        $sql_SoLuongHangHoa = "SELECT SoLuongHang FROM hanghoa WHERE MSHH=$MSHH";
        $query_SoLuongHangHoa = mysqli_query($con, $sql_SoLuongHangHoa);
        $rows_SoLuongHangHoa = mysqli_fetch_array($query_SoLuongHangHoa);
        
        //So luong hang sau khi duoc cong them -> cap nhat vao CSDL
        $soLuongHang_update = $rows_SoLuongHangHoa['SoLuongHang'] + $amountOfProduct;

        $sql_update="UPDATE `hanghoa` SET `SoLuongHang`=$soLuongHang_update, `GiaNhap`=$priceProductImport WHERE MSHH=$MSHH";
        $query_update = mysqli_query($con, $sql_update);

        //===================================== THEM HANG HOA VO BANG chitietnhaphanghoa ====================
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
        $sql_add_nhaphanghoa = "INSERT INTO `chitietnhaphang`(`MSHH`, `SoLuong`, `DonGiaNhap`, `ThanhTien`, `NgayNhap`, `MSNV`) 
            VALUES ($MSHH, $amountOfProduct,$priceProductImport,$amountOfProduct*$priceProductImport,'$today',$MSNV)";
        $query_add_nhaphanghoa = mysqli_query($con, $sql_add_nhaphanghoa);

        if($sql_SoLuongHangHoa && $sql_update && $sql_add_nhaphanghoa){
            header("location: ./../../index.php?quanly=danhmuc&id=3");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>