function exchange(userName, voucherName){
	var user_name = userName;
	var voucher_name = voucherName;

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./exchangeVoucher.php?userName="+user_name+"&voucherName="+voucher_name;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert(`Đã thêm voucher vào ví, hãy dùng nó để tận hưởng sản phẩm của chúng tôi tốt hơn nhé!`);
				window.location = "./index.php?quanly=game";
			}else{
				alert('. Vui lòng liên hệ với nhân viên để được trợ giúp!');
			}
		}
	}
}