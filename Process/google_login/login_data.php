<?php
	include("../db/connect.php");
		$user_name = $_GET['userName'];
		$user_tel = $_GET['userTel'];
		$google_id = $_GET['googleID'];

		// echo "name: ".$user_name." tel: ".$user_tel." id: ".$google_id;

		$sql = "UPDATE khachhang SET TaiKhoanKH='$user_name', SoDienThoai='$user_tel' where googleID='$google_id'";

		// echo $sql;

		$sql_update = mysqli_query($con, $sql);
		if($sql_update){
			echo 'true';
		}else{
			echo 'false';
		}


		// //Get user profile data from google
		// $gpUserProfile = $google_oauthV2->userinfo->get();

		// 		//Initialize User class
		// $user = new User();

		// //Insert or update user data to the database
		// $gpUserData = array(
		// 	'oauth_uid'     => $gpUserProfile['id'],
		// 	'user_name'     => $user_name,
		// 	'first_name'    => $gpUserProfile['given_name'],
		// 	'last_name'     => $gpUserProfile['family_name'],
		// 	'email'         => $gpUserProfile['email'],
		// 	'tel'           => $user_tel
		// );

		// $userData = $user->checkUser($gpUserData);

		// //Storing user data into session
		// // $_SESSION['userData'] = $userData;

		// if($userData){
		// 	$_SESSION['login'] = $gpUserData['user_name'];
		// 	return 'true';
		// }else{
		// 	return 'false';
		// }
?>