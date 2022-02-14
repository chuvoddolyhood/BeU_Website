<?php

// Include Database connection
include("./../../../../Process/db/connect.php");
// Include SimpleXLSXGen library
include("./../SimpleXLSXGen.php");

$employees = [
  ['MSHH', 'Tên hàng hóa', 'Quy cách', 'Giá nhập', 'Giá bán', 'Giảm giá', 'Số lượng', 'Mã loại hàng', 'Tên loại hàng', 'Loại sản phẩm', 'Hãng', 'Nơi sản xuất', 'Tình trạng', 'Bảo hành', 'Đặc biệt']
];

$id = 0;
$sql = "SELECT `MSHH`, `TenHH`, `QuyCach`, `GiaNhap`, `Gia`, `SoLuongHang`, l.`MaLoaiHang`, l.TenLoaiHang, `GiamGia`, `LoaiSanPham`, `HangHangHoa`, `NoiSXHangHoa`, `TinhTrang`, `BaoHanh`, `DacBiet` 
        FROM `hanghoa` h JOIN loaihanghoa l ON h.MaLoaiHang=l.MaLoaiHang";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    // $id++;
    $employees = array_merge($employees, array(array($row['MSHH'],$row['TenHH'], $row['QuyCach'], $row['GiaNhap'], $row['Gia'], $row['GiamGia'], $row['SoLuongHang'], $row['MaLoaiHang'], $row['TenLoaiHang'], $row['LoaiSanPham'], $row['HangHangHoa'], $row['NoiSXHangHoa'], $row['TinhTrang'], $row['BaoHanh'], $row['DacBiet'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($employees);
$xlsx->downloadAs('Products.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($employees);
