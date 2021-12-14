<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}

	$sql_category = mysqli_query($con, 'select * from LoaiHangHoa');

	if(isset($_SESSION['login'])){
		$user_name = $_SESSION['login'];
		$sql_get_iduser = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='$user_name'");
		$row_get_iduser = mysqli_fetch_array($sql_get_iduser);

		$iduser = $row_get_iduser['MSKH'];
	}else{
		$iduser = 0;
	}

	if(isset($_GET['search'])){
		$searchText = $_GET['search'];
		$sql_insert_history = mysqli_query($con, "INSERT into lichsutimkiem(MSKH, LichSu) VALUES ('$iduser', '$searchText');");
	}
?>
<div class="app__container">
	<div class="grid">
		<div class="grid__row app_content">
			<div class="grid__column-2">
				<nav class="category">
					<h3 class="category__heading">
						<i class="category__heading-icon fas fa-list"></i>
						Danh Mục
					</h3>


					<ul class="category-list">
						<?php
							while($row_category = mysqli_fetch_array($sql_category)){
						?>
							<!-- category-item--active -->
							<li class="category-item">
								<a value="<?php echo $row_category['MaLoaiHang'] ?>" href="?quanly=danhmuc&id=<?php echo $row_category['MaLoaiHang'] ?>" class="category-item__link">
									<?php echo $row_category['TenLoaiHang'] ?>
								</a>
							</li>
						<?php
							if($id > 0){
								echo '<script type="text/javascript">',
								'active_home_category('.$id.');',
								'</script>'
								;
								} 
							}
						?>
					</nav>
				</div>

				<div class="grid__column-10">
					<div class="home-filter">
						<spam class="home-filter__label">Sắp xếp theo</spam>
						<button class="home-filter__btn btn">Phổ biến</button>
						<button class="home-filter__btn btn btn--primary">Mới nhất</button>
						<button class="home-filter__btn btn">Bán chạy</button>

						<div class="select-input">
							<span class="select-input__label">Giá</span>
							<i class="select-input__icon fas fa-angle-down"></i>

							<!-- List option -->
							<ul class="select-input__list">
								<li class="select-input__item">
									<a href="" class="select-input__link">Giá: Thấp đến cao</a>
								</li>
								<li class="select-input__item">
									<a href="" class="select-input__link">Giá: Cao đến thấp</a>
								</li>
							</ul>
						</div>

						<div class="home-filter__page">
							<span class="home-filter__page-num">
								<span class="home-filter__page-curent">1</span>/14
							</span>

							<div class="home-filter__page-control">
								<a href="" class="home-filter__page-btn home-filter__page-btn--disable">
									<i class="home-filter__page-icon fas fa-angle-left"></i>
								</a>
								<a href="" class="home-filter__page-btn">
									<i class="home-filter__page-icon fas fa-angle-right"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="home-product">
						<div class="grid__row">

							<!-- Product-item -->
							<?php 
								if($id>0){
									$sql_sanpham_by_danhmuc = mysqli_query($con, "select * from LoaiHangHoa, HangHoa where LoaiHangHoa.MaLoaiHang = HangHoa.MaLoaiHang and HangHoa.MaLoaiHang='$id'");
								}elseif(isset($_GET['search'])){
									$search = $_GET['search'];
									$sql_sanpham_by_danhmuc = mysqli_query($con, "select * from HangHoa where TenHH like '%".$search."%' or LoaiSanPham like '%".$search."%' or DacBiet like '%".$search."%'");
								}else{
									$sql_sanpham_by_danhmuc = mysqli_query($con, "select * from HangHoa");
								}

								$var_ID = 1;

								while($row_sanpham = mysqli_fetch_array($sql_sanpham_by_danhmuc)){
									$string_1 = "select * from HinhHangHoa where MSHH=";
									$string_2 = $row_sanpham['MSHH'];
									$sql_img = mysqli_query($con, $string_1."".$string_2);
									$sql_hinhanh = mysqli_fetch_array($sql_img);

									$row_img = mysqli_fetch_array(mysqli_query($con, "select * from HinhHangHoa where MSHH="."".$row_sanpham['MSHH']));

									$var_giamgia = $row_sanpham['Gia'] * (100 - $row_sanpham['GiamGia']) / 100;
									$sql_product_fav = mysqli_query($con, "select * from sanphamyeuthich where MSHH='$string_2' and MSKH='$iduser'");
									$row_product_fav = mysqli_fetch_array($sql_product_fav);
							?>
								<div class="grid__column-2-4">
									<div class="home-product-item-wrap">
										<a href="?quanly=chitietsp&id=<?php echo $row_sanpham["MSHH"] ?>" class="home-product-item">
											<div class="home-product-item__img" style="background-image: url(./Process/assets/img/<?php echo $row_img['TenHinh'] ?>);"></div>
											<h4 class="home-product-item__name"><?php echo $row_sanpham['TenHH'] ?></h4>
											<div class="home-product-item__price">
												<span class="home-product-item__price-old"><?php echo number_format($row_sanpham['Gia'])."đ" ?></span>
												<span class="home-product-item__price-current"><?php echo number_format($var_giamgia)."đ" ?></span>
											</div>
										</a>

										<div class="home-product-item__action">
											<!-- home-product-item__like--liked -->
										<?php
											if($row_product_fav['MSHH'] !=null ){
										?>
											<span id="home-product-item__like">
												<i onclick="itemLiked(<?php echo $var_ID ?>)" class="home-product-item__liked-icon fas fa-heart"></i>

										<?php
											}else{
										?>
											<span id="home-product-item__like">
												<i onclick="itemLike(<?php echo $var_ID ?>)" class="home-product-item__like-icon far fa-heart"></i>
										<?php
											}
													
										?>
											</span>

											<div class="home-product-item__rating">
												<i class="home-product-item__star--gold fas fa-star"></i>
												<i class="home-product-item__star--gold fas fa-star"></i>
												<i class="home-product-item__star--gold fas fa-star"></i>
												<i class="home-product-item__star--gold fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>

											<span class="home-product-item__sold"><?php echo $row_sanpham['DaBan']." đã bán" ?></span>
										</div>
										<div class="home-product-item__origin">
											<span class="home-product-item__brand"><?php echo $row_sanpham['HangHangHoa'] ?></span>
											<span class="home-product-item__origin-name"><?php echo $row_sanpham['NoiSXHangHoa'] ?></span>
										</div>

										<div class="home-product-item__favourite" onclick="return false">
											<i class="fas fa-check"></i>
											<span>Yêu thích</span>
										</div>

										<div class="home-product-item__sale-off">
											<span class="home-product-item__sale-off-percent"><?php echo $row_sanpham['GiamGia']."%" ?></span>
											<span class="home-product-item__sale-off-label">GIẢM</span>
										</div>
									</div>
								</div>
							<?php  
									if($row_sanpham['Gia'] > $var_giamgia){
										echo '<script type="text/javascript">',
										'activeOldPrice('.$var_ID.');',
										'activeSaleOffBadge('.$var_ID.');',
										'</script>'
										;
									}
									$var_ID = $var_ID + 1;
								}
							?>
						</div>
					</div>

					<ul class="home-product__pagination pagination">
						<li class="pagination-item">
							<a href="" class="pagination-item__link">
								<i class="pagination-item__icon fas fa-angle-left"></i>
							</a>
						</li>
						<li class="pagination-item pagination-item--active">
							<a href="" class="pagination-item__link">1</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">2</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">3</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">4</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">5</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">...</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">14</a>
						</li>
						<li class="pagination-item">
							<a href="" class="pagination-item__link">
								<i class="pagination-item__icon fas fa-angle-right"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>