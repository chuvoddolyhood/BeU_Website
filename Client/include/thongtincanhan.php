<?php
	$iduser = 1;
	$sql_khachhang = mysqli_query($con, "select * from khachhang where TaiKhoanKH='".$_SESSION['login']."'");
	$row_khachhang = mysqli_fetch_array($sql_khachhang);
?>

<!-- my infomation -->
<div class="grid__column-9-5">
	<div class="my-profile-item-wrap">
		<div class="my-profile-item">
			<span class="my-profile-item-title">Tên tài khoản:</span>
			<span id="user_name" class="my-profile-item-info">
				<?php echo $_SESSION['login'] ?>
			</span>
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Họ tên:</span>
			<span class="my-profile-item-info">
				<?php echo $row_khachhang['HoTenKH'] ?>
			</span>
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Số điện thoại:</span>
			<span class="my-profile-item-info">
				<?php echo $row_khachhang['SoDienThoai'] ?>
			</span>
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Tên công ty:</span>
			<input id="user_company" class="my-profile-item-info" type="text" value="<?php echo $row_khachhang['TenCongTy'] ?>">
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Số FAX:</span>
			<input id="user_FAX" class="my-profile-item-info" type="text" value="<?php echo $row_khachhang['SoFax'] ?>">
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Địa chỉ mail:</span>
			<span class="my-profile-item-info">
				<?php echo $row_khachhang['Email'] ?>
			</span>
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Ngày sinh:</span>
			<span class="my-profile-item-info">
				<?php echo $row_khachhang['DOB'] ?>
			</span>
		</div>
		<div class="my-profile-item">
			<span class="my-profile-item-title">Giới tính:</span>
			<span class="my-profile-item-info">
				<?php echo $row_khachhang['GioiTinh'] ?>
			</span>
		</div>
		<div class="my-profile-action">
			<a class="my-profile-action-link">
				<button onclick="change_user_info()" class="my-profile-save-info-btn">Lưu thay đổi</button>
			</a>
		</div>
	</div>
</div>