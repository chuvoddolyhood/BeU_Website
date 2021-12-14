<?php
	include_once('../Process/db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Web bán hàng</title>
		<link rel="stylesheet" href="../Process/assets/css/base.css">
		<link rel="stylesheet" href="../Process/assets/css/main.css">
		<link rel="stylesheet" href="../Process/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../Process/javascript/main.js"></script>
	</head>
	<body class="body-light-grey">
		<div class="manage-login-header">
			<div class="manage-login-header-wrapper--dark">
			</div>
			<div class="manage-login-header-wrapper--light">
			</div>
		</div>
		<div class="manage-login-header-wrapper--merge">
			<div class="manage-login-logo--wrapper">
				<span>BeU</span><img class="manage-login-logo-img" src="../Process/assets/img/logo_merge.png" alt="">Store
			</div>
		</div>
		<div class="manage-login-body">
			<div class="manage-login-body-wrapper">
				<form action="../Process/php/staff_login.php" method="POST">
					<div class="manage-login-body-header-label">
						Đăng nhập
					</div>
					<div class="manage-login-body-input-wrapper">
						<span>Tên tài khoản: </span>
						<input id="staff_Name" type="text" name="staffName_manage" class="manage-login-input" value="<?php if(isset($_SESSION['stafflogin'])){echo $_SESSION['stafflogin'];} ?>">
					</div>
					<div class="manage-login-body-input-wrapper">
						<span>Mật khẩu: </span>
						<input id="staff_Pass" type="password" name="staffPass_manage" class="manage-login-input">
					</div>
					<div class="manage-login-button-wrapper">
						<button type="submit" name="btn_staff_login" class="button_staff_login">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
		<div class="manage-login-footer">
			<div class="manage-login-footer-label">
				&copy All copyright: Nguyễn Đình Thanh
			</div>
		</div>
	</body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</body>
</html>