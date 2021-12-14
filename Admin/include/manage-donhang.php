<?php
	include("include/list-category.php");
?>

<div id="manage-main-body">
	<?php
		include("include/content-header.php");
	?>

	<div>
		<span class="manage-header">Quản lý đơn đặt hàng</span>
	</div>
	<div class="manage-content-wrap">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 5%;">
					<col style="width: 5%">
					<col style="width: 5%;">
					<col style="width: 27.5%;">
					<col style="width: 5%;">
					<col style="width: 7.5%;">
					<col style="width: 5%;">
					<col style="width: 7.5%;">
					<col style="width: 7.5%;">
					<col style="width: 5%;">
					<col style="width: 10%;">
					<col style="width: 10%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Tên khách</th>
					<th class="manage-content-list-header">Ngày đặt</th>
					<th class="manage-content-list-header">Ngày GH</th>
					<th class="manage-content-list-header">Sản phẩm đặt</th>
					<th class="manage-content-list-header">Số lượng</th>
					<th class="manage-content-list-header">Giá tiền</th>
					<th class="manage-content-list-header">Giảm giá</th>
					<th class="manage-content-list-header">Thành tiền</th>
					<th class="manage-content-list-header">Tổng cộng</th>
					<th class="manage-content-list-header">Nhân viên</th>
					<th class="manage-content-list-header">Trạng thái</th>
					<th class="manage-content-list-header">Cập nhật</th>
				</tr>
				<?php
					$sql_user_bill = mysqli_query($con, 'select TaiKhoanKH, SoDonDH from dathang dh ORDER by dh.TrangThaiDH DESC, dh.SoDonDH ASC');
					while($row_user_bill = mysqli_fetch_array($sql_user_bill)){
						$i=1;

						$row_number_bill = mysqli_fetch_array(mysqli_query($con, "select ct.SoDonDH, count(ct.SoDonDH) from chitietdathang ct, dathang dh where dh.SoDonDH=ct.SoDonDH and dh.TaiKhoanKH='".$row_user_bill['TaiKhoanKH']."' and dh.SoDonDH='".$row_user_bill['SoDonDH']."'"));

						$count_bill_by_ID = (int)$row_number_bill['count(ct.SoDonDH)'];

						$sql_info_bill = mysqli_query($con, "select MaChiTiet, dh.SoDonDH, HoTenKH, NgayDH, NgayGH, TenHH, SoLuong, GiaTien, ct.GiamGia, ThanhTien, TaiKhoanNV, TongCong, TrangThaiDH from dathang dh, chitietdathang ct, hanghoa hh, nhanvien nv, khachhang kh WHERE ct.SoDonDH=dh.SoDonDH and dh.TaiKhoanKH=kh.TaiKhoanKH and dh.MSNV=nv.MSNV and ct.MSHH=hh.MSHH and ct.SoDonDH='".$row_number_bill['SoDonDH']."'");

						while($row_info_bill = mysqli_fetch_array($sql_info_bill)){
							if($i==1){
								$i++;
				?>
						<tr class="manage-content-list--wrapper">
							<tr class="manage-content-list">
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item"><?php echo $row_info_bill['HoTenKH'] ?></td>
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item"><?php echo $row_info_bill['NgayDH'] ?></td>
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item"><?php echo $row_info_bill['NgayGH'] ?></td>
								<td class="manage-content-list-item"><?php echo $row_info_bill['TenHH'] ?></td>
								<td class="manage-content-list-item"><?php echo $row_info_bill['SoLuong'] ?></td>
								<td class="manage-content-list-item"><?php echo number_format($row_info_bill['GiaTien']) ?></td>
								<td class="manage-content-list-item"><?php echo $row_info_bill['GiamGia'] ?></td>
								<td class="manage-content-list-item"><?php echo number_format($row_info_bill['ThanhTien']) ?></td>
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item"><?php echo number_format($row_info_bill['TongCong']) ?></td>
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item">
							<?php 
								if(isset($row_info_bill['TaiKhoanNV'])){
									echo $row_info_bill['TaiKhoanNV']; 
								}else{
									echo 'Null';
								}
							?>
								</td>

								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item">
									<select name="status" id="status_<?php echo $row_number_bill['SoDonDH'] ?>">
									<?php 
										for($z=4; $z>0; $z--){
											if($z<=$row_info_bill['TrangThaiDH']){
									?>
												<option value="<?php echo (int)$z ?>" <?php if($z==$row_info_bill['TrangThaiDH']) echo 'selected' ?>>
											<?php
													switch ($z) {
														case 1:
														echo 'Đã hoàn thành';
														break;
														case 2:
														echo 'Đang giao hàng';
														break;
														case 3:
														echo 'Đã xác nhận';
														break;
														default:
														echo 'Chưa xác nhận';
														break;
													}
												}
											?>
											</option>
										<?php
											}
										?>
									</select>
								</td>
								<td rowspan="<?php echo $count_bill_by_ID ?>" class="manage-content-list-item">
									<?php 
										if($row_info_bill['TrangThaiDH']!=1){
											$sql_get_staff_ID = mysqli_query($con, "select MSNV from nhanvien where TaiKhoanNV='".$_SESSION['stafflogin']."'");
											$row_get_staff_ID = mysqli_fetch_array($sql_get_staff_ID);
									?>
										<button onclick="change_bill_status(<?php echo $row_number_bill['SoDonDH'] ?>, <?php echo $row_get_staff_ID['MSNV'] ?> )">Cập nhật</button>
									<?php
										}
									?>
								</td>
							</tr>
					<?php
						}else{
					?>
							<tr class="manage-content-list">
								<td class="manage-content-list-item"><?php echo $row_info_bill['TenHH'] ?></td>
								<td class="manage-content-list-item"><?php echo $row_info_bill['SoLuong'] ?></td>
								<td class="manage-content-list-item"><?php echo number_format($row_info_bill['GiaTien']) ?></td>
								<td class="manage-content-list-item"><?php echo $row_info_bill['GiamGia'] ?></td>
								<td class="manage-content-list-item"><?php echo number_format($row_info_bill['ThanhTien']) ?></td>
							</tr>
						</tr>
				<?php
							}
						}
					}
				?>
			</table>
		</div>
	</div>
</div>

<!-- Modal layout -->
<!-- Modal--active -->
<div class="modal">
	<!-- modal__overlay--active -->
	<div class="modal__overlay"></div>
	<div class="modal__body">
		<!-- Register form -->
		<div class="auth-form">
			<div class="auth-form__container">
				<div class="auth-form__header">
					<h3 class="auth-form__heading">Đăng ký</h3>
					<span class="auth-form__switch-btn">Đăng nhập</span>
				</div>

				<div class="auth-form__form">
					<div class="auth-form__group">
						<input type="text" class="auth-form__input" placeholder="Email của bạn">
					</div>
					<div class="auth-form__group">
						<input type="password" class="auth-form__input" placeholder="Mật khẩu của bạn">
					</div>
					<div class="auth-form__group">
						<input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu">
					</div>
				</div>

				<div class="auth-form__aside">
					<p class="auth-form__policy-text">
						Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về
						<a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
						<a href="" class="auth-form__text-link">Chính sách bảo mật</a>
					</p>
				</div>

				<div class="auth-form__controls">
					<button onclick="deactiveModal(0)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
					<button class="btn btn--primary">ĐĂNG KÝ</button>
				</div>
			</div>

			<div class="auth-form__socials">
				<a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
					<i class="auth-form__socials-icon fab fa-facebook-square"></i>
					<span class="auth-form__social-title">
						Kết nối với Facebook
					</span>
				</a>
				<a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
					<i class=" auth-form__socials-icon fab fa-google"></i>
					<span class="auth-form__social-title">
						Kết nối với Google
					</span>
				</a>
			</div>
		</div>

		<!-- Login form -->
		<div class="auth-form">
			<div class="auth-form__container">
				<div class="auth-form__header">
					<h3 class="auth-form__heading">Đăng nhập</h3>
					<span class="auth-form__switch-btn">Đăng ký</span>
				</div>

				<div class="auth-form__form">
					<div class="auth-form__group">
						<input type="text" class="auth-form__input" placeholder="Email của bạn">
					</div>
					<div class="auth-form__group">
						<input type="password" class="auth-form__input" placeholder="Mật khẩu của bạn">
					</div>
				</div>

				<div class="auth-form__aside">
					<div class="auth-form__help">
						<a href="" class="auth-form__help-link auth-form__help-forgot">
							Quên mật khẩu
						</a>
						<span class="auth-form__help-separate"></span>
						<a href="" class="auth-form__help-link">
							Cần trợ giúp?
						</a>
					</div>
				</div>

				<div class="auth-form__controls">
					<button onclick="deactiveModal(1)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
					<button class="btn btn--primary">ĐĂNG NHẬP</button>
				</div>
			</div>

			<div class="auth-form__socials">
				<a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
					<i class="auth-form__socials-icon fab fa-facebook-square"></i>
					<span class="auth-form__social-title">
						Kết nối với Facebook
					</span>
				</a>
				<a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
					<i class=" auth-form__socials-icon fab fa-google"></i>
					<span class="auth-form__social-title">
						Kết nối với Google
					</span>
				</a>
			</div>
		</div>
	</div>
</div>