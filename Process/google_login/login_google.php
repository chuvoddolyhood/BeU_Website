<?php
	//Include GP config file && User class
	include_once 'gpConfig.php';
	include_once 'User.php';
	include_once 'Process/db/connect.php';

	if(isset($_GET['code'])){
		$gClient->authenticate($_GET['code']);
		$_SESSION['token'] = $gClient->getAccessToken();
		header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
	}

	if (isset($_SESSION['token'])) {
		$gClient->setAccessToken($_SESSION['token']);
	}

	if ($gClient->getAccessToken()) {

		$gpUserProfile = $google_oauthV2->userinfo->get();

					//Initialize User class
		$user = new User();

			//Insert or update user data to the database
		$gpUserData = array(
			'oauth_uid'     => $gpUserProfile['id'],
			'first_name'    => $gpUserProfile['given_name'],
			'last_name'     => $gpUserProfile['family_name'],
			'email'         => $gpUserProfile['email']
		);

		$sql = "select TaiKhoanKH from khachhang where googleID='".$gpUserData['oauth_uid']."'";
		$sql_get_user_info = mysqli_query($con, $sql);
		$row_get_user_info = mysqli_fetch_array($sql_get_user_info);

		if($row_get_user_info['TaiKhoanKH']==null){
			$userData = $user->checkUser($gpUserData);
		}else{
			$_SESSION['login'] = $row_get_user_info['TaiKhoanKH'];
		}

		//Storing user data into session
		// $_SESSION['userData'] = $userData;

		//Storing user data into session
	    // $_SESSION['userData'] = $userData;

		//Render facebook profile data
	}else{
		$authUrl = $gClient->createAuthUrl();
				$link_login_google = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" class="auth-form__socials--google btn btn--size-s btn--with-icon">
				<i class=" auth-form__socials-icon fab fa-google"></i>
				<span class="auth-form__social-title">
				Kết nối với Google
				</span>
				</a>';
	}
?>