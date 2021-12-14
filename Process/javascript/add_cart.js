function add_product_cart(direct){

	var user_Name_client = document.getElementById('user_name').innerHTML;
	var cart_Product_id = document.getElementById('product_id').innerHTML;
	var cart_Product_name = document.getElementById('product_name').innerHTML;
	var cart_Product_price = parseInt(document.getElementById('product_price').innerHTML.replace(/,/g, ''));
	var cart_Product_amount = document.getElementById('input-amount').value;
	var cart_Product_category = document.getElementById('product_category').innerHTML;

	// alert("user: " + user_Name_client);
	// alert("id: " + cart_Product_id);
	// alert("name: " + cart_Product_name);
	// alert("price: " + cart_Product_price);
	// alert("amount: " + cart_Product_amount);
	// alert("category: " + cart_Product_category);

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "Process/php/add.php?add=cart&userName="+user_Name_client+"&product_id="+cart_Product_id+"&product_name="+cart_Product_name+"&product_price="+cart_Product_price+"&product_amount="+cart_Product_amount+"&product_category="+cart_Product_category;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Thêm sản phẩm vào giỏ hàng thành công!');
				window.location = "./index.php?quanly=chitietsp&id=" + cart_Product_id;
			}else{
				alert('Xảy ra lỗi trong quá trình thêm sản phẩm vào giỏ hàng. Vui lòng chọn thêm lại!');
			}

			if(direct == "true"){
				window.location = "./index.php?quanly=giohang";
			}
		}
	}
}