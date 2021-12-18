<?php
    include './../../../Process/db/connect.php';
    if(isset($_GET['MSHH'])){
        $MSHH = $_GET['MSHH'];

        $sql = "SELECT TenHH FROM hanghoa WHERE MSHH=$MSHH";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $TenHH = $row['TenHH'];
        echo $TenHH;
    }
?>