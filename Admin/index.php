<?php
	session_start();

	if(!isset($_SESSION['stafflogin'])){
		header('location: ./Admin/login_admin.php');
	}
	include('../Process/db/connect.php');
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
		<script src="../Process/javascript/check_register.js"></script>
		<script src="../Process/javascript/change_info.js"></script>
		<?php 

			if(isset($_GET['status']) && $_GET['status']=='logout'){
				unset($_SESSION['stafflogin']);
				header('location: login_admin.php');
			}

			if(isset($_GET['quanly'])){
				$quanly = $_GET['quanly'];
			}else{
				$quanly = '';
			}

			if(isset($_GET['id'])){
				$id = $_GET['id'];
			}else{
				$id = '';
			}

			if($quanly=='danhmuc' && $id=='1') {
				include("include/manage-khachhang.php");
			}elseif ($quanly=='danhmuc' && $id=='2') {
				include("include/manage-diachi.php");
			}elseif ($quanly=='danhmuc' && $id=='3') {
				include("include/manage-hanghoa.php");
			}elseif($quanly=='danhmuc' && $id=='4'){
				include("include/manage-donhang.php");
			}elseif($quanly=='danhmuc' && $id=='5'){
				include("include/manage-taikhoan.php");
			}else{
				include("include/manage-danhmuc.php");
			}
		?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(".manage-head-nav").click(function(){
				$("#side-nav").css('width', '94px');
				$(".side-nav-item span").css('display', 'none');
				$("#manage-main-body").css('margin-left', '94px');
				$(".side-nav-logo").css('visibility', 'hidden');
				$(".side-nav-logo span").css('visibility', 'visible');
				$(".side-nav-logo span").css('margin-left', '105px');
				$(".side-nav-item").css('visibility', 'hidden');
				$(".side-nav-icon").css('visibility', 'visible');
				$(".manage-head-nav").css('display', 'none');
				$(".manage-head-nav2").css('display', 'block');
			});

			$(".manage-head-nav2").click(function(){
				$("#side-nav").css('width', '300px');
				$(".side-nav-item span").css('display', 'inline-block');
				$("#manage-main-body").css('margin-left', '300px');
				$(".side-nav-logo").css('visibility', 'visible');
				$(".side-nav-logo span").css('visibility', 'visible');
				$(".side-nav-logo span").css('margin-left', '0');
				$(".side-nav-item").css('visibility', 'visible');
				$(".side-nav-icon").css('visibility', 'visible');
				$(".manage-head-nav").css('display', 'block');
				$(".manage-head-nav2").css('display', 'none');
			});

			$(".manage-header2").click(function(){
				var x = document.getElementsByClassName('manage-header1');
				x[0].classList.add('deactive-header');
				$(".manage-content1").css('display', 'none');

				var y = document.getElementsByClassName('manage-header2');
				y[0].classList.remove('deactive-header');
				$(".manage-content2").css('display', 'flex');
			});

			$(".manage-header1").click(function(){
				var x = document.getElementsByClassName('manage-header1');
				x[0].classList.remove('deactive-header');
				$(".manage-content1").css('display', 'flex');

				var y = document.getElementsByClassName('manage-header2');
				y[0].classList.add('deactive-header');
				$(".manage-content2").css('display', 'none');
			});
		</script>
	</body>
</html>