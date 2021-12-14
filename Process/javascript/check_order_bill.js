function order_bill(){

	var today = new Date();
	var Order_date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
	today.setDate(today.getDate() + 11);
	var Delivery_date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();

	var user_location_client = $('#user_location').find(":selected").text();
	var user_phone_client = parseInt(document.getElementById('cart_user_phone').innerHTML.replace(/,/g, ''));
	var user_Name_client = document.getElementById('user_name').innerHTML;
	var bill_total = parseInt(document.getElementById('cart__bill-total').innerHTML.replace(/,/g, ''));
	var bill_status = 4;
	var bill_staff = 0;

	// alert(user_location_client);
	// alert(user_phone_client);
	// alert(Order_date);
	// alert(Delivery_date);
	// alert(user_Name_client);
	// alert(bill_total);
	if(user_location_client){
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Process/php/add_bill.php?userLocation="+user_location_client+"&userPhone="+user_phone_client+"&userName="+user_Name_client+"&billStaff="+bill_staff+"&billTotal="+bill_total+"&orderDate="+Order_date+"&deliveryDate="+Delivery_date+"&billStatus="+bill_status;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				if(response == "true"){
					alert('Đặt hàng thành công, vui lòng kiểm tra lại trong tài khoản của tôi -> đơn hàng đang xử lý!');
					window.location = "./index.php?";
				}else{
					alert('Không thể đặt hàng. Vui lòng liên hệ ban quản trị để được xử lý!');
				}
			}
		}
	}else{
		alert("Địa chỉ không được trống, vui lòng vào Tài khoản của tôi -> Danh sách địa chỉ, để thêm địa chỉ của bạn");
	}
	
}