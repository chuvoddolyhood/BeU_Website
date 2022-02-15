function check_Password(){
	var user_Pass_client = document.getElementById('userPass').value;
	var user_RePass_client = document.getElementById('userRePass').value;
	var check = true;

	if(user_Pass_client != user_RePass_client){
		check = false;
	}

	return check;
}

function check_Staff_Password(){
	var staff_Pass = document.getElementById('staffPass').value;
	var staff_RePass = document.getElementById('staffRePass').value;
	var check = true;

	if(staff_Pass != staff_RePass){
		check = false;
	}

	return check;
}

function check_regis_customer(){
	var user_Name_client = document.getElementById('userName').value;
	var user_RealName_client = document.getElementById('userRealName').value;
	var user_Pass_client = document.getElementById('userPass').value;
	var user_RePass_client = document.getElementById('userRePass').value;
	var user_Tel_client = document.getElementById('userTel').value;
	var user_DOB_client = document.getElementById('userDOB').value;
	var user_Email_client = document.getElementById('userEmail').value;
	var user_sex_client = document.getElementById('userSex').value;
	var check = true;

	if(!user_Name_client){
		check = false;
		alert('Trường Tên tài khoản không được để trống');
	}else if(!user_RealName_client){
		check = false;
		alert('Trường Họ và Tên không được để trống');
	}else if(!user_Pass_client){
		check = false;
		alert('Trường Mật khẩu được để trống');
	}else if(!user_RePass_client){
		check = false;
		alert('Trường Nhập lại mật khẩu không được để trống');
	}else if(!user_Tel_client){
		check = false;
		alert('Trường Số điện thoại không được để trống');
	}else if(!user_DOB_client){
		check = false;
		alert('Trường Năm sinh không được để trống');
	}else if(!user_Email_client){
		check = false;
		alert('Trường Email không được để trống');
	}else if(!user_sex_client){
		check = false;
		alert('Trường Giới tính không được để trống');
	}else if(!check_Password()){
		check = false;
		alert("Nhập lại mật khẩu không đúng");
	}

	if(check){
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./Process/php/register.php?regis=customer&userName="+user_Name_client+"&userRealName="+user_RealName_client+"&userPass="+user_Pass_client+"&userTel="+user_Tel_client+"&userDOB="+user_DOB_client+"&userEmail="+user_Email_client+"&userSex="+user_sex_client;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				if(response == "true"){
					alert('Đăng ký thành công!');
					window.location = "./index.php?status=login";
				}else{
					alert('Không thể đăng ký do tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác hoặc liên hệ với nhân viên để được trợ giúp!');
				}
			}
		}
	}
}

function check_regis_staff(){
	var staff_Name = document.getElementById('staffName').value;
	var staff_Pass = document.getElementById('staffPass').value;
	var staff_RePass = document.getElementById('staffRePass').value;
	var staff_RealName = document.getElementById('staffRealName').value;
	var staff_Pos = document.getElementById('staffPos').value;
	var staff_Address = document.getElementById('staffAdress').value;
	var staff_Tel = document.getElementById('staffTel').value;
	var check = true;

	if(!staff_Name){
		check = false;
		alert('Trường Tên tài khoản không được để trống');
	}else if(!staff_RealName){
		check = false;
		alert('Trường Họ và Tên không được để trống');
	}else if(!staff_Pass){
		check = false;
		alert('Trường Mật khẩu được để trống');
	}else if(!staff_RePass){
		check = false;
		alert('Trường Nhập lại mật khẩu không được để trống');
	}else if(!staff_Tel){
		check = false;
		alert('Trường Số điện thoại không được để trống');
	}else if(!staff_Address){
		check = false;
		alert('Trường Địa chỉ không được để trống');
	}else if(!staff_Pos){
		check = false;
		alert('Trường Chức vụ không được để trống');
	}else if(!check_Staff_Password()){
		check = false;
		alert("Nhập lại mật khẩu không đúng");
	}

	//alert(staff_Name + "|" + staff_Pass + "|" + staff_RePass + "|" + staff_RealName + "|" + staff_Pos + "|" + staff_Address + "|" + staff_Tel);

	if(check){
		var ajax = new XMLHttpRequest();
		var method = "GET";
		var url = "./../Process/php/register.php?regis=staff&staffName="+staff_Name+"&staffRealName="+staff_RealName+"&staffPass="+staff_Pass+"&staffTel="+staff_Tel+"&staffAddress="+staff_Address+"&staffPos="+staff_Pos;
		var asynchronous = true;

		ajax.open(method, url, asynchronous);

		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var response = this.responseText;
				// alert(response);

				if(response == "true"){
					alert('Đăng ký thành công!');
					window.location.reload();
				}else{
					alert('Không thể đăng ký do tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác hoặc liên hệ với nhân viên để được trợ giúp!');
				}
			}
		}
	}
}

function check_regis_google(){
	var id_Google = document.getElementById('id_google').value;
	var user_Name = document.getElementById('username_google').value;
	var user_Tel = document.getElementById('usertel_google').value;

	// alert("username: " + user_Name + ", tel: " + user_Tel + ", id: " + id_Google);

	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "./Process/google_login/login_data.php?userName="+user_Name+"&userTel="+user_Tel+"&googleID="+id_Google;
	var asynchronous = true;

	ajax.open(method, url, asynchronous);

	ajax.send();

	ajax.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var response = this.responseText;
			// alert(response);
			if(response == "true"){
				alert('Đăng ký thành công!');
				window.location.reload();
			}else{
				alert('Không thể đăng ký do tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác hoặc liên hệ với nhân viên để được trợ giúp!');
			}
		}
	}
}