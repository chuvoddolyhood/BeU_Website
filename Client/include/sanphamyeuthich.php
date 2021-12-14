<?php
	$sql_get_user_ID = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='".$_SESSION['login']."'");
	$row_get_user_ID = mysqli_fetch_array($sql_get_user_ID);
?>
<!-- favorite product -->
<div class="grid__column-9-5">
	<div class="home-product">
		<div class="grid__row">
			<?php
				$sql_sanpham_yeuthich = mysqli_query($con, "select * from hanghoa hh, sanphamyeuthich yt, khachhang kh where hh.MSHH = yt.MSHH and yt.MSKH=kh.MSKH and kh.TaiKhoanKH='".$_SESSION['login']."'");

				$var_ID = 1;

				while($row_sanpham = mysqli_fetch_array($sql_sanpham_yeuthich)){
					$string_1 = "select * from HinhHangHoa where MSHH=";
					$string_2 = $row_sanpham['MSHH'];
					$sql_img = mysqli_query($con, $string_1."".$string_2);
					$sql_hinhanh = mysqli_fetch_array($sql_img);

					$row_img = mysqli_fetch_array(mysqli_query($con, "select * from HinhHangHoa where MSHH="."".$row_sanpham['MSHH']));

					$var_giamgia = $row_sanpham['Gia'] * (100 - $row_sanpham['GiamGia']) / 100;
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
							<span id="home-product-item__like">
								<i onclick="itemLiked(<?php echo $var_ID ?>)" class="home-product-item__liked-icon fas fa-heart"></i>
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
						'</script>';
					}
					$var_ID++;
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