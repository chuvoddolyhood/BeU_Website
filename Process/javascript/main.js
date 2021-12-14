var star = document.getElementsByClassName("home-product-item__star--gold");

function print(){
	alert("done");
}

function onUpdating(){
	alert("Chức năng hiện đang được cập nhật, vui lòng quay lại sau");
}

function login(){
	var x = document.getElementsByClassName("header__navbar-unlogin");
	x[0].classList.toggle("header__navbar-unlogin--active");

	var y = document.getElementsByClassName("header__navbar-user");
	y[0].classList.toggle("header__navbar-user--active");
}

function activeCart(){
	var x = document.getElementsByClassName("header__cart-list");
	x[0].classList.add("header__cart-list-no-cart");
}

function itemLike(num){
	var x = document.getElementsByClassName('home-product-item__like');
	var y = document.getElementsByClassName('home-product-item__name');
	var user_Name = document.getElementById('user_name').innerHTML;
	if(confirm("Bạn có muốn thêm: " + y[num-1].innerHTML + " vào danh sách yêu thích?")){
		var userName = document.getElementById('user_name').innerHTML;

		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Process/php/change_info.php?change=userAddFav&userName="+userName+"&productName="+y[num-1].innerHTML;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				// alert(response);
				if(response == "true"){
					alert('Đã thêm vào danh sách yêu thích, bạn có thể xem danh sách yêu thích tại Tài khoản của tôi -> Sản phẩm yêu thích');
					location.reload();
				}else{
					alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
				}
			}
		}
	}
}

function itemLiked(num){
	var x = document.getElementsByClassName('home-product-item__like');
	var y = document.getElementsByClassName('home-product-item__name');
	if(confirm("Bạn có muốn xóa: " + y[num-1].innerHTML + " ra khỏi danh sách yêu thích?")){
		var userName = document.getElementById('user_name').innerHTML;

		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Process/php/change_info.php?change=userRemoveFav&userName="+userName+"&productName="+y[num-1].innerHTML;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				// alert(response);
				if(response == "true"){
					alert('Đã xóa sản phẩm khỏi danh sách yêu thích!');
					location.reload();
				}else{
					alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
				}
			}
		}
	}
}


function ratingStar(stt, numStar){
	var i;

	for(i=numStar-1; i>=stt-1; i--){
		star[i].classList.remove('home-product-item__star--gold');
	}
}

// Modal:
function activeModal(num){
	var x = document.getElementsByClassName('modal');
	x[0].classList.toggle('modal--active');

	var y = document.getElementsByClassName('modal__overlay');
	y[0].classList.toggle('modal__overlay--active');

	var z = document.getElementsByClassName('auth-form');
	z[num].classList.toggle('auth-form--active');
}

function deactiveModal(num){
	console.log(num);
	var x = document.getElementsByClassName('modal');
	x[0].classList.toggle('modal--active');

	var y = document.getElementsByClassName('modal__overlay');
	y[0].classList.toggle('modal__overlay--active');

	var z = document.getElementsByClassName('auth-form');
	z[num].classList.toggle('auth-form--active');
}

function switchModal(num){
	var x = document.getElementsByClassName('auth-form');
	x[0].classList.remove('auth-form--active');
	x[num].classList.add('auth-form--active');
}

// Active Price
function activeOldPrice(num){
	var x = document.getElementsByClassName('home-product-item__price-old');
	x[num-1].classList.add('home-product-item__price-old--active');
}

function activeSaleOffBadge(num){
	var x = document.getElementsByClassName('home-product-item__sale-off');
	x[num-1].classList.add('home-product-item__sale-off--active');
}

// Active category:
function active_home_category(num){
	var x = document.getElementsByClassName('category-item');
	x[num-1].classList.add('category-item--active');
}

function active_profile_category(num){
	var x = document.getElementsByClassName('manage-account-item');
	x[num-1].classList.add('manage-account-item--active');
}

// Active form product detail
function activeOldPrice_detail(){
	var x = document.getElementsByClassName('product-information__old-price');
	x[0].classList.add('product-information__old-price--active');
}

function activeSaleOffBadge_detail(){
	var x = document.getElementsByClassName('product-information__saleoff-badge');
	x[0].classList.add('product-information__saleoff-badge--active');
}

// add product's amount:
var timeout;

function mouseDown_inc(num){
	var max = num;
	value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
  	timeout = setTimeout(function() { mouseDown_inc(); }, 150);
  	if(value + 1 >= max){
  		document.getElementById('input-amount').value = max;
  	}else{
  		document.getElementById('input-amount').value = value + 1;
  	}
}

function mouseDown_dec(){
	value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
  	if(value - 1 <=0){
  		document.getElementById('input-amount').value = '1';
  	}else{
  		document.getElementById('input-amount').value = value - 1;
  	}
  	timeout = setTimeout(function() { mouseDown_dec(); }, 150);
}

function mouseUp(num) {
	clearTimeout(timeout);
	var max = num;
	value = isNaN(parseInt(document.getElementById('input-amount').value)) ? 0 : parseInt(document.getElementById('input-amount').value);
	if(value + 1 > max){
  		document.getElementById('input-amount').value = max;
  	}

  	if(value - 1 < 0){
  		document.getElementById('input-amount').value = '1';
  	}
}

function mouseLeave(num) { 
	clearTimeout(timeout);
}

// add cart:
function addProductToCart(){
	var x = document
}

// test click
function clickjs(num){
	// print();
	var y = document.getElementsByClassName('click--active');
	for(i=0; i<y.length; i++){
		y[i].classList.remove('click--active');
	}

	var count = num - 1;
	var x = document.getElementsByClassName('click');
	x[count].classList.add('click--active');
}

function renderChart(num1, num2, num3, num4, name1, name2, name3, name4){
	var options = {
		series: [num1, num2, num3, num4],
		legend:{
			position: 'bottom'
		},
		chart: {
			width: 375,
			type: 'donut',
		},
		labels: [name1, name2, name3, name4]
	};
	var chart = new ApexCharts(document.querySelector("#chart"), options);
	chart.render();
}

function searchProduct(){
	var x = document.getElementById('search-bar').value;
	var url = './index.php?search=' + x;
	window.location = url;
}

// deactive chinh sua:
function deactiveAddress(){
	var x = document.getElementsByClassName('table-cell-link');
	x[0].classList.add('table-cell-link--deactive');
}

function userLogOut(){
	if(confirm("Bạn có thật sự muốn đăng xuất?"))
		location.href='./index.php?status=logout';
}

function staffLogOut(){
	if(confirm("Bạn có thật sự muốn đăng xuất?"))
		location.href='index.php?status=logout';
}

// active danh sach trang Admin:
function activeAdminManageList(num){
	var x = document.getElementsByClassName('side-nav-item');
	x[num].classList.add('side-nav--active');
}