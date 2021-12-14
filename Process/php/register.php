<?php
    include("./Process/db/connect.php");

    if(isset($_GET['regis']) == 'customer'){
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
?>