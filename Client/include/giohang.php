<?php
	if(!isset($_SESSION['login'])){
		echo "<script> alert('Bạn cần đăng nhập để sử dụng chức năng này'); </script>";
		header('location: ./index.php');
	}else{
		$sql_get_cart_list_item = mysqli_query($con, "select gh.MSHH, TenHinh, TenHangHoa, Gia, SoLuong, PhanLoai from hinhhanghoa h, giohang gh, khachhang kh where gh.TaiKhoanKH = kh.TaiKhoanKH and h.MSHH=gh.MSHH and kh.TaiKhoanKH = '".$_SESSION['login']."'");
		$test_sql_get_cart_list = mysqli_query($con, "select MSHH from giohang where TaiKhoanKH = '".$_SESSION['login']."'");
	}
?>
<script src="Process/javascript/check_order_bill.js"></script>
<div class="app__container">
	<div class="grid">
		<div class="grid__row app_content">
			<div class="grid__column-8 cart__info">
				<ul class="cart-list">
					<?php
						$total_price = 0;
						$test_row_get_cart_list = mysqli_fetch_array($test_sql_get_cart_list);
						if($test_row_get_cart_list['MSHH']==null){
							echo "<script> 
									alert('Hãy thêm ít nhất 1 món hàng để sử dụng chức năng này!') 
									window.location='index.php';
								</script>";
						}
						while($row_get_cart_list_item = mysqli_fetch_array($sql_get_cart_list_item)){
							$total_price = $total_price + $row_get_cart_list_item['Gia']*$row_get_cart_list_item['SoLuong'];
					?>
						<li class="cart-item">
							<div class="cart-item-left">
								<!-- <input class="cart-item-checkbox" type="checkbox" name=""> -->
								<div class="img-wrap">
									<img class="cart-item-img" src="./Process/assets/img/<?php echo $row_get_cart_list_item['TenHinh'] ?>" alt="">
								</div>
								<div class="cart-item-content">
									<span class="cart-item-name"><?php echo $row_get_cart_list_item['TenHangHoa'] ?></span>
									<div class="cart-item-detail">
										<span id="cart-item-detail-label">Loại sản phẩm: </span>
										<span class="cart-item-detail-name"><?php echo $row_get_cart_list_item['PhanLoai'] ?></span>
									</div>
									<div class="cart-item-detail">
										<span class="cart-item-detail-label">ID sản phẩm: </span>
										<span id="cart-item-detail-id"><?php echo $row_get_cart_list_item['MSHH'] ?></span>
									</div>
								</div>
							</div>
							<div class="cart-item-middle">
								<span class="cart-item-price"><?php echo number_format($row_get_cart_list_item['Gia']) ?>đ</span>
								<div class="cart-item-wrap">
									<!-- <i class="cart-item-middle-icon far fa-heart"></i> -->
									<i onclick="remove_item_cart(<?php echo $row_get_cart_list_item['MSHH'] ?>)" class="cart-item-middle-icon far fa-trash-alt"></i>
								</div>
							</div>
							<div class="cart-item-right">
								<span class="cart-item-amount-label">Số lượng:</span>
								<span class="cart-item-amount-label"><?php echo $row_get_cart_list_item['SoLuong'] ?> </span>
							</div>
						</li>
					<?php
						}
					?>
				</ul>


			</div>
			<div class="grid__column-4">
				<div class="cart__info">
					<span class="cart__user-info-header">THÔNG TIN GIAO HÀNG:</span>
					<span class="cart__bill-banking-label">Thanh toán qua ngân hàng để được nhận ngay voucher 5% cho lần mua tiếp theo!</span>
					<div class="cart__user-info">
						<i class="cart__user-info-icon fas fa-list"></i>
						<select onchange="activebanking()" name="" id="user_payment_method">
							<option class="cart__user-info-label" value="">Ship COD</option>
							<option class="cart__user-info-label" value="">Thanh toán ngân hàng</option>
						</select>
					</div>
					<div class="cart__user-info">
						<i class="cart__user-info-icon fas fa-map-marker-alt"></i>
						<select name="" id="user_location">
							<?php
								$sql_get_user_info = mysqli_query($con, "select DiaChi  from diachikh dc, khachhang kh where dc.MSKH=kh.MSKH and TaiKhoanKH='".$_SESSION['login']."'");
								while($row_get_user_info = mysqli_fetch_array($sql_get_user_info)){
							?>
								<option class="cart__user-info-label" value=""><?php echo $row_get_user_info['DiaChi'] ?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="cart__user-info">
						<i class="cart__user-info-icon fas fa-phone-alt"></i>
						<?php
							$sql_get_user_info = mysqli_query($con, "select SoDienThoai from khachhang where TaiKhoanKH='".$_SESSION['login']."'");
							$row_get_user_info = mysqli_fetch_array($sql_get_user_info);
						?>
						<span id="cart_user_phone" class="cart__user-info-label"><?php echo $row_get_user_info['SoDienThoai'] ?></span>
					</div>
				</div>
				<div class="cart__info">
					<div class="cart__bill" id="cart__bill">
						<span class="cart__bill-header">Thông tin đơn hàng:</span>

						<div class="cart__bill-price">
							<span class="cart__bill-price-label">Tạm tính</span>
							<div>
								<span id="cart_total_price"><?php echo number_format($total_price) ?></span>
								<span>đ</span>
							</div>
						</div>

						<div class="cart__bill-price">
							<span class="cart__bill-price-label">Phí giao hàng</span>
							<span>30.000 đ</span>
						</div>

						<div class="cart__bill-banking">
							<span class="cart__bill-banking-label">Cú pháp chuyển khoản: 'Tên' _ 'Mã số đơn'</span>
							<input id="banking_username" class="cart__bill-banking-input" type="text" placeholder="Tên chủ tài khoản">
							<input id="banking_num" class="cart__bill-banking-input" type="text" placeholder="Số tài khoản">
							<input id="banking_bankname" class="cart__bill-banking-input" type="text" placeholder="Tên ngân hàng">
						</div>

						<div class="cart__user-discount">
							<span class="cart__bill-discount-label">
								Chọn voucher khuyến mãi:
							</span>
							<div class="cart__user-discount-input">
								<i class="cart__user-discount-icon fas fa-tags"></i>
								<select name="" id="user_discount" onchange=" changeVoucher(this, <?php echo $total_price ?>)">
									<option class="cart__user-discount-label" value="0"></option>
									<?php
										$sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH = '".$_SESSION['login']."'");
										$row_get_user_id = mysqli_fetch_array($sql_get_user_id);
										$sql_get_user_discount = mysqli_query($con, "select vc.MSVoucher, vc.TenVoucher from voucher vc, voucherkh vk where vc.MSVoucher=vk.MSVoucher and vk.MSKH='".$row_get_user_id['MSKH']."'");
										while($row_get_user_discount = mysqli_fetch_array($sql_get_user_discount)){
									?>
										<option class="cart__user-discount-label" value="<?php echo $row_get_user_discount['MSVoucher'] ?>"><?php echo $row_get_user_discount['TenVoucher'] ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>

						<div class="cart__bill-price">
							<span class="cart__bill-price-label">Voucher</span>
							<div>
								- <span id="cart__bill-discount-value">0</span>
								<span>đ</span>
							</div>
						</div>

						<div class="cart__bill-price">
							<span class="cart__bill-total-label">Tổng cộng</span>
							<div>
								<span id="cart__bill-total" class="cart__bill-total-price"><?php echo number_format($total_price + 30000) ?></span>
								<span class="cart__bill-total-price">đ</span>
							</div>
						</div>
						<span class="cart__bill-noti">Đã bao gồm VAT(nếu có)</span>
						<button onclick="order_bill(0)" class="cart__bill-btn-accept" id="cart__bill-btn-accept">Xác nhận giỏ hàng</button>
					</div>
				</div>
			</div>

			<div class="cart_suggest--wrapper">
				<?php
					$var_ID=1;
					$sql_get_list_fav = mysqli_query($con, "select yt.MSHH from sanphamyeuthich yt, khachhang kh where kh.TaiKhoanKH = '".$_SESSION['login']."' and yt.MSKH = kh.MSKH GROUP by MSHH");
					$user_name = $_SESSION['login'];
					$sql_get_iduser = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='$user_name'");
					$row_get_iduser = mysqli_fetch_array($sql_get_iduser);

					$iduser = $row_get_iduser['MSKH'];
					$count_list_fav=0;
					while($row_get_list_fav = mysqli_fetch_array($sql_get_list_fav)){
						$sql_get_product_info = mysqli_query($con, "select * from hanghoa where MSHH=".$row_get_list_fav['MSHH']." and GiamGia>0");
						while($row_get_product_info = mysqli_fetch_array($sql_get_product_info)){
							if($count_list_fav==0){
								$count_list_fav++;
				?>
					<div class="grid__column-8 suggest_header">
						<span class="suggest_header_label">
							Sản phẩm bạn yêu thích hiện đang giảm giá, nhanh chóng rước ngay nào:
						</span>
					</div>
					<div class="grid__column-8">
						<div class="home-product">
							<div class="grid__row">
				<?php
							}
							$var_count = 0;
							$string_1 = "select * from HinhHangHoa where MSHH=";
							$string_2 = $row_get_product_info['MSHH'];
							$sql_img = mysqli_query($con, $string_1."".$string_2);
							$sql_hinhanh = mysqli_fetch_array($sql_img);

							$row_img = mysqli_fetch_array(mysqli_query($con, "select * from HinhHangHoa where MSHH="."".$row_get_product_info['MSHH']));

							$var_giamgia = $row_get_product_info['Gia'] * (100 - $row_get_product_info['GiamGia']) / 100;

							$sql_product_fav = mysqli_query($con, "select * from sanphamyeuthich where MSHH=$string_2 and MSKH='".$iduser."'");
							$row_product_fav = mysqli_fetch_array($sql_product_fav);

							if((int)$row_get_product_info['GiamGia']>0 && $var_count<4){
				?>
				
							<div class="grid__column-3">
								<div class="home-product-item-wrap">
									<a href="?quanly=chitietsp&id=<?php echo $row_get_product_info["MSHH"] ?>" class="home-product-item">
										<div class="home-product-item__img" style="background-image: url(./Process/assets/img/<?php echo $row_img['TenHinh'] ?>);"></div>
										<h4 class="home-product-item__name"><?php echo $row_get_product_info['TenHH'] ?></h4>
										<div class="home-product-item__price">
											<span class="home-product-item__price-old"><?php echo number_format($row_get_product_info['Gia'])."đ" ?></span>
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

											<span class="home-product-item__sold">
												<?php 
												$sql_get_daban = "SELECT COUNT(*) AS soluongdaban
												FROM chitietdathang c JOIN dathang d ON c.SoDonDH=d.SoDonDH
												WHERE c.MSHH=$string_2 AND d.TrangThaiDH=1";
												$query_get_daban = mysqli_query($con, $sql_get_daban);
												$rows_get_daban = mysqli_fetch_array($query_get_daban);
												echo $rows_get_daban['soluongdaban']." Đã bán" 
												?>
											</span>
									</div>
									<div class="home-product-item__origin">
										<span class="home-product-item__brand"><?php echo $row_get_product_info['HangHangHoa'] ?></span>
										<span class="home-product-item__origin-name"><?php echo $row_get_product_info['NoiSXHangHoa'] ?></span>
									</div>

									<div class="home-product-item__favourite" onclick="return false">
										<i class="fas fa-check"></i>
										<span>Yêu thích</span>
									</div>

									<div class="home-product-item__sale-off">
										<span class="home-product-item__sale-off-percent"><?php echo $row_get_product_info['GiamGia']."%" ?></span>
										<span class="home-product-item__sale-off-label">GIẢM</span>
									</div>
								</div>
							</div>

					<?php
							if($row_get_product_info['Gia'] > $var_giamgia){
												echo '<script type="text/javascript">',
												'activeOldPrice('.$var_ID.');',
												'activeSaleOffBadge('.$var_ID.');',
												'</script>'
												;
											}
								$var_ID = $var_ID + 1;
								$var_count++;
								}
							}
						}
					?>
						</div>
					</div>
				</div>






				<?php
						$sql_get_cart_list_RAM = mysqli_query($con, "select gh.MSHH, gh.SoLuong from giohang gh, hanghoa hh, loaihanghoa lh, khachhang kh where gh.MSHH=hh.MSHH and hh.MaLoaiHang=lh.MaLoaiHang and gh.TaiKhoanKH=kh.TaiKhoanKH and kh.TaiKhoanKH = '".$_SESSION['login']."' and lh.TenLoaiHang='RAM'");

						$sql_get_iduser = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='$user_name'");
						$row_get_iduser = mysqli_fetch_array($sql_get_iduser);

						$iduser = $row_get_iduser['MSKH'];
						while($row_get_cart_list_RAM = mysqli_fetch_array($sql_get_cart_list_RAM)){
							if($row_get_cart_list_RAM['SoLuong']%2 == 1){
								$sql_get_product_info = mysqli_query($con, "select * from hanghoa where MaLoaiHang = 3");
				?>

					<div class="grid__column-8 suggest_header">
						<span class="suggest_header_label">
							Hãy mua RAM theo số chẵn để kích hoạt chức năng dual channel hoặc quad channel trên mainboard giúp tăng 15-30% hiệu năng nhé:
						</span>
					</div>
					<div class="grid__column-8">
						<div class="home-product">
							<div class="grid__row">
				<?php
								while($row_get_product_info = mysqli_fetch_array($sql_get_product_info)){
									
									$var_count = 0;
									$string_1 = "select * from HinhHangHoa where MSHH=";
									$string_2 = $row_get_product_info['MSHH'];
									$sql_img = mysqli_query($con, $string_1."".$string_2);
									$sql_hinhanh = mysqli_fetch_array($sql_img);

									$row_img = mysqli_fetch_array(mysqli_query($con, "select * from HinhHangHoa where MSHH="."".$row_get_product_info['MSHH']));

									$var_giamgia = $row_get_product_info['Gia'] * (100 - $row_get_product_info['GiamGia']) / 100;

									$sql_product_fav = mysqli_query($con, "select * from sanphamyeuthich where MSHH=$string_2 and MSKH='".$iduser."'");
									$row_product_fav = mysqli_fetch_array($sql_product_fav);

									if((int)$row_get_product_info['GiamGia']>0 && $var_count<4){
					?>
								<div class="grid__column-3">
									<div class="home-product-item-wrap">
										<a href="?quanly=chitietsp&id=<?php echo $row_get_product_info["MSHH"] ?>" class="home-product-item">
											<div class="home-product-item__img" style="background-image: url(./Process/assets/img/<?php echo $row_img['TenHinh'] ?>);"></div>
											<h4 class="home-product-item__name"><?php echo $row_get_product_info['TenHH'] ?></h4>
											<div class="home-product-item__price">
												<span class="home-product-item__price-old"><?php echo number_format($row_get_product_info['Gia'])."đ" ?></span>
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

												<span class="home-product-item__sold">
													<?php 
													$sql_get_daban = "SELECT COUNT(*) AS soluongdaban
													FROM chitietdathang c JOIN dathang d ON c.SoDonDH=d.SoDonDH
													WHERE c.MSHH=$string_2 AND d.TrangThaiDH=1";
													$query_get_daban = mysqli_query($con, $sql_get_daban);
													$rows_get_daban = mysqli_fetch_array($query_get_daban);
													echo $rows_get_daban['soluongdaban']." Đã bán" 
													?>
												</span>
										</div>
										<div class="home-product-item__origin">
											<span class="home-product-item__brand"><?php echo $row_get_product_info['HangHangHoa'] ?></span>
											<span class="home-product-item__origin-name"><?php echo $row_get_product_info['NoiSXHangHoa'] ?></span>
										</div>

										<div class="home-product-item__favourite" onclick="return false">
											<i class="fas fa-check"></i>
											<span>Yêu thích</span>
										</div>

										<div class="home-product-item__sale-off">
											<span class="home-product-item__sale-off-percent"><?php echo $row_get_product_info['GiamGia']."%" ?></span>
											<span class="home-product-item__sale-off-label">GIẢM</span>
										</div>
									</div>
								</div>

						<?php
									if($row_get_product_info['Gia'] > $var_giamgia){
														echo '<script type="text/javascript">',
														'activeOldPrice('.$var_ID.');',
														'activeSaleOffBadge('.$var_ID.');',
														'</script>'
														;
													}
									$var_ID = $var_ID + 1;
									$var_count++;
										}
									}
								}
							}
						?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal">
			<!-- modal__overlay--active -->
			<div class="modal__overlay"></div>

			<div class="modal__body">
				<!-- Register form -->
				<div class="auth-form">
					<div class="auth-form__container">
						<div class="auth-form__header">
							<h3 class="auth-form__heading">Thông tin ngân hàng</h3>
						</div>

						<div class="auth-form__form">
							<form class="">
								<div class="auth-form__group">
									<input type="text" id="userName" class="auth-form__input" placeholder="Số tài khoản ngân hàng" required />
								</div>
								<div class="auth-form__group">
									<input type="text" id="userPass" class="auth-form__input" placeholder="Tên người sở hữu" required />
								</div>
								<div class="auth-form__group">
									<input type="text" id="userPass" class="auth-form__input" placeholder="Tên ngân hàng" required />
								</div>
							</form>
						</div>

						<div class="auth-form__aside">
							<p class="auth-form__policy-text">
								Bằng việc điền form, bạn đã đồng ý với chúng tôi về
								<a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> 
								& 
								<a href="" class="auth-form__text-link">Chính sách bảo mật</a>
							</p>
						</div>
						<div class="auth-form__controls">
							<button onclick="deactiveModal(0)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
							<button onclick="check_regis_customer()" name="btn-register_customer" class="btn btn--primary">XÁC NHẬN</button>
						</div>
					</div>
				</div>
			</div>
		</div>