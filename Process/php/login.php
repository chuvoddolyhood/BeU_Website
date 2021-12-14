<?php
    include("../db/connect.php");
    session_start();

    if(isset($_POST['btn_user_login'])){
        $username_client = $_POST['username_client'];
        $password_client = $_POST['password_client'];

        $sql_get_password = mysqli_query($con, "select MatKhauKH from khachhang where TaiKhoanKH='".$username_client."'");
        $row_get_password = mysqli_fetch_array($sql_get_password);

        if($row_get_password['MatKhauKH'] == $password_client){
            $_SESSION['login']=$username_client;
            echo "<script>
                    confirm('Đăng nhập thành công, chào mừng ".$_SESSION['login']."');
                    window.location='../../index.php';
                </script>";         
        }else{
            echo "<script>
                    confirm('Sai tài khoản hoặc mật khẩu');
                    window.location='../../index.php?status=login';
                </script>";  
        }     
    }elseif (isset($_POST['btn_logout'])){
        unset($_SESSION['login']);
        session_destroy();
        header('location: ./index.php');
    }else{
        header('location: ./index.php');
    }
?>
