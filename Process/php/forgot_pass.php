<?php
    include("../db/connect.php");

    if(isset($_POST['btn_forgot_password'])){
        $username_client = $_POST['username_client'];
        $tel_client = $_POST['tel_client'];
        $email_client = $_POST['email_client'];

        // echo "name: ".$username_client." tel: ".$tel_client." email: ".$email_client;

        $sql_get_info = mysqli_query($con, "select * from khachhang where TaiKhoanKH='".$username_client."' and SoDienThoai='".$tel_client."' and Email='".$email_client."'");
        echo "select * from khachhang where TaiKhoanKH='".$username_client."' and SoDienThoai='".$tel_client."' and Email='".$email_client."'";
        
        if($row_get_info = mysqli_fetch_array($sql_get_info)){
            $newpass = $row_get_info['TaiKhoanKH'].$row_get_info['SoDienThoai'];

                // echo $newpass;

            $sql_create_new_pass = "update khachhang set MatKhauKH='".$newpass."' where TaiKhoanKH='".$userName."'";
                // echo $sql_create_new_pass;
            $sql_reset_pass = mysqli_query($con, $sql_create_new_pass);
            if($sql_reset_pass){
                echo "<script>
                    confirm('Mật khẩu mới: ".$newpass."');
                    window.location='../../index.php?status=login';
                    </script>";  
            }else{
                echo 'false';
            }
        }else{
            echo "<script>
                    confirm('Sai thông tin, vui lòng nhập lại');
                    window.location='../../index.php?status=forgot_password';
                </script>";  
        }
    }   
?>
