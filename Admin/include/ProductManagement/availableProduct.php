<?php
// Them hang hoa co san
    include './../../../Process/db/connect.php';
    if(isset($_GET["btn_submit"])){
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

        if($sql_SoLuongHangHoa && $sql_update){
            header("location: ./../../index.php?quanly=danhmuc&id=3");
            echo '<script> alert("Saved");</script>';
        } else {
            echo '<script> alert("Not Saved");</script>';
        }
    }
?>