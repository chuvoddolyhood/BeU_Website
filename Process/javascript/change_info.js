function change_user_info(){
	if(document.getElementById('user_company').value){
		var user_Company = document.getElementById('user_company').value;
	}else{
		var user_Company = null;
	}

	if(document.getElementById('user_FAX').value){
		var user_FAX = document.getElementById('user_FAX').value;
	}else{
		var user_FAX = null;
	}

	var user_Name = document.getElementById('user_name').innerHTML;

	// alert(user_company);
	// alert(user_FAX);
	// alert(user_Name);

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=userChangeInfo&userName="+user_Name+"&userCompany="+user_Company+"&userFAX="+user_FAX;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Thay đổi thông tin thành công!');
				window.location = "./index.php?quanly=thongtin&id=1";
			}else{
				alert('Không thể thay đổi thông tin, vui lòng không nhập ký tự đặc biệt!');
			}
		}
	}
}

function change_product_info(){
	var product_ID = document.getElementById('product_ID').value;
	var product_name = document.getElementById('product_Name').value;
	var product_packing = document.getElementById('product_Packing').value;
	var product_price = parseInt(document.getElementById('product_Price').value.replace(/,/g, ''))
	var product_amount = document.getElementById('product_Amount').value;
	var product_category = document.getElementById('product_Category').value;
	var product_saleoff = document.getElementById('product_Saleoff').value;
	var product_categoryID = document.getElementById('product_CategoryID').value;
	var product_manufacturer = document.getElementById('product_Manufacturer').value;
	var product_country = document.getElementById('product_Country').value;
	var product_status = document.getElementById('product_Status').value;
	var product_warranty = document.getElementById('product_Warranty').value;
	var product_special = document.getElementById('product_Special').value;
	
	// alert(product_name);
	// alert(product_packing);
	// alert(product_price);
	// alert(product_amount);
	// alert(product_category);
	// alert(product_saleoff);
	// alert(product_categoryID);
	// alert(product_manufacturer);
	// alert(product_country);
	// alert(product_status);
	// alert(product_warranty);
	// alert(product_special);

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=productChangeInfo&productID="+product_ID+"&productName="+product_name+"&productPacking="+product_packing+"&productPrice="+product_price+"&productAmount="+product_amount+"&productCategoryID="+product_categoryID+"&productSaleoff="+product_saleoff+"&productCategory="+product_category+"&productManufacturer="+product_manufacturer+"&productCountry="+product_country+"&productStatus="+product_status+"&productWarranty="+product_warranty+"&productSpecial="+product_special;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Thay đổi thông tin thành công!');
				window.location = "./Admin/index.php?quanly=hanghoa";
			}else{
				alert('Không thể thay đổi thông tin, vui lòng liên hệ ban quản trị!');
			}
		}
	}
}

function change_bill_status(ID, staffID){
	var bill_ID = ID;
	var bill_ID_Status = document.getElementById("status_" + ID).value;
	var staff_ID = staffID;
	
	// alert(bill_ID);
	// alert(bill_ID_Status);

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=billChangeStatus&staffID="+staff_ID+"&billID="+bill_ID+"&billStatus="+bill_ID_Status;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Cập nhật trạng thái thành công!');
				window.location = "./Admin/index.php?quanly=donhang";
			}else{
				alert('Không thể thay đổi thông tin, vui lòng liên hệ ban quản trị để được giúp đỡ!');
			}
		}
	}
}

function remove_user_address(num){
	var address_number = num;

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=userRemoveAddress&userAddressNumber="+address_number;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Xóa địa chỉ thành công!');
				window.location = "./index.php?quanly=thongtin&id=2";
			}else{
				alert('Không thể xóa địa chỉ, vui lòng liên hệ ban quản trị để được xử lý');
			}
		}
	}
}

function remove_item_cart(num){
	var product_ID = num;
	var user_name = document.getElementById('user_name').innerHTML;

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=userRemoveCartItem&userName="+user_name+"&productID="+product_ID;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Xóa sản phẩm khỏi giỏ hàng thành công!');
				window.location.reload();
			}else{
				alert('Không thể xóa sản phẩm, vui lòng liên hệ ban quản trị để được xử lý');
			}
		}
	}
}

function active_modal_address(){
	var x = document.getElementsByClassName('modal');
	x[0].classList.toggle('modal--active');

	var y = document.getElementsByClassName('modal__overlay');
	y[0].classList.toggle('modal__overlay--active');

	var z = document.getElementsByClassName('auth-form');
	z[0].classList.toggle('auth-form--active');
}

function add_user_address(id){
	var user_ID = id;
	var user_Address = document.getElementById('user_address').value;

	// alert(user_ID);
	// alert(user_Address);

	if(user_Address){
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Process/php/change_info.php?change=userAddAddress&userID="+user_ID+"&userAddress="+user_Address;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				// alert(response);
				if(response == "true"){
					alert('Thêm địa chỉ mới thành công!');
					window.location = "./index.php?quanly=thongtin&id=2";
				}else{
					alert('Không thể thêm địa chỉ, vui lòng liên hệ ban quản trị để được xử lý');
				}
			}
		}	
	}else{
		alert("Địa chỉ không được trống");
	}
}

function reset_user_password(userName){
	var user_Name = userName;

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=userResetPass&userName="+user_Name;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response != "false"){
				alert('Reset pass thành công, mật khẩu mới của bạn là: ' + response);
				window.location = "./Admin/index.php?quanly=khachhang";
			}else{
				alert('Không thể xóa địa chỉ, vui lòng liên hệ ban quản trị để được xử lý');
			}
		}
	}
}

function reset_staff_password(staffName){
	var staff_Name = staffName;

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/php/change_info.php?change=staffResetPass&staffName="+staff_Name;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response != "false"){
				alert('Reset pass thành công, mật khẩu mới của bạn là: ' + response);
				window.location = "./Admin/index.php?quanly=taikhoan";
			}else{
				alert('Không thể xóa địa chỉ, vui lòng liên hệ ban quản trị để được xử lý');
			}
		}
	}
}