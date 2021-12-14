<?php 
	$sql_diachi = mysqli_query($con, "select * from DiaChiKH dc join KhachHang kh where dc.MSKH=kh.MSKH and kh.TaiKhoanKH='".$_SESSION['login']."'");
?>
<!-- list address -->
<div class="grid__column-9-5">
	<div class="my-profile-item-wrap">
		<div class="my-profile-category">
			<span class="my-profile-category-label">Danh sách địa chỉ của bạn</span>
		</div>
		<table class="manage-content-table">
			<colgroup>
				<col style="width: 25%;">
				<col style="width: 45%;">
				<col style="width: 20%;">
				<col style="width: 10%;">
			</colgroup>

			<tr class="manage-content-list">
				<th class="manage-content-list-header">Họ và tên</th>
				<th class="manage-content-list-header">Địa chỉ</th>
				<th class="manage-content-list-header">Số điện thoại</th>
				<th class="manage-content-list-header"></th>
			</tr>
			<?php
				$count_address = 0;
				while($row_diachi = mysqli_fetch_array($sql_diachi)){
			?>
				<tr class="manage-content-list">
					<td class="manage-content-list-item">
						<?php echo $row_diachi['HoTenKH'] ?>
					</td>
					<td class="manage-content-list-item">
						<?php echo $row_diachi['DiaChi'] ?>
					</td>
					<td class="manage-content-list-item">
						<?php echo $row_diachi['SoDienThoai'] ?>
					</td>
					<td class="manage-content-list-item">
						<a onclick="remove_user_address(<?php echo $row_diachi['MaDC']; ?>)" class="table-cell-link">Xóa</a>
					</td>
				</tr>
			<?php
					$count_address++;
					}
					if($count_address == 1){
						echo '<script> deactiveAddress(); </script>';
				}
			?>
		</table>
		<div class="my-profile-ft">
			<button onclick="active_modal_address()" class="my-profile-btn">
				<a class="my-profile-btn-link">+ Thêm địa chỉ mới</a>
			</button>
		</div>
	</div>
</div>
<div id="manage-main-modal">
	<!-- Modal layout -->
	<!-- modal--active -->
	<div class="modal">
		<!-- modal__overlay--active -->
		<div class="modal__overlay"></div>
		<div class="modal__body">

			<!-- add customer form -->
			<!-- auth-form--active -->
			<div class="auth-form">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">Thêm địa chỉ</h3>
					</div>

					<div class="auth-form__form">
						<?php
							$sql_khachhang = mysqli_query($con, "select MSKH, HoTenKH, SoDienThoai from KhachHang where TaiKhoanKH='".$_SESSION['login']."'");
							$row_khachhang = mysqli_fetch_array($sql_khachhang);
						?>
						<div class="auth-form__group">
							<span class="auth-form__input-label">Tên người nhận:</span>
							<span class="auth-form__input-label"><?php echo $row_khachhang['HoTenKH'] ?></span>
						</div>
						<div class="auth-form__group">
							<input id="user_address" type="text" class="auth-form__input" placeholder="Địa chỉ" required>
						</div>
						<div class="auth-form__group">
							<span class="auth-form__input-label">Số điện thoại:</span>
							<span class="auth-form__input-label"><?php echo $row_khachhang['SoDienThoai'] ?></span>
						</div>
					</div>

					<div class="auth-form__aside">
						<p class="auth-form__policy-text">
							Bằng việc thay đổi, bạn đã đồng ý với chúng tôi về
							<a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
							<a href="" class="auth-form__text-link">Chính sách bảo mật</a>
						</p>
					</div>

					<div class="auth-form__controls">
						<button onclick="deactiveModal(0)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button onclick="add_user_address(<?php echo $row_khachhang['MSKH'] ?>)" class="btn btn--primary">THÊM ĐỊA CHỈ</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>