<?php
    include("../db/connect.php");

    if(isset($_GET)){
        $option = $_GET['regis'];
    }

    if($option == 'customer'){
        $user_Name_client = $_GET['userName'];
        $user_RealName_client = $_GET['userRealName'];
        $user_Pass_client = $_GET['userPass'];
        $user_Tel_client = $_GET['userTel'];
        $user_DOB_client = $_GET['userDOB'];
        $user_Email_client = $_GET['userEmail'];
        $user_sex_client = $_GET['userSex'];
    
        $sql = "INSERT INTO khachhang(TaiKhoanKH, MatKhauKH, HoTenKH, SoDienThoai, Email, DOB, GioiTinh) VALUES ('$user_Name_client', '$user_Pass_client', '$user_RealName_client', '$user_Tel_client', '$user_Email_client', '$user_DOB_client', '$user_sex_client');";

        $sql_insert = mysqli_query($con, $sql);

        if($sql_insert){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    if($option == 'staff'){
        $staff_Name = $_GET['staffName'];
        $staff_Pass = $_GET['staffPass'];
        $staff_RealName = $_GET['staffRealName'];
        $staff_Pos = $_GET['staffPos'];
        $staff_Address = $_GET['staffAddress'];
        $staff_Tel = $_GET['staffTel'];
    
        $sql = "INSERT INTO nhanvien(TaiKhoanNV, MatKhauNV, HoTenNV, ChucVu, DiaChi, SoDienThoai) VALUES ('$staff_Name', '$staff_Pass', '$staff_RealName', '$staff_Pos', '$staff_Address', '$staff_Tel');";

        $sql_insert = mysqli_query($con, $sql);

        if($sql_insert){
            echo 'true';
        }else{
            echo 'false';
        }
    }
?>