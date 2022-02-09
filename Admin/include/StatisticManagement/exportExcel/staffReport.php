<?php

// Include Database connection
include("./../../../../Process/db/connect.php");
// Include SimpleXLSXGen library
include("./../SimpleXLSXGen.php");

$employees = [
  ['MSNV', 'Họ và tên', 'Chức vụ', 'Địa chỉ', 'Số điện thoại']
];

$id = 0;
$sql = "SELECT `MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai` FROM `nhanvien`";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    // $id++;
    $employees = array_merge($employees, array(array($row['MSNV'],$row['HoTenNV'], $row['ChucVu'], $row['DiaChi'], $row['SoDienThoai'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($employees);
$xlsx->downloadAs('employees.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($employees);
