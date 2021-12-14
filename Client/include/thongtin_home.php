<?php
	include_once('Process/db/connect.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$iduser=1;
	$sql_thongtin = mysqli_query($con, "select * from KhachHang where TaiKhoanKH='".$_SESSION['login']."'");
	$row_thongtin = mysqli_fetch_array($sql_thongtin);
?>

<script src="Process/javascript/change_info.js"></script>
<div class="app__container">
	<div class="grid">
		<div class="grid__row app_content">
			<div class="grid__column-2-5">
				<div class="manage-welcome--wrapper">
					<span class="manage-welcome">
							Chào mừng, 
					</span>
					<span class="manage-welcome-username">
							<?php echo $row_thongtin['HoTenKH'] ?>.
					</span>
				</div>
				<nav class="manage">
					<div class="manage-account-wrapper">
						<h3 class="manage-account-header">
							Quản lý tài khoản
						</h3>
						<ul class="manage-account-list">
							<li class="manage-account-item">
								<a class="manage-account-link" href="?quanly=thongtin&id=1">Thông tin cá nhân</a>
							</li>
							<li class="manage-account-item">
								<a class="manage-account-link" href="?quanly=thongtin&id=2">Danh sách địa chỉ</a>
							</li>
							<li class="manage-account-item">
								<a class="manage-account-link" href="?quanly=thongtin&id=3">Sản phẩm yêu thích</a>
							</li>
						</ul>
					</div>
					<div class="manage-account-wrapper">
						<span class="manage-account-header">
							Quản lý đơn hàng
						</span>
						<ul class="manage-account-list">
							<li class="manage-account-item">
								<a class="manage-account-link" href="?quanly=thongtin&id=4">Đơn hàng đang xử lý</a>
							</li>
							<li class="manage-account-item">
								<a class="manage-account-link" href="?quanly=thongtin&id=5">Đơn hàng đã mua</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

			<?php 
				if($id==1){
					include("Client/include/thongtincanhan.php");
				}elseif($id==2){
					include("Client/include/danhsachdiachi.php");
				}elseif($id==3){
					include("Client/include/sanphamyeuthich.php");
				}elseif($id==4){
					include("Client/include/donhangdangxuly.php");
				}elseif($id==5){
					include("Client/include/donhangdamua.php");
				}else{
					$id=1;
					include("Client/include/thongtincanhan.php");
				}

				if($id > 0){
					echo '<script type="text/javascript">',
					'active_profile_category('.$id.');',
					'</script>';
				}
			?>
		</div>
	</div>
</div>