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
					<span class="cart__user-info-header">Thông tin giao hàng:</span>
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
					<div class="cart__bill">
						<span class="cart__bill-header">Thông tin đơn hàng</span>
						<div class="cart__bill-price">
							<span class="cart__bill-price-label">Tạm tính</span>
							<div>
								<span><?php echo number_format($total_price) ?></span>
								<span>đ</span>
							</div>
						</div>
						<div class="cart__bill-price">
							<span class="cart__bill-price-label">Phí giao hàng</span>
							<span>30.000 đ</span>
						</div>
						<div>
							<input class="cart__bill-coupon-input"type="text" placeholder="Mã giảm giá">
						</div>
						<div class="cart__bill-price">
							<span class="cart__bill-total-label">Tổng cộng</span>
							<div>
								<span id="cart__bill-total" class="cart__bill-total-price"><?php echo number_format($total_price + 30000) ?></span>
								<span class="cart__bill-total-price">đ</span>
							</div>
						</div>
						<span class="cart__bill-noti">Đã bao gồm VAT(nếu có)</span>
						<button onclick="order_bill()" class="cart__bill-btn-accept">Xác nhận giỏ hàng</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>