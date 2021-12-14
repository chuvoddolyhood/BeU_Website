<div class="manage-head">
	<div class="grid__column-6">
		<span class="manage-head-nav">&#9776; Dashboard</span>
		<span class="manage-head-nav2">&#9776; Dashboard</span>
	</div>

	<div class="grid__column-6">
		<div class="manage-head-profile">
			<img src="../Process/assets/img/avt.png" alt="" class="manage-head-profile-img">
			<?php
			$sql_get_staff_account = mysqli_query($con, "select HoTenNV, ChucVu from nhanvien where TaiKhoanNV='".$_SESSION['stafflogin']."'");
			$row_get_staff_account = mysqli_fetch_array($sql_get_staff_account);
			if($row_get_staff_account){
				?>
				<p>
					<?php echo $row_get_staff_account['HoTenNV'] ?>
					<span>
						<?php switch($row_get_staff_account['ChucVu']){
							case 0:
							echo 'Hệ Thống';
							break;
							case 1: 
							echo 'Admin';
							break;
							default:
							echo 'Nhân viên';
						} 
						?>
					</span>
				</p>
				<?php
			}
			?>
		</div>
	</div>

	<div class="manage-clear-fix"></div>
</div>