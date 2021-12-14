<?php
	$sql_billprocessing = mysqli_query($con, "select dh.SoDonDH, TenHinh, TenHH, LoaiSanPham, Gia, ct.GiamGia, ThanhTien, TrangThaiDH, TrangThaiDH, SoLuong from dathang dh, chitietdathang ct, hinhhanghoa H, hanghoa hh where dh.TaiKhoanKH='".$_SESSION['login']."' and dh.TrangThaiDH='1' and ct.MSHH=H.MSHH and H.MSHH=hh.MSHH and dh.SoDonDH=ct.SoDonDH group by MaChiTiet order by TrangThaiDH DESC, SoDonDH");
?>

<!-- Bill have done -->
<div class="grid__column-9-5">
	<div class="my-profile-item-wrap">
		<div class="my-profile-category">
			<span class="my-profile-category-label">Danh sách sản phẩm đã hoàn thành</span>
		</div>
		<table class="manage-content-table">
			<colgroup>
				<col style="width: 5%;">
				<col style="width: 50%">
				<col style="width: 5%;">
				<col style="width: 10%;">
				<col style="width: 5%;">
				<col style="width: 10%">
				<col style="width: 17.5%;">
			</colgroup>

			<tr class="manage-content-list">
				<th class="manage-content-list-header">Mã đơn</th>
				<th class="manage-content-list-header">Tên sản phẩm</th>
				<th class="manage-content-list-header">Số lượng</th>
				<th class="manage-content-list-header">Giá tiền</th>
				<th class="manage-content-list-header">Giảm giá</th>
				<th class="manage-content-list-header">Thành tiền</th>
				<th class="manage-content-list-header">Trạng thái</th>
			</tr>
			<?php
				while($row_billprocessing = mysqli_fetch_array($sql_billprocessing)){
			?>
				<tr class="manage-content-list">
					<td class="manage-content-list-item">
						<?php echo $row_billprocessing['SoDonDH'] ?>
					</td>
					<td class="manage-content-list-item">
						<div class="table-cell-item">
							<img src="./Process/assets/img/<?php echo $row_billprocessing['TenHinh'] ?>" alt="" class="table-cell-item-img">
							<div class="table-cell-item-info">
								<div class="table-cell-item-head">
									<h5 class="table-cell-item-name">
										<?php echo $row_billprocessing['TenHH'] ?>
									</h5>
								</div>
								<div class="table-cell-item-body">
									<span class="table-cell-item-description">
										<?php echo $row_billprocessing['LoaiSanPham'] ?>
									</span>
								</div>
							</div>
						</div>
					</td>
					<td class="manage-content-list-item">
						<?php echo $row_billprocessing['SoLuong'] ?>
					</td>
					<td class="manage-content-list-item">
						<?php echo number_format($row_billprocessing['Gia']) ?>
					</td>
					<td class="manage-content-list-item">
						<?php echo $row_billprocessing['GiamGia'] ?>
					</td>
					<td class="manage-content-list-item">
						<?php echo number_format($row_billprocessing['ThanhTien']) ?>
					</td>
					<td class="manage-content-list-item">
						<div class="my-profile-category-status">
							Đã hoàn thành
						</div>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
</div>