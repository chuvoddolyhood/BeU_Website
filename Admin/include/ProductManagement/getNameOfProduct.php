<?php
// Lay tenHH tu MSHH cho vao modal Them Hang Hoa Co San
    include './../../../Process/db/connect.php';
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];

        $sql = "SELECT TenHH, GiaNhap FROM hanghoa WHERE MSHH=$MSHH";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $TenHH = $row['TenHH'];
        $GiaNhap = $row['GiaNhap'];
        echo $TenHH.'*'.$GiaNhap;
    }
?>