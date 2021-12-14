<script src="Process/javascript/main.js"></script>
<header class="header">
	<div class="grid">
		<nav class="header__navbar">
			<ul class="header__navbar-list">
				<li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
					Vào trang cá nhân trên ứng dụng

					<!-- Header QR code -->
					<div class="header_qr">
						<img src="Process/assets/img/qrcode_4792960_.svg" alt="QR code" class="header__qr-img">

						<div class="header__qr-apps">
							<a href="" class="header__qr-link">
								<img src="./Process/assets/img/google_play_icon.png" alt="Google Play" class="header__qr-download-img">
							</a>
							<a href="" class="header__qr-link">
								<img src="./Process/assets/img/app_store_icon.png" alt="App Store" class="header__qr-download-img">
							</a>
						</div>
					</div>
				</li>
				<li class="header__navbar-item">
					<span class="header__navbar-title--no-pointer">Kết nối</span>
					<a target="blank" href="https://www.facebook.com/profile.php?id=100011715779905" class="header__navbar-icon-link">
						<i class="header__navbar-icon fab fa-facebook"></i>
					</a>
					<a target="blank" href="https://www.instagram.com/qsczsemko/" class="header__navbar-icon-link">
						<i class="header__navbar-icon fab fa-instagram"></i>
					</a>
					<a target="blank" href="https://www.linkedin.com/in/nguyen-dinh-thanh-68929321b/" class="header__navbar-icon-link">
						<i class="header__navbar-icon fab fa-linkedin-in"></i>
					</a>
					<a target="blank" href="https://github.com/BeThanhU" class="header__navbar-icon-link">
						<i class="header__navbar-icon fab fa-github"></i>
					</a>
				</li>
			</ul>

			<ul class="header__navbar-list">
				<li class="header__navbar-item header__navbar-item--has-notify">
					<a href="" class="header__navbar-item-link">
						<i class="header__navbar-icon far fa-bell"></i>
						Thông báo
					</a>
					<div class="header__notify">
						<header class="header__notify-header">
							<h3>Thông báo mới</h3>
						</header>
						<ul class="header__notify-list">
							<li class="header__notify-item header__notify-item--viewed">
								<a href="" class="header__notify-link">
									<img src="https://i.imgur.com/q8u2VV6m.jpg" alt="" class="header__notify-img">
									<div class="header__notify-info">
										<span class="header__notify-name">Vật phẩm éc</span>
										<span class="header__notify-description">Mô tả vật phẩm éc</span>
									</div>
								</a>
							</li>
							<li class="header__notify-item">
								<a href="" class="header__notify-link">
									<img src="https://i.imgur.com/q8u2VV6m.jpg" alt="" class="header__notify-img">
									<div class="header__notify-info">
										<span class="header__notify-name">Vật phẩm éc</span>
										<span class="header__notify-description">Mô tả vật phẩm éc</span>
									</div>
								</a>
							</li>
							<li class="header__notify-item">
								<a href="" class="header__notify-link">
									<img src="https://i.imgur.com/q8u2VV6m.jpg" alt="" class="header__notify-img">
									<div class="header__notify-info">
										<span class="header__notify-name">Vật phẩm éc Vật phẩm éc Vật phẩm éc Vật phẩm éc</span>
										<span class="header__notify-description">Mô tả vật phẩm éc</span>
									</div>
								</a>
							</li>
							<li class="header__notify-item">
								<a href="" class="header__notify-link">
									<img src="https://i.imgur.com/q8u2VV6m.jpg" alt="" class="header__notify-img">
									<div class="header__notify-info">
										<span class="header__notify-name">Vật phẩm éc</span>
										<span class="header__notify-description">Mô tả vật phẩm éc</span>
									</div>
								</a>
							</li>
						</ul>

						<footer class="header__notify-footer">
							<a href="" class="header__notify-footer-btn">Xem tất cả</a>
						</footer>
					</div>
				</li>
				<li class="header__navbar-item">
					<a href="" class="header__navbar-item-link">
						<i class="header__navbar-icon far fa-question-circle"></i>
						Trợ giúp
					</a>
				</li>

				<div class="header__navbar-unlogin header__navbar-unlogin--active">
					<li onclick="activeModal(0)" class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">Đăng ký</li>
					<li onclick="activeModal(1)" class="header__navbar-item header__navbar-item--strong">Đăng nhập</li>
				</div>
				<div class="header__navbar-user">
					<li class="header__navbar-item "> 
						<img src="./Process/assets/img/avt.png" alt="" class="header__navbar-user-img">
						<span id="user_name" class="header__navbar-user-name"><?php echo $_SESSION['login'] ?></span>

						<ul class="header__navbar-user-menu">
							<li class="header__navbar-user-item">
								<a class="header__navbar-user-item-link" href="?quanly=thongtin&id=1">Tài khoản của tôi</a>
							</li>
							<li class="header__navbar-user-item">
								<a class="header__navbar-user-item-link" href="?quanly=thongtin&id=2">Địa chỉ</a>
							</li>
							<li class="header__navbar-user-item">
								<a class="header__navbar-user-item-link" href="?quanly=thongtin&id=4">Đơn mua</a>
							</li>
							<li class="header__navbar-user-item header__navbar-user-item--separate">
								<a onclick="userLogOut()">Đăng xuất</a>
							</li>
						</ul>
					</li>
				</div>
			</ul>
		</nav>

		<!-- header with search -->
		<div class="header-with-search">
			<div class="header__logo">
				<a href="index.php" class="header__logo-link">
					<p class="side-nav-logo">
						<span>BeU</span><img class="header__logo-img" src="./Process/assets/img/logo-ori-3-rmbg.jpg" alt="willfinchdesign">
						Store
					</p>
				</a>
			</div>

			<div class="header__search">
				<div class="header__search-input-wrap">
					<?php
					if(isset($_GET['search'])){
						$search = $_GET['search'];
					}else{
						$search = '';
					}
					?>
					<input type="text" id="search-bar" class="header__search-input" placeholder="Tìm kiếm sản phẩm" value="<?php echo $search ?>">

					<!-- Search history -->
					<div class="header__search-history">
						<h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
						<ul class="header__search-history-list">
							<?php
							if(isset($_SESSION['login'])){
								$sql_get_history = mysqli_query($con, "select LichSu from lichsutimkiem ls, khachhang kh where ls.MSKH=kh.MSKH and kh.TaiKhoanKH='".trim($_SESSION['login'])."' order by MaLichSu desc limit 3");
								while($row_get_history = mysqli_fetch_array($sql_get_history)){
									?>
									<li class="header__search-history-item">
										<a href="index.php?search=<?php echo $row_get_history['LichSu']; ?>">
											<?php echo $row_get_history['LichSu']; ?>
										</a>
									</li>
									<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
				<!-- <div class="header__search-select">
					<span class="header__search-select-label">Trong shop</span>
					<i class="header__search-select-icon fas fa-angle-down"></i>

					<ul class="header__search-option">
						<li class="header__search-option-item header__search-option-item--active">
							<span>Trong shop</span>
							<i class="fas fa-check"></i>
						</li>
						<li class="header__search-option-item">
							<span>Ngoài shop</span>
							<i class="fas fa-check"></i>
						</li>
					</ul>
				</div> -->
				<button onclick="searchProduct()" class="header__search-btn">
						<i class="header__search-btn-icon fas fa-search"></i>
				</button>
			</div>

			<!-- cart -->
			<div class="header__cart">
				<div class="header__cart-wrap">
					<i class="header__cart-icon fas fa-shopping-cart"></i>
					<?php
						if(isset($_SESSION['login'])){
							$sql_count_amount_cart = mysqli_query($con, "select count(MaGio) from giohang where TaiKhoanKH='".$_SESSION['login']."'");
							$row_count_amount_cart = mysqli_fetch_array($sql_count_amount_cart);
							$count_amount_cart = $row_count_amount_cart['count(MaGio)'];
						}else{
							$count_amount_cart = 0;
						}
					?>
					<span class="header__cart-notice"><?php echo $count_amount_cart ?></span>

					<!-- No cart: header__cart-list-no-cart -->
					<div class="header__cart-list">
						<img src="./Process/assets/img/no_cart.png" alt="" class="header__cart-no-cart-img">
						<span class="header__cart-list-no-cart-msg">
							Chưa có sản phẩm
						</span>

						<h4 class="header__cart-heading">Sản phẩm đã thêm</h4>

						<ul class="header__cart-list-item">
							<!-- Cart item -->
							<?php
								$sql_count_cart = mysqli_query($con, "select TenHangHoa from giohang  where TaiKhoanKH = '".$_SESSION['login']."'");
								$sql_get_cart = mysqli_query($con, "select gh.MSHH, TenHinh, TenHangHoa, Gia, SoLuong, PhanLoai from hinhhanghoa h, giohang gh, khachhang kh where gh.TaiKhoanKH = kh.TaiKhoanKH and h.MSHH=gh.MSHH and kh.TaiKhoanKH = '".$_SESSION['login']."'");
								if(!empty($row_count_cart = mysqli_fetch_array($sql_count_cart))){
									while($row_get_cart = mysqli_fetch_array($sql_get_cart)){
							?>
							<li class="header__cart-item">
								<img src="./Process/assets/img/<?php echo $row_get_cart['TenHinh'] ?>" alt="" class="header__cart-img">
								<div class="header__cart-item-info">
									<div class="header__cart-item-head">
										<h5 class="header__cart-item-name"><?php echo $row_get_cart['TenHangHoa']; ?></h5>
										<div class="header__cart-item-price-wrap">
											<span class="header__cart-item-price"><?php echo number_format($row_get_cart['Gia']) ?>đ</span>
											<span class="header__cart-item-multiply">x</span>
											<span class="header__cart-item-qnt"><?php echo $row_get_cart['SoLuong'] ?></span>
										</div>
									</div>
									<div class="header__cart-item-body">
										<span class="header__cart-item-description">
											Phân loại: <?php echo $row_get_cart['PhanLoai'] ?>
										</span>
										<span onclick="remove_item_cart(<?php echo $row_get_cart['MSHH'] ?>)" class="header__cart-item-remove">Xóa</span>
									</div>
								</div>
							</li>
							<?php
									}
								}else{
									echo '<script> activeCart(); </script>';
								}
							?>
						</ul>

						<a href="?quanly=giohang" class="header__cart-view-cart btn btn--primary">
							Xem giỏ hàng
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>