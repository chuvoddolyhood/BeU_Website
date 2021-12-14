<?php 
	
	if(!isset($_SESSION['login'])){
		echo "<script> alert('Vui lòng đăng nhập để thực hiện chức năng này'); window.location = './index.php?status=login'; </script>";
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}

	$sql_chitiet = mysqli_query($con, "select * from HangHoa where MSHH = '$id'");
?>


<?php 
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
		$string_1 = "select * from HinhHangHoa where MSHH=".$id;
		$sql_img = mysqli_query($con, $string_1);
		$row_hinhanh = mysqli_fetch_array($sql_img);

		$var_giamgia = $row_chitiet['Gia'] * (100 - $row_chitiet['GiamGia']) / 100;
?>
	<script src="./Process/javascript/add_cart.js"></script>
	<script>
		var id_product = <?php echo $id ?>;
	</script>
	<div class="app__container">
		<div class="grid">
			<div class="grid__row row__information product-detail">
				<div class="grid__column-6">
					<div class="product-information">
						<div class="product-information__img-wrap">
							<img class="product-information__img" src="Process/assets/img/<?php echo $row_hinhanh['TenHinh'] ?>" alt="">
						</div>
					</div>
				</div>

				<div class="grid__column-6">
					<div class="product-information">
						<div id="product_name" class="product-information__product-name"><?php echo $row_chitiet['TenHH'] ?></div>
						<div>
							<span class="product-information__rating">
								Chưa có đánh giá
							</span>
							<span class="product-information--separate"></span>
							<span class="product-information__sold">
								<?php echo $row_chitiet['DaBan']." Đã bán" ?>
							</span>
						</div>
						<span class="product-information__list-header">
							Thông tin chung:
						</span>
						<div class="product-information__product-detail">
							<ul class="product-information__list">
								<li class="product-information__list-item">
									ID sản phẩm: 
									<span id="product_id" class="product-information__text"><?php echo $row_chitiet['MSHH'] ?></span>
								</li>
								<li class="product-information__list-item">
									Loại sản phẩm: 
									<span id="product_category" class="product-information__text"><?php echo $row_chitiet['LoaiSanPham'] ?></span>
								</li>
								<li class="product-information__list-item">
									Hãng sản xuất: 
									<span id="product_manufacturer" class="product-information__text"><?php echo $row_chitiet['HangHangHoa'] ?></span>
								</li>
								<li class="product-information__list-item">
									Tình trạng: 
									<span id="product_status" class="product-information__text"><?php echo $row_chitiet['TinhTrang'] ?></span>
								</li>
								<li class="product-information__list-item">
									Bảo hành: 
									<span id="product_guarantee" class="product-information__text"><?php echo $row_chitiet['BaoHanh'] ?></span>
								</li>
								<li class="product-information__list-item">
									Đặc biệt: 
									<span id="product_special" class="product-information__text"><?php echo $row_chitiet['DacBiet'] ?></span>
								</li>
							</ul>
						</div>
						<div class="product-information__bottom">
							<div class="product-information__price">
								<!-- product-information__old-price--active -->
								<span class="product-information__old-price"><?php echo number_format($row_chitiet['Gia'])."đ" ?></span>
								<div class="product-information__sale-price">
									<span id="product_price" class="product-information__current-price"><?php echo number_format($var_giamgia) ?> </span>
									<span class="product-information__current-price">đ</span>
									<!-- product-information__saleoff-badge--active -->
									<span class="product-information__saleoff-badge">
										<?php echo number_format($row_chitiet['GiamGia'])."% GIẢM" ?>
									</span>
								</div>
							</div>

							<div class="input-quantity">
								<div class="input-quantity-wrap">
									<button onmousedown="mouseDown_dec()" onmouseup="mouseUp(<?php echo number_format($row_chitiet['SoLuongHang']) ?>)" onmouseleave="mouseLeave()" class="btn-adjust-amount">-</button>
									<input id="input-amount" value="1" class="input-amount"></input>
									<button onmousedown="mouseDown_inc(<?php echo number_format($row_chitiet['SoLuongHang']) ?>)" onmouseup="mouseUp(<?php echo number_format($row_chitiet['SoLuongHang']) ?>)" onmouseleave="mouseLeave()" class="btn-adjust-amount">+</button>
								</div>

								<span><?php echo number_format($row_chitiet['SoLuongHang'])." Sản phẩm có sẵn" ?></span>
							</div>

							<div class="product-information__activity">
								<button onclick="add_product_cart()" class="btn-buy add-cart">
									<i class="add-cart-icon fas fa-cart-plus"></i>
									Thêm vào giỏ hàng
								</button>
								<button onclick="add_product_cart('true')" class="btn-buy buy-now">
									Mua ngay
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
		if($row_chitiet['Gia'] > $var_giamgia){
			echo '<script type="text/javascript">',
			'activeOldPrice_detail();',
			'activeSaleOffBadge_detail();',
			'</script>';
		}
	}
?>