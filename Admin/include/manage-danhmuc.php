<?php 
	$sql_product = mysqli_query($con, 'select * from hanghoa order by daban desc limit 3;');
	$sql_total_sale_else = mysqli_query($con, 'select sum(daban) from hanghoa where daban<(select daban from hanghoa order by daban desc limit 1 OFFSET 2)');
	$row_total_sale_else = mysqli_fetch_array($sql_total_sale_else);

	$topsale_product_1 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 0'));
	$topsale_product_2 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 1'));
	$topsale_product_3 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 2'));

	include("include/list-category.php");
?>

<div id="manage-main-body">
	<?php
		include("include/content-header.php");
	?>
	
	<div class="statistic-wrap">
		<?php
			$sql_get_number_customer = mysqli_query($con, "select count(MSKH) from khachhang;");
			$sql_get_number_product = mysqli_query($con, "select count(MSHH) from hanghoa;");
			$sql_get_number_billdone = mysqli_query($con, "select count(SoDonDH) from dathang where TrangThaiDH=1;");
			$sql_get_number_billprocessing = mysqli_query($con, "select count(SoDonDH) from dathang where TrangThaiDH!=1;");

			$row_get_number_customer = mysqli_fetch_array($sql_get_number_customer);
			$row_get_number_product = mysqli_fetch_array($sql_get_number_product);
			$row_get_number_billdone = mysqli_fetch_array($sql_get_number_billdone);
			$row_get_number_billprocessing = mysqli_fetch_array($sql_get_number_billprocessing);
		?>
		<div class="grid__column-3">
			<a href="?quanly=khachhang">
				<div class="statistic-box">
					<p><?php echo $row_get_number_customer['count(MSKH)'] ?><br><span>Khách</span></p>
					<i class="statistic-box-icon fas fa-users"></i>
				</div>
			</a>
		</div>
		<div class="grid__column-3">
			<a href="?quanly=hanghoa">
				<div class="statistic-box">
					<p><?php echo $row_get_number_product['count(MSHH)'] ?><br><span>Sản phẩm</span></p>
					<i class="statistic-box-icon fas fa-boxes"></i>
				</div>
			</a>
		</div>
		<div class="grid__column-3">
			<a href="?quanly=donhang">
				<div class="statistic-box">
					<p><?php echo $row_get_number_billdone['count(SoDonDH)'] ?><br><span>Đơn đã bán</span></p>
					<i class="statistic-box-icon fas fa-dolly-flatbed"></i>
				</div>
			</a>
		</div>
		<div class="grid__column-3">
			<a href="?quanly=donhang">
				<div class="statistic-box">
					<p><?php echo $row_get_number_billprocessing['count(SoDonDH)'] ?><br><span>Đơn chờ</span></p>
					<i class="statistic-box-icon fas fa-receipt"></i>
				</div>
			</a>
		</div>

		<div class="manage-clear-fix"></div>
	</div>

	<div class="manage-content-wrap">
		<div class="grid__column-7">
			<div class="manage-content-box">
				<p>Sản phẩm bán chạy nhất <a href="?quanly=hanghoa"><span>Xem tất cả</span></a></p>
				<br>
				<table class="manage-content-table">
					<colgroup>
						<col style="width: 55%">
						<col style="width: 15%">
						<col style="width: 15%">
						<col style="width: 15%">
					</colgroup>
					<tr class="manage-content-list">
						<th class="manage-content-list-header">Tên sản phẩm</th>
						<th class="manage-content-list-header">Hãng</th>
						<th class="manage-content-list-header">Nơi SX</th>
						<th class="manage-content-list-header">Đã bán</th>
					</tr>
					<?php 
						while($row_product = mysqli_fetch_array($sql_product)){
					?>
						<tr class="manage-content-list">
							<td class="manage-content-list-item"><?php echo $row_product['TenHH'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['HangHangHoa'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['NoiSXHangHoa'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['DaBan'] ?></td>
						</tr>
					<?php 
						}
					?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item">Các sản phẩm khác</td>
						<td class="manage-content-list-item">...</td>
						<td class="manage-content-list-item">...</td>
						<td class="manage-content-list-item">
							<?php echo $row_total_sale_else['sum(daban)'] ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="grid__column-5">
			<div class="manage-content-box">
				<p>Tổng số lượng bán</p>
				<div id="chart">
					<script>renderChart(
						<?php
							echo $topsale_product_1['daban'].", ";
							echo $topsale_product_2['daban'].", ";
							echo $topsale_product_3['daban'].", ";
							echo $row_total_sale_else['sum(daban)'].", ";
							echo "'".$topsale_product_1['TenHH']."', ";
							echo "'".$topsale_product_2['TenHH']."', ";
							echo "'".$topsale_product_3['TenHH']."', ";
							echo "'".'Sản phẩm khác'."'";
							echo ");";
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="manage-clear-fix"></div>
	</div>
</div>