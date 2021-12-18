<?php
    include("../../../../Process/db/connect.php");

    if(isset($_GET['add']) == 'score'){
        $user_Name = $_GET['userName'];
        $game_Name = $_GET['gameName'];
        $user_Score = $_GET['userScore'];

        $getdate = time();
        $today = date("d-m-Y h:i:s", $getdate);
        // echo $user_Name;
        
        $sql_get_game_id = mysqli_query($con, "select MaGame from game where TenGame= '$game_Name'");
        $row_get_game_id = mysqli_fetch_array($sql_get_game_id);

        $sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH= '$user_Name'");
        $row_get_user_id = mysqli_fetch_array($sql_get_user_id);
        
        $game_ID = $row_get_game_id['MaGame'];
        $user_ID = $row_get_user_id['MSKH'];

        $sql = "INSERT INTO diemgame(MaGame, MSKH, Diem, NgayChoi) VALUES('$game_ID', '$user_ID', '$user_Score', '$today')";

        // echo $sql;
        
        $sql_insert = mysqli_query($con, $sql);

        if($sql_insert){
            echo 'true';
        }else{
            echo 'false';
        }
    }
?>