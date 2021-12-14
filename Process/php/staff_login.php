<?php
    include("../db/connect.php");
    session_start();

    if(isset($_POST['btn_staff_login'])){
        $staffName_manage = $_POST['staffName_manage'];
        $staffPass_manage = $_POST['staffPass_manage'];

        $sql_get_staffaccount = mysqli_query($con, "select TaiKhoanNV from nhanvien where MatKhauNV='".$staffPass_manage."'");
        $row_get_staffaccount = mysqli_fetch_array($sql_get_staffaccount);

        if($row_get_staffaccount['TaiKhoanNV'] == $staffName_manage){
            $_SESSION['stafflogin']=$staffName_manage;
            echo "<script>
                    confirm('Đăng nhập thành công, chào mừng ".$_SESSION['stafflogin']."');
                    window.location='../../Admin/index.php';
                </script>";         
        }else{
            echo "<script>
                    confirm('Sai tài khoản hoặc mật khẩu');
                    window.location='../../Admin/login_admin.php';
                </script>";  
        }     
    }elseif($_POST['btn_staff_logout']){
        unset($_SESSION['stafflogin']);
        session_destroy();
        echo "<script>
                    confirm('Đăng xuất thành công');
                </script>"; 
        header('location: login_admin.php');
    }else{
        header('location: index.php');
    }
?>
