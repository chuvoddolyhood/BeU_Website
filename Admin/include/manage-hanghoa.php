<?php
	$sql_product = mysqli_query($con, 'select * from hanghoa hh join hinhhanghoa H where hh.MSHH = H.MSHH group by TenHH ORDER By hh.MSHH ASC');
	$sql_category = mysqli_query($con, 'select * from loaihanghoa');

	include("include/list-category.php");
?>


<div id="manage-main-body">
	<?php
		include("include/content-header.php");
	?>

	<div>
		<span class="manage-header1">Hàng hóa</span>
		<span class="manage-header2 deactive-header">Danh mục</span>
	</div>
	<div class="manage-content-wrap manage-content1">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 2.5%;">
					<col style="width: 7.5%;">
					<col style="width: 12.5%">
					<col style="width: 5%;">
					<col style="width: 7.5%;">
					<col style="width: 5%;">
					<col style="width: 5%">
					<col style="width: 5%;">
					<col style="width: 5%;">
					<col style="width: 7.5%;">
					<col style="width: 5%;">
					<col style="width: 5%;">
					<col style="width: 5%">
					<col style="width: 7.5%;">
					<col style="width: 7.5%;">
					<col style="width: 7.5%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Mã HH</th>
					<th class="manage-content-list-header">Hình ảnh</th>
					<th class="manage-content-list-header">Tên hàng</th>
					<th class="manage-content-list-header">Quy cách</th>
					<th class="manage-content-list-header">Giá</th>
					<th class="manage-content-list-header">Số lượng</th>
					<th class="manage-content-list-header">Mã loại</th>
					<th class="manage-content-list-header">Đã bán</th>
					<th class="manage-content-list-header">Giảm giá</th>
					<th class="manage-content-list-header">Loại SP</th>
					<th class="manage-content-list-header">Hãng</th>
					<th class="manage-content-list-header">Nơi SX</th>
					<th class="manage-content-list-header">Tình trạng</th>
					<th class="manage-content-list-header">Bảo hành</th>
					<th class="manage-content-list-header">Đặc biệt</th>
					<th class="manage-content-list-header">Chỉnh sửa</th>
				</tr>
				<?php
					while($row_address = mysqli_fetch_array($sql_product)){
				?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item"><?php echo $row_address['MSHH'] ?></td>
						<td class="manage-content-list-item">
							<img class="manage-product-img" src="../Process\assets\img\<?php echo $row_address['TenHinh'] ?>" alt="">
						</td>
						<td class="manage-content-list-item"><?php echo $row_address['TenHH'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['QuyCach'] ?></td>
						<td class="manage-content-list-item"><?php echo number_format($row_address['Gia']) ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['SoLuongHang'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['MaLoaiHang'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['DaBan'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['GiamGia'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['LoaiSanPham'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['HangHangHoa'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['NoiSXHangHoa'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['TinhTrang'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['BaoHanh'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['DacBiet'] ?></td>
						<td class="manage-content-list-item">
							<button class="button_edit_product">Chỉnh sửa</button>
						</td>
					</tr>
				<?php
					}
				?>
			</table>
			<div class="manage-footer">
				<button onclick="activeModal(0)" class="manage-btn">Thêm hàng hóa</button>
			</div>
		</div>
	</div>
	<div class="manage-content-wrap deactive-manage manage-content2">
		<div class="grid__column-7">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 30%;">
					<col style="width: 50%">
					<col style="width: 20%">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Mã loại hàng</th>
					<th class="manage-content-list-header">Tên loại hàng</th>
					<th class="manage-content-list-header">Đã bán</th>
				</tr>
				<?php
					while($row_category = mysqli_fetch_array($sql_category)){
						$sql_category_totalsale = mysqli_fetch_array(mysqli_query($con, 'select sum(daban) from hanghoa where MaLoaiHang='.$row_category['MaLoaiHang']));
				?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item"><?php echo $row_category['MaLoaiHang'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_category['TenLoaiHang'] ?></td>
						<td class="manage-content-list-item"><?php echo $sql_category_totalsale['sum(daban)'] ?></td>
					</tr>
				<?php
					}
				?>
			</table>
			<div class="manage-footer">
				<button onclick="activeModal(1)" class="manage-btn">Thêm danh mục</button>
			</div>
		</div>
		<div class="grid__column-5">
			<div class="manage-content-box">
				<p>Tổng số lượng bán</p>
				<div id="chart">
					<script>renderChart(
					<?php
						$count_name_category = mysqli_fetch_array(mysqli_query($con, 'select count(MaLoaiHang) from LoaiHangHoa'));
						$max_category = (int)$count_name_category['count(MaLoaiHang)'];
						$i = 1;

						$sql_name_category = mysqli_query($con, 'select MaLoaiHang from LoaiHangHoa');
						$sql_number_category = mysqli_query($con, 'select MaLoaiHang from LoaiHangHoa');

						while($row_number_category = mysqli_fetch_array($sql_number_category)){
							$topsale_number_category = mysqli_fetch_array(mysqli_query($con, 'select sum(daban) from hanghoa where MaLoaiHang='.$row_number_category['MaLoaiHang']));
							echo $topsale_number_category['sum(daban)'].", ";
					}

						while($row_name_category = mysqli_fetch_array($sql_name_category)){
							$topsale_name_category = mysqli_fetch_array(mysqli_query($con, 'select TenLoaiHang from LoaiHangHoa where MaLoaiHang='.$row_name_category['MaLoaiHang']));
							if($i < $max_category){
								$i++;
								echo "'".$topsale_name_category['TenLoaiHang']."'";
								echo ", ";
							}
							else
								echo "'".$topsale_name_category['TenLoaiHang']."'";
						}
						echo ');';
					?>
					</script>
				</div>
			</div>
		</div>
		<div class="manage-clear-fix"></div>
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
						<h3 class="auth-form__heading">Thêm hàng hóa</h3>
					</div>

					<div class="auth-form__form">
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Tên sản phẩm" required>
							<input type="text" class="auth-form__input" placeholder="Loại sản phẩm" required>
						</div>
						<div class="auth-form__group">
							<input type="number" min="1" step="any" class="auth-form__input" placeholder="Giá" required>
							<input type="number" min="0" class="auth-form__input" placeholder="Số lượng hàng" required>
							<input type="number" min="0" max="100" class="auth-form__input" placeholder="Giảm giá" required>
						</div>
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Quy cách" required>
							<input type="number" min="1" step="1" class="auth-form__input" placeholder="Mã loại" required>
							<input type="text" class="auth-form__input" placeholder="Hãng" required>
						</div>
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Nơi sản xuất">
							<input type="text" class="auth-form__input" placeholder="Tình trạng" required>
							<input type="text" class="auth-form__input" placeholder="Bảo hành" required>
						</div>
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Đặc biệt" required>
						</div>
					</div>

					<div class="auth-form__controls">
						<button onclick="deactiveModal(0)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button class="btn btn--primary">XÁC NHẬN</button>
					</div>
				</div>
			</div>

			<!-- add staff form -->
			<!-- auth-form--active -->
			<div class="auth-form">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">Thêm danh mục</h3>
					</div>

					<div class="auth-form__form">
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Mã loại hàng" required>
						</div>
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Tên loại hàng" required>
						</div>
					</div>
					<div class="auth-form__controls">
						<button onclick="deactiveModal(1)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button class="btn btn--primary">XÁC NHẬN</button>
					</div>
				</div>
			</div>

			<!-- edit product info form -->
			<!-- auth-form--active -->
			<div class="auth-form">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">Sửa thông tin hàng hóa</h3>
					</div>

					<div class="auth-form__form">
						<div class="auth-form__group">
							<input id="product_Name" type="text" class="auth-form__input" placeholder="Tên sản phẩm" required>
							<input id="product_Category" type="text" class="auth-form__input" placeholder="Loại sản phẩm" required>
						</div>
						<div class="auth-form__group">
							<input id="product_Price" type="text" min="1" step="any" class="auth-form__input" placeholder="Giá" required>
							<input id="product_Amount" type="number" min="0" class="auth-form__input" placeholder="Số lượng hàng" required>
							<input id="product_Saleoff" type="number" min="0" max="100" class="auth-form__input" placeholder="Giảm giá" required>
						</div>
						<div class="auth-form__group">
							<input id="product_Packing" type="text" class="auth-form__input" placeholder="Quy cách" required>
							<input id="product_CategoryID" type="number" min="1" step="1" class="auth-form__input" placeholder="Mã loại" required>
							<input id="product_Manufacturer" type="text" class="auth-form__input" placeholder="Hãng" required>
						</div>
						<div class="auth-form__group">
							<input id="product_Country" type="text" class="auth-form__input" placeholder="Nơi sản xuất">
							<input id="product_Status" type="text" class="auth-form__input" placeholder="Tình trạng" required>
							<input id="product_Warranty" type="text" class="auth-form__input" placeholder="Bảo hành" required>
						</div>
						<div class="auth-form__group">
							<input id="product_Special" type="text" class="auth-form__input" placeholder="Đặc biệt" required>
							<input id="product_ID" type="text" class="auth-form__input" placeholder="Mã hàng hóa" required>
						</div>
					</div>

					<div class="auth-form__controls">
						<button onclick="deactiveModal(2)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button onclick="change_product_info()" class="btn btn--primary">XÁC NHẬN</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.button_edit_product').on('click', function(){
			activeModal(2);

			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#product_ID').val(data[0]);
			$('#product_Name').val(data[2]);
			$('#product_Category').val(data[9]);
			$('#product_Price').val(data[4]);
			$('#product_Amount').val(data[5]);
			$('#product_Saleoff').val(data[8]);
			$('#product_Packing').val(data[3]);
			$('#product_CategoryID').val(data[6]);
			$('#product_Manufacturer').val(data[10]);
			$('#product_Country').val(data[11]);
			$('#product_Status').val(data[12]);
			$('#product_Warranty').val(data[13]);
			$('#product_Special').val(data[14]);
		});
	});
</script>