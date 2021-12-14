<?php
	$sql_address = mysqli_query($con, 'select HoTenKH, TenCongTy, SoDienThoai, DiaChi from khachhang kh, diachikh dc where kh.MSKH = dc.MSKH;');

	include("include/list-category.php");
?>

<div id="manage-main-body">
	<?php
		include("include/content-header.php");
	?>

	<div>
		<span class="manage-header">Danh sách địa chỉ</span>
	</div>
	<div class="manage-content-wrap">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 20%;">
					<col style="width: 20%;">
					<col style="width: 20%;">
					<col style="width: 40%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Tên khách hàng</th>
					<th class="manage-content-list-header">Tên Công ty</th>
					<th class="manage-content-list-header">Số điện thoại</th>
					<th class="manage-content-list-header">Địa chỉ</th>
				</tr>
				<?php
					while($row_address = mysqli_fetch_array($sql_address)){
				?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item"><?php echo $row_address['HoTenKH'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['TenCongTy'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['SoDienThoai'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['DiaChi'] ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</div>