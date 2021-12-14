<?php
	include("../db/connect.php");

	if(isset($_GET)){
		$option = $_GET['change'];
	}

	if($option=='userChangeInfo'){
		$userCompany = $_GET['userCompany'];
		$userFAX = $_GET['userFAX'];
		$userName = $_GET['userName'];

		// echo $userCompany;
		// echo $userFAX;
		// echo $userName;

		$sql_update_info = "update khachhang set TenCongTy = '".$userCompany."', SoFAX = '".$userFAX."' where TaiKhoanKH='".$userName."';";

		// echo $sql;

		$sql_update_user_info = mysqli_query($con, $sql_update_info);

		if($sql_update_user_info){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='userResetPass'){
		$userName = $_GET['userName'];

		$sql_get_info = "select TaiKhoanKH, SoDienThoai from khachhang where TaiKhoanKH='".$userName."'";

		$sql_get_user_info = mysqli_query($con, $sql_get_info);

		while($row_get_user_info = mysqli_fetch_array($sql_get_user_info)){
			$newpass = $row_get_user_info['TaiKhoanKH'].$row_get_user_info['SoDienThoai'];

			// echo $newpass;

			$sql_create_new_pass = "update khachhang set MatKhauKH='".$newpass."' where TaiKhoanKH='".$userName."'";
			// echo $sql_create_new_pass;
			$sql_reset_pass = mysqli_query($con, $sql_create_new_pass);
			if($sql_reset_pass){
				echo $newpass;
			}else{
				echo 'false';
			}
		}
	}

	if($option=='staffResetPass'){
		$staffName = $_GET['staffName'];

		$sql_get_info = "select TaiKhoanNV, SoDienThoai from nhanvien where TaiKhoanNV='".$staffName."'";

		$sql_get_staff_info = mysqli_query($con, $sql_get_info);

		while($row_get_staff_info = mysqli_fetch_array($sql_get_staff_info)){
			$newpass = $row_get_staff_info['TaiKhoanNV'].$row_get_staff_info['SoDienThoai'];

			// echo $newpass;

			$sql_create_new_pass = "update khachhang set MatKhauKH='".$newpass."' where TaiKhoanKH='".$staffName."'";
			// echo $sql_create_new_pass;
			$sql_reset_pass = mysqli_query($con, $sql_create_new_pass);
			if($sql_reset_pass){
				echo $newpass;
			}else{
				echo 'false';
			}
		}
	}

	if($option=='userRemoveAddress'){
		$userAddressNumber = $_GET['userAddressNumber'];

		$sql_remove_address = "delete from diachikh where MaDC='".$userAddressNumber."'";

		$sql_remove_user_address = mysqli_query($con, $sql_remove_address);

		if($sql_remove_user_address){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='userRemoveCartItem'){
		$productID = $_GET['productID'];
		$userName = $_GET['userName'];

		$sql_remove_cart_item = "delete from giohang where TaiKhoanKH='".$userName."' and MSHH='".$productID."'";

		// echo $sql_remove_cart_item;

		$sql_remove_user_cart_item = mysqli_query($con, $sql_remove_cart_item);

		if($sql_remove_user_cart_item){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='userAddAddress'){
		$userID = $_GET['userID'];
		$userAddress = $_GET['userAddress'];

		$sql_insert_address = "INSERT INTO diachikh(DiaChi, MSKH) VALUES ('$userAddress', '$userID');";

		$sql_insert_user_address = mysqli_query($con, $sql_insert_address);

		if($sql_insert_user_address){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='billChangeStatus'){
		$billID = $_GET['billID'];
		$billStatus = $_GET['billStatus'];
		$staffID = $_GET['staffID'];

		$sql_update_status = "update dathang set MSNV='".$staffID."', TrangThaiDH='".$billStatus."' where SoDonDH='".$billID."';";

		$sql_update_bill_status = mysqli_query($con, $sql_update_status);

		if($sql_update_bill_status){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='productChangeInfo'){
		$productID = $_GET['productID'];
		$productName = $_GET['productName'];
		$productPacking = $_GET['productPacking'];
		$productPrice = $_GET['productPrice'];
		$productAmount = $_GET['productAmount'];
		$productCategoryID = $_GET['productCategoryID'];
		$productSaleoff = $_GET['productSaleoff'];
		$productCategory = $_GET['productCategory'];
		$productManufacturer = $_GET['productManufacturer'];
		$productCountry = $_GET['productCountry'];
		$productStatus = $_GET['productStatus'];
		$productWarranty = $_GET['productWarranty'];
		$productSpecial = $_GET['productSpecial'];

		$sql_update_info = "update hanghoa set TenHH='".$productName."', QuyCach='".$productPacking."', Gia='".$productPrice."', SoLuongHang='".$productAmount."', MaLoaiHang='".$productCategoryID."', GiamGia='".$productSaleoff."', LoaiSanPham='".$productCategory."', HangHangHoa='".$productManufacturer."', NoiSXHangHoa='".$productCountry."', TinhTrang='".$productStatus."', DacBiet='".$productSpecial."' where MSHH='".$productID."'";


		$sql_update_product_info = mysqli_query($con, $sql_update_info);

		if($sql_update_product_info){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	if($option=='userAddFav'){
		$userName = $_GET['userName'];
		$productName = $_GET['productName'];

		// echo $userName;
		// echo $productName;

		$sql_get_product_id = mysqli_query($con, "select MSHH from hanghoa where TenHH = '".$productName."'");
		$row_get_product_id = mysqli_fetch_array($sql_get_product_id);
		$sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH = '".$userName."'");
		$row_get_user_id = mysqli_fetch_array($sql_get_user_id);

		$userID = $row_get_user_id['MSKH'];
		$productID = $row_get_product_id['MSHH'];

		$sql_insert_fav = "INSERT INTO sanphamyeuthich(MSKH, MSHH) VALUES ('$userID', '$productID');";

		$sql_insert_product_fav = mysqli_query($con, $sql_insert_fav);

		if($sql_insert_product_fav){
			echo 'true';
		}else{
			echo 'false';
		}

	}

	if($option=='userRemoveFav'){
		$userName = $_GET['userName'];
		$productName = $_GET['productName'];

		// echo $userName;
		// echo $productName;

		$sql_get_product_id = mysqli_query($con, "select MSHH from hanghoa where TenHH = '".$productName."'");
		$row_get_product_id = mysqli_fetch_array($sql_get_product_id);
		$sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH = '".$userName."'");
		$row_get_user_id = mysqli_fetch_array($sql_get_user_id);

		$userID = $row_get_user_id['MSKH'];
		$productID = $row_get_product_id['MSHH'];

		$sql_remove_fav = "DELETE from sanphamyeuthich where MSKH='".$userID."' and MSHH='".$productID."';";

		$sql_remove_product_fav = mysqli_query($con, $sql_remove_fav);

		if($sql_remove_product_fav){
			echo 'true';
		}else{
			echo 'false';
		}

	}
?>