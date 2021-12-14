function check_Password(){
	var user_Pass_client = document.getElementById('userPass').value;
	var user_RePass_client = document.getElementById('userRePass').value;
	var check = true;

	if(user_Pass_client != user_RePass_client){
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
					alert('Không thể đăng ký do tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác và thử lại!');
				}
			}
		}
	}
}