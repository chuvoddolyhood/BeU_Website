<?php

// Include Database connection
include("./../../../../Process/db/connect.php");
// Include SimpleXLSXGen library
include("./../SimpleXLSXGen.php");

$employees = [
  ['Mã đơn','MSHH', 'Tên hàng hóa', 'Số lượng', 'Đơn giá nhập', 'Thành tiền', 'Nơi sản xuất', 'Ngày nhập', 'Nhân viên phụ trách']
];

$id = 0;
$sql = "SELECT `SoDonNhapHang`, c.`MSHH`, h.TenHH, `SoLuong`, `DonGiaNhap`, `ThanhTien`, `NoiSanXuat`, `NgayNhap`, n.HoTenNV
        FROM `chitietnhaphang` c JOIN hanghoa h ON c.MSHH=h.MSHH
        JOIN nhanvien n ON c.MSNV=n.MSNV";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    // $id++;
    $employees = array_merge($employees, array(array($row['SoDonNhapHang'],$row['MSHH'],$row['TenHH'], $row['SoLuong'], $row['DonGiaNhap'], $row['ThanhTien'], $row['NoiSanXuat'], $row['NgayNhap'], $row['HoTenNV'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($employees);
$xlsx->downloadAs('importProducts.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($employees);
