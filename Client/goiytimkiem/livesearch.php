<?php
  session_start();
  include('Process/db/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danh sách sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dssp.css">
</head>
<body>
<?php
$id=$_SESSION['id'];
if(isset($_SESSION['id'])){
?>
<a href=ttcanhan.php class="tren">Home</a>

<a href=themsp.html class="tren">Thêm sản phẩm</a>
<a href=thaydoisp.php class="tren">Thay đổi sản phẩm</a>
<a href=logout.php class="tren">Đăng xuất</a>
<?php
}

else{
	header("location:login.html");
};
?>
<form>
	<p>Tìm kiếm sản phẩm</p>
    <input type="text" name="" onkeyup="ketqua(this.value)">
	<div id="ketquatk"></div>
</form>
<script>
	function ketqua(str) {
  if (str.length==0) {
    document.getElementById("ketquatk").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("ketquatk").innerHTML=this.responseText;      
    }
  }
  xmlhttp.open("GET","timkiem.php?kq="+str,true);
  xmlhttp.send();
}
</script>
</body>
</html>



