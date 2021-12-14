<div id="side-nav" class="side-nav">
	<p class="side-nav-logo">
		<span>BeU</span><img class="header__logo-img" src="../Process/assets/img/logo-ori-1-rmbg.jpg" alt="">Store
	</p>
	<li class="side-nav-item">
		<a href="index.php" class="side-nav-link">
			<i class="fas fa-tachometer-alt side-nav-icon"></i>
			&nbsp;
			<span>Danh mục</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=danhmuc&id=1" class="side-nav-link">
			<i class="fas fa-users side-nav-icon"></i>
			&nbsp;
			<span>Quản lý khách hàng</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=danhmuc&id=2" class="side-nav-link">
			<i class="fas fa-street-view side-nav-icon"></i>
			&nbsp;
			<span>Quản lý địa chỉ</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=danhmuc&id=3" class="side-nav-link">
			<i class="fas fa-list side-nav-icon"></i>
			&nbsp;
			<span>Quản lý hàng hóa</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=danhmuc&id=4" class="side-nav-link">
			<i class="fas fa-receipt side-nav-icon"></i>
			&nbsp;
			<span>Quản lý đơn hàng</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=danhmuc&id=5" class="side-nav-link">
			<i class="fas fa-user side-nav-icon"></i>
			&nbsp;
			<span>Quản lý tài khoản</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a onclick="staffLogOut()" class="side-nav-link">
			<i class="fas fa-sign-out-alt side-nav-icon"></i>
			&nbsp;
			<span name="btn_staff_logout">LogOut</span>
		</a>
	</li>
</div>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = 0;
	}

	echo "<script> activeAdminManageList($id) </script>";
?>